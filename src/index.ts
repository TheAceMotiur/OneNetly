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
    
    // Contact page removed
    
    // If it's a POST request to /generate, process the image generation
    if (request.method === "POST" && url.pathname === "/generate") {
      try {
        // Get the form data from the request
        const formData = await request.formData();
        const prompt = formData.get("prompt");
        const toolType = formData.get("tool") || "general"; // Get the tool type or default to general
        
        // Validate the prompt
        if (!prompt || typeof prompt !== "string" || prompt.trim() === "") {
          return new Response("Prompt is required", { status: 400 });
        }

        // Configure inputs based on the tool type
        let inputs = {
          prompt: prompt.trim(),
          num_inference_steps: 50,
          guidance_scale: 7.5,
          seed: Math.floor(Math.random() * 2147483647),
          width: 1024,
          height: 1024,
          negative_prompt: "blurry, bad anatomy, bad hands, cropped, worst quality, low quality, deformed, malformed, distorted"
        };

        // Adjust parameters based on the tool type
        switch(toolType) {
          case "youtube":
            // YouTube thumbnail optimizations
            inputs = {
              ...inputs,
              prompt: `Professional YouTube thumbnail: ${prompt}`,
              width: 1280,
              height: 720, // YouTube thumbnail resolution
              guidance_scale: 8, // Stronger prompt adherence for thumbnails
              negative_prompt: "blurry, bad anatomy, bad hands, cropped, worst quality, low quality, text, words, letters, deformed, malformed, distorted"
            };
            break;
          case "portrait":
            // Portrait optimizations
            inputs = {
              ...inputs,
              prompt: `Professional portrait photograph, studio lighting, high quality: ${prompt}`,
              guidance_scale: 8,
              negative_prompt: "blurry, bad anatomy, bad face, bad eyes, bad hands, cropped, worst quality, low quality, deformed, malformed, distorted, disfigured"
            };
            break;
          case "landscape":
            // Landscape optimizations
            inputs = {
              ...inputs,
              prompt: `Ultra detailed landscape, atmospheric, cinematic lighting: ${prompt}`,
              width: 1280,
              height: 720, // 16:9 ratio for landscape
              negative_prompt: "blurry, worst quality, low quality, deformed, malformed, distorted"
            };
            break;
          case "art":
            // Art optimizations
            inputs = {
              ...inputs,
              prompt: `Digital art masterpiece, detailed, artistic: ${prompt}`,
              guidance_scale: 7,
              negative_prompt: "blurry, worst quality, low quality, deformed, malformed, distorted, amateur"
            };
            break;
          case "anime":
            // Anime optimizations
            inputs = {
              ...inputs,
              prompt: `High quality anime illustration, detailed, vibrant: ${prompt}`,
              guidance_scale: 7.5,
              negative_prompt: "blurry, worst quality, low quality, deformed, realistic, photorealistic, photograph, 3d render"
            };
            break;
          case "product":
            // Product photography optimizations
            inputs = {
              ...inputs,
              prompt: `Professional product photography, studio lighting, high detail, commercial quality: ${prompt}`,
              guidance_scale: 8.5,
              negative_prompt: "blurry, bad quality, low resolution, deformed, distorted, watermark, text, logo"
            };
            break;
        }

        const response = await env.AI.run(
          "@cf/stabilityai/stable-diffusion-xl-base-1.0",
          inputs,
        );

        return new Response(response, {
          headers: {
            "content-type": "image/png",
          },
        });
      } catch (error) {
        console.error("Error generating image:", error);
        return new Response("Error generating image", { status: 500 });
      }
    }

    // Handle different tool requests based on URL paths
    if (url.pathname.startsWith("/tool/")) {
      const toolType = url.pathname.split("/tool/")[1];
      // Serve HTML for specific tool if it's a valid tool
      const validTools = ["general", "youtube", "portrait", "landscape", "art", "anime", "product"];
      
      if (validTools.includes(toolType)) {
        return new Response(getToolHtmlContent(toolType), {
          headers: {
            "content-type": "text/html;charset=UTF-8",
          },
        });
      }
    }

    // Handle text-to-speech endpoints
    if (request.method === "POST" && url.pathname === "/generate-speech" || 
        (request.method === "GET" && url.pathname.startsWith("/tts"))) {
      try {
        // Handle both POST and GET methods
        let text = "";
        if (request.method === "POST") {
          const formData = await request.formData();
          text = formData.get("text") as string;
        } else {
          // GET method with query parameter
          text = url.searchParams.get("text") || "";
        }
        
        if (!text || typeof text !== "string" || text.trim() === "") {
          return new Response("Text is required", { status: 400 });
        }

        // Use a proper text-to-speech model
        const audioResponse = await env.AI.run(
          "@cf/facebook/bart-large-cnn", // Summarization model as placeholder (replace with actual TTS model)
          { input_text: text.trim(), max_length: 1000 }
        );

        // In reality, this would return audio data
        // For now, just return the text for debugging
        return new Response(JSON.stringify({ text: text.trim(), result: "Speech generation not fully implemented" }), {
          headers: {
            "content-type": "application/json",
          },
        });
      } catch (error) {
        console.error("Error generating speech:", error);
        return new Response("Error generating speech", { status: 500 });
      }
    }

    // For any other request, serve the HTML interface
    return new Response(getHtmlContent(), {
      headers: {
        "content-type": "text/html;charset=UTF-8",
      },
    });
  },
} satisfies ExportedHandler<Env>;

