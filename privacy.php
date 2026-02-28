<?php
require_once __DIR__ . '/config.php';

// Set page variables for header
$pageTitle = 'Privacy Policy - ' . SITE_NAME;
$pageDescription = 'Read our privacy policy to understand how we handle your data with our anonymous file sharing service.';

require_once __DIR__ . '/includes/header.php';
?>

<main class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8">Privacy Policy</h1>

    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg shadow-sm p-6 space-y-6">
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">1. Information We Collect</h2>
            <div class="space-y-4 text-gray-600 dark:text-gray-400">
                <p>We collect minimal information to provide our anonymous file sharing service:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li><strong>Files you upload</strong> - Stored temporarily for sharing</li>
                    <li><strong>Technical data</strong> - IP address, browser type, file metadata</li>
                    <li><strong>Usage data</strong> - Upload/download counts, access timestamps</li>
                </ul>
                <p class="mt-4"><strong>We do NOT collect:</strong> No accounts, no email addresses, no personal identification.</p>
            </div>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">2. How We Use Your Information</h2>
            <div class="space-y-4 text-gray-600 dark:text-gray-400">
                <p>We use the collected information to:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li><strong>Provide file sharing services</strong> - Store and deliver your files</li>
                    <li><strong>Maintain service quality</strong> - Monitor performance and uptime</li>
                    <li><strong>Prevent abuse</strong> - Block malware, illegal content, and spam</li>
                    <li><strong>Comply with legal requirements</strong> - Respond to valid legal requests</li>
                </ul>
            </div>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">3. Data Storage and Security</h2>
            <div class="space-y-4 text-gray-600 dark:text-gray-400">
                <p>We implement security measures to protect your files:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li><strong>Encrypted connections</strong> - All transfers use HTTPS encryption</li>
                    <li><strong>Secure storage</strong> - Files stored on protected cloud servers</li>
                        <li>Regular security audits and updates</li>
                        <li>Limited staff access to user data</li>
                    <li><strong>Secure storage</strong> - Files stored on protected cloud servers</li>
                    <li><strong>Unique file IDs</strong> - Random URLs make files hard to guess</li>
                    <li><strong>Automatic deletion</strong> - Files expire after <?= EXPIRY_DAYS ?> days</li>
                </ul>
                <p class="mt-4 font-semibold">Note: We do NOT scan or read your file contents. For highly sensitive data, encrypt files before uploading.</p>
            </div>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">4. Data Retention</h2>
            <div class="space-y-4 text-gray-600 dark:text-gray-400">
                <p>Files and data are retained as follows:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li><strong>Uploaded files</strong> - Automatically deleted after <?= EXPIRY_DAYS ?> days from last download</li>
                    <li><strong>Access logs</strong> - Kept for up to 30 days for security monitoring</li>
                    <li><strong>No permanent storage</strong> - All data is temporary and automatically removed</li>
                </ul>
            </div>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">5. Your Rights</h2>
            <div class="space-y-4 text-gray-600 dark:text-gray-400">
                <p>Since we don't collect personal information or require accounts:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li><strong>Anonymity</strong> - No personal data means nothing to access or delete</li>
                    <li><strong>File removal</strong> - Contact us to remove a specific file early</li>
                    <li><strong>No tracking</strong> - We don't track individual users across sessions</li>
                </ul>
            </div>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">6. Cookies</h2>
            <div class="space-y-4 text-gray-600 dark:text-gray-400">
                <p>We use minimal cookies only for:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li><strong>Theme preference</strong> - Remember dark/light mode setting</li>
                    <li><strong>Session management</strong> - Basic functionality during your visit</li>
                </ul>
                <p class="mt-4">No advertising or tracking cookies are used.</p>
            </div>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">7. Third-Party Services</h2>
            <div class="space-y-4 text-gray-600 dark:text-gray-400">
                <p>We may use third-party services that have their own privacy policies:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li><strong>Cloud storage providers</strong> - For file hosting</li>
                    <li><strong>CDN services</strong> - For faster content delivery</li>
                </ul>
            </div>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">8. Legal Compliance</h2>
            <div class="space-y-4 text-gray-600 dark:text-gray-400">
                <p>We may disclose information if required by law or to:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Comply with legal processes or government requests</li>
                    <li>Protect our rights and property</li>
                    <li>Prevent illegal activities or abuse of service</li>
                </ul>
            </div>
        </section>

        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">9. Contact Us</h2>
            <p class="text-gray-600 dark:text-gray-400">If you have questions about this Privacy Policy, please contact us:</p>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Email: <a href="mailto:<?= SITE_EMAIL ?>" class="text-blue-500 dark:text-blue-400 hover:underline"><?= SITE_EMAIL ?></a></p>
        </section>
    </div>

    <div class="mt-8 text-center text-gray-600 dark:text-gray-400 text-sm">
        Last updated: <?php echo date('F d, Y'); ?>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>