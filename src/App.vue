<script setup>
import CleanShareButton from './components/CleanShareButton.vue'
</script>

<template>
  <div class="min-h-screen">
    <router-view />
    
    <!-- Clean Share Button - only show on homepage -->
    <CleanShareButton v-if="$route.path === '/'" />
  </div>
</template>
