# Migration Guide to Ubuntu 22.04

This guide helps you migrate your existing Sentora installation to Ubuntu 22.04 LTS.

## ⚠️ Important Notice

**Backup everything before starting!** Migration involves moving to a new server. There is no in-place upgrade path.

## Migration Strategies

### Strategy 1: Fresh Installation (Recommended)

This is the safest and cleanest approach.

#### Advantages
- ✅ Clean system with no legacy configurations
- ✅ Latest versions of all software
- ✅ Opportunity to optimize configuration
- ✅ Fewer compatibility issues

#### Disadvantages
- ⚠️ Requires manual data migration
- ⚠️ Some downtime required

### Strategy 2: Parallel Migration

Run old and new servers side-by-side during migration.

#### Advantages
- ✅ Minimal downtime
- ✅ Easy rollback if issues arise
- ✅ Time to test everything

#### Disadvantages
- ⚠️ Requires two servers temporarily
- ⚠️ More complex DNS management

## Pre-Migration Checklist

### 1. Document Current Setup

```bash
# On old server - document everything
echo "=== System Information ===" > migration-info.txt
lsb_release -a >> migration-info.txt
echo "" >> migration-info.txt

echo "=== Sentora Version ===" >> migration-info.txt
cat /etc/sentora/panel/version.txt >> migration-info.txt
echo "" >> migration-info.txt

echo "=== Installed PHP Modules ===" >> migration-info.txt
php -m >> migration-info.txt
echo "" >> migration-info.txt

echo "=== Apache Modules ===" >> migration-info.txt
apache2ctl -M >> migration-info.txt
echo "" >> migration-info.txt

echo "=== List of Domains ===" >> migration-info.txt
mysql -u root -p -e "SELECT * FROM sentora_core.x_vhosts;" >> migration-info.txt
echo "" >> migration-info.txt

echo "=== List of Users ===" >> migration-info.txt
mysql -u root -p -e "SELECT * FROM sentora_core.x_accounts WHERE ac_deleted_ts IS NULL;" >> migration-info.txt
```

### 2. Backup All Data

#### Backup Databases

```bash
# Create backup directory
mkdir -p ~/sentora-backup/databases

# Backup all databases
mysqldump --all-databases -u root -p > ~/sentora-backup/databases/all-databases.sql

# Backup Sentora database separately (recommended)
mysqldump sentora_core -u root -p > ~/sentora-backup/databases/sentora_core.sql
mysqldump sentora_postfix -u root -p > ~/sentora-backup/databases/sentora_postfix.sql

# Backup each user database
for db in $(mysql -u root -p -e "SHOW DATABASES;" | grep -v Database | grep -v information_schema | grep -v performance_schema | grep -v mysql | grep -v sys); do
    echo "Backing up database: $db"
    mysqldump "$db" -u root -p > ~/sentora-backup/databases/"$db".sql
done
```

#### Backup Web Files

```bash
# Backup all hosted websites
sudo tar -czf ~/sentora-backup/hostdata.tar.gz /var/sentora/hostdata/

# Backup Sentora panel data
sudo tar -czf ~/sentora-backup/panel.tar.gz /etc/sentora/panel/

# Backup Apache configurations
sudo tar -czf ~/sentora-backup/apache-configs.tar.gz /etc/sentora/configs/apache/
```

#### Backup Email

```bash
# Backup all email accounts
sudo tar -czf ~/sentora-backup/vmail.tar.gz /var/sentora/vmail/

# Backup email logs
sudo tar -czf ~/sentora-backup/mail-logs.tar.gz /var/log/mail.*
```

#### Backup DNS Zones

```bash
# Backup BIND zone files
sudo tar -czf ~/sentora-backup/dns-zones.tar.gz /etc/sentora/configs/bind/zones/
```

#### Backup FTP Data

```bash
# FTP data is usually in hostdata, but backup ProFTPd config
sudo cp /etc/proftpd/proftpd.conf ~/sentora-backup/proftpd.conf
```

#### Backup Cron Jobs

```bash
# Export all cron jobs
crontab -l > ~/sentora-backup/cron-jobs.txt
sudo crontab -l > ~/sentora-backup/cron-jobs-root.txt

# Backup Sentora cron configs
sudo cp -r /var/spool/cron/crontabs/ ~/sentora-backup/crontabs/
```

### 3. Download Backup to Safe Location

