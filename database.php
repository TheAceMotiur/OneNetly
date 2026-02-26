<?php
/**
 * Database Layer - MySQL Connection & Helpers
 * Provides PDO-based database operations for file management
 */

// Global PDO instance
$GLOBALS['db_connection'] = null;

/**
 * Get database connection (singleton pattern)
 */
function getDB(): PDO {
    if ($GLOBALS['db_connection'] !== null) {
        return $GLOBALS['db_connection'];
    }
    
    try {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            DB_HOST,
            DB_NAME,
            DB_CHARSET
        );
        
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        $GLOBALS['db_connection'] = $pdo;
        
        return $pdo;
    } catch (PDOException $e) {
        error_log('Database connection failed: ' . $e->getMessage());
        die('Database connection failed. Please check your configuration.');
    }
}

/**
 * Initialize database schema if not exists
 * Reads and executes SQL migration files from database/ folder
 */
function initDatabase(): bool {
    try {
        $db = getDB();
        $migrationDir = __DIR__ . '/database';
        
        // Check if migration directory exists
        if (!is_dir($migrationDir)) {
            error_log('Database migration directory not found: ' . $migrationDir);
            return false;
        }
        
        // Get all SQL files in order (01_files.sql, 02_accounts.sql, etc.)
        $files = glob($migrationDir . '/*.sql');
        sort($files); // Sort to ensure order (01, 02, 03, etc.)
        
        if (empty($files)) {
            error_log('No SQL migration files found in: ' . $migrationDir);
            return false;
        }
        
        // Execute each migration file
        foreach ($files as $file) {
            $sql = file_get_contents($file);
            if ($sql === false) {
                error_log('Failed to read migration file: ' . $file);
                continue;
            }
            
            // Remove comments and split by semicolons for multiple statements
            $statements = array_filter(
                array_map('trim', explode(';', $sql)),
                function($stmt) {
                    return !empty($stmt) && !preg_match('/^--/', $stmt);
                }
            );
            
            foreach ($statements as $statement) {
                if (!empty($statement)) {
                    $db->exec($statement);
                }
            }
        }
        
        return true;
    } catch (PDOException $e) {
        error_log('Database initialization failed: ' . $e->getMessage());
        return false;
    }
}

// ── FILE OPERATIONS ──────────────────────────────────────────────────────────

/**
 * Get all files or filter by criteria
 */
