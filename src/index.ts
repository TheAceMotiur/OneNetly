export default {
  async fetch(request, env) {
    // Get the URL object from the request
    const url = new URL(request.url);

    // Handle static pages for AdSense approval
    if (url.pathname === "/privacy-policy") {
      return new Response(getPrivacyPolicyPage(), {
        headers: { "content-type": "text/html;charset=UTF-8" },
      });
    }

    if (url.pathname === "/terms-of-service") {
      return new Response(getTermsOfServicePage(), {
        headers: { "content-type": "text/html;charset=UTF-8" },
      });
    }

    if (url.pathname === "/about") {
      return new Response(getAboutPage(), {
        headers: { "content-type": "text/html;charset=UTF-8" },
      });
    }

    if (url.pathname === "/contact") {
      return new Response(getContactPage(), {
        headers: { "content-type": "text/html;charset=UTF-8" },
      });
    }

    // API endpoint for image generation
    if (request.method === "POST" && url.pathname === "/api/generate") {
      try {
        // Check for JSON content type
        const contentType = request.headers.get("content-type");
        if (!contentType || !contentType.includes("application/json")) {
          return new Response(JSON.stringify({ 
            error: "Content-Type must be application/json" 
          }), { 
            status: 400, 
            headers: { 
              "content-type": "application/json",
              "Access-Control-Allow-Origin": "*"
            } 
          });
        }

        // Parse the JSON body
        const body = await request.json();
        const { prompt, negative_prompt, shape, tool_type } = body;

        // Validate the required prompt parameter
        if (!prompt || typeof prompt !== "string" || prompt.trim() === "") {
          return new Response(JSON.stringify({ error: "Prompt is required" }), { 
            status: 400, 
            headers: { 
              "content-type": "application/json",
              "Access-Control-Allow-Origin": "*"
            } 
          });
        }

        // Set default values if not provided
        const toolType = tool_type || "general";
        const selectedShape = shape || "square";
        const negPrompt = negative_prompt || "blurry, bad anatomy, bad hands, cropped, worst quality, low quality, deformed, malformed, distorted, disfigured, duplicate, out of frame, watermark, signature, text";

        // Set dimensions based on selected shape
        let width = 1024;
        let height = 1024;
        
        switch(selectedShape) {
          case "square":
            width = 1024;
            height = 1024;
            break;
          case "portrait":
            width = 768;
            height = 1024;
            break;
          case "landscape":
            width = 1024;
            height = 768;
            break;
          case "widescreen":
            width = 1280;
            height = 720;
            break;
          default:
            // Default to square if invalid shape
            width = 1024;
            height = 1024;
        }

        // Configure inputs based on the tool type
        let inputs = {
          prompt: prompt.trim(),
          negative_prompt: typeof negPrompt === "string" ? negPrompt.trim() : 
            "blurry, bad anatomy, bad hands, cropped, worst quality, low quality, deformed, malformed, distorted, disfigured, duplicate, out of frame, watermark, signature, text",
          num_inference_steps: 50,
          guidance_scale: 7.5,
          seed: Math.floor(Math.random() * 2147483647),
          width: width,
          height: height,
        };

        // Add tool-specific adjustments if needed
        if (toolType === "artistic") {
          inputs.guidance_scale = 8.0; // Higher guidance for artistic images
        }

        const response = await env.AI.run("@cf/stabilityai/stable-diffusion-xl-base-1.0", inputs);

        // Convert the image response to base64 - Fix encoding for binary data
        const buffer = await response.arrayBuffer();
        // Use a safe base64 encoding approach for binary data
        const base64Image = arrayBufferToBase64(buffer);

        // Return the image as base64 in JSON response
        return new Response(JSON.stringify({
          success: true,
          image: `data:image/png;base64,${base64Image}`,
          shape: selectedShape,
          dimensions: { width, height }
        }), {
          headers: { 
            "content-type": "application/json",
            "Access-Control-Allow-Origin": "*"
          }
        });
      } catch (error) {
        console.error("API Error:", error);
        return new Response(JSON.stringify({ 
          error: "Failed to generate image", 
          message: error.message 
        }), { 
          status: 500, 
          headers: { 
            "content-type": "application/json",
            "Access-Control-Allow-Origin": "*"
          } 
        });
      }
    }

    // Handle OPTIONS requests for CORS
    if (request.method === "OPTIONS") {
      return new Response(null, {
        headers: {
          "Access-Control-Allow-Origin": "*",
          "Access-Control-Allow-Methods": "GET, POST, OPTIONS",
          "Access-Control-Allow-Headers": "Content-Type"
        }
      });
    }

    // If it's a POST request to /generate, process the image generation
    if (request.method === "POST" && url.pathname === "/generate") {
      try {
        // Get the form data from the request
        const formData = await request.formData();
        const prompt = formData.get("prompt");
        const toolType = formData.get("tool") || "general"; // Get the tool type or default to general
        const shape = formData.get("shape") || "square"; // Get the selected shape
        const negativePrompt = formData.get("negative_prompt") || "blurry, bad anatomy, bad hands, cropped, worst quality, low quality, deformed, malformed, distorted, disfigured, duplicate, out of frame, watermark, signature, text";

        // Set dimensions based on selected shape
        let width = 1024;
        let height = 1024;

        switch (shape) {
          case "square":
            width = 1024;
            height = 1024;
            break;
          case "portrait":
            width = 768;
            height = 1024;
            break;
          case "landscape":
            width = 1024;
            height = 768;
            break;
          case "widescreen":
            width = 1280;
            height = 720;
            break;
        }

        // Validate the prompt
        if (!prompt || typeof prompt !== "string" || prompt.trim() === "") {
          return new Response("Prompt is required", { status: 400 });
        }

        // Configure inputs based on the tool type
        let inputs = {
          prompt: prompt.trim(),
          negative_prompt: typeof negativePrompt === "string" ? negativePrompt.trim() : 
            "blurry, bad anatomy, bad hands, cropped, worst quality, low quality, deformed, malformed, distorted, disfigured, duplicate, out of frame, watermark, signature, text",
          num_inference_steps: 50,
          guidance_scale: 7.5,
          seed: Math.floor(Math.random() * 2147483647),
          width: width,
          height: height,
        };

        // Add tool-specific adjustments if needed
        if (toolType === "artistic") {
          inputs.guidance_scale = 8.0; // Higher guidance for artistic images
        }

        const response = await env.AI.run("@cf/stabilityai/stable-diffusion-xl-base-1.0", inputs);

        return new Response(response, {
          headers: { "content-type": "image/png" },
        });
      } catch (error) {
        console.error("Server busy, please try again:", error);
        return new Response("Server busy, please try again!", { status: 500 });
      }
    }

    // Handle different tool requests based on URL path
    if (url.pathname.startsWith("/tool/")) {
      const toolType = url.pathname.split("/tool/")[1];
      const validTools = ["general"];
      if (validTools.includes(toolType)) {
        return new Response(getToolHtmlContent(toolType), {
          headers: { "content-type": "text/html;charset=UTF-8" },
        });
      }
    }

    // For any other request, serve the HTML interface
    return new Response(getHtmlContent(), {
      headers: { "content-type": "text/html;charset=UTF-8" },
    });
  },
} satisfies ExportedHandler<Env>;

