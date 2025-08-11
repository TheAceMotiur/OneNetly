# OneNetly Widget - Available Social Networks

## Overview
The OneNetly widget now supports **23 different social networks and sharing options**! Here's the complete list of available networks:

## Social Media Platforms

### Major Social Networks
- **Facebook** - Share to Facebook timeline
- **Twitter** - Tweet with link and title
- **LinkedIn** - Share to LinkedIn feed
- **Instagram** - Copy link for Instagram sharing
- **YouTube** - Copy link for YouTube sharing
- **TikTok** - Copy link for TikTok sharing
- **Snapchat** - Copy link for Snapchat sharing

### Discussion Platforms
- **Reddit** - Submit to Reddit with title and URL
- **Discord** - Copy link formatted for Discord
- **Tumblr** - Share to Tumblr blog

### Visual & Creative Platforms
- **Pinterest** - Pin to Pinterest board

### Global Social Networks
- **VKontakte** - Share to VK (Russian social network)

## Messaging & Communication Apps

### Instant Messaging
- **WhatsApp** - Share via WhatsApp with formatted message
- **Telegram** - Share via Telegram with title and URL
- **Viber** - Share via Viber (mobile app)
- **WeChat** - Copy link for WeChat sharing
- **Line** - Share via Line messenger
- **Skype** - Share via Skype web

### Direct Communication
- **SMS** - Share via SMS/text message (mobile devices)
- **Email** - Share via email with subject and body

## Utility Features

### Technical Sharing
- **QR Code** - Generate QR code for easy mobile sharing
- **Copy Link** - Copy page URL to clipboard
- **Print** - Print current page

## Usage Examples

### Basic Usage with Reddit
```javascript
new OneNetly({
    networks: ['Facebook', 'Twitter', 'LinkedIn', 'Reddit', 'WhatsApp'],
    position: 'bottom-right'
});
```

### Communication Apps Focus
```javascript
new OneNetly({
    networks: ['WhatsApp', 'Telegram', 'Viber', 'WeChat', 'Line', 'SMS', 'Email'],
    position: 'bottom-left'
});
```

### All Social Media Platforms
```javascript
new OneNetly({
    networks: ['Facebook', 'Twitter', 'Instagram', 'TikTok', 'YouTube', 'Reddit', 'Discord', 'Snapchat'],
    position: 'top-right'
});
```

### Technical Sharing Tools
```javascript
new OneNetly({
    networks: ['QR Code', 'Copy Link', 'Print', 'SMS', 'Email'],
    position: 'top-left'
});
```

### All Networks (Complete Set)
```javascript
new OneNetly({
    networks: [
        'Facebook', 'Twitter', 'LinkedIn', 'WhatsApp', 'Telegram', 
        'Pinterest', 'Tumblr', 'Reddit', 'Discord', 'YouTube', 
        'TikTok', 'Snapchat', 'Instagram', 'Viber', 'WeChat', 
        'Skype', 'VKontakte', 'Line', 'QR Code', 'SMS', 
        'Email', 'Print', 'Copy Link'
    ],
    position: 'bottom-right'
});
```

## Special Features

### QR Code Generation
- Automatically generates QR code using QR Server API
- Shows modal with scannable QR code
- Perfect for mobile sharing

### Smart SMS Sharing
- Detects iOS/Android for proper SMS URL format
- Falls back to clipboard copy on desktop

### Platform-Specific Handling
- Some platforms (Instagram, TikTok, YouTube, Discord) copy formatted text to clipboard
- Direct web sharing URLs for platforms that support it
- Mobile app integration where available

## Widget Behavior

### Main Area Display
- Shows ALL selected networks directly in the main widget area
- No artificial limit on main area networks

### More Section
- Only shows unselected networks
- Automatically hides "More" button if all networks are selected
- Clean, organized layout

### Smart Organization
- User's selected networks get priority in main display
- Unselected networks are discoverable in "More" section
- Responsive grid layout adapts to content

## Color Coding
Each social network maintains its brand colors for instant recognition:
- **Facebook**: #1877f2
- **Twitter**: #1da1f2
- **LinkedIn**: #0077b5
- **Reddit**: #FF4500
- **WhatsApp**: #25d366
- **And many more...**

The OneNetly widget is now the most comprehensive social sharing solution available, supporting virtually every major platform and communication method!
