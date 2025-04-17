<?php

require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Stats.php';  // Add missing Stats model include
require_once __DIR__ . '/../utils/helpers.php';

// Record the page visit
$statsModel = new Stats();
$statsModel->recordVisit(
    '/category-list',
    $_SERVER['REMOTE_ADDR'], 
    $_SERVER['HTTP_USER_AGENT'],
    $_SERVER['HTTP_REFERER'] ?? null
);

$categoryModel = new Category();
$postModel = new Post();

// Get all categories
$categories = $categoryModel->getAll();

// Get post counts for each category
$categoryCounts = [];
foreach ($categories as $category) {
    $categoryCounts[$category['id']] = $postModel->getTotalCountByCategory($category['id']);
}

// Include the view
require_once __DIR__ . '/../views/category-list.php';
