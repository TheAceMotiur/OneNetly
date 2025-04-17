<?php 
$pageTitle = "OneNetly - Insightful Content Worth Reading";
$pageDescription = "Explore curated, in-depth articles on topics that matter. OneNetly delivers thoughtful content with a modern reading experience.";
require_once 'layout/header.php'; 
?>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-gray-800 to-gray-700 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6"><?= APP_NAME ?></h1>
            <p class="text-xl mb-8">Thoughtful content for curious minds</p>
            <div class="flex flex-wrap justify-center gap-4">
                <?php if (isset($categories) && is_array($categories)): ?>
                    <?php foreach (array_slice($categories, 0, 6) as $cat): ?>
                        <a href="/category/<?= $cat['slug'] ?>" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-6 py-2 rounded-full transition-colors">
                            <?= $cat['name'] ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Google AdSense Banner -->
<div class="w-full py-4 bg-white mb-6">
    <div class="container mx-auto px-4">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515"
             crossorigin="anonymous"></script>
        <!-- OneNetly -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-9354746037074515"
             data-ad-slot="4878379783"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>

<div class="container mx-auto px-4 md:px-6 lg:px-8 max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
        <!-- Main content area -->
        <div class="lg:col-span-2 xl:col-span-3">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Latest Articles</h2>
                <a href="/category-list" class="text-green-600 hover:text-green-700 font-medium flex items-center">
                    View all categories
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <?php if (empty($posts)): ?>
                <div class="bg-white rounded-lg shadow p-6">
                    <p>No posts available yet. Check back soon!</p>
                </div>
            <?php else: ?>
                <div class="space-y-10">
                    <?php foreach ($posts as $index => $post): ?>
                        <?php if ($index === 0): ?>
                            <!-- Featured post (first post) -->
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <a href="/post/<?= $post['slug'] ?>">
                                    <img src="<?= $post['featured_image'] ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-72 md:h-96 object-cover">
                                </a>
                                <div class="p-6">
                                    <a href="/category/<?= $post['category_slug'] ?>" class="inline-block px-3 py-1 text-sm font-medium text-white bg-green-600 rounded-full hover:bg-green-700 transition-colors mb-3">
                                        <?= $post['category_name'] ?>
                                    </a>
                                    <a href="/post/<?= $post['slug'] ?>" class="block">
                                        <h3 class="text-2xl font-bold mb-3 hover:text-green-600 transition-colors"><?= htmlspecialchars($post['title']) ?></h3>
                                    </a>
                                    <p class="text-gray-600 mb-4"><?= createExcerpt($post['content'], 200) ?></p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <span class="text-gray-500 text-sm"><?= formatDate($post['created_at']) ?></span>
                                            <span class="mx-2">•</span>
                                            <span class="text-gray-500 text-sm"><?= ceil(str_word_count(strip_tags($post['content'])) / 200) ?> min read</span>
                                        </div>
                                        <a href="/post/<?= $post['slug'] ?>" class="text-green-600 font-medium hover:underline">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <!-- Regular posts -->
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <div class="md:flex">
                                    <a href="/post/<?= $post['slug'] ?>" class="md:w-1/3">
                                        <img src="<?= $post['featured_image'] ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-48 md:h-full object-cover">
                                    </a>
                                    <div class="p-6 md:w-2/3">
                                        <a href="/category/<?= $post['category_slug'] ?>" class="inline-block px-3 py-1 text-sm font-medium text-white bg-green-600 rounded-full hover:bg-green-700 transition-colors mb-3">
                                            <?= $post['category_name'] ?>
                                        </a>
                                        <a href="/post/<?= $post['slug'] ?>" class="block">
                                            <h3 class="text-xl font-bold mb-3 hover:text-green-600 transition-colors"><?= htmlspecialchars($post['title']) ?></h3>
                                        </a>
                                        <p class="text-gray-600 mb-4"><?= createExcerpt($post['content'], 120) ?></p>
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center">
                                                <span class="text-gray-500 text-sm"><?= formatDate($post['created_at']) ?></span>
                                                <span class="mx-2">•</span>
                                                <span class="text-gray-500 text-sm"><?= ceil(str_word_count(strip_tags($post['content'])) / 200) ?> min read</span>
                                            </div>
                                            <span class="text-gray-500 text-sm"><?= $post['views'] ?> views</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                
                <?= getPagination($page, $totalPages, '/') ?>
            <?php endif; ?>
        </div>
        
        <!-- Include sidebar -->
        <?php require_once 'partials/sidebar.php'; ?>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>
