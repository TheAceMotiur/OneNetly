<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/models/Category.php';
require_once __DIR__ . '/models/Post.php';

// Disable output buffering
if(ob_get_level()) ob_end_clean();

// Set appropriate header for XML content
header('Content-Type: application/xml; charset=utf-8');

// Get data for sitemap
$categoryModel = new Category();
$postModel = new Post();

// Get all categories
$categories = $categoryModel->getAll();

// Get all posts
$allPosts = $postModel->getAll(5000, 0); // Get up to 5000 posts

// Get the current base URL
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'];

// Generate the XML sitemap
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Add homepage
echo "  <url>\n";
echo "    <loc>{$baseUrl}</loc>\n";
echo "    <changefreq>daily</changefreq>\n";
echo "    <priority>1.0</priority>\n";
echo "  </url>\n";

// Add category list page
echo "  <url>\n";
echo "    <loc>{$baseUrl}/category-list</loc>\n";
echo "    <changefreq>weekly</changefreq>\n";
echo "    <priority>0.8</priority>\n";
echo "  </url>\n";

// Add each category
foreach ($categories as $category) {
    echo "  <url>\n";
    echo "    <loc>{$baseUrl}/category/" . htmlspecialchars($category['slug']) . "</loc>\n";
    echo "    <changefreq>weekly</changefreq>\n";
    echo "    <priority>0.7</priority>\n";
    echo "  </url>\n";
}

// Add each post
foreach ($allPosts as $post) {
    $lastMod = date('c', strtotime($post['updated_at']));
    echo "  <url>\n";
    echo "    <loc>{$baseUrl}/post/" . htmlspecialchars($post['slug']) . "</loc>\n";
    echo "    <lastmod>{$lastMod}</lastmod>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.6</priority>\n";
    echo "  </url>\n";
}

// Close XML
echo "</urlset>";
