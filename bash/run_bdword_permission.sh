while IFS= read -r langname; do

    chmod -R 757 /mnt/volume_sgp1_05/all_cache_files/$langname/sitemaps/


done < /var/www/html/server/bash/temp_langs_help2.txt