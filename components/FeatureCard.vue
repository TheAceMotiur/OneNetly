<template>
  <div 
    :class="[
      'group bg-white p-8 rounded-3xl border-2 border-gray-200 hover:border-black hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 relative overflow-hidden cursor-pointer',
      feature.featured ? 'hover:rotate-1' : ''
    ]"
  >
    <!-- Animated background gradient -->
    <div 
      v-if="feature.featured"
      :class="[
        'absolute inset-0 opacity-0 group-hover:opacity-100 transition-all duration-500 rounded-3xl',
        `bg-gradient-to-br ${feature.gradient} to-transparent`
      ]"
    ></div>
    
    <!-- Shine effect -->
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out"></div>
    
    <div class="relative z-10">
      <div class="w-16 h-16 bg-gradient-to-br from-gray-900 via-black to-gray-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 shadow-lg group-hover:shadow-2xl">
        <component :is="getIcon()" class="w-8 h-8 text-white group-hover:scale-110 transition-transform duration-300" />
      </div>
      <h3 class="text-2xl font-bold mb-4 text-gray-900 group-hover:text-black transition-colors duration-300">
        {{ feature.title }}
      </h3>
      <p class="text-base text-gray-600 group-hover:text-gray-800 leading-relaxed transition-colors duration-300">
        {{ feature.description }}
      </p>
      
      <!-- Hover indicator -->
      <div v-if="feature.featured" class="absolute top-4 right-4 w-3 h-3 bg-green-400 rounded-full opacity-0 group-hover:opacity-100 animate-pulse transition-opacity duration-300"></div>
    </div>
  </div>
</template>

<script setup>
import { h } from 'vue'

const props = defineProps({
  feature: {
    type: Object,
    required: true
  }
})

const getIcon = () => {
  const icons = {
    lightning: () => h('svg', {
      fill: 'none',
      stroke: 'currentColor',
      viewBox: '0 0 24 24'
    }, h('path', {
      'stroke-linecap': 'round',
      'stroke-linejoin': 'round',
      'stroke-width': '2',
      d: 'M13 10V3L4 14h7v7l9-11h-7z'
    })),
    device: () => h('svg', {
      fill: 'none',
      stroke: 'currentColor',
      viewBox: '0 0 24 24'
    }, h('path', {
      'stroke-linecap': 'round',
      'stroke-linejoin': 'round',
      'stroke-width': '2',
      d: 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'
    })),
    settings: () => h('svg', {
      fill: 'none',
      stroke: 'currentColor',
      viewBox: '0 0 24 24'
    }, h('path', {
      'stroke-linecap': 'round',
      'stroke-linejoin': 'round',
      'stroke-width': '2',
      d: 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'
    }), h('path', {
      'stroke-linecap': 'round',
      'stroke-linejoin': 'round',
      'stroke-width': '2',
      d: 'M15 12a3 3 0 11-6 0 3 3 0 016 0z'
    })),
    check: () => h('svg', {
      fill: 'none',
      stroke: 'currentColor',
      viewBox: '0 0 24 24'
    }, h('path', {
      'stroke-linecap': 'round',
      'stroke-linejoin': 'round',
      'stroke-width': '2',
      d: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
    })),
    lock: () => h('svg', {
      fill: 'none',
      stroke: 'currentColor',
      viewBox: '0 0 24 24'
    }, h('path', {
      'stroke-linecap': 'round',
      'stroke-linejoin': 'round',
      'stroke-width': '2',
      d: 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'
    })),
    heart: () => h('svg', {
      fill: 'none',
      stroke: 'currentColor',
      viewBox: '0 0 24 24'
    }, h('path', {
      'stroke-linecap': 'round',
      'stroke-linejoin': 'round',
      'stroke-width': '2',
      d: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'
    }))
  }
  
  return icons[props.feature.icon] || icons.check
}
</script>
