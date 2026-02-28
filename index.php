<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= defined('SITE_NAME') ? SITE_NAME : 'OneNetly' ?> – Free File Sharing</title>
  <meta name="description" content="Upload any file and share a download link instantly. No registration required." />

  <!-- TailwindCSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            brand: { DEFAULT: '#3b82f6', dark: '#2563eb' }
          },
          animation: {
            'pulse-slow': 'pulse 3s cubic-bezier(0.4,0,0.6,1) infinite',
          }
        }
      }
    }
  </script>

  <!-- Vue 3 CDN -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>

  <style>
    [v-cloak] { display: none; }

    /* Professional gradients and animations */
    .gradient-bg {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .drop-zone-active {
      background: rgba(59,130,246,.12);
      border-color: #3b82f6 !important;
      box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
    }

    /* Thin scroll bar for file list */
    .file-list::-webkit-scrollbar { width: 4px; }
    .file-list::-webkit-scrollbar-track { background: transparent; }
    .file-list::-webkit-scrollbar-thumb { background: #374151; border-radius: 2px; }

    /* Shimmer animation for processing state */
    @keyframes shimmer {
      0%   { background-position: -400px 0; }
      100% { background-position: 400px 0; }
    }
    .shimmer {
      background: linear-gradient(90deg, #eab308 25%, #fde047 50%, #eab308 75%);
      background-size: 400px 100%;
      animation: shimmer 1.4s infinite;
    }

    /* Smooth list transitions */
    .list-enter-active, .list-leave-active {
      transition: all 0.3s ease;
    }
    .list-enter-from {
      opacity: 0;
      transform: translateY(-10px);
    }
    .list-leave-to {
      opacity: 0;
      transform: translateX(20px);
    }

    /* Professional card hover effects */
    .card-hover {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-hover:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    /* Smooth details animation */
    details summary {
      list-style: none;
    }
    details summary::-webkit-details-marker {
      display: none;
    }

    /* Premium focus styles */
    input:focus, textarea:focus, button:focus {
      outline: none;
      ring: 2px;
      ring-color: rgba(59, 130, 246, 0.3);
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
<body class="bg-white dark:bg-gray-950 text-gray-900 dark:text-gray-100 min-h-screen antialiased transition-colors duration-200">

<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/internal_cron.php';
$siteName = SITE_NAME;
$maxMB    = MAX_FILE_SIZE_MB;
$maxDisplay = $maxMB >= 1024 ? round($maxMB / 1024, 1) . ' GB' : $maxMB . ' MB';
?>

<div id="app" v-cloak class="min-h-screen flex flex-col">

  <!-- ── Header ────────────────────────────────────────────────────────── -->
  <header class="border-b border-gray-200 dark:border-gray-800 bg-white/80 dark:bg-gray-900/60 backdrop-blur sticky top-0 z-20">
    <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
      <a href="/" class="flex items-center gap-2 text-xl font-bold tracking-tight">
        <span class="text-2xl">☁️</span>
        <span class="text-blue-500 dark:text-blue-500 dark:text-blue-400"><?= htmlspecialchars($siteName) ?></span>
      </a>
      
      <div class="flex items-center gap-3">
        <span class="text-xs text-gray-500 dark:text-gray-500 dark:text-gray-600 dark:text-gray-400 hidden sm:block">No login · No limit on files · Free</span>
        
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

  <!-- ── Main ──────────────────────────────────────────────────────────── -->
  <main class="flex-1 max-w-3xl w-full mx-auto px-4 py-12 space-y-8">

    <!-- Hero -->
    <div class="text-center space-y-4 mb-2">
      <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">
        Upload & Share <span class="bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">Instantly</span>
      </h1>
      <p class="text-gray-600 dark:text-gray-400 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed">
        Drag &amp; drop your files below — get a shareable link in seconds.<br>
        <span class="inline-flex items-center gap-2 mt-2">
          <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
          </svg>
          Max single file: <strong class="text-gray-900 dark:text-gray-200"><?= $maxDisplay ?></strong>
        </span>
        <span class="inline-flex items-center gap-2 mx-3">
          <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
          </svg>
          No registration required
        </span>
      </p>
    </div>

    <!-- ── Drop zone ─────────────────────────────────────────────────── -->
    <div
      class="relative border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-2xl p-10 sm:p-12 text-center cursor-pointer transition-all duration-300 hover:border-blue-500 hover:bg-blue-500/5 hover:shadow-lg card-hover"
      :class="{ 'drop-zone-active': dragging }"
      @dragover.prevent="dragging = true"
      @dragleave.prevent="dragging = false"
      @drop.prevent="onDrop"
      @click="$refs.fileInput.click()"
    >
      <input
        ref="fileInput"
        type="file"
        multiple
        class="hidden"
        @change="onFileSelect"
      />

      <div class="flex flex-col items-center gap-4 pointer-events-none select-none">
        <div class="relative">
          <span class="text-6xl transition-all duration-300" :class="dragging ? 'scale-125' : ''">📂</span>
          <div v-if="dragging" class="absolute inset-0 bg-blue-500/20 rounded-full animate-ping"></div>
        </div>
        <div class="space-y-2">
          <p class="text-lg sm:text-xl font-semibold" :class="dragging ? 'text-blue-500 dark:text-blue-400' : 'text-gray-900 dark:text-gray-200'">
            <span v-if="dragging">Drop files here…</span>
            <span v-else>Drag &amp; drop files, or <span class="text-blue-500 dark:text-blue-400 underline underline-offset-2">browse</span></span>
          </p>
          <p class="text-sm text-gray-500 dark:text-gray-400">All file types accepted · Multiple files allowed · Up to <?= $maxDisplay ?></p>
        </div>
      </div>
    </div>

    <!-- ── File queue ─────────────────────────────────────────────────── -->
    <transition-group
      name="list"
      tag="div"
      class="space-y-3 file-list max-h-[60vh] overflow-y-auto pr-1"
      v-if="queue.length"
    >
      <div
        v-for="item in queue"
        :key="item.uid"
        class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-4 space-y-3 transition-all"
      >
        <!-- File info row -->
        <div class="flex items-start gap-3">
          <span class="text-2xl mt-0.5 flex-shrink-0">{{ fileIcon(item.file.name) }}</span>
          <div class="flex-1 min-w-0">
            <p class="font-medium text-sm truncate" :title="item.file.name">{{ item.file.name }}</p>
            <p class="text-xs text-gray-500 dark:text-gray-500 mt-0.5">{{ formatSize(item.file.size) }}</p>
          </div>
          <!-- Status badge -->
          <span
            class="text-xs px-2 py-0.5 rounded-full font-semibold flex-shrink-0"
            :class="{
              'bg-gray-700 text-gray-300'  : item.status === 'queued',
              'bg-blue-900 text-blue-300'  : item.status === 'uploading',
              'bg-yellow-900 text-yellow-300': item.status === 'processing',
              'bg-green-900 text-green-300': item.status === 'done',
              'bg-red-900 text-red-300'    : item.status === 'error',
            }"
          >
            <span v-if="item.status === 'queued'">Queued</span>
            <span v-else-if="item.status === 'uploading'">{{ item.progress }}%</span>
            <span v-else-if="item.status === 'processing'" class="flex items-center gap-1.5">
              <span class="inline-block w-1.5 h-1.5 bg-yellow-400 rounded-full animate-pulse"></span>
              Processing...
            </span>
            <span v-else-if="item.status === 'done'">✓ Done</span>
            <span v-else>✗ Failed</span>
          </span>
          <!-- Remove button (only when not uploading) -->
          <button
            v-if="item.status !== 'uploading' && item.status !== 'processing'"
            @click.stop="removeItem(item.uid)"
            class="text-gray-600 hover:text-red-400 transition flex-shrink-0 ml-1"
            title="Remove"
          >✕</button>
        </div>

        <!-- Progress bar -->
        <div v-if="item.status === 'uploading' || item.status === 'processing'" class="h-1.5 bg-gray-800 rounded-full overflow-hidden">
          <div
            class="h-full rounded-full transition-all duration-300"
            :class="item.status === 'processing' ? 'bg-yellow-500 shimmer' : 'bg-blue-500'"
            :style="{ width: item.progress + '%' }"
          ></div>
        </div>

        <!-- Error message -->
        <p v-if="item.status === 'error'" class="text-xs text-red-400">
          ⚠ {{ item.error }}
        </p>

        <!-- Success result -->
        <div v-if="item.status === 'done'" class="space-y-2">
          <!-- Download link -->
          <div class="flex items-center gap-2">
            <input
              :id="'link-' + item.uid"
              type="text"
              readonly
              :value="item.result.download_link"
              class="flex-1 bg-gray-800 border border-gray-700 rounded-lg px-3 py-1.5 text-xs font-mono text-blue-300 focus:outline-none select-all cursor-pointer"
              @click="$event.target.select()"
            />
            <button
              @click="copyLink(item)"
              class="flex-shrink-0 px-3 py-1.5 rounded-lg text-xs font-semibold transition"
              :class="item.copied ? 'bg-green-600 text-white' : 'bg-blue-600 hover:bg-blue-500 text-white'"
            >
              {{ item.copied ? '✓ Copied!' : 'Copy' }}
            </button>
          </div>
        </div>
      </div>
    </transition-group>

    <!-- ── Action bar ─────────────────────────────────────────────────── -->
    <div v-if="queue.length" class="flex items-center justify-between gap-4">
      <p class="text-sm text-gray-500 dark:text-gray-500">
        {{ doneCount }} / {{ queue.length }} uploaded
        <span v-if="errorCount" class="text-red-400 ml-2">· {{ errorCount }} failed</span>
      </p>
      <div class="flex gap-3">
        <button
          v-if="hasPending"
          @click="uploadAll"
          :disabled="uploading"
          class="px-5 py-2 rounded-xl font-semibold text-sm bg-blue-600 hover:bg-blue-500 disabled:opacity-50 disabled:cursor-not-allowed transition flex items-center gap-2"
        >
          <span v-if="uploading" class="inline-block w-3 h-3 border-2 border-white/40 border-t-white rounded-full animate-spin"></span>
          {{ uploading ? 'Uploading…' : '⬆ Upload All' }}
        </button>
        <button
          @click="clearDone"
          class="px-4 py-2 rounded-xl font-semibold text-sm bg-gray-800 hover:bg-gray-700 transition text-gray-300"
        >
          Clear Done
        </button>
      </div>
    </div>

    <!-- Empty state nudge -->
    <div v-if="!queue.length" class="text-center py-4 text-gray-600 text-sm select-none">
      No files selected yet.
    </div>

    <!-- ── Info cards ─────────────────────────────────────────────────── -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4">
      <div v-for="card in infoCards" :key="card.title"
           class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-4 text-center space-y-1">
        <div class="text-2xl">{{ card.icon }}</div>
        <div class="font-semibold text-sm">{{ card.title }}</div>
        <div class="text-xs text-gray-500 dark:text-gray-500">{{ card.desc }}</div>
      </div>
    </div>

    <!-- ── FAQ Section ─────────────────────────────────────────────────── -->
    <section class="pt-16 pb-8">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold mb-2">Frequently Asked Questions</h2>
        <p class="text-gray-600 dark:text-gray-400">Everything you need to know about <?= htmlspecialchars($siteName) ?></p>
      </div>
      
      <div class="space-y-3">
        <!-- FAQ Item 1 -->
        <details class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden group">
          <summary class="px-6 py-4 font-semibold cursor-pointer flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <span class="flex items-center gap-3">
              <span class="text-blue-500 dark:text-blue-400">❓</span>
              <span>Is <?= htmlspecialchars($siteName) ?> really free?</span>
            </span>
            <svg class="w-5 h-5 transform transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="px-6 py-4 pt-0 text-gray-600 dark:text-gray-400 leading-relaxed">
            Yes! <?= htmlspecialchars($siteName) ?> is completely free to use. No hidden fees, no subscription plans, and no credit card required. Upload and share as many files as you need.
          </div>
        </details>

        <!-- FAQ Item 2 -->
        <details class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden group">
          <summary class="px-6 py-4 font-semibold cursor-pointer flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <span class="flex items-center gap-3">
              <span class="text-blue-500 dark:text-blue-400">📦</span>
              <span>What is the maximum file size I can upload?</span>
            </span>
            <svg class="w-5 h-5 transform transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="px-6 py-4 pt-0 text-gray-600 dark:text-gray-400 leading-relaxed">
            You can upload files up to <strong class="text-gray-900 dark:text-gray-200"><?= $maxDisplay ?></strong> per file. There's no limit on the number of files you can upload.
          </div>
        </details>

        <!-- FAQ Item 3 -->
        <details class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden group">
          <summary class="px-6 py-4 font-semibold cursor-pointer flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <span class="flex items-center gap-3">
              <span class="text-blue-500 dark:text-blue-400">⏱️</span>
              <span>How long are files stored?</span>
            </span>
            <svg class="w-5 h-5 transform transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="px-6 py-4 pt-0 text-gray-600 dark:text-gray-400 leading-relaxed">
            Files are automatically stored for <strong class="text-gray-900 dark:text-gray-200"><?= EXPIRY_DAYS ?> days</strong> from the last download. If a file hasn't been downloaded, it will be deleted <?= EXPIRY_DAYS ?> days after upload. This ensures we can keep the service free and fast for everyone.
          </div>
        </details>

        <!-- FAQ Item 4 -->
        <details class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden group">
          <summary class="px-6 py-4 font-semibold cursor-pointer flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <span class="flex items-center gap-3">
              <span class="text-blue-500 dark:text-blue-400">🔐</span>
              <span>Is my data secure and private?</span>
            </span>
            <svg class="w-5 h-5 transform transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="px-6 py-4 pt-0 text-gray-600 dark:text-gray-400 leading-relaxed">
            Yes. Files are stored securely in the cloud with encrypted connections. Only people with the download link can access your files. We do not scan, read, or modify your files. For sensitive data, we recommend encrypting files before uploading.
          </div>
        </details>

        <!-- FAQ Item 5 -->
        <details class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden group">
          <summary class="px-6 py-4 font-semibold cursor-pointer flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <span class="flex items-center gap-3">
              <span class="text-blue-500 dark:text-blue-400">🚫</span>
              <span>What file types are allowed?</span>
            </span>
            <svg class="w-5 h-5 transform transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="px-6 py-4 pt-0 text-gray-600 dark:text-gray-400 leading-relaxed">
            Nearly all file types are supported! For security reasons, we block executable scripts like .php, .sh, .bat, and similar formats. Everything else — documents, images, videos, archives, etc. — is welcome.
          </div>
        </details>

        <!-- FAQ Item 6 -->
        <details class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden group">
          <summary class="px-6 py-4 font-semibold cursor-pointer flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <span class="flex items-center gap-3">
              <span class="text-blue-500 dark:text-blue-400">👤</span>
              <span>Do I need to create an account?</span>
            </span>
            <svg class="w-5 h-5 transform transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="px-6 py-4 pt-0 text-gray-600 dark:text-gray-400 leading-relaxed">
            No account needed! Just visit <?= htmlspecialchars($siteName) ?>, upload your files, and instantly get shareable links. It's that simple.
          </div>
        </details>

        <!-- FAQ Item 7 -->
        <details class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden group">
          <summary class="px-6 py-4 font-semibold cursor-pointer flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <span class="flex items-center gap-3">
              <span class="text-blue-500 dark:text-blue-400">💬</span>
              <span>How can I contact support?</span>
            </span>
            <svg class="w-5 h-5 transform transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="px-6 py-4 pt-0 text-gray-600 dark:text-gray-400 leading-relaxed">
            You can reach us at <a href="mailto:<?= SITE_EMAIL ?>" class="text-blue-500 dark:text-blue-400 hover:underline font-semibold"><?= SITE_EMAIL ?></a>. We typically respond within 24-48 hours. For more details, visit our <a href="contact" class="text-blue-500 dark:text-blue-400 hover:underline">contact page</a>.
          </div>
        </details>

        <!-- FAQ Item 8 -->
        <details class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden group">
          <summary class="px-6 py-4 font-semibold cursor-pointer flex items-center justify-between hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <span class="flex items-center gap-3">
              <span class="text-blue-500 dark:text-blue-400">🔗</span>
              <span>Can I delete or modify uploaded files?</span>
            </span>
            <svg class="w-5 h-5 transform transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </summary>
          <div class="px-6 py-4 pt-0 text-gray-600 dark:text-gray-400 leading-relaxed">
            Since no account is required, files cannot be managed after upload. Files will automatically expire after <?= EXPIRY_DAYS ?> days. If you need a file removed immediately, please <a href="contact" class="text-blue-500 dark:text-blue-400 hover:underline">contact us</a> with the download link.
          </div>
        </details>
      </div>
    </section>

  </main>

  <!-- ── Footer ────────────────────────────────────────────────────────── -->
  <footer class="border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-900/40 mt-auto">
    <div class="max-w-4xl mx-auto px-4 py-8">
      <!-- Links -->
      <nav class="text-center mb-4">
        <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-sm">
          <a href="terms" class="text-gray-600 dark:text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-500 dark:text-blue-400 transition">Terms</a>
          <span class="text-gray-600 dark:text-gray-400 dark:text-gray-600">·</span>
          <a href="privacy" class="text-gray-600 dark:text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-500 dark:text-blue-400 transition">Privacy</a>
          <span class="text-gray-600 dark:text-gray-400 dark:text-gray-600">·</span>
          <a href="dmca" class="text-gray-600 dark:text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-500 dark:text-blue-400 transition">DMCA</a>
          <span class="text-gray-600 dark:text-gray-400 dark:text-gray-600">·</span>
          <a href="about" class="text-gray-600 dark:text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-500 dark:text-blue-400 transition">About</a>
          <span class="text-gray-600 dark:text-gray-400 dark:text-gray-600">·</span>
          <a href="contact" class="text-gray-600 dark:text-gray-600 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-500 dark:text-blue-400 transition">Contact</a>
        </div>
      </nav>
      
      <!-- Copyright -->
      <div class="text-center text-xs text-gray-500 dark:text-gray-500 dark:text-gray-600">
        <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($siteName) ?>. All rights reserved.</p>
        <p class="mt-1">Free file sharing service · <a href="mailto:<?= SITE_EMAIL ?>" class="hover:text-blue-500 transition"><?= SITE_EMAIL ?></a></p>
      </div>
    </div>
  </footer>

</div><!-- #app -->

<!-- ── Vue App ─────────────────────────────────────────────────────────────── -->
<script>
const { createApp, ref, computed } = Vue;

createApp({
  setup() {
    const queue    = ref([]);
    const dragging = ref(false);
    const uploading = ref(false);
    let   uidSeq   = 0;

    // ── Info cards data ──────────────────────────────────────────────
    const infoCards = [
      { icon: '🚀', title: 'Instant Sharing',   desc: 'Upload once, share the link anywhere.' },
      { icon: '🔒', title: 'No Account Needed', desc: 'No sign-up or login required — ever.'  },
      { icon: '☁️', title: 'Cloud Storage',       desc: 'Files are stored securely in the cloud.' },
    ];

    // ── Computed ─────────────────────────────────────────────────────
    const doneCount  = computed(() => queue.value.filter(i => i.status === 'done').length);
    const errorCount = computed(() => queue.value.filter(i => i.status === 'error').length);
    const hasPending = computed(() => queue.value.some(i => i.status === 'queued'));

    // ── File helpers ─────────────────────────────────────────────────
    function fileIcon(name) {
      const ext = name.split('.').pop().toLowerCase();
      const map = {
        pdf: '📄', doc: '📝', docx: '📝', xls: '📊', xlsx: '📊',
        ppt: '📑', pptx: '📑', zip: '🗜', rar: '🗜', '7z': '🗜',
        mp4: '🎬', mov: '🎬', avi: '🎬', mkv: '🎬', webm: '🎬',
        mp3: '🎵', wav: '🎵', flac: '🎵', ogg: '🎵',
        jpg: '🖼', jpeg: '🖼', png: '🖼', gif: '🖼', webp: '🖼', svg: '🖼',
        txt: '📃', csv: '📃', json: '🔧', xml: '🔧', html: '🌐',
        js: '📜', ts: '📜', php: '🐘', py: '🐍',
      };
      return map[ext] || '📁';
    }

    function formatSize(bytes) {
      if (bytes === 0) return '0 B';
      const k = 1024, sizes = ['B','KB','MB','GB'];
      const i = Math.floor(Math.log(bytes) / Math.log(k));
      return (bytes / Math.pow(k, i)).toFixed(i ? 1 : 0) + ' ' + sizes[i];
    }

    function makeItem(file) {
      const maxBytes = <?= MAX_FILE_SIZE_BYTES ?>;
      const tooLarge = file.size > maxBytes;
      
      return {
        uid:      ++uidSeq,
        file,
        status:   tooLarge ? 'error' : 'queued',   // queued | uploading | processing | done | error
        progress: 0,
        result:   null,
        error:    tooLarge ? `File exceeds ${<?= MAX_FILE_SIZE_MB ?>} MB limit (${formatSize(file.size)})` : '',
        copied:   false,
      };
    }

    // ── Drop / select ────────────────────────────────────────────────
    function onDrop(e) {
      dragging.value = false;
      const files = Array.from(e.dataTransfer.files);
      files.forEach(f => queue.value.push(makeItem(f)));
      uploadAll();
    }

    function onFileSelect(e) {
      const files = Array.from(e.target.files);
      files.forEach(f => queue.value.push(makeItem(f)));
      e.target.value = '';
      uploadAll();
    }

    function removeItem(uid) {
      queue.value = queue.value.filter(i => i.uid !== uid);
    }

    function clearDone() {
      queue.value = queue.value.filter(i => i.status !== 'done' && i.status !== 'error');
    }

    // ── Upload ───────────────────────────────────────────────────────
    async function uploadAll() {
      if (uploading.value) return;
      const pending = queue.value.filter(i => i.status === 'queued');
      if (!pending.length) return;

      uploading.value = true;

      // Upload sequentially so we don't saturate the server
      for (const item of pending) {
        await uploadItem(item);
      }

      uploading.value = false;
    }

    function uploadItem(item) {
      return new Promise((resolve) => {
        item.status   = 'uploading';
        item.progress = 0;

        const formData = new FormData();
        formData.append('file', item.file);

        const xhr = new XMLHttpRequest();

        xhr.upload.addEventListener('progress', (e) => {
          if (e.lengthComputable) {
            const uploadProgress = Math.round((e.loaded / e.total) * 95); // cap at 95 until server confirms
            item.progress = uploadProgress;
            
            // Switch to processing status when upload completes
            if (uploadProgress >= 95) {
              item.status = 'processing';
            }
          }
        });

        xhr.addEventListener('load', () => {
          try {
            const data = JSON.parse(xhr.responseText);
            if (data.success) {
              item.progress = 100;
              item.status   = 'done';
              item.result   = data;
            } else {
              item.status = 'error';
              item.error  = data.error || 'Upload failed.';
            }
          } catch {
            item.status = 'error';
            item.error  = 'Invalid server response.';
          }
          resolve();
        });

        xhr.addEventListener('error', () => {
          item.status = 'error';
          item.error  = 'Network error. Please try again.';
          resolve();
        });

        xhr.addEventListener('abort', () => {
          item.status = 'error';
          item.error  = 'Upload aborted.';
          resolve();
        });

        xhr.open('POST', 'upload');
        xhr.send(formData);
      });
    }

    // ── Copy link ────────────────────────────────────────────────────
    function copyLink(item) {
      if (!item.result) return;

      const text = item.result.download_link;

      const markCopied = () => {
        item.copied = true;
        setTimeout(() => { item.copied = false; }, 2500);
      };

      // navigator.clipboard requires HTTPS or localhost; fall back to execCommand on plain HTTP
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(markCopied).catch(() => execCommandCopy(item, text, markCopied));
      } else {
        execCommandCopy(item, text, markCopied);
      }
    }

    function execCommandCopy(item, text, markCopied) {
      // Create a temporary textarea, select its content, and copy
      const ta = document.createElement('textarea');
      ta.value = text;
      ta.style.cssText = 'position:fixed;top:0;left:0;opacity:0;pointer-events:none;';
      document.body.appendChild(ta);
      ta.focus();
      ta.select();
      try { document.execCommand('copy'); } catch (_) {}
      document.body.removeChild(ta);
      markCopied();
    }

    return {
      queue, dragging, uploading,
      doneCount, errorCount, hasPending,
      infoCards,
      fileIcon, formatSize,
      onDrop, onFileSelect,
      removeItem, clearDone,
      uploadAll, copyLink,
    };
  }
}).mount('#app');
</script>

</body>
</html>
