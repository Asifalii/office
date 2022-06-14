<div class="box_wrapper">
    <fieldset>
        <?php

        



		$url = parse_url($main_array['baseurl']);
        $string = str_replace('www.', '', $url['host']);
        $string = str_replace('- ', '-',
            ucwords(str_replace('-', '- ', $string)));
        $string = str_replace('. ', '.',
            ucwords(str_replace('.', '. ', $string)));

        if ($main_array['q'])

            echo '<legend class="custom_font2"><h2>' . $string . ' | English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' Dictionary</h2></legend>';

        else

            echo '<legend class="custom_font2"><h1>' . $string . ' | English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' Dictionary</h1></legend>';

        ?>


        <div class="fieldset_body inner_details">

            <div style="text-align: justify">
                <span> This is not just an ordinary English to <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> dictionary & <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> to English dictionary. This dictionary has the largest database for word meaning. It does not only give you English to <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> and <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> to English word meaning, it provides English to English word meaning along with Antonyms, Synonyms, Examples, Related words and Examples from your favorite TV Shows. This dictionary helps you to search quickly for <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> to English translation, English to <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> translation. It has more than 500,000 word meaning and is still growing. This English to <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> dictionary also provides you an Android application for your offline use.

                The dictionary has mainly three features : translate English words to <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?>, translate <?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> words to English, copy & paste any paragraph in the Reat Text box then tap on any word to get instant word meaning. This website also provides you English Grammar, TOEFL and most common words.

            </span>
            </div>

            <span>
                            	<button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?= $main_array['baseurl'] ?><?= $main_array['lang'] ?>-to-english-dictionary"
                                       title="<?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> to English Dictionary"><?= str_replace("Bengali", "Bangla", $main_array['ulang']) ?> to English Dictionary</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-read-text-with-translation" title="Read Text">Read Text</a>
                                </button>
                              
                                <button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-favourite-words"
                                       title="Browse Favorite Words">Favorite Words</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-learn-ten-words-everyday"
                                       title="Learn Ten Words Everyday">Learn Words</a>
                                </button>

                                <button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-vocabulary-game"
                                       title="Play Vocabulary Games">Vocabulary Games</a>
                                </button>

								<button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-fill-in-the-blanks-page-1"
                                       title="Learn Fill in the Blanks">Fill in the Blanks</a>
                                </button>
								<button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-search-history"
                                       title="Browse Word Search History">Word Search History</a>
                                </button>

                                <button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-phrase"
                                       title="phrase">Phrase</a>
                                </button>

                        	</span>
        </div>
    </fieldset>

        <div class="banners">     

        </div>

    <fieldset class="how_to_use">
        <legend>
            <h1>     

            </h1>
        </legend>
    </fieldset>

   
    <fieldset>
        <legend><h2>Blog List</h2></legend>
          <div class="">
            <div class="topic_link blog_list">  

            </div>
        </div>
    </fieldset>

    <fieldset class="topic_wiseWords_section">
        <legend><h2>Topic Wise Words</h2></legend>
        <div class="fieldset_body inner_details Topic_Wise ">

        </div>
    </fieldset>

    
    <fieldset class="Learn_3000_Common_Words">

        <legend><h2>Learn 3000+ Common Words</h2></legend>
        <div class="fieldset_body inner_details CommonWords ">

        </div>  

    </fieldset> 


    <fieldset class="learn learn2"> 
        <div class="fieldset_body inner_details CommonWords ">  

        </div>  
    </fieldset> 


    <fieldset class="grelasstohide">    
        <legend><h2>Learn Common GRE Words</h2></legend>    

        <div class="fieldset_body inner_details GRE">   

        </div>  
        
    </fieldset>

  
        <fieldset>
            <legend>Learn Grammar</legend>

            <div class="fieldset_body">
                <div class="topic_link grammar ">
                    
                </div>
            </div>
        </fieldset>



    <fieldset>
        <legend><h2>Learn Words Everyday</h2></legend>
        <div class="fieldset_body">
            <div class="topic_link word">
                
               
    </fieldset>

    </fieldset>

</div>