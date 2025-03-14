<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';
require_once 'includes/sidebar-components.php';

// Get search query and current page
$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page); // Ensure page is at least 1

// Get search results with pagination
$searchResults = ['blogs' => [], 'pagination' => []];
if (!empty($searchQuery)) {
    $searchResults = $blog->searchBlogs($searchQuery, $page, 10);
}

// Get trending posts for sidebar
$trendingPosts = $blog->getTrendingPosts(5);

// Remove categories retrieval
// $categories = $category->getAllCategories();

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

// Set page title (for backward compatibility)
$pageTitle = !empty($searchQuery) ? "Search results for: " . $searchQuery : "Search";

// Include header
require_once 'includes/header.php';
?>

<div class="flex flex-wrap">
    <!-- Main Content -->
    <div class="w-full lg:w-3/4 pr-0 lg:pr-8">
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-2xl font-bold mb-4">
                <?php echo !empty($searchQuery) 
                    ? "Search results for: <span class=\"text-indigo-600\">" . htmlspecialchars($searchQuery) . "</span>"
                    : "Search"; ?>
            </h1>
            
            <!-- Search form -->
            <form action="search.php" method="GET" class="mb-6">
                <div class="flex">
                    <input type="text" name="q" value="<?php echo htmlspecialchars($searchQuery); ?>" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-l focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="Search for articles, topics, or keywords">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-r hover:bg-indigo-700">
                        Search
                    </button>
                </div>
            </form>
            
            <?php if (!empty($searchQuery)): ?>
                <?php if (empty($searchResults['blogs'])): ?>
                    <div class="text-center py-12">
                        <div class="inline-flex items-center justify-center p-6 bg-gray-100 text-gray-600 rounded-full mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold mb-2">No results found</h2>
                        <p class="text-gray-600">We couldn't find any content matching "<?php echo htmlspecialchars($searchQuery); ?>"</p>
                        <div class="mt-6">
                            <h3 class="font-medium mb-2">You searched for tag: "<?php echo htmlspecialchars($searchQuery); ?>"</h3>
                            <p class="text-gray-600">Try browsing our other popular tags below:</p>
                            <div class="flex flex-wrap gap-2 mt-4 justify-center">
                                <?php 
                                $popularTags = $blog->getPopularTags(5);
                                foreach ($popularTags as $tag): ?>
                                    <a href="search.php?q=<?php echo urlencode($tag['name']); ?>" 
                                       class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 text-sm rounded-full transition">
                                        <?php echo htmlspecialchars($tag['name']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="text-gray-600 mb-6">
                        <?php if (strpos($searchQuery, ',') === false): ?>
                            Found <?php echo $searchResults['pagination']['total']; ?> posts tagged with "<?php echo htmlspecialchars($searchQuery); ?>"
                        <?php else: ?>
                            Found <?php echo $searchResults['pagination']['total']; ?> results for "<?php echo htmlspecialchars($searchQuery); ?>"
                        <?php endif; ?>
                    </p>
                    
                    <?php 
                    // Counter for inserting ads
                    $count = 0;
                    foreach ($searchResults['blogs'] as $blogPost): 
                        $count++;
                    ?>
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden mb-6 hover:shadow-md transition-shadow">
                            <div class="flex flex-col md:flex-row">
                                <?php if (!empty($blogPost['featured_image'])): ?>
                                <div class="md:w-48 h-48 md:h-auto flex-shrink-0">
                                    <img src="<?php echo htmlspecialchars($blogPost['featured_image']); ?>" 
                                         alt="<?php echo htmlspecialchars($blogPost['title']); ?>" 
                                         class="w-full h-full object-cover">
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
                        </div>
                        
                        <?php 
                        // Insert ad after every 6 posts
                        if ($count % 6 == 0 && $count < count($searchResults['blogs'])): 
                        ?>
                            <?php displayHorizontalAd(); ?>
                        <?php endif; ?>
                        
                    <?php endforeach; ?>
                    
                    <!-- Pagination -->
                    <?php if ($searchResults['pagination']['last_page'] > 1): ?>
                        <div class="flex justify-center mt-8">
                            <div class="inline-flex rounded-md shadow-sm">
                                <?php if ($searchResults['pagination']['has_prev_pages']): ?>
                                    <a href="?q=<?php echo urlencode($searchQuery); ?>&page=<?php echo $searchResults['pagination']['current_page'] - 1; ?>" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 text-sm font-medium rounded-l hover:bg-gray-50">
                                        <i class="fas fa-chevron-left mr-1"></i> Previous
                                    </a>
                                <?php endif; ?>
                                
                                <?php 
                                $startPage = max(1, $searchResults['pagination']['current_page'] - 2);
                                $endPage = min($searchResults['pagination']['last_page'], $searchResults['pagination']['current_page'] + 2);
                                
                                for ($i = $startPage; $i <= $endPage; $i++): 
                                ?>
                                    <a href="?q=<?php echo urlencode($searchQuery); ?>&page=<?php echo $i; ?>" class="<?php echo $i === $searchResults['pagination']['current_page'] ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700'; ?> border border-gray-300 px-4 py-2 text-sm font-medium hover:bg-gray-50">
                                        <?php echo $i; ?>
                                    </a>
                                <?php endfor; ?>
                                
                                <?php if ($searchResults['pagination']['has_more_pages']): ?>
                                    <a href="?q=<?php echo urlencode($searchQuery); ?>&page=<?php echo $searchResults['pagination']['current_page'] + 1; ?>" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 text-sm font-medium rounded-r hover:bg-gray-50">
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
        
        <!-- Who to Follow -->
        <?php displayWhoToFollow(); ?>
        
        <!-- Recommended Topics -->
        <?php displayRecommendedTopics(); ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
