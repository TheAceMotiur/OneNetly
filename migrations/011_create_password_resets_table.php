<?php

use OneMigrator\Migration;

class CreatePasswordResetsTable extends Migration
{
    public function up(): string
    {
        return "
            CREATE TABLE password_resets (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                token VARCHAR(255) NOT NULL,
                expiry DATETIME NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                CONSTRAINT `fk_password_resets_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
                UNIQUE KEY `unique_user_token` (`user_id`),
                INDEX `password_resets_token_idx` (`token`),
                INDEX `password_resets_expiry_idx` (`expiry`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
    }

    public function down(): string
    {
        return "DROP TABLE IF EXISTS password_resets;";
    }
}
