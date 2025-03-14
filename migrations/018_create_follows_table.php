<?php

use OneMigrator\Migration;

class CreateFollowsTable extends Migration
{
    public function up(): string
    {
        return "
            CREATE TABLE follows (
                id INT AUTO_INCREMENT PRIMARY KEY,
                follower_id INT NOT NULL,
                followed_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                CONSTRAINT fk_follower_user FOREIGN KEY (follower_id) REFERENCES users(id) ON DELETE CASCADE,
                CONSTRAINT fk_followed_user FOREIGN KEY (followed_id) REFERENCES users(id) ON DELETE CASCADE,
                UNIQUE KEY unique_follow (follower_id, followed_id),
                INDEX idx_follower (follower_id),
                INDEX idx_followed (followed_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
    }

    public function down(): string
    {
        return "DROP TABLE IF EXISTS follows;";
    }
}