// Helper function for safe base64 encoding of binary data
function arrayBufferToBase64(buffer) {
  let binary = '';
  const bytes = new Uint8Array(buffer);
  const len = bytes.byteLength;
  for (let i = 0; i < len; i++) {
    binary += String.fromCharCode(bytes[i]);
  }
  // Use the browser's btoa function or a polyfill in Node.js
  return typeof btoa === 'function' ? btoa(binary) : Buffer.from(binary, 'binary').toString('base64');
}

// Function to generate a unified header with pro styling
function getProHeader(activePage = '') {
  return `
  <!-- Pro Header with navigation -->
  <header class="bg-gradient-to-r from-blue-700 to-indigo-800 text-white py-4 shadow-lg mb-8">
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
      <a href="/" class="flex items-center gap-2 mb-4 md:mb-0 group">
        <div class="bg-white rounded-full p-1.5 shadow-inner">
          <i class="fas fa-bolt text-blue-600 text-2xl transform group-hover:scale-110 transition-transform"></i>
        </div>
        <span class="font-bold text-xl text-white">OneNetly</span>
      </a>
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515"
         crossorigin="anonymous"></script>
      <nav>
        <ul class="flex flex-wrap gap-6 items-center">
          <li><a href="/" class="${activePage === 'home' ? 'text-blue-200 border-b-2 border-blue-200' : 'text-white hover:text-blue-200'} transition font-medium">Home</a></li>
          <li><a href="/about" class="${activePage === 'about' ? 'text-blue-200 border-b-2 border-blue-200' : 'text-white hover:text-blue-200'} transition font-medium">About</a></li>
          <li><a href="/privacy-policy" class="${activePage === 'privacy' ? 'text-blue-200 border-b-2 border-blue-200' : 'text-white hover:text-blue-200'} transition font-medium">Privacy</a></li>
          <li><a href="/terms-of-service" class="${activePage === 'terms' ? 'text-blue-200 border-b-2 border-blue-200' : 'text-white hover:text-blue-200'} transition font-medium">Terms</a></li>
        </ul>
      </nav>
    </div>
  </header>`;
}

