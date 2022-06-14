<?php
$user_id = $this->session->userdata('user_id');
if (!$user_id) {
	redirect('admin_login', 'refresh');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	$pageLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	?>
	<title><?= $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<link rel="canonical" href="<?= $pageLink ?>"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta name="apple-mobile-web-app-title" content="AllNewspaperList24">
	<meta name="application-name" content="AllNewspaperList24">
	<meta name="robots" content="INDEX,FOLLOW,NOARCHIVE"/>


	<link rel="shortcut icon" type="image/png" href="<?= base_url('/public/site/favicon.png') ?>">
	<!-- Favicon icon -->
	<link rel="stylesheet" href="<?= base_url('/public/css/font-awesome-4.7.0.min.css'); ?>"> <!--Font icon-->

	<link rel="stylesheet" href="<?= base_url('/public/css/bootstrap.min.css'); ?>"> <!-- Bootstrap4.3.1 CSS -->
	<link
			href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
			rel="stylesheet"> <!-- Google fonts CSS -->
	<link rel="stylesheet" href="<?= base_url('/public/css/aos.css') ?>"> <!-- Scroll animation CSS -->
	<link rel="stylesheet" href="<?= base_url('/public/css/theme.css') ?>"> <!-- Theme CSS -->
	<link rel="stylesheet" href="<?= base_url('/public/css/responsive.css') ?>">

	<link rel="stylesheet" href="<?= base_url('/public/css/jquery.dataTables.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('/public/css/dataTables.responsive.css'); ?>">

	<script src="<?= base_url('/public/js/jquery-3.5.1.js'); ?>"></script>
	<script src="<?= base_url('/public/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?= base_url('/public/js/dataTables.responsive.min.js'); ?>"></script>

</head>

<style>
	#header_logo {
		padding-top: 3px;
		padding-bottom: 3px;
	}

	@media only screen and (max-width: 768px) {
		#header_logo {
			padding-top: 0px;
			padding-bottom: 0px;
		}
	}
</style>

<body>

<!-- Header -->
<header class="header">
	<div class="header_bottom sticky">
		<div class="container">
			<div class="row" id="header_logo">
				<div class="col-md-4">
					<h1>
						<a href="#">
							<img class="logo_img" src="<?= base_url('/public/site/logo.png') ?>"
								 style="height: 63px;margin-left: 0px;" alt="Newsaperlinks.xyz"
								 title="Newsaperlinks.xyz">
						</a>
					</h1>
				</div>
				<div class="col-md-8">
					<!-- Navigation menu -->
					<nav class="animenu" role="navigation" aria-label="Menu">
						<button class="animenu__btn" style="padding-top: 23px;">
							<span class="animenu__btn__bar"></span>
							<span class="animenu__btn__bar"></span>
							<span class="animenu__btn__bar"></span>
						</button>

						<ul class="animenu__nav">
							<li><a href="<?= base_url('/pending_item') ?>">Pending Item</a></li>
							<li><a href="<?= base_url('/item_list') ?>">Item List</a></li>
							<li><a href="<?= base_url('/add_item') ?>">Add Item</a></li>
							<li><a href="<?= base_url('/logout') ?>">Logout</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>

