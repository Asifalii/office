<?php include('header.php'); ?>

    <style>
        .underline-on-hover:hover {
            color: #066EC9 !important;
            text-decoration: underline;
        }

        .container {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
        }

        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
		
		.btn_default {
			margin-right: 10px;
		}
    </style>
<?php
echo showAds($q, 'body-top', $conn);
?>

    <!--Specific Page Content-->
    <div class="box_wrapper">
        <fieldset>
            <legend><h1>Read Text: <span
                            class="custom_font2">English to <?= str_replace("Bengali", "Bangla", $ulang) ?></span><span
                            class="show_readtext_form" style="display:none;">&nbsp;(+)<span></h1></legend>

            <div class="fieldset_body">
                <form id="q_form" name="q_form">
                    <script type="text/javascript" src="js/jquery.min.js"></script>
                    <script type="text/javascript" src="js/all2.js?cahche=234"></script>
                    <script>
                        function read_text_submit() {
                            var val = $('#read_text_input2').val().replace(/\r?\n|\r/g, ' ');
                            var valex = val.replace('-', ' ').replace('-', ' ').split(' ');

                            var $main = '';

                            $main += '<p>';
                            $.each(valex, function (key, v) {
                                // v = v.replace(/[^\w\s!?]/g,'');
                                $main += '<span class="underline-on-hover" onclick="show_meaning(\'' + v + '\')" style="cursor: pointer;color: black;">' + v + ' </span>';
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

                    <textarea rows="4" id="read_text_input2" style="margin-bottom: 10px;" placeholder="Copy/paste your text here..."></textarea>
                    <span>
                                    <button aria-activedescendant="" class="btn_default bdr_radius">
                                        <a class="text_color" href="<?= $base_url ?>index.php">E2<?= $ulang[0] ?></a>
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
                                        <a class="text_color" href="<?= $base_url ?>read-text.php">Read</a>
                                    </button>
                                </span>

				
                    <button type="button" class="btn_default6 bdr_radius2" style="margin-top: -35px;" onclick="read_text_submit();">Submit</button>
			
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