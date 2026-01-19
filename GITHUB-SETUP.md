# GitHub Setup Guide for OneNetly Installer

This guide helps you set up the one-click installer on your GitHub repository.

## Step 1: Commit and Push the Installer

From your local OneNetly directory:

```bash
# Navigate to your repository
cd c:\xampp\htdocs\OneNetly

# Make install.sh executable (important!)
git update-index --chmod=+x install.sh

# Add all new files
git add install.sh INSTALL.md QUICK-INSTALL.md
git add README.md SUPPORTED_SYSTEMS.md CHANGELOG.md
git add docs/*.md

# Commit the changes
git commit -m "Add one-click installation system with Ubuntu 22.04 support

- Add automated install.sh script with OS detection
- Add comprehensive installation documentation
- Update all documentation with one-click install command
- Add Ubuntu 22.04 LTS full support
- Add migration guides and compatibility matrix
- Add badges and professional README formatting"

# Push to GitHub
git push origin main
```

## Step 2: Verify Files on GitHub

1. Go to: https://github.com/TheAceMotiur/OneNetly
2. Check that `install.sh` is visible in the file list
3. Click on `install.sh` to view it
4. Copy the "Raw" URL, it should be:
   ```
   https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh
   ```

## Step 3: Test the Installation

On a fresh Ubuntu 22.04 server:

```bash
# Test if the file is accessible
curl -I https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh

# Should return: HTTP/2 200

# Run the installer
bash <(curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh)
```

## Troubleshooting

### Error: "404: command not found"

**Cause**: The install.sh file hasn't been pushed to GitHub yet.

**Solution**:
1. Make sure you've committed and pushed the file
2. Verify the file exists at: https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh
3. Check you're using the correct branch name (main vs master)

### Error: "Permission denied"

**Cause**: File doesn't have execute permissions.

**Solution**:
```bash
# Set executable bit in git
git update-index --chmod=+x install.sh
git commit -m "Make install.sh executable"
git push origin main
```

### Error: "branch 'main' not found"

**Cause**: Your default branch might be 'master' instead of 'main'.

**Solution**:
```bash
# Check your current branch
git branch

# If using 'master' branch, update the URL:
bash <(curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/master/install.sh)

# Or rename branch to 'main':
git branch -m master main
git push -u origin main
```

## Step 4: Update GitHub Repository Settings

### Add Repository Description

Go to repository settings and add:
```
OneNetly - Modern web hosting control panel with Ubuntu 22.04 support. One-click installation for Apache, PHP 8.1, MariaDB, Mail, FTP & DNS servers.
```

### Add Topics

Add these topics to your repository:
- `control-panel`
- `web-hosting`
- `ubuntu-22-04`
- `php-81`
- `apache2`
- `mariadb`
- `one-click-install`
- `sentora`

### Update GitHub About Section

1. Go to your repository: https://github.com/TheAceMotiur/OneNetly
2. Click the gear icon ⚙️ next to "About"
3. Add description and website
4. Add topics (tags)

## Step 5: Create a Release (Optional but Recommended)

```bash
# Tag the release
git tag -a v2.0.2 -m "OneNetly 2.0.2 - Ubuntu 22.04 Support

Features:
- One-click installation system
- Full Ubuntu 22.04 LTS support
- PHP 8.1 compatibility
- Comprehensive documentation
- Migration guides
- Automated setup for all services"

# Push the tag
git push origin v2.0.2
```

Then on GitHub:
1. Go to Releases
2. Click "Draft a new release"
3. Select tag `v2.0.2`
4. Add release notes
5. Publish release

## Step 6: Test from Different Server

To ensure everything works, test from a clean server:

```bash
# Test on Ubuntu 22.04
bash <(curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh)

# Test on Ubuntu 20.04
bash <(curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh)

# Test on Debian 11
bash <(curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh)
```

## Common Git Commands

### Check Status
```bash
git status
```

### View Commit History
```bash
git log --oneline
```

### Push All Changes
```bash
git add .
git commit -m "Your commit message"
git push origin main
```

### Undo Last Commit (if not pushed)
```bash
git reset --soft HEAD~1
```

## Alternative: Manual Upload

If you can't use git from your current location:

1. Go to https://github.com/TheAceMotiur/OneNetly
2. Click "Add file" → "Upload files"
3. Upload `install.sh`
4. Commit directly to main branch
5. Test the URL

## Verify Installation Script

After pushing, verify the script works:

```bash
# Download and check
curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh | head -20

# Should show the script header:
#!/usr/bin/env bash
#################################################################
# OneNetly Control Panel - One-Click Installer
...
```

## GitHub Actions (Optional)

Create `.github/workflows/installer-test.yml` to automatically test the installer:

```yaml
name: Test Installer

on:
  push:
    branches: [ main ]
    paths:
      - 'install.sh'
  pull_request:
    branches: [ main ]

jobs:
  test:
    runs-on: ubuntu-22.04
    steps:
      - uses: actions/checkout@v4
      
      - name: Check script syntax
        run: bash -n install.sh
      
      - name: Check executable permissions
        run: test -x install.sh || chmod +x install.sh
```

## After Setup Checklist

- [ ] install.sh committed and pushed
- [ ] File visible on GitHub
- [ ] Raw URL accessible (returns 200)
- [ ] File has execute permissions
- [ ] README.md updated with install command
- [ ] Tested on fresh Ubuntu 22.04 server
- [ ] Repository description updated
- [ ] Topics/tags added
- [ ] Release created (optional)

## Support

If you encounter issues:
1. Check the file exists at the raw URL
2. Verify branch name (main vs master)
3. Ensure file permissions are correct
4. Try downloading manually first: `wget https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh`

---

**Once completed**, your one-click installer will be live at:
```bash
bash <(curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh)
```
