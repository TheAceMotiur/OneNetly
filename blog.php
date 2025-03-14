<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';
require_once 'includes/sidebar-components.php';

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

// Track tag views if user is logged in
if ($user->isLoggedIn() && !empty($blogPost['tags'])) {
    $blog->trackTagView($currentUser['id'], $blogPost['tags']);
}

// Get categories for this post
$blogCategories = $blog->getCategoriesForPost($blogPost['id']);

// Get the primary category (first one)
$primaryCategory = null;

// Get post author
$postAuthor = $user->getUserById($blogPost['user_id']);

// Get related posts
$relatedPosts = $blog->getRelatedPosts($blogPost['id'], 4);

// Get trending posts for sidebar
$trendingPosts = $blog->getTrendingPosts(5);

// Get all categories for sidebar
$categories = $category->getAllCategories();

// Check if this post is in user's reading list
$isInReadingList = false;
if ($user->isLoggedIn()) {
    $isInReadingList = $blog->isInReadingList($currentUser['id'], $blogPost['id']);
}

// Process reading list actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $user->isLoggedIn()) {
    if (isset($_POST['add_to_reading_list'])) {
        $blog->addToReadingList($currentUser['id'], $blogPost['id']);
        $isInReadingList = true;
        // Use a JavaScript redirect to stay on the same page
        echo '<script>window.location.href = "' . $slug . '?reading_list=added#top";</script>';
        exit;
    } elseif (isset($_POST['remove_from_reading_list'])) {
        $blog->removeFromReadingList($currentUser['id'], $blogPost['id']);
        $isInReadingList = false;
        // Use a JavaScript redirect to stay on the same page
        echo '<script>window.location.href = "' . $slug . '?reading_list=removed#top";</script>';
        exit;
    }
}

// Reading list notification
$readingListNotification = '';
if (isset($_GET['reading_list'])) {
    if ($_GET['reading_list'] === 'added') {
        $readingListNotification = 'Story added to your reading list';
    } elseif ($_GET['reading_list'] === 'removed') {
        $readingListNotification = 'Story removed from your reading list';
    }
}

// Adjust breadcrumbs without categories
$breadcrumbs = [
    'Home' => 'index.php',
    $blogPost['title'] => ''
];

// SEO Optimization
$canonicalUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$slug";

// Set SEO meta tags
$seo->setTitle($blogPost['title'])
    ->setDescription(!empty($blogPost['excerpt']) ? $blogPost['excerpt'] : substr(strip_tags($blogPost['content']), 0, 160))
    ->setCanonicalUrl($canonicalUrl)
    ->setOgType('article')
    ->setAuthor($postAuthor['username'] ?? 'OneNetly');

