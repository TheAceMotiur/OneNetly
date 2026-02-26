<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Terms of Service';
$pageDescription = 'Terms of Service for ' . SITE_NAME;
include __DIR__ . '/includes/header.php';
$siteName = SITE_NAME;
?>

<div class="max-w-4xl mx-auto px-6 py-12">
  
  <!-- Page Title -->
  <div class="mb-8">
    <h1 class="text-3xl md:text-4xl font-bold mb-2 text-gray-900 dark:text-white">Terms of Service</h1>
    <p class="text-gray-500 dark:text-gray-600 dark:text-gray-400">Last updated: <?= date('F j, Y') ?></p>
  </div>

  <!-- Content -->
  <div class="prose prose-invert max-w-none space-y-6">
    
    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">1. Acceptance of Terms</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        By accessing and using <?= htmlspecialchars($siteName) ?> (the "Service"), you accept and agree to be bound by the terms and provisions of this agreement. If you do not agree to these terms, please do not use this Service.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">2. Use License</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-3">
        You are granted a limited, non-exclusive, non-transferable license to use the Service for personal or commercial purposes, subject to the following restrictions:
      </p>
      <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4">
        <li>You may not upload files that violate copyright, trademark, or other intellectual property rights</li>
        <li>You may not upload malicious software, viruses, or code designed to harm others</li>
        <li>You may not use the Service for illegal purposes or to distribute illegal content</li>
        <li>You may not abuse, harass, threaten, or violate the legal rights of others</li>
        <li>You may not attempt to gain unauthorized access to the Service or its related systems</li>
      </ul>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">3. File Storage & Expiration</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        Files uploaded to <?= htmlspecialchars($siteName) ?> are stored for a period of <strong>90 days from the last download</strong>. Files that are not downloaded within this period may be automatically deleted without notice. We do not guarantee permanent storage of any files.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">4. File Size & Type Restrictions</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        Maximum file size is <strong><?= MAX_FILE_SIZE_MB ?> MB (<?= MAX_FILE_SIZE_MB / 1024 ?> GB)</strong> per upload. Certain file types may be restricted for security reasons. We reserve the right to remove any files at our discretion.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">5. Content Responsibility</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        You are solely responsible for the content you upload to the Service. <?= htmlspecialchars($siteName) ?> acts as a passive conduit for file sharing and does not monitor, verify, or endorse the content uploaded by users. We do not claim ownership of your files.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">6. Copyright Infringement</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        We respect intellectual property rights. If you believe that content hosted on our Service infringes your copyright, please see our <a href="dmca.php" class="text-blue-500 dark:text-blue-400 hover:underline">DMCA Policy</a> for information on how to submit a takedown notice.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">7. Disclaimer of Warranties</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        The Service is provided "as is" without warranties of any kind, either express or implied. We do not warrant that the Service will be uninterrupted, secure, or error-free. We are not responsible for any data loss, file corruption, or damages resulting from the use of this Service.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">8. Limitation of Liability</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        In no event shall <?= htmlspecialchars($siteName) ?> be liable for any indirect, incidental, special, consequential, or punitive damages arising out of or related to your use of the Service, even if we have been advised of the possibility of such damages.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">9. Modifications to Terms</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        We reserve the right to modify these Terms of Service at any time. Changes will be effective immediately upon posting. Your continued use of the Service after changes constitutes acceptance of the modified terms.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">10. Termination</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        We reserve the right to terminate or suspend access to the Service immediately, without prior notice, for any reason, including but not limited to breach of these Terms.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">11. Contact Information</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        For questions about these Terms, please visit our <a href="contact.php" class="text-blue-500 dark:text-blue-400 hover:underline">Contact</a> page.
      </p>
    </section>

  </div>

</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
