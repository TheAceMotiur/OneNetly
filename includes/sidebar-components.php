<?php
/**
 * Sidebar components for OneNetly
 */

/**
 * Display Who to Follow component
 */
function displayWhoToFollow() {
    global $user;
    
    $currentUser = null;
    if ($user->isLoggedIn()) {
        $currentUser = $user->getCurrentUser();
    }
    
    // Get recommended users to follow
    $recommendedUsers = $user->getRecommendedUsers(3); // Get 3 users
    ?>
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200 flex items-center">
            <i class="fas fa-user-plus text-indigo-500 mr-2"></i> Who to Follow
        </h2>
        
        <?php if (empty($recommendedUsers)): ?>
            <p class="text-gray-500">No recommendations at this time.</p>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($recommendedUsers as $recommendedUser): ?>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-semibold">
                                <?php echo strtoupper(substr($recommendedUser['username'], 0, 1)); ?>
                            </div>
                            <div class="ml-3">
                                <a href="profile.php?id=<?php echo $recommendedUser['id']; ?>" class="text-sm font-medium hover:text-indigo-600 transition">
                                    <?php echo htmlspecialchars($recommendedUser['username']); ?>
                                </a>
                            </div>
                        </div>
                        
                        <?php if ($currentUser): ?>
                            <?php $isFollowing = $user->isFollowing($currentUser['id'], $recommendedUser['id']); ?>
                            <button class="follow-btn px-3 py-1 text-xs rounded-full <?php echo $isFollowing ? 'bg-gray-200 text-gray-700' : 'bg-green-600 text-white'; ?> hover:<?php echo $isFollowing ? 'bg-gray-300' : 'bg-green-700'; ?>"
                                    data-user-id="<?php echo $recommendedUser['id']; ?>"
                                    data-action="<?php echo $isFollowing ? 'unfollow' : 'follow'; ?>">
                                <?php echo $isFollowing ? 'Following' : 'Follow'; ?>
                            </button>
                        <?php else: ?>
                            <a href="login.php" class="px-3 py-1 text-xs bg-green-600 text-white rounded-full hover:bg-green-700">
                                Follow
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                
                <a href="discover-people.php" class="block text-center text-sm text-indigo-600 hover:text-indigo-800 mt-3">
                    See more suggestions
                </a>
            </div>
        <?php endif; ?>
    </div>
    <?php
}
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all follow buttons in the sidebar
    const followButtons = document.querySelectorAll('.follow-btn');
    
    followButtons.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.getAttribute('data-user-id');
            const action = this.getAttribute('data-action');
            
            // Send AJAX request to follow.php
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
<?php
/**
 * Display Recommended Topics component
 */
function displayRecommendedTopics() {
    global $blog;
    
    // Get popular/recommended tags
    $recommendedTags = $blog->getPopularTags(10); // Get top 10 tags
    ?>
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200 flex items-center">
            <i class="fas fa-tags text-indigo-500 mr-2"></i> Popular Topics
        </h2>
        
        <?php if (empty($recommendedTags)): ?>
            <p class="text-gray-500">No topics available.</p>
        <?php else: ?>
            <div class="flex flex-wrap gap-2">
                <?php foreach ($recommendedTags as $tag): ?>
                    <a href="search.php?q=<?php echo urlencode($tag['name']); ?>" 
                       class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 text-sm rounded-full transition">
                        <?php echo htmlspecialchars($tag['name']); ?>
                        <?php if (isset($tag['count'])): ?>
                            <span class="text-gray-500 text-xs">(<?php echo $tag['count']; ?>)</span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
}
?>
