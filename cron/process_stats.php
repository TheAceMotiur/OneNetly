<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../models/Stats.php';

try {
    $statsModel = new Stats();
    $statsModel->processDailyStats();
    echo "Daily stats processing completed\n";
} catch (Exception $e) {
    echo "Error processing stats: {$e->getMessage()}\n";
}
