import manifestJSON from '__STATIC_CONTENT_MANIFEST'
const assetManifest = JSON.parse(manifestJSON)

export default {
  async fetch(request, env, ctx) {
    const url = new URL(request.url)
    
    // Handle API routes if any
    if (url.pathname.startsWith('/api/')) {
      return new Response('API endpoint', { status: 404 })
    }

    try {
      // Try to serve static asset
      let pathname = url.pathname
      
      // Remove trailing slash for non-root paths
      if (pathname !== '/' && pathname.endsWith('/')) {
        pathname = pathname.slice(0, -1)
      }

      // Try to get the asset
      let response = await env.ASSETS.fetch(request.url)
      
      // If asset not found and it's not a file with extension, serve index.html (SPA routing)
      if (response.status === 404 && !pathname.includes('.')) {
        // Serve index.html for SPA routing
        const indexRequest = new Request(`${url.origin}/index.html`, request)
        response = await env.ASSETS.fetch(indexRequest)
      }

      // Add security headers
      const headers = new Headers(response.headers)
      headers.set('X-Content-Type-Options', 'nosniff')
      headers.set('X-Frame-Options', 'DENY')
      headers.set('X-XSS-Protection', '1; mode=block')
      headers.set('Referrer-Policy', 'strict-origin-when-cross-origin')
      
      // Add caching headers for static assets
      if (pathname.match(/\.(js|css|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot|webp)$/)) {
        headers.set('Cache-Control', 'public, max-age=31536000, immutable')
      } else if (pathname === '/index.html' || pathname === '/') {
        headers.set('Cache-Control', 'public, max-age=0, must-revalidate')
      }

      return new Response(response.body, {
        status: response.status,
        statusText: response.statusText,
        headers: headers
      })
    } catch (error) {
      return new Response(`Error: ${error.message}`, { status: 500 })
    }
  }
}
