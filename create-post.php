<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to create blog posts', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Only allow admins to create posts
if (!$user->isAdmin()) {
    redirect('dashboard.php', 'Only administrators can create blog posts', 'error');
}

// Get all categories for the form
$categories = $category->getAllCategories();

$errors = [];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    // Removed excerpt field
    $status = $_POST['status'] ?? 'draft';
    $categoryIds = isset($_POST['categories']) ? $_POST['categories'] : [];
    $featuredImage = '';
    
    // Validate input
    if (empty($title)) {
        $errors[] = 'Title is required';
    }
    
    if (empty($content)) {
        $errors[] = 'Content is required';
    }
    
    // Collect blog data
    $blogData = [
        'title' => $title,
        'content' => $content,
        'status' => $status,
        'categories' => $categoryIds ?? []
        // demo_link and download_link removed
    ];
    
    // Handle file upload if present
    if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        
        // Create directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $fileName = time() . '_' . basename($_FILES['featured_image']['name']);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        
        // Validate file type
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowedTypes)) {
            // Upload file
            if (move_uploaded_file($_FILES['featured_image']['tmp_name'], $targetFilePath)) {
                $featuredImage = $targetFilePath;
            } else {
                $errors[] = 'Failed to upload image';
            }
        } else {
            $errors[] = 'Only JPG, JPEG, PNG & GIF files are allowed';
        }
    }
    
    // If no errors, create the blog post
    if (empty($errors)) {
        $blogData = [
            'user_id' => $currentUser['id'],
            'title' => $title,
            'content' => $content,
            // Removed excerpt from blogData
            'featured_image' => $featuredImage,
            'status' => $status,
            'categories' => $categoryIds
        ];
        
        $result = $blog->createBlog($blogData);
        
        if ($result['success']) {
            redirect('dashboard.php', 'Blog post created successfully', 'success');
        } else {
            $errors[] = $result['message'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo getThemeClass(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post - OneNetly</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo getThemeStyles(); ?>
    <?php echo getThemeScript(); ?>
    <script src="https://cdn.tiny.cloud/1/qjlok8e0o411fa94p28nzfzfmjkhej8y6xf3oazjmya1ldkc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: 'textarea#content',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        height: 400,
        setup: function(editor) {
            // Update form before submit to avoid validation issues with hidden textarea
            editor.on('change', function() {
                tinymce.triggerSave();
            });
        }
      });
    </script>
</head>
<body class="<?php echo getBodyThemeClass(); ?>">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-indigo-800 text-white">
            <div class="p-4">
                <h2 class="text-2xl font-semibold">OneNetly</h2>
            </div>
            <nav class="mt-6">
                <a href="dashboard.php" class="flex items-center py-3 px-4 text-white hover:bg-indigo-700">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Dashboard
                </a>
                <?php if (isset($currentUser['is_admin']) && $currentUser['is_admin']): ?>
                <a href="admin/index.php" class="flex items-center py-3 px-4 text-white hover:bg-indigo-700">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Admin Panel
                </a>
                <?php endif; ?>
                <a href="settings.php" class="flex items-center py-3 px-4 text-white hover:bg-indigo-700">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Settings
                </a>
                <a href="index.php" class="flex items-center py-3 px-4 text-white hover:bg-indigo-700">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Home
                </a>
                <a href="logout.php" class="flex items-center py-3 px-4 text-white hover:bg-indigo-700">
                    <span class="mr-3">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 16L21 12M21 12L17 8M21 12H9M13 16V17C13 18.6569 11.6569 20 10 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H10C11.6569 4 13 5.34315 13 7V8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    Logout
                </a>
            </nav>
        </div>
        
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-semibold text-gray-900">Create New Blog Post</h1>
                </div>
            </header>
            
            <!-- Main content -->
            <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <?php echo displayMessage(); ?>
                
                <?php if (!empty($errors)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <div class="bg-white shadow rounded-lg p-6">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($_POST['title'] ?? ''); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        
                        <div class="mb-4">
                            <!-- Excerpt field removed -->
                        
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                            <textarea id="content" name="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="10"><?php echo htmlspecialchars($_POST['content'] ?? ''); ?></textarea>
                            <div class="text-sm text-gray-500 mt-1">Write your blog post content here.</div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="featured_image" class="block text-gray-700 text-sm font-bold mb-2">Featured Image (optional)</label>
                            <input type="file" id="featured_image" name="featured_image" class="w-full text-gray-700">
                            <p class="text-sm text-gray-500 mt-1">Recommended image size: 1200x628 pixels. Max file size: 2MB.</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
                            <?php if (empty($categories)): ?>
                                <p class="text-gray-600">No categories available.</p>
                            <?php else: ?>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                    <?php foreach ($categories as $cat): ?>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="category_<?php echo $cat['id']; ?>" name="categories[]" value="<?php echo $cat['id']; ?>" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                                <?php 
                                                if (isset($_POST['categories']) && in_array($cat['id'], $_POST['categories'])) {
                                                    echo 'checked';
                                                }
                                                ?>
                                            >
                                            <label for="category_<?php echo $cat['id']; ?>" class="ml-2 text-sm text-gray-700">
                                                <?php echo htmlspecialchars($cat['name']); ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <p class="text-sm text-gray-500 mt-1">Select one or more categories for your blog post.</p>
                        </div>
                        
                        <!-- Remove demo_link and download_link form fields -->
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <div class="flex items-center">
                                <input type="radio" id="status_draft" name="status" value="draft" <?php echo (!isset($_POST['status']) || $_POST['status'] === 'draft') ? 'checked' : ''; ?> class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                <label for="status_draft" class="ml-2 text-sm text-gray-700">Draft</label>
                            </div>
                            <div class="flex items-center mt-2">
                                <input type="radio" id="status_published" name="status" value="published" <?php echo (isset($_POST['status']) && $_POST['status'] === 'published') ? 'checked' : ''; ?> class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                <label for="status_published" class="ml-2 text-sm text-gray-700">Published</label>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-end">
                            <a href="dashboard.php" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                Cancel
                            </a>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Create Post
                            </button>
                        </div>
                    </form>
                </div>
                <?php displayHorizontalAd(); ?>
            </main>
        </div>
    </div>
</body>
</html>