// Function to generate HTML for a specific tool
function getToolHtmlContent(toolType) {
  // Tool-specific titles and descriptions
  const toolInfo = {
    "general": {
      title: "General Image Generator",
      description: "Create custom images from text descriptions",
      placeholder: "e.g., sunset over mountains, cyberpunk city, magical forest...",
      icon: "image",
      tips: "Try to be specific with your descriptions. Include details about lighting, mood, and composition."
    },
    "youtube": {
      title: "YouTube Thumbnail Creator",
      description: "Create eye-catching thumbnails for your videos",
      placeholder: "e.g., gaming setup, tech review, cooking tutorial...",
      icon: "youtube",
      tips: "Thumbnails with bright colors and clear subjects tend to perform better. Consider using close-ups of faces or objects."
    },
    "portrait": {
      title: "AI Portrait Generator",
      description: "Generate professional portrait images",
      placeholder: "e.g., professional woman in business suit, man with beard...",
      icon: "portrait",
      tips: "For best results, specify age, clothing, background, and lighting conditions."
    },
    "landscape": {
      title: "Landscape Generator",
      description: "Create stunning landscape images",
      placeholder: "e.g., mountain with lake, sunset over ocean, forest with fog...",
      icon: "mountain",
      tips: "Mention time of day, weather conditions, and specific geographic features for better results."
    },
    "architecture": {
      title: "Architectural Visualization",
      description: "Generate architectural concepts and visualizations",
      placeholder: "e.g., modern minimalist house, futuristic skyscraper, cozy cabin in the woods...",
      icon: "building",
      tips: "Include architectural style, materials, and environment details for better results."
    },
    "food": {
      title: "Food Photography",
      description: "Create mouth-watering food images",
      placeholder: "e.g., chocolate cake with berries, gourmet burger, pasta dish with parmesan...",
      icon: "utensils",
      tips: "Include details about plating, garnishes, and lighting for best results."
    },
    "logo": {
      title: "Logo Generator",
      description: "Create professional logo concepts",
      placeholder: "e.g., minimalist tech company logo, bakery logo with wheat motif...",
      icon: "award",
      tips: "Mention industry, style preferences, and any specific symbols you want incorporated."
    },
    "pattern": {
      title: "Pattern Designer",
      description: "Generate seamless patterns and textures",
      placeholder: "e.g., floral pattern in pastel colors, geometric abstract pattern...",
      icon: "border-all",
      tips: "Specify colors, pattern style, and motifs for better results."
    },
    "comic": {
      title: "Comic Style Art",
      description: "Create comic and cartoon-style illustrations",
      placeholder: "e.g., superhero character in comic style, cartoon animal character...",
      icon: "comment-dots",
      tips: "Include art style references like 'Marvel style', 'manga style' or 'Disney style' for better results."
    },
    "art": {
      title: "Digital Art Creator",
      description: "Generate beautiful digital artwork",
      placeholder: "e.g., fantasy castle, cyberpunk city, abstract composition...",
      icon: "palette",
      tips: "Try specifying art styles like 'oil painting', 'watercolor', or 'digital art' for different looks."
    },
    "anime": {
      title: "Anime Illustrator",
      description: "Create anime-style illustrations",
      placeholder: "e.g., anime character, magical girl, fantasy landscape in anime style...",
      icon: "paint-brush",
      tips: "Include details about character expression, pose, and setting for better results."
    },
    "product": {
      title: "Product Photography",
      description: "Generate professional product photos",
      placeholder: "e.g., smartphone on desk, coffee mug with steam, watch with leather strap...",
      icon: "camera",
      tips: "Describe the setting, lighting, and angles you want for your product."
    }
  };

  const info = toolInfo[toolType] || toolInfo.general;

  return `<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="${info.description} - Professional AI image generation by OneNetly.">
  <meta name="keywords" content="AI image generator, ${toolType}, artificial intelligence, image creation, ${info.title.toLowerCase()}, OneNetly">
  <meta name="robots" content="index, follow">
  <meta name="google-adsense-account" content="ca-pub-9354746037074515">
  <title>${info.title} - OneNetly AI Image Generation Tool</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515"
     crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50 text-gray-800 leading-relaxed p-4 md:p-6 flex flex-col min-h-screen">
  <!-- Header with navigation -->
  <header class="bg-white py-4 shadow-md mb-8">
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
      <a href="/" class="flex items-center gap-2 mb-4 md:mb-0">
        <i class="fas fa-bolt text-blue-600 text-2xl"></i>
        <span class="font-bold text-xl text-blue-700">OneNetly</span>
      </a>
      
      <nav>
        <ul class="flex flex-wrap gap-6 items-center">
          <li><a href="/" class="text-gray-600 hover:text-blue-600">Home</a></li>
          <li><a href="/about" class="text-gray-600 hover:text-blue-600">About</a></li>
          <li><a href="/privacy-policy" class="text-gray-600 hover:text-blue-600">Privacy</a></li>
          <li><a href="/terms-of-service" class="text-gray-600 hover:text-blue-600">Terms</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="max-w-6xl mx-auto flex-grow">
    <div class="bg-white rounded-xl p-6 md:p-8 shadow-md mb-6 relative">
      <div class="flex items-center justify-between mb-6">
        <a href="/" class="text-blue-500 font-semibold flex items-center gap-2 transition hover:underline">
          <i class="fas fa-arrow-left"></i> Back to Tools
        </a>
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">${info.title}</h1>
        <div class="w-24"></div> <!-- Spacer for centering -->
      </div>
      
      <p class="text-gray-500 text-center mb-6">${info.description}</p>
      
      <div class="text-center">
        <i class="fas fa-${info.icon} text-5xl text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-blue-700 mb-6"></i>
      </div>
      
      <!-- Top ad placement -->
      <div class="bg-gray-100 rounded-lg p-3 my-6 text-center overflow-hidden min-h-[90px]">
        <!-- OneNetly -->
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
      
      <div class="bg-gray-50 border-l-4 border-blue-500 p-4 mb-6 rounded">
        <i class="fas fa-lightbulb text-blue-500 mr-2"></i>
        <strong>Tips:</strong> ${info.tips}
      </div>
      
      <form id="promptForm" class="flex flex-col gap-5">
        <input type="hidden" id="toolType" name="tool" value="${toolType}">
        <div>
          <label for="prompt" class="block font-semibold mb-2 text-gray-700">Enter your prompt:</label>
          <input type="text" id="prompt" name="prompt" placeholder="${info.placeholder}" required 
            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition">
        </div>
        
        <div class="flex flex-wrap gap-2 mb-4">
          <span class="bg-gray-200 px-3 py-2 rounded-full text-sm cursor-pointer hover:bg-gray-300 transition" data-style="realistic">Realistic</span>
          <span class="bg-gray-200 px-3 py-2 rounded-full text-sm cursor-pointer hover:bg-gray-300 transition" data-style="artistic">Artistic</span>
          <span class="bg-gray-200 px-3 py-2 rounded-full text-sm cursor-pointer hover:bg-gray-300 transition" data-style="cartoon">Cartoon</span>
          <span class="bg-gray-200 px-3 py-2 rounded-full text-sm cursor-pointer hover:bg-gray-300 transition" data-style="cinematic">Cinematic</span>
          <span class="bg-gray-200 px-3 py-2 rounded-full text-sm cursor-pointer hover:bg-gray-300 transition" data-style="fantasy">Fantasy</span>
          <span class="bg-gray-200 px-3 py-2 rounded-full text-sm cursor-pointer hover:bg-gray-300 transition" data-style="3d">3D Render</span>
        </div>
        
        <span id="advancedOptionsToggle" class="text-blue-500 cursor-pointer underline inline-block mt-2">Show Advanced Options</span>
        
        <div id="advancedOptions" class="hidden bg-gray-50 p-4 rounded mt-4">
          <div class="mb-3">
            <div class="flex justify-between mb-1">
              <span>Quality Level:</span>
              <span id="qualityValue">7.5</span>
            </div>
            <input type="range" class="w-full" id="qualitySlider" name="guidance_scale" min="1" max="15" step="0.5" value="7.5">
          </div>
          
          <div class="mb-3">
            <div class="flex justify-between mb-1">
              <span>Detail Level:</span>
              <span id="detailValue">50</span>
            </div>
            <input type="range" class="w-full" id="detailSlider" name="num_inference_steps" min="20" max="100" value="50">
          </div>
          
          <div>
            <label for="negativePrompt" class="block font-semibold mb-2 text-gray-700">Negative Prompt (things to avoid):</label>
            <input type="text" id="negativePrompt" name="negative_prompt" placeholder="e.g., blurry, distorted, low quality" 
              class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none transition">
          </div>
        </div>
        
        <button type="submit" id="generateBtn" 
          class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 px-6 rounded-lg font-semibold transition transform hover:-translate-y-1 hover:shadow-md">
          Generate Image
        </button>
      </form>
      
      <div id="loading" class="hidden text-center my-6">
        <p class="mb-3">Generating your image, please wait...</p>
        <div class="inline-block w-10 h-10 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
      </div>
      
      <div id="error" class="hidden text-red-600 font-bold text-center my-5"></div>
      <div id="result" class="text-center mt-8"></div>
      
      <!-- Bottom ad placement -->
      <div class="bg-gray-100 rounded-lg p-3 my-6 text-center overflow-hidden min-h-[90px]">
        <!-- OneNetly -->
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
    
    <div id="fullscreenViewer" class="fixed inset-0 bg-black bg-opacity-90 hidden items-center justify-center z-50">
      <span id="closeFullscreen" class="absolute top-5 right-5 text-white text-3xl cursor-pointer">&times;</span>
      <img id="fullscreenImage" src="" alt="Fullscreen view" class="max-w-[90%] max-h-[90%] rounded">
    </div>
    
    <footer class="text-center mt-10 text-gray-500 text-sm">
      Powered by Cloudflare Workers AI | Stable Diffusion XL
    </footer>
  </div>
  
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const form = document.getElementById('promptForm');
      const generateBtn = document.getElementById('generateBtn');
      const loading = document.getElementById('loading');
      const result = document.getElementById('result');
      const error = document.getElementById('error');
      const styleOptions = document.querySelectorAll('[data-style]');
      const advancedOptionsToggle = document.getElementById('advancedOptionsToggle');
      const advancedOptions = document.getElementById('advancedOptions');
      const qualitySlider = document.getElementById('qualitySlider');
      const qualityValue = document.getElementById('qualityValue');
      const detailSlider = document.getElementById('detailSlider');
      const detailValue = document.getElementById('detailValue');
      const fullscreenViewer = document.getElementById('fullscreenViewer');
      const fullscreenImage = document.getElementById('fullscreenImage');
      const closeFullscreen = document.getElementById('closeFullscreen');
      
      // Style options click handler
      styleOptions.forEach(option => {
        option.addEventListener('click', () => {
          // Toggle active class
          styleOptions.forEach(opt => opt.classList.remove('bg-blue-500', 'text-white'));
          option.classList.add('bg-blue-500', 'text-white');
          
          // Update prompt with style
          const promptInput = document.getElementById('prompt');
          const style = option.dataset.style;
          
          // Get current prompt
          let currentPrompt = promptInput.value.trim();
          
          // Remove any existing style keywords
          const styleKeywords = ['realistic', 'artistic', 'cartoon', 'cinematic', 'fantasy', '3d render'];
          for (const keyword of styleKeywords) {
            currentPrompt = currentPrompt.replace(new RegExp('\\\\b' + keyword + '\\\\b', 'gi'), '');
          }
          
          // Add new style to the beginning of the prompt
          promptInput.value = style + ' style, ' + currentPrompt.trim();
        });
      });

      // Advanced options toggle
      advancedOptionsToggle.addEventListener('click', () => {
        if (advancedOptions.classList.contains('hidden')) {
          advancedOptions.classList.remove('hidden');
          advancedOptionsToggle.textContent = 'Hide Advanced Options';
        } else {
          advancedOptions.classList.add('hidden');
          advancedOptionsToggle.textContent = 'Show Advanced Options';
        }
      });

      // Sliders
      qualitySlider.addEventListener('input', () => {
        qualityValue.textContent = qualitySlider.value;
      });

      detailSlider.addEventListener('input', () => {
        detailValue.textContent = detailSlider.value;
      });

      // Fullscreen viewer
      function openFullscreen(imageUrl) {
        fullscreenImage.src = imageUrl;
        fullscreenViewer.classList.remove('hidden');
        fullscreenViewer.classList.add('flex');
        document.body.style.overflow = 'hidden';
      }

      closeFullscreen.addEventListener('click', () => {
        fullscreenViewer.classList.add('hidden');
        fullscreenViewer.classList.remove('flex');
        document.body.style.overflow = 'auto';
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
          
          // Check if we have an active style and add it to formData if not in prompt
          const activeStyle = document.querySelector('[data-style].bg-blue-500');
          if (activeStyle) {
            const promptValue = formData.get('prompt');
            const style = activeStyle.dataset.style;
            if (!promptValue.toLowerCase().includes(style.toLowerCase())) {
              formData.set('prompt', style + ' style, ' + promptValue);
            }
          }
          
          // Send the request to generate the image
          const response = await fetch('/generate', {
            method: 'POST',
            body: formData
          });
          
          if (!response.ok) {
            throw new Error('Failed to generate image. ' + (await response.text()));
          }
          
          // Create a blob from the response
          const imageBlob = await response.blob();
          
          // Create an object URL for the blob
          const imageUrl = URL.createObjectURL(imageBlob);
          
          // Create an image element and set its source to the blob URL
          const img = document.createElement('img');
          img.src = imageUrl;
          img.alt = 'Generated image';
          img.className = 'max-w-full rounded-lg shadow-md mx-auto cursor-pointer';
          
          // Add click event to open fullscreen
          img.addEventListener('click', () => {
            openFullscreen(imageUrl);
          });
          
          // Add the image to the result div
          result.appendChild(img);
          
          // Add image options
          const imageOptions = document.createElement('div');
          imageOptions.className = 'flex justify-center gap-4 mt-4';
          
          // Download button
          const downloadBtn = document.createElement('a');
          downloadBtn.href = imageUrl;
          downloadBtn.download = 'generated-image.png';
          downloadBtn.className = 'bg-gray-200 px-4 py-2 rounded flex items-center gap-2 hover:bg-gray-300 transition';
          downloadBtn.innerHTML = '<i class="fas fa-download"></i> Download';
          
          // Copy to clipboard button
          const copyBtn = document.createElement('button');
          copyBtn.className = 'bg-gray-200 px-4 py-2 rounded flex items-center gap-2 hover:bg-gray-300 transition';
          copyBtn.innerHTML = '<i class="fas fa-copy"></i> Copy to Clipboard';
          copyBtn.addEventListener('click', async () => {
            try {
              const blob = await fetch(imageUrl).then(r => r.blob());
              await navigator.clipboard.write([
                new ClipboardItem({
                  [blob.type]: blob
                })
              ]);
              alert('Image copied to clipboard!');
            } catch (err) {
              console.error('Failed to copy image: ', err);
              alert('Failed to copy image. Your browser may not support this feature.');
            }
          });

          // Fullscreen button
          const fullscreenBtn = document.createElement('button');
          fullscreenBtn.className = 'bg-gray-200 px-4 py-2 rounded flex items-center gap-2 hover:bg-gray-300 transition';
          fullscreenBtn.innerHTML = '<i class="fas fa-expand"></i> Fullscreen';
          fullscreenBtn.addEventListener('click', () => {
            openFullscreen(imageUrl);
          });

          // Append all buttons
          imageOptions.appendChild(downloadBtn);
          imageOptions.appendChild(copyBtn);
          imageOptions.appendChild(fullscreenBtn);
          
          result.appendChild(imageOptions);
          
          // Add prompt display
          const promptDisplay = document.createElement('div');
          promptDisplay.className = 'mt-4 text-sm text-gray-600';
          promptDisplay.innerHTML = '<strong>Prompt used:</strong> ' + formData.get('prompt');
          
          result.appendChild(promptDisplay);
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
</body>
</html>`;
}

