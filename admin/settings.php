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
    
    if (isset($_POST['update_email_settings'])) {
        // Update email settings
        $smtpHost = trim($_POST['smtp_host'] ?? '');
        $smtpPort = (int)($_POST['smtp_port'] ?? 587);
        $smtpSecure = trim($_POST['smtp_secure'] ?? 'tls');
        $smtpUsername = trim($_POST['smtp_username'] ?? '');
        $smtpPassword = trim($_POST['smtp_password'] ?? '');
        $emailFromAddress = trim($_POST['email_from_address'] ?? '');
        $emailFromName = trim($_POST['email_from_name'] ?? '');
        
        if (empty($smtpHost) || empty($emailFromAddress)) {
            $error = 'SMTP host and From Email are required';
        } else {
            // Save email settings
            $settings->set('smtp_host', $smtpHost);
            $settings->set('smtp_port', $smtpPort);
            $settings->set('smtp_secure', $smtpSecure);
            $settings->set('smtp_username', $smtpUsername);
            $settings->set('smtp_password', $smtpPassword);
            $settings->set('email_from_address', $emailFromAddress);
            $settings->set('email_from_name', $emailFromName);
            
            try {
                // Check if smtp_encryption column exists in site_config
                $checkStmt = $pdo->prepare("
                    SELECT COUNT(*) FROM information_schema.columns 
                    WHERE table_schema = DATABASE() 
                    AND table_name = 'site_config' 
                    AND column_name = 'smtp_encryption'
                ");
                $checkStmt->execute();
                $columnExists = (bool)$checkStmt->fetchColumn();
                
                // If column exists, update it directly in site_config
                if ($columnExists) {
                    $stmt = $pdo->prepare("UPDATE site_config SET smtp_encryption = ? WHERE id = (SELECT id FROM (SELECT id FROM site_config LIMIT 1) as temp)");
                    $stmt->execute([$smtpSecure]);
                } else {
                    // If the column doesn't exist yet, try to create it
                    try {
                        $pdo->exec("ALTER TABLE site_config ADD COLUMN smtp_encryption VARCHAR(10) DEFAULT 'tls'");
                        $stmt = $pdo->prepare("UPDATE site_config SET smtp_encryption = ? WHERE id = (SELECT id FROM (SELECT id FROM site_config LIMIT 1) as temp)");
                        $stmt->execute([$smtpSecure]);
                    } catch (PDOException $e) {
                        // If we can't create the column, just use the settings table
                        $settings->set('smtp_secure', $smtpSecure);
                    }
                }
                
                // Also update in settings for backward compatibility
                $settings->set('smtp_secure', $smtpSecure);
                
                // ...rest of existing update code...
            } catch (PDOException $e) {
                // Handle error
                $error = 'Database error: ' . $e->getMessage();
            }
            
            // Test email configuration if requested
            if (isset($_POST['test_email']) && !empty($_POST['test_email_address'])) {
                $testEmailTo = trim($_POST['test_email_address']);
                
                // Use the Email class to send a test email
                require_once '../classes/Email.php';
                $emailSender = new Email($settings);
                
                $result = $emailSender->sendEmail(
                    $testEmailTo,
                    'Test Email from OneNetly',
                    'This is a test email from OneNetly to verify your SMTP settings are working correctly. If you received this email, your settings are configured properly!'
                );
                
                if ($result['success']) {
                    $success = true;
                    $_SESSION['message'] = 'Email settings saved and test email sent successfully!';
                    $_SESSION['message_type'] = 'success';
                } else {
                    $error = 'Email settings saved but test email failed: ' . $result['message'];
                }
            } else {
                $success = true;
            }
        }
    }
    
    if (isset($_POST['update_integrations'])) {
        // Update third-party integrations
        $googleAnalyticsId = trim($_POST['google_analytics_id'] ?? '');
        $googleSiteVerification = trim($_POST['google_site_verification'] ?? '');
        $bingSiteVerification = trim($_POST['bing_site_verification'] ?? '');
        $openrouterApiKey = trim($_POST['openrouter_api_key'] ?? '');
        
        try {
            // Check if site_config table exists
            $tableExists = $pdo->query("SHOW TABLES LIKE 'site_config'");
            if ($tableExists->rowCount() === 0) {
                // Create table if it doesn't exist
                $pdo->exec("CREATE TABLE `site_config` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `site_name` varchar(255) DEFAULT NULL,
                    `site_description` text,
                    `site_keywords` text,
                    `google_analytics_id` varchar(50) DEFAULT NULL,
                    `google_site_verification` varchar(100) DEFAULT NULL,
                    `bing_site_verification` varchar(100) DEFAULT NULL,
                    `openrouter_api_key` varchar(255) DEFAULT NULL,
                    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    PRIMARY KEY (`id`)
                )");
            }

            // Check if any record exists in site_config
            $stmt = $pdo->query("SELECT COUNT(*) FROM site_config");
            $count = $stmt->fetchColumn();
            
            if ($count == 0) {
                // Insert new record
                $stmt = $pdo->prepare("INSERT INTO site_config (google_analytics_id, google_site_verification, bing_site_verification, openrouter_api_key) VALUES (?, ?, ?, ?)");
                $stmt->execute([$googleAnalyticsId, $googleSiteVerification, $bingSiteVerification, $openrouterApiKey]);
            } else {
                // Update existing record
                $stmt = $pdo->prepare("UPDATE site_config SET google_analytics_id = ?, google_site_verification = ?, bing_site_verification = ?, openrouter_api_key = ?");
                $stmt->execute([$googleAnalyticsId, $googleSiteVerification, $bingSiteVerification, $openrouterApiKey]);
            }
            
            // Save integration settings in settings object for backward compatibility
            $settings->set('google_analytics_id', $googleAnalyticsId);
            $settings->set('google_site_verification', $googleSiteVerification);
            $settings->set('bing_site_verification', $bingSiteVerification);
            $settings->set('openrouter_api_key', $openrouterApiKey);
            
            $success = true;
            $_SESSION['message'] = 'Integration settings updated successfully';
            $_SESSION['message_type'] = 'success';
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    }
}

// Get current settings
$siteName = $settings->get('site_name', 'OneNetly');
$siteDescription = $settings->get('site_description', 'Web Management System');

// Get email settings
$smtpHost = $settings->get('smtp_host', '');
$smtpPort = $settings->get('smtp_port', 587);

// More robust handling of SMTP secure setting
try {
    // Try to get from site_config first
    $stmt = $pdo->prepare("
        SELECT 1 FROM information_schema.columns 
        WHERE table_schema = DATABASE() 
        AND table_name = 'site_config' 
        AND column_name = 'smtp_encryption'
    ");
    $stmt->execute();
    $columnExists = (bool)$stmt->fetchColumn();
    
    if ($columnExists) {
        $stmt = $pdo->query("SELECT smtp_encryption FROM site_config LIMIT 1");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result && isset($result['smtp_encryption'])) {
            $smtpSecure = $result['smtp_encryption'];
        } else {
            // Fallback to settings table
            $smtpSecure = $settings->get('smtp_secure', 'tls');
        }
    } else {
        // Column doesn't exist yet, use settings table
        $smtpSecure = $settings->get('smtp_secure', 'tls');
    }
} catch (PDOException $e) {
    // Safely handle any database errors
    $smtpSecure = $settings->get('smtp_secure', 'tls');
}

$smtpUsername = $settings->get('smtp_username', '');
$smtpPassword = $settings->get('smtp_password', '');
$emailFromAddress = $settings->get('email_from_address', '');
$emailFromName = $settings->get('email_from_name', 'OneNetly');

// Get integration settings
$googleAnalyticsId = $settings->get('google_analytics_id', '');
$googleSiteVerification = $settings->get('google_site_verification', '');
$bingSiteVerification = $settings->get('bing_site_verification', '');
$openrouterApiKey = $settings->get('openrouter_api_key', '');
?>

<div class="mb-6">
    <h1 class="text-2xl font-semibold">Admin Settings</h1>
</div>

<!-- Tabs -->
<div class="mb-6 border-b border-gray-200">
    <ul class="flex flex-wrap -mb-px" id="settings-tabs" role="tablist">
        <li class="mr-2" role="presentation">
            <a href="#site-settings" class="inline-block p-4 border-b-2 border-blue-600 rounded-t-lg active" id="site-settings-tab" data-tab="site-settings">
                Site Settings
            </a>
        </li>
        <li class="mr-2" role="presentation">
            <a href="#email-settings" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="email-settings-tab" data-tab="email-settings">
                Email Settings
            </a>
        </li>
        <li class="mr-2" role="presentation">
            <a href="#integrations" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="integrations-tab" data-tab="integrations">
                Integrations
            </a>
        </li>
    </ul>
</div>

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

<!-- Site Settings Tab -->
<div id="site-settings-content" class="bg-white rounded-lg shadow overflow-hidden tab-content">
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Site Settings</h2>
        <p class="text-gray-500 mt-1">Configure global site settings</p>
    </div>
    
    <div class="p-6">
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

<!-- Email Settings Tab -->
<div id="email-settings-content" class="bg-white rounded-lg shadow overflow-hidden tab-content hidden">
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Email Settings</h2>
        <p class="text-gray-500 mt-1">Configure SMTP settings for sending emails</p>
    </div>
    
    <div class="p-6">
        <form method="POST">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="mb-4">
                    <label for="smtp_host" class="block text-gray-700 text-sm font-bold mb-2">SMTP Host*</label>
                    <input type="text" id="smtp_host" name="smtp_host" value="<?php echo htmlspecialchars($smtpHost); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="smtp.gmail.com" required>
                </div>
                
                <div class="mb-4">
                    <label for="smtp_port" class="block text-gray-700 text-sm font-bold mb-2">SMTP Port</label>
                    <input type="number" id="smtp_port" name="smtp_port" value="<?php echo htmlspecialchars($smtpPort); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="587">
                </div>
                
                <div class="mb-4">
                    <label for="smtp_secure" class="block text-gray-700 text-sm font-bold mb-2">SMTP Security</label>
                    <select id="smtp_secure" name="smtp_secure" 
                            class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="tls" <?php echo $smtpSecure === 'tls' ? 'selected' : ''; ?>>TLS</option>
                        <option value="ssl" <?php echo $smtpSecure === 'ssl' ? 'selected' : ''; ?>>SSL</option>
                        <option value="" <?php echo $smtpSecure === '' ? 'selected' : ''; ?>>None</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="smtp_username" class="block text-gray-700 text-sm font-bold mb-2">SMTP Username</label>
                    <input type="text" id="smtp_username" name="smtp_username" value="<?php echo htmlspecialchars($smtpUsername); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="your_email@gmail.com">
                </div>
                
                <div class="mb-4">
                    <label for="smtp_password" class="block text-gray-700 text-sm font-bold mb-2">SMTP Password</label>
                    <input type="password" id="smtp_password" name="smtp_password" value="<?php echo htmlspecialchars($smtpPassword); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="your_password" autocomplete="new-password">
                    <p class="text-sm text-gray-500 mt-1">Leave empty to keep the current password</p>
                </div>
                
                <div class="mb-4">
                    <label for="email_from_address" class="block text-gray-700 text-sm font-bold mb-2">From Email Address*</label>
                    <input type="email" id="email_from_address" name="email_from_address" value="<?php echo htmlspecialchars($emailFromAddress); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="noreply@yourdomain.com" required>
                </div>
                
                <div class="mb-4">
                    <label for="email_from_name" class="block text-gray-700 text-sm font-bold mb-2">From Name</label>
                    <input type="text" id="email_from_name" name="email_from_name" value="<?php echo htmlspecialchars($emailFromName); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="OneNetly">
                </div>
            </div>
            
            <div class="mt-6 border-t pt-4 border-gray-200">
                <h3 class="text-md font-medium mb-3">Test Email Configuration</h3>
                <div class="flex items-center mb-4">
                    <input type="checkbox" id="test_email" name="test_email" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="test_email" class="ml-2 block text-sm text-gray-900">Send a test email after saving</label>
                </div>
                
                <div id="test_email_field" class="mb-4 hidden">
                    <label for="test_email_address" class="block text-gray-700 text-sm font-bold mb-2">Test Email Address</label>
                    <input type="email" id="test_email_address" name="test_email_address" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="Enter email address to send test to">
                </div>
            </div>
            
            <div class="flex items-center justify-end mt-6">
                <button type="submit" name="update_email_settings" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Save Email Settings
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Third-party Integrations Tab Content -->
<div id="integrations-content" class="bg-white rounded-lg shadow overflow-hidden tab-content hidden">
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Third-Party Integrations</h2>
        <p class="text-gray-500 mt-1">Configure external services and APIs</p>
    </div>
    
    <div class="p-6">
        <form method="POST">
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="google_analytics_id" class="block text-gray-700 text-sm font-bold mb-2">Google Analytics</label>
                    <input type="text" id="google_analytics_id" name="google_analytics_id" value="<?php echo htmlspecialchars($googleAnalyticsId); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="UA-XXXXXXXXX-X or G-XXXXXXXXX">
                    <p class="mt-2 text-sm text-gray-500">Enter your Google Analytics Tracking ID.</p>
                </div>
                
                <div>
                    <label for="google_site_verification" class="block text-gray-700 text-sm font-bold mb-2">Google Search Console</label>
                    <input type="text" id="google_site_verification" name="google_site_verification" value="<?php echo htmlspecialchars($googleSiteVerification); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="Google site verification code">
                    <p class="mt-2 text-sm text-gray-500">Enter the Google site verification meta tag content.</p>
                </div>
                
                <div>
                    <label for="bing_site_verification" class="block text-gray-700 text-sm font-bold mb-2">Bing Webmaster Tools</label>
                    <input type="text" id="bing_site_verification" name="bing_site_verification" value="<?php echo htmlspecialchars($bingSiteVerification); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="Bing site verification code">
                    <p class="mt-2 text-sm text-gray-500">Enter the Bing site verification meta tag content.</p>
                </div>
                
                <div>
                    <label for="openrouter_api_key" class="block text-gray-700 text-sm font-bold mb-2">OpenRouter API Key</label>
                    <input type="text" id="openrouter_api_key" name="openrouter_api_key" value="<?php echo htmlspecialchars($openrouterApiKey); ?>" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           placeholder="sk-or-v1-...">
                    <p class="mt-2 text-sm text-gray-500">Enter your OpenRouter API key for the AI writing assistant. Get a free key at <a href="https://openrouter.ai/" target="_blank" class="text-indigo-600 hover:text-indigo-500">openrouter.ai</a>.</p>
                </div>
                
                <div class="flex items-center justify-end mt-6">
                    <button type="submit" name="update_integrations" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Save Integration Settings
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Tab switching
    const tabButtons = document.querySelectorAll('[data-tab]');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const tab = this.getAttribute('data-tab');
            
            // Hide all tab contents
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });
            
            // Deactivate all tab buttons
            tabButtons.forEach(btn => {
                btn.classList.remove('border-blue-600', 'active');
                btn.classList.add('border-transparent');
            });
            
            // Activate current tab button
            this.classList.add('border-blue-600', 'active');
            this.classList.remove('border-transparent');
            
            // Show current tab content
            document.getElementById(tab + '-content').classList.remove('hidden');
        });
    });
    
    // Test email toggle
    document.getElementById('test_email').addEventListener('change', function() {
        const testEmailField = document.getElementById('test_email_field');
        if (this.checked) {
            testEmailField.classList.remove('hidden');
        } else {
            testEmailField.classList.add('hidden');
        }
    });
</script>

<?php
require_once 'admin_footer.php';
?>
