<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg border-b border-gray-200 sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-black text-white rounded-lg flex items-center justify-center font-bold">
              ON
            </div>
            <div>
              <h1 class="text-xl font-bold text-black">OneNetly</h1>
              <p class="text-xs text-gray-500 font-medium">Free Edition</p>
            </div>
          </div>
          
          <div class="hidden md:flex items-center space-x-8">
            <a href="#features" class="text-gray-700 hover:text-black font-medium transition-colors">Features</a>
            <a href="#demo" class="text-gray-700 hover:text-black font-medium transition-colors">Demo</a>
            <router-link to="/docs" class="text-gray-700 hover:text-black font-medium transition-colors">Docs</router-link>
            <router-link to="/about" class="text-gray-700 hover:text-black font-medium transition-colors">About</router-link>
          </div>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-20 pb-16 bg-gradient-to-br from-gray-50 via-white to-gray-100">
      <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(0,0,0,0.02)_1px,transparent_1px)] bg-[size:50px_50px]"></div>
      
      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <div class="inline-flex items-center px-6 py-3 bg-black text-white text-sm font-bold rounded-full mb-8 shadow-lg">
            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse mr-3"></span>
            FREE & OPEN SOURCE • READY TO USE
            <svg class="w-4 h-4 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
          </div>
          
          <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black leading-tight tracking-tight mb-8">
            <span class="block text-gray-900">Enterprise</span>
            <span class="block text-gray-900">Social</span>
            <span class="block bg-gradient-to-r from-gray-900 via-black to-gray-700 bg-clip-text text-transparent">Sharing</span>
          </h1>
          
          <p class="text-xl sm:text-2xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
            The most <span class="font-bold text-gray-900">advanced social sharing solution</span> for modern websites.
            <span class="block mt-2 font-semibold text-gray-800">Zero dependencies • Privacy-first • Completely free</span>
          </p>
          
          <!-- Stats -->
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-2xl mx-auto">
            <div class="text-center">
              <div class="flex items-center justify-center gap-2 mb-1">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-2xl font-black text-gray-900">5KB</span>
              </div>
              <span class="text-sm font-bold text-gray-600 uppercase tracking-wide">Minified Size</span>
            </div>
            <div class="text-center">
              <div class="flex items-center justify-center gap-2 mb-1">
                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                <span class="text-2xl font-black text-gray-900">50M+</span>
              </div>
              <span class="text-sm font-bold text-gray-600 uppercase tracking-wide">Downloads</span>
            </div>
            <div class="text-center">
              <div class="flex items-center justify-center gap-2 mb-1">
                <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse"></div>
                <span class="text-2xl font-black text-gray-900">99.9%</span>
              </div>
              <span class="text-sm font-bold text-gray-600 uppercase tracking-wide">Uptime</span>
            </div>
            <div class="text-center">
              <div class="flex items-center justify-center gap-2 mb-1">
                <div class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></div>
                <span class="text-2xl font-black text-gray-900">24/7</span>
              </div>
              <span class="text-sm font-bold text-gray-600 uppercase tracking-wide">Support</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <div class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-800 text-sm font-bold rounded-full mb-6">
            ✨ Features & Benefits 🚀
          </div>
          <h2 class="text-4xl sm:text-5xl font-bold mb-6 text-gray-900">
            Why Choose <span class="bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">OneNetly</span>?
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Built with <span class="font-semibold text-gray-800">simplicity</span> and <span class="font-semibold text-gray-800">performance</span> in mind
          </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="group bg-white p-8 rounded-2xl border-2 border-gray-200 hover:border-black hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
            <div class="w-14 h-14 bg-gradient-to-br from-gray-900 to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-4 text-gray-900">Lightning Fast</h3>
            <p class="text-gray-600 leading-relaxed">Under <span class="font-semibold text-gray-800">5KB</span> minified and gzipped. Loads instantly without affecting your site performance.</p>
          </div>
          
          <div class="group bg-white p-8 rounded-2xl border-2 border-gray-200 hover:border-black hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
            <div class="w-14 h-14 bg-gradient-to-br from-gray-900 to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-4 text-gray-900">Fully Responsive</h3>
            <p class="text-gray-600 leading-relaxed">Works perfectly on <span class="font-semibold text-gray-800">all devices</span> and screen sizes with touch-friendly interface.</p>
          </div>
          
          <div class="group bg-white p-8 rounded-2xl border-2 border-gray-200 hover:border-black hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
            <div class="w-14 h-14 bg-gradient-to-br from-gray-900 to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-4 text-gray-900">Highly Customizable</h3>
            <p class="text-gray-600 leading-relaxed">Customize <span class="font-semibold text-gray-800">colors, position, and social networks</span> to match your brand perfectly.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Demo Section -->
    <section id="demo" class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <div class="inline-flex items-center px-4 py-2 bg-black text-white text-sm font-medium rounded-full mb-6">
            🚀 Live Demo
          </div>
          <h2 class="text-4xl sm:text-5xl font-bold mb-6 text-gray-900">
            Try It <span class="bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">Live</span>
          </h2>
          <p class="text-xl text-gray-600">
            Customize your widget and generate the code instantly
          </p>
        </div>
        
        <div class="max-w-4xl mx-auto">
          <div class="bg-white rounded-3xl p-8 shadow-2xl border-2 border-gray-200">
            <!-- Browser Mockup -->
            <div class="bg-gray-100 rounded-t-2xl p-4 -m-8 mb-8 border-b-2 border-gray-300">
              <div class="flex items-center gap-3 mb-3">
                <div class="flex gap-2">
                  <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                  <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                  <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                </div>
                <div class="flex-1 bg-white rounded-lg px-4 py-2 text-sm text-gray-600">
                  https://yourwebsite.com
                </div>
              </div>
            </div>
            
            <!-- Content Preview -->
            <div class="space-y-4 mb-8">
              <div class="h-4 bg-gray-300 rounded w-3/4"></div>
              <div class="h-3 bg-gray-200 rounded w-1/2"></div>
              <div class="h-3 bg-gray-200 rounded w-2/3"></div>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-6 mb-6">
              <div class="h-24 bg-gray-300 rounded-lg mb-3"></div>
              <div class="space-y-2">
                <div class="h-2 bg-gray-300 rounded w-full"></div>
                <div class="h-2 bg-gray-200 rounded w-3/4"></div>
              </div>
            </div>
            
            <!-- Share Widget Preview -->
            <div class="relative">
              <div class="absolute bottom-4 right-4 w-14 h-14 bg-black rounded-full flex items-center justify-center cursor-pointer hover:scale-110 transition-transform duration-300 shadow-2xl">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                </svg>
                <div class="absolute inset-0 bg-black rounded-full animate-ping opacity-20"></div>
              </div>
              
              <div class="text-center py-8">
                <h3 class="text-lg font-bold mb-3">Quick Integration</h3>
                <p class="text-gray-600 mb-4">Just add this simple script tag to your website:</p>
                
                <div class="bg-gray-900 text-green-400 p-4 rounded-lg font-mono text-sm relative">
                  &lt;script src="https://onenetly.com/widget.js"&gt;&lt;/script&gt;
                  <button class="absolute top-2 right-2 bg-gray-700 hover:bg-gray-600 text-white px-3 py-1 rounded text-xs transition-colors">
                    Copy
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap gap-4">
          <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-white text-black rounded-lg flex items-center justify-center font-bold text-sm">
              ON
            </div>
            <div>
              <h3 class="text-lg font-bold">OneNetly</h3>
              <p class="text-sm text-gray-400">Free & Open Source</p>
            </div>
          </div>
          
          <div class="text-sm text-gray-400">
            © 2024 OneNetly. Free social sharing widget.
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  name: 'TestPage'
}
</script>
