<?php require('header.php'); ?>

<?php
echo showAds($q, 'body-top', $conn);
?>

				<!--Specific Page Content-->
                <div class="box_wrapper">
                    <fieldset>
                        <legend><span class="custom_font2"><h1>Word History</h1></span></legend>

                        <div id="load_data" class="fieldset_body inner_details">
							Loading...
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


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/all2.js?v=5"></script>

<script>
$(document).ready(function(){
	
	$('#load_data').html(showAllStorageData('word_history'));
});
</script>

</body>
</html>
