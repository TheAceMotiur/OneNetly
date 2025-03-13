<?php
require_once 'includes/init.php';
require_once 'includes/ads.php';
require_once 'includes/ai-writer-integration.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to create blog posts', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Set page title
$pageTitle = "Write a Story - OneNetly";

// Get pre-filled title and content from AI Writer if available
$prefilledTitle = isset($_GET['title']) ? urldecode($_GET['title']) : '';
$prefilledContent = isset($_GET['content']) ? urldecode($_GET['content']) : '';
$prefilledTags = isset($_GET['tags']) ? urldecode($_GET['tags']) : '';

// Get AI writer content if available
$aiWriterData = getAiWriterContent();

// Process form submission via AJAX if this is an AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax_request'])) {
    $errors = [];
    
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $status = $_POST['status'] ?? 'draft';
    $tags = trim($_POST['tags'] ?? '');
    $draftId = isset($_POST['draft_id']) ? (int)$_POST['draft_id'] : null;
    $isAutoSave = isset($_POST['auto_save']) && $_POST['auto_save'] === '1';
    $featuredImage = '';
    
    // Validate input
    if (empty($title)) {
        $errors[] = 'Title is required';
    }
    
    if (empty($content)) {
        $errors[] = 'Content is required';
    }
    
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
    
    // If no errors, create or update the blog post
    if (empty($errors)) {
        $blogData = [
            'user_id' => $currentUser['id'],
            'title' => $title,
            'content' => $content,
            'featured_image' => $featuredImage,
            'status' => $status,
            'tags' => $tags
        ];
        
        // If draft ID is provided, update instead of create
        if ($draftId) {
            // First make sure the post belongs to this user
            $existingPost = $blog->getBlogById($draftId);
            if ($existingPost && $existingPost['user_id'] == $currentUser['id']) {
                $result = $blog->updateBlog($draftId, $blogData);
                if ($result['success']) {
                    $result['post_id'] = $draftId; // Add post ID to response
                }
            } else {
                // Not found or not owned by this user, create new
                $result = $blog->createBlog($blogData);
            }
        } else {
            $result = $blog->createBlog($blogData);
        }
        
        header('Content-Type: application/json');
        if ($result['success']) {
            // For auto-save, use a shorter message
            $message = $isAutoSave ? 
                'Draft saved' : 
                ($status === 'published' ? 'Story published successfully' : 'Story saved as draft');
                
            echo json_encode([
                'success' => true,
                'message' => $message,
                'post_id' => $result['blog_id'] ?? $draftId
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => $result['message']
            ]);
        }
        exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'errors' => $errors
        ]);
        exit;
    }
}

// Regular form submission (non-AJAX)
$errors = [];
$successMessage = '';
$draftId = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['ajax_request'])) {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $status = $_POST['status'] ?? 'draft';
    $tags = trim($_POST['tags'] ?? '');
    
    // Validate input
    if (empty($title)) {
        $errors[] = 'Title is required';
    }
    
    if (empty($content)) {
        $errors[] = 'Content is required';
    }
    
    // Handle file upload if present
    $featuredImage = '';
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
    
    // If no errors, create or update the blog post
    if (empty($errors)) {
        $blogData = [
            'user_id' => $currentUser['id'],
            'title' => $title,
            'content' => $content,
            'featured_image' => $featuredImage,
            'status' => $status,
            'tags' => $tags
        ];
        
        $result = $blog->createBlog($blogData);
        
        if ($result['success']) {
            $successMessage = $status === 'published' ? 'Story published successfully' : 'Story saved as draft';
            $draftId = $result['blog_id'];
            
            // Redirect to dashboard after successful submission
            redirect('dashboard.php', $successMessage, 'success');
        } else {
            $errors[] = $result['message'];
        }
    }
}

// Include header
include_once 'includes/header.php';

// Add AI Writer content initialization script
echo getAiContentInitScript($aiWriterData);
?>

