// AdSense Configuration and Management Utility
export class AdSenseManager {
  constructor() {
    this.adClient = 'ca-pub-9354746037074515'
    this.defaultSlot = '4878379783'
    this.isProduction = process.env.NODE_ENV === 'production'
    this.loadAttempts = 0
    this.maxLoadAttempts = 3
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
        this.loadAttempts++
        if (this.loadAttempts < this.maxLoadAttempts) {
          setTimeout(() => this.loadAdSenseScript(), 2000)
        } else {
          reject(new Error('Failed to load AdSense after multiple attempts'))
        }
      }

      document.head.appendChild(script)
    })
  }

  // Push ad with error handling and retry logic
  pushAd(element) {
    if (!window.adsbygoogle) {
      console.warn('AdSense not loaded yet')
      return
    }

    try {
      window.adsbygoogle.push({})
    } catch (error) {
      console.warn('AdSense push error:', error)
      // Retry once after a delay
      setTimeout(() => {
        try {
          window.adsbygoogle.push({})
        } catch (retryError) {
          console.warn('AdSense retry failed:', retryError)
        }
      }, 1000)
    }
  }

  // Get optimal ad configuration based on screen size and page type
  getAdConfig(pageType = 'general', position = 'content') {
    const isMobile = window.innerWidth <= 768
    const isTablet = window.innerWidth > 768 && window.innerWidth <= 1024
    
    const configs = {
      // Homepage configurations
      homepage: {
        content: {
          slot: this.defaultSlot,
          format: 'auto',
          responsive: true,
          style: isMobile ? 'display:block;min-height:280px' : 'display:block;min-height:320px'
        },
        sidebar: {
          slot: this.defaultSlot,
          format: 'rectangle',
          responsive: false,
          style: 'display:block;width:300px;height:250px'
        }
      },
      // Documentation page configurations
      docs: {
        content: {
          slot: this.defaultSlot,
          format: 'horizontal',
          responsive: true,
          style: 'display:block;min-height:200px'
        }
      },
      // General page configurations
      general: {
        content: {
          slot: this.defaultSlot,
          format: 'auto',
          responsive: true,
          style: isMobile ? 'display:block;min-height:250px' : 'display:block;min-height:300px'
        }
      }
    }

    return configs[pageType]?.[position] || configs.general.content
  }

  // Check if ad blocker is present
  isAdBlockerActive() {
    const testAd = document.createElement('div')
    testAd.innerHTML = '&nbsp;'
    testAd.className = 'adsbox'
    testAd.style.position = 'absolute'
    testAd.style.left = '-9999px'
    document.body.appendChild(testAd)
    
    const isBlocked = testAd.offsetHeight === 0
    document.body.removeChild(testAd)
    
    return isBlocked
  }

  // Track ad performance (respecting privacy)
  trackAdPerformance(adId, event) {
    if (!this.isProduction) {
      console.log(`Ad ${adId}: ${event}`)
    }
    
    // Could integrate with privacy-friendly analytics here
    // Example: send event to privacy-compliant analytics service
  }

  // Lazy load ads for better performance
  observeAdElements() {
    if (!window.IntersectionObserver) {
      return false
    }

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const adElement = entry.target.querySelector('.adsbygoogle')
          if (adElement && !adElement.dataset.loaded) {
            this.pushAd(adElement)
            adElement.dataset.loaded = 'true'
            observer.unobserve(entry.target)
          }
        }
      })
    }, {
      threshold: 0.1,
      rootMargin: '50px 0px'
    })

    // Observe all ad containers
    document.querySelectorAll('[data-ad-container]').forEach(container => {
      observer.observe(container)
    })

    return true
  }

  // Refresh ads (useful for SPA navigation)
  refreshAds() {
    if (window.adsbygoogle) {
      try {
        window.adsbygoogle.forEach(ad => {
          if (ad && typeof ad.refresh === 'function') {
            ad.refresh()
          }
        })
      } catch (error) {
        console.warn('Ad refresh error:', error)
      }
    }
  }

  // Clean up ads when component unmounts
  cleanup() {
    // Remove any ad-related event listeners
    // Clear any ad-related timeouts/intervals
    document.querySelectorAll('.adsbygoogle').forEach(ad => {
      if (ad.dataset.adsbygoogleStatus) {
        delete ad.dataset.adsbygoogleStatus
      }
    })
  }
}

// Create global instance
export const adSenseManager = new AdSenseManager()

// Auto-initialize on import
if (typeof window !== 'undefined') {
  adSenseManager.init()
}

export default adSenseManager
