<template>
  <div class="w-full py-6 flex justify-center">
    <div class="max-w-full overflow-hidden">
      <!-- Mobile-specific ad label -->
      <div v-if="showLabel" class="text-center py-1 mb-2">
        <span class="text-xs text-gray-400 font-medium uppercase tracking-wide">Sponsored</span>
      </div>
      
      <!-- Mobile-optimized AdSense -->
      <ins 
        class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-9354746037074515"
        :data-ad-slot="mobileAdSlot"
        data-ad-format="rectangle"
        :data-full-width-responsive="false"
        data-ad-test="on"
      ></ins>
    </div>
  </div>
</template>

<script setup>
import { onMounted, nextTick } from 'vue'

const props = defineProps({
  mobileAdSlot: {
    type: String,
    default: '4878379783'
  },
  showLabel: {
    type: Boolean,
    default: true
  }
})

onMounted(() => {
  nextTick(() => {
    try {
      if (window.adsbygoogle) {
        window.adsbygoogle.push({})
      }
    } catch (error) {
      console.warn('Mobile AdSense loading error:', error)
    }
  })
})
</script>

<style scoped>
/* Mobile-specific ad styling */
.adsbygoogle {
  min-height: 250px;
  min-width: 300px;
  max-width: 100%;
}

@media (max-width: 480px) {
  .adsbygoogle {
    min-height: 200px;
    min-width: 280px;
  }
}
</style>
