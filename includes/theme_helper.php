<?php

/**
 * Get the current theme class (light, dark, or system-detected)
 * 
 * @return string CSS class name for theme
 */
function getThemeClass()
{
    global $user, $userSettings;
    
    // Default theme is light
    $themeClass = 'theme-light';
    
    // If user is logged in, use their preference
    if ($user->isLoggedIn()) {
        $theme = $userSettings->get('theme', 'light');
        
        // Handle system preference
        if ($theme === 'system') {
            // Check if client sent prefers-color-scheme via JavaScript
            if (isset($_COOKIE['prefers_dark_mode']) && $_COOKIE['prefers_dark_mode'] === '1') {
                $themeClass = 'theme-dark';
            }
        } elseif ($theme === 'dark') {
            $themeClass = 'theme-dark';
        }
    }
    
    return $themeClass;
}

/**
 * Output HTML for theme script that detects system preference
 * 
 * @return string HTML script tag with theme detection logic
 */
function getThemeScript()
{
    ob_start();
?>
<script>
    // Check if user prefers dark mode
    function detectColorScheme() {
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('theme-dark');
            document.documentElement.classList.remove('theme-light');
            document.cookie = "prefers_dark_mode=1; path=/; max-age=31536000"; // 1 year
        } else {
            document.documentElement.classList.add('theme-light');
            document.documentElement.classList.remove('theme-dark');
            document.cookie = "prefers_dark_mode=0; path=/; max-age=31536000";
        }
    }

    // Apply the appropriate theme class
    function applyTheme() {
        const htmlElement = document.documentElement;
        <?php 
        global $user, $userSettings;
        if ($user->isLoggedIn()) {
            $theme = $userSettings->get('theme', 'light');
            echo "const userTheme = '{$theme}';";
        } else {
            echo "const userTheme = 'light';";
        }
        ?>

        if (userTheme === 'dark') {
            htmlElement.classList.add('theme-dark');
            htmlElement.classList.remove('theme-light');
        } else if (userTheme === 'light') {
            htmlElement.classList.add('theme-light');
            htmlElement.classList.remove('theme-dark');
        } else if (userTheme === 'system') {
            detectColorScheme();
            // Listen for changes in color scheme
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', detectColorScheme);
        }
    }

    // Run immediately to prevent flash of wrong theme
    applyTheme();
</script>
<?php
    return ob_get_clean();
}

/**
 * Output HTML for theme stylesheet
 * 
 * @return string CSS for theme styling
 */
function getThemeStyles()
{
    ob_start();
?>
<style>
    :root {
        --background-color: #f9fafb;
        --text-color: #111827;
        --card-background: #ffffff;
        --border-color: #e5e7eb;
    }
    
    :root.theme-dark {
        --background-color: #111827;
        --text-color: #f9fafb;
        --card-background: #1f2937;
        --border-color: #374151;
    }
    
    /* Apply theme variables */
    body.theme-enabled {
        background-color: var(--background-color);
        color: var(--text-color);
        transition: background-color 0.3s, color 0.3s;
    }
    
    .theme-enabled .bg-white {
        background-color: var(--card-background);
    }
    
    .theme-enabled .border,
    .theme-enabled .border-gray-200 {
        border-color: var(--border-color);
    }
    
    .theme-enabled .text-gray-600,
    .theme-enabled .text-gray-700,
    .theme-enabled .text-gray-800,
    .theme-enabled .text-gray-900 {
        color: var(--text-color);
    }
</style>
<?php
    return ob_get_clean();
}

/**
 * Apply theme to the body tag
 * 
 * @return string Additional classes for body tag
 */
function getBodyThemeClass()
{
    return 'theme-enabled ' . getThemeClass();
}
