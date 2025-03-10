<?php
require_once 'includes/init.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneNetly - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-indigo-800 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a class="text-xl font-bold" href="index.php">OneNetly</a>
                <div>
                    <?php if ($user->isLoggedIn()): ?>
                        <span class="mr-4">Welcome, <?php echo htmlspecialchars($currentUser ? $currentUser['username'] : ''); ?></span>
                        <a href="dashboard.php" class="px-3 py-2 rounded hover:bg-indigo-700 transition">Dashboard</a>
                        <?php if ($user->isAdmin()): ?>
                        <a href="admin/index.php" class="px-3 py-2 rounded hover:bg-indigo-700 transition">Admin</a>
                        <?php endif; ?>
                        <a href="logout.php" class="px-3 py-2 rounded hover:bg-indigo-700 transition">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="px-3 py-2 rounded hover:bg-indigo-700 transition">Login</a>
                        <a href="register.php" class="px-3 py-2 rounded hover:bg-indigo-700 transition">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-8 px-4">
        <?php if (function_exists('displayMessage')): ?>
            <?php echo displayMessage(); ?>
        <?php endif; ?>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-indigo-800 text-white py-4 px-6">
                <h2 class="text-2xl font-semibold">Welcome to OneNetly</h2>
            </div>
            <div class="p-6">
                <?php if ($user->isLoggedIn()): ?>
                    <p class="mb-4">Hello, <?php echo htmlspecialchars($currentUser ? $currentUser['username'] : ''); ?>!</p>
                    <p class="mb-4">You are now logged in to your OneNetly account.</p>
                    <div class="mt-6">
                        <a href="dashboard.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                            Go to Dashboard
                        </a>
                    </div>
                <?php else: ?>
                    <p class="mb-4">OneNetly is your complete solution for online management.</p>
                    <p class="mb-4">Please login or register to access your account and all the features.</p>
                    <div class="mt-6 flex space-x-4">
                        <a href="login.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                            Login
                        </a>
                        <a href="register.php" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded transition">
                            Register
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
