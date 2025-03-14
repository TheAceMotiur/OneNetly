<?php
require_once 'includes/init.php';

// Get user ID from URL, default to current user if logged in
$userId = isset($_GET['id']) ? (int)$_GET['id'] : ($user->isLoggedIn() ? $user->getCurrentUser()['id'] : 0);
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'followers';

// If no valid user ID and not logged in, redirect to login
if ($userId <= 0) {
    redirect('login.php', 'Please login to view followers', 'error');
}

// Get user information
$profile = $user->getUserById($userId);
if (!$profile) {
    redirect('index.php', 'User not found', 'error');
}

// Get current page for pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);

// Get followers/following based on selected tab
$results = [];
$pagination = [];

if ($tab === 'followers') {
    $data = $user->getFollowers($userId, $page);
    $results = $data['followers'];
    $pagination = $data['pagination'];
    $pageTitle = htmlspecialchars($profile['username']) . "'s Followers";
} else {
    $data = $user->getFollowing($userId, $page);
    $results = $data['following'];
    $pagination = $data['pagination'];
    $pageTitle = "People " . htmlspecialchars($profile['username']) . " Follows";
}

// Current user for checking follow status
$currentUser = $user->isLoggedIn() ? $user->getCurrentUser() : null;

// SEO Optimization
$canonicalUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/followers.php?id=$userId&tab=$tab";
if ($page > 1) {
    $canonicalUrl .= "&page=$page";
}

// Set SEO tags
$seo->setTitle($pageTitle)
    ->setDescription('View followers and following for ' . $profile['username'])
    ->setCanonicalUrl($canonicalUrl)
    ->setOgType('profile');

// Breadcrumbs
$breadcrumbs = [
    'Home' => 'index.php',
    $profile['username'] => "profile.php?id=$userId",
    $tab === 'followers' ? 'Followers' : 'Following' => ''
];

// Include header
require_once 'includes/header.php';
?>

<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <!-- User Profile Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center text-gray-700 text-2xl font-semibold mr-4">
                    <?php echo strtoupper(substr($profile['username'], 0, 1)); ?>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900"><?php echo htmlspecialchars($profile['username']); ?></h1>
                    <div class="flex mt-1 text-sm text-gray-600">
                        <a href="?id=<?php echo $userId; ?>&tab=followers" class="hover:underline">
                            <span><?php echo $user->countFollowers($profile['id']); ?> Followers</span>
                        </a>
                        <span class="mx-2">·</span>
                        <a href="?id=<?php echo $userId; ?>&tab=following" class="hover:underline">
                            <span><?php echo $user->countFollowing($profile['id']); ?> Following</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tabs -->
        <div class="flex border-b border-gray-200">
            <a href="?id=<?php echo $userId; ?>&tab=followers" class="flex-1 py-4 px-6 text-center font-medium <?php echo $tab === 'followers' ? 'text-green-600 border-b-2 border-green-500' : 'text-gray-500 hover:text-gray-700'; ?>">
                Followers
            </a>
            <a href="?id=<?php echo $userId; ?>&tab=following" class="flex-1 py-4 px-6 text-center font-medium <?php echo $tab === 'following' ? 'text-green-600 border-b-2 border-green-500' : 'text-gray-500 hover:text-gray-700'; ?>">
                Following
            </a>
        </div>
        
        <!-- Users List -->
        <?php if (empty($results)): ?>
            <div class="p-6 text-center">
                <p class="text-gray-600">
                    <?php echo $tab === 'followers' ? 'No followers yet.' : 'Not following anyone yet.'; ?>
                </p>
            </div>
        <?php else: ?>
            <div class="divide-y divide-gray-200">
                <?php foreach ($results as $user_item): ?>
                    <div class="p-4 sm:p-6 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center text-gray-700 font-semibold mr-4">
                                <?php echo strtoupper(substr($user_item['username'], 0, 1)); ?>
                            </div>
                            <div>
                                <a href="profile.php?id=<?php echo htmlspecialchars($user_item['id']); ?>" class="text-lg font-medium text-gray-900 hover:text-green-600">
                                    <?php echo htmlspecialchars($user_item['username']); ?>
                                </a>
                                <?php /* Remove bio display since column doesn't exist yet */ ?>
                            </div>
                        </div>
                        
                        <?php if ($currentUser && $currentUser['id'] !== $user_item['id']): ?>
                            <?php $isFollowing = $user->isFollowing($currentUser['id'], $user_item['id']); ?>
                            <button class="follow-btn ml-4 px-4 py-2 <?php echo $isFollowing ? 'bg-gray-200 text-gray-700' : 'bg-green-600 text-white'; ?> rounded-full hover:<?php echo $isFollowing ? 'bg-gray-300' : 'bg-green-700'; ?>" 
                                    data-user-id="<?php echo $user_item['id']; ?>"
                                    data-action="<?php echo $isFollowing ? 'unfollow' : 'follow'; ?>">
                                <?php echo $isFollowing ? 'Following' : 'Follow'; ?>
                            </button>
                        <?php elseif (!$currentUser): ?>
                            <a href="login.php" class="ml-4 px-4 py-2 bg-green-600 text-white rounded-full hover:bg-green-700">
                                Follow
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($pagination['total'] > 1): ?>
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium"><?php echo ($pagination['current'] - 1) * $pagination['limit'] + 1; ?></span> to 
                        <span class="font-medium"><?php echo min($pagination['current'] * $pagination['limit'], $pagination['count']); ?></span> of 
                        <span class="font-medium"><?php echo $pagination['count']; ?></span> results
                    </div>
                    <div class="flex space-x-1">
                        <?php if ($pagination['current'] > 1): ?>
                            <a href="?id=<?php echo $userId; ?>&tab=<?php echo $tab; ?>&page=<?php echo $pagination['current'] - 1; ?>" class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">
                                Previous
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($pagination['current'] < $pagination['total']): ?>
                            <a href="?id=<?php echo $userId; ?>&tab=<?php echo $tab; ?>&page=<?php echo $pagination['current'] + 1; ?>" class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">
                                Next
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all follow buttons
    const followButtons = document.querySelectorAll('.follow-btn');
    
    // Add click event listener to each button
    followButtons.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.getAttribute('data-user-id');
            const action = this.getAttribute('data-action');
            
            // Send AJAX request
            fetch('follow.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: `action=${action}&user_id=${userId}&referrer=${window.location.href}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update button text and styles
                    if (data.isFollowing) {
                        this.textContent = 'Following';
                        this.classList.remove('bg-green-600', 'text-white', 'hover:bg-green-700');
                        this.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                        this.setAttribute('data-action', 'unfollow');
                    } else {
                        this.textContent = 'Follow';
                        this.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                        this.classList.add('bg-green-600', 'text-white', 'hover:bg-green-700');
                        this.setAttribute('data-action', 'follow');
                    }
                } else {
                    console.error('Error:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
</script>

<?php require_once 'includes/footer.php'; ?>
