<?php
/**
 * files.php — Advanced File Management Page
 * Dedicated page for managing files with advanced features:
 * - Pagination
 * - Search & Filters
 * - Sorting options
 * - Bulk operations
 * - Export to CSV
 */

session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/drive_api.php';
require_once __DIR__ . '/database.php';

// ── Helper Functions ──────────────────────────────────────────────────────────

function formatBytes(int $bytes): string {
    if ($bytes <= 0) return '0 B';
    $units = ['B','KB','MB','GB','TB'];
    $i = (int) floor(log($bytes, 1024));
    return round($bytes / pow(1024, $i), 2) . ' ' . $units[$i];
}

function formatTimeAgo(int $timestamp): string {
    $diff = time() - $timestamp;
    if ($diff < 60) return $diff . 's ago';
    if ($diff < 3600) return floor($diff / 60) . 'm ago';
    if ($diff < 86400) return floor($diff / 3600) . 'h ago';
    return floor($diff / 86400) . 'd ago';
}

function daysUntilExpiry(array $record): int {
    $expiry = (int)($record['expires_after_days'] ?? EXPIRY_DAYS);
    $base = $record['last_downloaded_at'] ?? $record['uploaded_at'] ?? null;
    if (!$base) return $expiry;
    $diffDays = (int) floor((time() - strtotime($base)) / 86400);
    return max(0, $expiry - $diffDays);
}

// ── Authentication ────────────────────────────────────────────────────────────

$isLoggedIn = !empty($_SESSION['admin_logged_in']);

if (!$isLoggedIn) {
    header('Location: admin.php');
    exit;
}

// ── Handle Actions ────────────────────────────────────────────────────────────

// Handle single file deletion
if (isset($_POST['delete_file'])) {
    $fileId = $_POST['file_id'] ?? '';
    $record = getFileById($fileId);
    
    if ($record) {
        $accounts = getDriveAccounts();
        $accountIdx = (int)($record['account_index'] ?? 0);
        $account = $accounts[$accountIdx] ?? null;
        
        if ($account && !empty($record['drive_file_id'])) {
            try {
                $drive = new DriveAPI($account);
                $drive->authenticate();
                $drive->deleteFile($record['drive_file_id']);
            } catch (Exception $e) {
                // Continue even if Drive deletion fails
            }
        }
        
        deleteFile($fileId);
        $_SESSION['flash_message'] = 'File deleted successfully';
    }
    
    header('Location: ' . $_SERVER['PHP_SELF'] . '?' . http_build_query($_GET));
    exit;
}

// Handle bulk delete
if (isset($_POST['bulk_delete']) && !empty($_POST['selected_files'])) {
    $selectedFiles = $_POST['selected_files'];
    $deleted = 0;
    $accounts = getDriveAccounts();
    
    foreach ($selectedFiles as $fileId) {
        $record = getFileById($fileId);
        if ($record) {
            $accountIdx = (int)($record['account_index'] ?? 0);
            $account = $accounts[$accountIdx] ?? null;
            
            if ($account && !empty($record['drive_file_id'])) {
                try {
                    $drive = new DriveAPI($account);
                    $drive->authenticate();
                    $drive->deleteFile($record['drive_file_id']);
                } catch (Exception $e) {
                    // Continue
                }
            }
            
            deleteFile($fileId);
            $deleted++;
        }
    }
    
    $_SESSION['flash_message'] = "Deleted $deleted file(s) successfully";
    header('Location: ' . $_SERVER['PHP_SELF'] . '?' . http_build_query($_GET));
    exit;
}

// Handle CSV export
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    $allFiles = getFiles();
    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="files_export_' . date('Y-m-d') . '.csv"');
    
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Filename', 'Size (Bytes)', 'Size (Human)', 'MIME Type', 'Uploaded At', 'Downloads', 'Last Downloaded', 'Days Until Expiry', 'Status']);
    
    foreach ($allFiles as $record) {
        $daysLeft = daysUntilExpiry($record);
        $status = $daysLeft === 0 ? 'Expired' : ($daysLeft <= 7 ? 'Expiring' : 'Active');
        
        fputcsv($output, [
            $record['id'],
            $record['original_name'],
            $record['size'],
            formatBytes($record['size']),
            $record['mime'],
            $record['uploaded_at'],
            $record['download_count'] ?? 0,
            $record['last_downloaded_at'] ?? 'Never',
            $daysLeft,
            $status
        ]);
    }
    
    fclose($output);
    exit;
}

// ── Pagination & Filtering ────────────────────────────────────────────────────

