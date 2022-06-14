while IFS= read -r langname; do
    mkdir /mnt/volume_sgp1_05/all_cache_files/$langname
    chmod -R 757 /mnt/volume_sgp1_05/all_cache_files/$langname
    cd /var/www/html/server
     php cache_script.php "$langname"
     php generate_variants_page.php "$langname"
     mkdir /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps
     chmod 757 /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps
     #php process_rss.php "$langname"
     #php process_local_rss.php "$langname"
     chmod -R 644 /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps
     chmod 755 /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps
    php variant_index_cache.php "$langname"
    php big_index_cache.php "$langname"
    php big_local_cache.php "$langname"
    php local2.php "$langname"
    php local2_other.php "$langname"
    php learn-ten-words-everyday.php "$langname"
    php vocabulary-game.php "$langname"
     cp -r /var/www/html/server/script_redirects/* /mnt/volume_sgp1_05/all_cache_files/$langname/
     cp /var/www/html/server/ads.txt /mnt/volume_sgp1_05/all_cache_files/$langname/ads.txt
     cp /var/www/html/server/app-ads.txt /mnt/volume_sgp1_05/all_cache_files/$langname/app-ads.txt
     chmod -R 644 /mnt/volume_sgp1_05/all_cache_files/$langname
     chmod 755 /mnt/volume_sgp1_05/all_cache_files/$langname
     chmod 644 /mnt/volume_sgp1_05/all_cache_files/$langname/index.html

    cd /mnt/volume_sgp1_05/all_cache_files/"$langname"

    find ./ -name "*.gz" -type f -delete

    for file in /mnt/volume_sgp1_05/all_cache_files/"$langname"/*; do
        eval "gzip -v9 ${file##*/}"
    done

    touch index.html

    chmod -R 644 /mnt/volume_sgp1_05/all_cache_files/$langname
    chmod 755 /mnt/volume_sgp1_05/all_cache_files/$langname
    chmod 757 /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps
    chmod -R 757 /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps


done < /var/www/html/server/bash/temp_langs.txt