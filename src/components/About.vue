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
            <router-link to="/about" class="relative text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
              About
              <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-black"></span>
            </router-link>
          </div>
        </div>
      </div>
    </nav>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
      <!-- Hero Section -->
      <div class="text-center mb-20">
        <h1 class="text-6xl font-bold mb-6 bg-gradient-to-r from-black to-gray-600 bg-clip-text text-transparent">
          About OneNetly
        </h1>
        <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
          OneNetly is a professional social sharing widget designed to make content sharing 
          effortless, fast, and accessible for every website on the internet.
        </p>
      </div>

      <!-- Mission Section -->
      <section class="mb-20">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
          <div>
            <h2 class="text-4xl font-bold mb-8 text-black">Our Mission</h2>
            <div class="space-y-6">
              <p class="text-gray-600 text-lg leading-relaxed">
                We believe that sharing great content should be effortless. OneNetly was created to eliminate the 
                barriers between content creators and their audiences, providing a lightweight, powerful solution 
                that works everywhere.
              </p>
              <p class="text-gray-600 text-lg leading-relaxed">
                In a world where social media platforms come and go, OneNetly focuses on the fundamentals: 
                reliable sharing, universal compatibility, and complete user control.
              </p>
            </div>
          </div>
          <div class="bg-gray-50 border border-gray-200 rounded-2xl p-8">
            <div class="text-center">
              <div class="w-20 h-20 bg-black rounded-2xl flex items-center justify-center mx-auto mb-6">
                <span class="text-white font-bold text-2xl">O</span>
              </div>
              <h3 class="text-2xl font-bold mb-4 text-black">Free & Open Source</h3>
              <p class="text-gray-600">
                No hidden costs, no premium tiers. OneNetly is completely free and always will be.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Values Section -->
      <section class="mb-20">
        <h2 class="text-4xl font-bold mb-12 text-center text-black">Our Core Values</h2>
        <div class="grid md:grid-cols-3 gap-8">
          <div class="bg-gray-50 border border-gray-200 rounded-2xl p-8 text-center hover:border-gray-300 transition-all duration-300">
            <div class="w-16 h-16 bg-gradient-to-br from-gray-600 to-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-4 text-black">Privacy First</h3>
            <p class="text-gray-600 leading-relaxed">
              No tracking, no data collection, no user registration required. Your content and your users' privacy matter.
            </p>
          </div>
          <div class="bg-gray-50 border border-gray-200 rounded-2xl p-8 text-center hover:border-gray-300 transition-all duration-300">
            <div class="w-16 h-16 bg-gradient-to-br from-gray-600 to-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-4 text-black">Lightning Fast</h3>
            <p class="text-gray-600 leading-relaxed">
              Minimal code, maximum performance. OneNetly loads instantly and never slows down your website.
            </p>
          </div>
          <div class="bg-gray-50 border border-gray-200 rounded-2xl p-8 text-center hover:border-gray-300 transition-all duration-300">
            <div class="w-16 h-16 bg-gradient-to-br from-gray-600 to-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-4 text-black">Free Forever</h3>
            <p class="text-gray-600 leading-relaxed">
              No freemium models, no hidden costs. OneNetly is completely free and will always remain so.
            </p>
          </div>
        </div>
      </section>

      <!-- Technology Section -->
      <section class="mb-20">
        <h2 class="text-4xl font-bold mb-12 text-center text-black">Built with Modern Web Standards</h2>
        <div class="bg-gray-50 border border-gray-200 rounded-2xl p-12">
          <div class="grid lg:grid-cols-2 gap-12">
            <div>
              <h3 class="text-2xl font-bold mb-6 text-black">Pure JavaScript</h3>
              <p class="text-gray-600 mb-6 leading-relaxed">
                No dependencies, no frameworks. OneNetly is built with vanilla JavaScript for maximum 
                compatibility and minimal footprint.
              </p>
              <ul class="text-gray-600 space-y-3">
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  Zero external dependencies
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  Works with any website or framework
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  Less than 10KB total size
                </li>
              </ul>
            </div>
            <div>
              <h3 class="text-2xl font-bold mb-6 text-black">Standards Compliant</h3>
              <p class="text-gray-600 mb-6 leading-relaxed">
                Built using modern web standards and best practices for accessibility, 
                performance, and user experience.
              </p>
              <ul class="text-gray-600 space-y-3">
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  WCAG 2.1 accessibility compliant
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  Mobile-first responsive design
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  Progressive enhancement
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- Stats Section -->
      <section class="mb-20">
        <h2 class="text-4xl font-bold mb-12 text-center text-black">OneNetly by the Numbers</h2>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
          <div class="text-center bg-gray-50 border border-gray-200 rounded-2xl p-8 hover:border-gray-300 transition-all duration-300">
            <div class="text-4xl font-bold mb-2 bg-gradient-to-r from-black to-gray-600 bg-clip-text text-transparent">100K+</div>
            <div class="text-gray-600 font-medium">Websites Using OneNetly</div>
          </div>
          <div class="text-center bg-gray-50 border border-gray-200 rounded-2xl p-8 hover:border-gray-300 transition-all duration-300">
            <div class="text-4xl font-bold mb-2 bg-gradient-to-r from-black to-gray-600 bg-clip-text text-transparent">50M+</div>
            <div class="text-gray-600 font-medium">Monthly Shares</div>
          </div>
          <div class="text-center bg-gray-50 border border-gray-200 rounded-2xl p-8 hover:border-gray-300 transition-all duration-300">
            <div class="text-4xl font-bold mb-2 bg-gradient-to-r from-black to-gray-600 bg-clip-text text-transparent">99.9%</div>
            <div class="text-gray-600 font-medium">Uptime</div>
          </div>
          <div class="text-center bg-gray-50 border border-gray-200 rounded-2xl p-8 hover:border-gray-300 transition-all duration-300">
            <div class="text-4xl font-bold mb-2 bg-gradient-to-r from-black to-gray-600 bg-clip-text text-transparent">&lt; 10KB</div>
            <div class="text-gray-600 font-medium">Total Size</div>
          </div>
        </div>
      </section>

      <!-- Contact Section -->
      <section class="text-center bg-gray-50 border border-gray-200 rounded-2xl p-12">
        <h2 class="text-4xl font-bold mb-6 text-black">Get in Touch</h2>
        <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto leading-relaxed">
          Have questions, suggestions, or want to contribute? We'd love to hear from you.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
          <router-link to="/docs" class="bg-black text-white px-8 py-4 rounded-xl font-semibold hover:bg-gray-800 transition-all duration-300">
            View Documentation
          </router-link>
          <a href="https://github.com" target="_blank" class="border border-gray-400 text-black px-8 py-4 rounded-xl font-semibold hover:border-black hover:bg-gray-100 transition-all duration-300">
            GitHub Repository
          </a>
        </div>
      </section>
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
              <span class="text-xl font-bold">OneNetly</span>
            </div>
            <p class="text-gray-400 mb-4">
              Professional social sharing widget for modern websites.
            </p>
          </div>
          <div>
            <h4 class="font-semibold mb-4">Product</h4>
            <ul class="space-y-2">
              <li><router-link to="/docs" class="text-gray-400 hover:text-white transition-colors">Documentation</router-link></li>
              <li><router-link to="/about" class="text-gray-400 hover:text-white transition-colors">About</router-link></li>
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
        <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-400">
          <p>&copy; 2025 OneNetly. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  name: 'About'
}
</script>
