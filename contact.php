<?php
require_once __DIR__ . '/config.php';
$siteName = defined('SITE_NAME') ? SITE_NAME : 'OneFiles';
$contactEmail = 'support@' . strtolower(str_replace(' ', '', $siteName)) . '.example.com';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact – <?= htmlspecialchars($siteName) ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white dark:bg-gray-950 text-gray-900 dark:text-gray-200 min-h-screen">

<div class="max-w-4xl mx-auto px-6 py-12">
  
  <!-- Header -->
  <div class="mb-8">
    <a href="index.php" class="inline-flex items-center gap-2 text-blue-500 dark:text-blue-400 hover:text-blue-300 transition mb-4">
      ← Back to Home
    </a>
    <h1 class="text-4xl font-bold mb-2">Contact Us</h1>
    <p class="text-gray-500 dark:text-gray-500">We're here to help</p>
  </div>

  <!-- Content -->
  <div class="prose prose-invert max-w-none space-y-6">
    
    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">Get in Touch</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
        Have questions, feedback, or need support? We'd love to hear from you. Please reach out using the contact information below.
      </p>
      
      <div class="bg-gray-100 dark:bg-gray-800/50 border border-gray-700 rounded-lg p-5">
        <div class="flex items-start gap-3 mb-4">
          <div class="text-2xl">📧</div>
          <div>
            <div class="font-semibold text-gray-300 mb-1">Email Support</div>
            <a href="mailto:<?= htmlspecialchars($contactEmail) ?>" class="text-blue-500 dark:text-blue-400 hover:underline font-mono text-sm">
              <?= htmlspecialchars($contactEmail) ?>
            </a>
          </div>
        </div>
        
        <div class="text-xs text-gray-500 dark:text-gray-500 bg-gray-100 dark:bg-gray-800/30 p-3 rounded border border-gray-700">
          <strong>Note:</strong> Update the email address above with your actual contact email in <code class="text-sm bg-gray-900 px-2 py-1 rounded">contact.php</code>.
        </div>
      </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">What We Can Help With</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-gray-100 dark:bg-gray-800/50 rounded-lg p-4 border border-gray-700">
          <div class="text-xl mb-2">❓</div>
          <div class="font-semibold text-gray-300 mb-1">General Questions</div>
          <div class="text-sm text-gray-500 dark:text-gray-500">How the service works, features, limitations</div>
        </div>
        <div class="bg-gray-100 dark:bg-gray-800/50 rounded-lg p-4 border border-gray-700">
          <div class="text-xl mb-2">🐛</div>
          <div class="font-semibold text-gray-300 mb-1">Technical Issues</div>
          <div class="text-sm text-gray-500 dark:text-gray-500">Upload errors, broken links, browser problems</div>
        </div>
        <div class="bg-gray-100 dark:bg-gray-800/50 rounded-lg p-4 border border-gray-700">
          <div class="text-xl mb-2">⚖️</div>
          <div class="font-semibold text-gray-300 mb-1">Legal Matters</div>
          <div class="text-sm text-gray-500 dark:text-gray-500">DMCA notices, copyright issues, abuse reports</div>
        </div>
        <div class="bg-gray-100 dark:bg-gray-800/50 rounded-lg p-4 border border-gray-700">
          <div class="text-xl mb-2">💡</div>
          <div class="font-semibold text-gray-300 mb-1">Feature Requests</div>
          <div class="text-sm text-gray-500 dark:text-gray-500">Suggestions and improvements</div>
        </div>
      </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">Before You Contact Us</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-3">
        Please check our documentation first – your question might already be answered:
      </p>
      <ul class="space-y-2">
        <li>
          <a href="terms.php" class="text-blue-500 dark:text-blue-400 hover:underline flex items-center gap-2">
            <span>📋</span> Terms of Service – Usage rules and restrictions
          </a>
        </li>
        <li>
          <a href="privacy.php" class="text-blue-500 dark:text-blue-400 hover:underline flex items-center gap-2">
            <span>🔐</span> Privacy Policy – How we handle data
          </a>
        </li>
        <li>
          <a href="dmca.php" class="text-blue-500 dark:text-blue-400 hover:underline flex items-center gap-2">
            <span>©️</span> DMCA Policy – Copyright infringement process
          </a>
        </li>
        <li>
          <a href="about.php" class="text-blue-500 dark:text-blue-400 hover:underline flex items-center gap-2">
            <span>ℹ️</span> About – How the service works
          </a>
        </li>
      </ul>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">Response Time</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        We aim to respond to all inquiries within <strong>48 hours</strong>. For urgent issues like DMCA takedowns or security concerns, we'll prioritize your request. Please be patient – we're a small team!
      </p>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3">Abuse & Security Reports</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        If you've discovered a security vulnerability or want to report abusive content, please email us immediately with:
      </p>
      <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4 mt-3">
        <li>Detailed description of the issue or content</li>
        <li>The file's download link (if applicable)</li>
        <li>Steps to reproduce (for security issues)</li>
        <li>Any relevant screenshots or evidence</li>
      </ul>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed mt-3">
        We take security and abuse seriously and will investigate promptly.
      </p>
    </section>

    <section class="bg-blue-900/20 border border-blue-800 rounded-xl p-6">
      <h2 class="text-2xl font-semibold mb-3 text-blue-500 dark:text-blue-400">💬 We Want Your Feedback</h2>
      <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
        <?= htmlspecialchars($siteName) ?> is constantly improving. Whether you have suggestions, complaints, or just want to say hi, we'd love to hear from you. Your feedback helps make the service better for everyone.
      </p>
    </section>

  </div>

</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
