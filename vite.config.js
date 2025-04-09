import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    vueDevTools(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    },
  },
  // Cloudflare Pages specific configuration
  build: {
    // Generate sourcemaps for better debugging
    sourcemap: true,
    // Optimize assets for Cloudflare's edge network
    rollupOptions: {
      output: {
        manualChunks: {
          'vendor': ['vue']
        }
      }
    }
  },
  // Handle Cloudflare Pages routing
  server: {
    proxy: {
      // Add any API proxy rules if needed
      // '/api': 'https://your-api-endpoint.com/'
    }
  }
})
