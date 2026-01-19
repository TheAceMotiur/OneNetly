# Compatibility Matrix

This document provides detailed compatibility information for Sentora 2.0.2 across different platforms and software versions.

## Operating System Support

| OS | Version | Codename | Status | PHP | Apache | MariaDB | Notes |
|---|---|---|---|---|---|---|---|
| **Ubuntu** | 22.04 LTS | Jammy | ✅ Stable | 8.1 | 2.4.52+ | 10.6 | **Recommended** |
| Ubuntu | 20.04 LTS | Focal | ✅ Stable | 7.4/8.0 | 2.4.41+ | 10.3 | Stable |
| Ubuntu | 18.04 LTS | Bionic | ⚠️ Legacy | 7.2/7.4 | 2.4.29+ | 10.1 | EOL April 2023 |
| **Debian** | 11 | Bullseye | ✅ Stable | 7.4/8.0 | 2.4.51+ | 10.5 | Supported |
| Debian | 10 | Buster | ⚠️ Legacy | 7.3 | 2.4.38+ | 10.3 | End of life 2024 |
| **Rocky** | 9 | - | ✅ Stable | 8.0 | 2.4.53+ | 10.5 | RHEL compatible |
| Rocky | 8 | - | ✅ Stable | 7.4/8.0 | 2.4.37+ | 10.3 | RHEL compatible |
| **AlmaLinux** | 9 | - | ✅ Stable | 8.0 | 2.4.53+ | 10.5 | RHEL compatible |
| AlmaLinux | 8 | - | ✅ Stable | 7.4/8.0 | 2.4.37+ | 10.3 | RHEL compatible |
| CentOS | 7 | - | ⚠️ Deprecated | 7.4 | 2.4.6 | 10.3 | EOL June 2024 |

**Legend:**
- ✅ Stable: Fully tested and recommended for production
- ⚠️ Legacy: Supported but not recommended for new installations
- ❌ Deprecated: No longer supported
- 🔧 Development: Under testing, not production-ready

## PHP Compatibility

### PHP 8.1 (Ubuntu 22.04 Default)

| Feature | Status | Notes |
|---|---|---|
| Core Classes | ✅ Compatible | All updated for strict types |
| Database Drivers | ✅ Compatible | MySQLi and PDO working |
| Module System | ✅ Compatible | All modules tested |
| Third-party Libraries | ✅ Compatible | Updated to PHP 8.1 compatible versions |
| Deprecated Functions | ✅ Fixed | All `create_function()` replaced |
| Null Safety | ✅ Implemented | Proper null checks added |
| Named Arguments | ✅ Supported | Can be used in custom code |
| Attributes | ⚡ Partial | Core doesn't use, available for modules |
| Enums | ⚡ Partial | Core doesn't use, available for modules |
| Fibers | ❌ Not Used | Not implemented in core |

### PHP Version Support Matrix

| PHP Version | Sentora 2.0.2 | Status | Recommended |
|---|---|---|---|
| PHP 8.2 | 🔧 Testing | Under evaluation | No |
| **PHP 8.1** | ✅ Full | Fully tested | **Yes** |
| PHP 8.0 | ✅ Full | Fully tested | Yes |
| PHP 7.4 | ⚠️ Legacy | Works but deprecated | No |
| PHP 7.3 | ⚠️ Legacy | Minimal testing | No |
| PHP 7.2 | ❌ Not Supported | End of life | No |
| PHP 7.1 or lower | ❌ Not Supported | Incompatible | No |

## Apache Compatibility

### Apache 2.4 (All Supported Platforms)

| Module | Required | Ubuntu 22.04 | Notes |
|---|---|---|---|
| mod_rewrite | ✅ Yes | 2.4.52+ | URL rewriting |
| mod_suexec | ✅ Yes | 2.4.52+ | User isolation |
| mod_ssl | ✅ Yes | 2.4.52+ | HTTPS support |
| mod_headers | ✅ Yes | 2.4.52+ | Security headers |
| mod_deflate | ⚡ Recommended | 2.4.52+ | Compression |
| mod_expires | ⚡ Recommended | 2.4.52+ | Caching control |
| mod_http2 | ⚡ Optional | 2.4.52+ | HTTP/2 support |
| mod_security2 | ⚡ Optional | - | WAF (install separately) |

### Apache MPM Support

| MPM | Status | Performance | Recommended |
|---|---|---|---|
| **event** | ✅ Preferred | Excellent | Yes (default) |
| worker | ✅ Supported | Good | Alternative |
| prefork | ⚠️ Legacy | Poor | PHP 5.x only |

## Database Compatibility

### MariaDB (Recommended)

