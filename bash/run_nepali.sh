rm -rf /var/www/output_files
mkdir /var/www/output_files
chmod -R 777 /var/www/output_files
cd /var/www/bash
bash fetch_allurls.sh 'nepali'
cd /var/www/html
mkdir /var/www/output_files/nepali_variants
chmod 777 /var/www/output_files/nepali_variants
php generate_variants_page.php 'nepali'
php process_rss.php 'nepali'
cd /var/www/html
rm -rf /var/www/output_files/nepali
mkdir /var/www/output_files/nepali
chmod -R 777 /var/www/output_files/nepali
while IFS= read -r url; do
	IFS='******'
	read -a urlarray <<< "$url"
	filename="${urlarray[6]//[$'\t\r\n']}"
	output=$(eval "${urlarray[0]}")
	echo "$output" >> "/var/www/output_files/nepali/$filename"
done < /var/www/bash/allurls.txt
php big_index_cache.php 'nepali'
aws s3 sync /var/www/output_files/nepali_variants s3://www.english-nepali.com --exclude "*.xml" --content-type text/html --acl public-read
aws s3 sync /var/www/output_files/nepali_variants/sitemaps s3://www.english-nepali.com/sitemaps --content-type text/xml --acl public-read
aws s3 sync /var/www/output_files/nepali s3://www.english-nepali.com --content-type text/html --acl public-read