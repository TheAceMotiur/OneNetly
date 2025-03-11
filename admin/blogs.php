<?php
require_once 'admin_header.php';

// Process blog actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_blog'])) {
        $blogId = (int)$_POST['blog_id'];
        
        $result = $blog->deleteBlog($blogId);
        
        if ($result['success']) {
            $_SESSION['message'] = 'Blog post deleted successfully';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to delete blog post: ' . $result['message'];
            $_SESSION['message_type'] = 'error';
        }
        
        // Use a JavaScript redirect as a fallback if headers are already sent
        if (!headers_sent()) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo '<script>window.location.href = "' . $_SERVER['PHP_SELF'] . '";</script>';
            exit;
        }
    }
    
    if (isset($_POST['change_status'])) {
        $blogId = (int)$_POST['blog_id'];
        $newStatus = $_POST['new_status'];
        
        $result = $blog->updateBlog($blogId, ['status' => $newStatus]);
        
        if ($result['success']) {
            $_SESSION['message'] = 'Blog status updated successfully';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to update blog status: ' . $result['message'];
            $_SESSION['message_type'] = 'error';
        }
        
        // Use a JavaScript redirect as a fallback if headers are already sent
        if (!headers_sent()) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo '<script>window.location.href = "' . $_SERVER['PHP_SELF'] . '";</script>';
            exit;
        }
    }
}

// Get all blogs
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page); // Ensure page is at least 1
$status = isset($_GET['status']) ? $_GET['status'] : 'all';

$result = $blog->getAllBlogs($page, 15, $status);
$blogs = $result['blogs'];
$pagination = $result['pagination'];
?>

<!-- Admin Blogs Management Page -->
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Manage Blog Posts</h1>
    
    <div>
        <a href="create-category.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
            New Category
        </a>
        <a href="../create-post.php" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            New Blog Post
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow mb-6">
    <div class="p-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-700">Blog Posts</h2>
            <div class="flex">
                <a href="?status=all" class="<?php echo $status === 'all' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'; ?> hover:bg-blue-500 hover:text-white px-3 py-1 rounded-l">All</a>
                <a href="?status=published" class="<?php echo $status === 'published' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'; ?> hover:bg-blue-500 hover:text-white px-3 py-1">Published</a>
                <a href="?status=draft" class="<?php echo $status === 'draft' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'; ?> hover:bg-blue-500 hover:text-white px-3 py-1 rounded-r">Drafts</a>
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (empty($blogs)): ?>
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                        No blog posts found.
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($blogs as $blogPost): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $blogPost['id']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <a href="../<?php echo htmlspecialchars($blogPost['slug']); ?>" class="hover:text-blue-600" target="_blank">
                            <?php echo htmlspecialchars($blogPost['title']); ?>
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($blogPost['username']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php if ($blogPost['status'] === 'published'): ?>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Published
                            </span>
                        <?php else: ?>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Draft
                            </span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo date('M j, Y', strtotime($blogPost['created_at'])); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <!-- Change Status Form -->
                        <form method="POST" class="inline-block mr-2">
                            <input type="hidden" name="blog_id" value="<?php echo $blogPost['id']; ?>">
                            <input type="hidden" name="new_status" value="<?php echo $blogPost['status'] === 'published' ? 'draft' : 'published'; ?>">
                            <button type="submit" name="change_status" class="text-blue-600 hover:text-blue-900">
                                <?php echo $blogPost['status'] === 'published' ? 'Unpublish' : 'Publish'; ?>
                            </button>
                        </form>
                        
                        <!-- Edit Link -->
                        <a href="../edit-post.php?id=<?php echo $blogPost['id']; ?>" class="text-blue-600 hover:text-blue-900 mr-2">
                            Edit
                        </a>
                        
                        <!-- Delete Form -->
                        <form method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                            <input type="hidden" name="blog_id" value="<?php echo $blogPost['id']; ?>">
                            <button type="submit" name="delete_blog" class="text-red-600 hover:text-red-900">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<?php if ($pagination['last_page'] > 1): ?>
<div class="flex justify-center mt-6">
    <div class="inline-flex">
        <?php if ($pagination['has_prev_pages']): ?>
            <a href="?page=<?php echo $pagination['current_page'] - 1; ?>&status=<?php echo $status; ?>" class="bg-gray-200 px-4 py-2 text-gray-800 rounded-l hover:bg-gray-300">
                Previous
            </a>
        <?php endif; ?>
        
        <?php 
        $startPage = max(1, $pagination['current_page'] - 2);
        $endPage = min($pagination['last_page'], $pagination['current_page'] + 2);
        
        for ($i = $startPage; $i <= $endPage; $i++): 
        ?>
            <a href="?page=<?php echo $i; ?>&status=<?php echo $status; ?>" class="<?php echo $i === $pagination['current_page'] ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800'; ?> px-4 py-2 hover:bg-blue-500 hover:text-white">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
        
        <?php if ($pagination['has_more_pages']): ?>
            <a href="?page=<?php echo $pagination['current_page'] + 1; ?>&status=<?php echo $status; ?>" class="bg-gray-200 px-4 py-2 text-gray-800 rounded-r hover:bg-gray-300">
                Next
            </a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<?php
require_once 'admin_footer.php';
?>
