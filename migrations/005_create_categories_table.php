<?php

use OneMigrator\Migration;

class CreateCategoriesTable extends Migration
{
    public function up(): string
    {
        return "
            CREATE TABLE categories (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL UNIQUE,
                slug VARCHAR(100) NOT NULL UNIQUE,
                description TEXT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            
            CREATE TABLE blog_category (
                blog_id INT NOT NULL,
                category_id INT NOT NULL,
                PRIMARY KEY (blog_id, category_id),
                CONSTRAINT `fk_blogcat_blog` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
                CONSTRAINT `fk_blogcat_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
    }

    public function down(): string
    {
        return "
            DROP TABLE IF EXISTS blog_category;
            DROP TABLE IF EXISTS categories;
        ";
    }
}
