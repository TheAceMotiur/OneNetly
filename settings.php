<?php
require_once 'includes/init.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to access settings', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Process form submission
$success = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update profile
    if (isset($_POST['update_profile'])) {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $bio = trim($_POST['bio'] ?? '');
        
        // Validate input
        if (empty($name)) {
            $errors[] = 'Name is required';
        }
        
        if (empty($email)) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }
        
        if (empty($errors)) {
            $result = $user->updateProfile($currentUser['id'], [
                'name' => $name,
                'email' => $email,
                'bio' => $bio
            ]);
            
            if ($result) {
                $success = true;
                // Refresh user data
                $currentUser = $user->getCurrentUser();
            } else {
                $errors[] = 'Failed to update profile';
            }
        }
    }
    
    // Change password
    if (isset($_POST['change_password'])) {
        $currentPassword = $_POST['current_password'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        
        // Validate input
        if (empty($currentPassword)) {
            $errors[] = 'Current password is required';
        }
        
        if (empty($newPassword)) {
            $errors[] = 'New password is required';
        } elseif (strlen($newPassword) < 8) {
            $errors[] = 'New password must be at least 8 characters';
        }
        
        if ($newPassword !== $confirmPassword) {
            $errors[] = 'Passwords do not match';
        }
        
        if (empty($errors)) {
            $result = $user->changePassword($currentUser['id'], $currentPassword, $newPassword);
            
            if ($result) {
                $success = true;
            } else {
                $errors[] = 'Failed to update password. Make sure your current password is correct.';
            }
        }
    }
    
    // Update preferences
    if (isset($_POST['update_preferences'])) {
        $theme = $_POST['theme'] ?? 'light';
        
        $result = $userSettings->set('theme', $theme);
        
        if ($result) {
            $success = true;
        } else {
            $errors[] = 'Failed to update preferences';
        }
    }
}

// Get current preferences
$currentTheme = $userSettings->get('theme', 'light');
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo getThemeClass(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - OneNetly</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo getThemeStyles(); ?>
    <?php echo getThemeScript(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="<?php echo getBodyThemeClass(); ?>">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r border-gray-200 text-gray-900">
            <div class="p-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold">OneNetly</h2>
            </div>
            <nav class="mt-6">
                <a href="dashboard.php" class="flex items-center py-3 px-4 text-gray-700 hover:bg-gray-50">
                    <span class="mr-3">
                        <i class="fas fa-home"></i>
                    </span>
                    Home
                </a>
                <a href="index.php" class="flex items-center py-3 px-4 text-gray-700 hover:bg-gray-50">
                    <span class="mr-3">
                        <i class="fas fa-book-open"></i>
                    </span>
                    Reading List
                </a>
                <a href="create-post.php" class="flex items-center py-3 px-4 text-gray-700 hover:bg-gray-50">
                    <span class="mr-3">
                        <i class="fas fa-edit"></i>
                    </span>
                    Write a Story
                </a>
                <a href="settings.php" class="flex items-center py-3 px-4 bg-gray-100 text-gray-900">
                    <span class="mr-3">
                        <i class="fas fa-cog"></i>
                    </span>
                    Settings
                </a>
                <a href="logout.php" class="flex items-center py-3 px-4 text-gray-700 hover:bg-gray-50">
                    <span class="mr-3">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    Sign Out
                </a>
            </nav>
        </div>
        
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-semibold text-gray-900">Settings</h1>
                </div>
            </header>
            
            <!-- Main content -->
            <main class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <?php if ($success): ?>
                    <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                        <p>Your changes have been saved successfully.</p>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($errors)): ?>
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                        <ul class="list-disc list-inside">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <!-- Profile settings -->
                <div class="bg-white shadow rounded-lg overflow-hidden mb-6">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>
                        <p class="mt-1 text-sm text-gray-500">
                            Update your account's profile information.
                        </p>
                    </div>
                    
                    <div class="p-6">
                        <form method="POST" action="">
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($currentUser['name'] ?? $currentUser['username']); ?>" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($currentUser['email'] ?? ''); ?>" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                
                                <div>
                                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                                    <textarea id="bio" name="bio" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"><?php echo htmlspecialchars($currentUser['bio'] ?? ''); ?></textarea>
                                    <p class="mt-2 text-sm text-gray-500">Brief description for your profile.</p>
                                </div>
                                
                                <div>
                                    <button type="submit" name="update_profile" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-full text-white bg-green-600 hover:bg-green-700 focus:outline-none">
                                        Save Profile Information
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Change password -->
                <div class="bg-white shadow rounded-lg overflow-hidden mb-6">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900">Change Password</h2>
                        <p class="mt-1 text-sm text-gray-500">
                            Ensure your account is using a secure password.
                        </p>
                    </div>
                    
                    <div class="p-6">
                        <form method="POST" action="">
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                                    <input type="password" name="current_password" id="current_password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                
                                <div>
                                    <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                
                                <div>
                                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                
                                <div>
                                    <button type="submit" name="change_password" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-full text-white bg-green-600 hover:bg-green-700 focus:outline-none">
                                        Change Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Preferences -->
                <div class="bg-white shadow rounded-lg overflow-hidden mb-6">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900">Preferences</h2>
                        <p class="mt-1 text-sm text-gray-500">
                            Customize your experience.
                        </p>
                    </div>
                    
                    <div class="p-6">
                        <form method="POST" action="">
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Theme</label>
                                    <div class="mt-2 space-y-2">
                                        <div class="flex items-center">
                                            <input id="theme-light" name="theme" type="radio" value="light" <?php echo $currentTheme === 'light' ? 'checked' : ''; ?> class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                            <label for="theme-light" class="ml-3 block text-sm font-medium text-gray-700">Light</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="theme-dark" name="theme" type="radio" value="dark" <?php echo $currentTheme === 'dark' ? 'checked' : ''; ?> class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                            <label for="theme-dark" class="ml-3 block text-sm font-medium text-gray-700">Dark</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="theme-system" name="theme" type="radio" value="system" <?php echo $currentTheme === 'system' ? 'checked' : ''; ?> class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                            <label for="theme-system" class="ml-3 block text-sm font-medium text-gray-700">System</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <button type="submit" name="update_preferences" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-full text-white bg-green-600 hover:bg-green-700 focus:outline-none">
                                        Save Preferences
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
