import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'

const app = createApp(App)

// Add Cloudflare analytics if available
if (window.cloudflareInsights && import.meta.env.PROD) {
  // Automatically loads Cloudflare Web Analytics if the beacon is available
  console.log('Cloudflare Web Analytics enabled')
}

app.mount('#app')
