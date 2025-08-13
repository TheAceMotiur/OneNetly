<template>
  <div class="min-h-screen bg-white text-black">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-xl border-b border-gray-200/50 sticky top-0 z-50 shadow-lg">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 sm:h-20">
          <!-- Enhanced Logo -->
          <div class="flex items-center space-x-3 sm:space-x-4">
            <div class="relative group">
              <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-black via-gray-800 to-black rounded-xl sm:rounded-2xl flex items-center justify-center shadow-xl group-hover:shadow-2xl transition-all duration-500 transform group-hover:rotate-12 group-hover:scale-105">
                <span class="text-white font-black text-base sm:text-lg tracking-wide">ON</span>
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-xl sm:rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              </div>
            </div>
            <div>
              <h1 class="text-xl sm:text-2xl font-black text-black tracking-tight">OneNetly</h1>
              <p class="text-xs text-gray-500 font-bold tracking-[0.2em] uppercase hidden sm:block">Social Sharing Widget</p>
            </div>
          </div>
          
          <!-- Enhanced Desktop Menu -->
          <div class="hidden md:flex items-center space-x-12">
            <a href="#features" class="relative text-gray-700 hover:text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
              Features
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#demo" class="relative text-gray-700 hover:text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
              Live Demo
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
            </a>
            <router-link to="/docs" class="relative text-gray-700 hover:text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
              Documentation
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
            </router-link>
            <router-link to="/about" class="relative text-gray-700 hover:text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
              About
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
            </router-link>
          </div>
          <!-- Mobile menu button -->
          <div class="md:hidden">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-600 hover:text-black">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </button>
          </div>
        </div>
        
        <!-- Mobile menu -->
        <div v-if="mobileMenuOpen" class="md:hidden border-t border-gray-200 py-4">
          <div class="flex flex-col space-y-4">
            <a href="#features" class="text-gray-600 hover:text-black transition-colors">Features</a>
            <a href="#demo" class="text-gray-600 hover:text-black transition-colors">Demo</a>
            <router-link to="/docs" class="text-gray-600 hover:text-black transition-colors">Docs</router-link>
            <router-link to="/about" class="text-gray-600 hover:text-black transition-colors">About</router-link>
          </div>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-20 sm:pt-24 md:pt-32 lg:pt-40 pb-16 sm:pb-20 lg:pb-32 bg-gradient-to-br from-gray-50 via-white to-gray-100 overflow-hidden">
      <!-- Professional Background Effects -->
      <div class="absolute inset-0">
        <!-- Sophisticated grid pattern -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(0,0,0,0.02)_1px,transparent_1px)] bg-[size:50px_50px] opacity-40"></div>
        <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(0,0,0,0.02)_1px,transparent_1px)] bg-[size:50px_50px] opacity-30"></div>
        
        <!-- Premium floating elements -->
        <div class="absolute top-1/4 left-1/4 w-3 h-3 bg-gradient-to-br from-black to-gray-600 rounded-full animate-ping opacity-20"></div>
        <div class="absolute top-1/3 right-1/3 w-2 h-2 bg-gradient-to-br from-gray-800 to-black rounded-full animate-ping opacity-25" style="animation-delay: 1.5s;"></div>
        <div class="absolute bottom-1/4 left-1/3 w-2.5 h-2.5 bg-gradient-to-br from-black to-gray-700 rounded-full animate-ping opacity-15" style="animation-delay: 3s;"></div>
        <div class="absolute top-1/2 right-1/4 w-1.5 h-1.5 bg-gradient-to-br from-gray-900 to-black rounded-full animate-ping opacity-30" style="animation-delay: 4.5s;"></div>
        
        <!-- Premium gradient orbs -->
        <div class="absolute top-20 left-20 w-[300px] sm:w-[400px] lg:w-[500px] h-[300px] sm:h-[400px] lg:h-[500px] bg-gradient-to-br from-black/8 via-gray-900/5 to-transparent rounded-full blur-3xl animate-float opacity-60"></div>
        <div class="absolute bottom-20 right-20 w-[400px] sm:w-[500px] lg:w-[600px] h-[400px] sm:h-[500px] lg:h-[600px] bg-gradient-to-tl from-gray-900/6 via-black/4 to-transparent rounded-full blur-3xl animate-float opacity-70" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[500px] sm:w-[600px] lg:w-[800px] h-[500px] sm:h-[600px] lg:h-[800px] bg-gradient-to-r from-transparent via-black/3 to-transparent rounded-full blur-3xl animate-float opacity-50" style="animation-delay: 4s;"></div>
        
        <!-- Professional geometric shapes -->
        <div class="absolute top-40 right-1/4 w-24 sm:w-32 h-24 sm:h-32 border border-black/5 rounded-3xl rotate-12 animate-float opacity-30" style="animation-delay: 6s;"></div>
        <div class="absolute bottom-40 left-1/4 w-16 sm:w-24 h-16 sm:h-24 border border-gray-800/8 rounded-2xl rotate-45 animate-float opacity-25" style="animation-delay: 8s;"></div>
      </div>
      
      <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-20 items-center">
          <!-- Enhanced Professional Content -->
          <div class="text-center lg:text-left order-2 lg:order-1 px-4 sm:px-0">
            <!-- Premium Status Badge -->
            <div class="inline-flex items-center px-4 sm:px-6 lg:px-8 py-3 sm:py-4 bg-gradient-to-r from-black via-gray-900 to-black text-white text-xs sm:text-sm font-black rounded-xl sm:rounded-2xl mb-8 sm:mb-12 shadow-2xl hover:shadow-3xl transition-all duration-700 hover:scale-105 animate-bounce-gentle cursor-pointer group border border-gray-700">
              <div class="relative mr-3 sm:mr-4">
                <span class="w-2 h-2 sm:w-3 sm:h-3 bg-green-400 rounded-full animate-pulse block shadow-lg"></span>
                <span class="absolute inset-0 w-2 h-2 sm:w-3 sm:h-3 bg-green-400 rounded-full animate-ping opacity-75"></span>
                <span class="absolute inset-0 w-2 h-2 sm:w-3 sm:h-3 bg-green-300 rounded-full animate-ping opacity-50" style="animation-delay: 0.5s;"></span>
              </div>
              <span class="group-hover:text-green-400 transition-colors duration-300 tracking-wide">FREE & OPEN SOURCE • READY TO USE</span>
              <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-3 sm:ml-4 opacity-70 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
              </svg>
            </div>
            
            <!-- Professional Main Title -->
            <h1 class="text-3xl xs:text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-black leading-[0.85] tracking-tight mb-8 sm:mb-10">
              <span class="block text-gray-900 opacity-0 animate-fade-in-up" style="animation-delay: 0.3s; animation-fill-mode: forwards;">Enterprise</span>
              <span class="block text-gray-900 opacity-0 animate-fade-in-up" style="animation-delay: 0.5s; animation-fill-mode: forwards;">Social</span>
              <span class="block bg-gradient-to-r from-gray-900 via-black to-gray-700 bg-clip-text text-transparent opacity-0 animate-fade-in-up" style="animation-delay: 0.7s; animation-fill-mode: forwards;">Sharing Widget</span>
            </h1>
            
            <!-- Professional Description -->
            <h2 class="text-lg sm:text-xl lg:text-2xl xl:text-3xl text-gray-600 mb-8 sm:mb-12 max-w-3xl leading-[1.4] opacity-0 animate-fade-in-up font-semibold" style="animation-delay: 0.9s; animation-fill-mode: forwards;">
              The most <span class="font-black text-gray-900">advanced social sharing solution</span> for modern websites. 
              <span class="font-bold text-gray-800 block mt-2">Zero dependencies • Privacy-first • Completely free</span>
            </h2>
            <!-- Enhanced Professional Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 justify-center lg:justify-start opacity-0 animate-fade-in-up" style="animation-delay: 1.3s; animation-fill-mode: forwards;">
              <div class="text-center lg:text-left group">
                <div class="flex items-center justify-center lg:justify-start gap-2 sm:gap-3 mb-2">
                  <div class="w-2 h-2 sm:w-3 sm:h-3 bg-green-500 rounded-full animate-pulse shadow-lg"></div>
                  <span class="text-xl sm:text-2xl font-black text-gray-900 group-hover:text-green-600 transition-colors duration-300">5KB</span>
                </div>
                <span class="text-xs sm:text-sm font-bold text-gray-600 tracking-wide uppercase">Minified Size</span>
              </div>
              <div class="text-center lg:text-left group">
                <div class="flex items-center justify-center lg:justify-start gap-2 sm:gap-3 mb-2">
                  <div class="w-2 h-2 sm:w-3 sm:h-3 bg-blue-500 rounded-full animate-pulse shadow-lg" style="animation-delay: 0.5s;"></div>
                  <span class="text-xl sm:text-2xl font-black text-gray-900 group-hover:text-blue-600 transition-colors duration-300">50M+</span>
                </div>
                <span class="text-xs sm:text-sm font-bold text-gray-600 tracking-wide uppercase">Downloads</span>
              </div>
              <div class="text-center lg:text-left group">
                <div class="flex items-center justify-center lg:justify-start gap-2 sm:gap-3 mb-2">
                  <div class="w-2 h-2 sm:w-3 sm:h-3 bg-purple-500 rounded-full animate-pulse shadow-lg" style="animation-delay: 1s;"></div>
                  <span class="text-xl sm:text-2xl font-black text-gray-900 group-hover:text-purple-600 transition-colors duration-300">99.9%</span>
                </div>
                <span class="text-xs sm:text-sm font-bold text-gray-600 tracking-wide uppercase">Uptime</span>
              </div>
              <div class="text-center lg:text-left group">
                <div class="flex items-center justify-center lg:justify-start gap-2 sm:gap-3 mb-2">
                  <div class="w-2 h-2 sm:w-3 sm:h-3 bg-orange-500 rounded-full animate-pulse shadow-lg" style="animation-delay: 1.5s;"></div>
                  <span class="text-xl sm:text-2xl font-black text-gray-900 group-hover:text-orange-600 transition-colors duration-300">24/7</span>
                </div>
                <span class="text-xs sm:text-sm font-bold text-gray-600 tracking-wide uppercase">Support</span>
              </div>
            </div>
          </div>
          
          <!-- Professional Visual Demo -->
          <div class="relative order-1 lg:order-2 opacity-0 animate-fade-in-up" style="animation-delay: 1.5s; animation-fill-mode: forwards;">
            <!-- Premium Device Mockup -->
            <div class="relative bg-gradient-to-br from-white via-gray-50 to-gray-100 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-2xl border-2 border-gray-200/50 transform rotate-2 hover:rotate-0 transition-all duration-700 hover:shadow-3xl group">
              <!-- Enhanced Browser Chrome -->
              <div class="bg-gradient-to-r from-gray-100 to-gray-200 rounded-t-3xl p-4 sm:p-6 border-b-2 border-gray-300 -m-6 sm:-m-8 mb-6 sm:mb-8">
                <div class="flex items-center gap-3 sm:gap-4 mb-3 sm:mb-4">
                  <div class="flex gap-2 sm:gap-3">
                    <div class="w-3 h-3 sm:w-4 sm:h-4 bg-red-500 rounded-full shadow-lg hover:scale-110 transition-transform duration-200 cursor-pointer"></div>
                    <div class="w-3 h-3 sm:w-4 sm:h-4 bg-yellow-500 rounded-full shadow-lg hover:scale-110 transition-transform duration-200 cursor-pointer"></div>
                    <div class="w-3 h-3 sm:w-4 sm:h-4 bg-green-500 rounded-full shadow-lg hover:scale-110 transition-transform duration-200 cursor-pointer"></div>
                  </div>
                  <div class="flex-1 bg-white rounded-xl px-4 sm:px-6 py-2 sm:py-3 text-xs sm:text-sm text-gray-600 font-mono shadow-inner border border-gray-300">
                    https://yourwebsite.com/premium-content
                  </div>
                  <div class="hidden sm:flex gap-2">
                    <div class="w-6 h-6 bg-gray-300 rounded-md"></div>
                    <div class="w-6 h-6 bg-gray-300 rounded-md"></div>
                  </div>
                </div>
              </div>
              
              <!-- Enhanced Content Preview -->
              <div class="space-y-6">
                <div class="space-y-4">
                  <div class="h-6 bg-gradient-to-r from-gray-300 to-gray-200 rounded-lg"></div>
                  <div class="h-4 bg-gradient-to-r from-gray-200 to-gray-100 rounded w-4/5"></div>
                  <div class="h-4 bg-gradient-to-r from-gray-200 to-gray-100 rounded w-3/5"></div>
                </div>
                
                <div class="bg-gradient-to-br from-gray-100 to-gray-50 rounded-2xl p-4 sm:p-6 border border-gray-200">
                  <div class="h-24 sm:h-32 bg-gradient-to-br from-gray-300 to-gray-200 rounded-xl mb-3 sm:mb-4"></div>
                  <div class="space-y-2">
                    <div class="h-2 sm:h-3 bg-gradient-to-r from-gray-300 to-gray-200 rounded w-full"></div>
                    <div class="h-2 sm:h-3 bg-gradient-to-r from-gray-200 to-gray-100 rounded w-3/4"></div>
                  </div>
                </div>
              </div>
              
              <!-- Premium Widget Preview with Advanced Animation -->
              <div class="absolute bottom-6 sm:bottom-8 right-6 sm:right-8 animate-bounce-gentle">
                <div class="relative group">
                  <div class="bg-gradient-to-br from-black via-gray-900 to-black rounded-xl sm:rounded-2xl w-16 h-16 sm:w-20 sm:h-20 flex items-center justify-center cursor-pointer hover:scale-110 transition-all duration-500 shadow-2xl ring-4 ring-black/10 hover:ring-8 hover:ring-black/20 group-hover:rotate-12">
                    <svg class="w-7 h-7 sm:w-9 sm:h-9 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                    </svg>
                  </div>
                  <!-- Enhanced Pulse Rings -->
                  <div class="absolute inset-0 bg-black rounded-xl sm:rounded-2xl animate-ping opacity-20"></div>
                  <div class="absolute inset-0 bg-gray-800 rounded-xl sm:rounded-2xl animate-ping opacity-15" style="animation-delay: 0.5s;"></div>
                  <div class="absolute inset-0 bg-gray-900 rounded-xl sm:rounded-2xl animate-ping opacity-10" style="animation-delay: 1s;"></div>
                </div>
              </div>
            </div>
            
            <!-- Premium Floating Elements -->
            <div class="absolute -top-4 sm:-top-6 -left-4 sm:-left-6 w-16 sm:w-20 lg:w-24 h-16 sm:h-20 lg:h-24 bg-gradient-to-br from-blue-500/20 to-purple-600/20 rounded-2xl sm:rounded-3xl rotate-12 opacity-60 animate-float border border-blue-200"></div>
            <div class="absolute -bottom-4 sm:-bottom-6 -right-4 sm:-right-6 w-14 sm:w-16 lg:w-20 h-14 sm:h-16 lg:h-20 bg-gradient-to-br from-pink-500/20 to-red-500/20 rounded-xl sm:rounded-2xl opacity-50 animate-float border border-pink-200" style="animation-delay: 1.5s"></div>
            <div class="absolute top-1/2 -left-6 sm:-left-8 w-12 sm:w-14 lg:w-16 h-12 sm:h-14 lg:h-16 bg-gradient-to-br from-green-500/20 to-emerald-500/20 rounded-full opacity-40 animate-float border border-green-200" style="animation-delay: 3s"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- Strategic Ad Placement 1: After Hero Section -->
    <AdSense 
      ad-slot="4878379783"
      :show-label="true"
      container-class="bg-gray-50 py-8"
      :lazy-load="true"
    />

    <!-- Features Section -->
    <section id="features" class="py-20 lg:py-32 bg-gradient-to-b from-white via-gray-50 to-white relative overflow-hidden">
      <!-- Enhanced Background Pattern -->
      <div class="absolute inset-0 opacity-5">
        <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
              <path d="M 10 0 L 0 0 0 10" fill="none" stroke="currentColor" stroke-width="0.5"/>
            </pattern>
          </defs>
          <rect width="100" height="100" fill="url(#grid)" />
        </svg>
      </div>
      
      <!-- Floating background elements -->
      <div class="absolute top-20 left-20 w-72 h-72 bg-gradient-to-br from-black/3 to-transparent rounded-full blur-3xl animate-float opacity-30"></div>
      <div class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-tl from-gray-900/2 to-transparent rounded-full blur-3xl animate-float opacity-40" style="animation-delay: 3s;"></div>
      
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 lg:mb-20">
          <!-- Enhanced section badge -->
          <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800 text-sm font-bold rounded-full mb-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 border border-gray-300">
            <span class="mr-2 text-yellow-500">✨</span>
            Features & Benefits
            <span class="ml-2 text-green-500">🚀</span>
          </div>
          
          <!-- Enhanced section title -->
          <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold mb-8 text-gray-900 tracking-tight">
            Why Choose{' '}
            <span class="relative inline-block">
              <span class="bg-gradient-to-r from-gray-900 via-black to-gray-700 bg-clip-text text-transparent">OneNetly</span>
              <div class="absolute -bottom-2 left-0 right-0 h-1 bg-gradient-to-r from-black to-gray-600 rounded-full transform scale-x-0 animate-fade-in-up" style="animation-delay: 1s; animation-fill-mode: forwards;"></div>
            </span>
            ?
          </h2>
          <p class="text-xl lg:text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed opacity-0 animate-fade-in-up" style="animation-delay: 0.5s; animation-fill-mode: forwards;">
            Built with <span class="font-semibold text-gray-800">simplicity</span> and <span class="font-semibold text-gray-800">performance</span> in mind, OneNetly provides everything you need for seamless social sharing.
          </p>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 lg:gap-10">
          <!-- Feature 1 -->
          <div class="group bg-white p-6 sm:p-8 rounded-2xl sm:rounded-3xl border-2 border-gray-200 hover:border-black hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 hover:rotate-1 relative overflow-hidden cursor-pointer">
            <!-- Animated background gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 rounded-3xl"></div>
            <!-- Shine effect -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out"></div>
            
            <div class="relative z-10">
              <div class="w-16 h-16 bg-gradient-to-br from-gray-900 via-black to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 shadow-lg group-hover:shadow-2xl">
                <svg class="w-8 h-8 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
              </div>
              <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-3 sm:mb-4 text-gray-900 group-hover:text-black transition-colors duration-300">Lightning Fast</h3>
              <p class="text-sm sm:text-base text-gray-600 group-hover:text-gray-800 leading-relaxed transition-colors duration-300">Under <span class="font-semibold text-gray-800">5KB</span> minified and gzipped. Loads instantly without affecting your site performance.</p>
              
              <!-- Hover indicator -->
              <div class="absolute top-4 right-4 w-3 h-3 bg-green-400 rounded-full opacity-0 group-hover:opacity-100 animate-pulse transition-opacity duration-300"></div>
            </div>
          </div>
          
          <!-- Feature 2 -->
          <div class="group bg-white p-6 sm:p-8 rounded-2xl sm:rounded-3xl border-2 border-gray-200 hover:border-black hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 hover:-rotate-1 relative overflow-hidden cursor-pointer">
            <!-- Animated background gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 via-emerald-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 rounded-3xl"></div>
            <!-- Shine effect -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out" style="animation-delay: 0.1s;"></div>
            
            <div class="relative z-10">
              <div class="w-16 h-16 bg-gradient-to-br from-gray-900 via-black to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 shadow-lg group-hover:shadow-2xl">
                <svg class="w-8 h-8 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
              </div>
              <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-3 sm:mb-4 text-gray-900 group-hover:text-black transition-colors duration-300">Fully Responsive</h3>
              <p class="text-sm sm:text-base text-gray-600 group-hover:text-gray-800 leading-relaxed transition-colors duration-300">Works perfectly on <span class="font-semibold text-gray-800">all devices</span> and screen sizes with touch-friendly interface.</p>
              
              <!-- Hover indicator -->
              <div class="absolute top-4 right-4 w-3 h-3 bg-blue-400 rounded-full opacity-0 group-hover:opacity-100 animate-pulse transition-opacity duration-300"></div>
            </div>
          </div>
          
          <!-- Feature 3 -->
          <div class="group bg-white p-6 sm:p-8 rounded-2xl sm:rounded-3xl border-2 border-gray-200 hover:border-black hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 hover:rotate-1 relative overflow-hidden cursor-pointer">
            <!-- Animated background gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 via-pink-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 rounded-3xl"></div>
            <!-- Shine effect -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out" style="animation-delay: 0.2s;"></div>
            
            <div class="relative z-10">
              <div class="w-16 h-16 bg-gradient-to-br from-gray-900 via-black to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 shadow-lg group-hover:shadow-2xl">
                <svg class="w-8 h-8 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </div>
              <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-3 sm:mb-4 text-gray-900 group-hover:text-black transition-colors duration-300">Highly Customizable</h3>
              <p class="text-sm sm:text-base text-gray-600 group-hover:text-gray-800 leading-relaxed transition-colors duration-300">Customize <span class="font-semibold text-gray-800">colors, position, and social networks</span> to match your brand perfectly.</p>
              
              <!-- Hover indicator -->
              <div class="absolute top-4 right-4 w-3 h-3 bg-purple-400 rounded-full opacity-0 group-hover:opacity-100 animate-pulse transition-opacity duration-300"></div>
            </div>
          </div>
          
          <!-- Feature 4 -->
          <div class="group bg-white p-6 sm:p-8 rounded-xl sm:rounded-2xl border border-gray-200 hover:border-gray-300 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-red-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="relative">
              <div class="w-14 h-14 bg-gradient-to-br from-gray-900 to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-3 sm:mb-4 text-gray-900">No Dependencies</h3>
              <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Pure vanilla JavaScript with no external dependencies or frameworks required.</p>
            </div>
          </div>
          
          <!-- Feature 5 -->
          <div class="group bg-white p-6 sm:p-8 rounded-xl sm:rounded-2xl border border-gray-200 hover:border-gray-300 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-yellow-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="relative">
              <div class="w-14 h-14 bg-gradient-to-br from-gray-900 to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
              </div>
              <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-3 sm:mb-4 text-gray-900">Privacy Focused</h3>
              <p class="text-sm sm:text-base text-gray-600 leading-relaxed">No tracking, no analytics, no data collection. Just pure social sharing functionality.</p>
            </div>
          </div>
          
          <!-- Feature 6 -->
          <div class="group bg-white p-6 sm:p-8 rounded-xl sm:rounded-2xl border border-gray-200 hover:border-gray-300 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="relative">
              <div class="w-14 h-14 bg-gradient-to-br from-gray-900 to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
              </div>
              <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-3 sm:mb-4 text-gray-900">Easy Integration</h3>
              <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Simple copy-paste integration. Works with any website, CMS, or framework.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Strategic Ad Placement 2: After Features, Before Demo -->
    <AdSense 
      ad-slot="4878379783"
      :show-label="true"
      container-class="bg-white py-12"
      :lazy-load="true"
    />

    <!-- Live Demo Section -->
    <section id="demo" class="py-20 lg:py-32 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 lg:mb-20">
          <div class="inline-flex items-center px-4 py-2 bg-black text-white text-sm font-medium rounded-full mb-6">
            🚀 Live Demo
          </div>
          <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-6 text-gray-900">
            Try It <span class="bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">Live</span>
          </h2>
          <p class="text-xl lg:text-2xl text-gray-600 leading-relaxed">
            Customize your widget and generate the code instantly
          </p>
          <p class="text-lg text-gray-500 mt-4">
            ✨ New: Super simple integration - just one script tag with data attributes!
          </p>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16">
          <!-- Customizer -->
          <div class="bg-white border-2 border-gray-200 rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10 shadow-lg">
            <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-6 sm:mb-8 text-gray-900">Customize Widget</h3>
            
            <!-- Position -->
            <div class="mb-6 sm:mb-8">
              <label class="block text-base sm:text-lg font-bold text-gray-900 mb-3 sm:mb-4">Position</label>
              <div class="grid grid-cols-2 gap-2 sm:gap-3">
                <button 
                  v-for="pos in positions" 
                  :key="pos.value"
                  @click="selectedPosition = pos.value"
                  :class="[
                    'p-3 sm:p-4 border-2 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 transform hover:scale-105',
                    selectedPosition === pos.value 
                      ? 'bg-black text-white border-black shadow-lg' 
                      : 'bg-white text-gray-700 border-gray-300 hover:border-gray-400 hover:shadow-md'
                  ]"
                >
                  {{ pos.label }}
                </button>
              </div>
            </div>
            
            <!-- Social Networks -->
            <div class="mb-6 sm:mb-8">
              <label class="block text-base sm:text-lg font-bold text-gray-900 mb-3 sm:mb-4">
                Social Networks 
                <span class="text-xs sm:text-sm font-normal text-gray-500">(Select up to 6)</span>
              </label>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-3">
                <label 
                  v-for="social in socialNetworks" 
                  :key="social.name"
                  :class="[
                    'flex items-center space-x-2 sm:space-x-3 p-3 sm:p-4 border-2 rounded-xl cursor-pointer transition-all duration-300 transform hover:scale-105',
                    selectedSocials.includes(social.name)
                      ? 'bg-black text-white border-black shadow-lg'
                      : 'bg-white text-gray-700 border-gray-300 hover:border-gray-400 hover:shadow-md'
                  ]"
                >
                  <input 
                    type="checkbox" 
                    v-model="selectedSocials" 
                    :value="social.name"
                    :disabled="selectedSocials.length >= 6 && !selectedSocials.includes(social.name)"
                    class="hidden"
                  >
                  <span class="text-xs sm:text-sm font-semibold">{{ social.name }}</span>
                </label>
              </div>
            </div>
            
            <!-- Generate Code Button -->
            <button 
              @click="generateCode"
              class="group w-full bg-gradient-to-r from-gray-900 via-black to-gray-800 text-white py-4 sm:py-5 rounded-xl sm:rounded-2xl text-base sm:text-lg font-bold hover:from-black hover:via-gray-900 hover:to-black transition-all duration-500 transform hover:-translate-y-2 hover:scale-105 shadow-2xl hover:shadow-3xl mb-6 sm:mb-8 relative overflow-hidden"
            >
              <!-- Animated background -->
              <div class="absolute inset-0 bg-gradient-to-r from-gray-800 via-gray-700 to-gray-900 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              <!-- Shine effect -->
              <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out"></div>
              
              <span class="relative z-10 flex items-center justify-center gap-2 sm:gap-3">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                </svg>
                Generate Custom Code
                <svg class="w-4 h-4 sm:w-5 sm:h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
              </span>
            </button>
            
            <!-- Generated Code -->
            <div v-if="generatedCode" class="space-y-4 sm:space-y-6 animate-fade-in-up">
              <label class="block text-base sm:text-lg font-bold text-gray-900 flex items-center gap-2 sm:gap-3">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Generated Code
              </label>
              <div class="relative group">
                <pre class="bg-gradient-to-br from-gray-900 via-gray-800 to-black text-green-400 p-4 sm:p-6 lg:p-8 rounded-xl sm:rounded-2xl text-xs sm:text-sm overflow-x-auto leading-relaxed font-mono border-2 border-gray-700 hover:border-gray-600 transition-all duration-300 shadow-2xl"><code>{{ generatedCode }}</code></pre>
                
                <!-- Enhanced copy button -->
                <button 
                  @click="copyCode"
                  :class="[
                    'absolute top-3 sm:top-4 right-3 sm:right-4 px-3 sm:px-5 py-2 sm:py-3 rounded-lg sm:rounded-xl text-xs sm:text-sm font-bold transition-all duration-300 transform hover:scale-105 shadow-lg',
                    copied 
                      ? 'bg-green-500 text-white animate-pulse' 
                      : 'bg-black/80 text-white hover:bg-black backdrop-blur-sm border border-gray-600 hover:border-gray-500'
                  ]"
                >
                  <span class="flex items-center gap-1 sm:gap-2">
                    <svg v-if="!copied" class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                    <svg v-else class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ copied ? 'Copied!' : 'Copy Code' }}
                  </span>
                </button>
                
                <!-- Code language indicator -->
                <div class="absolute top-3 sm:top-4 left-3 sm:left-4 px-2 sm:px-3 py-1 bg-blue-500 text-white text-xs font-bold rounded-md sm:rounded-lg">
                  HTML/JS
                </div>
              </div>
            </div>
          </div>
          
          <!-- Preview -->
          <div class="bg-white border-2 border-gray-200 rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10 shadow-lg relative min-h-80 sm:min-h-96">
            <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-6 sm:mb-8 text-gray-900">Live Preview</h3>
            <div class="bg-gray-50 rounded-xl sm:rounded-2xl p-4 sm:p-6 h-64 sm:h-80 relative border-2 border-gray-100 overflow-hidden">
              <!-- Sample content -->
              <div class="space-y-3 sm:space-y-4 mb-4 sm:mb-6">
                <div class="h-4 sm:h-6 bg-gray-300 rounded-lg w-3/4 animate-pulse"></div>
                <div class="h-3 sm:h-4 bg-gray-200 rounded w-full"></div>
                <div class="h-3 sm:h-4 bg-gray-200 rounded w-2/3"></div>
                <div class="h-3 sm:h-4 bg-gray-200 rounded w-4/5"></div>
              </div>
              <p class="text-gray-500 text-xs sm:text-sm mb-3 sm:mb-4">This is a sample webpage content...</p>
              <p class="text-gray-500 text-xs sm:text-sm mb-3 sm:mb-4">The OneNetly widget will appear based on your selected position.</p>
              <p class="text-gray-500 text-xs sm:text-sm">Try different positions to see how it looks!</p>
              
              <!-- Preview Widget -->
              <div 
                :class="[
                  'absolute w-12 h-12 sm:w-14 sm:h-14 bg-black rounded-full flex items-center justify-center cursor-pointer hover:scale-110 transition-all duration-300 shadow-2xl group',
                  getPositionClass(selectedPosition)
                ]"
              >
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                </svg>
                
                <!-- Pulse effect -->
                <div class="absolute inset-0 bg-black rounded-full animate-ping opacity-20"></div>
              </div>
            </div>
            
            <!-- Selected Networks Display -->
            <div class="mt-4 sm:mt-6 p-3 sm:p-4 bg-gray-50 rounded-lg sm:rounded-xl border border-gray-200">
              <h4 class="text-xs sm:text-sm font-bold text-gray-900 mb-2 sm:mb-3">Selected Networks ({{ selectedSocials.length }}/6)</h4>
              <div class="flex flex-wrap gap-1 sm:gap-2">
                <span 
                  v-for="social in selectedSocials" 
                  :key="social"
                  class="px-2 sm:px-3 py-1 bg-black text-white text-xs font-semibold rounded-full"
                >
                  {{ social }}
                </span>
                <span 
                  v-if="selectedSocials.length === 0"
                  class="px-2 sm:px-3 py-1 bg-gray-200 text-gray-500 text-xs rounded-full"
                >
                  No networks selected
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Strategic Ad Placement 3: After Demo, Before Documentation -->
    <AdSense 
      ad-slot="4878379783"
      :show-label="true"
      container-class="bg-gray-50 py-12"
      :lazy-load="true"
    />

    <!-- Documentation Section -->
    <section id="docs" class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl sm:text-4xl font-bold mb-4">Documentation</h2>
          <p class="text-xl text-gray-600">
            Everything you need to get started
          </p>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
          <!-- Doc Card 1 -->
          <div class="bg-white p-6 sm:p-8 rounded-xl border border-gray-200">
            <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4">Quick Start</h3>
            <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">Get up and running in under 30 seconds with our super simple one-line integration.</p>
            <router-link to="/docs" class="text-black font-medium hover:underline text-sm sm:text-base">Read Guide →</router-link>
          </div>
          
          <!-- Doc Card 2 -->
          <div class="bg-white p-6 sm:p-8 rounded-xl border border-gray-200">
            <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4">Customization</h3>
            <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">Learn how to customize colors, position, and social networks to match your brand.</p>
            <router-link to="/docs" class="text-black font-medium hover:underline text-sm sm:text-base">View Options →</router-link>
          </div>
          
          <!-- Doc Card 3 -->
          <div class="bg-white p-6 sm:p-8 rounded-xl border border-gray-200">
            <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4">API Reference</h3>
            <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">Complete API documentation with all available methods and configuration options.</p>
            <router-link to="/docs" class="text-black font-medium hover:underline text-sm sm:text-base">View API →</router-link>
          </div>
        </div>
      </div>
    </section>

    <!-- Strategic Ad Placement 4: Before Footer -->
    <AdSense 
      ad-slot="4878379783"
      :show-label="true"
      container-class="bg-white py-16"
      :lazy-load="true"
    />

    <!-- Premium Professional Footer -->
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
              Social Sharing Widget for modern websites. No registration required, completely open source.
            </p>
          </div>
          <div>
            <h4 class="font-semibold mb-4">Resources</h4>
            <ul class="space-y-2">
              <li><router-link to="/" class="text-gray-400 hover:text-white transition-colors">Home</router-link></li>
              <li><router-link to="/docs" class="text-gray-400 hover:text-white transition-colors">Documentation</router-link></li>
              <li><router-link to="/about" class="text-gray-400 hover:text-white transition-colors">About</router-link></li>
              <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Features</a></li>
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
import { ref, onMounted } from 'vue'
import AdSense from './AdSense.vue'

