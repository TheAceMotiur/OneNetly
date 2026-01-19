# Supported Operating Systems

Sentora 2.0.2 supports the following operating systems and distributions:

## Linux Distributions

### Ubuntu
- **Ubuntu 22.04 LTS (Jammy Jellyfish)** - Fully Supported ✓
- **Ubuntu 20.04 LTS (Focal Fossa)** - Supported ✓
- **Ubuntu 18.04 LTS (Bionic Beaver)** - Legacy Support

### Debian
- **Debian 11 (Bullseye)** - Supported ✓
- **Debian 10 (Buster)** - Legacy Support

### CentOS / RHEL
- **CentOS Stream 9** - Supported ✓
- **CentOS Stream 8** - Supported ✓
- **Rocky Linux 9** - Supported ✓
- **Rocky Linux 8** - Supported ✓
- **AlmaLinux 9** - Supported ✓
- **AlmaLinux 8** - Supported ✓

## System Requirements

### Minimum Requirements
- **CPU**: 1 GHz processor
- **RAM**: 1 GB (2 GB recommended)
- **Disk Space**: 10 GB available space
- **Network**: Internet connection for installation and updates

### Software Requirements for Ubuntu 22.04
The Sentora installer will automatically install and configure:
- Apache 2.4+
- PHP 8.0+ (with required extensions)
- MySQL 8.0+ / MariaDB 10.6+
- BIND 9.18+
- ProFTPd 1.3+
- Postfix 3.6+
- Dovecot 2.3+

## Installation Notes

### Ubuntu 22.04 Specific Notes
Ubuntu 22.04 LTS (Jammy Jellyfish) introduces several improvements that benefit Sentora:

1. **PHP 8.1 Support**: Ubuntu 22.04 ships with PHP 8.1, which provides better performance and security
2. **OpenSSL 3.0**: Enhanced cryptographic capabilities
3. **systemd 249**: Improved service management
4. **Kernel 5.15**: Latest LTS kernel with enhanced security features

### Pre-installation Checklist
Before installing Sentora on Ubuntu 22.04:

1. Ensure you have a fresh Ubuntu 22.04 LTS installation
2. Update the system:
   ```bash
   sudo apt update && sudo apt upgrade -y
   ```
3. Set a proper hostname:
   ```bash
   sudo hostnamectl set-hostname your-hostname.domain.com
   ```
4. Ensure your system has a valid FQDN (Fully Qualified Domain Name)
5. Disable any existing web servers or conflicting services

### Known Compatibility Notes

#### Apache Configuration
- Ubuntu 22.04 uses Apache 2.4.52+ with updated security defaults
- The installer automatically configures Apache for optimal Sentora operation

#### PHP Compatibility
- PHP 8.1 is fully supported with all required extensions
- Legacy PHP code has been updated for PHP 8.1 compatibility

#### MySQL/MariaDB
- Both MySQL 8.0 and MariaDB 10.6 are supported
- The installer defaults to MariaDB for better compatibility

#### Postfix/Dovecot
- Mail stack fully compatible with Ubuntu 22.04 packages
- TLS 1.3 support enabled by default

## Testing Status

| Distribution | Version | Status | Last Tested |
|--------------|---------|--------|-------------|
| Ubuntu | 22.04 LTS | ✅ Stable | January 2026 |
| Ubuntu | 20.04 LTS | ✅ Stable | January 2026 |
| Ubuntu | 18.04 LTS | ⚠️ Legacy | December 2025 |
| Debian | 11 | ✅ Stable | January 2026 |
| Debian | 10 | ⚠️ Legacy | November 2025 |

## Getting Help

If you encounter issues with Ubuntu 22.04 or any supported system:

1. Check our [documentation](http://docs.sentora.org/)
2. Visit the [forums](https://forums.sentora.org/)
3. Report bugs on our [issue tracker](https://github.com/sentora/sentora-core/issues)

## Future Support

We continuously work to support the latest stable releases of popular Linux distributions. If you would like support for a specific distribution, please open a feature request on our GitHub repository.
