<?php

use OneMigrator\Migration;

class CreateSettingsTable extends Migration
{
    public function up(): string
    {
        return "
            CREATE TABLE settings (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NULL,
                setting_key VARCHAR(100) NOT NULL,
                setting_value TEXT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                UNIQUE KEY `unique_setting` (`user_id`, `setting_key`),
                CONSTRAINT `fk_settings_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";
    }

    public function down(): string
    {
        return "DROP TABLE IF EXISTS settings;";
    }
}
