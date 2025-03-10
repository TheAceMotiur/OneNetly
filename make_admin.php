<?php
require_once 'includes/init.php';

// This is a utility script to make a user an admin
// It should be removed or secured in production

// Security measure - only run in localhost environment
if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1' && $_SERVER['REMOTE_ADDR'] !== '::1') {
    die('This script can only be run from localhost for security reasons.');
}

// Get username from URL parameter
$username = isset($_GET['username']) ? trim($_GET['username']) : '';

// If username is provided, make them an admin
if (!empty($username)) {
    // Find user by username
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $userData = $stmt->fetch();
    
    if ($userData) {
        // Make user an admin
        $stmt = $pdo->prepare("UPDATE users SET is_admin = 1 WHERE id = ?");
        $success = $stmt->execute([$userData['id']]);
        
        if ($success) {
            echo "<p>User '{$username}' has been made an admin successfully!</p>";
        } else {
            echo "<p>Failed to update admin status.</p>";
        }
    } else {
        echo "<p>User '{$username}' not found.</p>";
    }
}

// Get list of users for display
$stmt = $pdo->query("SELECT id, username, email, is_admin FROM users ORDER BY id");
$users = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Admin - OneNetly</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Make User Admin</h1>
        
        <div class="mb-8">
            <p class="mb-4 text-gray-600">Select a user to make them an admin:</p>
            
            <form method="GET" class="mb-6">
                <div class="flex">
                    <input type="text" name="username" placeholder="Enter username" 
                           class="flex-1 border rounded-l px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700">
                        Make Admin
                    </button>
                </div>
            </form>
        </div>
        
        <h2 class="text-xl font-semibold mb-4 text-gray-800">User List</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Admin</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $user['id']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <?php echo htmlspecialchars($user['username']); ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo htmlspecialchars($user['email']); ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php if ($user['is_admin']): ?>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Yes</span>
                            <?php else: ?>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">No</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="mt-6 text-center">
            <a href="index.php" class="text-blue-600 hover:underline">Back to Homepage</a>
        </div>
    </div>
</body>
</html>
