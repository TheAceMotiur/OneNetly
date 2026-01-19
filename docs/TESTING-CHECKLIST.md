# Ubuntu 22.04 Support - Testing Checklist

Use this checklist to verify Ubuntu 22.04 support is working correctly.

## Pre-Installation Testing

### System Requirements
- [ ] Ubuntu 22.04 LTS installed and updated
- [ ] Minimum 1 GB RAM available
- [ ] At least 10 GB disk space free
- [ ] Internet connection working
- [ ] Valid FQDN configured
- [ ] Root/sudo access available

### Pre-Installation Commands
```bash
# Verify Ubuntu version
lsb_release -a
# Should show: Ubuntu 22.04.X LTS

# Check available memory
free -h
# Should show at least 1GB

# Check disk space
df -h
# Should show at least 10GB free

# Verify internet connection
ping -c 4 google.com
# Should succeed

# Check hostname
hostnamectl
# Should show proper FQDN
```

## Installation Testing

### Installer Execution
- [ ] Installer downloads without errors
- [ ] Installer detects Ubuntu 22.04 correctly
- [ ] Installer prompts for required information (FQDN, IP, email, password)
- [ ] Installation completes without errors
- [ ] All services start successfully

### Package Installation
- [ ] Apache 2.4.52+ installed
- [ ] PHP 8.1 installed with all required extensions
- [ ] MariaDB 10.6 or MySQL 8.0 installed
- [ ] Postfix 3.6+ installed
- [ ] Dovecot 2.3+ installed
- [ ] ProFTPd 1.3+ installed
- [ ] BIND 9.18+ installed
- [ ] OpenSSL 3.0 installed

### Verification Commands
```bash
# Check Apache version
apache2 -v
# Should show: Apache/2.4.52 or higher

# Check PHP version
php -v
# Should show: PHP 8.1.X

# Check PHP modules
php -m | grep -E "curl|gd|imap|mbstring|mysql|xml|zip"
# Should show all these modules

# Check MariaDB version
mysql --version
# Should show: mysql Ver 15.1 Distrib 10.6.X-MariaDB

# Check Postfix version
postconf mail_version
# Should show: mail_version = 3.6.X

# Check Dovecot version
dovecot --version
# Should show: 2.3.X

# Check ProFTPd version
proftpd -v
# Should show: ProFTPd Version 1.3.X

# Check BIND version
named -v
# Should show: BIND 9.18.X

# Check OpenSSL version
openssl version
# Should show: OpenSSL 3.0.X
```

## Service Testing

### Apache Web Server
- [ ] Apache service is running
- [ ] Apache starts on boot
- [ ] Default site accessible via HTTP
- [ ] Virtual hosts configuration present
- [ ] mod_rewrite enabled
- [ ] mod_suexec enabled
- [ ] mod_ssl enabled

```bash
# Check Apache status
sudo systemctl status apache2
# Should show: active (running)

# Check Apache is enabled
sudo systemctl is-enabled apache2
# Should show: enabled

# Test Apache configuration
sudo apache2ctl configtest
# Should show: Syntax OK

# List enabled modules
apache2ctl -M | grep -E "rewrite|suexec|ssl"
# Should show all three modules

# Test HTTP access
curl -I http://localhost
# Should return 200 OK or 302 redirect
```

### PHP
- [ ] PHP-FPM service running
- [ ] All required extensions loaded
- [ ] PHP configuration correct
- [ ] Test page executes PHP code

```bash
# Check PHP-FPM status
sudo systemctl status php8.1-fpm
# Should show: active (running)

# Test PHP execution
php -r "echo 'PHP is working';"
# Should output: PHP is working

# Create test PHP file
echo "<?php phpinfo(); ?>" | sudo tee /var/www/html/test.php

# Test in browser or with curl
curl http://localhost/test.php | grep "PHP Version 8.1"
# Should show PHP version

# Remove test file
sudo rm /var/www/html/test.php
```

### Database (MariaDB/MySQL)
- [ ] Database service running
- [ ] Can connect as root
- [ ] Sentora databases exist
- [ ] Database users configured correctly

```bash
# Check MariaDB status
sudo systemctl status mariadb
# Should show: active (running)

# Test database connection
mysql -u root -p -e "SELECT VERSION();"
# Should show MariaDB version

# Check Sentora databases
mysql -u root -p -e "SHOW DATABASES;" | grep sentora
# Should show: sentora_core, sentora_postfix

# Test database query
mysql -u root -p sentora_core -e "SELECT COUNT(*) FROM x_accounts;"
# Should return a count (at least 1 for admin)
```