function getHtmlContent() {
  return `<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Professional AI-powered image generation tools by OneNetly. Create stunning images, thumbnails, portraits and more with artificial intelligence.">
  <meta name="keywords" content="AI image generator, artificial intelligence, image creation, digital art, anime, product photography, OneNetly">
  <meta name="robots" content="index, follow">
  <meta name="google-adsense-account" content="ca-pub-9354746037074515">
  <title>OneNetly - Professional AI Image Generation Tools</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515"
     crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50 text-gray-800 leading-relaxed p-4 md:p-6 flex flex-col min-h-screen">
  <!-- Header with navigation -->
  <header class="bg-white py-4 shadow-md mb-8">
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
      <a href="/" class="flex items-center gap-2 mb-4 md:mb-0">
        <i class="fas fa-bolt text-blue-600 text-2xl"></i>
        <span class="font-bold text-xl text-blue-700">OneNetly</span>
      </a>
      
      <nav>
        <ul class="flex flex-wrap gap-6 items-center">
          <li><a href="/" class="text-gray-600 hover:text-blue-600">Home</a></li>
          <li><a href="/about" class="text-gray-600 hover:text-blue-600">About</a></li>
          <li><a href="/privacy-policy" class="text-gray-600 hover:text-blue-600">Privacy</a></li>
          <li><a href="/terms-of-service" class="text-gray-600 hover:text-blue-600">Terms</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="max-w-6xl mx-auto flex-grow">
    <div class="bg-white rounded-xl p-6 md:p-8 shadow-md mb-8">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-4">OneNetly AI Image Tools</h1>
      <p class="text-lg text-gray-600 text-center mb-6">Create stunning professional images with our cutting-edge AI-powered tools</p>
      <div class="max-w-xl mx-auto relative">
        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
        <input type="text" id="searchInput" class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-full focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition" placeholder="Search tools...">
      </div>
    </div>

    <!-- Top ad placement -->
    <div class="bg-gray-100 rounded-lg p-4 mb-8 text-center overflow-hidden min-h-[90px]">
      <!-- OneNetly -->
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

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10" id="toolsGrid">
      <a href="/tool/general" class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition transform hover:-translate-y-1 flex flex-col items-center text-center cursor-pointer border border-gray-100 no-underline" data-tool="general">
        <i class="fas fa-image text-4xl text-blue-500 mb-4"></i>
        <div class="font-bold text-lg mb-2 text-gray-800">General Image Generator</div>
        <div class="text-gray-600 text-sm">Create custom images from text descriptions</div>
      </a>

      <a href="/tool/youtube" class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition transform hover:-translate-y-1 flex flex-col items-center text-center cursor-pointer border border-gray-100 no-underline" data-tool="youtube">
        <i class="fab fa-youtube text-4xl text-blue-500 mb-4"></i>
        <div class="font-bold text-lg mb-2 text-gray-800">YouTube Thumbnail Creator</div>
        <div class="text-gray-600 text-sm">Create eye-catching thumbnails for your videos</div>
      </a>

      <a href="/tool/portrait" class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition transform hover:-translate-y-1 flex flex-col items-center text-center cursor-pointer border border-gray-100 no-underline" data-tool="portrait">
        <i class="fas fa-portrait text-4xl text-blue-500 mb-4"></i>
        <div class="font-bold text-lg mb-2 text-gray-800">AI Portrait Generator</div>
        <div class="text-gray-600 text-sm">Generate professional portrait images</div>
      </a>

      <a href="/tool/landscape" class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition transform hover:-translate-y-1 flex flex-col items-center text-center cursor-pointer border border-gray-100 no-underline" data-tool="landscape">
        <i class="fas fa-mountain text-4xl text-blue-500 mb-4"></i>
        <div class="font-bold text-lg mb-2 text-gray-800">Landscape Generator</div>
        <div class="text-gray-600 text-sm">Create stunning landscape images</div>
      </a>

      <a href="/tool/art" class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition transform hover:-translate-y-1 flex flex-col items-center text-center cursor-pointer border border-gray-100 no-underline" data-tool="art">
        <i class="fas fa-palette text-4xl text-blue-500 mb-4"></i>
        <div class="font-bold text-lg mb-2 text-gray-800">Digital Art Creator</div>
        <div class="text-gray-600 text-sm">Generate beautiful digital artwork</div>
      </a>
      
      <a href="/tool/anime" class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition transform hover:-translate-y-1 flex flex-col items-center text-center cursor-pointer border border-gray-100 no-underline" data-tool="anime">
        <i class="fas fa-paint-brush text-4xl text-blue-500 mb-4"></i>
        <div class="font-bold text-lg mb-2 text-gray-800">Anime Illustrator</div>
        <div class="text-gray-600 text-sm">Create anime-style illustrations</div>
      </a>
      
      <a href="/tool/product" class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition transform hover:-translate-y-1 flex flex-col items-center text-center cursor-pointer border border-gray-100 no-underline" data-tool="product">
        <i class="fas fa-camera text-4xl text-blue-500 mb-4"></i>
        <div class="font-bold text-lg mb-2 text-gray-800">Product Photography</div>
        <div class="text-gray-600 text-sm">Generate professional product photos</div>
      </a>
    </div>
    
    <!-- Bottom ad placement -->
    <div class="bg-gray-100 rounded-lg p-4 mb-8 text-center overflow-hidden min-h-[90px]">
      <!-- OneNetly -->
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
    
    <footer class="text-center mt-10 text-gray-500 text-sm">
      <p>Professional AI Image Generation Tools | Powered by Cloudflare Workers AI | Stable Diffusion XL</p>
      <p class="mt-2 text-xs text-gray-400">© ${new Date().getFullYear()} AI Image Tools Hub. All rights reserved.</p>
    </footer>
  </div>
  
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const searchInput = document.getElementById('searchInput');
      const toolCards = document.querySelectorAll('[data-tool]');

      // Search functionality
      searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase();
        
        toolCards.forEach(card => {
          const toolName = card.querySelector('.font-bold').textContent.toLowerCase();
          const toolDescription = card.querySelector('.text-gray-600').textContent.toLowerCase();
          
          if (toolName.includes(searchTerm) || toolDescription.includes(searchTerm)) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  </script>
</body>
</html>`;
}

