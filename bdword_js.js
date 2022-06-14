
window.lang = null;
function getLangByDomain(domainName){

    var langName = null;

    var langMap = { 'afrikaans.english-dictionary.help':'afrikaans',
                    'albanian.english-dictionary.help' : 'albanian',
                    'amharic.english-dictionary.help' : 'amharic',
                    'armenian.english-dictionary.help' : 'armenian',
                    'azerbaijani.english-dictionary.help' : 'azerbaijani',
                    'basque.english-dictionary.help' : 'basque',
                    'belarusian.english-dictionary.help' : 'belarusian',
                    'bosnian.english-dictionary.help' : 'bosnian',
                    'bulgarian.english-dictionary.help' : 'bulgarian',
                    'catalan.english-dictionary.help' : 'catalan',
                    'cebuano.english-dictionary.help' : 'cebuano',
                    'chichewa.english-dictionary.help' : 'chichewa',
                    'chinese.english-dictionary.help' : 'chinese',
                    'corsican.english-dictionary.help' : 'corsican',
                    'croatian.english-dictionary.help' : 'croatian',
                    'czech.english-dictionary.help' : 'czech',
                    'danish.english-dictionary.help' : 'danish',
                    'dutch.english-dictionary.help' : 'dutch',
                    'esperanto.english-dictionary.help' : 'esperanto',
                    'estonian.english-dictionary.help' : 'estonian',
                    'filipino.english-dictionary.help' : 'filipino',
                    'finnish.english-dictionary.help' : 'finnish',
                    'french.english-dictionary.help' : 'french',
                    'frisian.english-dictionary.help' : 'frisian',
                    'galician.english-dictionary.help' : 'galician',
                    'georgian.english-dictionary.help' : 'georgian',
                    'german.english-dictionary.help' : 'german',
                    'greek.english-dictionary.help' : 'greek',
                    'haitian.english-dictionary.help' : 'haitian',
                    'hausa.english-dictionary.help' : 'hausa',
                    'hawaiian.english-dictionary.help' : 'hawaiian',
                    'hebrew.english-dictionary.help' : 'hebrew',
                    'hmong.english-dictionary.help' : 'hmong',
                    'hungarian.english-dictionary.help' : 'hungarian',
                    'icelandic.english-dictionary.help' : 'icelandic',
                    'igbo.english-dictionary.help' : 'igbo',
                    'indonesian.english-dictionary.help' : 'indonesian',
                    'irish.english-dictionary.help' : 'irish',
                    'italian.english-dictionary.help' : 'italian',
                    'japanese.english-dictionary.help' : 'japanese',
                    'javanese.english-dictionary.help' : 'javanese',
                    'kazakh.english-dictionary.help' : 'kazakh',
                    'khmer.english-dictionary.help' : 'khmer',
                    'korean.english-dictionary.help' : 'korean',
                    'kurmanji.english-dictionary.help' : 'kurmanji',
                    'kyrgyz.english-dictionary.help' : 'kyrgyz',
                    'lao.english-dictionary.help' : 'lao',
                    'latin.english-dictionary.help' : 'latin',
                    'latvian.english-dictionary.help' : 'latvian',
                    'lithuanian.english-dictionary.help' : 'lithuanian',
                    'luxembourgish.english-dictionary.help' : 'luxembourgish',
                    'macedonian.english-dictionary.help' : 'macedonian',
                    'malagasy.english-dictionary.help' : 'malagasy',
                    'malayalam.english-dictionary.help' : 'malayalam',
                    'maltese.english-dictionary.help' : 'maltese',
                    'maori.english-dictionary.help' : 'maori',
                    'mongolian.english-dictionary.help' : 'mongolian',
                    'burmese.english-dictionary.help' : 'burmese',
                    'norwegian.english-dictionary.help' : 'norwegian',
                    'pashto.english-dictionary.help' : 'pashto',
                    'persian.english-dictionary.help' : 'persian',
                    'polish.english-dictionary.help' : 'polish',
                    'portuguese.english-dictionary.help' : 'portuguese',
                    'romanian.english-dictionary.help' : 'romanian',
                    'russian.english-dictionary.help' : 'russian',
                    'samoan.english-dictionary.help' : 'samoan',
                    'serbian.english-dictionary.help' : 'serbian',
                    'shona.english-dictionary.help' : 'shona',
                    'sindhi.english-dictionary.help' : 'sindhi',
                    'sinhala.english-dictionary.help' : 'sinhala',
                    'slovak.english-dictionary.help' : 'slovak',
                    'slovenian.english-dictionary.help' : 'slovenian',
                    'somali.english-dictionary.help' : 'somali',
                    'spanish.english-dictionary.help' : 'spanish',
                    'sundanese.english-dictionary.help' : 'sundanese',
                    'swahili.english-dictionary.help' : 'swahili',
                    'swedish.english-dictionary.help' : 'swedish',
                    'tajik.english-dictionary.help' : 'tajik',
                    'turkish.english-dictionary.help' : 'turkish',
                    'ukrainian.english-dictionary.help' : 'ukrainian',
                    'urdu.english-dictionary.help' : 'urdu',
                    'uzbek.english-dictionary.help' : 'uzbek',
                    'vietnamese.english-dictionary.help' : 'vietnamese',
                    'xhosa.english-dictionary.help' : 'xhosa',
                    'yiddish.english-dictionary.help' : 'yiddish',
                    'yoruba.english-dictionary.help' : 'yoruba',
                    'zulu.english-dictionary.help' : 'zulu',
                    'www.bdword.com' : 'bengali',
                    'www.english-hindi.net' : 'hindi',
                    'www.english-tamil.net' : 'tamil',
                    'www.english-telugu.net' : 'telugu',
                    'www.english-gujarati.com' : 'gujarati',
                    'www.english-marathi.net' : 'marathi',
                    'www.english-kannada.com' : 'kannada',
                    'www.english-thai.net' : 'thai',
                    'www.english-welsh.net' : 'welsh',
                    'www.english-arabic.org' : 'arabic',
                    'www.english-malay.net' : 'malay',
                    'www.english-nepali.com' : 'nepali',
                    'www.english-punjabi.net' : 'punjabi',
                    'bdword1.com' : 'dutch',
                    'bdword3.com' : 'maori',
                    'bdword1.com' : 'bengali'
    };
    if(langMap[domainName]){
        langName = langMap[domainName];
    }
                                        
    return langName;
 
}

