<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';

// Get slug from URL
$slug = $_GET['slug'] ?? '';

// Redirect to home if no slug provided
if (empty($slug)) {
    header('Location: index.php');
    exit;
}

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Get blog post by slug
$blogPost = $blog->getBlogBySlug($slug);

// If post not found or not published (unless user is author or admin)
if (empty($blogPost) || ($blogPost['status'] !== 'published' && 
    (!$user->isLoggedIn() || 
    ($currentUser['id'] !== $blogPost['user_id'] && !$user->isAdmin())))) {
    header('Location: index.php');
    exit;
}

// Track post view
$blog->trackPostView($blogPost['id']);

// Get categories for this post
$blogCategories = $blog->getCategoriesForPost($blogPost['id']);

// Get post author
$postAuthor = $user->getUserById($blogPost['user_id']);

// Get related posts
$relatedPosts = $blog->getRelatedPosts($blogPost['id'], 4);

// Get trending posts for sidebar
$trendingPosts = $blog->getTrendingPosts(5);

// Get all categories for sidebar
$categories = $category->getAllCategories();

// Set up breadcrumbs
$breadcrumbs = [
    $blogPost['title'] => ''
];

// If post has categories, add first one to breadcrumb
if (!empty($blogCategories)) {
    $primaryCategory = $blogCategories[0];
    $breadcrumbs = [
        $primaryCategory['name'] => 'category.php?slug=' . $primaryCategory['slug'] 
    ] + $breadcrumbs; // Add at the beginning
}

// SEO Optimization
$canonicalUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$slug";

// Set SEO meta tags
$seo->setTitle($blogPost['title'])
    ->setDescription(!empty($blogPost['excerpt']) ? $blogPost['excerpt'] : substr(strip_tags($blogPost['content']), 0, 160))
    ->setCanonicalUrl($canonicalUrl)
    ->setOgType('article')
    ->setAuthor($postAuthor['username'] ?? 'OneNetly');

// Add keywords from tags and categories
$keywords = [];
if (!empty($blogPost['tags'])) {
    $tags = explode(',', $blogPost['tags']);
    foreach ($tags as $tag) {
        $keywords[] = trim($tag);
    }
}
foreach ($blogCategories as $cat) {
    $keywords[] = $cat['name'];
}
if (!empty($keywords)) {
    $seo->setKeywords($keywords);
}

// Set OG image if post has featured image
if (!empty($blogPost['featured_image'])) {
    $seo->setOgImage($blogPost['featured_image']);
} else {
    $seo->setDefaultOgImage();
}

// Add article-specific meta tags
$seo->addArticleTags($blogPost);

// Generate structured data for the blog post
$seo->generateBlogPostSchema($blogPost);

// Generate breadcrumb schema markup
$seo->generateBreadcrumbSchema($breadcrumbs);

// Check if comments are available
$commentsAvailable = $comment->isAvailable();

// Get comments for this post if comments are available
$commentsList = [];
if ($commentsAvailable) {
    $commentsList = $comment->getApprovedCommentsForPost($blogPost['id']);
}

// Set page title (for backward compatibility)
$pageTitle = $blogPost['title'];

