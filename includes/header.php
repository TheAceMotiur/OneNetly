<?php
// Get category hierarchy for the menu
$categoryHierarchy = $category->getCategoryHierarchy();

// Get SEO site verification codes and analytics ID
$googleSiteVerification = '';
$bingSiteVerification = '';
$googleAnalyticsId = '';

try {
    $stmt = $pdo->query("SELECT google_site_verification, bing_site_verification, google_analytics_id FROM site_config LIMIT 1");
    $seoConfig = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($seoConfig) {
        $googleSiteVerification = $seoConfig['google_site_verification'] ?? '';
        $bingSiteVerification = $seoConfig['bing_site_verification'] ?? '';
        $googleAnalyticsId = $seoConfig['google_analytics_id'] ?? '';
    }
} catch (PDOException $e) {
    // Silently fail if the table doesn't exist yet
}
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo getThemeClass(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
    // Set default canonical URL if not already set
    if (!isset($canonicalUrl)) {
        $canonicalUrl = SEO::getCurrentUrl();
        $seo->setCanonicalUrl($canonicalUrl);
    }
    
    // Output SEO meta tags
    echo $seo->generateMetaTags();
    ?>
    
    <?php if (!empty($googleSiteVerification)): ?>
    <meta name="google-site-verification" content="<?php echo htmlspecialchars($googleSiteVerification); ?>" />
    <?php endif; ?>
    
    <?php if (!empty($bingSiteVerification)): ?>
    <meta name="msvalidate.01" content="<?php echo htmlspecialchars($bingSiteVerification); ?>" />
    <?php endif; ?>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php echo getThemeStyles(); ?>
    <?php echo getThemeScript(); ?>
    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515" crossorigin="anonymous"></script>
    
    <?php if (!empty($googleAnalyticsId)): ?>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars($googleAnalyticsId); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo htmlspecialchars($googleAnalyticsId); ?>');
    </script>
    <?php endif; ?>
    
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .breadcrumb-item + .breadcrumb-item::before {
            content: "/";
            padding: 0 0.5rem;
            color: #cbd5e0;
        }
        .nav-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body class="<?php echo getBodyThemeClass(); ?>">
    <nav class="bg-gradient-to-r from-indigo-800 to-indigo-700 text-white nav-shadow">
        <div class="container mx-auto px-4">
            <!-- Top bar with logo and user actions -->
            <div class="flex justify-between items-center py-4 border-b border-indigo-700">
                <div class="flex items-center">
                    <a class="text-xl font-bold mr-8 flex items-center" href="/">
                        <span class="bg-white text-indigo-800 rounded-lg p-1 mr-2">
                            <i class="fas fa-cloud"></i>
                        </span>
                        OneNetly
                    </a>
                </div>
                
                <div>
                    <?php if ($user->isLoggedIn()): ?>
                        <div class="flex items-center">
                            <span class="mr-4 hidden sm:inline-block"><?php echo htmlspecialchars($currentUser ? $currentUser['username'] : ''); ?></span>
                            <a href="dashboard.php" class="px-3 py-2 rounded hover:bg-indigo-600 transition flex items-center">
                                <i class="fas fa-tachometer-alt mr-1"></i> Dashboard
                            </a>
                            <?php if ($user->isAdmin()): ?>
                            <a href="admin/index.php" class="px-3 py-2 rounded hover:bg-indigo-600 transition flex items-center">
                                <i class="fas fa-cog mr-1"></i> Admin
                            </a>
                            <?php endif; ?>
                            <a href="logout.php" class="px-3 py-2 rounded hover:bg-indigo-600 transition flex items-center">
                                <i class="fas fa-sign-out-alt mr-1"></i> Logout
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="flex items-center">
                            <a href="login.php" class="px-3 py-2 rounded hover:bg-indigo-600 transition flex items-center">
                                <i class="fas fa-sign-in-alt mr-1"></i> Login
                            </a>
                            <a href="register.php" class="ml-2 px-4 py-2 bg-white text-indigo-700 rounded hover:bg-gray-100 transition flex items-center">
                                <i class="fas fa-user-plus mr-1"></i> Register
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Main navigation -->
            <div class="py-3">
                <div class="flex justify-between items-center">
                    <!-- Categories Menu -->
                    <div class="hidden md:flex space-x-4">
                        <a href="index.php" class="px-3 py-2 rounded hover:bg-indigo-600 transition flex items-center">
                            <i class="fas fa-home mr-1"></i> Home
                        </a>
                        <?php if (!empty($categoryHierarchy)): ?>
                            <?php foreach ($categoryHierarchy as $parentCat): ?>
                                <?php if (empty($parentCat['subcategories'])): ?>
                                    <!-- Simple link for categories with no subcategories -->
                                    <a href="category.php?slug=<?php echo htmlspecialchars($parentCat['slug']); ?>" 
                                       class="px-3 py-2 rounded hover:bg-indigo-600 transition">
                                       <?php echo htmlspecialchars($parentCat['name']); ?>
                                    </a>
                                <?php else: ?>
                                    <!-- Dropdown for categories with subcategories -->
                                    <div class="dropdown relative">
                                        <button class="px-3 py-2 rounded hover:bg-indigo-600 transition flex items-center">
                                            <?php echo htmlspecialchars($parentCat['name']); ?>
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu hidden absolute left-0 mt-1 bg-white rounded-md shadow-lg z-10 w-48 overflow-hidden">
                                            <a href="category.php?slug=<?php echo htmlspecialchars($parentCat['slug']); ?>" 
                                               class="block px-4 py-2 text-indigo-700 hover:bg-gray-100 transition border-b border-gray-100">
                                                All in <?php echo htmlspecialchars($parentCat['name']); ?>
                                            </a>
                                            <?php foreach ($parentCat['subcategories'] as $subCat): ?>
                                                <a href="category.php?slug=<?php echo htmlspecialchars($subCat['slug']); ?>" 
                                                   class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                                                    <?php echo htmlspecialchars($subCat['name']); ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Search box -->
                    <div class="hidden md:block">
                        <form action="search.php" method="GET" class="relative">
                            <input type="text" name="q" placeholder="Search..." class="bg-indigo-700 text-white placeholder-indigo-300 rounded-full py-1 px-4 pr-8 focus:outline-none focus:ring-2 focus:ring-white">
                            <button type="submit" class="absolute right-0 top-0 mt-1 mr-2">
                                <i class="fas fa-search text-indigo-300"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Categories Menu Button (hidden on desktop) -->
        <div class="md:hidden pb-4 container mx-auto px-4">
            <button id="mobile-category-toggle" class="w-full text-left bg-indigo-700 px-4 py-2 rounded flex items-center justify-between">
                <span><i class="fas fa-bars mr-2"></i> Menu</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="mobile-category-menu" class="hidden mt-2 rounded-md overflow-hidden shadow-lg">
                <a href="index.php" class="block px-4 py-2 bg-indigo-700 hover:bg-indigo-600 border-b border-indigo-600">
                    <i class="fas fa-home mr-1"></i> Home
                </a>
                <?php if (!empty($categoryHierarchy)): ?>
                    <?php foreach ($categoryHierarchy as $parentCat): ?>
                        <a href="category.php?slug=<?php echo htmlspecialchars($parentCat['slug']); ?>" 
                           class="block px-4 py-2 bg-indigo-700 hover:bg-indigo-600 border-b border-indigo-600">
                            <?php echo htmlspecialchars($parentCat['name']); ?>
                        </a>
                        <?php if (!empty($parentCat['subcategories'])): ?>
                            <?php foreach ($parentCat['subcategories'] as $subCat): ?>
                                <a href="category.php?slug=<?php echo htmlspecialchars($subCat['slug']); ?>" 
                                   class="block px-8 py-2 bg-indigo-700 hover:bg-indigo-600 border-b border-indigo-600">
                                    — <?php echo htmlspecialchars($subCat['name']); ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="px-4 py-2 bg-indigo-700">No categories found</div>
                <?php endif; ?>
                
                <!-- Mobile search -->
                <div class="p-4 bg-indigo-700">
                    <form action="search.php" method="GET">
                        <div class="flex">
                            <input type="text" name="q" placeholder="Search..." class="flex-grow px-4 py-2 rounded-l">
                            <button type="submit" class="bg-white text-indigo-700 px-4 py-2 rounded-r hover:bg-gray-100">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container mx-auto py-6 px-4">
        <?php if (function_exists('displayMessage')): ?>
            <?php echo displayMessage(); ?>
        <?php endif; ?>
        
        <?php
        // Display breadcrumbs if the variable is set
        if (isset($breadcrumbs) && is_array($breadcrumbs)): ?>
            <nav class="text-sm mb-6">
                <ol class="list-none p-0 flex flex-wrap">
                    <li class="breadcrumb-item">
                        <a href="index.php" class="text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <?php foreach ($breadcrumbs as $label => $url): ?>
                        <li class="breadcrumb-item">
                            <?php if (!empty($url)): ?>
                                <a href="<?php echo htmlspecialchars($url); ?>" class="text-indigo-600 hover:text-indigo-800">
                                    <?php echo htmlspecialchars($label); ?>
                                </a>
                            <?php else: ?>
                                <span class="text-gray-600"><?php echo htmlspecialchars($label); ?></span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        <?php endif; ?>
