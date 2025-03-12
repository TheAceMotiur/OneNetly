<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to access dashboard', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Get user's blog posts
$userBlogs = $blog->getAllBlogs(1, 5, 'all');

// Get statistics for charts if user is admin
$isAdmin = $user->isAdmin();
$stats = [];
if ($isAdmin) {
    // Get view statistics for the past 7 days
    $stats['views'] = $blog->getViewsStats(7);
    $stats['commentCounts'] = $comment->isAvailable() ? $comment->getRecentCommentCounts(7) : [];
    $stats['totalViews'] = $blog->getTotalViews();
    $stats['popularPosts'] = $blog->getPopularPosts(5);
}
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo getThemeClass(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - OneNetly</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php echo getThemeStyles(); ?>
    <?php echo getThemeScript(); ?>
    <style>
        .stat-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
            transition: all 0.2s ease;
        }
    </style>
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
                
                <!-- Welcome Banner -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-500 rounded-lg shadow-lg mb-6 p-6 text-white">
                    <h2 class="text-2xl font-bold">Welcome back, <?php echo htmlspecialchars($currentUser['username']); ?>!</h2>
                    <p class="mt-2 opacity-90">Manage your content, track performance, and explore new features of OneNetly.</p>
                    <?php if (isset($currentUser['is_admin']) && $currentUser['is_admin']): ?>
                        <div class="mt-4">
                            <a href="create-post.php" class="inline-block px-4 py-2 bg-white text-indigo-700 font-semibold rounded-md hover:bg-indigo-50 transition">Create New Post</a>
                            <a href="admin/index.php" class="inline-block ml-2 px-4 py-2 bg-indigo-700 text-white font-semibold rounded-md hover:bg-indigo-800 transition">Admin Panel</a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Quick Navigation Cards -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <a href="settings.php" class="stat-card bg-white p-5 rounded-lg shadow text-center hover:bg-gray-50 transition">
                        <div class="inline-flex items-center justify-center p-3 bg-blue-100 text-blue-600 rounded-full mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700">Settings</h3>
                        <p class="text-sm text-gray-500 mt-1">Manage your profile</p>
                    </a>
                    
                    <a href="index.php" class="stat-card bg-white p-5 rounded-lg shadow text-center hover:bg-gray-50 transition">
                        <div class="inline-flex items-center justify-center p-3 bg-green-100 text-green-600 rounded-full mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-7-7v14"></path>
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700">Blog</h3>
                        <p class="text-sm text-gray-500 mt-1">View blog posts</p>
                    </a>
                    
                    <?php if (isset($currentUser['is_admin']) && $currentUser['is_admin']): ?>
                    <a href="create-post.php" class="stat-card bg-white p-5 rounded-lg shadow text-center hover:bg-gray-50 transition">
                        <div class="inline-flex items-center justify-center p-3 bg-purple-100 text-purple-600 rounded-full mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700">New Post</h3>
                        <p class="text-sm text-gray-500 mt-1">Create content</p>
                    </a>
                    
                    <a href="admin/categories.php" class="stat-card bg-white p-5 rounded-lg shadow text-center hover:bg-gray-50 transition">
                        <div class="inline-flex items-center justify-center p-3 bg-yellow-100 text-yellow-600 rounded-full mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700">Categories</h3>
                        <p class="text-sm text-gray-500 mt-1">Manage categories</p>
                    </a>
                    <?php else: ?>
                    <div class="stat-card bg-white p-5 rounded-lg shadow text-center">
                        <div class="inline-flex items-center justify-center p-3 bg-indigo-100 text-indigo-600 rounded-full mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700">Member Since</h3>
                        <p class="text-sm text-gray-500 mt-1"><?php echo date('M j, Y', strtotime($currentUser['created_at'])); ?></p>
                    </div>
                    
                    <div class="stat-card bg-white p-5 rounded-lg shadow text-center">
                        <div class="inline-flex items-center justify-center p-3 bg-red-100 text-red-600 rounded-full mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700">Comments</h3>
                        <p class="text-sm text-gray-500 mt-1">Engage with posts</p>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Account Info and Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <!-- Account Info Card -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                                <?php echo strtoupper(substr($currentUser['username'], 0, 1)); ?>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($currentUser['username']); ?></h2>
                                <p class="text-gray-500"><?php echo $currentUser['is_admin'] ? 'Administrator' : 'User'; ?></p>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4 mt-2">
                            <div class="flex items-center py-2">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-600"><?php echo htmlspecialchars($currentUser['email']); ?></span>
                            </div>
                            <div class="flex items-center py-2">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-600">Joined: <?php echo date('F j, Y', strtotime($currentUser['created_at'])); ?></span>
                            </div>
                        </div>
                        
                        <?php if (isset($currentUser['is_admin']) && $currentUser['is_admin']): ?>
                            <div class="mt-4">
                                <a href="admin/index.php" class="block px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-center rounded-md transition">
                                    Go to Admin Panel
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($isAdmin): ?>
                    <!-- Stats Card -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold text-gray-700 mb-4">Blog Statistics</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-blue-50 rounded-lg p-4">
                                <p class="text-blue-800 text-sm">Total Views</p>
                                <p class="text-2xl font-bold text-blue-800"><?php echo number_format($stats['totalViews']); ?></p>
                            </div>
                            <div class="bg-green-50 rounded-lg p-4">
                                <p class="text-green-800 text-sm">Blog Posts</p>
                                <p class="text-2xl font-bold text-green-800"><?php echo number_format($userBlogs['pagination']['total']); ?></p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <canvas id="viewsChart" height="100"></canvas>
                        </div>
                    </div>
                    
                    <!-- Popular Posts Card -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold text-gray-700 mb-4">Popular Content</h2>
                        <?php if (empty($stats['popularPosts'])): ?>
                            <p class="text-gray-500">No popular posts yet.</p>
                        <?php else: ?>
                            <ul class="space-y-3">
                                <?php foreach ($stats['popularPosts'] as $post): ?>
                                    <li class="border-b border-gray-100 pb-2 last:border-0 last:pb-0">
                                        <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                                <span class="text-gray-700 font-medium"><?php echo $post['view_count']; ?></span>
                                            </div>
                                            <div>
                                                <p class="text-gray-800 font-medium truncate"><?php echo htmlspecialchars($post['title']); ?></p>
                                                <p class="text-xs text-gray-500">Views: <?php echo number_format($post['view_count']); ?></p>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <?php else: ?>
                    <!-- Activity Card for non-admin users -->
                    <div class="md:col-span-2 bg-white rounded-lg shadow p-6">
                        <h2 class="text-lg font-semibold text-gray-700 mb-4">Recent Activity</h2>
                        <div class="flex flex-col space-y-4">
                            <div class="bg-blue-50 rounded-lg p-4 flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-blue-800 font-medium">Welcome to OneNetly!</p>
                                    <p class="text-sm text-blue-600">Explore our content and engage with our community.</p>
                                </div>
                            </div>
                            <div class="bg-green-50 rounded-lg p-4 flex items-center">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-green-800 font-medium">Join the Conversation</p>
                                    <p class="text-sm text-green-600">Comment on blog posts to share your thoughts.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- My Blog Posts -->
                <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
                    <?php if ($user->isAdmin()): ?>
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold text-gray-700">Blog Posts</h2>
                            <a href="create-post.php" class="text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded transition">New Post</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="divide-y divide-gray-200">
                        <?php if (empty($userBlogs['blogs'])): ?>
                            <div class="p-6 text-center">
                                <div class="inline-flex items-center justify-center p-6 bg-gray-100 text-gray-500 rounded-full mb-4">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-600">You haven't created any blog posts yet.</p>
                                <?php if ($user->isAdmin()): ?>
                                <a href="create-post.php" class="mt-4 inline-block px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition">
                                    Create Your First Post
                                </a>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <?php foreach ($userBlogs['blogs'] as $post): ?>
                                <?php if ($post['user_id'] == $currentUser['id']): ?>
                                    <div class="p-6 hover:bg-gray-50 transition-colors">
                                        <div class="flex justify-between">
                                            <div>
                                                <h3 class="text-xl font-medium text-gray-900">
                                                    <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="hover:text-indigo-600 transition">
                                                        <?php echo htmlspecialchars($post['title']); ?>
                                                    </a>
                                                </h3>
                                                <div class="flex items-center mt-2 text-sm text-gray-500">
                                                    <span class="flex items-center <?php echo $post['status'] === 'published' ? 'text-green-600' : 'text-yellow-600'; ?>">
                                                        <span class="w-2 h-2 rounded-full <?php echo $post['status'] === 'published' ? 'bg-green-600' : 'bg-yellow-600'; ?> mr-1"></span>
                                                        <?php echo ucfirst($post['status']); ?>
                                                    </span>
                                                    <span class="mx-2">•</span>
                                                    <span><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex space-x-2">
                                                    <a href="edit-post.php?id=<?php echo $post['id']; ?>" class="text-indigo-600 hover:text-indigo-900 flex items-center transition">
                                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                    <a href="delete-post.php?id=<?php echo $post['id']; ?>" class="text-red-600 hover:text-red-900 flex items-center transition" onclick="return confirm('Are you sure you want to delete this post?')">
                                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        Delete
                                                    </a>
                                                </div>
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
                                        <div class="mt-3 flex">
                                            <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="text-sm text-indigo-600 hover:text-indigo-800 transition">
                                                Read More →
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php displayHorizontalAd(); ?>
            </div>
        </div>
    </div>

    <?php if ($isAdmin && !empty($stats['views'])): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart for views
            const ctx = document.getElementById('viewsChart').getContext('2d');
            const viewsData = <?php echo json_encode(array_values($stats['views'])); ?>;
            const labels = <?php echo json_encode(array_keys($stats['views'])); ?>;
            
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Blog Views',
                        data: viewsData,
                        backgroundColor: 'rgba(79, 70, 229, 0.2)',
                        borderColor: 'rgba(79, 70, 229, 1)',
                        borderWidth: 2,
                        tension: 0.2,
                        pointBackgroundColor: 'rgba(79, 70, 229, 1)',
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    }
                }
            });
        });
    </script>
    <?php endif; ?>
</body>
</html>
