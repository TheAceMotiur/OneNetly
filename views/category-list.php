<?php 
$pageTitle = "All Categories";
$pageDescription = "Browse all categories on our AI-generated blog";
require_once 'layout/header.php';
?>

<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-3xl font-bold mb-6">All Categories</h1>
    
    <?php if (empty($categories)): ?>
        <p>No categories available yet.</p>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($categories as $category): ?>
                <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                    <a href="/category/<?= $category['slug'] ?>" class="block p-6">
                        <h2 class="text-xl font-semibold mb-2"><?= $category['name'] ?></h2>
                        <?php if (!empty($category['description'])): ?>
                            <p class="text-gray-600"><?= createExcerpt($category['description'], 100) ?></p>
                        <?php endif; ?>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-blue-600 hover:underline">View posts</span>
                            <?php if (isset($categoryCounts[$category['id']])): ?>
                                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                                    <?= $categoryCounts[$category['id']] ?> posts
                                </span>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'layout/footer.php'; ?>
