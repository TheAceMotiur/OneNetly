<?php 
$pageTitle = $category['name'];
$pageDescription = $category['description'] ?? "Latest articles about {$category['name']}";
require_once 'layout/header.php';
?>

<div class="container mx-auto px-4 md:px-6 lg:px-8 max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
        <!-- Main content area -->
        <div class="lg:col-span-2 xl:col-span-3">
            <h1 class="text-3xl font-bold mb-6"><?= $category['name'] ?></h1>
            
            <?php if (!empty($category['description'])): ?>
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <p class="text-gray-600"><?= $category['description'] ?></p>
                </div>
            <?php endif; ?>
            
            <?php if (empty($posts)): ?>
                <div class="bg-white rounded-lg shadow p-6">
                    <p>No posts available in this category yet. Check back soon!</p>
                </div>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                    <div class="bg-white rounded-lg shadow mb-6 overflow-hidden">
                        <a href="/post/<?= $post['slug'] ?>">
                            <img src="<?= $post['featured_image'] ?>" alt="<?= $post['title'] ?>" class="w-full h-64 object-cover">
                        </a>
                        <div class="p-6">
                            <div class="mb-2">
                                <span class="text-gray-500 text-sm"><?= formatDate($post['created_at']) ?></span>
                            </div>
                            <a href="/post/<?= $post['slug'] ?>" class="block">
                                <h2 class="text-2xl font-bold mb-3 hover:text-blue-600 transition-colors"><?= $post['title'] ?></h2>
                            </a>
                            <p class="text-gray-600 mb-4"><?= createExcerpt($post['content']) ?></p>
                            <div class="flex justify-between items-center">
                                <a href="/post/<?= $post['slug'] ?>" class="text-blue-600 font-medium hover:underline">
                                    Read More
                                </a>
                                <span class="text-gray-500 text-sm"><?= $post['views'] ?> views</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <?= getPagination($page, $totalPages, "/category/{$category['slug']}") ?>
            <?php endif; ?>
        </div>
        
        <!-- Include sidebar -->
        <?php require_once 'partials/sidebar.php'; ?>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>
