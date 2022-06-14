<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="shortcut icon" type="image/png" href="<?= base_url('/public/images/favicon/favicon.png'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen"
		  title="no title">
</head>

<style>
	@media only screen and (max-width: 600px) {
		.container {
			margin: 0;
			position: absolute;
			top: 50%;
			-ms-transform: translateY(-50%);
			transform: translateY(-50%);
			width: 100%;
		}
	}
</style>
<body>

<div class="container">
	<div class="row">
		<br>
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">Your credentials</h3>
				</div>

				<div class="panel-body">
					<form role="form" method="post" action="<?php echo base_url('ControlPanel/login_user'); ?>">
						<fieldset>
							<div class="form-group">
								<input class="form-control" required placeholder="Enter E-mail" name="user_email" type="email"
									   autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" required placeholder="Enter Password" name="user_password"
									   type="password" value="">
							</div>

							<?php
							$success_msg = $this->session->flashdata('success_msg');
							$error_msg = $this->session->flashdata('error_msg');

							if ($success_msg) {
								?>
								<div class="alert alert-success">
									<?php echo $success_msg; ?>
								</div>
								<?php
							}
							if ($error_msg) {
								?>
								<div class="alert alert-danger">
									<?php echo $error_msg; ?>
								</div>
								<?php
							}
							?>

							<input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="Login">

						</fieldset>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>


</body>
</html>
