<?php require('header.php'); ?>
<?php
echo $alladcodes['300'];
?>
<!--Specific Page Content-->
<div class="box_wrapper">
    <fieldset>
        <legend><span class="custom_font2"><h1>Search History</h1></span></legend>

        <div id="load_data1" class="fieldset_body inner_details">
            You have no word in search history!
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


<?php require('footer.php'); ?>


<script type="text/javascript" src="<?= $contentUrl ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= $contentUrl ?>js/all2.js?v=5"></script>
<script>
    $(document).ready(function () {
        var t = $.parseJSON(localStorage.getItem('search_history'));

        var t = t.filter(function (el) {
            return el != null;
        });


        if (t.length == 0) {
            $('#load_data1').html('You have no word in search history!');
        } else {
            t = getUniqueValuesWithCase(t, false);
            console.log(t);
            var a = 'search_history';
            var e = "";
            e = '';

            for (i = 0; i < t.length; i++) {
                if (t[i] != 0 && t[i] != null)
                    e += '<span style="padding:10px 0px"><div style="float:left" class="label_font"><a href="' + '<?= $base_url ?>' + "english-to-" + '<?= $lang ?>' + "-meaning-" + t[i].toLowerCase() + '">' + capitalize(t[i]) + "</a></div>", e += '<div style="float:right;cursor:pointer;" class="history-remove-btn" onclick="calSearchHistory(\'' + t[i] + '\', 0)"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/clear.png"/></div></span>';
            }

            $('#load_data1').html(e);
        }


    });

    function capitalize(s) {
        return s && s[0].toUpperCase() + s.slice(1);
    }

    function getUniqueValuesWithCase(arr, caseSensitive) {
        let temp = [];
        return [...new Set(caseSensitive ? arr : arr.filter(x => {
            let _x = typeof x === 'string' ? x.toLowerCase() : x;
            if (temp.indexOf(_x) === -1) {
                temp.push(_x)
                return x;
            }
        }))];
    }

    function calSearchHistory(a, e) {
        var t = [];
        null != localStorage.getItem("search_history") && (t = $.parseJSON(localStorage.getItem("search_history"))), 1 == e ? t.push(a) : t.indexOf(a) >= 0 && t.splice(t.indexOf(a), 1), console.log(t.getUnique()), localStorage.setItem("search_history", JSON.stringify(t.getUnique())), $(".load_favs").html(showSearch());
        var i = 1 == e ? "added to" : "removed from";
        $("#complete-dialog").modal("show"), $(".modal-title").text(a), $(".modal-body").html("'" + a + "' is <b>" + i + "</b> your word search history.");
		setTimeout(function(){
			window.location.reload(1);
		}, 1000);
	}

    function showSearch() {
        var a = "",
            e = $.parseJSON(localStorage.getItem("search_history"));
        return a = '<div class="list-group">', null != localStorage.getItem("search_history") && $.each(e.reverse(), function (e, t) {
            return a += '<div class="list-group-item"><div class="history-row">', a += '<h4 class="list-group-item-heading pull-left"><a href="' + main_domain() + "/english-to-" + lang() + "-meaning-" + t + '">' + t + "</a></h4>", a += '<div class="list-group-item-text pull-right history-remove-btn" onclick="calSearchHistory(\'' + t + '\', 0)"><img src="' + main_domain() + '/imgs/clear.png"/></div>', a += '<div class="clear">&nbsp;</div>', a += "</div></div>", e < limit()
        }), null != localStorage.getItem("search_history") && e.length > limit() && (a += '<a href="' + main_domain() + '/search_history" class="btn btn-primary btn-raised">See More</a>'), a += "</div>", null == localStorage.getItem("search_history") ? "<p>You have not searched any words yet!</p>" : a
    }
</script>

</body>
</html>