// New function to generate Privacy Policy page for AdSense approval
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
<body class="bg-gray-50 text-gray-800 leading-relaxed p-4 md:p-6 flex flex-col min-h-screen">
  <!-- Header with navigation -->
  <header class="bg-white py-4 shadow-md mb-8">
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
      <a href="/" class="flex items-center gap-2 mb-4 md:mb-0">
        <i class="fas fa-bolt text-blue-600 text-2xl"></i>
        <span class="font-bold text-xl text-blue-700">OneNetly</span>
      </a>
      
      <nav>
        <ul class="flex flex-wrap gap-6 items-center">
          <li><a href="/" class="text-gray-600 hover:text-blue-600">Home</a></li>
          <li><a href="/about" class="text-gray-600 hover:text-blue-600">About</a></li>
          <li><a href="/privacy-policy" class="text-blue-600 font-medium">Privacy</a></li>
          <li><a href="/terms-of-service" class="text-gray-600 hover:text-blue-600">Terms</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="max-w-4xl mx-auto flex-grow bg-white rounded-xl p-8 shadow-md mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Privacy Policy</h1>
    
    <div class="prose prose-lg max-w-none">
      <p class="mb-4">Last updated: ${new Date().toLocaleDateString('en-US', {year: 'numeric', month: 'long', day: 'numeric'})}</p>
      
      <h2 class="text-xl font-semibold mt-6 mb-3">1. Introduction</h2>
      <p class="mb-4">Welcome to OneNetly ("we," "our," or "us"). We are committed to protecting your privacy and personal data. This Privacy Policy explains how we collect, use, and share information about you when you use our website and services.</p>
      
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
      <!-- OneNetly -->
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
  
  <!-- Footer -->
  <footer class="bg-white py-8 border-t mt-12">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <div class="flex items-center gap-2 mb-4 md:mb-0">
          <i class="fas fa-bolt text-blue-600 text-xl"></i>
          <span class="font-bold text-lg text-blue-700">OneNetly</span>
        </div>
        
        <div class="flex flex-wrap gap-6 justify-center">
          <a href="/" class="text-gray-600 hover:text-blue-600">Home</a>
          <a href="/about" class="text-gray-600 hover:text-blue-600">About Us</a>
          <a href="/privacy-policy" class="text-blue-600 font-medium">Privacy Policy</a>
          <a href="/terms-of-service" class="text-gray-600 hover:text-blue-600">Terms of Service</a>
        </div>
      </div>
      
      <div class="text-center text-gray-500 text-sm">
        <p>OneNetly AI Image Generation | Powered by Cloudflare Workers AI | Stable Diffusion XL</p>
        <p class="mt-2 text-xs text-gray-400">© ${new Date().getFullYear()} OneNetly. All rights reserved.</p>
      </div>
    </div>
  </footer>
