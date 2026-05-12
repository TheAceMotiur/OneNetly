<template>
  <div>
    <CleanShareButton v-if="isHomePage" />
    
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center py-8 xs:py-12 sm:py-16 bg-gradient-to-br from-indigo-50/30 via-white to-pink-50/30 overflow-hidden safe-area-left safe-area-right">
      <!-- Professional Background Effects -->
      <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-100/20 via-purple-100/20 to-pink-100/20 animate-gradient"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(139,92,246,0.03)_1px,transparent_1px)] bg-[size:40px_40px] opacity-60"></div>
        
        <!-- Premium gradient orbs -->
        <div class="absolute top-12 left-12 w-96 h-96 bg-gradient-to-br from-indigo-400/15 via-purple-400/10 to-transparent rounded-full blur-3xl animate-float opacity-70"></div>
        <div class="absolute bottom-12 right-12 w-[500px] h-[500px] bg-gradient-to-tl from-pink-400/12 via-rose-400/8 to-transparent rounded-full blur-3xl animate-float opacity-80" style="animation-delay: 2s;"></div>
      </div>
      
      <div class="relative z-10 w-full max-w-7xl mx-auto px-4 xs:px-6 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:grid lg:grid-cols-2 gap-12 lg:gap-20 items-center justify-center min-h-[calc(100vh-4rem)]">
          <!-- Content -->
          <div class="text-center lg:text-left w-full max-w-4xl mx-auto lg:mx-0 px-4 sm:px-0">
            <!-- Premium Status Badge -->
            <div class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white text-xs font-black rounded-xl mb-6 shadow-2xl hover:shadow-purple-500/50 transition-all duration-500 hover:scale-105 animate-bounce-gentle cursor-pointer group border-2 border-purple-300/50">
              <span class="w-1.5 h-1.5 bg-green-300 rounded-full animate-pulse mr-2.5"></span>
              <span class="group-hover:text-green-200 transition-colors duration-300 tracking-wide">FREE FOREVER</span>
            </div>
            
            <!-- Main Title -->
            <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-black leading-tight tracking-tight mb-6">
              <span class="block text-gray-900">Best Social Sharing Widget</span>
              <span class="block text-gray-900">for Modern</span>
              <span class="block bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Websites</span>
            </h1>
            
            <!-- Description -->
            <h2 class="text-base sm:text-lg lg:text-xl text-gray-600 mb-6 max-w-3xl leading-relaxed font-semibold">
              OneNetly is the most <span class="font-black text-gray-900">advanced social sharing widget</span> and <span class="font-bold text-gray-800">social media buttons solution</span> for websites. 
              <span class="font-bold text-gray-800 block mt-3">Free social sharing plugin • Privacy-first • Zero dependencies • 5KB lightweight</span>
            </h2>
            
            <!-- Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-6">
              <div class="text-center lg:text-left group bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-green-100">
                <div class="flex items-center justify-center lg:justify-start gap-2 mb-1.5">
                  <div class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></div>
                  <span class="text-xl font-black bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">5KB</span>
                </div>
                <span class="text-xs font-bold text-gray-600 tracking-wide uppercase">Minified Size</span>
              </div>
              <div class="text-center lg:text-left group bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-blue-100">
                <div class="flex items-center justify-center lg:justify-start gap-2 mb-1.5">
                  <div class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></div>
                  <span class="text-xl font-black bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent">50M+</span>
                </div>
                <span class="text-xs font-bold text-gray-600 tracking-wide uppercase">Downloads</span>
              </div>
              <div class="text-center lg:text-left group bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-purple-100">
                <div class="flex items-center justify-center lg:justify-start gap-2 mb-1.5">
                  <div class="w-1.5 h-1.5 bg-purple-500 rounded-full animate-pulse"></div>
                  <span class="text-xl font-black bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">99.9%</span>
                </div>
                <span class="text-xs font-bold text-gray-600 tracking-wide uppercase">Uptime</span>
              </div>
              <div class="text-center lg:text-left group bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-orange-100">
                <div class="flex items-center justify-center lg:justify-start gap-2 mb-1.5">
                  <div class="w-1.5 h-1.5 bg-orange-500 rounded-full animate-pulse"></div>
                  <span class="text-xl font-black bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">24/7</span>
                </div>
                <span class="text-xs font-bold text-gray-600 tracking-wide uppercase">Support</span>
              </div>
            </div>
          </div>
          
          <!-- Visual Demo -->
          <div class="relative w-full max-w-lg mx-auto lg:max-w-none">
            <div class="relative bg-gradient-to-br from-white via-purple-50/30 to-pink-50/30 rounded-3xl p-8 shadow-premium-lg border-2 border-purple-100/50 transform hover:rotate-0 transition-all duration-700 group ring-1 ring-purple-100/30">
              <!-- Browser Chrome -->
              <div class="bg-gradient-to-r from-gray-100 via-purple-50 to-pink-50 rounded-t-3xl p-6 border-b-2 border-purple-200/50 -m-8 mb-8">
                <div class="flex items-center gap-4 mb-4">
                  <div class="flex gap-3">
                    <div class="w-4 h-4 bg-gradient-to-br from-red-400 to-red-600 rounded-full"></div>
                    <div class="w-4 h-4 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full"></div>
                    <div class="w-4 h-4 bg-gradient-to-br from-green-400 to-green-600 rounded-full"></div>
                  </div>
                  <div class="flex-1 bg-white rounded-xl px-6 py-3 text-sm text-gray-600 font-mono shadow-inner border border-gray-300 truncate">
                    https://yourwebsite.com/content
                  </div>
                </div>
              </div>
              
              <!-- Content Preview -->
              <div class="space-y-6">
                <div class="space-y-4">
                  <div class="h-6 bg-gradient-to-r from-gray-300 to-gray-200 rounded-lg"></div>
                  <div class="h-4 bg-gradient-to-r from-gray-200 to-gray-100 rounded w-4/5"></div>
                  <div class="h-4 bg-gradient-to-r from-gray-200 to-gray-100 rounded w-3/5"></div>
                </div>
                
                <div class="bg-gradient-to-br from-gray-100 to-gray-50 rounded-2xl p-6 border border-gray-200">
                  <div class="h-32 bg-gradient-to-br from-gray-300 to-gray-200 rounded-xl mb-4"></div>
                  <div class="space-y-2">
                    <div class="h-3 bg-gradient-to-r from-gray-300 to-gray-200 rounded w-full"></div>
                    <div class="h-3 bg-gradient-to-r from-gray-200 to-gray-100 rounded w-3/4"></div>
                  </div>
                </div>
              </div>
              
              <!-- Widget Preview -->
              <div class="absolute bottom-8 right-8 animate-bounce-gentle">
                <div class="relative group">
                  <div class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 rounded-2xl w-20 h-20 flex items-center justify-center cursor-pointer hover:scale-110 transition-all duration-500 shadow-2xl ring-4 ring-purple-200/50">
                    <svg class="w-9 h-9 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                    </svg>
                  </div>
                  <div class="absolute inset-0 bg-purple-400 rounded-2xl animate-ping opacity-30"></div>
                  <div class="absolute inset-0 bg-pink-400 rounded-2xl animate-ping opacity-20" style="animation-delay: 0.5s;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- AdSense Ad Placement 1 -->
    <div class="w-full bg-gray-50 py-8 flex justify-center">
      <AdSense 
        ad-slot="4878379783"
        :show-label="true"
        container-class="w-full max-w-6xl mx-auto"
        :lazy-load="true"
      />
    </div>

    <!-- Features Section -->
    <section id="features" class="py-20 lg:py-32 bg-gradient-to-b from-purple-50/30 via-white to-pink-50/30 relative overflow-hidden">
      <div class="absolute top-20 left-20 w-72 h-72 bg-gradient-to-br from-indigo-400/10 to-transparent rounded-full blur-3xl animate-float opacity-40"></div>
      <div class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-tl from-pink-400/10 to-transparent rounded-full blur-3xl animate-float opacity-50" style="animation-delay: 3s;"></div>
      
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 lg:mb-20">
          <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-100 via-purple-100 to-pink-100 text-gray-800 text-sm font-bold rounded-full mb-8 shadow-lg">
            <span class="mr-2">✨</span>
            <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent font-black">Features & Benefits</span>
            <span class="ml-2">🚀</span>
          </div>
          
          <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-8 text-gray-900 tracking-tight">
            Why OneNetly is the <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Best Social Sharing Widget</span>
          </h2>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <FeatureCard 
            v-for="(feature, index) in features"
            :key="index"
            :feature="feature"
          />
        </div>
      </div>
    </section>

    <!-- AdSense Ad Placement 2 -->
    <div class="w-full bg-gray-50 py-8 flex justify-center">
      <AdSense 
        ad-slot="4878379783"
        :show-label="true"
        container-class="w-full max-w-6xl mx-auto"
        :lazy-load="true"
      />
    </div>

    <!-- Live Demo Section -->
    <section id="demo" class="py-20 lg:py-32 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 lg:mb-20">
          <div class="inline-flex items-center px-4 py-2 bg-black text-white text-sm font-medium rounded-full mb-6">
            🚀 Live Demo
          </div>
          <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-6 text-gray-900">
            Try It <span class="bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">Live</span>
          </h2>
          <p class="text-xl lg:text-2xl text-gray-600 leading-relaxed">
            Customize your widget and generate the code instantly
          </p>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16">
          <!-- Customizer -->
          <div class="bg-white border-2 border-gray-200 rounded-3xl p-8 lg:p-10 shadow-lg">
            <h3 class="text-2xl lg:text-3xl font-bold mb-8 text-gray-900">Customize Widget</h3>
            
            <!-- Position -->
            <div class="mb-8">
              <label class="block text-lg font-bold text-gray-900 mb-4">Position</label>
              <div class="grid grid-cols-2 gap-3">
                <button 
                  v-for="pos in positions" 
                  :key="pos.value"
                  @click="selectedPosition = pos.value"
                  :class="[
                    'p-4 border-2 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105',
                    selectedPosition === pos.value 
                      ? 'bg-black text-white border-black shadow-lg' 
                      : 'bg-white text-gray-700 border-gray-300 hover:border-gray-400'
                  ]"
                >
                  {{ pos.label }}
                </button>
              </div>
            </div>
            
            <!-- Social Networks -->
            <div class="mb-8">
              <label class="block text-lg font-bold text-gray-900 mb-4">
                Social Networks 
                <span class="text-sm font-normal text-gray-500">(Select up to 6)</span>
              </label>
              <div class="grid grid-cols-2 gap-3">
                <label 
                  v-for="social in socialNetworks" 
                  :key="social.name"
                  :class="[
                    'flex items-center space-x-3 p-4 border-2 rounded-xl cursor-pointer transition-all duration-300 transform hover:scale-105',
                    selectedSocials.includes(social.name)
                      ? 'bg-black text-white border-black shadow-lg'
                      : 'bg-white text-gray-700 border-gray-300 hover:border-gray-400'
                  ]"
                >
                  <input 
                    type="checkbox" 
                    v-model="selectedSocials" 
                    :value="social.name"
                    :disabled="selectedSocials.length >= 6 && !selectedSocials.includes(social.name)"
                    class="hidden"
                  >
                  <span class="text-sm font-semibold">{{ social.name }}</span>
                </label>
              </div>
            </div>
            
            <!-- Generate Code Button -->
            <button 
              @click="generateCode"
              class="group w-full bg-gradient-to-r from-gray-900 via-black to-gray-800 text-white py-5 rounded-2xl text-lg font-bold hover:from-black hover:via-gray-900 hover:to-black transition-all duration-500 transform hover:-translate-y-2 shadow-2xl mb-8 relative overflow-hidden"
            >
              <span class="relative z-10 flex items-center justify-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                </svg>
                Generate Custom Code
              </span>
            </button>
            
            <!-- Generated Code -->
            <div v-if="generatedCode" class="space-y-6 animate-fade-in-up">
              <label class="block text-lg font-bold text-gray-900 flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Generated Code
              </label>
              <div class="relative group">
                <pre class="bg-gradient-to-br from-gray-900 via-gray-800 to-black text-green-400 p-6 rounded-2xl text-sm overflow-x-auto leading-relaxed font-mono border-2 border-gray-700"><code>{{ generatedCode }}</code></pre>
                
                <button 
                  @click="copyCode"
                  :class="[
                    'absolute top-4 right-4 px-5 py-3 rounded-xl text-sm font-bold transition-all duration-300 transform hover:scale-105 shadow-lg',
                    copied 
                      ? 'bg-green-500 text-white animate-pulse' 
                      : 'bg-black/80 text-white hover:bg-black backdrop-blur-sm border border-gray-600'
                  ]"
                >
                  <span class="flex items-center gap-2">
                    <svg v-if="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                    <svg v-else class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ copied ? 'Copied!' : 'Copy Code' }}
                  </span>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Preview -->
          <div class="bg-white border-2 border-gray-200 rounded-3xl p-8 lg:p-10 shadow-lg relative min-h-96">
            <h3 class="text-2xl lg:text-3xl font-bold mb-8 text-gray-900">Live Preview</h3>
            <div class="bg-gray-50 rounded-2xl p-6 h-80 relative border-2 border-gray-100 overflow-hidden">
              <!-- Sample content -->
              <div class="space-y-4 mb-6">
                <div class="h-6 bg-gray-300 rounded-lg w-3/4 animate-pulse"></div>
                <div class="h-4 bg-gray-200 rounded w-full"></div>
                <div class="h-4 bg-gray-200 rounded w-2/3"></div>
              </div>
              <p class="text-gray-500 text-sm mb-4">This is a sample webpage content...</p>
              <p class="text-gray-500 text-sm">The OneNetly widget will appear based on your selected position.</p>
              
              <!-- Preview Widget -->
              <div 
                :class="[
                  'absolute w-14 h-14 bg-black rounded-full flex items-center justify-center cursor-pointer hover:scale-110 transition-all duration-300 shadow-2xl group',
                  getPositionClass(selectedPosition)
                ]"
              >
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                </svg>
              </div>
            </div>
            
            <!-- Selected Networks Display -->
            <div class="mt-6 p-4 bg-gray-50 rounded-xl border border-gray-200">
              <h4 class="text-sm font-bold text-gray-900 mb-3">Selected Networks ({{ selectedSocials.length }}/6)</h4>
              <div class="flex flex-wrap gap-2">
                <span 
                  v-for="social in selectedSocials" 
                  :key="social"
                  class="px-3 py-1 bg-black text-white text-xs font-semibold rounded-full"
                >
                  {{ social }}
                </span>
                <span 
                  v-if="selectedSocials.length === 0"
                  class="px-3 py-1 bg-gray-200 text-gray-500 text-xs rounded-full"
                >
                  No networks selected
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- AdSense Ad Placement 3 -->
    <div class="w-full bg-white py-8 flex justify-center">
      <AdSense 
        ad-slot="4878379783"
        :show-label="true"
        container-class="w-full max-w-6xl mx-auto"
        :lazy-load="true"
      />
    </div>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-gray-900">
            Frequently Asked Questions
          </h2>
          <p class="text-xl text-gray-600">
            Everything you need to know about OneNetly social sharing widget
          </p>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-8">
          <div class="space-y-6">
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">What is a social sharing widget?</h3>
              <p class="text-gray-600">A social sharing widget is a tool that allows website visitors to easily share content on social media platforms like Facebook, Twitter, LinkedIn, and WhatsApp. OneNetly provides the best free social sharing widget with privacy-first design.</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">Why choose OneNetly over other social sharing widgets?</h3>
              <p class="text-gray-600">OneNetly is the best social sharing widget because it's only 5KB, completely free, privacy-first, has zero dependencies, and supports all major social platforms. Unlike other social sharing plugins, it doesn't track users.</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">How to install OneNetly social sharing widget?</h3>
              <p class="text-gray-600">Installing our social sharing widget is simple - just add one script tag to your website. No registration required, no complex setup. It's the easiest social sharing plugin to integrate.</p>
            </div>
          </div>
          
          <div class="space-y-6">
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">Is OneNetly social sharing widget free?</h3>
              <p class="text-gray-600">Yes! OneNetly is completely free forever. No hidden costs, no premium plans, no limitations. It's the best free social sharing widget for websites of all sizes.</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">Which social networks are supported?</h3>
              <p class="text-gray-600">OneNetly supports 18+ social networks including Facebook, Twitter, LinkedIn, WhatsApp, Telegram, Reddit, Pinterest, Email, and more. You can customize which networks to display.</p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6">
              <h3 class="text-lg font-bold mb-3 text-gray-900">Does it work on mobile devices?</h3>
              <p class="text-gray-600">Yes! Our social sharing widget is fully responsive and works perfectly on all devices. It even uses native mobile share dialog on mobile devices for better user experience.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- More sections would continue here -->
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const isHomePage = computed(() => route.path === '/')

