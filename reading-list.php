<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to view your reading list', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Get current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page); // Ensure page is at least 1

// Get reading list with pagination
$result = $blog->getReadingList($currentUser['id'], $page, 10);
$readingList = $result['items'];
$pagination = $result['pagination'];

// Process actions (add/remove from reading list)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove_from_reading_list'])) {
        $blogId = (int)$_POST['blog_id'];
        $blog->removeFromReadingList($currentUser['id'], $blogId);
        
        // Redirect to prevent form resubmission
        redirect('reading-list.php', 'Story removed from reading list', 'success');
    }
}

// SEO Optimization
$canonicalUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/reading-list.php";
if ($page > 1) {
    $canonicalUrl .= "?page=$page";
}

// Set SEO tags
$seo->setTitle('Your Reading List')
    ->setDescription('View your saved stories on OneNetly')
    ->setKeywords(['reading list', 'saved stories', 'bookmarks'])
    ->setOgType('website')
    ->setCanonicalUrl($canonicalUrl);

// Set page title (for backward compatibility)
$pageTitle = "Your Reading List";

// Include header
require_once 'includes/header.php';
?>

<div class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Reading List</h1>
        </div>
    </header>
    
    <!-- Main content -->
    <main class="flex-grow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <?php echo displayMessage(); ?>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <?php if (empty($readingList)): ?>
                <div class="p-6 text-center py-12">
                    <div class="inline-flex items-center justify-center p-6 bg-gray-100 text-gray-600 rounded-full mb-4">
                        <i class="fas fa-bookmark text-2xl"></i>
                    </div>
                    <p class="text-gray-800 font-medium text-lg">Your reading list is empty</p>
                    <p class="text-gray-600 mt-2 mb-4">Save stories to read later by clicking the bookmark icon</p>
                    <a href="index.php" class="mt-2 inline-block px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-full font-medium transition">
                        Discover Stories
                    </a>
                </div>
            <?php else: ?>
                <div class="divide-y divide-gray-200">
                    <?php foreach ($readingList as $item): ?>
                        <div class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex flex-col md:flex-row md:justify-between">
                                <div>
                                    <h3 class="text-xl font-medium text-gray-900">
                                        <a href="<?php echo htmlspecialchars($item['slug']); ?>" class="hover:underline">
                                            <?php echo htmlspecialchars($item['title']); ?>
                                        </a>
                                    </h3>
                                    <div class="flex items-center mt-2 text-sm text-gray-500">
                                        <span><?php echo htmlspecialchars($item['username'] ?? 'Anonymous'); ?></span>
                                        <span class="mx-2">·</span>
                                        <span><?php echo date('M d, Y', strtotime($item['added_at'])); ?></span>
                                        <span class="mx-2">·</span>
                                        <span><?php echo ceil(str_word_count(strip_tags($item['content'])) / 200); ?> min read</span>
                                    </div>
                                    <p class="mt-2 text-gray-600 line-clamp-2">
                                        <?php echo substr(strip_tags($item['content']), 0, 150) . '...'; ?>
                                    </p>
                                </div>
                                <div class="flex md:flex-col justify-end items-end mt-4 md:mt-0 space-x-3 md:space-x-0 md:space-y-2">
                                    <form method="POST" action="">
                                        <input type="hidden" name="blog_id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" name="remove_from_reading_list" class="px-3 py-1 border border-gray-300 rounded-full text-sm hover:bg-gray-100 flex items-center">
                                            <i class="fas fa-trash mr-1 text-red-600"></i> Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Pagination -->
        <?php if ($pagination['last_page'] > 1): ?>
            <div class="flex justify-center mt-6">
                <div class="inline-flex rounded-md shadow-sm">
                    <?php if ($pagination['has_prev_pages']): ?>
                        <a href="?page=<?php echo $pagination['current_page'] - 1; ?>" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 text-sm font-medium rounded-l-md hover:bg-gray-50">
                            Previous
                        </a>
                    <?php endif; ?>
                    
                    <?php 
                    $startPage = max(1, $pagination['current_page'] - 2);
                    $endPage = min($pagination['last_page'], $pagination['current_page'] + 2);
                    
                    for ($i = $startPage; $i <= $endPage; $i++): 
                    ?>
                        <a href="?page=<?php echo $i; ?>" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 text-sm font-medium <?php echo $i === $pagination['current_page'] ? 'bg-indigo-50 text-indigo-600' : 'hover:bg-gray-50'; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if ($pagination['has_more_pages']): ?>
                        <a href="?page=<?php echo $pagination['current_page'] + 1; ?>" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 text-sm font-medium rounded-r-md hover:bg-gray-50">
                            Next
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </main>
</div>

<?php require_once 'includes/footer.php'; ?>
