<?php require_once 'layout/header.php'; ?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold mb-2">Search results for "<?= htmlspecialchars($searchQuery) ?>"</h1>
            <p class="text-gray-600"><?= $totalPosts ?> results found</p>
        </div>
        
        <?php if (empty($posts)): ?>
            <div class="bg-white rounded-lg shadow p-8 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <h2 class="mt-4 text-xl font-semibold text-gray-800">No results found</h2>
                <p class="mt-2 text-gray-600">
                    We couldn't find any posts matching "<?= htmlspecialchars($searchQuery) ?>". 
                    Try different keywords or browse categories.
                </p>
                <div class="mt-6">
                    <a href="/" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700">
                        Back to Home
                    </a>
                </div>
            </div>
        <?php else: ?>
            <div class="space-y-6">
                <?php foreach ($posts as $post): ?>
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="md:flex">
                            <a href="/post/<?= $post['slug'] ?>" class="md:w-1/4 flex-shrink-0">
                                <img src="<?= $post['featured_image'] ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-48 md:h-full object-cover">
                            </a>
                            <div class="p-6 md:w-3/4">
                                <div class="flex flex-wrap gap-2 mb-2">
                                    <a href="/category/<?= $post['category_slug'] ?>" class="inline-block px-3 py-1 text-xs font-medium text-white bg-green-600 rounded-full">
                                        <?= $post['category_name'] ?>
                                    </a>
                                </div>
                                <a href="/post/<?= $post['slug'] ?>" class="block">
                                    <h2 class="text-xl font-bold mb-2 hover:text-green-600 transition-colors"><?= htmlspecialchars($post['title']) ?></h2>
                                </a>
                                <p class="text-gray-600 mb-4"><?= createExcerpt($post['content'], 150) ?></p>
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
                <?php endforeach; ?>
            </div>
            
            <?= getPagination($page, $totalPages, '/search?q=' . urlencode($searchQuery)) ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>
