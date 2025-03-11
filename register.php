<?php
require_once 'includes/init.php';

// If user is already logged in, redirect to dashboard
if ($user->isLoggedIn()) {
    redirect('dashboard.php');
}

// Get current user if logged in (for header)
$currentUser = $user->getCurrentUser();

// Get reCAPTCHA site key from settings
$stmt = $pdo->query("SELECT value FROM site_config WHERE name = 'recaptcha_site_key'");
$recaptchaSiteKey = $stmt->fetchColumn();

// Process registration form
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify reCAPTCHA
    $recaptchaSecret = $pdo->query("SELECT value FROM site_config WHERE name = 'recaptcha_secret_key'")->fetchColumn();
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
    
    $recaptchaVerify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}");
    $recaptchaData = json_decode($recaptchaVerify);
    
    if (!$recaptchaData->success) {
        $errors[] = 'Please complete the reCAPTCHA verification';
    }
    
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    // Validate input
    if (empty($username)) {
        $errors[] = 'Username is required';
    } else if (strlen($username) < 3) {
        $errors[] = 'Username must be at least 3 characters';
    }
    
    if (empty($email)) {
        $errors[] = 'Email is required';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }
    
    if (empty($password)) {
        $errors[] = 'Password is required';
    } else if (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters';
    }
    
    if ($password !== $confirmPassword) {
        $errors[] = 'Passwords do not match';
    }
    
    if (empty($errors)) {
        $result = $user->register($username, $email, $password);
        
        if ($result['success']) {
            redirect('login.php', 'Registration successful. Please login.', 'success');
        } else {
            $errors[] = $result['message'];
        }
    }
}

// Set page title
$pageTitle = "Register";

// Include header
require_once 'includes/header.php';
?>

<!-- Add reCAPTCHA script in head -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-indigo-800 text-white py-4 px-6">
        <h3 class="text-xl font-semibold text-center">Create an Account</h3>
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
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
            </div>
            
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" required>
                <p class="text-sm text-gray-500 mt-1">Must be at least 6 characters</p>
            </div>
            
            <div class="mb-4">
                <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="confirm_password" name="confirm_password" required>
            </div>
            
            <div class="mb-4">
                <div class="g-recaptcha" data-sitekey="<?php echo htmlspecialchars($recaptchaSiteKey); ?>"></div>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                    Register
                </button>
            </div>
        </form>
        
        <div class="mt-6 text-center">
            <p class="text-gray-600">Already have an account? <a href="login.php" class="text-indigo-600 hover:text-indigo-800">Login here</a></p>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