| Version | Status | Ubuntu 22.04 | Features |
|---|---|---|---|
| **10.6** | ✅ Recommended | Default | Latest features |
| 10.5 | ✅ Supported | Available | Stable |
| 10.3 | ⚠️ Legacy | Manual install | Older systems |
| 10.1 | ❌ Not Supported | EOL | Too old |

### MySQL

| Version | Status | Ubuntu 22.04 | Notes |
|---|---|---|---|
| **8.0** | ✅ Supported | Available | Modern features |
| 5.7 | ⚠️ Legacy | Manual install | EOL October 2023 |
| 5.6 or lower | ❌ Not Supported | EOL | Incompatible |

### Database Engine Support

| Engine | Status | Performance | Notes |
|---|---|---|---|
| **InnoDB** | ✅ Recommended | Excellent | ACID compliant, default |
| MyISAM | ⚠️ Legacy | Good | No transactions |
| Aria | ⚡ Optional | Good | MariaDB specific |
| TokuDB | ❌ Deprecated | - | Removed in MariaDB 10.5+ |

## Mail Server Compatibility

### Postfix

| Version | Ubuntu 22.04 | Features |
|---|---|---|
| **3.6** | ✅ Default | TLS 1.3, modern auth |
| 3.4+ | ✅ Compatible | Older but works |
| 3.3 or lower | ⚠️ Legacy | Limited features |

### Dovecot

| Version | Ubuntu 22.04 | Features |
|---|---|---|
| **2.3** | ✅ Default | Full feature support |
| 2.2 | ✅ Compatible | Older but stable |
| 2.1 or lower | ⚠️ Legacy | Limited support |

### SASL Authentication

| Method | Status | Security |
|---|---|---|
| PLAIN | ✅ Supported | Low (use with TLS) |
| LOGIN | ✅ Supported | Low (use with TLS) |
| CRAM-MD5 | ✅ Supported | Medium |
| DIGEST-MD5 | ⚠️ Deprecated | Medium |
| SCRAM-SHA-1 | ✅ Supported | High |
| SCRAM-SHA-256 | ✅ Supported | High (recommended) |

## FTP Server Compatibility

### ProFTPd

| Version | Ubuntu 22.04 | TLS Support | Status |
|---|---|---|---|
| **1.3.7+** | ✅ Default | TLS 1.3 | Recommended |
| 1.3.6 | ✅ Compatible | TLS 1.2 | Stable |
| 1.3.5 or lower | ⚠️ Legacy | TLS 1.2 | Not recommended |

## DNS Server Compatibility

### BIND

| Version | Ubuntu 22.04 | DNSSEC | Status |
|---|---|---|---|
| **9.18** | ✅ Default | Full | Recommended |
| 9.16 | ✅ Compatible | Full | LTS version |
| 9.11 or lower | ⚠️ Legacy | Limited | End of life |

## SSL/TLS Support

### OpenSSL

| Version | Ubuntu 22.04 | TLS Version | Status |
|---|---|---|---|
| **3.0** | ✅ Default | 1.3 | Latest |
| 1.1.1 | ✅ Compatible | 1.3 | Stable |
| 1.1.0 | ⚠️ EOL | 1.2 | Not recommended |
| 1.0.2 or lower | ❌ Unsupported | 1.2 | Insecure |

### Supported Cipher Suites (OpenSSL 3.0)

| Protocol | Status | Recommended |
|---|---|---|
| TLS 1.3 | ✅ Default | Yes |
| TLS 1.2 | ✅ Fallback | Yes |
| TLS 1.1 | ❌ Disabled | No |
| TLS 1.0 | ❌ Disabled | No |
| SSL 3.0 | ❌ Disabled | No |
| SSL 2.0 | ❌ Disabled | No |

## Python Support (For Scripts)

| Version | Ubuntu 22.04 | Status | Notes |
|---|---|---|---|
| Python 3.10 | ✅ Default | Recommended | System Python |
| Python 3.9 | ✅ Available | Supported | Alternative |
| Python 3.8 | ✅ Available | Supported | Older |
| Python 2.7 | ❌ Removed | EOL | Not available |

## Kernel Support

### Linux Kernel

| Version | Ubuntu 22.04 | Status | Notes |
|---|---|---|---|
| **5.15 LTS** | ✅ Default | Stable | Recommended |
| 5.13+ | ✅ Compatible | Testing | Newer features |
| 5.4 LTS | ✅ Compatible | Legacy | Ubuntu 20.04 |
| 4.x | ⚠️ Old | Legacy | Not tested |

## Control Panel Features

### Module Compatibility

