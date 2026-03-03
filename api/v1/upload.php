<?php
/**
 * API Upload Endpoint
 * POST /api/v1/upload - Upload file via API and return download link
 */

// Start output buffering
ob_start();

// Set CORS headers FIRST (before any other output)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, X-API-Key, Authorization');
header('Access-Control-Max-Age: 3600');
header('Content-Type: application/json');

// Handle CORS preflight immediately
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// Set PHP limits for large uploads
@ini_set('upload_max_filesize', '5120M');
@ini_set('post_max_size', '5200M');
@ini_set('max_input_time', '7200');
@ini_set('memory_limit', '768M');
set_time_limit(0);

// Error handling
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', '0');

register_shutdown_function(function() {
    $error = error_get_last();
    if ($error !== null && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        while (ob_get_level()) ob_end_clean();
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'error' => 'Server error: ' . $error['message']
        ]);
    }
});

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../database.php';
require_once __DIR__ . '/../../drive_api.php';
require_once __DIR__ . '/../../api_auth.php';

// Clean output buffer
ob_end_clean();

// ── Helper Functions ──────────────────────────────────────────────────────────

function jsonError(string $message, int $code = 400): void {
    global $apiAuth;
    if (isset($apiAuth)) {
        $apiAuth->logUsage('/api/v1/upload', $code);
    }
    while (ob_get_level()) ob_end_clean();
    http_response_code($code);
    echo json_encode(['success' => false, 'error' => $message]);
    exit;
}

function jsonSuccess(array $data): void {
    global $apiAuth;
    if (isset($apiAuth)) {
        $apiAuth->logUsage('/api/v1/upload', 200, $data['file_id'] ?? null);
        $apiAuth->incrementUploadCount();
    }
    while (ob_get_level()) ob_end_clean();
    echo json_encode(array_merge(['success' => true], $data));
    exit;
}

function pickAccount(int $fileSize): array {
    $accounts = getDriveAccounts();
    if (empty($accounts)) {
        jsonError('No Google Drive accounts configured', 500);
    }

    $totalAccounts = count($accounts);
    $pointer = getAccountPointer();
    $startPointer = $pointer % $totalAccounts;
    $requiredSpace = $fileSize + (100 * 1024 * 1024);
    
    for ($i = 0; $i < $totalAccounts; $i++) {
        $currentIndex = ($startPointer + $i) % $totalAccounts;
        $account = $accounts[$currentIndex];
        
        try {
            $drive = new DriveAPI($account);
            $drive->authenticate();
            $quota = $drive->getStorageInfo();
            
            if ($quota !== null) {
                $available = $quota['limit'] - $quota['usage'];
                if ($available >= $requiredSpace) {
                    setAccountPointer($currentIndex + 1);
                    return [$account, $currentIndex];
                }
            }
        } catch (Exception $e) {
            continue;
        }
    }
    
    $chosen = $accounts[$startPointer];
    setAccountPointer($startPointer + 1);
    return [$chosen, $startPointer];
}

function generateId(): string {
    return substr(bin2hex(random_bytes(8)), 0, 12);
}

// ── Main Logic ────────────────────────────────────────────────────────────────

try {
    // Authenticate API request
    $apiAuth = new APIAuth();
    if (!$apiAuth->authenticate()) {
        exit; // Authentication method handles error response
    }

    // Validate request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        jsonError('Method not allowed. Use POST.', 405);
    }

    // Validate file upload
    if (empty($_FILES['file'])) {
        jsonError('No file received. Send file using multipart/form-data with "file" field.');
    }

    $file = $_FILES['file'];

    // Check upload errors
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
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    if (in_array($ext, BLOCKED_EXTENSIONS, true)) {
        jsonError("File type '.$ext' is not allowed for security reasons.");
    }

    if (!empty(ALLOWED_EXTENSIONS) && !in_array($ext, ALLOWED_EXTENSIONS, true)) {
        jsonError("File type '.$ext' is not permitted.");
    }

    // Sanitize filename
    $safeName = preg_replace('/[^\w.\-]/', '_', $originalName);
    $mimeType = mime_content_type($file['tmp_name']) ?: 'application/octet-stream';

    // Pick Google Drive account
    [$account, $accountPointer] = pickAccount($file['size']);
    $accountId = $account['id'];
    $folderId = $account['folder_id'] ?? DEFAULT_DRIVE_FOLDER_ID;

    // Upload to Google Drive
    $drive = new DriveAPI($account);
    $drive->authenticate();

    $driveFile = $drive->uploadFile(
        $file['tmp_name'],
        $safeName,
        $mimeType,
        $folderId
    );

    // Make file publicly accessible
    $drive->makePublic($driveFile['id']);

    // Save to database
    $id = generateId();
    $inserted = insertFile([
        'id' => $id,
        'original_name' => $originalName,
        'drive_file_id' => $driveFile['id'],
        'account_index' => $accountPointer,
        'size' => $file['size'],
        'mime' => $mimeType,
        'uploaded_at' => date('Y-m-d H:i:s'),
        'expires_after_days' => EXPIRY_DAYS,
    ]);

    if (!$inserted) {
        jsonError('Failed to save file record to database.', 500);
    }

    // Return success with download link
    jsonSuccess([
        'file_id' => $id,
        'filename' => $originalName,
        'size' => $file['size'],
        'mime_type' => $mimeType,
        'download_url' => DOWNLOAD_BASE . $id,
        'uploaded_at' => date('c'),
        'expires_in_days' => EXPIRY_DAYS
    ]);

} catch (Exception $e) {
    error_log('API Upload Error: ' . $e->getMessage());
    jsonError('Upload failed: ' . $e->getMessage(), 500);
}
