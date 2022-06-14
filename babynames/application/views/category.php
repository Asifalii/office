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
<section class="main-contend">
	<div class="container">
		<div class="row">

			<div class="row">
				<!--   Baby names section Start    -->
				<div class="col-md-8">

					<div class="row">
						<div class="col-md-12">
							<div class="baby-title" style="">
								<h3><?= ucfirst($menu) ?> Baby Names</h3>
								<div class="col-md-12">
									<p>Comprehensive collection
										of <?= $count['boy'] + $count['girl'] ?> <?= ucfirst($menu) ?> Baby Names</p>
								</div>
								<div class="col-md-12">
									<p>Currently we have <span
												style="color: #0055DB"><strong><?= $count['boy'] ?> Boys</strong></span>
										Names and <span
												style="color:#FF5599"><strong><?= $count['girl'] ?> Girls</strong></span>
										Names
										with Meanings in our <?= ucfirst($menu) ?> collection</p>
								</div>

								<div class="row">
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
														<li><?= ucfirst(chr($char)) ?></li>
													</a>
												<?php } ?>
											</ul>
										</div>
									</div>
								</div>

								<div class="row">
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
														<li><?= ucfirst(chr($char)) ?></li>
													</a>
												<?php } ?>
											</ul>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="content-inner">
						<div class="row" style="margin:15px 0px;">

							<div class="col-md-12 baby-row2">
								<div class="row">
									<div class="col-md-12">
										<div class="new-add-boy">
											<h3>Newly Added Boy Names</h3>
										</div>
									</div>
								</div>
								<div class="baby-row-2-inner">

									<div class="row">
										<div class="col-md-3">
											<ul>
												<?php foreach ($boy[0] as $row) { ?>
													<li>
														<a href="<?= $this->config->item('site_url') . strtolower($menu) . '/boy/' . strtolower($row['id']) ?>"
														   style="color:"><?= $row['name'] ?></a></li>
												<?php } ?>
											</ul>
										</div>
										<div class="col-md-3">
											<ul>
												<?php foreach ($boy[1] as $row) { ?>
													<li>
														<a href="<?= $this->config->item('site_url') . strtolower($menu) . '/boy/' . strtolower($row['id']) ?>"
														   style="color:#FF5599"><?= $row['name'] ?></a></li>
												<?php } ?>
											</ul>
										</div>
										<div class="col-md-3">
											<ul>
												<?php foreach ($boy[2] as $row) { ?>
													<li>
														<a href="<?= $this->config->item('site_url') . strtolower($menu) . '/boy/' . strtolower($row['id']) ?>"
														   style="color:"><?= $row['name'] ?></a></li>
												<?php } ?>
											</ul>
										</div>
										<div class="col-md-3">
											<ul>
												<?php foreach ($boy[3] as $row) { ?>
													<li>
														<a href="<?= $this->config->item('site_url') . strtolower($menu) . '/boy/' . strtolower($row['id']) ?>"
														   style="color:#FF5599"><?= $row['name'] ?></a></li>
												<?php } ?>
											</ul>
										</div>

									</div>

								</div>
							</div>

						</div>

					</div>
					<div class="content-inner">
						<div class="row" style="margin:15px 0px;">

							<div class="col-md-12 baby-row2">
								<div class="row">
									<div class="col-md-12">
										<div class="new-add-girl">
											<h3>Newly Added Girl Names</h3>
										</div>
									</div>
								</div>
								<div class="baby-row-2-inner">

									<div class="row">
										<div class="col-md-3">
											<ul>
												<?php foreach ($girl[0] as $row) { ?>
													<li>
														<a href="<?= $this->config->item('site_url') . strtolower($menu) . '/girl/' . strtolower($row['id']) ?>"
														   style="color:#FF5599"><?= $row['name'] ?></a></li>
												<?php } ?>
											</ul>
										</div>
										<div class="col-md-3">
											<ul>
												<?php foreach ($girl[1] as $row) { ?>
													<li>
														<a href="<?= $this->config->item('site_url') . strtolower($menu) . '/girl/' . strtolower($row['id']) ?>"
														   style="color:"><?= $row['name'] ?></a></li>
												<?php } ?>
											</ul>
										</div>
										<div class="col-md-3">
											<ul>
												<?php foreach ($girl[2] as $row) { ?>
													<li>
														<a href="<?= $this->config->item('site_url') . strtolower($menu) . '/girl/' . strtolower($row['id']) ?>"
														   style="color:#FF5599"><?= $row['name'] ?></a></li>
												<?php } ?>
											</ul>
										</div>
										<div class="col-md-3">
											<ul>
												<?php foreach ($girl[3] as $row) { ?>
													<li>
														<a href="<?= $this->config->item('site_url') . strtolower($menu) . '/girl/' . strtolower($row['id']) ?>"
														   style="color:"><?= $row['name'] ?></a></li>
												<?php } ?>
											</ul>
										</div>

									</div>

								</div>
							</div>

						</div>

					</div>

					<div class="col-md-12">
						<div class="popular-search">
							<div class="row">
								<div class="col-md-12">
									<h3>Popular Searches</h3>
									<div class="popular-search-inner">
										<span><?= ucfirst($menu) ?> Boys beginning from:</span>
										<?php if (!empty($search_data)) {
											$search_data = array_map("unserialize", array_unique(array_map("serialize", $search_data)));
											foreach ($search_data as $data) {
												if ($data['options'] == 'boy') { ?>
													<span><a href="<?= $this->config->item('site_url') . 'name_search/' . $menu . '/boy/' . substr($data['name_word'], 0, 3) ?>"><?= substr($data['name_word'], 0, 3) ?>&nbsp;</a></span>
												<?php }
											}
										}
										if (!empty($popular_boy)) {
											foreach ($popular_boy as $data) { ?>
												<span><a href="<?= $this->config->item('site_url') . 'name_search/' . $menu . '/boy/' . substr($data, 0, 3) ?>"><?= substr($data, 0, 3) ?>&nbsp;</a></span>
											<?php }
										}
										?>
										<hr>
									</div>
									<div class="popular-search-inner">
										<span><?= ucfirst($menu) ?> Girls beginning from:</span>
										<?php if (!empty($search_data)) {
											$search_data = array_map("unserialize", array_unique(array_map("serialize", $search_data)));
											foreach ($search_data as $data) {
												if ($data['options'] == 'girl') { ?>
													<span><a href="<?= $this->config->item('site_url') . 'name_search/' . $menu . '/girl/' . substr($data['name_word'], 0, 3) ?>"><?= substr($data['name_word'], 0, 3) ?>&nbsp;</a></span>
												<?php }
											}
										}
										if (!empty($popular_girl)) {
											foreach ($popular_girl as $data) { ?>
												<span><a href="<?= $this->config->item('site_url') . 'name_search/' . $menu . '/girl/' . substr($data, 0, 3) ?>"><?= substr($data, 0, 3) ?>&nbsp;</a></span>
											<?php }
										}
										?>
										<hr>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="popular-search">
							<div class="row">
								<div class="col-md-12">
									<h3>Name Combinations For <?= ucfirst($menu) ?></h3>
									<?php
									if (!empty($combine_data)) {
										$combine_data = array_map("unserialize", array_unique(array_map("serialize", $combine_data)));
										foreach ($combine_data as $row) { ?>
											<a class="search_box"
											   href="<?= $this->config->item('site_url') . 'name_combine/' . $menu . '/' . $row['options'] . '/' . $row['name1'] . '/' . $row['name2'] ?>"
											   style="background-color:<?= ($row['options'] == 'boy') ? '#2072A3' : '#C22C86' ?>"><?= $row['name1'] . ' + ' . $row['name2'] ?></a>
										<?php }
									} ?>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!--   Baby names section End    -->


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
										<h3 style="color:#ec008c">Name Search</h3>
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
									<form action="<?= $this->config->item('site_url') . 'name_list' ?>" method="post">
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


				<!--     Right sidebar end   -->

			</div>

		</div>

	</div>
</section>

<?php $this->load->view('footer_section'); ?>
