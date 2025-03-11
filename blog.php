<?php
require_once 'includes/init.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Get blog post slug from URL
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';

if (empty($slug)) {
    redirect('index.php', 'Blog post not found', 'error');
}

// Get blog post by slug
$blogPost = $blog->getBlogBySlug($slug);

if (!$blogPost || $blogPost['status'] !== 'published') {
    redirect('index.php', 'Blog post not found or not published', 'error');
}

// Record view for this blog post
$blog->recordView($blogPost['id']);

// Get blog post categories
$blogCategories = $blog->getBlogCategories($blogPost['id']);

// Get category IDs for related posts
$categoryIds = array_map(function($cat) { return $cat['id']; }, $blogCategories);

// Get related posts based on shared categories
$relatedPosts = $blog->getRelatedPosts($blogPost['id'], $categoryIds, 3);

// Get all categories for sidebar
$categories = $category->getAllCategories();

// Get trending posts for sidebar
$trendingPosts = $blog->getTrendingPosts(5);

// Check if comments feature is available
$commentsAvailable = $comment->isAvailable();

// Get comments for this blog post
$commentsList = $commentsAvailable ? $comment->getCommentsByBlog($blogPost['id'], 'approved') : [];

// Handle comment submission
$commentError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    if (!$commentsAvailable) {
        $commentError = 'Comments feature is not available yet.';
    } elseif (!$user->isLoggedIn()) {
        redirect('login.php', 'Please login to post comments', 'error');
    } else {
        $content = trim($_POST['comment_content'] ?? '');
        
        if (empty($content)) {
            $commentError = 'Comment content is required';
        } else {
            $commentData = [
                'blog_id' => $blogPost['id'],
                'user_id' => $currentUser['id'],
                'content' => $content,
                'is_admin' => $currentUser['is_admin'] ?? false
            ];
            
            $result = $comment->addComment($commentData);
            
            if ($result['success']) {
                // If the comment was approved immediately (admin), we can refresh to show it
                if (isset($result['status']) && $result['status'] === 'approved') {
                    redirect($blogPost['slug'], $result['message'], 'success');
                } else {
                    // Just add a message that the comment is pending approval
                    $_SESSION['message'] = $result['message'];
                    $_SESSION['message_type'] = 'info';
                }
            } else {
                $commentError = $result['message'];
            }
        }
    }
}

// Set page title
$pageTitle = $blogPost['title'];

// Include header
require_once 'includes/header.php';
?>
        
