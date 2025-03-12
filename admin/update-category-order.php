<?php
require_once 'admin_header.php';

// Check if request has necessary parameters
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category_id'], $_POST['direction'])) {
    $categoryId = (int)$_POST['category_id'];
    $direction = $_POST['direction'];
    
    if ($direction !== 'up' && $direction !== 'down') {
        $_SESSION['message'] = 'Invalid direction specified';
        $_SESSION['message_type'] = 'error';
    } else {
        // Update category order
        $result = $category->updateCategoryOrder($categoryId, $direction);
        
        if ($result['success']) {
            $_SESSION['message'] = 'Category order updated successfully';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to update category order: ' . $result['message'];
            $_SESSION['message_type'] = 'error';
        }
    }
}

// Redirect back to categories page
header('Location: categories.php');
exit;
?>
