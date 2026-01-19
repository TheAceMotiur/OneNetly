# Ubuntu 22.04 LTS (Jammy Jellyfish) Support

Sentora now fully supports Ubuntu 22.04 LTS (Jammy Jellyfish), the latest long-term support release from Canonical.

## What's New in Ubuntu 22.04

Ubuntu 22.04 LTS brings several improvements that enhance Sentora's performance and security:

### Key Updates
- **PHP 8.1**: Improved performance with JIT compilation and modern language features
- **Apache 2.4.52+**: Enhanced security and HTTP/2 support
- **MySQL 8.0 / MariaDB 10.6**: Better performance and security features
- **OpenSSL 3.0**: Modern cryptographic library with updated algorithms
- **Linux Kernel 5.15 LTS**: Long-term support kernel with enhanced security
- **systemd 249**: Improved service management and system initialization

## Installation

### Automated Installation (Recommended)
The official OneNetly one-click installer automatically detects Ubuntu 22.04 and configures all components:

```bash
# One-click installation
bash <(curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh)
```

**Alternative installation methods:**

```bash
# Method 1: Download first, then run
wget https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh
sudo bash install.sh

# Method 2: Using curl with bash
curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh | sudo bash
```

### Pre-installation Requirements

1. **Fresh Ubuntu 22.04 Installation**: Start with a clean Ubuntu 22.04 server
2. **Root Access**: You need sudo or root privileges
3. **FQDN Configured**: Set up a proper hostname and domain
4. **Internet Connection**: Required for downloading packages
5. **No Conflicting Services**: Remove any pre-installed web servers

### System Preparation

```bash
# Update system packages
sudo apt update && sudo apt upgrade -y

# Set hostname (replace with your domain)
sudo hostnamectl set-hostname panel.yourdomain.com

# Verify hostname
hostnamectl

# Install required dependencies
sudo apt install -y curl wget sudo
```

## PHP 8.1 Compatibility

Sentora 2.0.2 is fully compatible with PHP 8.1. All deprecated functions have been updated:

### Updated Components
- ✅ Core classes compatible with PHP 8.1 strict types
- ✅ Database drivers updated for modern MySQL/MariaDB
- ✅ Module system compatible with PHP 8.1
- ✅ All third-party libraries updated
- ✅ Deprecated `create_function()` replaced with closures
- ✅ Null safety improvements implemented

### PHP Extensions Required
The installer automatically installs these PHP 8.1 extensions:
- php8.1-cli
- php8.1-common
- php8.1-curl
- php8.1-gd
- php8.1-imap
- php8.1-intl
- php8.1-mbstring
- php8.1-mysql
- php8.1-xml
- php8.1-zip
- php8.1-bcmath

## Apache Configuration

Ubuntu 22.04 includes Apache 2.4.52 with modern security defaults:

### Enabled Modules
- mod_rewrite (URL rewriting)
- mod_suexec (security)
- mod_ssl (HTTPS support)
- mod_headers (HTTP headers manipulation)
- mod_deflate (compression)
- mod_expires (caching control)

### Virtual Host Configuration
Sentora automatically configures Apache with:
- Individual virtual hosts per domain
- SuExec for user isolation
- HTTP/2 support (when SSL is enabled)
- Security headers (HSTS, X-Frame-Options, etc.)

## Database Support

### MariaDB 10.6 (Recommended)
Ubuntu 22.04 ships with MariaDB 10.6, which Sentora fully supports:
- Better performance than MySQL 8.0
- Full MySQL compatibility
- Enhanced security features
- InnoDB improvements

### MySQL 8.0
MySQL 8.0 is also supported if preferred:
- Native JSON support
- Window functions
- Common table expressions (CTEs)
- Modern authentication (caching_sha2_password)

## Mail Server Configuration

### Postfix 3.6
Ubuntu 22.04's Postfix 3.6 works seamlessly with Sentora:
- TLS 1.3 support
- Modern authentication mechanisms
- Spam protection integration
- Virtual domains support

### Dovecot 2.3
Full IMAP/POP3 support with:
- Secure authentication
- SSL/TLS encryption
- Virtual mailboxes
- Sieve mail filtering

## FTP Server

ProFTPd 1.3 on Ubuntu 22.04:
- Passive mode support
- TLS/SSL encryption
- Virtual users
- Per-user quotas
- Chroot jails for security

## DNS Server

BIND 9.18 provides:
- DNSSEC support
- Dynamic updates
- Zone transfers
- IPv6 support

## Security Enhancements

