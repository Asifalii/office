cd /var/www/html
rm -rf /var/www/bash/allurls_help.txt
touch /var/www/bash/allurls_help.txt
chmod 777 /var/www/bash/allurls_help.txt
LANGNAME=$1
php cache_script_help.php $LANGNAME >> /var/www/bash/allurls_help.txt
