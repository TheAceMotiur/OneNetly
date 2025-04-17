<div class="lg:col-span-1">
    <div class="sidebar">
        <!-- Trending Posts -->
        <div class="sidebar-box">
            <div class="flex items-center mb-4 pb-2 border-b border-gray-100">
                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
                <h3 class="font-semibold text-gray-900">Trending Now</h3>
            </div>
            <div class="divide-y divide-gray-100">
                <?php foreach ($trendingPosts as $index => $trendingPost): ?>
                    <a href="/post/<?= $trendingPost['slug'] ?>" class="block py-4 group hover:bg-gray-50 transition-colors first:pt-0 last:pb-0">
                        <div class="flex gap-4">
                            <span class="text-2xl font-serif text-gray-200 group-hover:text-gray-300 transition-colors"><?= sprintf('%02d', $index + 1) ?></span>
                            <div>
                                <h4 class="font-medium text-gray-900 group-hover:text-green-600 transition-colors line-clamp-2"><?= htmlspecialchars($trendingPost['title']) ?></h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    <?= formatDate($trendingPost['created_at']) ?> · <?= calculateReadingTime($trendingPost['content']) ?> min read
                                </p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Popular Posts -->
        <div class="sidebar-box">
            <div class="flex items-center mb-4 pb-2 border-b border-gray-100">
                <svg class="w-5 h-5 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
                <h3 class="font-semibold text-gray-900">Most Popular</h3>
            </div>
            <div class="divide-y divide-gray-100">
                <?php foreach ($popularPosts as $popularPost): ?>
                    <a href="/post/<?= $popularPost['slug'] ?>" class="block py-4 group hover:bg-gray-50 transition-colors first:pt-0 last:pb-0">
                        <h4 class="font-medium text-gray-900 group-hover:text-green-600 transition-colors line-clamp-2"><?= htmlspecialchars($popularPost['title']) ?></h4>
                        <p class="text-sm text-gray-500 mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <?= $popularPost['views'] ?> views · <?= calculateReadingTime($popularPost['content']) ?> min read
                        </p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Categories -->
        <div class="sidebar-box">
            <div class="flex items-center mb-4 pb-2 border-b border-gray-100">
                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                <h3 class="font-semibold text-gray-900">Discover Topics</h3>
            </div>
            <div class="flex flex-wrap gap-2">
                <?php foreach ($categories as $category): ?>
                    <a href="/category/<?= $category['slug'] ?>" class="tag">
                        <?= $category['name'] ?>
                        <?php if (isset($categoryCounts[$category['id']])): ?>
                            <span class="opacity-60"><?= $categoryCounts[$category['id']] ?></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
