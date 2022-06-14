<?php require('header.php'); ?>
<?php
echo showAds($q, 'body-top', $conn);
?>
	<div class="bs-docs-section">
	
		<div class="row">
		
			<div class="col-md-8">
				
				<div class="bs-component">

					<div class="jumbotron">

						<h2>Word History</h2><hr>
						
						<p id="load_data">
							Loading...
						</p>

						<div style="clear:both;">&nbsp;</div>

					</div>
					
				</div>	
				
			</div>
			
			<div class="col-md-4">
			
				<?php require('sidebar.php'); ?>
			
			</div>
		
		</div>
	
	</div>


</div>

<div id="complete-dialog" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title"></h2><hr>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<?php require('footer.php'); ?>


<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?=$url?>/js/bootstrap.min.js"></script>
<script src="<?=$url?>/js/material.js"></script>
<script src="<?=$url?>/js/jquery.dropdown.js"></script>
<script src='<?=$url?>/js/responsivejs.js'></script>
<script src='<?=$url?>/js/main.js'></script>

<script>
$(document).ready(function(){
	
	$('#load_data').html(showAllStorageData('word_history'));
});
</script>

</body>
</html>