function getFiles(array $where = [], int $limit = 0, int $offset = 0): array {
    $db = getDB();
    $sql = "SELECT * FROM files";
    $params = [];
    
    if (!empty($where)) {
        $conditions = [];
        foreach ($where as $key => $value) {
            $conditions[] = "$key = ?";
            $params[] = $value;
        }
        $sql .= " WHERE " . implode(' AND ', $conditions);
    }
    
    $sql .= " ORDER BY uploaded_at DESC";
    
    if ($limit > 0) {
        $sql .= " LIMIT $limit";
        if ($offset > 0) {
            $sql .= " OFFSET $offset";
        }
    }
    
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

/**
 * Get a single file by ID
 */
function getFileById(string $id): ?array {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM files WHERE id = ?");
    $stmt->execute([$id]);
    $result = $stmt->fetch();
    return $result ?: null;
}

/**
 * Insert a new file record
 */
function insertFile(array $data): bool {
    $db = getDB();
    
    $sql = "INSERT INTO files (
        id, original_name, drive_file_id, account_index, size, mime,
        uploaded_at, expires_after_days
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $db->prepare($sql);
    return $stmt->execute([
        $data['id'],
        $data['original_name'],
        $data['drive_file_id'],
        $data['account_index'] ?? 0,
        $data['size'] ?? 0,
        $data['mime'] ?? 'application/octet-stream',
        $data['uploaded_at'] ?? date('Y-m-d H:i:s'),
        $data['expires_after_days'] ?? EXPIRY_DAYS,
    ]);
}

/**
 * Update a file record
 */
function updateFile(string $id, array $data): bool {
    $db = getDB();
    
    $allowedFields = [
        'original_name', 'drive_file_id', 'account_index', 'size', 'mime',
        'last_downloaded_at', 'download_count', 'expires_after_days', 'pending_deletion'
    ];
    
    $updates = [];
    $params = [];
    
    foreach ($data as $key => $value) {
        if (in_array($key, $allowedFields)) {
            $updates[] = "$key = ?";
            $params[] = $value;
        }
    }
    
    if (empty($updates)) {
        return false;
    }
    
    $params[] = $id;
    $sql = "UPDATE files SET " . implode(', ', $updates) . " WHERE id = ?";
    
    $stmt = $db->prepare($sql);
    return $stmt->execute($params);
}

/**
 * Delete a file record
 */
function deleteFile(string $id): bool {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM files WHERE id = ?");
    return $stmt->execute([$id]);
}

/**
 * Increment download count and update last downloaded time
 */
function incrementDownloadCount(string $id): bool {
    $db = getDB();
    $sql = "UPDATE files SET 
            download_count = download_count + 1,
            last_downloaded_at = ?
            WHERE id = ?";
    $stmt = $db->prepare($sql);
    return $stmt->execute([date('Y-m-d H:i:s'), $id]);
}

/**
 * Get files that need cleanup (expired)
 */
function getExpiredFiles(): array {
    $db = getDB();
    $sql = "
        SELECT * FROM files
        WHERE (
            (last_downloaded_at IS NOT NULL AND 
             TIMESTAMPDIFF(DAY, last_downloaded_at, NOW()) >= expires_after_days)
            OR
            (last_downloaded_at IS NULL AND 
             TIMESTAMPDIFF(DAY, uploaded_at, NOW()) >= expires_after_days)
        )
        OR pending_deletion = 1
    ";
    $stmt = $db->query($sql);
    return $stmt->fetchAll();
}

/**
 * Get total file count
 */
function getFileCount(array $where = []): int {
    $db = getDB();
    $sql = "SELECT COUNT(*) FROM files";
    $params = [];
    
    if (!empty($where)) {
        $conditions = [];
        foreach ($where as $key => $value) {
            $conditions[] = "$key = ?";
            $params[] = $value;
        }
        $sql .= " WHERE " . implode(' AND ', $conditions);
    }
    
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return (int) $stmt->fetchColumn();
}

// ── ACCOUNT OPERATIONS ────────────────────────────────────────────────────────

/**
 * Get all Drive accounts
 */
function getDriveAccounts(): array {
    $db = getDB();
    $stmt = $db->query("SELECT * FROM accounts ORDER BY id");
    $accounts = $stmt->fetchAll();
    
    return $accounts;
}

/**
 * Insert a new account
 */
function insertAccount(array $data): bool {
    $db = getDB();
    $sql = "INSERT INTO accounts (id, client_id, client_secret, refresh_token, folder_id)
            VALUES (?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
            client_id = VALUES(client_id),
            client_secret = VALUES(client_secret),
            refresh_token = VALUES(refresh_token),
            folder_id = VALUES(folder_id)";
    
    $stmt = $db->prepare($sql);
    return $stmt->execute([
        $data['id'],
        $data['client_id'],
        $data['client_secret'],
        $data['refresh_token'],
        $data['folder_id'] ?? null,
    ]);
}

/**
 * Update an account
 */
function updateAccount(string $id, array $data): bool {
    $db = getDB();
    $allowedFields = ['client_id', 'client_secret', 'refresh_token', 'folder_id'];
    
    $updates = [];
    $params = [];
    
    foreach ($data as $key => $value) {
        if (in_array($key, $allowedFields)) {
            $updates[] = "$key = ?";
            $params[] = $value;
        }
    }
    
    if (empty($updates)) {
        return false;
    }
    
    $params[] = $id;
    $sql = "UPDATE accounts SET " . implode(', ', $updates) . " WHERE id = ?";
    
    $stmt = $db->prepare($sql);
    return $stmt->execute($params);
}

/**
 * Delete an account
 */
function deleteAccount(string $id): bool {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM accounts WHERE id = ?");
    return $stmt->execute([$id]);
}

// ── METADATA OPERATIONS ────────────────────────────────────────────────────────

/**
 * Get metadata value
 */
function getMetadata(string $key, $default = null) {
    $db = getDB();
    $stmt = $db->prepare("SELECT value FROM metadata WHERE key_name = ?");
    $stmt->execute([$key]);
    $result = $stmt->fetchColumn();
    return $result !== false ? $result : $default;
}

/**
 * Set metadata value
 */
function setMetadata(string $key, $value): bool {
    $db = getDB();
    $sql = "INSERT INTO metadata (key_name, value) VALUES (?, ?)
            ON DUPLICATE KEY UPDATE value = VALUES(value)";
    $stmt = $db->prepare($sql);
    return $stmt->execute([$key, (string)$value]);
}

/**
 * Get current account pointer for round-robin
 */
function getAccountPointer(): int {
    return (int) getMetadata('account_pointer', 0);
}

/**
 * Set account pointer
 */
function setAccountPointer(int $index): bool {
    return setMetadata('account_pointer', $index);
}

// Initialize database on first load
initDatabase();