/* Here we get domain name , and url */
window.lang = getLangByDomain(window.location.origin.replace('http://','').replace('https://',''));
window.url = window.location.origin;


$(document).ready(

    function left_module(){
        $.ajax({
        type: "get",
        url: "https://server2.mcqstudy.com/bw22/bdw_api.php?lang="+window.lang+"&url="+window.url,

        
        
        success: function (data) {

// <!-- all dictionary links start  -->  

            var left_section_html = '';

            var data_parsed = JSON.parse(data);

            for (var k in data_parsed.left_section.all_dictionary_links) {

                var dictionary_link = data_parsed.left_section.all_dictionary_links[k];

                left_section_html += '<li><span><a title="'+k+'"  href="'+dictionary_link+'" target="_blank"><label style="color: black; cursor: pointer">'+k+'</label></a></span></li><br>';
                
                console.log(k);

            }

            $('.all_dictionary_links').html(left_section_html);

// <!-- all dictionary links end  -->

// <!-- Learn Prepositions banners start  -->


            var middle_section_html = '';       
            
            for (var p in data_parsed.middle_section.banners) {

                var banners_links = data_parsed.middle_section.banners[p];
                
                middle_section_html += '<a href="'+banners_links[1]+'"><img src="'+banners_links[0]+'"alt="'+p+'" width="100%" loading="lazy"></a>'
                
                console.log(p);               

            }              

            $('.banners').html(middle_section_html);

// <!-- Learn Prepositions banners end    -->

// <!-- How to use bd word start    -->


            var youtube_section_html = '';

            for (var x in data_parsed.youtube_section.how_to_use.youtube.link){

                var how_to_use_links = data_parsed.youtube_section.how_to_use.youtube.link[x];

                youtube_section_html += '<h1><a target="_blank" href="'+how_to_use_links+'" title="'+x+'">'+x+'</a></h1>';
                
                console.log(x);

            }

            $('.how_to_use').html(youtube_section_html);

// <!-- How to use bd word end    -->

// <!-- Blog List Start    -->

            var blog_section_html = '';

            console.log('data_parsed.page_section.blog_list', data_parsed.page_section.blog_list);

            for (var b in data_parsed.page_section.blog_list){

                var image_link = data_parsed.page_section.blog_list[b].image_link;

                var href = data_parsed.page_section.blog_list[b].href;
                
                blog_section_html +='<a href="'+href+'" title="'+b+'"><img src="'+image_link+'">'+b+'</a>';

                console.log(b);
            }

            $('.blog_list').html(blog_section_html);


// <!-- Blog List End      -->

// <!-- Topic Wise Words start      -->

            var topicWiseWordsHtml = '';

            for(var q in data_parsed.topic_wise_words){

                var data_var = data_parsed.topic_wise_words[q];

                topicWiseWordsHtml+='<div class="custom_font4">● '+q.charAt(0).toUpperCase() + q.slice(1)+' </div>'

                for(var k in data_var){

                        topicWiseWordsHtml += '<span><a title="'+k+'" href="'+window.url+'/english-to-'+window.lang+'-meaning-'+data_var[k].word.toLowerCase()+'"><label>'+data_var[k].word+' ('+data_var[k].meaning+') :: </label>'+data_var[k].example+'</a></span>';           
                }
            
                topicWiseWordsHtml += '<button class="btn_default5 bdr_radius2"><a title="'+k+'" href="'+window.url+'/english-to-'+window.lang+'-dictionary-topic-wise-words-'+q+'">See all</a> </button>';
                
                
                console.log(topicWiseWordsHtml);
            
            }
           
            $('.Topic_Wise').html(topicWiseWordsHtml);

            if(data_parsed.topic_wise_words.length==0){

                $('.topic_wiseWords_section').hide();

            }


// <!-- Topic Wise Words End        -->

// <!-- Learn 3000+ Common Words Start        -->

            var Learn3000WordsHtml = '';

            for( var t in data_parsed.common_words){

                var data_var2 = data_parsed.common_words[t];

                for(var u in data_var2){

                            Learn3000WordsHtml += '<span><a title="'+u+'" href="'+window.url+'/english-to-'+window.lang+'-meaning-'+data_var2[u].word.toLowerCase()+'"><label>'+data_var2[u].word+' ('+data_var2[u].meaning+') :: </label>'+data_var2[u].example+'</a></span>';
                }

                console.log(Learn3000WordsHtml); 

            }   

            Learn3000WordsHtml += '<button class="btn_default5 bdr_radius2"><a title="'+u+'" href="'+window.url+'/english-to-'+window.lang+'-dictionary-learn-3000-plus-common-words">See all</a></button>';
            
            $('.CommonWords').html(Learn3000WordsHtml);

            if(data_parsed.common_words.length==0){

                $('.Learn_3000_Common_Words').hide();

            }

// <!-- Learn 3000+ Common Words End        -->

// <!-- 500+ Common Translations Start        -->


            var translationsHtml = '';

            console.log('data_parsed.data_translation', data_parsed.data_translation);

            for (var x in data_parsed.data_translation){

                var data_var2_ = data_parsed.data_translation[x];

                translationsHtml +='<span>'+data_var2_+'</span>';

                console.log(x);

            }       

            $('.learn').html(translationsHtml);

            if(data_parsed.data_translation.length==0){

                $('.learn2').hide();

            }


           

// <!-- 500+ Common Translations End        -->

// <!-- Learn Common GRE Words Start        -->

            var greHtml = '';

            for( var a in data_parsed.gre){

                var data_var2 = data_parsed.gre[a];

                for(var g in data_var2){

                    greHtml += '<span><a title="'+g+'" href="'+window.url+'/english-to-'+window.lang+'-meaning-'+data_var2[g].word.toLowerCase()+'"><label>'+data_var2[g].word+' ('+data_var2[g].meaning+') :: </label>'+data_var2[g].example+'</a></span>';
                }

                console.log(greHtml);
                
            }   
            greHtml += '<button class="btn_default5 bdr_radius2"><a title="'+g+'" href="'+window.url+'/english-to-'+window.lang+'-dictionary-learn-common-gre-words">See all</a></button>';

            $('.GRE').html(greHtml);

            if(data_parsed.gre.length==0){

                $('.grelasstohide').hide();

            }

// <!-- Learn Common GRE Words End        -->

// <!-- Learn Grammar START -->
                
            var Learn_Grammar_html ='';

            console.log('data_parsed.learn_section.grammar', data_parsed.learn_section.grammar);
            
            for(var y in data_parsed.learn_section.grammar){

                var image_link = data_parsed.learn_section.grammar[y].image_link;

                var route = data_parsed.learn_section.grammar[y].href;

                Learn_Grammar_html +='<a href="'+route+'" title="'+y+'"><img src="'+image_link+'">'+y+'</a>';
            }

            $('.grammar').html(Learn_Grammar_html);


// <!-- Learn Grammar END   -->

// <!-- Learn Words Everyday start   -->

        var learn_new_words ='';

        console.log('data_parsed.word', data_parsed.word);

        for(var n in data_parsed.word){

            var image_link = data_parsed.word[n].image_link;

            var routeLink = data_parsed.word[n].href;

            learn_new_words +='<a href="'+routeLink+'" title="'+n+'"><img src="'+image_link+'">'+n+'</a>';
        }

        $('.word').html(learn_new_words);

// <!-- Learn Words Everyday End   -->

        console.log('data-->', data_parsed);    
            
        },
        error: function () {
            console.log("error");
        }

    });


});

