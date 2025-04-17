<?php

require_once __DIR__ . '/../../models/Stats.php';

header('Content-Type: application/json');

// Simple security - only allow GET requests
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$statsModel = new Stats();

// Check if the request is for top pages or daily trend
$period = $_GET['period'] ?? 30;
$period = (int)$period; // Sanitize

try {
    if (isset($_GET['type']) && $_GET['type'] === 'daily') {
        $data = $statsModel->getDailyTrend($period);
        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    } else {
        // Default to top pages
        $limit = $_GET['limit'] ?? 10;
        $limit = (int)$limit; // Sanitize
        
        $data = $statsModel->getTopPages($limit, $period);
        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to retrieve stats: ' . $e->getMessage()]);
}
