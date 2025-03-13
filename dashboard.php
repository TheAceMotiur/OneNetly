<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to access dashboard', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Get user's blog posts - this should only show the posts for the current user
$userBlogs = $blog->getUserBlogs($currentUser['id'], 1, 10);

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
        <div class="w-64 bg-white border-r border-gray-200 text-gray-900">
            <div class="p-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold">OneNetly</h2>
            </div>
            <nav class="mt-6">
                <a href="index.php" class="flex items-center py-3 px-4 text-gray-700 hover:bg-gray-50">
                    <span class="mr-3">
                        <i class="fas fa-book-open"></i>
                    </span>
                    Home
                </a>
                <a href="reading-list.php" class="flex items-center py-3 px-4 text-gray-700 hover:bg-gray-50">
                    <span class="mr-3">
                        <i class="fas fa-bookmark"></i>
                    </span>
                    Reading List
                </a>
                <a href="ai-writer.php" class="flex items-center py-3 px-4 text-gray-700 hover:bg-gray-50">
                    <span class="mr-3">
                        <i class="fas fa-robot"></i>
                    </span>
                    AI Writer
                </a>
                <a href="create-post.php" class="flex items-center py-3 px-4 text-gray-700 hover:bg-gray-50">
                    <span class="mr-3">
                        <i class="fas fa-edit"></i>
                    </span>
                    Write a Story
                </a>
                <a href="settings.php" class="flex items-center py-3 px-4 text-gray-700 hover:bg-gray-50">
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
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-gray-900">Your Stories</h1>
                    <div class="flex items-center">
                        <a href="create-post.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none">
                            <i class="fas fa-plus mr-2"></i> New story
                        </a>
                    </div>
                </div>
            </header>
            
            <!-- Main content -->
            <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <?php echo displayMessage(); ?>
                
                <!-- Stats Summary -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Views -->
                    <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900 mb-1">Story Views</h2>
                        <p class="text-3xl font-bold text-gray-900">0</p>
                        <p class="text-sm text-gray-500 mt-2">Views in the last 30 days</p>
                    </div>
                    
                    <!-- Stories -->
                    <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900 mb-1">Stories</h2>
                        <p class="text-3xl font-bold text-gray-900"><?php echo count($userBlogs['blogs'] ?? []); ?></p>
                        <p class="text-sm text-gray-500 mt-2">Published and draft stories</p>
                    </div>
                    
                    <!-- Followers -->
                    <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                        <h2 class="text-lg font-medium text-gray-900 mb-1">Followers</h2>
                        <p class="text-3xl font-bold text-gray-900">0</p>
                        <p class="text-sm text-gray-500 mt-2">People following you</p>
                    </div>
                </div>
                
                <!-- Your Stories -->
                <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Your stories</h2>
                    </div>
                    
                    <?php if (empty($userBlogs['blogs'])): ?>
                        <div class="p-6 text-center py-12">
                            <div class="inline-flex items-center justify-center p-6 bg-gray-100 text-gray-600 rounded-full mb-4">
                                <i class="fas fa-feather-alt text-2xl"></i>
                            </div>
                            <p class="text-gray-800 font-medium text-lg">You haven't written any stories yet</p>
                            <p class="text-gray-600 mt-2 mb-4">Share your ideas with the world by creating your first story</p>
                            <a href="create-post.php" class="mt-2 inline-block px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-full font-medium transition">
                                Start Writing
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="divide-y divide-gray-200">
                            <?php foreach ($userBlogs['blogs'] as $post): ?>
                                <div class="p-6 hover:bg-gray-50 transition-colors">
                                    <div class="flex flex-col md:flex-row md:justify-between">
                                        <div>
                                            <h3 class="text-xl font-medium text-gray-900">
                                                <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="hover:underline">
                                                    <?php echo htmlspecialchars($post['title']); ?>
                                                </a>
                                            </h3>
                                            <div class="flex items-center mt-2 text-sm text-gray-500">
                                                <span class="flex items-center <?php echo $post['status'] === 'published' ? 'text-green-600' : 'text-yellow-600'; ?>">
                                                    <span class="w-2 h-2 rounded-full <?php echo $post['status'] === 'published' ? 'bg-green-600' : 'bg-yellow-600'; ?> mr-1"></span>
                                                    <?php echo ucfirst($post['status']); ?>
                                                </span>
                                                <span class="mx-2">·</span>
                                                <span><?php echo date('M d, Y', strtotime($post['created_at'])); ?></span>
                                            </div>
                                            <p class="mt-2 text-gray-600 line-clamp-2">
                                                <?php echo substr(strip_tags($post['content']), 0, 150) . '...'; ?>
                                            </p>
                                        </div>
                                        <div class="flex md:flex-col justify-end items-end mt-4 md:mt-0 space-x-3 md:space-x-0 md:space-y-2">
                                            <a href="edit-post.php?id=<?php echo $post['id']; ?>" class="px-3 py-1 border border-gray-300 rounded-full text-sm hover:bg-gray-100">
                                                Edit
                                            </a>
                                            <?php if ($post['status'] === 'draft'): ?>
                                                <form method="POST" action="publish.php" class="inline">
                                                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                                                    <button type="submit" class="px-3 py-1 border border-gray-300 rounded-full text-sm hover:bg-gray-100">
                                                        Publish
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                            <a href="delete-post.php?id=<?php echo $post['id']; ?>" class="px-3 py-1 border border-red-300 text-red-600 rounded-full text-sm hover:bg-red-50">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
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
