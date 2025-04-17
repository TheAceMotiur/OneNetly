<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/routes.php';

// Simple router
$uri = $_SERVER['REQUEST_URI'];
$uri = explode('?', $uri)[0]; // Remove query string
$uri = rtrim($uri, '/');
if ($uri === '') $uri = '/';

// Search route
if (preg_match('/^\/search\/?(\?.*)?$/', $uri)) {
    require_once 'controllers/SearchController.php';
    exit;
}

// Random post route
if ($uri === '/random') {
    require_once 'controllers/RandomPostController.php';
    exit;
}

// Sitemap route
if ($uri === '/sitemap.xml' || $uri === '/sitemap') {
    require_once 'sitemap.php';
    exit;
}

// Admin panel routes
if (preg_match('/^\/admin\/generate\/?$/', $uri)) {
    require_once 'admin/generate.php';
    exit;
}

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    // Check for dynamic routes
    foreach ($dynamicRoutes as $pattern => $handler) {
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = '/^' . $pattern . '$/';
        
        if (preg_match($pattern, $uri, $matches)) {
            $_GET['params'] = $matches;
            require $handler;
            exit;
        }
    }
    
    // 404 page
    header("HTTP/1.0 404 Not Found");
    require 'views/404.php';
}