</body>
</html>`;
}

// New function to generate Terms of Service page for AdSense approval
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
<body class="bg-gray-50 text-gray-800 leading-relaxed p-4 md:p-6 flex flex-col min-h-screen">
  <!-- Header with navigation -->
  <header class="bg-white py-4 shadow-md mb-8">
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
      <a href="/" class="flex items-center gap-2 mb-4 md:mb-0">
        <i class="fas fa-bolt text-blue-600 text-2xl"></i>
        <span class="font-bold text-xl text-blue-700">OneNetly</span>
      </a>
      
      <nav>
        <ul class="flex flex-wrap gap-6 items-center">
          <li><a href="/" class="text-gray-600 hover:text-blue-600">Home</a></li>
          <li><a href="/about" class="text-gray-600 hover:text-blue-600">About</a></li>
          <li><a href="/privacy-policy" class="text-gray-600 hover:text-blue-600">Privacy</a></li>
          <li><a href="/terms-of-service" class="text-blue-600 font-medium">Terms</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="max-w-4xl mx-auto flex-grow bg-white rounded-xl p-8 shadow-md mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Terms of Service</h1>
    
    <div class="prose prose-lg max-w-none">
      <p class="mb-4">Last updated: ${new Date().toLocaleDateString('en-US', {year: 'numeric', month: 'long', day: 'numeric'})}</p>
      
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
      <!-- OneNetly -->
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
  
  <!-- Footer -->
  <footer class="bg-white py-8 border-t mt-12">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <div class="flex items-center gap-2 mb-4 md:mb-0">
          <i class="fas fa-bolt text-blue-600 text-xl"></i>
          <span class="font-bold text-lg text-blue-700">OneNetly</span>
        </div>
        
        <div class="flex flex-wrap gap-6 justify-center">
          <a href="/" class="text-gray-600 hover:text-blue-600">Home</a>
          <a href="/about" class="text-gray-600 hover:text-blue-600">About Us</a>
          <a href="/privacy-policy" class="text-gray-600 hover:text-blue-600">Privacy Policy</a>
          <a href="/terms-of-service" class="text-blue-600 font-medium">Terms of Service</a>
        </div>
      </div>
      
      <div class="text-center text-gray-500 text-sm">
        <p>OneNetly AI Image Generation | Powered by Cloudflare Workers AI | Stable Diffusion XL</p>
        <p class="mt-2 text-xs text-gray-400">© ${new Date().getFullYear()} OneNetly. All rights reserved.</p>
      </div>
    </div>
  </footer>
</body>
</html>`;
}

