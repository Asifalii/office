<?php $this->load->view('main_layout'); ?>

<style>
	@media all and (max-width: 480px) {
		img {
			display: block;
			margin: 0 auto;
		}
	}
</style>
<div class="body_content">
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<section data-aos="fade-up" class="row_even">
					<h2 class="blinking" style="padding-bottom: 10px;">Latest News</h2>
					<div class="row" id="news_list">

					</div>
				</section>

			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</div>


<?php $this->load->view('footer_section'); ?>

<script>
	$(document).ready(function () {
		$.ajax({
			url: "https://server2.mcqstudy.com/newspaperlinks/index.php/getNewsList",
			success: function (data) {
				$('#news_list').html(data);
			}
		});
	});
</script>

