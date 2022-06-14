for file in /mnt/volume_sgp1_05/all_cache_files/german2/*; do
	eval "gzip -v9 ${file##*/}"
done
