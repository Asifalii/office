<?php


                                                $movdict_query = mysqli_query($conn, 'select end_time, text, mname, mtitle from subtitle where text like \'%' . $q . '%\' order by rand() limit 5');

                                                if (mysqli_num_rows($movdict_query) > 0) {

                                                    $big_html .= '<span><div class="custom_font2 custom_margin"><strong>Word Example from TV Shows</strong></div>';

                                                    $big_html .= "<p>The best way to learn proper English is to read news report, and watch news on TV. Watching TV shows is a great way to learn casual English, slang words, understand culture reference and humor. If you have already watched these shows then you may recall the words used in the following dialogs.</p>";

                                                    while ($movdict_row = mysqli_fetch_assoc($movdict_query)) {

                                                        $movdict_img_list = $main_array['movssurl'] . $movdict_row['mname'] . '-' . str_replace(',', '.', $movdict_row['end_time']) . '.jpeg';
                                                        $movdict_sub_text = str_replace('\N', '<br />', str_replace($q, '<b>' . strtoupper($q) . '</b>', $movdict_row['text']));
                                                        $movdict_mname = $movdict_row['mtitle'];


                                                        $big_html .= "<div class='card'>
                                                            <img src='data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' data-src='".$movdict_img_list.".webp"."' onerror='this.onerror=null; this.src='".$movdict_img_list."' alt='".addslashes($movdict_row['text'])."' title='".addslashes($movdict_row['text'])."' style='width: 100%;padding-left: 0px; padding-top: 0px;border: 0;' loading='lazy'>
                                                            <div class='movdict_container'>
                                                                <p style='margin-bottom:-30px;'>".stripslashes($movdict_sub_text)."</p>
                                                                <h4 style='background: #f8f8f8; padding: 10px 16px; width: 100%;
                                                                position: relative;top: 23px; left: -16px;'><b>".$movdict_mname."</b></h4>
                                                            </div>
                                                        </div><br>";
                                                        

                                                     }

                                                    $big_html .=  "</span>";

                                                }

?>