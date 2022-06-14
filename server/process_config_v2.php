<?php
set_time_limit(0);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

exec('chmod -R 777 /etc/nginx/sites-available');
exec('chmod -R 777 /etc/nginx/sites-enabled');

//all urls
$array = array(
    'afrikaans.english-dictionary.help' => 'afrikaans',
    'albanian.english-dictionary.help' => 'albanian',
    'amharic.english-dictionary.help' => 'amharic',
    'armenian.english-dictionary.help' => 'armenian',
    'azerbaijani.english-dictionary.help' => 'azerbaijani',
    'basque.english-dictionary.help' => 'basque',
    'belarusian.english-dictionary.help' => 'belarusian',
    'bosnian.english-dictionary.help' => 'bosnian',
    'bulgarian.english-dictionary.help' => 'bulgarian',
    'catalan.english-dictionary.help' => 'catalan',
    'cebuano.english-dictionary.help' => 'cebuano',
    'chichewa.english-dictionary.help' => 'chichewa',
    'chinese.english-dictionary.help' => 'chinese',
    'corsican.english-dictionary.help' => 'corsican',
    'croatian.english-dictionary.help' => 'croatian',
    'czech.english-dictionary.help' => 'czech',
    'danish.english-dictionary.help' => 'danish',
    'dutch.english-dictionary.help' => 'dutch',
    'esperanto.english-dictionary.help' => 'esperanto',
    'estonian.english-dictionary.help' => 'estonian',
    'filipino.english-dictionary.help' => 'filipino',
    'finnish.english-dictionary.help' => 'finnish',
    'french.english-dictionary.help' => 'french',
    'frisian.english-dictionary.help' => 'frisian',
    'galician.english-dictionary.help' => 'galician',
    'georgian.english-dictionary.help' => 'georgian',
    'german.english-dictionary.help' => 'german',
    'greek.english-dictionary.help' => 'greek',
    'haitian.english-dictionary.help' => 'haitian',
    'hausa.english-dictionary.help' => 'hausa',
    'hawaiian.english-dictionary.help' => 'hawaiian',
    'hebrew.english-dictionary.help' => 'hebrew',
    'hmong.english-dictionary.help' => 'hmong',
    'hungarian.english-dictionary.help' => 'hungarian',
    'icelandic.english-dictionary.help' => 'icelandic',
    'igbo.english-dictionary.help' => 'igbo',
    'indonesian.english-dictionary.help' => 'indonesian',
    'irish.english-dictionary.help' => 'irish',
    'italian.english-dictionary.help' => 'italian',
    'japanese.english-dictionary.help' => 'japanese',
    'javanese.english-dictionary.help' => 'javanese',
    'kazakh.english-dictionary.help' => 'kazakh',
    'khmer.english-dictionary.help' => 'khmer',
    'korean.english-dictionary.help' => 'korean',
    'kurmanji.english-dictionary.help' => 'kurmanji',
    'kyrgyz.english-dictionary.help' => 'kyrgyz',
    'lao.english-dictionary.help' => 'lao',
    'latin.english-dictionary.help' => 'latin',
    'latvian.english-dictionary.help' => 'latvian',
    'lithuanian.english-dictionary.help' => 'lithuanian',
    'luxembourgish.english-dictionary.help' => 'luxembourgish',
    'macedonian.english-dictionary.help' => 'macedonian',
    'malagasy.english-dictionary.help' => 'malagasy',
    'malayalam.english-dictionary.help' => 'malayalam',
    'maltese.english-dictionary.help' => 'maltese',
    'maori.english-dictionary.help' => 'maori',
    'mongolian.english-dictionary.help' => 'mongolian',
    'burmese.english-dictionary.help' => 'burmese',
    'norwegian.english-dictionary.help' => 'norwegian',
    'pashto.english-dictionary.help' => 'pashto',
    'persian.english-dictionary.help' => 'persian',
    'polish.english-dictionary.help' => 'polish',
    'portuguese.english-dictionary.help' => 'portuguese',
    'romanian.english-dictionary.help' => 'romanian',
    'russian.english-dictionary.help' => 'russian',
    'samoan.english-dictionary.help' => 'samoan',
    'serbian.english-dictionary.help' => 'serbian',
    'shona.english-dictionary.help' => 'shona',
    'sindhi.english-dictionary.help' => 'sindhi',
    'sinhala.english-dictionary.help' => 'sinhala',
    'slovak.english-dictionary.help' => 'slovak',
    'slovenian.english-dictionary.help' => 'slovenian',
    'somali.english-dictionary.help' => 'somali',
    'spanish.english-dictionary.help' => 'spanish',
    'sundanese.english-dictionary.help' => 'sundanese',
    'swahili.english-dictionary.help' => 'swahili',
    'swedish.english-dictionary.help' => 'swedish',
    'tajik.english-dictionary.help' => 'tajik',
    'turkish.english-dictionary.help' => 'turkish',
    'ukrainian.english-dictionary.help' => 'ukrainian',
    'urdu.english-dictionary.help' => 'urdu',
    'uzbek.english-dictionary.help' => 'uzbek',
    'vietnamese.english-dictionary.help' => 'vietnamese',
    'xhosa.english-dictionary.help' => 'xhosa',
    'yiddish.english-dictionary.help' => 'yiddish',
    'yoruba.english-dictionary.help' => 'yoruba',
    'zulu.english-dictionary.help' => 'zulu',
    'www.bdword.com' => 'bengali',
    'www.english-hindi.net' => 'hindi',
    'www.english-tamil.net' => 'tamil',
    'www.english-telugu.net' => 'telugu',
    'www.english-gujarati.com' => 'gujarati',
    'www.english-marathi.net' => 'marathi',
    'www.english-kannada.com' => 'kannada',
    'www.english-thai.net' => 'thai',
    'www.english-welsh.net' => 'welsh',
    'www.english-arabic.org' => 'arabic',
    'www.english-malay.net' => 'malay',
    'www.english-nepali.com' => 'nepali',
    'www.english-punjabi.net' => 'punjabi'
);


