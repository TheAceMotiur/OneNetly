# Quick Setup Commands

Run these commands from your local repository to deploy the installer to GitHub:

```bash
# Navigate to repository
cd c:\xampp\htdocs\OneNetly

# Make install.sh executable
git update-index --chmod=+x install.sh

# Add all files
git add .

# Commit
git commit -m "Add one-click installation system with Ubuntu 22.04 support"

# Push to GitHub (use your branch name: main or master)
git push origin main
```

**After pushing, test with:**
```bash
curl -I https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh
```

Should return `HTTP/2 200` if successful.

**Then install on any Ubuntu 22.04 server:**
```bash
bash <(curl -s https://raw.githubusercontent.com/TheAceMotiur/OneNetly/main/install.sh)
```

---

For detailed instructions, see [GITHUB-SETUP.md](GITHUB-SETUP.md)
