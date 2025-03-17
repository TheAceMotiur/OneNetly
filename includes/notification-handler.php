<?php

class NotificationHandler {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createNotification($userId, $type, $data) {
        $stmt = $this->pdo->prepare("
            INSERT INTO notifications (user_id, type, data) 
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$userId, $type, json_encode($data)]);
    }

    public function getUnreadCount($userId) {
        $stmt = $this->pdo->prepare("
            SELECT COUNT(*) FROM notifications 
            WHERE user_id = ? AND is_read = FALSE
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchColumn();
    }

    public function markAsRead($notificationId) {
        $stmt = $this->pdo->prepare("
            UPDATE notifications 
            SET is_read = TRUE 
            WHERE id = ?
        ");
        return $stmt->execute([$notificationId]);
    }
}
