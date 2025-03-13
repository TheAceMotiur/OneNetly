<?php

use OneMigrator\Migration;

class UpdateBlogsSchema extends Migration
{
    public function up(): string
    {
        return "
            -- Create blog_views table if it doesn't exist
            CREATE TABLE IF NOT EXISTS blog_views (
                id INT AUTO_INCREMENT PRIMARY KEY,
                blog_id INT NOT NULL,
                ip_address VARCHAR(50),
                user_agent VARCHAR(255),
                viewed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (blog_id) REFERENCES blogs(id) ON DELETE CASCADE
            );
            
            -- Check if 'tags' column exists in blogs table
            SET @column_exists = (
                SELECT COUNT(*) 
                FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME = 'blogs'
                AND COLUMN_NAME = 'tags'
            );
            
            -- Add tags column if it doesn't exist
            SET @add_column = IF(@column_exists = 0,
                'ALTER TABLE blogs ADD COLUMN tags TEXT AFTER status',
                'SELECT \"Column tags already exists in blogs table\" AS message'
            );
            
            PREPARE stmt FROM @add_column;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
            
            -- Create reading_list table if it doesn't exist
            CREATE TABLE IF NOT EXISTS reading_list (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                blog_id INT NOT NULL,
                added_at DATETIME NOT NULL,
                UNIQUE KEY user_blog (user_id, blog_id),
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
                FOREIGN KEY (blog_id) REFERENCES blogs(id) ON DELETE CASCADE
            );
        ";
    }

    public function down(): string
    {
        return "
            -- Drop reading_list table if it exists
            DROP TABLE IF EXISTS reading_list;
            
            -- Check if 'tags' column exists before attempting to drop
            SET @column_exists = (
                SELECT COUNT(*) 
                FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME = 'blogs'
                AND COLUMN_NAME = 'tags'
            );
            
            -- Remove tags column if it exists
            SET @drop_column = IF(@column_exists > 0,
                'ALTER TABLE blogs DROP COLUMN tags',
                'SELECT \"Column tags does not exist in blogs table\" AS message'
            );
            
            PREPARE stmt FROM @drop_column;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
            
            -- We don't drop the blog_views table in down migration to preserve view data
        ";
    }
}
