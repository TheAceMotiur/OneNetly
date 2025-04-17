<?php

/**
 * Database and initial setup utility script
 * 
 * This script:
 * 1. Creates the database if it doesn't exist
 * 2. Runs migrations to set up tables
 * 3. Adds sample categories
 * 4. Adds API keys from config
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/ApiKey.php';

try {
    // Step 1: Check if database exists, if not create it
    $rootPdo = new PDO(
        'mysql:host=' . DB_HOST,
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    // Create database if it doesn't exist
    $rootPdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Database created or already exists.\n";
    
    // Step 2: Run migrations
    require_once __DIR__ . '/../database/migrations/001_create_tables.php';
    echo "Tables created successfully.\n";
    
    // Step 3: Add sample categories
    $categoryModel = new Category();
    
    $sampleCategories = [
        ["name" => "Technology", "slug" => "technology", "description" => "Latest technology trends, news, and insights."],
        ["name" => "Health", "slug" => "health", "description" => "Health tips, medical research, and wellness advice."],
        ["name" => "Travel", "slug" => "travel", "description" => "Travel guides, destination reviews, and adventure stories."],
        ["name" => "Food", "slug" => "food", "description" => "Recipes, cooking tips, and food culture from around the world."],
        ["name" => "Finance", "slug" => "finance", "description" => "Personal finance, investing, and economic news."],
        ["name" => "Lifestyle", "slug" => "lifestyle", "description" => "Fashion, home, relationships, and personal growth."],
        ["name" => "Sports", "slug" => "sports", "description" => "Sports news, analysis, and athlete profiles."],
        ["name" => "Science", "slug" => "science", "description" => "Scientific discoveries, research breakthroughs, and space exploration."],
        ["name" => "Education", "slug" => "education", "description" => "Learning resources, educational trends, and academic insights."],
        ["name" => "Entertainment", "slug" => "entertainment", "description" => "Movies, music, books, and celebrity news."]
    ];
    
    foreach ($sampleCategories as $category) {
        // Add created_at and updated_at
        $category['created_at'] = date('Y-m-d H:i:s');
        $category['updated_at'] = date('Y-m-d H:i:s');
        
        try {
            $categoryModel->create($category);
            echo "Added category: {$category['name']}\n";
        } catch (PDOException $e) {
            // Likely duplicate, skip
            echo "Skipped category (may already exist): {$category['name']}\n";
        }
    }
    
    // Step 4: Add API keys from config
    $apiKeyModel = new ApiKey();
    
    // Add OpenRouter API keys - improved error handling
    if (defined('OPENROUTER_API_KEYS') && is_array(OPENROUTER_API_KEYS) && count(OPENROUTER_API_KEYS) > 0) {
        $addedCount = 0;
        $errorCount = 0;
        
        foreach (OPENROUTER_API_KEYS as $index => $key) {
            if (!empty($key)) {
                try {
                    $apiKeyModel->add('openrouter', $key);
                    echo "Added OpenRouter API key #" . ($index+1) . ".\n";
                    $addedCount++;
                } catch (PDOException $e) {
                    echo "Skipped API key #" . ($index+1) . " (may already exist).\n";
                    $errorCount++;
                }
            } else {
                echo "Warning: Empty OpenRouter API key at index $index.\n";
                $errorCount++;
            }
        }
        
        echo "OpenRouter API keys summary: $addedCount added, $errorCount skipped/errors\n";
        
        // Verify we have at least one key
        $keys = $apiKeyModel->getAll('openrouter');
        if (count($keys) == 0) {
            echo "\nWARNING: No OpenRouter API keys were successfully added to the database!\n";
            echo "Content generation will fail without valid API keys.\n";
        }
    } else {
        echo "\nERROR: OpenRouter API keys are missing or invalid in config/app.php!\n";
        echo "Please define OPENROUTER_API_KEYS as an array of valid API keys.\n";
    }
    
    // Add Pixabay API key
    try {
        $apiKeyModel->add('pixabay', PIXABAY_API_KEY);
        echo "Added Pixabay API key.\n";
    } catch (PDOException $e) {
        echo "Skipped Pixabay API key (may already exist).\n";
    }
    
    // Add Unsplash API key
    try {
        $apiKeyModel->add('unsplash', UNSPLASH_API_KEY);
        echo "Added Unsplash API key.\n";
    } catch (PDOException $e) {
        echo "Skipped Unsplash API key (may already exist).\n";
    }
    
    echo "\nSetup completed successfully!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
