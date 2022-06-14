while IFS= read -r langname; do
    mkdir /mnt/volume_sgp1_05/all_cache_files/$langname
    chmod -R 757 /mnt/volume_sgp1_05/all_cache_files/$langname
    cd /var/www/html/server

     mkdir /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps
     chmod 757 /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps

     chmod -R 644 /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps
     chmod 755 /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps
     #php big_index_cache.php "$langname"
     cp -r /var/www/html/server/script_redirects/* /mnt/volume_sgp1_05/all_cache_files/$langname/
     cp /var/www/html/server/ads.txt /mnt/volume_sgp1_05/all_cache_files/$langname/ads.txt
     cp /var/www/html/server/app-ads.txt /mnt/volume_sgp1_05/all_cache_files/$langname/app-ads.txt
     chmod -R 644 /mnt/volume_sgp1_05/all_cache_files/$langname
     chmod 755 /mnt/volume_sgp1_05/all_cache_files/$langname
     chmod 644 /mnt/volume_sgp1_05/all_cache_files/$langname/index.html

    cd /mnt/volume_sgp1_05/all_cache_files/"$langname"

    find ./ -name "arabic-to-english-meaning-*" -type f -delete
	
    for file in /mnt/volume_sgp1_05/all_cache_files/"$langname"/*; do
        eval "gzip -v9 ${file##*/}"
    done

    touch index.html

    chmod -R 644 /mnt/volume_sgp1_05/all_cache_files/$langname
    chmod 755 /mnt/volume_sgp1_05/all_cache_files/$langname
    chmod 757 /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps
    chmod -R 757 /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps


done < /var/www/html/server/bash/temp_langs.txt