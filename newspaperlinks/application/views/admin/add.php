<?php
$user_id = $this->session->userdata('user_id');
if (!$user_id) {
	redirect('admin_login', 'refresh');
}
?>

<?php $this->load->view('admin/header'); ?>
<div class="col-md-10 offset-md-1">
	<br>
	<h2>Add Item</h2>
	<legend><h2><?= (!empty($message)) ? $message : '' ?></h2></legend>
	<hr>

	<fieldset style="border: solid #f8f9fa;padding: 1.5rem;">
		<form method="post" action="<?= base_url('ControlPanel/saveData') ?>"
			  enctype="multipart/form-data">
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Item Category <span
							class="text-danger">*</span></label>
				<div class="col-sm-9">
					<select class="form-control" name="cat" required="required">
						<option value="">Choose...</option>
						<option value="News Paper">News Paper</option>
						<option value="Countries Top Television">Tv Channel</option>
						<option value="Countries Top Radios">Radio Channel</option>
						<option value="Countries Top Magazines">Magazines</option>
						<option value="Countries Top Job Sites">Job Site</option>
						<option value="Countries Top Education Sites">Education Site</option>
					</select>
					<?php echo '<span class="text-danger">' . form_error('name') . '</span>'; ?>
				</div>

			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Item Title <span
							class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="text" name="title" required value="" class="form-control"
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
								<option value="<?= $country ?>"><?= $country ?></option>
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
					<input type="url" name="link" required value=""
						   class="form-control" placeholder="Including http / https">
					<?php echo '<span class="text-danger">' . form_error('link') . '</span>'; ?>
				</div>

			</div>

			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Screenshot <span
							class="text-danger">*</span></label>
				<div class="col-sm-9">
					<input type="file" class="form-control-file" onchange="readFile(this)"
						   name="image" id="image" required>
				</div>
			</div>

			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Favicon</label>
				<div class="col-sm-9">
					<input type="file" class="form-control-file" onchange="readFile(this)"
						   name="favicon" id="favicon">
				</div>
			</div>
			<div id="error_message" style="color: red"></div>
			<button type="submit" id="btnSave" class="btn btn-primary" style="float: right">Submit</button>
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
