<template>
  <div class="fixed bottom-6 right-6 z-50">
    <!-- Main Share Button -->
    <button
      @click="togglePanel"
      class="relative w-16 h-16 bg-black hover:bg-gray-800 text-white rounded-full shadow-2xl hover:shadow-3xl transition-all duration-300 transform hover:scale-110 flex items-center justify-center group overflow-hidden"
    >
      <!-- Background gradient effect -->
      <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-black rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      
      <!-- Icon -->
      <div class="relative z-10">
        <svg v-if="!isPanelOpen" class="w-7 h-7 transition-all duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
        </svg>
        <svg v-else class="w-6 h-6 transition-all duration-300 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </div>
      
      <!-- Pulse rings -->
      <div class="absolute inset-0 rounded-full bg-black animate-ping opacity-20 group-hover:opacity-30"></div>
      <div class="absolute inset-0 rounded-full bg-black animate-ping opacity-10" style="animation-delay: 0.5s;"></div>
    </button>

    <!-- Share Panel -->
    <transition
      enter-active-class="transition ease-out duration-300"
      enter-from-class="opacity-0 transform scale-95 translate-y-4"
      enter-to-class="opacity-100 transform scale-100 translate-y-0"
      leave-active-class="transition ease-in duration-200"
      leave-from-class="opacity-100 transform scale-100 translate-y-0"
      leave-to-class="opacity-0 transform scale-95 translate-y-4"
    >
      <div
        v-if="isPanelOpen"
        class="absolute bottom-20 right-0 w-72 bg-white border-2 border-gray-200 rounded-2xl shadow-2xl p-6 backdrop-blur-sm"
      >
        <!-- Header -->
        <div class="text-center mb-6">
          <h3 class="text-xl font-bold text-black mb-2">Share this page</h3>
          <p class="text-sm text-gray-600">Choose your favorite social network</p>
        </div>
        
        <!-- Main Social Networks -->
        <div class="grid grid-cols-2 gap-3 mb-6">
          <button
            v-for="social in mainSocials"
            :key="social.name"
            @click="shareOn(social.name)"
            class="group flex items-center gap-3 p-4 rounded-xl border-2 border-gray-200 hover:border-black hover:bg-gray-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg"
          >
            <component :is="social.icon" class="w-6 h-6 transition-transform duration-300 group-hover:scale-110" />
            <span class="text-sm font-semibold text-gray-800 group-hover:text-black">{{ social.name }}</span>
          </button>
        </div>

        <!-- More Button -->
        <button
          @click="showMore = !showMore"
          class="w-full flex items-center justify-center gap-3 p-4 border-2 border-gray-200 rounded-xl hover:border-black hover:bg-gray-50 transition-all duration-300 group"
        >
          <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
          </svg>
          <span class="text-sm font-semibold text-gray-800 group-hover:text-black">{{ showMore ? 'Show Less' : 'More Options' }}</span>
          <svg :class="['w-4 h-4 transition-transform duration-300', showMore ? 'rotate-180' : '']" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>

        <!-- Additional Social Networks -->
        <transition
          enter-active-class="transition ease-out duration-300"
          enter-from-class="opacity-0 max-h-0"
          enter-to-class="opacity-100 max-h-96"
          leave-active-class="transition ease-in duration-200"
          leave-from-class="opacity-100 max-h-96"
          leave-to-class="opacity-0 max-h-0"
        >
          <div v-if="showMore" class="grid grid-cols-2 gap-3 mt-4 overflow-hidden">
            <button
              v-for="social in moreSocials"
              :key="social.name"
              @click="shareOn(social.name)"
              class="group flex items-center gap-3 p-4 rounded-xl border-2 border-gray-200 hover:border-black hover:bg-gray-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg"
            >
              <component :is="social.icon" class="w-6 h-6 transition-transform duration-300 group-hover:scale-110" />
              <span class="text-sm font-semibold text-gray-800 group-hover:text-black">{{ social.name }}</span>
            </button>
          </div>
        </transition>
        
        <!-- Footer -->
        <div class="mt-6 pt-4 border-t border-gray-200 text-center">
          <p class="text-xs text-gray-500">Powered by OneShare</p>
        </div>
      </div>
    </transition>

    <!-- Backdrop -->
    <div
      v-if="isPanelOpen"
      @click="isPanelOpen = false"
      class="fixed inset-0 bg-black bg-opacity-20 backdrop-blur-sm -z-10 transition-opacity duration-300"
    ></div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import FacebookIcon from './icons/FacebookIcon.vue'
import TwitterIcon from './icons/TwitterIcon.vue'
import LinkedInIcon from './icons/LinkedInIcon.vue'
import WhatsAppIcon from './icons/WhatsAppIcon.vue'
import TelegramIcon from './icons/TelegramIcon.vue'
import RedditIcon from './icons/RedditIcon.vue'
import PinterestIcon from './icons/PinterestIcon.vue'
import TumblrIcon from './icons/TumblrIcon.vue'
import EmailIcon from './icons/EmailIcon.vue'
import PrintIcon from './icons/PrintIcon.vue'

const isPanelOpen = ref(false)
const showMore = ref(false)

const mainSocials = [
  { name: 'Facebook', icon: FacebookIcon },
  { name: 'Twitter', icon: TwitterIcon },
  { name: 'LinkedIn', icon: LinkedInIcon },
  { name: 'WhatsApp', icon: WhatsAppIcon },
  { name: 'Telegram', icon: TelegramIcon },
  { name: 'Reddit', icon: RedditIcon }
]

const moreSocials = [
  { name: 'Pinterest', icon: PinterestIcon },
  { name: 'Tumblr', icon: TumblrIcon },
  { name: 'Email', icon: EmailIcon },
  { name: 'Print', icon: PrintIcon }
]

function togglePanel() {
  isPanelOpen.value = !isPanelOpen.value
  if (!isPanelOpen.value) {
    showMore.value = false
  }
}

function shareOn(platform) {
  const url = encodeURIComponent(window.location.href)
  const title = encodeURIComponent(document.title)
  const description = encodeURIComponent(document.querySelector('meta[name="description"]')?.content || '')

  const shareUrls = {
    Facebook: `https://www.facebook.com/sharer/sharer.php?u=${url}`,
    Twitter: `https://twitter.com/intent/tweet?url=${url}&text=${title}`,
    LinkedIn: `https://www.linkedin.com/sharing/share-offsite/?url=${url}`,
    WhatsApp: `https://wa.me/?text=${title} ${url}`,
    Telegram: `https://t.me/share/url?url=${url}&text=${title}`,
    Reddit: `https://reddit.com/submit?url=${url}&title=${title}`,
    Pinterest: `https://pinterest.com/pin/create/button/?url=${url}&description=${title}`,
    Tumblr: `https://tumblr.com/widgets/share/tool?canonicalUrl=${url}&title=${title}&caption=${description}`,
    Email: `mailto:?subject=${title}&body=${description} ${url}`,
    Print: ''
  }

  if (platform === 'Print') {
    window.print()
  } else {
    window.open(shareUrls[platform], '_blank', 'noopener,noreferrer')
  }
  
  // Close panel after sharing
  isPanelOpen.value = false
  showMore.value = false
}
</script>
