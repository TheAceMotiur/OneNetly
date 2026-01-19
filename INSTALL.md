# OneNetly One-Click Installer

Automated installation script for OneNetly Control Panel on Ubuntu and Debian systems.

## Features

- ✅ **One-Click Installation** - Install with a single command
- ✅ **Auto-Detection** - Automatically detects your OS and version
- ✅ **System Validation** - Checks all requirements before installation
- ✅ **Complete Setup** - Installs and configures all services
- ✅ **Interactive** - Guides you through configuration
- ✅ **Secure** - Applies security best practices
- ✅ **Detailed Logging** - Full installation log for troubleshooting

## Quick Start

### Installation Command

```bash
bash <(curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh)
```

### Alternative Methods

**Method 1: Download and Run**
```bash
wget https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh
sudo bash install.sh
```

**Method 2: Using curl**
```bash
curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh | sudo bash
```

**Method 3: Clone Repository**
```bash
git clone https://github.com/TheAceMotiur/OneNetly.git
cd OneNetly
sudo bash install.sh
```

## Supported Systems

| Operating System | Version | Status |
|---|---|---|
| **Ubuntu** | 22.04 LTS | ✅ Fully Supported (Recommended) |
| Ubuntu | 20.04 LTS | ✅ Supported |
| Ubuntu | 18.04 LTS | ⚠️ Legacy Support |
| **Debian** | 11 (Bullseye) | ✅ Supported |
| Debian | 10 (Buster) | ⚠️ Legacy Support |

## System Requirements

### Minimum Requirements
- **OS**: Ubuntu 22.04/20.04 or Debian 11/10
- **RAM**: 1 GB (2 GB recommended)
- **Disk**: 10 GB free space
- **Network**: Internet connection
- **Access**: Root or sudo privileges

### Recommended for Production
- **RAM**: 4 GB or more
- **Disk**: 50 GB SSD or more
- **CPU**: 2+ cores
- **Network**: 1 Gbps connection

## What Gets Installed

The installer automatically installs and configures:

### Web Server
- **Apache 2.4** with mod_rewrite, mod_ssl, mod_headers
- **PHP 8.1** (Ubuntu 22.04) or PHP 7.4+ (older versions)
- All required PHP extensions

### Database
- **MariaDB 10.6** (Ubuntu 22.04) or compatible version
- Automatic secure configuration
- Root password auto-generated

### Mail Server
- **Postfix 3.6** - SMTP server
- **Dovecot 2.3** - IMAP/POP3 server
- TLS/SSL support

### FTP Server
- **ProFTPd 1.3** with TLS support

### DNS Server
- **BIND 9.18** with DNSSEC support

### Control Panel
- **OneNetly** - Latest version from GitHub
- All modules and dependencies
- Default admin account

## Installation Process

### Step 1: Pre-Installation
The installer will:
1. Check if you're running as root
2. Detect your operating system
3. Verify OS is supported
4. Check system requirements (RAM, disk, internet)
5. Detect any existing installations

### Step 2: User Input
You'll be asked for:
- **FQDN**: Panel domain (e.g., panel.yourdomain.com)
- **IP Address**: Your server's public IP
- **Admin Email**: Administrator email address
- **Admin Password**: Strong password (min 8 characters)
- **Timezone**: Your server timezone

### Step 3: Installation
The installer will:
1. Update system packages
2. Install all dependencies
3. Install and configure web server
4. Install and configure database
5. Install and configure mail server
6. Install and configure FTP server
7. Install and configure DNS server
8. Install OneNetly control panel
9. Configure firewall rules
10. Create admin account

### Step 4: Completion
After successful installation, you'll see:
- Panel access URL
- Admin credentials reminder
- Database root password location
- Next steps

## Installation Example

```bash
$ sudo bash install.sh

   ____             _   __     __  __       
  / __ \____  ___  / | / /__  / /_/ /_  __  
 / / / / __ \/ _ \/  |/ / _ \/ __/ / / / / 
/ /_/ / / / /  __/ /|  /  __/ /_/ / /_/ /  
\____/_/ /_/\___/_/ |_/\___/\__/_/\__, /   
                                 /____/    

OneNetly Control Panel - One-Click Installer
Version: 2.0.2
GitHub: https://github.com/TheAceMotiur/OneNetly

[INFO] Starting OneNetly installation...
[INFO] Detecting operating system...
[SUCCESS] Detected: Ubuntu 22.04.1 LTS
[INFO] Checking OS compatibility...
[SUCCESS] Ubuntu 22.04 LTS (Jammy Jellyfish) - Fully Supported ✓
[INFO] Checking system requirements...
[SUCCESS] RAM: 4096MB (✓)
[SUCCESS] Disk space: 50GB (✓)
[SUCCESS] Internet connection: OK (✓)

[INFO] Please provide the following information:

Enter FQDN for the panel (e.g., panel.yourdomain.com) [server.example.com]: panel.mydomain.com
Enter server public IP address [192.0.2.100]: 192.0.2.100
Enter admin email address: admin@mydomain.com
Enter admin password (min 8 characters): ********
Confirm admin password: ********
Enter timezone [UTC]: America/New_York

[INFO] Configuration Summary:
  FQDN: panel.mydomain.com
  IP Address: 192.0.2.100
  Admin Email: admin@mydomain.com
  Timezone: America/New_York

Is this information correct? (y/N): y

[INFO] Updating system packages...
[SUCCESS] System updated
[INFO] Installing dependencies...
[SUCCESS] Dependencies installed
...

═══════════════════════════════════════════════════════
  OneNetly Control Panel Installation Complete!
═══════════════════════════════════════════════════════

Access Information:
  Panel URL: http://panel.mydomain.com
  Username:  admin
  Password:  [the password you set]

Database Root Password:
  Saved in: /root/.my.cnf

Next Steps:
  1. Access your panel at http://panel.mydomain.com
  2. Login with admin credentials
  3. Configure SSL certificate (recommended)
  4. Set up your first domain

Important:
  - Installation log: /var/log/onenetly-install.log
  - GitHub: https://github.com/TheAceMotiur/OneNetly
  - Documentation: https://github.com/TheAceMotiur/OneNetly/docs

═══════════════════════════════════════════════════════
```

