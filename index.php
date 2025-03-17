<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';
require_once 'includes/sidebar-components.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Get current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page); // Ensure page is at least 1

// Get blog posts with pagination
if ($user->isLoggedIn()) {
    $result = $blog->getPersonalizedFeed($currentUser['id'], $page, 12);
} else {
    $result = $blog->getAllBlogs($page, 12);
}
$blogs = $result['blogs'];
$pagination = $result['pagination'];

// Get featured post (latest post)
$featuredPost = null;
if (!empty($blogs)) {
    $featuredPost = $blogs[0];
    $blogs = array_slice($blogs, 1); // Remove the featured post from the regular posts
}

// Get trending posts for sidebar
$trendingPosts = $blog->getTrendingPosts(5);


// Process reading list actions
if ($user->isLoggedIn() && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $blogId = isset($_POST['blog_id']) ? (int)$_POST['blog_id'] : 0;
    
    // Check if blog exists
    $blogExists = $blog->getBlogById($blogId);
    if (!$blogExists) {
        $_SESSION['message'] = "Blog post not found.";
        $_SESSION['message_type'] = 'error';
        redirect('index.php');
    }
    
    // Add or remove from reading list
    if (isset($_POST['add_to_reading_list'])) {
        $blog->addToReadingList($currentUser['id'], $blogId);
    } elseif (isset($_POST['remove_from_reading_list'])) {
        $blog->removeFromReadingList($currentUser['id'], $blogId);
    }
    
    // Redirect to prevent form resubmission
    redirect('index.php');
}

// Check if featured post is in reading list
$featuredInReadingList = false;
if ($user->isLoggedIn() && $featuredPost) {
    $featuredInReadingList = $blog->isInReadingList($currentUser['id'], $featuredPost['id']);
}

