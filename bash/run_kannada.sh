# rm -rf /var/www/output_files
# mkdir /var/www/output_files
# chmod -R 777 /var/www/output_files
# cd /var/www/bash
# bash fetch_allurls.sh 'kannada'
cd /var/www/html
mkdir /var/www/output_files/kannada_variants
chmod 777 /var/www/output_files/kannada_variants
php generate_variants_page.php 'kannada'
php process_rss.php 'kannada'
# cd /var/www/html
# rm -rf /var/www/output_files/kannada
# mkdir /var/www/output_files/kannada
# chmod -R 777 /var/www/output_files/kannada
# while IFS= read -r url; do
# 	IFS='******'
# 	read -a urlarray <<< "$url"
# 	filename="${urlarray[6]//[$'\t\r\n']}"
# 	output=$(eval "${urlarray[0]}")
# 	echo "$output" >> "/var/www/output_files/kannada/$filename"
# done < /var/www/bash/allurls.txt
# php big_index_cache.php 'kannada'
aws s3 sync /var/www/output_files/kannada_variants s3://www.english-kannada.com --exclude "*.xml" --content-type text/html --acl public-read
aws s3 sync /var/www/output_files/kannada_variants/sitemaps s3://www.english-kannada.com/sitemaps --content-type text/xml --acl public-read
# aws s3 sync /var/www/output_files/kannada s3://www.english-kannada.com --content-type text/html --acl public-read