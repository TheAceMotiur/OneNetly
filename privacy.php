<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Privacy Policy';
$pageDescription = 'Privacy Policy for ' . SITE_NAME;
include __DIR__ . '/includes/header.php';
$siteName = SITE_NAME;
?>

<div class="max-w-4xl mx-auto px-6 py-12">
  
  <!-- Page Title -->
  <div class="mb-8">
    <h1 class="text-3xl md:text-4xl font-bold mb-2 text-gray-900 dark:text-white">Privacy Policy</h1>
    <p class="text-gray-500 dark:text-gray-400">Last updated: <?= date('F j, Y') ?></p>
  </div>

  <!-- Content -->
  <div class="prose prose-invert max-w-none space-y-6">
    
    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">1. Information We Collect</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-3">
        <?= htmlspecialchars($siteName) ?> is designed to operate with minimal data collection:
      </p>
      <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4">
        <li><strong>Files:</strong> When you upload a file, we store it on our cloud storage servers. We store metadata including filename, size, upload timestamp, and download count.</li>
        <li><strong>Access Logs:</strong> Our servers may log IP addresses, browser user agents, and access timestamps for security and operational purposes.</li>
        <li><strong>Cookies:</strong> We use minimal session cookies for admin authentication. No tracking or advertising cookies are used.</li>
        <li><strong>No Personal Information:</strong> We do not require registration, email addresses, or any personal identification to use the Service.</li>
      </ul>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">2. How We Use Information</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-3">
        The limited information we collect is used solely for:
      </p>
      <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4">
        <li>Providing the file sharing service</li>
        <li>Managing file storage and expiration</li>
        <li>Preventing abuse and maintaining security</li>
        <li>Troubleshooting technical issues</li>
        <li>Complying with legal obligations</li>
      </ul>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">3. File Storage & Security</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        Files are stored on secure cloud infrastructure with industry-standard security measures. While we implement reasonable security practices, no system is completely secure. We cannot guarantee the absolute security of your files. <strong>Do not upload sensitive, confidential, or critical data without proper encryption.</strong>
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">4. File Sharing & Download Links</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        When you upload a file, a unique download link is generated. Anyone with this link can access and download the file. <strong>Treat download links as sensitive</strong> – only share them with intended recipients. We are not responsible for unauthorized access resulting from shared links.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">5. Data Retention</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        Files are automatically deleted <strong>90 days after the last download</strong> (or 90 days after upload if never downloaded). Once deleted, files cannot be recovered. We may retain server logs for up to 30 days for security purposes.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">6. Third-Party Services</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        We use third-party cloud storage providers for file hosting. Files are stored on reliable, enterprise-grade infrastructure with industry-standard security and privacy practices.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">7. No Tracking or Analytics</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        We do not use third-party analytics, advertising networks, or tracking scripts. We do not sell, trade, or share your data with third parties for marketing purposes.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">8. Legal Disclosure</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        We may disclose information if required by law, court order, or governmental request, or if necessary to protect the rights, property, or safety of <?= htmlspecialchars($siteName) ?>, our users, or others.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">9. Children's Privacy</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        The Service is not directed to individuals under the age of 13. We do not knowingly collect personal information from children. If you believe a child has used our Service, please contact us immediately.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">10. Changes to This Policy</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated "Last updated" date. Continued use of the Service after changes constitutes acceptance of the updated policy.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">11. Your Rights</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        Since we collect minimal data and do not require accounts, there is no personal data to access, modify, or delete. Files you upload remain accessible via their download links until they expire. If you lose a download link, we cannot recover it for you.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">12. Contact Us</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        For privacy-related questions or concerns, please visit our <a href="contact.php" class="text-blue-500 dark:text-blue-400 hover:underline">Contact</a> page.
      </p>
    </section>

  </div>

  <?php include __DIR__ . '/includes/footer.php'; ?>
