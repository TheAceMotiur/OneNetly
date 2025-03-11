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
                    (user_id, title, slug, content, excerpt, featured_image, status) 
                    VALUES 
                    (:user_id, :title, :slug, :content, :excerpt, :featured_image, :status)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT);
            $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
            $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
            $stmt->bindParam(':content', $data['content'], PDO::PARAM_STR);
            $stmt->bindParam(':excerpt', $data['excerpt'], PDO::PARAM_STR);
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
     * @param array $categoryIds Array of category IDs
     * @param int $limit Number of posts to return
     * @return array Array of related blog posts
     */
    public function getRelatedPosts($blogId, $categoryIds, $limit = 3) {
        if (empty($categoryIds)) {
            return [];
        }
        
        try {
            // Convert array of IDs to comma separated string
            $categoryList = implode(',', array_map('intval', $categoryIds));
            
            $sql = "SELECT DISTINCT b.*, u.username FROM blogs b
                    JOIN blog_category bc ON b.id = bc.blog_id
                    JOIN users u ON b.user_id = u.id
                    WHERE b.id != :blog_id 
                    AND b.status = 'published'
                    AND bc.category_id IN ($categoryList)
                    ORDER BY b.created_at DESC
                    LIMIT :limit";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // Return empty array on error
            return [];
        }
    }
}
