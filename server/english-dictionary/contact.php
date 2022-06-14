<!doctype html> <!-- HTML5 doctype declaration -->
<html lang="en">
<!-- Primary language of the HTML document -->
<?php
$mediaUrl = 'https://english-dictionary.help/';
?>
<head>
    <meta charset="utf-8"> <!-- Character encoding to support different languages for web, default English -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Browser support for IE9 or IE8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Responsive meta tag properties -->
    <meta name="Description" content="">
    <!-- For SEO -->
    <title>English-Dictionary.Help » Contact Us</title> <!-- For SEO -->

    <link rel="shortcut icon" type="image/png" href="<?= $mediaUrl ?>images/favicon/favicon.png"> <!-- Favicon icon -->
    <link rel="stylesheet" href="<?= $mediaUrl ?>css/font-awesome-4.7.0.min.css"> <!--Font icon-->

    <link rel="stylesheet" href="<?= $mediaUrl ?>css/bootstrap.min.css"> <!-- Bootstrap4.3.1 CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"> <!-- Google fonts CSS -->
    <link rel="stylesheet" href="<?= $mediaUrl ?>css/aos.css"> <!-- Scroll animation CSS -->
    <link rel="stylesheet" href="<?= $mediaUrl ?>css/theme.css"> <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= $mediaUrl ?>css/responsive.css"> <!-- Responsive CSS -->
</head>
<?php $baseUrl = "http://english-dictionary.help" ?>
<body>

<header class="header">
    <div class="header_bottom sticky">
        <div class="container">
            <div class="row" style="padding-top: 5px;padding-bottom: 5px;">
                <div class="col-md-7">
                    <h1>
                        <a href="<?= $baseUrl ?>">
                            <img class="logo_img" src="<?= $mediaUrl ?>images/site.png"
                                 style="height: 63px" alt="English-Dictionary.Help"
                                 title="English-Dictionary.Help">
                        </a>
                    </h1>
                </div>
                <div class="col-md-5">
                    <!-- Navigation menu -->
                    <nav class="animenu" role="navigation" aria-label="Menu">
                        <button class="animenu__btn">
                            <span class="animenu__btn__bar"></span>
                            <span class="animenu__btn__bar"></span>
                            <span class="animenu__btn__bar"></span>
                        </button>

                        <ul class="animenu__nav">
                            <li>
                                <a href="<?= $baseUrl ?>">Home</a>
                            </li>
                            <li>
                                <a href="<?= $baseUrl ?>/privacy">Privacy</a>
                            </li>
                            <li>
                                <a href="<?= $baseUrl ?>/disclaimer">Disclaimer</a>
                            </li>
                            <li>
                                <a href="<?= $baseUrl ?>/contact">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="body_content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScC6A9gae_7M8N6fOxE5VzMCh97_tcvUfW8FqySvYyGadxusg/viewform?embedded=true"
                        width="100%" height="975" frameborder="0" marginheight="0" marginwidth="0">Loading…
                </iframe>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                © 2018-<?= date('Y') ?> English-dictionary.help | All Rights Reserved
            </div>
            <div class="col-md-6 col-sm-12">
                <ul>
                    <li>
                        <a href="<?= $baseUrl ?>/privacy">Privacy</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="<?= $baseUrl ?>/disclaimer">Disclaimer</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="<?= $baseUrl ?>/contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Back to top-->
<a id="scroll" href="#">
		<span>
			<i class="fa fa-arrow-up" aria-hidden="true"></i>
            <!-- &uarr; -->
		</span>
</a>


<!-- JS libraries -->
<script src="<?= $mediaUrl ?>js/jquery-3.4.1.min.js"></script> <!-- jQuery library -->
<script src="<?= $mediaUrl ?>js/popper.min.js"></script> <!-- For tooltips, popovers, and drop-downs suggested by Bootstrap4.3.1 -->
<script src="<?= $mediaUrl ?>js/bootstrap.min.js"></script> <!-- Bootstrap4.3.1 JS -->
<script src="<?= $mediaUrl ?>js/theme.js"></script> <!-- Theme JS -->
</body>

</html>