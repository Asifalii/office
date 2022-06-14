<?php if (!empty($news)) { ?>
<div id="content-desktop">
	<h2 class="blinking" style="padding-bottom: 10px;">Latest News</h2>
	<div id="news_section">

	</div>
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
	<br>
<?php } ?>
