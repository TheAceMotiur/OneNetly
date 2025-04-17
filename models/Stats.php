<?php

require_once 'Database.php';

class Stats 
{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function recordVisit($page, $ip, $userAgent, $referrer = null) {
        $data = [
            'page' => $page,
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'referrer' => $referrer
        ];
        return $this->db->insert('visitors', $data);
    }

    public function processDailyStats($date = null) {
        if (!$date) {
            $date = date('Y-m-d');
        }
        
        // Get yesterday's date for processing
        $yesterday = date('Y-m-d', strtotime($date . ' -1 day'));
        
        // Get count by page
        $visitors = $this->db->fetchAll(
            "SELECT page, COUNT(*) as count FROM visitors 
            WHERE DATE(created_at) = ? 
            GROUP BY page",
            [$yesterday]
        );
        
        // Insert aggregated stats
        foreach ($visitors as $visit) {
            try {
                $this->db->insert('stats', [
                    'date' => $yesterday,
                    'page' => $visit['page'],
                    'hits' => $visit['count']
                ]);
            } catch (PDOException $e) {
                // Update if already exists (handle duplicate key)
                if ($e->getCode() == 23000) {
                    $this->db->query(
                        "UPDATE stats SET hits = ? WHERE date = ? AND page = ?",
                        [$visit['count'], $yesterday, $visit['page']]
                    );
                }
            }
        }
        
        // Clean up old individual visitor records (keep for 30 days)
        $this->db->query(
            "DELETE FROM visitors WHERE created_at < DATE_SUB(NOW(), INTERVAL 30 DAY)"
        );
    }

    public function getTopPages($limit = 10, $days = 30) {
        return $this->db->fetchAll(
            "SELECT page, SUM(hits) as total_hits 
            FROM stats 
            WHERE date >= DATE_SUB(CURDATE(), INTERVAL ? DAY) 
            GROUP BY page 
            ORDER BY total_hits DESC 
            LIMIT ?",
            [(int)$days, (int)$limit]
        );
    }

    public function getDailyTrend($days = 7) {
        return $this->db->fetchAll(
            "SELECT date, SUM(hits) as total_hits 
            FROM stats 
            WHERE date >= DATE_SUB(CURDATE(), INTERVAL ? DAY) 
            GROUP BY date 
            ORDER BY date",
            [$days]
        );
    }
}
