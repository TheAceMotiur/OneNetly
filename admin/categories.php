<?php
require_once 'admin_header.php';

// Check if display_order column exists
$stmt = $pdo->query("SHOW COLUMNS FROM categories LIKE 'display_order'");
$displayOrderExists = $stmt->rowCount() > 0;

// Process category actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_category'])) {
        $categoryId = (int)$_POST['category_id'];
        
        $result = $category->deleteCategory($categoryId);
        
        if ($result['success']) {
            $_SESSION['message'] = 'Category deleted successfully';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to delete category: ' . $result['message'];
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

// Get all categories including parent info
$categories = $category->getAllCategories(true);
?>

<!-- Admin Categories Management Page -->
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Categories</h1>
    
    <div>
        <?php if (!$displayOrderExists): ?>
        <a href="../migrations/add_display_order_to_categories.php" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
            Run Category Order Migration
        </a>
        <?php endif; ?>
        <a href="create-category.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            New Category
        </a>
    </div>
</div>

<?php if (!$displayOrderExists): ?>
<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
    <p>Category ordering functionality is not available yet. Please run the migration to add display_order column to categories table.</p>
</div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow mb-6">
    <div class="p-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Manage Categories</h2>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parent</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (empty($categories)): ?>
                <tr>
                    <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">
                        No categories found.
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($categories as $cat): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $cat['id']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <a href="../category.php?slug=<?php echo htmlspecialchars($cat['slug']); ?>" class="hover:text-blue-600" target="_blank">
                            <?php 
                            // Indent subcategories
                            echo !empty($cat['parent_id']) ? '— ' : '';
                            echo htmlspecialchars($cat['name']); 
                            ?>
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($cat['slug']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php if (!empty($cat['parent_name'])): ?>
                            <a href="../category.php?slug=<?php echo htmlspecialchars($cat['parent_slug']); ?>" class="text-blue-600 hover:text-blue-800" target="_blank">
                                <?php echo htmlspecialchars($cat['parent_name']); ?>
                            </a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                        <?php echo !empty($cat['description']) ? htmlspecialchars($cat['description']) : '-'; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="flex space-x-1">
                            <form method="POST" action="update-category-order.php" class="inline-block">
                                <input type="hidden" name="category_id" value="<?php echo $cat['id']; ?>">
                                <input type="hidden" name="direction" value="up">
                                <button type="submit" class="text-blue-600 hover:text-blue-900 px-1" title="Move Up">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                    </svg>
                                </button>
                            </form>
                            <form method="POST" action="update-category-order.php" class="inline-block">
                                <input type="hidden" name="category_id" value="<?php echo $cat['id']; ?>">
                                <input type="hidden" name="direction" value="down">
                                <button type="submit" class="text-blue-600 hover:text-blue-900 px-1" title="Move Down">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </form>
                            <?php echo isset($cat['display_order']) ? $cat['display_order'] : $cat['id']; ?>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo date('M j, Y', strtotime($cat['created_at'])); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <!-- Edit Link -->
                        <a href="edit-category.php?id=<?php echo $cat['id']; ?>" class="text-blue-600 hover:text-blue-900 mr-2">
                            Edit
                        </a>
                        
                        <!-- Delete Form -->
                        <form method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this category? All blog posts associated with this category will be unlinked.');">
                            <input type="hidden" name="category_id" value="<?php echo $cat['id']; ?>">
                            <button type="submit" name="delete_category" class="text-red-600 hover:text-red-900">
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

<?php
require_once 'admin_footer.php';
?>
