<?php

/**
 * Format a date string
 * 
 * @param string $dateStr The date string to format
 * @param string $format The format to use (default: 'F j, Y')
 * @return string
 */
function formatDate($dateStr, $format = 'F j, Y') {
    $date = new DateTime($dateStr);
    return $date->format($format);
}

/**
 * Create excerpt from content
 * 
 * @param string $content The content to create excerpt from
 * @param int $length The maximum length of the excerpt
 * @return string
 */
function createExcerpt($content, $length = 150) {
    // Strip HTML tags
    $text = strip_tags($content);
    
    // Truncate text
    if (strlen($text) > $length) {
        $text = substr($text, 0, $length);
        $text = substr($text, 0, strrpos($text, ' '));
        $text .= '...';
    }
    
    return $text;
}

/**
 * Calculate estimated reading time in minutes
 * 
 * @param string $content The content to analyze
 * @return int Estimated reading time in minutes
 */
function calculateReadingTime($content) {
    $wordCount = str_word_count(strip_tags($content));
    return ceil($wordCount / 200);
}

/**
 * Generate pagination links
 * 
 * @param int $currentPage The current page
 * @param int $totalPages The total number of pages
 * @param string $baseUrl The base URL for pagination links
 * @return string
 */
function getPagination($currentPage, $totalPages, $baseUrl) {
    if ($totalPages <= 1) {
        return '';
    }
    
    $html = '<div class="flex justify-center my-8">
        <nav class="inline-flex rounded shadow-sm">';
    
    // Previous page link
    if ($currentPage > 1) {
        $prevUrl = $baseUrl . '?page=' . ($currentPage - 1);
        $html .= '<a href="' . $prevUrl . '" class="px-3 py-2 bg-white text-gray-700 hover:bg-gray-50 border border-gray-300 rounded-l-md">Previous</a>';
    } else {
        $html .= '<span class="px-3 py-2 bg-gray-100 text-gray-400 border border-gray-300 rounded-l-md">Previous</span>';
    }
    
    // Page numbers
    $start = max(1, $currentPage - 2);
    $end = min($totalPages, $currentPage + 2);
    
    if ($start > 1) {
        $html .= '<a href="' . $baseUrl . '?page=1" class="px-3 py-2 bg-white text-gray-700 hover:bg-gray-50 border border-gray-300">1</a>';
        if ($start > 2) {
            $html .= '<span class="px-3 py-2 bg-white border border-gray-300">...</span>';
        }
    }
    
    for ($i = $start; $i <= $end; $i++) {
        if ($i == $currentPage) {
            $html .= '<span class="px-3 py-2 bg-blue-500 text-white border border-blue-500">' . $i . '</span>';
        } else {
            $html .= '<a href="' . $baseUrl . '?page=' . $i . '" class="px-3 py-2 bg-white text-gray-700 hover:bg-gray-50 border border-gray-300">' . $i . '</a>';
        }
    }
    
    if ($end < $totalPages) {
        if ($end < $totalPages - 1) {
            $html .= '<span class="px-3 py-2 bg-white border border-gray-300">...</span>';
        }
        $html .= '<a href="' . $baseUrl . '?page=' . $totalPages . '" class="px-3 py-2 bg-white text-gray-700 hover:bg-gray-50 border border-gray-300">' . $totalPages . '</a>';
    }
    
    // Next page link
    if ($currentPage < $totalPages) {
        $nextUrl = $baseUrl . '?page=' . ($currentPage + 1);
        $html .= '<a href="' . $nextUrl . '" class="px-3 py-2 bg-white text-gray-700 hover:bg-gray-50 border border-gray-300 rounded-r-md">Next</a>';
    } else {
        $html .= '<span class="px-3 py-2 bg-gray-100 text-gray-400 border border-gray-300 rounded-r-md">Next</span>';
    }
    
    $html .= '</nav></div>';
    
    return $html;
}
