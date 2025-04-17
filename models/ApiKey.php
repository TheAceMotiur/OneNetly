<?php

require_once 'Database.php';

class ApiKey 
{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll($service = null) {
        if ($service) {
            return $this->db->fetchAll("SELECT * FROM api_keys WHERE service = ? AND is_active = 1", [$service]);
        }
        return $this->db->fetchAll("SELECT * FROM api_keys WHERE is_active = 1");
    }

    public function getNextAvailableKey($service) {
        $key = $this->db->fetch(
            "SELECT * FROM api_keys 
            WHERE service = ? AND is_active = 1 
            ORDER BY usage_count, last_used ASC 
            LIMIT 1",
            [$service]
        );
        
        if (!$key) {
            // If no keys found in database, check if we can load from config constants
            if ($service === 'openrouter' && defined('OPENROUTER_API_KEYS') && !empty(OPENROUTER_API_KEYS)) {
                $this->importKeysFromConfig($service, OPENROUTER_API_KEYS);
                return $this->getNextAvailableKey($service);
            } elseif ($service === 'pixabay' && defined('PIXABAY_API_KEY') && !empty(PIXABAY_API_KEY)) {
                $this->add('pixabay', PIXABAY_API_KEY);
                return $this->getNextAvailableKey($service);
            } elseif ($service === 'unsplash' && defined('UNSPLASH_API_KEY') && !empty(UNSPLASH_API_KEY)) {
                $this->add('unsplash', UNSPLASH_API_KEY);
                return $this->getNextAvailableKey($service);
            }
            
            error_log("No API keys available for service: $service");
            return null;
        }
        
        return $key;
    }

    /**
     * Import multiple API keys from config
     */
    public function importKeysFromConfig($service, $keys) {
        if (!is_array($keys)) {
            $keys = [$keys];
        }
        
        foreach ($keys as $key) {
            if (!empty($key)) {
                try {
                    $this->add($service, $key);
                    error_log("Added $service API key from config");
                } catch (Exception $e) {
                    error_log("Failed to add $service API key: " . $e->getMessage());
                }
            }
        }
    }

    public function updateUsage($id) {
        $this->db->query(
            "UPDATE api_keys SET usage_count = usage_count + 1, last_used = NOW() WHERE id = ?",
            [$id]
        );
    }

    public function add($service, $keyValue) {
        // Instead of using direct column insertion, use a more explicit approach to handle the reserved word 'key'
        $sql = "INSERT INTO api_keys (service, `key`, usage_count, is_active) VALUES (?, ?, 0, 1)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([$service, $keyValue]);
        
        return $this->db->getConnection()->lastInsertId();
    }

    public function deactivate($id) {
        $this->db->query("UPDATE api_keys SET is_active = 0 WHERE id = ?", [$id]);
    }
}
