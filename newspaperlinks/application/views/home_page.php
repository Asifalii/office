<?php $this->load->view('main_layout'); ?>

<style>
	@media all and (max-width: 480px) {
		img {
			display: block;
			margin: 0 auto
		}
	}

	.blinking {
		animation: blinkingText 1.2s infinite
	}

	@keyframes blinkingText {
		0% {
			color: #043a54
		}
		49% {
			color: #043a54
		}
		60% {
			color: transparent
		}
		99% {
			color: transparent
		}
		100% {
			color: #043a54
		}
	}

	#content-desktop {
		display: block
	}

	#content-mobile {
		display: none
	}

	@media screen and (max-width: 768px) {
		#content-desktop {
			display: none
		}

		#content-mobile {
			display: block
		}
	}
</style>

<div class="body_content">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<?php
				foreach (range('A', 'Z') as $letter) {
					$position = ord(strtoupper($letter)) - ord('A') + 1;
					if ($position % 2 == 0) {
						$class = "row_even";
					} else {
						$class = "row_odd";
					}

					if ($position == 2) {
						if (!empty($news)) { ?>
							<div id="content-mobile">
								<br>
								<h2 class="blinking" style="padding-bottom: 10px;">Latest News</h2>
								<?php $news1 = array_slice($news, 0, 5);
								foreach ($news1 as $item) {
									?>
									<a target="_blank" style="color: black" href="<?= $item['link'] ?>"
									   title="<?= $item['title'] ?>">
										<i class="fa fa-newspaper-o"> <b><?= $item['title']; ?></b> <br>
											[Published at: <?= $item['pubDate'] ?>]</i>
									</a>
									<br>
								<?php } ?>
								<?php if (count($news) > 5) { ?>
									<a href="<?= $this->config->item('site_url').'news' ?>" target="_blank">See all news...</a>
								<?php } ?>
							</div>
						<?php }
					}
					?>
					<section data-aos="fade-up" class="<?= $class ?>">
						<h2>Countries Start with - <?= $letter ?></h2>

						<div class="row">

							<?php if (!empty($countryList)) {
								foreach ($countryList as $country) {
									if (ucfirst(substr($country, 0, 1)) == $letter) {
										$string = preg_replace('/\s+/', '_', $country);
										?>
										<div class="col-lg-4 col-md-6 col-sm-6">
											<a class="row_btn" target="_blank"
											   href="<?= $this->config->item('site_url').'newspaper/' . strtolower($string) ?>">
												<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
													 data-src="<?= $this->config->item('media_url') . 'flags/' . $country . '.webp' ?>"
													 style="height: 30px;width: 38px;"/>
												<?= ucfirst($country) ?>
											</a>
										</div>
									<?php }
								}
							} ?>

						</div>
					</section>
					<?php
				}
				?>
			</div>


			<div class="col-md-3">
				<section data-aos="fade-up" class="sidebar">

					<div id="news_section">

					</div>

					<div id="country_news">

					</div>

					<div class="social_icons">
						<h2>Share us on</h2>

						<a target="_blank" href="https://www.facebook.com">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
						<a target="_blank" href="https://www.twitter.com">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</section>
			</div>
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

	$(document).ready(function () {
		$.ajax({
			url: "https://server2.mcqstudy.com/newspaperlinks/index.php/getNews",
			success: function (data) {
				$('#news_section').html(data);
			}
		});

		$.ajax({
			url: "https://server2.mcqstudy.com/newspaperlinks/index.php/getNewsPaper",
			success: function (data) {
				$('#country_news').html(data);
			}
		});
	});
</script>
