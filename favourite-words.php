<?php require('header.php'); ?>
<?php
echo $alladcodes['300'];
?>
				<!--Specific Page Content-->
                <div class="box_wrapper">
                    <fieldset>
                        <legend><span class="custom_font2"><h1>Favorite Words</h1></span></legend>

                        <div id="load_data" class="fieldset_body inner_details">
							Currently you do not have any favorite word. To make a word favorite you have to click on the heart button. 
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
            
            <?php include('right-content.php');?>


<?php require('footer.php'); ?>


<script type="text/javascript" src="<?= $contentUrl ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= $contentUrl ?>js/all2.js"></script>
<script>
function cal1favs(a, e) {
    var t = [];
    null != localStorage.getItem("favs") && (t = $.parseJSON(localStorage.getItem("favs"))), 1 == e ? t.push(a) : t.indexOf(a) >= 0 && t.splice(t.indexOf(a), 1), console.log(t.getUnique()), localStorage.setItem("favs", JSON.stringify(t.getUnique())), $(".load_favs").html(showFavs());
    var i = 1 == e ? "added to" : "removed from";
    $("#complete-dialog").modal("show"), $(".modal-title").text(a), $(".modal-body").html("'" + a + "' is <b>" + i + "</b> your favorite word list.")
	setTimeout(function(){
			window.location.reload(1);
		}, 1000);
}

$(document).ready(function(){
	var t = $.parseJSON(localStorage.getItem('favs'));
	
	if(t.length == 0){
		$('#load_data').html('Please click on the heart icon to add words in your favorite list');
	}else{
		$('#load_data').html(showAllStorageData('favs'));
	}
	
	function showAllStorageData(a) {
    var e = "";
    e = '';
    var t = $.parseJSON(localStorage.getItem(a));
	t = getUniqueValuesWithCase(t, false);
  
    if (a == 'favs') {
        return $.each(t.sort(), function (a, t) {
            e += '<span style="padding:10px 0px">', e += '<div style="float:left" class="label_font"><a href="' + '<?= $base_url ?>' + "english-to-" + '<?= $lang ?>' + "-meaning-" + t + '">' + capitalize(t) + "</a></div>", e += '<div style="float:right" class="history-remove-btn" onclick="cal1favs(\'' + t + '\', 0)"><img src="https://content2.mcqstudy.com/bw-static-files/imgs/clear.png"/></div></span>', e += ""
        }), e += "", null != t && 0 == t.length ? "<div class='custom_margin3 alert_text>You do not have any word in this list!</div>" : e
    }

}



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
	
	
});
</script>

</body>
</html>