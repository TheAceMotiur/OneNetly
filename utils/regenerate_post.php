<?php
/**
 * Post Regenerator Utility
 * 
 * This script regenerates content for an existing post to improve its formatting
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../services/OpenRouterService.php';

// Check if post ID is provided
if ($argc < 2) {
    echo "Usage: php regenerate_post.php [post_id]\n";
    echo "Example: php regenerate_post.php 5\n";
    exit(1);
}

$postId = (int)$argv[1];

echo "======= Post Regenerator =======\n\n";
echo "Regenerating content for post ID: $postId\n\n";

try {
    // Get the post
    $postModel = new Post();
    $post = $postModel->getById($postId);
    
    if (!$post) {
        echo "Post not found with ID: $postId\n";
        exit(1);
    }
    
    echo "Found post: " . $post['title'] . "\n";
    
    // Get the original content structure quality
    echo "Checking original content structure...\n";
    $originalContent = $post['content'];
    $originalStructure = [
        'h1_tags' => preg_match_all('/<h1[^>]*>/', $originalContent, $matches),
        'h2_tags' => preg_match_all('/<h2[^>]*>/', $originalContent, $matches),
        'h3_tags' => preg_match_all('/<h3[^>]*>/', $originalContent, $matches),
        'p_tags' => preg_match_all('/<p[^>]*>/', $originalContent, $matches),
        'ul_tags' => preg_match_all('/<ul[^>]*>/', $originalContent, $matches),
        'ol_tags' => preg_match_all('/<ol[^>]*>/', $originalContent, $matches),
        'li_tags' => preg_match_all('/<li[^>]*>/', $originalContent, $matches),
        'strong_tags' => preg_match_all('/<strong[^>]*>/', $originalContent, $matches),
        'em_tags' => preg_match_all('/<em[^>]*>/', $originalContent, $matches),
    ];
    
    echo "Original content structure:\n";
    foreach ($originalStructure as $tag => $count) {
        echo "- $tag: $count\n";
    }
    
    // Ask for confirmation
    echo "\nDo you want to regenerate this post content? (y/n) ";
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    if (trim(strtolower($line)) != 'y') {
        echo "Regeneration aborted.\n";
        exit;
    }
    
    // Generate new content
    echo "\nRegenerating content...\n";
    $service = new OpenRouterService();
    $newContent = $service->generateContent($post['title'], $post['title'], 2000);
    
    // Get the new content structure quality
    echo "Checking new content structure...\n";
    $newStructure = [
        'h1_tags' => preg_match_all('/<h1[^>]*>/', $newContent, $matches),
        'h2_tags' => preg_match_all('/<h2[^>]*>/', $newContent, $matches),
        'h3_tags' => preg_match_all('/<h3[^>]*>/', $newContent, $matches),
        'p_tags' => preg_match_all('/<p[^>]*>/', $newContent, $matches),
        'ul_tags' => preg_match_all('/<ul[^>]*>/', $newContent, $matches),
        'ol_tags' => preg_match_all('/<ol[^>]*>/', $newContent, $matches),
        'li_tags' => preg_match_all('/<li[^>]*>/', $newContent, $matches),
        'strong_tags' => preg_match_all('/<strong[^>]*>/', $newContent, $matches),
        'em_tags' => preg_match_all('/<em[^>]*>/', $newContent, $matches),
    ];
    
    echo "New content structure:\n";
    foreach ($newStructure as $tag => $count) {
        echo "- $tag: $count\n";
    }
    
    // Save HTML files for comparison
    $originalHtml = '<!DOCTYPE html><html><head><title>Original</title><style>body{font-family:Arial;max-width:800px;margin:0 auto;padding:20px}</style></head><body><h1>Original Content</h1>' . $originalContent . '</body></html>';
    $newHtml = '<!DOCTYPE html><html><head><title>New</title><style>body{font-family:Arial;max-width:800px;margin:0 auto;padding:20px}</style></head><body><h1>New Content</h1>' . $newContent . '</body></html>';
    
    file_put_contents(__DIR__ . '/../original_post.html', $originalHtml);
    file_put_contents(__DIR__ . '/../new_post.html', $newHtml);
    
    echo "\nHTML comparison files created:\n";
    echo "- original_post.html\n";
    echo "- new_post.html\n";
    
    // Ask for confirmation to update
    echo "\nDo you want to update the post with the new content? (y/n) ";
    $line = fgets($handle);
    fclose($handle);
    
    if (trim(strtolower($line)) == 'y') {
        // Update the database with new content
        $db = Database::getInstance();
        $db->query(
            "UPDATE posts SET content = ?, updated_at = NOW() WHERE id = ?",
            [$newContent, $postId]
        );
        
        echo "Post content updated successfully!\n";
    } else {
        echo "Post update aborted.\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
