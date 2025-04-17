<?php

require_once 'Database.php';

class Post 
{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll($limit = 10, $offset = 0) {
        // Use direct parameter binding for MySQL-style LIMIT/OFFSET
        return $this->db->fetchAll(
            "SELECT p.*, c.name as category_name, c.slug as category_slug 
            FROM posts p 
            JOIN categories c ON p.category_id = c.id 
            WHERE p.status = 'published' 
            ORDER BY p.created_at DESC 
            LIMIT ?, ?", 
            [(int)$offset, (int)$limit]
        );
    }

    public function getById($id) {
        return $this->db->fetch(
            "SELECT p.*, c.name as category_name, c.slug as category_slug 
            FROM posts p 
            JOIN categories c ON p.category_id = c.id 
            WHERE p.id = ?", 
            [$id]
        );
    }

    public function getBySlug($slug) {
        return $this->db->fetch(
            "SELECT p.*, c.name as category_name, c.slug as category_slug 
            FROM posts p 
            JOIN categories c ON p.category_id = c.id 
            WHERE p.slug = ?", 
            [$slug]
        );
    }

    public function getByCategory($categoryId, $limit = 10, $offset = 0) {
        // Use direct parameter binding for MySQL-style LIMIT/OFFSET
        return $this->db->fetchAll(
            "SELECT p.*, c.name as category_name, c.slug as category_slug 
            FROM posts p 
            JOIN categories c ON p.category_id = c.id 
            WHERE p.category_id = ? AND p.status = 'published' 
            ORDER BY p.created_at DESC 
            LIMIT ?, ?", 
            [(int)$categoryId, (int)$offset, (int)$limit]
        );
    }

    public function create($data) {
        return $this->db->insert('posts', $data);
    }

    public function incrementViews($id) {
        $this->db->query("UPDATE posts SET views = views + 1 WHERE id = ?", [$id]);
    }

    public function getRelatedPosts($postId, $categoryId, $limit = 3) {
        return $this->db->fetchAll(
            "SELECT p.*, c.name as category_name, c.slug as category_slug 
            FROM posts p 
            JOIN categories c ON p.category_id = c.id 
            WHERE p.category_id = ? AND p.id != ? AND p.status = 'published' 
            ORDER BY RAND() 
            LIMIT ?", 
            [$categoryId, $postId, $limit]
        );
    }

    public function getTotalCount() {
        $result = $this->db->fetch("SELECT COUNT(*) as count FROM posts WHERE status = 'published'");
        return $result['count'];
    }

    public function getTotalCountByCategory($categoryId) {
        $result = $this->db->fetch(
            "SELECT COUNT(*) as count FROM posts WHERE category_id = ? AND status = 'published'", 
            [$categoryId]
        );
        return $result['count'];
    }

    public function search($query, $limit = 10, $offset = 0) {
        $searchTerm = '%' . $query . '%';
        return $this->db->fetchAll(
            "SELECT p.*, c.name as category_name, c.slug as category_slug 
            FROM posts p 
            JOIN categories c ON p.category_id = c.id 
            WHERE p.status = 'published' 
            AND (p.title LIKE ? OR p.content LIKE ? OR p.keywords LIKE ?)
            ORDER BY p.created_at DESC 
            LIMIT ?, ?", 
            [$searchTerm, $searchTerm, $searchTerm, (int)$offset, (int)$limit]
        );
    }

    public function getTotalSearchCount($query) {
        $searchTerm = '%' . $query . '%';
        $result = $this->db->fetch(
            "SELECT COUNT(*) as count 
            FROM posts p
            WHERE p.status = 'published'
            AND (p.title LIKE ? OR p.content LIKE ? OR p.keywords LIKE ?)",
            [$searchTerm, $searchTerm, $searchTerm]
        );
        return $result ? (int)$result['count'] : 0;
    }

    public function getRandomPost() {
        return $this->db->fetch(
            "SELECT p.*, c.name as category_name, c.slug as category_slug 
            FROM posts p 
            JOIN categories c ON p.category_id = c.id 
            WHERE p.status = 'published' 
            ORDER BY RAND() 
            LIMIT 1"
        );
    }

    public function getPopularPostsFromPeriod($days = 7, $limit = 3) {
        $date = date('Y-m-d H:i:s', strtotime("-$days day"));
        return $this->db->fetchAll(
            "SELECT p.*, c.name as category_name, c.slug as category_slug 
            FROM posts p 
            JOIN categories c ON p.category_id = c.id 
            WHERE p.status = 'published' AND p.created_at >= ? 
            ORDER BY p.views DESC 
            LIMIT ?", 
            [$date, (int)$limit]
        );
    }
}
