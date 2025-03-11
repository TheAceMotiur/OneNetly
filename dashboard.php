<?php
require_once 'includes/init.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to access dashboard', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Get user's blog posts
$userBlogs = $blog->getAllBlogs(1, 5, 'all');
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo getThemeClass(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - OneNetly</title>
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
                <a href="dashboard.php" class="flex items-center py-3 px-4 bg-indigo-900 text-white">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Dashboard
                </a>
                <?php if (isset($currentUser['is_admin']) && $currentUser['is_admin']): ?>
                <a href="admin/index.php" class="flex items-center py-3 px-4 text-white hover:bg-indigo-700">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Admin Panel
                </a>
                <?php endif; ?>
                <a href="settings.php" class="flex items-center py-3 px-4 text-white hover:bg-indigo-700">
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
        
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-500 mr-4">Welcome, <?php echo htmlspecialchars($currentUser['username']); ?></span>
                    </div>
                </div>
            </header>
            
            <!-- Main content -->
            <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <?php echo displayMessage(); ?>
                
                <!-- Dashboard Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold text-gray-700">Welcome!</h2>
                        <p class="text-gray-600 mt-2">Welcome to your OneNetly dashboard. This is where you'll manage all your activities.</p>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold text-gray-700">Account Info</h2>
                        <div class="mt-2 text-gray-600">
                            <p><strong>Username:</strong> <?php echo htmlspecialchars($currentUser['username']); ?></p>
                            <p><strong>Email:</strong> <?php echo htmlspecialchars($currentUser['email']); ?></p>
                            <p><strong>Member Since:</strong> <?php echo date('F j, Y', strtotime($currentUser['created_at'])); ?></p>
                            <?php if (isset($currentUser['is_admin']) && $currentUser['is_admin']): ?>
                                <div class="mt-4">
                                    <a href="admin/index.php" class="block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-center rounded-md">Admin Panel</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold text-gray-700">Quick Actions</h2>
                        <div class="mt-2 space-y-3">
                            <?php if ($user->isAdmin()): ?>
                                <a href="create-post.php" class="block px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-center rounded-md">Create New Blog Post</a>
                            <?php endif; ?>
                            <a href="settings.php" class="block px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-center rounded-md">Settings</a>
                            <a href="index.php" class="block px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-center rounded-md">Go to Home</a>
                        </div>
                    </div>
                </div>
                
                <!-- My Blog Posts -->
                <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
                    <?php if ($user->isAdmin()): ?>
                        <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold text-gray-700">Blog Posts</h2>
                            <a href="create-post.php" class="text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">New Post</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="divide-y divide-gray-200">
                        <?php if (empty($userBlogs['blogs'])): ?>
                            <p class="p-6 text-gray-600">You haven't created any blog posts yet.</p>
                        <?php else: ?>
                            <?php foreach ($userBlogs['blogs'] as $post): ?>
                                <?php if ($post['user_id'] == $currentUser['id']): ?>
                                    <div class="p-6">
                                        <div class="flex justify-between">
                                            <div>
                                                <h3 class="text-xl font-medium text-gray-900">
                                                    <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="hover:text-indigo-600">
                                                        <?php echo htmlspecialchars($post['title']); ?>
                                                    </a>
                                                </h3>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    <span class="<?php echo $post['status'] === 'published' ? 'text-green-600' : 'text-yellow-600'; ?>">
                                                        <?php echo ucfirst($post['status']); ?>
                                                    </span> • 
                                                    <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                                                </p>
                                            </div>
                                            <div>
                                                <a href="edit-post.php?id=<?php echo $post['id']; ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                                <a href="delete-post.php?id=<?php echo $post['id']; ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-gray-600">
                                                <?php 
                                                if (!empty($post['excerpt'])) {
                                                    echo htmlspecialchars($post['excerpt']);
                                                } else {
                                                    echo substr(strip_tags($post['content']), 0, 150) . '...';
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                
            </main>
        </div>
    </div>
</body>
</html>
