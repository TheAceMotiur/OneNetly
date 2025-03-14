<?php
// Remove category hierarchy for the menu
// $categoryHierarchy = $category->getCategoryHierarchy();

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
    // Output SEO meta tags
    echo $seo->outputMetaTags();
    ?>
    
    <!-- Google site verification -->
    <?php if (!empty($googleSiteVerification)): ?>
    <meta name="google-site-verification" content="<?php echo htmlspecialchars($googleSiteVerification); ?>">
    <?php endif; ?>
    
    <!-- Bing site verification -->
    <?php if (!empty($bingSiteVerification)): ?>
    <meta name="msvalidate.01" content="<?php echo htmlspecialchars($bingSiteVerification); ?>">
    <?php endif; ?>
    
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Medium-like fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,400&display=swap">
    
    <!-- Quill Content Styling -->
    <link rel="stylesheet" href="assets/css/quill-content.css">
    
    <?php echo getThemeStyles(); ?>
    <?php echo getThemeScript(); ?>
    
    <!-- Google Analytics -->
    <?php if (!empty($googleAnalyticsId)): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars($googleAnalyticsId); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo htmlspecialchars($googleAnalyticsId); ?>');
    </script>
    <?php endif; ?>
    
    <!-- vuejs 3 -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    
    <!-- Axios for API requests -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="<?php echo getBodyThemeClass(); ?> min-h-screen flex flex-col">
    <!-- Header Notification Banner (Optional) -->
    <?php if (false): // Set to true to enable banner ?>
    <div class="bg-indigo-600">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 flex items-center">
                    <span class="flex p-2 rounded-lg bg-indigo-800">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </span>
                    <p class="ml-3 font-medium text-white truncate">
                        <span class="md:hidden">We announced new features!</span>
                        <span class="hidden md:inline">Big news! We're excited to announce new features.</span>
                    </p>
                </div>
                <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                    <a href="#" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50">
                        Learn more
                    </a>
                </div>
                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                    <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                        <span class="sr-only">Dismiss</span>
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="index.php" class="text-xl font-bold text-gray-800">
                            <i class="fas fa-pen-nib text-green-600 mr-1"></i> OneNetly
                        </a>
                    </div>

                    <!-- Desktop Navigation Menu -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-4">
                        <a href="index.php" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md flex items-center">
                            <i class="fas fa-home mr-2"></i> Home
                        </a>
                        <a href="search.php" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md flex items-center">
                            <i class="fas fa-search mr-2"></i> Explore
                        </a>
                        <a href="ai-writer.php" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md flex items-center">
                            <i class="fas fa-robot mr-2"></i> AI Writer
                        </a>
                        <div class="relative group">
                            <button class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md flex items-center">
                                <i class="fas fa-th-large mr-2"></i> More <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </button>
                            <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition ease-out duration-200">
                                <a href="sitemap.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sitemap mr-2"></i> Site Map
                                </a>
                                <a href="privacy-policy.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-shield-alt mr-2"></i> Privacy Policy
                                </a>
                                <a href="terms-of-service.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-file-contract mr-2"></i> Terms
                                </a>
                                <a href="dmca-policy.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-copyright mr-2"></i> DMCA
                                </a>
                            </div>
                        </div>
                        <?php if ($user->isLoggedIn()): ?>
                        <a href="create-post.php" class="px-3 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-full flex items-center">
                            <i class="fas fa-pencil-alt mr-2"></i> Write
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Right side menu items -->
                <div class="flex items-center">
                    <!-- Search Icon (Desktop) -->
                    <div class="hidden sm:flex sm:items-center mr-2">
                        <a href="search.php" class="p-2 text-gray-500 hover:text-gray-700 rounded-full hover:bg-gray-100">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <?php if ($user->isLoggedIn()): ?>
                            <!-- Notification Icon -->
                            <div class="inline-block mr-3">
                                <button class="p-1 rounded-full text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none">
                                    <i class="far fa-bell text-lg"></i>
                                </button>
                            </div>
                            
                            <!-- User Menu -->
                            <div class="inline-block">
                                <button type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-200">
                                        <span class="text-sm font-medium leading-none text-gray-700">
                                            <?php 
                                            $currentUser = $user->getCurrentUser();
                                            echo substr($currentUser['username'], 0, 1); 
                                            ?>
                                        </span>
                                    </span>
                                </button>
                            </div>

                            <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-menu-dropdown">
                                <div class="border-b pb-2 mb-1">
                                    <span class="block px-4 py-1 text-sm text-gray-900 font-medium">
                                        <?php echo htmlspecialchars($currentUser['username']); ?>
                                    </span>
                                    <?php if (!empty($currentUser['bio'])): ?>
                                    <span class="block px-4 py-1 text-xs text-gray-500 line-clamp-2">
                                        <?php echo htmlspecialchars($currentUser['bio']); ?>
                                    </span>
                                    <?php endif; ?>
                                    <span class="block px-4 py-1 text-xs text-gray-500">
                                        <?php echo htmlspecialchars($currentUser['email']); ?>
                                    </span>
                                </div>
                                <a href="dashboard.php" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <i class="fas fa-tachometer-alt w-5 mr-2"></i> Dashboard
                                </a>
                                <?php if ($user->isAdmin()): ?>
                                <a href="admin/index.php" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <i class="fas fa-cog w-5 mr-2"></i> Admin
                                </a>
                                <?php endif; ?>
                                <a href="followers.php" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <i class="fas fa-users w-5 mr-2"></i> Followers
                                </a>
                                <a href="reading-list.php" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <i class="fas fa-bookmark w-5 mr-2"></i> Reading List
                                </a>
                                <a href="ai-writer.php" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <i class="fas fa-robot w-5 mr-2"></i> AI Writer
                                </a>
                                <a href="settings.php" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <i class="fas fa-cog w-5 mr-2"></i> Settings
                                </a>
                                <div class="border-t mt-1 pt-1">
                                    <a href="logout.php" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                        <i class="fas fa-sign-out-alt w-5 mr-2"></i> Sign out
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="flex items-center">
                                <a href="login.php" class="px-3 py-2 rounded hover:bg-gray-100 transition flex items-center text-gray-700">
                                    <i class="fas fa-sign-in-alt mr-1"></i> Sign in
                                </a>
                                <a href="register.php" class="ml-3 px-3 py-2 rounded bg-green-600 text-white hover:bg-green-700 transition flex items-center">
                                    <i class="fas fa-user-plus mr-1"></i> Get started
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="index.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
                <a href="search.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                    <i class="fas fa-search mr-2"></i> Explore
                </a>
                <a href="ai-writer.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                    <i class="fas fa-robot mr-2"></i> AI Writer
                </a>
                
                <!-- Mobile: Site Links -->
                <div class="border-t border-gray-200 mt-2 pt-2">
                    <div class="px-4 py-2 text-sm font-medium text-gray-500">Pages</div>
                    <a href="sitemap.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-sitemap mr-2"></i> Site Map
                    </a>
                    <a href="privacy-policy.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-shield-alt mr-2"></i> Privacy Policy
                    </a>
                    <a href="terms-of-service.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-file-contract mr-2"></i> Terms of Service
                    </a>
                    <a href="dmca-policy.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-copyright mr-2"></i> DMCA Policy
                    </a>
                </div>
                
                <!-- Add Write button for mobile -->
                <?php if ($user->isLoggedIn()): ?>
                <div class="px-4 py-3">
                    <a href="create-post.php" class="block w-full px-4 py-2 text-center text-white bg-green-600 hover:bg-green-700 rounded-full">
                        <i class="fas fa-pencil-alt mr-2"></i> Write
                    </a>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Mobile profile section -->
            <div class="pt-4 pb-3 border-t border-gray-200">
                <?php if ($user->isLoggedIn()): ?>
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-gray-200">
                                <span class="text-sm font-medium leading-none text-gray-700">
                                    <?php echo substr($currentUser['username'], 0, 1); ?>
                                </span>
                            </span>
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800"><?php echo htmlspecialchars($currentUser['username']); ?></div>
                            <div class="text-sm font-medium text-gray-500"><?php echo htmlspecialchars($currentUser['email']); ?></div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <a href="dashboard.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                        <?php if ($user->isAdmin()): ?>
                        <a href="admin/index.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-cog mr-2"></i> Admin
                        </a>
                        <?php endif; ?>
                        <a href="followers.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-users mr-2"></i> Followers
                        </a>
                        <a href="reading-list.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-bookmark mr-2"></i> Reading List
                        </a>
                        <a href="settings.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-cog mr-2"></i> Settings
                        </a>
                        <a href="logout.php" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sign out
                        </a>
                    </div>
                <?php else: ?>
                    <div class="mt-3 space-y-1 px-4">
                        <a href="login.php" class="block w-full mb-2 px-4 py-2 text-center text-gray-700 border border-gray-300 rounded hover:bg-gray-50">
                            <i class="fas fa-sign-in-alt mr-2"></i> Sign in
                        </a>
                        <a href="register.php" class="block w-full px-4 py-2 text-center text-white bg-green-600 rounded hover:bg-green-700">
                            <i class="fas fa-user-plus mr-2"></i> Get started
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Breadcrumbs -->
    <?php if (isset($breadcrumbs) && !empty($breadcrumbs)): ?>
    <div class="bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex py-3 text-sm" aria-label="Breadcrumb">
                <ol class="flex space-x-2 items-center">
                    <li>
                        <a href="index.php" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <?php 
                    $count = 0;
                    foreach ($breadcrumbs as $title => $url): 
                        $count++;
                        $isLast = $count === count($breadcrumbs);
                    ?>
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <?php if (!$isLast && $url): ?>
                                    <a href="<?php echo htmlspecialchars($url); ?>" class="ml-2 text-gray-500 hover:text-gray-700">
                                        <?php echo htmlspecialchars($title); ?>
                                    </a>
                                <?php else: ?>
                                    <span class="ml-2 text-gray-700 font-medium">
                                        <?php echo htmlspecialchars($title); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        </div>
    </div>
    <?php endif; ?>

    <!-- Display system message if any -->
    <?php echo displayMessage(); ?>

    <!-- Main Content -->
    <main class="flex-grow py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
