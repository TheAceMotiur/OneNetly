<?php
/**
 * AI Writer Integration Helper
 * 
 * This file handles the integration between the AI writer and the create post page
 */

function getAiWriterContent() {
    $data = [
        'title' => '',
        'content' => '',
        'tags' => [],
        'meta_description' => '',
        'from_ai_writer' => false
    ];
    
    // Check if we're coming from the AI writer
    if (isset($_GET['source']) && $_GET['source'] === 'ai_writer') {
        $data['from_ai_writer'] = true;
        
        // Get title
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $data['title'] = urldecode($_GET['title']);
        }
        
        // Get content
        if (isset($_GET['content']) && !empty($_GET['content'])) {
            $data['content'] = urldecode($_GET['content']);
        }
        
        // Get meta description
        if (isset($_GET['meta_description']) && !empty($_GET['meta_description'])) {
            $data['meta_description'] = urldecode($_GET['meta_description']);
        }
        
        // Get tags
        if (isset($_GET['tags']) && !empty($_GET['tags'])) {
            $tagsString = urldecode($_GET['tags']);
            $data['tags'] = explode(',', $tagsString);
            // Clean the tags - remove any empty tags
            $data['tags'] = array_filter(array_map('trim', $data['tags']));
        }
    }
    
    return $data;
}

/**
 * Generate JavaScript to initialize the editor with AI-generated content
 */
function getAiContentInitScript($data) {
    if (!$data['from_ai_writer']) {
        return '';
    }
    
    $title = json_encode($data['title']);
    $content = json_encode($data['content']);
    $metaDescription = json_encode($data['meta_description']);
    $tags = json_encode(implode(',', $data['tags']));
    
    return <<<JAVASCRIPT
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set title from AI writer
    const titleField = document.getElementById('title');
    if (titleField) titleField.value = $title;
    
    // Set meta description if field exists
    const metaDescriptionField = document.getElementById('meta_description');
    if (metaDescriptionField) metaDescriptionField.value = $metaDescription;
    
    // Wait a bit for the editor to initialize
    setTimeout(function() {
        // Set content in editor with proper formatting
        if (typeof window.setEditorContent === 'function') {
            window.setEditorContent($content);
            console.log('Content loaded into editor from AI Writer');
        } else {
            // Fallback for classic editor
            console.log('Editor not available, using fallback');
            const contentField = document.getElementById('content');
            if (contentField) contentField.value = $content;
        }
        
        // Add tags from AI writer
        const tagsString = $tags;
        if (tagsString && typeof window.addTag === 'function') {
            window.addTag(tagsString);
        }
        
        // Show the settings panel to make tags visible
        const settingsPanel = document.getElementById('settingsPanel');
        const hideSettingsText = document.getElementById('hideSettingsText');
        if (settingsPanel && hideSettingsText) {
            settingsPanel.classList.remove('hidden');
            hideSettingsText.innerHTML = '<i class="fas fa-chevron-up mr-1"></i> Hide settings';
        }
        
        // Show notification
        showAiContentNotification();
    }, 1000); // Increased delay to ensure editor is fully loaded
    
    function showAiContentNotification() {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'bg-green-50 border-l-4 border-green-400 p-4 mb-4 rounded shadow-sm flex items-center';
        notification.innerHTML = `
            <div class="flex-shrink-0 mr-3">
                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-green-700">
                    <strong>AI content loaded.</strong> Review and edit as needed before publishing.
                </p>
            </div>
            <button class="ml-auto text-green-700 hover:text-green-900 focus:outline-none" onclick="this.parentElement.remove()">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 011.414 1.414L11.414 10l4.293 4.293a1 1 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 01-1.414-1.414L8.586 10 4.293 5.707a1 1 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        `;
        
        // Insert notification at the top of the main content
        const mainContent = document.querySelector('main');
        if (mainContent) {
            mainContent.insertBefore(notification, mainContent.firstChild);
            
            // Auto-remove notification after 8 seconds
            setTimeout(() => {
                notification.style.transition = 'opacity 0.5s ease-out';
                notification.style.opacity = '0';
                setTimeout(() => notification.remove(), 500);
            }, 8000);
        }
    }
});
</script>
JAVASCRIPT;
}
?>
