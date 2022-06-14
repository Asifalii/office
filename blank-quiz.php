<?php
include('header.php');
if (!empty($argv[2])) {
    $_REQUEST['page'] = $argv[2];
}

$episode = $_REQUEST['page'];
?>

<style>

    input[type=radio] {
        display: none;
    }

    input[type=radio] + label::before {
        content: '';
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


</style>

<?php
echo $alladcodes['300'];
?>

<!--Specific Page Content-->
<div class="box_wrapper">
    <fieldset>

        <?php if ($episode) { ?>

            <legend><h1>Fill in the Blanks With Correct Word: (Page <?= $episode ?>)</h1></legend>

            <div id="load_data">


            </div>

            <?php
            $pageName = 'english-to-'.$lang.'-dictionary-fill-in-the-blanks-page-';

            $links = '<div class="pagination">';

            for ($i = 1; $i <= 38; $i++) {
                $links .= ($i != $episode)
                    ? "<a href='$base_url$pageName$i' style='margin-right: 5px;margin-top: 5px;'>$i</a>"
                    : "<a class='active' style='margin-right: 5px;margin-top: 5px;'>$episode</a>";
            }

            $links .= '</div>';


            echo $links;

            ?>

        <?php } ?>


    </fieldset>
</div>

</div>

<?php include('right-content.php'); ?>

</div>

<script type="text/javascript" src="<?= $contentUrl ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= $contentUrl ?>js/all2.js"></script>

<script>

    $(document).ready(function () {
        <?php if($episode){ ?>

        var a = 1;
        var e = <?=$episode?>;

        voc_show_data1(a, e);

        function voc_show_data1(a, e) {
            $("#load_data").html('<div class="loader"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/loader.gif"/></div>'), $i = 0, $.ajax({
                type: "get",
                url: "https://server2.mcqstudy.com/getQuiz3.php",
                data: {
                    token: token(),
                    lang: lang(),
                    sid: a,
                    id: e
                },
                success: function (t) {
                    var i = "",
                        l = jQuery.parseJSON(t);
                    i += "<div class='fieldset_body inner_details'>";
                    $.each(l, function (a, e) {
                        $i++, i += '<span><div class="label_font qtitle' + $i + '" id="ques' + $i + '">(' + $i + ") " + e.main + "</div>", i += '<div class="custom_margin3"><div class="form-group">';
                        var t = 0;
                        $.each(e.quiz, function (a, l) {
                            t++, i += '<input type="radio" name="ans" id="ans' + $i + "-" + t + '" value="option' + $i + '" onchange="ansQuiz(' + $i + ",'" + e.main + "', '" + e.ans + "', '" + l + '\')"> <label for="ans' + $i + "-" + t + '" style="color:#000;">' + l + "</label><br>"
                        }), i += "</div></div>", i += '<div class="custom_margin3 alert_text qans' + $i + '"></div></span>'
                    }), i += '</div>', $("#load_data").html(i)
                },
                error: function () {
                    console.log("error")
                }
            })
        }
        <?php } ?>

    });


    function ansQuiz(a, ques, e, t) {
        var ques = "(" + a + ") " + ques;
        var n = ques.indexOf("_");
        var newQues = ques.replaceAll('_', '');
        var res = newQues.substring(0, n) + '<div style="text-decoration: underline;display: inline;">' + t + '</div>&nbsp;<div style="float: right;">' + newQues.substring(n) + '</div>';

        if (e == t) {
            $("#ques" + a).html(res).css({color: "green"});
        } else {
            $("#ques" + a).html(res).css({color: "red"});
        }

        e != t ? ($(".qtitle" + a).addClass("alert alert-danger"), $(".qans" + a).html("Your answer is incorrect!"), $(".qans" + a).html('<div style="color:#f44336;">Your answer is incorrect!</div>')) : ($(".qtitle" + a).removeClass("alert alert-danger").addClass("alert alert-success"), $(".qans" + a).html('<div style="color:green;">Your answer is correct!</div>'))
    }

</script>


<?php include('footer.php'); ?>


