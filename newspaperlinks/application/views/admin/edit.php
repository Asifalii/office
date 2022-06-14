<?php
$user_id = $this->session->userdata('user_id');
if (!$user_id) {
	redirect('admin_login', 'refresh');
}
?>

<?php $this->load->view('admin/header'); ?>

<div class="col-md-10 offset-md-1">
	<br>
	<h2>Update Item</h2>
	<legend><h2><?= (!empty($message)) ? $message : '' ?></h2></legend>
	<hr>

	<fieldset style="border: solid #f8f9fa;padding: 1.5rem;">
		<form method="post" action="<?= base_url('ControlPanel/update_item') ?>"
			  enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $result['id'] ?>">
			<input type="hidden" name="img" value="<?= $result['img'] ?>">
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Item Category <span
							class="text-danger">*</span></label>
				<div class="col-sm-9">
					<select class="form-control" name="cat" required="required">
						<option value="">Choose...</option>
						<option value="News Paper" <?= ((!empty($result['cat']) && $result['cat'] == 'News Paper'))
								? 'selected' : '' ?>>
							News Paper
						</option>
						<option value="Countries Top Television" <?= ((!empty($result['cat']) && $result['cat'] == 'Countries Top Television'))
								? 'selected' : '' ?>>Tv Channel
						</option>
						<option value="Countries Top Radios" <?= ((!empty($result['cat']) && $result['cat'] == 'Countries Top Radios'))
								? 'selected' : '' ?>>Radio Channel
						</option>
						<option value="Countries Top Magazines" <?= ((!empty($result['cat']) && $result['cat'] == 'Countries Top Magazines'))
								? 'selected' : '' ?>>Magazines
						</option>
						<option value="Countries Top Job Sites" <?= ((!empty($result['cat']) && $result['cat'] == 'Countries Top Job Sites'))
								? 'selected' : '' ?>>Job Site
						</option>
						<option value="Countries Top Education Sites" <?= ((!empty($result['cat']) && $result['cat'] == 'Countries Top Education Sites'))
								? 'selected' : '' ?>>Education Site
						</option>
					</select>
					<?php echo '<span class="text-danger">' . form_error('cat') . '</span>'; ?>
				</div>

			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Item Title <span
							class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="title" required value="<?= $result['title'] ?>" class="form-control"
						   placeholder="Type Item Title">
					<?php echo '<span class="text-danger">' . form_error('title') . '</span>'; ?>
				</div>

			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Origin <span
							class="text-danger">*</span></label>
				<div class="col-sm-9">
					<select class="form-control" name="lang" required="required">
						<option value="">Choose...</option>
						<?php if (!empty($countryList)) {
							foreach ($countryList as $country) {
								?>
								<option value="<?= $country ?>" <?= ($result['lang'] == $country) ? 'selected' : '' ?>>
									<?= $country ?></option>
							<?php }
						} ?>
					</select>
					<?php echo '<span class="text-danger">' . form_error('lang') . '</span>'; ?>
				</div>

			</div>

			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">URL <span
							class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="url" name="link" required value="<?= $result['link'] ?>"
						   class="form-control" placeholder="Including http / https">
					<?php echo '<span class="text-danger">' . form_error('link') . '</span>'; ?>
				</div>

			</div>

			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Screenshot <span
							class="text-danger">*</span></label>
				<div class="col-sm-5">
					<input type="file" class="form-control-file" onchange="readFile(this)"
						   name="image" id="image">
				</div>
				<?php if (!empty($result['img'])) { ?>
					<div class="col-sm-4">
						<a href="<?= base_url('/public/images/') . $result['img'] ?>" target="_blank"><img
									src="<?= base_url('/public/images/') . $result['img'] ?>"
									alt="<?= $result['title'] ?>" width="100px" height="100px"></a>
					</div>
				<?php } ?>
			</div>

			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Favicon</label>
				<div class="col-sm-5">
					<input type="file" class="form-control-file" onchange="readFile(this)"
						   name="favicon" id="favicon">
				</div>
				<?php if (!empty($result['favicon'])) { ?>
					<div class="col-sm-4">
						<a href="<?= base_url('/public/images/') . $result['favicon'] ?>" target="_blank">
							<img src="<?= base_url('/public/images/') . $result['favicon'] ?>"
								 alt="<?= $result['title'] ?>" width="100px" height="100px"></a>
					</div>
				<?php } ?>
			</div>
			<div id="error_message" style="color: red"></div>
			<button type="submit" id="btnSave" class="btn btn-primary" style="float: right">Update</button>
		</form>
	</fieldset>
</div>

<script>
	function readFile(input) {
		if (input.files && input.files[0] && input.files[0].name.match(/\.(jpg|jpeg|JPG|JPEG|png|PNG)$/)) {
			$('#error_message').html('');
			$('#btnSave').prop('disabled', false);
		} else {
			$('#error_message').html('File Must be jpg / jpeg Format!!');
			$('#btnSave').prop('disabled', true);
			$('#image').val('');
		}
	}
</script>

<?php $this->load->view('admin/footer'); ?>
