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
	<meta name="description"
		  content="<?= (!empty($meta_data)) ? $meta_data : '' ?> Newspaperlinks.xyz. Largest collection of all types of newspapers, magazines, educational sites, job sites, radio and tv channels from all over the world."/>
	<meta name="keywords"
		  content="<?= (!empty($keyword)) ? $keyword : '' ?>newspapers, magazines, educational sites, job sites, radio, tv channels."/>
	<link rel="canonical" href="<?= $pageLink ?>"/>
	<link rel="canonical" href="<?= $pageLink ?>"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta name="apple-mobile-web-app-title" content="Newspaperlinks.xyz">
	<meta name="application-name" content="Newspaperlinks.xyz">
	<meta name="robots" content="INDEX,FOLLOW,NOARCHIVE"/>


	<link rel="shortcut icon" type="image/png" href="<?= $this->config->item('media_url') . 'site/favicon.png' ?>">
	<!-- Favicon icon -->
	<link rel="stylesheet" href="<?= $this->config->item('media_url') . 'css/font-awesome-4.7.0.min.css'; ?>">
	<!--Font icon-->

	<link rel="stylesheet" href="<?= $this->config->item('media_url') . 'css/bootstrap.min.css'; ?>">
	<!-- Bootstrap4.3.1 CSS -->
	<link
			href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
			rel="stylesheet"> <!-- Google fonts CSS -->
	<link rel="stylesheet" href="<?= $this->config->item('media_url') . 'css/aos.css'; ?>">
	<!-- Scroll animation CSS -->
	<link rel="stylesheet" href="<?= $this->config->item('media_url') . 'css/theme.css'; ?>"> <!-- Theme CSS -->
	<link rel="stylesheet" href="<?= $this->config->item('media_url') . 'css/responsive.css'; ?>">

	<script async src="https://www.googletagmanager.com/gtag/js?id=G-GQ1TFG4V0G"></script>

	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}

		gtag('js', new Date());
		gtag('config', 'G-KLC4NYD7DE');
	</script>


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
						<a href="<?= $this->config->item('site_url') ?>">
							<img class="logo_img" src="<?= $this->config->item('media_url') . 'site/logo.png' ?>"
								 style="height: 63px;margin-left: 0px;" alt="Newsaperlinks.xyz"
								 title="Newsaperlinks.xyz">
						</a>
					</h1>
				</div>
				<div class="col-md-8" style="max-width: 100%;">
					<!-- Navigation menu -->
					<nav class="animenu" role="navigation" aria-label="Menu">
						<button class="animenu__btn">
							<span class="animenu__btn__bar"></span>
							<span class="animenu__btn__bar"></span>
							<span class="animenu__btn__bar"></span>
						</button>

						<ul class="animenu__nav" style="margin: 0px">
							<li>
								<a href="<?= $this->config->item('site_url') ?>" style="padding-right: 8px;">Home</a>
							</li>
							<li><a href="<?= $this->config->item('site_url').'submit_newspaper' ?>" style="padding-right: 8px;">Submit
									Newspaper</a>
							</li>
							<li><a href="<?= $this->config->item('site_url').'contact' ?>" style="padding-right: 8px;">Contact</a></li>
							<li><a href="<?= $this->config->item('site_url').'privacy' ?>" style="padding-right: 8px;">Privacy</a></li>
							<li><a href="<?= $this->config->item('site_url').'disclaimer' ?>" style="padding-right: 8px;">Disclaimer</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
