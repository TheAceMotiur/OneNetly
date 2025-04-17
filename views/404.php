<?php
$pageTitle = "404 - Page Not Found";
require_once 'layout/header.php';
?>

<div class="flex items-center justify-center py-16">
    <div class="text-center max-w-lg">
        <h1 class="text-6xl font-bold text-gray-900 mb-4">404</h1>
        <h2 class="text-3xl font-semibold mb-6">Page Not Found</h2>
        <p class="text-gray-600 mb-8">
            Sorry, we couldn't find the page you're looking for. It might have been removed, 
            had its name changed, or is temporarily unavailable.
        </p>
        <a href="/" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition-colors">
            Go Back Home
        </a>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>
