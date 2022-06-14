<?php
// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
error_reporting(0);
$msg = 0;

if($_REQUEST["bdword_msg"]){

$name = addslashes($_REQUEST["name"]);
$email = addslashes($_REQUEST["email"]);
$phone = addslashes($_REQUEST["phone"]);
$message = addslashes($_REQUEST["message"]);

$headers = "From:" . $email;

// @mysql_query("insert into contact (name, email, phone, message) values ('$name','$email','$phone','$message')");

$body = "Name: ".$name."\n ### Email: ".$email."\n ### Phone: ".$phone."\n ### Message: ".$message;

mail("saiful.neo@gmail.com","Message from bdword",$body, $headers);

$msg = 1;

}

require('header.php'); ?>

	<div class="bs-docs-section">
	
		<div class="row">
		
			<div class="col-md-8">
			
			
				<div class="bs-component">

					<div class="">

						<h2>Contact Us</h2><hr>

					
						<?php if($msg == 1){ ?>
						<div class="alert alert-success">Your Message has been sent successfully!</div>
						<?php } ?>

						<form method="POST" id="contact_form" action="<?=$base_url?>contact-us">
							
							<div class="form-group label-floating is-empty serach-box " style="margin-top:10px;">
								<input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name.">
								<label class="control-label">Write your Name</label>
							</div>
							
							<div class="form-group label-floating is-empty serach-box " style="margin-top:10px;">
								<input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your name.">
								<label class="control-label">Write your Email</label>
							</div>
							
							<div class="form-group label-floating is-empty serach-box " style="margin-top:10px;">
								<input type="phone" class="form-control" id="phone" name="phone" required data-validation-required-message="Please enter your email.">
								<label class="control-label">Phone number</label>
							</div>

                            <br>

							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">

								<textarea rows="5" class="form-control" placeholder="Message" name="message" id="message" required data-validation-required-message="Please enter a message."></textarea>
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<br>
							<div id="success"></div>
							<div class="row">
								<div class="form-group col-xs-12">
									<button type="submit" name="bdword_msg" value="bdword_msg" class="btn btn-raised btn-primary">Send</button>
								</div>
							</div>
						</form>				
					
						<div style="clear:both;">&nbsp;</div>

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