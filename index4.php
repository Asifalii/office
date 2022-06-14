<?php

if ($_GET['msg'] == 'not-found') {
    header("HTTP/1.0 404 Not Found");
}
require('functions2.php');
redirectOlds();
$q = sanitize($_GET['q']);

if (preg_match('#::#', $q)) {
    $q_ex = explode('::', $q);
    $q = trim($q_ex[1]);
}

$info = array();
$url = base_url();
$lang = getLang();
$ulang = ucfirst($lang);
$inWordList = true;

$isMobile = isMobile();

?>


<!doctype html>
<html ⚡>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <title><?= getTitle($q, $url) ?></title>
    <?php
    $local_lang = ($lang == 'bengali') ? 'Popular as ইংরেজি বাংলা অভিধান' : '';
    $m_des = ($q) ? $q . ' - Meaning in ' . $ulang . ', what is meaning of common in ' . $ulang . ' dictionary, audio pronunciation, synonyms and definitions of common in ' . $ulang . ' and English.' : 'English to ' . $ulang . ' bilingual free online dictionary with English ' . $ulang . ' translation, English ' . $ulang . ' word meanings, definitions, synonyms and antonyms in ' . $ulang . ' and English. ' . $local_lang;
    ?>
    <meta name="description" content="<?= $m_des ?>">

    <link rel="canonical" href="<?= canonical() ?>"/>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="google-site-verification" content="<?= googleSiteVerify() ?>"/>

    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="English :: <?= $ulang ?> Online Dictionary"/>
    <meta property="og:description"
          content="English to <?= $ulang ?> Dictionary (Free). You can get meaning of any English word very easily. It has auto-suggestion feature which will save you a lot of time getting any meaning. We have a Chrome Extension and an Android App"/>
    <meta property="og:url" content="<?= $url ?>"/>
    <meta property="og:site_name" content="English :: <?= $ulang ?> Online Dictionary"/>

    <link rel="shortcut icon" href="./v3/img/favicon.png">
    <!--Site Navigation JS-->
    <script custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js" async></script>
    <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>

    <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
    <!--Form JS-->
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
    <script async custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js"></script>
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.1.js"></script>
    <!--Accordion JS-->
    <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
    <!--Boilerplate CSS-->
    <style amp-boilerplate>body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }</style>
    <noscript>
        <style amp-boilerplate>body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }</style>
    </noscript>
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
          rel="stylesheet">
    <style amp-custom="">
        /*AMP CSS*/
        amp-sidebar {
            width: 300px;
            padding-right: 10px;
            background-color: #fff;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=95)";
            filter: alpha(opacity=95);
            opacity: 0.95
        }

        .amp-sidebar-image {
            line-height: 100px;
            vertical-align: middle
        }

        .amp-close-image {
            top: 21px;
            left: 265px;
            cursor: pointer
        }

        li {
            margin-bottom: 20px;
            margin-left: 10px;
            margin-right: 10px;
            list-style: none
        }

        .previewOnly {
            font-weight: 700
        }

        #sidebar-right nav.amp-sidebar-toolbar-target-shown {
            display: none
        }

        .ampstart-btn {
            padding-top: 0;
            color: #fff;
            font-size: 24px;
            position: absolute;
            right: 20.5%;
            top: 11px;
            z-index: 99;
            border: 2px solid #00a091;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            background-color: transparent;
            cursor: pointer;
            outline: none
        }

        .ampstart-btn:hover {
            border: 2px solid #bbb
        }

        @supports (-moz-appearance:none) {
            .ampstart-btn {
                padding-bottom: 6px
            }
        }

        /*Custom CSS*/
        .box_wrapper, .box_wrapper2 {
            min-height: 50px;
            overflow: hidden
        }

        .btn_default2 amp-img, .btn_default3 amp-img, .topic_link a amp-img {
            margin-right: 6px;
            float: left
        }

        .btn_default2 span, .btn_default3 span {
            line-height: 30px
        }

        a, a:hover {
            text-decoration: none
        }

        body, html {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            height: 100%
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Roboto, sans-serif;
            font-size: .95rem;
            color: #333;
            background-color: #f8f8f8;
            overflow-x: hidden
        }

        .btn_default, .custom_bgcolor {
            background-color: #043A54
        }

        .btn_default, .custom_font {
            font-size: .75rem
        }

        .custom_font, .custom_font2 {
            color: #009385
        }

        a:focus, amp-img:focus, button:focus, img:focus, input:focus {
            outline: 0
        }

        .top_margin {
            margin-top: 15px
        }

        .bdr_radius {
            -webkit-border-bottom-left-radius: 3px;
            -webkit-border-bottom-right-radius: 3px;
            -moz-border-radius-bottomleft: 3px;
            -moz-border-radius-bottomright: 3px;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px
        }

        .bdr_radius2 {
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px
        }

        .bdr_radius3 {
            border: 1px solid #add7d3
        }

        .inner_wrapper {
            margin: 15px 15px 0
        }

        .btn_default, .btn_default2 {
            font-weight: 700;
            color: #fff;
            border: none;
            cursor: pointer
        }

        .btn_default3, .btn_default4, .btn_default5 {
            color: #333;
            border: 1px solid #ddd;
            cursor: pointer
        }

        .align_left {
            float: left
        }

        .align_right {
            float: right
        }

        .btn_default {
            margin-right: 3px;
            padding: 10px 15px;
            text-transform: uppercase
        }

        .btn_default2, .btn_default3 {
            padding: 14px 15px;
            text-align: left;
            width: 100%;
            text-transform: uppercase
        }

        .btn_default:hover, .btn_default_active {
            background-color: #00aa9a
        }

        .btn_default2 {
            margin-bottom: 15px;
            font-size: .95rem;
            background-color: #043A54;
            -webkit-box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .35);
            -moz-box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .35);
            box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .35)
        }

        .btn_default2 img {
            margin: 0 5px 0 0;
            vertical-align: middle
        }

        .btn_default2:hover {
            background-color: #00aa9a
        }

        .btn_default3 {
            margin-bottom: 15px;
            font-size: 1rem;
            font-weight: 900;
            background-image: url(./v3/img/bg28.png);
            background-repeat: repeat;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .25);
            -moz-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .25);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .25)
        }

        .btn_default4, .btn_default5 {
            padding: 10px;
            font-size: .75rem;
            font-weight: 700
        }

        .btn_default3 img {
            margin: -3px 5px 0 0;
            vertical-align: middle
        }

        .btn_default3:hover {
            background-image: url(./v3/img/bg28-hover.png);
            background-repeat: repeat
        }

        .btn_default4 {
            margin: 6px 3px;
            background-color: #fff
        }

        .btn_default4:hover {
            background-color: #fafafa
        }

        .btn_default5 {
            margin: 10px 0 10px 10px;
            width: 97%;
            background-color: #fff;
            text-align: center;
            text-transform: uppercase
        }

        .btn_default5:hover {
            background-color: #fafafa
        }

        #site_wrapper {
            width: 100%;
            height: auto;
            overflow: hidden
        }

        .content_wrapper {
            margin: 15px auto 0;
            max-width: 100%;
            width: 1140px;
            height: auto;
            overflow: hidden
        }

        .header_wrapper {
            position: relative;
            top: 0;
            width: 100%;
            height: 60px;
            background-color: #043A54
        }

        .header_logo {
            position: absolute;
            top: 0
        }

        .header_logo a, .header_wrapper .header_logo {
            padding-left: 2px;
            color: #fff;
            font-size: 1.5rem;
            font-weight: 900;
            line-height: 60px;
            float: left
        }

        .header_wrapper .header_nav {
            margin: 0 auto;
            width: 1140px;
            padding-right: 2px
        }

        .header_wrapper .header_nav ul {
            margin: 0;
            padding: 0;
            float: right
        }

        .header_wrapper .header_nav ul li {
            margin: 0;
            padding: 0;
            list-style-type: none;
            display: inline;
            float: left
        }

        .header_wrapper .header_nav ul li a {
            padding: 0 15px;
            color: #fff;
            font-size: .95rem;
            font-weight: 700;
            line-height: 58px;
            text-transform: uppercase;
            text-align: center;
            border: 1px solid #043A54;
            border-right: none;
            float: left
        }

        .header_wrapper .header_nav ul li a:hover {
            color: #fff;
            background-color: #00aa9a;
            border: 1px solid #043A54;
            border-right: none
        }

        .header_wrapper .header_nav ul li a.active {
            background-color: #00aa9a
        }

        .header_nav_collapse {
            width: 100%;
            display: none
        }

        .header_nav_collapse ul {
            margin: 0;
            padding: 0;
            width: 100%;
            list-style: none
        }

        .header_nav_collapse ul li {
            padding: 15px;
            width: 90%;
            height: 20px;
            position: relative;
            top: -3px;
            z-index: 3;
            transition: all .5s;
            opacity: 1;
            display: inline-block;
            color: #fff;
            border-bottom: 1px solid #084a6a;
            background-color: #043A54
        }

        .header_nav_collapse ul li:hover {
            background: #00aa9a
        }

        .header_nav_collapse ul li a {
            color: #fff;
            text-decoration: none
        }

        .header_nav_collapse ul li:last-child {
            border-bottom: none;
            -webkit-border-bottom-left-radius: 4px;
            -webkit-border-bottom-right-radius: 4px;
            -moz-border-radius-bottomleft: 4px;
            -moz-border-radius-bottomright: 4px;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px
        }

        .header_nav_collapse label {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px;
            display: inline-block;
            border: 2px solid #032536;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            cursor: pointer
        }

        .header_nav_collapse label:before {
            width: 20px;
            height: 2px;
            background: #00aa9a;
            display: inline-block;
            content: "";
            box-shadow: 0 -5px 0 0 #00aa9a, 0 -10px 0 0 #00aa9a;
            transition: all .5s;
            opacity: 1
        }

        .left_content {
            width: 65%;
            float: left
        }

        .right_content {
            width: 34%;
            float: right
        }

        .box_wrapper {
            margin: 4px auto 16px;
            width: 99%;
            height: auto;
            background-color: #fff;
            -webkit-box-shadow: 0 0 4px 0 rgba(0, 0, 0, .25);
            -moz-box-shadow: 0 0 4px 0 rgba(0, 0, 0, .25);
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, .25);
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px
        }

        .box_wrapper fieldset {
            margin: 15px 15px 20px;
            border: 1px solid #ddd;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px
        }

        .box_wrapper fieldset legend {
            margin-left: 10px;
            font-size: 1.22rem;
            font-weight: 500
        }

        .box_wrapper fieldset .fieldset_body {
            padding: 20px 13px;
            overflow: hidden
        }

        .box_wrapper fieldset .fieldset_body span {
            float: left
        }

        .search_fld {
            margin: 0 auto;
            width: 50%;
            position: absolute;
            top: 11px;
            left: 60px;
            right: 0
        }

        .search_fld input[type=text] {
            position: relative;
            z-index: 1;
            width: 97%;
            padding: 10px;
            color: #333;
            font-size: .95rem;
            font-weight: 400;
            border: 1px solid #ccc;
            -webkit-border-top-left-radius: 3px;
            -moz-border-radius-topleft: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            -moz-box-shadow: inset 0 0 5px #ccc;
            -webkit-box-shadow: inset 0 0 5px #ccc;
            box-shadow: inset 0 0 5px #ccc;
            text-transform: capitalize
        }

        .search_fld input[type=text]:focus {
            border: 1px solid #bbb
        }

        .search_btn {
            padding: 19px;
            width: 22px;
            height: 22px;
            position: absolute;
            top: 1px;
            right: 0;
            z-index: 2;
            background-color: transparent;
            background-image: url(./v3/img/search_icon.png);
            background-position: center center;
            border-left: 1px solid #666;
            border-right: 0;
            border-top: 0;
            border-bottom: 0;
            background-repeat: no-repeat;
            cursor: pointer;
            opacity: .35;
            transition: opacity .5s ease-out;
            -moz-transition: opacity .5s ease-out;
            -webkit-transition: opacity .5s ease-out;
            -o-transition: opacity .5s ease-out
        }

        .footer_wrapper, .topic_link a:first-child {
            border-top: 1px solid #ddd
        }

        .footer_wrapper, .topic_link a {
            border-bottom: 1px solid #ddd;
            overflow: hidden
        }

        .search_btn:hover {
            opacity: .75
        }

        .topic_link {
            margin: 0;
            padding: 0
        }

        .topic_link a {
            margin-left: 3px;
            padding: 12px 0;
            width: 100%;
            color: #333;
            line-height: 25px;
            display: block
        }

        .topic_link a:hover {
            background-color: #fafafa
        }

        .topic_link span {
            line-height: 25px
        }

        .topic_link span img {
            margin-right: 5px;
            vertical-align: middle
        }

        .box_wrapper2 {
            margin: 4px auto 17px;
            width: 99%;
            height: auto;
            background-color: #fff;
            -webkit-box-shadow: 0 0 4px 0 rgba(0, 0, 0, .25);
            -moz-box-shadow: 0 0 4px 0 rgba(0, 0, 0, .25);
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, .25);
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px
        }

        .box_wrapper2 fieldset {
            margin: 0 0 20px;
            border: 1px solid #ddd;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px
        }

        .box_wrapper2 fieldset legend {
            margin-left: 10px;
            font-size: 1.08rem;
            font-weight: 500
        }

        .box_wrapper2 fieldset .fieldset_body {
            padding: 13px;
            overflow: hidden
        }

        .footer_wrapper {
            margin: 0 auto 5px;
            padding: 0 4px;
            max-width: 100%;
            width: 1124px
        }

        .footer_wrapper span {
            font-size: .75rem;
            color: #555;
            line-height: 50px;
            display: block
        }

        .footer_wrapper span a {
            color: #333
        }

        .footer_wrapper span a:hover {
            color: #00aa9a
        }

        amp-sidebar nav ul {
            margin-top: 50px;
            padding: 0 15px
        }

        amp-sidebar nav ul li a {
            width: 100%;
            padding: 12px 0;
            color: #333;
            border-bottom: 1px solid #ccc;
            float: left;
            clear: both
        }

        amp-sidebar nav ul li a.active, amp-sidebar nav ul li a:hover {
            color: #00aa9a
        }

        button a {
            color: #333;
            display: block
        }

        button a span {
            color: #fff
        }

        button a label {
            color: #333;
            line-height: 30px
        }

        .custom_bdr {
            border: 1px solid #aaa
        }

        /*AMP Auto Suggest*/
        .search-container {
            display: flex;
            flex-flow: row nowrap
        }

        .search-box, .search-submit, .select-option {
            font-size: .95rem;
            text-transform: capitalize
        }

        .autosuggest-box {
            box-shadow: none
        }

        .search-box {
            flex: 4 0 0;
            padding: 5px;
            border-radius: 4px 0 0 4px;
            border: 2px solid #d3d3d3;
            border-right: 0
        }

        .search-submit {
            flex: 1 0 0;
            padding: 5px;
            border-radius: 0 4px 4px 0;
            border: 2px solid #4b68ff;
            background: #4b68ff;
            color: #fff
        }

        .select-option {
            position: relative;
            z-index: 99;
            display: block;
            box-sizing: border-box;
            height: 30px;
            line-height: 30px;
            padding-left: 10px;
            background: #fafafa;
            border-top: 1px solid #fff
        }

        .select-option:last-child {
            -webkit-border-bottom-right-radius: 4px;
            -webkit-border-bottom-left-radius: 4px;
            -moz-border-radius-bottomright: 4px;
            -moz-border-radius-bottomleft: 4px;
            border-bottom-right-radius: 4px;
            border-bottom-left-radius: 4px
        }

        amp-selector .select-option.no-outline.no-outline[option] {
            outline: 0
        }

        .select-option:focus {
            background: #fff
        }

        .select-option:nth-child(2n) {
            background: #eaeaea
        }

        /*Read Text Page CSS*/
        .btn_default6, h6 {
            font-weight: 700;
            clear: both
        }

        h6 {
            margin: 0;
            padding: 10px 0;
            font-family: Roboto, sans-serif;
            font-size: 1.15rem;
            color: #333;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd
        }

        .top_margin2 {
            margin-top: 45px
        }

        .custom_font3 {
            font-size: 1.12rem;
            color: #009385;
            line-height: 24px
        }

        .clear_fixdiv {
            margin: 0;
            padding: 0;
            display: block;
            clear: both
        }

        .btn_default6 {
            margin-top: 10px;
            padding: 12px 24px;
            width: auto;
            font-size: .75rem;
            color: #fff;
            background-color: #043A54;
            text-align: center;
            text-transform: uppercase;
            border: 1px solid #043045;
            cursor: pointer;
            float: right
        }

        .btn_default6:hover {
            background-color: #00aa9a;
            border: 1px solid #009a8b
        }

        .box_wrapper fieldset .fieldset_body textarea {
            position: relative;
            z-index: 1;
            width: 97%;
            margin: 0;
            padding: 10px;
            font-family: Roboto, sans-serif;
            color: #333;
            font-size: .95rem;
            font-weight: 400;
            border: 1px solid #ccc;
            -webkit-border-top-left-radius: 3px;
            -moz-border-radius-topleft: 3px;
            border-top-left-radius: 3px;
            -webkit-border-top-right-radius: 3px;
            -moz-border-radius-topright: 3px;
            border-top-right-radius: 3px;
            -webkit-border-bottom-right-radius: 3px;
            -moz-border-radius-bottomright: 3px;
            border-bottom-right-radius: 3px;
            -moz-box-shadow: inset 0 0 5px #ccc;
            -webkit-box-shadow: inset 0 0 5px #ccc;
            box-shadow: inset 0 0 5px #ccc;
            display: block
        }

        .box_wrapper fieldset .fieldset_body textarea:focus {
            border: 1px solid #bbb;
            outline: none
        }

        .gif_img {
            border: 2px solid #ddd;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px
        }

        .text_color {
            color: #fff
        }

        .pagination {
            margin: 0px 15px 25px 0px;
            display: inline-block;
            float: right;
            clear: both
        }

        .pagination a {
            margin-left: 3px;
            color: #333;
            float: left;
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid #ddd;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px
        }

        .pagination a.active {
            background-color: #009385;
            color: #fff;
            border: 1px solid #01877a
        }

        .pagination a:hover:not(.active) {
            background-color: #fafafa;
            border: 1px solid #ddd
        }

        /*All Topic Words CSS*/
        .pagination {
            margin: 0px 15px 25px 0px;
            display: inline-block;
            float: right;
            clear: both
        }

        .pagination a {
            margin-left: 3px;
            color: #333;
            float: left;
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid #ddd;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px
        }

        .pagination a.active {
            background-color: #009385;
            color: #fff;
            border: 1px solid #01877a
        }

        .pagination a:hover:not(.active) {
            background-color: #fafafa;
            border: 1px solid #ddd
        }

        .btn_active {
            background-color: #fafafa
        }

        .inner_details {
            line-height: 22px
        }

        .inner_details span {
            width: 100%;
            padding: 15px 0px;
            border-bottom: 1px solid #eaeaea;
            clear: both
        }

        .inner_details label {
            font-weight: 500;
            color: #009385;
            text-transform: capitalize;
        }

        .inner_details span:first-child {
            padding-top: 0
        }

        .inner_details a {
            color: #333;
            text-decoration: none
        }

        .inner_details a:hover {
            color: #009385;
            text-decoration: underline;
            cursor: pointer
        }

        .inner_details .label_font {
            margin-right: 5px;
            font-weight: 500;
            color: #009385;
            float: left
        }

        .img_align {
            display: inline-flex;
            line-height: 28px
        }

        .img_align amp-img {
            margin: 0px 8px
        }

        .align_text {
            font-weight: 500;
            line-height: 28px;
            float: left
        }

        .align_text2 {
            margin: 0px 8px;
            color: #333;
            line-height: 28px;
            float: left
        }

        .line_height {
            line-height: 35px
        }

        .float_left {
            float: left
        }

        .float_div {
            width: 50%;
            float: left
        }

        .custom_margin {
            margin-bottom: 8px
        }

        .custom_margin2 {
            margin-bottom: 20px;
            clear: both
        }

        .custom_margin3 {
            margin-top: 8px;
            float: left;
            clear: both
        }

        /*Accordion CSS*/
        amp-accordion > section {
            margin: 10px 0px
        }

        .custom-accordion-header {
            padding: 8px;
            border: 1px solid #eaeaea;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            background-color: #fafafa;
            outline: none
        }

        .custom-accordion-content {
            padding: 0px 8px 15px 8px
        }

        /*Search Result Page*/
        .dic_img {
            padding: 15px 10px 10px 10px;
            max-width: 334px;
            height: auto;
            border: 1px dashed #ddd
        }

        .h_line {
            margin: 0 0 15px 0;
            border-top: 1px solid #eaeaea;
            clear: both
        }

        .h_line2 {
            margin: 15px 0 15px 0;
            border-top: 1px solid #eaeaea;
            clear: both
        }

        /*Vocabulary Game Page CSS*/
        .alert_text {
            color: #e90505
        }

        .success_text {
            color: #009d2c
        }

        /*Miscellaneous CSS*/
        .custom_font4 {
            color: #333;
            font-size: 1.12rem;
            font-weight: 500
        }

        ::-webkit-input-placeholder {
            text-transform: none
        }

        ::-moz-placeholder {
            text-transform: none
        }

        :-ms-input-placeholder {
            text-transform: none
        }

        :-moz-placeholder {
            text-transform: none
        }

        .cursor_link {
            cursor: pointer
        }

        .btn_pre {
            background-color: #009385;
            border: 1px solid #01877a;
            float: left
        }

        .btn_pre:hover {
            background-color: #fff;
            border: 1px solid #ddd
        }

        .btn_next {
            background-color: #009385;
            border: 1px solid #01877a;
            float: right
        }

        .btn_next:hover {
            background-color: #fff;
            border: 1px solid #ddd
        }

        .btn_pre a, .btn_next a {
            padding: 8px 12px;
            color: #fff;
            font-size: 0.925rem;
            font-weight: 700;
            text-decoration: none
        }

        .btn_pre a:hover, .btn_next a:hover {
            text-decoration: none
        }

        /*Media Query CSS*/
        @media only screen and (max-width: 1680px) {
            .ampstart-btn {
                right: 16%
            }

            .search_fld {
                width: 56%
            }
        }

        @media only screen and (max-width: 1600px) {
            .ampstart-btn {
                right: 14.5%
            }

            .search_fld {
                width: 60%
            }
        }

        @media only screen and (max-width: 1440px) {
            .ampstart-btn {
                right: 10.5%
            }

            .search_fld {
                width: 67%
            }
        }

        @media only screen and (max-width: 1400px) {
            .ampstart-btn {
                right: 9.5%
            }

            .search_fld {
                width: 67%
            }
        }

        @media only screen and (max-width: 1366px) {
            .ampstart-btn {
                right: 8.5%
            }

            .search_fld {
                width: 70%
            }
        }

        @media only screen and (max-width: 1280px) {
            .ampstart-btn {
                right: 5.5%
            }

            .search_fld {
                width: 75%
            }
        }

        @media only screen and (max-width: 1024px) {
            #site_wrapper {
                margin: 0 auto;
                width: 95%;
                padding: 0
            }

            .ampstart-btn {
                right: 25px
            }

            .header_wrapper {
                -moz-border-radius: 0px;
                -webkit-border-radius: 0px;
                border-radius: 0px
            }

            .header_logo a, .header_wrapper .header_logo {
                padding-left: 7px
            }

            .search_fld {
                width: 75%
            }

            .search_btn {
                right: 5px
            }

            .small_viewport_mergin {
                margin-left: 28px;
                float: none;
                clear: both
            }

            .footer_wrapper {
                width: 99%
            }

            .box_wrapper fieldset {
                margin: 20px 0px;
                border: 0
            }

            .box_wrapper2 fieldset {
                padding: 0px;
                border: 0
            }

            .box_wrapper2 fieldset .fieldset_body {
                padding: 3px
            }

            .box_wrapper2 fieldset legend {
                margin-left: 0
            }
        }

        @media only screen and (max-width: 800px) {
            .search_fld {
                width: 70%
            }

            .search_btn {
                right: 0
            }

            .box_wrapper fieldset .fieldset_body textarea {
                width: 95%
            }

            .btn_default5 {
                width: 95%
            }
        }

        @media only screen and (max-width: 768px) {
            .search_fld {
                width: 70%
            }

            .search_btn {
                right: 0
            }

            .box_wrapper fieldset .fieldset_body textarea {
                width: 95%
            }
        }

        @media only screen and (max-width: 640px) {
            .header_nav {
                display: none
            }

            .header_nav_collapse {
                display: inline
            }

            .header_nav_collapse ul li {
                width: 100%
            }

            #menu {
                display: none
            }

            .btn_default3 img {
                width: 30px;
                height: 30px
            }

            .search_fld input[type=text] {
                width: 93%
            }

            .small_viewport_mergin {
                float: left
            }

            .search_fld {
                width: 65%
            }

            .search_btn {
                right: 0
            }

            .btn_default5 {
                width: 94%
            }
        }

        @media only screen and (max-width: 600px) {
            .ampstart-btn {
                right: 15px
            }

            .search_fld {
                width: 66%
            }

            .search_fld input[type=text] {
                width: 95%
            }

            .search_btn {
                right: 2px
            }

            .box_wrapper fieldset .fieldset_body textarea {
                width: 93%
            }

            .float_div {
                width: 100%
            }
        }

        @media only screen and (max-width: 480px) {
            .header_nav {
                display: none
            }

            .header_nav_collapse {
                display: inline
            }

            #menu {
                display: none
            }

            .left_content {
                width: 100%;
                float: none;
                display: block
            }

            .box_wrapper fieldset legend {
                margin-left: 0;
                font-size: 1.16rem
            }

            .box_wrapper fieldset .fieldset_body {
                padding: 10px 3px
            }

            .search_fld {
                width: 85%;
                left: -48px
            }

            .search_btn {
                right: 0
            }

            .search_fld input[type=text] {
                width: 93.5%
            }

            .ampstart-btn {
                right: 10px
            }

            .btn_default4 {
                margin: 3px;
                padding: 8px
            }

            .btn_default5 {
                width: 98%;
                margin: 20px 3px 10px 5px;
                padding: 8px
            }

            .topic_link a {
                padding: 10px 0
            }

            .small_viewport_mergin {
                margin-left: 28px;
                float: left
            }

            .right_content {
                width: 100%;
                float: none;
                display: block
            }

            .btn_default2 {
                padding: 10px
            }

            .btn_default3 {
                padding: 10px;
                font-size: .93rem
            }

            .btn_default3 img {
                width: 30px;
                height: 30px
            }

            .footer_wrapper {
                padding: 8px 4px
            }

            .footer_wrapper span {
                float: none;
                line-height: 25px
            }
        }

        @media only screen and (max-width: 414px) {
            .ampstart-btn {
                right: 12px
            }

            .search_fld {
                width: 80%;
                left: -57px
            }

            .search_btn {
                right: 2px
            }

            .box_wrapper fieldset .fieldset_body textarea {
                width: 93%
            }

            .btn_default5 {
                width: 97%
            }
        }

        @media only screen and (max-width: 375px) {
            .ampstart-btn {
                right: 10px
            }

            .search_fld {
                width: 80%;
                left: -54px
            }

            .box_wrapper fieldset .fieldset_body textarea {
                width: 92%
            }
        }

        @media only screen and (max-width: 320px) {
            .amp-close-image {
                left: 232px;
                top: 23px
            }

            .search_fld {
                width: 75%
            }

            .search_fld input[type=text] {
                width: 92%
            }

            .btn_default5 {
                width: 96%
            }
        }

    </style>
