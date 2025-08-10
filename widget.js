/**
 * OneNetly - Professional Social Media Share Widget
 * A lightweight, customizable social sharing widget
 */
(function(window, document) {
  'use strict';

  // Default configuration
  const defaultConfig = {
    networks: ['Facebook', 'Twitter', 'LinkedIn', 'WhatsApp', 'Telegram', 'Reddit'],
    visibleCount: 6,
    position: 'bottom-right',
    theme: 'black',
    customizations: {
      buttonColor: '#000000',
      panelColor: '#ffffff', 
      textColor: '#111827'
    }
  };

  // Social media configurations
  const socialConfigs = {
    Facebook: {
      name: 'Facebook',
      color: '#1877f2',
      icon: 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z',
      shareUrl: (url, title) => `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`
    },
    Twitter: {
      name: 'Twitter',
      color: '#1da1f2',
      icon: 'M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z',
      shareUrl: (url, title) => `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`
    },
    LinkedIn: {
      name: 'LinkedIn',
      color: '#0a66c2',
      icon: 'M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z',
      shareUrl: (url, title) => `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`
    },
    WhatsApp: {
      name: 'WhatsApp',
      color: '#25d366',
      icon: 'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.464 3.488',
      shareUrl: (url, title) => `https://wa.me/?text=${encodeURIComponent(title + ' ' + url)}`
    },
    Telegram: {
      name: 'Telegram',
      color: '#0088cc',
      icon: 'M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z',
      shareUrl: (url, title) => `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`
    },
    Reddit: {
      name: 'Reddit',
      color: '#ff4500',
      icon: 'M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .968-.786 1.754-1.754 1.754a1.75 1.75 0 0 1-1.668-1.266c-1.172.879-2.648 1.45-4.467 1.45s-3.295-.571-4.467-1.45A1.75 1.75 0 0 1 6.538 12.5c0-.968.786-1.754 1.754-1.754.477 0 .899.182 1.207.491 1.207-.883 2.878-1.43 4.744-1.487L15.048 6.5 17 5.5a3 3 0 0 1 .01-.256zm-5.01 9.256c.239 0 .426.026.539.066.113.034.2.08.284.15L13.405 15a.5.5 0 0 1 .276.447v.121c-.014.048-.034.093-.066.134-.048.075-.11.134-.196.174a1.25 1.25 0 0 1-.415.084c-1.66 0-3.01-.86-3.01-1.92s1.35-1.92 3.01-1.92z',
      shareUrl: (url, title) => `https://www.reddit.com/submit?url=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`
    },
    Pinterest: {
      name: 'Pinterest',
      color: '#bd081c',
      icon: 'M12.017 0C5.396 0 .029 5.367 .029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.1.12.112.225.085.346-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.162-1.499-.7-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24c6.624 0 11.99-5.367 11.99-12C24.007 5.367 18.641.001 12.017.001z',
      shareUrl: (url, title) => `https://pinterest.com/pin/create/button/?url=${encodeURIComponent(url)}&description=${encodeURIComponent(title)}`
    },
    Email: {
      name: 'Email',
      color: '#374151',
      icon: 'M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z',
      shareUrl: (url, title) => `mailto:?subject=${encodeURIComponent(title)}&body=${encodeURIComponent(url)}`
    }
  };

  // OneNetly main class
  class OneNetly {
    constructor(config = {}) {
      this.config = { ...defaultConfig, ...config };
      this.isOpen = false;
      this.container = null;
      this.init();
    }

    init() {
      // Wait for DOM to be ready
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => this.render());
      } else {
        this.render();
      }
    }

    render() {
      // Create main container
      this.container = document.createElement('div');
      this.container.className = 'onenetly-container';
      this.container.style.cssText = this.getContainerStyles();
      
      // Create floating button
      const button = this.createFloatingButton();
      this.container.appendChild(button);

      // Create share panel
      const panel = this.createSharePanel();
      this.container.appendChild(panel);

      // Add to body
      document.body.appendChild(this.container);

      // Add global styles
      this.addStyles();

      // Add pulse rings
      this.addPulseRings();
    }

    createFloatingButton() {
      const button = document.createElement('div');
      button.className = 'onenetly-float-btn';
      button.style.cssText = this.getFloatingButtonStyles();
      button.innerHTML = this.getShareIcon();
      
      button.addEventListener('click', () => this.togglePanel());
      
      return button;
    }

    createSharePanel() {
      const panel = document.createElement('div');
      panel.className = 'onenetly-panel';
      panel.style.cssText = this.getPanelStyles();
      panel.style.display = 'none';

      // Header
      const header = document.createElement('div');
      header.className = 'onenetly-header';
      header.innerHTML = '<h3 style="margin: 0 0 20px 0; font-size: 18px; font-weight: 700; color: #111827;">Share this page</h3>';
      panel.appendChild(header);

      // Social buttons
      const socialContainer = document.createElement('div');
      socialContainer.className = 'onenetly-socials';
      socialContainer.style.cssText = 'display: grid; grid-template-columns: 1fr; gap: 12px; margin-bottom: 20px;';

      // Get visible socials
      const visibleSocials = this.config.networks.slice(0, this.config.visibleCount);

      // Add visible social buttons
      visibleSocials.forEach(socialName => {
        const social = socialConfigs[socialName];
        if (social) {
          const btn = this.createSocialButton(social);
          socialContainer.appendChild(btn);
        }
      });

      panel.appendChild(socialContainer);

      // URL copy section
      const urlSection = this.createUrlSection();
      panel.appendChild(urlSection);

      return panel;
    }

    createSocialButton(social) {
      const btn = document.createElement('button');
      btn.className = 'onenetly-social-btn';
      btn.style.cssText = this.getSocialButtonStyles(social.color);
      btn.innerHTML = `
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
          <path d="${social.icon}"/>
        </svg>
        <span style="font-weight: 600;">${social.name}</span>
      `;
      
      btn.addEventListener('click', () => this.shareOn(social));
      
      return btn;
    }

    createUrlSection() {
      const section = document.createElement('div');
      section.className = 'onenetly-url-section';
      section.style.cssText = 'border-top: 2px solid #f3f4f6; padding-top: 20px;';

      const label = document.createElement('p');
      label.style.cssText = 'margin: 0 0 12px 0; font-size: 14px; font-weight: 600; color: #6b7280;';
      label.textContent = 'Copy Link';
      section.appendChild(label);

      const inputGroup = document.createElement('div');
      inputGroup.style.cssText = 'display: flex; gap: 8px;';

      const input = document.createElement('input');
      input.type = 'text';
      input.value = window.location.href;
      input.readOnly = true;
      input.style.cssText = 'flex: 1; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 14px; background: #f9fafb; color: #6b7280; font-weight: 500;';

      const copyBtn = document.createElement('button');
      copyBtn.textContent = 'Copy';
      copyBtn.style.cssText = 'padding: 12px 20px; background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%); color: white; border: none; border-radius: 12px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);';
      
      copyBtn.addEventListener('click', () => this.copyUrl(input, copyBtn));

      inputGroup.appendChild(input);
      inputGroup.appendChild(copyBtn);
      section.appendChild(inputGroup);

      return section;
    }

    shareOn(social) {
      const url = window.location.href;
      const title = document.title;
      
      const shareUrl = social.shareUrl(url, title);
      window.open(shareUrl, '_blank', 'width=600,height=400,scrollbars=yes,resizable=yes');
      this.closePanel();
    }

    async copyUrl(input, btn) {
      try {
        await navigator.clipboard.writeText(input.value);
        btn.textContent = 'Copied!';
        btn.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';
        setTimeout(() => {
          btn.textContent = 'Copy';
          btn.style.background = 'linear-gradient(135deg, #000000 0%, #1a1a1a 100%)';
        }, 2000);
      } catch (err) {
        input.select();
        document.execCommand('copy');
        btn.textContent = 'Copied!';
        btn.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';
        setTimeout(() => {
          btn.textContent = 'Copy';
          btn.style.background = 'linear-gradient(135deg, #000000 0%, #1a1a1a 100%)';
        }, 2000);
      }
    }

    togglePanel() {
      const panel = this.container.querySelector('.onenetly-panel');
      const button = this.container.querySelector('.onenetly-float-btn');
      
      if (this.isOpen) {
        this.closePanel();
      } else {
        panel.style.display = 'block';
        setTimeout(() => {
          panel.style.opacity = '1';
          panel.style.transform = 'translateY(0) scale(1)';
        }, 10);
        button.innerHTML = this.getCloseIcon();
        button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
        button.style.transform = 'scale(1.1) rotate(90deg)';
        this.isOpen = true;
      }
    }

    closePanel() {
      const panel = this.container.querySelector('.onenetly-panel');
      const button = this.container.querySelector('.onenetly-float-btn');
      
      panel.style.opacity = '0';
      panel.style.transform = 'translateY(10px) scale(0.95)';
      setTimeout(() => {
        panel.style.display = 'none';
      }, 400);
      
      button.innerHTML = this.getShareIcon();
      button.style.background = 'linear-gradient(135deg, #000000 0%, #1a1a1a 100%)';
      button.style.transform = 'scale(1) rotate(0deg)';
      this.isOpen = false;
    }

    addPulseRings() {
      const button = this.container.querySelector('.onenetly-float-btn');
      
      // Create pulse rings
      for (let i = 0; i < 3; i++) {
        const ring = document.createElement('div');
        ring.className = `onenetly-pulse-ring onenetly-pulse-ring-${i + 1}`;
        ring.style.cssText = `
          position: absolute;
          top: -4px;
          left: -4px;
          right: -4px;
          bottom: -4px;
          border: 2px solid rgba(0, 0, 0, 0.1);
          border-radius: 50%;
          animation: onenetlyPulse 2s infinite;
          animation-delay: ${i * 0.6}s;
          pointer-events: none;
        `;
        button.appendChild(ring);
      }
    }

    // Style methods
    getContainerStyles() {
      const positions = {
        'bottom-right': 'bottom: 24px; right: 24px;',
        'bottom-left': 'bottom: 24px; left: 24px;',
        'top-right': 'top: 24px; right: 24px;',
        'top-left': 'top: 24px; left: 24px;'
      };
      
      return `position: fixed; ${positions[this.config.position]} z-index: 999999; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;`;
    }

    getFloatingButtonStyles() {
      return `
        width: 64px; height: 64px; background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        cursor: pointer; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); color: white; border: none;
        position: relative; overflow: visible;
      `;
    }

    getPanelStyles() {
      const positions = {
        'bottom-right': 'bottom: 80px; right: 0;',
        'bottom-left': 'bottom: 80px; left: 0;',
        'top-right': 'top: 80px; right: 0;',
        'top-left': 'top: 80px; left: 0;'
      };
      
      return `
        position: absolute; ${positions[this.config.position]} width: 280px;
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border-radius: 24px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(0, 0, 0, 0.05);
        padding: 24px; backdrop-filter: blur(20px);
        border: 2px solid rgba(0, 0, 0, 0.05);
        transform: translateY(10px) scale(0.95); opacity: 0;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      `;
    }

    getSocialButtonStyles(color) {
      return `
        display: flex; align-items: center; gap: 12px; padding: 14px 18px;
        border: none; border-radius: 16px; cursor: pointer; font-size: 15px;
        font-weight: 600; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
        color: white; background: ${color};
        width: 100%; position: relative; overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        font-family: inherit;
      `;
    }

    getShareIcon() {
      return `
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
        </svg>
      `;
    }

    getCloseIcon() {
      return `
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      `;
    }

    addStyles() {
      if (document.getElementById('onenetly-widget-styles')) return;
      
      const styles = document.createElement('style');
      styles.id = 'onenetly-widget-styles';
      styles.textContent = `
        @keyframes onenetlyPulse {
          0% {
            transform: scale(1);
            opacity: 0.8;
          }
          100% {
            transform: scale(1.4);
            opacity: 0;
          }
        }
        
        .onenetly-float-btn:hover {
          transform: scale(1.1);
          box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }
        
        .onenetly-social-btn:hover {
          transform: translateY(-2px);
          box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        }
        
        .onenetly-social-btn:active {
          transform: translateY(0);
        }
        
        @media (max-width: 640px) {
          .onenetly-panel {
            width: calc(100vw - 48px) !important;
            right: -240px !important;
          }
          
          .onenetly-container[style*="left"] .onenetly-panel {
            left: -240px !important;
            right: auto !important;
          }
        }
      `;
      
      document.head.appendChild(styles);
    }
  }

  // Global initialization
  window.OneNetly = {
    init: function(config) {
      return new OneNetly(config);
    },
    version: '2.0.0'
  };

  // Auto-initialize if config is provided
  if (window.oneNetlyConfig) {
    window.OneNetly.init(window.oneNetlyConfig);
  }

})(window, document);
