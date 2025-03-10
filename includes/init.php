<?php
// Start session
session_start();

// Include configuration and database connection
require_once __DIR__ . '/../config.php';

// Include autoloader for composer packages
require_once __DIR__ . '/../vendor/autoload.php';

// Include user class
require_once __DIR__ . '/../classes/User.php';

// Include settings class
require_once __DIR__ . '/../classes/Settings.php';

// Initialize user object
$user = new User($pdo);

// Initialize settings object
$settings = new Settings($pdo);

// If user is logged in, initialize user settings
if (isset($_SESSION['user_id'])) {
    $userSettings = new Settings($pdo, $_SESSION['user_id']);
} else {
    // Create dummy userSettings object to avoid undefined variable errors
    $userSettings = new Settings($pdo);
}

// Include theme helper
require_once __DIR__ . '/theme_helper.php';

// Define site URL
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);

// Function to redirect with a message
function redirect($location, $message = '', $messageType = 'info') {
    if (!empty($message)) {
        $_SESSION['message'] = $message;
        $_SESSION['message_type'] = $messageType;
    }
    header('Location: ' . SITE_URL . '/' . $location);
    exit;
}

// Function to display messages
function displayMessage() {
    if (isset($_SESSION['message'])) {
        $messageType = $_SESSION['message_type'] ?? 'info';
        $message = $_SESSION['message'];
        
        // Clear the message from session
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
        
        // Map Bootstrap message types to Tailwind CSS classes
        $tailwindClasses = [
            'success' => 'bg-green-100 border-green-400 text-green-700',
            'info' => 'bg-blue-100 border-blue-400 text-blue-700',
            'warning' => 'bg-yellow-100 border-yellow-400 text-yellow-700',
            'error' => 'bg-red-100 border-red-400 text-red-700',
            'danger' => 'bg-red-100 border-red-400 text-red-700'
        ];
        
        $class = $tailwindClasses[$messageType] ?? $tailwindClasses['info'];
        
        return '<div class="' . $class . ' px-4 py-3 rounded mb-4 border">' . $message . '</div>';
    }
    
    return '';
}
