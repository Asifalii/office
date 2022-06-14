while IFS= read -r line; do

    rm -rf /var/www/output_files
    mkdir /var/www/output_files
    chmod -R 777 /var/www/output_files
    cd /var/www/bash
    bash fetch_allurls_help.sh "$line"

    cd /var/www/html
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

    aws s3 sync /var/www/output_files/$line s3://$line.english-dictionary.help --content-type text/html --acl public-read

done < /var/www/bash/temp_langs_help.txt


