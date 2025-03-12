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
        
        // Get the comment to find its post_id
        $stmt = $pdo->prepare("SELECT post_id FROM comments WHERE id = :id");
        $stmt->bindParam(':id', $commentId, PDO::PARAM_INT);
        $stmt->execute();
        $commentData = $stmt->fetch();
        
        if ($commentData) {
            // Find the highest display_order for this post
            $stmt = $pdo->prepare("SELECT MAX(display_order) as max_order FROM comments WHERE post_id = :post_id");
            $stmt->bindParam(':post_id', $commentData['post_id'], PDO::PARAM_INT);
            $stmt->execute();
            $orderData = $stmt->fetch();
            
            $newOrder = ($orderData && $orderData['max_order']) ? $orderData['max_order'] + 1 : 1;
            
            // Update both status and display_order
            $stmt = $pdo->prepare("UPDATE comments SET status = 'approved', display_order = :order WHERE id = :id");
            $stmt->bindParam(':id', $commentId, PDO::PARAM_INT);
            $stmt->bindParam(':order', $newOrder, PDO::PARAM_INT);
            $stmt->execute();
            
            $_SESSION['message'] = 'Comment approved successfully';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Failed to approve comment: Comment not found';
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
        <p class="text-sm text-gray-600">Review and moderate comments before they appear on the blog. Bad words are automatically filtered and links have nofollow attributes added.</p>
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
                            View Post
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

<!-- Approved Comments -->
<div class="bg-white rounded-lg shadow mb-6">
    <div class="p-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Approved Comments</h2>
        <p class="text-sm text-gray-600">Manage approved comments and adjust their display order.</p>
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
                <?php 
                // Get approved comments
                $approvedComments = $comment->getApprovedComments();
                if (empty($approvedComments)): 
                ?>
                <tr>
                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                        No approved comments found.
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($approvedComments as $approvedComment): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($approvedComment['name']); ?></div>
                        <div class="text-sm text-gray-500"><?php echo htmlspecialchars($approvedComment['email']); ?></div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900"><?php echo nl2br(htmlspecialchars($approvedComment['content'])); ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <a href="../<?php echo htmlspecialchars($approvedComment['post_slug']); ?>" class="text-blue-600 hover:text-blue-900" target="_blank">
                            <?php echo htmlspecialchars($approvedComment['post_title']); ?>
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo date('M j, Y g:i a', strtotime($approvedComment['created_at'])); ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="flex space-x-2">
                            <!-- Mark as Spam -->
                            <form method="POST" class="inline-block">
                                <input type="hidden" name="comment_id" value="<?php echo $approvedComment['id']; ?>">
                                <button type="submit" name="mark_spam" class="text-yellow-600 hover:text-yellow-900">
                                    Spam
                                </button>
                            </form>
                            
                            <!-- Delete Form -->
                            <form method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                <input type="hidden" name="comment_id" value="<?php echo $approvedComment['id']; ?>">
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
