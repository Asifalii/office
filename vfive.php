<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('./v5/connect.php');
require_once('search-functions.php');

redirectToLocalTranslation();

// moveHttpToHttps();

$main_array = array();
$main_array['q'] = sanitize($conn);
$main_array['baurl'] = 'https://media.english-dictionary.help/ba2/';
$main_array['movssurl'] = 'https://media.english-dictionary.help/ss/';
$main_array['ismobile'] = isMobile();
$main_array['url'] = base_url();
$main_array['baseurl'] = base_url() . '/';
$main_array['lang'] = getLang();

redirectOlds($main_array['lang']);

$main_array['ulang'] = ucfirst($main_array['lang']);
$main_array['scriptname'] = getScriptName();
$main_array['title'] = getTitle($main_array['q'], $main_array['url'], $main_array['scriptname'], $main_array['lang'], $main_array['ulang']);

$main_array['metadescription'] = getMetaDescription($main_array['lang'], $main_array['ulang'], $main_array['q']);
$main_array['analyticsid'] = getAnalyticsId();

$main_array['canonicallink'] = getCanonicalLink($conn, $main_array['scriptname'], $main_array['lang'], $main_array['baseurl'], $main_array['q']);
$main_array['googlesiteverify'] = getGoogleSiteVerify($main_array['lang']);
$main_array['iswordbanned'] = getWordBannedStatus($conn, $main_array['q']);
// $main_array['alladcodes'] = getAllAdCodes($main_array['ismobile'], $main_array['iswordbanned'], $main_array['scriptname'], $main_array['lang']);
$main_array['autoad'] = getAutoAd($main_array['iswordbanned']);
$main_array['logotext'] = getLogoText($main_array['lang'], $main_array['ulang']);
$main_array['devicename'] = getDevice();
$main_array['jumbodownloadbox'] = getJumboDownloadBox($main_array['lang'], $main_array['devicename'], $main_array['baseurl']);
$main_array['honetitle'] = getHOneTitle($main_array['q'], $main_array['ulang']);
// $main_array['maindata'] = getMainData($conn, $main_array['q'], '0', $main_array['lang']);
$main_array['sidebarappdetails'] = getSidebarAppDetails($conn, $main_array['lang']);
$main_array['grammar'] = getGrammar($conn, $main_array['baseurl']);


?>

<!doctype html>
<html>
<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="<?= $main_array['googlesiteverify'] ?>"/>
    <title><?= $main_array['title'] ?></title>

    <meta name="description" content="<?= $main_array['metadescription'] ?>">

    <link rel="canonical" href="<?= $main_array['canonicallink'] ?>"/>

    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="English :: <?= $main_array['ulang'] ?> Online Dictionary"/>
    <meta property="og:description"
          content="English to <?= $main_array['ulang'] ?> Dictionary (Free). You can get meaning of any English word very easily. It has auto-suggestion feature which will save you a lot of time getting any meaning. We have a Chrome Extension and an Android App"/>
    <meta property="og:url" content="<?= $main_array['url'] ?>"/>
    <meta property="og:site_name" content="English :: <?= $main_array['ulang'] ?> Online Dictionary"/>

    <link rel="shortcut icon" href="img/favicon.png">

    <link rel="stylesheet" href="<?= $main_array['baseurl'] ?>main-style.css">

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', '<?=$main_array['analyticsid']?>', 'auto');
        ga('send', 'pageview');
    </script>

    <?php
    // echo $main_array['alladcodes']['mobile_head'];
    echo $main_array['autoad'];
    ?>

</head>

<body>

