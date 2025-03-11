<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

use OneMigrator\Migrator;

// If this is being accessed through a browser, output HTML
$isBrowser = php_sapi_name() !== 'cli';
if ($isBrowser) {
    echo '<!DOCTYPE html><html><head><title>OneNetly Migration</title>';
    echo '<style>body{font-family:monospace;padding:20px;max-width:800px;margin:0 auto;line-height:1.6}';
    echo '.success{color:green}.error{color:red}.info{color:blue}</style></head><body>';
    echo '<h1>OneNetly Database Migration</h1>';
    echo '<pre>';
}

try {
    // Check if OneMigrator\Migrator exists
    if (!class_exists('OneMigrator\Migrator')) {
        throw new Exception("OneMigrator\\Migrator class not found. Make sure the package is properly installed.");
    }
    
    // Check for duplicate migration files with same number prefix
    $migrationPath = __DIR__ . '/migrations';
    $files = scandir($migrationPath);
    $prefixMap = [];
    
    foreach ($files as $file) {
        if ($file === '.' || $file === '..' || !is_file($migrationPath . '/' . $file) || substr($file, -4) !== '.php') {
            continue;
        }
        
        // Extract the prefix (e.g., '006' from '006_create_blog_views_table.php')
        if (preg_match('/^(\d{3})_/', $file, $matches)) {
            $prefix = $matches[1];
            if (isset($prefixMap[$prefix])) {
                $output = "<span class='error'>ERROR: Duplicate migration number found!</span>\n";
                $output .= "Files with same prefix '$prefix':\n";
                $output .= "- " . $prefixMap[$prefix] . "\n";
                $output .= "- " . $file . "\n";
                $output .= "\nPlease remove one of these files and try again.";
                
                if ($isBrowser) {
                    echo $output;
                    echo '</pre><p><a href="index.php">Back to homepage</a></p></body></html>';
                } else {
                    echo strip_tags($output);
                }
                exit(1);
            }
            
            $prefixMap[$prefix] = $file;
        }
    }
    
    // Create a new migrator instance
    $migrator = new Migrator($pdo, [
        'migrationsPath' => $migrationPath,
        'migrationsTable' => 'migrations'
    ]);

    // Run all pending migrations
    $result = $migrator->migrate();
    $output = "<span class='success'>Migration executed successfully!</span>\n";
    $output .= "Applied migrations: " . (empty($result['executed']) ? "none" : implode(', ', $result['executed'])) . "\n";
    $output .= "Skipped migrations: " . (empty($result['skipped']) ? "none" : implode(', ', $result['skipped'])) . "\n";
    
    // Check if we need to show specific info about comments table
    if (in_array('007_create_comments_table.php', $result['executed'])) {
        $output .= "\n<span class='info'>Comments table has been created successfully! The comments feature is now available.</span>\n";
    }
    
    if ($isBrowser) {
        echo $output;
    } else {
        echo strip_tags($output);
    }
} catch (Exception $e) {
    $output = "<span class='error'>Migration failed: " . $e->getMessage() . "</span>\n";
    $output .= "File: " . $e->getFile() . " on line " . $e->getLine() . "\n\n";
    
    // Print debug information
    $output .= "Debug information:\n";
    $output .= "PHP version: " . PHP_VERSION . "\n";
    $output .= "Autoloader paths:\n";
    foreach (get_declared_classes() as $class) {
        if (strpos($class, 'OneMigrator') === 0) {
            $output .= "- $class\n";
        }
    }
    
    if ($isBrowser) {
        echo $output;
    } else {
        echo strip_tags($output);
    }
    exit(1);
}

// Close HTML tags if running in browser
if ($isBrowser) {
    echo '</pre>';
    echo '<p><a href="index.php">Back to homepage</a></p>';
    echo '</body></html>';
}
