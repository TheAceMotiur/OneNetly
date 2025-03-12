<?php

class Comment {
    private $pdo;
    private $tableExists = false;
    private $badWords = [];
    private $commentSettings = [];
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->checkTableExists();
        
        // Load comment configuration if file exists
        $configFile = __DIR__ . '/../config/comment_config.php';
        if (file_exists($configFile)) {
            include $configFile;
            
            // Set configuration values
            $this->badWords = $comment_bad_words ?? [];
            $this->commentSettings = $comment_settings ?? [];
        }
    }
    
    /**
     * Check if comments table exists
     */
    private function checkTableExists() {
        try {
            $stmt = $this->pdo->query("SHOW TABLES LIKE 'comments'");
            $this->tableExists = $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            $this->tableExists = false;
        }
    }
    
    /**
     * Get all comments for a blog post
     * 
     * @param int $blogId Blog ID
     * @param string $status Filter by status (approved, pending, spam, or all)
     * @return array Comments
     */
    public function getCommentsByBlog($blogId, $status = 'approved') {
        // Return empty array if table doesn't exist
        if (!$this->tableExists) {
            return [];
        }
        
        $whereClause = "WHERE c.blog_id = :blog_id";
        
        if ($status !== 'all') {
            $whereClause .= " AND c.status = :status";
        }
        
        $sql = "SELECT c.*, u.username FROM comments c 
                JOIN users u ON c.user_id = u.id 
                $whereClause 
                ORDER BY c.created_at ASC";
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
        
        if ($status !== 'all') {
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        }
        
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    /**
     * Get approved comments for a blog post
     * Alias for getCommentsByBlog() with status 'approved'
     * 
     * @param int $blogId Blog post ID
     * @return array Approved comments
     */
    public function getApprovedCommentsForPost($blogId) {
        return $this->getCommentsByBlog($blogId, 'approved');
    }

    /**
     * Add a comment to a blog post
     * 
     * @param array $data Comment data
     * @return array Result with success status and message
     */
    public function addComment($data) {
        // Return error if table doesn't exist
        if (!$this->tableExists) {
            return [
                'success' => false,
                'message' => 'Comments feature is not available yet.'
            ];
        }
        
        try {
            // Filter bad words in content
            $content = $this->filterBadWords($data['content']);
            
            // Add nofollow to links
            $content = $this->addNoFollowToLinks($content);
            
            // Determine the status - if user is admin, auto-approve
            $status = isset($data['is_admin']) && $data['is_admin'] ? 'approved' : 'pending';
            
            $sql = "INSERT INTO comments (blog_id, user_id, content, status) 
                    VALUES (:blog_id, :user_id, :content, :status)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':blog_id', $data['blog_id'], PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            
            $stmt->execute();
            
            return [
                'success' => true,
                'message' => $status === 'approved' ? 'Comment posted successfully' : 'Comment submitted for review',
                'comment_id' => $this->pdo->lastInsertId(),
                'status' => $status
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Failed to add comment: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Update comment status
     * 
     * @param int $commentId Comment ID
     * @param string $status New status
     * @return array Result with success status and message
     */
    public function updateStatus($commentId, $status) {
        // Return error if table doesn't exist
        if (!$this->tableExists) {
            return [
                'success' => false,
                'message' => 'Comments feature is not available yet.'
            ];
        }
        
        try {
            $sql = "UPDATE comments SET status = :status WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':id', $commentId, PDO::PARAM_INT);
            $stmt->execute();
            
            return [
                'success' => true,
                'message' => 'Comment status updated successfully'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Failed to update comment status: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Delete a comment
     * 
     * @param int $commentId Comment ID
     * @return array Result with success status and message
     */
    public function deleteComment($commentId) {
        // Return error if table doesn't exist
        if (!$this->tableExists) {
            return [
                'success' => false,
                'message' => 'Comments feature is not available yet.'
            ];
        }
        
        try {
            $sql = "DELETE FROM comments WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $commentId, PDO::PARAM_INT);
            $stmt->execute();
            
            return [
                'success' => true,
                'message' => 'Comment deleted successfully'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Failed to delete comment: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Get all pending comments that need moderation
     * 
     * @return array Pending comments
     */
    public function getPendingComments() {
        // Return empty array if table doesn't exist
        if (!$this->tableExists) {
            return [];
        }
        
        try {
            $sql = "SELECT c.*, u.username, b.title as blog_title, b.slug as blog_slug 
                    FROM comments c 
                    JOIN users u ON c.user_id = u.id 
                    JOIN blogs b ON c.blog_id = b.id 
                    WHERE c.status = 'pending' 
                    ORDER BY c.created_at ASC";
            
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }
    
    /**
     * Get comment count by blog ID
     * 
     * @param int $blogId Blog ID
     * @param string $status Filter by status (approved, pending, spam, or all)
     * @return int Number of comments
     */
    public function getCommentCount($blogId, $status = 'approved') {
        // Return 0 if table doesn't exist
        if (!$this->tableExists) {
            return 0;
        }
        
        try {
            $whereClause = "WHERE blog_id = :blog_id";
            
            if ($status !== 'all') {
                $whereClause .= " AND status = :status";
            }
            
            $sql = "SELECT COUNT(*) FROM comments $whereClause";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
            
            if ($status !== 'all') {
                $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            }
            
            $stmt->execute();
            
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            return 0;
        }
    }
    
    /**
     * Check if the comments table is available
     * 
     * @return bool Whether comments feature is available
     */
    public function isAvailable() {
        return $this->tableExists;
    }
    
    /**
     * Alias for isAvailable() - Check if comments feature is available
     * 
     * @return bool Whether comments feature is available
     */
    public function isCommentFeatureAvailable() {
        return $this->isAvailable();
    }
    
    /**
     * Get comment counts for the past n days
     * 
     * @param int $days Number of days to get statistics for
     * @return array Daily comment counts indexed by date
     */
    public function getRecentCommentCounts($days = 7) {
        // Return empty array if table doesn't exist
        if (!$this->tableExists) {
            return [];
        }
        
        try {
            // Get comments for the last n days
            $sql = "SELECT DATE(created_at) as date, COUNT(*) as count 
                    FROM comments 
                    WHERE created_at >= DATE_SUB(CURRENT_DATE(), INTERVAL :days DAY) 
                    GROUP BY DATE(created_at) 
                    ORDER BY date";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':days', $days, PDO::PARAM_INT);
            $stmt->execute();
            
            $results = $stmt->fetchAll();
            
            // Format data for chart
            $commentData = [];
            
            // Create a date range for the past n days
            $endDate = new DateTime();
            $startDate = new DateTime();
            $startDate->modify('-' . ($days - 1) . ' days');
            
            // Initialize all dates with zero comments
            $interval = new DateInterval('P1D');
            $dateRange = new DatePeriod($startDate, $interval, $endDate);
            
            foreach ($dateRange as $date) {
                $formattedDate = $date->format('Y-m-d');
                $commentData[$formattedDate] = 0;
            }
            
            // Fill in actual comment counts
            foreach ($results as $row) {
                $commentData[$row['date']] = (int)$row['count'];
            }
            
            return $commentData;
        } catch (PDOException $e) {
            // Return empty array on error
            return [];
        }
    }
    
    /**
     * Filter bad words from comment content
     * 
     * @param string $content The comment content
     * @return string Filtered content
     */
    private function filterBadWords($content) {
        // Skip if filtering is disabled
        if (empty($this->commentSettings['filter_bad_words'])) {
            return $content;
        }
        
        // Use configured bad words
        if (!empty($this->badWords)) {
            // Replace bad words with asterisks
            foreach ($this->badWords as $word) {
                // Use word boundary to match whole words only
                $pattern = '/\b' . preg_quote($word, '/') . '\b/i';
                $replacement = str_repeat('*', strlen($word));
                $content = preg_replace($pattern, $replacement, $content);
            }
        }
        
        return $content;
    }
    
    /**
     * Add nofollow attribute to links in comment content
     * 
     * @param string $content The comment content
     * @return string Content with nofollow links
     */
    private function addNoFollowToLinks($content) {
        // Skip if nofollow is disabled
        if (empty($this->commentSettings['add_nofollow_to_links'])) {
            return $content;
        }
        
        // Regular expression to find links without rel="nofollow"
        $pattern = '/<a(.*?)href=["\'](.*?)["\'](.*?)>/i';
        
        // Callback function to add rel="nofollow" to links
        $replacement = function($matches) {
            $attrs = $matches[1] . ' href="' . $matches[2] . '"' . $matches[3];
            
            // Check if rel attribute already exists
            if (stripos($attrs, 'rel=') !== false) {
                // Add nofollow to existing rel attribute if not present
                if (stripos($attrs, 'nofollow') === false) {
                    $attrs = preg_replace('/rel=(["\'])(.*?)(["\'])/i', 'rel=$1$2 nofollow$3', $attrs);
                }
            } else {
                // Add rel="nofollow" attribute if not present
                $attrs .= ' rel="nofollow"';
            }
            
            return '<a' . $attrs . '>';
        };
        
        $content = preg_replace_callback($pattern, $replacement, $content);
        
        return $content;
    }

    /**
     * Get comments for a blog post
     * 
     * @param int $blogId Blog ID
     * @return array Comments for the blog
     */
    public function getComments($blogId)
    {
        try {
            $stmt = $this->pdo->prepare(
                "SELECT c.*, u.username as name, u.email, u.is_admin 
                FROM comments c 
                JOIN users u ON c.user_id = u.id 
                WHERE c.blog_id = :blog_id AND c.status = 'approved' 
                ORDER BY c.created_at ASC"
            );
            $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Get all approved comments
     * 
     * @return array List of approved comments
     */
    public function getApprovedComments() {
        try {
            $stmt = $this->pdo->prepare(
                "SELECT c.*, u.username as name, u.email, b.title as post_title, b.slug as post_slug 
                FROM comments c
                JOIN users u ON c.user_id = u.id
                JOIN blogs b ON c.blog_id = b.id
                WHERE c.status = 'approved'
                ORDER BY c.blog_id, c.created_at ASC"
            );
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Approve a comment
     * 
     * @param int $commentId Comment ID to approve
     * @return array Result of operation
     */
    public function approveComment($commentId) 
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE comments SET status = 'approved' WHERE id = :id");
            $stmt->bindParam(':id', $commentId, PDO::PARAM_INT);
            $stmt->execute();
            
            return [
                'success' => true,
                'message' => 'Comment approved successfully'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }
}