// Set SEO meta tags
$seo->setTitle('OneNetly | Find and Share Knowledge')
    ->setDescription('Discover interesting stories, articles, and knowledge from our community of writers.')
    ->setKeywords(['blog', 'articles', 'writing', 'knowledge'])
    ->setOgType('website')
    ->setDefaultOgImage()
    ->setCanonicalUrl((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/index.php" . ($page > 1 ? "?page=$page" : ""));

// Set page title (for backward compatibility)
$pageTitle = "OneNetly | Home";

// Include header
require_once 'includes/header.php';
?>
        
<!-- Hero Section -->
<div class="bg-indigo-700 text-white py-12 mb-8">
    <!-- ...existing code... -->
</div>

<div class="flex flex-wrap">
    <!-- Main Content -->
    <div class="w-full lg:w-2/3 pr-0 lg:pr-8">
        <?php if ($featuredPost): ?>
            <!-- Featured Post -->
            <div class="mb-10">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <?php if (!empty($featuredPost['featured_image'])): ?>
                        <div class="w-full h-80 overflow-hidden relative">
                            <img src="<?php echo htmlspecialchars($featuredPost['featured_image']); ?>" 
                                 alt="<?php echo htmlspecialchars($featuredPost['title']); ?>" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-6 text-white">
                                <h2 class="text-3xl font-bold mb-2 leading-tight">
                                    <a href="<?php echo htmlspecialchars($featuredPost['slug']); ?>" class="hover:underline">
                                        <?php echo htmlspecialchars($featuredPost['title']); ?>
                                    </a>
                                </h2>
                                <!-- Author info -->
                                <div class="flex items-center mb-2">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-semibold">
                                            <?php echo strtoupper(substr($author['username'] ?? 'A', 0, 1)); ?>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <a href="profile.php?id=<?php echo $author['id']; ?>" class="text-white/90 hover:text-white font-medium">
                                            <?php echo htmlspecialchars($author['username'] ?? 'Anonymous'); ?>
                                        </a>
                                        <?php if (!empty($author['bio'])): ?>
                                            <p class="text-sm text-white/75 line-clamp-1"><?php echo htmlspecialchars($author['bio']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Post meta -->
                                <div class="flex items-center text-white/75 text-sm">
                                    <span><?php echo date('M d, Y', strtotime($featuredPost['created_at'])); ?></span>
                                    <span class="mx-2">·</span>
                                    <span><?php echo ceil(str_word_count(strip_tags($featuredPost['content'])) / 200); ?> min read</span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (empty($featuredPost['featured_image'])): ?>
                        <div class="p-6">
                            <!-- Featured post content for posts without image -->
                            <h2 class="text-3xl font-bold mb-4 leading-tight">
                                <a href="<?php echo htmlspecialchars($featuredPost['slug']); ?>" class="text-gray-900 hover:text-gray-800">
                                    <?php echo htmlspecialchars($featuredPost['title']); ?>
                                </a>
                            </h2>
                            <!-- Author and meta info -->
                            <div class="flex items-center mb-4">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-semibold">
                                        <?php echo strtoupper(substr($author['username'] ?? 'A', 0, 1)); ?>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <div class="text-base font-medium text-gray-800">
                                        <a href="profile.php?id=<?php echo $author['id']; ?>" class="hover:text-indigo-600">
                                            <?php echo htmlspecialchars($author['username'] ?? 'Anonymous'); ?>
                                        </a>
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <span><?php echo date('M d, Y', strtotime($featuredPost['created_at'])); ?></span>
                                        <span class="mx-2">·</span>
                                        <span><?php echo ceil(str_word_count(strip_tags($featuredPost['content'])) / 200); ?> min read</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Post footer -->
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                        <div class="flex justify-between items-center">
                            <!-- Tags -->
                            <?php if (!empty($featuredPost['tags'])): ?>
                                <div class="space-x-2">
                                    <?php 
                                    $tags = explode(',', $featuredPost['tags']);
                                    foreach(array_slice($tags, 0, 3) as $tag): ?>
                                        <a href="search.php?q=<?php echo urlencode(trim($tag)); ?>" 
                                           class="inline-block bg-gray-100 hover:bg-gray-200 text-gray-600 text-sm px-3 py-1 rounded-full">
                                            <?php echo htmlspecialchars(trim($tag)); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Bookmark button -->
                            <?php if ($user->isLoggedIn()): ?>
                                <form method="POST" action="" class="ml-4">
                                    <input type="hidden" name="blog_id" value="<?php echo $featuredPost['id']; ?>">
                                    <button type="submit" 
                                            name="<?php echo $featuredInReadingList ? 'remove_from_reading_list' : 'add_to_reading_list'; ?>" 
                                            class="text-gray-500 hover:text-gray-700">
                                        <i class="<?php echo $featuredInReadingList ? 'fas' : 'far'; ?> fa-bookmark"></i>
                                    </button>
                                </form>
                            <?php else: ?>
                                <a href="login.php" class="ml-4 text-gray-500 hover:text-gray-700">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
                
                <!-- Remaining Posts -->
                <div class="border-t border-gray-200 mt-6 pt-6">
                    <h2 class="text-xl font-bold mb-6 text-gray-800">Latest Stories</h2>
                    
                    <?php if (empty($blogs)): ?>
                        <div class="text-center py-8 text-gray-500">
                            <p>No stories available yet.</p>
                        </div>
                    <?php else: ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <?php foreach ($blogs as $post): 
                            // Get author info for each post
                            $author = $user->getUserById($post['user_id']);
                            // Check if post is in reading list
                            $inReadingList = false;
                            if ($user->isLoggedIn()) {
                                $inReadingList = $blog->isInReadingList($currentUser['id'], $post['id']);
                            }
                        ?>
                            <div class="bg-white rounded-lg overflow-hidden transform hover:-translate-y-1 transition-all duration-300 shadow-sm">
                                <?php if (!empty($post['featured_image'])): ?>
                                    <div class="w-full h-48 overflow-hidden">
                                        <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" 
                                             alt="<?php echo htmlspecialchars($post['title']); ?>" 
                                             class="w-full h-full object-cover">
                                    </div>
                                <?php endif; ?>
                                <div class="p-4">
                                    <!-- Author info -->
                                    <div class="flex items-center mb-4">
                                        <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-semibold">
                                            <?php echo strtoupper(substr($author['username'] ?? 'A', 0, 1)); ?>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">
                                                <?php echo htmlspecialchars($author['username'] ?? 'Anonymous'); ?>
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <h3 class="text-lg font-bold mb-2">
                                        <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="text-gray-900 hover:text-gray-700">
                                            <?php echo htmlspecialchars($post['title']); ?>
                                        </a>
                                    </h3>
                                    
                                    <p class="text-gray-500 text-sm mb-4">
                                        <?php echo date('M d', strtotime($post['created_at'])); ?> · 
                                        <?php echo ceil(str_word_count(strip_tags($post['content'])) / 200); ?> min read
                                    </p>
                                    
                                    <div class="flex justify-between items-center">
                                        <?php if (!empty($post['tags'])): ?>
                                            <div class="space-x-2">
                                                <?php 
                                                $tags = explode(',', $post['tags']);
                                                $tag = trim($tags[0]); 
                                                ?>
                                                <a href="search.php?q=<?php echo urlencode($tag); ?>" 
                                                   class="inline-block bg-gray-100 hover:bg-gray-200 text-gray-600 text-xs px-2 py-1 rounded-full">
                                                    <?php echo htmlspecialchars($tag); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($user->isLoggedIn()): ?>
                                            <form method="POST" action="">
                                                <input type="hidden" name="blog_id" value="<?php echo $post['id']; ?>">
                                                <button type="submit" 
                                                        name="<?php echo $inReadingList ? 'remove_from_reading_list' : 'add_to_reading_list'; ?>" 
                                                        class="text-gray-400 hover:text-gray-600">
                                                    <i class="<?php echo $inReadingList ? 'fas' : 'far'; ?> fa-bookmark"></i>
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <a href="login.php" class="text-gray-400 hover:text-gray-600">
                                                <i class="far fa-bookmark"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        
    <!-- Sidebar -->
    <div class="w-full lg:w-1/3 mt-8 lg:mt-0">
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200 flex items-center">
                <i class="fas fa-compass text-indigo-500 mr-2"></i> Discover what matters to you
            </h2>
            <?php 
            $popularTags = $blog->getPopularTags(5); // Get top 5 tags
            $recommendedPosts = $blog->getRecommendedPosts(6); // Get 6 recommended posts
            
            if (empty($recommendedPosts)): 
            ?>
                <p class="text-gray-500">Start exploring topics by reading and tagging stories.</p>
            <?php else: ?>
                <!-- Popular Topics Pills -->
                <div class="flex flex-wrap gap-2 mb-4">
                    <?php foreach($popularTags as $tag): ?>
                        <a href="search.php?q=<?php echo urlencode($tag['name']); ?>" 
                           class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm transition">
                            <?php echo htmlspecialchars($tag['name']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                
                <!-- Recommended Posts -->
                <div class="space-y-4">
                    <?php foreach($recommendedPosts as $post): ?>
                        <a href="<?php echo htmlspecialchars($post['slug']); ?>" 
                           class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg transition-all">
                            <?php if (!empty($post['featured_image'])): ?>
                                <div class="w-16 h-16 flex-shrink-0 rounded-md overflow-hidden">
                                    <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" 
                                         alt="<?php echo htmlspecialchars($post['title']); ?>" 
                                         class="w-full h-full object-cover">
                                </div>
                            <?php endif; ?>
                            <div class="flex-grow min-w-0">
                                <h3 class="font-medium text-gray-900 truncate"><?php echo htmlspecialchars($post['title']); ?></h3>
                                <p class="text-sm text-gray-500"><?php echo date('M d, Y', strtotime($post['created_at'])); ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Who to Follow -->
        <?php displayWhoToFollow(); ?>
        
        <!-- Recommended Topics -->
        <?php displayRecommendedTopics(); ?>
        
        <!-- Sidebar Ad -->
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
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
// Include pagination
if ($pagination['last_page'] > 1):
?>
<div class="flex justify-center mt-8">
    <div class="inline-flex rounded-md shadow-sm">
        <?php if ($pagination['has_prev_pages']): ?>
            <a href="?page=<?php echo $pagination['current_page'] - 1; ?>" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 text-sm font-medium rounded-l hover:bg-gray-100">
                Previous
            </a>
        <?php endif; ?>
        
        <?php 
        $startPage = max(1, $pagination['current_page'] - 2);
        $endPage = min($pagination['last_page'], $pagination['current_page'] + 2);
        
        for ($i = $startPage; $i <= $endPage; $i++): 
        ?>
            <a href="?page=<?php echo $i; ?>" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 text-sm font-medium <?php echo $i === $pagination['current_page'] ? 'bg-indigo-50 text-indigo-600' : 'hover:bg-gray-100'; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
        
        <?php if ($pagination['has_more_pages']): ?>
            <a href="?page=<?php echo $pagination['current_page'] + 1; ?>" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 text-sm font-medium rounded-r hover:bg-gray-100">
                Next
            </a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const followButtons = document.querySelectorAll('.follow-topic-btn');
    
    followButtons.forEach(button => {
        button.addEventListener('click', function() {
            const topic = this.dataset.topic;
            const action = this.dataset.action;
            
            fetch('follow-topic.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `topic=${encodeURIComponent(topic)}&action=${action}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (action === 'follow') {
                        this.innerHTML = '<i class="fas fa-check-circle"></i>';
                        this.dataset.action = 'unfollow';
                        this.classList.replace('text-gray-500', 'text-green-600');
                    } else {
                        this.innerHTML = '<i class="fas fa-plus-circle"></i>';
                        this.dataset.action = 'follow';
                        this.classList.replace('text-green-600', 'text-gray-500');
                    }
                }
            });
        });
    });
});
</script>
