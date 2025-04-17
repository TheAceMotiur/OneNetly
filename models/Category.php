<?php

require_once 'Database.php';

class Category 
{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        return $this->db->fetchAll("SELECT * FROM categories ORDER BY name");
    }

    public function getById($id) {
        return $this->db->fetch("SELECT * FROM categories WHERE id = ?", [$id]);
    }

    public function getBySlug($slug) {
        return $this->db->fetch("SELECT * FROM categories WHERE slug = ?", [$slug]);
    }

    public function create($data) {
        return $this->db->insert('categories', $data);
    }

    public function getRandomCategory() {
        return $this->db->fetch("SELECT * FROM categories ORDER BY RAND() LIMIT 1");
    }
}
