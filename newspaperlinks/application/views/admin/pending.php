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
	<h2>Pending Item</h2>
	<legend><h2><?= (!empty($message)) ? $message : '' ?></h2></legend>
	<hr>
	<table class="table" id="example">
		<thead style="background: #00A88F;color:#fff">
		<tr>
			<th scope="col">User Name</th>
			<th scope="col">Mobile</th>
			<th scope="col">Email</th>
			<th scope="col">Item Name</th>
			<th scope="col">Item URL</th>
			<th scope="col">Item Details</th>
			<th scope="col">Image</th>
			<th scope="col">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php if (!empty($result)) {
			$status = array_column($result, 'status');
			array_multisort($status, SORT_ASC, $result);
			foreach ($result as $row) { ?>
				<tr>
					<td><?= $row['name'] ?></td>
					<td><?= $row['phone'] ?></td>
					<td><?= $row['email'] ?></td>
					<td><?= $row['paper_name'] ?></td>
					<td><a href="<?= $row['paper_url'] ?>" target="_blank">Click</a></td>
					<td><?= $row['paper_details'] ?></td>
					<td><img src="<?= base_url('/public/images/') . $row['image'] ?>"
							 alt="<?= $row['paper_name'] ?>" width="100px" height="40px"></td>
					<td align="center">
						<?php if ($row['status'] == 0) { ?>
							<a href="<?= base_url('/approve_item/') . $row['id'] ?>"><img
										src="<?= base_url('/public/svg_icon/edit.svg') ?>"
										title="Approve" width="30px" height="30px"></a>
						<?php } else { ?>
							<span class="text-success"><b>Approved</b></span>
							<?php
						} ?>
					</td>
				</tr>
				<?php
			}
		} ?>


		</tbody>
	</table>
</div>

<script>
	$('#example').DataTable({
		"pageLength": 10,
		"ordering": false,
		"responsive": true,
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
	});
</script>

<?php $this->load->view('admin/footer'); ?>
