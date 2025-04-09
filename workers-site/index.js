import { getAssetFromKV } from '@cloudflare/kv-asset-handler'

/**
 * The DEBUG flag will do two things:
 * 1. Enable caching on the worker, which is useful for development.
 * 2. Disable custom error pages.
 */
const DEBUG = false

addEventListener('fetch', event => {
  try {
    event.respondWith(handleEvent(event))
  } catch (e) {
    if (DEBUG) {
      return event.respondWith(
        new Response(e.message || e.toString(), {
          status: 500,
        }),
      )
    }
    event.respondWith(new Response('Internal Error', { status: 500 }))
  }
})

/**
 * Handle requests to the worker.
 */
async function handleEvent(event) {
  const url = new URL(event.request.url)
  let options = {}

  /**
   * You can add custom logic to generate the options based on the request.
   * For example, based on the URL path or headers.
   */
  if (DEBUG) {
    options.cacheControl = {
      bypassCache: true,
    }
  } else {
    // Adjust caching strategies based on file type
    options.cacheControl = {
      browserTTL: 60 * 60 * 24, // 1 day
      edgeTTL: 60 * 60 * 24 * 365, // 1 year
      bypassCache: false,
    }
  }

  try {
    // Get the asset from KV storage
    const page = await getAssetFromKV(event, options)

    // Allow headers to be altered
    const response = new Response(page.body, page)

    // Add security headers
    response.headers.set('X-XSS-Protection', '1; mode=block')
    response.headers.set('X-Content-Type-Options', 'nosniff')
    response.headers.set('X-Frame-Options', 'DENY')
    response.headers.set('Referrer-Policy', 'strict-origin-when-cross-origin')
    response.headers.set('Feature-Policy', 'none')

    // Cache based on file type
    if (url.pathname.endsWith('.css') || url.pathname.endsWith('.js') || 
        url.pathname.endsWith('.jpg') || url.pathname.endsWith('.png') || 
        url.pathname.endsWith('.svg')) {
      response.headers.set('Cache-Control', 'public, max-age=31536000, immutable')
    } else {
      response.headers.set('Cache-Control', 'public, max-age=0, must-revalidate')
    }

    return response
  } catch (e) {
    // If an error is thrown try to serve the fallback
    return new Response('Not Found', { status: 404 })
  }
}
