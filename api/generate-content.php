<?php
require_once '../includes/init.php';

// Only allow authenticated users to access this API
if (!$user->isLoggedIn()) {
    header('Content-Type: application/json');
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

// Make sure this is a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Content-Type: application/json');
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Get the request body
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validate input
if (!isset($data['prompt']) || empty($data['prompt'])) {
    header('Content-Type: application/json');
    http_response_code(400);
    echo json_encode(['error' => 'Prompt is required']);
    exit;
}

$prompt = $data['prompt'];
$model = $data['model'] ?? 'openai/gpt-3.5-turbo';
$contentType = $data['contentType'] ?? 'both'; // 'title', 'content', or 'both'
$generateTags = isset($data['generateTags']) && $data['generateTags'] === true;

// Get API key from environment or database
$apiKey = getenv('OPENROUTER_API_KEY');
if (empty($apiKey)) {
    // Try to get from database
    try {
        // First, check if the key exists in the site_config table
        $stmt = $pdo->prepare("SELECT openrouter_api_key FROM site_config LIMIT 1");
        $stmt->execute();
        $config = $stmt->fetch(PDO::FETCH_ASSOC);
        $apiKey = $config['openrouter_api_key'] ?? '';
        
        // If not found in site_config, try the settings table as fallback
        if (empty($apiKey)) {
            $stmt = $pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = 'openrouter_api_key' AND user_id IS NULL");
            $stmt->execute();
            $setting = $stmt->fetch(PDO::FETCH_ASSOC);
            $apiKey = $setting['setting_value'] ?? '';
        }
    } catch (PDOException $e) {
        header('Content-Type: application/json');
        http_response_code(500);
        echo json_encode(['error' => 'Database error']);
        exit;
    }
}

if (empty($apiKey)) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['error' => 'OpenRouter API key is not configured']);
    exit;
}

// Prepare system message based on content type
$systemMessage = "You are a helpful writing assistant for writers using OneNetly blog platform.";

if ($contentType === 'title') {
    $systemMessage .= " Generate a compelling, SEO-friendly title for a blog post based on the prompt.";
    $systemMessage .= " Return ONLY the title without any prefix like 'Title:' and no additional text, explanations, or quotes around it.";
} elseif ($contentType === 'content') {
    $systemMessage .= " Generate high-quality, informative, and engaging content for a blog post.";
    $systemMessage .= " Structure the content with multiple sections using proper HTML tags. Include:";
    $systemMessage .= " - An introduction (<p> tags for paragraphs)";
    $systemMessage .= " - At least 3-4 sections with <h2> headings";
    $systemMessage .= " - Subsections with <h3> headings where appropriate";
    $systemMessage .= " - Lists (<ul> or <ol> with <li> items) where relevant";
    $systemMessage .= " - Use <strong> for bold text and <em> for italic text for emphasis where appropriate";
    $systemMessage .= " - A conclusion";
    $systemMessage .= " Format the content using proper HTML tags like <h2>, <h3>, <p>, <ul>, <ol>, <li>, <strong>, <em>, etc.";
    $systemMessage .= " DO NOT include any extra text or explanations outside of the actual content.";
} else { // both
    $systemMessage .= " Generate both a title and content for a blog post.";
    $systemMessage .= " For the title: make it compelling and SEO-friendly. Do not include any prefix like 'Title:'.";
    $systemMessage .= " For the content: create structured, well-organized content with:";
    $systemMessage .= " - An introduction (<p> tags for paragraphs)";
    $systemMessage .= " - At least 3-4 sections with <h2> headings";
    $systemMessage .= " - Subsections with <h3> headings where appropriate";
    $systemMessage .= " - Lists (<ul> or <ol> with <li> items) where relevant";
    $systemMessage .= " - Use <strong> for bold text and <em> for italic text for emphasis where appropriate";
    $systemMessage .= " - A conclusion";
    $systemMessage .= " Format the content using proper HTML tags like <h2>, <h3>, <p>, <ul>, <ol>, <li>, <strong>, <em>, etc.";
    $systemMessage .= " DO NOT include any extra text or explanations outside of the actual content.";
}

