<?php
require_once 'includes/init.php';

// If user is already logged in, redirect to dashboard
if ($user->isLoggedIn()) {
    redirect('dashboard.php');
}

// Get current user if logged in (for header)
$currentUser = $user->getCurrentUser();

// Check if token is valid
$token = $_GET['token'] ?? '';
$tokenValid = false;
$userId = null;
$errors = [];
$success = false;

if (empty($token)) {
    $errors[] = 'Invalid or missing reset token';
} else {
    // Check if token exists and is not expired
    $stmt = $pdo->prepare("SELECT user_id, expiry FROM password_resets WHERE token = ?");
    $stmt->execute([$token]);
    $tokenData = $stmt->fetch();
    
    if ($tokenData) {
        // Check if token is expired
        if (strtotime($tokenData['expiry']) < time()) {
            $errors[] = 'Reset token has expired. Please request a new password reset link.';
        } else {
            $tokenValid = true;
            $userId = $tokenData['user_id'];
        }
    } else {
        $errors[] = 'Invalid reset token. Please request a new password reset link.';
    }
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $tokenValid) {
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    // Validate input
    if (empty($password)) {
        $errors[] = 'Password is required';
    } else if (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters long';
    }
    
    if ($password !== $confirmPassword) {
        $errors[] = 'Passwords do not match';
    }
    
    if (empty($errors)) {
        // Update user's password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        try {
            $pdo->beginTransaction();
            
            // Update password
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->execute([$hashedPassword, $userId]);
            
            // Delete the token
            $stmt = $pdo->prepare("DELETE FROM password_resets WHERE user_id = ?");
            $stmt->execute([$userId]);
            
            $pdo->commit();
            $success = true;
        } catch (PDOException $e) {
            $pdo->rollBack();
            $errors[] = 'An error occurred while resetting your password. Please try again later.';
        }
    }
}

// Set page title
$pageTitle = "Reset Password";

// Include header
require_once 'includes/header.php';
?>

<div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-indigo-800 text-white py-4 px-6">
        <h3 class="text-xl font-semibold text-center">Reset Password</h3>
    </div>
    <div class="p-6">
        <?php if ($success): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <p>Your password has been reset successfully!</p>
                <p class="mt-2">You can now <a href="login.php" class="text-green-800 font-bold">login</a> with your new password.</p>
            </div>
        <?php else: ?>
            <?php if (!empty($errors)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($tokenValid): ?>
                <p class="mb-4 text-gray-700">Please enter your new password below.</p>
                
                <form method="POST">
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">New Password</label>
                        <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" required>
                        <p class="text-sm text-gray-500 mt-1">Must be at least 6 characters</p>
                    </div>
                    
                    <div class="mb-6">
                        <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Confirm New Password</label>
                        <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="confirm_password" name="confirm_password" required>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                            Reset Password
                        </button>
                    </div>
                </form>
            <?php endif; ?>
                
            <div class="mt-6 text-center">
                <p class="text-gray-600"><a href="forgot-password.php" class="text-indigo-600 hover:text-indigo-800">Request a new password reset link</a></p>
                <p class="text-gray-600 mt-2">Remember your password? <a href="login.php" class="text-indigo-600 hover:text-indigo-800">Back to login</a></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
