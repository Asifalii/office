<?php $this->load->view('main_layout'); ?>
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
					<div class="baby-title" style="">
						<h3><?= ucfirst($menu) . ' ' . $gender ?> Names » <?= $letter ?></h3>
						<div class="col-md-12">
							<p>Currently we have <?= count($result) ?> <?= $gender ?> Names Beginning with
								letter <?= $letter ?> in our <?= $menu ?> collection</p>
						</div>


						<div class="row">

							<?php if (strtolower($gender) == 'boy') { ?>
								<div class="col-md-12">
									<div class="boy-tit">
										<label for=""><i class="fas fa-male"></i> Boys</label>
									</div>
								</div>
								<div class="col-md-12">
									<div class="boy-list">
										<ul>
											<?php for ($char = ord('a'); $char <= ord('z'); ++$char) { ?>
												<a href="<?= $this->config->item('site_url') . strtolower($menu) . '/boy/' . chr($char) ?>">
													<?php if (!empty($letter) && ucfirst($letter) == ucfirst(chr($char))) { ?>
														<li style="background-color: #2072A3"><?= ucfirst(chr($char)) ?></li>
													<?php } else { ?>
														<li><?= ucfirst(chr($char)) ?></li>
													<?php } ?>
												</a>
											<?php } ?>
										</ul>
									</div>
								</div>
							<?php } ?>
							<?php if (strtolower($gender) == 'girl') { ?>
								<div class="col-md-12">
									<div class="girl-tit">
										<label for=""><i class="fas fa-male"></i> Girls</label>
									</div>
								</div>
								<div class="col-md-12">
									<div class="girl-list">
										<ul>
											<?php for ($char = ord('a'); $char <= ord('z'); ++$char) { ?>
												<a href="<?= $this->config->item('site_url') . strtolower($menu) . '/girl/' . chr($char) ?>">
													<?php if (!empty($letter) && ucfirst($letter) == ucfirst(chr($char))) { ?>
														<li style="background-color: #EE77BF"><?= ucfirst(chr($char)) ?></li>
													<?php } else { ?>
														<li><?= ucfirst(chr($char)) ?></li>
													<?php } ?>
												</a>
											<?php } ?>
										</ul>
									</div>
								</div>
							<?php } ?>

							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12 ">
										<div class="header-list">
											<table class="table" id="example">
												<thead style="background: #00A88F;color:#fff">
												<tr>
													<th scope="col">Like</th>
													<th scope="col">Name</th>
													<th scope="col">Meaning</th>

												</tr>
												</thead>
												<tbody>
												<?php if (!empty($result)) {
													foreach ($result as $row) { ?>
														<tr>
															<th scope="row">
																<?php if (in_array($menu . '/' . strtolower($gender) . '/' . $row['id'], $array)) { ?>
																	<a onclick="remove_name('<?= $menu . '/' . strtolower($gender) . '/' . $row['id'] ?>')"
																	   style="float:right;cursor: pointer">
																		<img src="<?= $this->config->item('media_url').'images/icon.png'; ?>"
																			 alt=""><sub><?= $row['like'] ?></sub></a>
																<?php } else { ?>
																	<a onclick="rate_name('<?= $menu . '/' . strtolower($gender) . '/' . $row['id'] ?>')"
																	   style="float:right;cursor: pointer"><i
																				class="far fa-heart"><sub><span
																						id="<?= $row['id'] ?>"><?= $row['like'] ?></span></sub></i></a>
																<?php } ?>
															</th>
															<td>
																<a href="<?= $this->config->item('site_url') . strtolower($menu) . '/' . strtolower($gender) . '/' . strtolower($row['id']) ?>">
																	<?= $row['name'] ?></a>
															</td>
															<td><?= $row['meaning'] ?></td>
														</tr>
														<?php
													}
												} ?>


												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>


				</div>

			</div>

		</div>
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
							<h3 style="background: #FFEADA">Name Combiner</h3>
						</div>
						<div class="card-body">
							<form action="<?= base_url('/name_list') ?>" method="post">
								<div class="form-row">

									<div class="form-group">
										Find unique names from the mixture of any two names.
									</div>

									<div class="form-group col-md-7">
										<input type="text" class="form-control" id="name1"
											   placeholder="Name 1 (ex. father)" name="name1"
											   value="<?= (empty($_POST['name1']) ? '' : $_POST['name1']) ?>"
											   required>

										<input type="text" class="form-control lastinput" id="name2"
											   value="<?= (empty($_POST['name2']) ? '' : $_POST['name2']) ?>"
											   name="name2" placeholder="Name 2 (ex. mother)" required>
									</div>

									<div class="input-group col-md-7 mb-3">
										<select class="form-control" id="sel1" name="country" required>
											<option value="">-Select-</option>
											<?php foreach ($country_list as $country) { ?>
												<option value="<?= trim($country['name']) ?>">
													<?= ucfirst(trim($country['name'])) ?>
												</option>
											<?php } ?>
										</select>
									</div>


									<div class="btn-group btn-group-toggle mb-3 col-md-4" data-toggle="buttons">
										<label class="btn btn-secondary raido mr-2 active">
											<input type="radio" name="options" id="option1"
												   value="boy" checked required>
											Boys
										</label>
										<label class="btn raido btn-secondary">
											<input type="radio" name="options" id="option2"
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
		</div>
	</div>
</div>

<script>
	$('#example').DataTable({
		"searching": false,
		"pageLength": 10,
		"ordering": false,
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
	});
</script>

<?php $this->load->view('footer_section'); ?>