<div class="flex flex-wrap">
    <!-- Main Content -->
    <div class="w-full lg:w-3/4 pr-0 lg:pr-8">
        <article class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <?php if (!empty($blogPost['featured_image'])): ?>
                <div class="w-full h-80 overflow-hidden">
                    <img src="<?php echo htmlspecialchars($blogPost['featured_image']); ?>" alt="<?php echo htmlspecialchars($blogPost['title']); ?>" class="w-full h-full object-cover">
                </div>
            <?php endif; ?>
            
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-4">
                    <?php echo htmlspecialchars($blogPost['title']); ?>
                </h1>
                
                <div class="text-gray-500 mb-6">
                    <span>By <?php echo htmlspecialchars($blogPost['username']); ?></span>
                    <span class="mx-2">•</span>
                    <span><?php echo date('F j, Y', strtotime($blogPost['created_at'])); ?></span>
                    
                    <?php if (!empty($blogCategories)): ?>
                        <span class="mx-2">•</span>
                        <span>
                            <?php foreach ($blogCategories as $index => $cat): ?>
                                <a href="category.php?slug=<?php echo htmlspecialchars($cat['slug']); ?>" class="text-indigo-600 hover:text-indigo-800">
                                    <?php echo htmlspecialchars($cat['name']); ?>
                                </a>
                                <?php if ($index < count($blogCategories) - 1) echo ', '; ?>
                            <?php endforeach; ?>
                        </span>
                    <?php endif; ?>
                </div>
                
                <?php if (!empty($blogPost['demo_link'])): ?>
                <div class="mb-6">
                    <a href="<?php echo htmlspecialchars($blogPost['demo_link']); ?>" 
                       target="_blank" rel="noopener noreferrer" 
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                        View Demo
                    </a>
                </div>
                <?php endif; ?>
                
                <div class="prose max-w-none">
                    <?php echo $blogPost['content']; ?>
                </div>
                
                <?php if (!empty($blogPost['download_link'])): ?>
                <!-- Download Button -->
                <div class="mt-8 border-t pt-6">
                    <a href="<?php echo htmlspecialchars($blogPost['download_link']); ?>" 
                       class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg transition font-bold"
                       target="_blank">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Download Now
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </article>
        
        <!-- Comments Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Comments <?php if ($commentsAvailable): ?>(<?php echo count($commentsList); ?>)<?php endif; ?></h2>
            
            <?php if (!$commentsAvailable): ?>
                <p class="text-gray-600 mb-4">Comments feature is coming soon.</p>
            <?php else: ?>
                <!-- Comment Form -->
                <?php if ($user->isLoggedIn()): ?>
                    <div class="mb-6 border-b pb-6">
                        <h3 class="text-lg font-semibold mb-2">Leave a Comment</h3>
                        <?php if (!empty($commentError)): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                <?php echo htmlspecialchars($commentError); ?>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST" action="">
                            <div class="mb-4">
                                <label for="comment_content" class="block text-gray-700 text-sm font-bold mb-2">Your Comment</label>
                                <textarea id="comment_content" name="comment_content" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><?php echo htmlspecialchars($_POST['comment_content'] ?? ''); ?></textarea>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" name="submit_comment" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Post Comment
                                </button>
                            </div>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="mb-6 border-b pb-6">
                        <p>Please <a href="login.php" class="text-indigo-600 hover:text-indigo-800">login</a> to post a comment.</p>
                    </div>
                <?php endif; ?>
                
                <!-- Comments List -->
                <?php if (empty($commentsList)): ?>
                    <p class="text-gray-600">No comments yet. Be the first to comment!</p>
                <?php else: ?>
                    <div class="space-y-6">
                        <?php foreach ($commentsList as $commentItem): ?>
                            <div class="flex space-x-4 pb-4 border-b last:border-0">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-semibold">
                                        <?php echo strtoupper(substr($commentItem['username'], 0, 1)); ?>
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <div class="flex justify-between items-center mb-1">
                                        <div class="font-medium text-gray-800">
                                            <?php echo htmlspecialchars($commentItem['username']); ?>
                                            <?php if (isset($commentItem['user_id']) && isset($blogPost['user_id']) && $commentItem['user_id'] === $blogPost['user_id']): ?>
                                                <span class="ml-2 text-xs bg-blue-100 text-blue-800 px-2 py-0.5 rounded">Author</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            <?php echo date('F j, Y \a\t g:i a', strtotime($commentItem['created_at'])); ?>
                                        </div>
                                    </div>
                                    <div class="text-gray-700 whitespace-pre-line">
                                        <?php echo nl2br(htmlspecialchars($commentItem['content'])); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        
        <div class="my-6">
            <a href="index.php" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                Back to Blog
            </a>
        </div>
    </div>
    
    <!-- Sidebar -->
    <div class="w-full lg:w-1/4 mt-8 lg:mt-0">
        <!-- Trending Now Widget -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Trending Now</h2>
            <?php if (empty($trendingPosts)): ?>
                <p>No trending posts yet.</p>
            <?php else: ?>
                <ul class="space-y-4">
                    <?php foreach ($trendingPosts as $post): ?>
                        <li class="border-b border-gray-100 pb-3 last:border-0 last:pb-0">
                            <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="block hover:bg-gray-50 transition-all rounded">
                                <div class="flex items-center">
                                    <?php if (!empty($post['featured_image'])): ?>
                                        <div class="w-16 h-16 mr-3 flex-shrink-0 overflow-hidden rounded">
                                            <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-full object-cover">
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <h3 class="text-sm font-medium text-indigo-700"><?php echo htmlspecialchars($post['title']); ?></h3>
                                        <p class="text-xs text-gray-500 mt-1"><?php echo date('M j, Y', strtotime($post['created_at'])); ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        
        <!-- Categories Widget -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Categories</h2>
            <?php if (empty($categories)): ?>
                <p>No categories found.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($categories as $cat): ?>
                        <li class="mb-2">
                            <a href="category.php?slug=<?php echo htmlspecialchars($cat['slug']); ?>" class="text-indigo-600 hover:text-indigo-800">
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        
        <!-- About Widget -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">About OneNetly</h2>
            <p class="text-gray-700">
                OneNetly is a simple blog platform that allows users to read articles and engage with content created by our administrators.
            </p>
            <?php if (!$user->isLoggedIn()): ?>
                <div class="mt-4">
                    <a href="login.php" class="text-indigo-600 hover:text-indigo-800">Login</a> or 
                    <a href="register.php" class="text-indigo-600 hover:text-indigo-800">Register</a> 
                    to access your account.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
