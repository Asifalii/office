<!-- Footer -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				© 2018-<?= date('Y') ?> Newspaperlinks.xyz | All Rights Reserved
			</div>
			<div class="col-md-6 col-sm-12">
				<ul>
					<li>
						<a href="<?= $this->config->item('site_url').'privacy' ?>">Privacy</a>
					</li>
					<li>|</li>
					<li>
						<a href="<?= $this->config->item('site_url').'contact' ?>">Contact</a>
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
<script src="<?= $this->config->item('media_url') . 'js/jquery-3.4.1.min.js' ?>"></script> <!-- jQuery library -->
<script src="<?= $this->config->item('media_url') . 'js/popper.min.js' ?>"></script> <!-- For tooltips, popovers, and drop-downs suggested by Bootstrap4.3.1 -->
<script src="<?= $this->config->item('media_url') . 'js/bootstrap.min.js' ?>"></script> <!-- Bootstrap4.3.1 JS -->

<script src="<?= $this->config->item('media_url') . 'js/aos.js' ?>"></script> <!-- Scroll animation JS -->
<script>
	AOS.init({
		offset: 120, // offset (in px) from the original trigger point
		delay: 500, // values from 0 to 3000, with step 50ms
		duration: 1000, // values from 0 to 3000, with step 50ms
		easing: 'ease', // default easing for AOS animations
		once: false, // whether animation should happen only once - while scrolling down
		mirror: false, // whether elements should animate out while scrolling past them
		anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
	});
</script>

<script src="<?= $this->config->item('media_url') . 'js/theme.js' ?>"></script> <!-- Theme JS -->
</body>

</html>

