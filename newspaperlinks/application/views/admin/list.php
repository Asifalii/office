<?php
$user_id = $this->session->userdata('user_id');
if (!$user_id) {
	redirect('admin_login', 'refresh');
}
?>

<?php $this->load->view('admin/header'); ?>
<style>
@media only screen and (max-width: 600px) {
  #example {
    width:10% !important;
  }
}
</style>

<div class="col-md-10 offset-md-1">
	<br>
	<h2>Item List</h2>
	<hr>
	<table class="table" id="example">
		<thead style="background: #00A88F;color:#fff;">
		<tr>
			<th scope="col">Category</th>
			<th scope="col">Title</th>
			<th scope="col">URL</th>
			<th scope="col">Origin</th>
			<th scope="col">Image</th>
			<th scope="col">Action</th>
		</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

<script>
	$(document).ready(function () {
		$.noConflict();
		$('#example').DataTable({
			"responsive": true,
			"autoWidth": true,
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			'ajax': {
				'url': '/ControlPanel/get_items'
			},
			'columns': [
				{data: 'cat'},
				{data: 'title'},
				{data: 'link'},
				{data: 'lang'},
				{data: 'img'},
				{data: 'action'},
			]
		});
	});
</script>

<?php $this->load->view('admin/footer'); ?>