useHead({
  title: 'OneNetly - Best Social Sharing Widget for Modern Websites',
  meta: [
    { name: 'description', content: 'OneNetly is the most advanced social sharing widget and social media buttons solution for websites. Free social sharing plugin • Privacy-first • Zero dependencies • 5KB lightweight' }
  ]
})

const selectedPosition = ref('bottom-right')
const selectedSocials = ref(['Facebook', 'Twitter', 'LinkedIn', 'WhatsApp', 'Telegram', 'Reddit'])
const adBlockerDetector = ref(false)
const generatedCode = ref('')
const copied = ref(false)

const positions = [
  { label: 'Bottom Right', value: 'bottom-right' },
  { label: 'Bottom Left', value: 'bottom-left' },
  { label: 'Top Right', value: 'top-right' },
  { label: 'Top Left', value: 'top-left' }
]

const socialNetworks = [
  { name: 'Facebook' },
  { name: 'Twitter' },
  { name: 'LinkedIn' },
  { name: 'WhatsApp' },
  { name: 'Telegram' },
  { name: 'Reddit' },
  { name: 'Pinterest' },
  { name: 'Email' }
]

const features = [
  {
    title: 'Lightning Fast',
    description: 'Under 5KB minified and gzipped. Loads instantly without affecting your site performance.',
    icon: 'lightning',
    gradient: 'from-blue-500/5 via-purple-500/5',
    featured: true
  },
  {
    title: 'Fully Responsive',
    description: 'Works perfectly on all devices and screen sizes with touch-friendly interface.',
    icon: 'device',
    gradient: 'from-green-500/5 via-emerald-500/5',
    featured: true
  },
  {
    title: 'Highly Customizable',
    description: 'Customize colors, position, and social networks to match your brand perfectly.',
    icon: 'settings',
    gradient: 'from-purple-500/5 via-pink-500/5',
    featured: true
  },
  {
    title: 'No Dependencies',
    description: 'Pure vanilla JavaScript with no external dependencies or frameworks required.',
    icon: 'check',
    featured: false
  },
  {
    title: 'Privacy Focused',
    description: 'No tracking, no analytics, no data collection. Just pure social sharing functionality.',
    icon: 'lock',
    featured: false
  },
  {
    title: 'Easy Integration',
    description: 'Simple copy-paste integration. Works with any website, CMS, or framework.',
    icon: 'heart',
    featured: false
  },
  {
    title: 'Multiple Networks',
    description: 'Support for 18+ social networks including Facebook, Twitter, LinkedIn, WhatsApp, and more.',
    icon: 'check',
    featured: false
  },
  {
    title: 'Native Mobile Share',
    description: 'Automatically uses native mobile share dialog on mobile devices for better user experience.',
    icon: 'device',
    featured: false
  }
]

function getPositionClass(position) {
  const classes = {
    'bottom-right': 'bottom-4 right-4',
    'bottom-left': 'bottom-4 left-4',
    'top-right': 'top-4 right-4',
    'top-left': 'top-4 left-4'
  }
  return classes[position] || 'bottom-4 right-4'
}

function generateCode() {
  generatedCode.value = `<script src="https://onenetly.com/widget.min.js" 
        data-position="${selectedPosition.value}"
        data-networks="${selectedSocials.value.join(',')}"
        data-ad-blocker-detector="${adBlockerDetector.value}">
<\/script>`
}

function copyCode() {
  navigator.clipboard.writeText(generatedCode.value)
  copied.value = true
  setTimeout(() => {
    copied.value = false
  }, 2000)
}

// Load the OneNetly widget on homepage
onMounted(() => {
  if (isHomePage.value) {
    const script = document.createElement('script')
    script.src = '/widget.min.js'
    script.setAttribute('data-position', 'bottom-right')
    script.setAttribute('data-networks', 'Facebook,Twitter,LinkedIn,WhatsApp,Telegram,Pinterest')
    document.head.appendChild(script)
  }
})
</script>
