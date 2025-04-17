<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/app.php';

use OneMigrator\Migration;

class CreateBlogTables extends Migration
{
    private $pdo;
    
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        parent::__construct('001', 'Create blog tables for onenetly', '');
    }
    
    public function up()
    {
        // Create categories table
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            slug VARCHAR(255) UNIQUE NOT NULL,
            description TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        // Create posts table
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS posts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            category_id INT NOT NULL,
            title VARCHAR(255) NOT NULL,
            slug VARCHAR(255) UNIQUE NOT NULL,
            content TEXT NOT NULL,
            featured_image VARCHAR(255) NOT NULL,
            keywords TEXT NOT NULL,
            status VARCHAR(50) DEFAULT 'published',
            views INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        // Create queue table
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS queue (
            id INT AUTO_INCREMENT PRIMARY KEY,
            category_id INT NOT NULL,
            job_type VARCHAR(100) NOT NULL,
            job_data TEXT NOT NULL,
            status VARCHAR(50) DEFAULT 'pending',
            attempts INT DEFAULT 0,
            scheduled_at TIMESTAMP NULL,
            processed_at TIMESTAMP NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        // Create api_keys table
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS api_keys (
            id INT AUTO_INCREMENT PRIMARY KEY,
            service VARCHAR(50) NOT NULL,
            `key` TEXT NOT NULL,
            usage_count INT DEFAULT 0,
            last_used TIMESTAMP NULL,
            is_active BOOLEAN DEFAULT TRUE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        // Create visitors table
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS visitors (
            id INT AUTO_INCREMENT PRIMARY KEY,
            page VARCHAR(255) NOT NULL,
            ip_address VARCHAR(45) NOT NULL,
            user_agent TEXT NOT NULL,
            referrer VARCHAR(255) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
        
        // Create stats table
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS stats (
            id INT AUTO_INCREMENT PRIMARY KEY,
            date DATE NOT NULL,
            page VARCHAR(255) NOT NULL,
            hits INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            UNIQUE KEY date_page_unique (date, page)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
    }

    public function down()
    {
        // Drop tables in reverse order to avoid foreign key constraints
        $this->pdo->exec("DROP TABLE IF EXISTS stats");
        $this->pdo->exec("DROP TABLE IF EXISTS visitors");
        $this->pdo->exec("DROP TABLE IF EXISTS api_keys");
        $this->pdo->exec("DROP TABLE IF EXISTS queue");
        $this->pdo->exec("DROP TABLE IF EXISTS posts");
        $this->pdo->exec("DROP TABLE IF EXISTS categories");
    }
}

// Run the migration
$migration = new CreateBlogTables($pdo);
$migration->up();
echo "Migration completed successfully!";
