# OneNetly Social Share Widget

A customizable floating social share widget similar to ShareThis, allowing users to easily share content across multiple social media platforms.

## Features

- **Floating Design**: Unobtrusive floating buttons that stay visible while scrolling
- **Customizable**: Choose position, shape, size, animation, and colors
- **6 Primary Networks**: Select up to 6 main social networks to display
- **More Button**: Additional networks available through a modal popup
- **Responsive**: Works on desktop and mobile devices
- **Easy Integration**: Simple JavaScript snippet for implementation
- **Copy & Print**: Built-in copy link and print functionality

## Quick Start

### 1. Include the Widget Script

Add this code to your website's HTML, preferably before the closing `</body>` tag:

```html
<!-- OneNetly Social Share Widget -->
<script src="https://yourserver.com/share-widget.js"></script>
<script>
OneNetlyShare.init({
    position: 'left',
    shape: 'circle',
    size: '50px',
    animation: 'scale',
    networks: ['facebook', 'twitter', 'linkedin', 'pinterest', 'whatsapp', 'telegram']
});
</script>
```

### 2. Auto-Initialization (Alternative)

You can also use data attributes for automatic initialization:

```html
<script 
    src="https://yourserver.com/share-widget.js"
    data-position="left"
    data-shape="circle"
    data-size="50px"
    data-animation="scale"
    data-networks='["facebook","twitter","linkedin","pinterest","whatsapp","telegram"]'>
</script>
```

## Configuration Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `position` | String | `'left'` | Position of the widget (`'left'` or `'right'`) |
| `shape` | String | `'circle'` | Button shape (`'circle'` or `'square'`) |
| `size` | String | `'50px'` | Button size in pixels |
| `animation` | String | `'scale'` | Hover animation (`'scale'`, `'bounce'`, or `'rotate'`) |
| `networks` | Array | See below | Primary social networks to display (max 6) |
| `customCSS` | Object | `{}` | Custom colors for each network |
| `showMoreButton` | Boolean | `true` | Show/hide the "More" button |
| `moreNetworks` | Array | See below | Networks shown in the modal |

### Default Networks

**Primary networks (default):**
```javascript
['facebook', 'twitter', 'linkedin', 'pinterest', 'whatsapp', 'telegram']
```

**More networks (default):**
```javascript
['reddit', 'tumblr', 'vk', 'email', 'copy', 'print']
```

## Available Social Networks

- `facebook` - Facebook
- `twitter` - Twitter
- `linkedin` - LinkedIn
- `pinterest` - Pinterest
- `whatsapp` - WhatsApp
- `telegram` - Telegram
- `reddit` - Reddit
- `tumblr` - Tumblr
- `vk` - VKontakte
- `email` - Email
- `copy` - Copy Link
- `print` - Print Page

## Advanced Configuration Examples

### Custom Colors

```javascript
OneNetlyShare.init({
    networks: ['facebook', 'twitter', 'linkedin', 'email'],
    customCSS: {
        facebook: '#4267B2',
        twitter: '#1DA1F2',
        linkedin: '#0077B5',
        email: '#34495e'
    }
});
```

### Right-Side Square Buttons

```javascript
OneNetlyShare.init({
    position: 'right',
    shape: 'square',
    size: '45px',
    animation: 'bounce',
    networks: ['facebook', 'twitter', 'reddit', 'email']
});
```

### Minimal Setup (Only Copy and Email)

```javascript
OneNetlyShare.init({
    networks: ['copy', 'email'],
    showMoreButton: false
});
```

## API Methods

### Initialize Widget

```javascript
OneNetlyShare.init(config);
```

### Destroy Widget

```javascript
OneNetlyShare.destroy();
```

## Customization Generator

Use the main `index.html` file to:

1. **Preview** the widget in real-time
2. **Customize** all settings through a visual interface
3. **Select** your preferred social networks
4. **Generate** the complete JavaScript code
5. **Copy** the code for implementation

## File Structure

```
OneNetly/
├── index.html          # Main customization interface
├── demo.html           # Implementation demo
├── share-widget.js     # Main widget JavaScript file
├── README.md           # This documentation
└── CNAME              # Domain configuration
```

## Browser Support

- Chrome 60+
- Firefox 55+
- Safari 11+
- Edge 79+
- Mobile browsers (iOS Safari, Chrome Mobile)

## Dependencies

- Font Awesome 6.0+ (automatically loaded)

## Installation on Your Server

1. **Upload Files**: Upload `share-widget.js` to your web server
2. **Update URLs**: Replace `https://yourserver.com/share-widget.js` with your actual URL
3. **Test**: Verify the widget loads and functions correctly

## Troubleshooting

### Widget Not Appearing

1. Check browser console for JavaScript errors
2. Ensure Font Awesome is loading correctly
3. Verify the script URL is accessible
4. Check for CSS conflicts

### Share Links Not Working

1. Verify the page URL is accessible
2. Check if popup blockers are interfering
3. Test individual social network URLs

### Mobile Issues

1. Ensure viewport meta tag is present
2. Check touch event handling
3. Verify responsive styles are applied

## License

This project is open source and available under the MIT License.

## Support

For support and customization requests, please visit [OneNetly.com](https://onenetly.com) or contact our support team.

## Contributing

We welcome contributions! Please feel free to submit issues and pull requests.

---

**OneNetly** - Making social sharing simple and customizable.
