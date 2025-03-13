<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to edit blog posts', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Remove admin-only check

// Get the blog post ID
$postId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Get the blog post
$blogPost = $blog->getBlogById($postId);

// Check if post exists
if (!$blogPost) {
    redirect('dashboard.php', 'Blog post not found', 'error');
}

// Check if user is the owner of this post or an admin
if ($blogPost['user_id'] != $currentUser['id'] && !$user->isAdmin()) {
    redirect('dashboard.php', 'You do not have permission to edit this post', 'error');
}

// Remove categories retrieval
// Remove blog categories retrieval

$errors = [];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $status = $_POST['status'] ?? 'draft';
    // Remove categories
    $tags = trim($_POST['tags'] ?? '');
    
    // Validate input
    if (empty($title)) {
        $errors[] = 'Title is required';
    }
    
    if (empty($content)) {
        $errors[] = 'Content is required';
    }
    
    // Prepare blog data for update
    $blogData = [
        'title' => $title,
        'content' => $content,
        'status' => $status,
        // Remove categories
        'tags' => $tags
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
                $blogData['featured_image'] = $targetFilePath;
            } else {
                $errors[] = 'Failed to upload image';
            }
        } else {
            $errors[] = 'Only JPG, JPEG, PNG & GIF files are allowed';
        }
    }
    
    // If no errors, update the blog post
    if (empty($errors)) {
        $result = $blog->updateBlog($postId, $blogData);
        
        if ($result['success']) {
            redirect('dashboard.php', 'Blog post updated successfully', 'success');
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
    <title>Edit Blog Post - OneNetly</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo getThemeStyles(); ?>
    <?php echo getThemeScript(); ?>
    <!-- Add Quill Rich Text Editor instead of TinyMCE -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-white">
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
                            <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 0 01.707.293l5.414 5.414a1 0 01.293.707V19a2 0 01-2 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                    <h1 class="text-2xl font-semibold text-gray-900">Edit Blog Post</h1>
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
                            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($_POST['title'] ?? $blogPost['title']); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        
                        <div class="mb-4">
                            <!-- Excerpt field removed -->
                        
                        <div class="mb-4">
                            <label for="editor-container" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                            <!-- Replace textarea with Quill editor container -->
                            <div id="editor-container" class="border rounded-lg" style="height: 400px;"><?php echo $_POST['content'] ?? $blogPost['content']; ?></div>
                            <input type="hidden" id="content" name="content" value="<?php echo htmlspecialchars($_POST['content'] ?? $blogPost['content']); ?>">
                            <div class="text-sm text-gray-500 mt-1">Edit your blog post content here.</div>
                        </div>

                        <div class="mb-4">
                            <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">Tags (comma-separated)</label>
                            <div class="flex flex-wrap items-center border rounded p-2 bg-white">
                                <div class="tag-container flex flex-wrap gap-2 w-full" id="tagContainer">
                                    <!-- Tags will be added here dynamically -->
                                </div>
                                <input 
                                    type="text" 
                                    id="tagInput" 
                                    placeholder="Type and press Enter to add tags..."
                                    class="flex-grow border-none outline-none p-1 text-sm" 
                                >
                            </div>
                            <input type="hidden" id="tags" name="tags" value="<?php echo htmlspecialchars($_POST['tags'] ?? $blogPost['tags'] ?? ''); ?>">
                            <div class="text-sm text-gray-500 mt-1">Add relevant tags to help readers find your content (e.g., technology, programming, web development)</div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="featured_image" class="block text-gray-700 text-sm font-bold mb-2">Featured Image</label>
                            <?php if (!empty($blogPost['featured_image'])): ?>
                                <div class="mb-2">
                                    <p class="text-sm text-gray-600 mb-2">Current image:</p>
                                    <img src="<?php echo htmlspecialchars($blogPost['featured_image']); ?>" alt="Featured image" class="max-h-40 mb-2">
                                </div>
                            <?php endif; ?>
                            <input type="file" id="featured_image" name="featured_image" class="w-full text-gray-700">
                            <p class="text-sm text-gray-500 mt-1">Upload a new image to replace the current one (optional). Recommended size: 1200x628 pixels.</p>
                        </div>
                        
                        <!-- Remove categories section -->
                        
                        <!-- Remove demo_link and download_link form fields -->
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <div class="flex items-center">
                                <input type="radio" id="status_draft" name="status" value="draft" 
                                    <?php echo (isset($_POST['status']) && $_POST['status'] === 'draft') || 
                                             (!isset($_POST['status']) && $blogPost['status'] === 'draft') ? 'checked' : ''; ?> 
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                <label for="status_draft" class="ml-2 text-sm text-gray-700">Draft</label>
                            </div>
                            <div class="flex items-center mt-2">
                                <input type="radio" id="status_published" name="status" value="published" 
                                    <?php echo (isset($_POST['status']) && $_POST['status'] === 'published') || 
                                             (!isset($_POST['status']) && $blogPost['status'] === 'published') ? 'checked' : ''; ?> 
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                <label for="status_published" class="ml-2 text-sm text-gray-700">Published</label>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-end">
                            <a href="dashboard.php" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                Cancel
                            </a>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Post
                            </button>
                        </div>
                    </form>
                </div>
                <?php displayHorizontalAd(); ?>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill editor
            var quill = new Quill('#editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['blockquote', 'code-block', 'link', 'image'],
                        [{ 'align': [] }],
                        ['clean']
                    ]
                },
                placeholder: 'Write your content here...'
            });
            
            // Update hidden form field with Quill content before submitting
            var form = document.querySelector('form');
            var contentInput = document.querySelector('#content');
            
            form.onsubmit = function() {
                contentInput.value = quill.root.innerHTML;
                return true;
            };
            
            // Show/hide settings panel functionality (if needed)
            // ...existing code...

            // Tag management
            const tagInput = document.getElementById('tagInput');
            const tagContainer = document.getElementById('tagContainer');
            const tagsHiddenInput = document.getElementById('tags');
            const commonTags = ['technology', 'programming', 'web development', 'design', 'marketing', 
                                'business', 'productivity', 'science', 'health', 'finance', 
                                'education', 'travel', 'food', 'lifestyle', 'sports'];
            
            // Create tag suggestion dropdown
            const suggestionsContainer = document.createElement('div');
            suggestionsContainer.className = 'tag-suggestions hidden absolute z-10 bg-white border rounded shadow-md w-full max-h-40 overflow-y-auto mt-1';
            tagInput.parentNode.style.position = 'relative';
            tagInput.parentNode.appendChild(suggestionsContainer);
            
            function addTag(tagText) {
                if (!tagText) return;
                
                // Check for duplicates
                const existingTags = Array.from(document.querySelectorAll('.tag-item')).map(tag => tag.dataset.value);
                if (existingTags.includes(tagText.trim())) return;
                
                const tagElement = document.createElement('span');
                tagElement.className = 'tag-item inline-flex items-center bg-indigo-100 text-indigo-800 rounded-full px-3 py-1 text-sm';
                tagElement.dataset.value = tagText.trim();
                
                const tagContent = document.createElement('span');
                tagContent.textContent = tagText.trim();
                
                const removeBtn = document.createElement('button');
                removeBtn.className = 'ml-1 text-indigo-600 hover:text-indigo-900 focus:outline-none';
                removeBtn.innerHTML = '&times;';
                removeBtn.onclick = function() {
                    tagContainer.removeChild(tagElement);
                    updateHiddenTagsInput();
                };
                
                tagElement.appendChild(tagContent);
                tagElement.appendChild(removeBtn);
                tagContainer.appendChild(tagElement);
                
                // Clear input
                tagInput.value = '';
                updateHiddenTagsInput();
                hideSuggestions();
            }
            
            function updateHiddenTagsInput() {
                const tags = Array.from(document.querySelectorAll('.tag-item')).map(tag => tag.dataset.value);
                tagsHiddenInput.value = tags.join(',');
            }
            
            // Add functionality to load tag suggestions from API
            async function fetchTagSuggestions(inputValue) {
                try {
                    const response = await fetch(`./api/suggest-tags.php?q=${encodeURIComponent(inputValue)}`);
                    const data = await response.json();
                    return data.tags || [];
                } catch (error) {
                    console.error('Error fetching tag suggestions:', error);
                    return [];
                }
            }

            async function showSuggestions(inputValue) {
                suggestionsContainer.innerHTML = '';
                hideSuggestions();
                
                if (!inputValue) return;

                let matchingTags = [];
                
                // First check local common tags
                const localMatchingTags = commonTags.filter(tag => 
                    tag.toLowerCase().includes(inputValue.toLowerCase()) &&
                    !Array.from(document.querySelectorAll('.tag-item')).map(t => t.dataset.value).includes(tag)
                );
                
                // Then fetch from API if needed
                if (localMatchingTags.length < 5) {
                    const apiTags = await fetchTagSuggestions(inputValue);
                    matchingTags = [...new Set([...localMatchingTags, ...apiTags])];
                } else {
                    matchingTags = localMatchingTags;
                }
                
                if (matchingTags.length === 0) return;
                
                matchingTags.forEach(tag => {
                    const item = document.createElement('div');
                    item.className = 'suggestion-item p-2 hover:bg-gray-100 cursor-pointer text-sm';
                    item.textContent = tag;
                    item.onclick = function() {
                        addTag(tag);
                    };
                    suggestionsContainer.appendChild(item);
                });
                
                suggestionsContainer.classList.remove('hidden');
            }
            
            function hideSuggestions() {
                suggestionsContainer.classList.add('hidden');
            }
            
            // Initialize existing tags if present
            if (tagsHiddenInput.value) {
                const initialTags = tagsHiddenInput.value.split(',');
                initialTags.forEach(tag => {
                    if (tag.trim()) addTag(tag);
                });
            }
            
            // Event listeners
            tagInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    const value = tagInput.value.trim();
                    if (value) {
                        addTag(value);
                    }
                } else if (e.key === 'Escape') {
                    hideSuggestions();
                }
            });
            
            tagInput.addEventListener('input', function() {
                showSuggestions(tagInput.value);
            });
            
            // Hide suggestions when clicking outside
            document.addEventListener('click', function(e) {
                if (!tagInput.contains(e.target) && !suggestionsContainer.contains(e.target)) {
                    hideSuggestions();
                }
            });
            
            // Update form submission
            var form = document.querySelector('form');
            var contentInput = document.querySelector('#content');
            
            form.onsubmit = function() {
                contentInput.value = quill.root.innerHTML;
                updateHiddenTagsInput(); // Ensure tags are updated
                return true;
            };
        });
    </script>
</body>
</html>