```bash
# Create a single archive
cd ~
tar -czf sentora-backup-$(date +%Y%m%d).tar.gz sentora-backup/

# Copy to your local machine
# Use SCP, SFTP, or download via your hosting panel
```

## Migration Process

### Phase 1: Setup New Server

#### 1. Install Ubuntu 22.04

- Install fresh Ubuntu 22.04 LTS server
- Apply all updates: `sudo apt update && sudo apt upgrade -y`
- Set hostname: `sudo hostnamectl set-hostname panel.yourdomain.com`

#### 2. Install Sentora

```bash
# Run the installer
bash <(curl -Ss https://sentora.org/install)
```

**Important**: Use the **same admin username** as your old server if possible.

#### 3. Configure Server Settings

Match your old server settings:
- PHP settings (memory_limit, upload_max_filesize, etc.)
- Apache settings
- MySQL settings

### Phase 2: Migrate Databases

#### 1. Upload Database Backups

```bash
# On new server
mkdir -p ~/migration
cd ~/migration

# Upload your database backups here using SCP/SFTP
```

#### 2. Restore Databases

```bash
# Stop services temporarily
sudo systemctl stop apache2 postfix dovecot

# Restore Sentora core database
mysql -u root -p sentora_core < ~/migration/sentora_core.sql

# Restore Sentora postfix database
mysql -u root -p sentora_postfix < ~/migration/sentora_postfix.sql

# Restore user databases
for sqlfile in ~/migration/*.sql; do
    dbname=$(basename "$sqlfile" .sql)
    if [ "$dbname" != "sentora_core" ] && [ "$dbname" != "sentora_postfix" ]; then
        echo "Restoring database: $dbname"
        mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS $dbname;"
        mysql -u root -p "$dbname" < "$sqlfile"
    fi
done
```

### Phase 3: Migrate Files

#### 1. Upload Website Files

```bash
# Extract hostdata backup
cd /var/sentora/
sudo tar -xzf ~/migration/hostdata.tar.gz --strip-components=3

# Fix permissions
sudo chown -R apache:apache /var/sentora/hostdata/
sudo chmod -R 755 /var/sentora/hostdata/
```

#### 2. Migrate Email

```bash
# Extract vmail backup
cd /var/sentora/
sudo tar -xzf ~/migration/vmail.tar.gz --strip-components=3

# Fix permissions
sudo chown -R vmail:vmail /var/sentora/vmail/
```

#### 3. Migrate DNS Zones

```bash
# Extract DNS zones
cd /etc/sentora/configs/bind/
sudo tar -xzf ~/migration/dns-zones.tar.gz --strip-components=5

# Reload BIND
sudo systemctl reload named
```

### Phase 4: Update Configurations

#### 1. Update Apache Virtual Hosts

```bash
# Rebuild Apache configs
sudo /etc/sentora/panel/bin/setso --set apache

# Test Apache configuration
sudo apache2ctl configtest

# Restart Apache
sudo systemctl restart apache2
```

#### 2. Update Mail Configuration

```bash
# Rebuild mail configs
sudo /etc/sentora/panel/bin/setso --set postfix

# Restart mail services
sudo systemctl restart postfix dovecot
```

#### 3. Update FTP Configuration

```bash
# Rebuild ProFTPd config
sudo /etc/sentora/panel/bin/setso --set proftpd

# Restart ProFTPd
sudo systemctl restart proftpd
```

### Phase 5: Testing

#### Test Websites

```bash
# Add test entry to /etc/hosts on your local machine
# YOUR_NEW_SERVER_IP panel.yourdomain.com

# Test each website
curl -I http://yourwebsite.com
```

#### Test Email

```bash
# Test SMTP
telnet localhost 25

# Test IMAP
telnet localhost 143

# Send test email
echo "Test email" | mail -s "Migration Test" your@email.com
```

#### Test FTP

```bash
# Test FTP connection
ftp localhost

# Or use SFTP
sftp username@localhost
```

#### Test DNS

```bash
# Test DNS resolution
dig @localhost yourdomain.com

# Test zone transfers
dig @localhost yourdomain.com AXFR
```

### Phase 6: Switch DNS

#### 1. Lower TTL Values (Do This 24-48 Hours Before)

Lower TTL on all DNS records to 300 seconds (5 minutes) to speed up propagation.

#### 2. Update DNS Records

Update your domain's nameservers or A records to point to new server.