// Function to generate a unified footer with pro styling
function getProFooter() {
  return `
  <!-- Pro Footer -->
  <footer class="bg-gradient-to-r from-gray-800 to-gray-900 text-white py-10 mt-12">
    <div class="max-w-6xl mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <div>
          <div class="flex items-center gap-2 mb-4">
            <div class="bg-white rounded-full p-1">
              <i class="fas fa-bolt text-blue-600 text-xl"></i>
            </div>
            <span class="font-bold text-lg text-white">OneNetly</span>
          </div>
          <p class="text-gray-300 text-sm">Advanced AI image generation at your fingertips. Transform your ideas into stunning visuals instantly.</p>
          <!-- OneNetly Ad -->
          <div class="mt-4 bg-gray-700 rounded-lg p-4 text-center">
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-9354746037074515"
                 data-ad-slot="4878379783"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
          </div>
        </div>
        
        <div>
          <h3 class="font-semibold text-lg mb-4 text-blue-300">Quick Links</h3>
          <ul class="space-y-2 text-gray-300">
            <li><a href="/" class="hover:text-white transition">Home</a></li>
            <li><a href="/about" class="hover:text-white transition">About Us</a></li>
          </ul>
        </div>
        
        <div>
          <h3 class="font-semibold text-lg mb-4 text-blue-300">Legal</h3>
          <ul class="space-y-2 text-gray-300">
            <li><a href="/privacy-policy" class="hover:text-white transition">Privacy Policy</a></li>
            <li><a href="/terms-of-service" class="hover:text-white transition">Terms of Service</a></li>
          </ul>
        </div>
      </div>
      
      <div class="border-t border-gray-700 pt-6 text-center text-gray-400 text-sm">
        <p>OneNetly AI Image Generation | Powered by Cloudflare Workers AI & Stable Diffusion XL</p>
        <p class="mt-2 text-xs">© ${new Date().getFullYear()} OneNetly. All rights reserved.</p>
      </div>
    </div>
  </footer>`;
}

// Defining the interface for tool information
interface ToolInfo {
  title: string;
  placeholder: string;
  description: string;
}

