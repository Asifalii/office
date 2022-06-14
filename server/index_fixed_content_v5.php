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
                        	</span>
        </div>
    </fieldset>

    <div><a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-learn-prepositions"
            title="Learn Prepositions by Photos">
            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/learn-prepositions-by-photos.webp"
                 onerror="this.onerror=null; this.src='<?= $contentUrl ?>site_image/learn-prepositions-by-photos.jpg'"
                 alt="Learn Prepositions by Photos" width="100%" loading="lazy"></a></div>

    <div><a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-commonly-confused-words" title="commonly confused words"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/commonly-confused-words.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/commonly-confused-words.jpg'" alt="commonly confused words" width="100%" loading="lazy"/></a></div>

    <div><a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-form-of-verbs" title="form of verbs"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/form-of-verbs.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/form-of-verbs.jpg'" alt="form of verbs" width="100%" loading="lazy"/></a></div>

    <div><a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-300-plus-toefl-words" title="Learn 300+ TOEFL words"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/tofel_words.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/tofel_words.jpg'" alt="Learn 300+ TOEFL words" width="100%" loading="lazy"/></a></div>

    <div><a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-fill-in-the-blanks-page-1" title="Fill in the blanks"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/fill_in_the_gaps.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/fill_in_the_gaps.jpg'" alt="Fill in the blanks" width="100%" loading="lazy"/></a></div>

    <div><a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-topic-wise-words-animals" title="Topic Wise Words"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/topic_wise_words.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/topic_wise_words.jpg'" alt="Topic Wise Words" width="100%" loading="lazy"/></a></div>

    <div><a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-learn-3000-plus-common-words" title="Learn 3000+ common words"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/common_words.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/common_words.jpg'" alt="Learn 3000+ common words" width="100%" loading="lazy"/></a></div>

    <?php if ($main_array['lang'] == 'bengali' or $main_array['lang'] == 'bangla') { ?>

        <div>
            <a href="<?=$main_array['baseurl']?>english-to-<?=$main_array['lang']?>-dictionary-grammar-post_id-25-cat-2"
               title="Learn English Grammar"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/english_grammar.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/english_grammar.jpg'" alt="Learn English Grammar" width="100%" loading="lazy"/></a></div>

    <?php } ?>

    <div><a href="<?= $main_array['baseurl'] ?><?= $main_array['lang'] ?>-to-english-dictionary" id="words_everyday" title="Words Everyday"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/words_everyday.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/words_everyday.jpg'" alt="Words Everyday" width="100%" loading="lazy"/></a></div>

    <div><a href="<?= $main_array['baseurl'] ?><?= $main_array['lang'] ?>-to-english-dictionary" id="most_search_words" title="Most Searched Words"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/most_searched_words.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/most_searched_words.jpg'" alt="most searched words" width="100%" loading="lazy"/></a></div>

    <div><a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-learn-common-gre-words" title="GRE Words"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/gre_words.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/gre_words.jpg'" alt="GRE Words" width="100%" loading="lazy"/></a></div>

    <?php if ($main_array['lang'] == 'bengali') { ?>
        <div><a href="https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary" title="Android App"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/android_app.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/android_app.jpg'" alt="Android App" width="100%" loading="lazy"/></a></div>
        <div><a href="https://itunes.apple.com/us/app/english-bengali-dictionary/id1213381239?ls=1&mt=8" title="iPhone App"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/iphone_app.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/iphone_app.jpg'" alt="iPhone App" width="100%" loading="lazy"/></a></div>
    <?php } else {
        $getAppId_query = mysqli_query($conn, 'select AppId from AppIds where Lang=\'' . $main_array['lang'] . '\' limit 1');

        if ($getAppId_query) {

            $getAppId = mysqli_fetch_assoc($getAppId_query);
            $appId = $getAppId['AppId'];
            $download_link = 'https://itunes.apple.com/us/app/english-' . $main_array['lang'] . '-dictionary/id' . $appId . '?ls=1&mt=8';

            ?>
            <div>
                <a href="https://play.google.com/store/apps/details?id=com.bdword.e2<?= $main_array['lang'] ?>dictionary" title="Android App"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/android_app.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/android_app.jpg'" alt="Android App" width="100%" loading="lazy"/></a></div>
            <div><a href="<?= $download_link ?>" title="iPhone App"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/iphone_app.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/iphone_app.jpg'" alt="iPhone App" width="100%" loading="lazy"/></a></div>

        <?php }
    } ?>

    <?php if ($main_array['lang'] == 'bengali') { ?>
        <div>
            <a href="https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl"
               title="Chrome Extension"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/chrome_extension.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/chrome_extension.jpg'" alt="Chrome Extension" width="100%" loading="lazy"/></a></div>
        <?php if (!$main_array['q'] && $main_array['lang'] == 'bengali') { ?>
            <div><a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-learn-translations" title="Common Translations"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/common_translations.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/common_translations.jpg'" alt="Common Translations" width="100%" loading="lazy"/></a></div>

        <?php } ?>
    <?php } ?>

    <?php if ($main_array['lang'] != 'bengali') { ?>
        <div>
            <a href="https://chrome.google.com/webstore/detail/english-to-any-language-d/apenapfkioiehfhgheabegngnfhnfbjh?hl=en&authuser=0"
               title="Chrome Extension"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl ?>site_image/chrome_extension.webp" onerror="this.onerror=null; this.src='<?=$contentUrl?>site_image/chrome_extension.jpg'" alt="Chrome Extension" width="100%" loading="lazy"/></a></div>

    <?php } ?>


    <?php if ($main_array['lang'] == 'bengali') { ?>

        <fieldset class="bdr_radius3">
            <legend>
                <h1><a target="_blank" href="https://www.youtube.com/embed/J8wYIw3oRhU" title="How to use BDWord">How to use BDWord</a></h1>
            </legend>

        </fieldset>

    <?php } ?>

    <fieldset>
        <legend><h2>Blog List</h2></legend>

        <div class="fieldset_body">
            <div class="topic_link">
                <?php
				
                $sql = "SELECT id,title,subject FROM blog_info WHERE lang = 'all' OR lang = '" . strtolower($main_array['lang']) . "'";
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <a title="<?= str_replace("[lang]", str_replace("Bengali", "Bangla", $main_array['ulang']), $row['title']) ?>"
                           href="<?= $main_array['baseurl']?>english-to-<?=$main_array['lang']?>-dictionary-blog-<?= $row['id'] ?>"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl?>img/direction_arrow2.webp" onerror="this.onerror=null; this.src='<?= $contentUrl?>img/direction_arrow2.png'" width="22px" height="22px" alt="icon" loading="lazy"><span><?= str_replace("[lang]", str_replace("Bengali", "Bangla", $main_array['ulang']), $row['title']) ?></span></a>
                    <?php }
                } ?>
            </div>
        </div>

    </fieldset>

    <fieldset>
        <legend><h2>Topic Wise Words</h2></legend>

        <div class="fieldset_body inner_details">

            <?php


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
            $topic_words_mean_query = mysqli_query($conn, 'select word, mean from x_' . $main_array['lang'] . ' where word in (\'' . implode('\',\'', $topic_all_words) . '\') limit 5');
            while ($topic_words_mean_row = mysqli_fetch_assoc($topic_words_mean_query)) {
                $topic_mean[$topic_words_mean_row['word']] = $topic_words_mean_row['mean'];
            }

            foreach ($topic_words as $k => $v) {
                $this_topic = $k;
                echo '<div class="custom_font4">&#9679; ' . ucfirst($k) . '</div>';
                foreach ($v as $vv) {
                    if (isset($topic_mean[$vv[0]])) {
                        
                        echo '<span><a title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' Meaning of ' . ucfirst($vv[0]) . '" href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-meaning-' . urlencode($vv[0]) . '"><label>' . ucfirst($vv[0]) . ' (' . $topic_mean[$vv[0]] . ') :: </label>' . $vv[1] . '</a></span>';
                    }

                }
            }

            ?>

        </div>
        <button class="btn_default5 bdr_radius2">
            <a title="See all topic wise words" href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-topic-wise-words-<?= $this_topic ?>">See all</a>
        </button>
        <script>

            var topic_wise_words_link = document.getElementById("topic_wise_words");

            if (topic_wise_words_link !== null) {
                topic_wise_words_link.setAttribute('href', "<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-topic-wise-words-<?=$this_topic?>");
            }


        </script>
    </fieldset>
    <fieldset>
        <legend><h2>Learn 3000+ Common Words</h2></legend>

        <div class="fieldset_body inner_details">
            <?php

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

            $w_mean = array();
            $query = mysqli_query($conn, 'select mean, word from x_' . $main_array['lang'] . ' where word in (\'' . implode('\',\'', $w_3000_gre) . '\') limit ' . ($w_3000_gre_limit * 3)) or die(mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($query)) {
                $w_mean[$row['word']] = $row['mean'];
            }

            foreach ($w_3000 as $w_3) {
                if (count($w_mean) > 0 && $w_mean[$w_3] && $w_3 != $w_mean[$w_3]) {
                    $w_3_l = strtolower($w_3);
                    echo '<span><a title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' Meaning of ' . ucfirst($w_3) . '" href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-meaning-' . urlencode($w_3) . '"><label>' . ucfirst($w_3) . ' (' . $w_mean[$w_3] . ') :: </label>' . $exmp[$w_3_l] . '</a></span>';
                }
            }


            ?>
        </div>
        <button class="btn_default5 bdr_radius2">
            <a title="See all 3000+ common words" href="<?=$main_array['baseurl']?>english-to-<?=$main_array['lang']?>-dictionary-learn-3000-plus-common-words">See all</a>
        </button>
    </fieldset>

    <?php

    if (!$main_array['q'] and $main_array['lang'] == 'bengali') {
        ?>
        <fieldset>
            <?php echo PageShortIntro(5, 'common_translations', 'english-to-'.$main_array['lang'].'-dictionary-learn-translations', '500+ Common Translations', $conn); ?>
        </fieldset>
    <?php } ?>

    <fieldset>
        <legend><h2>Learn Common GRE Words</h2></legend>

        <div class="fieldset_body inner_details">
            <?php


            foreach ($w_gre as $w_g) {
                if (count($w_mean) > 0 && isset($w_mean[$w_g]) && $w_g != $w_mean[$w_g]) {
                    echo '<span><a title="English to ' . str_replace("Bengali", "Bangla", $main_array['ulang']) . ' Meaning of ' . ucfirst($w_g) . '" href="' . $main_array['baseurl'] . 'english-to-' . $main_array['lang'] . '-meaning-' . urlencode($w_g) . '"><label>' . ucfirst($w_g) . ' (' . $w_mean[$w_g] . ') :: </label>' . $exmp[$w_g] . '</a></span>';
                }
            }

            ?>
        </div>
        <button class="btn_default5 bdr_radius2">
            <a title="See all GRE words" href="<?=$main_array['baseurl']?>english-to-<?=$main_array['lang']?>-dictionary-learn-common-gre-words">See all</a>
        </button>
    </fieldset>

    <?php if ($main_array['lang'] == 'bengali') { ?>
        <fieldset>
            <legend>Learn Grammar</legend>

            <div class="fieldset_body">
                <div class="topic_link">
                    <?= $main_array['grammar'] ?>
                </div>
            </div>
        </fieldset>
    <?php } ?>


    <fieldset>
        <legend><h2>Learn Words Everyday</h2></legend>
        <div class="fieldset_body">
            <div class="topic_link">

                <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-learn-ten-words-everyday-season-24-episode-1"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl?>img/direction_arrow2.webp" onerror="this.onerror=null; this.src='<?= $contentUrl?>img/direction_arrow2.png'" width="22px" height="22px" alt="icon" loading="lazy"><span>Season #24 Episode @1</span>
                </a>
                <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-learn-ten-words-everyday-season-23-episode-50"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl?>img/direction_arrow2.webp" onerror="this.onerror=null; this.src='<?= $contentUrl?>img/direction_arrow2.png'"  width="22px" height="22px" alt="icon" loading="lazy"><span>Season #23 Episode @50</span>
                </a>
                <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-learn-ten-words-everyday-season-23-episode-49"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl?>img/direction_arrow2.webp" onerror="this.onerror=null; this.src='<?= $contentUrl?>img/direction_arrow2.png'" width="22px" height="22px" alt="icon" loading="lazy"><span>Season #23 Episode @49</span>
                </a>
                <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-learn-ten-words-everyday-season-23-episode-48"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="  data-src="<?= $contentUrl?>img/direction_arrow2.webp" onerror="this.onerror=null; this.src='<?= $contentUrl?>img/direction_arrow2.png'" width="22px" height="22px" alt="icon" loading="lazy"><span>Season #23 Episode @48</span>
                </a>
                <a href="<?= $main_array['baseurl'] ?>english-to-<?=$main_array['lang']?>-dictionary-learn-ten-words-everyday-season-23-episode-47"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?= $contentUrl?>img/direction_arrow2.webp" onerror="this.onerror=null; this.src='<?= $contentUrl?>img/direction_arrow2.png'" width="22px" height="22px" alt="icon" loading="lazy"><span>Season #23 Episode @47</span>
                </a>

                <?php
                echo '</div></div><button class="btn_default5 bdr_radius2"><a href="' . $main_array['baseurl'] . 'english-to-'.$main_array['lang'].'-dictionary-learn-ten-words-everyday">See All Seasons</a></button>';
                ?>

    </fieldset>

    </fieldset>

</div>