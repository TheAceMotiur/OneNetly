# Sentora Changelog

## Version 2.0.2 - In Development

### New Features
- ✨ **Ubuntu 22.04 LTS Support**: Full support for Ubuntu 22.04 (Jammy Jellyfish)
  - PHP 8.1 compatibility
  - Apache 2.4.52+ support
  - MariaDB 10.6 / MySQL 8.0 support
  - Modern OpenSSL 3.0 integration

### Platform Support
- ✅ Added Ubuntu 22.04 LTS (Jammy Jellyfish) support
- ✅ Updated Ubuntu 20.04 LTS support
- ✅ Maintained Debian 11 support
- ✅ Added Rocky Linux 9 support
- ✅ Added AlmaLinux 9 support

### PHP 8.1 Compatibility
- 🔧 Updated core classes for PHP 8.1 strict types
- 🔧 Replaced deprecated `create_function()` with closures
- 🔧 Fixed null safety issues
- 🔧 Updated all database drivers
- 🔧 Modernized error handling

### Security Enhancements
- 🔒 OpenSSL 3.0 support with modern cipher suites
- 🔒 TLS 1.3 enabled by default
- 🔒 Updated password hashing mechanisms
- 🔒 Enhanced CSRF protection
- 🔒 Improved XSS filtering

### Apache Updates
- ⚙️ Apache 2.4.52+ compatibility
- ⚙️ HTTP/2 support improvements
- ⚙️ Updated security headers
- ⚙️ Modern SSL/TLS configuration

### Database Updates
- 💾 MariaDB 10.6 support
- 💾 MySQL 8.0 support
- 💾 Updated database schema for compatibility
- 💾 Improved query performance

### Mail Server Updates
- 📧 Postfix 3.6 support
- 📧 Dovecot 2.3 enhancements
- 📧 Modern SASL authentication
- 📧 TLS 1.3 for mail services

### Bug Fixes
- 🐛 Fixed PHP 8.1 deprecation warnings
- 🐛 Corrected systemd service dependencies
- 🐛 Fixed AppArmor profile conflicts
- 🐛 Resolved UTF-8 encoding issues
- 🐛 Fixed timezone handling

### Documentation
- 📚 Added comprehensive Ubuntu 22.04 guide
- 📚 Created SUPPORTED_SYSTEMS.md
- 📚 Updated installation instructions
- 📚 Enhanced troubleshooting guides

### Developer Changes
- 👨‍💻 Modern PHP syntax throughout codebase
- 👨‍💻 Improved code quality and standards
- 👨‍💻 Updated third-party libraries
- 👨‍💻 Enhanced API documentation

### Known Issues
- ⚠️ Ubuntu 18.04 entering legacy support phase
- ⚠️ CentOS 7 support will be deprecated in next version
- ⚠️ PHP 7.4 support will be removed in next major version

---

## Version 2.0.1 - Previous Release

### Features
- Updated module system
- Improved backup functionality
- Enhanced security features
- Various bug fixes

---

## Version 2.0.0 - Major Release

### Features
- Complete UI redesign
- Modern PHP 7.4 support
- Enhanced security framework
- Improved module architecture
- Better performance optimization

---

For detailed release notes and upgrade instructions, visit:
- [Download Page](https://sentora.org/download/)
- [Upgrade Guide](https://sentora.org/upgrade/)
- [GitHub Releases](https://github.com/sentora/sentora-core/releases)
