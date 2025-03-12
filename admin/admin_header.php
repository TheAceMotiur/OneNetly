<?php
// Start output buffering to prevent "headers already sent" errors
ob_start();

require_once '../includes/init.php';

// Protect admin pages - only accessible to admins
if (!$user->isLoggedIn() || !$user->isAdmin()) {
    redirect('../login.php', 'You do not have admin privileges to access this area', 'error');
    exit;
}

function getActiveClass($page) {
    $currentFile = basename($_SERVER['PHP_SELF']);
    return ($currentFile == $page) ? 'bg-blue-800' : 'hover:bg-blue-700';
}
?>

<!DOCTYPE html>
<html lang="en" class="<?php echo getThemeClass(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - OneNetly</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo getThemeStyles(); ?>
    <?php echo getThemeScript(); ?>
</head>
<body class="<?php echo getBodyThemeClass(); ?>">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Mobile Header -->
        <div class="md:hidden bg-blue-950 text-white p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">OneNetly Admin</h2>
            <button id="mobile-menu-button" class="text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Admin Sidebar -->
        <div id="admin-sidebar" class="w-full md:w-64 bg-blue-900 text-white hidden md:block">
            <div class="p-4 bg-blue-950">
                <h2 class="text-2xl font-semibold">OneNetly Admin</h2>
            </div>
            <nav class="mt-6">
                <a href="index.php" class="flex items-center py-3 px-4 text-white <?php echo getActiveClass('index.php'); ?>">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="3" width="7" height="9" rx="1" stroke="currentColor" stroke-width="2"/>
                            <rect x="14" y="3" width="7" height="5" rx="1" stroke="currentColor" stroke-width="2"/>
                            <rect x="14" y="12" width="7" height="9" rx="1" stroke="currentColor" stroke-width="2"/>
                            <rect x="3" y="16" width="7" height="5" rx="1" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </span>
                    Dashboard
                </a>
                <a href="users.php" class="flex items-center py-3 px-4 text-white <?php echo getActiveClass('users.php'); ?>">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Manage Users
                </a>
                <a href="blogs.php" class="flex items-center py-3 px-4 text-white <?php echo getActiveClass('blogs.php'); ?>">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 7L12 13L21 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Manage Blogs
                </a>
                <a href="comments.php" class="flex items-center py-3 px-4 text-white <?php echo getActiveClass('comments.php'); ?>">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 12H8.01M12 12H12.01M16 12H16.01M21 12C21 16.4183 16.9706 20 12 20C10.4607 20 9.01172 19.6565 7.74467 19.0511L3 20L4.39499 16.28C3.51156 15.0423 3 13.5743 3 12C3 7.58172 7.02944 4 12 4C16.9706 4 21 7.58172 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Comments
                </a>
                <a href="categories.php" class="flex items-center py-3 px-4 text-white <?php echo getActiveClass('categories.php'); ?>">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 7H20M4 12H20M4 17H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Categories
                </a>
                <a href="seo-settings.php" class="flex items-center py-3 px-4 text-white <?php echo getActiveClass('seo-settings.php'); ?>">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 3.5a6.5 6.5 0 0 1 4.5 11.15l6.5 6.5-1.5 1.5-6.5-6.5A6.5 6.5 0 1 1 10 3.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    SEO Settings
                </a>
                <a href="settings.php" class="flex items-center py-3 px-4 text-white <?php echo getActiveClass('settings.php'); ?>">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Admin Settings
                </a>
                <div class="border-t border-blue-800 my-4"></div>
                <a href="../dashboard.php" class="flex items-center py-3 px-4 text-white hover:bg-blue-700">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 17L5 13M5 13L9 9M5 13H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Back to Site
                </a>
                <a href="../logout.php" class="flex items-center py-3 px-4 text-white hover:bg-blue-700">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 16L21 12M21 12L17 8M21 12H9M13 16V17C13 18.6569 11.6569 20 10 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H10C11.6569 4 13 5.34315 13 7V8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Logout
                </a>
            </nav>
        </div>
        
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex flex-wrap justify-between items-center">
                    <h1 class="text-xl md:text-2xl font-semibold text-gray-900"><?php echo isset($pageTitle) ? $pageTitle : 'Admin Dashboard'; ?></h1>
                    <div class="flex items-center mt-2 md:mt-0">
                        <span class="text-sm text-gray-500">
                            Admin: <?php echo htmlspecialchars($user->getCurrentUser()['username']); ?>
                        </span>
                    </div>
                </div>
            </header>
            
            <!-- Main content -->
            <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <?php echo displayMessage(); ?>

<script>
document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
    const sidebar = document.getElementById('admin-sidebar');
    sidebar.classList.toggle('hidden');
});

// Hide sidebar when clicking outside on mobile
document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('admin-sidebar');
    const mobileButton = document.getElementById('mobile-menu-button');
    
    if (window.innerWidth < 768 && !sidebar.contains(e.target) && !mobileButton.contains(e.target)) {
        sidebar.classList.add('hidden');
    }
});
</script>
</body>
</html>