<!-- Tag management script -->
<script>
// Global tag handling function for both AI Writer and Create Post
window.addTag = function(tagText) {
    if (!tagText) return;
    
    // Handle comma-separated tags
    const tags = tagText.split(',');
    const tagContainer = document.getElementById('tagContainer');
    
    if (!tagContainer) return;
    
    tags.forEach(tag => {
        const trimmedTag = tag.trim();
        if (!trimmedTag) return;
        
        // Check for duplicates
        const existingTags = Array.from(document.querySelectorAll('.tag-item')).map(t => t.dataset.value);
        if (existingTags.includes(trimmedTag)) return;
        
        // Create tag element
        const tagElement = document.createElement('span');
        tagElement.className = 'tag-item inline-flex items-center bg-indigo-100 text-indigo-800 rounded-full px-3 py-1 text-sm mr-2 mb-2';
        tagElement.dataset.value = trimmedTag;
        
        const tagContent = document.createElement('span');
        tagContent.textContent = trimmedTag;
        
        const removeBtn = document.createElement('button');
        removeBtn.className = 'ml-1 text-indigo-600 hover:text-indigo-900 focus:outline-none';
        removeBtn.innerHTML = '&times;';
        removeBtn.onclick = function() {
            tagContainer.removeChild(tagElement);
            
            // Update hidden input field if it exists
            const hiddenTagsField = document.getElementById('tags');
            if (hiddenTagsField) {
                const remainingTags = Array.from(document.querySelectorAll('.tag-item'))
                    .map(tag => tag.dataset.value).join(',');
                hiddenTagsField.value = remainingTags;
            }
        };
        
        tagElement.appendChild(tagContent);
        tagElement.appendChild(removeBtn);
        tagContainer.appendChild(tagElement);
        
        // Update hidden input field if it exists
        const hiddenTagsField = document.getElementById('tags');
        if (hiddenTagsField) {
            const allTags = Array.from(document.querySelectorAll('.tag-item'))
                .map(tag => tag.dataset.value).join(',');
            hiddenTagsField.value = allTags;
        }
    });
};

