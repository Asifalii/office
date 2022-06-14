<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
error_reporting(0);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

function getLang(){
    return ($_GET['lang'])?$_GET['lang']:'bengali';
}

function getURL(){
    return ($_GET['url'])?trim($_GET['url'],'/'):'https://www.bdword.com';
}

function get_data(){

    // echo $_SERVER['HTTP_HOST'];die;
    
    $data_array = [];
    $lang = getLang();
   
/*  <!-- all dictionary links start  -->   */

    $left_section_links = [                 
                            'English to Afrikaans Dictionary' => 'https://afrikaans.english-dictionary.help',
                            'English to Albanian Dictionary' => 'https://albanian.english-dictionary.help',
                            'English to Amharic Dictionary' => 'https://amharic.english-dictionary.help',
                            'English to Armenian Dictionary' => 'https://armenian.english-dictionary.help',
                            'English to Azerbaijani Dictionary' => 'https://azerbaijani.english-dictionary.help',
                            'English to Basque Dictionary' => 'https://basque.english-dictionary.help',
                            'English to Belarusian Dictionary' => 'https://belarusian.english-dictionary.help',
                            'English to Bosnian Dictionary' => 'https://bosnian.english-dictionary.help',
                            'English to Bulgarian Dictionary' => 'https://bulgarian.english-dictionary.help',
                            'English to Catalan Dictionary' => 'https://catalan.english-dictionary.help',
                            'English to Cebuano Dictionary' => 'https://cebuano.english-dictionary.help',
                            'English to Chichewa Dictionary' => 'https://chichewa.english-dictionary.help',
                            'English to Chinese Dictionary' => 'https://chinese.english-dictionary.help',
                            'English to Corsican Dictionary' => 'https://corsican.english-dictionary.help',
                            'English to Croatian Dictionary' => 'https://croatian.english-dictionary.help',
                            'English to Czech Dictionary' => 'https://czech.english-dictionary.help',
                            'English to Danish Dictionary' => 'https://danish.english-dictionary.help',
                            'English to Dutch Dictionary' => 'https://dutch.english-dictionary.help',
                            'English to Esperanto Dictionary' => 'https://esperanto.english-dictionary.help',
                            'English to Estonian Dictionary' => 'https://estonian.english-dictionary.help',
                            'English to Filipino Dictionary' => 'https://filipino.english-dictionary.help',
                            'English to Finnish Dictionary' => 'https://finnish.english-dictionary.help',
                            'English to French Dictionary' => 'https://french.english-dictionary.help',
                            'English to Frisian Dictionary' => 'https://frisian.english-dictionary.help',
                            'English to Galician Dictionary' => 'https://galician.english-dictionary.help',
                            'English to Georgian Dictionary' => 'https://georgian.english-dictionary.help',
                            'English to German Dictionary' => 'https://german.english-dictionary.help',
                            'English to Greek Dictionary' => 'https://greek.english-dictionary.help',
                            'English to Haitian Dictionary' => 'https://haitian.english-dictionary.help',
                            'English to Hausa Dictionary' => 'https://hausa.english-dictionary.help',
                            'English to Hawaiian Dictionary' => 'https://hawaiian.english-dictionary.help',
                            'English to Hebrew Dictionary' => 'https://hebrew.english-dictionary.help',
                            'English to Hmong Dictionary' => 'https://hmong.english-dictionary.help',
                            'English to Hungarian Dictionary' => 'https://hungarian.english-dictionary.help',
                            'English to Icelandic Dictionary' => 'https://icelandic.english-dictionary.help',
                            'English to Igbo Dictionary' => 'https://igbo.english-dictionary.help',
                            'English to Indonesian Dictionary' => 'https://indonesian.english-dictionary.help',
                            'English to Irish Dictionary' => 'https://irish.english-dictionary.help',
                            'English to Italian Dictionary' => 'https://italian.english-dictionary.help',
                            'English to Japanese Dictionary' => 'https://japanese.english-dictionary.help',
                            'English to Javanese Dictionary' => 'https://javanese.english-dictionary.help',
                            'English to Kazakh Dictionary' => 'https://kazakh.english-dictionary.help',
                            'English to Khmer Dictionary' => 'https://khmer.english-dictionary.help',
                            'English to Korean Dictionary' => 'https://korean.english-dictionary.help',
                            'English to Kurmanji Dictionary' => 'https://kurmanji.english-dictionary.help',
                            'English to Kyrgyz Dictionary' => 'https://kyrgyz.english-dictionary.help',
                            'English to Lao Dictionary' => 'https://lao.english-dictionary.help',
                            'English to Latin Dictionary' => 'https://latin.english-dictionary.help',
                            'English to Latvian Dictionary' => 'https://latvian.english-dictionary.help',
                            'English to Lithuanian Dictionary' => 'https://lithuanian.english-dictionary.help',
                            'English to Luxembourgish Dictionary' => 'https://luxembourgish.english-dictionary.help',
                            'English to Macedonian Dictionary' => 'https://macedonian.english-dictionary.help',
                            'English to Malagasy Dictionary' => 'https://malagasy.english-dictionary.help',
                            'English to Malayalam Dictionary' => 'https://malayalam.english-dictionary.help',
                            'English to Maltese Dictionary' => 'https://maltese.english-dictionary.help',
                            'English to Maori Dictionary' => 'https://maori.english-dictionary.help',
                            'English to Mongolian Dictionary' => 'https://mongolian.english-dictionary.help',
                            'English to Burmese Dictionary' => 'https://burmese.english-dictionary.help',
                            'English to Norwegian Dictionary' => 'https://norwegian.english-dictionary.help',
                            'English to Pashto Dictionary' => 'https://pashto.english-dictionary.help',
                            'English to Persian Dictionary' => 'https://persian.english-dictionary.help',
                            'English to Polish Dictionary' => 'https://polish.english-dictionary.help',
                            'English to Portuguese Dictionary' => 'https://portuguese.english-dictionary.help',
                            'English to Romanian Dictionary' => 'https://romanian.english-dictionary.help',
                            'English to Russian Dictionary' => 'https://russian.english-dictionary.help',
                            'English to Samoan Dictionary' => 'https://samoan.english-dictionary.help',
                            'English to Serbian Dictionary' => 'https://serbian.english-dictionary.help',
                            'English to Shona Dictionary' => 'https://shona.english-dictionary.help',
                            'English to Sindhi Dictionary' => 'https://sindhi.english-dictionary.help',
                            'English to Sinhala Dictionary' => 'https://sinhala.english-dictionary.help',
                            'English to Slovak Dictionary' => 'https://slovak.english-dictionary.help',
                            'English to Slovenian Dictionary' => 'https://slovenian.english-dictionary.help',
                            'English to Somali Dictionary' => 'https://somali.english-dictionary.help',
                            'English to Spanish Dictionary' => 'https://spanish.english-dictionary.help',
                            'English to Sundanese Dictionary' => 'https://sundanese.english-dictionary.help',
                            'English to Swahili Dictionary' => 'https://swahili.english-dictionary.help',
                            'English to Swedish Dictionary' => 'https://swedish.english-dictionary.help',
                            'English to Tajik Dictionary' => 'https://tajik.english-dictionary.help',
                            'English to Turkish Dictionary' => 'https://turkish.english-dictionary.help',
                            'English to Ukrainian Dictionary' => 'https://ukrainian.english-dictionary.help',
                            'English to Urdu Dictionary' => 'https://urdu.english-dictionary.help',
                            'English to Uzbek Dictionary' => 'https://uzbek.english-dictionary.help',
                            'English to Vietnamese Dictionary' => 'https://vietnamese.english-dictionary.help',
                            'English to Xhosa Dictionary' => 'https://xhosa.english-dictionary.help',
                            'English to Yiddish Dictionary' => 'https://yiddish.english-dictionary.help',
                            'English to Yoruba Dictionary' => 'https://yoruba.english-dictionary.help',
                            'English to Zulu Dictionary' => 'https://zulu.english-dictionary.help',
                            'English to Bengali Dictionary' => 'https://www.bdword.com',
                            'English to Hindi Dictionary' => 'https://www.english-hindi.net',
                            'English to Tamil Dictionary' => 'https://www.english-tamil.net',
                            'English to Telugu Dictionary' => 'https://www.english-telugu.net',
                            'English to Gujarati Dictionary' => 'https://www.english-gujarati.com',
                            'English to Marathi Dictionary' => 'https://www.english-marathi.net',
                            'English to Kannada Dictionary' => 'https://www.english-kannada.com',
                            'English to Thai Dictionary' => 'https://www.english-thai.net',
                            'English to Welsh Dictionary' => 'https://www.english-welsh.net',
                            'English to Arabic Dictionary' => 'https://www.english-arabic.org',
                            'English to Malay Dictionary' => 'https://www.english-malay.net',
                            'English to Nepali Dictionary' => 'https://www.english-nepali.com',
                            'English to Punjabi Dictionary' => 'https://www.english-punjabi.net',
                          ]; 
                                      
    $data_array['left_section']['all_dictionary_links'] = $left_section_links;
    $data_array['middle_section']['banners'] = get_images();
    $data_array['youtube_section']['how_to_use'] = how_to_use();
    $data_array['page_section']['blog_list'] =blog_list();
  
    $data_array['learn_section']['grammar'] =learn_grammer();
    $data_array['word'] = words_everyday();
    $data_array['lang'] = $lang;
    $data_array['url'] = $_SERVER['HTTP_HOST'];
    
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'bdword';

    // $dbhost = '127.0.0.1';
    // $dbuser = 'root2';
    // $dbpass = '#Bdw0rd3101';
    // $dbname = 'bdword.v3';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);                 
    $data_array['topic_wise_words'] = topicWiseWords($conn, $lang);
    $data_array['common_words'] = common_words($conn, $lang, $data_array);
    $data_array['data_translation'] = Common_Translation($conn ,$lang, $data_array);
    $data_array['gre'] = gre($conn, $lang, $data_array);

    
    return $data_array;
    

}

