<?php $this->load->view('main_layout'); ?>
<style>
	@media screen and (max-width: 600px) {
		table {
			width: 100%;
		}

		table td {
			word-break: break-all;
		}
	}

</style>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<div class="baby-title-detail" style="">
						<h3>Baby Name » Favourite</h3>
						<div style="margin: auto;">
							<p style="text-align: center"><b>You have <?= count($result) ?> names in Favourite
									collection</b></p>
						</div>

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
													<tr id="<?= $row['country'] . '/' . $row['gender'] . '/' . $row['id'] ?>">
														<th scope="row">
															<a onclick="remove_name('<?= $row['country'] . '/' . $row['gender'] . '/' . $row['id'] ?>')"
															   style="float:right;cursor: pointer;">
																<img src="<?= $this->config->item('media_url') . 'images/icon.png'; ?>"
																	 alt=""><sub><span
																			id="<?= $row['country'] . '_' . $row['gender'] . '_' . $row['id'] ?>"><?= $row['like'] ?></span></sub></a>
														</th>
														<td>
															<a href="<?= $this->config->item('site_url') . strtolower($row['country']) . '/' . strtolower($row['gender']) . '/' . strtolower($row['id']) ?>">
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

		<!--     Right sidebar start   -->

		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-title">
							<h3>Search</h3>
						</div>
						<div class="card-body">
							<form action="<?= $this->config->item('site_url') . 'name_search' ?>" method="post">
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

		</div>


		<!--     Right sidebar end   -->

	</div>
</div>


<?php $this->load->view('footer_section'); ?>
