<?php

class User
{
    private $pdo;
    
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function register($username, $email, $password)
    {
        // Check if username already exists
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->rowCount() > 0) {
            return ['success' => false, 'message' => 'Username already exists'];
        }
        
        // Check if email already exists
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            return ['success' => false, 'message' => 'Email already exists'];
        }
        
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert new user
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$username, $email, $hashedPassword])) {
            return ['success' => true, 'message' => 'Registration successful'];
        }
        
        return ['success' => false, 'message' => 'Registration failed'];
    }
    
    public function login($username, $password)
    {
        // Get user by username
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $username]);
        $user = $stmt->fetch();
        
        if (!$user) {
            return ['success' => false, 'message' => 'Invalid username or password'];
        }
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Start session and store user data
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            
            return ['success' => true, 'message' => 'Login successful', 'user' => $user];
        }
        
        return ['success' => false, 'message' => 'Invalid username or password'];
    }
    
    public function logout()
    {
        // Destroy session
        session_unset();
        session_destroy();
        return ['success' => true, 'message' => 'Logout successful'];
    }
    
    public function getCurrentUser()
    {
        if (!isset($_SESSION['user_id'])) {
            return null;
        }
        
        $stmt = $this->pdo->prepare("SELECT id, username, email, is_admin, created_at FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt->fetch();
    }
    
    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
    
    /**
     * Check if current user is an admin
     * 
     * @return bool True if user is admin
     */
    public function isAdmin()
    {
        if (!$this->isLoggedIn()) {
            return false;
        }
        
        $userId = $_SESSION['user_id'];
        $stmt = $this->pdo->prepare("SELECT is_admin FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $result = $stmt->fetch();
        
        return $result && $result['is_admin'] == 1;
    }
    
    /**
     * Get a list of all users (for admin purposes)
     * 
     * @return array List of all users
     */
    public function getAllUsers()
    {
        $stmt = $this->pdo->query("SELECT id, username, email, is_admin, created_at FROM users ORDER BY id");
        return $stmt->fetchAll();
    }
    
    /**
     * Toggle admin status for a user
     * 
     * @param int $userId User ID to update
     * @param bool $isAdmin New admin status
     * @return bool True if successful
     */
    public function toggleAdminStatus($userId, $isAdmin)
    {
        $stmt = $this->pdo->prepare("UPDATE users SET is_admin = ? WHERE id = ?");
        return $stmt->execute([(int)$isAdmin, $userId]);
    }
    
    /**
     * Update user profile
     * 
     * @param string $username New username
     * @param string $email New email
     * @param string $currentPassword Current password for verification
     * @param string $newPassword New password (optional)
     * @param string $confirmPassword Confirm new password
     * @param int|null $isAdmin If provided, update admin status (admin only)
     * @return array Success status and message
     */
    public function updateProfile($username, $email, $currentPassword, $newPassword = '', $confirmPassword = '', $isAdmin = null)
    {
        // Check if user is logged in
        if (!$this->isLoggedIn()) {
            return ['success' => false, 'message' => 'User not logged in'];
        }
        
        // Get current user
        $userId = $_SESSION['user_id'];
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch();
        
        if (!$user) {
            return ['success' => false, 'message' => 'User not found'];
        }
        
        // Verify current password
        if (!password_verify($currentPassword, $user['password'])) {
            return ['success' => false, 'message' => 'Current password is incorrect'];
        }
        
        // Check if username changed and is available
        if ($username !== $user['username']) {
            $stmt = $this->pdo->prepare("SELECT id FROM users WHERE username = ? AND id != ?");
            $stmt->execute([$username, $userId]);
            if ($stmt->rowCount() > 0) {
                return ['success' => false, 'message' => 'Username already exists'];
            }
        }
        
        // Check if email changed and is available
        if ($email !== $user['email']) {
            $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
            $stmt->execute([$email, $userId]);
            if ($stmt->rowCount() > 0) {
                return ['success' => false, 'message' => 'Email already exists'];
            }
        }
        
        // Check if password should be updated
        $updatePassword = false;
        if (!empty($newPassword)) {
            if (strlen($newPassword) < 6) {
                return ['success' => false, 'message' => 'Password must be at least 6 characters long'];
            }
            
            if ($newPassword !== $confirmPassword) {
                return ['success' => false, 'message' => 'Passwords do not match'];
            }
            
            $updatePassword = true;
        }
        
        // Update user
        try {
            $this->pdo->beginTransaction();
            
            if ($updatePassword) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $stmt = $this->pdo->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
                $stmt->execute([$username, $email, $hashedPassword, $userId]);
            } else {
                $stmt = $this->pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
                $stmt->execute([$username, $email, $userId]);
            }
            
            // If admin status should be updated (admin only)
            if ($isAdmin !== null && $this->isAdmin()) {
                $stmt = $this->pdo->prepare("UPDATE users SET is_admin = ? WHERE id = ?");
                $stmt->execute([(int)$isAdmin, $userId]);
            }
            
            $this->pdo->commit();
            
            // Update session data
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            
            return ['success' => true, 'message' => 'Profile updated successfully'];
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return ['success' => false, 'message' => 'An error occurred while updating profile'];
        }
    }
}
