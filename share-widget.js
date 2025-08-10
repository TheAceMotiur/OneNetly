/**
 * OneNetly Social Share Widget
 * A customizable floating social share widget
 * Version: 1.0.0
 */

(function() {
    'use strict';

    // Default configuration
    const defaultConfig = {
        position: 'left',
        shape: 'circle',
        size: '50px',
        animation: 'scale',
        networks: ['facebook', 'twitter', 'linkedin', 'pinterest', 'whatsapp', 'telegram'],
        customCSS: {},
        showMoreButton: true,
        moreNetworks: ['reddit', 'tumblr', 'vk', 'email', 'copy', 'print']
    };

    // Social network configurations
    const socialNetworks = {
        facebook: {
            name: 'Facebook',
            icon: 'fab fa-facebook-f',
            color: '#1877f2',
            shareUrl: (url, title) => `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`
        },
        twitter: {
            name: 'Twitter',
            icon: 'fab fa-twitter',
            color: '#1da1f2',
            shareUrl: (url, title) => `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`
        },
        linkedin: {
            name: 'LinkedIn',
            icon: 'fab fa-linkedin-in',
            color: '#0077b5',
            shareUrl: (url, title) => `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`
        },
        pinterest: {
            name: 'Pinterest',
            icon: 'fab fa-pinterest-p',
            color: '#bd081c',
            shareUrl: (url, title) => `https://pinterest.com/pin/create/button/?url=${encodeURIComponent(url)}&description=${encodeURIComponent(title)}`
        },
        whatsapp: {
            name: 'WhatsApp',
            icon: 'fab fa-whatsapp',
            color: '#25d366',
            shareUrl: (url, title) => `https://wa.me/?text=${encodeURIComponent(title + ' ' + url)}`
        },
        telegram: {
            name: 'Telegram',
            icon: 'fab fa-telegram-plane',
            color: '#0088cc',
            shareUrl: (url, title) => `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`
        },
        reddit: {
            name: 'Reddit',
            icon: 'fab fa-reddit-alien',
            color: '#ff4500',
            shareUrl: (url, title) => `https://reddit.com/submit?url=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`
        },
        tumblr: {
            name: 'Tumblr',
            icon: 'fab fa-tumblr',
            color: '#35465d',
            shareUrl: (url, title) => `https://www.tumblr.com/widgets/share/tool?canonicalUrl=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`
        },
        vk: {
            name: 'VKontakte',
            icon: 'fab fa-vk',
            color: '#4680c2',
            shareUrl: (url, title) => `https://vk.com/share.php?url=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`
        },
        email: {
            name: 'Email',
            icon: 'fas fa-envelope',
            color: '#6c757d',
            shareUrl: (url, title) => `mailto:?subject=${encodeURIComponent(title)}&body=${encodeURIComponent(url)}`
        },
        copy: {
            name: 'Copy Link',
            icon: 'fas fa-copy',
            color: '#28a745',
            action: 'copy'
        },
        print: {
            name: 'Print',
            icon: 'fas fa-print',
            color: '#6f42c1',
            action: 'print'
        }
    };

    // CSS styles - Now supporting both custom CSS and Tailwind CSS
    const widgetCSS = `
        .onenetly-share-widget {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 8px;
            opacity: 0.9;
            transition: opacity 0.3s ease;
            font-family: Arial, sans-serif;
        }

        .onenetly-share-widget:hover {
            opacity: 1;
        }

        .onenetly-share-widget.position-left {
            left: 20px;
        }

        .onenetly-share-widget.position-right {
            right: 20px;
        }

        .onenetly-share-btn {
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            transition: all 0.3s ease;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .onenetly-share-btn:hover {
            text-decoration: none;
            color: white;
        }

        .onenetly-share-btn.shape-circle {
            border-radius: 50%;
        }

        .onenetly-share-btn.shape-square {
            border-radius: 10px;
        }

        .onenetly-share-btn.animation-scale:hover {
            transform: scale(1.1);
        }

        .onenetly-share-btn.animation-bounce:hover {
            animation: onenetly-bounce 0.6s;
        }

        .onenetly-share-btn.animation-rotate:hover {
            transform: rotate(360deg);
        }

        @keyframes onenetly-bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .onenetly-share-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 10000;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .onenetly-modal-content {
            background: white;
            border-radius: 15px;
            padding: 30px;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
        }

        .onenetly-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }

        .onenetly-modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #6c757d;
        }

        .onenetly-modal-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 15px;
        }

        .onenetly-modal-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            padding: 15px;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            text-decoration: none;
            color: #495057;
            transition: all 0.3s ease;
        }

        .onenetly-modal-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-color: #007bff;
            text-decoration: none;
            color: #495057;
        }

        .onenetly-modal-btn i {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .onenetly-modal-btn span {
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .onenetly-share-widget.position-left {
                left: 10px;
            }
            
            .onenetly-share-widget.position-right {
                right: 10px;
            }
            
            .onenetly-modal-content {
                margin: 10px;
                padding: 20px;
            }
        }
    `;

    class OneNetlyShareWidget {
        constructor(config = {}) {
            this.config = { ...defaultConfig, ...config };
            this.widget = null;
            this.modal = null;
            this.init();
        }

        init() {
            this.loadFontAwesome();
            this.injectCSS();
            this.createWidget();
            this.createModal();
            this.attachEventListeners();
        }

        loadFontAwesome() {
            if (!document.querySelector('link[href*="font-awesome"]')) {
                const link = document.createElement('link');
                link.rel = 'stylesheet';
                link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css';
                document.head.appendChild(link);
            }
        }

        injectCSS() {
            if (!document.getElementById('onenetly-share-css')) {
                const style = document.createElement('style');
                style.id = 'onenetly-share-css';
                style.textContent = widgetCSS;
                document.head.appendChild(style);
            }
        }

        createWidget() {
            this.widget = document.createElement('div');
            this.widget.className = `onenetly-share-widget position-${this.config.position}`;

            // Create buttons for selected networks
            this.config.networks.forEach(networkKey => {
                if (socialNetworks[networkKey]) {
                    const btn = this.createButton(networkKey, socialNetworks[networkKey]);
                    this.widget.appendChild(btn);
                }
            });

            // Add "More" button if enabled
            if (this.config.showMoreButton) {
                const moreBtn = this.createMoreButton();
                this.widget.appendChild(moreBtn);
            }

            document.body.appendChild(this.widget);
        }

        createButton(networkKey, network) {
            const btn = document.createElement('a');
            btn.href = '#';
            btn.className = `onenetly-share-btn shape-${this.config.shape} animation-${this.config.animation}`;
            btn.style.width = this.config.size;
            btn.style.height = this.config.size;
            btn.style.backgroundColor = this.config.customCSS[networkKey] || network.color;
            btn.title = `Share on ${network.name}`;
            btn.dataset.network = networkKey;

            const icon = document.createElement('i');
            icon.className = network.icon;
            btn.appendChild(icon);

            return btn;
        }

        createMoreButton() {
            const btn = document.createElement('button');
            btn.className = `onenetly-share-btn shape-${this.config.shape} animation-${this.config.animation}`;
            btn.style.width = this.config.size;
            btn.style.height = this.config.size;
            btn.style.backgroundColor = '#6c757d';
            btn.title = 'More sharing options';
            btn.onclick = () => this.openModal();

            const icon = document.createElement('i');
            icon.className = 'fas fa-plus';
            btn.appendChild(icon);

            return btn;
        }

        createModal() {
            this.modal = document.createElement('div');
            this.modal.className = 'onenetly-share-modal';
            this.modal.innerHTML = `
                <div class="onenetly-modal-content">
                    <div class="onenetly-modal-header">
                        <h3>Share this page</h3>
                        <button class="onenetly-modal-close">&times;</button>
                    </div>
                    <div class="onenetly-modal-grid">
                        ${this.config.moreNetworks.map(networkKey => {
                            const network = socialNetworks[networkKey];
                            if (!network) return '';
                            return `
                                <a href="#" class="onenetly-modal-btn" data-network="${networkKey}">
                                    <i class="${network.icon}" style="color: ${network.color}"></i>
                                    <span>${network.name}</span>
                                </a>
                            `;
                        }).join('')}
                    </div>
                </div>
            `;

            document.body.appendChild(this.modal);
        }

        attachEventListeners() {
            // Handle widget button clicks
            this.widget.addEventListener('click', (e) => {
                e.preventDefault();
                const networkKey = e.target.closest('[data-network]')?.dataset.network;
                if (networkKey) {
                    this.handleShare(networkKey);
                }
            });

            // Handle modal button clicks
            this.modal.addEventListener('click', (e) => {
                e.preventDefault();
                if (e.target.closest('.onenetly-modal-close') || e.target === this.modal) {
                    this.closeModal();
                } else {
                    const networkKey = e.target.closest('[data-network]')?.dataset.network;
                    if (networkKey) {
                        this.handleShare(networkKey);
                        this.closeModal();
                    }
                }
            });
        }

        handleShare(networkKey) {
            const network = socialNetworks[networkKey];
            if (!network) return;

            const url = window.location.href;
            const title = document.title;

            if (network.action === 'copy') {
                this.copyToClipboard(url);
                return;
            }

            if (network.action === 'print') {
                window.print();
                return;
            }

            if (network.shareUrl) {
                const shareUrl = network.shareUrl(url, title);
                window.open(shareUrl, '_blank', 'width=600,height=400,scrollbars=yes,resizable=yes');
            }
        }

        copyToClipboard(text) {
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(() => {
                    this.showNotification('Link copied to clipboard!');
                });
            } else {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                this.showNotification('Link copied to clipboard!');
            }
        }

        showNotification(message) {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: #28a745;
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                z-index: 10001;
                font-family: Arial, sans-serif;
                box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            `;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        openModal() {
            this.modal.style.display = 'flex';
        }

        closeModal() {
            this.modal.style.display = 'none';
        }

        destroy() {
            if (this.widget) this.widget.remove();
            if (this.modal) this.modal.remove();
        }
    }

    // Global API
    window.OneNetlyShare = {
        init: function(config) {
            if (window.OneNetlyShareInstance) {
                window.OneNetlyShareInstance.destroy();
            }
            window.OneNetlyShareInstance = new OneNetlyShareWidget(config);
        },
        destroy: function() {
            if (window.OneNetlyShareInstance) {
                window.OneNetlyShareInstance.destroy();
                window.OneNetlyShareInstance = null;
            }
        }
    };

    // Auto-initialize if data attributes are found
    document.addEventListener('DOMContentLoaded', function() {
        const script = document.querySelector('script[src*="share-widget.js"]');
        if (script && script.dataset.autoInit !== 'false') {
            // Check for configuration in data attributes
            const config = {};
            if (script.dataset.position) config.position = script.dataset.position;
            if (script.dataset.shape) config.shape = script.dataset.shape;
            if (script.dataset.size) config.size = script.dataset.size;
            if (script.dataset.animation) config.animation = script.dataset.animation;
            if (script.dataset.networks) {
                try {
                    config.networks = JSON.parse(script.dataset.networks);
                } catch (e) {
                    console.warn('Invalid networks configuration in data-networks attribute');
                }
            }

            window.OneNetlyShare.init(config);
        }
    });

})();
