<?php 
require('header.php'); 

header("HTTP/1.1 301 Moved Permanently"); 
header('Location: '.$base_url.'post.php');

exit();
require('connect2.php');

$url = explode('/',$_REQUEST['url']);
$post_id = mysql_real_escape_string($url[0]);
?>
	

	<div class="bs-docs-section">
	
		<div class="row">
		
			<div class="col-md-8">
				
				<div id="ad">
					<?=showAds($q, 'body-top', $conn);?>
				</div>				
			
				<div class="bs-component">

					<div class="jumbotron">

						<?php


						$get_blogs = mysql_query('select title,data from blogs where id='.$post_id.' limit 1');
						$blog_row=mysql_fetch_assoc($get_blogs)
						
						?>
						
						<h2><?=$blog_row['title']?></h2>
						
						<br>
						
						<hr>
						
						<div><?=$blog_row['data']?></div>
				

						
					</div>
					
				</div>
			

				
			</div>
			
			<div class="col-md-4">
			
				<div class="panel panel-primary ">
					<div class="panel-heading">
						<h3 class="panel-title">Learn Grammar</h3>
					</div>
					<div class="panel-body">
							
						<?php 
						echo getGrammar();
						?>
				
					</div>
				
				</div>
				
			
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
