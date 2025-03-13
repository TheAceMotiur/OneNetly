<?php
require_once 'includes/init.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to publish posts', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Remove admin-only restriction

// Get the post ID from POST data
$postId = isset($_POST['post_id']) ? (int)$_POST['post_id'] : 0;

// Get the blog post
$blogPost = $blog->getBlogById($postId);

// Check if post exists
if (!$blogPost) {
    redirect('dashboard.php', 'Blog post not found', 'error');
}

// Check if user owns the post or is admin
if ($blogPost['user_id'] != $currentUser['id'] && !$user->isAdmin()) {
    redirect('dashboard.php', 'You do not have permission to publish this post', 'error');
}

// Check if post is already published
if ($blogPost['status'] === 'published') {
    redirect('dashboard.php', 'Post is already published', 'info');
}

// Update post status to published
$result = $blog->updateBlog($postId, ['status' => 'published']);

if ($result['success']) {
    redirect('dashboard.php', 'Story published successfully', 'success');
} else {
    redirect('dashboard.php', 'Failed to publish story: ' . $result['message'], 'error');
}
?>
