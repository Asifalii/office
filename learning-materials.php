<?php 
require('header.php'); 
?>
	

	<div class="bs-docs-section">
	
		<div class="row">
		
			<div class="col-md-8">
				
				<div id="ad">
					<?=showAds($q, 'body-top', $conn);?>
				</div>				
			
				<div class="bs-component">

					<div class="jumbotron">

						<h2>Latest Posts</h2><hr>
						
						<?php 
						require('getLearningMaterials.php'); 
						?>

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

</body>
</html>