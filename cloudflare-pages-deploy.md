# Deploying to Cloudflare Pages

This guide explains how to deploy your OneNetly Vue.js application to Cloudflare Pages.

## Method 1: Using the Cloudflare Dashboard

1. **Build your application locally**:
   ```bash
   npm run build
   ```

2. **Log in to your Cloudflare account** and navigate to the Pages section.

3. **Create a new project**:
   - Connect your GitHub/GitLab repository or upload your `dist` folder directly.
   - If connecting via GitHub/GitLab, configure the build settings:
     - Build command: `npm run build`
     - Build output directory: `dist`
     - Node.js version: 16 (or higher)

4. **Deploy**:
   - Cloudflare will automatically deploy your site and provide a URL.

## Method 2: Using Wrangler CLI

1. **Install Wrangler CLI** (if not installed):
   ```bash
   npm install -g wrangler
   ```

2. **Authenticate** with your Cloudflare account:
   ```bash
   wrangler login
   ```

3. **Update configuration** in `wrangler.toml`:
   - Set your `account_id`
   - Set your `zone_id` (if you're using a custom domain)
   - Configure the route for your domain

4. **Deploy to Cloudflare**:
   ```bash
   npm run cf:publish
   ```

## Important Configuration Notes

### Custom Domains

To use a custom domain with your Cloudflare Pages site:

1. Navigate to your Pages project in the Cloudflare Dashboard.
2. Go to the "Custom domains" tab.
3. Add your domain and follow the provided instructions.

### Environment Variables

To add environment variables:

1. Go to your Pages project settings.
2. Navigate to the "Environment variables" tab.
3. Add your variables for production and/or preview environments.

### Caching and Performance

The application is configured with optimal caching settings:
- Static assets (JS, CSS, images) are cached for long periods.
- HTML files use cache validation to ensure content is always up-to-date.

## Troubleshooting

- If you encounter a build failure, check the build logs in the Cloudflare Dashboard.
- Ensure all dependencies are correctly listed in your `package.json`.
- If routes aren't working correctly, verify your Vue Router configuration and Cloudflare's routing rules.
