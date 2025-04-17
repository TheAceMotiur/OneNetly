<?php

require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Stats.php';
require_once __DIR__ . '/../utils/helpers.php';
require_once __DIR__ . '/../utils/sidebar_helper.php';

// Get the slug from the URL
$slug = $_GET['params'][1];

$postModel = new Post();
$categoryModel = new Category();

// Get the post by slug
$post = $postModel->getBySlug($slug);

if (!$post) {
    // Post not found, 404 error
    header("HTTP/1.0 404 Not Found");
    require 'views/404.php';
    exit;
}

// Record the page visit
$statsModel = new Stats();
$statsModel->recordVisit(
    '/post/' . $slug,
    $_SERVER['REMOTE_ADDR'], 
    $_SERVER['HTTP_USER_AGENT'],
    $_SERVER['HTTP_REFERER'] ?? null
);

// Increment post views
$postModel->incrementViews($post['id']);

// Get related posts
$relatedPosts = $postModel->getRelatedPosts($post['id'], $post['category_id'], 3);

// Get all categories for the navigation
$categories = $categoryModel->getAll();

// Get sidebar data
extract(getSidebarData());

// Include the view
require_once __DIR__ . '/../views/post.php';
