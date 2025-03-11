<?php
/**
 * Comment configuration file
 * Contains settings for comment moderation, bad words filtering, etc.
 */

// Bad words to filter in comments
// Add or remove words from this array to update the filter
$comment_bad_words = [
    'fuck', 'shit', 'ass', 'bitch', 'bastard', 'damn', 'cunt', 
    'dick', 'cock', 'pussy', 'slut', 'whore', 'twat', 'piss'
];

// Comment approval settings
$comment_settings = [
    // Should links be automatically marked as nofollow?
    'add_nofollow_to_links' => true,
    
    // Should comments with links be auto-approved or require moderation?
    'comments_with_links_require_moderation' => true,
    
    // Maximum number of links allowed in a comment before it's marked as spam
    'max_links_before_spam' => 3,
    
    // Should comments be checked for bad words?
    'filter_bad_words' => true
];
