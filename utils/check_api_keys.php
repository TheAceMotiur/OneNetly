<?php

/**
 * API Key diagnostic utility
 * This script checks whether API keys are properly configured and accessible
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../models/ApiKey.php';

echo "======= API Key Configuration Check =======\n\n";

// Check config constants
echo "Checking configuration constants:\n";
echo "--------------------------------\n";

// Check OpenRouter keys
if (defined('OPENROUTER_API_KEYS')) {
    if (is_array(OPENROUTER_API_KEYS) && count(OPENROUTER_API_KEYS) > 0) {
        echo "✓ OpenRouter API Keys: " . count(OPENROUTER_API_KEYS) . " key(s) defined in config\n";
        
        foreach (OPENROUTER_API_KEYS as $index => $key) {
            if (!empty($key)) {
                echo "  ✓ Key #" . ($index+1) . ": " . substr($key, 0, 10) . "...\n";
            } else {
                echo "  ✗ Key #" . ($index+1) . ": EMPTY\n";
            }
        }
    } else {
        echo "✗ OpenRouter API Keys: No valid keys defined in config\n";
    }
} else {
    echo "✗ OpenRouter API Keys: Not defined in config\n";
}

// Check Pixabay key
if (defined('PIXABAY_API_KEY') && !empty(PIXABAY_API_KEY)) {
    echo "✓ Pixabay API Key: Defined in config\n";
} else {
    echo "✗ Pixabay API Key: Not defined or empty in config\n";
}

// Check Unsplash key
if (defined('UNSPLASH_API_KEY') && !empty(UNSPLASH_API_KEY)) {
    echo "✓ Unsplash API Key: Defined in config\n";
} else {
    echo "✗ Unsplash API Key: Not defined or empty in config\n";
}

echo "\nChecking database API keys:\n";
echo "-------------------------\n";

$apiKeyModel = new ApiKey();

// Check database table structure first
echo "Verifying database table structure...\n";
try {
    $db = Database::getInstance();
    $tableInfo = $db->fetch("SHOW CREATE TABLE api_keys");
    if ($tableInfo) {
        echo "✓ API keys table exists\n";
        echo "Table structure:\n";
        $createTable = $tableInfo['Create Table'] ?? '';
        
        // Check if `key` column is properly escaped in table definition
        if (strpos($createTable, '`key`') !== false) {
            echo "✓ Table has properly escaped `key` column\n";
        } else {
            echo "✗ WARNING: 'key' column might not be properly escaped in the table definition\n";
        }
    } else {
        echo "✗ Could not retrieve API keys table structure\n";
    }
} catch (Exception $e) {
    echo "✗ Error checking table structure: " . $e->getMessage() . "\n";
}

// Check OpenRouter keys in DB
try {
    $keys = $apiKeyModel->getAll('openrouter');
    if (count($keys) > 0) {
        echo "✓ OpenRouter API Keys: " . count($keys) . " key(s) in database\n";
    } else {
        echo "✗ OpenRouter API Keys: No keys found in database\n";
        // Try to import from config
        if (defined('OPENROUTER_API_KEYS') && is_array(OPENROUTER_API_KEYS) && count(OPENROUTER_API_KEYS) > 0) {
            echo "  Attempting to import OpenRouter keys from config...\n";
            $importCount = 0;
            foreach (OPENROUTER_API_KEYS as $key) {
                if (!empty($key)) {
                    try {
                        $apiKeyModel->add('openrouter', $key);
                        echo "  ✓ Successfully imported key: " . substr($key, 0, 10) . "...\n";
                        $importCount++;
                    } catch (Exception $e) {
                        echo "  ✗ Import failed: " . $e->getMessage() . "\n";
                    }
                }
            }
            if ($importCount > 0) {
                echo "  ✓ Imported $importCount OpenRouter keys from config\n";
            } else {
                echo "  ✗ Failed to import any OpenRouter keys\n";
            }
        }
    }
} catch (Exception $e) {
    echo "✗ Error checking OpenRouter keys: " . $e->getMessage() . "\n";
}

// Try to get a key for OpenRouter
try {
    $key = $apiKeyModel->getNextAvailableKey('openrouter');
    if ($key) {
        echo "✓ Successfully retrieved an OpenRouter API key for use\n";
        echo "  Key ID: " . $key['id'] . ", Usage count: " . $key['usage_count'] . "\n";
    } else {
        echo "✗ Failed to retrieve any OpenRouter API key\n";
    }
} catch (Exception $e) {
    echo "✗ Error retrieving OpenRouter key: " . $e->getMessage() . "\n";
}

// Test manual insertion with properly escaped column name
echo "\nTesting direct API key insertion with escaped column name...\n";
try {
    $db = Database::getInstance();
    $testKey = 'test-key-' . time();
    $stmt = $db->getConnection()->prepare("INSERT INTO api_keys (service, `key`, usage_count, is_active) VALUES ('test', ?, 0, 1)");
    $stmt->execute([$testKey]);
    $lastId = $db->getConnection()->lastInsertId();
    echo "✓ Test key insertion successful, ID: $lastId\n";
    
    // Clean up test key
    $db->query("DELETE FROM api_keys WHERE id = ?", [$lastId]);
    echo "✓ Test key removed\n";
} catch (Exception $e) {
    echo "✗ Test insertion failed: " . $e->getMessage() . "\n";
}

echo "\nSuggestions:\n";
echo "-----------\n";
echo "1. If no keys are in the database, run setup.php to import them\n";
echo "2. Check your config/app.php file for properly defined API keys\n";
echo "3. Ensure database connection is working properly\n";
echo "4. Try running: php utils/setup.php to reinitialize the database\n";
echo "5. If errors persist, check the column names in your database tables for reserved words\n";
