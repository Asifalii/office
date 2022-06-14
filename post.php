<?php 
require('header.php'); 
require_once('connect5.php');

if(!empty($argv[2])){
	$_GET['post_id'] = $argv[2];
}

if(isset($_GET['post_id']) && $_GET['post_id'] != null){
	$post_id = sanitize($_GET['post_id'],$conn);

	$get_blogs = mysqli_query($conn,'select title,data from blogs where id='.$post_id.' limit 1');

	$blog_row  = mysqli_fetch_assoc($get_blogs);
}
						
					
?>
<?php
echo $alladcodes['300'];
?>
<!--Specific Page Content-->
                <div class="box_wrapper">
                    <fieldset>
                        <legend>
                            <h1><?=$blog_row['title']?></h1>
                        </legend>

                        <div class="fieldset_body custom_dbstyle">
                            <?=($blog_row['data'] != null) ?  $blog_row['data'] : '<span>Click links on right side for Articles here.</span>';?>
                        </div>	
                    </fieldset>
                </div>

            </div>
            
			
			
            <?php include('right-content2.php');?>

        </div>
		
		
		<?php if(!$_GET['post_id']) { ?>
			<style type='text/css'>
				.right_content{width:100% !important;}
				.left_content{display:none!important;}
			</style>
		<?php }?>
		
		<?php if($post_id == 27 && $_GET['cat'] == 2 && $_GET['title'] == 'right-form-of-verbs')?>
			<style type='text/css'>
				.custom_dbstyle span{float:none !important;}
			</style>
		<?php ?>

<?php include('footer.php');?>