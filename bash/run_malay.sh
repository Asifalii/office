# rm -rf /var/www/output_files
# mkdir /var/www/output_files
# chmod -R 777 /var/www/output_files
# cd /var/www/bash
# bash fetch_allurls.sh 'malay'
cd /var/www/html
mkdir /var/www/output_files/malay_variants
chmod 777 /var/www/output_files/malay_variants
php generate_variants_page.php 'malay'
php process_rss.php 'malay'
# cd /var/www/html
# rm -rf /var/www/output_files/malay
# mkdir /var/www/output_files/malay
# chmod -R 777 /var/www/output_files/malay
# while IFS= read -r url; do
# 	IFS='******'
# 	read -a urlarray <<< "$url"
# 	filename="${urlarray[6]//[$'\t\r\n']}"
# 	output=$(eval "${urlarray[0]}")
# 	echo "$output" >> "/var/www/output_files/malay/$filename"
# done < /var/www/bash/allurls.txt
# php big_index_cache.php 'malay'
aws s3 sync /var/www/output_files/malay_variants s3://www.english-malay.net --exclude "*.xml" --content-type text/html --acl public-read
aws s3 sync /var/www/output_files/malay_variants/sitemaps s3://www.english-malay.net/sitemaps --content-type text/xml --acl public-read
# aws s3 sync /var/www/output_files/malay s3://www.english-malay.net --content-type text/html --acl public-read