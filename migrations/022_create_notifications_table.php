<?php

use OneMigrator\Migration;

class CreateNotificationsTable extends Migration
{
    public function up(): string
    {
        return "
            CREATE TABLE notifications (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                type VARCHAR(50) NOT NULL,
                data JSON NOT NULL,
                is_read BOOLEAN DEFAULT FALSE,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
    }

    public function down(): string
    {
        return "DROP TABLE IF EXISTS notifications;";
    }
}
