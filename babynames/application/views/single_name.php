<?php $this->load->view('main_layout'); ?>
<style>
	.search_box {
		border: 1px solid #bfbfff;
		text-decoration: none;
		color: white;
		font-weight: 700;
		display: inline-block;
		line-height: 2em;
		margin: 5px;
		padding-left: 10px;
		padding-right: 10px;
		border-radius: 20px;
		text-align: center;
	}
</style>

<?php
$array = [];
if (isset($_COOKIE['xyz'])) {
	$array = json_decode($_COOKIE['xyz']);
}


?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<div class="baby-title-detail" style="">
						<h3>Baby Name » <?= ucfirst($gender) ?> » <?= ucfirst(str_replace('%20', ' ', $name)) ?></h3>
						<div class="col-md-12">
							<label for="">Name: <span><?= ucfirst(str_replace('%20', ' ', $name)) ?></span></label>

							<?php if (in_array($countryName . '/' . $gender . '/' . $result['id'], $array)) { ?>
								<a onclick="remove_name('<?= $countryName . '/' . $gender . '/' . $result['id'] ?>')"
								   style="float:right;cursor: pointer">
									<img src="<?= $this->config->item('site_url').'images/icon.png'; ?>"
										 alt=""><sub><span
												id="<?= $countryName . '_' . $gender . '_' . $result['id'] ?>"><?= $result['like'] ?></span></sub></a>
							<?php } else { ?>
								<a onclick="rate_name('<?= $countryName . '/' . $gender . '/' . $result['id'] ?>')"
								   style="float:right;cursor: pointer"><i
											class="far fa-heart"><sub><span
													id="<?= $countryName . '_' . $gender . '_' . $result['id'] ?>"><?= $result['like'] ?></span></sub></i></a>
							<?php } ?>

							<hr>
						</div>
						<div class="col-md-12">
							<label for="">Gender: <span><?= ucfirst($gender) ?></span></label>

						</div>
						<div class="edite">
							<div class="row">
								<div class="col-md-10">
									<h4>Meaning of <?= ucfirst(str_replace('%20', ' ', $name)) ?></h4>
								</div>
								<!--								<div class="col-md-2">-->
								<!--									<a href=""><i class="far fa-edit"></i></a>-->
								<!--								</div>-->
							</div>
						</div>
						<div class="col-md-12">
							<div class="bottom-edite">
								<p><?= (!empty($result['meaning'])) ? ucfirst($result['meaning']) : '' ?></p>
							</div>
						</div>

						<div class="edite">
							<div class="row">
								<div class="col-md-12">
									<h4>Origin / Tag / Usage</h4>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="origin">
									<?php
									if (!empty($country_tag)) {
										foreach ($country_tag as $tag) { ?>
											<a class="search_box"
											   href=""
											   title="<?= ucfirst($tag) . ' contains ' . ucfirst($name) ?>"
											   style="background-color:<?= ($gender == 'boy') ? '#2072A3' : '#C22C86' ?>"><?= ucfirst($tag) ?></a>
										<?php }
									} ?>
								</div>
							</div>
						</div>

						<div class="edite">
							<div class="row">
								<div class="col-md-12">
									<h4>Most Liked Names in <?= $countryName ?></h4>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="origin">
									<?php
									if (!empty($popular_boy)) {
										foreach ($popular_boy as $row) { ?>
											<a class="search_box"
											   href="<?= $this->config->item('site_url') . strtolower($countryName) . '/boy/' . $row['id'] ?>"
											   style="background-color:#2072A3"><?= ucfirst($row['name']) ?></a>
										<?php }
									} ?>


									<?php
									if (!empty($popular_girl)) {
										foreach ($popular_girl as $row) { ?>
											<a class="search_box"
											   href="<?= $this->config->item('site_url') . strtolower($countryName) . '/girl/' . $row['id'] ?>"
											   style="background-color:#C22C86"><?= ucfirst($row['name']) ?></a>
										<?php }
									} ?>
								</div>
							</div>
						</div>


						<div class="comments">
							<div class="col-md-12">
								<h4>Comments</h4>
							</div>
						</div>

						<div class="post-comment col-md-10 offset-md-1">
							<div class="media">
								<div class="media-body">
									<form>
										<div class="fb-comments"
											 data-href="<?= $this->config->item('site_url') . strtolower($countryName) . '/' . $gender . '/' .  strtolower($result['name'])?>" data-numposts="10"
											 data-width=""></div>
									</form>
								</div>
							</div>
						</div>

					</div>

				</div>

			</div>

		</div>

		<!--     Right sidebar start   -->

		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-title">
							<h3>Search</h3>
						</div>
						<div class="card-body">
							<form action="<?= base_url('/name_search') ?>" method="post">
								<div class="form-row">

									<div class="form-group">
										Find unique names by any words & search in any position.
									</div>

									<div class="input-group col-md-7 mb-3">
										<select class="form-control" name="position" required>
											<option value="">-Select Position-</option>
											<option value="Starting From">Starting From</option>
											<option value="Contains">Contains</option>
											<option value="Ends With">Ends With</option>
										</select>
									</div>

									<div class="form-group col-md-7">
										<input type="text" class="form-control" id="name_word"
											   placeholder="Word (ex. Andrew)" name="name_word"
											   value="<?= (empty($_POST['name_word']) ? '' : $_POST['name_word']) ?>"
											   required>


									</div>

									<div class="input-group col-md-7 mb-3">
										<select class="form-control" name="country" required>
											<option value="">-Select-</option>
											<?php foreach ($country_list as $country) { ?>
												<option value="<?= trim($country['name']) ?>"
														<?php
														if (!empty($_POST['country']) && $country['name'] == $_POST['country']) {
															echo 'selected';
														}
														?>>
													<?= ucfirst(trim($country['name'])) ?>
												</option>
											<?php } ?>
										</select>
									</div>


									<div class="btn-group btn-group-toggle mb-3 col-md-4" data-toggle="buttons">
										<label class="btn btn-secondary raido mr-2 active">
											<input type="radio" name="options" id="gender1"
												   value="boy" checked required>
											Boys
										</label>
										<label class="btn raido btn-secondary">
											<input type="radio" name="options" id="gender2"
												   value="girl">
											Girls
										</label>

									</div>

								</div>
								<div class="col-md-12 go-pd">
									<button type="submit" class="btn btn-primary name-go  float-right">&nbspGo
										&nbsp
									</button>
								</div>

							</form>
						</div>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-title">
							<h4 style="background: #FFEADA">Names Similar to <?= ucfirst($name) ?></h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<ul>
										<?php
										if (!empty($suggestion[0])) {
											foreach ($suggestion[0] as $row) { ?>
												<li>
													<a href="<?= $this->config->item('site_url') . strtolower($countryName)
															. '/' . $gender . '/' . $row['id'] ?>">
														<?= $row['name'] ?></a></li>
											<?php }
										} ?>
									</ul>
								</div>
								<div class="col-md-6">
									<ul>
										<?php
										if (!empty($suggestion[1])) {
											foreach ($suggestion[1] as $row) { ?>
												<li>
													<a href="<?= $this->config->item('site_url') . strtolower($countryName)
															. '/' . $gender . '/' . $row['id'] ?>">
														<?= $row['name'] ?></a></li>
											<?php }
										} ?>
									</ul>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

		</div>


		<!--     Right sidebar end   -->

	</div>
</div>


<?php $this->load->view('footer_section'); ?>
