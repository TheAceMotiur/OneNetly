# Quick Start Guide - Ubuntu 22.04

This guide will help you install Sentora on Ubuntu 22.04 LTS in just a few minutes.

## Prerequisites

- Fresh Ubuntu 22.04 LTS server installation
- Root or sudo access
- At least 1 GB RAM (2 GB recommended)
- 10 GB free disk space
- Valid domain name pointing to your server
- Internet connection

## Step 1: Prepare Your System

```bash
# Update system packages
sudo apt update && sudo apt upgrade -y

# Install required tools
sudo apt install -y curl wget sudo

# Set your hostname (replace with your actual domain)
sudo hostnamectl set-hostname panel.yourdomain.com

# Edit /etc/hosts
sudo nano /etc/hosts
```

Add this line to `/etc/hosts` (replace with your IP and domain):
```
YOUR_SERVER_IP panel.yourdomain.com panel
```

## Step 2: Run the Sentora Installer

```bash
# Download and execute the official installer
bash <(curl -Ss https://sentora.org/install)
```

The installer will:
- Detect Ubuntu 22.04 automatically
- Install Apache, PHP 8.1, MariaDB, Postfix, Dovecot, ProFTPd, BIND
- Configure all services for Sentora
- Set up SSL certificates
- Create the admin account

## Step 3: Follow the Installer Prompts

The installer will ask you for:

1. **Server FQDN**: Your panel's domain (e.g., panel.yourdomain.com)
2. **Server IP**: Your public IP address
3. **Admin Email**: Email for the administrator account
4. **Admin Password**: Choose a strong password

Example session:
```
Enter the FQDN for your server (e.g., panel.domain.com): panel.yourdomain.com
Enter your server's public IP address: 192.0.2.100
Enter the email address for the admin account: admin@yourdomain.com
Enter the password for the admin account: ****************
```

## Step 4: Wait for Installation

The installation takes 10-30 minutes depending on your server speed and internet connection.

You'll see output like:
```
[INFO] Detected Ubuntu 22.04 LTS (Jammy Jellyfish)
[INFO] Installing Apache 2.4...
[INFO] Installing PHP 8.1...
[INFO] Installing MariaDB 10.6...
[INFO] Installing Postfix...
[INFO] Installing Dovecot...
[INFO] Installing ProFTPd...
[INFO] Installing BIND...
[INFO] Configuring Sentora...
[SUCCESS] Installation complete!
```

## Step 5: Access Your Panel

After installation completes:

1. **Open your browser** and go to:
   ```
   http://panel.yourdomain.com
   ```

2. **Login with**:
   - Username: `admin` or the username shown at installation end
   - Password: The password you set during installation

3. **Change your password** immediately after first login

## Step 6: Configure Firewall (Optional but Recommended)

```bash
# Install UFW if not already installed
sudo apt install -y ufw

# Allow essential ports
sudo ufw allow 22/tcp    # SSH
sudo ufw allow 80/tcp    # HTTP
sudo ufw allow 443/tcp   # HTTPS
sudo ufw allow 21/tcp    # FTP
sudo ufw allow 25/tcp    # SMTP
sudo ufw allow 110/tcp   # POP3
sudo ufw allow 143/tcp   # IMAP
sudo ufw allow 465/tcp   # SMTPS
sudo ufw allow 587/tcp   # Submission
sudo ufw allow 993/tcp   # IMAPS
sudo ufw allow 995/tcp   # POP3S
sudo ufw allow 53/tcp    # DNS
sudo ufw allow 53/udp    # DNS

# Enable firewall
sudo ufw enable
```

## Step 7: Secure Your Installation

### Enable SSL/TLS

1. Install Let's Encrypt certificates:
```bash
sudo certbot --apache -d panel.yourdomain.com
```

2. Follow the prompts to generate certificates

### Configure Fail2ban

```bash
# Install Fail2ban
sudo apt install -y fail2ban

# Start and enable
sudo systemctl start fail2ban
sudo systemctl enable fail2ban
```

### Keep System Updated

```bash
# Enable automatic security updates
sudo apt install -y unattended-upgrades
sudo dpkg-reconfigure -plow unattended-upgrades
```

## Common Post-Installation Tasks

### Add Your First Domain

1. Log into Sentora panel
2. Go to **Domain Management** → **Domains**
3. Click **Create New Domain**
4. Enter domain name and configure DNS

### Create Email Accounts

1. Go to **Mail** → **Mailboxes**
2. Click **Create New Mailbox**
3. Enter email address and password
4. Configure email client with provided settings

### Create FTP Accounts

1. Go to **File Management** → **FTP Accounts**
2. Click **Create New FTP Account**
3. Set username, password, and directory

### Create MySQL Databases

1. Go to **Database Management** → **MySQL Databases**
2. Click **Create New Database**
3. Add database users and set permissions

## Verify Services are Running

```bash
# Check all critical services
sudo systemctl status apache2
sudo systemctl status mariadb
sudo systemctl status postfix
sudo systemctl status dovecot
sudo systemctl status proftpd
sudo systemctl status named

# View Sentora service status
sudo /etc/sentora/panel/bin/setso --check
```

## Troubleshooting

### Can't Access Panel

1. Check Apache is running:
   ```bash
   sudo systemctl status apache2
   ```

2. Check firewall rules:
   ```bash
   sudo ufw status
   ```

3. Verify DNS is pointing to your server:
   ```bash
   nslookup panel.yourdomain.com
   ```

### Email Not Working

1. Check mail services:
   ```bash
   sudo systemctl status postfix dovecot
   ```

2. Check mail logs:
   ```bash
   sudo tail -f /var/log/mail.log
   ```

### FTP Connection Issues

1. Check ProFTPd status:
   ```bash
   sudo systemctl status proftpd
   ```

2. Test FTP connection:
   ```bash
   ftp localhost
   ```

### Database Connection Errors

1. Check MariaDB status:
   ```bash
   sudo systemctl status mariadb
   ```

2. Test database connection:
   ```bash
   mysql -u root -p
   ```

## Getting Help

- **Documentation**: http://docs.sentora.org/
- **Forums**: https://forums.sentora.org/
- **Bug Reports**: https://github.com/sentora/sentora-core/issues
- **Security Issues**: team_contact@sentora.org

## Next Steps

- Read the full [Ubuntu 22.04 guide](../docs/UBUNTU-22.04.md)
- Check the [supported systems](../SUPPORTED_SYSTEMS.md) documentation
- Review [security best practices](http://docs.sentora.org/security)
- Join the [Sentora community](https://forums.sentora.org/)

---

**Congratulations!** Your Sentora control panel is now running on Ubuntu 22.04 LTS.
