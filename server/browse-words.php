<?php 
$big_html = '';

$big_html .= include('header_single_string.php');

if (!empty($argv[2])) {
	$_GET['word'] = $argv[2];
}

if (!empty($argv[3])) {
	$_GET['start_with'] = $argv[3];
}


if (isset($_GET['word'])) {
    $word = $_GET['word'];
}

if (isset($_GET['start_with'])) {
    $start_with = $_GET['start_with'];
}


$big_html .= showAds($q, 'body-top', $conn);

$big_html .= '
    <div class="box_wrapper">
        <fieldset class="main-area1">';
		
		if(empty($word) && empty($start_with))	{
			$big_html .= '
			<legend><span class="custom_font2"><h1>Browse Words Alphabetically</h1></span></legend><br>';
			foreach(range('a','z') as $row){
				$big_html .= '<button class="btn_default4 bdr_radius2" onclick="location.href=\''.$base_url.'browse-english-to-'.$lang.'-word-'.strtolower($row).'\'">'.ucfirst($row).'</button>';
			}
			$big_html .= '<br>';
			$big_html .= '<br>';
			$other = @file_get_contents('https://content.mcqstudy.com/words/main/' . $lang . '.txt');
	

				if(!empty($other)){
				 	
					$array = explode(',',$other);
					foreach($array as $value) {
						$big_html .= '<button class="btn_default4 bdr_radius2" onclick="location.href=\''.$base_url.'browse-'.$lang.'-to-english-word-'.$value.'\'">'.$value.'</button>';
					}	
				}			 			
		}
		
		if(!empty($word) && empty($start_with)){
			$big_html .= '<legend><span class="custom_font2"><h1>Filter Words :: '.ucfirst($word).'</h1></span></legend><br>';
			
			if(preg_match("/[a-z]/i", $word)){
				$array = explode(',',file_get_contents('https://content.mcqstudy.com/bw-static-files/ta-word-list/' . strtolower($word) . '.txt'));
				$array = array_unique(array_map(function($v) { return substr($v, 0, 2); }, $array));
				$array = array_filter($array);
				
				foreach($array as $value) {
					$big_html .= '<button class="btn_default4 bdr_radius2" onclick="location.href=\''.$base_url.'english-to-'.$lang.'-dictionary-two-letter-'.$value.'\'">'.$value.'</button>';
				}	
			}else{
				$file = '/var/www/all_static_files/local/' . strtolower($lang) . '/' . $word.'.txt';
				$myfile = fopen($file, "r");

				if ($myfile == true) {
					$data =  fread($myfile, filesize($file));
					fclose($myfile);
					 $array = explode(',',$data);
					 $array = array_unique(array_map(function($v) { return mb_substr($v, 0, 2); }, $array));
					 $array = array_filter($array);
					 foreach($array as $value) {
				 		$big_html .= '<button class="btn_default4 bdr_radius2" onclick="location.href=\''.$base_url.$lang.'-to-english-dictionary-two-letter-'.$value.'\'">'.$value.'</button>';
					}
				}				
			}
			$big_html .= '<br>';
			$big_html .= '<br>';
			$big_html .= '<button class="btn_pre bdr_radius2 cursor_link" onclick="location.href=\''.$base_url.'browse-'.$lang.'-to-english-words\'"><a>← Back</a></button>';
		}
		
		if(!empty($start_with)){
			$big_html .= '<legend><span class="custom_font2"><h1>Words starting with :: '.ucfirst($start_with).'</h1></span></legend><br>
			 <div class="fieldset_body inner_details">';
		
			if(preg_match("/[a-z]/i", $start_with)){
				$word = substr($start_with, 0, 1);
				$array = explode(',',file_get_contents('https://content.mcqstudy.com/bw-static-files/ta-word-list/' . strtolower($word) . '.txt'));
				
				$i = 1;
				foreach($array as $row){
					
					if(mb_substr($row, 0, 2) == $start_with){
						$big_html .= '<span><a href="'.$base_url.'english-to-'.$lang.'-meaning-'.strtolower($row).'"><label class="cursor_link">'.$i.'. '.$row.'</label></a></span><br>';
						$i++;
					}
					
				}
				$big_html .= '<button class="btn_pre bdr_radius2 cursor_link" onclick="location.href=\''.$base_url.'browse-english-to-'.$lang.'-word-'.$word.'"><a>← Back</a></button>';
			
			}else{

				$word = mb_substr($start_with, 0, 1);
				$file = '/var/www/all_static_files/local/' . strtolower($lang) . '/' . $word.'.txt';
				$myfile = fopen($file, "r");

				if ($myfile == true) {
					$data =  fread($myfile, filesize($file));
					fclose($myfile);
					$array = explode(',',$data);
				}
				
				$i = 1;
				foreach($array as $row){
					
					if(mb_substr($row, 0, 2) == $start_with){
						$big_html .= '<span><a href="'.$base_url.''.$lang.'-to-english-meaning?word='.$row.'"><label class="cursor_link">'.$i.'. '.$row.'</label></a></span><br>';
						$i++;
					}	
				}	
				$big_html .= '<button class="btn_pre bdr_radius2 cursor_link" onclick="location.href=\''.$base_url.'browse-'.$lang.'-to-english-word-'. $word.'\'"><a>← Back</a></button>';

			}
			
		}

        $big_html .= '
		
		</fieldset>
    </div>

    </div>';

	$big_html .= include('right_content_single_string.php');

    $big_html .= '
	
	</div>

    <div id="complete-dialog" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="custom_font3"><label class="modal-title"></label></div>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_default4 bdr_radius2" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="'.$contentUrl.'js/jquery.min.js"></script>
    <script type="text/javascript" src="'.$contentUrl.'js/all2.js?cache=234"></script>';

	$big_html .= '
    <script type="text/javascript">
        
        function show_meaning(a) {
            var url1 = "english-to-" + lang() + "-meaning-" + a;
            var new_url = "/" + url1;
           window.history.pushState("data", "Title", new_url);
            var e = a,
                t = 1;

			e.charAt(0).match(/[a-z]/i) ? (t = 0, e = a.replace(/\W/g, "").replace("_", "").replace(" ", "").toLowerCase(), $(".page-title").text("Read Text :: English to " + lang_uc())) : (e = a.replace("_", "").replace(",", "").replace(" ", "").replace("?", "").replace("???", "").replace("!", "").replace("\'", "").replace(\'"\', ""), $(".page-title").text("Read Text :: " + lang_uc + " to English")), $("#complete-dialog").modal("show"), 0 == t ? $(".modal-title").html("&#9679; " + e.charAt(0).toUpperCase() + e.slice(1)) : $(".modal-title").html("&#9679; " + e), $(".modal-body").html("<div class=\"loader\"><img style=\"width:50px;\" src=\"https://content.mcqstudy.com/bw-static-files/imgs/loader.gif\"/></div>"), run_ajax(e, t, ".modal-body");
        }

        function lang() {
           return "'.$lang.'";
        }
    </script>';


	$big_html .= include('footer_single_string.php');



echo $big_html;

?>