<?php
$lang_array = getLanguageArray();
$country = getCountryBySite(array_search($_GET['lang'],getLanguageArray()));
$contentUrl = 'https://content2.mcqstudy.com/bw-static-files/';

$big_html_right = '';

$big_html_right .= "<div class='right_content'>
    <div class='box_wrapper2'>
        <div class='inner_wrapper'>";

        if ($lang == 'bengali') {

               $big_html_right .= "<button class='btn_default2 bdr_radius2'>
                <a href='https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary' target='_blank'>";

        $big_html_right .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
			data-src="' . $contentUrl . 'img/android-icon.webp"
			onerror="this.onerror=null; 
			this.src=';
        $big_html_right .= "'" . $contentUrl . "img/android-icon.png'";
        $big_html_right .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>Android App</span>';
        $big_html_right .= "</a>
            </button>

            <button class='btn_default2 bdr_radius2'>
                <a href='https://itunes.apple.com/us/app/english-bengali-dictionary/id1213381239?ls=1&mt=8'
                    target='_blank'>";

        $big_html_right .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
			data-src="' . $contentUrl . 'img/ios-icon.webp"
			onerror="this.onerror=null; 
			this.src=';
        $big_html_right .= "'" . $contentUrl . "img/ios-icon.png'";
        $big_html_right .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>iPhone App</span>';
        $big_html_right .= "</a>
            </button>
		
            <button class='btn_default2 bdr_radius2'>
                <a href='https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl'
                    target='_blank'>";

        $big_html_right .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
			data-src="' . $contentUrl . 'img/chrome-icon.webp"
			onerror="this.onerror=null; 
			this.src=';
        $big_html_right .= "'" . $contentUrl . "img/chrome-icon.png'";
        $big_html_right .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>Chrome Extension</span>';
        $big_html_right .= "</a>
            </button>";
                
            } else {
                

            $getAppId = mysqli_fetch_assoc(mysqli_query($conn, 'select AppId from AppIds where Lang=\'' . $lang . '\' limit 1'));
        $appId = $getAppId['AppId'];
        $download_link = 'https://itunes.apple.com/us/app/english-' . $lang . '-dictionary/id' . $appId . '?ls=1&mt=8';


        $big_html_right .= "<button class='btn_default2 bdr_radius2'>
                <a href='https://play.google.com/store/apps/details?id=com.bdword.e2" . $lang . "dictionary'
                    target='_blank'>";

        $big_html_right .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
			data-src="' . $contentUrl . 'img/android-icon.webp"
			onerror="this.onerror=null; 
			this.src=';
        $big_html_right .= "'" . $contentUrl . "img/android-icon.png'";
        $big_html_right .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>Android App</span>';
        $big_html_right .= "</a>
            </button>
            
            <button class='btn_default2 bdr_radius2'>
                <a href='" . $download_link . "' class='btn btn-primary btn-raised' target='_blank'>";
        $big_html_right .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
			data-src="' . $contentUrl . 'img/ios-icon.webp"
			onerror="this.onerror=null; 
			this.src=';
        $big_html_right .= "'" . $contentUrl . "img/ios-icon.png'";
        $big_html_right .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>iPhone App</span>';

        $big_html_right .= "</a>
            </button>
            
            <button class='btn_default2 bdr_radius2'>
                <a href='https://chrome.google.com/webstore/detail/english-to-any-language-d/apenapfkioiehfhgheabegngnfhnfbjh?hl=en&authuser=0'
                    target='_blank'>";
        $big_html_right .= '<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" 
			data-src="' . $contentUrl . 'img/chrome-icon.webp"
			onerror="this.onerror=null; 
			this.src=';
        $big_html_right .= "'" . $contentUrl . "img/chrome-icon.png'";
        $big_html_right .= '" width="30px" height="30px" alt="icon" loading="lazy"><span>Chrome Extension</span>';
        $big_html_right .= "</a>
            </button>";

             } 
             
            
             $big_html_right .= "</div>
             </div>";
         
         
             $indians = array('hindi', 'malayalam', 'tamil', 'telugu', 'kannada', 'gujarati', 'punjabi', 'marathi');
             if ($lang == 'bengali') {
                 $big_html_right .= '<div class="box_wrapper2 custom_bgcolor">
                     <div class="inner_wrapper">
                     <button class="btn_default3 bdr_radius2"><a href="http://www.allbanglanewspaperlist24.com" target="_blank"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="'. $contentUrl.'img/newspaper-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><label>All Bangla Newspapers</label></a>
                     </div>
             </div>';
             } elseif (in_array($lang, $indians)) {
                 $big_html_right .= '<div class="box_wrapper2 custom_bgcolor">
                     <div class="inner_wrapper">
                         <button class="btn_default3 bdr_radius2"><a href="http://www.allindianewspaperlist.com/" target="_blank"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="'. $contentUrl.'img/newspaper-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><label>All Indian Newspapers</label></a>
                         </div>
             </div>';
             } else {
                 if (!empty($country)) {
                     $string = preg_replace('/\s+/', '_', $country);
                     $big_html_right .= '<div class="box_wrapper2 custom_bgcolor">
                     <div class="inner_wrapper"><button class="btn_default3 bdr_radius2"><a href="https://newspaperlinks.xyz/newspaper/' . strtolower($string). '" target="_blank"><img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="'. $contentUrl.'img/newspaper-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><label>All ' . ucfirst($lang) . ' Newspapers</label></a>
                     </div>
             </div>';

        }
    }

    // echo $big_html_right;


    

    $big_html_right .= "<div class='box_wrapper2'>
        <div class='inner_wrapper'>
            <fieldset>
                <legend class='custom_font2'>Your Favorite Words</legend>

                <div class='fieldset_body inner_details' id='load_favourite'>
                    Currently you do not have any favorite word. To make a word favorite you have to click on the heart
                    button.
                </div>
            </fieldset>
        </div>
    </div>";


    $big_html_right .= "<div class='box_wrapper2'>
        <div class='inner_wrapper'>
            <fieldset>
                <legend class='custom_font2'>Your Search History</legend>

                <div class='fieldset_body inner_details' id='load_search'>
                    You have no word in search history!
                </div>
            </fieldset>
        </div>
    </div>";

    $big_html_right .= "<div class='box_wrapper2'>
    <div class='inner_wrapper'>
        <fieldset>
            <legend class='custom_font2'>All Dictionary Links</legend>

            <div class='fieldset_body'>
                <ul>";

                        foreach ($lang_array as $key => $row) {
                            $big_html_right .= '<li><span><a title="English to ' . ucfirst(str_replace("bengali", "bangla", $row)) . ' Dictionary" 
										href="https://' . $key . '" target="_blank"><label style="color: black; cursor: pointer">English to ' . ucfirst(str_replace("bengali", "bangla", $row)) .
                                ' Dictionary</label></a></span></li><br>';
                        } 
                        

                        
    $big_html_right .="</ul>
                    </div>
                </fieldset>
            </div>
        </div>


    </div>";


return $big_html_right;

?>