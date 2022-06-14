rm -rf /var/www/single_deploy_files
mkdir /var/www/single_deploy_files
chmod -R 777 /var/www/single_deploy_files

while IFS= read -r line; do
	langarray=($line)
    
    mkdir /var/www/single_deploy_files/${langarray[0]}
    chmod 777 /var/www/single_deploy_files/${langarray[0]}
    
    cd /var/www/html

    bash fetch_allurls_single.sh "${langarray[0]}"
    
    while IFS= read -r url; do
        IFS='******'
        read -a urlarray <<< "$url"
        filename="${urlarray[6]//[$'\t\r\n']}"
        output=$(eval "${urlarray[0]}")
        echo "$output" >> "/var/www/single_deploy_files/${langarray[0]}/$filename"
    done < /var/www/bash/allurls_single.txt

    aws s3 sync /var/www/single_deploy_files/${langarray[0]} s3://${langarray[1]} --content-type text/html --acl public-read

done < /var/www/bash/temp_langs.txt