### Mail Server (Postfix + Dovecot)
- [ ] Postfix service running
- [ ] Dovecot service running
- [ ] SMTP port accessible
- [ ] IMAP/POP3 ports accessible
- [ ] Can send test email

```bash
# Check Postfix status
sudo systemctl status postfix
# Should show: active (running)

# Check Dovecot status
sudo systemctl status dovecot
# Should show: active (running)

# Test SMTP connection
telnet localhost 25
# Should connect (type QUIT to exit)

# Test IMAP connection
telnet localhost 143
# Should connect (type A1 LOGOUT to exit)

# Check mail queue
sudo postqueue -p
# Should show empty queue or pending messages

# Send test email
echo "Test email" | mail -s "Test" your@email.com
# Check if mail.log shows delivery attempt
sudo tail -f /var/log/mail.log
```

### FTP Server (ProFTPd)
- [ ] ProFTPd service running
- [ ] FTP port accessible
- [ ] Can connect with test account
- [ ] File uploads work

```bash
# Check ProFTPd status
sudo systemctl status proftpd
# Should show: active (running)

# Test FTP connection
ftp localhost
# Should prompt for login

# Test with curl
curl ftp://localhost/
# Should attempt connection
```

### DNS Server (BIND)
- [ ] BIND service running
- [ ] DNS queries resolve
- [ ] Zone files present
- [ ] Recursion configured correctly

```bash
# Check BIND status
sudo systemctl status named
# Should show: active (running)

# Test DNS resolution
dig @localhost google.com
# Should return answer

# List zone files
sudo ls -la /etc/sentora/configs/bind/zones/
# Should show zone files if domains configured

# Test zone query
dig @localhost SOA yourdomain.com
# Should return SOA record if domain configured
```

## Sentora Panel Testing

