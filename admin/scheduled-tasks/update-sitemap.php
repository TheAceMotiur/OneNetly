<?php
/**
 * Sitemap Update Script for OneNetly
 * 
 * This file can be run via cron job (e.g., daily) to update the sitemap.xml
 * Example cron: 0 2 * * * php /path/to/update-sitemap.php
 */

// Set the execution time to unlimited for large sites
set_time_limit(0);

// Include necessary files
require_once '../../includes/init.php';

// Log function
function logMessage($message) {
    echo date('Y-m-d H:i:s') . " - {$message}\n";
}

logMessage("Starting sitemap generation...");

try {
    // Include the sitemap generator
    require_once '../../sitemaps/sitemap-generator.php';
    
    logMessage("Sitemap generated successfully!");
    
    // Update robots.txt file with correct sitemap URL
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $domain = '';
    
    // Try to get domain from site_config
    try {
        $stmt = $pdo->query("SELECT site_url FROM site_config LIMIT 1");
        $config = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($config['site_url'])) {
            $domain = rtrim($config['site_url'], '/');
        }
    } catch (PDOException $e) {
        logMessage("Warning: Could not get site URL from database. Using fallback.");
    }
    
    // Fallback to HTTP_HOST if available
    if (empty($domain) && isset($_SERVER['HTTP_HOST'])) {
        $domain = $protocol . '://' . $_SERVER['HTTP_HOST'];
    }
    
    // Use default if still empty
    if (empty($domain)) {
        $domain = 'https://yourdomain.com';
        logMessage("Warning: Using default domain in robots.txt");
    }
    
    // Read robots.txt
    $robotsPath = '../../robots.txt';
    if (file_exists($robotsPath)) {
        $robotsContent = file_get_contents($robotsPath);
        
        // Update the Sitemap URL
        $pattern = '/Sitemap: .*sitemap\.xml/';
        $replacement = "Sitemap: $domain/sitemaps/sitemap.xml";
        $newContent = preg_replace($pattern, $replacement, $robotsContent);
        
        if ($newContent !== $robotsContent) {
            file_put_contents($robotsPath, $newContent);
            logMessage("Updated sitemap URL in robots.txt");
        }
    } else {
        logMessage("Warning: robots.txt not found");
    }
    
    // Ping search engines about the updated sitemap
    $sitemapUrl = urlencode("$domain/sitemaps/sitemap.xml");
    
    $googlePingUrl = "https://www.google.com/ping?sitemap=$sitemapUrl";
    $bingPingUrl = "https://www.bing.com/ping?sitemap=$sitemapUrl";
    
    // Function to ping a URL
    function pingSearchEngine($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $httpCode;
    }
    
    // Ping Google
    $googleResponse = pingSearchEngine($googlePingUrl);
    logMessage("Google ping response: HTTP $googleResponse");
    
    // Ping Bing
    $bingResponse = pingSearchEngine($bingPingUrl);
    logMessage("Bing ping response: HTTP $bingResponse");
    
    logMessage("Sitemap update process completed successfully");
    
} catch (Exception $e) {
    logMessage("Error: " . $e->getMessage());
    exit(1);
}
