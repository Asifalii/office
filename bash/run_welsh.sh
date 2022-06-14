cd /var/www/bash
bash fetch_allurls.sh 'welsh'
# cd /var/www/html
# php generate_variants_page.php 'welsh'
# php process_rss.php 'welsh'
cd /var/www/html
rm -rf /var/www/output_files/welsh
mkdir /var/www/output_files/welsh
chmod -R 777 /var/www/output_files/welsh
while IFS= read -r url; do
	IFS='******'
	read -a urlarray <<< "$url"
	filename="${urlarray[6]//[$'\t\r\n']}"
	output=$(eval "${urlarray[0]}")
	echo "$output" >> "/var/www/output_files/welsh/$filename"
done < /var/www/bash/allurls.txt
# php big_index_cache.php 'welsh'
# aws s3 sync /var/www/welsh_variants s3://www.english-welsh.net --exclude "*.xml" --content-type text/html --acl public-read
# aws s3 sync /var/www/welsh_variants/sitemaps s3://www.english-welsh.net/sitemaps --content-type text/xml --acl public-read
aws s3 sync /var/www/output_files/welsh s3://www.english-welsh.net --content-type text/html --acl public-read