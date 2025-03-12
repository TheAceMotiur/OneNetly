<?php

class Blog {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    /**
     * Get all blogs with pagination
     * 
     * @param int $page Page number
     * @param int $limit Items per page
     * @param string $status Filter by status (published, draft or all)
     * @param string $orderBy Column to order by (created_at or updated_at)
     * @return array Blogs and pagination info
     */
    public function getAllBlogs($page = 1, $limit = 10, $status = 'published', $orderBy = 'created_at') {
        $offset = ($page - 1) * $limit;
        
        $whereClause = $status !== 'all' ? "WHERE b.status = :status" : "";
        
        // Validate orderBy to prevent SQL injection
        $validOrderColumns = ['created_at', 'updated_at'];
        $orderByColumn = in_array($orderBy, $validOrderColumns) ? $orderBy : 'created_at';
        
        // Count total blogs for pagination
        $countSql = "SELECT COUNT(*) FROM blogs b $whereClause";
        $countStmt = $this->pdo->prepare($countSql);
        
        if ($status !== 'all') {
            $countStmt->bindParam(':status', $status, PDO::PARAM_STR);
        }
        
        $countStmt->execute();
        $total = $countStmt->fetchColumn();
        
        // Get blogs for current page
        $sql = "SELECT b.*, u.username FROM blogs b 
                LEFT JOIN users u ON b.user_id = u.id 
                $whereClause 
                ORDER BY b.$orderByColumn DESC 
                LIMIT :limit OFFSET :offset";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        
        if ($status !== 'all') {
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        }
        
        $stmt->execute();
        $blogs = $stmt->fetchAll();
        
        // Calculate pagination info
        $totalPages = ceil($total / $limit);
        $hasNextPage = $page < $totalPages;
        $hasPrevPage = $page > 1;
        
        return [
            'blogs' => $blogs,
            'pagination' => [
                'total' => $total,
                'per_page' => $limit,
                'current_page' => $page,
                'last_page' => $totalPages,
                'from' => $offset + 1,
                'to' => min($offset + $limit, $total),
                'has_more_pages' => $hasNextPage,
                'has_prev_pages' => $hasPrevPage
            ]
        ];
    }
    
