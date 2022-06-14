rm -rf /var/www/bash/allurls_single.txt
touch /var/www/bash/allurls_single.txt
chmod 777 /var/www/bash/allurls_single.txt
LANGNAME=$1
cd /var/www/html
php cache_script_single.php $LANGNAME >> /var/www/bash/allurls_single.txt