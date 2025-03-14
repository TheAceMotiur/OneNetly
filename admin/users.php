<?php
require_once 'admin_header.php';

// Process user actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['toggle_admin'])) {
        $userId = (int)$_POST['user_id'];
        $isAdmin = (int)$_POST['is_admin'];
        
        if ($user->toggleAdminStatus($userId, $isAdmin)) {
            $message = $isAdmin ? 'Admin privileges granted successfully' : 'Admin privileges revoked successfully';
            $_SESSION['message'] = $message;
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to update admin status';
            $_SESSION['message_type'] = 'error';
        }
        
        // Redirect to prevent form resubmission
        header('Location: users.php');
        exit;
    }
    
    // Handle user deletion
    if (isset($_POST['delete_user'])) {
        $userId = (int)$_POST['user_id'];
        
        // Don't allow deleting yourself
        if ($userId == $currentUser['id']) {
            $_SESSION['message'] = 'You cannot delete your own account';
            $_SESSION['message_type'] = 'error';
        } else {
            if ($user->deleteUser($userId)) {
                $_SESSION['message'] = 'User deleted successfully';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Failed to delete user';
                $_SESSION['message_type'] = 'error';
            }
        }
        
        // Redirect to prevent form resubmission
        header('Location: users.php');
        exit;
    }
}

// Search functionality
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
$users = empty($searchTerm) ? $user->getAllUsers() : $user->searchUsers($searchTerm);

// Get current user ID for comparison
$currentUserId = $currentUser['id'];
?>

<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Manage Users</h1>
    
    <!-- Search Bar -->
    <div>
        <form action="" method="GET" class="flex">
            <input type="text" name="search" placeholder="Search users..." value="<?php echo htmlspecialchars($searchTerm); ?>" 
                   class="shadow appearance-none border rounded-l py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:shadow-outline">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Manage Users</h2>
        <p class="text-gray-500 mt-1">View and manage all registered users</p>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (empty($users)): ?>
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                        <?php echo empty($searchTerm) ? 'No users found.' : 'No users matching "' . htmlspecialchars($searchTerm) . '"'; ?>
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($users as $userItem): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $userItem['id']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo htmlspecialchars($userItem['username']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($userItem['email']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php if ($userItem['is_admin']): ?>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Admin</span>
                        <?php else: ?>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">User</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo date('M j, Y', strtotime($userItem['created_at'])); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php if ($userItem['id'] != $currentUserId): ?>
                            <!-- Toggle admin status form -->
                            <form method="POST" class="inline-block mr-2">
                                <input type="hidden" name="user_id" value="<?php echo $userItem['id']; ?>">
                                <input type="hidden" name="is_admin" value="<?php echo $userItem['is_admin'] ? 0 : 1; ?>">
                                <button type="submit" name="toggle_admin" class="text-blue-600 hover:text-blue-900">
                                    <?php echo $userItem['is_admin'] ? 'Remove Admin' : 'Make Admin'; ?>
                                </button>
                            </form>
                            
                            <!-- Delete user form -->
                            <form method="POST" class="inline-block" onsubmit="return confirmDelete('<?php echo htmlspecialchars($userItem['username']); ?>')">
                                <input type="hidden" name="user_id" value="<?php echo $userItem['id']; ?>">
                                <button type="submit" name="delete_user" class="text-red-600 hover:text-red-900">
                                    Delete
                                </button>
                            </form>
                        <?php else: ?>
                            <span class="text-gray-400">Current User</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- JavaScript for confirmation alert -->
<script>
    function confirmDelete(username) {
        return confirm('Are you sure you want to delete the user "' + username + '"? This action cannot be undone.');
    }
</script>

<?php
require_once 'admin_footer.php';
?>
