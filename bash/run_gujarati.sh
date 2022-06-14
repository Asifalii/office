# rm -rf /var/www/output_files
# mkdir /var/www/output_files
# chmod -R 777 /var/www/output_files
# cd /var/www/bash
# bash fetch_allurls.sh 'gujarati'
# cd /var/www/html
# mkdir /var/www/output_files/gujarati_variants
# chmod 777 /var/www/output_files/gujarati_variants
# php generate_variants_page.php 'gujarati'
# php process_rss.php 'gujarati'
# cd /var/www/html
# rm -rf /var/www/output_files/gujarati
# mkdir /var/www/output_files/gujarati
# chmod -R 777 /var/www/output_files/gujarati
# while IFS= read -r url; do
# 	IFS='******'
# 	read -a urlarray <<< "$url"
# 	filename="${urlarray[6]//[$'\t\r\n']}"
# 	output=$(eval "${urlarray[0]}")
# 	echo "$output" >> "/var/www/output_files/gujarati/$filename"
# done < /var/www/bash/allurls.txt
# php big_index_cache.php 'gujarati'
aws s3 cp --recursive /var/www/output_files/gujarati_variants s3://www.english-gujarati.com --exclude "*.xml" --content-type text/html --acl public-read
aws s3 cp --recursive /var/www/output_files/gujarati_variants/sitemaps s3://www.english-gujarati.com/sitemaps --content-type text/xml --acl public-read
aws s3 cp --recursive /var/www/output_files/gujarati s3://www.english-gujarati.com --content-type text/html --acl public-read
aws s3 cp --recursive /var/www/html/script_redirects s3://www.english-gujarati.com --content-type text/html --acl public-read