function getLanguageArray($domainName)
{

    $lang = array(
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
        'www.english-punjabi.net' => 'punjabi',
        'bdword1.com' => 'bengali',
        'bdword2.com' => 'dutch',
        'bdword3.com' => 'maori'
    );
	
	$lang = array_map('strtolower', $lang);

    return $lang[$domainName];

};


/*========= Learn Prepositions banners start ============ */

    function get_images(){

        $data_array=[];
                        
        $domainName = getURL();

        $lang = getLang();

        $playstorelink =  'https://play.google.com/store/apps/details?id=com.bdword.e2'. $lang .'dictionary';

        if($lang=='bengali'){
            $playstorelink =  'https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary';
        }

        $images_array_links=[
                            
                            'Learn Prepositions by Photos' => array('https://server2.mcqstudy.com/bw-static-files/site_image/learn-prepositions-by-photos.webp',$domainName.'/english-to-'.$lang.'-dictionary-learn-prepositions'),
                            'Commonly confused words' => array('https://server2.mcqstudy.com/bw-static-files/site_image/commonly-confused-words.webp',$domainName.'/english-to-'.$lang.'-dictionary-commonly-confused-words'),
                            'form of verbs' => array('https://server2.mcqstudy.com/bw-static-files/site_image/form-of-verbs.webp',$domainName.'/english-to-'.$lang.'-dictionary-form-of-verbs'),
                            'Learn 300+ TOEFL words'=>array('https://server2.mcqstudy.com/bw-static-files/site_image/tofel_words.webp',$domainName.'/english-to-'.$lang.'-dictionary-300-plus-toefl-words'),
                            'Fill in the blanks' => array('https://server2.mcqstudy.com/bw-static-files/site_image/fill_in_the_gaps.webp',$domainName.'/english-to-'.$lang.'-dictionary-fill-in-the-blanks-page-1'),
                            'topic_wise_words' => array('https://server2.mcqstudy.com/bw-static-files/site_image/topic_wise_words.webp',$domainName.'/english-to-'.$lang.'-dictionary-topic-wise-words-animals'),
                            'Learn 3000+ common words'=>array('https://server2.mcqstudy.com/bw-static-files/site_image/common_words.webp',$domainName.'/english-to-'.$lang.'-dictionary-learn-3000-plus-common-words'),
                            'Learn English Grammar' => array('https://server2.mcqstudy.com/bw-static-files/site_image/english_grammar.webp'),
                            'Words Everyday' => array('https://server2.mcqstudy.com/bw-static-files/site_image/words_everyday.webp'),
                            'most_searched_words' => array('https://server2.mcqstudy.com/bw-static-files/site_image/most_searched_words.webp'),
                            'GRE words' => array('https://server2.mcqstudy.com/bw-static-files/site_image/gre_words.webp',$domainName.'/english-to-'.$lang.'-dictionary-learn-common-gre-words'),
                            'Android App' => array('https://server2.mcqstudy.com/bw-static-files/site_image/android_app.webp', $playstorelink),
                            'iPhone App' => array('https://server2.mcqstudy.com/bw-static-files/site_image/iphone_app.webp','https://apps.apple.com/us/app/english-'.$lang.'-dictionary/id1224886144?ls=1'),
                            'Chrome Extension' => array('https://server2.mcqstudy.com/bw-static-files/site_image/chrome_extension.webp','https://chrome.google.com/webstore/detail/english-to-any-language-d/apenapfkioiehfhgheabegngnfhnfbjh?hl=en&authuser=0'),
                            'Common Translations' => array('https://server2.mcqstudy.com/bw-static-files/site_image/common_translations.webp',$domainName.'/english-to-'.$lang.'-dictionary-learn-translations'),

                         ];

                        return $images_array_links;
}


