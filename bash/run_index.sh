cd /var/www/bash
bash fetch_allurls.sh
cd /var/www/html
rm -rf /var/www/arabic
mkdir /var/www/arabic
chmod -R 777 /var/www/arabic
while IFS= read -r url; do
	IFS='******'
	read -a urlarray <<< "$url"
	filename="${urlarray[6]//[$'\t\r\n']}"
	output=$(eval "${urlarray[0]}")
	echo "$output" >> "/var/www/arabic/$filename"
done < /var/www/bash/allurls.txt
aws s3 sync /var/www/arabic s3://www.english-arabic.org --content-type text/html --acl public-read


#aws s3 ls s3://www.english-arabic.org/ --recursive | wc -l 
# php generate_variants_page.php "${langarray[0]}"
