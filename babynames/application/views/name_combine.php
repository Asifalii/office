<?php $this->load->view('main_layout'); ?>
<?php
$array = [];
if (isset($_COOKIE['xyz'])) {
	$array = json_decode($_COOKIE['xyz']);
}
?>

<style>
	.alert {
		padding: 20px;
		background-color: #f44336;
		color: white;
	}

	@media screen and (max-width: 600px) {
		table{
			width: 100%;
		}
		table td {
			word-break: break-all;
		}
	}
</style>

<section class="search">

	<?php if (!empty($message)) { ?>
		<br>
		<div class="alert" style="margin: auto;">
			<h3 style="text-align: center"><?= $message ?></h3>
		</div>
	<?php } ?>


	<div class="container">

		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="row main-pd">

					<div class="col-md-6">
						<div class="card bg-name">
							<div class="card-body">
								<form action="<?= base_url('/name_list') ?>" method="post">
									<h3 style="color:#283891">Name Combiner</h3>
									<div class="form-row">

										<div class="form-group">
											Find unique names from the mixture of any two names.
										</div>

										<div class="form-group col-md-7">
											<input type="text" class="form-control" id="name1"
												   placeholder="Name 1 (ex. father)" name="name1"
												   value="<?= (empty($input['name1']) ? '' : $input['name1']) ?>"
												   required>

											<input type="text" class="form-control lastinput" id="name2"
												   value="<?= (empty($input['name2']) ? '' : $input['name2']) ?>"
												   name="name2" placeholder="Name 2 (ex. mother)" required>
										</div>

										<div class="input-group col-md-7 mb-3">
											<select class="form-control" id="sel1" name="country" required>
												<option value="">-Select-</option>
												<?php foreach ($country_list as $country) { ?>
													<option value="<?= trim($country['name']) ?>"
															<?php
															if (!empty($input['country']) && $country['name'] == $input['country']) {
																echo 'selected';
															}
															?>>
														<?= ucfirst(trim($country['name'])) ?>
													</option>
												<?php } ?>
											</select>
										</div>


										<div class="btn-group btn-group-toggle mb-3 col-md-4" data-toggle="buttons">
											<label class="btn btn-secondary raido mr-2 <?= ((empty($input['options']) || $input['options'] == 'boy')) ? 'active' : '' ?>">
												<input type="radio" name="options" id="option1"
													   value="boy" required>
												Boys
											</label>
											<label class="btn raido btn-secondary <?= ((!empty($input['options']) && $input['options'] == 'girl')) ? 'active' : '' ?>">
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

					<div class="col-md-6">
						<div class="card" style="background-color: #D6E6F4">
							<div class="card-body">
								<form action="<?= base_url('/name_search') ?>" method="post">
									<h3 style="color:#ec008c">Name Search</h3>
									<div class="form-row">

										<div class="form-group">
											Find unique names by any words & search in any position.
										</div>
										<div class="input-group col-md-7 mb-3">
											<select class="form-control" name="position" required>
												<option value="">-Select Position-</option>
												<option value="Starting From" <?= ((!empty($input['position']) && $input['position'] == 'Starting From')) ? 'selected' : '' ?>>
													Starting From
												</option>
												<option value="Contains" <?= ((!empty($input['position']) && $input['position'] == 'Contains')) ? 'selected' : '' ?>>
													Contains
												</option>
												<option value="Ends With" <?= ((!empty($input['position']) && $input['position'] == 'Ends With')) ? 'selected' : '' ?>>
													Ends With
												</option>
											</select>
										</div>

										<div class="form-group col-md-7">
											<input type="text" class="form-control" id="name_word"
												   placeholder="Word (ex. Andrew)" name="name_word"
												   value="<?= (empty($input['name']) ? '' : $input['name']) ?>"
												   required>


										</div>

										<div class="input-group col-md-7 mb-3">
											<select class="form-control" name="country" required>
												<option value="">-Select-</option>
												<?php foreach ($country_list as $country) { ?>
													<option value="<?= trim($country['name']) ?>"
															<?php
															if (!empty($input['country']) && $country['name'] == $input['country']) {
																echo 'selected';
															}
															?>>
														<?= ucfirst(trim($country['name'])) ?>
													</option>
												<?php } ?>
											</select>
										</div>


										<div class="btn-group btn-group-toggle mb-3 col-md-4" data-toggle="buttons">
											<label class="btn btn-secondary raido mr-2 <?= ((empty($input['options']) || $input['options'] == 'boy')) ? 'active' : '' ?>">
												<input type="radio" name="options" id="gender1"
													   value="boy" required>
												Boys
											</label>
											<label class="btn raido btn-secondary <?= ((!empty($input['options']) && $input['options'] == 'girl')) ? 'active' : '' ?>">
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

				<?php if (!empty($result)) { ?>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<div class="baby-title" style="">
											<h3><?= ucfirst($input['country']) ?>
												» <?= ucfirst($input['options']) ?></h3>
											<div class="col-md-12">
												<p><?= $description ?></p>
											</div>


											<div class="row">
												<div class="col-md-12 ">
													<div class="header-list">
														<table class="table">
															<thead style="background: #00A88F;color:#fff">
															<tr>
																<th scope="col">Like</th>
																<th scope="col">Name</th>
																<th scope="col">Meaning</th>

															</tr>
															</thead>
															<tbody>
															<?php
															foreach ($result as $row) { ?>
																<tr>
																	<th scope="row">
																		<?php if (in_array($input['country'] . '/' . $input['options'] . '/' . $row['id'], $array)) { ?>
																			<a onclick="remove_name('<?= $input['country'] . '/' . $input['options'] . '/' . $row['id'] ?>')"
																			   style="float:right">
																				<img src="<?= base_url('/public/images/icon.png'); ?>"
																					 alt=""><sub><span
																							id="<?= $input['country'] . '_' . $input['options'] . '_' . $row['id'] ?>"><?= $row['like'] ?></span></sub></a>
																		<?php } else { ?>
																			<a onclick="rate_name('<?= $input['country'] . '/' . $input['options'] . '/' . $row['id'] ?>')"
																			   style="float:right"><i
																						class="far fa-heart"><sub><span
																								id="<?= $input['country'] . '_' . $input['options'] . '_' . $row['id'] ?>"><?= $row['like'] ?></span></sub></i></a>
																		<?php } ?>
																	</th>
																	<td>
																		<a href="<?= base_url('/single_name/' . $input['country'] . '/' . $input['options'] . '/' . $row['id']) ?>">
																			<?= $row['name'] ?></a>
																	</td>
																	<td><?= $row['meaning'] ?></td>
																</tr>
															<?php } ?>
															</tbody>
														</table>
													</div>

												</div>
											</div>
										</div>


									</div>

								</div>

							</div>

							<!--     Right sidebar start   -->


							<!--     Right sidebar end   -->

						</div>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>

</section>

<?php $this->load->view('footer_section'); ?>
