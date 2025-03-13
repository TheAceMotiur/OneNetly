<?php
require_once 'admin_header.php';

// Only allow admins to access this page
if (!$user->isAdmin()) {
    redirect('../index.php', 'Access denied', 'error');
}

// Get current user - this line was missing
$currentUser = $user->getCurrentUser();

$testResult = '';
$exampleTags = 'web development, php, mysql';

// Run a test to save and retrieve tags
if (isset($_POST['run_test'])) {
    try {
        // 1. Test formatTags functionality
        $reflection = new ReflectionMethod($blog, 'formatTags');
        $reflection->setAccessible(true);
        $formattedTags = $reflection->invoke($blog, $exampleTags);
        
        // 2. Create a temporary blog post with tags
        $tempData = [
            'user_id' => $currentUser['id'],
            'title' => 'Test Tags Post ' . time(),
            'content' => 'This is a test post for tags functionality.',
            'status' => 'draft',
            'tags' => $exampleTags
        ];
        
        $result = $blog->createBlog($tempData);
        
        if (!$result['success']) {
            throw new Exception('Failed to create test blog post: ' . $result['message']);
        }
        
        $blogId = $result['blog_id'];
        
        // 3. Retrieve the post to check if tags were saved
        $retrievedPost = $blog->getBlogById($blogId);
        
        // 4. Clean up - delete the test post
        $blog->deleteBlog($blogId);
        
        $testResult = [
            'original_tags' => $exampleTags,
            'formatted_tags' => $formattedTags,
            'saved_tags' => $retrievedPost['tags'],
            'success' => $formattedTags == $retrievedPost['tags'],
            'blog_id' => $blogId
        ];
    } catch (Exception $e) {
        $testResult = [
            'error' => $e->getMessage(),
            'success' => false
        ];
    }
}

// Check database schema
$dbSchema = null;
try {
    $stmt = $pdo->query("DESCRIBE blogs");
    $dbSchema = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $dbSchema = ['error' => $e->getMessage()]; 
}
?>

<div class="mb-6">
    <h1 class="text-2xl font-semibold">Test Tags Functionality</h1>
    <p class="text-gray-600">This page tests if blog tags are being saved and retrieved correctly.</p>
</div>

<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h2 class="text-xl font-semibold mb-4">Run Tag Test</h2>
    
    <form method="POST" class="mb-6">
        <button type="submit" name="run_test" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Run Test
        </button>
    </form>
    
    <?php if ($testResult): ?>
        <div class="border rounded p-4 <?php echo $testResult['success'] ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200'; ?>">
            <h3 class="font-bold mb-2"><?php echo $testResult['success'] ? 'Test Passed!' : 'Test Failed!'; ?></h3>
            
            <?php if (isset($testResult['error'])): ?>
                <p class="text-red-600 mb-2">Error: <?php echo htmlspecialchars($testResult['error']); ?></p>
            <?php else: ?>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="font-semibold">Original Tags:</p>
                        <p class="font-mono bg-gray-100 p-1 rounded"><?php echo htmlspecialchars($testResult['original_tags']); ?></p>
                    </div>
                    <div>
                        <p class="font-semibold">Formatted Tags:</p>
                        <p class="font-mono bg-gray-100 p-1 rounded"><?php echo htmlspecialchars($testResult['formatted_tags']); ?></p>
                    </div>
                    <div>
                        <p class="font-semibold">Saved Tags (from DB):</p>
                        <p class="font-mono bg-gray-100 p-1 rounded"><?php echo htmlspecialchars($testResult['saved_tags']); ?></p>
                    </div>
                    <div>
                        <p class="font-semibold">Test Blog ID:</p>
                        <p class="font-mono bg-gray-100 p-1 rounded"><?php echo $testResult['blog_id']; ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold mb-4">Database Schema Check</h2>
    
    <?php if (is_array($dbSchema) && !isset($dbSchema['error'])): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Field</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Null</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Key</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Default</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Extra</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($dbSchema as $column): ?>
                        <tr class="<?php echo $column['Field'] === 'tags' ? 'bg-yellow-50' : ''; ?>">
                            <?php foreach ($column as $key => $value): ?>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($value ?? 'NULL'); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="bg-red-50 border border-red-200 rounded p-4">
            <p class="text-red-600">Error retrieving database schema: <?php echo htmlspecialchars($dbSchema['error'] ?? 'Unknown error'); ?></p>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'admin_footer.php'; ?>