<!--Site Wrapper-->
<div id="site_wrapper">
    <div class="header_wrapper">
        <div class="content_wrapper">
            <div class="header_logo">
                <a href="index.php" style="text-transform:uppercase;"><?= $main_array['logotext'] ?></a>
            </div>
            <div class="search_fld">
                <form autocomplete="off" name="new_form" action="<?= $main_array['baseurl'] ?>" id="new_form">
                    <input type="text" id="q" name="q" value="<?= $main_array['q'] ?>" autocomplete="off" required
                           placeholder="Type English word/phrase" onKeyPress="edValueKeyPress()"
                           onKeyUp="edValueKeyPress()"/>
                    <button type="submit" class="search_btn"></button>

                    <div id="myInputautocomplete-list" class="autocomplete-items">

                    </div>
                </form>
            </div>

            <div class="header_nav_collapse">
                <label onclick="showHideMenu()"></label>
                <ul id="menu">
                    <li>
                        <a href="<?= $main_array['baseurl'] ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?= $main_array['baseurl'] ?>read-text.php">Read Text</a>
                    </li>
                    <li>
                        <a href="<?= $main_array['baseurl'] ?>vocabulary-game.php">Games</a>
                    </li>
                    <li>
                        <a href="<?= $main_array['baseurl'] ?>learn-ten-words-everyday.php">Words Everyday</a>
                    </li>
                    <li>
                        <a href="<?= $main_array['baseurl'] ?><?= $main_array['lang'] ?>-to-english-dictionary"
                           title="<?= $main_array['ulang'] ?> to English Dictionary"><?= $main_array['ulang'] ?> to
                            English Dictionary</a>
                    </li>
                    <li>
                        <a href="<?= $main_array['baseurl'] ?>browse-words.php" title="Browse English Words">Browse
                            Words</a>
                    </li>
                    <!--li>
                        	<a href="<?= $main_array['baseurl'] ?>word-history.php" title="Browse Word History">Word History</a>
                        </li-->
                    <li>
                        <a href="<?= $main_array['baseurl'] ?>favourite-words.php" title="Browse Favorite Words">Favorite
                            Words</a>
                    </li>
                    <li>
                        <a href="<?= $main_array['baseurl'] ?>contact-us.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="content_wrapper top_margin">
        <div class="left_content">

            <?php
            // echo ($main_array['ismobile'])?$main_array['alladcodes']['300']:'';
            // echo (!$main_array['ismobile'])?$main_array['alladcodes']['body_top']:'';
            ?>

            <?php

            if ($main_array['q'] and $main_array['lang']) {

                $q = $main_array['q'];

                ?>
                <div class="box_wrapper">

                    <fieldset>
                        <?= $main_array['honetitle'] ?>

                        <div class="fieldset_body inner_details">


                            <?php

                            $y_bengali = mysqli_fetch_assoc(mysqli_query($conn, "select details from y_" . $main_array['lang'] . " where word='" . $q . "' limit 1"));
                            $y_bengali_details = json_decode($y_bengali['details'], true);


                            if (isset($y_bengali_details) && sizeof($y_bengali_details) > 0) {

                                $mquery = mysqli_query($conn, 'select mean from `x_' . $main_array['lang'] . '` where word=\'' . $q . '\' limit 1');

                                $get_root_query = mysqli_fetch_assoc(mysqli_query($conn, 'select root from v3_word_list where word=\'' . $q . '\' limit 1'));

                                if ($get_root_query['root']) {
                                    $q = $get_root_query['root'];
                                }

                                $mrow = mysqli_fetch_assoc($mquery);

                                $sql = 'select word, ' . $main_array['lang'] . ', id, data from v3_word_frame where word=\'' . $q . '\' limit 1';

                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($query);


                                $id = $row['id'];
                                $data = json_decode($row['data']);
                                $mean = json_decode($row[$main_array['lang']]);
                                $nex = null;
                                $prev = null;
                                $ba_img = null;
                                $img_check = mysqli_fetch_assoc(mysqli_query($conn, 'select nex,prev,height,width from img_words where word=\'' . $q . '\' limit 1'));
                                if ($img_check['nex']) {
                                    $ba_img = $q;
                                    $nex = $img_check['nex'];
                                    $prev = $img_check['prev'];
                                    $height = $img_check['height'];
                                    $width = $img_check['width'];
                                }
 if($ba_img and $main_array['lang'] == 'bengali'){ ?>
                                    <span><div class="h_line"></div>
                                        <label>Bangla Academy Ovidhan :</label>
                                        <div class="h_line2"></div>
                                        <div class="dic_img">
                                            <img
                                                    src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="<?= $main_array['baurl'].strtoupper($ba_img).'.JPG'.'.webp' ?>"
                                                    onerror="this.onerror=null; this.src='<?= $main_array['baurl'].strtoupper($ba_img).'.JPG' ?>'"
                                                    alt="<?= $q ?>"  title="<?= $q ?>">
									<?php  }
                                // bn
                                $mean_array = get_object_vars($mean);


                                $details = $y_bengali_details;

                                echo '<span><label>English to ' . $main_array['ulang'] . ' Meaning :<label></span>';

                                if ((isset($details['result']) && $details['result'] != null) || (isset($details['m']) && $details['m'] != null && sizeof($details['m']) > 0)) {

                                    foreach ($details as $key => $value) {

                                        if ($key != 'result') {

                                            if ($key == 'm') {

                                                if (isset($value) && $value != null && sizeof($value) > 0) {

                                                    echo '<span><label>Details : </label>';

                                                    echo implode(', ', $value);

                                                    echo '</span>';

                                                }

                                            } else {

                                                echo '<span><label>' . $key . ' : </label>';

                                                echo implode(', ', $value);

                                                echo '</span>';

                                            }

                                        }

                                    }

                                }

                                // show top meaning

                                echo '<span><div class="align_text  custom_font2">' . ucfirst($q) . ' : </div><div class="align_text2">' . $mrow['mean'] . '</div><label class="img_align"> Pronunciation: <button class="icon_button" onclick="responsiveVoice.speak(\'' . $q . '\')"><img height="26" width="26" src="img/play-icon.png"></button></label>
		                           <label class="img_align">Add to Favorite: <button class="icon_button" onclick="calFavs(\'' . $q . '\', 1)"><img height="26" width="26" src="img/favourite-icon.png"></button></label></span>';

                                $total_words = explode(' ', $q);
                                $total_words_cnt = count($total_words);
                                if ($total_words > 1) {
                                    $ta_array = array();
                                    foreach ($total_words as $ta) {
                                        $ta_array[] = mysqli_real_escape_string($conn, $ta);
                                    }

                                    // show extra meaning for phrases

                                    $extra_sql = mysqli_query($conn, 'select word, mean from `x_' . $main_array['lang'] . '` where word in (\'' . implode('\',\'', $ta_array) . '\') limit ' . $total_words_cnt);
                                    while ($extra_row = mysqli_fetch_assoc($extra_sql)) {
                                        echo '<span><a href="' . $main_array['url'] . '/english-to-' . $main_array['lang'] . '-meaning-' . strtolower($extra_row['word']) . '" title="English to ' . $main_array['ulang'] . ' meaning of ' . $extra_row['word'] . '"><label>' . ucfirst($extra_row['word']) . '</label></a> - ' . $extra_row['mean'] . '</span>';
                                    }

                                }

                                // related

                                $related_query = mysqli_query($conn, 'select variant from variants where word like \'' . $q . '\' limit 5');
                                $related_words = array();
                                while ($related_row = mysqli_fetch_assoc($related_query)) {
                                    if ($related_row['variant'] != $q) {
                                        $related_words[] = $related_row['variant'];
                                    }

                                }

                                $related_words_imp = "'" . implode("','", $related_words) . "'";

                                $related_mean_query = mysqli_query($conn, "select " . $main_array['lang'] . " as mean, word from lang where word in (" . $related_words_imp . ")");
                                $related_mean_array = array();
                                while ($related_mean_row = mysqli_fetch_assoc($related_mean_query)) {
                                    echo '<span><label>' . ucfirst($related_mean_row['word']) . ' :: </label>' . $related_mean_row['mean'] . '</span>';
                                }

                                // related ends

                                // next prev
                                echo '<span><div class="custom_margin2"></div>';
                                //echo ($prev)?'<button class="btn_pre bdr_radius2"><a title="English to '.$ulang.' meaning of '.$prev.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$prev.'">&leftarrow; '.ucfirst($prev).'</a>':'';
                                echo ($prev) ? '<button class="btn_pre bdr_radius2"><a title="English to ' . $main_array['ulang'] . ' meaning of ' . $prev . '" class="btn btn-raised btn-primary" href="' . $main_array['baseurl'] . '?q=' . $prev . '">&leftarrow; ' . ucfirst($prev) . '</a>' : '';

                                //echo ($nex)?'<button class="btn_next bdr_radius2"><a title="English to '.$ulang.' meaning of '.$nex.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$nex.'">'.$nex.' &rightarrow;</a></button>':'';
                                echo ($nex) ? '<button class="btn_next bdr_radius2"><a title="English to ' . $main_array['ulang'] . ' meaning of ' . $nex . '" class="btn btn-raised btn-primary" href="' . $main_array['baseurl'] . '?q=' . $nex . '">' . $nex . ' &rightarrow;</a></button>' : '';

                                echo '<div style="clear:both;">&nbsp;</div>';

                                // echo $main_array['alladcodes']['300_2'];

                                echo '<div class="custom_margin3"></div></span>';

                                // see also in

                                echo '<span><label>Other Refferences :</label>
								<button class="btn_default4 bdr_radius2">
									<a href="http://the-definition.com/dictionary/' . $q . '" target="_blank">The Definition</a>
								</button>
								<button class="btn_default4 bdr_radius2">
									<a href="http://dictionary.reference.com/browse/' . $q . '?s=t" target="_blank">Dictionary.com</a>
								</button>
                                <button class="btn_default4 bdr_radius2">
									<a href="http://www.merriam-webster.com/dictionary/' . $q . '" target="_blank">Merriam Webster</a>
								</button>
                                <button class="btn_default4 bdr_radius2">
									<a href="http://en.wikipedia.org/wiki/' . $q . '" target="_blank">Wikipedia</a>
								</button>';


                                // en
                                if ($data->eng != null) {

                                    $eng = '';
                                    $i = 0;

                                    foreach ($data->eng as $key => $val) {
                                        $i++;
                                        if ($i > 1) {
                                            $eng .= '<br />';
                                        }

                                        $eng .= '<strong class="custom_font2 custom_margin3">' . ucfirst($key) . '</strong>';

                                        $j = 0;
                                        foreach ($val as $v) {
                                            $j++;
                                            $eng .= '<span>(' . $j . ') ' . $v . '</span>';

                                            if ($j > 15) {
                                                break;
                                            }

                                        }

                                    }

                                }


                                // examples
                                if ($data->examples && count($data->examples) > 0) {

                                    $examples = '';
                                    $i = 0;

                                    foreach ($data->examples as $val) {
                                        $i++;
                                        if ($i > 1) {
                                            //$examples .= '<br />';
                                        }

                                        $examples .= '<span>(' . $i . ') ' . $val . '</span>';
                                        if ($i > 15) {
                                            break;
                                        }
                                    }

                                }


                                ?>

                                <span>
               <div class="accordion_collapse">
                                <h4 onclick="showHideAccordion()" class="custom-accordion-header">Show English Meaning <div
                                            class="icon_right">(+)</div></h4>
                                <div id="accordion" class="custom-accordion-content">
                                    <?php echo $eng; ?>
                                </div>
                              </div>
                                
               <div class="custom_margin"></div>    
                              
               <div class="accordion_collapse">
                                <h4 onclick="showHideAccordion2()" class="custom-accordion-header">Show Examples <div
                                            class="icon_right">(+)</div></h4>
                                <div id="accordion2" class="custom-accordion-content">
                                    <?php echo $examples; ?>
                                </div>
                               </div>
        </span>

                                <!--phrases-->
                                <div class="custom_margin2"></div>

                                <?php if ($data->phrase && count($data->phrase) > 0) {
                                    echo '<div><strong>Related Words</strong></div>';

                                    $i = 0;
                                    foreach ($data->phrase as $key => $val) {

                                        if (isset($mean_array[trim($val)])) {
                                            $i++;

                                            echo '<span><div class="label_font">(' . $i . ') ' . $val . ' :: </div>' . $mean_array[trim($val)] . '</span>';
                                        }
                                        if ($i > 15) {
                                            break;
                                        }
                                    }

                                } ?>


                                <span>
		<!--synonyms-->
		
		<?php if ($data->syn) {
            echo '<div class="float_div"><div class="line_height"><strong>Synonyms</strong></div>';


            $i = 0;
            foreach ($data->syn as $key => $val) {

                echo "<div class='line_height'><strong>" . ucfirst($key) . "</strong></div>";

                foreach ($val as $k => $v) {
                    $i++;
                    if (isset($mean_array[trim($v)]))
                        echo '<div class="label_font line_height">' . $i . '. ' . $v . ' :: </div><div class="line_height">' . $mean_array[trim($v)] . '</div>';
                }


            }


            echo '</div>';
        } ?>
		
		<!--antonyms-->
		<?php if ($data->anto && count($data->anto) > 0) {
            echo '<div class="float_div"><div class="line_height"><strong>Antonyms</strong></div>';

            $i = 0;
            foreach ($data->anto as $key => $val) {
                if ($mean_array[$val]) {
                    $i++;
                    if ($i > 1) {
                        //echo '<hr>';
                    }
                    //if($mean_array[$v] != '')
                    echo '<div class="label_font line_height">' . $i . '. ' . $val . ' :: </div><div class="line_height">' . $mean_array[$val] . '</div>';
                }
                if ($i > 15) {
                    break;
                }
            }


            echo '</div>';
        } ?>
		</span>

                                <!--variants-->

                                <span>
		<?php if ($data->variants && count($data->variants) > 0) {
            echo '<div class="custom_font2 custom_margin"><strong>Different Forms</strong></div>';

            echo '<div class="jumbo_details variants">';
            echo implode(', ', $data->variants);
            echo '</div>';
        }

        // similar
        if (isset($data->similar)) {
            echo '<div class="custom_font2 custom_margin"><strong>Similar Words</strong></div>';

            echo '<div class="jumbo_details similar">';
            echo implode(', ', $data->similar);
            echo '</div>';
        } ?>
		
		</span>

                                <?php
                            } else {

                                // echo 'select mean from x_'.$main_array['lang'].' where word=\''.$q.'\' limit 1';

                                $x_bengali_query = mysqli_query($conn, 'select mean from x_' . $main_array['lang'] . ' where word=\'' . $q . '\' limit 1');

                                $x_bengali = ($x_bengali_query) ? mysqli_fetch_assoc($x_bengali_query) : null;

                                // echo "<pre>";
                                // print_r($x_bengali);

                                if (isset($x_bengali['mean']) && sizeof($x_bengali) > 0) {

                                    //show single $x_bengali['mean']

                                    $variants = mysqli_fetch_assoc(mysqli_query($conn, 'select word from variants where word like \'' . $q . '\''));
                                    $y_bengali = mysqli_fetch_assoc(mysqli_query($conn, "select details from y_" . $main_array['lang'] . " where word='" . $variants['word'] . "' limit 1"));

                                    $mquery = mysqli_query($conn, "select mean from x_" . $main_array['lang'] . " where word='" . $q . "' limit 1");

                                    $get_root_query = mysqli_fetch_assoc(mysqli_query($conn, 'select root from v3_word_list where word=\'' . $q . '\' limit 1'));

                                    // echo $get_root_query['root'];die;

                                    if ($get_root_query['root']) {
                                        $q = $get_root_query['root'];
                                    }

                                    $mrow = mysqli_fetch_assoc($mquery);

                                    $sql = 'select word, ' . $main_array['lang'] . ', id, data from v3_word_frame where word=\'' . $q . '\' limit 1';

                                    $query = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($query);


                                    $id = $row['id'];
                                    $data = json_decode($row['data']);
                                    $mean = json_decode($row[$main_array['lang']]);
                                    $nex = null;
                                    $prev = null;
                                    $ba_img = null;
                                    $img_check = mysqli_fetch_assoc(mysqli_query($conn, 'select nex,prev,height,width from img_words where word=\'' . $q . '\' limit 1'));
                                    if ($img_check['nex']) {
                                        $ba_img = $q;
                                        $nex = $img_check['nex'];
                                        $prev = $img_check['prev'];
                                        $height = $img_check['height'];
                                        $width = $img_check['width'];
                                    }

                              
									if($ba_img and $lang == 'bengali'){?>
                                        <span><div class="h_line"></div><label>Bangla Academy Ovidhan :</label>
                                            <div class="h_line2"></div><div class="dic_img">
                                                <img
                                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                        data-src="<?= $main_array['movssurl'].strtoupper($ba_img).'.JPG'.'.webp' ?>"
                                                        onerror="this.onerror=null; this.src='<?= $main_array['movssurl'].strtoupper($ba_img).'.JPG' ?>'"
                                                        alt="<?= $q ?>"  title="<?= $q ?>">
									</div></span>
                                  <?php  }
								  
                                    // bn
                                    if (isset($mean))
                                        $mean_array = get_object_vars($mean);

                                    if (isset($y_bengali['details']))
                                        $details = json_decode($y_bengali['details'], true);

                                    echo '<span><label>English to ' . $main_array['ulang'] . ' Meaning :<label></span>';

                                    if ((isset($details['result']) && $details['result'] != null) || (isset($details['m']) && $details['m'] != null && sizeof($details['m']) > 0)) {

                                        foreach ($details as $key => $value) {

                                            if ($key != 'result') {

                                                if ($key == 'm') {

                                                    if (isset($value) && $value != null && sizeof($value) > 0) {

                                                        echo '<span><label>Details : </label>';

                                                        echo implode(', ', $value);

                                                        echo '</span>';

                                                    }

                                                } else {

                                                    echo '<span><label>' . $key . ' : </label>';

                                                    echo implode(', ', $value);

                                                    echo '</span>';

                                                }

                                            }

                                        }

                                    }

                                    // show top meaning

                                    echo '<span><div class="align_text  custom_font2">' . ucfirst($q) . ' : </div><div class="align_text2">' . $mrow['mean'] . '</div><label class="img_align"> Word Pronounce: <button class="icon_button" onclick="responsiveVoice.speak(\'' . $q . '\')"><img height="26" width="26" src="img/play-icon.png"></button></label>
		                           <label class="img_align">Store Favourite: <button class="icon_button" onclick="calFavs(\'' . $q . '\', 1)"><img height="26" width="26" src="img/favourite-icon.png"></button></label></span>';

                                    $total_words = explode(' ', $q);
                                    $total_words_cnt = count($total_words);
                                    if ($total_words > 1) {
                                        $ta_array = array();
                                        foreach ($total_words as $ta) {
                                            $ta_array[] = mysqli_real_escape_string($conn, $ta);
                                        }

                                        // show extra meaning for phrases

                                        $extra_sql = mysqli_query($conn, "select word, mean from x_" . $main_array['lang'] . " where word in ('" . implode("','", $ta_array) . "') limit " . $total_words_cnt);
                                        while ($extra_row = mysqli_fetch_assoc($extra_sql)) {
                                            echo '<span><a href="' . $main_array['url'] . '/english-to-' . $main_array['lang'] . '-meaning-' . strtolower($extra_row['word']) . '" title="English to ' . $main_array['ulang'] . ' meaning of ' . $extra_row['word'] . '"><label>' . ucfirst($extra_row['word']) . '</label></a> - ' . $extra_row['mean'] . '</span>';
                                        }

                                    }

                                    // related

                                    $related_query = mysqli_query($conn, 'select variant from variants where word like \'' . $q . '\' limit 5');
                                    $related_words = array();
                                    while ($related_row = mysqli_fetch_assoc($related_query)) {
                                        if ($related_row['variant'] != $q) {
                                            $related_words[] = $related_row['variant'];
                                        }

                                    }

                                    $related_words_count = count($related_words);
                                    $related_words_imp = "'" . implode("','", $related_words) . "'";

                                    $related_mean_query = mysqli_query($conn, "select " . $main_array['lang'] . " as mean, word from lang where word in (" . $related_words_imp . ") limit " . $related_words_count);
                                    $related_mean_array = array();
                                    while ($related_mean_row = mysqli_fetch_assoc($related_mean_query)) {
                                        echo '<span><label>' . ucfirst($related_mean_row['word']) . ' :: </label>' . $related_mean_row['mean'] . '</span>';
                                    }

                                    // related ends

                                    // next prev
                                    echo '<span><div class="custom_margin2"></div>';
                                    //echo ($prev)?'<button class="btn_pre bdr_radius2"><a title="English to '.$ulang.' meaning of '.$prev.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$prev.'">&leftarrow; '.ucfirst($prev).'</a>':'';
                                    echo ($prev) ? '<button class="btn_pre bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $prev . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $prev . '">&leftarrow; ' . ucfirst($prev) . '</a>' : '';
                                    //echo ($nex)?'<button class="btn_next bdr_radius2"><a title="English to '.$ulang.' meaning of '.$nex.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$nex.'">'.$nex.' &rightarrow;</a></button>':'';
                                    echo ($nex) ? '<button class="btn_next bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $nex . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $nex . '">' . $nex . ' &rightarrow;</a></button>' : '';

                                    echo '<div class="custom_margin3"></div></span>';

                                    // see also in

                                    echo '<span><label>Other Refferences :</label>
								<button class="btn_default4 bdr_radius2">
									<a href="http://the-definition.com/dictionary/' . $q . '" target="_blank">The Definition</a>
								</button>
								<button class="btn_default4 bdr_radius2">
									<a href="http://dictionary.reference.com/browse/' . $q . '?s=t" target="_blank">Dictionary.com</a>
								</button>
                                <button class="btn_default4 bdr_radius2">
									<a href="http://www.merriam-webster.com/dictionary/' . $q . '" target="_blank">Merriam Webster</a>
								</button>
                                <button class="btn_default4 bdr_radius2">
									<a href="http://en.wikipedia.org/wiki/' . $q . '" target="_blank">Wikipedia</a>
								</button>';


                                    // en
                                    $eng = '';
                                    if (isset($data->eng)) {


                                        $i = 0;

                                        foreach ($data->eng as $key => $val) {
                                            $i++;
                                            if ($i > 1) {
                                                $eng .= '<br />';
                                            }

                                            $eng .= '<strong class="custom_font2 custom_margin3">' . ucfirst($key) . '</strong>';

                                            $j = 0;
                                            foreach ($val as $v) {
                                                $j++;
                                                $eng .= '<span>(' . $j . ') ' . $v . '</span>';

                                                if ($j > 15) {
                                                    break;
                                                }

                                            }

                                        }

                                    }

                                    $examples = '';
                                    // examples
                                    if (isset($data->examples)) {


                                        $i = 0;

                                        foreach ($data->examples as $val) {
                                            $i++;
                                            if ($i > 1) {
                                                //$examples .= '<br />';
                                            }

                                            $examples .= '<span>(' . $i . ') ' . $val . '</span>';
                                            if ($i > 15) {
                                                break;
                                            }
                                        }

                                    }

                                    ?>


                                    <span>

			<?php if ($eng != '') { ?>

                <div class="accordion_collapse">
					<h4 onclick="showHideAccordion()" class="custom-accordion-header">Show English Meaning</h4>
						<div id="accordion" class="custom-accordion-content">
							<?php echo $eng; ?>
						</div>
					</div>
                <div class="custom_margin"></div>

            <?php } ?>
                                        <?php if ($examples != '') { ?>

                                            <div class="accordion_collapse">
					<h4 onclick="showHideAccordion2()" class="custom-accordion-header">Show Examples</h4>
					<div id="accordion2" class="custom-accordion-content">
						<?php echo $examples; ?>
					</div>
                </div>

                                        <?php } ?>

        </span>


                                    <!--phrases-->
                                    <div class="custom_margin2"></div>

                                    <?php
                                    if (isset($data->phrase) && count($data->phrase) > 0) {
                                        echo '<div><strong>Related Words</strong></div>';

                                        $i = 0;
                                        foreach ($data->phrase as $key => $val) {
                                            if ($mean_array[$val]) {
                                                $i++;
                                                if ($i > 1) {
                                                    echo '<hr>';
                                                }
                                                echo '<span><div class="label_font">(' . $i . ') ' . $val . ' :: </div>' . $mean_array[$val] . '</span>';
                                            }
                                            if ($i > 15) {
                                                break;
                                            }
                                        }

                                    } ?>


                                    <span>
		<!--synonyms-->
		
		<?php if (isset($data->syn)) {
            echo '<div class="float_div"><div class="line_height"><strong>Synonyms</strong></div>';


            $i = 0;
            foreach ($data->syn as $key => $val) {

                echo "<div class='line_height'><strong>" . ucfirst($key) . "</strong></div>";

                foreach ($val as $v) {
                    $i++;

                    if (isset($mean_array[$v]))
                        echo '<div class="label_font line_height">' . $i . '. ' . $v . ' :: </div><div class="line_height">' . $mean_array[$v] . '</div>';
                }


            }


            echo '</div>';
        } ?>
		
		<!--antonyms-->
		<?php if (isset($data->anto) && count($data->anto) > 0) {
            echo '<div class="float_div"><div class="line_height"><strong>Antonyms</strong></div>';

            $i = 0;
            foreach ($data->anto as $key => $val) {
                if ($mean_array[$val]) {
                    $i++;
                    if ($i > 1) {
                        //echo '<hr>';
                    }
                    //if($mean_array[$v] != '')
                    echo '<div class="label_font line_height">' . $i . '. ' . $val . ' :: </div><div class="line_height">' . $mean_array[$val] . '</div>';
                }
                if ($i > 15) {
                    break;
                }
            }


            echo '</div>';
        } ?>
		</span>

                                    <!--variants-->

                                    <span>
		<?php if (isset($data->variants) && count($data->variants) > 0) {
            echo '<div class="custom_font2 custom_margin"><strong>Different Forms</strong></div>';

            //echo '<div class="jumbo_details variants">';
            echo implode(', ', $data->variants);
            //echo '</div>';
        }

        // similar
        if (isset($data->similar)) {
            echo '<div class="custom_font2 custom_margin"><strong>Similar Words</strong></div>';

            //echo '<div class="jumbo_details similar">';
            echo implode(', ', $data->similar);
            //echo '</div>';
        } ?>
		
		</span>
                                <?php } else {


                                    $variants = mysqli_fetch_assoc(mysqli_query($conn, 'select word from variants where word like \'' . $q . '\''));

                                    if (isset($variants['word']) && sizeof($variants['word']) > 0) {
                                        $y_bengali = mysqli_fetch_assoc(mysqli_query($conn, "select details from y_" . $main_array['lang'] . " where word='" . $variants['word'] . "' limit 1"));

                                        //if(isset(json_decode($y_bengali['details'],true)) && sizeof(json_decode($y_bengali['details'],true)) > 0){
                                        if (sizeof(json_decode($y_bengali['details'], true)) > 0) {
                                            $mquery = mysqli_query($conn, "select mean from x_" . $main_array['lang'] . " where word='" . $q . "' limit 1");

                                            $get_root_query = mysqli_fetch_assoc(mysqli_query($conn, 'select root from v3_word_list where word="' . $q . '"'));

                                            // echo $get_root_query['root'];die;

                                            if ($get_root_query['root']) {
                                                $q = $get_root_query['root'];
                                            }

                                            $mrow = mysqli_fetch_assoc($mquery);

                                            $sql = 'select word, ' . $main_array['lang'] . ', id, data from v3_word_frame where word="' . $q . '" limit 1';

                                            $query = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($query);


                                            $id = $row['id'];
                                            $data = json_decode($row['data']);
                                            $mean = json_decode($row[$lang]);
                                            $nex = null;
                                            $prev = null;
                                            $ba_img = null;
                                            $img_check = mysqli_fetch_assoc(mysqli_query($conn, 'select nex,prev,height,width from img_words where word="' . $q . '" limit 1'));
                                            if ($img_check['nex']) {
                                                $ba_img = $q;
                                                $nex = $img_check['nex'];
                                                $prev = $img_check['prev'];
                                                $height = $img_check['height'];
                                                $width = $img_check['width'];
                                            }

                                            // img
                                            echo ($ba_img and $lang == 'bengali') ? '<span><div class="h_line"></div><label>Bangla Academy Ovidhan :</label><div class="h_line2"></div><div class="dic_img">
		<img src="' . $url . '/word/' . strtoupper($ba_img) . '.JPG" title="' . $q . '" alt="' . $q . '"></div></span>' : '';

                                            // bn
                                            $mean_array = get_object_vars($mean);

                                            $details = json_decode($y_bengali['details'], true);

                                            echo '<span><label>English to ' . $ulang . ' Meaning :<label></span>';

                                            if ((isset($details['result']) && $details['result'] != null) || (isset($details['m']) && $details['m'] != null && sizeof($details['m']) > 0)) {

                                                foreach ($details as $key => $value) {

                                                    if ($key != 'result') {

                                                        if ($key == 'm') {

                                                            if (isset($value) && $value != null && sizeof($value) > 0) {

                                                                echo '<span><label>Details : </label>';

                                                                echo implode(', ', $value);

                                                                echo '</span>';

                                                            }

                                                        } else {

                                                            echo '<span><label>' . $key . ' : </label>';

                                                            echo implode(', ', $value);

                                                            echo '</span>';

                                                        }

                                                    }

                                                }

                                            }

                                            // show top meaning

                                            echo '<span><div class="align_text  custom_font2">' . ucfirst($q) . ' : </div><div class="align_text2">' . $mrow['mean'] . '</div><label class="img_align"> Word Pronounce: <button class="icon_button" onclick="responsiveVoice.speak(\'' . $q . '\')"><img height="26" width="26" src="img/play-icon.png"></button></label>
		                           <label class="img_align">Store Favourite: <button class="icon_button" onclick="calFavs(\'' . $q . '\', 1)"><img height="26" width="26" src="img/favourite-icon.png"></button></label></span>';

                                            $total_words = explode(' ', $q);
                                            $total_words_cnt = count($total_words);
                                            if ($total_words > 1) {
                                                $ta_array = array();
                                                foreach ($total_words as $ta) {
                                                    $ta_array[] = mysqli_real_escape_string($conn, $ta);
                                                }

                                                // show extra meaning for phrases

                                                $extra_sql = mysqli_query($conn, 'select word, mean from x_' . $main_array['lang'] . ' where word in ("' . implode('","', $ta_array) . '") limit ' . $total_words_cnt);
                                                while ($extra_row = mysqli_fetch_assoc($extra_sql)) {
                                                    echo '<span><a href="' . $base_url . '/english-to-' . $main_array['lang'] . '-meaning-' . strtolower($extra_row['word']) . '" title="English to ' . $ulang . ' meaning of ' . $extra_row['word'] . '"><label>' . ucfirst($extra_row['word']) . '</label></a> - ' . $extra_row['mean'] . '</span>';
                                                }

                                            }

                                            // related

                                            $related_query = mysqli_query($conn, 'select variant from variants where word like "' . $q . '"');
                                            $related_words = array();
                                            while ($related_row = mysqli_fetch_assoc($related_query)) {
                                                if ($related_row['variant'] != $q) {
                                                    $related_words[] = $related_row['variant'];
                                                }

                                            }

                                            $related_words_imp = "'" . implode("','", $related_words) . "'";

                                            $related_mean_query = mysqli_query($conn, "select " . $main_array['lang'] . " as mean, word from lang where word in (" . $related_words_imp . ")");
                                            $related_mean_array = array();
                                            while ($related_mean_row = mysqli_fetch_assoc($related_mean_query)) {
                                                echo '<span><label>' . ucfirst($related_mean_row['word']) . ' :: </label>' . $related_mean_row['mean'] . '</span>';
                                            }

                                            // related ends

                                            // next prev
                                            echo '<span><div class="custom_margin2"></div>';
                                            //echo ($prev)?'<button class="btn_pre bdr_radius2"><a title="English to '.$ulang.' meaning of '.$prev.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$prev.'">&leftarrow; '.ucfirst($prev).'</a>':'';
                                            echo ($prev) ? '<button class="btn_pre bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $prev . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $prev . '">&leftarrow; ' . ucfirst($prev) . '</a>' : '';

                                            //echo ($nex)?'<button class="btn_next bdr_radius2"><a title="English to '.$ulang.' meaning of '.$nex.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$nex.'">'.$nex.' &rightarrow;</a></button>':'';
                                            echo ($nex) ? '<button class="btn_next bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $nex . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $nex . '">' . $nex . ' &rightarrow;</a></button>' : '';


                                            echo '<div class="custom_margin3"></div></span>';

                                            // see also in

                                            echo '<span><label>Other Refferences :</label>
								<button class="btn_default4 bdr_radius2">
									<a href="http://the-definition.com/dictionary/' . $q . '" target="_blank">The Definition</a>
								</button>
								<button class="btn_default4 bdr_radius2">
									<a href="http://dictionary.reference.com/browse/' . $q . '?s=t" target="_blank">Dictionary.com</a>
								</button>
                                <button class="btn_default4 bdr_radius2">
									<a href="http://www.merriam-webster.com/dictionary/' . $q . '" target="_blank">Merriam Webster</a>
								</button>
                                <button class="btn_default4 bdr_radius2">
									<a href="http://en.wikipedia.org/wiki/' . $q . '" target="_blank">Wikipedia</a>
								</button>';


                                            // en
                                            if ($data->eng && count($data->eng) > 0) {

                                                $eng = '';
                                                $i = 0;

                                                foreach ($data->eng as $key => $val) {
                                                    $i++;
                                                    if ($i > 1) {
                                                        $eng .= '<br />';
                                                    }

                                                    $eng .= '<strong class="custom_font2 custom_margin3">' . ucfirst($key) . '</strong>';

                                                    $j = 0;
                                                    foreach ($val as $v) {
                                                        $j++;
                                                        $eng .= '<span>(' . $j . ') ' . $v . '</span>';

                                                        if ($j > 15) {
                                                            break;
                                                        }

                                                    }

                                                }

                                            }


                                            // examples
                                            if ($data->examples && count($data->examples) > 0) {

                                                $examples = '';
                                                $i = 0;

                                                foreach ($data->examples as $val) {
                                                    $i++;
                                                    if ($i > 1) {
                                                        //$examples .= '<br />';
                                                    }

                                                    $examples .= '<span>(' . $i . ') ' . $val . '</span>';
                                                    if ($i > 15) {
                                                        break;
                                                    }
                                                }

                                            }

                                            ?>

                                            <span>
               <div class="accordion_collapse">
                                <h4 onclick="showHideAccordion()"
                                    class="custom-accordion-header">Show English Meaning</h4>
                                <div id="accordion" class="custom-accordion-content">
                                    <?php echo $eng; ?>
                                </div>
                              </div>

               <div class="custom_margin"></div>

               <div class="accordion_collapse">
                                <h4 onclick="showHideAccordion2()" class="custom-accordion-header">Show Examples</h4>
                                <div id="accordion2" class="custom-accordion-content">
                                    <?php echo $examples; ?>
                                </div>
                               </div>
        </span>

                                            <!--phrases-->
                                            <div class="custom_margin2"></div>

                                            <?php if ($data->phrase && count($data->phrase) > 0) {
                                                echo '<div><strong>Related Words</strong></div>';

                                                $i = 0;
                                                foreach ($data->phrase as $key => $val) {
                                                    if ($mean_array[$val]) {
                                                        $i++;
                                                        if ($i > 1) {
                                                            echo '<hr>';
                                                        }
                                                        echo '<span><div class="label_font">(' . $i . ') ' . $val . ' :: </div>' . $mean_array[$val] . '</span>';
                                                    }
                                                    if ($i > 15) {
                                                        break;
                                                    }
                                                }

                                            } ?>


                                            <span>
		<!--synonyms-->

		<?php if ($data->syn && count($data->syn) > 0) {
            echo '<div class="float_div"><div class="line_height"><strong>Synonyms</strong></div>';


            $i = 0;
            foreach ($data->syn as $key => $val) {

                echo "<div class='line_height'><strong>" . ucfirst($key) . "</strong></div>";

                foreach ($val as $v) {
                    $i++;
                    if ($i > 1) {
                        //echo '<hr>';
                    }

                    if ($mean_array[$v] != '')
                        echo '<div class="label_font line_height">' . $i . '. ' . $v . ' :: </div><div class="line_height">' . $mean_array[$v] . '</div>';
                }


            }


            echo '</div>';
        } ?>

		<!--antonyms-->
		<?php if ($data->anto && count($data->anto) > 0) {
            echo '<div class="float_div"><div class="line_height"><strong>Antonyms</strong></div>';

            $i = 0;
            foreach ($data->anto as $key => $val) {
                if ($mean_array[$val]) {
                    $i++;
                    if ($i > 1) {
                        //echo '<hr>';
                    }
                    //if($mean_array[$v] != '')
                    echo '<div class="label_font line_height">' . $i . '. ' . $val . ' :: </div><div class="line_height">' . $mean_array[$val] . '</div>';
                }
                if ($i > 15) {
                    break;
                }
            }


            echo '</div>';
        } ?>
		</span>

                                            <!--variants-->

                                            <span>
		<?php if ($data->variants && count($data->variants) > 0) {
            echo '<div class="custom_font2 custom_margin"><strong>Different Forms</strong></div>';

            //echo '<div class="jumbo_details variants">';
            echo implode(', ', $data->variants);
            //echo '</div>';
        }

        // similar
        if ($data->similar && count($data->similar) > 0) {
            echo '<div class="custom_font2 custom_margin"><strong>Similar Words</strong></div>';

            //echo '<div class="jumbo_details similar">';
            echo implode(', ', $data->similar);
            //echo '</div>';
        } ?>

		</span>
                                        <?php } else {
                                            //show details(word frame)
                                        }
                                    } else {
                                        echo '<span><div class="alert_text">No word meaning found for: ' . $q . '</div><div class="custom_margin3"></div><div class="h_line"></div>';
                                        $pspell_array = [];

                                        $pspell_array = getSuggestionForWrongWord($q);


                                        if (count($pspell_array) > 0) {
                                            echo '<div class="custom_font3">Did you mean ' . $pspell_array[0] . '?</div></span>';

                                            foreach ($pspell_array as $pa) {
                                                //echo '<span><a href="'.$url.'/english-to-'.$main_array['lang'].'-meaning-'.$pa.'">'.$pa.'</a></span>';
                                                echo '<span><a href="' . $main_array['baseurl'] . '?q=' . $pa . '">' . $pa . '</a></span>';
                                            }
                                        }
                                    }
                                }
                            }

                            // show meaning [ends]

                            ?>



                            <?php
                            if ($q) {

// Show movdicts


                                $movdict_query = mysqli_query($conn, 'select dict_word_list.word, subtitle.end_time, subtitle.text, subtitle.mname, subtitle.mtitle from dict_word_list left join subtitle on dict_word_list.sid=subtitle.id where dict_word_list.word=\'' . $q . '\' order by rand() limit 5');

                                if (mysqli_num_rows($movdict_query) > 0) {

                                    echo '<span><div class="custom_font2 custom_margin"><strong>Word Example from TV Shows</strong></div>';

                                    echo "<p>The best way to learn proper English is to read news report, and watch news on TV. Watching TV shows is a great way to learn casual English, slang words, understand culture reference and humor. If you have already watched these shows then you may recall the words used in the following dialogs.</p>";

                                    while ($movdict_row = mysqli_fetch_assoc($movdict_query)) {

                                        $movdict_img_list = $main_array['movssurl'] . $movdict_row['mname'] . '-' . str_replace(',', '.', $movdict_row['end_time']) . '.jpeg';
                                        $movdict_sub_text = str_replace('\N', '<br />', str_replace($q, '<b>' . strtoupper($q) . '</b>', $movdict_row['text']));
                                        $movdict_mname = $movdict_row['mtitle']; ?>


                                     <div class="card">
                                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="<?= $movdict_img_list. '.webp' ?>"
                                                    onerror="this.onerror=null; this.src='<?= $movdict_img_list ?>'"
                                                    alt="<?= addslashes($movdict_row['text']) ?>"
                                                    title="<?= addslashes($movdict_row['text']) ?>" style="width: 100%;padding-left: 0px;
													padding-top: 0px;border: 0;">
										<div class="movdict_container">
											<p style='margin-bottom:-30px;'><?= $movdict_sub_text ?></p>
											<h4 style='background: #f8f8f8; padding: 10px 16px; width: 100%; 
											position: relative;top: 23px; left: -16px;'><b><?= $movdict_mname?></b></h4>
										</div>
										</div>
										<br>

                                  <?php  }

                                    echo "</span>";

                                }

                                ?>


                                <div class="custom_margin2"></div>
                                <div class="custom_font2">
                                    <strong>English to <?= $main_array['ulang'] ?> Dictionary: <?= $q ?></strong>
                                </div>
                                <p>Meaning and definitions of <?= $q ?>, translation in <?= $main_array['ulang'] ?>
                                    language for <?= $q ?> with similar and opposite words. Also find spoken
                                    pronunciation of <?= $q ?> in <?= $main_array['ulang'] ?> and in English
                                    language.</p>

                                <div class="custom_font2">
                                    <strong>Tags for the entry "<?= $q ?>"</strong>
                                </div>
                                <p>What <?= $q ?> means in <?= $main_array['ulang'] ?>, <?= $q ?> meaning
                                    in <?= $main_array['ulang'] ?>, <?= $q ?> definition, examples and pronunciation
                                    of <?= $q ?> in <?= $main_array['ulang'] ?> language.</p>
                                <?php
                            }
                            ?>

                        </div>
                    </fieldset>


                </div>
            <?php }
            //   else{
            ?>


            <!--Specific Page Content-->
            <?php

            require_once('index_fixed_content_v5.php');

            ?>

            <?php //} ?>


        </div>

        <?php
        include('right-content_v5.php');

        mysqli_close($conn);

        ?>

    </div>


    <div class="footer_wrapper">
        <span class="align_left">&copy; 2018-2019 <strong>BD WORD</strong> | All Rights Reserved by <a href="<?php echo $base_url; ?>"><strong>BD WORD</strong></a> </span>
            
            <span class="align_right">
            	<a href="<?php echo $base_url; ?>english-to-<?=$main_array['lang']?>-dictionary-about-us">About Us</a>&nbsp;|&nbsp;
                <a href="<?php echo $base_url; ?>english-to-<?=$main_array['lang']?>-dictionary-privacy">Privacy</a>&nbsp;|&nbsp;
                <a href="<?php echo $base_url; ?>english-to-<?=$main_array['lang']?>-dictionary-disclaimer">Disclaimer</a>&nbsp;|&nbsp;
                <a href="<?php echo $base_url; ?>english-to-<?=$main_array['lang']?>-dictionary-contact-us">Contact</a>
        	</span>
    </div>
