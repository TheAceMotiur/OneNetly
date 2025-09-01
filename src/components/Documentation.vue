<template>
  <div>
    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <div class="grid lg:grid-cols-4 gap-8">
        <!-- Sidebar -->
        <div class="lg:col-span-1">
          <div class="sticky top-24 space-y-6">
            <div>
              <h3 class="text-lg font-bold text-black mb-4">Getting Started</h3>
              <ul class="space-y-2">
                <li><a href="#installation" class="text-gray-600 hover:text-black font-medium transition-colors">Installation</a></li>
                <li><a href="#basic-usage" class="text-gray-600 hover:text-black font-medium transition-colors">Basic Usage</a></li>
                <li><a href="#configuration" class="text-gray-600 hover:text-black font-medium transition-colors">Configuration</a></li>
              </ul>
            </div>
            <div>
              <h3 class="text-lg font-bold text-black mb-4">API Reference</h3>
              <ul class="space-y-2">
                <li><a href="#data-attributes" class="text-gray-600 hover:text-black font-medium transition-colors">Data Attributes</a></li>
                <li><a href="#javascript-api" class="text-gray-600 hover:text-black font-medium transition-colors">JavaScript API</a></li>
                <li><a href="#events" class="text-gray-600 hover:text-black font-medium transition-colors">Events</a></li>
              </ul>
            </div>
            <div>
              <h3 class="text-lg font-bold text-black mb-4">Examples</h3>
              <ul class="space-y-2">
                <li><a href="#basic-example" class="text-gray-600 hover:text-black font-medium transition-colors">Basic Example</a></li>
                <li><a href="#custom-styling" class="text-gray-600 hover:text-black font-medium transition-colors">Custom Styling</a></li>
                <li><a href="#advanced-usage" class="text-gray-600 hover:text-black font-medium transition-colors">Advanced Usage</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-3">
          <!-- Ad Placement: Top of Documentation -->
          <AdSense 
            ad-slot="4878379783"
            :show-label="true"
            container-class="mb-12"
            :lazy-load="true"
          />
          
          <div class="prose prose-lg max-w-none">
            <h1 class="text-4xl font-bold text-black mb-8">OneNetly Documentation</h1>
            <p class="text-xl text-gray-600 mb-12">Learn how to integrate OneNetly's free social sharing widget into your website in minutes.</p>

            <!-- Installation -->
            <section id="installation" class="mb-16">
              <h2 class="text-3xl font-bold text-black mb-6">Installation</h2>
              <p class="text-gray-600 mb-6">Add OneNetly to your website with a single script tag. No build process or dependencies required.</p>
              
              <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-6">
                <pre class="text-sm"><code>&lt;script src="https://onenetly.com/widget.js"&gt;&lt;/script&gt;</code></pre>
              </div>

              <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <p class="text-blue-800 font-semibold">💡 Pro Tip</p>
                <p class="text-blue-700 mt-2">For optimal performance, place the script tag before the closing &lt;/body&gt; tag.</p>
              </div>
            </section>

            <!-- Basic Usage -->
            <section id="basic-usage" class="mb-16">
              <h2 class="text-3xl font-bold text-black mb-6">Basic Usage</h2>
              <p class="text-gray-600 mb-6">Once the script is loaded, OneNetly will automatically create a floating share button on your page.</p>
              
              <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-6">
                <pre class="text-sm"><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;My Website&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Welcome to my website&lt;/h1&gt;
    &lt;p&gt;This is my content...&lt;/p&gt;
    
    &lt;script src="https://onenetly.com/widget.js"&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
              </div>

              <p class="text-gray-600">That's it! OneNetly will automatically detect your page content and provide sharing options for all major social networks.</p>
            </section>

            <!-- Configuration -->
            <section id="configuration" class="mb-16">
              <h2 class="text-3xl font-bold text-black mb-6">Configuration</h2>
              <p class="text-gray-600 mb-6">Customize OneNetly's behavior using data attributes on the script tag or any element on your page.</p>
              
              <h3 class="text-xl font-semibold text-black mb-4">Script Configuration</h3>
              <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-6">
                <pre class="text-sm"><code>&lt;script 
    src="https://onenetly.com/widget.js"
    data-position="left"
    data-theme="light"
    data-networks="facebook,twitter,linkedin"
&gt;&lt;/script&gt;</code></pre>
              </div>

              <h3 class="text-xl font-semibold text-black mb-4">Page Content Override</h3>
              <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-6">
                <pre class="text-sm"><code>&lt;div 
    data-share-url="https://example.com/custom-page"
    data-share-title="Custom Share Title"
    data-share-description="Custom description for sharing"
    data-share-image="https://example.com/image.jpg"
&gt;
    &lt;!-- Your content --&gt;
