<?php
error_reporting(0);
require('functions.php');

$lang_array_flip = array_flip(getLanguageArray());

if(!empty($argv[1])){
	$_GET['lang'] = $argv[1];
}

$lang = $_GET['lang'];

$base_url = "https://".$lang_array_flip[$lang]."/";
file_put_contents('/mnt/volume_sgp1_05/all_cache_files/'.$lang.'/english-to-'.$lang.'-dictionary-vocabulary-game', get_html('', '', $lang, $base_url, $conn));

foreach(range('1','24') as $voca){
    file_put_contents('/mnt/volume_sgp1_05/all_cache_files/'.$lang.'/english-to-'.$lang.'-dictionary-vocabulary-game-season-'.$voca, get_html($voca, '', $lang, $base_url, $conn));
    
    if($voca == 24){
        file_put_contents('/mnt/volume_sgp1_05/all_cache_files/'.$lang.'/english-to-'.$lang.'-dictionary-vocabulary-game-season-'.$voca.'-episode-1', get_html($voca, '1', $lang, $base_url, $conn));
    }
    else{
        foreach(range('1','50') as $voca1){
            file_put_contents('/mnt/volume_sgp1_05/all_cache_files/'.$lang.'/english-to-'.$lang.'-dictionary-vocabulary-game-season-'.$voca.'-episode-'.$voca1, get_html($voca, $voca1, $lang, $base_url, $conn));
        }
    }
}

function get_html($season, $episode, $lang, $base_url, $conn){

    $q = '';
	
	if (!empty($season)) {
	$_GET['season'] = $_REQUEST['season'] = $season;
	}

	if (!empty($episode)) {
		$_GET['episode'] = $_REQUEST['episode'] = $episode;
	}

    $contentUrl = 'https://content2.mcqstudy.com/bw-static-files/';

    $big_html = '';

    $big_html .= include('header_single_string.php');
    
    $big_html .= '
    <style>
    
        input[type=radio] {
            display: none;
        }
    
        input[type=radio] + label::before {
            content: "";
            display: inline-block;
            border: 1px solid #000;
            border-radius: 50%;
            margin: 0 0.5em;
            width: 1em;
            height: 1em;
        }
    
        input[type=radio]:checked + label::before {
            background-color: #043A54;
        }
    
        .inner_details {
            line-height: 30px;
        }
    
        @media only screen and (max-width: 600px) {
            .inner_details {
                line-height: 40px;
            }
        }
    
    </style>';
    

    $big_html .= $alladcodes['300'];    
    $big_html .= '<div class="box_wrapper">
        <fieldset>';
    
            if ($season and $episode) {
    
            $big_html .= '
                <legend><h1>Vocabulary Games: (Season #'.$season.'): Episode @'.$episode.'</h1></legend>
    
                <div id="load_data">
    
                </div>
                <button class="btn_default5 bdr_radius2">
                    <a href="'.$base_url.'english-to-'.$lang.'-dictionary-learn-ten-words-everyday-season-'.$season.'-episode-'.$episode.'">Learn These Words</a>
                </button>';
    
    
                $pageName = 'english-to-'. $lang.'-dictionary-vocabulary-game-season-' . $season . '-episode-';
    
                $page = (isset($_GET['episode'])) ? (int)$_GET['episode'] : 1;
    
                $links = '<div class="pagination" style="float: left;">';
    
                $j = 50;
                if ($season == 23) {
                    $j = 24;
                }
    
                for ($i = 1; $i <= $j; $i++) {
                    $links .= ($i != $page)
                        ? "<a href=".$base_url.$pageName.$i." style='margin-right: 5px;margin-top: 5px;'>".$i."</a>"
                        : "<a class='active' style='margin-right: 5px;margin-top: 5px;'>".$page."</a>";
                }
    
                $links .= '</div>';
    
    
                $big_html .= $links;
    
            }
            
            if ($season and $episode == null) {
                $big_html .= '
                <legend><h1>Vocabulary Game: (Season #'.$season.'): Episode</h1></legend>
                <div class="fieldset_body">';
        
                    $k = 51;
                   if ($season == 23) {
                        $k = 25;
                    }
                    for ($e = 1; $k > $e; $e++) {
                        $class = ($e > 3) ? (($e % 3) == 0 ? 3 : $e % 3) : $e;
                        $big_html .= '
                        <span>
                        <button class="btn_default4 bdr_radius2 btn_bdrcolor'.$class.' texture_btn" style="margin-right: 6px;">
                            <a href="'.$base_url.'english-to-'.$lang.'-dictionary-vocabulary-game-season-'.$season.'-episode-'.$e.'">Episode #'.$e.'</a>
                        </button>
                        </span>';
    
                    }
                $big_html .='
                </div>';
            }
    
            if (!$season and !$episode) {
                $big_html .= '
                <legend><h1>Vocabulary Game Seasons</h1></legend>
                <div class="fieldset_body">';
                    for ($s = 1; 23 > $s; $s++) {
                        $class = ($s > 3) ? (($s % 3) == 0 ? 3 : $s % 3) : $s;
                        $big_html .= '
                        <span>
                        <button class="btn_default4 bdr_radius2 btn_bdrcolor'.$class.' texture_btn" style="margin-right: 6px;">
                            <a href="'.$base_url.'english-to-'.$lang.'-dictionary-vocabulary-game-season-'.$s.'">
                                Seasons #'.$s.'
                                </a>
                            </button>
                        </span>';
                    }
                $big_html .= '
                </div>';
            }
    
        $big_html .= '
        </fieldset>
    </div>
    
    </div>';
    
    $big_html .= include('right_content_single_string.php');
    
    $big_html .= '</div>
    
    <script type="text/javascript" src="'.$contentUrl.'js/jquery.min.js"></script>
    <script type="text/javascript" src="'.$contentUrl.'js/all2.js?test=2"></script>
    
    <script>
    
        $(document).ready(function () {
            
            voc_show_data("'.$season.'", "'.$episode.'", "'.$lang.'","'.$base_url.'");
        
        });
    
    </script>';
    
    
    $big_html .= include('footer_single_string.php');

    return $big_html;

}



?>