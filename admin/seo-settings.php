<?php
require_once '../includes/init.php';

// Redirect if user is not admin
if (!$user->isAdmin()) {
    header('Location: ../index.php');
    exit;
}

// Get current user
$currentUser = $user->getCurrentUser();

// Process form submission
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle SEO Settings Form
    if (isset($_POST['update_seo_settings'])) {
        $seoSettings = [
            'site_name' => trim($_POST['site_name'] ?? ''),
            'site_description' => trim($_POST['site_description'] ?? ''),
            'site_keywords' => trim($_POST['site_keywords'] ?? ''),
            'default_og_image' => trim($_POST['default_og_image'] ?? ''),
            'google_analytics_id' => trim($_POST['google_analytics_id'] ?? ''),
            'google_site_verification' => trim($_POST['google_site_verification'] ?? ''),
            'bing_site_verification' => trim($_POST['bing_site_verification'] ?? ''),
            'site_url' => trim($_POST['site_url'] ?? '')
        ];

        try {
            // Check if site_config table exists
            $tableExists = $pdo->query("SHOW TABLES LIKE 'site_config'");
            if ($tableExists->rowCount() === 0) {
                // Create the table
                $pdo->exec("CREATE TABLE `site_config` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `site_name` varchar(255) NOT NULL,
                    `site_description` text,
                    `site_keywords` text,
                    `default_og_image` varchar(255),
                    `google_analytics_id` varchar(50),
                    `google_site_verification` varchar(100),
                    `bing_site_verification` varchar(100),
                    `site_url` varchar(255),
                    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    PRIMARY KEY (`id`)
                )");
                
                // Insert initial record
                $stmt = $pdo->prepare("INSERT INTO site_config (site_name, site_description, site_keywords, default_og_image, google_analytics_id, google_site_verification, bing_site_verification, site_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $seoSettings['site_name'],
                    $seoSettings['site_description'],
                    $seoSettings['site_keywords'],
                    $seoSettings['default_og_image'],
                    $seoSettings['google_analytics_id'],
                    $seoSettings['google_site_verification'],
                    $seoSettings['bing_site_verification'],
                    $seoSettings['site_url']
                ]);
            } else {
                // Update existing record
                $countQuery = $pdo->query("SELECT COUNT(*) FROM site_config");
                $count = $countQuery->fetchColumn();
                
                if ($count === 0) {
                    // No records exist, insert a new one
                    $stmt = $pdo->prepare("INSERT INTO site_config (site_name, site_description, site_keywords, default_og_image, google_analytics_id, google_site_verification, bing_site_verification, site_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute([
                        $seoSettings['site_name'],
                        $seoSettings['site_description'],
                        $seoSettings['site_keywords'],
                        $seoSettings['default_og_image'],
                        $seoSettings['google_analytics_id'],
                        $seoSettings['google_site_verification'],
                        $seoSettings['bing_site_verification'],
                        $seoSettings['site_url']
                    ]);
                } else {
                    // Update the first record
                    $stmt = $pdo->prepare("UPDATE site_config SET site_name = ?, site_description = ?, site_keywords = ?, default_og_image = ?, google_analytics_id = ?, google_site_verification = ?, bing_site_verification = ?, site_url = ? WHERE id = (SELECT id FROM (SELECT id FROM site_config LIMIT 1) as temp)");
                    $stmt->execute([
                        $seoSettings['site_name'],
                        $seoSettings['site_description'],
                        $seoSettings['site_keywords'],
                        $seoSettings['default_og_image'],
                        $seoSettings['google_analytics_id'],
                        $seoSettings['google_site_verification'],
                        $seoSettings['bing_site_verification'],
                        $seoSettings['site_url']
                    ]);
                }
            }
            
            // Update robots.txt
            if (isset($_POST['update_robots_txt'])) {
                $robotsContent = $_POST['robots_txt'];
                $baseUrl = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
                $baseUrl .= $_SERVER['HTTP_HOST'];
                
                // Replace the sitemap URL placeholder with actual URL
                $robotsContent = str_replace('https://yourdomain.com/sitemaps/sitemap.xml', $baseUrl . '/sitemaps/sitemap.xml', $robotsContent);
                
                file_put_contents('../robots.txt', $robotsContent);
            }
            
            $message = 'SEO settings updated successfully!';
            $messageType = 'success';
            
        } catch (PDOException $e) {
            $message = 'Error updating SEO settings: ' . $e->getMessage();
            $messageType = 'error';
        }
    }
    
    // Handle Generate Sitemap Form
    if (isset($_POST['generate_sitemap'])) {
        try {
            // Include sitemap generator
            require_once '../sitemaps/sitemap-generator.php';
            $message = 'Sitemap generated successfully!';
            $messageType = 'success';
        } catch (Exception $e) {
            $message = 'Error generating sitemap: ' . $e->getMessage();
            $messageType = 'error';
        }
    }
}

