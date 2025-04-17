<?php

require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../utils/helpers.php';

// Get the search query
$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';

if (empty($searchQuery)) {
    // No search query provided, redirect to home
    header('Location: /');
    exit;
}

$postModel = new Post();
$categoryModel = new Category();

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10;
$offset = ($page - 1) * $perPage;

// Get posts matching the search query
$posts = $postModel->search($searchQuery, $perPage, $offset);
$totalPosts = $postModel->getTotalSearchCount($searchQuery);
$totalPages = ceil($totalPosts / $perPage);

// Get all categories for the navigation
$categories = $categoryModel->getAll();

// SEO details for the page
$pageTitle = "Search results for: " . htmlspecialchars($searchQuery);
$pageDescription = "Search results for " . htmlspecialchars($searchQuery) . " on " . APP_NAME;

// Include the search results view
require_once __DIR__ . '/../views/search-results.php';
