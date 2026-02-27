<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Contact Us';
$pageDescription = 'Get in touch with ' . SITE_NAME . ' team';
require_once __DIR__ . '/includes/header.php';
?>

<main class="max-w-4xl mx-auto px-6 py-12">
  
  <!-- Header -->
  <div class="mb-8">
    <h1 class="text-4xl font-bold mb-2">Contact Us</h1>
    <p class="text-gray-600 dark:text-gray-400">Have questions or feedback? We're here to help.</p>
  </div>

  <!-- Content -->
  <div class="space-y-6">
    
    <!-- Contact Info -->
    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-8">
      <div class="flex items-start gap-4">
        <div class="text-4xl">📧</div>
        <div>
          <h2 class="text-2xl font-semibold mb-3 text-gray-900 dark:text-gray-100">Email Support</h2>
          <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
            For general inquiries, support requests, or feedback, please reach out to us via email:
          </p>
          <a href="mailto:<?= SITE_EMAIL ?>" class="inline-flex items-center gap-2 text-xl font-semibold text-blue-500 hover:text-blue-400 transition">
            <?= SITE_EMAIL ?>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
          </a>
          <p class="text-sm text-gray-500 dark:text-gray-500 mt-3">
            We typically respond within 24-48 hours.
          </p>
        </div>
      </div>
    </section>

    <!-- What to Include -->
    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-8">
      <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-gray-100">When Contacting Us</h2>
      <p class="text-gray-600 dark:text-gray-400 mb-4">To help us assist you better, please include:</p>
      <ul class="space-y-3">
        <li class="flex items-start gap-3">
          <span class="text-blue-500 dark:text-blue-400 font-bold">•</span>
          <span class="text-gray-600 dark:text-gray-400"><strong class="text-gray-900 dark:text-gray-200">Subject:</strong> A clear description of your inquiry or issue</span>
        </li>
        <li class="flex items-start gap-3">
          <span class="text-blue-500 dark:text-blue-400 font-bold">•</span>
          <span class="text-gray-600 dark:text-gray-400"><strong class="text-gray-900 dark:text-gray-200">Details:</strong> Any relevant information (file links, error messages, etc.)</span>
        </li>
        <li class="flex items-start gap-3">
          <span class="text-blue-500 dark:text-blue-400 font-bold">•</span>
          <span class="text-gray-600 dark:text-gray-400"><strong class="text-gray-900 dark:text-gray-200">Screenshots:</strong> If applicable, attach screenshots to help us understand the issue</span>
        </li>
      </ul>
    </section>

    <!-- Common Topics -->
    <section class="bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-8">
      <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Common Topics</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <div class="bg-white dark:bg-gray-800/50 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
          <div class="text-2xl mb-2">🔒</div>
          <div class="font-semibold text-gray-900 dark:text-gray-200 mb-1">DMCA & Takedown Requests</div>
          <div class="text-sm text-gray-600 dark:text-gray-400 mb-2">
            Report infringing content or request file removal.
          </div>
          <a href="<?= SITE_URL ?>/dmca" class="text-blue-500 hover:text-blue-400 text-sm font-medium">
            View DMCA Policy →
          </a>
        </div>

        <div class="bg-white dark:bg-gray-800/50 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
          <div class="text-2xl mb-2">❓</div>
          <div class="font-semibold text-gray-900 dark:text-gray-200 mb-1">General Support</div>
          <div class="text-sm text-gray-600 dark:text-gray-400">
            Questions about uploads, downloads, or service features.
          </div>
        </div>

        <div class="bg-white dark:bg-gray-800/50 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
          <div class="text-2xl mb-2">💡</div>
          <div class="font-semibold text-gray-900 dark:text-gray-200 mb-1">Feature Requests</div>
          <div class="text-sm text-gray-600 dark:text-gray-400">
            Suggest new features or improvements to our service.
          </div>
        </div>

        <div class="bg-white dark:bg-gray-800/50 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
          <div class="text-2xl mb-2">🐛</div>
          <div class="font-semibold text-gray-900 dark:text-gray-200 mb-1">Bug Reports</div>
          <div class="text-sm text-gray-600 dark:text-gray-400">
            Report technical issues or bugs you've encountered.
          </div>
        </div>

      </div>
    </section>

    <!-- Business Inquiries -->
    <section class="bg-gradient-to-br from-blue-500/10 to-purple-500/10 dark:from-blue-500/5 dark:to-purple-500/5 border border-blue-200 dark:border-blue-800 rounded-xl p-8">
      <div class="flex items-start gap-4">
        <div class="text-4xl">💼</div>
        <div>
          <h2 class="text-2xl font-semibold mb-3 text-gray-900 dark:text-gray-100">Business Inquiries</h2>
          <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
            For partnerships, business opportunities, or enterprise solutions, please contact us at <a href="mailto:<?= SITE_EMAIL ?>" class="text-blue-500 hover:text-blue-400 font-semibold"><?= SITE_EMAIL ?></a> with "Business Inquiry" in the subject line.
          </p>
        </div>
      </div>
    </section>

  </div>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
