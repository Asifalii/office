rm -rf /var/www/output_files
mkdir /var/www/output_files
chmod -R 777 /var/www/output_files
cd /var/www/bash
bash fetch_allurls.sh 'tamil'
cd /var/www/html
mkdir /var/www/output_files/tamil_variants
chmod 777 /var/www/output_files/tamil_variants
php generate_variants_page.php 'tamil'
php process_rss.php 'tamil'
cd /var/www/html
rm -rf /var/www/output_files/tamil
mkdir /var/www/output_files/tamil
chmod -R 777 /var/www/output_files/tamil
while IFS= read -r url; do
	IFS='******'
	read -a urlarray <<< "$url"
	filename="${urlarray[6]//[$'\t\r\n']}"
	output=$(eval "${urlarray[0]}")
	echo "$output" >> "/var/www/output_files/tamil/$filename"
done < /var/www/bash/allurls.txt
php big_index_cache.php 'tamil'
aws s3 sync /var/www/output_files/tamil_variants s3://www.english-tamil.net --exclude "*.xml" --content-type text/html --acl public-read
aws s3 sync /var/www/output_files/tamil_variants/sitemaps s3://www.english-tamil.net/sitemaps --content-type text/xml --acl public-read
aws s3 sync /var/www/output_files/tamil s3://www.english-tamil.net --content-type text/html --acl public-read