| Module | Ubuntu 22.04 | Status |
|---|---|---|
| Apache Admin | ✅ | Full |
| MySQL Databases | ✅ | Full |
| MySQL Users | ✅ | Full |
| Domains | ✅ | Full |
| Sub-domains | ✅ | Full |
| Parked Domains | ✅ | Full |
| Mailboxes | ✅ | Full |
| Forwarders | ✅ | Full |
| Distribution Lists | ✅ | Full |
| FTP Management | ✅ | Full |
| DNS Manager | ✅ | Full |
| Backup Manager | ✅ | Full |
| Cron Manager | ✅ | Full |
| Package Manager | ✅ | Full |
| Client Management | ✅ | Full |
| phpMyAdmin | ✅ | Full (latest version) |
| Webmail | ✅ | Full (Roundcube) |
| phpSysInfo | ✅ | Full |
| File Manager | ✅ | Full |

## Third-Party Software

### phpMyAdmin

| Version | Compatibility | PHP | Notes |
|---|---|---|---|
| 5.2.x | ✅ Compatible | 8.1+ | Current |
| 5.1.x | ✅ Compatible | 7.4+ | Stable |
| 5.0.x | ⚠️ Legacy | 7.2+ | Older |
| 4.x | ❌ Not Supported | - | EOL |

### Roundcube Webmail

| Version | Compatibility | PHP | Notes |
|---|---|---|---|
| 1.6.x | ✅ Compatible | 7.3+ | Current |
| 1.5.x | ✅ Compatible | 7.3+ | Stable |
| 1.4.x | ⚠️ Legacy | 5.4+ | Older |

### phpSysInfo

| Version | Compatibility | PHP | Notes |
|---|---|---|---|
| 3.4.x | ✅ Compatible | 7.2+ | Current |
| 3.3.x | ✅ Compatible | 5.5+ | Stable |
| 3.2.x | ⚠️ Legacy | 5.3+ | Older |

## Browser Compatibility

Sentora panel interface supports:

| Browser | Minimum Version | Status |
|---|---|---|
| Chrome | 90+ | ✅ Full |
| Firefox | 88+ | ✅ Full |
| Safari | 14+ | ✅ Full |
| Edge | 90+ | ✅ Full |
| Opera | 76+ | ✅ Full |
| Internet Explorer | - | ❌ Not Supported |

## Hardware Recommendations

### Minimum Requirements (Small Sites)

| Component | Specification |
|---|---|
| CPU | 1 core @ 1 GHz |
| RAM | 1 GB |
| Disk | 10 GB |
| Network | 100 Mbps |

### Recommended (Medium Sites)

| Component | Specification |
|---|---|
| CPU | 2 cores @ 2 GHz |
| RAM | 4 GB |
| Disk | 50 GB SSD |
| Network | 1 Gbps |

### High-Performance (Large Sites)

| Component | Specification |
|---|---|
| CPU | 4+ cores @ 2.5+ GHz |
| RAM | 8+ GB |
| Disk | 100+ GB NVMe SSD |
| Network | 1+ Gbps |

## Architecture Support

| Architecture | Status | Notes |
|---|---|---|
| x86_64 (AMD64) | ✅ Full | Primary platform |
| ARM64 (aarch64) | ✅ Supported | Raspberry Pi 4, AWS Graviton |
| ARMv7 (32-bit) | ⚡ Limited | Older Raspberry Pi |
| i386 (32-bit x86) | ❌ Not Supported | Obsolete |

## Virtualization Support

| Platform | Status | Notes |
|---|---|---|
| KVM | ✅ Full | Recommended |
| VMware | ✅ Full | Tested |
| VirtualBox | ✅ Full | Development |
| Hyper-V | ✅ Full | Windows host |
| Xen | ✅ Supported | Cloud providers |
| Docker | ⚡ Experimental | Not officially supported |
| LXC/LXD | ⚡ Limited | Some limitations |
| OpenVZ | ⚠️ Issues | Not recommended |

## Cloud Provider Compatibility

| Provider | Status | Notes |
|---|---|---|
| AWS EC2 | ✅ Full | All instance types |
| DigitalOcean | ✅ Full | All droplet sizes |
| Linode | ✅ Full | All plans |
| Vultr | ✅ Full | All instance types |
| Google Cloud | ✅ Full | Compute Engine |
| Azure | ✅ Full | Virtual Machines |
| Hetzner | ✅ Full | Cloud & Dedicated |
| OVH | ✅ Full | VPS & Dedicated |

## Testing Status

Last comprehensive testing: **January 2026**

| Test Category | Coverage | Pass Rate |
|---|---|---|
| Unit Tests | 75% | 98% |
| Integration Tests | 60% | 95% |
| UI Tests | 40% | 92% |
| Security Tests | 80% | 100% |
| Performance Tests | 50% | 94% |

---

**Document Version**: 2.0.2
**Last Updated**: January 19, 2026
**Next Review**: July 2026
