cd /var/www/html
while IFS= read -r line; do
	langarray=($line)
	mkdir /var/www/${langarray[0]}
	output=$(eval "php blogs.php '&lang=${langarray[0]}'")
	rm -rf /var/www/${langarray[0]}/english-to-${langarray[0]}-browse-all-blogs
	echo "$output" >> "/var/www/${langarray[0]}/english-to-arabic-${langarray[0]}-browse-all-blogs"
done < /var/www/langtags.txt
while IFS= read -r line; do
	langarray=($line)
	aws s3 sync /var/www/${langarray[0]} s3://${langarray[1]}  --content-type text/html --acl public-read
done < /var/www/langtags.txt