const mobileMenuOpen = ref(false)
const selectedPosition = ref('bottom-right')
const selectedSocials = ref(['Facebook', 'Twitter', 'LinkedIn'])
const generatedCode = ref('')
const copied = ref(false)

const positions = [
  { label: 'Bottom Right', value: 'bottom-right' },
  { label: 'Bottom Left', value: 'bottom-left' },
  { label: 'Top Right', value: 'top-right' },
  { label: 'Top Left', value: 'top-left' }
]

const socialNetworks = [
  { name: 'Facebook' },
  { name: 'Twitter' },
  { name: 'LinkedIn' },
  { name: 'WhatsApp' },
  { name: 'Telegram' },
  { name: 'Reddit' },
  { name: 'Pinterest' },
  { name: 'Email' }
]

function getPositionClass(position) {
  const classes = {
    'bottom-right': 'bottom-4 right-4',
    'bottom-left': 'bottom-4 left-4',
    'top-right': 'top-4 right-4',
    'top-left': 'top-4 left-4'
  }
  return classes[position] || 'bottom-4 right-4'
}

function generateCode() {
  generatedCode.value = `<script src="https://onenetly.com/widget.js" 
        data-position="${selectedPosition.value}"
        data-networks="${selectedSocials.value.join(',')}">
<\/script>`
}

function copyCode() {
  navigator.clipboard.writeText(generatedCode.value)
  copied.value = true
  setTimeout(() => {
    copied.value = false
  }, 2000)
}

// Load the OneNetly widget
onMounted(() => {
  // Create and load the widget script
  const script = document.createElement('script')
  script.src = '/widget.js'
  script.setAttribute('data-position', 'bottom-right')
  script.setAttribute('data-networks', 'Facebook,Twitter,LinkedIn,WhatsApp,Telegram,Pinterest,Tumblr,Email,Print,Copy Link')
  document.head.appendChild(script)
})
</script>
