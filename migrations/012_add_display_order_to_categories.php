<?php

use OneMigrator\Migration;

class AddDisplayOrderToCategories extends Migration
{
    public function up(): string
    {
        return "
            -- Check if display_order column already exists
            SET @column_exists = (
                SELECT COUNT(*) 
                FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_SCHEMA = DATABASE() 
                AND TABLE_NAME = 'categories' 
                AND COLUMN_NAME = 'display_order'
            );
            
            -- Add the column if it doesn't exist
            SET @sql = IF(@column_exists = 0, 
                'ALTER TABLE categories ADD COLUMN display_order INT NULL AFTER description;', 
                'SELECT \"Column already exists\" AS message;');
            
            PREPARE stmt FROM @sql;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
            
            -- Update display_order for existing categories
            UPDATE categories SET display_order = id WHERE display_order IS NULL;
        ";
    }

    public function down(): string
    {
        return "
            -- Check if display_order column exists before dropping
            SET @column_exists = (
                SELECT COUNT(*) 
                FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_SCHEMA = DATABASE() 
                AND TABLE_NAME = 'categories' 
                AND COLUMN_NAME = 'display_order'
            );
            
            -- Drop the column if it exists
            SET @sql = IF(@column_exists > 0, 
                'ALTER TABLE categories DROP COLUMN display_order;', 
                'SELECT \"Column does not exist\" AS message;');
            
            PREPARE stmt FROM @sql;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        ";
    }
}
?>
