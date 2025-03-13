<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';

// Get current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page); // Ensure page is at least 1

// Get blog posts with pagination
$result = $blog->getAllBlogs($page, 12);
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

// Remove categories for sidebar
// $categories = $category->getAllCategories();

// Get current user if logged in
$currentUser = $user->getCurrentUser();

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
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8 rounded-full bg-gray-300 flex-shrink-0 flex items-center justify-center text-gray-600 font-semibold mr-2">
                                        <?php 
                                        $author = $user->getUserById($featuredPost['user_id']); 
                                        echo substr($author['username'] ?? 'A', 0, 1);
                                        ?>
                                    </div>
                                    <span><?php echo htmlspecialchars($featuredPost['username'] ?? 'Anonymous'); ?></span>
                                    <span class="mx-2">·</span>
                                    <span><?php echo date('M d, Y', strtotime($featuredPost['created_at'])); ?></span>
                                    <span class="mx-2">·</span>
                                    <span><?php echo ceil(str_word_count(strip_tags($featuredPost['content'])) / 200); ?> min read</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <?php if (!empty($featuredPost['tags'])): ?>
                                        <span class="bg-gray-100 text-gray-600 text-sm py-1 px-3 rounded-full">
                                            <?php 
                                            $tags = explode(',', $featuredPost['tags']);
                                            echo htmlspecialchars(trim($tags[0])); 
                                            ?>
                                        </span>
                                    <?php endif; ?>
                                    
                                    <?php if ($user->isLoggedIn()): ?>
                                        <form method="POST" action="">
                                            <input type="hidden" name="blog_id" value="<?php echo $featuredPost['id']; ?>">
                                            <?php if (!$featuredInReadingList): ?>
                                                <button type="submit" name="add_to_reading_list" class="text-gray-500 hover:text-gray-700">
                                                    <i class="far fa-bookmark"></i>
                                                </button>
                                            <?php else: ?>
                                                <button type="submit" name="remove_from_reading_list" class="text-indigo-600 hover:text-indigo-800">
                                                    <i class="fas fa-bookmark"></i>
                                                </button>
                                            <?php endif; ?>
                                        </form>
                                    <?php else: ?>
                                        <a href="login.php" class="text-gray-500 hover:text-gray-700">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="p-6">
                            <h2 class="text-3xl font-bold mb-2 leading-tight">
                                <a href="<?php echo htmlspecialchars($featuredPost['slug']); ?>" class="hover:underline">
                                    <?php echo htmlspecialchars($featuredPost['title']); ?>
                                </a>
                            </h2>
                            <div class="flex items-center mb-2">
                                <div class="w-8 h-8 rounded-full bg-gray-300 flex-shrink-0 flex items-center justify-center text-gray-600 font-semibold mr-2">
                                    <?php 
                                    $author = $user->getUserById($featuredPost['user_id']); 
                                    echo substr($author['username'] ?? 'A', 0, 1);
                                    ?>
                                </div>
                                <span><?php echo htmlspecialchars($featuredPost['username'] ?? 'Anonymous'); ?></span>
                                <span class="mx-2">·</span>
                                <span><?php echo date('M d, Y', strtotime($featuredPost['created_at'])); ?></span>
                                <span class="mx-2">·</span>
                                <span><?php echo ceil(str_word_count(strip_tags($featuredPost['content'])) / 200); ?> min read</span>
                            </div>
                            <p class="text-gray-600 mb-4">
                                <?php echo substr(strip_tags($featuredPost['content']), 0, 300) . '...'; ?>
                            </p>
                            <div class="flex justify-between items-center">
                                <?php if (!empty($featuredPost['tags'])): ?>
                                    <span class="bg-gray-100 text-gray-600 text-sm py-1 px-3 rounded-full">
                                        <?php 
                                        $tags = explode(',', $featuredPost['tags']);
                                        echo htmlspecialchars(trim($tags[0])); 
                                        ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ($user->isLoggedIn()): ?>
                                    <form method="POST" action="">
                                        <input type="hidden" name="blog_id" value="<?php echo $featuredPost['id']; ?>">
                                        <?php if (!$featuredInReadingList): ?>
                                            <button type="submit" name="add_to_reading_list" class="text-gray-500 hover:text-gray-700">
                                                <i class="far fa-bookmark"></i>
                                            </button>
                                        <?php else: ?>
                                            <button type="submit" name="remove_from_reading_list" class="text-indigo-600 hover:text-indigo-800">
                                                <i class="fas fa-bookmark"></i>
                                            </button>
                                        <?php endif; ?>
                                    </form>
                                <?php else: ?>
                                    <a href="login.php" class="text-gray-500 hover:text-gray-700">
                                        <i class="far fa-bookmark"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Remaining Posts -->
                <div class="border-t border-gray-200 mt-6 pt-6">
                    <h2 class="text-xl font-bold mb-6 text-gray-800">Latest Stories</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <?php foreach ($blogs as $post): 
                        // Check if post is in reading list
                        $inReadingList = false;
                        if ($user->isLoggedIn()) {
                            $inReadingList = $blog->isInReadingList($currentUser['id'], $post['id']);
                        }
                    ?>
                        <div class="bg-white rounded-lg overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
                            <?php if (!empty($post['featured_image'])): ?>
                                <div class="w-full h-48 overflow-hidden">
                                    <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" 
                                         alt="<?php echo htmlspecialchars($post['title']); ?>" 
                                         class="w-full h-full object-cover">
                                </div>
                            <?php endif; ?>
                            <div class="p-4">
                                <h3 class="text-lg font-bold mb-2">
                                    <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="text-gray-900 hover:text-gray-700">
                                        <?php echo htmlspecialchars($post['title']); ?>
                                    </a>
                                </h3>
                                <p class="text-gray-500 text-sm mb-2">
                                    <?php echo date('M d', strtotime($post['created_at'])); ?> · 
                                    <?php echo ceil(str_word_count(strip_tags($post['content'])) / 200); ?> min read
                                </p>
                                <div class="flex justify-between items-center">
                                    <?php if (!empty($post['tags'])): ?>
                                        <span class="inline-block bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">
                                            <?php 
                                            $tags = explode(',', $post['tags']);
                                            echo htmlspecialchars(trim($tags[0])); 
                                            ?>
                                        </span>
                                    <?php else: ?>
                                        <span></span>
                                    <?php endif; ?>
                                    
                                    <?php if ($user->isLoggedIn()): ?>
                                        <form method="POST" action="">
                                            <input type="hidden" name="blog_id" value="<?php echo $post['id']; ?>">
                                            <?php if (!$inReadingList): ?>
                                                <button type="submit" name="add_to_reading_list" class="text-gray-400 hover:text-gray-600">
                                                    <i class="far fa-bookmark"></i>
                                                </button>
                                            <?php else: ?>
                                                <button type="submit" name="remove_from_reading_list" class="text-indigo-600 hover:text-indigo-800">
                                                    <i class="fas fa-bookmark"></i>
                                                </button>
                                            <?php endif; ?>
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
                </div>
            </div>
        <?php endif; ?>
    </div>
        
    <!-- Sidebar -->
    <div class="w-full lg:w-1/3 mt-8 lg:mt-0">
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200">Discover what matters to you</h2>
            <!-- Categories section removed as feature is deprecated -->
        </div>
        
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
