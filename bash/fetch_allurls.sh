rm -rf /var/www/html/server/bash/allurls.txt
touch /var/www/html/server/bash/allurls.txt
chmod 757 /var/www/html/server/bash/allurls.txt
LANGNAME=$1
cd /var/www/html/server
php cache_script.php $LANGNAME >> /var/www/html/server/bash/allurls.txt
