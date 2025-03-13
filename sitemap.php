<?php
require_once 'includes/init.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Get all blog posts (limit to 100 most recent)
$blogs = $blog->getAllBlogs(1, 100, 'published')['blogs'];

// SEO Optimization
$canonicalUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/sitemap.php";

// Set SEO tags
$seo->setTitle("Sitemap")
    ->setDescription("Complete sitemap of OneNetly - Find all pages and content")
    ->setCanonicalUrl($canonicalUrl)
    ->setOgType('website');

// Set page title
$pageTitle = "Sitemap";

// Breadcrumbs
$breadcrumbs = [
    'Sitemap' => ''
];

// Include header
require_once 'includes/header.php';
?>
        
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-3xl font-bold mb-6">Site Map</h1>
        
        <div class="mb-10">
            <h2 class="text-xl font-bold mb-4 pb-2 border-b">Main Pages</h2>
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <li>
                    <a href="index.php" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                        <i class="fas fa-home mr-2"></i> Homepage
                    </a>
                </li>
                <li>
                    <a href="search.php" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                        <i class="fas fa-search mr-2"></i> Search
                    </a>
                </li>
                <li>
                    <a href="login.php" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                </li>
                <li>
                    <a href="register.php" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                        <i class="fas fa-user-plus mr-2"></i> Register
                    </a>
                </li>
                <li>
                    <a href="privacy-policy.php" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                        <i class="fas fa-shield-alt mr-2"></i> Privacy Policy
                    </a>
                </li>
                <li>
                    <a href="terms-of-service.php" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                        <i class="fas fa-file-contract mr-2"></i> Terms of Service
                    </a>
                </li>
                <li>
                    <a href="disclaimer.php" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i> Disclaimer
                    </a>
                </li>
                <li>
                    <a href="dmca-policy.php" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                        <i class="fas fa-copyright mr-2"></i> DMCA Policy
                    </a>
                </li>
            </ul>
        </div>
        
        <div>
            <h2 class="text-xl font-bold mb-4 pb-2 border-b">Recent Blog Posts</h2>
            <?php if (empty($blogs)): ?>
                <p>No blog posts found.</p>
            <?php else: ?>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php foreach ($blogs as $blog): ?>
                        <li>
                            <a href="<?php echo htmlspecialchars($blog['slug']); ?>" class="text-indigo-600 hover:text-indigo-800 flex items-start">
                                <i class="fas fa-file-alt mt-1 mr-2"></i>
                                <span><?php echo htmlspecialchars($blog['title']); ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
