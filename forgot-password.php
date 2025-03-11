<?php
require_once 'includes/init.php';

// If user is already logged in, redirect to dashboard
if ($user->isLoggedIn()) {
    redirect('dashboard.php');
}

// Get current user if logged in (for header)
$currentUser = $user->getCurrentUser();

// Process form submission
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    
    if (empty($email)) {
        $message = 'Email address is required';
        $messageType = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email format';
        $messageType = 'error';
    } else {
        // Load Email class
        require_once 'classes/Email.php';
        $emailSender = new Email($settings);
        
        // Send password reset email
        $result = $emailSender->sendPasswordResetEmail($email);
        
        if ($result['success']) {
            $message = $result['message'];
            $messageType = 'success';
        } else {
            $message = $result['message'];
            $messageType = 'error';
        }
    }
}

// Set page title
$pageTitle = "Forgot Password";

// Include header
require_once 'includes/header.php';
?>

<div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-indigo-800 text-white py-4 px-6">
        <h3 class="text-xl font-semibold text-center">Forgot Password</h3>
    </div>
    <div class="p-6">
        <?php if ($message): ?>
            <div class="<?php echo $messageType === 'error' ? 'bg-red-100 border-red-400 text-red-700' : 'bg-green-100 border-green-400 text-green-700'; ?> px-4 py-3 rounded mb-4 border">
                <p><?php echo htmlspecialchars($message); ?></p>
            </div>
        <?php endif; ?>
        
        <p class="mb-4 text-gray-700">Enter your email address and we'll send you a link to reset your password.</p>
        
        <form method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" required>
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                    Send Reset Link
                </button>
            </div>
        </form>
        
        <div class="mt-6 text-center">
            <p class="text-gray-600">Remembered your password? <a href="login.php" class="text-indigo-600 hover:text-indigo-800">Back to login</a></p>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
