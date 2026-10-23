# PHP2Shell Fix Toolkit 🚨

<p align="center">
  <img src="https://img.shields.io/badge/CVE-2026--109618%20%26%20CVE--2026--109619-critical?style=for-the-badge&color=red">
  <img src="https://img.shields.io/badge/CVSS-9.2%20Critical-red?style=for-the-badge">
  <img src="https://img.shields.io/badge/PHP-5.4%20to%208.5%20Affected-blue?style=for-the-badge">
  <img src="https://img.shields.io/badge/Fix-8.2.35%20%2F%208.3.36%20%2F%208.4.27%20%2F%208.5.12-brightgreen?style=for-the-badge">
</p>

### ⚠️ Emergency: Unauthenticated Remote Code Execution in PHP Core
On **October 21, 2026**, PHP released emergency patches for two critical RCE vulnerabilities known as **PHP2Shell**. Exploit leaked before patch and attacks are already in the wild (Cloudflare, GoDaddy, NCSC UK confirmed).

> **Updating PHP is the only complete fix. Temporary mitigations are incomplete.**

### 📌 Affected vs Fixed
| Branch | Status | Fixed Version |
| :--- | :--- | :--- |
| PHP 8.5 | Vulnerable | **8.5.12** |
| PHP 8.4 | Vulnerable | **8.4.27** |
| PHP 8.3 | Vulnerable | **8.3.36** |
| PHP 8.2 | Vulnerable | **8.2.35** |
| PHP 8.1, 7.4, 8.0, 5.x | **Critically Vulnerable - No official binary fix** | Must upgrade to 8.2+ |

### 🚀 Quick Start (2 Seconds Check)

```bash
git clone https://github.com/farimazhar/php2shell-fix-toolkit.git
cd php2shell-fix-toolkit
php scanner/check.php
Output:
✅ SECURE - You are on patched version 8.3.36+
OR
🚨 VULNERABLE! You need to update to 8.3.36 ASAP
### 📁 What's Inside

*1. Scanner (`/scanner`)*
- `check.php` - PHP version checker with branch-aware logic
- `scan.sh` - Linux bash scanner + checks for exploitation attempts in logs

*2. Mitigation (`/mitigation`)*
- `php.ini.patch` - Temporary mitigation
; TEMPORARY mitigation (not full fix)
session.upload_progress.enabled = 0
; Restart php-fpm / apache after this
; Real fix is UPDATE ONLY
> This setting disables the upload progress feature abused in CVE-2026-109618. It does NOT fix CVE-2026-109619. https://www.dynatrace.com

*3. WAF Rules (`/waf`)*
- `cloudflare-rules.md` - Block `PHPSESSID + upload_progress` pattern
- `modsecurity.conf` - ModSecurity rules to block PHP2Shell exploit tool

*4. Upgrade Guide (`/upgrade-guide.md`)*
Full commands for Ubuntu, Debian, cPanel WHM, CyberPanel, LiteSpeed

### 🔍 Check If You Were Already Hacked
grep -R "PHPSESSID.*upload_progress" /var/log/apache2/ /var/log/nginx/ --since="2026-10-17"
# If you see strange POST requests with long data, assume compromised!
### 🛠️ How to Fix Permanently

*Ubuntu / Debian:*
sudo apt update && sudo apt upgrade -y
sudo systemctl restart php8.3-fpm apache2
php -v # Must be .35 / .36 / .27 / .12
*cPanel:*
WHM > EasyApache 4 > Update ea-php packages

*For EOL PHP (7.4 / 8.0 / 8.1):*
No official fix exists. You MUST upgrade:
sudo add-apt-repository ppa:ondrej/php
sudo apt install php8.3 php8.3-fpm
### 🙏 Credits & Source
- PHP Security Team Announcement - Oct 21, 2026
- Cloudflare & Dynatrace Security Alerts
- Created for community by *https://github.com/farimazhar*

### ⭐ If this helped you, please give a Star!
It helps other developers find this fix in an emergency.
---
## 👩‍💻 Author

**Farimazhar**
## 👩‍💻 Author - Open to Work
Hi, I'm Fari Mazhar - Cybersecurity Enthusiast from Pakistan.
Looking for Junior Security Researcher / SOC Analyst role.
Cybersecurity Enthusiast | PHP Developer | Open Source Contributor

📧 Contact: **Farimazhar101@gmail.com**
🌐 GitHub: [github.com/farimazhar](https://github.com/farimazhar)
💼 LinkedIn: [linkedin.com/in/farimazhar](https://linkedin.com/in/farimazhar)

If you used this toolkit in your company or project, feel free to email me for consulting, security audits, or collaboration.

> Made with ❤️ for the PHP community during PHP2Shell emergency.