// Function to generate HTML for a specific tool
function getToolHtmlContent(toolType: string): string {
  // Tool-specific titles and descriptions
  const toolInfo: Record<string, ToolInfo> = {
    general: {
      title: "AI Image Generator",
      placeholder: "Describe the image you want to create...",
      description: "Create custom images from text descriptions",
    },
  };

  const info = toolInfo[toolType] || toolInfo.general;

  return `<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="${info.description} - OneNetly">
  <meta name="robots" content="index, follow">
  <title>OneNetly - ${info.title}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 p-0 flex flex-col min-h-screen">
  ${getProHeader('home')}

  <!-- Main Content -->
  <div class="max-w-2xl mx-auto flex-grow px-4">
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
      <h1 class="text-2xl font-bold text-center mb-6">${info.title}</h1>
      
      <!-- Simple form with prompt input, shape selection and submit button -->
      <form id="promptForm" class="flex flex-col gap-4">
        <input type="hidden" id="toolType" name="tool" value="${toolType}">
        
        <!-- Shape Selection Controls -->
        <div class="mb-2">
          <label class="block text-gray-700 mb-2">Choose Image Shape:</label>
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            <label class="shape-option active cursor-pointer" data-shape="square">
              <input type="radio" name="shape" value="square" class="sr-only" checked>
              <div class="flex flex-col items-center border border-gray-300 rounded-lg p-3 hover:bg-gray-50 transition">
                <div class="w-12 h-12 bg-blue-100 rounded-lg border-2 border-blue-500"></div>
                <span class="mt-1 text-sm">Square</span>
                <span class="text-xs text-gray-500">1:1</span>
              </div>
            </label>
            <label class="shape-option cursor-pointer" data-shape="portrait">
              <input type="radio" name="shape" value="portrait" class="sr-only">
              <div class="flex flex-col items-center border border-gray-300 rounded-lg p-3 hover:bg-gray-50 transition">
                <div class="w-9 h-12 bg-gray-100 rounded-lg"></div>
                <span class="mt-1 text-sm">Portrait</span>
                <span class="text-xs text-gray-500">3:4</span>
              </div>
            </label>
            <label class="shape-option cursor-pointer" data-shape="landscape">
              <input type="radio" name="shape" value="landscape" class="sr-only">
              <div class="flex flex-col items-center border border-gray-300 rounded-lg p-3 hover:bg-gray-50 transition">
                <div class="w-12 h-9 bg-gray-100 rounded-lg"></div>
                <span class="mt-1 text-sm">Landscape</span>
                <span class="text-xs text-gray-500">4:3</span>
              </div>
            </label>
            <label class="shape-option cursor-pointer" data-shape="widescreen">
              <input type="radio" name="shape" value="widescreen" class="sr-only">
              <div class="flex flex-col items-center border border-gray-300 rounded-lg p-3 hover:bg-gray-50 transition">
                <div class="w-12 h-[6.75px] bg-gray-100 rounded-lg"></div>
                <span class="mt-1 text-sm">Widescreen</span>
                <span class="text-xs text-gray-500">16:9</span>
              </div>
            </label>
          </div>
        </div>
        
        <div>
          <textarea id="prompt" name="prompt" placeholder="${info.placeholder}" required 
            class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 min-h-[120px]"></textarea>
        </div>
        
        <!-- Advanced Options Toggle -->
        <div class="mb-2">
          <button type="button" id="advancedToggle" class="text-blue-600 flex items-center text-sm font-medium">
            <i class="fas fa-sliders-h mr-1"></i> Advanced Options
            <i class="fas fa-chevron-down ml-1 text-xs transition-transform" id="toggleIcon"></i>
          </button>
        </div>
        
        <!-- Advanced Options Section -->
        <div id="advancedOptions" class="hidden border border-gray-200 rounded-lg p-4 mb-4 bg-gray-50">
          <div class="mb-3">
            <label for="negativePrompt" class="block text-sm font-medium text-gray-700 mb-1">
              Negative Prompt (what to avoid in the image)
            </label>
            <textarea
              id="negativePrompt"
              name="negative_prompt"
              placeholder="Specify what you don't want in your image..."
              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 text-sm min-h-[80px]"
            >blurry, bad anatomy, bad hands, cropped, worst quality, low quality, deformed, malformed, distorted, disfigured, duplicate, out of frame, watermark, signature, text</textarea>
            <p class="text-xs text-gray-500 mt-1">Separate different concepts with commas</p>
          </div>
        </div>
        
        <button type="submit" id="generateBtn" 
          class="bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white py-4 px-6 rounded-lg font-semibold transition">
          <i class="fas fa-paint-brush mr-2"></i> Generate Image
        </button>
      </form>
      
      <!-- Loading indicator -->
      <div id="loading" class="hidden text-center my-6">
        <p class="mb-3">Generating your image, please wait...</p>
        <div class="w-12 h-12 rounded-full border-4 border-blue-500 border-t-transparent mx-auto animate-spin"></div>
      </div>
      
      <!-- Error message -->
      <div id="error" class="hidden bg-red-50 text-red-700 p-4 rounded-lg my-6"></div>
      
      <!-- Image result -->
      <div id="result" class="mt-6 flex flex-col items-center"></div>
    </div>
  </div>
  
  ${getProFooter()}
  
  <!-- Simple script for handling image generation -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const form = document.getElementById('promptForm');
      const generateBtn = document.getElementById('generateBtn');
      const loading = document.getElementById('loading');
      const result = document.getElementById('result');
      const error = document.getElementById('error');
      
      // Advanced options toggle
      const advancedToggle = document.getElementById('advancedToggle');
      const advancedOptions = document.getElementById('advancedOptions');
      const toggleIcon = document.getElementById('toggleIcon');
      
      advancedToggle.addEventListener('click', () => {
        advancedOptions.classList.toggle('hidden');
        toggleIcon.classList.toggle('rotate-180');
      });
      
      // Shape selection behavior
      const shapeOptions = document.querySelectorAll('.shape-option');
      shapeOptions.forEach(option => {
        option.addEventListener('click', () => {
          // Remove active class from all options
          shapeOptions.forEach(el => {
            el.classList.remove('active');
            el.querySelector('div').classList.remove('border-blue-500', 'bg-blue-100');
            el.querySelector('div').classList.add('bg-gray-100');
          });
          
          // Add active class to selected option
          option.classList.add('active');
          option.querySelector('div').classList.remove('bg-gray-100');
          option.querySelector('div').classList.add('border-2', 'border-blue-500', 'bg-blue-100');
          
          // Set the radio as selected
          option.querySelector('input[type="radio"]').checked = true;
        });
      });
      
      // Image generation form submission
      form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Reset any previous results
        result.innerHTML = '';
        error.classList.add('hidden');
        
        // Show loading state
        loading.classList.remove('hidden');
        generateBtn.disabled = true;
        
        try {
          const formData = new FormData(form);
          const response = await fetch('/generate', {
            method: 'POST',
            body: formData
          });
          
          if (!response.ok) {
            throw new Error('Failed to generate image: ' + (await response.text()));
          }
          
          // Create a blob from the response
          const imageBlob = await response.blob();
          
          // Create an object URL for the blob
          const imageUrl = URL.createObjectURL(imageBlob);
          
          // Create an image element and set its source to the blob URL
          const img = document.createElement('img');
          img.src = imageUrl;
          img.alt = 'Generated image';
          img.className = 'max-w-full rounded-lg shadow-md';
          
          // Add the image to the result div
          result.appendChild(img);
          
          // Add download button
          const downloadBtn = document.createElement('a');
          downloadBtn.href = imageUrl;
          downloadBtn.download = 'onenetly-generated-image.png';
          downloadBtn.className = 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 mt-4 rounded flex items-center gap-2 hover:from-blue-600 hover:to-indigo-700 transition';
          downloadBtn.innerHTML = '<i class="fas fa-download"></i> Download Image';
          result.appendChild(downloadBtn);
          
        } catch (err) {
          console.error('Error:', err);
          error.textContent = err.message || 'An error occurred while generating the image.';
          error.classList.remove('hidden');
        } finally {
          // Hide loading state
          loading.classList.add('hidden');
          generateBtn.disabled = false;
        }
      });
    });
  </script>
  
  <style>
    /* Additional styles for shape selection */
    .shape-option.active div {
      border-width: 2px;
    }
    
    /* Style for the rotate animation */
    .rotate-180 {
      transform: rotate(180deg);
    }
  </style>
</body>
</html>`;
}

