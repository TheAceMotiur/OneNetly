<?php
/**
 * download.php — File info & download page.
 * Tracks last_downloaded_at per visit. Cleanup runs automatically via internal cron.
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/internal_cron.php';

// -- Helpers -------------------------------------------------------------------

function formatBytes(int $bytes): string {
    if ($bytes <= 0) return '0 B';
    $units = ['B','KB','MB','GB','TB'];
    $i = (int) floor(log($bytes, 1024));
    return round($bytes / pow(1024, $i), 2) . ' ' . $units[$i];
}

function fileIcon(string $name): string {
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $map = [
        'pdf'  => '📄', 'doc'  => '📝', 'docx' => '📝',
        'xls'  => '📊', 'xlsx' => '📊', 'ppt'  => '📽️', 'pptx' => '📽️',
        'zip'  => '🗜️',  'rar'  => '🗜️',  '7z'   => '🗜️',
        'mp4'  => '🎬', 'mov'  => '🎬', 'avi'  => '🎬', 'mkv'  => '🎬',
        'mp3'  => '🎵', 'wav'  => '🎵', 'flac' => '🎵',
        'jpg'  => '🖼️',  'jpeg' => '🖼️',  'png'  => '🖼️',  'gif'  => '🖼️',
        'webp' => '🖼️',  'svg'  => '🖼️',
        'txt'  => '📃', 'csv'  => '📊', 'json' => '📋',
    ];
    return $map[$ext] ?? '📦';
}

function isImageFile(string $name): bool {
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $imageExts = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg', 'ico'];
    return in_array($ext, $imageExts, true);
}

function daysUntilExpiry(array $record): int {
    $expiry   = (int)($record['expires_after_days'] ?? EXPIRY_DAYS);
    $base     = $record['last_downloaded_at'] ?? $record['uploaded_at'] ?? null;
    if (!$base) return $expiry;
    $diffDays = (int) floor((time() - strtotime($base)) / 86400);
    return max(0, $expiry - $diffDays);
}

function renderErrorPage(string $msg): void {
    $site = defined('SITE_NAME') ? SITE_NAME : 'OneNetly';
    $home = defined('SITE_URL')  ? SITE_URL  : '/';
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>$site — Error</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-white flex items-center justify-center min-h-screen">
  <div class="text-center space-y-4">
    <div class="text-6xl">⚠️</div>
    <h1 class="text-2xl font-bold">$msg</h1>
    <a href="$home" class="inline-block mt-4 px-6 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg transition">
      Go Home
    </a>
  </div>
</body>
</html>
HTML;
    exit;
}

// -- Validate ID ---------------------------------------------------------------

$id = trim($_GET['id'] ?? '');

if (empty($id) || !preg_match('/^[a-f0-9]{12}$/', $id)) {
    http_response_code(400);
    renderErrorPage('Invalid download link.');
}

// -- Find record ---------------------------------------------------------------

// Find file record in database
$found = getFileById($id);

if ($found === null) {
    http_response_code(404);
    renderErrorPage('File not found or the link has expired.');
}

// -- Track this page visit -----------------------------------------------------

incrementDownloadCount($id);
$found['last_downloaded_at'] = date('Y-m-d H:i:s');
$found['download_count'] = (int)($found['download_count'] ?? 0) + 1;

// -- Build template vars -------------------------------------------------------

$siteName      = SITE_NAME;
$siteUrl       = SITE_URL;
$fileName      = htmlspecialchars($found['original_name']);
$fileSize      = formatBytes((int)($found['size'] ?? 0));
$fileExt       = strtoupper(pathinfo($found['original_name'], PATHINFO_EXTENSION)) ?: 'FILE';
$icon          = fileIcon($found['original_name']);
$isImage       = isImageFile($found['original_name']);
$uploadedAt    = htmlspecialchars($found['uploaded_at'] ?? '');
$downloadCount = (int)($found['download_count'] ?? 0);
$daysLeft      = daysUntilExpiry($found);
$expiryDays    = (int)($found['expires_after_days'] ?? EXPIRY_DAYS);
$directLink    = SITE_URL . '/stream/' . urlencode($id);
$downloadLink  = SITE_URL . '/stream/' . urlencode($id) . '?download=1';
$shareLink     = htmlspecialchars(DOWNLOAD_BASE . $id);

// Calculate actual removal date
$baseDate = $found['last_downloaded_at'] ?? $found['uploaded_at'] ?? date('Y-m-d H:i:s');
$removalDate = date('Y-m-d H:i:s', strtotime($baseDate . ' + ' . $expiryDays . ' days'));

if ($daysLeft <= 7)      { $expiryClass = 'bg-red-900/60 text-red-300 border-red-800'; }
elseif ($daysLeft <= 30) { $expiryClass = 'bg-yellow-900/60 text-yellow-300 border-yellow-800'; }
else                     { $expiryClass = 'bg-gray-800 text-gray-600 dark:text-gray-400 border-gray-700'; }
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $fileName ?> — <?= $siteName ?></title>
  <meta name="description" content="Download <?= $fileName ?> (<?= $fileSize ?>) from <?= $siteName ?>." />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
  <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
  <style>
    [v-cloak]{display:none}
    
    /* Theme transitions */
    * {
      transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
    }
  </style>
  
  <!-- Theme Management -->
  <script>
    // Initialize theme from cookie or system preference
    (function() {
      const savedTheme = document.cookie.split('; ').find(row => row.startsWith('theme='))?.split('=')[1];
      const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      const theme = savedTheme || (prefersDark ? 'dark' : 'light');
      document.documentElement.classList.add(theme);
    })();
    
    function toggleTheme() {
      const html = document.documentElement;
      const currentTheme = html.classList.contains('dark') ? 'dark' : 'light';
      const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
      
      html.classList.remove('dark', 'light');
      html.classList.add(newTheme);
      
      // Save preference
      document.cookie = `theme=${newTheme}; path=/; max-age=31536000; SameSite=Lax`;
    }
  </script>
