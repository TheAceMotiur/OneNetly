#!/usr/bin/env bash

#################################################################
# OneNetly Control Panel - One-Click Installer
# 
# Project: https://github.com/TheAceMotiur/OneNetly
# Description: Automated installer for Ubuntu 22.04/20.04 and Debian
# Version: 2.0.2
# Author: The Ace Motiur
#################################################################

set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
CYAN='\033[0;36m'
NC='\033[0m' # No Color

# Configuration
GITHUB_REPO="https://github.com/TheAceMotiur/OneNetly"
GITHUB_RAW="https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main"
INSTALL_LOG="/var/log/onenetly-install.log"
MIN_RAM_MB=1024
MIN_DISK_GB=10

# Script info
SCRIPT_VERSION="2.0.2"

#################################################################
# Functions
#################################################################

print_banner() {
    clear
    echo -e "${CYAN}"
    cat << "EOF"
   ____             _   __     __  __       
  / __ \____  ___  / | / /__  / /_/ /_  __  
 / / / / __ \/ _ \/  |/ / _ \/ __/ / / / / 
/ /_/ / / / /  __/ /|  /  __/ /_/ / /_/ /  
\____/_/ /_/\___/_/ |_/\___/\__/_/\__, /   
                                 /____/    
EOF
    echo -e "${NC}"
    echo -e "${GREEN}OneNetly Control Panel - One-Click Installer${NC}"
    echo -e "${BLUE}Version: ${SCRIPT_VERSION}${NC}"
    echo -e "${BLUE}GitHub: ${GITHUB_REPO}${NC}"
    echo ""
}

print_info() {
    echo -e "${BLUE}[INFO]${NC} $1" | tee -a "$INSTALL_LOG"
}

print_success() {
    echo -e "${GREEN}[SUCCESS]${NC} $1" | tee -a "$INSTALL_LOG"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1" | tee -a "$INSTALL_LOG"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1" | tee -a "$INSTALL_LOG"
}

check_root() {
    if [[ $EUID -ne 0 ]]; then
        print_error "This script must be run as root"
        echo "Please run: sudo bash install.sh"
        exit 1
    fi
}

detect_os() {
    print_info "Detecting operating system..."
    
    if [[ -f /etc/os-release ]]; then
        . /etc/os-release
        OS=$ID
        OS_VERSION=$VERSION_ID
        OS_CODENAME=$VERSION_CODENAME
        
        print_success "Detected: $PRETTY_NAME"
    else
        print_error "Cannot detect OS. /etc/os-release not found."
        exit 1
    fi
}

check_os_support() {
    print_info "Checking OS compatibility..."
    
    case $OS in
        ubuntu)
            case $OS_VERSION in
                22.04)
                    print_success "Ubuntu 22.04 LTS (Jammy Jellyfish) - Fully Supported ✓"
                    OS_SUPPORTED=true
                    ;;
                20.04)
                    print_success "Ubuntu 20.04 LTS (Focal Fossa) - Supported ✓"
                    OS_SUPPORTED=true
                    ;;
                18.04)
                    print_warning "Ubuntu 18.04 LTS (Bionic Beaver) - Legacy Support"
                    print_warning "Ubuntu 18.04 reached EOL. Consider upgrading to 22.04."
                    OS_SUPPORTED=true
                    ;;
                *)
                    print_error "Ubuntu $OS_VERSION is not supported."
                    print_info "Supported versions: 22.04, 20.04"
                    exit 1
                    ;;
            esac
            ;;
        debian)
            case $OS_VERSION in
                11)
                    print_success "Debian 11 (Bullseye) - Supported ✓"
                    OS_SUPPORTED=true
                    ;;
                10)
                    print_warning "Debian 10 (Buster) - Legacy Support"
                    OS_SUPPORTED=true
                    ;;
                *)
                    print_error "Debian $OS_VERSION is not supported."
                    print_info "Supported versions: 11, 10"
                    exit 1
                    ;;
            esac
            ;;
        *)
            print_error "OS '$OS' is not supported."
            print_info "Supported: Ubuntu 22.04/20.04, Debian 11/10"
            exit 1
            ;;
    esac
}

