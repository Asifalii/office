rm -rf /var/www/test/error.html
cd /var/www/html
php cache_error.php 'arabic' 'easf' >> /var/www/test/error.html
aws s3 cp /var/www/test/error.html s3://www.english-arabic.org --content-type text/html --acl public-read