// Add keywords from tags only since categories are removed
$keywords = [];
if (!empty($blogPost['tags'])) {
    $tags = explode(',', $blogPost['tags']);
    foreach ($tags as $tag) {
        $keywords[] = trim($tag);
    }
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

// Check if user is following the author
$isFollowing = false;
$followerCount = $user->countFollowers($blogPost['user_id']);

if ($user->isLoggedIn() && $currentUser['id'] != $blogPost['user_id']) {
    $isFollowing = $user->isFollowing($currentUser['id'], $blogPost['user_id']);
}

// Include header
require_once 'includes/header.php';
?>

<?php if (!empty($readingListNotification)): ?>
<div class="bg-green-50 border-l-4 border-green-500 p-4 mb-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <i class="fas fa-check text-green-500"></i>
        </div>
        <div class="ml-3">
            <p class="text-sm text-green-700"><?php echo $readingListNotification; ?></p>
        </div>
    </div>
</div>
<?php endif; ?>
        
<div class="max-w-4xl mx-auto px-4 py-8" id="top">
    <article class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
        <div class="p-6 md:p-8">
            <!-- Article Header Section -->
            <h1 class="text-3xl md:text-4xl font-bold mb-4 leading-tight">
                <?php echo htmlspecialchars($blogPost['title']); ?>
            </h1>
            
            <div class="flex items-center mb-6 pb-6 border-b">
                <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden mr-4">
                    <div class="w-full h-full flex items-center justify-center text-gray-600 font-semibold">
                        <?php echo strtoupper(substr($postAuthor['username'] ?? 'A', 0, 1)); ?>
                    </div>
                </div>
                <div>
                    <div class="flex items-center">
                        <h3 class="font-medium text-gray-900"><?php echo htmlspecialchars($postAuthor['username'] ?? 'Anonymous'); ?></h3>
                        <?php if ($user->isLoggedIn() && $currentUser['id'] != $postAuthor['id']): ?>
                            <button class="follow-btn ml-2 px-3 py-1 text-sm <?php echo $isFollowing ? 'bg-gray-100 text-gray-600' : 'bg-gray-100 text-green-600'; ?> rounded-full hover:<?php echo $isFollowing ? 'bg-gray-200' : 'bg-green-50 hover:text-green-700'; ?>"
                                    data-user-id="<?php echo $postAuthor['id']; ?>"
                                    data-action="<?php echo $isFollowing ? 'unfollow' : 'follow'; ?>">
                                <?php echo $isFollowing ? 'Following' : 'Follow'; ?>
                            </button>
                        <?php elseif (!$user->isLoggedIn()): ?>
                            <a href="login.php" class="ml-2 px-3 py-1 text-sm bg-gray-100 text-green-600 rounded-full hover:bg-green-50 hover:text-green-700">Follow</a>
                        <?php endif; ?>
                    </div>
                    <div class="flex items-center text-sm text-gray-500 mt-1">
                        <span class="follower-count"><?php echo $followerCount; ?></span> Followers
                        <span class="mx-2">·</span>
                        <span><?php echo date('M d, Y', strtotime($blogPost['created_at'])); ?></span>
                        <span class="mx-2">·</span>
                        <span><?php echo ceil(str_word_count(strip_tags($blogPost['content'])) / 200); ?> min read</span>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center justify-between mb-6">
                <div class="flex space-x-4">
                    <button class="flex items-center text-gray-500 hover:text-red-600">
                        <i class="far fa-heart mr-2"></i> <span>Like</span>
                    </button>
                    <a href="#comments" class="flex items-center text-gray-500 hover:text-gray-900">
                        <i class="far fa-comment mr-2"></i> <span>Comment</span>
                    </a>
                </div>
                <div class="flex space-x-4">
                    <?php if ($user->isLoggedIn()): ?>
                        <form method="POST" action="">
                            <input type="hidden" name="blog_id" value="<?php echo $blogPost['id']; ?>">
                            <?php if (!$isInReadingList): ?>
                                <button type="submit" name="add_to_reading_list" class="text-gray-500 hover:text-gray-900 flex items-center">
                                    <i class="far fa-bookmark mr-1"></i> Save
                                </button>
                            <?php else: ?>
                                <button type="submit" name="remove_from_reading_list" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                                    <i class="fas fa-bookmark mr-1"></i> Saved
                                </button>
                            <?php endif; ?>
                        </form>
                    <?php else: ?>
                        <a href="login.php" class="text-gray-500 hover:text-gray-900 flex items-center">
                            <i class="far fa-bookmark mr-1"></i> Save
                        </a>
                    <?php endif; ?>
                    <button class="text-gray-500 hover:text-gray-900">
                        <i class="fas fa-share-alt"></i>
                    </button>
                </div>
            </div>
            
            <?php if (!empty($blogPost['featured_image'])): ?>
                <div class="w-full h-96 overflow-hidden mb-8 rounded">
                    <img src="<?php echo htmlspecialchars($blogPost['featured_image']); ?>" alt="<?php echo htmlspecialchars($blogPost['title']); ?>" class="w-full h-full object-cover">
                </div>
            <?php endif; ?>
            
            <!-- Main Content - Medium-like Styling for Quill Content -->
            <div class="quill-content">
                <?php 
                // Add first-letter class to the first paragraph for dropcap effect
                $content = $blogPost['content'];
                // Check if the first element is a paragraph and add the first-letter class
                $content = preg_replace('/<p>(.*?)<\/p>/', '<p class="first-letter">$1</p>', $content, 1);
                echo $content;
                ?>
            </div>
            
            <?php if (!empty($blogPost['tags'])): ?>
                <div class="flex flex-wrap gap-2 mb-8 mt-8 pt-6 border-t">
                    <?php foreach (explode(',', $blogPost['tags']) as $tag): ?>
                        <?php $tag = trim($tag); ?>
                        <?php if (!empty($tag)): ?>
                            <a href="search.php?q=<?php echo urlencode($tag); ?>" class="bg-gray-100 text-gray-800 px-3 py-1 text-sm rounded-full hover:bg-gray-200">
                                <?php echo htmlspecialchars($tag); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <div class="border-t border-b py-6 my-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gray-300 overflow-hidden mr-4">
                            <div class="w-full h-full flex items-center justify-center text-gray-600 font-semibold">
                                <?php echo strtoupper(substr($postAuthor['username'] ?? 'A', 0, 1)); ?>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900">Written by <?php echo htmlspecialchars($postAuthor['username'] ?? 'Anonymous'); ?></h3>
                            <p class="text-sm text-gray-500 mt-1">
                                <?php echo $postAuthor['bio'] ?? 'Author at OneNetly'; ?>
                            </p>
                        </div>
                    </div>
                    <button class="follow-btn px-4 py-2 <?php echo $isFollowing ? 'bg-gray-200 text-gray-700' : 'bg-green-600 text-white'; ?> rounded-full hover:<?php echo $isFollowing ? 'bg-gray-300' : 'bg-green-700'; ?>"
                            data-user-id="<?php echo $postAuthor['id']; ?>"
                            data-action="<?php echo $isFollowing ? 'unfollow' : 'follow'; ?>">
                        <?php echo $isFollowing ? 'Following' : 'Follow'; ?>
                    </button>
                </div>
            </div>
        </div>
    </article>
    
    <!-- Related Posts -->
    <?php if (!empty($relatedPosts)): ?>
    <div class="my-12">
        <h2 class="text-xl font-bold mb-6 text-gray-800">More from OneNetly</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($relatedPosts as $post): ?>
                <div class="bg-white rounded-lg overflow-hidden border border-gray-200 transform hover:-translate-y-1 transition-all duration-300">
                    <?php if (!empty($post['featured_image'])): ?>
                        <div class="w-full h-40 overflow-hidden">
                            <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" 
                                alt="<?php echo htmlspecialchars($post['title']); ?>" 
                                class="w-full h-full object-cover">
                        </div>
                    <?php endif; ?>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="w-6 h-6 rounded-full bg-gray-300 flex-shrink-0 flex items-center justify-center text-gray-600 font-semibold mr-2">
                                <?php 
                                $author = $user->getUserById($post['user_id']); 
                                echo substr($author['username'] ?? 'A', 0, 1);
                                ?>
                            </div>
                            <span class="text-xs font-medium"><?php echo htmlspecialchars($author['username'] ?? 'Anonymous'); ?></span>
                        </div>
                        <h3 class="text-lg font-bold mb-2 line-clamp-2">
                            <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="text-gray-900 hover:text-gray-700 transition">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </a>
                        </h3>
                        <p class="text-gray-500 text-sm mb-2">
                            <?php echo date('M d', strtotime($post['created_at'])); ?> · 
                            <?php echo ceil(str_word_count(strip_tags($post['content'])) / 200); ?> min read
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Add sidebar components after related posts section -->
    <div class="my-12">
        <!-- Who to Follow -->
        <?php displayWhoToFollow(); ?>
        
        <!-- Recommended Topics -->
        <?php displayRecommendedTopics(); ?>
    </div>
    
    <!-- Comments Section -->
    <div id="comments" class="my-12">
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
</div>

<script>
// Follow/Unfollow functionality
document.addEventListener('DOMContentLoaded', function() {
    // Get all follow buttons
    const followButtons = document.querySelectorAll('.follow-btn');
    
    // Add click event listener to each button
    followButtons.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.getAttribute('data-user-id');
            const action = this.getAttribute('data-action');
            
            // Send AJAX request
            fetch('follow.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: `action=${action}&user_id=${userId}&referrer=${window.location.href}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update button text and styles
                    if (data.isFollowing) {
                        this.textContent = 'Following';
                        this.classList.remove('bg-green-600', 'text-white', 'hover:bg-green-700');
                        this.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                        this.setAttribute('data-action', 'unfollow');
                    } else {
                        this.textContent = 'Follow';
                        this.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                        this.classList.add('bg-green-600', 'text-white', 'hover:bg-green-700');
                        this.setAttribute('data-action', 'follow');
                    }
                    
                    // Update follower count if present on page
                    const followerCountElement = document.querySelector('.follower-count');
                    if (followerCountElement) {
                        followerCountElement.textContent = data.followerCount;
                    }
                } else {
                    console.error('Error:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
</script>

<?php require_once 'includes/footer.php'; ?>
