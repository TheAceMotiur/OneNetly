# OneNetly Installation - Quick Reference

## One-Line Installation

```bash
bash <(curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh)
```

## Alternative Methods

```bash
# Method 1: Download first
wget https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh
sudo bash install.sh

# Method 2: Using curl
curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh | sudo bash

# Method 3: Clone repository
git clone https://github.com/TheAceMotiur/OneNetly.git
cd OneNetly
sudo bash install.sh
```

## System Requirements

| Component | Minimum | Recommended |
|-----------|---------|-------------|
| OS | Ubuntu 20.04+ | Ubuntu 22.04 LTS |
| RAM | 1 GB | 4 GB |
| Disk | 10 GB | 50 GB SSD |
| CPU | 1 core | 2+ cores |

## What You'll Need

1. Fresh Ubuntu 22.04/20.04 or Debian 11/10 installation
2. Root or sudo access
3. Valid domain name
4. Internet connection

## Installation Time

- **Fast Server**: 10-15 minutes
- **Average Server**: 15-30 minutes
- **Slow Connection**: 30-45 minutes

## Installed Services

✅ Apache 2.4 (Web Server)  
✅ PHP 8.1 (Ubuntu 22.04) or 7.4+ (older versions)  
✅ MariaDB 10.6 (Database)  
✅ Postfix + Dovecot (Mail Server)  
✅ ProFTPd (FTP Server)  
✅ BIND (DNS Server)  
✅ OneNetly Control Panel  

## Quick Commands

### Check Installation Status
```bash
# View installation log
sudo tail -f /var/log/onenetly-install.log

# Check service status
sudo systemctl status apache2 mariadb postfix dovecot proftpd named
```

### Access Panel
```
URL: http://panel.yourdomain.com
Username: admin
Password: [password you set during installation]
```

### Post-Installation Security

```bash
# Install SSL certificate
sudo apt install certbot python3-certbot-apache
sudo certbot --apache -d panel.yourdomain.com

# Check firewall
sudo ufw status

# Install fail2ban
sudo apt install fail2ban -y
sudo systemctl enable fail2ban
```

## Troubleshooting

### Can't access panel?
```bash
# Restart Apache
sudo systemctl restart apache2

# Check firewall
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp

# Test locally
curl -I http://localhost
```

### Installation failed?
```bash
# Check the log
sudo cat /var/log/onenetly-install.log

# Verify system requirements
free -h  # Check RAM
df -h    # Check disk space
```

## Support

- 📖 [Full Documentation](https://github.com/TheAceMotiur/OneNetly/blob/main/INSTALL.md)
- 🐛 [Report Issues](https://github.com/TheAceMotiur/OneNetly/issues)
- 💬 [Discussions](https://github.com/TheAceMotiur/OneNetly/discussions)

## Files Modified

The installer modifies these system files:
- `/etc/apache2/` - Apache configuration
- `/etc/mysql/` - Database configuration
- `/etc/postfix/` - Mail server configuration
- `/etc/bind/` - DNS configuration
- `/etc/sentora/` - OneNetly panel files
- `/var/sentora/` - Web and mail data
- `/root/.my.cnf` - Database credentials

## Backup Before Installation

```bash
# If upgrading existing system
sudo apt install rsync -y
sudo rsync -av /etc/ /backup/etc-backup/
sudo rsync -av /var/www/ /backup/www-backup/
```

---

**Ready to install?** Run: `bash <(curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh)`
