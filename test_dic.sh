while IFS= read -r line; do
    command_string="php index_cache.php '&lang=bengali&q={$line}'"
    output=$(eval "$command_string")
    echo "$output" >> "/mnt/volume_sgp1_01/cache/test/{$line}"
done < word_list_test.txt
