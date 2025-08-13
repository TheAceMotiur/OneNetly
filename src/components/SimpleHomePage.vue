<template>
  <div class="container-fluid min-vh-100 bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top shadow-sm">
      <div class="container">
        <div class="navbar-brand d-flex align-items-center">
          <div class="rounded p-2 bg-dark text-white me-3">
            <strong>ON</strong>
          </div>
          <div>
            <h1 class="h4 mb-0 fw-bold">OneNetly</h1>
            <small class="text-muted fw-bold">Free Edition</small>
          </div>
        </div>
        
        <div class="navbar-nav ms-auto d-none d-md-flex">
          <a href="#features" class="nav-link fw-bold text-dark">Features</a>
          <a href="#demo" class="nav-link fw-bold text-dark">Demo</a>
          <router-link to="/docs" class="nav-link fw-bold text-dark">Docs</router-link>
          <router-link to="/about" class="nav-link fw-bold text-dark">About</router-link>
        </div>
      </div>
    </nav>

    <section class="py-5 bg-gradient" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
      <div class="container py-5">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="badge bg-dark text-white mb-4 px-3 py-2">
              <span class="text-success">●</span> FREE & OPEN SOURCE • READY TO USE
            </div>
            
            <h1 class="display-3 fw-bold mb-4">
              <span class="d-block">Enterprise</span>
              <span class="d-block">Social</span>
              <span class="d-block text-gradient">Sharing</span>
            </h1>
            
            <p class="lead mb-4">
              The most <strong>advanced social sharing solution</strong> for modern websites.
              <br><strong>Zero dependencies • Privacy-first • Completely free</strong>
            </p>
            
            <div class="row text-center text-lg-start">
              <div class="col-6 col-lg-3 mb-3">
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-1">
                  <span class="badge bg-success rounded-pill me-2">●</span>
                  <span class="h5 mb-0 fw-bold">5KB</span>
                </div>
                <small class="text-muted fw-bold">Minified Size</small>
              </div>
              <div class="col-6 col-lg-3 mb-3">
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-1">
                  <span class="badge bg-primary rounded-pill me-2">●</span>
                  <span class="h5 mb-0 fw-bold">50M+</span>
                </div>
                <small class="text-muted fw-bold">Downloads</small>
              </div>
              <div class="col-6 col-lg-3 mb-3">
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-1">
                  <span class="badge bg-warning rounded-pill me-2">●</span>
                  <span class="h5 mb-0 fw-bold">99.9%</span>
                </div>
                <small class="text-muted fw-bold">Uptime</small>
              </div>
              <div class="col-6 col-lg-3 mb-3">
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-1">
                  <span class="badge bg-info rounded-pill me-2">●</span>
                  <span class="h5 mb-0 fw-bold">24/7</span>
                </div>
                <small class="text-muted fw-bold">Support</small>
              </div>
            </div>
          </div>
          
          <div class="col-lg-6">
            <div class="card shadow-lg border-0">
              <div class="card-header bg-light border-bottom d-flex align-items-center">
                <div class="d-flex me-3">
                  <span class="badge bg-danger rounded-circle me-1" style="width: 12px; height: 12px;"></span>
                  <span class="badge bg-warning rounded-circle me-1" style="width: 12px; height: 12px;"></span>
                  <span class="badge bg-success rounded-circle" style="width: 12px; height: 12px;"></span>
                </div>
                <div class="flex-grow-1 bg-white rounded px-3 py-1 text-muted small">
                  https://yourwebsite.com
                </div>
              </div>
              <div class="card-body">
                <div class="placeholder-glow">
                  <span class="placeholder col-8 mb-2"></span>
                  <span class="placeholder col-6 mb-2"></span>
                  <span class="placeholder col-4 mb-3"></span>
                </div>
                <div class="bg-light rounded p-3 mb-3">
                  <div class="placeholder-glow">
                    <span class="placeholder col-12 mb-2" style="height: 80px;"></span>
                    <span class="placeholder col-10"></span>
                    <span class="placeholder col-8"></span>
                  </div>
                </div>
                
                <div class="position-relative">
                  <button class="btn btn-dark btn-sm rounded-circle position-absolute bottom-0 end-0" style="width: 48px; height: 48px;">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="features" class="py-5 bg-white">
      <div class="container py-5">
        <div class="text-center mb-5">
          <span class="badge bg-primary text-white mb-3">✨ Features & Benefits 🚀</span>
          <h2 class="display-4 fw-bold mb-3">
            Why Choose <span class="text-dark">OneNetly</span>?
          </h2>
          <p class="lead text-muted">
            Built with <strong>simplicity</strong> and <strong>performance</strong> in mind
          </p>
        </div>
        
        <div class="row g-4">
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm">
              <div class="card-body text-center p-4">
                <div class="bg-dark text-white rounded mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                  </svg>
                </div>
                <h5 class="fw-bold mb-3">Lightning Fast</h5>
                <p class="text-muted">Under <strong>5KB</strong> minified and gzipped. Loads instantly without affecting your site performance.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm">
              <div class="card-body text-center p-4">
                <div class="bg-dark text-white rounded mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                  </svg>
                </div>
                <h5 class="fw-bold mb-3">Fully Responsive</h5>
                <p class="text-muted">Works perfectly on <strong>all devices</strong> and screen sizes with touch-friendly interface.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm">
              <div class="card-body text-center p-4">
                <div class="bg-dark text-white rounded mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                  <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                </div>
                <h5 class="fw-bold mb-3">Highly Customizable</h5>
                <p class="text-muted">Customize <strong>colors, position, and social networks</strong> to match your brand perfectly.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-dark text-white py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="d-flex align-items-center mb-3">
              <div class="bg-white text-dark rounded p-2 me-3">
                <strong>ON</strong>
              </div>
              <div>
                <h5 class="mb-0 fw-bold">OneNetly</h5>
                <small class="text-muted">Free & Open Source</small>
              </div>
            </div>
            <p class="text-muted mb-0">
              Social Sharing Widget for modern websites. No registration required, completely open source.
            </p>
          </div>
          <div class="col-md-4">
            <h6 class="fw-bold mb-3">Resources</h6>
            <ul class="list-unstyled">
              <li><router-link to="/" class="text-muted text-decoration-none">Home</router-link></li>
              <li><router-link to="/docs" class="text-muted text-decoration-none">Documentation</router-link></li>
              <li><router-link to="/about" class="text-muted text-decoration-none">About</router-link></li>
            </ul>
          </div>
        </div>
        <hr class="my-3">
        <div class="text-center">
          <p class="text-muted small mb-0">
            © 2024 OneNetly. Free & open source social sharing widget.
          </p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
// Simple homepage component using Bootstrap classes
</script>

<style scoped>
.text-gradient {
  background: linear-gradient(135deg, #333 0%, #000 100%);
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
</style>
