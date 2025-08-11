(function(window, document) {
  'use strict';

  // Social platform configurations
  const socialConfigs = {
    'Facebook': {
      name: 'Facebook',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#1877f2"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>`
    },
    'Twitter': {
      name: 'Twitter',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#1da1f2"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>`
    },
    'LinkedIn': {
      name: 'LinkedIn',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#0077b5"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>`
    },
    'WhatsApp': {
      name: 'WhatsApp',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#25d366"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.465 3.488"/></svg>`
    },
    'Telegram': {
      name: 'Telegram',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#229ed9"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>`
    },
    'Pinterest': {
      name: 'Pinterest',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#bd081c"><path d="M12 0C5.374 0 0 5.373 0 12s5.374 12 12 12c6.627 0 12-5.373 12-12S18.627.001 12.001.001zM12 19c-1.659 0-3.197-.484-4.5-1.313.624-.984.928-1.801 1.056-2.734.066-.487.343-1.302.343-1.302.18.342.703.644 1.257.644 1.657 0 2.781-1.503 2.781-3.516 0-1.518-1.302-2.967-3.278-2.967-2.465 0-3.707 1.769-3.707 3.244 0 .893.34 1.687.892 1.985.092.05.141.027.162-.074.016-.076.106-.428.146-.588.056-.216.034-.292-.119-.481-.331-.411-.542-1.108-.542-1.663 0-2.139 1.604-4.05 4.176-4.05 2.278 0 3.53 1.389 3.53 3.244 0 2.439-1.086 4.501-2.695 4.501-.887 0-1.551-.731-1.337-1.629.257-1.075.756-2.234.756-3.01 0-.694-.374-1.274-1.146-1.274-.908 0-1.638.938-1.638 2.198 0 .801.271 1.344.271 1.344s-.928 3.923-1.089 4.608c-.323 1.37-.049 3.049-.025 3.22.014.1.141.124.199.048.083-.107 1.15-1.426 1.537-2.749.109-.375.626-2.444.626-2.444.309.589 1.214 1.108 2.175 1.108 2.862 0 4.804-2.602 4.804-6.084C19.395 6.538 16.977 4.5 12.528 4.5z"/></svg>`
    },
    'Tumblr': {
      name: 'Tumblr',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#001935"><path d="M14.563 24c-5.093 0-7.031-3.756-7.031-6.411V9.747H5.116V6.648c3.63-1.313 4.512-4.596 4.71-6.469C9.84.051 9.941 0 9.999 0h3.517v6.114h4.801v3.633h-4.82v7.47c.016 1.001.375 2.371 2.207 2.371h.09c.631-.02 1.486-.205 1.936-.419l1.156 3.425c-.436.636-2.4 1.374-4.156 1.404h-.178l.011.002z"/></svg>`
    },
    'Email': {
      name: 'Email',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#6b7280"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>`
    },
    'Print': {
      name: 'Print',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#6b7280"><path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"/></svg>`
    },
    'Copy Link': {
      name: 'Copy Link',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#6b7280"><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/></svg>`
    }
  };

  // All available social networks
  const allSocials = ['Facebook', 'Twitter', 'LinkedIn', 'WhatsApp', 'Telegram', 'Pinterest', 'Tumblr', 'Email', 'Print', 'Copy Link'];

  class OneNetly {
    constructor(options = {}) {
      this.config = {
        position: options.position || 'bottom-right',
        networks: options.networks || ['Facebook', 'Twitter', 'LinkedIn', 'WhatsApp', 'Telegram', 'Pinterest', 'Email', 'Copy Link'],
        showLabels: options.showLabels !== false,
        theme: options.theme || 'light',
        size: options.size || 'medium',
        ...options
      };

      this.isOpen = false;
      this.showMore = false;
      this.container = null;
      this.panel = null;

      this.init();
    }

    init() {
      this.addStyles();
      this.createWidget();
    }

    createWidget() {
      // Create main container
      this.container = document.createElement('div');
      this.container.className = 'onenetly-widget';
      this.container.style.cssText = this.getContainerStyles();

      // Create floating button
      const button = this.createFloatingButton();
      this.container.appendChild(button);

      // Create share panel
      this.panel = this.createSharePanel();
      this.container.appendChild(this.panel);

      // Add to page
      document.body.appendChild(this.container);

      // Close panel when clicking outside
      document.addEventListener('click', (e) => {
        if (!this.container.contains(e.target) && this.isOpen) {
          this.closePanel();
        }
      });
    }

    createFloatingButton() {
      const button = document.createElement('button');
      button.className = 'onenetly-float-btn';
      button.style.cssText = `
        position: relative; width: 64px; height: 64px; border-radius: 50%; border: none; cursor: pointer;
        background: #000000; display: flex; align-items: center; justify-content: center;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3); transition: all 0.3s ease; z-index: 1001;
      `;

      // Background gradient overlay
      const bgGradient = document.createElement('div');
      bgGradient.style.cssText = `
        position: absolute; inset: 0; border-radius: 50%; 
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        opacity: 0; transition: opacity 0.3s ease;
      `;
      button.appendChild(bgGradient);

      // Share icon
      const icon = document.createElement('div');
      icon.innerHTML = `
        <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
          <path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92-1.31-2.92-2.92-2.92z"/>
        </svg>
      `;
      icon.style.cssText = 'position: relative; z-index: 2;';
      button.appendChild(icon);

      // Pulse rings
      for (let i = 0; i < 2; i++) {
        const ring = document.createElement('div');
        ring.className = `onenetly-pulse-ring-${i + 1}`;
        ring.style.cssText = `
          position: absolute; inset: 0; border-radius: 50%; background: #000000;
          animation: onenetlyPulse 2s infinite;
          animation-delay: ${i * 0.5}s;
          opacity: ${i === 0 ? '0.2' : '0.1'};
        `;
        button.appendChild(ring);
      }
      
      button.addEventListener('click', () => this.togglePanel());
      button.addEventListener('mouseenter', () => {
        bgGradient.style.opacity = '1';
      });
      button.addEventListener('mouseleave', () => {
        bgGradient.style.opacity = '0';
      });
      
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
      header.style.cssText = 'text-align: center; margin-bottom: 24px;';
      header.innerHTML = `
        <h3 style="margin: 0 0 8px 0; font-size: 20px; font-weight: 700; color: #000000;">Share this page</h3>
        <p style="margin: 0; font-size: 14px; color: #6b7280;">Choose your favorite social network</p>
      `;
      panel.appendChild(header);

      // Main Social Networks - Show ALL selected networks
      const mainSocialContainer = document.createElement('div');
      mainSocialContainer.className = 'onenetly-main-socials';
      mainSocialContainer.style.cssText = 'display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-bottom: 24px;';

      // Show all user-selected networks in main area
      this.config.networks.forEach(socialName => {
        const social = socialConfigs[socialName];
        if (social) {
          const btn = this.createMainSocialButton(social);
          mainSocialContainer.appendChild(btn);
        }
      });

      panel.appendChild(mainSocialContainer);

      // Get unselected networks for "More" section
      const unselectedSocials = allSocials.filter(social => !this.config.networks.includes(social));

      // Only show "More" button if there are unselected networks
      if (unselectedSocials.length > 0) {
        // More Button
        const moreBtn = this.createMoreButton();
        panel.appendChild(moreBtn);

        // Additional Social Networks (hidden by default) - Show UNSELECTED networks
        const moreSocialContainer = document.createElement('div');
        moreSocialContainer.className = 'onenetly-more-socials';
        moreSocialContainer.style.cssText = 'display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-top: 16px; max-height: 0; overflow: hidden; opacity: 0; transition: all 0.3s ease;';

        unselectedSocials.forEach(socialName => {
          const social = socialConfigs[socialName];
          if (social) {
            const btn = this.createMainSocialButton(social);
            moreSocialContainer.appendChild(btn);
          }
        });

        panel.appendChild(moreSocialContainer);
      }

      // Footer
      const footer = document.createElement('div');
      footer.className = 'onenetly-footer';
      footer.style.cssText = 'margin-top: 24px; padding-top: 16px; border-top: 1px solid #e5e7eb; text-align: center;';
      footer.innerHTML = '<p style="margin: 0; font-size: 12px; color: #9ca3af;">Powered by OneNetly</p>';
      panel.appendChild(footer);

      return panel;
    }

    createMainSocialButton(social) {
      const btn = document.createElement('button');
      btn.className = 'onenetly-social-btn';
      btn.style.cssText = `
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 14px;
        font-weight: 500;
        color: #374151;
        text-decoration: none;
        width: 100%;
        text-align: left;
      `;

      // Icon
      const icon = document.createElement('div');
      icon.innerHTML = social.icon;
      icon.style.cssText = 'flex-shrink: 0; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;';
      btn.appendChild(icon);

      // Label
      const label = document.createElement('span');
      label.textContent = social.name;
      label.style.cssText = 'flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;';
      btn.appendChild(label);

      // Hover effects
      btn.addEventListener('mouseenter', () => {
        btn.style.backgroundColor = '#f9fafb';
        btn.style.borderColor = '#d1d5db';
        btn.style.transform = 'translateY(-1px)';
        btn.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
      });

      btn.addEventListener('mouseleave', () => {
        btn.style.backgroundColor = '#ffffff';
        btn.style.borderColor = '#e5e7eb';
        btn.style.transform = 'translateY(0)';
        btn.style.boxShadow = 'none';
      });

      // Click handler
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        if (social.name === 'Copy Link') {
          this.copyToClipboard();
        } else if (social.name === 'Email') {
          this.shareViaEmail();
        } else if (social.name === 'Print') {
          this.printPage();
        } else {
          this.shareToSocial(social);
        }
      });

      return btn;
    }

    createMoreButton() {
      const moreBtn = document.createElement('button');
      moreBtn.className = 'onenetly-more-btn';
      moreBtn.style.cssText = `
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 12px 16px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 14px;
        font-weight: 500;
        color: #6b7280;
        margin-bottom: 16px;
      `;

      const icon = document.createElement('div');
      icon.innerHTML = `
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M6 9l6 6 6-6"/>
        </svg>
      `;
      icon.style.cssText = 'transform: rotate(0deg); transition: transform 0.3s ease;';
      
      const label = document.createElement('span');
      label.textContent = 'More';
      
      moreBtn.appendChild(label);
      moreBtn.appendChild(icon);

      // Hover effects
      moreBtn.addEventListener('mouseenter', () => {
        moreBtn.style.backgroundColor = '#f9fafb';
        moreBtn.style.borderColor = '#d1d5db';
      });

      moreBtn.addEventListener('mouseleave', () => {
        moreBtn.style.backgroundColor = '#ffffff';
        moreBtn.style.borderColor = '#e5e7eb';
      });

      // Click handler
      moreBtn.addEventListener('click', () => {
        this.showMore = !this.showMore;
        this.toggleMoreSocials(icon);
      });

      return moreBtn;
    }

    toggleMoreSocials(icon) {
      const moreSocialContainer = this.panel.querySelector('.onenetly-more-socials');
      if (moreSocialContainer) {
        if (this.showMore) {
          moreSocialContainer.style.maxHeight = '300px';
          moreSocialContainer.style.opacity = '1';
          icon.style.transform = 'rotate(180deg)';
        } else {
          moreSocialContainer.style.maxHeight = '0';
          moreSocialContainer.style.opacity = '0';
          icon.style.transform = 'rotate(0deg)';
        }
      }
    }

    shareToSocial(social) {
      const url = window.location.href;
      const title = document.title;
      
      let shareUrl = '';
      switch(social.name) {
        case 'Facebook':
          shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
          break;
        case 'Twitter':
          shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;
          break;
        case 'LinkedIn':
          shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
          break;
        case 'WhatsApp':
          shareUrl = `https://wa.me/?text=${encodeURIComponent(title + ' ' + url)}`;
          break;
        case 'Telegram':
          shareUrl = `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;
          break;
        case 'Pinterest':
          shareUrl = `https://pinterest.com/pin/create/button/?url=${encodeURIComponent(url)}&description=${encodeURIComponent(title)}`;
          break;
        case 'Tumblr':
          shareUrl = `https://www.tumblr.com/widgets/share/tool?canonicalUrl=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`;
          break;
      }
      
      if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400,scrollbars=yes,resizable=yes');
        this.closePanel();
      }
    }

    shareViaEmail() {
      const subject = encodeURIComponent(document.title);
      const body = encodeURIComponent(`Check out this page: ${window.location.href}`);
      window.location.href = `mailto:?subject=${subject}&body=${body}`;
      this.closePanel();
    }

    printPage() {
      window.print();
      this.closePanel();
    }

    copyToClipboard() {
      const url = window.location.href;
      navigator.clipboard.writeText(url).then(() => {
        // Show success feedback
        const button = document.querySelector('.onenetly-social-btn');
        if (button) {
          const originalText = button.querySelector('span').textContent;
          button.querySelector('span').textContent = 'Copied!';
          setTimeout(() => {
            button.querySelector('span').textContent = originalText;
          }, 2000);
        }
      }).catch(() => {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = url;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
      });
      this.closePanel();
    }

    togglePanel() {
      if (this.isOpen) {
        this.closePanel();
      } else {
        this.panel.style.display = 'block';
        setTimeout(() => {
          this.panel.style.opacity = '1';
          this.panel.style.transform = 'translateY(0) scale(1)';
        }, 10);
        this.isOpen = true;
      }
    }

    closePanel() {
      this.panel.style.opacity = '0';
      this.panel.style.transform = 'translateY(20px) scale(0.95)';
      setTimeout(() => {
        this.panel.style.display = 'none';
      }, 300);
      this.isOpen = false;
      this.showMore = false;
      
      // Reset more socials
      const moreSocialContainer = this.panel.querySelector('.onenetly-more-socials');
      const moreIcon = this.panel.querySelector('.onenetly-more-btn div');
      if (moreSocialContainer && moreIcon) {
        moreSocialContainer.style.maxHeight = '0';
        moreSocialContainer.style.opacity = '0';
        moreIcon.style.transform = 'rotate(0deg)';
      }
    }

    getContainerStyles() {
      const positions = {
        'bottom-right': 'bottom: 24px; right: 24px;',
        'bottom-left': 'bottom: 24px; left: 24px;',
        'top-right': 'top: 24px; right: 24px;',
        'top-left': 'top: 24px; left: 24px;'
      };
      
      return `
        position: fixed;
        ${positions[this.config.position] || positions['bottom-right']}
        z-index: 1000;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      `;
    }

    getPanelStyles() {
      const position = this.config.position;
      let panelPosition = '';
      
      if (position.includes('bottom')) {
        panelPosition = 'bottom: 80px;';
      } else {
        panelPosition = 'top: 80px;';
      }
      
      if (position.includes('right')) {
        panelPosition += 'right: 0;';
      } else {
        panelPosition += 'left: 0;';
      }
      
      return `
        position: absolute;
        ${panelPosition}
        width: 320px;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        padding: 24px;
        opacity: 0;
        transform: translateY(20px) scale(0.95);
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
        backdrop-filter: blur(20px);
      `;
    }

    addStyles() {
      if (document.querySelector('#onenetly-styles')) return;
      
      const styles = document.createElement('style');
      styles.id = 'onenetly-styles';
      styles.textContent = `
        @keyframes onenetlyPulse {
          0% { transform: scale(1); opacity: 0.2; }
          50% { transform: scale(1.2); opacity: 0.1; }
          100% { transform: scale(1.4); opacity: 0; }
        }
        
        .onenetly-widget * {
          box-sizing: border-box;
        }
        
        .onenetly-float-btn:hover {
          transform: translateY(-2px);
          box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }
        
        .onenetly-social-btn:active {
          transform: translateY(0) !important;
        }
        
        .onenetly-more-btn:hover {
          transform: translateY(-1px);
        }
        
        @media (max-width: 480px) {
          .onenetly-panel {
            width: calc(100vw - 48px) !important;
            max-width: 320px;
          }
        }
      `;
      
      document.head.appendChild(styles);
    }
  }

  // Auto-initialize with data attributes
  function autoInit() {
    const scripts = document.querySelectorAll('script[src*="widget.js"]');
    let config = {};
    
    scripts.forEach(script => {
      if (script.dataset.position) config.position = script.dataset.position;
      if (script.dataset.networks) config.networks = script.dataset.networks.split(',');
      if (script.dataset.theme) config.theme = script.dataset.theme;
    });
    
    new OneNetly(config);
  }

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', autoInit);
  } else {
    autoInit();
  }

  // Global access
  window.OneNetly = OneNetly;

})(window, document);
