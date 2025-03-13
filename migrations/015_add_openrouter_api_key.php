<?php

use OneMigrator\Migration;

class AddOpenrouterApiKey extends Migration
{
    public function up(): string
    {
        return "
            -- Check if the site_config table exists
            SET @table_exists = (
                SELECT COUNT(*)
                FROM information_schema.tables
                WHERE table_schema = DATABASE()
                AND table_name = 'site_config'
            );

            -- Create site_config table if it doesn't exist
            SET @create_table = IF(@table_exists = 0,
                'CREATE TABLE site_config (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    site_name VARCHAR(255),
                    site_description TEXT,
                    site_keywords TEXT,
                    google_analytics_id VARCHAR(50),
                    google_site_verification VARCHAR(100),
                    bing_site_verification VARCHAR(100),
                    smtp_host VARCHAR(255),
                    smtp_port INT DEFAULT 587,
                    smtp_username VARCHAR(255),
                    smtp_password VARCHAR(255),
                    smtp_encryption VARCHAR(10),
                    openrouter_api_key VARCHAR(255),
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )',
                'SELECT \"Table site_config already exists\" AS message'
            );

            PREPARE stmt FROM @create_table;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;

            -- Add openrouter_api_key column if table exists but column doesn't
            SET @column_exists = (
                SELECT COUNT(*)
                FROM information_schema.columns
                WHERE table_schema = DATABASE()
                AND table_name = 'site_config'
                AND column_name = 'openrouter_api_key'
            );

            SET @add_column = IF(@column_exists = 0,
                'ALTER TABLE site_config ADD COLUMN openrouter_api_key VARCHAR(255) AFTER smtp_encryption',
                'SELECT \"Column openrouter_api_key already exists\" AS message'
            );

            PREPARE stmt FROM @add_column;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        ";
    }

    public function down(): string
    {
        return "
            -- Check if column exists before dropping
            SET @column_exists = (
                SELECT COUNT(*)
                FROM information_schema.columns
                WHERE table_schema = DATABASE()
                AND table_name = 'site_config'
                AND column_name = 'openrouter_api_key'
            );

            SET @drop_column = IF(@column_exists > 0,
                'ALTER TABLE site_config DROP COLUMN openrouter_api_key',
                'SELECT \"Column openrouter_api_key does not exist\" AS message'
            );

            PREPARE stmt FROM @drop_column;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        ";
    }
}
