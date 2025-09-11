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
    'Reddit': {
      name: 'Reddit',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#FF4500"><path d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701zM9.25 12C8.561 12 8 12.562 8 13.25c0 .687.561 1.248 1.25 1.248.687 0 1.248-.561 1.248-1.249 0-.688-.561-1.249-1.249-1.249zm5.5 0c-.687 0-1.248.561-1.248 1.25 0 .687.561 1.248 1.249 1.248.688 0 1.249-.561 1.249-1.249 0-.687-.562-1.249-1.25-1.249zm-5.466 3.99a.327.327 0 0 0-.231.094.33.33 0 0 0 0 .463c.842.842 2.484.913 2.961.913.477 0 2.105-.056 2.961-.913a.361.361 0 0 0 .029-.463.33.33 0 0 0-.464 0c-.547.533-1.684.73-2.512.73-.828 0-1.979-.196-2.512-.73a.326.326 0 0 0-.232-.095z"/></svg>`
    },
    'Viber': {
      name: 'Viber',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#665CAC"><path d="M11.398.002C9.473.028 5.331.344 3.014 2.467 1.294 4.177.693 6.698.623 9.82c-.06 3.11-.13 8.95 5.5 10.54v2.42s-.04.99.62.66c.75-.38 4.54-2.77 5.24-3.24 8.88-.07 11.99-1.86 12.39-14.9.28-5.35-1.95-9.08-6.92-10.24l-5.435-.07z"/></svg>`
    },
    'WeChat': {
      name: 'WeChat',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#07C160"><path d="M8.691 2.188C3.891 2.188 0 5.476 0 9.53c0 2.212 1.17 4.203 3.002 5.55a.59.59 0 0 1 .213.665l-.39 1.48c-.019.07-.048.141-.048.213 0 .163.13.295.29.295a.326.326 0 0 0 .167-.054l1.903-1.114a.864.864 0 0 1 .717-.098 10.16 10.16 0 0 0 2.837.403c.276 0 .543-.027.811-.05-.857-2.578.157-4.972 1.932-6.446 1.703-1.415 3.882-1.98 5.853-1.838-.576-3.583-4.196-6.348-8.596-6.348zM5.785 5.991c.642 0 1.162.529 1.162 1.18 0 .659-.52 1.188-1.162 1.188-.642 0-1.162-.529-1.162-1.188 0-.651.52-1.18 1.162-1.18zm5.813 0c.642 0 1.162.529 1.162 1.18 0 .659-.52 1.188-1.162 1.188-.642 0-1.162-.529-1.162-1.188 0-.651.52-1.18 1.162-1.18zm-2.897 8.104c-.023 0-.046-.004-.069-.007l-2.986 1.74c-.046.027-.1.041-.156.041-.079 0-.157-.033-.212-.09a.3.3 0 0 1-.085-.209c0-.04.014-.08.025-.118l.514-1.95c.052-.198-.018-.407-.175-.528-2.397-1.85-3.877-4.632-3.877-7.725 0-5.543 5.061-10.05 11.284-10.05 6.047 0 11.052 4.246 11.278 9.558-.637-.176-1.312-.269-2.01-.269-5.04 0-9.128 3.724-9.128 8.323 0 .295.024.586.063.874z"/></svg>`
    },
    'Skype': {
      name: 'Skype',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#00AFF0"><path d="M12.069 18.874c-4.023 0-5.82-1.979-5.82-3.464 0-.765.561-1.296 1.333-1.296 1.723 0 1.273 2.477 4.487 2.477 1.641 0 2.55-.895 2.55-1.811 0-.551-.269-1.16-1.354-1.429l-3.576-.895c-2.88-.724-3.403-2.286-3.403-3.751 0-3.047 2.861-4.191 5.549-4.191 2.471 0 5.393 1.373 5.393 3.199 0 .784-.688 1.24-1.453 1.24-1.469 0-1.198-2.037-4.164-2.037-1.469 0-2.292.664-2.292 1.617 0 .587.249 1.107 1.302 1.385l3.249.807c2.943.73 3.598 2.341 3.598 3.85 0 2.477-1.902 4.299-5.899 4.299z"/></svg>`
    },
    'VKontakte': {
      name: 'VKontakte',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#4C75A3"><path d="M15.684 0H8.316C1.592 0 0 1.592 0 8.316v7.368C0 22.408 1.592 24 8.316 24h7.368C22.408 24 24 22.408 24 15.684V8.316C24 1.592 22.408 0 15.684 0zm3.692 17.123h-1.744c-.66 0-.864-.525-2.05-1.727-1.033-1.01-1.49-1.135-1.744-1.135-.356 0-.458.102-.458.593v1.575c0 .424-.135.678-1.253.678-1.846 0-3.896-1.118-5.335-3.202C4.624 10.857 4.03 8.57 4.03 8.096c0-.254.102-.491.593-.491h1.744c.44 0 .61.203.779.677.881 2.508 2.361 4.698 2.971 4.698.229 0 .328-.102.328-.66V9.721c-.068-1.186-.695-1.287-.695-1.71 0-.204.169-.407.44-.407h2.746c.373 0 .508.203.508.643v3.473c0 .372.169.508.271.508.229 0 .407-.136.813-.542 1.254-1.406 2.151-3.574 2.151-3.574.119-.254.322-.491.763-.491h1.744c.525 0 .644.271.525.643-.339 1.575-3.097 4.633-3.097 4.633-.229.305-.322.44 0 .779.237.271.813.795 1.218 1.286.745.899 1.32 1.659 1.473 2.188.17.491-.085.745-.576.745z"/></svg>`
    },
    'Line': {
      name: 'Line',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#00C300"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63h2.386c.349 0 .63.285.63.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63.349 0 .631.285.631.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.282.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>`
    },
    'QR Code': {
      name: 'QR Code',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#6b7280"><path d="M3 11v10h10V11H3zm2 2h6v6H5v-6zM11 3v8h10V3H11zm2 2h6v4h-6V5zM3 3v8h8V3H3zm2 2h4v4H5V5z"/></svg>`
    },
    'SMS': {
      name: 'SMS',
      icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="#6b7280"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>`
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
  const allSocials = ['Facebook', 'Twitter', 'LinkedIn', 'WhatsApp', 'Telegram', 'Pinterest', 'Tumblr', 'Reddit', 'Viber', 'WeChat', 'Skype', 'VKontakte', 'Line', 'QR Code', 'SMS', 'Email', 'Print', 'Copy Link'];

  class OneNetly {
    constructor(options = {}) {
      this.config = {
        position: options.position || 'bottom-right',
        networks: options.networks || ['Facebook', 'Twitter', 'LinkedIn', 'WhatsApp', 'Telegram', 'Pinterest', 'Reddit', 'Email', 'Copy Link'],
        showLabels: options.showLabels !== false,
        theme: options.theme || 'light',
        size: options.size || 'medium',
        adBlockerDetector: options.adBlockerDetector === true, // Default disabled
        ...options
      };

      this.isOpen = false;
      this.showMore = false;
      this.container = null;
      this.panel = null;
      this.adBlockerDetected = false;

      this.init();
    }

    init() {
      this.addStyles();
      if (this.config.adBlockerDetector) {
        this.detectAdBlocker();
      }
      this.createWidget();
    }

    detectAdBlocker() {
      return new Promise((mainResolve) => {
        // Method 1: Test for blocked ad scripts
        const testAdScript = document.createElement('script');
        testAdScript.type = 'text/javascript';
        testAdScript.async = true;
        testAdScript.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js';
        
        const testPromise = new Promise((resolve) => {
          testAdScript.onload = () => resolve(false);
          testAdScript.onerror = () => resolve(true);
          setTimeout(() => resolve(true), 2000); // Timeout fallback
        });

        // Method 2: Test for blocked elements
        const testDiv = document.createElement('div');
        testDiv.innerHTML = '&nbsp;';
        testDiv.className = 'adsbox ad advertisement ads banner-ad';
        testDiv.style.cssText = 'position:absolute!important;left:-10000px!important;top:-1000px!important;width:1px!important;height:1px!important;';
        document.body.appendChild(testDiv);

        // Method 3: Check for common ad blocker indicators
        const commonBlockedSelectors = [
          '.ads',
          '.advertisement', 
          '.banner-ad',
          '[id*="google_ads"]',
          '[class*="adsbygoogle"]'
        ];

        testPromise.then((scriptBlocked) => {
          // Check if test element is hidden/blocked
          const elementBlocked = testDiv.offsetHeight === 0 || 
                                testDiv.style.display === 'none' || 
                                testDiv.style.visibility === 'hidden';
          
          // Check for blocked selectors
          const selectorsBlocked = commonBlockedSelectors.some(selector => {
            const elements = document.querySelectorAll(selector);
            return elements.length === 0 && selector === '.ads'; // Basic test
          });

          const detected = scriptBlocked || elementBlocked;
          this.adBlockerDetected = detected;
          
          // Clean up test element
          if (testDiv.parentNode) {
            testDiv.parentNode.removeChild(testDiv);
          }

          // Show overlay if ad blocker detected
          if (detected) {
            this.showAdBlockerNotification();
          }

          // Resolve with detection result
          mainResolve(detected);
        });

        // Add test script to head
        document.head.appendChild(testAdScript);
      });
    }

    showAdBlockerNotification() {
      // Check if overlay already exists
      if (document.querySelector('.onenetly-adblocker-overlay')) {
        return;
      }

      // Check if user chose to continue without disabling (12 hour grace period)
      const continueTime = localStorage.getItem('onenetly-continue-without-disable');
      if (continueTime) {
        const now = Date.now();
        const twelveHours = 12 * 60 * 60 * 1000; // 12 hours in milliseconds
        if ((now - parseInt(continueTime)) < twelveHours) {
          return; // Don't show overlay if within 12 hour grace period
        }
      }

      // Create full-screen overlay
      const overlay = document.createElement('div');
      overlay.className = 'onenetly-adblocker-overlay';
      overlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 999999;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        padding: 20px;
        box-sizing: border-box;
      `;

      // Create simple message box
      const messageBox = document.createElement('div');
      messageBox.style.cssText = `
        background: white;
        color: #333;
        padding: 40px;
        border-radius: 12px;
        text-align: center;
        max-width: 400px;
        width: 100%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      `;

      messageBox.innerHTML = `
        <h2 style="margin: 0 0 20px 0; font-size: 24px; font-weight: 600; color: #e74c3c;">
          Ad Blocker Detected
        </h2>
        <p style="margin: 0 0 30px 0; font-size: 16px; line-height: 1.5; color: #555;">
          Please disable your ad blocker to continue browsing this website.
        </p>
        <button onclick="window.location.reload()" style="
          background: #3498db;
          color: white;
          border: none;
          padding: 12px 24px;
          border-radius: 6px;
          cursor: pointer;
          font-size: 14px;
          font-weight: 500;
          margin-right: 10px;
        ">
          Refresh Page
        </button>
        <button onclick="
          localStorage.setItem('onenetly-continue-without-disable', Date.now().toString());
          document.querySelector('.onenetly-adblocker-overlay').remove();
        " style="
          background: #95a5a6;
          color: white;
          border: none;
          padding: 12px 24px;
          border-radius: 6px;
          cursor: pointer;
          font-size: 14px;
          font-weight: 500;
        ">
          Continue Without Disabling
        </button>
        <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid #e5e7eb; text-align: center;">
          <p style="margin: 0; font-size: 12px; color: #9ca3af;">
            Powered by <a href="https://onenetly.com/" target="_blank" rel="dofollow" style="color: #667eea; text-decoration: none; font-weight: 500;">OneNetly</a>
          </p>
        </div>
      `;

      overlay.appendChild(messageBox);
      document.body.appendChild(overlay);

      // Check every 3 seconds if ad blocker is still active
      const checkInterval = setInterval(() => {
        const continueTime = localStorage.getItem('onenetly-continue-without-disable');
        if (continueTime) {
          clearInterval(checkInterval);
          return;
        }

        this.detectAdBlocker().then(detected => {
          if (!detected) {
            // Ad blocker disabled, remove overlay
            clearInterval(checkInterval);
            this.removeAdBlockerOverlay();
          }
        });
      }, 3000);
    }

    removeAdBlockerOverlay() {
      const overlay = document.querySelector('.onenetly-adblocker-overlay');
      if (overlay) {
        overlay.remove();
      }
    }

    // Public API methods for controlling ad blocker detection
    isAdBlockerDetected() {
      return this.adBlockerDetected;
    }

    enableAdBlockerDetector() {
      this.config.adBlockerDetector = true;
      if (!this.adBlockerDetected) {
        this.detectAdBlocker();
      }
    }

    disableAdBlockerDetector() {
      this.config.adBlockerDetector = false;
      // Remove any existing overlay
      this.removeAdBlockerOverlay();
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
      footer.innerHTML = '<p style="margin: 0; font-size: 12px; color: #9ca3af;">Powered by <a href="https://onenetly.com/" target="_blank" rel="dofollow" style="color: #667eea; text-decoration: none; font-weight: 500;">OneNetly</a></p>';
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
        } else if (social.name === 'QR Code') {
          this.generateQRCode(window.location.href);
        } else if (social.name === 'SMS') {
          this.shareViaSMS();
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
        case 'Reddit':
          shareUrl = `https://www.reddit.com/submit?url=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`;
          break;
        case 'Viber':
          shareUrl = `viber://forward?text=${encodeURIComponent(title + ' ' + url)}`;
          break;
        case 'WeChat':
          // WeChat doesn't have a direct web share URL, copy to clipboard
          this.copyToClipboard(`${title} - ${url}`);
          return;
        case 'Skype':
          shareUrl = `https://web.skype.com/share?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;
          break;
        case 'VKontakte':
          shareUrl = `https://vk.com/share.php?url=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`;
          break;
        case 'Line':
          shareUrl = `https://social-plugins.line.me/lineit/share?url=${encodeURIComponent(url)}`;
          break;
        case 'QR Code':
          this.generateQRCode(url);
          return;
        case 'SMS':
          this.shareViaSMS();
          return;
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

    copyToClipboard(customText = null) {
      const textToCopy = customText || window.location.href;
      navigator.clipboard.writeText(textToCopy).then(() => {
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
        textArea.value = textToCopy;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
      });
      this.closePanel();
    }

    shareViaSMS() {
      const title = document.title;
      const url = window.location.href;
      const message = encodeURIComponent(`${title} - ${url}`);
      
      // Try to open SMS app
      if (/iPhone|iPad|iPod/.test(navigator.userAgent)) {
        window.location.href = `sms:&body=${message}`;
      } else if (/Android/.test(navigator.userAgent)) {
        window.location.href = `sms:?body=${message}`;
      } else {
        // Fallback: copy to clipboard
        this.copyToClipboard(`${title} - ${url}`);
      }
      this.closePanel();
    }

    generateQRCode(url) {
      // Create a modal to show QR code
      const modal = document.createElement('div');
      modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10000;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      `;

      const qrContainer = document.createElement('div');
      qrContainer.style.cssText = `
        background: white;
        padding: 30px;
        border-radius: 15px;
        text-align: center;
        max-width: 350px;
        width: 90%;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      `;

      // Use QR Server API to generate QR code
      const qrCodeUrl = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${encodeURIComponent(url)}`;
      
      qrContainer.innerHTML = `
        <h3 style="margin: 0 0 20px 0; color: #333; font-size: 20px;">Scan QR Code</h3>
        <img src="${qrCodeUrl}" alt="QR Code" style="max-width: 200px; height: auto; border: 1px solid #e5e7eb; border-radius: 8px;">
        <p style="margin: 15px 0 0 0; color: #666; font-size: 14px;">Scan with your phone to open this page</p>
        <button onclick="this.parentElement.parentElement.remove()" style="
          margin-top: 20px;
          background: #667eea;
          color: white;
          border: none;
          padding: 10px 20px;
          border-radius: 8px;
          cursor: pointer;
          font-size: 14px;
        ">Close</button>
      `;

      modal.appendChild(qrContainer);
      document.body.appendChild(modal);

      // Close modal when clicking outside
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          modal.remove();
        }
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
      if (script.dataset.adBlockerDetector !== undefined) {
        config.adBlockerDetector = script.dataset.adBlockerDetector !== 'false';
      }
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

  // Global utility methods
  window.OneNetly.detectAdBlocker = function() {
    // Simple global ad blocker detection without creating widget
    return new Promise((resolve) => {
      const testDiv = document.createElement('div');
      testDiv.innerHTML = '&nbsp;';
      testDiv.className = 'adsbox ad advertisement ads banner-ad';
      testDiv.style.cssText = 'position:absolute!important;left:-10000px!important;top:-1000px!important;width:1px!important;height:1px!important;';
      document.body.appendChild(testDiv);
      
      setTimeout(() => {
        const detected = testDiv.offsetHeight === 0 || 
                        testDiv.style.display === 'none' || 
                        testDiv.style.visibility === 'hidden';
        
        if (testDiv.parentNode) {
          testDiv.parentNode.removeChild(testDiv);
        }
        
        resolve(detected);
      }, 100);
    });
  };

})(window, document);
