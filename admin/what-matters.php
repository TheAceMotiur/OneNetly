<?php
require_once 'admin_header.php';

// Only allow admins to access this page
if (!$user->isAdmin()) {
    redirect('../index.php', 'Access denied', 'error');
}

// Initialize message variables
$message = '';
$messageType = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add your form processing logic here
}

?>

<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-semibold">What Matters</h1>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <p>Manage your "What Matters" content here.</p>
        <!-- Add your content management form here -->
    </div>
</div>

<?php require_once 'admin_footer.php'; ?>
