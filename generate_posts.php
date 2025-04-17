<?php
/**
 * Command-line utility to generate posts
 * Usage: php generate_posts.php [--force] [--now]
 * Or access via web: generate_posts.php?force=true&now=true
 */

// Detect if this is a CLI or web request
$isCLI = (php_sapi_name() === 'cli');

if ($isCLI) {
    // Command line processing
    global $argv;
    $args = $argv;
    array_shift($args); // Remove the script name
    
    // Execute the cron script
    $scriptPath = __DIR__ . '/cron/generate_posts.php';
    $command = 'php ' . escapeshellarg($scriptPath);
    
    foreach ($args as $arg) {
        $command .= ' ' . escapeshellarg($arg);
    }
    
    passthru($command);
} else {
    // Web request processing - pass all GET parameters to the script
    require_once __DIR__ . '/cron/generate_posts.php';
}
