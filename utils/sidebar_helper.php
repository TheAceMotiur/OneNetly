<?php
function getSidebarData() {
    global $postModel, $categoryModel;
    
    // Get post counts per category
    $categories = $categoryModel->getAll();
    $categoryCounts = [];
    foreach ($categories as $cat) {
        $categoryCounts[$cat['id']] = $postModel->getTotalCountByCategory($cat['id']);
    }

    // Get popular posts from the last 7 days
    $popularPosts = $postModel->getPopularPostsFromPeriod(7, 3);
    
    // Get trending posts from the last 24 hours
    $trendingPosts = $postModel->getPopularPostsFromPeriod(1, 3);

    return [
        'categories' => $categories,
        'categoryCounts' => $categoryCounts,
        'popularPosts' => $popularPosts,
        'trendingPosts' => $trendingPosts
    ];
}
