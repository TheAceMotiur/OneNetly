<?php

class Database 
{
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $this->pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
            DB_USER,
            DB_PASS,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function query($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            
            // Add better type handling for numeric parameters
            foreach ($params as $key => $value) {
                $paramType = PDO::PARAM_STR;
                if (is_int($value)) {
                    $paramType = PDO::PARAM_INT;
                } elseif (is_bool($value)) {
                    $paramType = PDO::PARAM_BOOL;
                } elseif (is_null($value)) {
                    $paramType = PDO::PARAM_NULL;
                }
                
                // PDO param positions are 1-based, not 0-based
                if (is_numeric($key)) {
                    $stmt->bindValue($key + 1, $value, $paramType);
                } else {
                    $stmt->bindValue($key, $value, $paramType);
                }
            }
            
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            // Log error and rethrow with more context
            error_log("Database query error in SQL: $sql, Error: " . $e->getMessage());
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function fetch($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }

    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }

    public function insert($table, $data) {
        // Handle reserved keywords in column names by wrapping them in backticks
        $columns = [];
        foreach (array_keys($data) as $column) {
            // Add backticks to handle reserved keywords
            $columns[] = "`$column`";
        }
        
        $columnStr = implode(', ', $columns);
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO $table ($columnStr) VALUES ($placeholders)";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            error_log("Insert error: " . $e->getMessage() . " SQL: " . $sql);
            throw $e;
        }
    }

    public function update($table, $data, $where, $whereParams = []) {
        $set = [];
        foreach (array_keys($data) as $column) {
            // Add backticks to handle reserved keywords
            $set[] = "`$column` = :$column";
        }
        $setStr = implode(', ', $set);
        
        $sql = "UPDATE $table SET $setStr WHERE $where";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_merge($data, $whereParams));
        
        return $stmt->rowCount();
    }
}
