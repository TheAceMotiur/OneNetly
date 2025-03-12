<?php
require_once 'includes/init.php';

// If user is already logged in, redirect to dashboard
if ($user->isLoggedIn()) {
    redirect('dashboard.php');
}

// Get current user if logged in (for header)
$currentUser = $user->getCurrentUser();

// Process login form
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($username)) {
        $errors[] = 'Username is required';
    }
    
    if (empty($password)) {
        $errors[] = 'Password is required';
    }
    
    if (empty($errors)) {
        $result = $user->login($username, $password);
        
        if ($result['success']) {
            redirect('dashboard.php', 'Login successful!', 'success');
        } else {
            $errors[] = $result['message'];
        }
    }
}

// Set page title
$pageTitle = "Login";

// Include header
require_once 'includes/header.php';
?>

<div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-indigo-800 text-white py-4 px-6">
        <h3 class="text-xl font-semibold text-center">Login</h3>
    </div>
    <div class="p-6">
        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username or Email</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
            </div>
            
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password">
                <div class="mt-1 text-right">
                    <a href="forgot-password.php" class="text-sm text-indigo-600 hover:text-indigo-800">Forgot your password?</a>
                </div>
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                    Login
                </button>
            </div>
        </form>
        
        <div class="mt-6 text-center">
            <p class="text-gray-600">Don't have an account? <a href="register.php" class="text-indigo-600 hover:text-indigo-800">Register here</a></p>
        </div>
        <?php displayHorizontalAd(); ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
