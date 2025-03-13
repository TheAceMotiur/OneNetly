<?php
require_once 'includes/init.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    redirect('login.php', 'Please login to use the AI writing assistant', 'error');
}

// Get current user
$currentUser = $user->getCurrentUser();

// Set page title and SEO
$pageTitle = "AI Writing Assistant";
$canonicalUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/ai-writer.php";
$seo->setTitle('AI Writing Assistant')
    ->setDescription('Generate content for your blog posts using AI')
    ->setKeywords(['AI', 'writing', 'assistant', 'content generation'])
    ->setOgType('website')
    ->setCanonicalUrl($canonicalUrl);

// Include header
require_once 'includes/header.php';
?>

<div id="ai-writer-app" class="min-h-screen bg-gray-50">
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">AI Writing Assistant</h1>
        </div>
    </header>
    
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <?php echo displayMessage(); ?>
        
        <!-- AI Writer Form -->
        <div class="bg-white shadow rounded-lg overflow-hidden mb-6">
            <div class="p-6">
                <p class="mb-4 text-gray-600">
                    Let the AI help you create engaging content for your blog posts.
                </p>
                
                <!-- Content Type Selection -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">What would you like to generate?</label>
                    <div class="flex flex-wrap gap-2">
                        <button @click="contentType = 'both'" :class="[contentType === 'both' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700', 'px-4 py-2 rounded-md text-sm font-medium transition-colors']">
                            <i class="fas fa-file-alt mr-1"></i> Complete Post
                        </button>
                        <button @click="contentType = 'title'" :class="[contentType === 'title' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700', 'px-4 py-2 rounded-md text-sm font-medium transition-colors']">
                            <i class="fas fa-heading mr-1"></i> Title Only
                        </button>
                        <button @click="contentType = 'content'" :class="[contentType === 'content' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700', 'px-4 py-2 rounded-md text-sm font-medium transition-colors']">
                            <i class="fas fa-align-left mr-1"></i> Content Only
                        </button>
                    </div>
                </div>
                
                <!-- Prompt Input -->
                <div class="mb-4">
                    <label for="prompt" class="block text-sm font-medium text-gray-700 mb-2">Your Instructions</label>
                    <textarea id="prompt" v-model="prompt" rows="3" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="e.g. Write a blog post about sustainable living practices and how they can save money" :disabled="isGenerating"></textarea>
                    <p class="mt-1 text-sm text-gray-500">Be specific about what you want, including tone, length, and target audience.</p>
                </div>
                
                <!-- Tags Input -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tags (optional)</label>
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
                </div>

                <!-- Model Selection (simplified) -->
                <div class="mb-4">
                    <label for="model" class="block text-sm font-medium text-gray-700 mb-2">AI Model</label>
                    <select id="model" v-model="model" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="openai/gpt-3.5-turbo">GPT-3.5 Turbo (Recommended)</option>
                        <option value="anthropic/claude-instant-v1">Claude Instant</option>
                        <option value="mistralai/mistral-7b-instruct">Mistral 7B</option>
                    </select>
                </div>
                
                <!-- Generate Button -->
                <button 
                    @click="generateContent" 
                    :disabled="isGenerating" 
                    class="w-full py-3 px-4 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold rounded-lg shadow-md transition-all disabled:opacity-50">
                    <i class="fas fa-magic mr-2"></i>
                    <span v-if="isGenerating">Generating...</span>
                    <span v-else>Generate Content</span>
                </button>
            </div>
            
            <!-- Error Message -->
            <div v-if="error" class="border-t border-gray-200 p-6 bg-red-50">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h2 class="text-base font-medium text-red-800">Error</h2>
                </div>
                <p class="text-sm text-red-700">{{ error }}</p>
            </div>
        </div>
            
        <!-- Generated Content -->
        <div v-if="generatedTitle || generatedContent" class="bg-white shadow rounded-lg overflow-hidden mb-8">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Generated Content</h2>
                
                <!-- Title Section -->
                <div v-if="generatedTitle" class="mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-md font-medium text-gray-900">Title</h3>
                        <button @click="copyTitle" class="text-sm text-indigo-600 hover:text-indigo-800">
                            <i class="far fa-copy mr-1"></i> Copy
                        </button>
                    </div>
                    <div class="prose max-w-none border rounded-md p-3 bg-gray-50">
                        {{ generatedTitle }}
                    </div>
                </div>
                
                <!-- Content Section -->
                <div v-if="generatedContent" class="mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-md font-medium text-gray-900">Content</h3>
                        <button @click="copyContent" class="text-sm text-indigo-600 hover:text-indigo-800">
                            <i class="far fa-copy mr-1"></i> Copy
                        </button>
                    </div>
                    <div class="prose max-w-none border rounded-md p-3 bg-gray-50 overflow-auto" v-html="generatedContent">
                        <!-- Content will be shown here with HTML formatting -->
                    </div>
                </div>
                
                <!-- Create Post Button -->
                <div class="flex justify-end mt-4">
                    <button @click="createNewPost" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-edit mr-2"></i>
                        Continue in Editor
                    </button>
                </div>
            </div>
        </div>

        <!-- Tips Section (Simplified) -->
        <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4 mb-8">
            <h3 class="font-medium text-indigo-800 mb-2">Quick Tips:</h3>
            <ul class="pl-5 text-indigo-700 list-disc">
                <li>Be specific about tone, length and format</li>
                <li>Define your target audience</li>
                <li>Review and edit AI content before publishing</li>
                <li>Add relevant tags for better discoverability</li>
            </ul>
        </div>
    </main>
