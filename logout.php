<?php
require_once 'includes/init.php';

// Log the user out
$result = $user->logout();

// Redirect to login page with message
redirect('login.php', 'Logged out successfully', 'info');
