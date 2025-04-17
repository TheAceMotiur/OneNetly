<?php

require_once __DIR__ . '/../models/Queue.php';
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/OpenRouterService.php';
require_once __DIR__ . '/ImageService.php';

class QueueProcessor
{
    private $queueModel;
    private $postModel;
    private $categoryModel;
    private $openRouterService;
    private $imageService;
    
    public function __construct() {
        $this->queueModel = new Queue();
        $this->postModel = new Post();
        $this->categoryModel = new Category();
        $this->openRouterService = new OpenRouterService();
        $this->imageService = new ImageService();
    }
    
    public function processBatch($limit = 5) {
        $jobs = $this->queueModel->getPending($limit);
        $results = ['processed' => 0, 'failures' => 0];
        
        foreach ($jobs as $job) {
            try {
                $this->queueModel->markAsProcessing($job['id']);
                $jobData = json_decode($job['job_data'], true);
                
                switch ($job['job_type']) {
                    case 'generate_post':
                        $this->processGeneratePostJob($job['id'], $job['category_id'], $jobData);
                        $results['processed']++;
                        break;
                        
                    default:
                        throw new Exception("Unknown job type: {$job['job_type']}");
                }
                
                $this->queueModel->markAsCompleted($job['id']);
                
            } catch (Exception $e) {
                // Log the error
                error_log("Queue job {$job['id']} failed: " . $e->getMessage());
                $results['failures']++;
                
                // Handle failed jobs
                if ($job['attempts'] >= QUEUE_RETRY_LIMIT) {
                    $this->queueModel->markAsFailed($job['id'], $e->getMessage());
                } else {
                    $this->queueModel->reschedule($job['id'], 30); // Retry in 30 minutes
                }
            }
        }
        
        return $results;
    }
    
    public function processGeneratePostJob($jobId, $categoryId, $jobData) {
        // Get the category
        $category = $this->categoryModel->getById($categoryId);
        if (!$category) {
            throw new Exception("Category not found");
        }
        
        $topic = $jobData['topic'] ?? $category['name'];
        
        // Generate title
        $title = $this->openRouterService->generateTitle($topic);
        
        // Generate keywords
        $keywords = $this->openRouterService->generateKeywords($topic);
        
        // Generate content
        $content = $this->openRouterService->generateContent($topic, $title);
        
        // Get a featured image
        $featuredImage = $this->imageService->getImage($topic);
        
        // Create slug from title
        $slug = $this->createSlug($title);
        
        // Create the post
        $postData = [
            'category_id' => $categoryId,
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
            'featured_image' => $featuredImage,
            'keywords' => $keywords,
            'status' => 'published',
            'views' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $this->postModel->create($postData);
    }
    
    private function createSlug($title) {
        // Convert to lowercase and replace spaces with hyphens
        $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $title), '-'));
        
        // Add a random suffix to ensure uniqueness
        $slug .= '-' . substr(md5(rand()), 0, 5);
        
        return $slug;
    }
}