</div>
<script async type="text/javascript" src="js/responsivejs.js"></script>


<script type="text/javascript">

    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

    function calFavs(a, e) {
        var t = [];
        null != localStorage.getItem("favs") && (t = JSON.parse(localStorage.getItem("favs"))), 1 == e ? t.push(a) : t.indexOf(a) >= 0 && t.splice(t.indexOf(a), 1);
        localStorage.setItem("favs", JSON.stringify(t.filter(onlyUnique)));
        alert("'" + a + "'" + " has been added to the Favorite List.");
    }

    function lang() {
        var a = [];
        a["test.bdword.com"] = "bengali", a["bengali.bdword.com"] = "bengali", a["v2.english-telugu.net"] = "telugu", a["v2.english-tamil.net"] = "tamil", a["v2.english-tamil.net"] = "tamil", a["www.bdword.com"] = "bengali", a["www.english-gujarati.com"] = "gujarati", a["www.english-hindi.net"] = "hindi", a["www.english-kannada.com"] = "kannada", a["www.english-marathi.net"] = "marathi", a["www.english-nepali.com"] = "nepali", a["www.english-punjabi.net"] = "punjabi", a["www.english-tamil.net"] = "tamil", a["www.english-telugu.net"] = "telugu", a["www.english-arabic.org"] = "arabic", a["www.english-malay.net"] = "malay", a["www.english-thai.net"] = "thai", a["www.english-welsh.net"] = "welsh";
        var e = location.host.split(".");
        return "english-dictionary" == e[1] ? e[0] : a[location.host]
    }

    function main_domain() {
        return location.protocol + "//" + location.host
    }

    function showAllStorageData(a) {
        var e = "";
        e = '';
        var t = JSON.parse(localStorage.getItem(a));

        if (t != null) {
            for (i = 0; i < t.length; i++) {

                if (i > 9) break;

                if (t[i] != 0 && t[i] != null)
                    e += '<span style="padding:5px 0px; overflow:hidden; display:block;">', e += '<div style="float:left" class="label_font"><a href="' + main_domain() + "/english-to-" + lang() + "-meaning-" + t[i] + '">' + t[i] + "</a></div>", e += '</span>';
            }
        }


        if (a == 'word_history')
            e += "<div class='clear_fixdiv'></div><button style='margin: 10px 0px 0px 0px;float: right;' class='btn_default4 bdr_radius2'><a href='word-history.php'>SEE ALL</a></button>";


        if (a == 'favs') {

            if (t.length > 10) {
                e += "<div class='clear_fixdiv'></div><button style='margin: 10px 0px 0px 0px;float: right;' class='btn_default4 bdr_radius2'><a href='favourite-words.php'>SEE ALL</a></button>";
            }

            if (t.length == 0) {
                e += "<div class='clear_fixdiv'>Please click on the heart icon to add words in your favorite list</div>"
            }

        }

        return e;

    }


    // document.getElementById("load_history").innerHTML = showAllStorageData('word_history');
    document.getElementById("load_favourite").innerHTML = showAllStorageData('favs');

    //Header Nav Collapse JS
    function showHideMenu() {
        var x = document.getElementById("menu");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    //Accordion JS
    function showHideAccordion() {
        var x = document.getElementById("accordion");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion2() {
        var x = document.getElementById("accordion2");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion3() {
        var x = document.getElementById("accordion3");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion4() {
        var x = document.getElementById("accordion4");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion5() {
        var x = document.getElementById("accordion5");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion6() {
        var x = document.getElementById("accordion6");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function showHideAccordion7() {
        var x = document.getElementById("accordion7");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    //Show Hide JS
    function show() {
        document.getElementById("opener").style.display = "none";
        document.getElementById("closer").style.display = "inline";
    }

    function hide() {
        document.getElementById("closer").style.display = "none";
        document.getElementById("opener").style.display = "inline";
    }

    function edValueKeyPress() {
        var search = document.getElementById("q");
        var search_value = search.value;


        if (search.value.length < 2) {
            var ul = document.getElementById('myInputautocomplete-list');
            ul.innerHTML = '';
        }

        if (search.value.length > 2) {
            load('getEngSug.php?q=' + search_value, search_value, function (xhr) {

                var div = document.getElementById('myInputautocomplete-list');
                div.innerHTML = '';

                var p = JSON.parse(xhr.responseText);

                if (p === undefined || p.length == 0) {
                    load('wrong_word.php?q=' + search_value, search_value, function (xhr1) {

                        var wordArray = JSON.parse(xhr1.responseText);

                        if (wordArray === undefined || wordArray.length == 0) {

                        } else {
                            var unique = wordArray.filter((v, i, a) => a.indexOf(v) === i);
                            div.innerHTML = '';
                            for (var key in unique) {

                                if (unique.hasOwnProperty(key) && (unique[key].length == search_value.length)) {

                                    var div_element = document.createElement("DIV");
                                    div_element.innerHTML = capitalizeFirstLetter(unique[key]);

                                    div_element.onclick = function () {
                                        document.new_form.q.value = this.innerHTML;
                                        document.new_form.submit();
                                    };

                                    document.getElementById("myInputautocomplete-list").appendChild(div_element);
                                }
                            }
                        }

                    });
                } else {
                    for (var key in p) {

                        if (p.hasOwnProperty(key)) {

                            var div_element = document.createElement("DIV");
                            div_element.innerHTML = capitalizeFirstLetter(p[key]);

                            div_element.onclick = function () {
                                document.new_form.q.value = this.innerHTML;
                                document.new_form.submit();
                            };

                            document.getElementById("myInputautocomplete-list").appendChild(div_element);
                        }
                    }
                }


            });
        }

    }


    function load(url, search_value, callback) {
        var xhr;


        var params = "q=" + search_value;

        if (typeof XMLHttpRequest !== 'undefined') xhr = new XMLHttpRequest();
        else {
            var versions = ["MSXML2.XmlHttp.5.0",
                "MSXML2.XmlHttp.4.0",
                "MSXML2.XmlHttp.3.0",
                "MSXML2.XmlHttp.2.0",
                "Microsoft.XmlHttp"]

            for (var i = 0, len = versions.length; i < len; i++) {
                try {
                    xhr = new ActiveXObject(versions[i]);
                    break;
                } catch (e) {
                }
            } // end for
        }

        xhr.onreadystatechange = ensureReadiness;

        function ensureReadiness() {
            if (xhr.readyState < 4) {
                return;
            }

            if (xhr.status !== 200) {
                return;
            }

            if (xhr.readyState === 4) {
                callback(xhr);
            }
        }

        xhr.open('POST', url, true);
        xhr.send(params);
    }

</script>


</body>

</html>