/*========= Learn Prepositions banners end ============ */

/*========= How to use bd word Start ============ */

    function how_to_use(){

                    $data_array=[];

                    $youtube_link=[
                                    
                                'How to use BDWord' => 'https://www.youtube.com/embed/J8wYIw3oRhU',
                                
                                ];

                    $data_array['youtube']['link']=$youtube_link;

                    return $data_array;
}

/*========= How to use bd word end ============ */

/*=========== Blog List Start ==============*/

    function blog_list(){

                    $domainName = getURL();

                    $lang = getLang();

                    $page_link = [

                        'English to '.$lang.' Translation - List Of Best Apps and Sites'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-blog-2'),
                        
                    ];


                    return $page_link;
    }

/*=========== Blog List End ==============*/

/*=========== Topic Wise Words start ==============*/

    function topic_wise_words(){
        
        $blog_list = [
                        'Exploit (কাজে লাগান) ::'=>array('title'=>'How did his wife feel about his adventurous exploits in the air after yesterday','href'=>'https://www.bdword.com/english-to-bengali-meaning-exploit'),
                        
                      ];

                    return $blog_list;

    }

/*=========== Topic Wise Words End ==============*/

/*=========== Learn Grammar START ==============*/

    function learn_grammer(){

        $domainName = getURL();

        $lang = getLang();

        $learn_grammer=[

                        'Agreement Of Verb With Subjects'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-grammar-agreement-of-verb-with-subjects'),
                        'Sentence Simple Complex Compound'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-grammar-sentence-simple-complex-compound'),
                        'Right Form Of Verbs'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>''),
                        'Narration'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-grammar-narration'),
                        'Gender'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-grammar-gender'),
                        'Number'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-grammar-gender'),
                        'Articles'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-grammar-articles'),
                        'Voice'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-grammar-voice'),
                        'Tense'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-grammar-tense'),
                        'Parts Of Speech'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-grammar-parts-of-speech'),
                        'Sentence'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-grammar-sentence'),
                     
                    ];

                    return $learn_grammer;
    }
    
