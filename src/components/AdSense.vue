<template>
  <div 
    :class="[
      'w-full my-8 flex justify-center',
      containerClass,
      { 'animate-fade-in-up': !isVisible }
    ]"
    ref="adContainer"
  >
    <div 
      :class="[
        'max-w-full overflow-hidden rounded-lg shadow-sm border border-gray-200',
        'bg-gradient-to-r from-gray-50 to-gray-100',
        responsive ? 'w-full' : 'max-w-4xl'
      ]"
    >
      <!-- Optional Ad Label -->
      <div v-if="showLabel" class="text-center py-2 bg-gray-100 border-b border-gray-200">
        <span class="text-xs text-gray-500 font-medium uppercase tracking-wide">Advertisement</span>
      </div>
      
      <!-- AdSense Ad Unit -->
      <div class="p-4">
        <ins 
          class="adsbygoogle"
          style="display:block"
          :data-ad-client="adClient"
          :data-ad-slot="adSlot"
          :data-ad-format="adFormat"
          :data-full-width-responsive="responsive"
          :data-ad-test="isTestMode ? 'on' : undefined"
        ></ins>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, nextTick } from 'vue'
import { adSenseManager } from '../utils/adSenseManager.js'

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
  },
  pageType: {
    type: String,
    default: 'general'
  },
  position: {
    type: String,
    default: 'content'
  },
  isTestMode: {
    type: Boolean,
    default: false // Set to true during development
  }
})

const adClient = 'ca-pub-9354746037074515'
const adContainer = ref(null)
const isVisible = ref(false)
const adConfig = ref({})
let observer = null

const loadAd = async () => {
  try {
    // Get optimal ad configuration
    adConfig.value = adSenseManager.getAdConfig(props.pageType, props.position)
    
    // Track ad load attempt
    adSenseManager.trackAdPerformance(props.adSlot, 'load_attempt')
    
    // Push the ad to AdSense with manager
    await nextTick()
    adSenseManager.pushAd(adContainer.value)
    
    // Track successful load
    adSenseManager.trackAdPerformance(props.adSlot, 'loaded')
  } catch (error) {
    console.warn('AdSense loading error:', error)
    adSenseManager.trackAdPerformance(props.adSlot, 'load_error')
  }
}

const setupIntersectionObserver = () => {
  if (!props.lazyLoad || !window.IntersectionObserver) {
    loadAd()
    return
  }

  observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !isVisible.value) {
          isVisible.value = true
          adSenseManager.trackAdPerformance(props.adSlot, 'viewport_enter')
          loadAd()
          observer.unobserve(entry.target)
        }
      })
    },
    {
      threshold: 0.1,
      rootMargin: '50px'
    }
  )

  if (adContainer.value) {
    observer.observe(adContainer.value)
  }
}

onMounted(() => {
  nextTick(() => {
    setupIntersectionObserver()
  })
})

onUnmounted(() => {
  if (observer) {
    observer.disconnect()
  }
  adSenseManager.trackAdPerformance(props.adSlot, 'unmounted')
})
</script>

<style scoped>
@keyframes fade-in-up {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in-up {
  animation: fade-in-up 0.6s ease-out forwards;
}

/* Ensure ads don't break layout */
.adsbygoogle {
  min-height: 100px;
  min-width: 300px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .adsbygoogle {
    min-height: 80px;
    min-width: 280px;
  }
}
</style>
