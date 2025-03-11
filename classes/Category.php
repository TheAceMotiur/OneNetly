<?php

class Category {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    /**
     * Get all categories
     * 
     * @param bool $includeParentInfo Whether to include parent information
     * @return array Categories
     */
    public function getAllCategories($includeParentInfo = false) {
        if ($includeParentInfo) {
            $sql = "SELECT c.*, p.name as parent_name, p.slug as parent_slug 
                    FROM categories c 
                    LEFT JOIN categories p ON c.parent_id = p.id 
                    ORDER BY COALESCE(c.parent_id, c.id), c.name ASC";
        } else {
            $sql = "SELECT * FROM categories ORDER BY name ASC";
        }
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    /**
     * Get all parent categories (categories with no parent)
     * 
     * @return array Parent categories
     */
    public function getParentCategories() {
        $sql = "SELECT * FROM categories WHERE parent_id IS NULL ORDER BY name ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
    
    /**
     * Get subcategories of a parent category
     * 
     * @param int $parentId Parent category ID
     * @return array Subcategories
     */
    public function getSubcategories($parentId) {
        $sql = "SELECT * FROM categories WHERE parent_id = :parent_id ORDER BY name ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Get category by ID
     * 
     * @param int $id Category ID
     * @return array|false Category data or false if not found
     */
    public function getCategoryById($id) {
        $sql = "SELECT c.*, p.name as parent_name 
                FROM categories c
                LEFT JOIN categories p ON c.parent_id = p.id
                WHERE c.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    /**
     * Get category by slug
     * 
     * @param string $slug Category slug
     * @return array|false Category data or false if not found
     */
    public function getCategoryBySlug($slug) {
        $sql = "SELECT * FROM categories WHERE slug = :slug";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    /**
     * Create a new category
     * 
     * @param array $data Category data
     * @return array Result with success status and message
     */
    public function createCategory($data) {
        // Generate slug from name
        $slug = $this->createSlug($data['name']);
        
        try {
            $sql = "INSERT INTO categories (name, slug, description, parent_id) VALUES (:name, :slug, :description, :parent_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
            
            // Fix: Store description in a variable first, then bind it
            $description = $data['description'] ?? null;
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            
            // Handle parent_id - if empty or 0, set to NULL
            $parentId = !empty($data['parent_id']) ? $data['parent_id'] : null;
            $stmt->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
            
            $stmt->execute();
            
            return [
                'success' => true,
                'message' => 'Category created successfully',
                'category_id' => $this->pdo->lastInsertId()
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Failed to create category: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Update an existing category
     * 
     * @param int $id Category ID
     * @param array $data Category data
     * @return array Result with success status and message
     */
    public function updateCategory($id, $data) {
        try {
            // If name changed, update slug
            if (isset($data['name'])) {
                $category = $this->getCategoryById($id);
                if ($category && $category['name'] != $data['name']) {
                    $data['slug'] = $this->createSlug($data['name']);
                }
            }
            
            // Handle parent_id - if empty, set to NULL
            if (isset($data['parent_id'])) {
                if (empty($data['parent_id'])) {
                    $data['parent_id'] = null;
                } else {
                    // Check for circular reference
                    if ($data['parent_id'] == $id) {
                        return [
                            'success' => false,
                            'message' => 'A category cannot be its own parent'
                        ];
                    }
                    
                    // Check if the proposed parent is a child of this category (prevents circular references)
                    if ($this->isChildOf($data['parent_id'], $id)) {
                        return [
                            'success' => false,
                            'message' => 'Cannot set a subcategory as the parent (would create circular reference)'
                        ];
                    }
                }
            }
            
            $sql = "UPDATE categories SET ";
            $params = [];
            
            foreach ($data as $key => $value) {
                $sql .= "$key = :$key, ";
                $params[":$key"] = $value;
            }
            
            $sql = rtrim($sql, ', ');
            $sql .= " WHERE id = :id";
            $params[':id'] = $id;
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            
            return [
                'success' => true,
                'message' => 'Category updated successfully'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Failed to update category: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Delete a category
     * 
     * @param int $id Category ID
     * @return array Result with success status and message
     */
    public function deleteCategory($id) {
        try {
            $sql = "DELETE FROM categories WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return [
                'success' => true,
                'message' => 'Category deleted successfully'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Failed to delete category: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Create a unique slug from a string
     * 
     * @param string $name The name to convert to slug
     * @return string The unique slug
     */
    private function createSlug($name) {
        // Convert to lowercase and replace spaces with hyphens
        $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $name), '-'));
        
        // Check if slug exists
        $sql = "SELECT COUNT(*) FROM categories WHERE slug = :slug";
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
     * Check if a category is a child of another category
     * 
     * @param int $categoryId The category to check
     * @param int $potentialParentId The potential parent category
     * @return bool Whether the category is a child of the potential parent
     */
    private function isChildOf($categoryId, $potentialParentId) {
        $sql = "SELECT parent_id FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch();
        
        if (!$result) {
            return false;
        }
        
        if ($result['parent_id'] == $potentialParentId) {
            return true;
        }
        
        if ($result['parent_id']) {
            return $this->isChildOf($result['parent_id'], $potentialParentId);
        }
        
        return false;
    }
    
    /**
     * Get hierarchical category list (for display in menus)
     * 
     * @return array Nested category structure
     */
    public function getCategoryHierarchy() {
        // Get all parent categories (no parent_id)
        $parentCategories = $this->getParentCategories();
        
        $hierarchy = [];
        
        foreach ($parentCategories as $parent) {
            $subcategories = $this->getSubcategories($parent['id']);
            
            $hierarchy[] = [
                'id' => $parent['id'],
                'name' => $parent['name'],
                'slug' => $parent['slug'],
                'subcategories' => $subcategories
            ];
        }
        
        return $hierarchy;
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
    }
}