/*=========== Learn Grammar End ==============*/

/*===========  Learn Words Everyday start   ==============*/

    function words_everyday(){

        $domainName = getURL();

        $lang = getLang();
        
                    $word=[

                        'Season #24 Episode @1'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-learn-ten-words-everyday-season-24-episode-1'),
                        'Season #23 Episode @50'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-learn-ten-words-everyday-season-23-episode-50'),
                        'Season #23 Episode @49'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-learn-ten-words-everyday-season-23-episode-49'),
                        'Season #23 Episode @48'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-learn-ten-words-everyday-season-23-episode-48'),
                        'Season #23 Episode @47'=>array('image_link'=>'https://server2.mcqstudy.com/bw-static-files/img/direction_arrow2.webp','href'=>$domainName.'/english-to-'.$lang.'-dictionary-learn-ten-words-everyday-season-23-episode-47'),
                                    
                    ];

                    return $word;

    }

/*===========  Learn Words Everyday End   ==============*/

// <!-- Topic Wise Words start      -->

    function topicWiseWords($conn, $lang){

        $data = [];

        $rand = rand(1, 12700);

        $topic_words = array();
        $this_topic = '';
        $topic_word_query = mysqli_query($conn, 'select word, topic, exmp from TopicWiseWords where id>' . $rand . ' limit 5');
        $topic_all_words = array();
        while ($row = mysqli_fetch_assoc($topic_word_query)) {
            $topic_words[$row["topic"]][] = array($row["word"], $row["exmp"]);
            $topic_all_words[] = $row["word"];
        }

        $topic_mean = array();
        $topic_words_mean_query = mysqli_query($conn, 'select word, mean from x_' . $lang . ' where word in (\'' . implode('\',\'', $topic_all_words) . '\') limit 5');
        while ($topic_words_mean_row = mysqli_fetch_assoc($topic_words_mean_query)) {
            $topic_mean[$topic_words_mean_row['word']] = $topic_words_mean_row['mean'];
        }

        $data = [];

        foreach ($topic_words as $k => $v) {
            $this_topic = $k;


            foreach ($v as $vv) {

                if (isset($topic_mean[$vv[0]])) {


                    $data[$k][] = array('word'=>ucfirst($vv[0]),
                                        'meaning'=> $topic_mean[$vv[0]],
                                        'example'=> $vv[1]);

                                         }

            }
        }

        

        return $data;
        

    }