</div>

<script>
const { createApp, ref } = Vue;

createApp({
    setup() {
        // State
        const model = ref('openai/gpt-3.5-turbo');
        const prompt = ref('');
        const contentType = ref('both');
        const isGenerating = ref(false);
        const error = ref('');
        const generatedTitle = ref('');
        const generatedContent = ref('');
        const generatedTags = ref([]);
        
        // Methods
        const generateContent = async () => {
            if (!prompt.value || isGenerating.value) return;
            
            isGenerating.value = true;
            error.value = '';
            generatedTitle.value = '';
            generatedContent.value = '';
            generatedTags.value = [];
            
            try {
                const response = await axios.post('./api/generate-content.php', {
                    prompt: prompt.value,
                    model: model.value,
                    contentType: contentType.value,
                    generateTags: true
                });
                
                if (contentType.value === 'title') {
                    // Clean up title format when receiving the response
                    generatedTitle.value = response.data.result.replace(/^Title\s*:\s*/i, '');
                } else if (contentType.value === 'content') {
                    generatedContent.value = response.data.result;
                } else {
                    // Both title and content - ensure title has no prefix
                    generatedTitle.value = response.data.title.replace(/^Title\s*:\s*/i, '');
                    generatedContent.value = response.data.content;
                }
                
                // Add generated tags to the UI
                if (response.data.tags && response.data.tags.length > 0) {
                    // Clear existing tags first
                    document.querySelectorAll('.tag-item').forEach(tag => tag.remove());
                    // Add each generated tag
                    response.data.tags.forEach(tag => {
                        if (window.addTag) {
                            window.addTag(tag);
                        }
                    });
                }
            } catch (err) {
                error.value = err.response?.data?.error || 'An error occurred while generating content';
                console.error(err);
            } finally {
                isGenerating.value = false;
            }
        };
        
        const copyTitle = () => {
            navigator.clipboard.writeText(generatedTitle.value)
                .then(() => {
                    showCopyNotification('Title copied to clipboard!');
                })
                .catch(err => {
                    console.error('Could not copy text: ', err);
                });
        };
        
        const copyContent = () => {
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = generatedContent.value;
            const contentText = tempDiv.textContent || tempDiv.innerText || '';
            
            navigator.clipboard.writeText(contentText)
                .then(() => {
                    showCopyNotification('Content copied to clipboard!');
                })
                .catch(err => {
                    console.error('Could not copy text: ', err);
                });
        };
        
        const showCopyNotification = (message) => {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-4 right-4 bg-gray-800 text-white px-4 py-2 rounded-lg shadow-lg z-50 animate-fade-in';
            notification.textContent = message;
            document.body.appendChild(notification);
            
            // Remove after 2 seconds
            setTimeout(() => {
                notification.classList.add('animate-fade-out');
                setTimeout(() => notification.remove(), 500);
            }, 2000);
        };
        
        const createNewPost = () => {
            // Get all the generated content - ensure any "Title:" prefix is removed
            const title = encodeURIComponent(generatedTitle.value.replace(/^Title\s*:\s*/i, '') || '');
            const content = encodeURIComponent(generatedContent.value || '');
            
            // Collect all tags from tag elements
            const tagElements = document.querySelectorAll('.tag-item');
            const tags = tagElements.length > 0 ? 
                Array.from(tagElements).map(tag => tag.dataset.value).join(',') : '';
            
            // Get the meta description from the first paragraph of content (max 160 chars)
            let metaDescription = '';
            if (generatedContent.value) {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = generatedContent.value;
                const firstParagraph = tempDiv.querySelector('p');
                if (firstParagraph) {
                    metaDescription = 
                        (firstParagraph.textContent || '').substring(0, 160).trim();
                }
            }
            
            // Redirect to create-post.php with all the parameters properly encoded
            window.location.href = `create-post.php?title=${title}&content=${content}&tags=${encodeURIComponent(tags)}&meta_description=${encodeURIComponent(metaDescription)}&source=ai_writer`;
        };
        
        return {
            model,
            prompt,
            contentType,
            isGenerating,
            error,
            generatedTitle,
            generatedContent,
            generateContent,
            copyTitle,
            copyContent,
            createNewPost
        };
    }
}).mount('#ai-writer-app');
</script>

