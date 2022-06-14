rm -rf /var/www/output_files
mkdir /var/www/output_files
chmod -R 777 /var/www/output_files
cd /var/www/bash
bash fetch_allurls.sh 'thai'
cd /var/www/html
php generate_variants_page.php 'thai'
php process_rss.php 'thai'
cd /var/www/html
rm -rf /var/www/output_files/thai
mkdir /var/www/output_files/thai
chmod -R 777 /var/www/output_files/thai
while IFS= read -r url; do
	IFS='******'
	read -a urlarray <<< "$url"
	filename="${urlarray[6]//[$'\t\r\n']}"
	output=$(eval "${urlarray[0]}")
	echo "$output" >> "/var/www/output_files/thai/$filename"
done < /var/www/bash/allurls.txt
php big_index_cache.php 'thai'
aws s3 sync /var/www/output_files/thai_variants s3://www.english-thai.net --exclude "*.xml" --content-type text/html --acl public-read
aws s3 sync /var/www/output_files/thai_variants/sitemaps s3://www.english-thai.net/sitemaps --content-type text/xml --acl public-read
aws s3 sync /var/www/output_files/thai s3://www.english-thai.net --content-type text/html --acl public-read