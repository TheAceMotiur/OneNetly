<template>
  <div class="min-h-screen bg-white text-black">
    <!-- Header -->
    <AppHeader />
    
    <!-- Main Content -->
    <main>
      <slot />
    </main>
    
    <!-- Footer -->
    <AppFooter />
  </div>
</template>

<script setup>
import AppHeader from './AppHeader.vue'
import AppFooter from './AppFooter.vue'
</script>

<style scoped>
/* Global layout styles */
</style>
