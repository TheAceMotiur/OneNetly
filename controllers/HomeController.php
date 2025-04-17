<?php

require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Stats.php';
require_once __DIR__ . '/../utils/helpers.php';
require_once __DIR__ . '/../utils/sidebar_helper.php';

// Record the page visit
$statsModel = new Stats();
$statsModel->recordVisit(
    '/',
    $_SERVER['REMOTE_ADDR'], 
    $_SERVER['HTTP_USER_AGENT'],
    $_SERVER['HTTP_REFERER'] ?? null
);

// Get posts
$postModel = new Post();
$categoryModel = new Category();

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 10;
$offset = ($page - 1) * $perPage;

$posts = $postModel->getAll($perPage, $offset);
$totalPosts = $postModel->getTotalCount();
$totalPages = ceil($totalPosts / $perPage);

$categories = $categoryModel->getAll();

// Get sidebar data
extract(getSidebarData());

// Include the view
require_once __DIR__ . '/../views/home.php';
