<script setup>
import CleanShareButton from './components/CleanShareButton.vue'
import AppLayout from './components/AppLayout.vue'
</script>

<template>
  <div class="min-h-screen-safe safe-area-inset">
    <AppLayout>
      <router-view />
    </AppLayout>
    
    <!-- Clean Share Button - only show on homepage -->
    <CleanShareButton v-if="$route.path === '/'" />
  </div>
</template>

<style>
/* Global responsive optimizations */
html {
  /* Better font rendering */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
  
  /* Prevent font size inflation on mobile */
  -webkit-text-size-adjust: 100%;
  text-size-adjust: 100%;
}

body {
  /* Optimize for mobile scrolling */
  -webkit-overflow-scrolling: touch;
  overscroll-behavior: contain;
  
  /* Prevent horizontal scrolling */
  overflow-x: hidden;
  max-width: 100vw;
}

/* Enhanced focus management */
*:focus-visible {
  outline: 2px solid #3b82f6;
  outline-offset: 2px;
}

/* Optimize animations for performance */
@media (prefers-reduced-motion: no-preference) {
  * {
    transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 150ms;
  }
}
</style>
