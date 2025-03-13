<?php
require_once '../includes/init.php';

// Set header for JSON response
header('Content-Type: application/json');

// Check if we have a query parameter
$query = isset($_GET['q']) ? trim($_GET['q']) : '';

// Common tags that might be useful for blog posts
$commonTags = [
    'technology', 'programming', 'web development', 'design', 'marketing', 
    'business', 'productivity', 'science', 'health', 'finance', 
    'education', 'travel', 'food', 'lifestyle', 'sports',
    'art', 'music', 'books', 'movies', 'gaming',
    'ai', 'machine learning', 'data science', 'javascript', 'php',
    'python', 'react', 'vue', 'angular', 'node.js',
    'css', 'html', 'wordpress', 'seo', 'social media',
    'mobile', 'android', 'ios', 'cloud', 'security',
    'cryptocurrency', 'blockchain', 'investing', 'startups', 'entrepreneurship',
    'career', 'self-improvement', 'mental health', 'fitness', 'environment',
    'sustainability', 'climate', 'remote work', 'leadership', 'management',
    'creativity', 'innovation', 'frontend', 'backend', 'full stack',
    'database', 'sql', 'nosql', 'serverless', 'docker', 'kubernetes',
    'devops', 'git', 'coding', 'algorithms', 'data structures'
];

// If there's a query, filter the tags
if (!empty($query)) {
    $filteredTags = array_filter($commonTags, function($tag) use ($query) {
        return stripos($tag, $query) !== false;
    });
    
    // Sort results: exact matches first, then starting with the query, then containing the query
    usort($filteredTags, function($a, $b) use ($query) {
        $aLower = strtolower($a);
        $bLower = strtolower($b);
        $queryLower = strtolower($query);
        
        // Exact matches come first
        if ($aLower === $queryLower && $bLower !== $queryLower) return -1;
        if ($bLower === $queryLower && $aLower !== $queryLower) return 1;
        
        // Then strings starting with the query
        $aStarts = strpos($aLower, $queryLower) === 0;
        $bStarts = strpos($bLower, $queryLower) === 0;
        if ($aStarts && !$bStarts) return -1;
        if ($bStarts && !$aStarts) return 1;
        
        // Then alphabetical order
        return strcmp($a, $b);
    });
} else {
    $filteredTags = $commonTags;
}

// Get frequently used tags from the database
try {
    $stmt = $pdo->prepare("SELECT tags FROM blogs WHERE tags IS NOT NULL AND tags != '' LIMIT 200");
    $stmt->execute();
    $dbTags = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    // Extract individual tags and count occurrences
    $tagCounts = [];
    foreach ($dbTags as $tagString) {
        $tagsArray = explode(',', $tagString);
        foreach ($tagsArray as $tag) {
            $tag = trim($tag);
            if (!empty($tag)) {
                if (!isset($tagCounts[$tag])) {
                    $tagCounts[$tag] = 0;
                }
                $tagCounts[$tag]++;
            }
        }
    }
    
    // Sort by popularity
    arsort($tagCounts);
    
    // Filter out tags already in common list and by query if it exists
    $popularTags = [];
    foreach (array_keys($tagCounts) as $tag) {
        if (!in_array($tag, $commonTags) && (!$query || stripos($tag, $query) !== false)) {
            $popularTags[] = $tag;
        }
    }
    
    // Limit to top 30
    $popularTags = array_slice($popularTags, 0, 30);
    
    // Combine lists with popular tags first, then common tags
    $allTags = array_merge($popularTags, $filteredTags);
    
    // Remove duplicates
    $allTags = array_unique($allTags);
    
    // Limit to 40 results
    $allTags = array_slice($allTags, 0, 40);
    
} catch (PDOException $e) {
    // If there's an error, just use the filtered common tags
    $allTags = $filteredTags;
}

// Return JSON response
echo json_encode([
    'tags' => $allTags
]);
?>
