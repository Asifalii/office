<?php if (!empty($paperList)) { ?>
	<h2><?= $countryName ?> newspapers</h2>

	<?php
	foreach ($paperList as $paper) {
		?>
		<br>
		<div class="col-lg-3">
			<a target="_blank" href="<?= $paper['link'] ?>" title="<?= $paper['title'] ?>">
				<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="

					 data-src="<?= $this->config->item('media_url') . 'images/' . $paper['img'] ?>"
					 alt="<?= $paper['title'] ?>" width="175px" height="40px"/>
			</a>
		</div>
	<?php }
}
?>
