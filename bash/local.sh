while IFS= read -r langname; do
  cd /mnt/volume_sgp1_05/all_cache_files/"$langname"
  
  for file in /mnt/volume_sgp1_05/all_cache_files/"$langname"/*; do
    eval "gzip -v9 ${file}"
  done

  touch index.html

done < /var/www/html/server/bash/temp_langs.txt
