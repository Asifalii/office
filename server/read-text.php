<?php include('header.php'); ?>

    <style>
        .underline-on-hover:hover{color:#066ec9!important;text-decoration:underline}.container{position:relative;width:100%;overflow:hidden;padding-top:56.25%}.responsive-iframe{position:absolute;top:0;left:0;bottom:0;right:0;width:100%;height:100%;border:none}.btn_default{margin-right:10px}
    </style>
<?php
echo $alladcodes['300'];
//echo showAds($q, 'body-top', $conn);
?>

    <!--Specific Page Content-->
    <div class="box_wrapper">
        <fieldset>
            <legend><h1>Read Text: <span
                            class="custom_font2">English to <?= str_replace("Bengali", "Bangla", $ulang) ?></span><span
                            class="show_readtext_form" style="display:none;">&nbsp;(+)<span></h1></legend>

            <div class="fieldset_body">
                <form id="q_form" name="q_form">
                    <script type="text/javascript" src="<?= $contentUrl ?>js/jquery.min.js"></script>
                    <script type="text/javascript" src="<?= $contentUrl ?>js/all2.js?cahche=234"></script>
                    <script>

                        function main_domain() {
                            return '<?= $base_url ?>';
                        }

                        function lang() {
                            return '<?= $lang ?>';
                        }

                        function lang_uc() {
                            return lang().charAt(0).toUpperCase() + lang().slice(1)
                        }

                        function textToSpeech(e) {
                            speechSynthesis.speak(new SpeechSynthesisUtterance(e))
                        }

                        document.onclick = function (e) {
                            "q" != e.target.id && (document.getElementById("myInputautocomplete-list").innerHTML = "")
                        };


                        function show_meaning1(a) {

                            var e = a,
                                t = 1;
                            e.charAt(0).match(/[a-z]/i) ? (t = 0, e = a.replace(/\W/g, "").replace("_", "").replace(" ", "").toLowerCase(), $(".page-title").text("Read Text :: English to " + lang_uc())) : (e = a.replace("_", "").replace(",", "").replace(" ", "").replace("?", "").replace("???", "").replace("!", "").replace("'", "").replace('"', ""), $(".page-title").text("Read Text :: " + '<?= ucfirst($lang) ?>' + " to English")), $("#complete-dialog").modal("show"), 0 == t ? $(".modal-title").html('&#9679; ' + e.charAt(0).toUpperCase() + e.slice(1)) : $(".modal-title").html('&#9679; ' + e), $(".modal-body").html('<div class="loader"><img style="width:50px;" src="https://content.mcqstudy.com/bw-static-files/imgs/loader.gif"/></div>'),
                                run_ajax(e, t, ".modal-body");
                        }

                        function run_ajax(a, e, t) {
                            $.ajax({
                                type: "get",
                                url: '<?= $apiurl?>' + 'get2.php',
                                data: {
                                    token: token(),
                                    q: a,
                                    lang: lang(),
                                    type: e
                                },
                                success: function (e) {
                                    var i = "<div class='box_wrapper' style='-webkit-box-shadow: none;-mozbox-shadow: none; box-shadow: none;width: 100%;'><fieldset style='margin:0px;'><div class='fieldset_body inner_details'>";
                                    l = jQuery.parseJSON(e);

                                    if (2 == l.error) return void (window.location.href = '<?= $apiurl?>' + "captcha.php?q=" + a);
                                    if (l.main && (calHistory(a, 1), document.title = "English to " + lang_uc() + " meaning: " + a + " - " + l.main, i += '<span><div class="align_text  custom_font2">' + a + ' : </div><div class="align_text2">' + l.main + '</div><label class="img_align"> Word Pronounce:<button class="icon_button" onclick="textToSpeech(\'' + a + '\')"><img src="https://content.mcqstudy.com/bw-static-files/img/microphone1.png" loading="lazy" width="35px" height="35px"/></button></label><label class="img_align">Store Favourite: <button class="icon_button" onclick="calFavs(\'' + a + '\', 1)"><img src="https://content.mcqstudy.com/bw-static-files/img/heart-add.png" loading="lazy" width="35px" height="35px"/></button></label></span>', l.related && (i += "", $.each(l.related, function (a, e) {
                                        s++, i += "<span><div class='label_font'>" + a + " :: </div>" + e + '</span>'
                                    }))), 1 == l.error) {
                                        if (null != l.sug && "[]" != l.sug) {
                                            i += "<span><div class='alert_text'>" + l.msg + "</div><div class='custom_margin3'></div><div class='h_line'></div><div class='custom_font3'>Did you mean?</div></span>";
                                            var n = jQuery.parseJSON(l.sug);
                                            $.each(n, function (a, e) {
                                                i += '<span><a style="display:block;" href="' + main_domain() + "/english-to-" + lang() + "-meaning-" + e + '">' + e + "</a></span>"
                                            })
                                        } else {
                                            i += "<span><div class='alert_text'>" + l.msg + "</div></span>";
                                        }
                                        return void $(t).html(i)
                                    }
                                    if (1 == l.type && null != l.data && null != l.data[0]) {

                                        document.title = lang_uc() + " to English meaning: " + a, i += '<br><div class="jumbo_title">' + lang_uc() + " to English Menaing: " + a + "</div>", i += '<div class="jumbo_details bn_meaning">';
                                        var s = 0;
                                        $.each(l.data, function (a, e) {
                                            s++, i += "<p>" + s + ". " + e.mean + " = " + e.word + "</p>"
                                        }), i += "</div>"
                                    }
                                    if (null != l.mean && null != l.data.img && "bengali" == lang()) {

                                        i += '<span><div class="h_line"></div><label>Bangla Academy Ovidhan :</label>';
                                        var o = l.data.img;
                                        "into" == a && (o = "into"), i += '<div class="h_line2"></div><div class="dic_img">', i += '<img src="https://movdict.sgp1.digitaloceanspaces.com/ba2/' + l.data.img.toUpperCase() + '.JPG" title="' + o + '" alt="' + o + '" />', i += "</div></span>"
                                    }
                                    if (null != l.mean && Object.size(l.data.mean) > 0) {

                                        i += '<span><label>English to ' + lang_uc() + " Meaning</label></span>";
                                        var r = 0;
                                        $.each(l.data.mean, function (a, e) {
                                            r++, r > 1 && (i += "");
                                            var t = [];
                                            $.each(e, function (a, e) {
                                                void 0 != l.mean[e] && t.push(l.mean[e])
                                            }), i += ("main" != a ? "<span><label>" + a + ":</label> " : "") + t.getUnique().join(", ") + '</span>'
                                        })
                                    }
                                    if (null != l.mean && Object.size(l.data.eng) > 0) {

                                        i += '<span><div class="accordion_collapse"><h4 onclick="showHideAccordion()" class="custom-accordion-header">Show English Meaning<div class="icon_right">(+)</div></h4><div id="accordion" class="custom-accordion-content">';
                                        var r = 0;
                                        $.each(l.data.eng, function (e, t) {
                                            r++, r > 1 && (i += ""), i += "<strong class='custom_font2'>" + a + " [" + e + "]</strong>", i += "<p>", s = 0, $.each(t, function (a, e) {
                                                s++, i += "<span>(" + s + ") " + e + "</span>"
                                            }), i += "</p>", i += "</p>"
                                        }), i += "</div>", i += "</div></span>"
                                    }
                                    null != l.mean && Object.size(l.data.phrase) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="phrases" onclick="showHideAccordion2()" class="custom-accordion-header">Related Phrases<div class="icon_right">(+)</div></h4>', s = 0, i += '<div id="accordion2" class="custom-accordion-content">', $.each(l.data.phrase, function (a, e) {
                                        void 0 != l.mean[e] && (s++, s > 1 && (i += ""), i += "<span>(" + s + "). " + e + " = " + l.mean[e] + "</span>")
                                    }), i += "</div></div></span>"), null != l.mean && Object.size(l.data.examples) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="examples_details" onclick="showHideAccordion3()" class="custom-accordion-header">Examples<div class="icon_right">(+)</div></h4>', s = 0, i += '<div id="accordion3" class="custom-accordion-content">', $.each(l.data.examples, function (a, e) {
                                        s++, s > 1 && (i += ""), i += "<span>" + s + ". " + e + "</span>"
                                    }), i += "</div></div></span>"), null != l.mean && Object.size(l.data.syn) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="phrases" onclick="showHideAccordion4()" class="custom-accordion-header">Synonyms<div class="icon_right">(+)</div></h4>', s = 0, i += '<div id="accordion4" class="custom-accordion-content">', $.each(l.data.syn, function (a, e) {
                                        void 0 != l.mean[e] && (s++, s > 1 && (i += ""), i += "<span>(" + s + ") " + e + " = " + l.mean[e] + "</span>")
                                    }), i += "</div></div></span>"), null != l.mean && Object.size(l.data.anto) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="phrases" onclick="showHideAccordion5()" class="custom-accordion-header">Antonyms<div class="icon_right">(+)</div></h4>', s = 0, i += '<div id="accordion5" class="custom-accordion-content">', $.each(l.data.anto, function (a, e) {
                                        void 0 != l.mean[e] && (s++, s > 1 && (i += ""), i += "<span>(" + s + ") " + e + " = " + l.mean[e] + "</span>")
                                    }), i += "</div></div></span>"), null != l.mean && Object.size(l.data.variants) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="phrases" onclick="showHideAccordion6()" class="custom-accordion-header">Different forms<div class="icon_right">(+)</div></h4>', i += '<div id="accordion6" class="custom-accordion-content">', i += "<span>" + l.data.variants.join(", ") + "</span>", i += "</div></div></span>"), null != l.mean && Object.size(l.data.similar) > 0 && (i += '<span><div class="accordion_collapse"><h4 data-target="phrases" onclick="showHideAccordion7()">Similar Words<div class="icon_right">(+)</div></h4>', i += '<div id="accordion7" class="custom-accordion-content">', i += "<span>" + l.data.similar.join(", ") + "</span>", i += "</div></div></span>"),
                                        i += '</div></fieldset></div>',

                                        $(t).html(i)
                                },


                                error: function () {
                                    console.log("error")
                                }
                            })
                        }

                        function read_text_submit() {

                            var val = $('#read_text_input2').val().replace(/\r?\n|\r/g, ' ');
                            var valex = val.replace('-', ' ').replace('-', ' ').split(' ');

                            var $main = '';

                            $main += '<p>';
                            $.each(valex, function (key, v) {
                                // v = v.replace(/[^\w\s!?]/g,'');
                                $main += '<span class="underline-on-hover" onclick="show_meaning1(\'' + v + '\')" style="cursor: pointer;color: black;">' + v + ' </span>';
                            });
                            $main += '</p>';

                            // $('#load_data').html($main.replace(/\r?\n/g, '<br />'));
                            $('#load_data').html($main);
                            $('#q_form').hide();
                            $('.myclass2').hide();
                            $('.show_readtext_form').show();
                            $('.myclass').removeClass('top_margin2');
                            $('.myclass2').removeClass('top_margin2');
                        }

                        $('.show_readtext_form').click(function () {
                            $('#q_form').show();
                            $('.myclass2').show();
                            $('.show_readtext_form').hide();
                            $('#load_data').empty();
                            $('.myclass').addClass('top_margin2');
                            $('.myclass2').addClass('top_margin2');
                            $('#q_form').find("input[type=text], textarea").val("");
                        });

                    </script>
                    <style>
                        #load_data p {
                            white-space: pre;
                            line-height: 30px;
                            overflow: hidden;
                        }

                        video {
                            width: 100%;
                            height: auto;
                        }
                    </style>

                    <textarea rows="4" id="read_text_input2" style="margin-bottom: 10px;"
                              placeholder="Copy/paste your text here..."></textarea>
                    <span>
                                    <button aria-activedescendant="" class="btn_default bdr_radius">
                                        <a class="text_color" href="<?= $base_url ?>">E2<?= $ulang[0] ?></a>
                                    </button>
                                </span>
                    <span>
                                    <button class="btn_default bdr_radius">
                                        <a class="text_color"
                                           href="<?= $base_url ?><?= $lang ?>-to-english-dictionary"><?= $ulang[0] ?>2E</a>
                                    </button>
                                </span>
                    <span>
                                    <button class="btn_default bdr_radius btn_default_active">
                                        <a class="text_color"
                                           href="<?= $base_url ?>english-to-<?= $lang ?>-read-text-with-translation">Read</a>
                                    </button>
                                </span>


                    <button type="button" class="btn_default6 bdr_radius2" style="margin-top: -35px;"
                            onclick="read_text_submit();">Submit
                    </button>

                </form>

                <div class="clear_fixdiv"></div>

                <div class="top_margin2 myclass">
                    <h6>After copy/paste, click any word below and get instant meaning</h6>
                    <div class="top_margin custom_font3">
                        <div id="load_data"></div>
                    </div>
                </div>
                <?php

                $lang_keys = array(
                    'bengali',
                    'arabic',
                    'gujarati',
                    'hindi',
                    'kannada',
                    'malay',
                    'marathi',
                    'nepali',
                    'punjabi',
                    'tamil',
                    'telugu',
                    'thai',
                    'welsh'
                );

                ?>

                <div class="top_margin2 myclass2">
                    <h6>How to Use Read Text :: English to <?= str_replace("Bengali", "Bangla", $ulang) ?></h6>
                    <div class="container">
                        <iframe class="responsive-iframe" src="https://www.youtube.com/embed/v0mmtgmcMcc"></iframe>
                    </div>

                </div>

            </div>
        </fieldset>
    </div>

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

<?php include('right-content.php'); ?>

    </div>

<?php include('footer.php'); ?>