// Function to generate the main HTML for the homepage
function getHtmlContent(): string {
  // Redirect to tool page - making the homepage just point to the general tool
  return getToolHtmlContent("general");
}

// Function to generate Privacy Policy page for AdSense approval
function getPrivacyPolicyPage() {
  return `<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Privacy Policy for OneNetly AI Image Generation Tools. Learn how we collect, use, and protect your data.">
  <meta name="robots" content="index, follow">
  <meta name="google-adsense-account" content="ca-pub-9354746037074515">
  <title>Privacy Policy - OneNetly</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515"
     crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50 text-gray-800 leading-relaxed p-0 flex flex-col min-h-screen">
  ${getProHeader('privacy')}
  
  <div class="max-w-4xl mx-auto flex-grow bg-white rounded-xl p-8 shadow-md mb-8 mx-4 md:mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Privacy Policy</h1>
    <div class="prose prose-lg max-w-none">
      <p class="mb-4">Last updated: ${new Date().toLocaleDateString('en-US', {year: 'numeric', month: 'long', day: 'numeric'})}</p>
      <h2 class="text-xl font-semibold mt-6 mb-3">1. Introduction</h2>
      <p class="mb-4">Welcome to OneNetly ("we," "our," or "us"). We are committed to protecting your privacy and personal data. This Privacy Policy explains how we collect, use, and share information about you when you use our website and services.</p>
      
      <!-- Rest of the privacy policy content remains the same -->
      <h2 class="text-xl font-semibold mt-6 mb-3">2. Information We Collect</h2>
      <p class="mb-4">We may collect the following types of information:</p>
      <ul class="list-disc pl-6 mb-4">
        <li><strong>Usage Data:</strong> Information on how you interact with our services, including the prompts you submit for image generation.</li>
        <li><strong>Device Information:</strong> Information about your device, browser, and IP address.</li>
        <li><strong>Cookies and Similar Technologies:</strong> We and our partners may use cookies or similar technologies to analyze trends, administer the website, and gather demographic information.</li>
      </ul>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">3. How We Use Your Information</h2>
      <p class="mb-4">We use the information we collect to:</p>
      <ul class="list-disc pl-6 mb-4">
        <li>Provide, maintain, and improve our services</li>
        <li>Process and complete transactions</li>
        <li>Send you technical notices and support messages</li>
        <li>Respond to your comments and questions</li>
        <li>Develop new products and services</li>
        <li>Monitor and analyze trends, usage, and activities</li>
        <li>Detect, investigate, and prevent fraudulent transactions and other illegal activities</li>
        <li>Personalize your experience</li>
      </ul>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">4. Advertising</h2>
      <p class="mb-4">We use Google AdSense to serve ads on our website. Google AdSense uses cookies to personalize ads based on your browsing history and interests. You can learn more about how Google uses your data by visiting <a href="https://policies.google.com/technologies/partner-sites" class="text-blue-600 hover:underline" target="_blank">Google's Privacy & Terms page</a>.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">5. Data Retention</h2>
      <p class="mb-4">We store the data we collect for as long as it is necessary for the purposes for which we collected it or for other legitimate business purposes, including to meet our legal, regulatory, or other compliance obligations.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">6. Data Security</h2>
      <p class="mb-4">We take reasonable measures to help protect your personal information from loss, theft, misuse, unauthorized access, disclosure, alteration, and destruction.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">7. Your Rights</h2>
      <p class="mb-4">Depending on your location, you may have certain rights regarding your personal information, such as the right to access, correct, delete, or restrict the use of your personal information.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">8. Children's Privacy</h2>
      <p class="mb-4">Our services are not intended for children under the age of 13. We do not knowingly collect personal information from children under 13.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">9. Changes to This Privacy Policy</h2>
      <p class="mb-4">We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">10. Contact Us</h2>
      <p class="mb-4">If you have any questions about this Privacy Policy, please contact us at privacy@onenetly.com.</p>
    </div>
    
    <!-- Ad placement -->
    <div class="bg-gray-100 rounded-lg p-4 my-8 text-center overflow-hidden min-h-[90px]">
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-9354746037074515"
           data-ad-slot="4878379783"
           data-ad-format="auto"
           data-full-width-responsive="true"></ins>
      <script>
           (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  </div>
  
  ${getProFooter()}
</body>
</html>`;
}

