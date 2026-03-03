<?php
/**
 * API File Info Endpoint
 * GET /api/v1/file/{id} - Get file information and download URL
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, X-API-Key, Authorization');
header('Access-Control-Max-Age: 3600');

// Handle CORS preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../database.php';
require_once __DIR__ . '/../../api_auth.php';

function jsonError(string $message, int $code = 400): void {
    global $apiAuth;
    if (isset($apiAuth)) {
        $apiAuth->logUsage('/api/v1/file', $code);
    }
    http_response_code($code);
    echo json_encode(['success' => false, 'error' => $message]);
    exit;
}

function jsonSuccess(array $data): void {
    global $apiAuth;
    if (isset($apiAuth)) {
        $apiAuth->logUsage('/api/v1/file', 200, $data['file_id'] ?? null);
    }
    echo json_encode(array_merge(['success' => true], $data));
    exit;
}

try {
    // Authenticate API request
    $apiAuth = new APIAuth();
    if (!$apiAuth->authenticate()) {
        exit;
    }

    // Validate request method
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        jsonError('Method not allowed. Use GET.', 405);
    }

    // Get file ID from URL path
    // URL format: /api/v1/file.php?id=xxxxx or /api/v1/file/xxxxx
    $fileId = $_GET['id'] ?? null;
    
    // If not in query string, try to extract from path
    if (!$fileId) {
        $pathInfo = $_SERVER['PATH_INFO'] ?? '';
        if (preg_match('/^\/([a-f0-9]{12})$/i', $pathInfo, $matches)) {
            $fileId = $matches[1];
        }
    }

    if (!$fileId) {
        jsonError('Missing file ID. Usage: /api/v1/file/{id} or /api/v1/file.php?id={id}');
    }

    // Sanitize file ID
    $fileId = preg_replace('/[^a-f0-9]/i', '', $fileId);
    if (strlen($fileId) !== 12) {
        jsonError('Invalid file ID format.');
    }

    // Get file from database
    $file = getFileById($fileId);

    if (!$file) {
        jsonError('File not found.', 404);
    }

    // Check if file is pending deletion
    if ($file['pending_deletion']) {
        jsonError('File is pending deletion and no longer available.', 410);
    }

    // Return file information
    jsonSuccess([
        'file_id' => $file['id'],
        'filename' => $file['original_name'],
        'size' => (int)$file['size'],
        'size_human' => formatBytes($file['size']),
        'mime_type' => $file['mime'],
        'download_url' => DOWNLOAD_BASE . $file['id'],
        'uploaded_at' => $file['uploaded_at'],
        'download_count' => (int)$file['download_count'],
        'last_downloaded_at' => $file['last_downloaded_at'],
        'expires_after_days' => (int)$file['expires_after_days']
    ]);

} catch (Exception $e) {
    error_log('API File Info Error: ' . $e->getMessage());
    jsonError('Failed to retrieve file information: ' . $e->getMessage(), 500);
}

/**
 * Format bytes to human readable format
 */
function formatBytes(int $bytes, int $precision = 2): string {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    
    for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
        $bytes /= 1024;
    }
    
    return round($bytes, $precision) . ' ' . $units[$i];
}
