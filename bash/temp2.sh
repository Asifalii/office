while IFS= read -r line; do
	langarray=($line)

    aws s3 cp --recursive /var/www/html/script_redirects s3://${langarray[1]} --content-type text/html --acl public-read

done < /var/www/bash/temp_langs.txt