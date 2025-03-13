<?php

use OneMigrator\Migration;

class RemoveCategoriesTables extends Migration
{
    public function up(): string
    {
        return "
            -- Drop blog_category table
            DROP TABLE IF EXISTS blog_category;
            
            -- Drop categories table
            DROP TABLE IF EXISTS categories;
            
            -- Check if category_id column exists in blogs table
            SET @column_exists = (
                SELECT COUNT(*) 
                FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME = 'blogs'
                AND COLUMN_NAME = 'category_id'
            );
            
            -- Remove category_id if it exists
            SET @drop_column = IF(@column_exists > 0,
                'ALTER TABLE blogs DROP COLUMN category_id',
                'SELECT \"Column category_id does not exist in blogs table\" AS message'
            );
            
            PREPARE stmt FROM @drop_column;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        ";
    }

    public function down(): string
    {
        return "
            -- Recreate categories table
            CREATE TABLE IF NOT EXISTS categories (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL UNIQUE,
                slug VARCHAR(100) NOT NULL UNIQUE,
                description TEXT NULL,
                display_order INT NULL,
                parent_id INT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                CONSTRAINT `fk_category_parent` 
                FOREIGN KEY (`parent_id`) 
                REFERENCES `categories` (`id`) 
                ON DELETE SET NULL
            );
            
            -- Recreate blog_category table
            CREATE TABLE IF NOT EXISTS blog_category (
                blog_id INT NOT NULL,
                category_id INT NOT NULL,
                PRIMARY KEY (blog_id, category_id),
                CONSTRAINT `fk_blogcat_blog` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
                CONSTRAINT `fk_blogcat_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
            );
            
            -- Add category_id column to blogs table if it doesn't exist
            SET @column_exists = (
                SELECT COUNT(*) 
                FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME = 'blogs'
                AND COLUMN_NAME = 'category_id'
            );
            
            SET @add_column = IF(@column_exists = 0,
                'ALTER TABLE blogs ADD COLUMN category_id INT NULL AFTER user_id',
                'SELECT \"Column category_id already exists in blogs table\" AS message'
            );
            
            PREPARE stmt FROM @add_column;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        ";
    }
}
?>
