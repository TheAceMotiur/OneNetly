# OneNetly Social Share Widget

A lightweight, customizable floating social share widget for websites.

## Quick Start

### Option 1: Use CDN (Recommended)
```html
<!-- Add to your HTML head or before closing body tag -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/gh/onenetly/share-widget@main/share-widget.js"></script>
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

### Option 2: Self-hosted
1. Download `share-widget.js` from this repository
2. Upload it to your website
3. Include it in your HTML:

```html
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="./path/to/share-widget.js"></script>
<script>
OneNetlyShare.init({
    // Your configuration options
});
</script>
```

## Configuration Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `position` | string | `'left'` | Widget position: `'left'` or `'right'` |
| `shape` | string | `'circle'` | Button shape: `'circle'` or `'square'` |
| `size` | string | `'50px'` | Button size in pixels |
| `animation` | string | `'scale'` | Hover animation: `'scale'`, `'bounce'`, or `'rotate'` |
| `networks` | array | See below | Array of social networks to display |
| `showMoreButton` | boolean | `true` | Show "more options" button |
| `moreNetworks` | array | See below | Additional networks in modal |
| `customCSS` | object | `{}` | Custom colors for networks |

### Available Social Networks
Primary networks (for main widget):
- `facebook`, `twitter`, `linkedin`, `pinterest`, `whatsapp`, `telegram`

Additional networks (for "more" modal):
- `reddit`, `tumblr`, `vk`, `email`, `copy`, `print`

### Example with Custom Configuration
```javascript
OneNetlyShare.init({
    position: 'right',
    shape: 'square',
    size: '60px',
    animation: 'bounce',
    networks: ['facebook', 'twitter', 'whatsapp', 'email'],
    showMoreButton: true,
    moreNetworks: ['reddit', 'linkedin', 'copy', 'print'],
    customCSS: {
        facebook: '#4267B2',
        twitter: '#1DA1F2',
        whatsapp: '#25D366'
    }
});
```

## Demo & Configuration Tool

Visit our [demo page](./index.html) to:
- See the widget in action
- Customize settings with live preview
- Generate code for your specific configuration

### Using the Configuration Tool

1. **Open** `index.html` in your browser
2. **Customize** position, shape, size, and animation
3. **Select** up to 6 social networks
4. **Click** "Generate Widget Code"
5. **Copy** the generated code
6. **Paste** into your website

The generated code will be simple and clean:
```html
<!-- OneNetly Social Share Widget -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/gh/onenetly/share-widget@main/share-widget.js"></script>
<script>
OneNetlyShare.init({
    position: 'left',
    shape: 'circle',
    size: '50px',
    animation: 'scale',
    networks: ['facebook', 'twitter', 'linkedin', 'pinterest', 'whatsapp', 'telegram'],
    showMoreButton: true,
    moreNetworks: ['reddit', 'tumblr', 'vk', 'email', 'copy', 'print']
});
</script>
```

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
