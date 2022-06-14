# rm -rf /var/www/output_files
# mkdir /var/www/output_files
# chmod -R 777 /var/www/output_files
# cd /var/www/bash
# bash fetch_allurls.sh 'hindi'
cd /var/www/html
mkdir /var/www/output_files/hindi_variants
chmod 777 /var/www/output_files/hindi_variants
php generate_variants_page.php 'hindi'
php process_rss.php 'hindi'
# cd /var/www/html
# rm -rf /var/www/output_files/hindi
# mkdir /var/www/output_files/hindi
# chmod -R 777 /var/www/output_files/hindi
# while IFS= read -r url; do
# 	IFS='******'
# 	read -a urlarray <<< "$url"
# 	filename="${urlarray[6]//[$'\t\r\n']}"
# 	output=$(eval "${urlarray[0]}")
# 	echo "$output" >> "/var/www/output_files/hindi/$filename"
# done < /var/www/bash/allurls.txt
# php big_index_cache.php 'hindi'
aws s3 sync /var/www/output_files/hindi_variants s3://www.english-hindi.net --exclude "*.xml" --content-type text/html --acl public-read
aws s3 sync /var/www/output_files/hindi_variants/sitemaps s3://www.english-hindi.net/sitemaps --content-type text/xml --acl public-read
# aws s3 sync /var/www/output_files/hindi s3://www.english-hindi.net --content-type text/html --acl public-read