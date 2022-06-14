chmod 757 /mnt/volume_sgp1_05/all_cache_files/$1
chmod 757 /mnt/volume_sgp1_05/all_cache_files/$1/english-to-$1-meaning-$2
cd /var/www/html/server
php remove_ad.php "$1" "$2"
chmod 644 /mnt/volume_sgp1_05/all_cache_files/$1/english-to-$1-meaning-$2
chmod 755 /mnt/volume_sgp1_05/all_cache_files/$1
