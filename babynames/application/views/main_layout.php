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
		  content="<?= (!empty($meta_data)) ? $meta_data : '' ?> A to Z Baby Name for boys and girls.A numerous collection of both boy and girl names for all languages with meaning"/>
	<meta name="keywords"
		  content="<?= (!empty($keyword)) ? $keyword : '' ?>baby, name, girl, boy, start from, beginning, kids, kid, child, children, with a-z, nice name, beautiful baby name"/>
	<link rel="canonical" href="<?= $pageLink ?>"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta name="apple-mobile-web-app-title" content="BabyNames24">
	<meta name="application-name" content="BabyNames24">
	<meta name="robots" content="INDEX,FOLLOW,NOARCHIVE"/>

	<!--  font-awesome  -->
	<link rel="stylesheet" href="<?= $this->config->item('media_url') . 'css/all.css'; ?>">
	<link rel="icon" href="<?= $this->config->item('media_url') . 'images/logo.png'; ?>" type="image/x-icon"/>
	<!--  Google font   -->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

	<!--   Bootstrab link -->
	<link rel="stylesheet" href="<?= $this->config->item('media_url') . 'css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?= $this->config->item('media_url') . 'css/cate.css'; ?>">
	<link rel="stylesheet" href="<?= $this->config->item('media_url') . 'css/style.css'; ?>">
	<link rel="stylesheet" href="<?= $this->config->item('media_url') . 'css/responsive.css'; ?>">
	<link rel="stylesheet" href="<?= $this->config->item('media_url') . 'css/jquery.dataTables.min.css'; ?>">


	<script src="<?= $this->config->item('media_url') . 'js/jquery-3.5.1.js'; ?>"></script>
	<script src="<?= $this->config->item('media_url') . 'js/jquery.dataTables.min.js'; ?>"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=G-FSMXRL5JGD"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}

		gtag('js', new Date());
		gtag('config', 'G-FSMXRL5JGD');
	</script>

</head>
<style>
	.dropdown-item:hover {
		color: #EC008C;
	}
</style>
<body>
<?php
$array = [];
if (isset($_COOKIE['xyz'])) {
	$array = json_decode($_COOKIE['xyz']);
}
?>
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="top-left">
					<a href="<?= $this->config->item('site_url'); ?>"><img
								src="<?= $this->config->item('media_url') . 'images/logo.png'; ?>"
								alt=""></a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="top-right">
					<div class="inner-right">
						<img src="<?= $this->config->item('media_url') . 'images/icon.png'; ?>"
							 alt=""><a href="<?= $this->config->item('site_url') . 'favourite_name' ?>">
							My Favorites <span id="fav_count">(<?= count(array_unique($array)) ?>)</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Top header section start -->

<!--     header section start    -->

<header>
	<div class="container">

		<div class="main-nav">
			<nav class="navbar navbar-expand-md">
				<a href=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
					<span class=""><i class="fas fa-bars"></i></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav m-auto">
						<li class="nav-item <?= ($menu == 'home') ? 'active' : '' ?>">
							<a class="nav-link" href="<?= $this->config->item('site_url'); ?>">Home</a>
						</li>
						<li class="nav-item <?= ($menu == 'name_combine') ? 'active' : '' ?>">
							<a class="nav-link" href="<?php echo $this->config->item('site_url') . 'name_combine'; ?>">Name
								Combiner</a>
						</li>
						<li class="nav-item <?= ($menu == 'American') ? 'active' : '' ?>">
							<a class="nav-link"
							   href="<?php echo $this->config->item('site_url') . 'language/american'; ?>">American</a>
						</li>
						<li class="nav-item <?= ($menu == 'Arabic') ? 'active' : '' ?>">
							<a class="nav-link"
							   href="<?php echo $this->config->item('site_url') . 'language/arabic'; ?>">Arabic/Muslim</a>
						</li>
						<li class="nav-item <?= ($menu == 'Australian') ? 'active' : '' ?>">
							<a class="nav-link"
							   href="<?php echo $this->config->item('site_url') . 'language/australian'; ?>">Australian</a>
						</li>
						<li class="nav-item <?= ($menu == 'Christian') ? 'active' : '' ?>">
							<a class="nav-link"
							   href="<?php echo $this->config->item('site_url') . 'language/christian'; ?>">Christian</a>
						</li>
						<li class="nav-item <?= ($menu == 'English') ? 'active' : '' ?>">
							<a class="nav-link"
							   href="<?php echo $this->config->item('site_url') . 'language/english'; ?>">English</a>
						</li>
						<li class="nav-item <?= ($menu == 'French') ? 'active' : '' ?>">
							<a class="nav-link"
							   href="<?php echo $this->config->item('site_url') . 'language/french'; ?>">French</a>
						</li>
						<li class="nav-item <?= ($menu == 'Indian') ? 'active' : '' ?>">
							<a class="nav-link"
							   href="<?php echo $this->config->item('site_url') . 'language/indian'; ?>">Indian</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
							   aria-haspopup="true" aria-expanded="false">More</a>
							<div class="dropdown-menu">
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/asamese'; ?>">Asamese</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/bengali'; ?>">Bengali</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/finnish'; ?>">Finnish</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/german'; ?>">German</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/greek'; ?>">Greek</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/gujrati'; ?>">Gujrati</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/iranian'; ?>">Iranian</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/irish'; ?>">Irish</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/kannada'; ?>">Kannada</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/latin'; ?>">Latin</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/malaylam'; ?>">Malaylam</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/marathi'; ?>">Marathi</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/oriya'; ?>">Oriya</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/sangskrit'; ?>">Sangskrit</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/punjabi'; ?>">Punjabi</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/sindhi'; ?>">Sindhi</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/swedish'; ?>">Swedish</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/tamil'; ?>">Tamil</a>
								<a class="dropdown-item"
								   href="<?php echo $this->config->item('site_url') . 'language/telegu'; ?>">Telegu</a>
							</div>
						</li>
					</ul>

				</div>
			</nav>
		</div>
	</div>

</header>


<!--    header section end     -->

<!--       banner section start-->


<!-- Top header section start -->
<!--       banner section end-->

<!-- SEarch section start   -->

