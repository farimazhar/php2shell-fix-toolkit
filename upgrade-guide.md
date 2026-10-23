Ubuntu: sudo apt update && sudo apt upgrade -y
php -v must be 8.2.35+ etc.
sudo systemctl restart php*-fpm apache2

cPanel: WHM > EasyApache 4 > Update ea-php packages

EOL 7.4/8.0/8.1 has NO official binary fix, only source patches, you must upgrade branch【8006007432802382290†L14-L17】