### OpenSSL 3.0
- Modern cipher suites
- TLS 1.3 by default
- Deprecated algorithms removed
- Enhanced key derivation

### System Hardening
- AppArmor enabled by default
- Automatic security updates available
- Firewall (ufw) integration
- Fail2ban for intrusion prevention

## Known Issues and Workarounds

### Issue 1: systemd Service Timing
**Problem**: Some services may have timing issues during boot
**Solution**: Sentora installer configures proper service dependencies

### Issue 2: AppArmor Profiles
**Problem**: AppArmor may block some Sentora operations
**Solution**: Installer configures appropriate AppArmor profiles

### Issue 3: UFW Firewall
**Problem**: Default firewall may block required ports
**Solution**: Run the firewall configuration tool after installation

## Performance Tuning

### Recommended Settings for Ubuntu 22.04

#### Apache Optimization
```apache
# /etc/apache2/mods-enabled/mpm_event.conf
<IfModule mpm_event_module>
    StartServers             4
    MinSpareThreads         25
    MaxSpareThreads         75
    ThreadLimit             64
    ThreadsPerChild         25
    MaxRequestWorkers      150
    MaxConnectionsPerChild  3000
</IfModule>
```

#### PHP-FPM Optimization
```ini
# /etc/php/8.1/fpm/php.ini
memory_limit = 256M
upload_max_filesize = 128M
post_max_size = 128M
max_execution_time = 300
```

#### MariaDB Optimization
```ini
# /etc/mysql/mariadb.conf.d/50-server.cnf
[mysqld]
innodb_buffer_pool_size = 1G
innodb_log_file_size = 256M
max_connections = 200
query_cache_size = 0
query_cache_type = 0
```

## Migration from Older Ubuntu Versions

### From Ubuntu 20.04
1. Backup all data and databases
2. Fresh install Ubuntu 22.04
3. Install Sentora on the new system
4. Restore user data and databases
5. Update DNS records

### From Ubuntu 18.04
1. Backup everything (18.04 is EOL)
2. Fresh install Ubuntu 22.04
3. Install Sentora
4. Migrate data carefully
5. Test all services

## Testing Your Installation

After installation, verify all services:

```bash
# Check Apache status
sudo systemctl status apache2

# Check MariaDB status
sudo systemctl status mariadb

# Check Postfix status
sudo systemctl status postfix

# Check Dovecot status
sudo systemctl status dovecot

# Check ProFTPd status
sudo systemctl status proftpd

# Check BIND status
sudo systemctl status named

# View all Sentora-related services
sudo systemctl list-units | grep sentora
```

## Troubleshooting

### Service Startup Issues
```bash
# Check service logs
sudo journalctl -xeu <service-name>

# Restart all Sentora services
sudo systemctl restart apache2 mariadb postfix dovecot proftpd named
```

### PHP Issues
```bash
# Check PHP version
php -v

# Test PHP-FPM
sudo php-fpm8.1 -t

# View PHP error log
sudo tail -f /var/log/php8.1-fpm.log
```

### Permission Issues
```bash
# Fix Sentora directory permissions
sudo /etc/sentora/panel/bin/setso --set permissions
```

## Frequently Asked Questions

### Is Ubuntu 22.04 production-ready for Sentora?
Yes, Sentora 2.0.2 has been thoroughly tested on Ubuntu 22.04 LTS.

### Can I upgrade from Ubuntu 20.04 to 22.04?
Fresh installation is recommended. Ubuntu's dist-upgrade may cause conflicts.

### What about Ubuntu 22.10/23.04/23.10?
LTS versions are recommended for production. Non-LTS versions are not officially supported.

### Does Sentora support ARM64 on Ubuntu 22.04?
Yes, Sentora works on ARM64 (aarch64) architecture including Raspberry Pi 4.

### Can I use snap packages?
The official installer uses APT packages. Snap packages are not recommended for core services.

## Getting Support

For Ubuntu 22.04 specific issues:
1. Check the [Sentora Forums](https://forums.sentora.org/)
2. Search the [GitHub Issues](https://github.com/sentora/sentora-core/issues)
3. Read the [official documentation](http://docs.sentora.org/)

## Contributing

Help improve Ubuntu 22.04 support:
- Report bugs specific to Ubuntu 22.04
- Submit patches and improvements
- Update documentation
- Share your configuration optimizations

---

**Last Updated**: January 2026
**Sentora Version**: 2.0.2
**Ubuntu Version**: 22.04 LTS (Jammy Jellyfish)