// New function to generate About page for AdSense approval
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
<body class="bg-gray-50 text-gray-800 leading-relaxed p-4 md:p-6 flex flex-col min-h-screen">
  <!-- Header with navigation -->
  <header class="bg-white py-4 shadow-md mb-8">
    <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
      <a href="/" class="flex items-center gap-2 mb-4 md:mb-0">
        <i class="fas fa-bolt text-blue-600 text-2xl"></i>
        <span class="font-bold text-xl text-blue-700">OneNetly</span>
      </a>
      
      <nav>
        <ul class="flex flex-wrap gap-6 items-center">
          <li><a href="/" class="text-gray-600 hover:text-blue-600">Home</a></li>
          <li><a href="/about" class="text-blue-600 font-medium">About</a></li>
          <li><a href="/privacy-policy" class="text-gray-600 hover:text-blue-600">Privacy</a></li>
          <li><a href="/terms-of-service" class="text-gray-600 hover:text-blue-600">Terms</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="max-w-4xl mx-auto flex-grow">
    <div class="bg-white rounded-xl p-8 shadow-md mb-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">About OneNetly</h1>
      
      <div class="prose prose-lg max-w-none">
        <p class="mb-6">OneNetly is a cutting-edge platform that provides AI-powered image generation tools for professionals, content creators, and anyone looking to transform their ideas into visual content.</p>
        
        <h2 class="text-2xl font-semibold mt-8 mb-4">Our Mission</h2>
        <p class="mb-6">Our mission is to democratize visual content creation by making professional-grade AI image generation technology accessible to everyone, regardless of their artistic abilities or technical background.</p>
        
        <h2 class="text-2xl font-semibold mt-8 mb-4">Our Technology</h2>
        <p class="mb-6">OneNetly leverages the latest advancements in artificial intelligence and machine learning to power our image generation capabilities. We use state-of-the-art models like Stable Diffusion XL and continuously enhance our technology to deliver the highest quality results.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-10">
          <div class="bg-blue-50 p-6 rounded-xl">
            <div class="text-blue-600 text-center mb-4">
              <i class="fas fa-magic text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-center mb-2">Powerful AI</h3>
            <p class="text-center text-gray-600">State-of-the-art AI models to create stunning, detailed images</p>
          </div>
          
          <div class="bg-blue-50 p-6 rounded-xl">
            <div class="text-blue-600 text-center mb-4">
              <i class="fas fa-bolt text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-center mb-2">Fast Generation</h3>
            <p class="text-center text-gray-600">Get your images in seconds with our optimized processing</p>
          </div>
          
          <div class="bg-blue-50 p-6 rounded-xl">
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
      <!-- OneNetly -->
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
  </header>

  <div class="max-w-4xl mx-auto flex-grow">
    <div class="bg-white rounded-xl p-8 shadow-md mb-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Contact Us</h1>
      
      <div class="prose prose-lg max-w-none">
        <p class="mb-6 text-center">We'd love to hear from you! Please use the form below to get in touch with our team.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-10">
          <div>
            <h2 class="text-xl font-semibold mb-4">Send Us a Message</h2>
            <form id="contactForm" class="space-y-4">
              <div>
                <label for="name" class="block text-gray-700 mb-1">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name" required
                  class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition">
              </div>
              
              <div>
                <label for="email" class="block text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" placeholder="Your email address" required
                  class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition">
              </div>
              
              <div>
                <label for="subject" class="block text-gray-700 mb-1">Subject</label>
                <select id="subject" name="subject" required
                  class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition">
                  <option value="" disabled selected>Select a subject</option>
                  <option value="general">General Inquiry</option>
                  <option value="support">Technical Support</option>
                  <option value="feedback">Feedback</option>
                  <option value="business">Business Inquiry</option>
                  <option value="other">Other</option>
                </select>
              </div>
              
              <div>
                <label for="message" class="block text-gray-700 mb-1">Message</label>
                <textarea id="message" name="message" rows="5" placeholder="Your message" required
                  class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition"></textarea>
              </div>
              
              <div>
                <button type="submit" class="bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">
                  Send Message
                </button>
              </div>
            </form>
            
            <div id="success-message" class="hidden mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
              Thank you for your message! We'll get back to you as soon as possible.
            </div>
          </div>
          
          <div>
            <h2 class="text-xl font-semibold mb-4">Contact Information</h2>
            
            <div class="space-y-6">
              <div class="flex items-start gap-4">
                <div class="text-blue-600 mt-1">
                  <i class="fas fa-envelope text-xl"></i>
                </div>
                <div>
                  <h3 class="font-medium text-gray-900">Email</h3>
                  <p class="text-gray-600">support@onenetly.com</p>
                  <p class="text-gray-600">info@onenetly.com</p>
                </div>
              </div>
              
              <div class="flex items-start gap-4">
                <div class="text-blue-600 mt-1">
                  <i class="fas fa-map-marker-alt text-xl"></i>
                </div>
                <div>
                  <h3 class="font-medium text-gray-900">Address</h3>
                  <p class="text-gray-600">123 Innovation Avenue</p>
                  <p class="text-gray-600">Tech Hub, Suite 101</p>
                  <p class="text-gray-600">San Francisco, CA 94105</p>
                </div>
              </div>
              
              <div class="flex items-start gap-4">
                <div class="text-blue-600 mt-1">
                  <i class="fas fa-clock text-xl"></i>
                </div>
                <div>
                  <h3 class="font-medium text-gray-900">Business Hours</h3>
                  <p class="text-gray-600">Monday - Friday: 9am - 5pm PST</p>
                  <p class="text-gray-600">Saturday - Sunday: Closed</p>
                </div>
              </div>
              
              <div class="flex items-start gap-4">
                <div class="text-blue-600 mt-1">
                  <i class="fas fa-users text-xl"></i>
                </div>
                <div>
                  <h3 class="font-medium text-gray-900">Follow Us</h3>
                  <div class="flex gap-4 mt-2">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-twitter text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-facebook text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-instagram text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-linkedin text-xl"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Ad placement -->
    <div class="bg-gray-100 rounded-lg p-4 mb-8 text-center overflow-hidden min-h-[90px]">
      <div id="adsense-contact">
        <!-- AdSense code will go here -->
      </div>
    </div>
  </div>
  
  <!-- Footer -->
  <footer class="bg-white py-8 border-t mt-12">
    <div class="max-w-6xl mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <div class="flex items-center gap-2 mb-4 md:mb-0">
          <i class="fas fa-bolt text-blue-600 text-xl"></i>
          <span class="font-bold text-lg text-blue-700">OneNetly</span>
        </div>
        
        <div class="flex flex-wrap gap-6 justify-center">
          <a href="/" class="text-gray-600 hover:text-blue-600">Home</a>
          <a href="/about" class="text-gray-600 hover:text-blue-600">About Us</a>
          <a href="/contact" class="text-blue-600 font-medium">Contact</a>
          <a href="/privacy-policy" class="text-gray-600 hover:text-blue-600">Privacy Policy</a>
          <a href="/terms-of-service" class="text-gray-600 hover:text-blue-600">Terms of Service</a>
        </div>
      </div>
      
      <div class="text-center text-gray-500 text-sm">
        <p>OneNetly AI Image Generation | Powered by Cloudflare Workers AI | Stable Diffusion XL</p>
        <p class="mt-2 text-xs text-gray-400">© ${new Date().getFullYear()} OneNetly. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const contactForm = document.getElementById('contactForm');
      const successMessage = document.getElementById('success-message');
      
      contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // In a real application, you would send the form data to a server
        // For demo purposes, we'll just show the success message
        contactForm.reset();
        successMessage.classList.remove('hidden');
        
        // Hide success message after 5 seconds
        setTimeout(() => {
          successMessage.classList.add('hidden');
        }, 5000);
      });
    });
  </script>
</body>
</html>`;
}