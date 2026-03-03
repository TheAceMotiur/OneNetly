<?php
/**
 * API Management Page
 * Generate and manage API keys, view documentation
 */

session_start();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/api_auth.php';

// Initialize database (create tables if needed)
initDatabase();

// Handle API key generation (POST request)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    header('Content-Type: application/json');
    
    // Check admin authentication
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        // Check for admin credentials in request
        $username = $_POST['admin_username'] ?? '';
        $password = $_POST['admin_password'] ?? '';
        
        if ($username !== ADMIN_USERNAME || $password !== ADMIN_PASSWORD) {
            http_response_code(401);
            echo json_encode(['success' => false, 'error' => 'Unauthorized. Admin credentials required.']);
            exit;
        }
        
        $_SESSION['admin_logged_in'] = true;
    }
    
    $action = $_POST['action'];
    
    switch ($action) {
        case 'generate':
            $name = trim($_POST['name'] ?? '');
            $websiteUrl = trim($_POST['website_url'] ?? '');
            $rateLimit = (int)($_POST['rate_limit'] ?? 100);
            
            if (empty($name)) {
                echo json_encode(['success' => false, 'error' => 'Name is required']);
                exit;
            }
            
            $result = generateAPIKey($name, $websiteUrl, $rateLimit);
            echo json_encode($result);
            exit;
            
        case 'list':
            $keys = getAllAPIKeys();
            echo json_encode(['success' => true, 'keys' => $keys]);
            exit;
            
        case 'delete':
            $id = (int)($_POST['id'] ?? 0);
            $success = deleteAPIKey($id);
            echo json_encode(['success' => $success]);
            exit;
            
        case 'toggle':
            $id = (int)($_POST['id'] ?? 0);
            $isActive = (bool)($_POST['is_active'] ?? false);
            $success = toggleAPIKeyStatus($id, $isActive);
            echo json_encode(['success' => $success]);
            exit;
            
        case 'stats':
            $id = (int)($_POST['id'] ?? 0);
            $days = (int)($_POST['days'] ?? 7);
            $stats = getAPIUsageStats($id, $days);
            echo json_encode(['success' => true, 'stats' => $stats]);
            exit;
            
        case 'login':
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
                $_SESSION['admin_logged_in'] = true;
                echo json_encode(['success' => true]);
            } else {
                http_response_code(401);
                echo json_encode(['success' => false, 'error' => 'Invalid credentials']);
            }
            exit;
            
        case 'logout':
            session_destroy();
            echo json_encode(['success' => true]);
            exit;
            
        default:
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Unknown action']);
            exit;
    }
}

