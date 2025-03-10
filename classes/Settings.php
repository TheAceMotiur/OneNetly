<?php

class Settings
{
    private $pdo;
    private $userId;
    
    public function __construct($pdo, $userId = null)
    {
        $this->pdo = $pdo;
        $this->userId = $userId;
    }
    
    /**
     * Get a setting value
     * 
     * @param string $key The setting key
     * @param mixed $default Default value if setting not found
     * @return mixed The setting value or default
     */
    public function get($key, $default = null)
    {
        if ($this->userId) {
            // Get user-specific setting
            $stmt = $this->pdo->prepare("SELECT setting_value FROM settings WHERE user_id = ? AND setting_key = ?");
            $stmt->execute([$this->userId, $key]);
        } else {
            // Get global setting
            $stmt = $this->pdo->prepare("SELECT setting_value FROM settings WHERE user_id IS NULL AND setting_key = ?");
            $stmt->execute([$key]);
        }
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result ? $result['setting_value'] : $default;
    }
    
    /**
     * Set a setting value
     * 
     * @param string $key The setting key
     * @param mixed $value The setting value
     * @return bool True if successful
     */
    public function set($key, $value)
    {
        try {
            // Check if setting already exists
            if ($this->userId) {
                $stmt = $this->pdo->prepare("SELECT id FROM settings WHERE user_id = ? AND setting_key = ?");
                $stmt->execute([$this->userId, $key]);
            } else {
                $stmt = $this->pdo->prepare("SELECT id FROM settings WHERE user_id IS NULL AND setting_key = ?");
                $stmt->execute([$key]);
            }
            
            if ($stmt->rowCount() > 0) {
                // Update existing setting
                if ($this->userId) {
                    $stmt = $this->pdo->prepare("UPDATE settings SET setting_value = ? WHERE user_id = ? AND setting_key = ?");
                    $stmt->execute([$value, $this->userId, $key]);
                } else {
                    $stmt = $this->pdo->prepare("UPDATE settings SET setting_value = ? WHERE user_id IS NULL AND setting_key = ?");
                    $stmt->execute([$value, $key]);
                }
            } else {
                // Insert new setting
                $stmt = $this->pdo->prepare("INSERT INTO settings (user_id, setting_key, setting_value) VALUES (?, ?, ?)");
                $stmt->execute([$this->userId, $key, $value]);
            }
            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    /**
     * Delete a setting
     * 
     * @param string $key The setting key
     * @return bool True if successful
     */
    public function delete($key)
    {
        try {
            if ($this->userId) {
                $stmt = $this->pdo->prepare("DELETE FROM settings WHERE user_id = ? AND setting_key = ?");
                $stmt->execute([$this->userId, $key]);
            } else {
                $stmt = $this->pdo->prepare("DELETE FROM settings WHERE user_id IS NULL AND setting_key = ?");
                $stmt->execute([$key]);
            }
            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    /**
     * Get all settings
     * 
     * @return array Array of settings
     */
    public function getAll()
    {
        if ($this->userId) {
            $stmt = $this->pdo->prepare("SELECT setting_key, setting_value FROM settings WHERE user_id = ?");
            $stmt->execute([$this->userId]);
        } else {
            $stmt = $this->pdo->prepare("SELECT setting_key, setting_value FROM settings WHERE user_id IS NULL");
            $stmt->execute();
        }
        
        $settings = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
        
        return $settings;
    }
}
