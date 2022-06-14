rm -rf /var/www/output_files
mkdir /var/www/output_files
chmod -R 777 /var/www/output_files
cd /var/www/bash
bash fetch_allurls.sh 'telugu'
cd /var/www/html
mkdir /var/www/output_files/telugu_variants
chmod 777 /var/www/output_files/telugu_variants
php generate_variants_page.php 'telugu'
php process_rss.php 'telugu'
cd /var/www/html
rm -rf /var/www/output_files/telugu
mkdir /var/www/output_files/telugu
chmod -R 777 /var/www/output_files/telugu
while IFS= read -r url; do
	IFS='******'
	read -a urlarray <<< "$url"
	filename="${urlarray[6]//[$'\t\r\n']}"
	output=$(eval "${urlarray[0]}")
	echo "$output" >> "/var/www/output_files/telugu/$filename"
done < /var/www/bash/allurls.txt
php big_index_cache.php 'telugu'
aws s3 sync /var/www/output_files/telugu_variants s3://www.english-telugu.net --exclude "*.xml" --content-type text/html --acl public-read
aws s3 sync /var/www/output_files/telugu_variants/sitemaps s3://www.english-telugu.net/sitemaps --content-type text/xml --acl public-read
aws s3 sync /var/www/output_files/telugu s3://www.english-telugu.net --content-type text/html --acl public-read