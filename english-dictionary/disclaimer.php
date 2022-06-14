<?php
$mediaUrl = 'https://english-dictionary.help/';
?>
<!doctype html> <!-- HTML5 doctype declaration -->
<html lang="en">
<!-- Primary language of the HTML document -->

<head>
    <meta charset="utf-8"> <!-- Character encoding to support different languages for web, default English -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Browser support for IE9 or IE8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Responsive meta tag properties -->
    <meta name="Description" content="">
    <!-- For SEO -->
    <title>English-Dictionary.Help » Disclaimer</title> <!-- For SEO -->

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
                <div class="fieldset_body inner_details desc_text" style="text-align: justify">
                    <br>
                    <h2>Disclaimer for English-dictionary.help</h2>
                    <br>
                    <p>If you require any more information or have any questions about our site's disclaimer, please
                        feel free to
                        contact us.</p>

                    <p>All the information on this website - <a href="http://english-dictionary.help/">http://english-dictionary.help/</a>
                        -
                        is published in good faith and for general
                        information purpose only. English-dictionary.help does not make any warranties about the
                        completeness,
                        reliability and accuracy of this information. Any action you take upon the information you find
                        on this
                        website (English-dictionary.help), is strictly at your own risk. English-dictionary.help will not be
                        liable
                        for any losses and/or damages in connection with the use of our website.</p>

                    <p>From our website, you can visit other websites by following hyperlinks to such external sites.
                        While we
                        strive to provide only quality links to useful and ethical websites, we have no control over the
                        content and
                        nature of these sites. These links to other websites do not imply a recommendation for all the
                        content found
                        on these sites. Site owners and content may change without notice and may occur before we have
                        the
                        opportunity to remove a link which may have gone 'bad'.</p>

                    <p>Please be also aware that when you leave our website, other sites may have different privacy
                        policies and
                        terms which are beyond our control. Please be sure to check the Privacy Policies of these sites
                        as well as
                        their "Terms of Service" before engaging in any business or uploading any information.</p>

                    <h2>Consent</h2>

                    <p>By using our website, you hereby consent to our disclaimer and agree to its terms.</p>

                    <h2>Update</h2>

                    <p>Should we update, amend or make any changes to this document, those changes will be prominently
                        posted
                        here.</p>
                </div>
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