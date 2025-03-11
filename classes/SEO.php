<?php

class SEO {
    private $pdo;
    private $title;
    private $description;
    private $keywords;
    private $author;
    private $ogImage;
    private $ogType;
    private $canonicalURL;
    private $structuredData;
    private $siteConfig;
    private $extraMetaTags = [];
    
    /**
     * Constructor
     * 
     * @param PDO $pdo PDO database connection
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->loadSiteConfig();
    }
    
    /**
     * Load site configuration from database
     */
    private function loadSiteConfig() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM site_config LIMIT 1");
            $this->siteConfig = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // If table doesn't exist or other DB error
            $this->siteConfig = [
                'site_name' => 'OneNetly',
                'site_description' => 'A modern content management system',
                'site_keywords' => 'CMS, blog, content management'
            ];
        }
    }
    
    /**
     * Set page title
     * 
     * @param string $title The page title
     * @return SEO
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }
    
    /**
     * Set meta description
     * 
     * @param string $description The meta description
     * @return SEO
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }
    
    /**
     * Set meta keywords
     * 
     * @param string|array $keywords The meta keywords
     * @return SEO
     */
    public function setKeywords($keywords) {
        if (is_array($keywords)) {
            $keywords = implode(', ', $keywords);
        }
        $this->keywords = $keywords;
        return $this;
    }
    
    /**
     * Set document author
     * 
     * @param string $author The document author
     * @return SEO
     */
    public function setAuthor($author) {
        $this->author = $author;
        return $this;
    }
    
    /**
     * Set Open Graph image
     * 
     * @param string $image URL to the image
     * @return SEO
     */
    public function setOgImage($image) {
        $this->ogImage = $image;
        return $this;
    }
    
    /**
     * Set Open Graph content type
     * 
     * @param string $type Content type (article, website, etc.)
     * @return SEO
     */
    public function setOgType($type) {
        $this->ogType = $type;
        return $this;
    }
    
    /**
     * Set canonical URL
     * 
     * @param string $url The canonical URL
     * @return SEO
     */
    public function setCanonicalUrl($url) {
        $this->canonicalURL = $url;
        return $this;
    }
    
    /**
     * Set structured data (JSON-LD)
     * 
     * @param array $data Structured data array
     * @return SEO
     */
    public function setStructuredData($data) {
        $this->structuredData = $data;
        return $this;
    }
    
    /**
     * Generate structured data for a blog post
     * 
     * @param array $post Post data
     * @return SEO
     */
    public function generateBlogPostSchema($post) {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => isset($post['title']) ? $post['title'] : '',
            'description' => isset($post['excerpt']) ? $post['excerpt'] : '',
            'datePublished' => isset($post['created_at']) ? date(DATE_ISO8601, strtotime($post['created_at'])) : '',
            'dateModified' => isset($post['updated_at']) ? date(DATE_ISO8601, strtotime($post['updated_at'])) : '',
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => isset($post['slug']) ? (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" . $post['slug'] : ''
            ]
        ];
        
        // Add author if available
        if (isset($post['username'])) {
            $data['author'] = [
                '@type' => 'Person',
                'name' => $post['username']
            ];
        }
        
        // Add featured image if available
        if (!empty($post['featured_image'])) {
            $data['image'] = [
                '@type' => 'ImageObject',
                'url' => $post['featured_image'],
                'width' => '1200',
                'height' => '630'
            ];
        }
        
        // Add publisher if available
        if (!empty($this->siteConfig['site_name'])) {
            $data['publisher'] = [
                '@type' => 'Organization',
                'name' => $this->siteConfig['site_name'],
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/assets/images/logo.png",
                    'width' => '600',
                    'height' => '60'
                ]
            ];
        }
        
        $this->structuredData = $data;
        return $this;
    }
    
    /**
     * Add a custom meta tag
     * 
     * @param string $name Name of meta tag
     * @param string $content Content of meta tag
     * @return SEO
     */
    public function addMetaTag($name, $content) {
        $this->extraMetaTags[$name] = $content;
        return $this;
    }
    
    /**
     * Generate HTML for hreflang tags
     * 
     * @param array $languages Array of language code => URL pairs
     * @return SEO
     */
    public function setHreflangTags($languages) {
        foreach ($languages as $lang => $url) {
            $this->extraMetaTags['hreflang_'.$lang] = '<link rel="alternate" hreflang="' . htmlspecialchars($lang) . '" href="' . htmlspecialchars($url) . '">';
        }
        return $this;
    }
    
    /**
     * Set default sharing image
     * 
     * @return SEO
     */
    public function setDefaultOgImage() {
        if (empty($this->ogImage)) {
            // Use default image from config or a hardcoded fallback
            $defaultImage = !empty($this->siteConfig['default_og_image']) 
                ? $this->siteConfig['default_og_image'] 
                : (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/assets/images/default-og-image.jpg";
                
            $this->ogImage = $defaultImage;
        }
        return $this;
    }
    
    /**
     * Add article-specific meta tags
     * 
     * @param array $post Post data
     * @return SEO
     */
    public function addArticleTags($post) {
        if ($this->ogType == 'article') {
            // Add article publish and modified dates
            if (!empty($post['created_at'])) {
                $this->extraMetaTags['article:published_time'] = '<meta property="article:published_time" content="' . date(DATE_ISO8601, strtotime($post['created_at'])) . '">';
            }
            if (!empty($post['updated_at'])) {
                $this->extraMetaTags['article:modified_time'] = '<meta property="article:modified_time" content="' . date(DATE_ISO8601, strtotime($post['updated_at'])) . '">';
            }
            
            // Add article tags as article:tag
            if (!empty($post['tags'])) {
                $tags = explode(',', $post['tags']);
                foreach ($tags as $index => $tag) {
                    $tag = trim($tag);
                    if (!empty($tag)) {
                        $this->extraMetaTags['article:tag_'.$index] = '<meta property="article:tag" content="' . htmlspecialchars($tag) . '">';
                    }
                }
            }
        }
        return $this;
    }
    
    /**
     * Generate HTML meta tags for head section
     * 
     * @return string HTML for meta tags
     */
    public function generateMetaTags() {
        $output = '';
        
        // Title tag with site name
        $title = $this->title ?? $this->siteConfig['site_name'] ?? 'OneNetly';
        if (!empty($this->siteConfig['site_name']) && $this->title !== $this->siteConfig['site_name']) {
            $title .= ' - ' . $this->siteConfig['site_name'];
        }
        $output .= "<title>" . htmlspecialchars($title) . "</title>\n";
        
        // Meta description
        $description = $this->description ?? $this->siteConfig['site_description'] ?? '';
        if (!empty($description)) {
            $output .= '<meta name="description" content="' . htmlspecialchars($description) . '">' . "\n";
        }
        
        // Meta keywords
        $keywords = $this->keywords ?? $this->siteConfig['site_keywords'] ?? '';
        if (!empty($keywords)) {
            $output .= '<meta name="keywords" content="' . htmlspecialchars($keywords) . '">' . "\n";
        }
        
        // Author
        if (!empty($this->author)) {
            $output .= '<meta name="author" content="' . htmlspecialchars($this->author) . '">' . "\n";
        }
        
        // Canonical URL
        if (!empty($this->canonicalURL)) {
            $output .= '<link rel="canonical" href="' . htmlspecialchars($this->canonicalURL) . '">' . "\n";
        }
        
        // Open Graph tags
        $output .= '<meta property="og:title" content="' . htmlspecialchars($title) . '">' . "\n";
        if (!empty($description)) {
            $output .= '<meta property="og:description" content="' . htmlspecialchars($description) . '">' . "\n";
        }
        if (!empty($this->canonicalURL)) {
            $output .= '<meta property="og:url" content="' . htmlspecialchars($this->canonicalURL) . '">' . "\n";
        }
        $output .= '<meta property="og:site_name" content="' . htmlspecialchars($this->siteConfig['site_name'] ?? 'OneNetly') . '">' . "\n";
        
        // OG Image
        if (!empty($this->ogImage)) {
            $output .= '<meta property="og:image" content="' . htmlspecialchars($this->ogImage) . '">' . "\n";
            $output .= '<meta property="og:image:width" content="1200">' . "\n";
            $output .= '<meta property="og:image:height" content="630">' . "\n";
        }
        
        // OG Type
        $ogType = $this->ogType ?? 'website';
        $output .= '<meta property="og:type" content="' . htmlspecialchars($ogType) . '">' . "\n";
        
        // Twitter Card
        $output .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
        $output .= '<meta name="twitter:title" content="' . htmlspecialchars($title) . '">' . "\n";
        if (!empty($description)) {
            $output .= '<meta name="twitter:description" content="' . htmlspecialchars($description) . '">' . "\n";
        }
        if (!empty($this->ogImage)) {
            $output .= '<meta name="twitter:image" content="' . htmlspecialchars($this->ogImage) . '">' . "\n";
        }
        
        // Extra meta tags
        foreach ($this->extraMetaTags as $name => $content) {
            // If content is a complete HTML tag (starts with < and ends with >)
            if (substr($content, 0, 1) === '<' && substr($content, -1) === '>') {
                $output .= $content . "\n";
            } else {
                $output .= '<meta name="' . htmlspecialchars($name) . '" content="' . htmlspecialchars($content) . '">' . "\n";
            }
        }
        
        // Structured Data (JSON-LD)
        if (!empty($this->structuredData)) {
            $output .= '<script type="application/ld+json">' . "\n";
            $output .= json_encode($this->structuredData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
            $output .= "\n</script>\n";
        }
        
        return $output;
    }
    
    /**
     * Create URL slug from string
     * 
     * @param string $string String to convert to slug
     * @return string SEO-friendly URL slug
     */
    public static function createSlug($string) {
        // Convert to lowercase
        $string = strtolower($string);
        
        // Replace non-alphanumeric characters with hyphens
        $string = preg_replace('/[^a-z0-9]+/', '-', $string);
        
        // Remove leading/trailing hyphens
        $string = trim($string, '-');
        
        return $string;
    }
    
    /**
     * Get current URL with protocol and host
     * 
     * @return string Current URL
     */
    public static function getCurrentUrl() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI'];
        
        return $protocol . '://' . $host . $uri;
    }
    
    /**
     * Generate breadcrumb schema markup
     * 
     * @param array $breadcrumbs Array of label => url pairs
     * @return SEO
     */
    public function generateBreadcrumbSchema($breadcrumbs) {
        if (empty($breadcrumbs)) {
            return $this;
        }
        
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => []
        ];
        
        // Add home as first item if not present
        $breadcrumbsList = [
            'Home' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/"
        ];
        
        // Add user-provided breadcrumbs
        foreach ($breadcrumbs as $label => $url) {
            if (!empty($url)) {
                $breadcrumbsList[$label] = $url;
            }
        }
        
        $position = 1;
        foreach ($breadcrumbsList as $label => $url) {
            $item = [
                '@type' => 'ListItem',
                'position' => $position,
                'name' => $label
            ];
            
            // Add URL if it exists
            if (!empty($url)) {
                // Convert relative URLs to absolute
                if (substr($url, 0, 1) === '/' || substr($url, 0, 4) !== 'http') {
                    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" . ltrim($url, '/');
                }
                $item['item'] = $url;
            }
            
            $data['itemListElement'][] = $item;
            $position++;
        }
        
        // If there's already structured data, store it to merge later
        $existingData = $this->structuredData;
        
        // Set the breadcrumb schema
        $this->structuredData = $data;
        
        // If there was existing data, add it to page as another script
        if (!empty($existingData)) {
            $this->extraMetaTags['structured_data_extra'] = '<script type="application/ld+json">' . json_encode($existingData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
        }
        
        return $this;
    }
    
    /**
     * Generate schema for FAQ page
     * 
     * @param array $faqs Array of question => answer pairs
     * @return SEO
     */
    public function generateFaqSchema($faqs) {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => []
        ];
        
        foreach ($faqs as $question => $answer) {
            $data['mainEntity'][] = [
                '@type' => 'Question',
                'name' => $question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $answer
                ]
            ];
        }
        
        $this->structuredData = $data;
        return $this;
    }
}
