<?php require('header.php'); ?>

<?php
if(isset($_POST['submit']) && !empty($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        $secret = '6LcrEQ8UAAAAAKiw9Ahj07ZqSRb4_SAw4NhkIzPi';
		$q = $_POST['q'];
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
		$_SESSION[$_SERVER['REMOTE_ADDR']] = 0;
        if($responseData->success):
			echo '<script>window.location.href="'.base_url().'/?q='.$q.'";</script>';
		endif;
	endif;
endif;
?>

<script src="https://www.google.com/recaptcha/api.js"></script>
	<div class="bs-docs-section">
	
		<div class="row">
		
			<div class="col-md-8">
				
				<div class="bs-component">

					<div class="jumbotron">
					
						<h2>We think you are a robot. Please fill the following captcha to prove us wrong.</h2><hr>
					
						<form method="post" action="captcha.php?q=<?=$_GET['q']?>" id="cap_form" name="cap_form">
							<div class="g-recaptcha" data-sitekey="6LcrEQ8UAAAAAJClk1gw1zmZ9vgcaRfqkCWCfr3w" data-callback="correctCaptcha"></div><br>
							<button class="btn btn-primary btn-raised" name="submit" type="submit" value="Submit">Submit</button>
							<input type="hidden" name="q" value="<?=$_GET['q']?>" />
							<div style="clear:both;">&nbsp;</div>
						</form>
					</div>
					
				</div>	
				
			</div>
			

		
		</div>
	
	</div>


</div>



<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?=$url?>/js/bootstrap.min.js"></script>
<script src="<?=$url?>/js/material.js"></script>
<script src="<?=$url?>/js/jquery.dropdown.js"></script>
<script src='<?=$url?>/js/responsivejs.js'></script>
<script src='<?=$url?>/js/main.js'></script>

<script>
var correctCaptcha = function(response) {
        $('#cap_form').submit();
    };
</script>

</body>
</html>

