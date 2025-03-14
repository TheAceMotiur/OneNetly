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
     * Get a list of all admin users
     * 
     * @return array List of all admin users
     */
    public function getAllAdmins()
    {
        $stmt = $this->pdo->query("SELECT id, username, email, created_at FROM users WHERE is_admin = 1 ORDER BY id");
        return $stmt->fetchAll();
    }
    
    /**
     * Get recent users
     * 
     * @param int $limit Number of users to return
     * @return array List of recent users
     */
    public function getRecentUsers($limit = 5)
    {
        $stmt = $this->pdo->prepare("SELECT id, username, email, is_admin, created_at FROM users ORDER BY created_at DESC LIMIT :limit");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
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
     * @param array $data Profile data to update
     * @return bool Success status
     */
    public function updateProfile($data)
    {
        try {
            $this->pdo->beginTransaction();
            
            // Get current user
            $userId = $_SESSION['user_id'];
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            $user = $stmt->fetch();
            
            if (!$user) {
                throw new PDOException('User not found');
            }

            // Prepare update query
            $sql = "UPDATE users SET 
                    username = :username,
                    email = :email,
                    bio = :bio
                    WHERE id = :user_id";
            
            $params = [
                ':username' => $data['username'],
                ':email' => $data['email'],
                ':bio' => $data['bio'] ?? null,
                ':user_id' => $userId
            ];

            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute($params);
            
            $this->pdo->commit();
            return $result;

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return false;
        }
    }
    
    /**
     * Delete a user by ID
     * 
     * @param int $userId The ID of the user to delete
     * @return bool True if deletion was successful
     */
    public function deleteUser($userId)
    {
        // Don't allow deleting the current user
        if ($this->isLoggedIn() && $_SESSION['user_id'] == $userId) {
            return false;
        }
        
        try {
            $this->pdo->beginTransaction();
            
            // First, delete related data that would cause foreign key constraints
            
            // Delete user's blog posts (and their associated categories, comments, etc.)
            $blogStmt = $this->pdo->prepare("SELECT id FROM blogs WHERE user_id = ?");
            $blogStmt->execute([$userId]);
            $blogs = $blogStmt->fetchAll();
            
            foreach ($blogs as $blog) {
                // Delete blog categories
                $stmt = $this->pdo->prepare("DELETE FROM blog_category WHERE blog_id = ?");
                $stmt->execute([$blog['id']]);
                
                // Delete blog comments if the table exists
                try {
                    $stmt = $this->pdo->prepare("DELETE FROM comments WHERE post_id = ?");
                    $stmt->execute([$blog['id']]);
                } catch (PDOException $e) {
                    // Comments table might not exist, so ignore this error
                }
                
                // Delete blog post
                $stmt = $this->pdo->prepare("DELETE FROM blogs WHERE id = ?");
                $stmt->execute([$blog['id']]);
            }
            
            // Delete user's comments if the table exists
            try {
                $stmt = $this->pdo->prepare("DELETE FROM comments WHERE user_id = ?");
                $stmt->execute([$userId]);
            } catch (PDOException $e) {
                // Comments table might not exist, so ignore this error
            }
            
            // Delete user's password reset tokens if any
            $stmt = $this->pdo->prepare("DELETE FROM password_resets WHERE user_id = ?");
            $stmt->execute([$userId]);
            
            // Delete user's settings
            $stmt = $this->pdo->prepare("DELETE FROM settings WHERE user_id = ?");
            $stmt->execute([$userId]);
            
            // Finally, delete the user
            $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
            $result = $stmt->execute([$userId]);
            
            $this->pdo->commit();
            return $result;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return false;
        }
    }

    /**
     * Get user by ID
     * 
     * @param int $userId User ID
     * @return array|false User data or false if not found
     */
    public function getUserById($userId) {
        try {
            // First try with bio column
            $sql = "SELECT id, username, email, bio, is_admin, created_at FROM users WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$userId]);
            $result = $stmt->fetch();
            
            if ($result === false) {
                return false;
            }
            
            return $result;
        } catch (PDOException $e) {
            // If bio column doesn't exist, try without it
            if ($e->getCode() == '42S22') {
                $sql = "SELECT id, username, email, is_admin, created_at FROM users WHERE id = ?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$userId]);
                $result = $stmt->fetch();
                
                if ($result === false) {
                    return false;
                }
                
                // Add empty bio field
                $result['bio'] = null;
                return $result;
            }
            throw $e;
        }
    }

    /**
     * Search users by username or email
     * 
     * @param string $query Search query
     * @return array List of matching users
     */
    public function searchUsers($query)
    {
        $searchTerm = '%' . $query . '%';
        $stmt = $this->pdo->prepare("SELECT id, username, email, is_admin, created_at FROM users 
                                    WHERE username LIKE ? OR email LIKE ? 
                                    ORDER BY id");
        $stmt->execute([$searchTerm, $searchTerm]);
        return $stmt->fetchAll();
    }

    /**
     * Follow another user
     * 
     * @param int $followerId ID of user who is following
     * @param int $followedId ID of user to be followed
     * @return array Result with success status and message
     */
    public function followUser($followerId, $followedId)
    {
        // Don't allow following yourself
        if ($followerId == $followedId) {
            return [
                'success' => false,
                'message' => 'You cannot follow yourself'
            ];
        }
        
        try {
            // Check if already following
            if ($this->isFollowing($followerId, $followedId)) {
                return [
                    'success' => false,
                    'message' => 'Already following this user'
                ];
            }
            
            // First create follows table if it doesn't exist
            $this->createFollowsTable();
            
            $stmt = $this->pdo->prepare("INSERT INTO follows (follower_id, followed_id) VALUES (?, ?)");
            $stmt->execute([$followerId, $followedId]);
            
            return [
                'success' => true,
                'message' => 'Successfully followed user'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Failed to follow user: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Unfollow a user
     * 
     * @param int $followerId ID of user who is unfollowing
     * @param int $followedId ID of user to be unfollowed
     * @return array Result with success status and message
     */
    public function unfollowUser($followerId, $followedId)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM follows WHERE follower_id = ? AND followed_id = ?");
            $stmt->execute([$followerId, $followedId]);
            
            if ($stmt->rowCount() > 0) {
                return [
                    'success' => true,
                    'message' => 'Successfully unfollowed user'
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Not following this user'
                ];
            }
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Failed to unfollow user: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Check if a user is following another user
     * 
     * @param int $followerId ID of potential follower
     * @param int $followedId ID of potentially followed user
     * @return bool True if following, false otherwise
     */
    public function isFollowing($followerId, $followedId)
    {
        try {
            // First create follows table if it doesn't exist
            $this->createFollowsTable();
            
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM follows WHERE follower_id = ? AND followed_id = ?");
            $stmt->execute([$followerId, $followedId]);
            return ($stmt->fetchColumn() > 0);
        } catch (PDOException $e) {
            return false;
        }
    }

    private function createFollowsTable()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS follows (
                id INT AUTO_INCREMENT PRIMARY KEY,
                follower_id INT NOT NULL,
                followed_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (follower_id) REFERENCES users(id) ON DELETE CASCADE,
                FOREIGN KEY (followed_id) REFERENCES users(id) ON DELETE CASCADE,
                UNIQUE KEY unique_follow (follower_id, followed_id)
            )";
            
            $this->pdo->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    /**
     * Get followers of a user
     * 
     * @param int $userId User ID to get followers for
     * @param int $page Page number for pagination
     * @param int $limit Number of results per page
     * @return array Follower users with pagination info
     */
    public function getFollowers($userId, $page = 1, $limit = 10)
    {
        try {
            // Calculate offset
            $offset = ($page - 1) * $limit;
            
            // Count total followers
            $countStmt = $this->pdo->prepare("SELECT COUNT(*) FROM follows WHERE followed_id = ?");
            $countStmt->execute([$userId]);
            $total = $countStmt->fetchColumn();
            
            // Get followers with pagination
            $stmt = $this->pdo->prepare("
                SELECT u.id, u.username, u.email, u.created_at 
                FROM follows f
                JOIN users u ON f.follower_id = u.id
                WHERE f.followed_id = ?
                ORDER BY f.created_at DESC
                LIMIT ? OFFSET ?
            ");
            $stmt->execute([$userId, $limit, $offset]);
            $followers = $stmt->fetchAll();
            
            // Calculate pagination info
            $totalPages = ceil($total / $limit);
            
            return [
                'followers' => $followers,
                'pagination' => [
                    'current' => $page,
                    'total' => $totalPages,
                    'count' => $total,
                    'limit' => $limit
                ]
            ];
        } catch (PDOException $e) {
            return [
                'followers' => [],
                'pagination' => [
                    'current' => 1,
                    'total' => 0,
                    'count' => 0,
                    'limit' => $limit
                ]
            ];
        }
    }
    
    /**
     * Get users that a user is following
     * 
     * @param int $userId User ID to get following for
     * @param int $page Page number for pagination
     * @param int $limit Number of results per page
     * @return array Following users with pagination info
     */
    public function getFollowing($userId, $page = 1, $limit = 10)
    {
        try {
            // Calculate offset
            $offset = ($page - 1) * $limit;
            
            // Count total following
            $countStmt = $this->pdo->prepare("SELECT COUNT(*) FROM follows WHERE follower_id = ?");
            $countStmt->execute([$userId]);
            $total = $countStmt->fetchColumn();
            
            // Get following with pagination
            $stmt = $this->pdo->prepare("
                SELECT u.id, u.username, u.email, u.created_at 
                FROM follows f
                JOIN users u ON f.followed_id = u.id
                WHERE f.follower_id = ?
                ORDER BY f.created_at DESC
                LIMIT ? OFFSET ?
            ");
            $stmt->execute([$userId, $limit, $offset]);
            $following = $stmt->fetchAll();
            
            // Calculate pagination info
            $totalPages = ceil($total / $limit);
            
            return [
                'following' => $following,
                'pagination' => [
                    'current' => $page,
                    'total' => $totalPages,
                    'count' => $total,
                    'limit' => $limit
                ]
            ];
        } catch (PDOException $e) {
            return [
                'following' => [],
                'pagination' => [
                    'current' => 1,
                    'total' => 0,
                    'count' => 0,
                    'limit' => $limit
                ]
            ];
        }
    }
    
    /**
     * Count followers for a user
     * 
     * @param int $userId User ID to count followers for
     * @return int Number of followers
     */
    public function countFollowers($userId)
    {
        try {
            // First create follows table if it doesn't exist
            $this->createFollowsTable();
            
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM follows WHERE followed_id = ?");
            $stmt->execute([$userId]);
            return (int)$stmt->fetchColumn();
        } catch (PDOException $e) {
            return 0;
        }
    }
    
    /**
     * Count how many users a user is following
     * 
     * @param int $userId User ID to count following for
     * @return int Number of users being followed
     */
    public function countFollowing($userId)
    {
        try {
            // First create follows table if it doesn't exist  
            $this->createFollowsTable();
            
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM follows WHERE follower_id = ?");
            $stmt->execute([$userId]);
            return (int)$stmt->fetchColumn();
        } catch (PDOException $e) {
            return 0;
        }
    }

    /**
     * Get recommended users to follow
     * 
     * @param int $limit Number of users to return
     * @return array List of recommended users
     */
    public function getRecommendedUsers($limit = 3)
    {
        try {
            // If user is logged in, exclude users they're already following and themselves
            if ($this->isLoggedIn()) {
                $currentUser = $this->getCurrentUser();
                $userId = $currentUser['id'];
                
                $sql = "SELECT u.id, u.username, u.email, u.created_at 
                        FROM users u
                        WHERE u.id != :userId
                        AND NOT EXISTS (
                            SELECT 1 FROM follows f 
                            WHERE f.follower_id = :followerId AND f.followed_id = u.id
                        )
                        ORDER BY RAND()
                        LIMIT :limit";
                        
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->bindParam(':followerId', $userId, PDO::PARAM_INT); // Fixed: Added missing parameter
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->execute();
            } else {
                // If not logged in, just get random users
                $sql = "SELECT u.id, u.username, u.email, u.created_at 
                        FROM users u
                        ORDER BY RAND()
                        LIMIT :limit";
                
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->execute();
            }
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // Return empty array on error
            return [];
        }
    }
}