check_system_requirements() {
    print_info "Checking system requirements..."
    
    # Check RAM
    total_ram=$(free -m | awk '/^Mem:/{print $2}')
    if [[ $total_ram -lt $MIN_RAM_MB ]]; then
        print_error "Insufficient RAM: ${total_ram}MB (minimum: ${MIN_RAM_MB}MB)"
        exit 1
    fi
    print_success "RAM: ${total_ram}MB (✓)"
    
    # Check disk space
    available_disk=$(df -BG / | awk 'NR==2 {print $4}' | sed 's/G//')
    if [[ $available_disk -lt $MIN_DISK_GB ]]; then
        print_error "Insufficient disk space: ${available_disk}GB (minimum: ${MIN_DISK_GB}GB)"
        exit 1
    fi
    print_success "Disk space: ${available_disk}GB (✓)"
    
    # Check internet connection
    if ping -c 1 -W 2 google.com &> /dev/null; then
        print_success "Internet connection: OK (✓)"
    else
        print_error "No internet connection detected"
        exit 1
    fi
}

check_existing_installation() {
    print_info "Checking for existing installations..."
    
    # Check for existing web servers
    if systemctl is-active --quiet apache2 2>/dev/null || \
       systemctl is-active --quiet nginx 2>/dev/null || \
       systemctl is-active --quiet httpd 2>/dev/null; then
        print_warning "Existing web server detected!"
        echo ""
        read -p "Do you want to continue? This may cause conflicts. (y/N): " -n 1 -r
        echo
        if [[ ! $REPLY =~ ^[Yy]$ ]]; then
            print_info "Installation cancelled by user."
            exit 0
        fi
    fi
    
    # Check for OneNetly/Sentora
    if [[ -d /etc/sentora ]] || [[ -d /etc/onenetly ]]; then
        print_warning "Existing OneNetly/Sentora installation detected!"
        echo ""
        read -p "This will overwrite existing installation. Continue? (y/N): " -n 1 -r
        echo
        if [[ ! $REPLY =~ ^[Yy]$ ]]; then
            print_info "Installation cancelled by user."
            exit 0
        fi
    fi
}

