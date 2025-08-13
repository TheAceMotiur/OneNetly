<template>
  <div class="min-h-screen bg-white text-black">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-xl border-b border-gray-200/50 sticky top-0 z-50 shadow-lg">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
          <!-- Enhanced Logo -->
          <div class="flex items-center space-x-4">
            <div class="relative group">
              <router-link to="/" class="w-12 h-12 bg-gradient-to-br from-black via-gray-800 to-black rounded-2xl flex items-center justify-center shadow-xl group-hover:shadow-2xl transition-all duration-500 transform group-hover:rotate-12 group-hover:scale-105">
                <span class="text-white font-black text-lg tracking-wide">ON</span>
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              </router-link>
            </div>
            <div>
              <router-link to="/" class="block">
                <h1 class="text-2xl font-black text-black tracking-tight">OneNetly</h1>
                <p class="text-xs text-gray-500 font-bold tracking-[0.2em] uppercase">Social Sharing Widget</p>
              </router-link>
            </div>
          </div>
          
          <!-- Enhanced Desktop Menu -->
          <div class="hidden md:flex items-center space-x-12">
            <router-link to="/#features" class="relative text-gray-700 hover:text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
              Features
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
            </router-link>
            <router-link to="/#demo" class="relative text-gray-700 hover:text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
              Live Demo
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
            </router-link>
            <router-link to="/docs" class="relative text-gray-700 hover:text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
              Documentation
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
            </router-link>
            <router-link to="/about" class="relative text-gray-700 hover:text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
              About
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
            </router-link>
          </div>
        </div>
      </div>
    </nav>

    <!-- Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <div class="bg-white">
        <h1 class="text-5xl font-bold mb-4 text-black">Privacy Policy</h1>
        <p class="text-gray-500 mb-12 text-lg">Last updated: August 11, 2025</p>

        <!-- Ad Placement: Privacy Policy Top -->
        <AdSense 
          ad-slot="4878379783"
          :show-label="true"
          container-class="mb-12"
          :lazy-load="true"
        />

        <div class="space-y-12">
          <section>
            <h2 class="text-3xl font-bold mb-6 text-black">Introduction</h2>
            <p class="text-gray-700 leading-relaxed text-lg">
              OneNetly ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our social sharing widget service.
            </p>
          </section>

          <section>
            <h2 class="text-3xl font-bold mb-6 text-black">Information We Collect</h2>
            <div class="space-y-8">
              <div class="bg-gray-50 border border-gray-200 rounded-xl p-8">
                <h3 class="text-xl font-semibold mb-4 text-black">Usage Data</h3>
                <p class="text-gray-700 leading-relaxed">
                  We may collect information about how you interact with our widget, including pages visited, click patterns, and sharing activities.
                </p>
              </div>
              <div class="bg-gray-50 border border-gray-200 rounded-xl p-8">
                <h3 class="text-xl font-semibold mb-4 text-black">Technical Information</h3>
                <p class="text-gray-700 leading-relaxed">
                  We automatically collect certain technical information, including your IP address, browser type, device information, and operating system.
                </p>
              </div>
            </div>
          </section>

          <section>
            <h2 class="text-3xl font-bold mb-6 text-black">How We Use Your Information</h2>
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-8">
              <ul class="space-y-3 text-gray-700">
                <li class="flex items-start">
                  <svg class="w-6 h-6 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  To provide and maintain our service
                </li>
                <li class="flex items-start">
                  <svg class="w-6 h-6 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  To improve and optimize our widget functionality
                </li>
                <li class="flex items-start">
                  <svg class="w-6 h-6 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  To analyze usage patterns and trends
                </li>
                <li class="flex items-start">
                  <svg class="w-6 h-6 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  To ensure security and prevent abuse
                </li>
              </ul>
            </div>
          </section>

          <section>
            <h2 class="text-3xl font-bold mb-6 text-black">Data Sharing</h2>
            <div class="bg-green-50 border border-green-200 rounded-xl p-8">
              <p class="text-gray-700 leading-relaxed text-lg">
                We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this policy or as required by law.
              </p>
            </div>
          </section>

          <section>
            <h2 class="text-3xl font-bold mb-6 text-black">Data Security</h2>
            <p class="text-gray-700 leading-relaxed text-lg">
              We implement appropriate security measures to protect your information. However, no method of transmission over the internet is 100% secure.
            </p>
          </section>

          <section>
            <h2 class="text-3xl font-bold mb-6 text-black">Contact Us</h2>
            <div class="bg-gray-100 border border-gray-300 rounded-xl p-8 text-center">
              <p class="text-gray-700 leading-relaxed text-lg mb-4">
                If you have any questions about this Privacy Policy, please contact us:
              </p>
              <a href="mailto:privacy@onenetly.com" class="inline-flex items-center px-6 py-3 bg-black text-white font-semibold rounded-lg hover:bg-gray-800 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
                privacy@onenetly.com
              </a>
            </div>
          </section>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t border-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div class="col-span-1 md:col-span-2">
            <div class="flex items-center space-x-2 mb-4">
              <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                <span class="text-black font-bold text-lg">O</span>
              </div>
              <span class="text-xl font-bold text-white">OneNetly</span>
            </div>
            <p class="text-gray-400 mb-4">
              Professional social sharing widget for modern websites.
            </p>
          </div>
          <div>
            <h4 class="font-semibold mb-4 text-white">Product</h4>
            <ul class="space-y-2">
              <li><router-link to="/docs" class="text-gray-400 hover:text-white transition-colors">Documentation</router-link></li>
              <li><router-link to="/about" class="text-gray-400 hover:text-white transition-colors">About</router-link></li>
            </ul>
          </div>
          <div>
            <h4 class="font-semibold mb-4 text-white">Legal</h4>
            <ul class="space-y-2">
              <li><router-link to="/privacy" class="text-white font-medium">Privacy Policy</router-link></li>
              <li><router-link to="/terms" class="text-gray-400 hover:text-white transition-colors">Terms of Service</router-link></li>
              <li><router-link to="/cookies" class="text-gray-400 hover:text-white transition-colors">Cookie Policy</router-link></li>
              <li><a href="https://opensource.org/licenses/MIT" target="_blank" class="text-gray-400 hover:text-white transition-colors">MIT License</a></li>
            </ul>
          </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-400">
          <p>&copy; 2025 OneNetly. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import AdSense from './AdSense.vue'
</script>
