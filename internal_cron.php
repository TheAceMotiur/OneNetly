<?php
/**
 * internal_cron.php — Built-in pseudo-cron system
 * Automatically runs scheduled tasks without requiring server cron jobs.
 * Include this file on commonly accessed pages (index, upload, download).
 */

if (!defined('CLEANUP_TOKEN')) {
    return; // Config not loaded
}

require_once __DIR__ . '/database.php';

// Configuration
define('CRON_INTERVAL', 3600); // Run every 1 hour (in seconds)

/**
 * Check if cron should run and execute if needed.
 * Non-blocking: returns immediately, runs cleanup in background.
 */
function runInternalCron(): void {
    // Load last run timestamp from database
    $lastRun = (int) getMetadata('cron_last_run', 0);
    
    $now = time();
    $timeSinceLastRun = $now - $lastRun;
    
    // Check if enough time has passed
    if ($timeSinceLastRun < CRON_INTERVAL) {
        return; // Too soon, skip
    }
    
    // Update database immediately to prevent concurrent runs
    setMetadata('cron_last_run', $now);
    setMetadata('cron_last_run_date', date('Y-m-d H:i:s', $now));
    
    // Trigger cleanup in background (non-blocking)
    triggerCleanupBackground();
}

/**
 * Trigger cleanup script in background without blocking the request.
 */
function triggerCleanupBackground(): void {
    $cleanupUrl = SITE_URL . '/cleanup.php?token=' . urlencode(CLEANUP_TOKEN);
    
    // Use async HTTP request (fire and forget)
    $ctx = stream_context_create([
        'http' => [
            'timeout' => 1,
            'ignore_errors' => true
        ]
    ]);
    
    // Fire and forget - don't wait for response
    @file_get_contents($cleanupUrl, false, $ctx);
}

// Auto-execute when this file is included (silent, no output)
@runInternalCron();
