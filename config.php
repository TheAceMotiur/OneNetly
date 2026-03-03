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

// Allowed file extensions - All Google Drive supported formats
// Empty array = allow all, but we explicitly list Google Drive supported types for clarity
define('ALLOWED_EXTENSIONS', [
    // Documents
    'doc', 'docx', 'odt', 'rtf', 'txt', 'pdf', 'epub', 'pages', 'wpd', 'wps', 'xps', 'oxps',
    
    // Spreadsheets
    'xls', 'xlsx', 'xlsm', 'xlt', 'xltx', 'xltm', 'ods', 'csv', 'tsv', 'numbers',
    
    // Presentations
    'ppt', 'pptx', 'pps', 'ppsx', 'pptm', 'odp', 'key',
    
    // Images
    'jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'tiff', 'tif', 'webp', 'ico', 'heic', 'heif', 
    'raw', 'cr2', 'nef', 'dng', 'arw', 'orf', 'rw2', 'pef', 'sr2', 'raf',
    
    // Videos
    'mp4', 'mov', 'avi', 'wmv', 'flv', 'mkv', 'webm', 'm4v', 'mpg', 'mpeg', 'm2v', 
    '3gp', '3g2', 'ogv', 'vob', 'mts', 'm2ts', 'ts', 'f4v', 'divx', 'xvid',
    
    // Audio
    'mp3', 'wav', 'wma', 'ogg', 'flac', 'aac', 'm4a', 'opus', 'amr', 'aiff', 'ape', 
    'alac', 'wv', 'mka', 'oga', 'mid', 'midi',
    
    // Archives
    'zip', 'rar', 'tar', 'gz', 'bz2', '7z', 'xz', 'iso', 'dmg', 'cab', 'arj', 'lz', 'lzh', 'ace',
    
    // Code & Development
    'html', 'htm', 'css', 'json', 'xml', 'yaml', 'yml', 'md', 'markdown', 'sql',
    'c', 'cpp', 'h', 'hpp', 'cc', 'cxx', 'java', 'py', 'rb', 'go', 'rs', 'swift', 'kt', 'kts',
    'ts', 'tsx', 'jsx', 'js', 'mjs', 'cjs', 'vue', 'pl', 'r', 'scala', 'm', 'mm', 'groovy', 'gradle', 'dart',
    'lua', 'coffee', 'asm', 's', 'pas', 'vb', 'vbs', 'bas', 'cls', 'jar',
    
    // Adobe & Design
    'psd', 'ai', 'indd', 'eps', 'ps', 'sketch', 'fig', 'xd', 'dwg', 'dxf',
    
    // 3D Models & CAD
    'obj', 'fbx', 'gltf', 'glb', 'stl', 'dae', '3ds', 'blend', 'max', 'ma', 'mb',
    'step', 'stp', 'iges', 'igs', 'sat', 'sldprt', 'sldasm', 'ipt', 'iam',
    
    // Fonts
    'ttf', 'otf', 'woff', 'woff2', 'eot', 'fon',
    
    // eBooks
    'mobi', 'azw', 'azw3', 'kf8', 'fb2', 'cbr', 'cbz',
    
    // Database
    'db', 'sqlite', 'sqlite3', 'mdb', 'accdb', 'dbf',
    
    // Email & Communication
    'eml', 'msg', 'pst', 'ost', 'vcf', 'ics',
    
    // Data & Logs
    'log', 'dat', 'ini', 'cfg', 'conf', 'config', 'properties', 'toml',
    
    // Virtual Machines & Disk Images
    'vmdk', 'vdi', 'vhd', 'vhdx', 'ova', 'ovf', 'qcow', 'qcow2', 'img',
    
    // Mobile Apps & Executables
    'apk', 'ipa', 'aab', 'xap', 'exe', 'msi', 'deb', 'rpm',
    
    // Game Development
    'unity', 'unitypackage', 'uasset', 'pak', 'grf', 'wad', 'bsp',
    
    // Certificates & Keys
    'pem', 'crt', 'cer', 'der', 'p7b', 'p7c', 'p12', 'pfx', 'key', 'pub', 'csr',
    
    // Microsoft Office (additional formats)
    'dot', 'dotx', 'dotm', 'docm', 'xlam', 'xlsb', 'pot', 'potx', 'potm', 'ppsm',
    
    // OpenDocument formats
    'odc', 'odf', 'odg', 'odi', 'odm', 'ods', 'odt', 'otg', 'oth', 'otp', 'ots', 'ott',
    
    // Project Management
    'mpp', 'mpt', 'mpx', 'pod', 'gan',
    
    // Scientific & Math
    'mat', 'fig', 'mlx', 'slx', 'mdl', 'nb', 'cdf',
    
    // GIS & Mapping
    'shp', 'kml', 'kmz', 'gpx', 'geojson', 'gdb',
    
    // Backup & System
    'bak', 'old', 'tmp', 'temp', 'swp', 'swo', 'cache',
]);

// Blocked file extensions for security
// Only blocking server-side executable scripts that could run on PHP/Nginx server
define('BLOCKED_EXTENSIONS', [
    // PHP executables (primary concern for PHP server)
    'php', 'php3', 'php4', 'php5', 'php7', 'php8', 'phtml', 'phps', 'pht', 'phar',
    // Shell scripts (could be dangerous if server is misconfigured)
    'sh', 'bash', 'zsh', 'fish', 'ksh', 'csh',
    // Windows batch/PowerShell (if running on Windows server)
    'bat', 'cmd', 'ps1',
    // Server config files (sensitive)
    'htaccess', 'htpasswd',
]);

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