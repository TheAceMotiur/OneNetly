<?php
require_once 'includes/init.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Get category slug from URL
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';

if (empty($slug)) {
    redirect('index.php', 'Category not found', 'error');
}

// Get category by slug
$categoryData = $category->getCategoryBySlug($slug);

if (!$categoryData) {
    redirect('index.php', 'Category not found', 'error');
}

// Get current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page); // Ensure page is at least 1

// Get blog posts in this category with pagination (12 per page instead of 10)
$result = $category->getBlogsByCategory($categoryData['id'], $page, 12);
$blogs = $result['blogs'];
$pagination = $result['pagination'];

// Get all categories for sidebar
$categories = $category->getAllCategories();

// Get trending posts for sidebar
$trendingPosts = $blog->getTrendingPosts(5);

// Set page title
$pageTitle = $categoryData['name'];

// Include header
require_once 'includes/header.php';
?>
        
<div class="flex flex-wrap">
    <!-- Main Content -->
    <div class="w-full lg:w-3/4 pr-0 lg:pr-8">
        <h1 class="text-3xl font-bold mb-2"><?php echo htmlspecialchars($categoryData['name']); ?></h1>
        
        <?php if (!empty($categoryData['description'])): ?>
            <p class="text-gray-600 mb-6"><?php echo htmlspecialchars($categoryData['description']); ?></p>
        <?php endif; ?>
        
        <?php if (empty($blogs)): ?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <p>No blog posts found in this category. Check back later!</p>
            </div>
        <?php else: ?>
            <!-- Grid with 3 posts per row -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($blogs as $blogPost): ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden h-full flex flex-col">
                        <?php if (!empty($blogPost['featured_image'])): ?>
                            <div class="w-full h-40 overflow-hidden">
                                <img src="<?php echo htmlspecialchars($blogPost['featured_image']); ?>" alt="<?php echo htmlspecialchars($blogPost['title']); ?>" class="w-full h-full object-cover">
                            </div>
                        <?php endif; ?>
                        
                        <div class="p-4 flex-1 flex flex-col">
                            <h2 class="text-lg font-bold mb-2">
                                <a href="<?php echo htmlspecialchars($blogPost['slug']); ?>" class="text-indigo-700 hover:text-indigo-900">
                                    <?php echo htmlspecialchars($blogPost['title']); ?>
                                </a>
                            </h2>
                            
                            <div class="text-gray-500 mb-2 text-sm">
                                <span><?php echo date('M j, Y', strtotime($blogPost['created_at'])); ?></span>
                            </div>
                            
                            <div class="mb-4 flex-1">
                                <?php 
                                if (!empty($blogPost['excerpt'])) {
                                    echo htmlspecialchars($blogPost['excerpt']);
                                } else {
                                    echo substr(strip_tags($blogPost['content']), 0, 100) . '...';
                                }
                                ?>
                            </div>
                            
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($pagination['last_page'] > 1): ?>
                <div class="flex justify-center mt-6">
                    <div class="inline-flex">
                        <?php if ($pagination['has_prev_pages']): ?>
                            <a href="?slug=<?php echo htmlspecialchars($slug); ?>&page=<?php echo $pagination['current_page'] - 1; ?>" class="bg-gray-200 px-4 py-2 text-gray-800 rounded-l hover:bg-gray-300">
                                Previous
                            </a>
                        <?php endif; ?>
                        
                        <?php 
                        $startPage = max(1, $pagination['current_page'] - 2);
                        $endPage = min($pagination['last_page'], $pagination['current_page'] + 2);
                        
                        for ($i = $startPage; $i <= $endPage; $i++): 
                        ?>
                            <a href="?slug=<?php echo htmlspecialchars($slug); ?>&page=<?php echo $i; ?>" class="<?php echo $i === $pagination['current_page'] ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-800'; ?> px-4 py-2 hover:bg-indigo-700 hover:text-white">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                        
                        <?php if ($pagination['has_more_pages']): ?>
                            <a href="?slug=<?php echo htmlspecialchars($slug); ?>&page=<?php echo $pagination['current_page'] + 1; ?>" class="bg-gray-200 px-4 py-2 text-gray-800 rounded-r hover:bg-gray-300">
                                Next
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    
    <!-- Sidebar -->
    <div class="w-full lg:w-1/4 mt-8 lg:mt-0">
        <!-- Trending Now Widget -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Trending Now</h2>
            <?php if (empty($trendingPosts)): ?>
                <p>No trending posts yet.</p>
            <?php else: ?>
                <ul class="space-y-4">
                    <?php foreach ($trendingPosts as $post): ?>
                        <li class="border-b border-gray-100 pb-3 last:border-0 last:pb-0">
                            <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="block hover:bg-gray-50 transition-all rounded">
                                <div class="flex items-center">
                                    <?php if (!empty($post['featured_image'])): ?>
                                        <div class="w-16 h-16 mr-3 flex-shrink-0 overflow-hidden rounded">
                                            <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-full object-cover">
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <h3 class="text-sm font-medium text-indigo-700"><?php echo htmlspecialchars($post['title']); ?></h3>
                                        <p class="text-xs text-gray-500 mt-1"><?php echo date('M j, Y', strtotime($post['created_at'])); ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <!-- Categories Widget -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Categories</h2>
            <?php if (empty($categories)): ?>
                <p>No categories found.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($categories as $cat): ?>
                        <li class="mb-2 <?php echo ($cat['id'] === $categoryData['id']) ? 'font-bold' : ''; ?>">
                            <a href="category.php?slug=<?php echo htmlspecialchars($cat['slug']); ?>" class="text-indigo-600 hover:text-indigo-800">
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
