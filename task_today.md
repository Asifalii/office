-Create a new database called bdowrd.v4
-move the data from v3_word_frame table to a table->eng_eng, synonyms, antonyms, examples, different_forms, related_words
-move all phrases and local translations to a table -> local_bengali
-Create a new search interface based on local_bengali and above.



update eng set attribute = replace(attribute, 'v', 'verb') DATALENGTH(a.Item_Group) = 4;

update eng set attribute = replace(attribute, 'a', 'adjective') where length(attribute) <=1;