$page = max(1, (int)($_GET['page'] ?? 1));
$perPage = (int)($_GET['per_page'] ?? 50);
$perPage = min(max($perPage, 10), 200); // Between 10 and 200
$search = trim($_GET['search'] ?? '');
$statusFilter = $_GET['status'] ?? 'all';
$sortBy = $_GET['sort'] ?? 'newest';
$mimeFilter = $_GET['mime_type'] ?? 'all';

// Get all files
$allRecords = getFiles();

// Apply filters
$filteredRecords = $allRecords;

// Search filter
if (!empty($search)) {
    $filteredRecords = array_filter($filteredRecords, function($record) use ($search) {
        return stripos($record['original_name'], $search) !== false 
            || stripos($record['id'], $search) !== false
            || stripos($record['mime'], $search) !== false;
    });
}

// Status filter
if ($statusFilter !== 'all') {
    $filteredRecords = array_filter($filteredRecords, function($record) use ($statusFilter) {
        $daysLeft = daysUntilExpiry($record);
        switch ($statusFilter) {
            case 'active':
                return $daysLeft > 7;
            case 'expiring':
                return $daysLeft > 0 && $daysLeft <= 7;
            case 'expired':
                return $daysLeft === 0;
            default:
                return true;
        }
    });
}

// MIME type filter
if ($mimeFilter !== 'all') {
    $filteredRecords = array_filter($filteredRecords, function($record) use ($mimeFilter) {
        $mime = $record['mime'] ?? '';
        switch ($mimeFilter) {
            case 'image':
                return str_starts_with($mime, 'image/');
            case 'video':
                return str_starts_with($mime, 'video/');
            case 'audio':
                return str_starts_with($mime, 'audio/');
            case 'document':
                return str_starts_with($mime, 'application/') || str_starts_with($mime, 'text/');
            default:
                return true;
        }
    });
}

// Sorting
usort($filteredRecords, function($a, $b) use ($sortBy) {
    switch ($sortBy) {
        case 'oldest':
            return strtotime($a['uploaded_at'] ?? '1970-01-01') - strtotime($b['uploaded_at'] ?? '1970-01-01');
        case 'size_asc':
            return ($a['size'] ?? 0) - ($b['size'] ?? 0);
        case 'size_desc':
            return ($b['size'] ?? 0) - ($a['size'] ?? 0);
        case 'downloads':
            return ($b['download_count'] ?? 0) - ($a['download_count'] ?? 0);
        case 'name':
            return strcasecmp($a['original_name'] ?? '', $b['original_name'] ?? '');
        case 'newest':
        default:
            return strtotime($b['uploaded_at'] ?? '1970-01-01') - strtotime($a['uploaded_at'] ?? '1970-01-01');
    }
});

// Pagination
$totalFilteredFiles = count($filteredRecords);
$totalPages = max(1, (int)ceil($totalFilteredFiles / $perPage));
$page = min($page, $totalPages);
$offset = ($page - 1) * $perPage;
$records = array_slice($filteredRecords, $offset, $perPage);

// Statistics
$totalFiles = count($allRecords);
$totalSize = array_sum(array_column($allRecords, 'size'));

