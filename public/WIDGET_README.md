# OneNetly Widget Files

This folder contains the OneNetly social sharing widget files.

## Files

### widget.min.js (RECOMMENDED FOR PRODUCTION)
- **Size**: ~5KB minified
- **Use Case**: Production websites - this is what users should use
- **Performance**: Optimized, compressed, and minified for fastest loading
- **Integration**: 
```html
<script src="https://onenetly.com/widget.min.js" 
        data-position="bottom-right"
        data-networks="Facebook,Twitter,LinkedIn,WhatsApp,Telegram,Pinterest">
</script>
```

### widget.js (DEVELOPMENT VERSION)
- **Size**: ~40KB uncompressed
- **Use Case**: Development, debugging, and understanding the code
- **Performance**: Not optimized, includes comments and readable code
- **Integration**: Same as minified version, just replace `.min.js` with `.js`

## Configuration Options

### data-position
Position of the widget button:
- `bottom-right` (default)
- `bottom-left`
- `top-right`
- `top-left`

### data-networks
Comma-separated list of social networks to include:
- Available networks: Facebook, Twitter, LinkedIn, WhatsApp, Telegram, Pinterest, Reddit, Email, Copy Link, and more
- Example: `"Facebook,Twitter,LinkedIn"`
- Default: All major networks

### data-ad-blocker-detector
Enable ad blocker detection:
- `true` - Shows a friendly notification to users with ad blockers
- `false` (default) - Disabled

## Features

✅ **5KB minified** - Lightning fast loading
✅ **18+ social networks** - All major platforms supported
✅ **Fully responsive** - Works on all devices
✅ **Zero dependencies** - Pure vanilla JavaScript
✅ **Privacy-first** - No tracking or data collection
✅ **Customizable** - Position, networks, and styling
✅ **Native mobile share** - Uses device share dialog on mobile
✅ **Ad blocker detection** - Optional friendly notification

## Browser Support

- Chrome/Edge (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Mobile browsers (iOS Safari, Chrome Mobile)

## License

Free to use for personal and commercial projects.

## Support

Visit https://onenetly.com for documentation and support.
