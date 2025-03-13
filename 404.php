<?php
require_once 'includes/init.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Set page title
$pageTitle = "Page Not Found";

// Set HTTP status code to 404
http_response_code(404);

// SEO settings for 404 page
$seo->setTitle("Page Not Found - 404 Error")
    ->setDescription("The page you were looking for could not be found.")
    ->addMetaTag('robots', 'noindex, follow');

// Include header
require_once 'includes/header.php';
?>
        
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6 text-center">
        <div class="mb-6">
            <h1 class="text-4xl font-bold text-red-600 mb-2">404</h1>
            <h2 class="text-2xl font-bold text-gray-800">Page Not Found</h2>
        </div>
        
        <div class="max-w-md mx-auto mb-8">
            <p class="text-gray-600 mb-4">The page you were looking for doesn't exist or has been moved.</p>
            
            <div class="flex justify-center">
                <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            
            <div class="mt-8">
                <a href="index.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition-all">
                    <i class="fas fa-home mr-2"></i> Return to Homepage
                </a>
            </div>
            
            <div class="mt-10 text-left">
                <h3 class="text-lg font-medium text-gray-800 mb-4">Here are some helpful links:</h3>
                <ul class="space-y-2 text-indigo-600">
                    <li><i class="fas fa-angle-right mr-2"></i><a href="index.php" class="hover:underline">Home Page</a></li>
                    <li><i class="fas fa-angle-right mr-2"></i><a href="search.php" class="hover:underline">Search</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
