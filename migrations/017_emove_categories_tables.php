<?php
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Auth.php';

// Initialize database
$database = new Database();
$pdo = $database->getConnection();
$auth = new Auth($pdo);

// Check admin access
if (!$auth->isLoggedIn() || !$auth->isAdmin()) {
    die('Unauthorized access. Admin privileges required.');
}

// Run the migration
try {
    // Begin transaction
    $pdo->beginTransaction();
    
    // Drop blog_category table
    $pdo->exec("DROP TABLE IF EXISTS blog_category");
    
    // Drop categories table
    $pdo->exec("DROP TABLE IF EXISTS categories");
    
    // Remove category_id references from blogs table
    $tableInfo = $pdo->query("PRAGMA table_info(blogs)")->fetchAll(PDO::FETCH_ASSOC);
    $hasCategoryColumn = false;
    
    foreach ($tableInfo as $column) {
        if ($column['name'] === 'category_id') {
            $hasCategoryColumn = true;
            break;
        }
    }
    
    if ($hasCategoryColumn) {
        $pdo->exec("ALTER TABLE blogs DROP COLUMN category_id");
    }
    
    // Commit transaction
    $pdo->commit();
    
    echo "<h1>Category Tables Removed</h1>";
    echo "<p>Successfully removed the following tables:</p>";
    echo "<ul>";
    echo "<li>categories</li>";
    echo "<li>blog_category</li>";
    echo "</ul>";
    echo "<p>Also removed category_id column from blogs table if it existed.</p>";
    echo "<p><a href='../admin/index.php'>Return to Admin Panel</a></p>";
    
} catch (PDOException $e) {
    // Rollback transaction on error
    $pdo->rollBack();
    echo "<h1>Migration Failed</h1>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
    echo "<p><a href='../admin/index.php'>Return to Admin Panel</a></p>";
}
?>