// Initialize tag input functionality when document is loaded
document.addEventListener('DOMContentLoaded', function() {
    const tagInput = document.getElementById('tagInput');
    if (!tagInput) return;
    
    const tagContainer = document.getElementById('tagContainer');
    const commonTags = ['technology', 'business', 'health', 'finance', 'education', 
                       'travel', 'lifestyle', 'sports', 'science', 'food'];
    
    // Create tag suggestion dropdown
    const suggestionsContainer = document.createElement('div');
    suggestionsContainer.className = 'tag-suggestions hidden absolute z-10 bg-white border rounded shadow-md w-full max-h-40 overflow-y-auto mt-1';
    tagInput.parentNode.style.position = 'relative';
    tagInput.parentNode.appendChild(suggestionsContainer);
    
    // Show suggestions based on input
    function showSuggestions(inputValue) {
        suggestionsContainer.innerHTML = '';
        hideSuggestions();
        
        if (!inputValue) return;
        
        const matchingTags = commonTags.filter(tag => 
            tag.toLowerCase().includes(inputValue.toLowerCase()) &&
            !Array.from(document.querySelectorAll('.tag-item')).map(t => t.dataset.value).includes(tag)
        );
        
        if (matchingTags.length === 0) return;
        
        matchingTags.forEach(tag => {
            const item = document.createElement('div');
            item.className = 'suggestion-item p-2 hover:bg-gray-100 cursor-pointer text-sm';
            item.textContent = tag;
            item.onclick = function() {
                window.addTag(tag);
                tagInput.value = '';
                hideSuggestions();
                tagInput.focus();
            };
            suggestionsContainer.appendChild(item);
        });
        
        suggestionsContainer.classList.remove('hidden');
    }
    
    function hideSuggestions() {
        suggestionsContainer.classList.add('hidden');
    }
    
    // Event listeners
    tagInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ',') {
            e.preventDefault();
            const value = tagInput.value.trim();
            if (value) {
                window.addTag(value);
                tagInput.value = '';
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
    
    // Pre-populate tags from URL if available
    if ('<?php echo $prefilledTags; ?>') {
        window.addTag('<?php echo $prefilledTags; ?>');
    }
});

// Function to set editor content (for AI Writer to use)
window.setEditorContent = function(content) {
    // Check if we're using a rich text editor
    if (typeof Quill !== 'undefined' && window.editor) {
        try {
            // Sanitize HTML content if needed
            const sanitizedContent = content.trim();
            // Use clipboard.dangerouslyPasteHTML to preserve formatting
            window.editor.clipboard.dangerouslyPasteHTML(sanitizedContent);
            
            // Update the hidden input with content
            const contentInput = document.getElementById('content');
            if (contentInput) contentInput.value = window.editor.root.innerHTML;
            
            console.log('Content successfully loaded into editor');
        } catch (err) {
            console.error('Error setting editor content:', err);
        }
    } else if (typeof tinymce !== 'undefined' && tinymce.activeEditor) {
        tinymce.activeEditor.setContent(content);
    } else {
        // Fallback for standard textarea
        const contentField = document.getElementById('content');
        if (contentField) contentField.value = content;
    }
};
</script>

<style>
/* Consistent styles for the tags across pages */
.tag-item {
    display: inline-flex;
    align-items: center;
    background-color: #EEF2FF; /* indigo-100 */
    color: #3730A3; /* indigo-800 */
    border-radius: 9999px;
    padding: 0.25rem 0.75rem;
    font-size: 0.875rem;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
}

.tag-suggestions {
    position: absolute;
    z-index: 10;
    background-color: white;
    border: 1px solid #e5e7eb;
    border-radius: 0.375rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    width: 100%;
    max-height: 10rem;
    overflow-y: auto;
    margin-top: 0.25rem;
}

.suggestion-item {
    padding: 0.5rem;
    cursor: pointer;
    font-size: 0.875rem;
}

.suggestion-item:hover {
    background-color: #F3F4F6; /* gray-100 */
}
</style>

<div id="create-post-app" class="min-h-screen flex flex-col">
    <header class="bg-white border-b border-gray-200 py-4 px-6">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <a href="dashboard.php" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-arrow-left"></i> All stories
            </a>
            
            <div class="flex items-center space-x-4">
                <div id="autoSaveStatus" class="text-sm text-gray-500 hidden">
                    <i id="autoSaveIcon" class="fas"></i>
                    <span id="autoSaveText"></span>
                </div>
                <button id="saveDraftBtn" type="button" class="px-4 py-2 text-sm border border-gray-300 rounded-full text-gray-700 hover:bg-gray-50">
                    Save draft
                </button>
                <button id="publishBtn" type="button" class="px-4 py-2 text-sm bg-green-600 text-white rounded-full hover:bg-green-700">
                    Publish
                </button>
            </div>
        </div>
    </header>
    
    <main class="flex-grow">
        <div id="errorMessages" class="max-w-3xl mx-auto px-4 py-4 hidden">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <div id="errorList"></div>
            </div>
        </div>
        
        <div id="successMessage" class="max-w-3xl mx-auto px-4 py-4 hidden">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <p id="successText"></p>
            </div>
        </div>
        
        <form id="createPostForm" method="POST" enctype="multipart/form-data" class="max-w-3xl mx-auto px-4 py-8">
            <input type="hidden" name="draft_id" id="draft_id" value="">
            
            <input 
                type="text" 
                id="title" 
                name="title" 
                class="w-full text-4xl font-bold mb-8 border-none outline-none" 
                placeholder="Title" 
                value="<?php echo htmlspecialchars($prefilledTitle); ?>"
                required
            >
            
            <div class="mb-8">
                <div id="editor-container" class="border rounded-lg"></div>
                <input type="hidden" name="content" id="content">
            </div>
            
            <div class="border-t border-gray-200 pt-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-gray-900">Story Settings</h3>
                    <button id="toggleSettingsBtn" type="button" class="text-gray-500 hover:text-gray-700">
                        <span id="hideSettingsText"><i class="fas fa-chevron-down mr-1"></i> Show settings</span>
                    </button>
                </div>
                
                <div id="settingsPanel" class="hidden">
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Tags (separated by commas)</label>
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
                        <input type="hidden" id="tags" name="tags" value="<?php echo htmlspecialchars($prefilledTags); ?>">
                        <p class="text-sm text-gray-500 mt-1">Help readers find your story by adding tags</p>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Featured Image</label>
                        <input 
                            type="file" 
                            id="featured_image" 
                            name="featured_image"
                            class="block w-full text-gray-700 py-2" 
                            accept="image/*"
                        >
                        <p class="text-sm text-gray-500 mt-1">Recommended image size: 1200x628 pixels</p>
                        
                        <div id="imagePreviewContainer" class="mt-3 hidden">
                            <img id="imagePreview" class="h-32 object-cover rounded" />
                            <button id="removeImageBtn" type="button" class="text-red-600 text-sm mt-1 hover:text-red-800">
                                <i class="fas fa-times-circle"></i> Remove image
                            </button>
                        </div>
                    </div>
                    
                    <!-- Remove categories section -->
                </div>
            </div>
            
            <!-- Hidden input for AJAX requests -->
            <input type="hidden" name="ajax_request" id="ajax_request" value="0">
            <input type="hidden" name="auto_save" id="auto_save" value="0">
            <input type="hidden" name="status" id="post_status" value="draft">
        </form>
    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize variables
    let editor;
    let autoSaveTimer;
    let lastSavedAt = Date.now();
    let draftId = null;
    let isSubmitting = false;
    
    // DOM Elements
    const form = document.getElementById('createPostForm');
    const titleInput = document.getElementById('title');
    const contentInput = document.getElementById('content');
    const draftIdInput = document.getElementById('draft_id');
    const statusInput = document.getElementById('post_status');
    const ajaxRequestInput = document.getElementById('ajax_request');
    const autoSaveInput = document.getElementById('auto_save');
    const errorMessages = document.getElementById('errorMessages');
    const errorList = document.getElementById('errorList');
    const successMessage = document.getElementById('successMessage');
    const successText = document.getElementById('successText');
    const autoSaveStatus = document.getElementById('autoSaveStatus');
    const autoSaveIcon = document.getElementById('autoSaveIcon');
    const autoSaveText = document.getElementById('autoSaveText');
    const saveDraftBtn = document.getElementById('saveDraftBtn');
    const publishBtn = document.getElementById('publishBtn');
    const toggleSettingsBtn = document.getElementById('toggleSettingsBtn');
    const hideSettingsText = document.getElementById('hideSettingsText');
    const settingsPanel = document.getElementById('settingsPanel');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const removeImageBtn = document.getElementById('removeImageBtn');
    const featuredImageInput = document.getElementById('featured_image');
    
    // Initialize Quill editor
    initializeEditor();
    
    // Add event listeners
    if (titleInput) titleInput.addEventListener('input', validateAndScheduleAutoSave);
    if (saveDraftBtn) saveDraftBtn.addEventListener('click', saveDraft);
    if (publishBtn) publishBtn.addEventListener('click', publishPost);
    if (toggleSettingsBtn) toggleSettingsBtn.addEventListener('click', toggleSettings);
    if (featuredImageInput) featuredImageInput.addEventListener('change', handleImageUpload);
    if (removeImageBtn) removeImageBtn.addEventListener('click', removeImage);
    
    // Set up auto-save warning on page leave
    window.addEventListener('beforeunload', function(e) {
        if ((Date.now() - lastSavedAt) > 20000 && isFormValid()) { // 20 seconds
            e.preventDefault();
            e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
            return e.returnValue;
        }
    });
    
    // Initialize editor
    function initializeEditor() {
        if (window.Quill) {
            setupQuillEditor();
        } else {
            // Load Quill dynamically if not available
            loadQuillResources();
        }
    }
    
    function setupQuillEditor() {
        editor = new Quill('#editor-container', {
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
            placeholder: 'Write your story here...'
        });
        
        // Store editor in window object for global access
        window.editor = editor;
        
        // Set initial content if available
        const prefilledContent = <?php echo json_encode($prefilledContent); ?>;
        if (prefilledContent) {
            try {
                editor.clipboard.dangerouslyPasteHTML(prefilledContent);
                // Update the hidden input with content
                if (contentInput) contentInput.value = editor.root.innerHTML;
            } catch (err) {
                console.error('Error prefilling content:', err);
                // Fallback: try to set as text if HTML fails
                editor.setText(prefilledContent);
            }
        }
        
        // Update content variable when editor changes
        editor.on('text-change', function() {
            if (contentInput) contentInput.value = editor.root.innerHTML;
            validateAndScheduleAutoSave();
        });
    }
    
    function loadQuillResources() {
        // Load CSS
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://cdn.quilljs.com/1.3.6/quill.snow.css';
        document.head.appendChild(link);
        
        // Load JS
        const script = document.createElement('script');
        script.src = 'https://cdn.quilljs.com/1.3.6/quill.min.js';
        script.onload = setupQuillEditor;
        document.head.appendChild(script);
    }
    
    // Form validation
    function validateForm() {
        const errors = [];
        
        if (!titleInput || !titleInput.value.trim()) {
            errors.push('Title is required');
        }
        
        if (!editor || !editor.root.innerHTML.trim() || editor.root.innerHTML === '<p><br></p>') {
            errors.push('Content is required');
        }
        
        if (errors.length > 0) {
            displayErrors(errors);
            return false;
        }
        
        hideErrors();
        return true;
    }
    
    function isFormValid() {
        return titleInput && titleInput.value.trim() !== '' && 
               editor && 
               editor.root.innerHTML.trim() !== '' && 
               editor.root.innerHTML !== '<p><br></p>';
    }
    
    // Save functionality
    function validateAndScheduleAutoSave() {
        clearTimeout(autoSaveTimer);
        
        if (isFormValid()) {
            // Schedule auto-save
            autoSaveTimer = setTimeout(function() {
                autoSaveDraft();
            }, 5000); // 5 seconds after last change
        }
    }
    
    async function autoSaveDraft() {
        if (isSubmitting || !isFormValid() || !contentInput) return;
        
        updateAutoSaveStatus('saving');
        contentInput.value = editor.root.innerHTML;
        
        try {
            const formData = new FormData(form);
            formData.set('ajax_request', '1');
            formData.set('auto_save', '1');
            formData.set('status', 'draft');
            
            if (draftId) {
                formData.set('draft_id', draftId);
            }
            
            const response = await fetch(window.location.href, {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                updateAutoSaveStatus('saved');
                lastSavedAt = Date.now();
                
                // Store draft ID for future auto-saves
                if (result.post_id) {
                    draftId = result.post_id;
                    draftIdInput.value = draftId;
                }
                
                // Clear auto-save status after a few seconds
                setTimeout(() => {
                    hideAutoSaveStatus();
                }, 3000);
            } else {
                console.warn('Auto-save failed:', result.message || 'Unknown error');
                hideAutoSaveStatus();
            }
        } catch (err) {
            console.error('Error during auto-save:', err);
            hideAutoSaveStatus();
        }
    }
    
    async function saveDraft() {
        if (!validateForm() || isSubmitting) return;
        
        isSubmitting = true;
        saveDraftBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Saving...';
        await savePost('draft');
        saveDraftBtn.innerHTML = 'Save draft';
        isSubmitting = false;
    }
    
    async function publishPost() {
        if (!validateForm() || isSubmitting) return;
        
        isSubmitting = true;
        publishBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Publishing...';
        await savePost('published');
        publishBtn.innerHTML = 'Publish';
        isSubmitting = false;
    }
    
    async function savePost(status) {
        if (!contentInput || !editor) return;
        
        contentInput.value = editor.root.innerHTML;
        updateHiddenTagsInput(); // Ensure tags are updated
        
        try {
            const formData = new FormData(form);
            formData.set('ajax_request', '1');
            formData.set('status', status);
            
            if (draftId) {
                formData.set('draft_id', draftId);
            }
            
            const response = await fetch(window.location.href, {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                displaySuccess(result.message);
                lastSavedAt = Date.now();
                
                // Store post ID
                if (result.post_id) {
                    draftId = result.post_id;
                    if (draftIdInput) draftIdInput.value = draftId;
                }
                
                // Redirect to dashboard after successful post creation
                setTimeout(() => {
                    window.location.href = 'dashboard.php';
                }, 1500);
            } else {
                if (result.errors && Array.isArray(result.errors)) {
                    displayErrors(result.errors);
                } else {
                    displayErrors([result.message || 'An unknown error occurred']);
                }
            }
        } catch (err) {
            console.error('Error details:', err);
            displayErrors(['An error occurred while saving the post. Please try again.']);
        }
    }
    
    // UI Helper functions
    function toggleSettings() {
        if (!settingsPanel) return;
        
        if (settingsPanel.classList.contains('hidden')) {
            settingsPanel.classList.remove('hidden');
            if (hideSettingsText) hideSettingsText.innerHTML = '<i class="fas fa-chevron-up mr-1"></i> Hide settings';
        } else {
            settingsPanel.classList.add('hidden');
            if (hideSettingsText) hideSettingsText.innerHTML = '<i class="fas fa-chevron-down mr-1"></i> Show settings';
        }
    }
    
    function handleImageUpload(event) {
        const file = event.target.files[0];
        if (!file) return;
        
        // Validate file type
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!allowedTypes.includes(file.type)) {
            displayErrors(['Please select an image file (JPEG, PNG, or GIF)']);
            return;
        }
        
        // Validate file size (max 5MB)
        const maxSize = 5 * 1024 * 1024; // 5MB in bytes
        if (file.size > maxSize) {
            displayErrors(['Image file size should be less than 5MB']);
            return;
        }
        
        // Create image preview
        const reader = new FileReader();
        reader.onload = function(e) {
            if (imagePreview && imagePreviewContainer) {
                imagePreview.src = e.target.result;
                imagePreviewContainer.classList.remove('hidden');
            }
        };
        reader.readAsDataURL(file);
    }
    
    function removeImage() {
        if (featuredImageInput) featuredImageInput.value = '';
        if (imagePreviewContainer) imagePreviewContainer.classList.add('hidden');
        if (imagePreview) imagePreview.src = '';
    }
    
    function displayErrors(errors) {
        if (!errorList || !errorMessages) return;
        
        errorList.innerHTML = '';
        errors.forEach(error => {
            const p = document.createElement('p');
            p.textContent = error;
            errorList.appendChild(p);
        });
        errorMessages.classList.remove('hidden');
        if (successMessage) successMessage.classList.add('hidden');
    }
    
    function hideErrors() {
        if (errorMessages) errorMessages.classList.add('hidden');
    }
    
    function displaySuccess(message) {
        if (!successText || !successMessage) return;
        
        successText.textContent = message;
        successMessage.classList.remove('hidden');
        if (errorMessages) errorMessages.classList.add('hidden');
    }
    
    function updateAutoSaveStatus(status) {
        if (!autoSaveStatus || !autoSaveIcon || !autoSaveText) return;
        
        autoSaveStatus.classList.remove('hidden');
        
        if (status === 'saving') {
            autoSaveIcon.className = 'fas fa-spinner fa-spin';
            autoSaveText.textContent = ' Saving...';
        } else if (status === 'saved') {
            autoSaveIcon.className = 'fas fa-save text-green-500';
            autoSaveText.textContent = ' Draft saved';
        }
    }
    
    function hideAutoSaveStatus() {
        if (autoSaveStatus) autoSaveStatus.classList.add('hidden');
    }
    
    // Tag management
    const tagInput = document.getElementById('tagInput');
    const tagContainer = document.getElementById('tagContainer');
    const tagsHiddenInput = document.getElementById('tags');
    const commonTags = ['technology', 'programming', 'web development', 'design', 'marketing', 
                        'business', 'productivity', 'science', 'health', 'finance', 
                        'education', 'travel', 'food', 'lifestyle', 'sports'];
    
    // Make addTag available globally
    window.addTag = addTag;
    
    // Create tag suggestion dropdown
    if (tagInput) {
        const suggestionsContainer = document.createElement('div');
        suggestionsContainer.className = 'tag-suggestions hidden absolute z-10 bg-white border rounded shadow-md w-full max-h-40 overflow-y-auto mt-1';
        tagInput.parentNode.style.position = 'relative';
        tagInput.parentNode.appendChild(suggestionsContainer);
        
        // Event listeners for tag input
        tagInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ',') {
                e.preventDefault();
                const value = tagInput.value.trim();
                if (value) {
                    addTag(value);
                    tagInput.value = '';
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
        
        function showSuggestions(inputValue) {
            suggestionsContainer.innerHTML = '';
            hideSuggestions();
            
            if (!inputValue) return;
            
            const matchingTags = commonTags.filter(tag => 
                tag.toLowerCase().includes(inputValue.toLowerCase()) &&
                !Array.from(document.querySelectorAll('.tag-item')).map(t => t.dataset.value).includes(tag)
            );
            
            if (matchingTags.length === 0) return;
            
            matchingTags.forEach(tag => {
                const item = document.createElement('div');
                item.className = 'suggestion-item p-2 hover:bg-gray-100 cursor-pointer text-sm';
                item.textContent = tag;
                item.onclick = function() {
                    addTag(tag);
                    tagInput.value = '';
                    hideSuggestions();
                    tagInput.focus();
                };
                suggestionsContainer.appendChild(item);
            });
            
            suggestionsContainer.classList.remove('hidden');
        }
        
        function hideSuggestions() {
            suggestionsContainer.classList.add('hidden');
        }
    }
    
    function addTag(tagText) {
        if (!tagText || !tagContainer) return;
        
        // Handle comma-separated tags
        if (tagText.includes(',')) {
            const tags = tagText.split(',');
            tags.forEach(tag => {
                if (tag.trim()) addTag(tag.trim());
            });
            return;
        }
        
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
        removeBtn.innerHTML = '×'; // Use the actual × character instead of &times;
        removeBtn.onclick = function() {
            tagContainer.removeChild(tagElement);
            updateHiddenTagsInput();
        };
        
        tagElement.appendChild(tagContent);
        tagElement.appendChild(removeBtn);
        tagContainer.appendChild(tagElement);
        
        updateHiddenTagsInput();
    }
    
    function updateHiddenTagsInput() {
        if (!tagsHiddenInput) return;
        
        const tags = Array.from(document.querySelectorAll('.tag-item')).map(tag => tag.dataset.value);
        tagsHiddenInput.value = tags.join(',');
    }
    
    // Initialize existing tags if present
    if (tagsHiddenInput && tagsHiddenInput.value) {
        addTag(tagsHiddenInput.value);
    }
    
    // Pre-populate tags from URL if available
    const prefilledTags = <?php echo json_encode($prefilledTags); ?>;
    if (prefilledTags) {
        addTag(prefilledTags);
    }
    
    // If we received content from AI Writer, show settings panel
    const fromAiWriter = <?php echo $aiWriterData['from_ai_writer'] ? 'true' : 'false'; ?>;
    if (fromAiWriter && settingsPanel) {
        // Show settings panel after a short delay to ensure everything is loaded
        setTimeout(function() {
            settingsPanel.classList.remove('hidden');
            if (hideSettingsText) hideSettingsText.innerHTML = '<i class="fas fa-chevron-up mr-1"></i> Hide settings';
        }, 300);
    }
});
</script>

<?php require_once 'includes/footer.php'; ?>