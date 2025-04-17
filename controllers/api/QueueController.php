<?php

require_once __DIR__ . '/../../models/Queue.php';
require_once __DIR__ . '/../../models/Category.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$queueModel = new Queue();
$categoryModel = new Category();

try {
    // Get POST data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate data
    if (!isset($data['category_id']) || !isset($data['topic'])) {
        throw new Exception('Missing required fields');
    }
    
    // Check if the category exists
    $category = $categoryModel->getById($data['category_id']);
    if (!$category) {
        throw new Exception('Category not found');
    }
    
    // Create queue item
    $jobId = $queueModel->add([
        'category_id' => $data['category_id'],
        'job_type' => 'generate_post',
        'job_data' => json_encode(['topic' => $data['topic']]),
        'status' => 'pending',
        'attempts' => 0,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ]);
    
    // Return success response
    echo json_encode([
        'success' => true, 
        'job_id' => $jobId,
        'message' => 'Job added to queue'
    ]);
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
