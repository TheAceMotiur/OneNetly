<?php
/**
 * Migration to add smtp_encryption column to site_config table
 */

require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/classes/Settings.php';

try {
    // Check if the column already exists
    $checkStmt = $pdo->prepare("
        SELECT COUNT(*) FROM information_schema.columns 
        WHERE table_schema = DATABASE() 
        AND table_name = 'site_config' 
        AND column_name = 'smtp_encryption'
    ");
    $checkStmt->execute();
    $columnExists = (bool)$checkStmt->fetchColumn();
    
    if (!$columnExists) {
        // Add the column to the site_config table
        $pdo->exec("ALTER TABLE site_config ADD COLUMN smtp_encryption VARCHAR(10) DEFAULT 'tls'");
        
        // Migrate data from settings table if it exists
        $settings = new Settings($pdo);
        $smtpSecure = $settings->get('smtp_secure', 'tls');
        
        // Update the newly created column with the value from settings
        $updateStmt = $pdo->prepare("UPDATE site_config SET smtp_encryption = ? WHERE 1");
        $updateStmt->execute([$smtpSecure]);
        
        echo "Successfully added smtp_encryption column and migrated existing data.\n";
    } else {
        echo "Column smtp_encryption already exists. No action taken.\n";
    }
} catch (PDOException $e) {
    echo "Migration failed: " . $e->getMessage() . "\n";
    exit(1);
}

echo "Migration completed successfully.\n";
