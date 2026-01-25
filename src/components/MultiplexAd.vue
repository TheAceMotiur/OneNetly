<template>
  <div class="w-full my-12 flex justify-center">
    <div class="max-w-7xl w-full mx-auto px-4">
      <!-- Multiplex Ad Label -->
      <div v-if="showLabel" class="text-center mb-4">
        <span class="text-xs text-gray-400 font-medium uppercase tracking-wide">Recommended Content</span>
      </div>
      
      <!-- Multiplex Ad Unit - Native Ads Grid -->
      <div class="flex justify-center">
        <ins 
          class="adsbygoogle"
          style="display:block"
          data-ad-client="ca-pub-9354746037074515"
          :data-ad-slot="adSlot"
          data-ad-format="autorelaxed"
        ></ins>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from 'vue'

const props = defineProps({
  adSlot: {
    type: String,
    default: '4878379783'
  },
  showLabel: {
    type: Boolean,
    default: true
  }
})

onMounted(() => {
  if (window.adsbygoogle) {
    try {
      window.adsbygoogle.push({})
    } catch (error) {
      console.warn('Multiplex ad error:', error)
    }
  }
})
</script>

<style scoped>
.adsbygoogle {
  min-height: 400px;
}
</style>
