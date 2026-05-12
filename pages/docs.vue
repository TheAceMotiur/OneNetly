<template>
  <div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black mb-6 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
          Documentation
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
          Complete guide to integrate and customize OneNetly social sharing widget
        </p>
      </div>

      <div class="prose prose-lg max-w-none">
        <section class="mb-12">
          <h2 class="text-3xl font-bold mb-4">Quick Start</h2>
          <p class="text-gray-600 mb-4">Add OneNetly to your website in seconds with just one script tag:</p>
          <div class="bg-gray-900 rounded-xl p-6 mb-4">
            <code class="text-green-400 text-sm">
              &lt;script src="https://cdn.onenetly.com/widget.min.js"<br>
              &nbsp;&nbsp;data-position="bottom-right"<br>
              &nbsp;&nbsp;data-networks="facebook,twitter,linkedin"&gt;<br>
              &lt;/script&gt;
            </code>
          </div>
        </section>

        <section class="mb-12">
          <h2 class="text-3xl font-bold mb-4">Customization Options</h2>
          <ul class="space-y-4 text-gray-600">
            <li><strong>data-position:</strong> bottom-right, bottom-left, top-right, top-left</li>
            <li><strong>data-networks:</strong> Comma-separated list (facebook, twitter, linkedin, whatsapp, telegram, reddit, pinterest, email)</li>
            <li><strong>data-theme:</strong> light, dark, auto</li>
            <li><strong>data-ad-blocker-detector:</strong> true, false</li>
          </ul>
        </section>

        <section class="mb-12">
          <h2 class="text-3xl font-bold mb-4">Advanced Configuration</h2>
          <p class="text-gray-600 mb-4">For advanced use cases, you can initialize the widget programmatically:</p>
          <div class="bg-gray-900 rounded-xl p-6">
            <code class="text-green-400 text-sm">
              OneNetly.init({{'{'}}<br>
              &nbsp;&nbsp;position: 'bottom-right',<br>
              &nbsp;&nbsp;networks: ['facebook', 'twitter', 'linkedin'],<br>
              &nbsp;&nbsp;theme: 'auto',<br>
              &nbsp;&nbsp;adBlockerDetector: false<br>
              {{'}'}});
            </code>
          </div>
        </section>

        <section>
          <h2 class="text-3xl font-bold mb-4">Browser Support</h2>
          <p class="text-gray-600">
            OneNetly works on all modern browsers including Chrome, Firefox, Safari, Edge, and mobile browsers. IE11 is not supported.
          </p>
        </section>
      </div>
    </div>
  </div>
</template>

<script setup>
useHead({
  title: 'Documentation - OneNetly',
  meta: [
    { name: 'description', content: 'Complete documentation for OneNetly social sharing widget' }
  ]
})
</script>
