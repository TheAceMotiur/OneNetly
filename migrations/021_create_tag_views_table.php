<?php

use OneMigrator\Migration;

class CreateTagViewsTable extends Migration
{
    public function up(): string
    {
        return "
            CREATE TABLE tag_views (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                tag VARCHAR(255) NOT NULL,
                view_count INT DEFAULT 1,
                last_viewed TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                UNIQUE KEY user_tag (user_id, tag),
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
    }

    public function down(): string
    {
        return "DROP TABLE IF EXISTS tag_views;";
    }
}
