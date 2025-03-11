<?php
require_once 'includes/init.php';

// Get current user if logged in
$currentUser = $user->getCurrentUser();

// Set page title
$pageTitle = "Access Denied";

// Set HTTP status code to 403
http_response_code(403);

// SEO settings for 403 page
$seo->setTitle("Access Denied - 403")
    ->setDescription("You don't have permission to access this resource.")
    ->addMetaTag('robots', 'noindex, follow');

// Include header
require_once 'includes/header.php';
?>
        
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6 text-center">
        <div class="mb-6">
            <h1 class="text-4xl font-bold text-red-600 mb-2">403</h1>
            <h2 class="text-2xl font-bold text-gray-800">Access Denied</h2>
        </div>
        
        <div class="max-w-md mx-auto mb-8">
            <p class="text-gray-600 mb-4">You don't have permission to access this resource.</p>
            
            <div class="flex justify-center">
                <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            
            <div class="mt-8 space-y-4">
                <?php if (!$user->isLoggedIn()): ?>
                    <p class="text-gray-700">Please sign in to access this page.</p>
                    <div class="flex justify-center space-x-4">
                        <a href="login.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded transition-all">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </a>
                        <a href="register.php" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded transition-all">
                            <i class="fas fa-user-plus mr-2"></i> Register
                        </a>
                    </div>
                <?php endif; ?>
                
                <div>
                    <a href="index.php" class="inline-block mt-2 text-indigo-600 hover:text-indigo-800">
                        <i class="fas fa-home mr-2"></i> Return to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
