<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Get search query from URL
$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';

// Get current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page); // Ensure page is at least 1

// Initialize search results
$searchResults = ['blogs' => [], 'pagination' => ['total' => 0]];

// Perform search if there's a query
if (!empty($searchQuery)) {
    $searchResults = $blog->searchBlogs($searchQuery, $page, 12); // 12 results per page
    $pageTitle = "Search Results for \"" . htmlspecialchars($searchQuery) . "\"";
} else {
    $pageTitle = "Search";
}

// Get trending posts for sidebar
$trendingPosts = $blog->getTrendingPosts(5);

// Get all categories for sidebar
$categories = $category->getAllCategories();

// Set up breadcrumbs
$breadcrumbs = [
    'Search' => '',
];

// SEO Optimization
$canonicalUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/search.php";
if (!empty($searchQuery)) {
    $canonicalUrl .= "?q=" . urlencode($searchQuery);
    if ($page > 1) {
        $canonicalUrl .= "&page=$page";
    }
}

// Set SEO meta tags
$seo->setTitle(!empty($searchQuery) ? "Search results for: " . $searchQuery : "Search")
    ->setDescription(!empty($searchQuery) 
        ? "Search results for " . $searchQuery . " - Find relevant content on OneNetly" 
        : "Search for articles and content on OneNetly")
    ->setCanonicalUrl($canonicalUrl)
    ->setOgType('website');

// Add noindex tag for search pages to prevent search engine indexing
if (!empty($searchQuery)) {
    $seo->addMetaTag('robots', 'noindex, follow');
}

// Include header
require_once 'includes/header.php';
?>
        
<div class="flex flex-wrap">
    <!-- Main Content -->
    <div class="w-full lg:w-3/4 pr-0 lg:pr-8">
        <!-- Search Form -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-2xl font-bold mb-4">Search OneNetly</h1>
            <form action="search.php" method="GET" class="flex">
                <input type="text" name="q" value="<?php echo htmlspecialchars($searchQuery); ?>" 
                       placeholder="Search article..." 
                       class="flex-grow shadow appearance-none border rounded-l py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:shadow-outline">
                    <i class="fas fa-search"></i> Search
                </button>
            </form>
            <p class="text-xs text-gray-500 mt-2">Search looks for matches in articles.</p>
        </div>
        
        <?php if (!empty($searchQuery)): ?>
            <div class="mb-6">
                <h2 class="text-xl font-semibold">
                    <?php if ($searchResults['pagination']['total'] > 0): ?>
                        Found <?php echo $searchResults['pagination']['total']; ?> result<?php echo $searchResults['pagination']['total'] == 1 ? '' : 's'; ?> for "<?php echo htmlspecialchars($searchQuery); ?>"
                    <?php else: ?>
                        No results found for "<?php echo htmlspecialchars($searchQuery); ?>"
                    <?php endif; ?>
                </h2>
            </div>
            
            <?php if (empty($searchResults['blogs'])): ?>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <p>No matching articles found. Try another search term.</p>
                    <div class="mt-4">
                        <h3 class="font-medium text-gray-700 mb-2">Search tips:</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Check your spelling</li>
                            <li>Try more general keywords</li>
                            <li>Try different keywords</li>
                        </ul>
                    </div>
                </div>
            <?php else: ?>
                <!-- Top horizontal ad -->
                <?php displayHorizontalAd(); ?>
                
                <!-- Grid with 3 posts per row -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php 
                    $count = 0;
                    foreach ($searchResults['blogs'] as $blogPost): 
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
                                    <?php echo substr(strip_tags($blogPost['content']), 0, 100) . '...'; ?>
                                </div>
                                
                            </div>
                        </div>
                        
                        <?php 
                        // Insert ad after every 6 posts
                        if ($count % 6 == 0 && $count < count($searchResults['blogs'])): 
                        ?>
                            </div>
                            <?php displayHorizontalAd(); ?>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php endif; ?>
                        
                    <?php endforeach; ?>
                </div>
                
                <!-- Pagination -->
                <?php if ($searchResults['pagination']['last_page'] > 1): ?>
                    <div class="flex justify-center mt-8">
                        <div class="inline-flex rounded-md shadow-sm">
                            <?php if ($searchResults['pagination']['has_prev_pages']): ?>
                                <a href="?q=<?php echo urlencode($searchQuery); ?>&page=<?php echo $searchResults['pagination']['current_page'] - 1; ?>" class="bg-white border border-gray-300 px-4 py-2 text-gray-700 rounded-l hover:bg-gray-50 transition">
                                    <i class="fas fa-chevron-left mr-1"></i> Previous
                                </a>
                            <?php endif; ?>
                            
                            <?php 
                            $startPage = max(1, $searchResults['pagination']['current_page'] - 2);
                            $endPage = min($searchResults['pagination']['last_page'], $searchResults['pagination']['current_page'] + 2);
                            
                            for ($i = $startPage; $i <= $endPage; $i++): 
                            ?>
                                <a href="?q=<?php echo urlencode($searchQuery); ?>&page=<?php echo $i; ?>" class="<?php echo $i === $searchResults['pagination']['current_page'] ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 border-gray-300'; ?> px-4 py-2 border hover:bg-indigo-700 hover:text-white transition">
                                    <?php echo $i; ?>
                                </a>
                            <?php endfor; ?>
                            
                            <?php if ($searchResults['pagination']['has_more_pages']): ?>
                                <a href="?q=<?php echo urlencode($searchQuery); ?>&page=<?php echo $searchResults['pagination']['current_page'] + 1; ?>" class="bg-white border border-gray-300 px-4 py-2 text-gray-700 rounded-r hover:bg-gray-50 transition">
                                    Next <i class="fas fa-chevron-right ml-1"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php else: ?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <p>Enter a search term to find articles.</p>
            </div>
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
        
        <!-- Second Sidebar Ad -->
        <?php displaySidebarAd(); ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