// Function to generate Terms of Service page for AdSense approval
function getTermsOfServicePage() {
  return `<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Terms of Service for OneNetly AI Image Generation Tools. Please read these terms carefully before using our services.">
  <meta name="robots" content="index, follow">
  <meta name="google-adsense-account" content="ca-pub-9354746037074515">
  <title>Terms of Service - OneNetly</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515"
     crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50 text-gray-800 leading-relaxed p-0 flex flex-col min-h-screen">
  ${getProHeader('terms')}
  
  <div class="max-w-4xl mx-auto flex-grow bg-white rounded-xl p-8 shadow-md mb-8 mx-4 md:mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Terms of Service</h1>
    <div class="prose prose-lg max-w-none">
      <p class="mb-4">Last updated: ${new Date().toLocaleDateString('en-US', {year: 'numeric', month: 'long', day: 'numeric'})}</p>
      
      <!-- Terms content remains the same -->
      <h2 class="text-xl font-semibold mt-6 mb-3">1. Acceptance of Terms</h2>
      <p class="mb-4">By accessing or using OneNetly services, you agree to be bound by these Terms of Service. If you disagree with any part of the terms, you may not access the service.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">2. Description of Service</h2>
      <p class="mb-4">OneNetly provides AI-powered image generation tools and services that allow users to create various types of images based on text prompts.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">3. User Conduct</h2>
      <p class="mb-4">You agree not to use OneNetly services to:</p>
      <ul class="list-disc pl-6 mb-4">
        <li>Generate content that is illegal, harmful, threatening, abusive, harassing, tortious, defamatory, vulgar, obscene, or otherwise objectionable</li>
        <li>Generate content that infringes upon copyrights, trademarks, or other intellectual property rights</li>
        <li>Impersonate any person or entity</li>
        <li>Upload or transmit viruses or other malicious code</li>
        <li>Interfere with or disrupt the service or servers or networks connected to the service</li>
        <li>Violate any applicable laws or regulations</li>
      </ul>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">4. Intellectual Property</h2>
      <p class="mb-4">The images you generate using our service are yours to use, but you agree to grant OneNetly a non-exclusive, worldwide, royalty-free license to use, reproduce, modify, and display the content for the purpose of operating, improving, and promoting the service.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">5. Limitations and Disclaimers</h2>
      <p class="mb-4">OneNetly services are provided "as is" without any warranties. We do not guarantee that:</p>
      <ul class="list-disc pl-6 mb-4">
        <li>The service will meet your specific requirements</li>
        <li>The service will be uninterrupted, timely, secure, or error-free</li>
        <li>The results that may be obtained from the use of the service will be accurate or reliable</li>
      </ul>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">6. Limitation of Liability</h2>
      <p class="mb-4">In no event shall OneNetly be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of or inability to use the service.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">7. Third-Party Services</h2>
      <p class="mb-4">Our service may display advertisements and other content from third parties. These third-party sites have separate and independent privacy policies. We have no responsibility or liability for the content and activities of these linked sites.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">8. Changes to Terms</h2>
      <p class="mb-4">We reserve the right to modify these terms at any time. We will notify users of any changes by posting the new Terms of Service on this page and updating the "Last updated" date.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">9. Governing Law</h2>
      <p class="mb-4">These Terms shall be governed by and construed in accordance with the laws of [Your Country/State], without regard to its conflict of law provisions.</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">10. Contact Us</h2>
      <p class="mb-4">If you have any questions about these Terms, please contact us at terms@onenetly.com.</p>
    </div>
    
    <!-- Ad placement -->
    <div class="bg-gray-100 rounded-lg p-4 my-8 text-center overflow-hidden min-h-[90px]">
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-9354746037074515"
           data-ad-slot="4878379783"
           data-ad-format="auto"
           data-full-width-responsive="true"></ins>
      <script>
           (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  </div>
  
  ${getProFooter()}
</body>
</html>`;
}

