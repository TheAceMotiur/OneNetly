<?php
require_once 'includes/init.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Set page title
$pageTitle = "Server Error";

// Set HTTP status code to 500
http_response_code(500);

// SEO settings for 500 page
$seo->setTitle("Server Error - 500")
    ->setDescription("We're experiencing some technical difficulties.")
    ->addMetaTag('robots', 'noindex, follow');

// Include header
require_once 'includes/header.php';
?>
        
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6 text-center">
        <div class="mb-6">
            <h1 class="text-4xl font-bold text-red-600 mb-2">500</h1>
            <h2 class="text-2xl font-bold text-gray-800">Server Error</h2>
        </div>
        
        <div class="max-w-md mx-auto mb-8">
            <p class="text-gray-600 mb-4">We're experiencing some technical difficulties. Please try again later.</p>
            
            <div class="flex justify-center">
                <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            
            <div class="mt-8">
                <a href="index.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition-all">
                    <i class="fas fa-home mr-2"></i> Return to Homepage
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
