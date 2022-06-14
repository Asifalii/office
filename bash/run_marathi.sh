# rm -rf /var/www/output_files
# mkdir /var/www/output_files
# chmod -R 777 /var/www/output_files
# cd /var/www/bash
# bash fetch_allurls.sh 'marathi'
cd /var/www/html
mkdir /var/www/output_files/marathi_variants
chmod 777 /var/www/output_files/marathi_variants
mkdir /var/www/output_files/marathi_variants
chmod 777 /var/www/output_files/marathi_variants
php generate_variants_page.php 'marathi'
php process_rss.php 'marathi'
# cd /var/www/html
# rm -rf /var/www/output_files/marathi
# mkdir /var/www/output_files/marathi
# chmod -R 777 /var/www/output_files/marathi
# while IFS= read -r url; do
# 	IFS='******'
# 	read -a urlarray <<< "$url"
# 	filename="${urlarray[6]//[$'\t\r\n']}"
# 	output=$(eval "${urlarray[0]}")
# 	echo "$output" >> "/var/www/output_files/marathi/$filename"
# done < /var/www/bash/allurls.txt
# php big_index_cache.php 'marathi'
aws s3 sync /var/www/output_files/marathi_variants s3://www.english-marathi.net --exclude "*.xml" --content-type text/html --acl public-read
aws s3 sync /var/www/output_files/marathi_variants/sitemaps s3://www.english-marathi.net/sitemaps --content-type text/xml --acl public-read
# aws s3 sync /var/www/output_files/marathi s3://www.english-marathi.net --content-type text/html --acl public-read