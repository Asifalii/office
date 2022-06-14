<?php
$lang_array = getLanguageArray();
$country = getCountryBySite(array_search($_GET['lang'],getLanguageArray()));
$contentUrl = 'https://content2.mcqstudy.com/bw-static-files/';
?>
<div class="right_content">
    <div class="box_wrapper2">
        <div class="inner_wrapper">

            <?php if ($lang == 'bengali') { ?>

                <button class="btn_default2 bdr_radius2">
                    <a href="https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary" target="_blank">
                        <img src="<?= $contentUrl?>img/android-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><span>Android App</span>
                    </a>
                </button>

                <button class="btn_default2 bdr_radius2">
                    <a href="https://itunes.apple.com/us/app/english-bengali-dictionary/id1213381239?ls=1&mt=8"
                       target="_blank">
                        <img src="<?= $contentUrl?>img/ios-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><span>iPhone App</span>
                    </a>
                </button>

                <button class="btn_default2 bdr_radius2">
                    <a href="https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl"
                       target="_blank">
                        <img src="<?= $contentUrl?>img/chrome-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><span>Chrome Extension</span>
                    </a>
                </button>


                <?php
            } else {


                //connect();
                $getAppId = mysqli_fetch_assoc(mysqli_query($conn, "select AppId from AppIds where Lang='" . $lang . "' limit 1"));
                $appId = $getAppId['AppId'];
                $download_link = 'https://itunes.apple.com/us/app/english-' . $lang . '-dictionary/id' . $appId . '?ls=1&mt=8';

                ?>

                <button class="btn_default2 bdr_radius2">
                    <a href="https://play.google.com/store/apps/details?id=com.bdword.e2<?= $lang ?>dictionary"
                       target="_blank">
                        <img src="<?= $contentUrl?>img/android-icon.png" width="30px" height="30px" alt="icon"><span
                                style="text-transform:none !important;" loading="lazy">Android App</span>
                    </a>
                </button>

                <button class="btn_default2 bdr_radius2">
                    <a href="<?= $download_link ?>" class="btn btn-primary btn-raised" target="_blank">
                        <img src="<?= $contentUrl?>img/ios-icon.png" width="30px" height="30px" alt="icon"><span
                                style="text-transform:none !important;" loading="lazy">iPhone App</span>
                    </a>
                </button>

                <button class="btn_default2 bdr_radius2">
                    <a href="https://chrome.google.com/webstore/detail/english-to-any-language-d/apenapfkioiehfhgheabegngnfhnfbjh?hl=en&authuser=0"
                       target="_blank">
                        <img src="<?= $contentUrl?>img/chrome-icon.webp" onerror="this.onerror=null; this.src='https://content2.mcqstudy.com/bw-static-files/img/chrome-icon.jpg'" width="30px" height="30px" alt="icon" loading="lazy"><span>Chrome Extension</span>
                    </a>
                </button>

            <?php } ?>
        </div>
    </div>

    <?php
    $indians = array('hindi', 'malayalam', 'tamil', 'telugu', 'kannada', 'gujarati', 'punjabi', 'marathi');
    if ($lang == 'bengali') {
        echo '<div class="box_wrapper2 custom_bgcolor">
			<div class="inner_wrapper">
			<button class="btn_default3 bdr_radius2"><a href="http://www.allbanglanewspaperlist24.com" target="_blank"><img src="'. $contentUrl.'img/newspaper-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><label>All Bangla Newspapers</label></a>
			</div>
    </div>';
    } elseif (in_array($lang, $indians)) {
        echo '<div class="box_wrapper2 custom_bgcolor">
			<div class="inner_wrapper">
				<button class="btn_default3 bdr_radius2"><a href="http://www.allindianewspaperlist.com/" target="_blank"><img src="'. $contentUrl.'img/newspaper-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><label>All Indian Newspapers</label></a>
				</div>
    </div>';
    } else {
        if (!empty($country)) {
            $string = preg_replace('/\s+/', '_', $country);
            echo '<div class="box_wrapper2 custom_bgcolor">
			<div class="inner_wrapper"><button class="btn_default3 bdr_radius2"><a href="https://newspaperlinks.xyz/newspaper/' . strtolower($string) . '" target="_blank"><img src="'. $contentUrl.'img/newspaper-icon.png" width="30px" height="30px" alt="icon" loading="lazy"><label>All ' . ucfirst($lang) . ' Newspapers</label></a>
			</div>
    </div>';

        }
    }
    ?>


    <!--div class="box_wrapper2">
        <div class="inner_wrapper">
            <fieldset class="bdr_radius3">
                <legend class="custom_font2">Search History</legend>

                <div class="fieldset_body inner_details" id="load_history">
                    Any word you search will appear here
                </div>
            </fieldset>
        </div>
    </div-->

    <div class="box_wrapper2">
        <div class="inner_wrapper">
            <fieldset>
                <legend class="custom_font2">Your Favorite Words</legend>

                <div class="fieldset_body inner_details" id="load_favourite">
                    Currently you do not have any favorite word. To make a word favorite you have to click on the heart
                    button.
                </div>
            </fieldset>
        </div>
    </div>

    <div class="box_wrapper2">
        <div class="inner_wrapper">
            <fieldset>
                <legend class="custom_font2">Your Search History</legend>

                <div class="fieldset_body inner_details" id="load_search">
                    You have no word in search history!
                </div>
            </fieldset>
        </div>
    </div>

    <div class="box_wrapper2">
        <div class="inner_wrapper">
            <fieldset>
                <legend class="custom_font2">All Dictionary Links</legend>

                <div class="fieldset_body">
                    <ul>
                        <?php foreach ($lang_array as $key => $row) {
                            echo '<li><span><a title="English to ' . ucfirst(str_replace("bengali", "bangla", $row)) . ' Dictionary" 
										href="https://' . $key . '" target="_blank"><label style="color: black; cursor: pointer">English to ' . ucfirst(str_replace("bengali", "bangla", $row)) .
                                ' Dictionary</label></a></span></li><br>';
                        } ?>
                    </ul>
                </div>
            </fieldset>
        </div>
    </div>


</div>