<?php $this->load->view('main_layout'); ?>
<script src="https://kit.fontawesome.com/fd7a3aa450.js" crossorigin="anonymous"></script>
<style>
	@media all and (max-width: 480px) {
		img {
			display: block;
			margin: 0 auto;
		}
	}

	.card {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		transition: 0.3s;
		width: 100%;
		border-radius: 5px;
	}

	.card:hover {
		box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
	}

	img {
		border-radius: 5px 5px 0 0;
	}

	.container {
		padding: 2px 16px;
	}

	.screenshot {
		height: 150px;
		width: 300px;
	}

</style>

<div class="body_content">
	<div class="container">
		<div>
			<section data-aos="fade-up" class="row_even">
				<h2 style="padding-bottom: 10px"><i class="fas fa-newspaper"></i> All <?= ucfirst($country) ?>
					Newspapers</h2>

				<div class="row">

					<?php if (!empty($paperList)) {
						foreach ($paperList as $paper) {
							if (empty($paper['cat']) || $paper['cat'] == 'News Paper') {
								?>
								<div class="col-lg-4" style="padding-bottom: 10px">
									<div class="card" style="text-align: center">
										<a target="_blank" href="<?= $paper['link'] ?>" title="<?= $paper['title'] ?>">
											<?php $defaultImg = $this->config->item('media_url') . 'site/default_img.png'; ?>
											<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
												 data-src="<?= $this->config->item('media_url') . 'images/' . $paper['img'] ?>"
												 onerror="this.onerror=null;this.src='<?= $defaultImg ?>';"
												 class="screenshot">
											<br>
											<br>
											<div class="container">
												<p><?php if (!empty($paper['favicon'])) {
														$url = $this->config->item('media_url') . 'images/' . $paper['favicon'];
														$defaultUrl = $this->config->item('media_url') . 'site/favicon.png';
													} else {
														$defaultUrl = $this->config->item('media_url') . 'site/favicon.png';
													} ?>
													<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
														 data-src="<?= $url ?>"
														 onerror="this.onerror=null;this.src='<?= $defaultUrl ?>';"
														 style="border-radius: 50%; width: 30px; height: 30px">
													<?= $paper['title'] ?></p>
											</div>
										</a>
									</div>
								</div>
							<?php }
						}
					}
					?>

				</div>
			</section>

			<section data-aos="fade-up" class="row_even">
				<h2 style="padding-bottom: 10px"><i class="fas fa-tv"></i> All <?= ucfirst($country) ?> Television</h2>

				<div class="row">

					<?php if (!empty($paperList)) {
						foreach ($paperList as $paper) {
							if ($paper['cat'] == 'Countries Top Television') {
								?>
								<div class="col-lg-4" style="padding-bottom: 10px">
									<div class="card" style="text-align: center">
										<a target="_blank" href="<?= $paper['link'] ?>" title="<?= $paper['title'] ?>">
											<?php $defaultImg = $this->config->item('media_url') . 'site/default_img.png'; ?>
											<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
												 data-src="<?= $this->config->item('media_url') . 'images/' . $paper['img'] ?>"
												 onerror="this.onerror=null;this.src='<?= $defaultImg ?>';"
												 class="screenshot">
											<br>
											<br>
											<div class="container">
												<p><?php if (!empty($paper['favicon'])) {
														$url = $this->config->item('media_url') . 'images/' . $paper['favicon'];
														$defaultUrl = $this->config->item('media_url') . 'site/favicon.png';
													} else {
														$defaultUrl = $url = $this->config->item('media_url') . 'site/favicon.png';
													} ?>
													<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
														 data-src="<?= $url ?>"
														 onerror="this.onerror=null;this.src='<?= $defaultUrl ?>';"
														 style="border-radius: 50%; width: 30px; height: 30px">
													<?= $paper['title'] ?></p>
											</div>
										</a>
									</div>
								</div>
							<?php }
						}
					}
					?>

				</div>
			</section>

			<section data-aos="fade-up" class="row_even">
				<h2 style="padding-bottom: 10px"><i class="fas fa-compact-disc"></i> All <?= ucfirst($country) ?> Radio
				</h2>

				<div class="row">

					<?php if (!empty($paperList)) {
						foreach ($paperList as $paper) {
							if ($paper['cat'] == 'Countries Top Radios') {
								?>
								<div class="col-lg-4" style="padding-bottom: 10px">
									<div class="card" style="text-align: center">
										<a target="_blank" href="<?= $paper['link'] ?>" title="<?= $paper['title'] ?>">
											<?php $defaultImg = $this->config->item('media_url') . 'site/default_img.png'; ?>
											<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
												 data-src="<?= $this->config->item('media_url') . 'images/' . $paper['img'] ?>"
												 onerror="this.onerror=null;this.src='<?= $defaultImg ?>';"
												 class="screenshot">
											<br>
											<br>
											<div class="container">
												<p><?php if (!empty($paper['favicon'])) {
														$url = $this->config->item('media_url') . 'images/' . $paper['favicon'];
														$defaultUrl = $this->config->item('media_url') . 'site/favicon.png';
													} else {
														$defaultUrl = $this->config->item('media_url') . 'site/favicon.png';
													} ?>
													<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
														 data-src="<?= $url ?>"
														 onerror="this.onerror=null;this.src='<?= $defaultUrl ?>';"
														 style="border-radius: 50%; width: 30px; height: 30px">
													<?= $paper['title'] ?></p>
											</div>
										</a>
									</div>
								</div>
							<?php }
						}
					}
					?>

				</div>
			</section>

			<section data-aos="fade-up" class="row_even">
				<h2 style="padding-bottom: 10px"><i class="fab fa-microblog"></i> All <?= ucfirst($country) ?> Magazines
				</h2>

				<div class="row">

					<?php if (!empty($paperList)) {
						foreach ($paperList as $paper) {
							if ($paper['cat'] == 'Countries Top Magazines') {
								?>
								<div class="col-lg-4" style="padding-bottom: 10px">
									<div class="card" style="text-align: center">
										<a target="_blank" href="<?= $paper['link'] ?>" title="<?= $paper['title'] ?>">
											<?php $defaultImg = $this->config->item('media_url') . 'site/default_img.png'; ?>
											<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
												 data-src="<?= $this->config->item('media_url') . 'images/' . $paper['img'] ?>"
												 onerror="this.onerror=null;this.src='<?= $defaultImg ?>';"
												 class="screenshot">
											<br>
											<br>
											<div class="container">
												<p><?php if (!empty($paper['favicon'])) {
														$url = $this->config->item('media_url') . 'images/' . $paper['favicon'];
														$defaultUrl = $this->config->item('media_url') . 'site/favicon.png';
													} else {
														$defaultUrl = $this->config->item('media_url') . 'site/favicon.png';
													} ?>
													<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
														 data-src="<?= $url ?>"
														 onerror="this.onerror=null;this.src='<?= $defaultUrl ?>';"
														 style="border-radius: 50%; width: 30px; height: 30px">
													<?= $paper['title'] ?></p>
											</div>
										</a>
									</div>
								</div>
							<?php }
						}
					}
					?>

				</div>
			</section>

			<section data-aos="fade-up" class="row_even">
				<h2 style="padding-bottom: 10px"><i class="fas fa-book"></i> All <?= ucfirst($country) ?> Education
					Sites</h2>

				<div class="row">

					<?php if (!empty($paperList)) {
						foreach ($paperList as $paper) {
							if ($paper['cat'] == 'Countries Top Education Sites') {
								?>
								<div class="col-lg-4" style="padding-bottom: 10px">
									<div class="card" style="text-align: center">
										<a target="_blank" href="<?= $paper['link'] ?>" title="<?= $paper['title'] ?>">
											<?php $defaultImg = $this->config->item('media_url') . 'site/default_img.png'; ?>
											<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
												 data-src="<?= $this->config->item('media_url') . 'images/' . $paper['img'] ?>"
												 onerror="this.onerror=null;this.src='<?= $defaultImg ?>';"
												 class="screenshot">
											<br>
											<br>
											<div class="container">
												<p><?php if (!empty($paper['favicon'])) {
														$url = $this->config->item('media_url') . 'images/' . $paper['favicon'];
														$defaultUrl = $this->config->item('media_url') . 'site/favicon.png';
													} else {
														$defaultUrl = $this->config->item('media_url') . 'site/favicon.png';
													} ?>
													<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
														 data-src="<?= $url ?>"
														 onerror="this.onerror=null;this.src='<?= $defaultUrl ?>';"
														 style="border-radius: 50%; width: 30px; height: 30px">
													<?= $paper['title'] ?></p>
											</div>
										</a>
									</div>
								</div>
							<?php }
						}
					}
					?>

				</div>
			</section>

			<section data-aos="fade-up" class="row_even">
				<h2 style="padding-bottom: 10px"><i class="fas fa-briefcase"></i>All <?= ucfirst($country) ?> Job Sites
				</h2>

				<div class="row">

					<?php if (!empty($paperList)) {
						foreach ($paperList as $paper) {
							if ($paper['cat'] == 'Countries Top Job Sites') {
								?>
								<div class="col-lg-4" style="padding-bottom: 10px">
									<div class="card" style="text-align: center">
										<a target="_blank" href="<?= $paper['link'] ?>" title="<?= $paper['title'] ?>">
											<?php $defaultImg = $this->config->item('media_url') . 'site/default_img.png'; ?>
											<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
												 data-src="<?= $this->config->item('media_url') . 'images/' . $paper['img'] ?>"
												 onerror="this.onerror=null;this.src='<?= $defaultImg ?>';"
												 class="screenshot">
											<br>
											<br>
											<div class="container">
												<p><?php if (!empty($paper['favicon'])) {
														$url = $this->config->item('media_url') . 'images/' . $paper['favicon'];
														$defaultUrl = $this->config->item('media_url') . 'site/favicon.png';
													} else {
														$defaultUrl = $this->config->item('media_url') . 'site/favicon.png';
													} ?>
													<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
														 data-src="<?= $url ?>"
														 onerror="this.onerror=null;this.src='<?= $defaultUrl ?>';"
														 style="border-radius: 50%; width: 30px; height: 30px">
													<?= $paper['title'] ?></p>
											</div>
										</a>
									</div>
								</div>
							<?php }
						}
					}
					?>

				</div>
			</section>

		</div>
	</div>
</div>


<?php $this->load->view('footer_section'); ?>

<script>
	function init() {
		var imgDefer = document.getElementsByTagName('img');
		for (var i = 0; i < imgDefer.length; i++) {
			if (imgDefer[i].getAttribute('data-src')) {
				imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
			}
		}
	}

	window.onload = init;
</script>