// Get current SEO settings
try {
    $stmt = $pdo->query("SELECT * FROM site_config LIMIT 1");
    $seoSettings = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $seoSettings = [
        'site_name' => 'OneNetly',
        'site_description' => 'A modern content management system',
        'site_keywords' => 'CMS, blog, content management',
        'default_og_image' => '',
        'google_analytics_id' => '',
        'google_site_verification' => '',
        'bing_site_verification' => '',
        'site_url' => isset($_SERVER['HTTP_HOST']) ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] : ''
    ];
}

// Get robots.txt content
$robotsTxtPath = '../robots.txt';
$robotsTxtContent = file_exists($robotsTxtPath) ? file_get_contents($robotsTxtPath) : '';

// Check if sitemap exists
$sitemapPath = '../sitemaps/sitemap.xml';
$sitemapExists = file_exists($sitemapPath);
$sitemapLastUpdated = $sitemapExists ? date('F j, Y H:i:s', filemtime($sitemapPath)) : 'Never';

// Set page title
$pageTitle = "SEO Settings";

// Include header
require_once 'admin_header.php';
?>

<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">SEO Settings</h1>
        <a href="index.php" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
            Back to Dashboard
        </a>
    </div>

    <?php if (!empty($message)): ?>
        <div class="mb-6 p-4 rounded <?php echo $messageType === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">General SEO Settings</h2>
        
        <form method="POST" action="">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <label for="site_name" class="block text-gray-700 font-bold mb-2">Site Name</label>
                        <input type="text" id="site_name" name="site_name" value="<?php echo htmlspecialchars($seoSettings['site_name'] ?? ''); ?>" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-gray-500 text-sm mt-1">The name of your website (used in title tags).</p>
                    </div>
                    
                    <div class="mb-4">
                        <label for="site_description" class="block text-gray-700 font-bold mb-2">Site Description</label>
                        <textarea id="site_description" name="site_description" rows="3" 
                                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo htmlspecialchars($seoSettings['site_description'] ?? ''); ?></textarea>
                        <p class="text-gray-500 text-sm mt-1">A short description of your site (meta description).</p>
                    </div>
                    
                    <div class="mb-4">
                        <label for="site_keywords" class="block text-gray-700 font-bold mb-2">Site Keywords</label>
                        <textarea id="site_keywords" name="site_keywords" rows="3" 
                                 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo htmlspecialchars($seoSettings['site_keywords'] ?? ''); ?></textarea>
                        <p class="text-gray-500 text-sm mt-1">Keywords relevant to your site (comma separated).</p>
                    </div>
                    
                    <div class="mb-4">
                        <label for="site_url" class="block text-gray-700 font-bold mb-2">Site URL</label>
                        <input type="url" id="site_url" name="site_url" value="<?php echo htmlspecialchars($seoSettings['site_url'] ?? ''); ?>" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-gray-500 text-sm mt-1">Your site's URL with protocol (used for sitemap).</p>
                    </div>
                </div>
                
                <div>
                    <div class="mb-4">
                        <label for="default_og_image" class="block text-gray-700 font-bold mb-2">Default Social Image</label>
                        <input type="url" id="default_og_image" name="default_og_image" value="<?php echo htmlspecialchars($seoSettings['default_og_image'] ?? ''); ?>" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-gray-500 text-sm mt-1">Default image URL for social sharing (1200x630 recommended).</p>
                    </div>
                    
                    <div class="mb-4">
                        <label for="google_analytics_id" class="block text-gray-700 font-bold mb-2">Google Analytics ID</label>
                        <input type="text" id="google_analytics_id" name="google_analytics_id" value="<?php echo htmlspecialchars($seoSettings['google_analytics_id'] ?? ''); ?>" placeholder="G-XXXXXXXXXX or UA-XXXXXXXX-X"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-gray-500 text-sm mt-1">Your Google Analytics tracking ID.</p>
                    </div>
                    
                    <div class="mb-4">
                        <label for="google_site_verification" class="block text-gray-700 font-bold mb-2">Google Site Verification</label>
                        <input type="text" id="google_site_verification" name="google_site_verification" value="<?php echo htmlspecialchars($seoSettings['google_site_verification'] ?? ''); ?>" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-gray-500 text-sm mt-1">Google Search Console verification code.</p>
                    </div>
                    
                    <div class="mb-4">
                        <label for="bing_site_verification" class="block text-gray-700 font-bold mb-2">Bing Site Verification</label>
                        <input type="text" id="bing_site_verification" name="bing_site_verification" value="<?php echo htmlspecialchars($seoSettings['bing_site_verification'] ?? ''); ?>" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-gray-500 text-sm mt-1">Bing Webmaster Tools verification code.</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-6">
                <button type="submit" name="update_seo_settings" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Save SEO Settings
                </button>
            </div>
        </form>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Robots.txt</h2>
        <p class="mb-4 text-gray-600">Configure how search engines crawl your site.</p>
        
        <form method="POST" action="">
            <div class="mb-4">
                <textarea id="robots_txt" name="robots_txt" rows="10" 
                         class="w-full font-mono text-sm shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo htmlspecialchars($robotsTxtContent); ?></textarea>
            </div>
            
            <input type="hidden" name="update_seo_settings" value="1">
            <input type="hidden" name="update_robots_txt" value="1">
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Save Robots.txt
            </button>
        </form>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">XML Sitemap</h2>
        <p class="mb-4 text-gray-600">Generate and manage your sitemap for search engines.</p>
        
        <div class="mb-4">
            <p><strong>Sitemap Status:</strong> <?php echo $sitemapExists ? '<span class="text-green-600">Available</span>' : '<span class="text-red-600">Not generated</span>'; ?></p>
            <p><strong>Last Updated:</strong> <?php echo $sitemapLastUpdated; ?></p>
            
            <?php if ($sitemapExists): ?>
                <p class="mt-2">
                    <a href="../sitemaps/sitemap.xml" target="_blank" class="text-blue-600 hover:underline">View Sitemap</a>
                </p>
            <?php endif; ?>
        </div>
        
        <form method="POST" action="">
            <button type="submit" name="generate_sitemap" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Generate Sitemap
            </button>
        </form>
        
        <div class="mt-4 p-4 bg-yellow-50 text-yellow-800 rounded">
            <p class="font-semibold">Important:</p>
            <p>After generating the sitemap, make sure to:</p>
            <ol class="list-decimal list-inside mt-2">
                <li>Verify the sitemap URL in robots.txt</li>
                <li>Submit your sitemap to <a href="https://search.google.com/search-console" target="_blank" class="text-blue-600 hover:underline">Google Search Console</a> and <a href="https://www.bing.com/webmasters" target="_blank" class="text-blue-600 hover:underline">Bing Webmaster Tools</a></li>
                <li>Schedule regular sitemap generation to keep it updated</li>
            </ol>
        </div>
    </div>
</div>

<?php require_once 'admin_footer.php'; ?>
