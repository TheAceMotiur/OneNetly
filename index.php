<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Get current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page); // Ensure page is at least 1

// Get blog posts with pagination (12 per page) ordered by last modified
$result = $blog->getAllBlogs($page, 12, 'published', 'updated_at');
$blogs = $result['blogs'];
$pagination = $result['pagination'];

// Get trending posts for sidebar
$trendingPosts = $blog->getTrendingPosts(5);

// Get all categories for sidebar
$categories = $category->getAllCategories();

// SEO Optimization
$canonicalUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
if ($page > 1) {
    $canonicalUrl .= "?page=$page";
}

// Get site settings for SEO
try {
    $stmt = $pdo->query("SELECT site_name, site_description, site_keywords FROM site_config LIMIT 1");
    $siteConfig = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Set SEO tags
    $seo->setTitle($siteConfig['site_name'] ?? 'OneNetly')
        ->setDescription($siteConfig['site_description'] ?? 'A modern content management system')
        ->setKeywords($siteConfig['site_keywords'] ?? 'CMS, blog, content management')
        ->setOgType('website')
        ->setCanonicalUrl($canonicalUrl);
    
} catch (PDOException $e) {
    // Default SEO settings if table doesn't exist
    $seo->setTitle('OneNetly')
        ->setDescription('A modern content management system')
        ->setKeywords('CMS, blog, content management')
        ->setOgType('website')
        ->setCanonicalUrl($canonicalUrl);
}

// Set page title (for backward compatibility)
$pageTitle = "Home";

// No breadcrumbs for homepage

// Include header
require_once 'includes/header.php';
?>
        
<div class="flex flex-wrap">
    <!-- Main Content -->
    <div class="w-full lg:w-3/4 pr-0 lg:pr-8">
        <?php if (empty($blogs)): ?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <p>No blog posts yet. Check back soon!</p>
            </div>
        <?php else: ?>
            <h2 class="text-2xl font-bold mb-4 pb-2 border-b border-gray-200">Latest Articles</h2>
            
            <!-- Top horizontal ad -->
            <?php displayHorizontalAd(); ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php 
            $count = 0;
            foreach ($blogs as $blogPost): 
                $count++;
            ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden h-full flex flex-col transform hover:-translate-y-1 transition-all">
                    <?php if (!empty($blogPost['featured_image'])): ?>
                        <div class="w-full h-40 overflow-hidden">
                            <img src="<?php echo htmlspecialchars($blogPost['featured_image']); ?>" alt="<?php echo htmlspecialchars($blogPost['title']); ?>" class="w-full h-full object-cover">
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-4 flex-1 flex flex-col">
                        <h2 class="text-lg font-bold mb-2">
                            <a href="<?php echo htmlspecialchars($blogPost['slug']); ?>" class="text-indigo-700 hover:text-indigo-900">
                                <?php echo htmlspecialchars($blogPost['title']); ?>
                            </a>
                        </h2>
                        
                        <div class="text-gray-500 mb-2 text-sm flex items-center">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span><?php echo date('F j, Y', strtotime($blogPost['updated_at'])); ?></span>
                        </div>
                        
                        <div class="mb-4 flex-1">
                            <?php 
                            echo substr(strip_tags($blogPost['content']), 0, 100) . '...';
                            ?>
                        </div>
                        
                    </div>
                </div>
                
                <?php 
                // Insert ad after every 6 posts
                if ($count % 6 == 0 && $count < count($blogs)): 
                ?>
                    </div>
                    <?php displayHorizontalAd(); ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php endif; ?>
                
            <?php endforeach; ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($pagination['last_page'] > 1): ?>
                <div class="flex justify-center mt-8">
                    <div class="inline-flex rounded-md shadow-sm">
                        <?php if ($pagination['has_prev_pages']): ?>
                            <a href="?page=<?php echo $pagination['current_page'] - 1; ?>" class="bg-white border border-gray-300 px-4 py-2 text-gray-700 rounded-l hover:bg-gray-50 transition">
                                <i class="fas fa-chevron-left mr-1"></i> Previous
                            </a>
                        <?php endif; ?>
                        
                        <?php 
                        $startPage = max(1, $pagination['current_page'] - 2);
                        $endPage = min($pagination['last_page'], $pagination['current_page'] + 2);
                        
                        for ($i = $startPage; $i <= $endPage; $i++): 
                        ?>
                            <a href="?page=<?php echo $i; ?>" class="<?php echo $i === $pagination['current_page'] ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 border-gray-300'; ?> px-4 py-2 border hover:bg-indigo-700 hover:text-white transition">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                        
                        <?php if ($pagination['has_more_pages']): ?>
                            <a href="?page=<?php echo $pagination['current_page'] + 1; ?>" class="bg-white border border-gray-300 px-4 py-2 text-gray-700 rounded-r hover:bg-gray-50 transition">
                                Next <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    
    <!-- Sidebar -->
    <div class="w-full lg:w-1/4 mt-8 lg:mt-0">
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
        
        <!-- Second Sidebar Ad - Removing this ad -->
        <?php // displaySidebarAd(); ?>

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
                            <a href="category.php?slug=<?php echo htmlspecialchars($cat['slug']); ?>" class="text-indigo-600 hover:text-indigo-800 flex items-center justify-between p-2 hover:bg-indigo-50 rounded transition">
                                <span><?php echo htmlspecialchars($cat['name']); ?></span>
                                <i class="fas fa-chevron-right text-indigo-400"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
