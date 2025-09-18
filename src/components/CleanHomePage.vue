<template>
  <div>
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center py-8 xs:py-12 sm:py-16 bg-gradient-to-br from-gray-50 via-white to-gray-100 overflow-hidden safe-area-left safe-area-right">
      <!-- Professional Background Effects -->
      <div class="absolute inset-0">
        <!-- Sophisticated grid pattern -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(0,0,0,0.02)_1px,transparent_1px)] bg-[size:20px_20px] xs:bg-[size:30px_30px] sm:bg-[size:40px_40px] opacity-40"></div>
        <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(0,0,0,0.02)_1px,transparent_1px)] bg-[size:20px_20px] xs:bg-[size:30px_30px] sm:bg-[size:40px_40px] opacity-30"></div>
        
        <!-- Premium floating elements -->
        <div class="absolute top-1/4 left-1/4 w-1.5 h-1.5 xs:w-2 xs:h-2 bg-gradient-to-br from-black to-gray-600 rounded-full animate-ping opacity-20"></div>
        <div class="absolute top-1/3 right-1/3 w-1 h-1 xs:w-1.5 xs:h-1.5 bg-gradient-to-br from-gray-800 to-black rounded-full animate-ping opacity-25" style="animation-delay: 1.5s;"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1.5 h-1.5 xs:w-2 xs:h-2 bg-gradient-to-br from-black to-gray-700 rounded-full animate-ping opacity-15" style="animation-delay: 3s;"></div>
        <div class="absolute top-1/2 right-1/4 w-1 h-1 xs:w-1.5 xs:h-1.5 bg-gradient-to-br from-gray-900 to-black rounded-full animate-ping opacity-30" style="animation-delay: 4.5s;"></div>
        
        <!-- Premium gradient orbs - Reduced size for mobile -->
        <div class="absolute top-6 xs:top-12 left-4 xs:left-12 w-32 xs:w-48 sm:w-64 lg:w-96 xl:w-[500px] h-32 xs:h-48 sm:h-64 lg:h-96 xl:h-[500px] bg-gradient-to-br from-black/8 via-gray-900/5 to-transparent rounded-full blur-3xl animate-float opacity-60"></div>
        <div class="absolute bottom-6 xs:bottom-12 right-4 xs:right-12 w-40 xs:w-56 sm:w-80 lg:w-[500px] xl:w-[600px] h-40 xs:h-56 sm:h-80 lg:h-[500px] xl:h-[600px] bg-gradient-to-tl from-gray-900/6 via-black/4 to-transparent rounded-full blur-3xl animate-float opacity-70" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 xs:w-80 sm:w-[400px] lg:w-[600px] xl:w-[800px] h-64 xs:h-80 sm:h-[400px] lg:h-[600px] xl:h-[800px] bg-gradient-to-r from-transparent via-black/3 to-transparent rounded-full blur-3xl animate-float opacity-50" style="animation-delay: 4s;"></div>
        
        <!-- Professional geometric shapes - Adjusted for mobile -->
        <div class="absolute top-12 xs:top-24 right-1/4 w-12 xs:w-16 sm:w-20 lg:w-32 h-12 xs:h-16 sm:h-20 lg:h-32 border border-black/5 rounded-xl xs:rounded-2xl rotate-12 animate-float opacity-30" style="animation-delay: 6s;"></div>
        <div class="absolute bottom-12 xs:bottom-24 left-1/4 w-8 xs:w-12 sm:w-16 lg:w-24 h-8 xs:h-12 sm:h-16 lg:h-24 border border-gray-800/8 rounded-lg xs:rounded-xl rotate-45 animate-float opacity-25" style="animation-delay: 8s;"></div>
      </div>
      
      <div class="relative z-10 w-full max-w-7xl mx-auto px-4 xs:px-6 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:grid lg:grid-cols-2 gap-8 xs:gap-12 sm:gap-16 lg:gap-20 items-center justify-center min-h-[calc(100vh-4rem)]">
          <!-- Enhanced Professional Content -->
          <div class="text-center lg:text-left w-full max-w-4xl mx-auto lg:mx-0 px-2 xs:px-4 sm:px-0">
            <!-- Premium Status Badge -->
            <div class="inline-flex items-center px-3 py-2 xs:px-4 xs:py-2.5 sm:px-6 sm:py-3 bg-gradient-to-r from-black via-gray-900 to-black text-white text-[10px] xs:text-xs sm:text-sm font-black rounded-lg xs:rounded-xl sm:rounded-2xl mb-4 xs:mb-6 sm:mb-8 shadow-xl hover:shadow-2xl transition-all duration-500 hover:scale-105 animate-bounce-gentle cursor-pointer group border border-gray-700">
              <div class="relative mr-2 xs:mr-2.5 sm:mr-3">
                <span class="w-1 h-1 xs:w-1.5 xs:h-1.5 sm:w-2 sm:h-2 bg-green-400 rounded-full animate-pulse block shadow-lg"></span>
                <span class="absolute inset-0 w-1 h-1 xs:w-1.5 xs:h-1.5 sm:w-2 sm:h-2 bg-green-400 rounded-full animate-ping opacity-75"></span>
                <span class="absolute inset-0 w-1 h-1 xs:w-1.5 xs:h-1.5 sm:w-2 sm:h-2 bg-green-300 rounded-full animate-ping opacity-50" style="animation-delay: 0.5s;"></span>
              </div>
              <span class="group-hover:text-green-400 transition-colors duration-300 tracking-wide text-[10px] xs:text-xs sm:text-sm whitespace-nowrap">FREE & OPEN SOURCE</span>
              <svg class="w-2.5 h-2.5 xs:w-3 xs:h-3 sm:w-4 sm:h-4 ml-2 xs:ml-2.5 sm:ml-3 opacity-70 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
              </svg>
            </div>
            
            <!-- Professional Main Title -->
            <h1 class="text-xl xs:text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-black leading-[0.95] xs:leading-[0.9] tracking-tight mb-4 xs:mb-6 sm:mb-8">
              <span class="block text-gray-900 opacity-0 animate-fade-in-up" style="animation-delay: 0.3s; animation-fill-mode: forwards;">Best Social Sharing Widget</span>
              <span class="block text-gray-900 opacity-0 animate-fade-in-up" style="animation-delay: 0.5s; animation-fill-mode: forwards;">for Modern</span>
              <span class="block bg-gradient-to-r from-gray-900 via-black to-gray-700 bg-clip-text text-transparent opacity-0 animate-fade-in-up" style="animation-delay: 0.7s; animation-fill-mode: forwards;">Websites</span>
            </h1>
            
            <!-- Professional Description -->
            <h2 class="text-sm xs:text-base sm:text-lg lg:text-xl xl:text-2xl text-gray-600 mb-4 xs:mb-6 sm:mb-8 max-w-3xl leading-[1.5] xs:leading-[1.4] opacity-0 animate-fade-in-up font-semibold" style="animation-delay: 0.9s; animation-fill-mode: forwards;">
              OneNetly is the most <span class="font-black text-gray-900">advanced social sharing widget</span> and <span class="font-bold text-gray-800">social media buttons solution</span> for websites. 
              <span class="font-bold text-gray-800 block mt-2 xs:mt-3">Free social sharing plugin • Privacy-first • Zero dependencies • 5KB lightweight</span>
            </h2>
            <!-- Enhanced Professional Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 xs:gap-3 sm:gap-4 lg:gap-6 justify-center lg:justify-start opacity-0 animate-fade-in-up" style="animation-delay: 1.3s; animation-fill-mode: forwards;">
              <div class="text-center lg:text-left group bg-white/50 rounded-lg p-2 xs:p-3">
                <div class="flex items-center justify-center lg:justify-start gap-1 xs:gap-1.5 sm:gap-2 mb-1 xs:mb-1.5">
                  <div class="w-1 h-1 xs:w-1.5 xs:h-1.5 sm:w-2 sm:h-2 bg-green-500 rounded-full animate-pulse shadow-lg"></div>
                  <span class="text-base xs:text-lg sm:text-xl font-black text-gray-900 group-hover:text-green-600 transition-colors duration-300">5KB</span>
                </div>
                <span class="text-[10px] xs:text-xs sm:text-sm font-bold text-gray-600 tracking-wide uppercase">Minified Size</span>
              </div>
              <div class="text-center lg:text-left group bg-white/50 rounded-lg p-2 xs:p-3">
                <div class="flex items-center justify-center lg:justify-start gap-1 xs:gap-1.5 sm:gap-2 mb-1 xs:mb-1.5">
                  <div class="w-1 h-1 xs:w-1.5 xs:h-1.5 sm:w-2 sm:h-2 bg-blue-500 rounded-full animate-pulse shadow-lg" style="animation-delay: 0.5s;"></div>
                  <span class="text-base xs:text-lg sm:text-xl font-black text-gray-900 group-hover:text-blue-600 transition-colors duration-300">50M+</span>
                </div>
                <span class="text-[10px] xs:text-xs sm:text-sm font-bold text-gray-600 tracking-wide uppercase">Downloads</span>
              </div>
              <div class="text-center lg:text-left group bg-white/50 rounded-lg p-2 xs:p-3">
                <div class="flex items-center justify-center lg:justify-start gap-1 xs:gap-1.5 sm:gap-2 mb-1 xs:mb-1.5">
                  <div class="w-1 h-1 xs:w-1.5 xs:h-1.5 sm:w-2 sm:h-2 bg-purple-500 rounded-full animate-pulse shadow-lg" style="animation-delay: 1s;"></div>
                  <span class="text-base xs:text-lg sm:text-xl font-black text-gray-900 group-hover:text-purple-600 transition-colors duration-300">99.9%</span>
                </div>
                <span class="text-[10px] xs:text-xs sm:text-sm font-bold text-gray-600 tracking-wide uppercase">Uptime</span>
              </div>
              <div class="text-center lg:text-left group bg-white/50 rounded-lg p-2 xs:p-3">
                <div class="flex items-center justify-center lg:justify-start gap-1 xs:gap-1.5 sm:gap-2 mb-1 xs:mb-1.5">
                  <div class="w-1 h-1 xs:w-1.5 xs:h-1.5 sm:w-2 sm:h-2 bg-orange-500 rounded-full animate-pulse shadow-lg" style="animation-delay: 1.5s;"></div>
                  <span class="text-base xs:text-lg sm:text-xl font-black text-gray-900 group-hover:text-orange-600 transition-colors duration-300">24/7</span>
                </div>
                <span class="text-[10px] xs:text-xs sm:text-sm font-bold text-gray-600 tracking-wide uppercase">Support</span>
              </div>
            </div>
          </div>
          
          <!-- Professional Visual Demo -->
          <div class="relative w-full max-w-lg mx-auto lg:max-w-none opacity-0 animate-fade-in-up" style="animation-delay: 1.5s; animation-fill-mode: forwards;">
            <!-- Premium Device Mockup -->
            <div class="relative bg-gradient-to-br from-white via-gray-50 to-gray-100 rounded-xl xs:rounded-2xl sm:rounded-3xl p-4 xs:p-6 sm:p-8 shadow-2xl border-2 border-gray-200/50 transform hover:rotate-0 transition-all duration-700 hover:shadow-3xl group">
              <!-- Enhanced Browser Chrome -->
              <div class="bg-gradient-to-r from-gray-100 to-gray-200 rounded-t-xl xs:rounded-t-2xl sm:rounded-t-3xl p-3 xs:p-4 sm:p-6 border-b-2 border-gray-300 -m-4 xs:-m-6 sm:-m-8 mb-4 xs:mb-6 sm:mb-8">
                <div class="flex items-center gap-2 xs:gap-3 sm:gap-4 mb-2 xs:mb-3 sm:mb-4">
                  <div class="flex gap-1.5 xs:gap-2 sm:gap-3">
                    <div class="w-2.5 h-2.5 xs:w-3 xs:h-3 sm:w-4 sm:h-4 bg-red-500 rounded-full shadow-lg hover:scale-110 transition-transform duration-200 cursor-pointer"></div>
                    <div class="w-2.5 h-2.5 xs:w-3 xs:h-3 sm:w-4 sm:h-4 bg-yellow-500 rounded-full shadow-lg hover:scale-110 transition-transform duration-200 cursor-pointer"></div>
                    <div class="w-2.5 h-2.5 xs:w-3 xs:h-3 sm:w-4 sm:h-4 bg-green-500 rounded-full shadow-lg hover:scale-110 transition-transform duration-200 cursor-pointer"></div>
                  </div>
                  <div class="flex-1 bg-white rounded-lg xs:rounded-xl px-2 xs:px-4 sm:px-6 py-1.5 xs:py-2 sm:py-3 text-[10px] xs:text-xs sm:text-sm text-gray-600 font-mono shadow-inner border border-gray-300 truncate">
                    https://yourwebsite.com/content
                  </div>
                  <div class="hidden sm:flex gap-2">
                    <div class="w-5 h-5 xs:w-6 xs:h-6 bg-gray-300 rounded-md"></div>
                    <div class="w-5 h-5 xs:w-6 xs:h-6 bg-gray-300 rounded-md"></div>
                  </div>
                </div>
              </div>
              
              <!-- Enhanced Content Preview -->
              <div class="space-y-4 xs:space-y-6">
                <div class="space-y-3 xs:space-y-4">
                  <div class="h-4 xs:h-5 sm:h-6 bg-gradient-to-r from-gray-300 to-gray-200 rounded-lg"></div>
                  <div class="h-3 xs:h-4 bg-gradient-to-r from-gray-200 to-gray-100 rounded w-4/5"></div>
                  <div class="h-3 xs:h-4 bg-gradient-to-r from-gray-200 to-gray-100 rounded w-3/5"></div>
                </div>
                
                <div class="bg-gradient-to-br from-gray-100 to-gray-50 rounded-xl xs:rounded-2xl p-3 xs:p-4 sm:p-6 border border-gray-200">
                  <div class="h-16 xs:h-20 sm:h-24 md:h-32 bg-gradient-to-br from-gray-300 to-gray-200 rounded-lg xs:rounded-xl mb-2 xs:mb-3 sm:mb-4"></div>
                  <div class="space-y-1.5 xs:space-y-2">
                    <div class="h-2 xs:h-2.5 sm:h-3 bg-gradient-to-r from-gray-300 to-gray-200 rounded w-full"></div>
                    <div class="h-2 xs:h-2.5 sm:h-3 bg-gradient-to-r from-gray-200 to-gray-100 rounded w-3/4"></div>
                  </div>
                </div>
              </div>
              
              <!-- Premium Widget Preview with Advanced Animation -->
              <div class="absolute bottom-3 xs:bottom-4 sm:bottom-6 md:bottom-8 right-3 xs:right-4 sm:right-6 md:right-8 animate-bounce-gentle">
                <div class="relative group">
                  <div class="bg-gradient-to-br from-black via-gray-900 to-black rounded-lg xs:rounded-xl sm:rounded-2xl w-12 h-12 xs:w-14 xs:h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 flex items-center justify-center cursor-pointer hover:scale-110 transition-all duration-500 shadow-2xl ring-2 xs:ring-4 ring-black/10 hover:ring-4 xs:hover:ring-8 hover:ring-black/20 group-hover:rotate-12">
                    <svg class="w-5 h-5 xs:w-6 xs:h-6 sm:w-7 sm:h-7 md:w-9 md:h-9 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                    </svg>
                  </div>
                  <!-- Enhanced Pulse Rings -->
                  <div class="absolute inset-0 bg-black rounded-lg xs:rounded-xl sm:rounded-2xl animate-ping opacity-20"></div>
                  <div class="absolute inset-0 bg-gray-800 rounded-lg xs:rounded-xl sm:rounded-2xl animate-ping opacity-15" style="animation-delay: 0.5s;"></div>
                  <div class="absolute inset-0 bg-gray-900 rounded-lg xs:rounded-xl sm:rounded-2xl animate-ping opacity-10" style="animation-delay: 1s;"></div>
                </div>
              </div>
            </div>
            
            <!-- Premium Floating Elements -->
            <div class="absolute -top-2 xs:-top-4 sm:-top-6 -left-2 xs:-left-4 sm:-left-6 w-12 xs:w-16 sm:w-20 lg:w-24 h-12 xs:h-16 sm:h-20 lg:h-24 bg-gradient-to-br from-blue-500/20 to-purple-600/20 rounded-xl xs:rounded-2xl sm:rounded-3xl rotate-12 opacity-60 animate-float border border-blue-200"></div>
            <div class="absolute -bottom-2 xs:-bottom-4 sm:-bottom-6 -right-2 xs:-right-4 sm:-right-6 w-10 xs:w-14 sm:w-16 lg:w-20 h-10 xs:h-14 sm:h-16 lg:h-20 bg-gradient-to-br from-pink-500/20 to-red-500/20 rounded-lg xs:rounded-xl sm:rounded-2xl opacity-50 animate-float border border-pink-200" style="animation-delay: 1.5s"></div>
            <div class="absolute top-1/2 -left-3 xs:-left-6 sm:-left-8 w-8 xs:w-12 sm:w-14 lg:w-16 h-8 xs:h-12 sm:h-14 lg:h-16 bg-gradient-to-br from-green-500/20 to-emerald-500/20 rounded-full opacity-40 animate-float border border-green-200" style="animation-delay: 3s"></div>
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
            Why OneNetly is the{' '}
            <span class="relative inline-block">
              <span class="bg-gradient-to-r from-gray-900 via-black to-gray-700 bg-clip-text text-transparent">Best Social Sharing Widget</span>
              <div class="absolute -bottom-2 left-0 right-0 h-1 bg-gradient-to-r from-black to-gray-600 rounded-full transform scale-x-0 animate-fade-in-up" style="animation-delay: 1s; animation-fill-mode: forwards;"></div>
            </span>
          </h2>
          <p class="text-xl lg:text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed opacity-0 animate-fade-in-up" style="animation-delay: 0.5s; animation-fill-mode: forwards;">
            Our <span class="font-semibold text-gray-800">free social sharing widget</span> combines <span class="font-semibold text-gray-800">performance, privacy, and simplicity</span> to deliver the ultimate social media buttons solution for your website.
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

          <!-- Feature 7 - Ad Blocker Detector (NEW) -->
          <div class="group bg-white p-6 sm:p-8 rounded-2xl sm:rounded-3xl border-2 border-gray-200 hover:border-black hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 hover:rotate-1 relative overflow-hidden cursor-pointer lg:col-span-1">
            <!-- Animated background gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 via-red-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 rounded-3xl"></div>
            <!-- Shine effect -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out" style="animation-delay: 0.3s;"></div>
            
            <div class="relative z-10">
              <div class="w-16 h-16 bg-gradient-to-br from-orange-600 via-red-600 to-orange-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 shadow-lg group-hover:shadow-2xl">
                <svg class="w-8 h-8 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
              </div>
              <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-3 sm:mb-4 text-gray-900 group-hover:text-black transition-colors duration-300">
                Ad Blocker Detector
                <span class="inline-block bg-orange-100 text-orange-700 text-xs font-bold px-2 py-1 rounded-full ml-2">NEW</span>
              </h3>
              <p class="text-sm sm:text-base text-gray-600 group-hover:text-gray-800 leading-relaxed transition-colors duration-300">
                <span class="font-semibold text-gray-800">Privacy-friendly detection</span> with respectful notifications. No tracking, just a gentle heads-up to users with ad blockers.
              </p>
              
              <!-- Hover indicator -->
              <div class="absolute top-4 right-4 w-3 h-3 bg-orange-400 rounded-full opacity-0 group-hover:opacity-100 animate-pulse transition-opacity duration-300"></div>
            </div>
          </div>

          <!-- Feature 8 - Fill the grid -->
          <div class="group bg-white p-6 sm:p-8 rounded-xl sm:rounded-2xl border border-gray-200 hover:border-gray-300 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 relative overflow-hidden lg:col-span-1">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="relative">
              <div class="w-14 h-14 bg-gradient-to-br from-gray-900 to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 9v8a1 1 0 001 1h8a1 1 0 001-1v-8M7 9h10l-1 9H8L7 9z"></path>
                </svg>
              </div>
              <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-3 sm:mb-4 text-gray-900">SEO Friendly</h3>
              <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Doesn't interfere with your page's SEO. Clean, semantic markup with proper meta tags support.</p>
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

            <!-- Ad Blocker Detector -->
            <div class="mb-6 sm:mb-8">
              <label class="block text-base sm:text-lg font-bold text-gray-900 mb-3 sm:mb-4">
                Ad Blocker Detector
                <span class="inline-block bg-orange-100 text-orange-700 text-xs font-bold px-2 py-1 rounded-full ml-2">NEW</span>
              </label>
              <div class="space-y-3">
                <label 
                  :class="[
                    'flex items-center justify-between p-4 border-2 rounded-xl cursor-pointer transition-all duration-300 transform hover:scale-105',
                    adBlockerDetector
                      ? 'bg-orange-50 text-orange-900 border-orange-300 shadow-lg'
                      : 'bg-white text-gray-700 border-gray-300 hover:border-gray-400 hover:shadow-md'
                  ]"
                >
                  <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                      </svg>
                    </div>
                    <div>
                      <div class="text-sm font-semibold">{{ adBlockerDetector ? 'Enabled' : 'Disabled' }}</div>
                      <div class="text-xs text-gray-500">{{ adBlockerDetector ? 'Shows friendly notifications to users with ad blockers' : 'No ad blocker detection' }}</div>
                    </div>
                  </div>
                  <input 
                    type="checkbox" 
                    v-model="adBlockerDetector"
                    :class="[
                      'w-5 h-5 rounded transition-colors duration-200',
                      adBlockerDetector 
                        ? 'bg-orange-500 border-orange-500 text-white' 
                        : 'bg-white border-gray-300'
                    ]"
                  >
                </label>
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                  <div class="flex items-start space-x-2">
                    <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div class="text-xs text-blue-700">
                      <strong>Privacy-friendly:</strong> No tracking or data collection. Just a respectful notification that appears briefly and can be dismissed by users.
                    </div>
                  </div>
                </div>
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

    <!-- FAQ Section for SEO -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-gray-900">
            Frequently Asked Questions About Social Sharing Widgets
          </h2>
          <p class="text-xl text-gray-600">
            Everything you need to know about OneNetly social sharing widget
          </p>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-8">
          <div class="space-y-6">
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">What is a social sharing widget?</h3>
              <p class="text-gray-600">A social sharing widget is a tool that allows website visitors to easily share content on social media platforms like Facebook, Twitter, LinkedIn, and WhatsApp. OneNetly provides the best free social sharing widget with privacy-first design.</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">Why choose OneNetly over other social sharing widgets?</h3>
              <p class="text-gray-600">OneNetly is the best social sharing widget because it's only 5KB, completely free, privacy-first, has zero dependencies, and supports all major social platforms. Unlike other social sharing plugins, it doesn't track users.</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">How to install OneNetly social sharing widget?</h3>
              <p class="text-gray-600">Installing our social sharing widget is simple - just add one script tag to your website. No registration required, no complex setup. It's the easiest social sharing plugin to integrate.</p>
            </div>

            <div class="bg-orange-50 border border-orange-200 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-orange-900 flex items-center">
                <span class="bg-orange-100 text-orange-700 text-xs font-bold px-2 py-1 rounded-full mr-2">NEW</span>
                Does OneNetly detect ad blockers?
              </h3>
              <p class="text-orange-800">Yes! OneNetly includes an optional privacy-friendly ad blocker detector that shows respectful notifications to users with ad blockers. It doesn't track users or interfere with ad blocking - just provides a friendly heads-up that can be easily dismissed.</p>
            </div>
          </div>
          
          <div class="space-y-6">
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">Is OneNetly social sharing widget free?</h3>
              <p class="text-gray-600">Yes! OneNetly is completely free and open-source. Unlike other social sharing widgets that charge for premium features, all OneNetly features are free forever.</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">Which social media platforms does the widget support?</h3>
              <p class="text-gray-600">Our social sharing widget supports Facebook, Twitter, LinkedIn, WhatsApp, Telegram, Pinterest, Reddit, Email, and more. It's the most comprehensive free social media buttons solution available.</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">Is the social sharing widget mobile-friendly?</h3>
              <p class="text-gray-600">Absolutely! OneNetly social sharing widget is fully responsive and optimized for mobile devices. The social media buttons work perfectly on all screen sizes and touch devices.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

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
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import AdSense from './AdSense.vue'

const selectedPosition = ref('bottom-right')
const selectedSocials = ref(['Facebook', 'Twitter', 'LinkedIn', 'WhatsApp', 'Telegram', 'Reddit'])
const adBlockerDetector = ref(false)
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
        data-networks="${selectedSocials.value.join(',')}"
        data-ad-blocker-detector="${adBlockerDetector.value}">
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
  script.setAttribute('data-ad-blocker-detector', 'true')
  document.head.appendChild(script)
})
</script>
