<?php
/**
 * upload.php — Receives a file via POST, uploads it to Google Drive
 * using a round-robin service account, makes it public, and returns JSON.
 *
 * Laravel Herd (Nginx): .htaccess php_value directives are ignored.
 * Upload limits are applied here via ini_set() instead.
 */

// Start output buffering to catch any stray output
ob_start();

// Must be called before any output / headers
@ini_set('upload_max_filesize', '5120M');
@ini_set('post_max_size',       '5200M');
@ini_set('max_input_time',      '7200');
@ini_set('memory_limit',        '768M');
set_time_limit(0); // No PHP execution time limit for large file uploads

// Suppress any output from includes
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', '0');

// Catch all fatal errors and convert to JSON response
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error !== null && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        // Log to file for debugging
        error_log("Upload error: " . $error['message'] . " in " . $error['file'] . " on line " . $error['line']);
        
        while (ob_get_level()) ob_end_clean();
        header('Content-Type: application/json');
        http_response_code(500);
        echo json_encode([
            'success' => false, 
            'error' => 'Server error: ' . $error['message'],
            'file' => basename($error['file']),
            'line' => $error['line']
        ]);
    }
});

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/internal_cron.php';
require_once __DIR__ . '/drive_api.php';

// Clean any stray output from includes
ob_end_clean();

// Set JSON headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Max-Age: 3600');

// Handle CORS preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// ── Helpers ──────────────────────────────────────────────────────────────────

function jsonError(string $message, int $code = 400): void {
    while (ob_get_level()) ob_end_clean();
    http_response_code($code);
    echo json_encode(['success' => false, 'error' => $message]);
    exit;
}

function jsonSuccess(array $data): void {
    while (ob_get_level()) ob_end_clean();
    echo json_encode(array_merge(['success' => true], $data));
    exit;
}

/** 
 * Pick next OAuth2 account with enough storage space.
 * Checks each account sequentially until finding one with sufficient space.
 * Falls back to round-robin if all accounts are full.
 * Returns [account, pointer].
 */
function pickAccount(int $fileSize): array {
    $accounts = getDriveAccounts();
    if (empty($accounts)) {
        jsonError('No Google Drive accounts configured in config.php', 500);
    }

    $totalAccounts = count($accounts);
    $pointer = getAccountPointer();
    $startPointer = $pointer % $totalAccounts;
    
    // Required space with 100MB buffer for safety
    $requiredSpace = $fileSize + (100 * 1024 * 1024);
    
    // Try each account starting from current pointer
    for ($i = 0; $i < $totalAccounts; $i++) {
        $currentIndex = ($startPointer + $i) % $totalAccounts;
        $account = $accounts[$currentIndex];
        
        try {
            // Check storage quota for this account
            $drive = new DriveAPI($account);
            $drive->authenticate();
            $quota = $drive->getStorageInfo();
            
            if ($quota !== null) {
                $available = $quota['limit'] - $quota['usage'];
                
                // If enough space available, use this account
                if ($available >= $requiredSpace) {
                    // Update pointer to next account for next upload
                    setAccountPointer($currentIndex + 1);
                    return [$account, $currentIndex];
                }
            }
        } catch (Exception $e) {
            // If quota check fails, skip this account and try next
            continue;
        }
    }
    
    // Fallback: No account with enough space found, use round-robin anyway
    $chosen = $accounts[$startPointer];
    setAccountPointer($startPointer + 1);
    
    return [$chosen, $startPointer];
}

/** Generate a short unique slug for internal record ID. */
function generateId(): string {
    return substr(bin2hex(random_bytes(8)), 0, 12);
}

// ── Main Upload Logic (wrapped in try-catch) ─────────────────────────────────

try {

// ── Validate request ──────────────────────────────────────────────────────────

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonError('Method not allowed.', 405);
}

if (empty($_FILES['file'])) {
    jsonError('No file received.');
}

$file = $_FILES['file'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    $phpErrors = [
        UPLOAD_ERR_INI_SIZE   => 'File exceeds server upload_max_filesize.',
        UPLOAD_ERR_FORM_SIZE  => 'File exceeds form MAX_FILE_SIZE.',
        UPLOAD_ERR_PARTIAL    => 'File was only partially uploaded.',
        UPLOAD_ERR_NO_FILE    => 'No file was uploaded.',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder.',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
        UPLOAD_ERR_EXTENSION  => 'A PHP extension stopped the upload.',
    ];
    jsonError($phpErrors[$file['error']] ?? 'Unknown upload error.');
}

// Size check
if ($file['size'] > MAX_FILE_SIZE_BYTES) {
    jsonError('File exceeds maximum allowed size of ' . MAX_FILE_SIZE_MB . ' MB.');
}

// Extension check
$originalName = basename($file['name']);
$ext          = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

if (in_array($ext, BLOCKED_EXTENSIONS, true)) {
    jsonError("File type '.$ext' is not allowed for security reasons.");
}

if (!empty(ALLOWED_EXTENSIONS) && !in_array($ext, ALLOWED_EXTENSIONS, true)) {
    jsonError("File type '.$ext' is not permitted.");
}

// Sanitise file name
$safeName = preg_replace('/[^\w.\-]/', '_', $originalName);
$mimeType = mime_content_type($file['tmp_name']) ?: 'application/octet-stream';

// ── Upload to Google Drive ────────────────────────────────────────────────────

// Pick account with enough storage space
[$account, $accountPointer] = pickAccount($file['size']);
$accountId = $account['id'];
$folderId  = $account['folder_id'] ?? DEFAULT_DRIVE_FOLDER_ID;

try {
    $drive = new DriveAPI($account);
    $drive->authenticate();

    $driveFile = $drive->uploadFile(
        $file['tmp_name'],
        $safeName,
        $mimeType,
        $folderId
    );

    $drive->makePublic($driveFile['id']);

} catch (RuntimeException $e) {
    jsonError('Drive upload failed: ' . $e->getMessage(), 500);
}

// ── Save record ───────────────────────────────────────────────────────────────

$fileId       = generateId();
$driveFileId  = $driveFile['id'];
$downloadLink = DOWNLOAD_BASE . $fileId;
// Direct Google Drive download URL
$directLink   = 'https://drive.google.com/uc?export=download&id=' . $driveFileId;
$viewLink     = 'https://drive.google.com/file/d/' . $driveFileId . '/view?usp=sharing';

$record = [
    'id'                 => $fileId,
    'original_name'      => $originalName,
    'drive_file_id'      => $driveFileId,
    'account_index'      => (int)$accountPointer,
    'size'               => $file['size'],
    'mime'               => $mimeType,
    'uploaded_at'        => date('Y-m-d H:i:s'),
    'expires_after_days' => EXPIRY_DAYS,
];

// Save to database
if (!insertFile($record)) {
    jsonError('Failed to save file record to database', 500);
}

// ── Respond ───────────────────────────────────────────────────────────────────

jsonSuccess([
    'id'            => $fileId,
    'name'          => $originalName,
    'size'          => $file['size'],
    'mime'          => $mimeType,
    'download_link' => $downloadLink,
    'direct_link'   => $directLink,
    'view_link'     => $viewLink,
    'account'       => $accountId,
    'expires_days'  => EXPIRY_DAYS,
    'expires_at'    => date('Y-m-d', strtotime('+' . EXPIRY_DAYS . ' days')),
]);

} catch (Throwable $e) {
    // Catch any unexpected errors and return as JSON
    jsonError('Unexpected error: ' . $e->getMessage(), 500);
}
