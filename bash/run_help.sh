while IFS= read -r line; do

    rm -rf /var/www/output_files
    mkdir /var/www/output_files
    chmod -R 777 /var/www/output_files

    cd /var/www/bash
    bash fetch_allurls_help.sh "$line"

    cd /var/www/html
    mkdir /var/www/output_files/${line}_variants
    chmod 777 /var/www/output_files/${line}_variants
    php generate_variants_page.php "$line"
    php process_rss.php "$line"

    rm -rf /var/www/output_files/$line
    mkdir /var/www/output_files/$line
    chmod -R 777 /var/www/output_files/$line


    while IFS= read -r url; do
        IFS='******'
        read -a urlarray <<< "$url"
        filename="${urlarray[6]//[$'\t\r\n']}"
	    output=$(eval "${urlarray[0]}")
        echo "$output" >> "/var/www/output_files/$line/$filename"
    done < /var/www/bash/allurls_help.txt

    php big_index_cache.php "$line"

    aws s3 cp --recursive /var/www/output_files/${line}_variants s3://$line.english-dictionary.help --exclude "*.xml" --content-type text/html --acl public-read
    aws s3 cp --recursive /var/www/output_files/${line}_variants/sitemaps s3://$line.english-dictionary.help/sitemaps --content-type text/xml --acl public-read
    aws s3 cp --recursive /var/www/output_files/$line s3://$line.english-dictionary.help --content-type text/html --acl public-read
    aws s3 cp --recursive /var/www/html/script_redirects s3://$line.english-dictionary.help --content-type text/html --acl public-read

done < /var/www/bash/temp_langs_help.txt