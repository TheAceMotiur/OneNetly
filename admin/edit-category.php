<?php
require_once 'admin_header.php';

// Redirect to categories page with a message
$_SESSION['message'] = 'The Categories feature has been removed from OneNetly.';
$_SESSION['message_type'] = 'error';

header('Location: categories.php');
exit;
?>
