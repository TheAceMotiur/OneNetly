<?php

require_once __DIR__ . '/../models/Post.php';

$postModel = new Post();
$randomPost = $postModel->getRandomPost();

if ($randomPost) {
    header('Location: /post/' . $randomPost['slug']);
    exit;
} else {
    // If no posts exist, redirect to home
    header('Location: /');
    exit;
}
