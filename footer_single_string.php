<?php

$footer_big_html = '';

$footer_domain_name = strtoupper(str_replace(array('https://www.','https://','/'), '', $base_url));

$footer_big_html .= "<div class='footer_wrapper'>
<span class='align_left'>&copy; 2018-".date('Y')." | <a href='". $base_url ."'><strong>".$footer_domain_name."</strong></a> | All Rights Reserved by <a href='".$base_url."'><strong>".$footer_domain_name."</strong></a> </span>
    <span class='align_right'>
        <a href='".$base_url."english-to-".$lang."-dictionary-about-us'>About Us</a>&nbsp;|&nbsp;
        <a href='".$base_url.">english-to-".$lang."-dictionary-privacy'>Privacy</a>&nbsp;|&nbsp;
        <a href='".$base_url."english-to-".$lang."-dictionary-disclaimer'>Disclaimer</a>&nbsp;|&nbsp;
        <a href='".$base_url."english-to-".$lang."-dictionary-contact-us'>Contact</a>
    </span>
</div>
</div>";

$footer_big_html .= '
<script type="text/javascript" src="'.$contentUrl.'js/responsivejs.js"></script>
<script type="text/javascript" src="https://server2.mcqstudy.com/footer_js_single_string.js?test=12"></script>

</body>

</html>';

return $footer_big_html;

?>