// Check if admin is logged in for page access
$isLoggedIn = isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?> - API Documentation</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.prod.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            color: white;
            margin-bottom: 40px;
        }
        
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            background: rgba(255,255,255,0.1);
            padding: 10px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }
        
        .tab {
            flex: 1;
            padding: 15px;
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .tab:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .tab.active {
            background: white;
            color: #667eea;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .content {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        
        .section {
            margin-bottom: 30px;
        }
        
        .section h2 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 1.8rem;
        }
        
        .section h3 {
            color: #333;
            margin: 20px 0 10px 0;
            font-size: 1.3rem;
        }
        
        .endpoint {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #667eea;
        }
        
        .method {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 0.9rem;
            margin-right: 10px;
        }
        
        .method.post { background: #28a745; color: white; }
        .method.get { background: #007bff; color: white; }
        
        .url {
            font-family: 'Courier New', monospace;
            background: #e9ecef;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }
        
        pre {
            background: #282c34;
            color: #abb2bf;
            padding: 20px;
            border-radius: 10px;
            overflow-x: auto;
            font-size: 0.9rem;
            line-height: 1.6;
        }
        
        .code-block {
            position: relative;
            margin: 15px 0;
        }
        
        .copy-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #667eea;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.85rem;
        }
        
        .copy-btn:hover {
            background: #5568d3;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        
        .btn-success {
            background: #28a745;
            color: white;
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        
        .api-key-list {
            margin-top: 30px;
        }
        
        .api-key-item {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            border-left: 4px solid #667eea;
        }
        
        .api-key-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .api-key-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
        }
        
        .api-key-value {
            font-family: 'Courier New', monospace;
            background: #282c34;
            color: #61dafb;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            word-break: break-all;
        }
        
        .api-key-stats {
            display: flex;
            gap: 20px;
            margin-top: 10px;
            font-size: 0.9rem;
            color: #666;
        }
        
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .badge-success { background: #d4edda; color: #155724; }
        .badge-danger { background: #f8d7da; color: #721c24; }
        
        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }
        
        .login-box {
            max-width: 400px;
            margin: 100px auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        
        .login-box h2 {
            text-align: center;
            color: #667eea;
            margin-bottom: 30px;
        }
        
        .hidden { display: none; }
        
        .parameter-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        
        .parameter-table th,
        .parameter-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        
        .parameter-table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #333;
        }
        
        .parameter-table code {
            background: #e9ecef;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Login Screen -->
        <div v-if="!isLoggedIn && showLogin" class="login-box">
            <h2>🔐 Admin Login</h2>
            <div v-if="loginError" class="alert alert-error">{{ loginError }}</div>
            <form @submit.prevent="login">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" v-model="loginUsername" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" v-model="loginPassword" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
            </form>
            <div style="text-align: center; margin-top: 20px;">
                <button @click="showLogin = false" class="btn btn-secondary">View Documentation Only</button>
            </div>
        </div>

        <!-- Main Content -->
        <div v-if="!showLogin || isLoggedIn" class="container">
            <div class="header">
                <h1>🚀 <?= SITE_NAME ?> API</h1>
                <p>Upload files programmatically and integrate with your applications</p>
                <div v-if="isLoggedIn" style="margin-top: 15px;">
                    <button @click="logout" class="btn btn-secondary">Logout</button>
                </div>
            </div>

            <div class="tabs">
                <button class="tab" :class="{active: activeTab === 'docs'}" @click="activeTab = 'docs'">
                    📚 Documentation
                </button>
                <button class="tab" :class="{active: activeTab === 'keys'}" @click="activeTab = 'keys'; if(isLoggedIn) loadAPIKeys()">
                    🔑 API Keys
                </button>
                <button class="tab" :class="{active: activeTab === 'examples'}" @click="activeTab = 'examples'">
                    💻 Code Examples
                </button>
            </div>

            <!-- Documentation Tab -->
            <div v-show="activeTab === 'docs'" class="content">
                <div class="section">
                    <h2>Getting Started</h2>
                    <p>The <?= SITE_NAME ?> API allows you to upload files and retrieve download links programmatically. All API requests require authentication using an API key.</p>
                    
                    <h3>Base URL</h3>
                    <div class="url"><?= SITE_URL ?>/api/v1</div>
                    
                    <h3>Authentication</h3>
                    <p>Include your API key in the request header:</p>
                    <div class="code-block">
                        <button class="copy-btn" @click="copyCode($event)">Copy</button>
                        <pre>X-API-Key: your_api_key_here</pre>
                    </div>
                </div>

                <div class="section">
                    <h2>Endpoints</h2>
                    
                    <!-- Upload Endpoint -->
                    <div class="endpoint">
                        <h3>
                            <span class="method post">POST</span>
                            <span class="url">/upload</span>
                        </h3>
                        <p>Upload a file and receive a download link.</p>
                        
                        <h4 style="margin-top: 15px;">Request Parameters</h4>
                        <table class="parameter-table">
                            <thead>
                                <tr>
                                    <th>Parameter</th>
                                    <th>Type</th>
                                    <th>Required</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>file</code></td>
                                    <td>File</td>
                                    <td>Yes</td>
                                    <td>The file to upload (multipart/form-data)</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <h4>Response</h4>
                        <div class="code-block">
                            <button class="copy-btn" @click="copyCode($event)">Copy</button>
                            <pre>{
  "success": true,
  "file_id": "a1b2c3d4e5f6",
  "filename": "document.pdf",
  "size": 1048576,
  "mime_type": "application/pdf",
  "download_url": "<?= SITE_URL ?>/download/a1b2c3d4e5f6",
  "uploaded_at": "2026-03-03T10:30:00+00:00",
  "expires_in_days": 90
}</pre>
                        </div>
                    </div>

                    <!-- File Info Endpoint -->
                    <div class="endpoint">
                        <h3>
                            <span class="method get">GET</span>
                            <span class="url">/file/{id}</span>
                        </h3>
                        <p>Get information about an uploaded file.</p>
                        
                        <h4 style="margin-top: 15px;">URL Parameters</h4>
                        <table class="parameter-table">
                            <thead>
                                <tr>
                                    <th>Parameter</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>id</code></td>
                                    <td>String</td>
                                    <td>The file ID returned from upload</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <h4>Response</h4>
                        <div class="code-block">
                            <button class="copy-btn" @click="copyCode($event)">Copy</button>
                            <pre>{
  "success": true,
  "file_id": "a1b2c3d4e5f6",
  "filename": "document.pdf",
  "size": 1048576,
  "size_human": "1.00 MB",
  "mime_type": "application/pdf",
  "download_url": "<?= SITE_URL ?>/download/a1b2c3d4e5f6",
  "uploaded_at": "2026-03-03 10:30:00",
  "download_count": 5,
  "last_downloaded_at": "2026-03-03 15:45:00",
  "expires_after_days": 90
}</pre>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <h2>Error Responses</h2>
                    <p>All errors return a JSON object with <code>success: false</code> and an <code>error</code> message:</p>
                    <div class="code-block">
                        <button class="copy-btn" @click="copyCode($event)">Copy</button>
                        <pre>{
  "success": false,
  "error": "Invalid or inactive API key.",
  "code": 401
}</pre>
                    </div>
                    
                    <h3>HTTP Status Codes</h3>
                    <table class="parameter-table">
                        <tbody>
                            <tr><td><code>200</code></td><td>Success</td></tr>
                            <tr><td><code>400</code></td><td>Bad Request - Invalid parameters</td></tr>
                            <tr><td><code>401</code></td><td>Unauthorized - Invalid or missing API key</td></tr>
                            <tr><td><code>404</code></td><td>Not Found - File doesn't exist</td></tr>
                            <tr><td><code>429</code></td><td>Too Many Requests - Rate limit exceeded</td></tr>
                            <tr><td><code>500</code></td><td>Server Error</td></tr>
                        </tbody>
                    </table>
                </div>

                <div class="section">
                    <h2>Rate Limits</h2>
                    <p>API keys have a default rate limit of <strong>100 requests per hour</strong>. Custom limits can be configured per key.</p>
                </div>
            </div>

            <!-- API Keys Tab -->
            <div v-show="activeTab === 'keys'" class="content">
                <div v-if="!isLoggedIn">
                    <div class="alert alert-error">
                        You must be logged in as admin to manage API keys.
                    </div>
                    <button @click="showLogin = true" class="btn btn-primary">Login as Admin</button>
                </div>

                <div v-if="isLoggedIn">
                    <div class="section">
                        <h2>Generate New API Key</h2>
                        <div v-if="successMessage" class="alert alert-success">{{ successMessage }}</div>
                        <div v-if="errorMessage" class="alert alert-error">{{ errorMessage }}</div>
                        
                        <form @submit.prevent="generateKey">
                            <div class="form-group">
                                <label>Key Name *</label>
                                <input type="text" v-model="newKey.name" placeholder="e.g., My Website" required>
                            </div>
                            <div class="form-group">
                                <label>Website URL (Optional)</label>
                                <input type="url" v-model="newKey.websiteUrl" placeholder="https://example.com">
                            </div>
                            <div class="form-group">
                                <label>Rate Limit (requests per hour)</label>
                                <input type="number" v-model="newKey.rateLimit" min="1" max="10000" value="100">
                            </div>
                            <button type="submit" class="btn btn-primary">Generate API Key</button>
                        </form>
                    </div>

                    <div class="section">
                        <h2>Your API Keys</h2>
                        <div v-if="apiKeys.length === 0" style="text-align: center; padding: 40px; color: #666;">
                            No API keys yet. Generate one above to get started!
                        </div>
                        
                        <div class="api-key-list">
                            <div v-for="key in apiKeys" :key="key.id" class="api-key-item">
                                <div class="api-key-header">
                                    <div>
                                        <span class="api-key-name">{{ key.name }}</span>
                                        <span v-if="key.is_active" class="badge badge-success">Active</span>
                                        <span v-else class="badge badge-danger">Inactive</span>
                                    </div>
                                    <div style="display: flex; gap: 10px;">
                                        <button @click="toggleKeyStatus(key)" class="btn btn-secondary" style="padding: 8px 15px;">
                                            {{ key.is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                        <button @click="deleteKey(key.id)" class="btn btn-danger" style="padding: 8px 15px;">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="api-key-value" @click="copyToClipboard(key.api_key, $event)" style="cursor: pointer;" title="Click to copy">
                                    {{ key.api_key }}
                                </div>
                                
                                <div class="api-key-stats">
                                    <div>📤 Uploads: <strong>{{ key.total_uploads }}</strong></div>
                                    <div>📥 Downloads: <strong>{{ key.total_downloads }}</strong></div>
                                    <div>⚡ Rate Limit: <strong>{{ key.rate_limit_per_hour }}/hour</strong></div>
                                    <div v-if="key.website_url">🌐 {{ key.website_url }}</div>
                                    <div>📅 Created: {{ formatDate(key.created_at) }}</div>
                                    <div v-if="key.last_used_at">🕐 Last used: {{ formatDate(key.last_used_at) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Examples Tab -->
            <div v-show="activeTab === 'examples'" class="content">
                <div class="section">
                    <h2>Code Examples</h2>
                    
                    <h3>JavaScript / Vue.js</h3>
                    <div class="code-block">
                        <button class="copy-btn" @click="copyCode($event)">Copy</button>
                        <pre>// Upload file using Vue.js
async function uploadFile(file) {
  const formData = new FormData();
  formData.append('file', file);
  
  try {
    const response = await fetch('<?= SITE_URL ?>/api/v1/upload.php', {
      method: 'POST',
      headers: {
        'X-API-Key': 'your_api_key_here'
      },
      body: formData
    });
    
    const data = await response.json();
    
    if (data.success) {
      console.log('File uploaded:', data.download_url);
      return data;
    } else {
      console.error('Upload failed:', data.error);
    }
  } catch (error) {
    console.error('Error:', error);
  }
}</pre>
                    </div>

                    <h3>PHP / cURL</h3>
                    <div class="code-block">
                        <button class="copy-btn" @click="copyCode($event)">Copy</button>
                        <pre>&lt;?php
$apiKey = 'your_api_key_here';
$filePath = '/path/to/file.pdf';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '<?= SITE_URL ?>/api/v1/upload.php');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'X-API-Key: ' . $apiKey
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'file' => new CURLFile($filePath)
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$data = json_decode($response, true);

if ($data['success']) {
    echo "Download URL: " . $data['download_url'];
} else {
    echo "Error: " . $data['error'];
}

curl_close($ch);
?&gt;</pre>
                    </div>

                    <h3>Python</h3>
                    <div class="code-block">
                        <button class="copy-btn" @click="copyCode($event)">Copy</button>
                        <pre>import requests

api_key = 'your_api_key_here'
file_path = '/path/to/file.pdf'

headers = {
    'X-API-Key': api_key
}

with open(file_path, 'rb') as f:
    files = {'file': f}
    response = requests.post(
        '<?= SITE_URL ?>/api/v1/upload.php',
        headers=headers,
        files=files
    )

data = response.json()

if data['success']:
    print(f"Download URL: {data['download_url']}")
else:
    print(f"Error: {data['error']}")</pre>
                    </div>

                    <h3>Node.js</h3>
                    <div class="code-block">
                        <button class="copy-btn" @click="copyCode($event)">Copy</button>
                        <pre>const axios = require('axios');
const FormData = require('form-data');
const fs = require('fs');

async function uploadFile(filePath) {
  const form = new FormData();
  form.append('file', fs.createReadStream(filePath));
  
  try {
    const response = await axios.post(
      '<?= SITE_URL ?>/api/v1/upload.php',
      form,
      {
        headers: {
          ...form.getHeaders(),
          'X-API-Key': 'your_api_key_here'
        }
      }
    );
    
    if (response.data.success) {
      console.log('Download URL:', response.data.download_url);
      return response.data;
    }
  } catch (error) {
    console.error('Upload failed:', error.response.data);
  }
}

uploadFile('/path/to/file.pdf');</pre>
                    </div>

                    <h3>Vue.js Component Example</h3>
                    <div class="code-block">
                        <button class="copy-btn" @click="copyCode($event)">Copy</button>
                        <pre>&lt;template&gt;
  &lt;div&gt;
    &lt;input type="file" @change="handleFileSelect" /&gt;
    &lt;button @click="uploadFile" :disabled="!selectedFile"&gt;Upload&lt;/button&gt;
    &lt;div v-if="uploadedUrl"&gt;
      Download: &lt;a :href="uploadedUrl"&gt;{{ uploadedUrl }}&lt;/a&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
export default {
  data() {
    return {
      selectedFile: null,
      uploadedUrl: null,
      apiKey: 'your_api_key_here'
    }
  },
  methods: {
    handleFileSelect(event) {
      this.selectedFile = event.target.files[0];
    },
    async uploadFile() {
      const formData = new FormData();
      formData.append('file', this.selectedFile);
      
      try {
        const response = await fetch('<?= SITE_URL ?>/api/v1/upload.php', {
          method: 'POST',
          headers: { 'X-API-Key': this.apiKey },
          body: formData
        });
        
        const data = await response.json();
        if (data.success) {
          this.uploadedUrl = data.download_url;
        }
      } catch (error) {
        console.error('Upload error:', error);
      }
    }
  }
}
&lt;/script&gt;</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const { createApp } = Vue;
        
        createApp({
            data() {
                return {
                    activeTab: 'docs',
                    isLoggedIn: <?= json_encode($isLoggedIn) ?>,
                    showLogin: false,
                    loginUsername: '',
                    loginPassword: '',
                    loginError: '',
                    apiKeys: [],
                    newKey: {
                        name: '',
                        websiteUrl: '',
                        rateLimit: 100
                    },
                    successMessage: '',
                    errorMessage: ''
                }
            },
            methods: {
                async login() {
                    try {
                        const formData = new FormData();
                        formData.append('action', 'login');
                        formData.append('username', this.loginUsername);
                        formData.append('password', this.loginPassword);
                        
                        const response = await fetch('api.php', {
                            method: 'POST',
                            body: formData
                        });
                        
                        const data = await response.json();
                        
                        if (data.success) {
                            this.isLoggedIn = true;
                            this.showLogin = false;
                            this.loginError = '';
                            this.loadAPIKeys();
                        } else {
                            this.loginError = data.error || 'Login failed';
                        }
                    } catch (error) {
                        this.loginError = 'Login failed. Please try again.';
                    }
                },
                async logout() {
                    const formData = new FormData();
                    formData.append('action', 'logout');
                    await fetch('api.php', { method: 'POST', body: formData });
                    this.isLoggedIn = false;
                    this.showLogin = true;
                },
                async generateKey() {
                    try {
                        const formData = new FormData();
                        formData.append('action', 'generate');
                        formData.append('name', this.newKey.name);
                        formData.append('website_url', this.newKey.websiteUrl);
                        formData.append('rate_limit', this.newKey.rateLimit);
                        
                        const response = await fetch('api.php', {
                            method: 'POST',
                            body: formData
                        });
                        
                        const data = await response.json();
                        
                        if (data.success) {
                            this.successMessage = '✅ API key generated successfully!';
                            this.errorMessage = '';
                            this.newKey = { name: '', websiteUrl: '', rateLimit: 100 };
                            this.loadAPIKeys();
                            
                            setTimeout(() => {
                                this.successMessage = '';
                            }, 5000);
                        } else {
                            this.errorMessage = data.error || 'Failed to generate API key';
                            this.successMessage = '';
                        }
                    } catch (error) {
                        this.errorMessage = 'An error occurred. Please try again.';
                    }
                },
                async loadAPIKeys() {
                    try {
                        const formData = new FormData();
                        formData.append('action', 'list');
                        
                        const response = await fetch('api.php', {
                            method: 'POST',
                            body: formData
                        });
                        
                        const data = await response.json();
                        if (data.success) {
                            this.apiKeys = data.keys;
                        }
                    } catch (error) {
                        console.error('Failed to load API keys:', error);
                    }
                },
                async deleteKey(id) {
                    if (!confirm('Are you sure you want to delete this API key? This cannot be undone.')) {
                        return;
                    }
                    
                    try {
                        const formData = new FormData();
                        formData.append('action', 'delete');
                        formData.append('id', id);
                        
                        const response = await fetch('api.php', {
                            method: 'POST',
                            body: formData
                        });
                        
                        const data = await response.json();
                        if (data.success) {
                            this.loadAPIKeys();
                            this.successMessage = '✅ API key deleted';
                            setTimeout(() => {
                                this.successMessage = '';
                            }, 3000);
                        }
                    } catch (error) {
                        console.error('Failed to delete API key:', error);
                    }
                },
                async toggleKeyStatus(key) {
                    try {
                        const formData = new FormData();
                        formData.append('action', 'toggle');
                        formData.append('id', key.id);
                        formData.append('is_active', key.is_active ? '0' : '1');
                        
                        const response = await fetch('api.php', {
                            method: 'POST',
                            body: formData
                        });
                        
                        const data = await response.json();
                        if (data.success) {
                            this.loadAPIKeys();
                        }
                    } catch (error) {
                        console.error('Failed to toggle API key status:', error);
                    }
                },
                copyCode(event) {
                    const button = event.target;
                    const pre = button.nextElementSibling;
                    const text = pre.textContent;
                    
                    navigator.clipboard.writeText(text).then(() => {
                        const originalText = button.textContent;
                        button.textContent = 'Copied!';
                        setTimeout(() => {
                            button.textContent = originalText;
                        }, 2000);
                    });
                },
                copyToClipboard(text, event) {
                    navigator.clipboard.writeText(text).then(() => {
                        const originalBg = event.target.style.background;
                        event.target.style.background = '#28a745';
                        setTimeout(() => {
                            event.target.style.background = originalBg;
                        }, 1000);
                    });
                },
                formatDate(dateString) {
                    if (!dateString) return 'Never';
                    const date = new Date(dateString);
                    return date.toLocaleString();
                }
            },
            mounted() {
                if (this.isLoggedIn) {
                    this.loadAPIKeys();
                }
            }
        }).mount('#app');
    </script>
</body>
</html>
