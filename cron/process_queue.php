<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../services/QueueProcessor.php';

// Lock file to prevent overlapping execution
$lockFile = __DIR__ . '/queue_process.lock';

// Check if script is already running
if (file_exists($lockFile)) {
    // Check if the lock is stale (older than 30 minutes)
    $lockTime = filemtime($lockFile);
    if (time() - $lockTime < 1800) {
        echo "Queue process already running\n";
        exit;
    }
    // Lock is stale, delete it
    unlink($lockFile);
}

// Create lock file
file_put_contents($lockFile, date('Y-m-d H:i:s'));

try {
    $processor = new QueueProcessor();
    $result = $processor->processBatch(QUEUE_BATCH_SIZE);
    
    echo "Queue process completed: {$result['processed']} jobs processed, {$result['failures']} failures\n";
} catch (Exception $e) {
    echo "Error processing queue: {$e->getMessage()}\n";
} finally {
    // Remove lock file
    if (file_exists($lockFile)) {
        unlink($lockFile);
    }
}
