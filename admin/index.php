<?php
require_once 'admin_header.php';

// Get count of users
$userCount = count($user->getAllUsers());

// Get count of admin users
$adminCount = count($user->getAllAdmins());

// Get count of blog posts
$blogCount = $blog->getAllBlogs(1, 1)['pagination']['total'];

// Check if comments feature is available
$commentsAvailable = $comment->isAvailable();

// Get count of pending comments
$pendingCommentsCount = $commentsAvailable ? count($comment->getPendingComments()) : 0;

// Get recent users
$recentUsers = $user->getRecentUsers(5);
?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold text-gray-700">Total Users</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2"><?php echo $userCount; ?></p>
        <p class="text-gray-500 text-sm mt-2">Registered accounts</p>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold text-gray-700">Admin Users</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2"><?php echo $adminCount; ?></p>
        <p class="text-gray-500 text-sm mt-2">With admin privileges</p>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold text-gray-700">Blog Posts</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2"><?php echo $blogCount; ?></p>
        <p class="text-gray-500 text-sm mt-2">Published and drafts</p>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold text-gray-700">Pending Comments</h2>
        <?php if ($commentsAvailable): ?>
            <p class="text-3xl font-bold text-<?php echo $pendingCommentsCount > 0 ? 'yellow' : 'blue'; ?>-600 mt-2"><?php echo $pendingCommentsCount; ?></p>
            <p class="text-gray-500 text-sm mt-2">Awaiting moderation</p>
            <?php if ($pendingCommentsCount > 0): ?>
                <a href="comments.php" class="mt-2 inline-block text-sm text-blue-600 hover:underline">Moderate comments</a>
            <?php endif; ?>
        <?php else: ?>
            <p class="text-3xl font-bold text-gray-400 mt-2">-</p>
            <p class="text-gray-500 text-sm mt-2">Comments feature not active</p>
            <a href="../migrate.php" class="mt-2 inline-block text-sm text-blue-600 hover:underline">Run migration</a>
        <?php endif; ?>
    </div>
</div>

<!-- Recent Users -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-4 md:p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-700">Recent Users</h2>
            <a href="users.php" class="text-blue-600 hover:text-blue-800 text-sm">View All</a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-3 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                    <th scope="col" class="px-3 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Email</th>
                    <th scope="col" class="px-3 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th scope="col" class="px-3 py-2 md:px-6 md:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Created</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($recentUsers as $user): ?>
                <tr>
                    <td class="px-3 py-2 md:px-6 md:py-4 whitespace-nowrap text-sm">
                        <div>
                            <div class="font-medium text-gray-900"><?php echo htmlspecialchars($user['username']); ?></div>
                            <div class="text-gray-500 md:hidden"><?php echo htmlspecialchars($user['email']); ?></div>
                        </div>
                    </td>
                    <td class="px-3 py-2 md:px-6 md:py-4 whitespace-nowrap text-sm text-gray-500 hidden md:table-cell"><?php echo htmlspecialchars($user['email']); ?></td>
                    <td class="px-3 py-2 md:px-6 md:py-4 whitespace-nowrap text-sm">
                        <?php if ($user['is_admin']): ?>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Admin</span>
                        <?php else: ?>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">User</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-3 py-2 md:px-6 md:py-4 whitespace-nowrap text-sm text-gray-500 hidden md:table-cell"><?php echo date('M j, Y', strtotime($user['created_at'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
// Include admin footer
require_once 'admin_footer.php';
?>
