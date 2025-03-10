<?php

namespace OneMigrator;

class Migrator
{
    private $pdo;
    private $config;
    private $migrationsTable;
    private $migrationsPath;

    public function __construct($pdo, array $config = [])
    {
        $this->pdo = $pdo;
        $this->config = $config;
        $this->migrationsTable = $config['migrationsTable'] ?? 'migrations';
        $this->migrationsPath = $config['migrationsPath'] ?? __DIR__ . '/../../migrations';
        
        $this->initialize();
    }

    protected function initialize()
    {
        // Create migrations table if it doesn't exist
        $sql = "CREATE TABLE IF NOT EXISTS {$this->migrationsTable} (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255) NOT NULL,
            batch INT NOT NULL,
            executed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        $this->pdo->exec($sql);
    }

    public function migrate()
    {
        $executed = [];
        $skipped = [];
        
        // Get all migration files
        $files = $this->getMigrationFiles();
        
        // Get already executed migrations
        $ranMigrations = $this->getRanMigrations();
        
        // Find migrations to execute
        $batch = $this->getNextBatchNumber();
        
        foreach ($files as $file) {
            $className = $this->getMigrationClassName($file);
            $filePath = $this->migrationsPath . '/' . $file;
            
            // If migration already executed, skip it
            if (in_array($file, $ranMigrations)) {
                $skipped[] = $file;
                continue;
            }
            
            // Include the file and run the migration
            require_once $filePath;
            
            if (!class_exists($className)) {
                throw new \Exception("Migration class '{$className}' not found in file '{$file}'");
            }
            
            $migration = new $className();
            
            if (!($migration instanceof Migration)) {
                throw new \Exception("Migration class '{$className}' must extend OneMigrator\\Migration");
            }
            
            // Run the migration
            $this->pdo->exec($migration->up());
            
            // Record the migration
            $this->recordMigration($file, $batch);
            
            $executed[] = $file;
        }
        
        return [
            'executed' => $executed,
            'skipped' => $skipped
        ];
    }
    
    protected function getMigrationFiles()
    {
        $files = [];
        
        if (!is_dir($this->migrationsPath)) {
            throw new \Exception("Migrations directory '{$this->migrationsPath}' does not exist");
        }
        
        foreach (scandir($this->migrationsPath) as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            
            if (substr($file, -4) === '.php') {
                $files[] = $file;
            }
        }
        
        sort($files);
        
        return $files;
    }
    
    protected function getRanMigrations()
    {
        $stmt = $this->pdo->query("SELECT migration FROM {$this->migrationsTable}");
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }
    
    protected function getNextBatchNumber()
    {
        $stmt = $this->pdo->query("SELECT MAX(batch) FROM {$this->migrationsTable}");
        $lastBatch = $stmt->fetchColumn();
        
        return $lastBatch ? $lastBatch + 1 : 1;
    }
    
    protected function recordMigration($file, $batch)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->migrationsTable} (migration, batch) VALUES (?, ?)");
        $stmt->execute([$file, $batch]);
    }
    
    protected function getMigrationClassName($file)
    {
        // Remove the file extension
        $className = substr($file, 0, -4);
        
        // Remove the leading numbers and underscores
        if (preg_match('/^\d+_(.+)$/', $className, $matches)) {
            $className = $matches[1];
        }
        
        // Convert to CamelCase if the filename is in snake_case
        $className = str_replace(' ', '', ucwords(str_replace('_', ' ', $className)));
        
        return $className;
    }
    
    public function rollback($steps = 1)
    {
        $migrations = $this->getMigrationsToRollback($steps);
        $rolledBack = [];
        
        foreach ($migrations as $migration) {
            $file = $migration['migration'];
            $filePath = $this->migrationsPath . '/' . $file;
            
            if (!file_exists($filePath)) {
                throw new \Exception("Migration file '{$file}' not found");
            }
            
            require_once $filePath;
            
            $className = $this->getMigrationClassName($file);
            
            if (!class_exists($className)) {
                throw new \Exception("Migration class '{$className}' not found in file '{$file}'");
            }
            
            $instance = new $className();
            
            if (!($instance instanceof Migration)) {
                throw new \Exception("Migration class '{$className}' must extend OneMigrator\\Migration");
            }
            
            // Run the down method
            $this->pdo->exec($instance->down());
            
            // Remove from migrations table
            $this->removeMigration($file);
            
            $rolledBack[] = $file;
        }
        
        return $rolledBack;
    }
    
    protected function getMigrationsToRollback($steps)
    {
        $query = "SELECT * FROM {$this->migrationsTable} ORDER BY id DESC";
        
        if ($steps > 0) {
            $batches = $this->pdo->query("SELECT batch FROM {$this->migrationsTable} ORDER BY batch DESC LIMIT {$steps}")->fetchAll(\PDO::FETCH_COLUMN);
            
            if (!empty($batches)) {
                $batchesStr = implode(',', array_unique($batches));
                $query = "SELECT * FROM {$this->migrationsTable} WHERE batch IN ({$batchesStr}) ORDER BY id DESC";
            }
        }
        
        return $this->pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    protected function removeMigration($file)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->migrationsTable} WHERE migration = ?");
        $stmt->execute([$file]);
    }
}
