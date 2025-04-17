<?php

// Application Configuration
define('APP_NAME', 'OneNetly');
define('APP_URL', 'http://onenetly.me');
define('DB_HOST', 'localhost');
define('DB_NAME', 'onenetly');
define('DB_USER', 'root');
define('DB_PASS', 'AmiMotiur27@');

// API Keys
define('OPENROUTER_API_KEYS', [
    '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'
]);

define('PIXABAY_API_KEY', '36712744-c03cb37b4ae2719ad53108221');
define('UNSPLASH_API_KEY', 'NQJkdobxUNfRsy6SqleY8fNV9Qw5-YGQopPTTQzGefA');

// Queue Settings
define('QUEUE_BATCH_SIZE', 5);
define('QUEUE_RETRY_LIMIT', 3);

// Disqus Configuration
define('DISQUS_SHORTNAME', 'onenetly'); // Replace with your actual Disqus shortname

// Establish database connection
try {
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
