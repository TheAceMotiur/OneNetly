<template>
  <div 
    :class="[
      'w-full my-8 flex items-center justify-center',
      containerClass
    ]"
    ref="adContainer"
  >
    <div 
      :class="[
        'max-w-full overflow-hidden rounded-lg shadow-sm border border-gray-200',
        'bg-gradient-to-r from-gray-50 to-gray-100',
        'mx-auto',
        responsive ? 'w-full max-w-5xl' : 'max-w-4xl'
      ]"
    >
      <!-- Optional Ad Label -->
      <div v-if="showLabel" class="text-center py-2 bg-gray-100 border-b border-gray-200">
        <span class="text-xs text-gray-500 font-medium uppercase tracking-wide">Advertisement</span>
      </div>
      
      <!-- AdSense Ad Unit -->
      <div class="p-4 flex justify-center">
        <ins 
          class="adsbygoogle"
          :style="getAdStyle()"
          data-ad-client="ca-pub-9354746037074515"
          :data-ad-slot="adSlot"
          :data-ad-format="adFormat"
          :data-full-width-responsive="responsive ? 'true' : 'false'"
        ></ins>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const props = defineProps({
  adSlot: {
    type: String,
    default: '4878379783'
  },
  adFormat: {
    type: String,
    default: 'auto'
  },
  responsive: {
    type: Boolean,
    default: true
  },
  showLabel: {
    type: Boolean,
    default: true
  },
  containerClass: {
    type: String,
    default: ''
  },
  lazyLoad: {
    type: Boolean,
    default: true
  }
})

const adContainer = ref(null)

const getAdStyle = () => {
  return 'display:block'
}

onMounted(() => {
  if (process.client) {
    try {
      (window.adsbygoogle = window.adsbygoogle || []).push({})
    } catch (e) {
      console.warn('AdSense error:', e)
    }
  }
})
</script>
