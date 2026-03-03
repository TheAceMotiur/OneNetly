-- API Keys table - stores API authentication keys
CREATE TABLE IF NOT EXISTS api_keys (
    id INT AUTO_INCREMENT PRIMARY KEY,
    api_key VARCHAR(64) UNIQUE NOT NULL,
    api_secret VARCHAR(128) NOT NULL,
    name VARCHAR(100) NOT NULL,
    website_url VARCHAR(255) NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    last_used_at DATETIME NULL,
    total_uploads INT UNSIGNED NOT NULL DEFAULT 0,
    total_downloads INT UNSIGNED NOT NULL DEFAULT 0,
    rate_limit_per_hour INT NOT NULL DEFAULT 100,
    INDEX idx_api_key (api_key),
    INDEX idx_is_active (is_active),
    INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- API usage logs table - tracks API usage for analytics and rate limiting
CREATE TABLE IF NOT EXISTS api_usage_logs (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    api_key_id INT NOT NULL,
    endpoint VARCHAR(100) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    user_agent TEXT NULL,
    request_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    response_code INT NOT NULL,
    file_id VARCHAR(12) NULL,
    INDEX idx_api_key_id (api_key_id),
    INDEX idx_request_time (request_time),
    INDEX idx_file_id (file_id),
    FOREIGN KEY (api_key_id) REFERENCES api_keys(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