// Flash messages
$flashMessage = $_SESSION['flash_message'] ?? null;
$flashError = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_message']);
unset($_SESSION['flash_error']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>File Management - <?= htmlspecialchars(SITE_NAME) ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .stat-card { transition: transform 0.2s; }
    .stat-card:hover { transform: translateY(-2px); }
  </style>
</head>
<body class="bg-gray-950 text-gray-100 min-h-screen">

  <!-- Header -->
  <header class="border-b border-gray-800 bg-gray-900/80 backdrop-blur sticky top-0 z-20">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
      <div class="flex items-center gap-4">
        <h1 class="text-xl font-bold">📁 File Management</h1>
        <span class="text-sm text-gray-500">·</span>
        <span class="text-sm text-gray-400"><?= $totalFiles ?> total files</span>
      </div>
      <div class="flex items-center gap-4">
        <a href="admin.php" class="text-sm text-gray-400 hover:text-white transition">
          ← Back to Admin
        </a>
        <a href="?export=csv&<?= http_build_query(['search' => $search, 'status' => $statusFilter, 'mime_type' => $mimeFilter]) ?>" 
           class="text-sm text-green-400 hover:text-green-300 transition">
          Export CSV
        </a>
      </div>
    </div>
  </header>

  <main class="max-w-7xl mx-auto px-4 py-8">

    <?php if ($flashMessage): ?>
    <div class="bg-green-900/40 border border-green-800 text-green-300 rounded-lg px-4 py-3 mb-6">
      <?= htmlspecialchars($flashMessage) ?>
    </div>
    <?php endif; ?>
    
    <?php if ($flashError): ?>
    <div class="bg-red-900/40 border border-red-800 text-red-300 rounded-lg px-4 py-3 mb-6">
      <?= htmlspecialchars($flashError) ?>
    </div>
    <?php endif; ?>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
      <div class="stat-card bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="text-sm text-gray-500 mb-1">Total Files</div>
        <div class="text-3xl font-bold text-blue-400"><?= $totalFiles ?></div>
      </div>
      <div class="stat-card bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="text-sm text-gray-500 mb-1">Total Storage</div>
        <div class="text-3xl font-bold text-green-400"><?= formatBytes($totalSize) ?></div>
      </div>
      <div class="stat-card bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="text-sm text-gray-500 mb-1">Filtered Results</div>
        <div class="text-3xl font-bold text-purple-400"><?= $totalFilteredFiles ?></div>
      </div>
    </div>

    <!-- Filters & Actions -->
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mb-6">
      <form method="GET" class="space-y-4">
        <!-- Search & Filters Row 1 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
          <input
            type="text"
            name="search"
            value="<?= htmlspecialchars($search) ?>"
            placeholder="Search files..."
            class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500"
          />
          
          <select name="status" class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
            <option value="all" <?= $statusFilter === 'all' ? 'selected' : '' ?>>All Status</option>
            <option value="active" <?= $statusFilter === 'active' ? 'selected' : '' ?>>Active</option>
            <option value="expiring" <?= $statusFilter === 'expiring' ? 'selected' : '' ?>>Expiring Soon</option>
            <option value="expired" <?= $statusFilter === 'expired' ? 'selected' : '' ?>>Expired</option>
          </select>
          
          <select name="mime_type" class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
            <option value="all" <?= $mimeFilter === 'all' ? 'selected' : '' ?>>All Types</option>
            <option value="image" <?= $mimeFilter === 'image' ? 'selected' : '' ?>>Images</option>
            <option value="video" <?= $mimeFilter === 'video' ? 'selected' : '' ?>>Videos</option>
            <option value="audio" <?= $mimeFilter === 'audio' ? 'selected' : '' ?>>Audio</option>
            <option value="document" <?= $mimeFilter === 'document' ? 'selected' : '' ?>>Documents</option>
          </select>
          
          <select name="sort" class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
            <option value="newest" <?= $sortBy === 'newest' ? 'selected' : '' ?>>Newest First</option>
            <option value="oldest" <?= $sortBy === 'oldest' ? 'selected' : '' ?>>Oldest First</option>
            <option value="size_desc" <?= $sortBy === 'size_desc' ? 'selected' : '' ?>>Largest First</option>
            <option value="size_asc" <?= $sortBy === 'size_asc' ? 'selected' : '' ?>>Smallest First</option>
            <option value="downloads" <?= $sortBy === 'downloads' ? 'selected' : '' ?>>Most Downloads</option>
            <option value="name" <?= $sortBy === 'name' ? 'selected' : '' ?>>Name (A-Z)</option>
          </select>
        </div>
        
        <!-- Actions Row 2 -->
        <div class="flex flex-wrap items-center gap-2">
          <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-500 text-white font-semibold px-6 py-2.5 rounded-lg text-sm transition"
          >
            Apply Filters
          </button>
          
          <a
            href="<?= $_SERVER['PHP_SELF'] ?>"
            class="bg-gray-700 hover:bg-gray-600 text-white font-semibold px-6 py-2.5 rounded-lg text-sm transition"
          >
            Reset All
          </a>
          
          <select name="per_page" onchange="this.form.submit()" class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500">
            <option value="20" <?= $perPage === 20 ? 'selected' : '' ?>>20 per page</option>
            <option value="50" <?= $perPage === 50 ? 'selected' : '' ?>>50 per page</option>
            <option value="100" <?= $perPage === 100 ? 'selected' : '' ?>>100 per page</option>
            <option value="200" <?= $perPage === 200 ? 'selected' : '' ?>>200 per page</option>
          </select>
          
          <div class="ml-auto text-sm text-gray-400">
            Showing <?= $offset + 1 ?>-<?= min($offset + $perPage, $totalFilteredFiles) ?> of <?= $totalFilteredFiles ?>
          </div>
        </div>
      </form>
    </div>

    <!-- Files Table with Bulk Actions -->
    <form method="POST" id="bulkForm">
      <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <!-- Bulk Actions Bar -->
        <div class="p-4 bg-gray-800/50 border-b border-gray-800 flex items-center justify-between">
          <div class="flex items-center gap-3">
            <input
              type="checkbox"
              id="selectAll"
              class="w-4 h-4 rounded border-gray-700 bg-gray-800"
              onclick="toggleSelectAll(this)"
            />
            <label for="selectAll" class="text-sm text-gray-400 cursor-pointer">
              Select All
            </label>
            <span id="selectedCount" class="text-sm text-blue-400 hidden"></span>
          </div>
          
          <button
            type="submit"
            name="bulk_delete"
            onclick="return confirmBulkDelete()"
            class="bg-red-600 hover:bg-red-500 text-white font-semibold px-4 py-2 rounded-lg text-sm transition"
            id="bulkDeleteBtn"
            disabled
          >
            Delete Selected
          </button>
        </div>
        
        <?php if (empty($records)): ?>
        <div class="p-8 text-center text-gray-500">
          No files match your criteria.
        </div>
        <?php else: ?>
        <div class="overflow-x-auto">
          <table class="w-full text-sm">
            <thead class="bg-gray-800/50 border-b border-gray-800">
              <tr>
                <th class="text-left px-4 py-3 font-semibold w-12"></th>
                <th class="text-left px-4 py-3 font-semibold">File Name</th>
                <th class="text-left px-4 py-3 font-semibold">Type</th>
                <th class="text-left px-4 py-3 font-semibold">Size</th>
                <th class="text-left px-4 py-3 font-semibold">Uploaded</th>
                <th class="text-left px-4 py-3 font-semibold">Downloads</th>
                <th class="text-left px-4 py-3 font-semibold">Status</th>
                <th class="text-right px-4 py-3 font-semibold">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
              <?php foreach ($records as $record): 
                $daysLeft = daysUntilExpiry($record);
                $expired = $daysLeft === 0;
                $expiring = !$expired && $daysLeft <= 7;
                
                if ($expired) {
                    $statusClass = 'bg-red-900/40 text-red-300 border-red-800';
                    $statusText = 'Expired';
                } elseif ($expiring) {
                    $statusClass = 'bg-yellow-900/40 text-yellow-300 border-yellow-800';
                    $statusText = $daysLeft . 'd';
                } else {
                    $statusClass = 'bg-gray-800 text-gray-400 border-gray-700';
                    $statusText = $daysLeft . 'd';
                }
                
                // Get file type icon
                $mime = $record['mime'] ?? '';
                if (str_starts_with($mime, 'image/')) {
                    $typeIcon = '🖼️';
                    $typeLabel = 'Image';
                } elseif (str_starts_with($mime, 'video/')) {
                    $typeIcon = '🎥';
                    $typeLabel = 'Video';
                } elseif (str_starts_with($mime, 'audio/')) {
                    $typeIcon = '🎵';
                    $typeLabel = 'Audio';
                } elseif (str_contains($mime, 'pdf')) {
                    $typeIcon = '📄';
                    $typeLabel = 'PDF';
                } elseif (str_contains($mime, 'zip') || str_contains($mime, 'rar') || str_contains($mime, 'archive')) {
                    $typeIcon = '📦';
                    $typeLabel = 'Archive';
                } else {
                    $typeIcon = '📄';
                    $typeLabel = 'File';
                }
              ?>
              <tr class="hover:bg-gray-800/30 transition">
                <td class="px-4 py-3">
                  <input
                    type="checkbox"
                    name="selected_files[]"
                    value="<?= htmlspecialchars($record['id']) ?>"
                    class="file-checkbox w-4 h-4 rounded border-gray-700 bg-gray-800"
                    onchange="updateBulkActions()"
                  />
                </td>
                <td class="px-4 py-3">
                  <div class="max-w-sm truncate font-medium" title="<?= htmlspecialchars($record['original_name']) ?>">
                    <?= htmlspecialchars($record['original_name']) ?>
                  </div>
                  <div class="text-xs text-gray-600 font-mono mt-0.5">
                    <?= htmlspecialchars($record['id']) ?>
                  </div>
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                  <span title="<?= htmlspecialchars($mime) ?>">
                    <?= $typeIcon ?> <span class="text-gray-400 text-xs"><?= $typeLabel ?></span>
                  </span>
                </td>
                <td class="px-4 py-3 whitespace-nowrap text-gray-400">
                  <?= formatBytes((int)($record['size'] ?? 0)) ?>
                </td>
                <td class="px-4 py-3 whitespace-nowrap text-gray-400 text-xs">
                  <?= date('M d, Y', strtotime($record['uploaded_at'] ?? '1970-01-01')) ?>
                  <div class="text-gray-600"><?= formatTimeAgo(strtotime($record['uploaded_at'] ?? '1970-01-01')) ?></div>
                </td>
                <td class="px-4 py-3 text-center">
                  <span class="text-purple-400 font-semibold"><?= (int)($record['download_count'] ?? 0) ?></span>
                </td>
                <td class="px-4 py-3">
                  <span class="inline-block px-2 py-1 text-xs border rounded <?= $statusClass ?>">
                    <?= $statusText ?>
                  </span>
                </td>
                <td class="px-4 py-3 text-right">
                  <div class="flex items-center justify-end gap-2">
                    <a
                      href="<?= DOWNLOAD_BASE . htmlspecialchars($record['id']) ?>"
                      target="_blank"
                      class="text-blue-400 hover:text-blue-300 text-xs font-semibold"
                      title="View/Download"
                    >
                      View
                    </a>
                    <button
                      type="submit"
                      name="delete_file"
                      value="<?= htmlspecialchars($record['id']) ?>"
                      formaction=""
                      onclick="return confirm('Delete this file permanently?')"
                      class="text-red-400 hover:text-red-300 text-xs font-semibold"
                    >
                      Delete
                    </button>
                    <input type="hidden" name="file_id" value="<?= htmlspecialchars($record['id']) ?>" />
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php endif; ?>
        
        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
        <div class="p-6 border-t border-gray-800 bg-gray-800/30">
          <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-sm text-gray-400">
              Page <?= $page ?> of <?= $totalPages ?>
            </div>
            
            <div class="flex items-center gap-2 flex-wrap justify-center">
              <?php
              $queryParams = [
                  'page' => $page,
                  'per_page' => $perPage,
                  'search' => $search,
                  'status' => $statusFilter,
                  'mime_type' => $mimeFilter,
                  'sort' => $sortBy
              ];
              
              $buildUrl = function($pageNum) use ($queryParams) {
                  $queryParams['page'] = $pageNum;
                  return '?' . http_build_query(array_filter($queryParams));
              };
              ?>
              
              <?php if ($page > 1): ?>
              <a href="<?= $buildUrl(1) ?>" class="px-3 py-2 bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-lg text-sm transition">
                First
              </a>
              <a href="<?= $buildUrl($page - 1) ?>" class="px-3 py-2 bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-lg text-sm transition">
                ← Prev
              </a>
              <?php endif; ?>
              
              <?php
              $startPage = max(1, $page - 2);
              $endPage = min($totalPages, $page + 2);
              
              for ($i = $startPage; $i <= $endPage; $i++):
              ?>
                <a
                  href="<?= $buildUrl($i) ?>"
                  class="px-3 py-2 <?= $i === $page ? 'bg-blue-600 text-white' : 'bg-gray-800 hover:bg-gray-700 border border-gray-700' ?> rounded-lg text-sm transition"
                >
                  <?= $i ?>
                </a>
              <?php endfor; ?>
              
              <?php if ($page < $totalPages): ?>
              <a href="<?= $buildUrl($page + 1) ?>" class="px-3 py-2 bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-lg text-sm transition">
                Next →
              </a>
              <a href="<?= $buildUrl($totalPages) ?>" class="px-3 py-2 bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-lg text-sm transition">
                Last
              </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </form>

  </main>

  <script>
    function toggleSelectAll(checkbox) {
      const checkboxes = document.querySelectorAll('.file-checkbox');
      checkboxes.forEach(cb => cb.checked = checkbox.checked);
      updateBulkActions();
    }
    
    function updateBulkActions() {
      const checkboxes = document.querySelectorAll('.file-checkbox:checked');
      const count = checkboxes.length;
      const countDisplay = document.getElementById('selectedCount');
      const deleteBtn = document.getElementById('bulkDeleteBtn');
      const selectAll = document.getElementById('selectAll');
      
      if (count > 0) {
        countDisplay.textContent = `${count} selected`;
        countDisplay.classList.remove('hidden');
        deleteBtn.disabled = false;
        deleteBtn.classList.remove('opacity-50', 'cursor-not-allowed');
      } else {
        countDisplay.classList.add('hidden');
        deleteBtn.disabled = true;
        deleteBtn.classList.add('opacity-50', 'cursor-not-allowed');
      }
      
      const totalCheckboxes = document.querySelectorAll('.file-checkbox').length;
      selectAll.checked = count === totalCheckboxes && totalCheckboxes > 0;
    }
    
    function confirmBulkDelete() {
      const count = document.querySelectorAll('.file-checkbox:checked').length;
      return confirm(`Delete ${count} file(s) permanently? This cannot be undone.`);
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', updateBulkActions);
  </script>

</body>
</html>
