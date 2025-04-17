<?php

require_once __DIR__ . '/../models/ApiKey.php';

class OpenRouterService
{
    private $apiKeyModel;
    private $baseUrl = 'https://openrouter.ai/api/v1/chat/completions';
    
    public function __construct() {
        $this->apiKeyModel = new ApiKey();
    }
    
    public function generateContent($prompt, $topic, $maxTokens = 1500) {
        $apiKey = $this->getApiKey();
        if (!$apiKey) {
            throw new Exception('No API keys available for OpenRouter. Please check your configuration.');
        }
        
        // Enhanced prompt for Medium-like structured content
        $data = [
            'model' => 'meta-llama/llama-4-maverick:free', // You can change this to your preferred model
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a professional Medium.com writer who creates elegant, well-structured blog posts with a clean, minimalist style. Your posts must include:
                    1. A clear HTML structure with proper heading hierarchy (h1 for title, h2 for main sections, h3 for subsections)
                    2. Short, digestible paragraphs (2-3 sentences each) with ample spacing between sections
                    3. Strategic use of lists, blockquotes, and emphasis to break up text walls
                    4. Bold for important concepts and keywords (use sparingly for impact)
                    5. At least 5-6 distinct sections with descriptive, engaging headings
                    6. A storytelling approach that engages readers
                    7. Concise sentences with minimal jargon
                    8. Short, punchy paragraphs to maintain reader interest
                    9. An FAQ section near the end to answer common questions
                    
                    Format your response with clean HTML tags. Aim for a Medium-like aesthetic: clean, minimal, focused on readability with proper semantic structure.'
                ],
                [
                    'role' => 'user',
                    'content' => "Write an engaging, Medium-style blog post about \"$topic\". 

                    Include:
                    - A compelling introduction with a hook that draws readers in
                    - At least 5 well-structured sections with descriptive headings
                    - Short, crisp paragraphs (2-3 sentences maximum)
                    - Strategic use of formatting for emphasis
                    - A powerful quote or insight highlighted in a blockquote
                    - Both bullet points and numbered lists to improve readability
                    - A FAQ section with 3-4 common questions about the topic
                    - A thoughtful conclusion with a call to action
                    
                    Make the content feel conversational yet authoritative, like a Medium article. Use proper white space and formatting for optimal reading experience."
                ]
            ],
            'max_tokens' => $maxTokens
        ];
        
        // Initialize cURL session
        $ch = curl_init($this->baseUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey['key'],
            'HTTP-Referer: https://yourblog.com',
            'X-Title: Blog Content Generator'
        ]);
        
        // Execute cURL request
        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        // Update API key usage count
        $this->apiKeyModel->updateUsage($apiKey['id']);
        
        if ($statusCode === 200) {
            $responseData = json_decode($response, true);
            if (isset($responseData['choices'][0]['message']['content'])) {
                $content = $responseData['choices'][0]['message']['content'];
                
                // Post-process content to ensure proper Medium-like HTML structure
                $content = $this->ensureMediumStyleFormatting($content);
                
                return $content;
            }
        }
        
        // If there was an error, throw an exception
        throw new Exception('Failed to generate content: ' . $response);
    }
    
    /**
     * Ensure the content has proper Medium-style HTML structure and formatting
     * 
     * @param string $content The raw content from the API
     * @return string Properly formatted HTML content
     */
    private function ensureMediumStyleFormatting($content) {
        // Make sure h1, h2, h3 tags are properly formatted
        $content = preg_replace('/# (.*?)(\n|$)/', '<h1>$1</h1>$2', $content);
        $content = preg_replace('/## (.*?)(\n|$)/', '<h2>$1</h2>$2', $content);
        $content = preg_replace('/### (.*?)(\n|$)/', '<h3>$1</h3>$2', $content);
        
        // Convert markdown-style bold to HTML bold if not already HTML
        if (strpos($content, '<strong>') === false) {
            $content = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $content);
        }
        
        // Convert markdown-style italic to HTML italic if not already HTML
        if (strpos($content, '<em>') === false) {
            $content = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $content);
        }
        
        // Convert markdown-style blockquotes to styled blockquotes
        $content = preg_replace('/> (.*?)(\n|$)/', '<blockquote>$1</blockquote>$2', $content);
        
        // Ensure paragraphs are wrapped in p tags with proper spacing
        if (strpos($content, '<p') === false) {
            $paragraphs = explode("\n\n", $content);
            $formattedContent = '';
            
            foreach ($paragraphs as $paragraph) {
                // Skip if already contains HTML tags or is empty
                if (empty(trim($paragraph)) || strpos($paragraph, '<') !== false) {
                    $formattedContent .= $paragraph . "\n\n";
                    continue;
                }
                
                // Wrap in paragraph tags
                $formattedContent .= "<p>" . trim($paragraph) . "</p>\n\n";
            }
            
            $content = $formattedContent;
        }
        
        // Process FAQ sections if they exist
        if (stripos($content, '<h2>faq</h2>') !== false || 
            stripos($content, '<h2>frequently asked questions</h2>') !== false ||
            stripos($content, '<h2>common questions</h2>') !== false) {
            
            // Find the FAQ section
            $pattern = '/<h2>(FAQ|Frequently Asked Questions|Common Questions)[^<]*<\/h2>(.*?)(<h2|$)/is';
            if (preg_match($pattern, $content, $matches)) {
                $faqHeading = $matches[1];
                $faqContent = $matches[2];
                $afterFaq = $matches[3];
                
                // Extract questions and answers
                $questionPattern = '/<h3>(.*?)<\/h3>\s*<p>(.*?)<\/p>/is';
                preg_match_all($questionPattern, $faqContent, $qaMatches, PREG_SET_ORDER);
                
                // Build FAQ section with proper formatting
                $newFaqSection = "<h2>$faqHeading</h2>\n<div class=\"faq-section\">\n";
                
                foreach ($qaMatches as $qa) {
                    $question = $qa[1];
                    $answer = $qa[2];
                    
                    $newFaqSection .= "  <div class=\"faq-item\">\n";
                    $newFaqSection .= "    <h3>$question</h3>\n";
                    $newFaqSection .= "    <p>$answer</p>\n";
                    $newFaqSection .= "  </div>\n";
                }
                
                $newFaqSection .= "</div>\n";
                
                // Replace the original FAQ section
                $content = str_replace($matches[0], $newFaqSection . $afterFaq, $content);
            }
        }
        
        // Add a class to blockquotes for styling
        $content = preg_replace('/<blockquote>/i', '<blockquote class="pullquote">', $content);
        
        return $content;
    }
    
    public function generateKeywords($topic, $count = 5) {
        $apiKey = $this->getApiKey();
        if (!$apiKey) {
            throw new Exception('No API keys available for OpenRouter. Please check your configuration.');
        }
        
        // Define the request body
        $data = [
            'model' => 'meta-llama/llama-4-maverick:free',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are an SEO expert. Generate relevant keywords separated by commas.'
                ],
                [
                    'role' => 'user',
                    'content' => "Generate $count relevant SEO keywords for a blog post about \"$topic\". Return only comma-separated keywords, no explanations."
                ]
            ],
            'max_tokens' => 100
        ];
        
        // Initialize cURL session
        $ch = curl_init($this->baseUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey['key'],
            'HTTP-Referer: https://yourblog.com',
            'X-Title: Keyword Generator'
        ]);
        
        // Execute cURL request
        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        // Update API key usage count
        $this->apiKeyModel->updateUsage($apiKey['id']);
        
        if ($statusCode === 200) {
            $responseData = json_decode($response, true);
            if (isset($responseData['choices'][0]['message']['content'])) {
                return $responseData['choices'][0]['message']['content'];
            }
        }
        
        // If there was an error, throw an exception
        throw new Exception('Failed to generate keywords: ' . $response);
    }
    
    public function generateTitle($topic) {
        $apiKey = $this->getApiKey();
        if (!$apiKey) {
            throw new Exception('No API keys available for OpenRouter. Please check your configuration.');
        }
        
        // Define the request body
        $data = [
            'model' => 'meta-llama/llama-4-maverick:free',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a professional blog title creator. Create catchy but informative titles.'
                ],
                [
                    'role' => 'user',
                    'content' => "Create a catchy, SEO-friendly blog post title for an article about \"$topic\". Return only the title, no explanations."
                ]
            ],
            'max_tokens' => 50
        ];
        
        // Initialize cURL session
        $ch = curl_init($this->baseUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey['key'],
            'HTTP-Referer: https://yourblog.com',
            'X-Title: Title Generator'
        ]);
        
        // Execute cURL request
        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        // Update API key usage count
        $this->apiKeyModel->updateUsage($apiKey['id']);
        
        if ($statusCode === 200) {
            $responseData = json_decode($response, true);
            if (isset($responseData['choices'][0]['message']['content'])) {
                return trim($responseData['choices'][0]['message']['content'], " \t\n\r\0\x0B\"'");
            }
        }
        
        // If there was an error, throw an exception
        throw new Exception('Failed to generate title: ' . $response);
    }
    
    private function getApiKey() {
        $apiKey = $this->apiKeyModel->getNextAvailableKey('openrouter');
        
        if (!$apiKey && defined('OPENROUTER_API_KEYS') && !empty(OPENROUTER_API_KEYS)) {
            // Try direct import from config if DB lookup failed
            if (is_array(OPENROUTER_API_KEYS) && count(OPENROUTER_API_KEYS) > 0) {
                foreach (OPENROUTER_API_KEYS as $key) {
                    if (!empty($key)) {
                        try {
                            $this->apiKeyModel->add('openrouter', $key);
                            error_log("Added OpenRouter API key from config directly");
                        } catch (Exception $e) {
                            error_log("Failed to add OpenRouter API key: " . $e->getMessage());
                        }
                    }
                }
                // Try again after import
                $apiKey = $this->apiKeyModel->getNextAvailableKey('openrouter');
            }
        }
        
        return $apiKey;
    }
}
