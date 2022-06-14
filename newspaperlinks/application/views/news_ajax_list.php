<?php if (!empty($news)) { ?>
	<?php foreach ($news as $item) { ?>
		<div class="col-lg-4">
			<a target="_blank" style="color: black" href="<?= $item['link'] ?>"
			   title="<?= $item['title'] ?>">
				<i class="fa fa-newspaper-o"> <b><?= $item['title']; ?></b> <br>
					[Published at: <?= $item['pubDate'] ?>]</i>
			</a>
		</div>
	<?php } ?>
<?php } ?>


