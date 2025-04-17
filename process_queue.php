<?php

/*
 * This is a convenience wrapper script that forwards calls to the actual script in the cron directory
 * Usage: php process_queue.php
 */

// Call the actual script
$command = sprintf('php %s/cron/process_queue.php', __DIR__);
passthru($command);
