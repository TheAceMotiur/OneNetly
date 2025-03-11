<?php
require_once 'admin_header.php';

// Process category actions
$errors = [];
$success = false;

// Get all categories for the parent dropdown
$allCategories = $category->getAllCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create_category'])) {
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $parentId = !empty($_POST['parent_id']) ? (int)$_POST['parent_id'] : null;
        
        // Validate input
        if (empty($name)) {
            $errors[] = 'Category name is required';
        } else {
            $categoryData = [
                'name' => $name,
                'description' => $description,
                'parent_id' => $parentId
            ];
            
            $result = $category->createCategory($categoryData);
            
            if ($result['success']) {
                $_SESSION['message'] = 'Category created successfully';
                $_SESSION['message_type'] = 'success';
                
                // Use a JavaScript redirect as a fallback if headers are already sent
                if (!headers_sent()) {
                    header('Location: categories.php');
                    exit;
                } else {
                    echo '<script>window.location.href = "categories.php";</script>';
                    exit;
                }
            } else {
                $errors[] = $result['message'];
            }
        }
    }
}
?>

<!-- Create Category Page -->
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Create Category</h1>
    
    <div>
        <a href="categories.php" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            Back to Categories
        </a>
    </div>
</div>

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
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       required>
            </div>
            
            <div class="mb-4">
                <label for="parent_id" class="block text-gray-700 text-sm font-bold mb-2">Parent Category (optional)</label>
                <select id="parent_id" name="parent_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">None (Top Level Category)</option>
                    <?php foreach ($allCategories as $cat): ?>
                        <option value="<?php echo $cat['id']; ?>" <?php echo (isset($_POST['parent_id']) && $_POST['parent_id'] == $cat['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($cat['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <p class="text-sm text-gray-500 mt-1">Select a parent category to make this a subcategory.</p>
            </div>
            
            <div class="mb-6">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description (optional)</label>
                <textarea id="description" name="description" rows="3" 
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                ><?php echo htmlspecialchars($_POST['description'] ?? ''); ?></textarea>
            </div>
            
            <div class="flex items-center justify-end">
                <button type="submit" name="create_category" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create Category
                </button>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'admin_footer.php';
?>