// Process comment submission
$commentError = '';
$commentSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_content']) && $commentsAvailable && $user->isLoggedIn()) {
    $commentContent = trim($_POST['comment_content']);
    
    if (empty($commentContent)) {
        $commentError = "Comment cannot be empty";
    } else {
        $result = $comment->addComment([
            'post_id' => $blogPost['id'],
            'user_id' => $currentUser['id'],
            'content' => $commentContent
        ]);
        
        if ($result) {
            $commentSuccess = true;
            // Redirect to prevent form resubmission
            header("Location: $slug?comment_success=1#comments");
            exit;
        } else {
            $commentError = "Failed to post comment. Please try again.";
        }
    }
}

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
                
                <div class="flex items-center text-gray-600 mb-6">
                    
                    <div class="flex items-center mr-4">
                        <i class="far fa-calendar-alt mr-1"></i>
                        <span><?php echo date('F j, Y', strtotime($blogPost['created_at'])); ?></span>
                    </div>
                    
                    <?php if (!empty($blogCategories)): ?>
                        <div class="flex items-center flex-wrap">
                            <i class="fas fa-folder mr-1"></i>
                            <span>
                                <?php foreach ($blogCategories as $index => $cat): ?>
                                    <a href="category.php?slug=<?php echo htmlspecialchars($cat['slug']); ?>" class="text-indigo-600 hover:text-indigo-800">
                                        <?php echo htmlspecialchars($cat['name']); ?>
                                    </a>
                                    <?php if ($index < count($blogCategories) - 1) echo ', '; ?>
                                <?php endforeach; ?>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
                
                <?php if (!empty($blogPost['demo_link'])): ?>
                <div class="mb-6 flex justify-center">
                    <a href="<?php echo htmlspecialchars($blogPost['demo_link']); ?>" 
                       target="_blank" rel="noopener noreferrer" 
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded transition">
                        <i class="fas fa-external-link-alt mr-2"></i> View Demo
                    </a>
                </div>
                <?php endif; ?>
                
                <div class="prose max-w-none">
                    <?php 
                    // Split content to insert ad in the middle
                    $content = $blogPost['content'];
                    $splitContent = explode('</p>', $content, 3);
                    
                    if (count($splitContent) > 2) {
                        echo $splitContent[0] . '</p>' . $splitContent[1] . '</p>';
                        displayInArticleAd();
                        echo $splitContent[2];
                    } else {
                        echo $content;
                    }
                    ?>
                </div>
                
                <?php if (!empty($blogPost['download_link'])): ?>
                <!-- Download Button -->
                <div class="mt-8 border-t pt-6 flex justify-center">
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
                
                <?php if (!empty($blogPost['tags'])): ?>
                <div class="mt-6 pt-4 border-t border-gray-100">
                    <div class="flex flex-wrap items-center">
                        <span class="mr-2 text-gray-700"><i class="fas fa-tags mr-1"></i> Tags:</span>
                        <?php 
                        $tags = explode(',', $blogPost['tags']);
                        foreach ($tags as $tag): 
                            $tag = trim($tag);
                            if (empty($tag)) continue;
                        ?>
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 text-xs rounded mr-2 mb-2">
                                <?php echo htmlspecialchars($tag); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </article>
        
        <!-- Ad after article -->
        <?php displayHorizontalAd(); ?>
        
        <!-- Related Posts -->
        <?php if (!empty($relatedPosts)): ?>
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200">Related Posts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                <?php foreach ($relatedPosts as $post): ?>
                <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="flex items-start hover:bg-gray-50 p-2 rounded transition">
                    <?php if (!empty($post['featured_image'])): ?>
                        <div class="w-16 h-16 rounded overflow-hidden flex-shrink-0 mr-3">
                            <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-full object-cover">
                        </div>
                    <?php endif; ?>
                    <div>
                        <h3 class="font-medium text-indigo-700"><?php echo htmlspecialchars($post['title']); ?></h3>
                        <p class="text-xs text-gray-500 mt-1 flex items-center">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <?php echo date('M j, Y', strtotime($post['created_at'])); ?>
                        </p>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        
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
                                    <div class="text-gray-700 whitespace-pre-line comment-content">
                                        <?php 
                                        // Display comment content - already filtered for bad words during submission
                                        // nl2br for line breaks, links already have nofollow added during submission
                                        echo nl2br($commentItem['content']); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        
    </div>
    
    <!-- Sidebar -->
    <div class="w-full lg:w-1/4 mt-8 lg:mt-0">
        <!-- Sidebar Ad Unit -->
        <?php displaySidebarAd(); ?>

        <!-- Trending Now Widget -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200 flex items-center">
                <i class="fas fa-fire text-orange-500 mr-2"></i> Trending Now
            </h2>
            <?php if (empty($trendingPosts)): ?>
                <p>No trending posts yet.</p>
            <?php else: ?>
                <ul class="space-y-4">
                    <?php foreach ($trendingPosts as $post): ?>
                        <li class="border-b border-gray-100 pb-3 last:border-0 last:pb-0">
                            <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="block hover:bg-gray-50 transition-all rounded p-2">
                                <div class="flex items-center">
                                    <?php if (!empty($post['featured_image'])): ?>
                                        <div class="w-16 h-16 mr-3 flex-shrink-0 overflow-hidden rounded">
                                            <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-full object-cover">
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <h3 class="text-sm font-medium text-indigo-700"><?php echo htmlspecialchars($post['title']); ?></h3>
                                        <p class="text-xs text-gray-500 mt-1 flex items-center">
                                            <i class="far fa-calendar-alt mr-1"></i>
                                            <?php echo date('M j, Y', strtotime($post['created_at'])); ?>
                                        </p>
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
            <h2 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200 flex items-center">
                <i class="fas fa-folder mr-2 text-indigo-500"></i> Categories
            </h2>
            <?php if (empty($categories)): ?>
                <p>No categories found.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($categories as $cat): ?>
                        <li class="mb-2">
                            <a href="category.php?slug=<?php echo htmlspecialchars($cat['slug']); ?>" 
                               class="text-indigo-600 hover:text-indigo-800 flex items-center justify-between p-2 hover:bg-indigo-50 rounded transition">
                                <span><?php echo htmlspecialchars($cat['name']); ?></span>
                                <i class="fas fa-chevron-right text-indigo-400"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        
        <!-- Second Sidebar Ad Unit -->
        <?php displaySidebarAd(); ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
