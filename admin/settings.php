<?php
require_once 'admin_header.php';

// Process settings form
$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_site_settings'])) {
        // Update site-wide settings
        $siteName = trim($_POST['site_name'] ?? '');
        $siteDescription = trim($_POST['site_description'] ?? '');
        
        if (empty($siteName)) {
            $error = 'Site name cannot be empty';
        } else {
            // Save site settings
            $settings->set('site_name', $siteName);
            $settings->set('site_description', $siteDescription);
            $success = true;
        }
    }
}

// Get current settings
$siteName = $settings->get('site_name', 'OneNetly');
$siteDescription = $settings->get('site_description', 'Web Management System');
?>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Admin Settings</h2>
        <p class="text-gray-500 mt-1">Configure global site settings</p>
    </div>
    
    <div class="p-6">
        <?php if ($success): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                Settings updated successfully
            </div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-4">
                <label for="site_name" class="block text-gray-700 text-sm font-bold mb-2">Site Name</label>
                <input type="text" id="site_name" name="site_name" value="<?php echo htmlspecialchars($siteName); ?>" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            
            <div class="mb-6">
                <label for="site_description" class="block text-gray-700 text-sm font-bold mb-2">Site Description</label>
                <textarea id="site_description" name="site_description" rows="3" 
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                ><?php echo htmlspecialchars($siteDescription); ?></textarea>
            </div>
            
            <div class="flex items-center justify-end">
                <button type="submit" name="update_site_settings" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</div>

<?php
require_once 'admin_footer.php';
?>
