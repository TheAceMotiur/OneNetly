<?php

use OneMigrator\Migration;

class AddSmtpEncryptionColumn extends Migration
{
    public function up(): string
    {
        return "
            -- First verify if we need to copy data from settings table
            SET @settings_count = (
                SELECT COUNT(*) FROM information_schema.tables 
                WHERE table_schema = DATABASE() AND table_name = 'settings'
            );
            
            -- Check if the site_config table exists
            SET @table_exists = (
                SELECT COUNT(*)
                FROM information_schema.tables
                WHERE table_schema = DATABASE()
                AND table_name = 'site_config'
            );

            -- Check if smtp_encryption column exists
            SET @column_exists = (
                SELECT COUNT(*)
                FROM information_schema.columns
                WHERE table_schema = DATABASE()
                AND table_name = 'site_config'
                AND column_name = 'smtp_encryption'
            );

            -- Add smtp_encryption column if table exists but column doesn't
            SET @add_column = IF(@table_exists > 0 AND @column_exists = 0,
                'ALTER TABLE site_config ADD COLUMN smtp_encryption VARCHAR(10) DEFAULT \"tls\" AFTER smtp_port',
                'SELECT \"Column already exists or table does not exist\"'
            );

            PREPARE stmt FROM @add_column;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
            
            -- Copy data from settings if available
            SET @copy_data = IF(@table_exists > 0 AND @settings_count > 0,
                'UPDATE site_config sc SET sc.smtp_encryption = (SELECT value FROM settings WHERE name = \"smtp_secure\" LIMIT 1) WHERE (SELECT value FROM settings WHERE name = \"smtp_secure\" LIMIT 1) IS NOT NULL',
                'SELECT \"Cannot copy data from settings\"'
            );
            
            PREPARE stmt FROM @copy_data;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        ";
    }

    public function down(): string
    {
        return "
            -- Check if the site_config table and column exist
            SET @column_exists = (
                SELECT COUNT(*)
                FROM information_schema.columns
                WHERE table_schema = DATABASE()
                AND table_name = 'site_config'
                AND column_name = 'smtp_encryption'
            );

            -- Drop the column if it exists
            SET @drop_column = IF(@column_exists > 0,
                'ALTER TABLE site_config DROP COLUMN smtp_encryption',
                'SELECT \"Column smtp_encryption does not exist\"'
            );

            PREPARE stmt FROM @drop_column;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        ";
    }
}
