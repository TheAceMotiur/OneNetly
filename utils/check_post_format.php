<?php
/**
 * Post Format Diagnostic Utility
 * 
 * This script checks a sample post generation to verify HTML structure
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../services/OpenRouterService.php';

echo "======= Post Format Check =======\n\n";

$topics = [
    'Digital Marketing Trends',
    'Sustainable Living',
    'Machine Learning Applications',
    'Travel Photography Tips',
    'Healthy Cooking Ideas'
];

// Pick a random topic
$randomTopic = $topics[array_rand($topics)];
echo "Generating a test post about: $randomTopic\n\n";

try {
    $service = new OpenRouterService();
    $title = $service->generateTitle($randomTopic);
    $content = $service->generateContent($randomTopic, $title);
    
    echo "Generated title: $title\n\n";
    
    // Check for HTML structure
    echo "Checking HTML structure:\n";
    echo "-------------------------\n";
    
    $checkResults = [
        'h1_tags' => preg_match_all('/<h1[^>]*>/', $content, $matches),
        'h2_tags' => preg_match_all('/<h2[^>]*>/', $content, $matches),
        'h3_tags' => preg_match_all('/<h3[^>]*>/', $content, $matches),
        'p_tags' => preg_match_all('/<p[^>]*>/', $content, $matches),
        'ul_tags' => preg_match_all('/<ul[^>]*>/', $content, $matches),
        'ol_tags' => preg_match_all('/<ol[^>]*>/', $content, $matches),
        'li_tags' => preg_match_all('/<li[^>]*>/', $content, $matches),
        'strong_tags' => preg_match_all('/<strong[^>]*>/', $content, $matches),
        'em_tags' => preg_match_all('/<em[^>]*>/', $content, $matches),
    ];
    
    foreach ($checkResults as $tag => $count) {
        $symbol = ($count > 0) ? '✓' : '✗';
        echo "$symbol $tag: $count\n";
    }
    
    // Create HTML file for inspection
    $htmlContent = '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sample Post: ' . htmlspecialchars($title) . '</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; max-width: 800px; margin: 0 auto; padding: 20px; }
        h1 { color: #2c3e50; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        h2 { color: #3498db; margin-top: 30px; }
        h3 { color: #2980b9; }
        p { margin-bottom: 20px; }
        ul, ol { margin-bottom: 20px; }
        li { margin-bottom: 8px; }
        .content { border: 1px solid #ddd; padding: 20px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Sample Post: ' . htmlspecialchars($title) . '</h1>
    <div class="content">' . $content . '</div>
</body>
</html>';
    
    $htmlFilePath = __DIR__ . '/../sample_post.html';
    file_put_contents($htmlFilePath, $htmlContent);
    
    echo "\nSample post HTML saved to: $htmlFilePath\n";
    echo "Open this file in your browser to see how the post will look.\n\n";
    
    // Output a text preview
    echo "Content preview (first 300 chars):\n";
    echo "--------------------------------\n";
    echo substr(strip_tags($content), 0, 300) . "...\n\n";
    
    echo "HTML structure summary:\n";
    echo "----------------------\n";
    if ($checkResults['h1_tags'] >= 1 && $checkResults['h2_tags'] >= 3 && $checkResults['p_tags'] >= 5) {
        echo "✓ Post has good structure with headings and paragraphs\n";
    } else {
        echo "✗ Post might need better structure (missing headings or paragraphs)\n";
    }
    
    if ($checkResults['ul_tags'] >= 1 || $checkResults['ol_tags'] >= 1) {
        echo "✓ Post includes lists\n";
    } else {
        echo "✗ Post doesn't include any lists\n";
    }
    
    if ($checkResults['strong_tags'] >= 3 || $checkResults['em_tags'] >= 3) {
        echo "✓ Post uses text formatting for emphasis\n";
    } else {
        echo "✗ Post needs more text formatting for emphasis\n";
    }
    
} catch (Exception $e) {
    echo "Error generating test post: " . $e->getMessage() . "\n";
}
