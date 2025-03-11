<?php

use OneMigrator\Migration;

class CreateCommentsTable extends Migration
{
    public function up(): string
    {
        return "
            CREATE TABLE comments (
                id INT AUTO_INCREMENT PRIMARY KEY,
                blog_id INT NOT NULL,
                user_id INT NOT NULL,
                content TEXT NOT NULL,
                status ENUM('approved', 'pending', 'spam') NOT NULL DEFAULT 'pending',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                CONSTRAINT `fk_comments_blog` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
                CONSTRAINT `fk_comments_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
                INDEX `comments_blog_id_idx` (`blog_id`),
                INDEX `comments_user_id_idx` (`user_id`),
                INDEX `comments_status_idx` (`status`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
    }

    public function down(): string
    {
        return "DROP TABLE IF EXISTS comments;";
    }
}
