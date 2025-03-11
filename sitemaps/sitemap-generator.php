<?php
require_once '../includes/init.php';

// Only allow admin or CLI access
if (php_sapi_name() !== 'cli') {
    $currentUser = $user->getCurrentUser();
    
    if (!isset($currentUser['is_admin']) || !$currentUser['is_admin']) {
        header('Location: ../index.php');
        exit;
    }
}

// Determine base URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Use HTTP_HOST when available (from web request), or default to configured domain
if (isset($_SERVER['HTTP_HOST'])) {
    $baseUrl = $protocol . '://' . $_SERVER['HTTP_HOST'];
} else {
    // When running from CLI, use configured domain or default
    try {
        $stmt = $pdo->query("SELECT site_url FROM site_config LIMIT 1");
        $siteConfig = $stmt->fetch(PDO::FETCH_ASSOC);
        $baseUrl = !empty($siteConfig['site_url']) ? $siteConfig['site_url'] : 'http://localhost';
    } catch (PDOException $e) {
        $baseUrl = 'http://localhost';
    }
}

// Create sitemap directory if it doesn't exist
$sitemapDir = __DIR__;
if (!file_exists($sitemapDir)) {
    mkdir($sitemapDir, 0755, true);
}

// Start XML sitemap
$xml = new DOMDocument('1.0', 'UTF-8');
$xml->formatOutput = true;

// Create urlset element
$urlset = $xml->createElement('urlset');
$urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
$urlset->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
$urlset->setAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

$xml->appendChild($urlset);

// Add static pages to sitemap
$staticPages = [
    '/' => '1.0',
    '/search.php' => '0.5',
    '/login.php' => '0.5',
    '/register.php' => '0.5',
    '/privacy-policy.php' => '0.8',
    '/terms-of-service.php' => '0.8',
    '/dmca-policy.php' => '0.8',
    '/disclaimer.php' => '0.8'
];

foreach ($staticPages as $path => $priority) {
    $url = $xml->createElement('url');
    
    $loc = $xml->createElement('loc', htmlspecialchars($baseUrl . $path));
    $url->appendChild($loc);
    
    $changefreq = $xml->createElement('changefreq', 'weekly');
    $url->appendChild($changefreq);
    
    $priorityElement = $xml->createElement('priority', $priority);
    $url->appendChild($priorityElement);
    
    $urlset->appendChild($url);
}

// Add blog posts to sitemap
try {
    $stmt = $pdo->prepare("SELECT slug, updated_at FROM blogs WHERE status = 'published'");
    $stmt->execute();
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($blogs as $blog) {
        $url = $xml->createElement('url');
        
        $loc = $xml->createElement('loc', htmlspecialchars($baseUrl . '/' . $blog['slug']));
        $url->appendChild($loc);
        
        $lastmod = $xml->createElement('lastmod', date('Y-m-d', strtotime($blog['updated_at'])));
        $url->appendChild($lastmod);
        
        $changefreq = $xml->createElement('changefreq', 'monthly');
        $url->appendChild($changefreq);
        
        $priority = $xml->createElement('priority', '0.8');
        $url->appendChild($priority);
        
        $urlset->appendChild($url);
    }
} catch (PDOException $e) {
    // Handle error - couldn't fetch blog posts
    echo "Error fetching blog posts: " . $e->getMessage() . "\n";
}

// Add categories to sitemap
try {
    $stmt = $pdo->prepare("SELECT slug FROM categories");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($categories as $category) {
        $url = $xml->createElement('url');
        
        $loc = $xml->createElement('loc', htmlspecialchars($baseUrl . '/category.php?slug=' . $category['slug']));
        $url->appendChild($loc);
        
        $changefreq = $xml->createElement('changefreq', 'weekly');
        $url->appendChild($changefreq);
        
        $priority = $xml->createElement('priority', '0.7');
        $url->appendChild($priority);
        
        $urlset->appendChild($url);
    }
} catch (PDOException $e) {
    // Handle error - couldn't fetch categories
    echo "Error fetching categories: " . $e->getMessage() . "\n";
}

// Save the sitemap
$xml->save($sitemapDir . '/sitemap.xml');

// Create a simple index.php to prevent directory listing
$indexContent = "<?php header('Location: ../index.php'); ?>";
file_put_contents($sitemapDir . '/index.php', $indexContent);

// Output success message
echo "Sitemap generated successfully at " . $sitemapDir . "/sitemap.xml\n";
echo "Don't forget to add this to your robots.txt file:\n";
echo "Sitemap: " . $baseUrl . "/sitemaps/sitemap.xml\n";
