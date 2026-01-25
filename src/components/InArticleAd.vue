<template>
  <div class="w-full my-6 flex justify-center">
    <div class="max-w-5xl w-full mx-auto">
      <!-- In-Article Ad Label -->
      <div v-if="showLabel" class="text-center mb-2">
        <span class="text-xs text-gray-400 font-medium uppercase tracking-wide">Advertisement</span>
      </div>
      
      <!-- In-Article Ad Unit - Higher CPM -->
      <div class="flex justify-center">
        <ins 
          class="adsbygoogle"
          style="display:block;text-align:center"
          data-ad-client="ca-pub-9354746037074515"
          :data-ad-slot="adSlot"
          data-ad-format="fluid"
          data-ad-layout="in-article"
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
      console.warn('In-article ad error:', error)
    }
  }
})
</script>

<style scoped>
.adsbygoogle {
  min-height: 200px;
}
</style>