// Add tag generation instructions if requested
if ($generateTags) {
    $systemMessage .= " Also include 3-5 relevant tags for the content at the end, prefixed with 'TAGS:' on a new line.";
    $systemMessage .= " Tags should be clear, concise keywords or short phrases that categorize the content.";
    $systemMessage .= " Format the tags as a comma-separated list like 'TAGS: tag1, tag2, tag3'.";
    $systemMessage .= " Choose tags that would make good search keywords related to the topic.";
}

// Call OpenRouter API
$url = 'https://openrouter.ai/api/v1/chat/completions';

$messages = [
    [
        'role' => 'system',
        'content' => $systemMessage
    ],
    [
        'role' => 'user',
        'content' => $prompt
    ]
];

$requestData = [
    'model' => $model,
    'messages' => $messages,
    'max_tokens' => 2000
];

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey,
    'HTTP-Referer: https://onenetly.com', // Update this with your actual domain
    'X-Title: OneNetly Blog Platform'
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

// Send request to OpenRouter API
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    $error = json_decode($response, true);
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['error' => $error['error']['message'] ?? 'Error calling AI API']);
    exit;
}

$responseData = json_decode($response, true);
$completion = $responseData['choices'][0]['message']['content'] ?? '';

// Process the result based on content type
if ($contentType === 'title') {
    // Extract tags if generated
    $tags = [];
    if ($generateTags && preg_match('/TAGS\s*:(.+)$/is', $completion, $matches)) {
        $title = trim(preg_replace('/TAGS\s*:(.+)$/is', '', $completion));
        $tagsText = trim($matches[1]);
        $tagsList = explode(',', $tagsText);
        foreach ($tagsList as $tag) {
            $tag = trim($tag);
            if (!empty($tag)) {
                // Remove any formatting like numbering or bullets
                $tag = preg_replace('/^\d+\.\s*|\*\s*/', '', $tag);
                $tags[] = $tag;
            }
        }
    } else {
        $title = trim($completion);
    }
    
    // Clean up the title by removing any "Title:" prefix
    $title = preg_replace('/^Title\s*:\s*/i', '', $title);
    
    header('Content-Type: application/json');
    echo json_encode([
        'result' => $title,
        'tags' => $tags
    ]);
} elseif ($contentType === 'content') {
    // Extract tags if generated
    $tags = [];
    if ($generateTags && preg_match('/TAGS\s*:(.+)$/is', $completion, $matches)) {
        $content = trim(preg_replace('/TAGS\s*:(.+)$/is', '', $completion));
        $tagsText = trim($matches[1]);
        $tagsList = explode(',', $tagsText);
        foreach ($tagsList as $tag) {
            $tag = trim($tag);
            if (!empty($tag)) {
                // Remove any formatting like numbering or bullets
                $tag = preg_replace('/^\d+\.\s*|\*\s*/', '', $tag);
                $tags[] = $tag;
            }
        }
    } else {
        $content = $completion;
    }
    
    header('Content-Type: application/json');
    echo json_encode([
        'result' => $content,
        'tags' => $tags
    ]);
} else { // both
    // Try to split the title and content
    $parts = explode("\n", $completion, 2);
    $title = trim($parts[0]);
    $content = trim($parts[1] ?? '');
    
    // Clean up the title by removing any "Title:" prefix
    $title = preg_replace('/^Title\s*:\s*/i', '', $title);
    
    // Extract tags if generated
    $tags = [];
    if ($generateTags && preg_match('/TAGS\s*:(.+)$/is', $content, $matches)) {
        $content = trim(preg_replace('/TAGS\s*:(.+)$/is', '', $content));
        $tagsText = trim($matches[1]);
        $tagsList = explode(',', $tagsText);
        foreach ($tagsList as $tag) {
            $tag = trim($tag);
            if (!empty($tag)) {
                // Remove any formatting like numbering or bullets
                $tag = preg_replace('/^\d+\.\s*|\*\s*/', '', $tag);
                $tags[] = $tag;
            }
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode([
        'title' => $title,
        'content' => $content,
        'tags' => $tags
    ]);
}
