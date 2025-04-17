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

// Get the category by slug
$category = $categoryModel->getBySlug($slug);

if (!$category) {
    // Category not found, 404 error
    header("HTTP/1.0 404 Not Found");
    require 'views/404.php';
    exit;
}

// Record the page visit
$statsModel = new Stats();
$statsModel->recordVisit(
    '/category/' . $slug,
    $_SERVER['REMOTE_ADDR'], 
    $_SERVER['HTTP_USER_AGENT'],
    $_SERVER['HTTP_REFERER'] ?? null
);

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10;
$offset = ($page - 1) * $perPage;

// Get posts for this category
$posts = $postModel->getByCategory($category['id'], $perPage, $offset);
$totalPosts = $postModel->getTotalCountByCategory($category['id']);
$totalPages = ceil($totalPosts / $perPage);

// Get all categories for the navigation
$categories = $categoryModel->getAll();

// Get sidebar data
extract(getSidebarData());

// Include the view
require_once __DIR__ . '/../views/category.php';
