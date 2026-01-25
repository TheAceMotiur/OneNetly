<template>
  <div 
    v-if="isVisible"
    :class="[
      'fixed z-40 transition-all duration-300',
      position === 'bottom' ? 'bottom-0 left-0 right-0' : 'top-0 left-0 right-0',
      'bg-white shadow-lg border-t border-gray-200'
    ]"
  >
    <div class="relative max-w-7xl mx-auto">
      <!-- Close button -->
      <button
        @click="closeAd"
        class="absolute top-2 right-2 z-50 bg-gray-800 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-black transition-colors text-xs font-bold"
        aria-label="Close ad"
      >
        ✕
      </button>
      
      <!-- Sticky Ad Unit -->
      <div class="flex justify-center p-2">
        <ins 
          class="adsbygoogle"
          style="display:inline-block;min-width:320px;max-width:970px;width:100%;height:90px"
          data-ad-client="ca-pub-9354746037074515"
          :data-ad-slot="adSlot"
          data-ad-format="horizontal"
          data-full-width-responsive="true"
        ></ins>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const props = defineProps({
  adSlot: {
    type: String,
    default: '4878379783'
  },
  position: {
    type: String,
    default: 'bottom' // top or bottom
  },
  delaySeconds: {
    type: Number,
    default: 5 // Show after 5 seconds
  }
})

const isVisible = ref(false)
let showTimeout = null
const closedByUser = ref(false)

onMounted(() => {
  // Check if user previously closed it
  const wasClosed = sessionStorage.getItem('stickyAdClosed')
  if (wasClosed) {
    return
  }

  // Show after delay
  showTimeout = setTimeout(() => {
    if (!closedByUser.value) {
      isVisible.value = true
      // Push ad after showing
      if (window.adsbygoogle) {
        try {
          window.adsbygoogle.push({})
        } catch (error) {
          console.warn('Sticky ad error:', error)
        }
      }
    }
  }, props.delaySeconds * 1000)
})

const closeAd = () => {
  isVisible.value = false
  closedByUser.value = true
  sessionStorage.setItem('stickyAdClosed', 'true')
}

onUnmounted(() => {
  if (showTimeout) {
    clearTimeout(showTimeout)
  }
})
</script>

<style scoped>
/* Ensure sticky ad doesn't overlap content */
.fixed {
  backdrop-filter: blur(4px);
}
</style>
