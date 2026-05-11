# OneNetly - Cloudflare Workers Deployment

## 🚀 Deployment Guide

### Prerequisites
- Cloudflare account
- Node.js 20+ installed
- Git repository connected to Cloudflare

### Local Development

```bash
# Install dependencies
npm install

# Run local development server (Vite)
npm run dev

# Run Cloudflare Workers dev environment
npm run dev:worker
```

### Deploy to Cloudflare Workers

#### Method 1: Using Wrangler CLI (Recommended)

1. **Login to Cloudflare**
   ```bash
   npm run cf:login
   ```

2. **Build your application**
   ```bash
   npm run build
   ```

3. **Deploy to Cloudflare Workers**
   ```bash
   npm run deploy
   ```

#### Method 2: Using Cloudflare Dashboard

1. Go to **Cloudflare Dashboard** → **Workers & Pages**
2. Click **Create application** → **Workers** tab
3. Connect your Git repository
4. Configure:
   - **Project name:** `onenetly`
   - **Build command:** `npm run build`
   - **Deploy command:** `npx wrangler deploy`

### Configuration

The project uses:
- **worker.js** - Cloudflare Worker script that serves your Vue SPA
- **wrangler.toml** - Cloudflare Workers configuration
- **dist/** - Build output directory (static assets)

### Features

✅ SPA routing support (all routes serve index.html)
✅ Static asset serving with optimal caching
✅ Security headers (X-Content-Type-Options, X-Frame-Options, etc.)
✅ Cloudflare CDN edge caching
✅ Fast global deployment

### Custom Domain

To add a custom domain:

1. Go to Cloudflare Dashboard → Workers → Your Worker
2. Click **Triggers** tab
3. Add your custom domain under **Routes**

### Environment Variables

Add environment variables in `wrangler.toml`:

```toml
[vars]
API_KEY = "your-api-key"
```

Or use `.dev.vars` for local development (don't commit this file).

### Troubleshooting

**Build fails:**
- Ensure Node.js 20+ is installed
- Run `npm install` to install all dependencies
- Check build logs for specific errors

**Worker deployment fails:**
- Verify you're logged in: `npm run cf:login`
- Check wrangler.toml configuration
- Ensure build completed: `npm run build`

**SPA routing not working:**
- The worker.js handles this automatically
- All non-file paths will serve index.html
- Check browser console for errors

### Support

For issues, visit: https://github.com/TheAceMotiur/OneNetly/issues