get_user_input() {
    print_info "Please provide the following information:"
    echo ""
    
    # Get FQDN
    current_hostname=$(hostname -f 2>/dev/null || hostname)
    read -p "Enter FQDN for the panel (e.g., panel.yourdomain.com) [$current_hostname]: " PANEL_FQDN
    PANEL_FQDN=${PANEL_FQDN:-$current_hostname}
    
    # Get server IP
    default_ip=$(curl -s -4 ifconfig.me 2>/dev/null || hostname -I | awk '{print $1}')
    read -p "Enter server public IP address [$default_ip]: " SERVER_IP
    SERVER_IP=${SERVER_IP:-$default_ip}
    
    # Get admin email
    read -p "Enter admin email address: " ADMIN_EMAIL
    while [[ ! "$ADMIN_EMAIL" =~ ^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$ ]]; do
        print_error "Invalid email address"
        read -p "Enter admin email address: " ADMIN_EMAIL
    done
    
    # Get admin password
    while true; do
        read -s -p "Enter admin password (min 8 characters): " ADMIN_PASSWORD
        echo
        if [[ ${#ADMIN_PASSWORD} -lt 8 ]]; then
            print_error "Password must be at least 8 characters"
            continue
        fi
        read -s -p "Confirm admin password: " ADMIN_PASSWORD_CONFIRM
        echo
        if [[ "$ADMIN_PASSWORD" == "$ADMIN_PASSWORD_CONFIRM" ]]; then
            break
        else
            print_error "Passwords do not match"
        fi
    done
    
    # Get timezone
    current_tz=$(timedatectl show --property=Timezone --value 2>/dev/null || echo "UTC")
    read -p "Enter timezone [$current_tz]: " TIMEZONE
    TIMEZONE=${TIMEZONE:-$current_tz}
    
    echo ""
    print_info "Configuration Summary:"
    echo "  FQDN: $PANEL_FQDN"
    echo "  IP Address: $SERVER_IP"
    echo "  Admin Email: $ADMIN_EMAIL"
    echo "  Timezone: $TIMEZONE"
    echo ""
    
    read -p "Is this information correct? (y/N): " -n 1 -r
    echo
    if [[ ! $REPLY =~ ^[Yy]$ ]]; then
        print_info "Please restart the installer."
        exit 0
    fi
}

update_system() {
    print_info "Updating system packages..."
    
    export DEBIAN_FRONTEND=noninteractive
    
    apt-get update >> "$INSTALL_LOG" 2>&1
    apt-get upgrade -y >> "$INSTALL_LOG" 2>&1
    
    print_success "System updated"
}

install_dependencies() {
    print_info "Installing dependencies..."
    
    apt-get install -y \
        curl \
        wget \
        sudo \
        software-properties-common \
        apt-transport-https \
        ca-certificates \
        gnupg \
        lsb-release \
        git \
        unzip \
        >> "$INSTALL_LOG" 2>&1
    
    print_success "Dependencies installed"
}

install_apache() {
    print_info "Installing Apache web server..."
    
    apt-get install -y apache2 apache2-utils >> "$INSTALL_LOG" 2>&1
    
    # Enable required modules
    a2enmod rewrite ssl headers expires deflate >> "$INSTALL_LOG" 2>&1
    
    systemctl enable apache2 >> "$INSTALL_LOG" 2>&1
    systemctl start apache2 >> "$INSTALL_LOG" 2>&1
    
    print_success "Apache installed and configured"
}

install_php() {
    print_info "Installing PHP..."
    
    if [[ "$OS" == "ubuntu" && "$OS_VERSION" == "22.04" ]]; then
        # Ubuntu 22.04 has PHP 8.1 by default
        apt-get install -y \
            php8.1 \
            php8.1-cli \
            php8.1-common \
            php8.1-curl \
            php8.1-gd \
            php8.1-imap \
            php8.1-intl \
            php8.1-mbstring \
            php8.1-mysql \
            php8.1-xml \
            php8.1-zip \
            php8.1-bcmath \
            libapache2-mod-php8.1 \
            >> "$INSTALL_LOG" 2>&1
    else
        # For Ubuntu 20.04 and Debian
        apt-get install -y \
            php \
            php-cli \
            php-common \
            php-curl \
            php-gd \
            php-imap \
            php-intl \
            php-mbstring \
            php-mysql \
            php-xml \
            php-zip \
            php-bcmath \
            libapache2-mod-php \
            >> "$INSTALL_LOG" 2>&1
    fi
    
    print_success "PHP installed"
}

install_database() {
    print_info "Installing MariaDB database server..."
    
    apt-get install -y mariadb-server mariadb-client >> "$INSTALL_LOG" 2>&1
    
    systemctl enable mariadb >> "$INSTALL_LOG" 2>&1
    systemctl start mariadb >> "$INSTALL_LOG" 2>&1
    
    # Generate root password
    DB_ROOT_PASSWORD=$(openssl rand -base64 32)
    
    # Secure installation
    mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '${DB_ROOT_PASSWORD}';" >> "$INSTALL_LOG" 2>&1
    mysql -u root -p"${DB_ROOT_PASSWORD}" -e "DELETE FROM mysql.user WHERE User='';" >> "$INSTALL_LOG" 2>&1
    mysql -u root -p"${DB_ROOT_PASSWORD}" -e "DROP DATABASE IF EXISTS test;" >> "$INSTALL_LOG" 2>&1
    mysql -u root -p"${DB_ROOT_PASSWORD}" -e "FLUSH PRIVILEGES;" >> "$INSTALL_LOG" 2>&1
    
    # Save credentials
    echo "[client]" > /root/.my.cnf
    echo "user=root" >> /root/.my.cnf
    echo "password=${DB_ROOT_PASSWORD}" >> /root/.my.cnf
    chmod 600 /root/.my.cnf
    
    print_success "MariaDB installed and secured"
}

install_mail_server() {
    print_info "Installing mail server (Postfix + Dovecot)..."
    
    # Preconfigure Postfix
    echo "postfix postfix/main_mailer_type select Internet Site" | debconf-set-selections
    echo "postfix postfix/mailname string $PANEL_FQDN" | debconf-set-selections
    
    apt-get install -y postfix dovecot-core dovecot-imapd dovecot-pop3d >> "$INSTALL_LOG" 2>&1
    
    systemctl enable postfix dovecot >> "$INSTALL_LOG" 2>&1
    systemctl start postfix dovecot >> "$INSTALL_LOG" 2>&1
    
    print_success "Mail server installed"
}

install_ftp_server() {
    print_info "Installing FTP server (ProFTPd)..."
    
    apt-get install -y proftpd-basic >> "$INSTALL_LOG" 2>&1
    
    systemctl enable proftpd >> "$INSTALL_LOG" 2>&1
    systemctl start proftpd >> "$INSTALL_LOG" 2>&1
    
    print_success "FTP server installed"
}

install_dns_server() {
    print_info "Installing DNS server (BIND)..."
    
    apt-get install -y bind9 bind9utils bind9-doc >> "$INSTALL_LOG" 2>&1
    
    systemctl enable named >> "$INSTALL_LOG" 2>&1
    systemctl start named >> "$INSTALL_LOG" 2>&1
    
    print_success "DNS server installed"
}

install_onenetly() {
    print_info "Installing OneNetly control panel..."
    
    # Create directories
    mkdir -p /etc/sentora /var/sentora /var/sentora/logs
    
    # Clone repository
    cd /tmp
    git clone "$GITHUB_REPO" onenetly-tmp >> "$INSTALL_LOG" 2>&1
    
    # Copy files
    cp -r onenetly-tmp/* /etc/sentora/panel/
    
    # Set permissions
    chown -R www-data:www-data /etc/sentora /var/sentora
    chmod -R 755 /etc/sentora /var/sentora
    
    # Clean up
    rm -rf onenetly-tmp
    
    print_success "OneNetly files installed"
}

configure_onenetly() {
    print_info "Configuring OneNetly..."
    
    # Create database
    mysql -e "CREATE DATABASE IF NOT EXISTS sentora_core;" >> "$INSTALL_LOG" 2>&1
    mysql -e "CREATE DATABASE IF NOT EXISTS sentora_postfix;" >> "$INSTALL_LOG" 2>&1
    
    # Import schema (if exists)
    if [[ -f /etc/sentora/panel/cnf/db.sql ]]; then
        mysql sentora_core < /etc/sentora/panel/cnf/db.sql >> "$INSTALL_LOG" 2>&1
    fi
    
    # Create config file
    cat > /etc/sentora/panel/cnf/db.php << EOF
<?php
\$host = 'localhost';
\$dbname = 'sentora_core';
\$user = 'root';
\$pass = '${DB_ROOT_PASSWORD}';
?>
EOF
    
    chmod 600 /etc/sentora/panel/cnf/db.php
    
    print_success "OneNetly configured"
}

configure_apache_vhost() {
    print_info "Configuring Apache virtual host..."
    
    cat > /etc/apache2/sites-available/onenetly.conf << EOF
<VirtualHost *:80>
    ServerName ${PANEL_FQDN}
    DocumentRoot /etc/sentora/panel
    
    <Directory /etc/sentora/panel>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog \${APACHE_LOG_DIR}/onenetly_error.log
    CustomLog \${APACHE_LOG_DIR}/onenetly_access.log combined
</VirtualHost>
EOF
    
    a2ensite onenetly.conf >> "$INSTALL_LOG" 2>&1
    a2dissite 000-default.conf >> "$INSTALL_LOG" 2>&1
    systemctl reload apache2 >> "$INSTALL_LOG" 2>&1
    
    print_success "Apache virtual host configured"
}

configure_firewall() {
    print_info "Configuring firewall..."
    
    if command -v ufw &> /dev/null; then
        ufw --force enable >> "$INSTALL_LOG" 2>&1
        ufw allow 22/tcp >> "$INSTALL_LOG" 2>&1  # SSH
        ufw allow 80/tcp >> "$INSTALL_LOG" 2>&1  # HTTP
        ufw allow 443/tcp >> "$INSTALL_LOG" 2>&1 # HTTPS
        ufw allow 21/tcp >> "$INSTALL_LOG" 2>&1  # FTP
        ufw allow 25/tcp >> "$INSTALL_LOG" 2>&1  # SMTP
        ufw allow 110/tcp >> "$INSTALL_LOG" 2>&1 # POP3
        ufw allow 143/tcp >> "$INSTALL_LOG" 2>&1 # IMAP
        ufw allow 465/tcp >> "$INSTALL_LOG" 2>&1 # SMTPS
        ufw allow 587/tcp >> "$INSTALL_LOG" 2>&1 # Submission
        ufw allow 993/tcp >> "$INSTALL_LOG" 2>&1 # IMAPS
        ufw allow 995/tcp >> "$INSTALL_LOG" 2>&1 # POP3S
        ufw allow 53 >> "$INSTALL_LOG" 2>&1      # DNS
        
        print_success "Firewall configured"
    else
        print_warning "UFW not installed, skipping firewall configuration"
    fi
}

create_admin_account() {
    print_info "Creating admin account..."
    
    # Hash password
    PASSWORD_HASH=$(php -r "echo password_hash('${ADMIN_PASSWORD}', PASSWORD_DEFAULT);")
    
    # Insert admin user (adjust based on actual schema)
    mysql sentora_core -e "INSERT INTO x_accounts (ac_user_vc, ac_pass_vc, ac_email_vc, ac_group_fk, ac_enabled_in) VALUES ('admin', '${PASSWORD_HASH}', '${ADMIN_EMAIL}', 1, 1) ON DUPLICATE KEY UPDATE ac_pass_vc='${PASSWORD_HASH}', ac_email_vc='${ADMIN_EMAIL}';" >> "$INSTALL_LOG" 2>&1 || true
    
    print_success "Admin account created"
}

finish_installation() {
    print_success "Installation completed successfully!"
    echo ""
    echo -e "${CYAN}═══════════════════════════════════════════════════════${NC}"
    echo -e "${GREEN}  OneNetly Control Panel Installation Complete!${NC}"
    echo -e "${CYAN}═══════════════════════════════════════════════════════${NC}"
    echo ""
    echo -e "${BLUE}Access Information:${NC}"
    echo -e "  Panel URL: ${GREEN}http://${PANEL_FQDN}${NC}"
    echo -e "  Username:  ${GREEN}admin${NC}"
    echo -e "  Password:  ${GREEN}[the password you set]${NC}"
    echo ""
    echo -e "${BLUE}Database Root Password:${NC}"
    echo -e "  Saved in: ${GREEN}/root/.my.cnf${NC}"
    echo ""
    echo -e "${BLUE}Next Steps:${NC}"
    echo -e "  1. Access your panel at http://${PANEL_FQDN}"
    echo -e "  2. Login with admin credentials"
    echo -e "  3. Configure SSL certificate (recommended)"
    echo -e "  4. Set up your first domain"
    echo ""
    echo -e "${YELLOW}Important:${NC}"
    echo -e "  - Installation log: ${INSTALL_LOG}"
    echo -e "  - GitHub: ${GITHUB_REPO}"
    echo -e "  - Documentation: ${GITHUB_REPO}/docs"
    echo ""
    echo -e "${CYAN}═══════════════════════════════════════════════════════${NC}"
}

#################################################################
# Main Installation Flow
#################################################################

main() {
    # Initialize log
    touch "$INSTALL_LOG"
    chmod 600 "$INSTALL_LOG"
    
    print_banner
    
    print_info "Starting OneNetly installation..."
    print_info "Log file: $INSTALL_LOG"
    echo ""
    
    # Pre-installation checks
    check_root
    detect_os
    check_os_support
    check_system_requirements
    check_existing_installation
    
    echo ""
    get_user_input
    echo ""
    
    # Installation steps
    update_system
    install_dependencies
    install_apache
    install_php
    install_database
    install_mail_server
    install_ftp_server
    install_dns_server
    install_onenetly
    configure_onenetly
    configure_apache_vhost
    configure_firewall
    create_admin_account
    
    echo ""
    finish_installation
}

# Run main function
main "$@"
