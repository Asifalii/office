<?php include('header.php');
if (!empty($argv[2])) {
    $_GET['topic'] = $argv[2];
}

if (!empty($argv[3])) {
   $_GET['page'] = $argv[3];
}

?>
<?php
echo $alladcodes['300'];
?>
    <!--Specific Page Content-->
    <div class="box_wrapper">
        <fieldset>
            <legend><span class="custom_font2"><h1>Topic Wise Words</h1></span></legend>

            <div class="fieldset_body">
                            <span>	
							
                                <button class="btn_default4 bdr_radius2 <?php echo (!isset($_GET['topic']) || $_GET['topic'] == 'animals') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-animals">Animals</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'body') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-body">Body</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'business') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-business">Business</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'clothes') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-clothes">Clothes</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'crime') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-crime">Crime</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'culture') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-culture">Culture</a>
                                </button>
								<button id="opener" class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="javascript:show();">More...</a>
                                </button>
							    <div id="closer" style="display:none">
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'education') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-education">Education</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'family') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-family">Family</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'food') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-food">Food</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'health') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-health">Health</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'house') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-house">House</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'language') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-language">Language</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'leisure') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-leisure">Leisure</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'media') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-media">Media</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'nature') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-nature">Nature</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'personality') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-personality">Personality</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'religion_politics') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-religion_politics">Religion Politics</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'retail') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-retail">Retail</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'science') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-science">Science</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'social') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-social">Social</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'technology') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-technology">Technology</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'travel') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-travel">Travel</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'war') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-war">War</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'work') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-topic-wise-words-work">Work</a>
									</button>
									<button class="btn_default4 bdr_radius2 custom_bdr">
											<a href="javascript:hide();">Hide...</a>
									</button>
                                </div>
								

                            </span>
            </div>
        </fieldset>

        <fieldset>

            <?php
            mysqli_set_charset($conn,"utf8");

            $topic = ($_GET['topic']) ? mysqli_real_escape_string($conn, $_GET['topic']) : 'Animals';

            $perPage = 30;
            $tableName = 'TopicWiseWords';
            $pageName = 'topic-wise-words.php';

            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $startAt = $perPage * ($page - 1);

            $query = "SELECT COUNT(*) as total FROM $tableName WHERE topic='" . $topic . "'";
            $r = mysqli_fetch_assoc(mysqli_query($conn, $query));
			
            $totalPages = ceil($r['total'] / $perPage);
            $links = '<div class="pagination">';

            for ($i = 1; $i <= $totalPages; $i++) {
                $links .= ($i != $page)
                    ? "<a href='".$base_url."english-to-".$lang."-dictionary-topic-wise-words-".$topic."-page-".$i."'>$i</a>"
                    : "<a class='active'>$page</a>";
            }

            $links .= '</div>';

            $query = "SELECT * FROM $tableName WHERE topic='" . $topic . "' ORDER BY id ASC LIMIT $startAt, $perPage";
            $r = mysqli_query($conn, $query);

            $pageContent = '<legend><h2>Topic ' . ucfirst($topic) . ':: PAGE #' . $page . '</h2></legend>';

            $pageContent .= '<div class="fieldset_body inner_details">';
            if ($page > 1) {
                $pageContent .= '<button class="btn_pre bdr_radius2"><a class="" href="' . $base_url . 'english-to-'.$lang.'-dictionary-topic-wise-words-'.$topic.'-page-' . ($page - 1) .'">← Previous</a></button>';
            }
            if ($page < $totalPages) {
                $pageContent .= '<button class="btn_next bdr_radius2"><a class="" href="' . $base_url . 'english-to-'.$lang.'-dictionary-topic-wise-words-'.$topic.'-page-' . ($page + 1) .'">Next→</a></button>';
            }
            //$pageContent .= '<div style="clear: both;">&nbsp;</div>';
            //$pageContent .= '</div>';
            $i = ($page * $perPage) - $perPage;
            $temp_words = array();
            $exmp = array();
            while ($row = mysqli_fetch_assoc($r)) {
                $temp_words[] = $row['word'];
                $exmp[$row['word']] = $row['exmp'];
            }			
			
            $mean_query = mysqli_query($conn, "select " . $lang . " as mean, word from v3_word_mean where word in ('" . implode("','", $temp_words) . "') and word!='" . $lang . "'");
			$mean_query = mysqli_fetch_all($mean_query,MYSQLI_ASSOC);
			$mean_query = array_unique($mean_query, SORT_REGULAR);
			
			foreach($mean_query as $mean_row){
				if(!array_key_exists($mean_row['word'],$exmp) && empty($exmp[$mean_row['word']])){
					$exmp[$mean_row['word']] = '';
				}
				$i++;
                //$pageContent .= '<span><a title="English to '.$ulang.' Meaning of '.ucfirst($mean_row['word']).'" href="'.$base_url.'/english-to-'.$lang.'-dictionary-meaning-of-'.$mean_row['word'].'"><label class="cursor_link">'.$i.'. '.ucfirst($mean_row['word']).' ('.$mean_row['mean'].') </label>:: '.$exmp[$mean_row['word']].'</a></span>';
               $pageContent .= '<span><a title="English to ' . $ulang . ' Meaning of ' . ucfirst($mean_row['word']) . '" href="' . $base_url . 'english-to-' . $lang . '-meaning-' . strtolower($mean_row['word']) . '"><label class="cursor_link">' . $i . '. ' . ucfirst($mean_row['word']) . ' (' . $mean_row['mean'] . ') </label>:: ' . $exmp[$mean_row['word']] . '</a></span>';
            }


            $pageContent .= '</div>';


            //$pageContent .= $links;

            echo $pageContent;


            ?>

        </fieldset>

        <?php echo $links; ?>
    </div>

    </div>

<?php include('right-content.php'); ?>

    </div>

<?php include('footer.php'); ?>