// <!-- Topic Wise Words End       -->

// <!-- Learn 3000+ Common Words Start        -->

    function common_words($conn ,$lang, $main_array){

        
        $data = [];

            $w_3000_gre_limit = 5;
            $rand_3000 = rand(1, 3335);
            $rand_gre = rand(1, 1445);
            $w_3000 = array();
            $w_gre = array();
            $query = mysqli_query($conn, 'select word, exmp from `3000` where id>' . $rand_3000 . ' limit ' . $w_3000_gre_limit);
            while ($row = mysqli_fetch_assoc($query)) {

                $w_3000[] = $row['word'];
                $exmp[$row['word']] = $row['exmp'];
            }
            $query = mysqli_query($conn, 'select word, exmp from `gre` where id>' . $rand_gre . ' limit ' . $w_3000_gre_limit);
            while ($row = mysqli_fetch_assoc($query)) {
                $w_gre[] = strtolower($row['word']);
                $exmp[strtolower($row['word'])] = $row['exmp'];
            }

            $w_3000_gre = array_merge($w_3000, $w_gre);
            // $w_3000_gre = array_merge($w_3000_gre, $word_day_rows);
            // $main_array = [];
            $w_mean = array();
            $query = mysqli_query($conn, 'select mean, word from x_' . $main_array['lang'] . ' where word in (\'' . implode('\',\'', $w_3000_gre) . '\') limit ' . ($w_3000_gre_limit * 3)) or die(mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($query)) {
                $w_mean[$row['word']] = $row['mean'];
            }

            $data = [];


            foreach ($w_3000 as $w_3) {
 

                if ($w_mean && count($w_mean) > 0 && $w_mean[$w_3] && $w_3 != $w_mean[$w_3]) {
                    $w_3_l = strtolower($w_3);

                    $data[$w_3][] =  array(  
                                            'word'=>ucfirst($w_3), 
                                            'meaning'=> $w_mean[$w_3], 
                                            'example'=> $exmp[$w_3]
                                        );
                }
            }

            return $data;
            

    }

