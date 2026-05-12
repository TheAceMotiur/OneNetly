<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 text-black relative overflow-hidden">
    <!-- Premium Background Effects -->
    <div class="fixed inset-0 pointer-events-none">
      <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-gradient-to-br from-blue-50/30 via-purple-50/20 to-transparent rounded-full blur-3xl animate-float"></div>
      <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-gradient-to-tr from-pink-50/30 via-orange-50/20 to-transparent rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[1000px] h-[1000px] bg-gradient-to-r from-indigo-50/20 via-transparent to-violet-50/20 rounded-full blur-3xl animate-float" style="animation-delay: 4s;"></div>
    </div>
    
    <!-- Header -->
    <AppHeader />
    
    <!-- Main Content -->
    <main class="relative z-10">
      <slot />
    </main>
    
    <!-- Footer -->
    <AppFooter />
  </div>
</template>

<script setup>
// Layout component
</script>
