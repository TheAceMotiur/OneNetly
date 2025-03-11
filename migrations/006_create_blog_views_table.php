<?php

use OneMigrator\Migration;

class CreateBlogViewsTable extends Migration
{
    public function up(): string
    {
        return "
            CREATE TABLE blog_views (
                id INT AUTO_INCREMENT PRIMARY KEY,
                blog_id INT NOT NULL,
                ip_address VARCHAR(45) NOT NULL,
                user_agent TEXT NULL,
                viewed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                CONSTRAINT `fk_blogviews_blog` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
                INDEX `blog_views_blog_id_idx` (`blog_id`),
                INDEX `blog_views_viewed_at_idx` (`viewed_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
    }

    public function down(): string
    {
        return "DROP TABLE IF EXISTS blog_views;";
    }
}
