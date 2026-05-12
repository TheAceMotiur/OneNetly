// AdSense Configuration and Management Utility
export class AdSenseManager {
  constructor() {
    this.adClient = 'ca-pub-9354746037074515'
    this.defaultSlot = '4878379783'
    this.isProduction = process.env.NODE_ENV === 'production'
  }

  // Initialize AdSense with optimal settings
  init() {
    if (typeof window !== 'undefined' && !window.adsbygoogle) {
      this.loadAdSenseScript()
    }
  }

  // Load AdSense script dynamically
  loadAdSenseScript() {
    return new Promise((resolve, reject) => {
      const existingScript = document.querySelector('script[src*="pagead2.googlesyndication.com"]')
      if (existingScript) {
        resolve()
        return
      }

      const script = document.createElement('script')
      script.async = true
      script.src = `https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=${this.adClient}`
      script.crossOrigin = 'anonymous'
      
      script.onload = () => {
        window.adsbygoogle = window.adsbygoogle || []
        resolve()
      }
      
      script.onerror = () => {
        reject(new Error('Failed to load AdSense'))
      }

      document.head.appendChild(script)
    })
  }

  // Push ad with error handling
  pushAd() {
    if (!window.adsbygoogle) {
      console.warn('AdSense not loaded yet')
      return
    }

    try {
      window.adsbygoogle.push({})
    } catch (error) {
      console.warn('AdSense push error:', error)
    }
  }
}

export const adSenseManager = new AdSenseManager()
