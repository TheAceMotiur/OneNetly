<?php
require_once 'includes/init.php';

// If user is not logged in, redirect to login page
if (!$user->isLoggedIn()) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        // AJAX request
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Please login to follow users']);
        exit;
    } else {
        // Regular request
        redirect('login.php', 'Please login to follow users', 'error');
    }
}

// Get current user
$currentUser = $user->getCurrentUser();

// Get the action and user ID
$action = $_POST['action'] ?? ($_GET['action'] ?? ''); 
$followedId = isset($_POST['user_id']) ? (int)$_POST['user_id'] : (isset($_GET['user_id']) ? (int)$_GET['user_id'] : 0);
$referrer = $_POST['referrer'] ?? $_SERVER['HTTP_REFERER'] ?? 'index.php';

// Check if user ID is valid
if ($followedId <= 0) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        // AJAX request
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Invalid user ID']);
        exit;
    } else {
        // Regular request
        redirect($referrer, 'Invalid user ID', 'error');
    }
}

// Process follow/unfollow action
$result = ['success' => false, 'message' => 'Unknown action'];

switch ($action) {
    case 'follow':
        $result = $user->followUser($currentUser['id'], $followedId);
        break;
    case 'unfollow':
        $result = $user->unfollowUser($currentUser['id'], $followedId);
        break;
    default:
        $result = ['success' => false, 'message' => 'Invalid action'];
}

// Handle response based on request type
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    // AJAX request
    header('Content-Type: application/json');
    echo json_encode([
        'success' => $result['success'], 
        'message' => $result['message'],
        'isFollowing' => $action === 'follow' && $result['success'] ? true : 
                         ($action === 'unfollow' && $result['success'] ? false : 
                         $user->isFollowing($currentUser['id'], $followedId)),
        'followerCount' => $user->countFollowers($followedId)
    ]);
    exit;
} else {
    // Regular request
    $message = $result['success'] ? $result['message'] : $result['message'];
    $messageType = $result['success'] ? 'success' : 'error';
    redirect($referrer, $message, $messageType);
}