</head>
<body class="bg-white dark:bg-gray-950 text-gray-900 dark:text-gray-100 min-h-screen antialiased flex flex-col transition-colors duration-200">

  <!-- Header -->
  <header class="border-b border-gray-200 dark:border-gray-800 bg-white/80 dark:bg-gray-900/60 backdrop-blur sticky top-0 z-20">
    <div class="max-w-3xl mx-auto px-4 py-3 flex items-center justify-between">
      <a href="<?= $siteUrl ?>" class="flex items-center gap-2 text-xl font-bold tracking-tight">
        <span class="text-2xl">📁</span>
        <span class="text-blue-500 dark:text-blue-400"><?= htmlspecialchars($siteName) ?></span>
      </a>
      
      <div class="flex items-center gap-3">
        <a href="<?= $siteUrl ?>" class="text-xs text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-white transition">
          ↑ Upload another file
        </a>
        
        <!-- Theme Switcher -->
        <button 
          onclick="toggleTheme()"
          class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
          title="Toggle theme"
          aria-label="Toggle theme"
        >
          <svg class="w-5 h-5 hidden dark:block" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/>
          </svg>
          <svg class="w-5 h-5 block dark:hidden" fill="currentColor" viewBox="0 0 20 20">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
          </svg>
        </button>
      </div>
    </div>
  </header>

  <!-- Main -->
  <main class="flex-1 flex items-center justify-center px-4 py-16">
    <div id="app" v-cloak class="w-full max-w-lg space-y-4">

      <!-- File card -->
      <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl p-7 text-center space-y-4 shadow-2xl">

        <!-- Icon + name -->
        <div class="space-y-2">
          <div class="text-7xl leading-none"><?= $icon ?></div>
          <h1 class="text-xl font-bold break-all leading-snug"><?= $fileName ?></h1>
          <div class="flex items-center justify-center gap-3 text-sm text-gray-600 dark:text-gray-400 flex-wrap">
            <span class="bg-gray-800 px-2 py-0.5 rounded font-mono text-xs text-blue-300"><?= $fileExt ?></span>
            <span><?= $fileSize ?></span>
            <?php if ($uploadedAt): ?>
            <span>Uploaded <?= $uploadedAt ?></span>
            <?php endif; ?>
          </div>
          <?php if ($downloadCount > 0): ?>
          <p class="text-xs text-gray-600">
            Downloaded <?= $downloadCount ?> time<?= $downloadCount !== 1 ? 's' : '' ?>
          </p>
          <?php endif; ?>
        </div>

        <!-- Image Preview (if image file) -->
        <?php if ($isImage): ?>
        <div class="mt-4 mb-4">
          <div class="relative rounded-xl overflow-hidden bg-gray-800 border border-gray-700">
            <img 
              src="<?= $directLink ?>" 
              alt="<?= $fileName ?>" 
              class="w-full h-auto max-h-96 object-contain"
              loading="lazy"
              onerror="this.parentElement.innerHTML='<div class=&quot;p-8 text-gray-500 text-sm&quot;>🖼️ Preview unavailable</div>'"
            />
          </div>
          <p class="text-xs text-gray-500 mt-2 text-center">Image Preview</p>
        </div>
        <?php endif; ?>

        <!-- Download button -->
        <a
          href="<?= $downloadLink ?>"
          class="flex items-center justify-center gap-2 w-full py-3.5 rounded-xl bg-blue-600 hover:bg-blue-500 active:scale-95 text-white font-bold text-lg transition-all duration-150 shadow-lg shadow-blue-900/40"
        >
          ⬇️ Download File
        </a>
      </div>

      <!-- Share link -->
      <div class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-4 space-y-2">
        <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Share this file</p>
        <div class="flex items-center gap-2">
          <input
            type="text"
            readonly
            value="<?= $shareLink ?>"
            class="flex-1 bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-xs font-mono text-blue-300 focus:outline-none cursor-pointer"
            @click="$event.target.select()"
          />
          <button
            @click="copyShareLink"
            class="flex-shrink-0 px-4 py-2 rounded-lg text-xs font-bold transition"
            :class="copied ? 'bg-green-600 text-white' : 'bg-blue-600 hover:bg-blue-500 text-white'"
          >
            {{ copied ? '✓ Copied!' : 'Copy' }}
          </button>
        </div>
      </div>

      <!-- Back link -->
      <p class="text-center text-sm text-gray-600">
        <a href="<?= $siteUrl ?>" class="hover:text-blue-500 dark:text-blue-400 transition">↑ Upload a new file</a>
      </p>

    </div>
  </main>

  <footer class="border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-900/40 mt-auto">
    <div class="max-w-3xl mx-auto px-4 py-8">
      <!-- Links -->
      <nav class="text-center mb-4">
        <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-sm">
          <a href="terms" class="text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-400 transition">Terms</a>
          <span class="text-gray-400 dark:text-gray-600">•</span>
          <a href="privacy" class="text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-400 transition">Privacy</a>
          <span class="text-gray-400 dark:text-gray-600">•</span>
          <a href="dmca" class="text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-400 transition">DMCA</a>
          <span class="text-gray-400 dark:text-gray-600">•</span>
          <a href="about" class="text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-400 transition">About</a>
          <span class="text-gray-400 dark:text-gray-600">•</span>
          <a href="contact" class="text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-400 transition">Contact</a>
        </div>
      </nav>
      
      <!-- Copyright -->
      <div class="text-center text-xs text-gray-500 dark:text-gray-600">
        <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($siteName) ?>. All rights reserved.</p>
        <p class="mt-1">Free file sharing service</p>
      </div>
    </div>
  </footer>

<script>
const { createApp, ref } = Vue;
createApp({
  setup() {
    const copied = ref(false);

    function copyShareLink() {
      const text = <?= json_encode(DOWNLOAD_BASE . $id) ?>;
      const markCopied = () => {
        copied.value = true;
        setTimeout(() => { copied.value = false; }, 2500);
      };
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(markCopied).catch(() => execCopy(text, markCopied));
      } else {
        execCopy(text, markCopied);
      }
    }

    function execCopy(text, cb) {
      const ta = document.createElement('textarea');
      ta.value = text;
      ta.style.cssText = 'position:fixed;top:0;left:0;opacity:0;pointer-events:none;';
      document.body.appendChild(ta);
      ta.focus(); ta.select();
      try { document.execCommand('copy'); } catch(_) {}
      document.body.removeChild(ta);
      cb();
    }

    return { copied, copyShareLink };
  }
}).mount('#app');
</script>
</body>
</html>
