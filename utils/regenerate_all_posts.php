<?php
/**
 * Post Regeneration Utility
 * 
 * This script regenerates content for all existing posts to improve their formatting
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../services/OpenRouterService.php';
require_once __DIR__ . '/../models/Database.php';

// Check if we should run in list-only mode
$listOnly = isset($argv[1]) && $argv[1] === '--list';
// Check if a specific post ID is provided
$specificPostId = isset($argv[1]) && is_numeric($argv[1]) ? (int)$argv[1] : null;

echo "======= Post Regenerator =======\n\n";

try {
    // Get all posts
    $postModel = new Post();
    $posts = $postModel->getAll(1000, 0); // Get up to 1000 posts
    
    if (empty($posts)) {
        echo "No posts found in the database.\n";
        exit(0);
    }
    
    echo "Found " . count($posts) . " posts in the database.\n\n";
    
    // If list-only mode or no specific post ID, show the list
    if ($listOnly || ($specificPostId === null)) {
        echo "Available posts:\n";
        echo "---------------\n";
        
        foreach ($posts as $post) {
            echo "ID: {$post['id']} | {$post['title']}\n";
        }
        
        if ($listOnly) {
            echo "\nTo regenerate a specific post, run: php utils/regenerate_all_posts.php [post_id]\n";
            echo "To regenerate all posts, run: php utils/regenerate_all_posts.php --all\n";
            exit(0);
        }
    }
    
    // If a specific post ID was provided, filter to just that post
    if ($specificPostId !== null) {
        $filtered = array_filter($posts, function($post) use ($specificPostId) {
            return (int)$post['id'] === $specificPostId;
        });
        
        if (empty($filtered)) {
            echo "No post found with ID: $specificPostId\n";
            exit(1);
        }
        
        $posts = $filtered;
        echo "Will regenerate only post ID: $specificPostId\n\n";
    } else {
        // No specific post, check for --all flag
        $regenerateAll = isset($argv[1]) && $argv[1] === '--all';
        if (!$regenerateAll) {
            echo "\nTo regenerate all posts, run with --all parameter: php utils/regenerate_all_posts.php --all\n";
            exit(0);
        }
        
        echo "Preparing to regenerate all " . count($posts) . " posts...\n\n";
        
        // Ask for confirmation before proceeding with all posts
        echo "This will regenerate content for all posts. Continue? (y/n) ";
        $handle = fopen("php://stdin", "r");
        $line = fgets($handle);
        if (trim(strtolower($line)) !== 'y') {
            echo "Operation aborted.\n";
            exit(0);
        }
    }
    
    // Initialize services
    $service = new OpenRouterService();
    $db = Database::getInstance();
    $successCount = 0;
    $failCount = 0;
    
    // Process each post
    foreach ($posts as $post) {
        echo "\nProcessing post ID {$post['id']}: {$post['title']}\n";
        echo "-------------------------------------------------------\n";
        
        // Get original HTML structure metrics
        $originalContent = $post['content'];
        $originalStructure = [
            'h1_tags' => preg_match_all('/<h1[^>]*>/', $originalContent, $matches),
            'h2_tags' => preg_match_all('/<h2[^>]*>/', $originalContent, $matches),
            'h3_tags' => preg_match_all('/<h3[^>]*>/', $originalContent, $matches),
            'p_tags' => preg_match_all('/<p[^>]*>/', $originalContent, $matches),
            'ul_tags' => preg_match_all('/<ul[^>]*>/', $originalContent, $matches),
            'ol_tags' => preg_match_all('/<ol[^>]*>/', $originalContent, $matches),
        ];
        
        // Check if the post already has good structure
        $hasGoodStructure = ($originalStructure['h2_tags'] >= 3 && $originalStructure['p_tags'] >= 10);
        
        if ($hasGoodStructure) {
            echo "Post already has good structure. Skipping regeneration.\n";
            echo "Current structure: {$originalStructure['h2_tags']} h2 tags, {$originalStructure['p_tags']} paragraphs\n";
            continue;
        }
        
        try {
            // Generate new content based on the post title
            echo "Regenerating content...\n";
            $newContent = $service->generateContent($post['title'], $post['title'], 2000);
            
            // Get new structure metrics
            $newStructure = [
                'h1_tags' => preg_match_all('/<h1[^>]*>/', $newContent, $matches),
                'h2_tags' => preg_match_all('/<h2[^>]*>/', $newContent, $matches),
                'h3_tags' => preg_match_all('/<h3[^>]*>/', $newContent, $matches),
                'p_tags' => preg_match_all('/<p[^>]*>/', $newContent, $matches),
                'ul_tags' => preg_match_all('/<ul[^>]*>/', $newContent, $matches),
                'ol_tags' => preg_match_all('/<ol[^>]*>/', $newContent, $matches),
            ];
            
            echo "Original structure: {$originalStructure['h2_tags']} h2 tags, {$originalStructure['p_tags']} paragraphs\n";
            echo "New structure: {$newStructure['h2_tags']} h2 tags, {$newStructure['p_tags']} paragraphs\n";
            
            // Update the post content in the database
            $db->query(
                "UPDATE posts SET content = ?, updated_at = NOW() WHERE id = ?",
                [$newContent, $post['id']]
            );
            
            echo "✓ Post ID {$post['id']} successfully regenerated!\n";
            $successCount++;
            
        } catch (Exception $e) {
            echo "✗ Error regenerating post ID {$post['id']}: " . $e->getMessage() . "\n";
            $failCount++;
        }
    }
    
    echo "\nRegeneration complete: $successCount posts successfully updated, $failCount failed\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
