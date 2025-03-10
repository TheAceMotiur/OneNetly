<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

use OneMigrator\Migrator;

try {
    // Check if OneMigrator\Migrator exists
    if (!class_exists('OneMigrator\Migrator')) {
        throw new Exception("OneMigrator\\Migrator class not found. Make sure the package is properly installed.");
    }
    
    // Create a new migrator instance
    $migrator = new Migrator($pdo, [
        'migrationsPath' => __DIR__ . '/migrations',
        'migrationsTable' => 'migrations'
    ]);

    // Run all pending migrations
    $result = $migrator->migrate();
    echo "Migration executed successfully! \n";
    echo "Applied migrations: " . (empty($result['executed']) ? "none" : implode(', ', $result['executed'])) . "\n";
    echo "Skipped migrations: " . (empty($result['skipped']) ? "none" : implode(', ', $result['skipped'])) . "\n";
} catch (Exception $e) {
    echo "Migration failed: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . " on line " . $e->getLine() . "\n";
    
    // Print debug information
    echo "Debug information:\n";
    echo "PHP version: " . PHP_VERSION . "\n";
    echo "Autoloader paths:\n";
    foreach (get_declared_classes() as $class) {
        if (strpos($class, 'OneMigrator') === 0) {
            echo "- $class\n";
        }
    }
}
