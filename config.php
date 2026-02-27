<?php
/**
 * Google Drive Uploader - Configuration
 * Uses OAuth2 Refresh Token auth (client_id + client_secret + refresh_token).
 * Add multiple accounts to DRIVE_ACCOUNTS for round-robin storage spreading.
 */

define('SITE_NAME', 'OneNetly');
define('SITE_EMAIL', 'onenetly@gmail.com');

// Auto-detect site URL from server variables (defaults to production URL)
function getSiteUrl(): string {
    // Use onenetly.com in production, or auto-detect for local development
    if (!empty($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'localhost') === false && strpos($_SERVER['HTTP_HOST'], '127.0.0.1') === false) {
        return 'https://onenetly.com';
    }
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || 
                ($_SERVER['SERVER_PORT'] ?? 80) == 443 ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'localhost';
    return $protocol . '://' . $host;
}
define('SITE_URL', getSiteUrl());

// Max upload size — Herd/Nginx: set via php.ini or ini_set() (see upload.php)
define('MAX_FILE_SIZE_MB', 5120); // 5 GB
define('MAX_FILE_SIZE_BYTES', MAX_FILE_SIZE_MB * 1024 * 1024);


// Google Drive folder ID to upload into (null = root)
define('DEFAULT_DRIVE_FOLDER_ID', null);

// Allowed file extensions (empty array = allow all)
define('ALLOWED_EXTENSIONS', []);

// Blocked file extensions for security
define('BLOCKED_EXTENSIONS', ['php', 'php3', 'php4', 'php5', 'phtml', 'sh', 'bat', 'cmd', 'ps1']);

// Short link base (used in download.php)
define('DOWNLOAD_BASE', SITE_URL . '/download/');

// Auto-delete files this many days after their last download (or last upload if never downloaded)
define('EXPIRY_DAYS', 90);

// Secret token to protect the cleanup endpoint (change this to a random string)
define('CLEANUP_TOKEN', 'change-this-to-a-random-secret-string');

// Admin panel credentials
define('ADMIN_USERNAME', 'TheAceMotiur');
define('ADMIN_PASSWORD', 'AmiMotiur27@'); // Change this to a strong password!

// Database Configuration (MySQL)
require_once __DIR__ . '/configuration.php';

//define('DB_HOST', 'localhost');
//define('DB_NAME', 'onefiles');
//define('DB_USER', 'root');
//define('DB_PASS', 'AmiMotiur27@');
//define('DB_CHARSET', 'utf8mb4');