// Function to generate About page for AdSense approval
function getAboutPage() {
  return `<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="About OneNetly - Learn more about our AI-powered image generation platform and our mission.">
  <meta name="robots" content="index, follow">
  <meta name="google-adsense-account" content="ca-pub-9354746037074515">
  <title>About Us - OneNetly</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515"
     crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50 text-gray-800 leading-relaxed p-0 flex flex-col min-h-screen">
  ${getProHeader('about')}
  
  <div class="max-w-4xl mx-auto flex-grow px-4">
    <div class="bg-white rounded-xl p-8 shadow-md mb-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">About OneNetly</h1>
      <div class="prose prose-lg max-w-none">
        <p class="mb-6">OneNetly is a cutting-edge platform that provides AI-powered image generation tools for professionals, content creators, and anyone looking to transform their ideas into visual content.</p>
        
        <!-- About content remains the same -->
        <h2 class="text-2xl font-semibold mt-8 mb-4">Our Mission</h2>
        <p class="mb-6">Our mission is to democratize visual content creation by making professional-grade AI image generation technology accessible to everyone, regardless of their artistic abilities or technical background.</p>
        
        <h2 class="text-2xl font-semibold mt-8 mb-4">Our Technology</h2>
        <p class="mb-6">OneNetly leverages the latest advancements in artificial intelligence and machine learning to power our image generation capabilities. We use state-of-the-art models like Stable Diffusion XL and continuously enhance our technology to deliver the highest quality results.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-10">
          <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl shadow-sm">
            <div class="text-blue-600 text-center mb-4">
              <i class="fas fa-magic text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-center mb-2">Powerful AI</h3>
            <p class="text-center text-gray-600">State-of-the-art AI models to create stunning, detailed images</p>
          </div>
          <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl shadow-sm">
            <div class="text-blue-600 text-center mb-4">
              <i class="fas fa-bolt text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-center mb-2">Fast Generation</h3>
            <p class="text-center text-gray-600">Get your images in seconds with our optimized processing</p>
          </div>
          <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl shadow-sm">
            <div class="text-blue-600 text-center mb-4">
              <i class="fas fa-sliders-h text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-center mb-2">Customizable</h3>
            <p class="text-center text-gray-600">Fine-tune your images with detailed controls and parameters</p>
          </div>
        </div>
        
        <h2 class="text-2xl font-semibold mt-8 mb-4">Our Team</h2>
        <p class="mb-6">OneNetly was founded by a team of AI researchers, software engineers, and designers passionate about the intersection of artificial intelligence and creativity. We're committed to building tools that empower people to express their ideas visually in ways that weren't possible before.</p>
        
        <h2 class="text-2xl font-semibold mt-8 mb-4">Our Values</h2>
        <ul class="list-disc pl-6 mb-6">
          <li class="mb-2"><strong>Innovation:</strong> We continuously push the boundaries of what's possible with AI-generated imagery.</li>
          <li class="mb-2"><strong>Accessibility:</strong> We believe powerful creative tools should be accessible to everyone.</li>
          <li class="mb-2"><strong>Quality:</strong> We're committed to providing the highest quality results for our users.</li>
          <li class="mb-2"><strong>Privacy:</strong> We respect user privacy and maintain high standards for data protection.</li>
          <li class="mb-2"><strong>Responsibility:</strong> We promote ethical use of AI technology and discourage harmful applications.</li>
        </ul>
      </div>
    </div>
    
    <!-- Ad placement -->
    <div class="bg-gray-100 rounded-lg p-4 mb-8 text-center overflow-hidden min-h-[90px]">
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-9354746037074515"
           data-ad-slot="4878379783"
           data-ad-format="auto"
           data-full-width-responsive="true"></ins>
      <script>
           (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  </div>
  
  ${getProFooter()}
</body>
</html>`;
}