### Panel Access
- [ ] Panel URL accessible (http://panel.yourdomain.com)
- [ ] Login page displays correctly
- [ ] Can login with admin credentials
- [ ] Dashboard loads without errors
- [ ] All modules visible

```bash
# Test panel access
curl -I http://panel.yourdomain.com
# Should return 200 OK or 302 redirect

# Check panel files exist
ls -la /etc/sentora/panel/
# Should show Sentora panel files
```

### Core Modules Testing

#### Domain Management
- [ ] Can create new domain
- [ ] Domain appears in database
- [ ] Virtual host created
- [ ] Domain accessible via browser

#### Database Management
- [ ] Can create MySQL database
- [ ] Can create database user
- [ ] Can grant permissions
- [ ] Can access database via phpMyAdmin

#### Email Management
- [ ] Can create mailbox
- [ ] Mailbox appears in database
- [ ] Can send email to mailbox
- [ ] Can access via webmail

#### FTP Management
- [ ] Can create FTP account
- [ ] Can connect with FTP client
- [ ] Can upload files
- [ ] Files appear in correct directory

#### File Manager
- [ ] File manager loads
- [ ] Can browse directories
- [ ] Can upload files
- [ ] Can create directories

## PHP 8.1 Specific Testing

### Deprecated Functions
- [ ] No deprecated function warnings in logs
- [ ] No `create_function()` usage
- [ ] Proper null handling

```bash
# Check PHP error log
sudo tail -50 /var/log/php8.1-fpm.log | grep -i deprecat
# Should show no deprecation warnings

# Check Apache error log
sudo tail -50 /var/log/apache2/error.log | grep -i deprecat
# Should show no deprecation warnings
```

### PHP Extensions
- [ ] All required extensions loaded
- [ ] Extensions working correctly

```bash
# Verify critical extensions
php -m | grep -E "mysqli|pdo_mysql|curl|gd|imap|mbstring|xml|zip|json|openssl"
# Should show all these extensions
```

## Security Testing

### SSL/TLS
- [ ] OpenSSL 3.0 installed
- [ ] TLS 1.3 supported
- [ ] Weak ciphers disabled

```bash
# Test TLS versions
openssl s_client -connect localhost:443 -tls1_3
# Should connect with TLS 1.3 (if SSL configured)

# Check SSL certificate
openssl s_client -connect panel.yourdomain.com:443 -showcerts
# Should show certificate details
```

### Firewall
- [ ] UFW configured (if used)
- [ ] Required ports open
- [ ] Unnecessary ports closed

```bash
# Check firewall status
sudo ufw status
# Should show enabled and rules

# Test port access from external machine
# Port 80 (HTTP)
# Port 443 (HTTPS)
# Port 21 (FTP)
# Port 25 (SMTP)
# Port 110 (POP3)
# Port 143 (IMAP)
```

### Fail2ban
- [ ] Fail2ban installed (optional)
- [ ] Jails configured
- [ ] Logs being monitored

```bash
# Check fail2ban status (if installed)
sudo systemctl status fail2ban
# Should show: active (running)

# Check active jails
sudo fail2ban-client status
# Should list active jails
```

## Performance Testing

### Resource Usage
- [ ] Memory usage acceptable
- [ ] CPU usage normal
- [ ] Disk I/O reasonable

```bash
# Check system resources
htop
# Or
top

# Check memory
free -h

# Check disk usage
df -h

# Check disk I/O
iostat
```

### Response Times
- [ ] Panel loads quickly (< 3 seconds)
- [ ] Database queries fast
- [ ] File operations responsive

```bash
# Test panel response time
time curl -o /dev/null -s http://panel.yourdomain.com
# Should complete in < 3 seconds
```

## Log Testing

### Check All Logs
- [ ] No critical errors in system logs
- [ ] No PHP errors
- [ ] No Apache errors
- [ ] No database errors

```bash
# System logs
sudo journalctl -p err -b
# Should show no critical errors

# Apache logs
sudo tail -50 /var/log/apache2/error.log
# Should show no errors

# PHP logs
sudo tail -50 /var/log/php8.1-fpm.log
# Should show no errors

# MySQL logs
sudo tail -50 /var/log/mysql/error.log
# Should show no errors

# Mail logs
sudo tail -50 /var/log/mail.log
# Should show no errors
```

## Documentation Testing

### Documentation Accuracy
- [ ] All installation steps work as documented
- [ ] All commands execute successfully
- [ ] All file paths correct
- [ ] All URLs accessible

### Links Testing
- [ ] All documentation links work
- [ ] External links accessible
- [ ] Internal links resolve correctly

## Migration Testing (if applicable)

### Pre-Migration
- [ ] Backup completed successfully
- [ ] Backup integrity verified
- [ ] Migration plan documented

### Post-Migration
- [ ] All websites accessible
- [ ] All email accounts working
- [ ] All databases present and accessible
- [ ] All FTP accounts functional
- [ ] DNS zones transferred correctly

## Rollback Testing

### Backup and Restore
- [ ] Can create full backup
- [ ] Can restore from backup
- [ ] All data restored correctly

```bash
# Test backup creation
sudo /etc/sentora/panel/bin/backup.sh
# Should create backup without errors

# Verify backup files exist
ls -lh /var/sentora/backups/
# Should show backup files
```

## Final Verification

### Complete System Check
```bash
# Run complete system check
echo "=== System Information ==="
lsb_release -a
echo ""

echo "=== Service Status ==="
sudo systemctl status apache2 mariadb postfix dovecot proftpd named | grep Active
echo ""

echo "=== Disk Space ==="
df -h /
echo ""

echo "=== Memory ==="
free -h
echo ""

echo "=== Recent Errors ==="
sudo journalctl -p err -b --no-pager | tail -20
```

## Checklist Summary

Total Items: [ X / Y ]

- [ ] Pre-Installation: [ / ]
- [ ] Installation: [ / ]
- [ ] Services: [ / ]
- [ ] Sentora Panel: [ / ]
- [ ] PHP 8.1: [ / ]
- [ ] Security: [ / ]
- [ ] Performance: [ / ]
- [ ] Logs: [ / ]
- [ ] Documentation: [ / ]

## Issues Found

Document any issues found during testing:

1. **Issue**: 
   **Severity**: (Critical/High/Medium/Low)
   **Solution**: 

2. **Issue**: 
   **Severity**: (Critical/High/Medium/Low)
   **Solution**: 

## Test Sign-off

- **Tested By**: ___________________
- **Date**: ___________________
- **Environment**: ___________________
- **Result**: Pass / Fail / Partial
- **Notes**: ___________________

---

**Testing Completed**: [ ] Yes / [ ] No
**Ready for Production**: [ ] Yes / [ ] No
