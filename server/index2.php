<?php
if ($_GET['q']) {
    $english_characters = range('a', 'z');
    if (trim($_SERVER['DOCUMENT_URI'], '/') == 'index.php' and !in_array(strtolower($_GET['q'][0]), $english_characters)) {
        header('Location: local.php?q=' . $_GET['q']);
    }
}

include('header.php');


$bangla_academy_base_url = 'https://media.english-dictionary.help/ba2/';
$mov_ss_url = 'https://media.english-dictionary.help/ss/';

if ($no_index_status == false and $isMobile == true) {
    echo showAds($q, '300', $conn);

} elseif ($no_index_status == false and $isMobile == false) {
    echo showAds($q, 'body-top', $conn);
}

if ($q and $lang) {

    ?>
    <div class="box_wrapper">

        <fieldset>
            <?php


            if (preg_match("/^[a-z]$/", $q[0])) {
                echo '<legend class="custom_font2"><h1>English to ' . $ulang . ' Meaning :: ' . $q . '</h1></legend>';
            } else {
                echo '<legend class="custom_font2"><h1>' . $ulang . ' to English Meaning :: ' . $q . '</h1></legend>';
            }
            ?>

            <div class="fieldset_body inner_details">


                <?php

                $y_bengali = mysqli_fetch_assoc(mysqli_query($conn, "select details from y_" . $lang . " where word='" . $q . "' limit 1"));
                $y_bengali_details = json_decode($y_bengali['details'], true);


                if (isset($y_bengali_details) && sizeof($y_bengali_details) > 0) {

                    $mquery = mysqli_query($conn, "select mean from x_" . $lang . " where word='" . $q . "' limit 1");

                    $get_root_query = mysqli_fetch_assoc(mysqli_query($conn, 'select root from v3_word_list where word="' . $q . '" limit 1'));

                    if ($get_root_query['root']) {
                        $q = $get_root_query['root'];
                    }

                    $mrow = mysqli_fetch_assoc($mquery);

                    $sql = 'select word, ' . $lang . ', id, data from v3_word_frame where word="' . $q . '" limit 1';

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
					
					 if($ba_img and $lang == 'bengali'){ ?>
                                    <span><div class="h_line"></div>
                                        <label>Bangla Academy Ovidhan :</label>
                                        <div class="h_line2"></div>
                                        <div class="dic_img">
                                            <img
                                                    src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="<?= $bangla_academy_base_url.strtoupper($ba_img).'.JPG'.'.webp' ?>"
                                                    onerror="this.onerror=null; this.src='<?= $bangla_academy_base_url.strtoupper($ba_img).'.JPG' ?>'"
                                                    alt="<?= $q ?>"  title="<?= $q ?>">
									<?php  }
                    // bn
                    $mean_array = get_object_vars($mean);

                    $details = $y_bengali_details;

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

                        $extra_sql = mysqli_query($conn, 'select word, mean from x_' . $lang . ' where word in ("' . implode('","', $ta_array) . '") limit ' . $total_words_cnt);
                        while ($extra_row = mysqli_fetch_assoc($extra_sql)) {
                            echo '<span><a href="' . $base_url . '/english-to-' . $lang . '-meaning-' . strtolower($extra_row['word']) . '" title="English to ' . $ulang . ' meaning of ' . $extra_row['word'] . '"><label>' . ucfirst($extra_row['word']) . '</label></a> - ' . $extra_row['mean'] . '</span>';
                        }

                    }

                    // related

                    $related_query = mysqli_query($conn, 'select variant from variants where word like "' . $q . '" limit 5');
                    $related_words = array();
                    while ($related_row = mysqli_fetch_assoc($related_query)) {
                        if ($related_row['variant'] != $q) {
                            $related_words[] = $related_row['variant'];
                        }

                    }

                    $related_words_imp = "'" . implode("','", $related_words) . "'";

                    $related_mean_query = mysqli_query($conn, "select " . $lang . " as mean, word from lang where word in (" . $related_words_imp . ")");
                    $related_mean_array = array();
                    while ($related_mean_row = mysqli_fetch_assoc($related_mean_query)) {
                        echo '<span><label>' . ucfirst($related_mean_row['word']) . ' :: </label>' . $related_mean_row['mean'] . '</span>';
                    }

                    // related ends

                    // next prev
                    echo '<span><div class="custom_margin2"></div>';
                    //echo ($prev)?'<button class="btn_pre bdr_radius2"><a title="English to '.$ulang.' meaning of '.$prev.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$lang.'-meaning-'.$prev.'">&leftarrow; '.ucfirst($prev).'</a>':'';
                    echo ($prev) ? '<button class="btn_pre bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $prev . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $prev . '">&leftarrow; ' . ucfirst($prev) . '</a>' : '';

                    //echo ($nex)?'<button class="btn_next bdr_radius2"><a title="English to '.$ulang.' meaning of '.$nex.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$lang.'-meaning-'.$nex.'">'.$nex.' &rightarrow;</a></button>':'';
                    echo ($nex) ? '<button class="btn_next bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $nex . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $nex . '">' . $nex . ' &rightarrow;</a></button>' : '';

                    echo '<div style="clear:both;">&nbsp;</div>';

                    if ($no_index_status == false) {
                        echo showAds($q, '300_2', $conn);
                    }

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

                    <?php
                } else {

                    $x_bengali = mysqli_fetch_assoc(mysqli_query($conn, "select mean from x_" . $lang . " where word='" . $q . "' limit 1"));

                    if (isset($x_bengali['mean']) && sizeof($x_bengali['mean']) > 0) {

                        //show single $x_bengali['mean']

                        $variants = mysqli_fetch_assoc(mysqli_query($conn, 'select word from variants where word like "' . $q . '"'));
                        $y_bengali = mysqli_fetch_assoc(mysqli_query($conn, "select details from y_" . $lang . " where word='" . $variants['word'] . "' limit 1"));

                        $mquery = mysqli_query($conn, "select mean from x_" . $lang . " where word='" . $q . "' limit 1");

                        $get_root_query = mysqli_fetch_assoc(mysqli_query($conn, 'select root from v3_word_list where word="' . $q . '" limit 1'));

                        // echo $get_root_query['root'];die;

                        if ($get_root_query['root']) {
                            $q = $get_root_query['root'];
                        }

                        $mrow = mysqli_fetch_assoc($mquery);

                        $sql = 'select word, ' . $lang . ', id, data from v3_word_frame where word="' . $q . '" limit 1';

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
						
						 if($ba_img and $lang == 'bengali'){ ?>
                                    <span><div class="h_line"></div>
                                        <label>Bangla Academy Ovidhan :</label>
                                        <div class="h_line2"></div>
                                        <div class="dic_img">
                                            <img
                                                    src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="<?= $bangla_academy_base_url.strtoupper($ba_img).'.JPG'.'.webp' ?>"
                                                    onerror="this.onerror=null; this.src='<?= $bangla_academy_base_url.strtoupper($ba_img).'.JPG' ?>'"
                                                    alt="<?= $q ?>"  title="<?= $q ?>">
									<?php  }

                    
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

                            $extra_sql = mysqli_query($conn, 'select word, mean from x_' . $lang . ' where word in ("' . implode('","', $ta_array) . '") limit ' . $total_words_cnt);
                            while ($extra_row = mysqli_fetch_assoc($extra_sql)) {
                                echo '<span><a href="' . $base_url . '/english-to-' . $lang . '-meaning-' . strtolower($extra_row['word']) . '" title="English to ' . $ulang . ' meaning of ' . $extra_row['word'] . '"><label>' . ucfirst($extra_row['word']) . '</label></a> - ' . $extra_row['mean'] . '</span>';
                            }

                        }

                        // related

                        $related_query = mysqli_query($conn, 'select variant from variants where word like "' . $q . '" limit 5');
                        $related_words = array();
                        while ($related_row = mysqli_fetch_assoc($related_query)) {
                            if ($related_row['variant'] != $q) {
                                $related_words[] = $related_row['variant'];
                            }

                        }

                        $related_words_count = count($related_words);
                        $related_words_imp = "'" . implode("','", $related_words) . "'";

                        $related_mean_query = mysqli_query($conn, "select " . $lang . " as mean, word from lang where word in (" . $related_words_imp . ") limit " . $related_words_count);
                        $related_mean_array = array();
                        while ($related_mean_row = mysqli_fetch_assoc($related_mean_query)) {
                            echo '<span><label>' . ucfirst($related_mean_row['word']) . ' :: </label>' . $related_mean_row['mean'] . '</span>';
                        }

                        // related ends

                        // next prev
                        echo '<span><div class="custom_margin2"></div>';
                        //echo ($prev)?'<button class="btn_pre bdr_radius2"><a title="English to '.$ulang.' meaning of '.$prev.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$lang.'-meaning-'.$prev.'">&leftarrow; '.ucfirst($prev).'</a>':'';
                        echo ($prev) ? '<button class="btn_pre bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $prev . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $prev . '">&leftarrow; ' . ucfirst($prev) . '</a>' : '';
                        //echo ($nex)?'<button class="btn_next bdr_radius2"><a title="English to '.$ulang.' meaning of '.$nex.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$lang.'-meaning-'.$nex.'">'.$nex.' &rightarrow;</a></button>':'';
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


                        $variants = mysqli_fetch_assoc(mysqli_query($conn, 'select word from variants where word like "' . $q . '"'));

                        if (isset($variants['word']) && sizeof($variants['word']) > 0) {
                            $y_bengali = mysqli_fetch_assoc(mysqli_query($conn, "select details from y_" . $lang . " where word='" . $variants['word'] . "' limit 1"));

                            //if(isset(json_decode($y_bengali['details'],true)) && sizeof(json_decode($y_bengali['details'],true)) > 0){
                            if (sizeof(json_decode($y_bengali['details'], true)) > 0) {
                                $mquery = mysqli_query($conn, "select mean from x_" . $lang . " where word='" . $q . "' limit 1");

                                $get_root_query = mysqli_fetch_assoc(mysqli_query($conn, 'select root from v3_word_list where word="' . $q . '"'));

                                // echo $get_root_query['root'];die;

                                if ($get_root_query['root']) {
                                    $q = $get_root_query['root'];
                                }

                                $mrow = mysqli_fetch_assoc($mquery);

                                $sql = 'select word, ' . $lang . ', id, data from v3_word_frame where word="' . $q . '" limit 1';

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

                                    $extra_sql = mysqli_query($conn, 'select word, mean from x_' . $lang . ' where word in ("' . implode('","', $ta_array) . '") limit ' . $total_words_cnt);
                                    while ($extra_row = mysqli_fetch_assoc($extra_sql)) {
                                        echo '<span><a href="' . $base_url . '/english-to-' . $lang . '-meaning-' . strtolower($extra_row['word']) . '" title="English to ' . $ulang . ' meaning of ' . $extra_row['word'] . '"><label>' . ucfirst($extra_row['word']) . '</label></a> - ' . $extra_row['mean'] . '</span>';
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

                                $related_mean_query = mysqli_query($conn, "select " . $lang . " as mean, word from lang where word in (" . $related_words_imp . ")");
                                $related_mean_array = array();
                                while ($related_mean_row = mysqli_fetch_assoc($related_mean_query)) {
                                    echo '<span><label>' . ucfirst($related_mean_row['word']) . ' :: </label>' . $related_mean_row['mean'] . '</span>';
                                }

                                // related ends

                                // next prev
                                echo '<span><div class="custom_margin2"></div>';
                                //echo ($prev)?'<button class="btn_pre bdr_radius2"><a title="English to '.$ulang.' meaning of '.$prev.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$lang.'-meaning-'.$prev.'">&leftarrow; '.ucfirst($prev).'</a>':'';
                                echo ($prev) ? '<button class="btn_pre bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $prev . '" class="btn btn-raised btn-primary" href="' . $base_url . '?q=' . $prev . '">&leftarrow; ' . ucfirst($prev) . '</a>' : '';

                                //echo ($nex)?'<button class="btn_next bdr_radius2"><a title="English to '.$ulang.' meaning of '.$nex.'" class="btn btn-raised btn-primary" href="'.$url.'/english-to-'.$lang.'-meaning-'.$nex.'">'.$nex.' &rightarrow;</a></button>':'';
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
                                    //echo '<span><a href="'.$url.'/english-to-'.$lang.'-meaning-'.$pa.'">'.$pa.'</a></span>';
                                    echo '<span><a href="' . $base_url . '?q=' . $pa . '">' . $pa . '</a></span>';
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

                    ?>

                    <style>
                        .card {
                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                            transition: 0.3s;
                            width: 100%;
                        }

                        .card:hover {
                            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
                        }

                        .movdict_container {
                            padding: 2px 16px;
                        }
                    </style>

                    <?php

                    $movdict_query = mysqli_query($conn, 'select dict_word_list.word, subtitle.end_time, subtitle.text, subtitle.mname, subtitle.mtitle from dict_word_list left join subtitle on dict_word_list.sid=subtitle.id where dict_word_list.word="' . $q . '" order by rand() limit 5');

                    if (mysqli_num_rows($movdict_query) > 0) {

                        echo '<span><div class="custom_font2 custom_margin"><strong>Word Example from TV Shows</strong></div>';

                        echo "<p>The best way to learn proper English is to read news report, and watch news on TV. Watching TV shows is a great way to learn casual English, slang words, understand culture reference and humor. If you have already watched these shows then you may recall the words used in the following dialogs.</p>";

                        while ($movdict_row = mysqli_fetch_assoc($movdict_query)) {

                            $movdict_img_list = $mov_ss_url . $movdict_row['mname'] . '-' . str_replace(',', '.', $movdict_row['end_time']) . '.jpeg';
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

                          
<?php
                        }

                        echo "</span>";

                    }

                    ?>


                    <div class="custom_margin2"></div>
                    <div class="custom_font2">
                        <strong>English to <?= $ulang ?> Dictionary: <?= $q ?></strong>
                    </div>
                    <p>Meaning and definitions of <?= $q ?>, translation in <?= $ulang ?> language for <?= $q ?> with
                        similar and opposite words. Also find spoken pronunciation of <?= $q ?> in <?= $ulang ?> and in
                        English language.</p>

                    <div class="custom_font2">
                        <strong>Tags for the entry "<?= $q ?>"</strong>
                    </div>
                    <p>What <?= $q ?> means in <?= $ulang ?>, <?= $q ?> meaning in <?= $ulang ?>, <?= $q ?> definition,
                        examples and pronunciation of <?= $q ?> in <?= $ulang ?> language.</p>
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

require_once('index_fixed_content.php');

?>

<?php //} ?>


    </div>

<?php include('right-content.php'); ?>

    </div>

<?php include('footer.php'); ?>