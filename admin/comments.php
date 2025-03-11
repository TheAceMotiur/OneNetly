<?php
require_once 'admin_header.php';

// Check if comments feature is available
$commentsAvailable = $comment->isAvailable();

if (!$commentsAvailable) {
    $_SESSION['message'] = 'Comments feature is not available yet. Please run the database migration first.';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
    exit;
}

// Process comment actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['approve_comment'])) {
        $commentId = (int)$_POST['comment_id'];
        
        $result = $comment->updateStatus($commentId, 'approved');
        
        if ($result['success']) {
            $_SESSION['message'] = 'Comment approved successfully';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to approve comment: ' . $result['message'];
            $_SESSION['message_type'] = 'error';
        }
        
        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    
    if (isset($_POST['mark_spam'])) {
        $commentId = (int)$_POST['comment_id'];
        
        $result = $comment->updateStatus($commentId, 'spam');
        
        if ($result['success']) {
            $_SESSION['message'] = 'Comment marked as spam';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to mark comment as spam: ' . $result['message'];
            $_SESSION['message_type'] = 'error';
        }
        
        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    
    if (isset($_POST['delete_comment'])) {
        $commentId = (int)$_POST['comment_id'];
        
        $result = $comment->deleteComment($commentId);
        
        if ($result['success']) {
            $_SESSION['message'] = 'Comment deleted successfully';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to delete comment: ' . $result['message'];
            $_SESSION['message_type'] = 'error';
        }
        
        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Get pending comments
$pendingComments = $comment->getPendingComments();
?>

<!-- Admin Comments Management Page -->
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Manage Comments</h1>
</div>

<div class="bg-white rounded-lg shadow mb-6">
    <div class="p-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Comments Pending Approval</h2>
        <p class="text-sm text-gray-600">Review and moderate comments before they appear on the blog</p>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Comment</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Post</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (empty($pendingComments)): ?>
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                        No comments pending approval.
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($pendingComments as $pendingComment): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <?php echo htmlspecialchars($pendingComment['username']); ?>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                        <?php echo htmlspecialchars($pendingComment['content']); ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a href="../<?php echo htmlspecialchars($pendingComment['blog_slug']); ?>" class="text-blue-600 hover:text-blue-900" target="_blank">
                            <?php echo htmlspecialchars($pendingComment['blog_title']); ?>
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo date('M j, Y g:i a', strtotime($pendingComment['created_at'])); ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="flex space-x-2">
                            <!-- Approve Form -->
                            <form method="POST" class="inline-block">
                                <input type="hidden" name="comment_id" value="<?php echo $pendingComment['id']; ?>">
                                <button type="submit" name="approve_comment" class="text-green-600 hover:text-green-900">
                                    Approve
                                </button>
                            </form>
                            
                            <!-- Mark as Spam Form -->
                            <form method="POST" class="inline-block">
                                <input type="hidden" name="comment_id" value="<?php echo $pendingComment['id']; ?>">
                                <button type="submit" name="mark_spam" class="text-yellow-600 hover:text-yellow-900">
                                    Spam
                                </button>
                            </form>
                            
                            <!-- Delete Form -->
                            <form method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                <input type="hidden" name="comment_id" value="<?php echo $pendingComment['id']; ?>">
                                <button type="submit" name="delete_comment" class="text-red-600 hover:text-red-900">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require_once 'admin_footer.php';
?>
