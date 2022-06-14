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
            <legend><span class="custom_font2"><h1>Learn Common GRE Words</h1></span></legend>

            <div class="fieldset_body">
                            <span>	
                                <button class="btn_default4 bdr_radius2 <?php echo (!isset($_GET['topic']) || $_GET['topic'] == 'A') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-a">A</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'B') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-b">B</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'C') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-c">C</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'D') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-d">D</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'E') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-e">E</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'F') ? 'btn_active' : ''; ?>">
                                    <a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-f">F</a>
                                </button>
								
								<button id="opener" class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="javascript:show();">More...</a>
                                </button>
								<div id="closer" style="display:none">
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'G') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-g">G</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'H') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-h">H</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'I') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-i">I</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'J') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-j">J</a>
									</button>

									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'K') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-k">K</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'L') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-l">L</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'M') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-m">M</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'N') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-n">N</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'O') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-o">O</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'P') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-p">P</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'Q') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-q">Q</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'R') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-r">R</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'S') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-s">S</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'T') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-t">T</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'U') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-u">U</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'V') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-v">V</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'W') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-w">W</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'X') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-x">X</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'Y') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-y">Y</a>
									</button>
									<button class="btn_default4 bdr_radius2 <?php echo (isset($_GET['topic']) && $_GET['topic'] == 'Z') ? 'btn_active' : ''; ?>">
										<a href="<?= $base_url; ?>english-to-<?= $lang?>-dictionary-learn-common-gre-words-z">Z</a>
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
            mysqli_set_charset($conn, "utf8");

            $topic = (isset($_GET['topic'])) ? mysqli_real_escape_string($conn, $_GET['topic']) : 'A';


            $perPage = 20;
            $tableName = 'gre';
            $pageName = 'learn-common-gre-words.php';


            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $startAt = $perPage * ($page - 1);

            $query = "SELECT COUNT(*) as total FROM `$tableName` WHERE topic='" . $topic . "'";
            $r = mysqli_fetch_assoc(mysqli_query($conn, $query));

            $totalPages = ceil($r['total'] / $perPage);

            $links = '<div class="pagination">';

            for ($i = 1; $i <= $totalPages; $i++) {
                $links .= ($i != $page)
				 ? "<a href='".$base_url."english-to-". $lang."-dictionary-learn-common-gre-words-".strtolower($topic)."-page-".$i."'>$i</a>"
                    : "<a class='active'>$page</a>";
            }

            $links .= '</div>';

            $query = "SELECT * FROM `$tableName` WHERE topic='" . $topic . "' ORDER BY id ASC LIMIT $startAt, $perPage";

            $r = mysqli_query($conn, $query);

            $pageContent = '<legend><h2>Words Start with: (' . ucfirst($topic) . ') PAGE #' . $page . '</h2></legend>';


            $pageContent .= '<div class="fieldset_body inner_details">';
            if ($page > 1) {
                $pageContent .= '<button class="btn_pre bdr_radius2"><a class="" href="' . $base_url . 'english-to-' . $lang .'-dictionary-learn-common-gre-words-'. strtolower($topic).'-page-'. ($page - 1). '">← Previous</a></button>';
            }
            if ($page < $totalPages) {
                $pageContent .= '<button class="btn_next bdr_radius2"><a class="" href="' . $base_url . 'english-to-' . $lang .'-dictionary-learn-common-gre-words-'. strtolower($topic).'-page-'. ($page + 1) . '">Next →</a></button>';
            }
            //$pageContent .= '<div style="clear: both;">&nbsp;</div>';
            //$pageContent .= '</div>';
            $i = ($page * $perPage) - $perPage;
            $words = array();
            $exmp = array();
            while ($row = mysqli_fetch_assoc($r)) {
                $exmp[strtolower($row['word'])] = $row['exmp'];
                $words[] = $row['word'];
            }

            $mean = array();
            $query = mysqli_query($conn, "select `" . $lang . "` as mean, word from v3_word_mean where word in ('" . implode("','", $words) . "') limit " . $perPage);
            while ($row = mysqli_fetch_assoc($query)) {

                $mean[$row['word']] = $row['mean'];
            }


            foreach ($words as $w) {
                $w_l = strtolower($w);
                $i++;
                if (array_key_exists($w_l,$mean) && $mean[$w_l] != $w_l and $mean[$w_l]) {
                    //$pageContent .= '<span><a title="English to '.$ulang.' Meaning of '.$w.'" href="'.$base_url.'/english-to-'.$lang.'-dictionary-meaning-of-'.urlencode($w).'"><label class="cursor_link">'.$i.'. '.$w.' ('.$mean[$w_l].') :</label> '.$exmp[$w_l].'</a></span>';
                    $pageContent .= '<span><a title="English to ' . $ulang . ' Meaning of ' . $w . '" href="' . $base_url . 'english-to-' . $lang . '-meaning-' . urlencode(strtolower($w)) . '"><label class="cursor_link">' . $i . '. ' . $w . ' (' . $mean[$w_l] . ') :</label> ' . $exmp[$w_l] . '</a></span>';

                }
            }

            $pageContent .= '</div>';

            $pageContent .= $links;

            echo $pageContent;


            ?>

        </fieldset>
    </div>
    

    </div>

<?php include('right-content.php'); ?>

    </div>

<?php include('footer.php'); ?>