while IFS= read -r langname; do
    cd /var/www/html/server/bash
    bash fetch_allurls.sh "$langname"
    cd /var/www/html/server
    while IFS= read -r url; do
        IFS='******'
        read -a urlarray <<< "$url"
        filename="${urlarray[6]//[$'\t\r\n']}"
        output=$(eval "${urlarray[0]}")
        rm -rf "/mnt/volume_sgp1_05/all_cache_files/$langname/$filename"
        echo "$output" >> "/mnt/volume_sgp1_05/all_cache_files/$langname/$filename"
    done < /var/www/html/server/bash/allurls.txt
    # chmod -R 0444 /mnt/volume_sgp1_05/all_cache_files/$langname
done < /var/www/html/server/bash/temp_langs.txt