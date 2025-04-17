<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Queue.php';
require_once __DIR__ . '/../services/QueueProcessor.php';

// Check if force flag is provided
$force = isset($argv[1]) && $argv[1] === '--force';
$generateNow = isset($argv[1]) && ($argv[1] === '--now' || ($force && isset($argv[2]) && $argv[2] === '--now')) || 
               (isset($argv[2]) && $argv[2] === '--now');

$categoryModel = new Category();
$queueModel = new Queue();

try {
    // Get all categories
    $categories = $categoryModel->getAll();
    
    if (empty($categories)) {
        echo "No categories found\n";
        exit;
    }
    
    $addedJobs = 0;
    $skippedCategories = 0;
    $processor = null;
    
    if ($generateNow) {
        // Initialize the processor if we're generating now
        $processor = new QueueProcessor();
        echo "Immediate generation mode activated\n";
    }
    
    foreach ($categories as $category) {
        // Check if there are already queued jobs for this category
        $existingJobs = $queueModel->getJobsByCategory($category['id']);
        if (count($existingJobs) >= 2 && !$force) {
            echo "- Skipping category {$category['name']} - already has queued jobs\n";
            $skippedCategories++;
            continue;
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
        $addedJobs++;
        
        echo "+ Added job ID $jobId for category {$category['name']}\n";
        
        // Process immediately if requested
        if ($generateNow) {
            echo "  Processing job immediately...\n";
            try {
                $job = $queueModel->getJobById($jobId);
                $jobData = json_decode($job['job_data'], true);
                $processor->processGeneratePostJob($job['id'], $job['category_id'], $jobData);
                $queueModel->markAsCompleted($job['id']);
                echo "  Content generation successful!\n";
            } catch (Exception $e) {
                echo "  Error generating content: " . $e->getMessage() . "\n";
                $queueModel->markAsFailed($job['id'], $e->getMessage());
            }
        }
    }
    
    echo "\nSummary: Added $addedJobs jobs, skipped $skippedCategories categories" . 
         ($force ? " (forced mode)" : "") . 
         ($generateNow ? " (immediate generation)" : "") . "\n";
    
} catch (Exception $e) {
    echo "Error scheduling post generation: {$e->getMessage()}\n";
}
