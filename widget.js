/**
 * OneNetly - Professional Social Media Share Widget
 * A lightweight, customizable social sharing widget
 */
(function(window, document) {
  'use strict';

  // Default configuration
  const defaultConfig = {
    socials: ['Facebook', 'Twitter', 'LinkedIn', 'WhatsApp', 'Telegram', 'Reddit'],
    visibleCount: 6,
    position: 'bottom-right',
    theme: 'light',
    customizations: {
      buttonColor: '#6366f1',
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
      icon: 'M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-.962 6.502-.613 1.887-1.313 2.073-1.632 2.073-.674 0-.898-.484-1.653-2.073 0 0-.182-.487-.484-1.046l-1.808-3.535a.405.405 0 0 0-.251-.26.944.944 0 0 0-.354-.043c-.158.014-.62.05-.62.05l-2.367.92s-.357.108-.357.646c0 .537.335.822.484 1.046.148.223.484 1.046.484 1.046.77 1.589.77 2.073 1.444 2.073.675 0 1.019-.186 1.632-2.073 0 0 .782-4.604.962-6.502.016-.166-.004-.379.02-.472a.506.506 0 0 1 .171-.325c.144-.117.365-.142.465-.14zm.056 8.15c-.674 0-.898-.484-1.653-2.073 0 0-.182-.487-.484-1.046l-1.808-3.535a.405.405 0 0 0-.251-.26.944.944 0 0 0-.354-.043c-.158.014-.62.05-.62.05l-2.367.92s-.357.108-.357.646c0 .537.335.822.484 1.046.148.223.484 1.046.484 1.046.77 1.589.77 2.073 1.444 2.073.675 0 1.019-.186 1.632-2.073 0 0 .782-4.604.962-6.502.016-.166-.004-.379.02-.472a.506.506 0 0 1 .171-.325c.144-.117.365-.142.465-.14.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-.962 6.502-.613 1.887-1.313 2.073-1.632 2.073z',
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
      icon: 'M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.1.12.112.225.085.346-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.162-1.499-.7-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24c6.624 0 11.99-5.367 11.99-12C24.007 5.367 18.641.001.012.001z',
      shareUrl: (url, title) => `https://pinterest.com/pin/create/button/?url=${encodeURIComponent(url)}&description=${encodeURIComponent(title)}`
    },
    Tumblr: {
      name: 'Tumblr',
      color: '#00cf35',
      icon: 'M14.563 24c-5.093 0-7.031-3.756-7.031-6.411V9.747H5.116c-.457 0-.81-.344-.81-.799s.353-.812.81-.812h2.416V6.411C7.532 2.882 9.963.45 13.818.45s6.285 2.432 6.285 5.961v1.775h2.416c.457 0 .81.355.81.812s-.353.799-.81.799h-2.416v7.842C20.103 20.244 18.165 24 14.563 24zM9.563 17.178c0 1.889 1.235 4.655 5 4.655s5-2.766 5-4.655V8.135h1.649c.457 0 .81-.355.81-.812s-.353-.799-.81-.799H19.25V5.961c0-2.766-1.5-4.227-4.432-4.227s-4.432 1.461-4.432 4.227v.563h1.649c.457 0 .81.344.81.799s-.353.812-.81.812H9.563v7.842z',
      shareUrl: (url, title) => `https://www.tumblr.com/share/link?url=${encodeURIComponent(url)}&name=${encodeURIComponent(title)}`
    },
    Email: {
      name: 'Email',
      color: '#6b7280',
      icon: 'M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z',
      shareUrl: (url, title) => `mailto:?subject=${encodeURIComponent(title)}&body=${encodeURIComponent(url)}`
    },
    Print: {
      name: 'Print',
      color: '#374151',
      icon: 'M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z',
      shareUrl: () => 'print'
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
      header.innerHTML = '<h3>Share this page</h3>';
      panel.appendChild(header);

      // Social buttons
      const socialContainer = document.createElement('div');
      socialContainer.className = 'onenetly-socials';
      socialContainer.style.cssText = 'display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px; margin-bottom: 16px;';

      // Get visible socials
      const visibleSocials = this.config.socials.slice(0, this.config.visibleCount);
      const hiddenSocials = this.config.socials.slice(this.config.visibleCount);

      // Add visible social buttons
      visibleSocials.forEach(socialName => {
        const social = socialConfigs[socialName];
        if (social) {
          const btn = this.createSocialButton(social);
          socialContainer.appendChild(btn);
        }
      });

      // Add "More" button if there are hidden socials
      if (hiddenSocials.length > 0) {
        const moreBtn = this.createMoreButton(hiddenSocials.length);
        socialContainer.appendChild(moreBtn);
      }

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
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
          <path d="${social.icon}"/>
        </svg>
        <span>${social.name}</span>
      `;
      
      btn.addEventListener('click', () => this.shareOn(social));
      
      return btn;
    }

    createMoreButton(count) {
      const btn = document.createElement('button');
      btn.className = 'onenetly-social-btn onenetly-more-btn';
      btn.style.cssText = this.getSocialButtonStyles('#6366f1');
      btn.innerHTML = `
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
          <path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
        </svg>
        <span>${count} More</span>
      `;
      
      btn.addEventListener('click', () => this.showAllSocials());
      
      return btn;
    }

    createUrlSection() {
      const section = document.createElement('div');
      section.className = 'onenetly-url-section';
      section.style.cssText = 'border-top: 1px solid #e5e7eb; padding-top: 16px;';

      const inputGroup = document.createElement('div');
      inputGroup.style.cssText = 'display: flex; gap: 8px;';

      const input = document.createElement('input');
      input.type = 'text';
      input.value = window.location.href;
      input.readOnly = true;
      input.style.cssText = 'flex: 1; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 12px; background: #f9fafb;';

      const copyBtn = document.createElement('button');
      copyBtn.textContent = 'Copy';
      copyBtn.style.cssText = 'padding: 8px 12px; background: #6366f1; color: white; border: none; border-radius: 6px; font-size: 12px; cursor: pointer;';
      
      copyBtn.addEventListener('click', () => this.copyUrl(input, copyBtn));

      inputGroup.appendChild(input);
      inputGroup.appendChild(copyBtn);
      section.appendChild(inputGroup);

      return section;
    }

    shareOn(social) {
      const url = window.location.href;
      const title = document.title;
      
      if (social.name === 'Print') {
        window.print();
        return;
      }
      
      const shareUrl = social.shareUrl(url, title);
      window.open(shareUrl, '_blank', 'width=600,height=400');
      this.closePanel();
    }

    showAllSocials() {
      // Create modal overlay
      const overlay = document.createElement('div');
      overlay.className = 'onenetly-modal-overlay';
      overlay.style.cssText = 'position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; z-index: 1001;';
      
      // Create modal content
      const modal = document.createElement('div');
      modal.className = 'onenetly-modal';
      modal.style.cssText = 'background: white; border-radius: 12px; padding: 24px; max-width: 500px; width: 90%; max-height: 80vh; overflow-y: auto;';
      
      // Modal header
      const header = document.createElement('div');
      header.innerHTML = '<h3 style="margin: 0 0 20px 0;">Share on Social Networks</h3>';
      modal.appendChild(header);
      
      // Social buttons grid
      const grid = document.createElement('div');
      grid.style.cssText = 'display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px;';
      
      this.config.socials.forEach(socialName => {
        const social = socialConfigs[socialName];
        if (social) {
          const btn = this.createSocialButton(social);
          btn.style.width = '100%';
          grid.appendChild(btn);
        }
      });
      
      modal.appendChild(grid);
      overlay.appendChild(modal);
      
      // Close on overlay click
      overlay.addEventListener('click', (e) => {
        if (e.target === overlay) {
          document.body.removeChild(overlay);
        }
      });
      
      document.body.appendChild(overlay);
    }

    async copyUrl(input, btn) {
      try {
        await navigator.clipboard.writeText(input.value);
        btn.textContent = 'Copied!';
        btn.style.background = '#10b981';
        setTimeout(() => {
          btn.textContent = 'Copy';
          btn.style.background = '#6366f1';
        }, 2000);
      } catch (err) {
        input.select();
        document.execCommand('copy');
        btn.textContent = 'Copied!';
        setTimeout(() => {
          btn.textContent = 'Copy';
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
        button.innerHTML = this.getCloseIcon();
        button.style.background = '#ef4444';
        this.isOpen = true;
      }
    }

    closePanel() {
      const panel = this.container.querySelector('.onenetly-panel');
      const button = this.container.querySelector('.onenetly-float-btn');
      
      panel.style.display = 'none';
      button.innerHTML = this.getShareIcon();
      button.style.background = this.config.customizations.buttonColor;
      this.isOpen = false;
    }

    // Style methods
    getContainerStyles() {
      const positions = {
        'bottom-right': 'bottom: 20px; right: 20px;',
        'bottom-left': 'bottom: 20px; left: 20px;',
        'top-right': 'top: 20px; right: 20px;',
        'top-left': 'top: 20px; left: 20px;'
      };
      
      return `position: fixed; ${positions[this.config.position]} z-index: 1000;`;
    }

    getFloatingButtonStyles() {
      return `
        width: 56px; height: 56px; background: ${this.config.customizations.buttonColor};
        border-radius: 50%; display: flex; align-items: center; justify-content: center;
        cursor: pointer; box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
        transition: all 0.3s ease; color: white; border: none;
      `;
    }

    getPanelStyles() {
      return `
        position: absolute; bottom: 70px; right: 0; width: 320px;
        background: ${this.config.customizations.panelColor}; border-radius: 12px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12); padding: 20px;
        border: 1px solid #e5e7eb;
      `;
    }

    getSocialButtonStyles(color) {
      return `
        display: flex; align-items: center; gap: 8px; padding: 10px 12px;
        border: none; border-radius: 8px; cursor: pointer; font-size: 13px;
        font-weight: 500; transition: all 0.2s; color: white; background: ${color};
        width: 100%;
      `;
    }

    getShareIcon() {
      return `
        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
          <path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.50-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92-1.31-2.92-2.92-2.92z"/>
        </svg>
      `;
    }

    getCloseIcon() {
      return `
        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
          <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
        </svg>
      `;
    }

    addStyles() {
      const styles = `
        .onenetly-float-btn:hover {
          transform: scale(1.1);
          box-shadow: 0 6px 20px rgba(99, 102, 241, 0.6);
        }
        .onenetly-social-btn:hover {
          transform: translateY(-1px);
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        .onenetly-header h3 {
          margin: 0 0 16px 0;
          font-size: 16px;
          font-weight: 600;
          color: ${this.config.customizations.textColor};
        }
        @media (max-width: 640px) {
          .onenetly-panel {
            width: calc(100vw - 32px) !important;
            right: -260px !important;
          }
        }
      `;
      
      const styleElement = document.createElement('style');
      styleElement.textContent = styles;
      document.head.appendChild(styleElement);
    }
  }

  // Global initialization
  window.OneNetly = {
    init: function(config) {
      return new OneNetly(config);
    }
  };

  // Auto-initialize if config is provided
  if (window.oneNetlyConfig) {
    window.OneNetly.init(window.oneNetlyConfig);
  }

})(window, document);
