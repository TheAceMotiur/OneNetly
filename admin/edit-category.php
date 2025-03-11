<?php
require_once 'admin_header.php';

// Get category ID from URL
$categoryId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Get category data
$categoryData = $category->getCategoryById($categoryId);

// Check if category exists
if (!$categoryData) {
    $_SESSION['message'] = 'Category not found';
    $_SESSION['message_type'] = 'error';
    header('Location: categories.php');
    exit;
}

// Get all categories for the parent dropdown (excluding this one and its subcategories)
$allCategories = $category->getAllCategories();

// Process category update
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_category'])) {
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $parentId = !empty($_POST['parent_id']) ? (int)$_POST['parent_id'] : null;
        
        // Validate input
        if (empty($name)) {
            $errors[] = 'Category name is required';
        } else {
            $updateData = [
                'name' => $name,
                'description' => $description,
                'parent_id' => $parentId
            ];
            
            $result = $category->updateCategory($categoryId, $updateData);
            
            if ($result['success']) {
                $_SESSION['message'] = 'Category updated successfully';
                $_SESSION['message_type'] = 'success';
                
                // Refresh category data
                $categoryData = $category->getCategoryById($categoryId);
                
                $success = true;
            } else {
                $errors[] = $result['message'];
            }
        }
    }
}
?>

<!-- Edit Category Page -->
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Edit Category</h1>
    
    <div>
        <a href="categories.php" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            Back to Categories
        </a>
    </div>
</div>

<?php if ($success): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        Category updated successfully
    </div>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <?php foreach ($errors as $error): ?>
            <p><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6">
        <form method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Category Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? $categoryData['name']); ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       required>
            </div>
            
            <div class="mb-4">
                <label for="parent_id" class="block text-gray-700 text-sm font-bold mb-2">Parent Category (optional)</label>
                <select id="parent_id" name="parent_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">None (Top Level Category)</option>
                    <?php foreach ($allCategories as $cat): ?>
                        <?php if ($cat['id'] != $categoryId): // Can't set itself as parent ?>
                            <option value="<?php echo $cat['id']; ?>" 
                                <?php 
                                if (isset($_POST['parent_id'])) {
                                    echo ($_POST['parent_id'] == $cat['id']) ? 'selected' : '';
                                } else {
                                    echo ($categoryData['parent_id'] == $cat['id']) ? 'selected' : '';
                                }
                                ?>
                            >
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <p class="text-sm text-gray-500 mt-1">Select a parent category or leave empty for a top-level category.</p>
            </div>
            
            <div class="mb-4">
                <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug</label>
                <input type="text" id="slug" value="<?php echo htmlspecialchars($categoryData['slug']); ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight bg-gray-100" 
                       disabled>
                <p class="text-sm text-gray-500 mt-1">Slug is generated automatically from the name and cannot be edited directly.</p>
            </div>
            
            <div class="mb-6">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description (optional)</label>
                <textarea id="description" name="description" rows="3" 
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                ><?php echo htmlspecialchars($_POST['description'] ?? $categoryData['description']); ?></textarea>
            </div>
            
            <div class="flex items-center justify-end">
                <button type="submit" name="update_category" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Category
                </button>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'admin_footer.php';
?>
