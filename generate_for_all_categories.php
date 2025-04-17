<?php

/*
 * This is a convenience wrapper script that forwards calls to the actual script in the cron directory
 * Usage: php generate_for_all_categories.php [options]
 * Options:
 *   --force  Force generation even if category limit is reached
 *   --now    Generate content immediately instead of just queuing
 */

// Get all arguments
$args = $argv;
// Remove the script name
array_shift($args);
// Convert to string for passing to the actual script
$argString = implode(' ', $args);

// Call the actual script
$command = sprintf('php %s/cron/generate_for_all_categories.php %s', __DIR__, $argString);
passthru($command);
