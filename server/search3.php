<?php require('header.php'); ?>
	 
	<div class="bs-docs-section">
	
		<div class="row">
		
			<div class="col-md-8">
				
				<div class="bs-component">

					<div class="jumbotron">

						<form id="q_form" name="q_form">
							
							<div class="form-group label-floating serach-box <?=($q)?'is-focused':''?>" style="margin-top:10px;">
							<div class="input-group">
								<input type="search" class="form-control" id="q" name="q" value="<?=(isset($_GET['q']))?$q:''?>" autocomplete="off" required>
								<span class="input-group-btn">
									<button type="submit" class="btn btn-fab btn-fab-mini serach_icon">
									  <i class="material-icons">search</i>
									</button>
								</span>
								
							</div>
							<label class="control-label"><?=(isset($_GET['q']))?'Showing meaning for \'<span class="the_word">'.$q.'</span>\'':'Type word/phrase and press Enter'?></label>
							</div>
							
						<ul class="suggested_list">

						</ul>
							

						</form>
						<button class="btn btn-raised sound-button" onclick="playSound('hello')"><i class="material-icons">play_circle_outline</i></button>

						
						<p id="prev_data">
						
								<a class="btn btn-primary btn-raised" href="<?=$url?>/read-text">Read Text</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/browse-words">Browse Words</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/word-history">Word History</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/favorite-words">Favorite Words</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/vocabulary-game">Vocabulary Games</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/learn-ten-words-everyday">Learn Ten Words Everyday</a>
								<a class="btn btn-primary btn-raised" href="<?=$url?>/learning-materials">Learning Materials</a>

								
								<hr>
								<?=showAds($q, '300');?>
								<hr>
								
							<h2>Latest Posts</h2><hr>
						
							<?php require('getLearningMaterials.php'); ?>
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


</body>
</html>
