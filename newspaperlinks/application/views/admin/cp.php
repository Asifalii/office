<?php
$user_id = $this->session->userdata('user_id');
if (!$user_id) {
	redirect('admin_login', 'refresh');
}
?>

<?php $this->load->view('admin/header'); ?>

<div></div>

<?php $this->load->view('admin/footer'); ?>
