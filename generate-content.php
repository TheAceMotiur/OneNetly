<?php
require_once 'includes/init.php';

// If user is not logged in, return error
if (!$user->isLoggedIn()) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Please login to use AI writer']);
    exit;
}

// Only handle POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Get the input data
$data = json_decode(file_get_contents('php://input'), true);
$topic = $data['topic'] ?? '';
$model = $data['model'] ?? 'mistralai/mistral-7b-instruct';

// Validate input
if (empty($topic)) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Please provide a topic']);
    exit;
}

// Format the prompt
$prompt = <<<EOT
Write a blog post about {$topic}. Generate:
1. An engaging title
2. At least 3 relevant tags (comma-separated)
3. Well-structured article content with proper paragraphs and headings (in HTML format)

Format the response as JSON with these fields:
{
    "title": "The generated title",
    "tags": "tag1, tag2, tag3",
    "content": "The HTML formatted content"
}
EOT;

try {
    // Initialize the AI service
    $ai = new AI($config['ai_api_key'], $model);
    
    // Generate the content
    $response = $ai->generate($prompt);
    
    // Try to decode the response as JSON
    $result = json_decode($response, true);
    
    // If JSON decode fails, try to extract content using regex
    if (json_last_error() !== JSON_ERROR_NONE) {
        // Fallback parsing for non-JSON responses
        preg_match('/"title":\s*"([^"]+)"/', $response, $titleMatch);
        preg_match('/"tags":\s*"([^"]+)"/', $response, $tagsMatch);
        preg_match('/"content":\s*"(.*?)"\s*}$/s', $response, $contentMatch);
        
        $result = [
            'title' => $titleMatch[1] ?? '',
            'tags' => $tagsMatch[1] ?? '',
            'content' => $contentMatch[1] ?? $response
        ];
    }
    
    // Clean and format the response
    $formattedResponse = [
        'success' => true,
        'data' => [
            'title' => trim(str_replace('"', '', $result['title'] ?? '')), // Remove any quotes
            'tags' => trim($result['tags'] ?? ''),
            'content' => trim($result['content'] ?? '')
        ]
    ];
    
    header('Content-Type: application/json');
    echo json_encode($formattedResponse);
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Failed to generate content: ' . $e->getMessage()
    ]);
}
