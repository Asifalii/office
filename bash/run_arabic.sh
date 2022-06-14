cd /var/www/bash
bash fetch_allurls.sh 'arabic'
# cd /var/www/html
# php generate_variants_page.php 'arabic'
# php process_rss.php 'arabic'
cd /var/www/html
rm -rf /var/www/output_files/arabic
mkdir /var/www/output_files/arabic
chmod -R 777 /var/www/output_files/arabic
while IFS= read -r url; do
	IFS='******'
	read -a urlarray <<< "$url"
	filename="${urlarray[6]//[$'\t\r\n']}"
	output=$(eval "${urlarray[0]}")
	echo "$output" >> "/var/www/output_files/arabic/$filename"
done < /var/www/bash/allurls.txt
# php big_index_cache.php 'arabic'
# aws s3 sync /var/www/arabic_variants s3://www.english-arabic.net --exclude "*.xml" --content-type text/html --acl public-read
# aws s3 sync /var/www/arabic_variants/sitemaps s3://www.english-arabic.net/sitemaps --content-type text/xml --acl public-read
aws s3 sync /var/www/output_files/arabic s3://www.english-arabic.org --content-type text/html --acl public-read