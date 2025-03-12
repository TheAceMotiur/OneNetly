<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to access settings', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Process settings form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $success = false;
    
    // Handle profile settings
    if (isset($_POST['profile_submit'])) {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $currentPassword = $_POST['current_password'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        
        // Update user profile
        $result = $user->updateProfile($username, $email, $currentPassword, $newPassword, $confirmPassword);
        
        if ($result['success']) {
            $success = true;
            $successMessage = $result['message'];
        } else {
            $errors[] = $result['message'];
        }
    }
    
    // Handle notification settings
    if (isset($_POST['notification_submit'])) {
        $emailNotifications = isset($_POST['email_notifications']) ? 1 : 0;
        
        // Save notification settings
        $userSettings->set('email_notifications', $emailNotifications);
        $success = true;
        $successMessage = 'Notification settings updated successfully';
    }
    
    // Handle theme settings
    if (isset($_POST['theme_submit'])) {
        $theme = $_POST['theme'] ?? 'light';
        
        // Save theme settings
        $userSettings->set('theme', $theme);
        $success = true;
        $successMessage = 'Theme settings updated successfully';
    }
}

// Get current user settings
$emailNotifications = $userSettings->get('email_notifications', 0);
$theme = $userSettings->get('theme', 'light');
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
</head>
<body class="<?php echo getBodyThemeClass(); ?>">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-indigo-800 text-white">
            <div class="p-4">
                <h2 class="text-2xl font-semibold">OneNetly</h2>
            </div>
            <nav class="mt-6">
                <a href="dashboard.php" class="flex items-center py-3 px-4 text-white hover:bg-indigo-700">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Dashboard
                </a>
                <a href="settings.php" class="flex items-center py-3 px-4 bg-indigo-900 text-white">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Settings
                </a>
                <a href="index.php" class="flex items-center py-3 px-4 text-white hover:bg-indigo-700">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Home
                </a>
                <a href="logout.php" class="flex items-center py-3 px-4 text-white hover:bg-indigo-700">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 16L21 12M21 12L17 8M21 12H9M13 16V17C13 18.6569 11.6569 20 10 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H10C11.6569 4 13 5.34315 13 7V8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Logout
                </a>
            </nav>
        </div>
        
        <!-- Content -->
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-gray-900">Settings</h1>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 mr-4">Welcome, <?php echo htmlspecialchars($currentUser['username']); ?></span>
                    </div>
                </div>
            </header>
            
            <!-- Main content -->
            <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <?php echo displayMessage(); ?>
                
                <?php if (isset($success) && $success): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        <?php echo htmlspecialchars($successMessage); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($errors)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <!-- Settings Tabs -->
                <div class="bg-white shadow rounded-lg mb-6">
                    <div class="border-b border-gray-200">
                        <nav class="flex -mb-px">
                            <a href="#profile" class="tab-link active w-1/3 py-4 px-1 text-center border-b-2 border-indigo-500 font-medium text-sm text-indigo-600" data-target="profile-section">
                                Profile Settings
                            </a>
                            <a href="#notifications" class="tab-link w-1/3 py-4 px-1 text-center border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="notification-section">
                                Notification Settings
                            </a>
                            <a href="#theme" class="tab-link w-1/3 py-4 px-1 text-center border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300" data-target="theme-section">
                                Theme Settings
                            </a>
                        </nav>
                    </div>
                    
                    <!-- Profile Settings Section -->
                    <div id="profile-section" class="tab-content p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Profile Settings</h3>
                        <form method="POST" action="">
                            <div class="mb-4">
                                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" value="<?php echo htmlspecialchars($currentUser['username']); ?>">
                            </div>
                            
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" value="<?php echo htmlspecialchars($currentUser['email']); ?>">
                            </div>
                            
                            <div class="mb-4">
                                <label for="current_password" class="block text-gray-700 text-sm font-bold mb-2">Current Password (required for changes)</label>
                                <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="current_password" name="current_password">
                            </div>
                            
                            <div class="mb-4">
                                <label for="new_password" class="block text-gray-700 text-sm font-bold mb-2">New Password (leave blank to keep current)</label>
                                <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="new_password" name="new_password">
                            </div>
                            
                            <div class="mb-6">
                                <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Confirm New Password</label>
                                <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="confirm_password" name="confirm_password">
                            </div>
                            
                            <div class="flex items-center justify-end">
                                <button type="submit" name="profile_submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Notification Settings Section -->
                    <div id="notification-section" class="tab-content p-6 hidden">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Notification Settings</h3>
                        <form method="POST" action="">
                            <div class="mb-6">
                                <div class="flex items-center">
                                    <input type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" id="email_notifications" name="email_notifications" <?php echo $emailNotifications ? 'checked' : ''; ?>>
                                    <label for="email_notifications" class="ml-2 block text-sm text-gray-900">
                                        Receive email notifications
                                    </label>
                                </div>
                                <p class="mt-1 text-sm text-gray-500">We'll send you email notifications about important updates and activities.</p>
                            </div>
                            
                            <div class="flex items-center justify-end">
                                <button type="submit" name="notification_submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Save Preferences
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Theme Settings Section -->
                    <div id="theme-section" class="tab-content p-6 hidden">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Theme Settings</h3>
                        <form method="POST" action="">
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Theme Mode</label>
                                <div class="mt-2 space-y-4">
                                    <div class="flex items-center">
                                        <input id="theme-light" name="theme" type="radio" value="light" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" <?php echo ($theme === 'light') ? 'checked' : ''; ?>>
                                        <label for="theme-light" class="ml-3 block text-sm text-gray-700">Light Mode</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="theme-dark" name="theme" type="radio" value="dark" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" <?php echo ($theme === 'dark') ? 'checked' : ''; ?>>
                                        <label for="theme-dark" class="ml-3 block text-sm text-gray-700">Dark Mode</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="theme-system" name="theme" type="radio" value="system" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" <?php echo ($theme === 'system') ? 'checked' : ''; ?>>
                                        <label for="theme-system" class="ml-3 block text-sm text-gray-700">System Preference</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-end">
                                <button type="submit" name="theme_submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Save Theme
                                </button>
                            </div>
                        </form>
                    </div>
                    <?php displayHorizontalAd(); ?>
                </div>
            </main>
        </div>
    </div>
    
    <script>
        // Tab switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all tabs
                    tabLinks.forEach(tab => {
                        tab.classList.remove('active', 'border-indigo-500', 'text-indigo-600');
                        tab.classList.add('border-transparent', 'text-gray-500');
                    });
                    
                    // Add active class to clicked tab
                    this.classList.remove('border-transparent', 'text-gray-500');
                    this.classList.add('active', 'border-indigo-500', 'text-indigo-600');
                    
                    // Hide all tab contents
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });
                    
                    // Show the selected tab content
                    const targetId = this.getAttribute('data-target');
                    document.getElementById(targetId).classList.remove('hidden');
                });
            });
            
            // Check if URL has a hash and activate that tab
            if (window.location.hash) {
                const hash = window.location.hash.substring(1);
                const tabLink = document.querySelector(`.tab-link[href="#${hash}"]`);
                if (tabLink) tabLink.click();
            }
        });
    </script>
</body>
</html>
