<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Queue.php';
require_once __DIR__ . '/../services/QueueProcessor.php';

// Handle both web and CLI access
$isCLI = (php_sapi_name() === 'cli');

if ($isCLI) {
    // Command line parameters
    $force = isset($argv[1]) && $argv[1] === '--force';
    $generateNow = isset($argv[1]) && ($argv[1] === '--now' || ($force && isset($argv[2]) && $argv[2] === '--now')) || 
                  (isset($argv[2]) && $argv[2] === '--now');
} else {
    // Web access parameters (via GET or POST)
    $force = isset($_REQUEST['force']) && $_REQUEST['force'] === 'true';
    $generateNow = isset($_REQUEST['now']) && $_REQUEST['now'] === 'true';
    
    // Set content type to plain text for readable output in browser
    header('Content-Type: text/plain');
}

$categoryModel = new Category();
$queueModel = new Queue();

try {
    // Get a random category
    $category = $categoryModel->getRandomCategory();
    
    if (!$category) {
        echo "No categories found\n";
        exit;
    }
    
    // Check if there are already queued jobs for this category
    $existingJobs = $queueModel->getJobsByCategory($category['id']);
    if (count($existingJobs) >= 2 && !$force) {
        echo "Category {$category['name']} already has queued jobs. Use --force to override.\n";
        exit;
    }
    
    // Create a job for the queue
    $jobData = [
        'category_id' => $category['id'],
        'job_type' => 'generate_post',
        'job_data' => json_encode(['topic' => $category['name']]),
        'status' => $generateNow ? 'processing' : 'pending',
        'attempts' => 0,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
    
    $jobId = $queueModel->add($jobData);
    
    echo "Added job ID $jobId for category {$category['name']}" . 
         ($force ? " (forced)" : "") . 
         ($generateNow ? " (generating now)" : "") . "\n";
    
    // If --now flag is provided, process the job immediately
    if ($generateNow) {
        echo "Starting immediate content generation...\n";
        
        $processor = new QueueProcessor();
        
        // Process the specific job we just created
        $job = $queueModel->getJobById($jobId);
        if ($job) {
            try {
                $jobData = json_decode($job['job_data'], true);
                $processor->processGeneratePostJob($job['id'], $job['category_id'], $jobData);
                $queueModel->markAsCompleted($job['id']);
                echo "Content generation successful! Post has been created.\n";
            } catch (Exception $e) {
                echo "Error generating content: " . $e->getMessage() . "\n";
                $queueModel->markAsFailed($job['id'], $e->getMessage());
            }
        } else {
            echo "Could not find job to process.\n";
        }
    }
    
} catch (Exception $e) {
    echo "Error scheduling post generation: {$e->getMessage()}\n";
}
