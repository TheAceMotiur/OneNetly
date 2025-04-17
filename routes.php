<?php

// Simple routing system
$routes = [
    '/' => 'controllers/HomeController.php',
    '/category-list' => 'controllers/CategoryController.php',
    '/api/queue/add' => 'controllers/api/QueueController.php',
    '/api/stats' => 'controllers/api/StatsController.php',
];

// Dynamic routes
$dynamicRoutes = [
    '/category/([a-zA-Z0-9-]+)' => 'controllers/CategoryViewController.php',
    '/post/([a-zA-Z0-9-]+)' => 'controllers/PostViewController.php',
];
