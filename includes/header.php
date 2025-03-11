<?php
// Get category hierarchy for the menu
$categoryHierarchy = $category->getCategoryHierarchy();
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo getThemeClass(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . ' - ' : ''; ?>OneNetly</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo getThemeStyles(); ?>
    <?php echo getThemeScript(); ?>
    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-YOUR_PUBLISHER_ID" crossorigin="anonymous"></script>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body class="<?php echo getBodyThemeClass(); ?>">
    <nav class="bg-indigo-800 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a class="text-xl font-bold mr-8" href="index.php">OneNetly</a>
                    
                    <!-- Categories Menu -->
                    <div class="hidden md:flex space-x-4">
                        <?php if (!empty($categoryHierarchy)): ?>
                            <?php foreach ($categoryHierarchy as $parentCat): ?>
                                <?php if (empty($parentCat['subcategories'])): ?>
                                    <!-- Simple link for categories with no subcategories -->
                                    <a href="category.php?slug=<?php echo htmlspecialchars($parentCat['slug']); ?>" 
                                       class="px-3 py-2 rounded hover:bg-indigo-700 transition">
                                       <?php echo htmlspecialchars($parentCat['name']); ?>
                                    </a>
                                <?php else: ?>
                                    <!-- Dropdown for categories with subcategories -->
                                    <div class="dropdown relative">
                                        <button class="px-3 py-2 rounded hover:bg-indigo-700 transition flex items-center">
                                            <?php echo htmlspecialchars($parentCat['name']); ?>
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu hidden absolute left-0 mt-1 bg-indigo-700 rounded shadow-lg z-10 w-48">
                                            <a href="category.php?slug=<?php echo htmlspecialchars($parentCat['slug']); ?>" 
                                               class="block px-4 py-2 hover:bg-indigo-600 transition">
                                                All in <?php echo htmlspecialchars($parentCat['name']); ?>
                                            </a>
                                            <div class="border-t border-indigo-600"></div>
                                            <?php foreach ($parentCat['subcategories'] as $subCat): ?>
                                                <a href="category.php?slug=<?php echo htmlspecialchars($subCat['slug']); ?>" 
                                                   class="block px-4 py-2 hover:bg-indigo-600 transition">
                                                    <?php echo htmlspecialchars($subCat['name']); ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div>
                    <?php if ($user->isLoggedIn()): ?>
                        <span class="mr-4 hidden sm:inline-block">Welcome, <?php echo htmlspecialchars($currentUser ? $currentUser['username'] : ''); ?></span>
                        <a href="dashboard.php" class="px-3 py-2 rounded hover:bg-indigo-700 transition">Dashboard</a>
                        <?php if ($user->isAdmin()): ?>
                        <a href="admin/index.php" class="px-3 py-2 rounded hover:bg-indigo-700 transition">Admin</a>
                        <?php endif; ?>
                        <a href="logout.php" class="px-3 py-2 rounded hover:bg-indigo-700 transition">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="px-3 py-2 rounded hover:bg-indigo-700 transition">Login</a>
                        <a href="register.php" class="px-3 py-2 rounded hover:bg-indigo-700 transition">Register</a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Mobile Categories Menu Button (hidden on desktop) -->
            <div class="md:hidden pb-4">
                <button id="mobile-category-toggle" class="w-full text-left bg-indigo-700 px-4 py-2 rounded flex items-center justify-between">
                    <span>Categories</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="mobile-category-menu" class="hidden mt-2">
                    <?php if (!empty($categoryHierarchy)): ?>
                        <?php foreach ($categoryHierarchy as $parentCat): ?>
                            <a href="category.php?slug=<?php echo htmlspecialchars($parentCat['slug']); ?>" 
                               class="block px-4 py-2 bg-indigo-700 hover:bg-indigo-600 border-b border-indigo-600">
                                <?php echo htmlspecialchars($parentCat['name']); ?>
                            </a>
                            <?php if (!empty($parentCat['subcategories'])): ?>
                                <?php foreach ($parentCat['subcategories'] as $subCat): ?>
                                    <a href="category.php?slug=<?php echo htmlspecialchars($subCat['slug']); ?>" 
                                       class="block px-8 py-2 bg-indigo-700 hover:bg-indigo-600 border-b border-indigo-600">
                                        — <?php echo htmlspecialchars($subCat['name']); ?>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="px-4 py-2 bg-indigo-700">No categories found</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container mx-auto py-8 px-4">
        <?php if (function_exists('displayMessage')): ?>
            <?php echo displayMessage(); ?>
        <?php endif; ?>