    /**
     * Get blog by ID
     * 
     * @param int $id Blog ID
     * @return array|false Blog data or false if not found
     */
    public function getBlogById($id) {
        $sql = "SELECT b.*, u.username FROM blogs b 
                LEFT JOIN users u ON b.user_id = u.id 
                WHERE b.id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    /**
     * Get blog by slug
     * 
     * @param string $slug Blog slug
     * @return array|false Blog data or false if not found
     */
    public function getBlogBySlug($slug) {
        $sql = "SELECT b.*, u.username FROM blogs b 
                LEFT JOIN users u ON b.user_id = u.id 
                WHERE b.slug = :slug";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    /**
     * Create a new blog post
     * 
     * @param array $data Blog data
     * @return array Result with success status and message
     */
    public function createBlog($data) {
        // Generate slug from title
        $slug = $this->createSlug($data['title']);
        
        try {
            $sql = "INSERT INTO blogs 
                    (user_id, title, slug, content, featured_image, status) 
                    VALUES 
                    (:user_id, :title, :slug, :content, :featured_image, :status)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT);
            $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
            $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
            $stmt->bindParam(':content', $data['content'], PDO::PARAM_STR);
            $stmt->bindParam(':featured_image', $data['featured_image'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $data['status'], PDO::PARAM_STR);
            
            $stmt->execute();
            $blogId = $this->pdo->lastInsertId();
            
            // Add categories if provided
            if (!empty($data['categories'])) {
                $this->updateBlogCategories($blogId, $data['categories']);
            }
            
            return [
                'success' => true,
                'message' => 'Blog post created successfully',
                'blog_id' => $blogId
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Failed to create blog post: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Update an existing blog post
     * 
     * @param int $id Blog ID
     * @param array $data Blog data
     * @return array Result with success status and message
     */
    public function updateBlog($id, $data) {
        try {
            // If title changed, update slug
            if (isset($data['title'])) {
                $blog = $this->getBlogById($id);
                if ($blog && $blog['title'] != $data['title']) {
                    $data['slug'] = $this->createSlug($data['title']);
                }
            }
            
            $sql = "UPDATE blogs SET ";
            $params = [];
            
            foreach ($data as $key => $value) {
                if ($key !== 'categories' && $key !== 'user_id') {  // Skip categories, handle separately
                    $sql .= "$key = :$key, ";
                    $params[":$key"] = $value;
                }
            }
            
            $sql = rtrim($sql, ', ');
            $sql .= " WHERE id = :id";
            $params[':id'] = $id;
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            
            // Update categories if provided
            if (isset($data['categories'])) {
                $this->updateBlogCategories($id, $data['categories']);
            }
            
            return [
                'success' => true,
                'message' => 'Blog post updated successfully'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Failed to update blog post: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Delete a blog post
     * 
     * @param int $id Blog ID
     * @return array Result with success status and message
     */
    public function deleteBlog($id) {
        try {
            $sql = "DELETE FROM blogs WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return [
                'success' => true,
                'message' => 'Blog post deleted successfully'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Failed to delete blog post: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Create a unique slug from a string
     * 
     * @param string $title The title to convert to slug
     * @return string The unique slug
     */
    private function createSlug($title) {
        // Convert to lowercase and replace spaces with hyphens
        $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $title), '-'));
        
        // Check if slug exists
        $sql = "SELECT COUNT(*) FROM blogs WHERE slug = :slug";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
        $stmt->execute();
        
        $count = $stmt->fetchColumn();
        
        // If slug exists, append a number
        if ($count > 0) {
            $i = 1;
            do {
                $newSlug = $slug . '-' . $i++;
                $stmt->bindParam(':slug', $newSlug, PDO::PARAM_STR);
                $stmt->execute();
                $count = $stmt->fetchColumn();
            } while ($count > 0);
            
            $slug = $newSlug;
        }
        
        return $slug;
    }
    
    /**
     * Update categories for a blog post
     * 
     * @param int $blogId Blog ID
     * @param array $categoryIds Array of category IDs
     */
    private function updateBlogCategories($blogId, $categoryIds) {
        // Remove existing categories
        $sql = "DELETE FROM blog_category WHERE blog_id = :blog_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
        $stmt->execute();
        
        // Add new categories
        $sql = "INSERT INTO blog_category (blog_id, category_id) VALUES (:blog_id, :category_id)";
        $stmt = $this->pdo->prepare($sql);
        
        foreach ($categoryIds as $categoryId) {
            $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
            $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
    
    /**
     * Get blog categories
     * 
     * @param int $blogId Blog ID
     * @return array Categories
     */
    public function getBlogCategories($blogId) {
        $sql = "SELECT c.* FROM categories c 
                JOIN blog_category bc ON c.id = bc.category_id 
                WHERE bc.blog_id = :blog_id";
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    /**
     * Get categories for a specific blog post
     * 
     * @param int $blogId Blog post ID
     * @return array Categories for the post
     */
    public function getCategoriesForPost($blogId) {
        // This method serves as an alias for getBlogCategories for better readability
        return $this->getBlogCategories($blogId);
    }
    
    /**
     * Record a view for a blog post
     * 
     * @param int $blogId Blog post ID
     * @return bool Success status
     */
    public function recordView($blogId) {
        try {
            // Get client IP address
            $ipAddress = $_SERVER['REMOTE_ADDR'];
            $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? null;
            
            // Check if this IP has viewed this post in the last 24 hours
            $sql = "SELECT COUNT(*) FROM blog_views 
                    WHERE blog_id = :blog_id 
                    AND ip_address = :ip_address 
                    AND viewed_at > DATE_SUB(NOW(), INTERVAL 24 HOUR)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
            $stmt->bindParam(':ip_address', $ipAddress, PDO::PARAM_STR);
            $stmt->execute();
            
            $viewCount = $stmt->fetchColumn();
            
            // If already viewed in last 24 hours, don't record another view
            if ($viewCount > 0) {
                return false;
            }
            
            // Insert the view
            $sql = "INSERT INTO blog_views (blog_id, ip_address, user_agent) 
                    VALUES (:blog_id, :ip_address, :user_agent)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
            $stmt->bindParam(':ip_address', $ipAddress, PDO::PARAM_STR);
            $stmt->bindParam(':user_agent', $userAgent, PDO::PARAM_STR);
            $stmt->execute();
            
            return true;
        } catch (PDOException $e) {
            // Silently fail - views are non-critical
            return false;
        }
    }
    
    /**
     * Alias for recordView - track a view for a blog post
     * 
     * @param int $blogId Blog post ID
     * @return bool Success status
     */
    public function trackPostView($blogId) {
        // This is just an alias for recordView for backward compatibility
        return $this->recordView($blogId);
    }
    
    /**
     * Get trending blog posts based on views in the past 7 days
     * 
     * @param int $limit Number of posts to return
     * @return array Array of blog posts
     */
    public function getTrendingPosts($limit = 5) {
        try {
            $sql = "SELECT b.*, u.username, COUNT(v.id) as view_count 
                    FROM blogs b
                    JOIN blog_views v ON b.id = v.blog_id
                    JOIN users u ON b.user_id = u.id
                    WHERE b.status = 'published'
                    AND v.viewed_at > DATE_SUB(NOW(), INTERVAL 7 DAY)
                    GROUP BY b.id
                    ORDER BY view_count DESC
                    LIMIT :limit";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // Return empty array on error
            return [];
        }
    }
    
    /**
     * Get related blog posts based on shared categories
     * 
     * @param int $blogId Current blog post ID to exclude
     * @param int $limit Number of posts to return
     * @return array Array of related blog posts
     */
    public function getRelatedPosts($blogId, $limit = 3) {
        try {
            // First get the current post's categories and tags
            $sql = "SELECT GROUP_CONCAT(c.id) as category_ids, b.tags 
                    FROM blogs b
                    LEFT JOIN blog_category bc ON b.id = bc.blog_id
                    LEFT JOIN categories c ON bc.category_id = c.id
                    WHERE b.id = :blog_id
                    GROUP BY b.id";
                    
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
            $stmt->execute();
            $currentPost = $stmt->fetch();
            
            // If no categories or tags, fall back to recent posts
            if (empty($currentPost['category_ids']) && empty($currentPost['tags'])) {
                $sql = "SELECT b.*, u.username 
                        FROM blogs b
                        LEFT JOIN users u ON b.user_id = u.id
                        WHERE b.id != :blog_id 
                        AND b.status = 'published'
                        ORDER BY b.created_at DESC
                        LIMIT :limit";
                        
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetchAll();
            }

            // Build query for related posts based on categories and tags
            $sql = "SELECT b.*, u.username,
                    COUNT(DISTINCT bc.category_id) as shared_categories,
                    IF(b.tags = '', 0, 
                       (LENGTH(b.tags) - LENGTH(REPLACE(LOWER(b.tags), LOWER(:tags), ''))) / LENGTH(:tags)
                    ) as tag_similarity
                    FROM blogs b
                    LEFT JOIN blog_category bc ON b.id = bc.blog_id
                    LEFT JOIN users u ON b.user_id = u.id
                    WHERE b.id != :blog_id 
                    AND b.status = 'published'
                    AND (bc.category_id IN (" . $currentPost['category_ids'] . ") OR b.tags LIKE :tag_pattern)
                    GROUP BY b.id
                    ORDER BY shared_categories DESC, tag_similarity DESC, b.created_at DESC
                    LIMIT :limit";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
            $stmt->bindParam(':tags', $currentPost['tags'], PDO::PARAM_STR);
            $stmt->bindParam(':tag_pattern', '%' . str_replace(',', '%', $currentPost['tags']) . '%', PDO::PARAM_STR);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }
    
    /**
     * Get view statistics for the past n days
     * 
     * @param int $days Number of days to get statistics for
     * @return array Daily view counts indexed by date
     */
    public function getViewsStats($days = 7) {
        try {
            // Get views for the last n days
            $sql = "SELECT DATE(viewed_at) as date, COUNT(*) as count 
                    FROM blog_views 
                    WHERE viewed_at >= DATE_SUB(CURRENT_DATE(), INTERVAL :days DAY) 
                    GROUP BY DATE(viewed_at) 
                    ORDER BY date";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':days', $days, PDO::PARAM_INT);
            $stmt->execute();
            
            $results = $stmt->fetchAll();
            
            // Format data for chart
            $viewData = [];
            
            // Create a date range for the past n days
            $endDate = new DateTime();
            $startDate = new DateTime();
            $startDate->modify('-' . ($days - 1) . ' days');
            
            // Initialize all dates with zero views
            $interval = new DateInterval('P1D');
            $dateRange = new DatePeriod($startDate, $interval, $endDate);
            
            foreach ($dateRange as $date) {
                $formattedDate = $date->format('Y-m-d');
                $viewData[$formattedDate] = 0;
            }
            
            // Fill in actual view counts
            foreach ($results as $row) {
                $viewData[$row['date']] = (int)$row['count'];
            }
            
            return $viewData;
        } catch (PDOException $e) {
            // Return empty array on error
            return [];
        }
    }
    
    /**
     * Get total views across all blog posts
     * 
     * @return int Total number of views
     */
    public function getTotalViews() {
        try {
            $sql = "SELECT COUNT(*) FROM blog_views";
            $stmt = $this->pdo->query($sql);
            return (int)$stmt->fetchColumn();
        } catch (PDOException $e) {
            return 0;
        }
    }
    
    /**
     * Get most popular blog posts based on view count
     * 
     * @param int $limit Number of posts to return
     * @return array Array of popular blog posts
     */
    public function getPopularPosts($limit = 5) {
        try {
            $sql = "SELECT b.id, b.title, b.slug, COUNT(v.id) as view_count 
                    FROM blogs b
                    JOIN blog_views v ON b.id = v.blog_id
                    WHERE b.status = 'published'
                    GROUP BY b.id, b.title, b.slug
                    ORDER BY view_count DESC
                    LIMIT :limit";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // Return empty array on error
            return [];
        }
    }
    
    /**
     * Search blogs by keyword with pagination
     * 
     * @param string $keyword Search term
     * @param int $page Page number
     * @param int $limit Items per page
     * @return array Blogs and pagination info
     */
    public function searchBlogs($keyword, $page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        $searchTerm = "%$keyword%";
        
        try {
            // Count total matching blogs for pagination
            $countSql = "SELECT COUNT(*) FROM blogs b 
                        WHERE b.status = 'published' AND 
                        b.title LIKE :search";
            
            $countStmt = $this->pdo->prepare($countSql);
            $countStmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
            $countStmt->execute();
            $total = $countStmt->fetchColumn();
            
            // Get blogs for current page
            $sql = "SELECT b.*, u.username FROM blogs b 
                    LEFT JOIN users u ON b.user_id = u.id 
                    WHERE b.status = 'published' AND 
                    b.title LIKE :search
                    ORDER BY b.created_at DESC 
                    LIMIT :limit OFFSET :offset";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $blogs = $stmt->fetchAll();
            
            // Calculate pagination info
            $lastPage = ceil($total / $limit);
            
            return [
                'blogs' => $blogs,
                'pagination' => [
                    'total' => $total,
                    'per_page' => $limit,
                    'current_page' => $page,
                    'last_page' => $lastPage,
                    'has_more_pages' => $page < $lastPage,
                    'has_prev_pages' => $page > 1
                ]
            ];
        } catch (PDOException $e) {
            return [
                'blogs' => [],
                'pagination' => [
                    'total' => 0,
                    'per_page' => $limit,
                    'current_page' => 1,
                    'last_page' => 1,
                    'has_more_pages' => false,
                    'has_prev_pages' => false
                ]
            ];
        }
    }
    
    /**
     * Get blogs by category
     * 
     * @param int $categoryId Category ID
     * @param int $page Page number
     * @param int $limit Items per page
     * @return array Blogs and pagination info
     */
    public function getBlogsByCategory($categoryId, $page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        
        try {
            // Count total blogs for pagination
            $countSql = "SELECT COUNT(*) FROM blogs b 
                        JOIN blog_category bc ON b.id = bc.blog_id 
                        WHERE bc.category_id = :category_id 
                        AND b.status = 'published'";
                        
            $countStmt = $this->pdo->prepare($countSql);
            $countStmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
            $countStmt->execute();
            $total = $countStmt->fetchColumn();
            
            // Get blogs for current page
            $sql = "SELECT b.*, u.username FROM blogs b 
                    JOIN blog_category bc ON b.id = bc.blog_id 
                    JOIN users u ON b.user_id = u.id 
                    WHERE bc.category_id = :category_id 
                    AND b.status = 'published' 
                    ORDER BY b.created_at DESC 
                    LIMIT :limit OFFSET :offset";
                    
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $blogs = $stmt->fetchAll();
            
            // Calculate pagination info
            $totalPages = ceil($total / $limit);
            $hasNextPage = $page < $totalPages;
            $hasPrevPage = $page > 1;
            
            return [
                'blogs' => $blogs,
                'pagination' => [
                    'total' => $total,
                    'per_page' => $limit,
                    'current_page' => $page,
                    'last_page' => $totalPages,
                    'from' => $offset + 1,
                    'to' => min($offset + $limit, $total),
                    'has_more_pages' => $hasNextPage,
                    'has_prev_pages' => $hasPrevPage
                ]
            ];
        } catch (PDOException $e) {
            return [
                'blogs' => [],
                'pagination' => [
                    'total' => 0,
                    'per_page' => $limit,
                    'current_page' => 1,
                    'last_page' => 1,
                    'has_more_pages' => false,
                    'has_prev_pages' => false
                ]
            ];
        }
    }

    // Update any createPost or updatePost methods to remove excerpt
    public function createPost($userId, $title, $content, $slug, $status, $featuredImage = null, $demoLink = null, $downloadLink = null, $tags = null, $metaDescription = null, $metaKeywords = null)
    {
        $sql = "INSERT INTO blogs (user_id, title, content, slug, status, featured_image, demo_link, download_link, tags, meta_description, meta_keywords, created_at, updated_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("issssssssss", 
            $userId, 
            $title, 
            $content, 
            $slug, 
            $status, 
            $featuredImage, 
            $demoLink, 
            $downloadLink, 
            $tags, 
            $metaDescription, 
            $metaKeywords
        );
        
        return $stmt->execute();
    }
    
    public function updatePost($blogId, $title, $content, $slug, $status, $featuredImage = null, $demoLink = null, $downloadLink = null, $tags = null, $metaDescription = null, $metaKeywords = null)
    {
        $sql = "UPDATE blogs SET 
                title = ?, 
                content = ?, 
                slug = ?, 
                status = ?, 
                featured_image = ?, 
                demo_link = ?, 
                download_link = ?, 
                tags = ?, 
                meta_description = ?, 
                meta_keywords = ?, 
                updated_at = NOW() 
                WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssssssssssi", 
            $title, 
            $content, 
            $slug, 
            $status, 
            $featuredImage, 
            $demoLink, 
            $downloadLink, 
            $tags, 
            $metaDescription, 
            $metaKeywords, 
            $blogId
        );
        
        return $stmt->execute();
    }
}
