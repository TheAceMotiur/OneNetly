<template>
  <nav class="bg-white/95 backdrop-blur-xl border-b border-gray-200/50 sticky top-0 z-50 shadow-lg safe-area-top">
    <div class="max-w-7xl mx-auto px-4 xs:px-6 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-14 xs:h-16 sm:h-20">
        <!-- Enhanced Logo -->
        <router-link to="/" class="flex items-center space-x-2 xs:space-x-3 sm:space-x-4">
          <div class="relative group">
            <div class="w-8 h-8 xs:w-10 xs:h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-black via-gray-800 to-black rounded-lg xs:rounded-xl sm:rounded-2xl flex items-center justify-center shadow-xl group-hover:shadow-2xl transition-all duration-500 transform group-hover:rotate-12 group-hover:scale-105 relative">
              <span class="text-white font-black text-sm xs:text-base sm:text-lg tracking-wide absolute inset-0 flex items-center justify-center">ON</span>
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-lg xs:rounded-xl sm:rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>
          </div>
          <div>
            <h1 class="text-lg xs:text-xl sm:text-2xl font-black text-black tracking-tight">OneNetly</h1>
            <p class="text-xs text-gray-500 font-bold tracking-[0.1em] xs:tracking-[0.2em] uppercase hidden xs:block sm:block">Social Sharing Widget</p>
          </div>
        </router-link>
        
        <!-- Enhanced Desktop Menu -->
        <div class="hidden lg:flex items-center space-x-8 xl:space-x-12">
          <a href="/#features" class="relative text-gray-700 hover:text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
            Features
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
          </a>
          <a href="/#demo" class="relative text-gray-700 hover:text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
            Live Demo
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
          </a>
          <router-link to="/wordpress" class="relative text-gray-700 hover:text-black font-bold text-sm tracking-wide transition-all duration-300 group py-2">
            WordPress
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
        
        <!-- Mobile menu button -->
        <div class="lg:hidden">
          <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-600 hover:text-black p-2 touch-manipulation" aria-label="Toggle menu">
            <svg class="w-5 h-5 xs:w-6 xs:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path v-if="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </div>
      
      <!-- Mobile menu -->
      <div v-if="mobileMenuOpen" class="lg:hidden border-t border-gray-200 py-4">
        <div class="flex flex-col space-y-4">
          <router-link to="/" @click="mobileMenuOpen = false" class="text-gray-600 hover:text-black transition-colors py-2 px-4 rounded-lg hover:bg-gray-50">Home</router-link>
          <a href="/#features" @click="mobileMenuOpen = false" class="text-gray-600 hover:text-black transition-colors py-2 px-4 rounded-lg hover:bg-gray-50">Features</a>
          <a href="/#demo" @click="mobileMenuOpen = false" class="text-gray-600 hover:text-black transition-colors py-2 px-4 rounded-lg hover:bg-gray-50">Demo</a>
          <router-link to="/wordpress" @click="mobileMenuOpen = false" class="text-gray-600 hover:text-black transition-colors py-2 px-4 rounded-lg hover:bg-gray-50">WordPress</router-link>
          <router-link to="/docs" @click="mobileMenuOpen = false" class="text-gray-600 hover:text-black transition-colors py-2 px-4 rounded-lg hover:bg-gray-50">Docs</router-link>
          <router-link to="/about" @click="mobileMenuOpen = false" class="text-gray-600 hover:text-black transition-colors py-2 px-4 rounded-lg hover:bg-gray-50">About</router-link>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue'

const mobileMenuOpen = ref(false)
</script>

<style scoped>
.safe-area-top {
  padding-top: env(safe-area-inset-top);
}

.router-link-active {
  color: #000;
}

.router-link-active span {
  width: 100%;
}
</style>
