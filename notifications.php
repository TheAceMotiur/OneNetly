<?php
require_once 'includes/init.php';
require_once 'includes/notification-handler.php';

if (!$user->isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$notifications = new NotificationHandler($pdo);
$currentUser = $user->getCurrentUser();

// Get notifications
$stmt = $pdo->prepare("
    SELECT * FROM notifications 
    WHERE user_id = ? 
    ORDER BY created_at DESC
");
$stmt->execute([$currentUser['id']]);
$userNotifications = $stmt->fetchAll();

require_once 'includes/header.php';
?>

<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Notifications</h1>
    
    <?php if (empty($userNotifications)): ?>
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-500">No notifications yet</p>
        </div>
    <?php else: ?>
        <div class="space-y-4">
            <?php foreach ($userNotifications as $notification): ?>
                <?php $data = json_decode($notification['data'], true); ?>
                <div class="bg-white rounded-lg shadow p-4 <?php echo $notification['is_read'] ? 'opacity-75' : ''; ?>">
                    <div class="flex items-start">
                        <div class="flex-1">
                            <?php if ($notification['type'] === 'comment'): ?>
                                <p>
                                    <strong><?php echo htmlspecialchars($data['commenter_name']); ?></strong>
                                    commented on your post
                                    <a href="post.php?id=<?php echo $data['post_id']; ?>" class="text-blue-600 hover:underline">
                                        "<?php echo htmlspecialchars($data['post_title']); ?>"
                                    </a>
                                </p>
                            <?php endif; ?>
                            <span class="text-sm text-gray-500">
                                <?php echo timeAgo($notification['created_at']); ?>
                            </span>
                        </div>
                        <?php if (!$notification['is_read']): ?>
                            <form method="POST" action="mark-notification-read.php">
                                <input type="hidden" name="notification_id" value="<?php echo $notification['id']; ?>">
                                <button type="submit" class="text-sm text-gray-500 hover:text-gray-700">
                                    Mark as read
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php'; ?>