</head>

<body>
<amp-sidebar id="sidebar-left" layout="nodisplay" side="left">
    <amp-img class="amp-close-image" src="./v3/img/ic_close_black_18dp_2x.png" width="16" height="16"
             alt="close sidebar" on="tap:sidebar-left.close" role="button" tabindex="0"></amp-img>

    <nav class="ampstart-sidebar-nav ampstart-nav">
        <ul class="list-reset m0 p0 ampstart-label">
            <li>
                <a class="active" href="<?= $url ?>">Home</a>
            </li>
            <li>
                <a href="<?= $url ?>/read-text">Read Text</a>
            </li>
            <li>
                <a href="<?= $url ?>/vocabulary-game">Games</a>
            </li>
            <li>
                <a href="<?= $url ?>/learn-ten-words-everyday">Words Everyday</a>
            </li>
            <li>
                <a href="<?= $url ?>/contact-us">Contact</a>
            </li>
        </ul>
    </nav>
</amp-sidebar>

<button on="tap:sidebar-left.toggle" class="ampstart-btn">☰</button>

<div id="target-element-left" class="header_wrapper"></div>

<!--Site Wrapper-->
<div id="site_wrapper">
    <div class="content_wrapper">
        <div class="left_content">
            <div class="header_logo">
                <a href="#">BDWORD</a>
            </div>
            <div class="search_fld">

                <form
                        method="get"
                        action="https://www.bdword.com/index4.php"
                        target="_top"
                        id="search-form"
                        on="submit:autosuggest-list.hide;submit-success:results.show"
                        autocomplete="off"
                >
                    <div class="search-container">
                        <input
                                id="query"
                                name="q"
                                value="<?= $q; ?>"
                                type="text"
                                class="search-box"
                                placeholder="Type English word/phrase"
                                on="input-debounced:AMP.setState({
            query: event.value,
            autosuggest: event.value
          }),
          autosuggest-list.show,
          results.hide"
                                [value]="query || ''"
                        />


                        <button type="submit" class="search_btn"></button>


                    </div>
                    <amp-list class="autosuggest-box" layout="fixed-height" height="350"
                              src="https://www.bdword.com/getEngSug.php"
                              [src]="'https://www.bdword.com/getEngSug.php?q=' + (autosuggest || '')"
                              id="autosuggest-list" hidden>

                        <template type="amp-mustache">
                            <amp-selector id="autosuggest-selector"
                                          keyboard-select-mode="focus"
                                          layout="container"
                                          on="
				select:
                    AMP.setState({
                      query: event.targetOption,
                      showDropdown: true
                    }),
                    search-form.submit">
                                {{#results}}
                                <div class="select-option no-outline"
                                     role="option"
                                     tabindex="0"
                                     option="{{.}}">{{.}}
                                </div>
                                {{/results}} {{^results}}
                                <div class="select-option {{#query}}empty{{/query}}">

                                </div>
                                {{/results}}
                            </amp-selector>
                        </template>
                    </amp-list>
                </form>


            </div>

            <div class="box_wrapper">


                <?php
                connectWithCharSet();
                $show_local_mean = true;
                if ($q and $lang and $show_local_mean == true) {


                    /*$y_bengali = mysql_fetch_assoc(mysql_query("select details from y_".$lang." where word='".$q."' limit 1"));

                    if(isset(json_decode($y_bengali['details'],true)) && sizeof(json_decode($y_bengali['details'],true)) > 0){
                        //show y bengali
                        //show details(word frame)
                    }else{

                        $x_bengali = mysql_fetch_assoc(mysql_query("select mean from x_".$lang." where word='".$q."' limit 1"));

                        if(isset($x_bengali['mean']) && sizeof($y_bengali['mean']) > 0){
                            //show single $x_bengali['mean']

                            $variants = mysql_fetch_assoc(mysql_query('select word from variants where word like "'.$q.'"'));
                            $y_bengali = mysql_fetch_assoc(mysql_query("select details from y_".$lang." where word='".$variants['word']."' limit 1"));
                            //show y bengali
                            //show details(word frame)
                        }else{

                           $variants = mysql_fetch_assoc(mysql_query('select word from variants where word like "'.$q.'"'));

                           if(isset($variants['word']) && sizeof($variants['word']) > 0){
                                $y_bengali = mysql_fetch_assoc(mysql_query("select details from y_".$lang." where word='".$variants['word']."' limit 1"));

                                if(isset($y_bengali['details']) && sizeof($y_bengali['details']) > 0){
                                    //show y bengali
                                    //show details
                                }else{
                                    //show details
                                }
                           }else{
                               print "no Word Meaning";
                           }

                        }




                        }


                    exit();*/


                    ?>

                    <fieldset>
                        <legend>Searching Word</legend>

                        <div class="fieldset_body inner_details">


                            <?php if (preg_match("/^[a-z]$/", $q[0])) {

                                $mquery = mysql_query("select mean from x_" . $lang . " where word='" . $q . "' limit 1");

                                // if no meaning
                                if (mysql_num_rows($mquery) == 0) {
                                    echo '<span><div class="alert_text">No word meaning found for: ' . $q . '</div><div class="custom_margin3"></div><div class="h_line"></div>';
                                    $pspell_array = [];

                                    $pspell_array = json_decode(file_get_contents('http://sug.bdword.com/api_multiple.php?word=' . urlencode($q)));


                                    if (count($pspell_array) > 0) {
                                        echo '<div class="custom_font3">Did you mean ' . $pspell_array[0] . '?</div></span>';

                                        foreach ($pspell_array as $pa) {
                                            echo '<span><a href="' . $url . '/english-to-' . $lang . '-meaning-' . $pa . '">' . $pa . '</a></span>';
                                        }
                                    }

                                } else { // if meaning


                                    $get_root_query = mysql_fetch_assoc(mysql_query('select root from v3_word_list where word="' . $q . '"'));

                                    // echo $get_root_query['root'];die;

                                    if ($get_root_query['root']) {
                                        $q = $get_root_query['root'];
                                    }

                                    $mrow = mysql_fetch_assoc($mquery);

                                    $sql = 'select word, ' . $lang . ', id, data from v3_word_frame where word="' . $q . '" limit 1';

                                    $query = mysql_query($sql) or die(mysql_error());
                                    $row = mysql_fetch_assoc($query);


                                    $id = $row['id'];
                                    $data = json_decode($row['data']);
                                    $mean = json_decode($row[$lang]);
                                    $nex = null;
                                    $prev = null;
                                    $ba_img = null;
                                    $img_check = mysql_fetch_assoc(mysql_query('select nex,prev,height,width from img_words where word="' . $q . '" limit 1'));
                                    if ($img_check['nex']) {
                                        $ba_img = $q;
                                        $nex = $img_check['nex'];
                                        $prev = $img_check['prev'];
                                        $height = $img_check['height'];
                                        $width = $img_check['width'];
                                    }

                                    // img
                                    echo ($ba_img and $lang == 'bengali') ? '<span><div class="h_line"></div><label>Bangla Academy Ovidhan :</label><div class="h_line2"></div><div class="dic_img">
		<amp-img width="' . $width . '" height="' . $height . '" layout="responsive" src="' . $url . '/word/' . strtoupper($ba_img) . '.JPG" title="' . $q . '" alt="' . $q . '"></amp-img></div></span>' : '';

                                    // bn
                                    $mean_array = get_object_vars($mean);


                                    if ($data->mean && count($data->mean) > 0) {
                                        echo '<span><label>English to ' . $ulang . ' Meaning :<label></span>';

                                        $i = 0;

                                        foreach ($data->mean as $key => $val) {
                                            $i++;
                                            if ($i > 1) {
                                                //echo '<hr>';
                                            }
                                            if ($key != 'm') {
                                                echo '<span><label>' . ucfirst($key) . ' : </label>';
                                            }
                                            $temp_array = array();
                                            $j = 0;
                                            foreach ($val as $v) {
                                                $j++;

                                                if ($mean_array[$v]) {
                                                    $temp_array[] = $mean_array[$v];
                                                }

                                                if ($j > 15) {
                                                    break;
                                                }

                                            }

                                            $temp_array = array_unique($temp_array);

                                            $j = 0;
                                            foreach ($temp_array as $ta) {
                                                $j++;

                                                if ($j > 1) {
                                                    echo ', ';
                                                }

                                                echo $ta;


                                                if ($j > 15) {
                                                    break;
                                                }

                                            }

                                        }

                                        echo '</span>';
                                    }

                                    // show top meaning

                                    echo '<span><div class="align_text  custom_font2">' . ucfirst($q) . ' : </div><div class="align_text2">' . $mrow['mean'] . '</div><label class="img_align"> Word Pronounce: <amp-img height="26" width="26" src="' . $url . '/v3/img/play-icon.png"></amp-img></label>
		                           <label class="img_align">Store Favourite: <amp-img height="26" width="26" src="' . $url . '/v3/img/favourite-icon.png"></amp-img></label></span>';

                                    $total_words = explode(' ', $q);
                                    $total_words_cnt = count($total_words);
                                    if ($total_words > 1) {
                                        $ta_array = array();
                                        foreach ($total_words as $ta) {
                                            $ta_array[] = mysql_real_escape_string($ta);
                                        }

                                        // show extra meaning for phrases

                                        $extra_sql = mysql_query('select word, mean from x_' . $lang . ' where word in ("' . implode('","', $ta_array) . '") limit ' . $total_words_cnt);
                                        while ($extra_row = mysql_fetch_assoc($extra_sql)) {
                                            echo '<span><a href="' . $base_url . '/english-to-' . $lang . '-meaning-' . strtolower($extra_row['word']) . '" title="English to ' . $ulang . ' meaning of ' . $extra_row['word'] . '"><label>' . ucfirst($extra_row['word']) . '</label></a> - ' . $extra_row['mean'] . '</span>';
                                        }

                                    }

                                    // related

                                    $related_query = mysql_query('select variant from variants where word like "' . $q . '"');
                                    $related_words = array();
                                    while ($related_row = mysql_fetch_assoc($related_query)) {
                                        if ($related_row['variant'] != $q) {
                                            $related_words[] = $related_row['variant'];
                                        }

                                    }

                                    $related_words_imp = "'" . implode("','", $related_words) . "'";

                                    $related_mean_query = mysql_query("select " . $lang . " as mean, word from lang where word in (" . $related_words_imp . ")");
                                    $related_mean_array = array();
                                    while ($related_mean_row = mysql_fetch_assoc($related_mean_query)) {
                                        echo '<span><label>' . ucfirst($related_mean_row['word']) . ' :: </label>' . $related_mean_row['mean'] . '</span>';
                                    }

                                    // related ends

                                    // next prev
                                    echo '<span><div class="custom_margin2"></div>';
                                    echo ($prev) ? '<button class="btn_pre bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $prev . '" class="btn btn-raised btn-primary" href="' . $url . '/english-to-' . $lang . '-meaning-' . $prev . '">&leftarrow; ' . ucfirst($prev) . '</a>' : '';

                                    echo ($nex) ? '<button class="btn_next bdr_radius2"><a title="English to ' . $ulang . ' meaning of ' . $nex . '" class="btn btn-raised btn-primary" href="' . $url . '/english-to-' . $lang . '-meaning-' . $nex . '">' . $nex . ' &rightarrow;</a></button>' : '';

                                    echo '<div class="custom_margin3"></div></span>';

                                    // see also in

                                    echo '<span><label>Other Refferences :</label>
								<button class="btn_default4 bdr_radius2">
									<a class="btn btn-primary" href="http://the-definition.com/dictionary/' . $q . '" target="_blank">The Definition</a>
								</button>
								<button class="btn_default4 bdr_radius2">
									<a class="btn btn-primary" href="http://dictionary.reference.com/browse/' . $q . '?s=t" target="_blank">Dictionary.com</a>
								</button>
                                <button class="btn_default4 bdr_radius2">
									<a class="btn btn-primary" href="http://www.merriam-webster.com/dictionary/' . $q . '" target="_blank">Merriam Webster</a>
								</button>
                                <button class="btn_default4 bdr_radius2">
									<a class="btn btn-primary" href="http://en.wikipedia.org/wiki/' . $q . '" target="_blank">Wikipedia</a>
								</button>';

                                    // show intermediate ads
                                    if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false):
                                        if ($inWordList) {
                                            //echo showAds($q, '300');
                                        }
                                    endif;
                                    // show intermediate ads end


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

                                        //echo '<hr><button class="btn btn-raised btn-primary">Show English Meaning</button>';

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

                                        //echo '&nbsp;&nbsp;<button class="btn btn-raised btn-primary">Show Examples</button>';

                                    }

                                    //echo "<hr>";
                                    ?>

                                    <span>
                                <amp-accordion disable-session-states>
                                  <section>
                                    <h4 class="custom-accordion-header">Show English Meaning</h4>
                                    <div class="custom-accordion-content">
                                        <?php echo $eng; ?>
                                    </div>
                                  </section>
                                  <section>
                                    <h4 class="custom-accordion-header">Show Examples</h4>
                                    <div class="custom-accordion-content">
										<div class="custom_margin3"></div>
									    <?php echo $examples; ?>
                                    </div>
                                  </section>
                                </amp-accordion>
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

                                <?php }// if meaning ends


                            } else {

                                $mquery = mysql_query("select word, `mean` from `x_" . $lang . "` where `mean`='" . $q . "' limit 10");

                                if (mysql_num_rows($mquery) != 0) {
                                    while ($row = mysql_fetch_assoc($mquery)) {
                                        echo '<hr><h2>' . $row['word'] . ' :: ' . $row['mean'] . '</h2>';
                                    }
                                } else {
                                    echo '<h2>No word meaning found for: ' . $q . '</h2>';
                                }


                            }
                            // show meaning [ends]
                            ?>

                            <?php if ($q) { ?>
                                <div class="custom_margin2"></div>
                                <div class="custom_font2">
                                    <strong>English to <?= $ulang ?> Dictionary: <?= $q ?></strong>
                                </div>
                                <p>Meaning and definitions of <?= $q ?>, translation in <?= $ulang ?> language
                                    for <?= $q ?> with similar and opposite words. Also find spoken pronunciation
                                    of <?= $q ?> in <?= $ulang ?> and in English language.</p>

                                <div class="custom_font2">
                                    <strong>Tags for the entry "<?= $q ?>"</strong>
                                </div>
                                <p>What <?= $q ?> means in <?= $ulang ?>, <?= $q ?> meaning in <?= $ulang ?>, <?= $q ?>
                                    definition, examples and pronunciation of <?= $q ?> in <?= $ulang ?> language.</p>
                            <?php } ?>
                        </div>
                    </fieldset>

                <?php }

                ?>


                <fieldset class="bdr_radius3">

                    <?php

                    if ($q) {
                        if (preg_match("/^[a-z]$/", $q[0])) {
                            echo '<legend class="custom_font2">English to ' . $ulang . ' Meaning :: ' . $q . '</legend>';
                            echo ($q != $_GET['q']) ? '<p>Showing meaning for <b>' . $q . '</b> (<u>' . $_GET['q'] . '</u>)</p>' : '';
                        } else {
                            echo '<legend class="custom_font2">' . $ulang . ' to English Meaning :: ' . $q . '</legend>';
                        }
                    } else {
                        echo '<legend class="custom_font2">English to ' . $ulang . ' Dictionary</legend>';
                    }

                    ?>

                    <div class="fieldset_body">
                            <span>
                            	<button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?= $url ?>/<?= $lang ?>-to-english-dictionary"
                                       title="<?= $ulang ?> to English Dictionary"><?= $ulang ?> to English Dictionary</a>
                                </button>
                                <button class="btn_default4 bdr_radius2 custom_bdr">
                                    <a href="<?= $url ?>/read-text" title="Read Text">Read Text</a>
                                </button>
                                <button class="btn_default4 bdr_radius2">
                                    <a href="<?= $url ?>/browse-words" title="Browse English Words">Browse Words</a>
                                </button>
                                <button class="btn_default4 bdr_radius2">
                                    <a href="<?= $url ?>/word-history" title="Browse Word History">Word History</a>
                                </button>
                                <button class="btn_default4 bdr_radius2">
                                    <a href="<?= $url ?>/favorite-words"
                                       title="Browse Favorite Words">Favorite Words</a>
                                </button>
                                <button class="btn_default4 bdr_radius2">
                                    <a href="<?= $url ?>/vocabulary-game"
                                       title="Play Vocabulary Games">Vocabulary Games</a>
                                </button>
                                <button class="btn_default4 bdr_radius2">
                                    <a href="<?= $url ?>/learn-ten-words-everyday" title="Learn Ten Words Everyday">Learn Words</a>
                                </button>
                        	</span>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Topic Wise Words</legend>

                    <div class="fieldset_body inner_details">

                        <?php

                        $rand = rand(1, 12700);

                        $topic_words = array();
                        $this_topic = '';
                        $topic_word_query = mysql_query('select word, topic, exmp from TopicWiseWords where id>' . $rand . ' limit 5');
                        $topic_all_words = array();
                        while ($row = mysql_fetch_assoc($topic_word_query)) {
                            $topic_words[$row["topic"]][] = array($row["word"], $row["exmp"]);
                            $topic_all_words[] = $row["word"];
                        }

                        $topic_mean = array();
                        $topic_words_mean_query = mysql_query('select word, mean from x_' . $lang . ' where word in ("' . implode('","', $topic_all_words) . '") limit 5');
                        while ($topic_words_mean_row = mysql_fetch_assoc($topic_words_mean_query)) {
                            $topic_mean[$topic_words_mean_row['word']] = $topic_words_mean_row['mean'];
                        }

                        foreach ($topic_words as $k => $v) {
                            $this_topic = $k;
                            echo '<div class="custom_font4">&#9679; ' . ucfirst($k) . '</div>';
                            foreach ($v as $vv) {
                                if ($topic_mean[$vv[0]] != '') {
                                    echo '<span><a title="English to ' . $ulang . ' Meaning of ' . ucfirst($vv[0]) . '" href="' . $base_url . '/english-to-' . $lang . '-meaning-' . urlencode($vv[0]) . '"><label>' . ucfirst($vv[0]) . ' (' . $topic_mean[$vv[0]] . ') :: </label>' . $vv[1] . '</a></span>';
                                }

                            }
                        }
                        //

                        ?>

                    </div>
                    <button class="btn_default5 bdr_radius2">
                        <a title="See all topic wise words" href="topic-wise-words.php?topic=<?= $this_topic ?>">See
                            all</a>
                    </button>
                </fieldset>
                <fieldset class="bdr_radius3">
                    <legend>Learn 3000+ Common Words</legend>

                    <div class="fieldset_body inner_details">

                        <?php

                        $get_word_day = json_decode(file_get_contents('word_day.txt'));

                        $this_date = date('Y-m-d');
                        $word_day_rows = $get_word_day->words;
                        $exmp = $get_word_day->exmp;
                        $word_by_day = '';
                        if ($get_word_day->date != $this_date) {
                            $word_day_rows = array();
                            $word_day_query = mysql_query('select word, exmp from text_wordlist order by rand() limit 5');
                            $exmp = array();
                            while ($word_day_row = mysql_fetch_assoc($word_day_query)) {
                                $word_day_rows[] = $word_day_row['word'];
                                $exmp[$word_day_row['word']] = $word_day_row['exmp'];

                            }
                            $word_by_day = $word_day_rows[0];
                            unset($word_day_rows[0]);
                            $get_word_day = array('words' => $word_day_rows);
                            file_put_contents('word_day.txt', json_encode(array('words' => $word_day_rows, 'exmp' => $exmp, 'word_by_day' => $word_by_day, 'date' => $this_date)));
                        } else {
                            $word_by_day = $get_word_day->word_by_day;
                            $exmp = $get_word_day->exmp;
                        }

                        $w_3000_gre_limit = 5;
                        $rand_3000 = rand(1, 3335);
                        $rand_gre = rand(1, 1445);
                        $w_3000 = array();
                        $w_gre = array();
                        $query = mysql_query('select word, exmp from `3000` where id>' . $rand_3000 . ' limit ' . $w_3000_gre_limit);
                        while ($row = mysql_fetch_assoc($query)) {
                            $w_3000[] = $row['word'];
                            $exmp[$row['word']] = $row['exmp'];
                        }
                        $query = mysql_query('select word, exmp from `gre` where id>' . $rand_gre . ' limit ' . $w_3000_gre_limit);
                        while ($row = mysql_fetch_assoc($query)) {
                            $w_gre[] = strtolower($row['word']);
                            $exmp[strtolower($row['word'])] = $row['exmp'];
                        }

                        $w_3000_gre = array_merge($w_3000, $w_gre);
                        $w_3000_gre = array_merge($w_3000_gre, $word_day_rows);

                        $w_mean = array();
                        $query = mysql_query('select mean, word from x_' . $lang . ' where word in ("' . implode('","', $w_3000_gre) . '") limit ' . ($w_3000_gre_limit * 3));
                        while ($row = mysql_fetch_assoc($query)) {
                            $w_mean[$row['word']] = $row['mean'];
                        }

                        foreach ($w_3000 as $w_3) {
                            if ($w_3 != $w_mean[$w_3] and $w_mean[$w_3]) {
                                $w_3_l = strtolower($w_3);
                                echo '<span><a title="English to ' . $ulang . ' Meaning of ' . ucfirst($w_3) . '" href="' . $base_url . '/english-to-' . $lang . '-meaning-' . urlencode($w_3) . '"><label>' . ucfirst($w_3) . ' (' . $w_mean[$w_3] . ') :: </label>' . $exmp[$w_3_l] . '</a></span>';
                            }
                        }


                        ?>

                    </div>
                    <button class="btn_default5 bdr_radius2">
                        <a title="See all 3000+ common words" href="learn-3000-plus-common-words.php">See all</a>
                    </button>
                </fieldset>
                <?php


                if (!$q and $lang == 'bengali') {
                    ?>
                    <fieldset>
                        <?php echo PageShortIntro(5, 'common_translations', 'learn-common-translations.php', '500+ Common Translations'); ?>
                    </fieldset>
                <?php } ?>


                <fieldset class="bdr_radius3">
                    <legend>Learn Common GRE Words</legend>

                    <div class="fieldset_body inner_details">
                        <?php

                        foreach ($w_gre as $w_g) {
                            if ($w_g != $w_mean[$w_g] and $w_mean[$w_g]) {
                                echo '<span><a title="English to ' . $ulang . ' Meaning of ' . ucfirst($w_g) . '" href="' . $base_url . '/english-to-' . $lang . '-meaning-' . urlencode($w_g) . '"><label>' . ucfirst($w_g) . ' (' . $w_mean[$w_g] . ') :: </label>' . $exmp[$w_g] . '</a></span>';
                            }
                        }

                        ?>

                    </div>
                    <button class="btn_default5 bdr_radius2">
                        <a title="See all GRE words" href="learn-common-gre-words.php">See all</a>
                    </button>
                </fieldset>

                <?php if ($lang == 'bengali') { ?>
                    <fieldset>
                        <legend>Learn Grammar</legend>

                        <div class="fieldset_body">
                            <div class="topic_link">
                                <?php echo getGrammar(); ?>
                            </div>
                        </div>
                    </fieldset>
                <?php } ?>
                <fieldset class="bdr_radius3">
                    <legend>Learn Words Everyday</legend>
                    <div class="fieldset_body">
                        <div class="topic_link">

                            <?php
                            $date1 = date_create("2017-03-01");
                            $date2 = date_create(date('Y-m-d'));
                            $diff = date_diff($date1, $date2);
                            $dif = (int)$diff->format("%a") + 1;

                            $days = $dif;

                            ?>
                            <?php
                            $j = 0;
                            for ($i = $days; $i--; $i > 0) {
                                $sess = ((int)($i / 50)) + 1;
                                $day = date('l jS \of F Y', strtotime('-' . $j . ' day', strtotime(date('Y-m-d'))));
                                ?>
                                <a href="<?= $url ?>/learn-ten-words-everyday/<?= $sess ?>/<?= $i % 50 ?>">
                                    <amp-img src="./v3/img/direction_arrow2.png" width="22" height="22"
                                             alt="icon"></amp-img>
                                    <span>Season #<?= $sess ?> Episode @<?= $i % 50 ?></span>
                                    <div class="align_right custom_font small_viewport_mergin">Published
                                        at: <?= $day ?></div>
                                </a>
                                <?php
                                $j++;
                                if ($j > 4) {
                                    break;
                                }
                            }


                            echo '</div></div><button class="btn_default5 bdr_radius2"><a href="' . $url . '/learn-ten-words-everyday/' . $sess . '">See All Posts</a></button>';

                            ?>

                </fieldset>
                <fieldset>
                    <legend>Most Searched Words</legend>

                    <div class="fieldset_body inner_details">
                        <?php

                        $k = 0;
                        foreach ($word_day_rows as $gwd) {
                            if ($w_mean[$gwd]) {
                                $k++;

                                echo '<span><a href="' . $url . '/english-to-' . $lang . '-meaning-' . $gwd . '"><label>' . ucfirst($gwd) . ' (' . $w_mean[$gwd] . ') :: </label>' . $exmp[strtolower($gwd)] . '</a></span>';

                                if ($k < 9) {
                                    //echo '<hr>';
                                }
                            }


                        }

                        ?>
                    </div>
                </fieldset>
                <fieldset class="bdr_radius3">
                    <legend>Word of the day</legend>

                    <div class="fieldset_body inner_details">

                        <?php


                        // word of the day coding
                        echo '<div class="custom_font4">&#9679; ' . ucfirst($word_by_day) . '</div>';

                        $query = mysql_query('select word, ' . $lang . ', id, data from word_frame where word like "' . $word_by_day . '" limit 1');
                        $row = mysql_fetch_assoc($query);

                        $id = $row['id'];
                        $data = json_decode($row['data']);
                        $mean = json_decode($row[$lang]);
                        $mean_array = get_object_vars($mean);
                        $main = $mrow['main'];

                        $related_words_imp = "'" . implode("','", $related_words) . "'";

                        $related_mean_query = mysql_query("select " . $lang . " as mean, word from lang where word in (" . $related_words_imp . ")");
                        $related_mean_array = array();
                        while ($related_mean_row = mysql_fetch_assoc($related_mean_query)) {
                            $related_mean_array[$related_mean_row['word']] = $related_mean_row['mean'];
                        }


                        foreach ($data->mean as $key => $val) {
                            $key_obj = ucfirst(($key == 'main') ? 'meaning' : $key);

                            $mean_list = array();
                            foreach ($val as $v) {
                                $mean_list[] = $mean_array[$v];
                            }

                            echo '<span><label>' . $key_obj . ' :: </label>' . implode(', ', array_unique($mean_list)) . '</span>';

                        }

                        ?>
                    </div>
                    <button class="btn_default5 bdr_radius2">
                        <a href="<?= $url ?>/english-to-<?= $lang ?>-meaning-<?= $word_by_day ?>">See Details</a>
                    </button>

                </fieldset>

            </div>
        </div>
        <div class="right_content">
            <div class="box_wrapper2">
                <div class="inner_wrapper">

                    <?php if ($lang == 'bengali') { ?>

                        <button class="btn_default2 bdr_radius2">
                            <a href="https://play.google.com/store/apps/details?id=com.bdword.e2bdictionary"
                               target="_blank">
                                <amp-img src="./v3/img/android-icon.png" width="30" height="30" alt="icon"></amp-img>
                                <span>Android App</span>
                            </a>
                        </button>

                        <button class="btn_default2 bdr_radius2">
                            <a href="https://itunes.apple.com/us/app/english-bengali-dictionary/id1213381239?ls=1&mt=8"
                               target="_blank">
                                <amp-img src="./v3/img/ios-icon.png" width="30" height="30" alt="icon"></amp-img>
                                <span>IOS App</span>
                            </a>
                        </button>

                        <button class="btn_default2 bdr_radius2">
                            <a href="https://chrome.google.com/webstore/detail/bdword-english-to-bengali/cogjmeckpkinhnidokapabgaoelhkbcl"
                               target="_blank">
                                <amp-img src="./v3/img/chrome-icon.png" width="30" height="30" alt="icon"></amp-img>
                                <span>Chrome Extension</span>
                            </a>
                        </button>


                        <?php
                    } else {

                        connect();
                        $getAppId = mysql_fetch_assoc(mysql_query('select AppId from AppIds where Lang="' . $lang . '" limit 1'));
                        $appId = $getAppId['AppId'];
                        $download_link = 'https://itunes.apple.com/us/app/english-' . $lang . '-dictionary/id' . $appId . '?ls=1&mt=8';

                        ?>

                        <button class="btn_default2 bdr_radius2">
                            <a href="https://play.google.com/store/apps/details?id=com.bdword.e2<?= $lang ?>dictionary"
                               target="_blank">
                                <amp-img src="./v3/img/android-icon.png" width="30" height="30" alt="icon"></amp-img>
                                <span>Android App</span>
                            </a>
                        </button>

                        <button class="btn_default2 bdr_radius2">
                            <a href="<?= $download_link ?>" class="btn btn-primary btn-raised" target="_blank">
                                <amp-img src="./v3/img/ios-icon.png" width="30" height="30" alt="icon"></amp-img>
                                <span>IOS App</span>
                            </a>
                        </button>

                    <?php } ?>

                </div>
            </div>
            <div class="box_wrapper2 custom_bgcolor">
                <div class="inner_wrapper">

                    <?php
                    $indians = array('hindi', 'tamil', 'telugu', 'kannada', 'gujarati', 'punjabi', 'marathi');
                    if ($lang == 'bengali') {
                        echo '<button class="btn_default3 bdr_radius2"><a href="http://www.allbanglanewspaperlist24.com" rel="nofollow" target="_blank"><amp-img src="./v3/img/newspaper-icon.png" width="30" height="30" alt="icon"></amp-img><label>All Bangla Newspapers</label></a>';
                    } elseif (in_array($lang, $indians)) {
                        echo '<button class="btn_default3 bdr_radius2"><a href="http://www.allindianewspaperlist.com/" rel="nofollow" target="_blank"><amp-img src="./v3/img/newspaper-icon.png" width="30" height="30" alt="icon"></amp-img><label>All Indian Newspapers</label></a>';
                    }
                    ?>

                </div>
            </div>
            <div class="box_wrapper2">
                <div class="inner_wrapper">
                    <fieldset class="bdr_radius3">
                        <legend class="custom_font2">Search History</legend>

                        <div class="fieldset_body">
                            Any word you search will appear here
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="box_wrapper2">
                <div class="inner_wrapper">
                    <fieldset>
                        <legend>Your Favorite Words</legend>

                        <div class="fieldset_body">
                            Currently you do not have any favorite word. To make a word favorite you have to click on
                            the heart button.
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_wrapper">
        <span class="align_left">&copy; 2018-2019 <strong>BD WORD</strong> | All Rights Reserved</span>
        <span class="align_right">
            	<a href="about-us.amp.html">About Us</a>&nbsp;|&nbsp;
                <a href="privacy.amp.html">Privacy</a>&nbsp;|&nbsp;
                <a href="disclaimer.amp.html">Disclaimer</a>&nbsp;|&nbsp;
                <a href="contact-us.amp.html">Contact</a>
        	</span>
    </div>
</div>
</body>

</html>