## Post-Installation

### Access Your Panel
1. Open browser: `http://your-panel-domain.com`
2. Login with username: `admin`
3. Use the password you created during installation

### Secure Your Installation

**1. Configure SSL Certificate**
```bash
# Install Let's Encrypt
sudo apt install certbot python3-certbot-apache

# Get certificate
sudo certbot --apache -d panel.yourdomain.com
```

**2. Configure Firewall**
The installer configures UFW automatically, but verify:
```bash
sudo ufw status
```

**3. Set Up Fail2ban**
```bash
sudo apt install fail2ban
sudo systemctl enable fail2ban
sudo systemctl start fail2ban
```

**4. Enable Automatic Updates**
```bash
sudo apt install unattended-upgrades
sudo dpkg-reconfigure -plow unattended-upgrades
```

### Verify Services
```bash
# Check all services
sudo systemctl status apache2 mariadb postfix dovecot proftpd named
```

## Troubleshooting

### Installation Failed

**Check the installation log:**
```bash
sudo tail -100 /var/log/onenetly-install.log
```

**Common issues:**

1. **Insufficient permissions**
   ```bash
   # Run with sudo
   sudo bash install.sh
   ```

2. **Network issues**
   ```bash
   # Test internet connection
   ping -c 4 google.com
   ```

3. **Existing installations**
   ```bash
   # Backup and remove old installation
   sudo systemctl stop apache2 mysql
   sudo apt remove --purge apache2 mysql-server
   ```

### Cannot Access Panel

**1. Check Apache status:**
```bash
sudo systemctl status apache2
sudo systemctl restart apache2
```

**2. Check firewall:**
```bash
sudo ufw status
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
```

**3. Verify DNS:**
```bash
nslookup panel.yourdomain.com
```

### Password Issues

**Reset admin password:**
```bash
# Access database
mysql sentora_core

# Update password (replace with your new hash)
UPDATE x_accounts SET ac_pass_vc='$2y$10$...' WHERE ac_user_vc='admin';
```

### Service Not Starting

**Check service logs:**
```bash
# Apache logs
sudo journalctl -u apache2 -n 50

# MariaDB logs
sudo journalctl -u mariadb -n 50

# Postfix logs
sudo journalctl -u postfix -n 50
```

## Uninstallation

To completely remove OneNetly:

```bash
# Stop all services
sudo systemctl stop apache2 mariadb postfix dovecot proftpd named

# Remove packages
sudo apt remove --purge apache2 mariadb-server postfix dovecot-core proftpd-basic bind9

# Remove OneNetly files
sudo rm -rf /etc/sentora
sudo rm -rf /var/sentora

# Remove configuration
sudo rm -rf /root/.my.cnf

# Clean up
sudo apt autoremove
sudo apt autoclean
```

## Advanced Options

### Silent Installation

Create a configuration file:
```bash
# config.txt
PANEL_FQDN="panel.yourdomain.com"
SERVER_IP="192.0.2.100"
ADMIN_EMAIL="admin@yourdomain.com"
ADMIN_PASSWORD="YourSecurePassword"
TIMEZONE="UTC"
```

Run installer:
```bash
bash install.sh --config config.txt
```

### Custom Installation Path

```bash
# Set custom path (not yet implemented)
export ONENETLY_PATH="/custom/path"
bash install.sh
```

## Getting Help

### Documentation
- [Quick Start Guide](docs/QUICKSTART-UBUNTU-22.04.md)
- [Ubuntu 22.04 Guide](docs/UBUNTU-22.04.md)
- [Migration Guide](docs/MIGRATION-TO-UBUNTU-22.04.md)
- [Compatibility Matrix](docs/COMPATIBILITY-MATRIX.md)

### Community Support
- [GitHub Issues](https://github.com/TheAceMotiur/OneNetly/issues)
- [GitHub Discussions](https://github.com/TheAceMotiur/OneNetly/discussions)

### Professional Support
Contact via GitHub for:
- Custom installations
- Migration assistance
- Priority support
- Training

## Contributing

Help improve the installer:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test on clean systems
5. Submit a pull request

## License

OneNetly is licensed under the GNU General Public License v3.0.

See [LICENSE](LICENSE.md) for details.

## Credits

- **Based on**: Sentora Control Panel
- **Author**: The Ace Motiur
- **Repository**: https://github.com/TheAceMotiur/OneNetly

---

**Need help?** Open an issue on [GitHub](https://github.com/TheAceMotiur/OneNetly/issues)
