<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'DMCA Copyright Policy';
$pageDescription = 'DMCA Copyright Policy for ' . SITE_NAME;
include __DIR__ . '/includes/header.php';
$siteName = SITE_NAME;
$contactEmail = 'dmca@' . strtolower(str_replace(' ', '', $siteName)) . '.example.com';
?>

<div class="max-w-4xl mx-auto px-6 py-12">
  
  <!-- Page Title -->
  <div class="mb-8">
    <h1 class="text-3xl md:text-4xl font-bold mb-2 text-gray-900 dark:text-white">DMCA Copyright Policy</h1>
    <p class="text-gray-500 dark:text-gray-400">Last updated: <?= date('F j, Y') ?></p>
  </div>

  <!-- Content -->
  <div class="prose prose-invert max-w-none space-y-6">
    
    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">Overview</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        <?= htmlspecialchars($siteName) ?> respects the intellectual property rights of others and expects our users to do the same. In accordance with the Digital Millennium Copyright Act (DMCA) and other applicable laws, we will respond promptly to valid notices of alleged copyright infringement.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">Filing a DMCA Notice</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-3">
        If you believe that content hosted on <?= htmlspecialchars($siteName) ?> infringes your copyright, you may submit a DMCA takedown notice containing the following information:
      </p>
      <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4">
        <li>A physical or electronic signature of the copyright owner or authorized agent</li>
        <li>Identification of the copyrighted work claimed to have been infringed</li>
        <li>Identification of the infringing material and its location on our Service (e.g., the download link)</li>
        <li>Your contact information (name, address, telephone, email)</li>
        <li>A statement that you have a good faith belief that the use is not authorized by the copyright owner</li>
        <li>A statement that the information in the notice is accurate, and under penalty of perjury, that you are authorized to act on behalf of the copyright owner</li>
      </ul>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">How to Submit a Notice</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-3">
        Send your complete DMCA notice to:
      </p>
      <div class="bg-gray-100 dark:bg-gray-800/50 border border-gray-700 rounded-lg p-4">
        <p class="text-gray-300 font-mono text-sm">
          <strong>Email:</strong> <?= htmlspecialchars($contactEmail) ?>
        </p>
        <p class="text-gray-300 font-mono text-sm mt-2">
          <strong>Subject Line:</strong> DMCA Takedown Request
        </p>
      </div>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed mt-3">
        <strong>Note:</strong> Update the email address above with your actual DMCA contact email in <code class="text-sm bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded">dmca.php</code>.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">Our Response</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        Upon receipt of a valid DMCA notice, we will:
      </p>
      <ol class="list-decimal list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4">
        <li>Review the notice for completeness and validity</li>
        <li>Remove or disable access to the allegedly infringing material</li>
        <li>Notify the uploader (if contact information is available)</li>
        <li>Take appropriate action against repeat infringers</li>
      </ol>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">Counter-Notification</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-3">
        If you believe that your content was removed by mistake or misidentification, you may file a counter-notification containing:
      </p>
      <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4">
        <li>Your physical or electronic signature</li>
        <li>Identification of the material that was removed and its previous location</li>
        <li>A statement under penalty of perjury that you have a good faith belief the material was removed by mistake</li>
        <li>Your name, address, telephone number, and email</li>
        <li>A statement consenting to jurisdiction in your district (if in the U.S.)</li>
      </ul>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed mt-3">
        Send counter-notifications to the same email address listed above.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">Repeat Infringers</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        We reserve the right to terminate service access for users who repeatedly infringe copyrights or intellectual property rights of others.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">False Claims</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        <strong>Warning:</strong> Filing false or fraudulent DMCA notices may result in legal liability. Under Section 512(f) of the DMCA, any person who knowingly materially misrepresents that material is infringing may be subject to damages.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">No Monitoring Obligation</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        <?= htmlspecialchars($siteName) ?> is a service provider under the DMCA. We do not actively monitor uploaded content for copyright infringement. We respond to valid DMCA notices as required by law.
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">Contact</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        For questions about this policy, please visit our <a href="contact.php" class="text-blue-500 dark:text-blue-400 hover:underline">Contact</a> page.
      </p>
    </section>

  </div>

</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
