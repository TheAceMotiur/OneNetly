<?php
// This class is deprecated and will be removed in a future version.
// All functionality related to categories has been removed from the system.
class Category {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function getAllCategories($includeParentInfo = false) {
        // Return empty array because categories are deprecated
        return [];
    }
    
    public function getCategoryBySlug($slug) {
        // Return false because categories are deprecated
        return false;
    }
    
    public function getCategoryById($id) {
        // Return false because categories are deprecated
        return false;
    }
    
    public function getCategoryHierarchy() {
        // Return empty array because categories are deprecated
        return [];
    }
    
    public function createCategory($data) {
        return ['success' => false, 'message' => 'Categories feature has been removed'];
    }
    
    public function updateCategory($id, $data) {
        return ['success' => false, 'message' => 'Categories feature has been removed'];
    }
    
    public function deleteCategory($id) {
        return ['success' => false, 'message' => 'Categories feature has been removed'];
    }
    
    public function updateCategoryOrder($id, $direction) {
        return ['success' => false, 'message' => 'Categories feature has been removed'];
    }
}
