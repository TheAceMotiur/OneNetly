<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle : APP_NAME . ' - Thoughtful Content for Curious Minds' ?></title>
    <meta name="description" content="<?= $pageDescription ?? 'OneNetly delivers thoughtfully crafted content with a clean, distraction-free reading experience.' ?>">
    <meta name="keywords" content="<?= $pageKeywords ?? 'oneNetly, articles, essays, in-depth, insights, reading, content' ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon-16x16.png">
    
    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="<?= isset($pageTitle) ? $pageTitle : APP_NAME . ' - Thoughtful Content for Curious Minds' ?>">
    <meta property="og:description" content="<?= $pageDescription ?? 'OneNetly delivers thoughtfully crafted content with a clean, distraction-free reading experience.' ?>">
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?= isset($_SERVER['REQUEST_URI']) ? 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] : 'https://' . $_SERVER['HTTP_HOST'] ?>">
    <?php if (isset($post) && isset($post['featured_image'])): ?>
    <meta property="og:image" content="<?= $post['featured_image'] ?>">
    <?php endif; ?>
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= isset($pageTitle) ? $pageTitle : APP_NAME . ' - Thoughtful Content for Curious Minds' ?>">
    <meta name="twitter:description" content="<?= $pageDescription ?? 'OneNetly delivers thoughtfully crafted content with a clean, distraction-free reading experience.' ?>">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,300;0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Medium-inspired color palette */
        :root {
            --text-primary: rgba(41, 41, 41, 1);
            --text-secondary: rgba(117, 117, 117, 1);
            --text-tertiary: rgba(0, 0, 0, 0.54);
            --accent-green: rgba(3, 168, 124, 1);
            --accent-yellow: rgba(255, 212, 0, 1);
            --bg-light: rgba(255, 255, 255, 1);
            --bg-off-white: rgba(250, 250, 250, 1);
            --border-light: rgba(230, 230, 230, 1);
        }
        
        /* Base styles */
        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-primary);
            line-height: 1.6;
            font-size: 16px;
            background-color: var(--bg-off-white);
        }
        
        /* Medium-style content formatting */
        .content {
            font-family: 'Source Serif Pro', serif;
            line-height: 1.8;
            font-size: 20px;
            color: var(--text-primary);
            letter-spacing: -0.003em;
            max-width: 700px;
            margin: 0 auto;
            font-weight: 400;
        }
        
        .content h1 {
            font-family: 'Source Serif Pro', serif;
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 1.5rem;
            margin-top: 2rem;
            letter-spacing: -0.016em;
            line-height: 1.25;
            color: var(--text-primary);
        }
        
        .content h2 {
            font-family: 'Source Serif Pro', serif;
            font-size: 30px;
            font-weight: 700;
            margin-top: 3rem;
            margin-bottom: 1rem;
            letter-spacing: -0.014em;
            line-height: 1.3;
            color: var(--text-primary);
            position: relative;
            scroll-margin-top: 80px;
        }
        
        .content h3 {
            font-family: 'Source Serif Pro', serif;
            font-size: 24px;
            font-weight: 600;
            margin-top: 2rem;
            margin-bottom: 0.75rem;
            letter-spacing: -0.012em;
            line-height: 1.35;
            color: var(--text-primary);
            scroll-margin-top: 80px;
        }
        
        .content p {
            margin-bottom: 2rem;
            line-height: 1.86;
            letter-spacing: -0.003em;
        }
        
        /* This creates the clean Medium-style spacing between paragraphs */
        .content p + p {
            margin-top: -1rem;
        }
        
        .content ul, .content ol {
            margin-bottom: 2rem;
            padding-left: 2rem;
            line-height: 1.86;
        }
        
        .content ul {
            list-style-type: disc;
        }
        
        .content ol {
            list-style-type: decimal;
        }
        
        .content li {
            margin-bottom: 0.75rem;
            padding-left: 0.25rem;
        }
        
        .content a {
            color: var(--accent-green);
            text-decoration: none;
            border-bottom: 1px solid var(--border-light);
            transition: border-color 0.3s;
        }
        
        .content a:hover {
            border-bottom-color: var(--accent-green);
        }
        
        .content blockquote {
            margin: 2rem 0;
            padding-left: 1.5rem;
            font-style: italic;
            border-left: 3px solid var(--accent-green);
            color: var(--text-secondary);
            font-size: 21px;
            line-height: 1.7;
        }
        
        .content strong, .content b {
            font-weight: 700;
        }
        
        .content em, .content i {
            font-style: italic;
        }
        
        .content img {
            margin: 2rem auto;
            max-width: 100%;
            display: block;
            border-radius: 4px;
        }
        
        .content figure {
            margin: 2rem 0;
        }
        
        .content figcaption {
            font-size: 14px;
            color: var(--text-secondary);
            text-align: center;
            margin-top: 0.5rem;
            font-family: 'Inter', sans-serif;
        }
        
        .content hr {
            margin: 3rem auto;
            width: 50%;
            border: 0;
            height: 1px;
            background-color: var(--border-light);
        }
        
        /* Elegant drop caps for the first paragraph */
        .content .first-paragraph:first-letter {
            float: left;
            font-size: 76px;
            line-height: 0.68;
            font-weight: 700;
            margin: 0.15em 0.12em 0 0;
            color: var(--text-primary);
        }
        
        /* Medium-style highlighted text */
        .content .highlight {
            background-color: var(--accent-yellow);
            padding: 0 2px;
        }
        
        /* Table of contents styling - enhanced for Medium-like appearance */
        .table-of-contents {
            background-color: transparent;
            padding: 0.5rem 0;
            margin: 1.5rem 0 3rem;
            border-top: 1px solid var(--border-light);
            border-bottom: 1px solid var(--border-light);
            border-left: none;
            border-right: none;
            border-radius: 0;
            position: static;
            font-family: 'Inter', sans-serif;
            box-shadow: none;
        }
        
        .table-of-contents h3 {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
            color: var(--text-secondary);
            font-weight: 600;
        }
        
        .table-of-contents ol {
            list-style-type: none;
            padding-left: 0;
            color: var(--text-secondary);
        }
        
        .table-of-contents ol li {
            margin-bottom: 0.75rem;
            font-size: 15px;
        }
        
        .table-of-contents a {
            color: var(--accent-green);
            text-decoration: none;
            transition: color 0.2s;
            display: inline-block;
            position: relative;
            padding-left: 0;
        }
        
        .table-of-contents a:hover {
            color: var(--text-primary);
        }
        
        .table-of-contents a:before {
            content: "";
            display: none;
        }
        
        /* Modern search styling */
        .search-container {
            position: relative;
        }
        
        .search-input {
            background-color: var(--bg-off-white);
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            font-size: 14px;
            width: 200px;
            transition: all 0.3s ease;
            color: var(--text-primary);
        }
        
        .search-input:focus {
            width: 250px;
            outline: none;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            width: 16px;
            height: 16px;
            pointer-events: none;
        }
        
        /* Article container and meta styling */
        .article-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .article-meta {
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: var(--text-secondary);
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--border-light);
            padding-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        /* Post title styling */
        .post-title {
            font-family: 'Source Serif Pro', serif;
            font-size: 42px;
            line-height: 1.2;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-primary);
            letter-spacing: -0.016em;
        }
        
        /* Masonry card grid for listings */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .card {
            background-color: var(--bg-light);
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        
        .card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .card-content {
            padding: 1.5rem;
        }
        
        .card-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
            font-family: 'Source Serif Pro', serif;
            line-height: 1.3;
        }
        
        .card-excerpt {
            font-size: 16px;
            color: var(--text-secondary);
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        
        /* Clap and Share buttons */
        .article-actions {
            display: flex;
            align-items: center;
            margin: 3rem 0;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-light);
        }
        
        .action-button {
            background-color: transparent;
            border: 1px solid var(--border-light);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .action-button:hover {
            background-color: rgba(3, 168, 124, 0.1);
            border-color: var(--accent-green);
        }
        
        .action-button svg {
            width: 20px;
            height: 20px;
            fill: var(--text-secondary);
            transition: fill 0.2s;
        }
        
        .action-button:hover svg {
            fill: var(--accent-green);
        }
        
        /* Navigation and sidebar */
        .sidebar {
            position: sticky;
            top: 20px;
        }
        
        .sidebar-box {
            background-color: var(--bg-light);
            border-radius: 4px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        
        .sidebar-heading {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--border-light);
        }
        
        /* Custom header and navigation */
        .site-header {
            background-color: white;
            border-bottom: 1px solid var(--border-light);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .main-nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0.75rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 65px;
        }
        
        .logo-link {
            text-decoration: none;
            color: var(--text-primary);
            font-weight: 700;
            font-size: 28px;
            letter-spacing: -0.02em;
        }
        
        .nav-item {
            color: var(--text-secondary);
            text-decoration: none;
            margin-left: 2rem;
            transition: color 0.2s;
            font-size: 15px;
        }
        
        .nav-item:hover {
            color: var(--accent-green);
        }
        
        .nav-item.active {
            color: var(--text-primary);
            font-weight: 500;
        }
        
        .nav-btn {
            background-color: var(--accent-green);
            color: white;
            font-size: 14px;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 99px;
            transition: background-color 0.2s;
            text-decoration: none;
        }
        
        .nav-btn:hover {
            background-color: rgba(3, 148, 114, 1);
        }
        
        /* Tags/keywords styling */
        .tag-cloud {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin: 1.5rem 0;
        }
        
        .tag {
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            background-color: var(--bg-off-white);
            color: var(--text-secondary);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            transition: all 0.2s;
        }
        
        .tag:hover {
            background-color: rgba(3, 168, 124, 0.1);
            color: var(--accent-green);
        }
        
        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .content {
                font-size: 18px;
            }
            
            .post-title {
                font-size: 32px;
            }
            
            .content h1 {
                font-size: 32px;
            }
            
            .content h2 {
                font-size: 24px;
            }
            
            .content h3 {
                font-size: 20px;
            }
            
            .content .first-paragraph:first-letter {
                font-size: 56px;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="main-nav">
            <div class="flex items-center">
                <a href="/" class="logo-link mr-8"><?= APP_NAME ?></a>
                <nav class="hidden md:flex items-center">
                    <a href="/" class="nav-item <?= $_SERVER['REQUEST_URI'] === '/' ? 'active' : '' ?>">Home</a>
                    <a href="/category-list" class="nav-item <?= strpos($_SERVER['REQUEST_URI'], '/category') !== false ? 'active' : '' ?>">Categories</a>
                </nav>
            </div>
            
            <div class="flex items-center">
                <!-- Search Box -->
                <div class="search-container mr-4 hidden md:block">
                    <form action="/search" method="get">
                        <div class="relative">
                            <input type="text" name="q" placeholder="Search..." class="search-input" 
                                  value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
                            <span class="search-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                        </div>
                    </form>
                </div>
                
                <a href="/random" class="nav-btn hidden md:block">Random Post</a>
                
                <button id="menu-toggle" class="md:hidden text-gray-600 focus:outline-none ml-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden px-4 py-4 bg-white border-t border-gray-100">
            <div class="mb-4">
                <form action="/search" method="get" class="relative">
                    <input type="text" name="q" placeholder="Search..." class="w-full px-4 py-2 border rounded-full">
                    <button type="submit" class="absolute right-3 top-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
            <ul class="space-y-4">
                <li><a href="/" class="block py-1 text-gray-600 hover:text-gray-900">Home</a></li>
                <li><a href="/category-list" class="block py-1 text-gray-600 hover:text-gray-900">Categories</a></li>
                <li><a href="/random" class="block py-2 mt-2 text-center bg-green-600 text-white rounded-full">Random Post</a></li>
            </ul>
        </div>
    </header>
    <div class="bg-gradient-to-r from-gray-800 to-gray-700 text-white">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-wrap gap-4 justify-center">
                <?php if (isset($categories) && is_array($categories)): ?>
                    <?php foreach (array_slice($categories, 0, 8) as $cat): ?>
                        <a href="/category/<?= $cat['slug'] ?>" class="text-white hover:text-gray-300 transition-colors font-medium"><?= $cat['name'] ?></a>
                    <?php endforeach; ?>
                    <?php if (count($categories) > 8): ?>
                        <a href="/category-list" class="text-white hover:text-gray-300 transition-colors font-medium">More...</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <main class="container mx-auto px-4 py-8">
