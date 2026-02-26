-- Files table - stores uploaded file metadata
CREATE TABLE IF NOT EXISTS files (
    id VARCHAR(12) PRIMARY KEY,
    original_name VARCHAR(255) NOT NULL,
    drive_file_id VARCHAR(255) NOT NULL,
    account_index INT NOT NULL DEFAULT 0,
    size BIGINT UNSIGNED NOT NULL,
    mime VARCHAR(100) NOT NULL DEFAULT 'application/octet-stream',
    uploaded_at DATETIME NOT NULL,
    last_downloaded_at DATETIME NULL,
    download_count INT UNSIGNED NOT NULL DEFAULT 0,
    expires_after_days INT NOT NULL DEFAULT 90,
    pending_deletion TINYINT(1) NOT NULL DEFAULT 0,
    INDEX idx_drive_file_id (drive_file_id),
    INDEX idx_uploaded_at (uploaded_at),
    INDEX idx_last_downloaded_at (last_downloaded_at),
    INDEX idx_pending_deletion (pending_deletion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
