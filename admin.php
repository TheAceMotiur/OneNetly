<?php
/**
 * admin.php — Admin Panel
 * View files, manage accounts, trigger cleanup, view statistics.
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
    if ($diff < 60) return $diff . ' seconds ago';
    if ($diff < 3600) return floor($diff / 60) . ' minutes ago';
    if ($diff < 86400) return floor($diff / 3600) . ' hours ago';
    return floor($diff / 86400) . ' days ago';
}

function daysUntilExpiry(array $record): int {
    $expiry   = (int)($record['expires_after_days'] ?? EXPIRY_DAYS);
    $base     = $record['last_downloaded_at'] ?? $record['uploaded_at'] ?? null;
    if (!$base) return $expiry;
    $diffDays = (int) floor((time() - strtotime($base)) / 86400);
    return max(0, $expiry - $diffDays);
}

function isExpired(array $record): bool {
    return daysUntilExpiry($record) === 0;
}

// ── Authentication ────────────────────────────────────────────────────────────

$isLoggedIn = !empty($_SESSION['admin_logged_in']);

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $loginError = 'Invalid username or password';
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Handle file deletion
if ($isLoggedIn && isset($_POST['delete_file'])) {
    $fileId = $_POST['file_id'] ?? '';
    $record = getFileById($fileId);
    
    if ($record) {
        // Try to delete from Drive
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
        
        // Remove from database
        deleteFile($fileId);
        $_SESSION['flash_message'] = 'File deleted successfully';
    } else {
        $_SESSION['flash_message'] = 'File not found';
    }
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Handle cleanup trigger
if ($isLoggedIn && isset($_POST['trigger_cleanup'])) {
    $cleanupUrl = SITE_URL . '/cleanup.php?token=' . urlencode(CLEANUP_TOKEN);
    
    // Use async HTTP request with short timeout (fire and forget)
    $ctx = stream_context_create([
        'http' => [
            'timeout' => 1,
            'ignore_errors' => true
        ]
    ]);
    
    @file_get_contents($cleanupUrl, false, $ctx);
    $_SESSION['flash_message'] = 'Cleanup triggered and running in background';
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Handle add account
if ($isLoggedIn && isset($_POST['add_account'])) {
    $accountId = trim($_POST['account_id'] ?? '');
    $clientId = trim($_POST['client_id'] ?? '');
    $clientSecret = trim($_POST['client_secret'] ?? '');
    $refreshToken = trim($_POST['refresh_token'] ?? '');
    $folderId = trim($_POST['folder_id'] ?? '');
    
    if (empty($accountId) || empty($clientId) || empty($clientSecret) || empty($refreshToken)) {
        $_SESSION['flash_error'] = 'All fields except Folder ID are required';
    } else {
        $accounts = getDriveAccounts();
        
        // Check for duplicate ID
        $exists = false;
        foreach ($accounts as $acc) {
            if ($acc['id'] === $accountId) {
                $exists = true;
                break;
            }
        }
        
        if ($exists) {
            $_SESSION['flash_error'] = 'Account ID already exists';
        } else {
            // Test the credentials
            try {
                $testAccount = [
                    'id' => $accountId,
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                    'refresh_token' => $refreshToken,
                    'folder_id' => $folderId ?: null
                ];
                
                $drive = new DriveAPI($testAccount);
                $drive->authenticate();
                
                // If authentication succeeds, add the account
                insertAccount($testAccount);
                $_SESSION['flash_message'] = 'Account added successfully';
            } catch (Exception $e) {
                $_SESSION['flash_error'] = 'Failed to authenticate: ' . $e->getMessage();
            }
        }
    }
    
    header('Location: ' . $_SERVER['PHP_SELF'] . '#accounts');
    exit;
}

// Handle delete account
if ($isLoggedIn && isset($_POST['delete_account'])) {
    $accountId = $_POST['account_id'] ?? '';
    $accounts = getDriveAccounts();
    
    if (count($accounts) <= 1) {
        $_SESSION['flash_error'] = 'Cannot delete the last account';
    } else {
        // Check if account exists
        $found = false;
        foreach ($accounts as $acc) {
            if ($acc['id'] === $accountId) {
                $found = true;
                break;
            }
        }
        
        if ($found) {
            deleteAccount($accountId);
            $_SESSION['flash_message'] = 'Account deleted successfully';
        } else {
            $_SESSION['flash_error'] = 'Account not found';
        }
    }
    
    header('Location: ' . $_SERVER['PHP_SELF'] . '#accounts');
    exit;
}

// Handle test account
if ($isLoggedIn && isset($_POST['test_account'])) {
    $accountId = $_POST['account_id'] ?? '';
    $accounts = getDriveAccounts();
    
    foreach ($accounts as $acc) {
        if ($acc['id'] === $accountId) {
            try {
                $drive = new DriveAPI($acc);
                $drive->authenticate();
                $storageInfo = $drive->getStorageInfo();
                
                if ($storageInfo) {
                    $usedGB = round($storageInfo['usage'] / 1073741824, 2);
                    $totalGB = round($storageInfo['limit'] / 1073741824, 2);
                    $_SESSION['flash_message'] = "Connection successful! Storage: {$usedGB}GB / {$totalGB}GB used";
                } else {
                    $_SESSION['flash_message'] = 'Connection successful!';
                }
            } catch (Exception $e) {
                $_SESSION['flash_error'] = 'Connection failed: ' . $e->getMessage();
            }
            break;
        }
    }
    
    header('Location: ' . $_SERVER['PHP_SELF'] . '#accounts');
    exit;
}

// ── Show login page if not authenticated ──────────────────────────────────────

if (!$isLoggedIn) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Admin Login - <?= htmlspecialchars(SITE_NAME) ?></title>
      <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-950 text-gray-100 min-h-screen flex items-center justify-center">
      <div class="w-full max-w-md">
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 shadow-2xl">
          <h1 class="text-2xl font-bold text-center mb-6">Admin Login</h1>
          
          <?php if (isset($loginError)): ?>
          <div class="bg-red-900/40 border border-red-800 text-red-300 rounded-lg px-4 py-3 mb-4 text-sm">
            <?= htmlspecialchars($loginError) ?>
          </div>
          <?php endif; ?>
          
          <form method="POST">
            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium mb-2">Username</label>
                <input
                  type="text"
                  name="username"
                  required
                  autofocus
                  class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-500"
                />
              </div>
              <div>
                <label class="block text-sm font-medium mb-2">Password</label>
                <input
                  type="password"
                  name="password"
                  required
                  class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 focus:outline-none focus:border-blue-500"
                />
              </div>
              <button
                type="submit"
                name="login"
                class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-2.5 rounded-lg transition"
              >
                Login
              </button>
            </div>
          </form>
        </div>
        
        <div class="text-center mt-6">
          <a href="<?= SITE_URL ?>" class="text-sm text-gray-500 hover:text-gray-300">← Back to Home</a>
        </div>
      </div>
    </body>
    </html>
    <?php
    exit;
}

// ── Load data for dashboard ───────────────────────────────────────────────────

$records = getFiles();
$accounts = getDriveAccounts();

// Calculate statistics
$totalFiles = count($records);
$totalSize = array_sum(array_column($records, 'size'));
$totalDownloads = array_sum(array_column($records, 'download_count'));
$expiredCount = 0;
$activeCount = 0;
$expiringCount = 0;

foreach ($records as $record) {
    $daysLeft = daysUntilExpiry($record);
    if ($daysLeft === 0) {
        $expiredCount++;
    } elseif ($daysLeft <= 7) {
        $expiringCount++;
    } else {
        $activeCount++;
    }
}

// Get flash messages
$flashMessage = $_SESSION['flash_message'] ?? null;
$flashError = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_message']);
unset($_SESSION['flash_error']);

// Load cron status from database
$cronLastRun = (int) getMetadata('cron_last_run', 0);
$cronLastRunDate = getMetadata('cron_last_run_date', null);
$cronNextRun = $cronLastRun > 0 ? $cronLastRun + 3600 : null;

// Sort files by upload date (newest first)
usort($records, function($a, $b) {
    return strtotime($b['uploaded_at'] ?? '1970-01-01') - strtotime($a['uploaded_at'] ?? '1970-01-01');
});

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - <?= htmlspecialchars(SITE_NAME) ?></title>
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
        <h1 class="text-xl font-bold">🔧 Admin Panel</h1>
        <span class="text-sm text-gray-500">·</span>
        <span class="text-sm text-gray-400"><?= htmlspecialchars(SITE_NAME) ?></span>
      </div>
      <div class="flex items-center gap-4">
        <a href="<?= SITE_URL ?>" class="text-sm text-gray-400 hover:text-white transition">
          ← Back to Site
        </a>
        <a href="?logout" class="text-sm text-red-400 hover:text-red-300 transition">
          Logout
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

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
      <div class="stat-card bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="text-sm text-gray-500 mb-1">Total Files</div>
        <div class="text-3xl font-bold text-blue-400"><?= $totalFiles ?></div>
      </div>
      <div class="stat-card bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="text-sm text-gray-500 mb-1">Total Storage</div>
        <div class="text-3xl font-bold text-green-400"><?= formatBytes($totalSize) ?></div>
      </div>
      <div class="stat-card bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="text-sm text-gray-500 mb-1">Total Downloads</div>
        <div class="text-3xl font-bold text-purple-400"><?= $totalDownloads ?></div>
      </div>
      <div class="stat-card bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="text-sm text-gray-500 mb-1">Active Accounts</div>
        <div class="text-3xl font-bold text-yellow-400"><?= count($accounts) ?></div>
      </div>
    </div>

    <!-- File Status Overview -->
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mb-8">
      <h2 class="text-lg font-bold mb-4">File Status Overview</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-gray-800/50 rounded-lg p-4 border border-gray-700">
          <div class="flex items-center justify-between">
            <span class="text-gray-400">Active Files</span>
            <span class="text-2xl font-bold text-green-400"><?= $activeCount ?></span>
          </div>
        </div>
        <div class="bg-gray-800/50 rounded-lg p-4 border border-yellow-900">
          <div class="flex items-center justify-between">
            <span class="text-gray-400">Expiring Soon (&lt;7 days)</span>
            <span class="text-2xl font-bold text-yellow-400"><?= $expiringCount ?></span>
          </div>
        </div>
        <div class="bg-gray-800/50 rounded-lg p-4 border border-red-900">
          <div class="flex items-center justify-between">
            <span class="text-gray-400">Expired</span>
            <span class="text-2xl font-bold text-red-400"><?= $expiredCount ?></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Internal Cron Status -->
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mb-8">
      <h2 class="text-lg font-bold mb-4">Internal Cron Status</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-gray-800/50 rounded-lg p-4 border border-gray-700">
          <div class="text-gray-400 text-sm mb-2">Last Cleanup Run</div>
          <?php if ($cronLastRun > 0): ?>
            <div class="text-lg font-semibold text-green-400">
              <?= date('M d, Y H:i:s', $cronLastRun) ?>
            </div>
            <div class="text-xs text-gray-500 mt-1">
              (<?= formatTimeAgo($cronLastRun) ?>)
            </div>
          <?php else: ?>
            <div class="text-lg font-semibold text-gray-500">Never</div>
          <?php endif; ?>
        </div>
        <div class="bg-gray-800/50 rounded-lg p-4 border border-gray-700">
          <div class="text-gray-400 text-sm mb-2">Next Scheduled Run</div>
          <?php if ($cronNextRun): ?>
            <?php 
              $timeUntilNext = $cronNextRun - time();
              if ($timeUntilNext <= 0): ?>
                <div class="text-lg font-semibold text-yellow-400">Pending</div>
                <div class="text-xs text-gray-500 mt-1">Will run on next page load</div>
              <?php else: ?>
                <div class="text-lg font-semibold text-blue-400">
                  <?= date('M d, Y H:i:s', $cronNextRun) ?>
                </div>
                <div class="text-xs text-gray-500 mt-1">
                  (in <?= gmdate('i', $timeUntilNext) ?> minutes)
                </div>
              <?php endif; ?>
          <?php else: ?>
            <div class="text-lg font-semibold text-gray-500">Unknown</div>
          <?php endif; ?>
        </div>
      </div>
      <div class="mt-4 text-xs text-gray-500 bg-gray-800/30 p-3 rounded border border-gray-700">
        <strong>ℹ️ How it works:</strong> The internal cron checks timestamps on every page load (index, upload, download). 
        If 1+ hour has elapsed since the last run, cleanup is triggered automatically in the background. 
        No external cron job required.
      </div>
    </div>

    <!-- Actions -->
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 mb-8">
      <h2 class="text-lg font-bold mb-4">System Actions</h2>
      <form method="POST" class="inline">
        <button
          type="submit"
          name="trigger_cleanup"
          onclick="return confirm('Trigger cleanup now? This will delete all expired files.')"
          class="bg-orange-600 hover:bg-orange-500 text-white font-semibold px-6 py-2.5 rounded-lg transition"
        >
          🗑️ Trigger Cleanup Now
        </button>
      </form>
      <p class="text-xs text-gray-500 mt-3">
        Cleanup runs automatically every hour via internal cron. Use this to force cleanup immediately.
      </p>
    </div>

    <!-- Files Table -->
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
      <div class="p-6 border-b border-gray-800">
        <h2 class="text-lg font-bold">All Files (<?= $totalFiles ?>)</h2>
      </div>
      
      <?php if (empty($records)): ?>
      <div class="p-8 text-center text-gray-500">
        No files uploaded yet.
      </div>
      <?php else: ?>
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead class="bg-gray-800/50 border-b border-gray-800">
            <tr>
              <th class="text-left px-4 py-3 font-semibold">File Name</th>
              <th class="text-left px-4 py-3 font-semibold">Size</th>
              <th class="text-left px-4 py-3 font-semibold">Uploaded</th>
              <th class="text-left px-4 py-3 font-semibold">Downloads</th>
              <th class="text-left px-4 py-3 font-semibold">Expires</th>
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
                  $statusText = $daysLeft . 'd left';
              } else {
                  $statusClass = 'bg-gray-800 text-gray-400 border-gray-700';
                  $statusText = $daysLeft . 'd left';
              }
            ?>
            <tr class="hover:bg-gray-800/30 transition">
              <td class="px-4 py-3">
                <div class="max-w-xs truncate" title="<?= htmlspecialchars($record['original_name']) ?>">
                  <?= htmlspecialchars($record['original_name']) ?>
                </div>
                <div class="text-xs text-gray-600 font-mono">
                  ID: <?= htmlspecialchars($record['id']) ?>
                </div>
              </td>
              <td class="px-4 py-3 whitespace-nowrap">
                <?= formatBytes((int)($record['size'] ?? 0)) ?>
              </td>
              <td class="px-4 py-3 whitespace-nowrap text-gray-400">
                <?= htmlspecialchars(substr($record['uploaded_at'] ?? '', 0, 16)) ?>
              </td>
              <td class="px-4 py-3 text-center">
                <?= (int)($record['download_count'] ?? 0) ?>
              </td>
              <td class="px-4 py-3 whitespace-nowrap text-gray-400">
                <?php if (!empty($record['last_downloaded_at'])): ?>
                  <?= htmlspecialchars(substr($record['last_downloaded_at'], 0, 16)) ?>
                <?php else: ?>
                  <span class="text-gray-600">Never</span>
                <?php endif; ?>
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
                    class="text-blue-400 hover:text-blue-300 text-xs"
                    title="View"
                  >
                    View
                  </a>
                  <form method="POST" class="inline">
                    <input type="hidden" name="file_id" value="<?= htmlspecialchars($record['id']) ?>" />
                    <button
                      type="submit"
                      name="delete_file"
                      onclick="return confirm('Delete this file? This cannot be undone.')"
                      class="text-red-400 hover:text-red-300 text-xs"
                    >
                      Delete
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <?php endif; ?>
    </div>

    <!-- Account Management -->
    <div id="accounts" class="mt-8 bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
      <div class="p-6 border-b border-gray-800 flex items-center justify-between">
        <h2 class="text-lg font-bold">Storage Accounts (<?= count($accounts) ?>)</h2>
        <button
          onclick="document.getElementById('addAccountForm').classList.toggle('hidden')"
          class="bg-blue-600 hover:bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg text-sm transition"
        >
          + Add Account
        </button>
      </div>
      
      <!-- Add Account Form -->
      <div id="addAccountForm" class="hidden p-6 bg-gray-800/30 border-b border-gray-800">
        <h3 class="font-semibold mb-4 text-blue-400">Add New Account</h3>
        <form method="POST" class="space-y-4">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium mb-2">Account ID *</label>
              <input
                type="text"
                name="account_id"
                required
                placeholder="e.g., account2"
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500"
              />
              <p class="text-xs text-gray-500 mt-1">Unique identifier for this account</p>
            </div>
            <div>
              <label class="block text-sm font-medium mb-2">Folder ID (optional)</label>
              <input
                type="text"
                name="folder_id"
                placeholder="Leave empty for root folder"
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500"
              />
              <p class="text-xs text-gray-500 mt-1">Specific Drive folder for uploads</p>
            </div>
          </div>
          
          <div>
            <label class="block text-sm font-medium mb-2">Client ID *</label>
            <input
              type="text"
              name="client_id"
              required
              placeholder="xxx-xxx.apps.googleusercontent.com"
              class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500 font-mono"
            />
          </div>
          
          <div>
            <label class="block text-sm font-medium mb-2">Client Secret *</label>
            <input
              type="text"
              name="client_secret"
              required
              placeholder="GOCSPX-xxxxxxxxxxxxxxxxxxxxx"
              class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500 font-mono"
            />
          </div>
          
          <div>
            <label class="block text-sm font-medium mb-2">Refresh Token *</label>
            <textarea
              name="refresh_token"
              required
              rows="3"
              placeholder="1//04xxxxxxxxxxxxxxxxxxxxx"
              class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500 font-mono"
            ></textarea>
            <p class="text-xs text-gray-500 mt-1">
              Get from <a href="https://developers.google.com/oauthplayground" target="_blank" class="text-blue-400 hover:underline">OAuth Playground</a> 
              with scope: https://www.googleapis.com/auth/drive
            </p>
          </div>
          
          <div class="flex gap-3">
            <button
              type="submit"
              name="add_account"
              class="bg-green-600 hover:bg-green-500 text-white font-semibold px-6 py-2.5 rounded-lg transition"
            >
              Add Account
            </button>
            <button
              type="button"
              onclick="document.getElementById('addAccountForm').classList.add('hidden')"
              class="bg-gray-700 hover:bg-gray-600 text-white font-semibold px-6 py-2.5 rounded-lg transition"
            >
              Cancel
            </button>
          </div>
        </form>
      </div>
      
      <!-- Accounts List -->
      <div class="p-6">
        <?php if (empty($accounts)): ?>
        <div class="text-center text-gray-500 py-8">
          No accounts configured. Add one to start uploading files.
        </div>
        <?php else: ?>
        <div class="space-y-4">
          <?php foreach ($accounts as $idx => $account): ?>
          <div class="bg-gray-800/50 border border-gray-700 rounded-lg p-5">
            <div class="flex items-start justify-between mb-3">
              <div class="flex-1">
                <div class="flex items-center gap-3 mb-2">
                  <div class="text-lg font-semibold text-blue-400">
                    <?= htmlspecialchars($account['id'] ?? 'Account ' . ($idx + 1)) ?>
                  </div>
                  <span class="text-xs bg-green-900/50 text-green-300 border border-green-800 px-2 py-0.5 rounded">
                    Active
                  </span>
                </div>
                <div class="space-y-1 text-sm">
                  <div class="text-gray-400">
                    <span class="text-gray-600">Client ID:</span>
                    <span class="font-mono ml-2"><?= htmlspecialchars(substr($account['client_id'] ?? '', 0, 40)) ?>...</span>
                  </div>
                  <div class="text-gray-400">
                    <span class="text-gray-600">Refresh Token:</span>
                    <span class="font-mono ml-2"><?= htmlspecialchars(substr($account['refresh_token'] ?? '', 0, 30)) ?>...</span>
                  </div>
                  <?php if (!empty($account['folder_id'])): ?>
                  <div class="text-gray-400">
                    <span class="text-gray-600">Folder ID:</span>
                    <span class="font-mono ml-2"><?= htmlspecialchars($account['folder_id']) ?></span>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
              
              <div class="flex flex-col gap-2 ml-4">
                <form method="POST" class="inline">
                  <input type="hidden" name="account_id" value="<?= htmlspecialchars($account['id']) ?>" />
                  <button
                    type="submit"
                    name="test_account"
                    class="text-xs bg-blue-600 hover:bg-blue-500 text-white font-semibold px-3 py-1.5 rounded transition whitespace-nowrap"
                  >
                    Test Connection
                  </button>
                </form>
                
                <?php if (count($accounts) > 1): ?>
                <form method="POST" class="inline">
                  <input type="hidden" name="account_id" value="<?= htmlspecialchars($account['id']) ?>" />
                  <button
                    type="submit"
                    name="delete_account"
                    onclick="return confirm('Delete this account? Files uploaded to this account will remain but you won\'t be able to access them.')"
                    class="text-xs bg-red-600 hover:bg-red-500 text-white font-semibold px-3 py-1.5 rounded transition whitespace-nowrap"
                  >
                    Delete
                  </button>
                </form>
                <?php else: ?>
                <button
                  disabled
                  title="Cannot delete the last account"
                  class="text-xs bg-gray-700 text-gray-500 font-semibold px-3 py-1.5 rounded cursor-not-allowed whitespace-nowrap"
                >
                  Delete
                </button>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>

  </main>

  <footer class="border-t border-gray-800 text-center py-6 text-xs text-gray-600 mt-12">
    <?= htmlspecialchars(SITE_NAME) ?> &copy; <?= date('Y') ?> · Free file sharing service
    <br class="sm:hidden" />
    <span class="mx-2 hidden sm:inline">·</span>
    <a href="terms" class="hover:text-gray-400 transition">Terms</a>
    <span class="mx-2">·</span>
    <a href="privacy" class="hover:text-gray-400 transition">Privacy</a>
    <span class="mx-2">·</span>
    <a href="dmca" class="hover:text-gray-400 transition">DMCA</a>
    <span class="mx-2">·</span>
    <a href="about" class="hover:text-gray-400 transition">About</a>
    <span class="mx-2">·</span>
    <a href="contact" class="hover:text-gray-400 transition">Contact</a>
    <span class="mx-2">·</span>
    <a href="/" class="hover:text-gray-400 transition">Home</a>
  </footer>

</body>
</html>