// <!-- Learn 3000+ Common Words End        -->

// <!-- 500+ Common Translations Start        -->
   
    function PageShortIntro($limit, $tableName, $pageName, $infoTitle, $conn)
    
    {
        //connectWithCharSet();
        $domainName = getURL();

        $lang=getLanguageArray($_SERVER['HTTP_HOST']);
        
    
        $content = '<legend>' . $infoTitle . '</legend><div class="fieldset_body inner_details">';
    
        $content .= '';
    
        $query = mysqli_query($conn, 'SELECT sentence, trans FROM `' . $tableName . '` ORDER BY RAND() LIMIT ' . $limit);
        $i = 1;
    
    
        while ($row = mysqli_fetch_assoc($query)) {
    
            $content .= "<span><div class='label_font'>" . $row['sentence'] . " : </div> " . $row['trans'] . "</span>";
            $i++;
        }

        $content .= '</div><button class="btn_default5 bdr_radius2"><a href="'.$domainName.'/english-to-bengali-dictionary-learn-translations">More</a></button>';
    
        return $content;
        
    }




    function Common_Translation($conn , $lang, $main_array ){

        $data_translation = [];
        
        $data_translation = array(

            PageShortIntro(5, 'common_translations', 'english-to-'.$lang.'-dictionary-learn-translations', '500+ Common Translations', $conn),
        
        ); 
        
        return $data_translation;
        
    }

// <!-- 500+ Common Translations End        -->

// <!-- Learn Common GRE Words Start        -->

    function gre($conn ,$lang, $main_array){

        
        $data_last = [];

            $w_3000_gre_limit = 5;
            $rand_3000 = rand(1, 3335);
            $rand_gre = rand(1, 1445);
            $w_3000 = array();
            $w_gre = array();
            $query = mysqli_query($conn, 'select word, exmp from `3000` where id>' . $rand_3000 . ' limit ' . $w_3000_gre_limit);
            while ($row = mysqli_fetch_assoc($query)) {

                $w_3000[] = $row['word'];
                $exmp[$row['word']] = $row['exmp'];
            }
            $query = mysqli_query($conn, 'select word, exmp from `gre` where id>' . $rand_gre . ' limit ' . $w_3000_gre_limit);
            while ($row = mysqli_fetch_assoc($query)) {
                $w_gre[] = strtolower($row['word']);
                $exmp[strtolower($row['word'])] = $row['exmp'];
            }

            $w_3000_gre = array_merge($w_3000, $w_gre);
            // $w_3000_gre = array_merge($w_3000_gre, $word_day_rows);
            // $main_array = [];
            $w_mean = array();
            $query = mysqli_query($conn, 'select mean, word from x_' . $main_array['lang'] . ' where word in (\'' . implode('\',\'', $w_3000_gre) . '\') limit ' . ($w_3000_gre_limit * 3)) or die(mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($query)) {
                $w_mean[$row['word']] = $row['mean'];
            }

            $data_last = [];

            foreach ($w_gre as $w_g) {
                        if (count($w_mean) > 0 && isset($w_mean[$w_g]) && $w_g != $w_mean[$w_g]) {
                            $data_last[$w_g][] =  array(  
                                'word'=>ucfirst($w_g), 
                                'meaning'=> $w_mean[$w_g], 
                                'example'=> $exmp[$w_g]
                            );
                        
                        }
                    }
            return $data_last;

    }

// <!-- Learn Common GRE Words End        -->

    echo json_encode(get_data());


?>

        

