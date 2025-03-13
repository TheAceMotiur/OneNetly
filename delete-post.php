<?php
require_once 'includes/init.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to delete blog posts', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Remove admin-only restriction

// Get the post ID from GET parameters
$postId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Get the blog post
$blogPost = $blog->getBlogById($postId);

// Check if post exists
if (!$blogPost) {
    redirect('dashboard.php', 'Blog post not found', 'error');
}

// Check if user owns the post or is admin
if ($blogPost['user_id'] != $currentUser['id'] && !$user->isAdmin()) {
    redirect('dashboard.php', 'You do not have permission to delete this post', 'error');
}

// Process deletion if confirmed
if (isset($_POST['confirm_delete'])) {
    $result = $blog->deleteBlog($postId);
    
    if ($result['success']) {
        redirect('dashboard.php', 'Story deleted successfully', 'success');
    } else {
        redirect('dashboard.php', 'Failed to delete story: ' . $result['message'], 'error');
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo getThemeClass(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Story - OneNetly</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo getThemeStyles(); ?>
    <?php echo getThemeScript(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-white border-b border-gray-200 py-4 px-6">
            <div class="max-w-5xl mx-auto flex items-center">
                <a href="dashboard.php" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-arrow-left"></i> Back to dashboard
                </a>
            </div>
        </header>
        
        <main class="flex-grow flex items-center justify-center">
            <div class="max-w-md w-full mx-4">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h1 class="text-xl font-bold text-gray-900 flex items-center">
                            <i class="fas fa-trash-alt text-red-600 mr-2"></i> Delete Story
                        </h1>
                    </div>
                    
                    <div class="p-6">
                        <div class="mb-6">
                            <h2 class="text-lg font-medium text-gray-900 mb-2">
                                Are you sure you want to delete this story?
                            </h2>
                            <p class="text-gray-600 mb-4">
                                This action cannot be undone. This will permanently delete the story titled:
                            </p>
                            <div class="bg-gray-50 rounded p-4 mb-4 border-l-4 border-gray-300">
                                <p class="font-medium">"<?php echo htmlspecialchars($blogPost['title']); ?>"</p>
                                <p class="text-sm text-gray-500 mt-1">
                                    <?php echo ucfirst($blogPost['status']); ?> • 
                                    <?php echo date('F j, Y', strtotime($blogPost['created_at'])); ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex justify-end space-x-3">
                            <a href="dashboard.php" class="px-4 py-2 bg-gray-200 rounded-full text-gray-700 hover:bg-gray-300 transition">
                                Cancel
                            </a>
                            <form method="POST" action="">
                                <button type="submit" name="confirm_delete" class="px-4 py-2 bg-red-600 text-white rounded-full hover:bg-red-700 transition">
                                    Delete Story
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
