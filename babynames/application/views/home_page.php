<?php $this->load->view('main_layout'); ?>

<section class="banner-section">

</section>


<section class="search">
	<div class="container">

		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="row main-pd">
					<div class="col-md-6">
						<div class="card" style="background-color: #D6E6F4">
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

					<div class="col-md-6">
						<div class="card bg-name">
							<div class="card-body">
								<form action="<?= $this->config->item('site_url') . 'name_list' ?>" method="post">
									<h3 style="color:#283891">Name Combiner</h3>
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

</section>

<!-- SEarch section end   -->


<!-- Baby News section start   -->

<section class="baby-news">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1" style="padding: 0">
				<h4>Baby <span>Names 24</span></h4>
			</div>
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<div class="des" style="margin-left: 12px">
						<p style="text-align: justify">Baby Names 24 is one of the best websites for naming your
							children or loved ones. If you want to get ideas about your most desired names,
							welcome to Baby Names 24. Here, you can get a numerous collection of names from almost
							all
							languages, combining names by any choices, searching word or character in any position
							of a
							name
							of any language. It's that much easy. Besides, you can mark any name as your favorites
							and
							check those out any time you want. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Baby News section start   -->


<!--   Recently Popular Names section start-->

<section class="popular-names">
	<div class="container">
		<div class="row">
			<div class="col-md-12 offset-md-1">
				<h4 style="color:#ec008c;padding: 10px 0 10px 9px;">Recently Popular Names</h4>
			</div>
		</div>


		<div class="row" style="margin:20px 0px">

			<div class="col-md-10 offset-md-1">
				<div class="row">

					<div class="col-md-6 baby-row2">
						<div class="baby-row-1-inner">
							<div class="row ">
								<div class="col-md-10 offset-md-1">
									<h5 style="color:#ec008c;text-align: center;padding: 10px 0;">Arabic Names</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<ul>
										<?php foreach ($arabic_girl[0] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'arabic/girl/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($arabic_boy[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'arabic/boy/' . $row['id'] ?>"
												   style="color:#ec008c""><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($arabic_girl[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'arabic/girl/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-md-10 offset-md-1">
								<p style="text-align: center"><a
											href="<?php echo $this->config->item('site_url') . 'language/arabic'; ?>"
											style="color:#283891">View All Names</a></p>
							</div>
						</div>
					</div>

					<div class="col-md-6 baby-row2">
						<div class="baby-row-2-inner">
							<div class="row ">
								<div class="col-md-10 offset-md-1">
									<h5 style="color:#ec008c;text-align: center;padding: 10px 0;">Indian Names</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<ul>
										<?php foreach ($indian_boy[0] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'indian/boy/' . $row['id'] ?>"
												   style="color:#ec008c"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($indian_girl[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'indian/girl/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($indian_boy[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'indian/boy/' . $row['id'] ?>"
												   style="color:#ec008c"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-md-10 offset-md-1">
								<p style="text-align: center"><a
											href="<?php echo $this->config->item('site_url') . 'language/indian'; ?>"
											style="color:#283891">View All Names</a></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="row" style="margin:20px 0px">

			<div class="col-md-10 offset-md-1">
				<div class="row">
					<div class="col-md-6 baby-row2">
						<div class="baby-row-2-inner">
							<div class="row ">
								<div class="col-md-10 offset-md-1">
									<h5 style="color:#ec008c;text-align: center;padding: 10px 0;">Christian Names</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<ul>
										<?php foreach ($christian_boy[0] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'christian/boy/' . $row['id'] ?>"
												   style="color:#ec008c"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($christian_girl[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'christian/girl/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($christian_boy[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'christian/boy/' . $row['id'] ?>"
												   style="color:#ec008c"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-md-10 offset-md-1">
								<p style="text-align: center"><a
											href="<?php echo $this->config->item('site_url') . 'language/christian'; ?>"
											style="color:#283891">View All Names</a></p>
							</div>
						</div>
					</div>

					<div class="col-md-6 baby-row2">
						<div class="baby-row-1-inner">
							<div class="row ">
								<div class="col-md-10 offset-md-1">
									<h5 style="color:#ec008c;text-align: center;padding: 10px 0;">English Names</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<ul>
										<?php foreach ($english_boy[0] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'english/boy/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($english_girl[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'english/girl/' . $row['id'] ?>"
												   style="color:#ec008c""><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($english_boy[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'english/boy/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-md-10 offset-md-1">
								<p style="text-align: center"><a
											href="<?php echo $this->config->item('site_url') . 'language/english'; ?>"
											style="color:#283891">View All Names</a></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="row" style="margin:20px 0px">

			<div class="col-md-10 offset-md-1">
				<div class="row">
					<div class="col-md-6 baby-row2">
						<div class="baby-row-1-inner">
							<div class="row ">
								<div class="col-md-10 offset-md-1">
									<h5 style="color:#ec008c;text-align: center;padding: 10px 0;">French Names</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<ul>
										<?php foreach ($french_boy[0] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'french/boy/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($french_girl[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'french/girl/' . $row['id'] ?>"
												   style="color:#ec008c""><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($french_boy[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'french/boy/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-md-10 offset-md-1">
								<p style="text-align: center"><a
											href="<?php echo $this->config->item('site_url') . 'language/french'; ?>"
											style="color:#283891">View All Names</a></p>
							</div>
						</div>
					</div>

					<div class="col-md-6 baby-row2">
						<div class="baby-row-2-inner">
							<div class="row ">
								<div class="col-md-10 offset-md-1">
									<h5 style="color:#ec008c;text-align: center;padding: 10px 0;">Latin Names</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<ul>
										<?php foreach ($latin_boy[0] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'latin/boy/' . $row['id'] ?>"
												   style="color:#ec008c"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($latin_girl[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'latin/girl/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($latin_boy[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'latin/boy/' . $row['id'] ?>"
												   style="color:#ec008c"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-md-10 offset-md-1">
								<p style="text-align: center"><a
											href="<?php echo $this->config->item('site_url') . 'language/latin'; ?>"
											style="color:#283891">View All Names</a></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="row" style="margin:20px 0px">

			<div class="col-md-10 offset-md-1">
				<div class="row">

					<div class="col-md-6 baby-row2">
						<div class="baby-row-2-inner">
							<div class="row ">
								<div class="col-md-10 offset-md-1">
									<h5 style="color:#ec008c;text-align: center;padding: 10px 0;">German Names</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<ul>
										<?php foreach ($german_boy[0] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'german/boy/' . $row['id'] ?>"
												   style="color:#ec008c"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($german_girl[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'german/girl/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($german_boy[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'german/boy/' . $row['id'] ?>"
												   style="color:#ec008c"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-md-10 offset-md-1">
								<p style="text-align: center"><a
											href="<?php echo $this->config->item('site_url') . 'language/german'; ?>"
											style="color:#283891">View All Names</a></p>
							</div>
						</div>
					</div>

					<div class="col-md-6 baby-row2">
						<div class="baby-row-1-inner">
							<div class="row ">
								<div class="col-md-10 offset-md-1">
									<h5 style="color:#ec008c;text-align: center;padding: 10px 0;">Australian Names</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<ul>
										<?php foreach ($australian_boy[0] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'australian/boy/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($australian_boy[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'australian/boy/' . $row['id'] ?>"
												   style="color:#ec008c""><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($australian_girl[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'australian/girl/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-md-10 offset-md-1">
								<p style="text-align: center"><a
											href="<?php echo $this->config->item('site_url') . 'language/australian' ?>"
											style="color:#283891">View All Names</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row" style="margin:20px 0px">

			<div class="col-md-10 offset-md-1">
				<div class="row">
					<div class="col-md-6 baby-row2">
						<div class="baby-row-1-inner">
							<div class="row ">
								<div class="col-md-10 offset-md-1">
									<h5 style="color:#ec008c;text-align: center;padding: 10px 0;">Hebrew Names</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<ul>
										<?php foreach ($hebrew_boy[0] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'hebrew/boy/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($hebrew_girl[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'hebrew/girl/' . $row['id'] ?>"
												   style="color:#ec008c""><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($hebrew_boy[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'hebrew/boy/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-md-10 offset-md-1">
								<p style="text-align: center"><a
											href="<?php echo $this->config->item('site_url') . 'language/hebrew'; ?>"
											style="color:#283891">View All Names</a></p>
							</div>
						</div>
					</div>

					<div class="col-md-6 baby-row2">
						<div class="baby-row-2-inner">
							<div class="row ">
								<div class="col-md-10 offset-md-1">
									<h5 style="color:#ec008c;text-align: center;padding: 10px 0;">Sangskrit Names</h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<ul>
										<?php foreach ($sangskrit_boy[0] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'sangskrit/boy/' . $row['id'] ?>"
												   style="color:#ec008c"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($sangskrit_girl[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'sangskrit/girl/' . $row['id'] ?>"
												   style="color:"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col-md-4">
									<ul>
										<?php foreach ($sangskrit_boy[1] as $row) { ?>
											<li>
												<a href="<?= $this->config->item('site_url') . 'sangskrit/boy/' . $row['id'] ?>"
												   style="color:#ec008c"><?= $row['name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-md-10 offset-md-1">
								<p style="text-align: center"><a
											href="<?php echo $this->config->item('site_url') . '/language/sangskrit'; ?>"
											style="color:#283891">View All Names</a></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>


	</div>
</section>

<!--   Recently Popular Names section end-->

<?php $this->load->view('footer_section'); ?>