// Function to generate Contact page
function getContactPage() {
  return `<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Contact OneNetly - Get in touch with our team for questions, support, or feedback about our AI image generation platform.">
  <meta name="robots" content="index, follow">
  <meta name="google-adsense-account" content="ca-pub-9354746037074515">
  <title>Contact Us - OneNetly</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515"
     crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50 text-gray-800 leading-relaxed p-0 flex flex-col min-h-screen">
  ${getProHeader('contact')}
  
  <div class="max-w-4xl mx-auto flex-grow px-4">
    <div class="bg-white rounded-xl p-8 shadow-md mb-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Contact Us</h1>
      
      <div class="prose prose-lg max-w-none">
        <p class="mb-6">Have a question, feedback, or need support with OneNetly? We're here to help! Fill out the form below and we'll get back to you as soon as possible.</p>
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
        <div>
          <form id="contactForm" class="space-y-4">
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
              <input
                type="text"
                id="name"
                name="name"
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                placeholder="Your name"
                required
              />
            </div>
            
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
              <input
                type="email"
                id="email"
                name="email"
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                placeholder="your@email.com"
                required
              />
            </div>
            
            <div>
              <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
              <input
                type="text"
                id="subject"
                name="subject"
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                placeholder="What is this regarding?"
                required
              />
            </div>
            
            <div>
              <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
              <textarea
                id="message"
                name="message"
                rows="5"
                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                placeholder="How can we help you?"
                required
              ></textarea>
            </div>
            
            <div>
              <button
                type="submit"
                class="bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white py-3 px-6 rounded-lg font-semibold transition"
              >
                <i class="fas fa-paper-plane mr-2"></i> Send Message
              </button>
            </div>
          </form>
          
          <div id="success-message" class="hidden mt-4 bg-green-50 text-green-700 p-4 rounded-lg">
            Thank you for your message! We'll get back to you soon.
          </div>
        </div>
        
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl">
          <h3 class="text-xl font-semibold mb-4 text-gray-800">Contact Information</h3>
          
          <div class="space-y-4 mt-6">
            <div class="flex items-start">
              <div class="text-blue-600 mr-3">
                <i class="fas fa-envelope"></i>
              </div>
              <div>
                <p class="font-medium">Email</p>
                <p class="text-gray-600">contact@onenetly.com</p>
              </div>
            </div>
            
            <div class="flex items-start">
              <div class="text-blue-600 mr-3">
                <i class="fas fa-clock"></i>
              </div>
              <div>
                <p class="font-medium">Support Hours</p>
                <p class="text-gray-600">Monday - Friday: 9 AM - 5 PM EST</p>
              </div>
            </div>
            
            <div class="flex items-start">
              <div class="text-blue-600 mr-3">
                <i class="fas fa-globe"></i>
              </div>
              <div>
                <p class="font-medium">Location</p>
                <p class="text-gray-600">Operating globally from the cloud</p>
              </div>
            </div>
          </div>
          
          <div class="mt-8">
            <h4 class="font-medium mb-3">Follow Us</h4>
            <div class="flex space-x-4">
              <a href="#" class="text-blue-600 hover:text-blue-800 transition">
                <i class="fab fa-twitter text-xl"></i>
              </a>
              <a href="#" class="text-blue-600 hover:text-blue-800 transition">
                <i class="fab fa-facebook text-xl"></i>
              </a>
              <a href="#" class="text-blue-600 hover:text-blue-800 transition">
                <i class="fab fa-instagram text-xl"></i>
              </a>
              <a href="#" class="text-blue-600 hover:text-blue-800 transition">
                <i class="fab fa-linkedin text-xl"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Ad placement -->
    <div class="bg-gray-100 rounded-lg p-4 mb-8 text-center overflow-hidden min-h-[90px]">
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-9354746037074515"
           data-ad-slot="4878379783"
           data-ad-format="auto"
           data-full-width-responsive="true"></ins>
      <script>
           (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  </div>
  
  ${getProFooter()}
  
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const contactForm = document.getElementById('contactForm');
      const successMessage = document.getElementById('success-message');
      
      contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Here you would normally send the form data to your server
        // For demo purposes, we'll just show the success message
        contactForm.reset();
        successMessage.classList.remove('hidden');
        
        // Hide the success message after 5 seconds
        setTimeout(() => {
          successMessage.classList.add('hidden');
        }, 5000);
      });
    });
  </script>
</body>
</html>`;
}