#### 3. Monitor During Transition

```bash
# Watch access logs on NEW server
sudo tail -f /var/sentora/logs/domains/*/*/access_log

# Watch access logs on OLD server (should decrease)
```

### Phase 7: Post-Migration Cleanup

#### 1. Verify Everything Works

- [ ] All websites load correctly
- [ ] Email sending/receiving works
- [ ] FTP access works
- [ ] DNS resolution works
- [ ] SSL certificates are valid
- [ ] Cron jobs are running
- [ ] Backups are configured

#### 2. Update SSL Certificates

```bash
# Install Let's Encrypt certificates
sudo certbot --apache -d yourdomain.com -d www.yourdomain.com

# For panel
sudo certbot --apache -d panel.yourdomain.com
```

#### 3. Configure Monitoring

```bash
# Install monitoring tools
sudo apt install -y netdata

# Access at http://panel.yourdomain.com:19999
```

#### 4. Keep Old Server Running

Keep the old server running for at least 1 week to catch any issues.

## Troubleshooting

### Websites Not Loading

```bash
# Check Apache error logs
sudo tail -f /var/log/apache2/error.log

# Check virtual host configuration
sudo apache2ctl -S

# Verify domain exists in database
mysql -u root -p -e "SELECT * FROM sentora_core.x_vhosts WHERE vh_name_vc='yourdomain.com';"
```

### Email Issues

```bash
# Check Postfix logs
sudo tail -f /var/log/mail.log

# Test Postfix configuration
sudo postfix check

# Verify email accounts in database
mysql -u root -p -e "SELECT * FROM sentora_postfix.mailbox;"
```

### Database Connection Errors

```bash
# Check database users
mysql -u root -p -e "SELECT user, host FROM mysql.user;"

# Grant proper permissions
mysql -u root -p -e "GRANT ALL PRIVILEGES ON dbname.* TO 'username'@'localhost';"
```

### Permission Problems

```bash
# Fix Sentora permissions
sudo /etc/sentora/panel/bin/setso --set permissions

# Fix website permissions
sudo chown -R apache:apache /var/sentora/hostdata/

# Fix email permissions
sudo chown -R vmail:vmail /var/sentora/vmail/
```

## Rollback Plan

If migration fails:

1. **Keep old server running** until everything is verified
2. **Point DNS back** to old server
3. **Restore old server from backup** if needed
4. **Wait for DNS propagation** (usually 5-30 minutes with low TTL)

## Post-Migration Best Practices

### 1. Set Up Automated Backups

```bash
# Create backup script
sudo nano /root/backup-sentora.sh
```

Add:
```bash
#!/bin/bash
BACKUP_DIR="/backup/sentora/$(date +%Y%m%d)"
mkdir -p "$BACKUP_DIR"

# Backup databases
mysqldump --all-databases > "$BACKUP_DIR"/all-databases.sql

# Backup files
tar -czf "$BACKUP_DIR"/hostdata.tar.gz /var/sentora/hostdata/
tar -czf "$BACKUP_DIR"/vmail.tar.gz /var/sentora/vmail/

# Delete backups older than 7 days
find /backup/sentora/ -type d -mtime +7 -exec rm -rf {} \;
```

```bash
# Make executable
sudo chmod +x /root/backup-sentora.sh

# Add to crontab (daily at 2 AM)
sudo crontab -e
```

Add:
```
0 2 * * * /root/backup-sentora.sh
```

### 2. Enable Automatic Updates

```bash
# Install unattended-upgrades
sudo apt install -y unattended-upgrades

# Enable automatic security updates
sudo dpkg-reconfigure -plow unattended-upgrades
```

### 3. Configure Monitoring

Set up monitoring for:
- Disk space
- Memory usage
- Service status
- Failed login attempts
- Email queue

### 4. Document Your Setup

Keep documentation of:
- Server specifications
- Installed software versions
- Custom configurations
- DNS settings
- Backup procedures

## Getting Help

If you encounter issues during migration:

- **Forums**: https://forums.sentora.org/
- **Documentation**: http://docs.sentora.org/
- **GitHub Issues**: https://github.com/sentora/sentora-core/issues
- **Professional Support**: Available through Sentora.org

---

**Estimated Migration Time**: 2-4 hours (depending on data size)
**Recommended Time**: Weekend or low-traffic period
**Minimum Downtime**: 15-30 minutes (with parallel migration)