<!-- Simplified Tag Management Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tagInput = document.getElementById('tagInput');
    const tagContainer = document.getElementById('tagContainer');
    const commonTags = ['technology', 'business', 'health', 'finance', 'education', 
                        'travel', 'lifestyle', 'sports', 'science', 'food'];
    
    // Create tag suggestion dropdown
    const suggestionsContainer = document.createElement('div');
    suggestionsContainer.className = 'tag-suggestions hidden absolute z-10 bg-white border rounded shadow-md w-full max-h-40 overflow-y-auto mt-1';
    tagInput.parentNode.style.position = 'relative';
    tagInput.parentNode.appendChild(suggestionsContainer);
    
    // Making addTag globally available for Vue component
    window.addTag = function(tagText) {
        if (!tagText) return;
        
        // Handle comma-separated tags
        const tags = tagText.split(',');
        tags.forEach(tag => {
            const trimmedTag = tag.trim();
            if (!trimmedTag) return;
            
            // Check for duplicates
            const existingTags = Array.from(document.querySelectorAll('.tag-item')).map(tag => tag.dataset.value);
            if (existingTags.includes(trimmedTag)) return;
            
            const tagElement = document.createElement('span');
            tagElement.className = 'tag-item inline-flex items-center bg-indigo-100 text-indigo-800 rounded-full px-3 py-1 text-sm mr-2 mb-1';
            tagElement.dataset.value = trimmedTag;
            
            const tagContent = document.createElement('span');
            tagContent.textContent = trimmedTag;
            
            const removeBtn = document.createElement('button');
            removeBtn.className = 'ml-1 text-indigo-600 hover:text-indigo-900 focus:outline-none';
            removeBtn.innerHTML = '&times;';
            removeBtn.onclick = function() {
                tagContainer.removeChild(tagElement);
            };
            
            tagElement.appendChild(tagContent);
            tagElement.appendChild(removeBtn);
            tagContainer.appendChild(tagElement);
        });
        
        // Clear input
        tagInput.value = '';
        hideSuggestions();
    };
    
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
});
</script>

<style>
.animate-fade-in {
    animation: fadeIn 0.3s ease-in-out;
}
.animate-fade-out {
    animation: fadeOut 0.5s ease-in-out;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
}

/* Add proper styling for rich text content in the preview */
.prose {
    max-width: 100%;
    color: #1f2937;
    line-height: 1.5;
}
.prose h1 {
    font-size: 2em;
    margin-top: 1em;
    margin-bottom: 0.5em;
    font-weight: 700;
}
.prose h2 {
    font-size: 1.5em;
    margin-top: 1em;
    margin-bottom: 0.5em;
    font-weight: 700;
}
.prose h3 {
    font-size: 1.25em;
    margin-top: 1em;
    margin-bottom: 0.5em;
    font-weight: 700;
}
.prose p {
    margin-top: 0.75em;
    margin-bottom: 0.75em;
}
.prose ul, .prose ol {
    margin-left: 2em;
    margin-top: 0.75em;
    margin-bottom: 0.75em;
}
.prose ul {
    list-style-type: disc;
}
.prose ol {
    list-style-type: decimal;
}
.prose li {
    margin-top: 0.25em;
    margin-bottom: 0.25em;
}
.prose strong {
    font-weight: 700;
}
.prose em {
    font-style: italic;
}
.prose blockquote {
    border-left: 4px solid #e5e7eb;
    padding-left: 1em;
    margin-left: 0;
    font-style: italic;
}
.prose code {
    font-family: monospace;
    background-color: #f3f4f6;
    padding: 0.2em 0.4em;
    border-radius: 0.25em;
}
</style>

<?php require_once 'includes/footer.php'; ?>
