<?php

class Comment {
    private $pdo;
    private $tableExists = false;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->checkTableExists();
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
            $sql = "INSERT INTO comments (blog_id, user_id, content, status) 
                    VALUES (:blog_id, :user_id, :content, :status)";
            
            // Determine the status - if user is admin, auto-approve
            $status = isset($data['is_admin']) && $data['is_admin'] ? 'approved' : 'pending';
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':blog_id', $data['blog_id'], PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT);
            $stmt->bindParam(':content', $data['content'], PDO::PARAM_STR);
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
}