&lt;/div&gt;</code></pre>
              </div>
            </section>

            <!-- Ad Placement: Middle of Documentation -->
            <AdSense 
              ad-slot="4878379783"
              :show-label="true"
              container-class="my-16"
              :lazy-load="true"
            />

            <!-- Data Attributes -->
            <section id="data-attributes" class="mb-16">
              <h2 class="text-3xl font-bold text-black mb-6">Data Attributes Reference</h2>
              
              <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg">
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-4 py-3 text-left font-semibold text-black border-b">Attribute</th>
                      <th class="px-4 py-3 text-left font-semibold text-black border-b">Default</th>
                      <th class="px-4 py-3 text-left font-semibold text-black border-b">Description</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200">
                    <tr>
                      <td class="px-4 py-3 font-mono text-sm">data-position</td>
                      <td class="px-4 py-3 text-gray-600">right</td>
                      <td class="px-4 py-3 text-gray-600">Position of the floating button (left, right)</td>
                    </tr>
                    <tr>
                      <td class="px-4 py-3 font-mono text-sm">data-theme</td>
                      <td class="px-4 py-3 text-gray-600">dark</td>
                      <td class="px-4 py-3 text-gray-600">Theme appearance (dark, light)</td>
                    </tr>
                    <tr>
                      <td class="px-4 py-3 font-mono text-sm">data-networks</td>
                      <td class="px-4 py-3 text-gray-600">all</td>
                      <td class="px-4 py-3 text-gray-600">Comma-separated list of social networks to show</td>
                    </tr>
                    <tr>
                      <td class="px-4 py-3 font-mono text-sm">data-share-url</td>
                      <td class="px-4 py-3 text-gray-600">current page</td>
                      <td class="px-4 py-3 text-gray-600">Custom URL to share</td>
                    </tr>
                    <tr>
                      <td class="px-4 py-3 font-mono text-sm">data-share-title</td>
                      <td class="px-4 py-3 text-gray-600">page title</td>
                      <td class="px-4 py-3 text-gray-600">Custom title for sharing</td>
                    </tr>
                    <tr>
                      <td class="px-4 py-3 font-mono text-sm">data-share-description</td>
                      <td class="px-4 py-3 text-gray-600">meta description</td>
                      <td class="px-4 py-3 text-gray-600">Custom description for sharing</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>

            <!-- JavaScript API -->
            <section id="javascript-api" class="mb-16">
              <h2 class="text-3xl font-bold text-black mb-6">JavaScript API</h2>
              <p class="text-gray-600 mb-6">Control OneNetly programmatically with JavaScript methods.</p>
              
              <h3 class="text-xl font-semibold text-black mb-4">Available Methods</h3>
              <div class="space-y-4">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                  <h4 class="font-mono text-sm font-semibold mb-2">OneNetly.show()</h4>
                  <p class="text-gray-600 text-sm">Shows the floating share button</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                  <h4 class="font-mono text-sm font-semibold mb-2">OneNetly.hide()</h4>
                  <p class="text-gray-600 text-sm">Hides the floating share button</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                  <h4 class="font-mono text-sm font-semibold mb-2">OneNetly.toggle()</h4>
                  <p class="text-gray-600 text-sm">Toggles the panel open/closed state</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                  <h4 class="font-mono text-sm font-semibold mb-2">OneNetly.updateConfig(options)</h4>
                  <p class="text-gray-600 text-sm">Updates the widget configuration dynamically</p>
                </div>
              </div>
            </section>

            <!-- Basic Example -->
            <section id="basic-example" class="mb-16">
              <h2 class="text-3xl font-bold text-black mb-6">Live Example</h2>
              <p class="text-gray-600 mb-6">See OneNetly in action on this very page! The floating share button is powered by the same code you'll use.</p>
              
              <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <p class="text-green-800 font-semibold">✅ Try it now</p>
                <p class="text-green-700 mt-2">Click the floating share button on the right side of this page to see OneNetly in action.</p>
              </div>
            </section>

            <!-- Support -->
            <section id="support" class="mb-16">
              <h2 class="text-3xl font-bold text-black mb-6">Support & Community</h2>
              <p class="text-gray-600 mb-6">Need help? Our community and support resources are here for you.</p>
              
              <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                  <h3 class="font-semibold text-black mb-2">GitHub Repository</h3>
                  <p class="text-gray-600 text-sm mb-4">Report issues, contribute, or browse the source code.</p>
                  <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Visit GitHub →</a>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                  <h3 class="font-semibold text-black mb-2">Community Forum</h3>
                  <p class="text-gray-600 text-sm mb-4">Ask questions and connect with other developers.</p>
                  <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Join Discussion →</a>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8">
          <div class="md:col-span-2">
            <div class="flex items-center space-x-3 mb-4">
              <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.50-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92S19.61 16.08 18 16.08z"/>
                </svg>
              </div>
              <div>
                <h3 class="text-xl font-black">OneNetly</h3>
                <p class="text-sm text-gray-400 font-semibold">Free & Open Source</p>
              </div>
            </div>
            <p class="text-gray-300 max-w-md">
              Free social sharing widget for modern websites. No registration required, completely open source.
            </p>
          </div>
          <div>
            <h4 class="font-semibold mb-4">Resources</h4>
            <ul class="space-y-2">
              <li><router-link to="/" class="text-gray-400 hover:text-white transition-colors">Home</router-link></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Documentation</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Examples</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">GitHub</a></li>
            </ul>
          </div>
          <div>
            <h4 class="font-semibold mb-4">Legal</h4>
            <ul class="space-y-2">
              <li><router-link to="/privacy" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</router-link></li>
              <li><router-link to="/terms" class="text-gray-400 hover:text-white transition-colors">Terms of Service</router-link></li>
              <li><router-link to="/cookies" class="text-gray-400 hover:text-white transition-colors">Cookie Policy</router-link></li>
              <li><a href="https://opensource.org/licenses/MIT" target="_blank" class="text-gray-400 hover:text-white transition-colors">MIT License</a></li>
            </ul>
          </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
          <p class="text-gray-400 text-sm">
            © 2024 OneNetly. Free & open source social sharing widget.
          </p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { onMounted } from 'vue'
import AdSense from './AdSense.vue'

onMounted(() => {
  // Load the widget for demo purposes
  if (!document.querySelector('script[src*="widget.js"]')) {
    const script = document.createElement('script');
    script.src = '/widget.js';
    document.body.appendChild(script);
  }
})
</script>
