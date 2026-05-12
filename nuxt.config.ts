// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2025-07-15',
  devtools: { enabled: true },
  
  modules: ['@nuxtjs/tailwindcss'],
  
  app: {
    head: {
      title: 'OneNetly - Best Social Sharing Widget for Modern Websites',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { name: 'description', content: 'OneNetly is the most advanced social sharing widget and social media buttons solution for websites. Free social sharing plugin • Privacy-first • Zero dependencies • 5KB lightweight' },
        { name: 'keywords', content: 'social sharing widget, share buttons, social media buttons, free sharing widget, OneNetly' }
      ],
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
      ],
      script: [
        {
          src: 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515',
          async: true,
          crossorigin: 'anonymous'
        }
      ]
    }
  },

  nitro: {
    preset: process.env.NODE_ENV === 'production' ? 'cloudflare-pages' : undefined
  }
})
