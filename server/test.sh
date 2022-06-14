while IFS= read -r langline; do
    while IFS= read -r line; do
        this_word="$line"
        this_lang="$langline"
        command_string="php index_cache.php '&lang=$this_lang&q=$this_word'"
        output=$(eval "$command_string")
        echo "$output" >> "./cache/$this_lang/$this_word"
    done < word_list.txt
done < lang_file.txt

