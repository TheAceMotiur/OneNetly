<?php

require_once 'Database.php';

class Queue 
{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function add($data) {
        return $this->db->insert('queue', $data);
    }

    public function getPending($limit = 10) {
        return $this->db->fetchAll(
            "SELECT * FROM queue 
            WHERE status = 'pending' AND (scheduled_at IS NULL OR scheduled_at <= NOW())
            ORDER BY created_at ASC 
            LIMIT ?",
            [$limit]
        );
    }

    public function markAsProcessing($id) {
        $data = ['status' => 'processing', 'attempts' => 'attempts + 1'];
        $this->db->query(
            "UPDATE queue SET status = 'processing', attempts = attempts + 1 WHERE id = ?",
            [$id]
        );
    }

    public function markAsCompleted($id) {
        $this->db->query(
            "UPDATE queue SET status = 'completed', processed_at = NOW() WHERE id = ?",
            [$id]
        );
    }

    public function markAsFailed($id, $message = '') {
        $this->db->query(
            "UPDATE queue SET status = 'failed', processed_at = NOW() WHERE id = ?",
            [$id]
        );
    }

    public function reschedule($id, $delayMinutes = 60) {
        $this->db->query(
            "UPDATE queue SET status = 'pending', scheduled_at = DATE_ADD(NOW(), INTERVAL ? MINUTE) WHERE id = ?",
            [$delayMinutes, $id]
        );
    }

    public function getJobsByCategory($categoryId) {
        return $this->db->fetchAll(
            "SELECT * FROM queue WHERE category_id = ? AND status IN ('pending', 'processing') ORDER BY created_at", 
            [$categoryId]
        );
    }

    public function getJobById($id) {
        return $this->db->fetch(
            "SELECT * FROM queue WHERE id = ?", 
            [$id]
        );
    }
}