$array2 = array(
'bengali',
'hindi',
'tamil',
'telugu',
'gujarati',
'marathi',
'kannada',
'thai',
'welsh',
'arabic',
'malay',
'nepali',
'punjabi');

foreach($array as $in=>$va){

$va = strtolower($va);

$html = '';


// if(in_array($va, $array2)){

// $html .= '
// server {
//     listen 80;
//     server_name '.str_replace('www.','',$in).';

//     return 301 https://'.$in.'$request_uri;
// }

// server {
//     listen 80;
//     listen [::]:80;

//     root /mnt/volume_sgp1_05/all_cache_files/'.$va.';
//     index index.html;

//     server_name '.$in.';

//     error_page 404 /error.html;
//     location = /error.html {
//         root /mnt/volume_sgp1_05/all_cache_files/'.$va.'/;
//         internal;
//     }
// }

// ';

if(in_array($va, $array2)){
    $html .= '
    server {
        listen 80;
        server_name '.str_replace('www.','',$in).';

        return 301 https://'.$in.'$request_uri;
    }
    ';
}

$html .= '
    
    server {
        listen 80;
        listen [::]:80;
    
        root /mnt/volume_sgp1_05/all_cache_files/'.$va.';
        index index.html;
    
        server_name '.$in.';
    
        error_page 404 /error.html;
        location = /error.html {
            root /mnt/volume_sgp1_05/all_cache_files/'.$va.'/;
            internal;
        }

        rewrite ^/english-to-'.$va.'-dictionary-meaning-of-(.*)(\s|%20|\+)+(.*)$ https://'.$in.'/english-to-'.$va.'-meaning-$1-$3 permanent;
        rewrite ^/english-to-'.$va.'-dictionary-meaning-of-(.*)$ https://'.$in.'/english-to-'.$va.'-meaning-$1 permanent;    
        rewrite ^(/.*)(\s|%20|\+)+(.*)$ https://'.$in.'$1-$3 permanent;

    }

';

file_put_contents('/etc/nginx/sites-available/'.$in.'.conf', $html);
file_put_contents('/etc/nginx/sites-enabled/'.$in.'.conf', $html);


}

exec('chmod -R 644 /etc/nginx/sites-available');
exec('chmod -R 644 /etc/nginx/sites-enabled');
exec('chmod 755 /etc/nginx/sites-available');
exec('chmod 755 /etc/nginx/sites-enabled');
?>