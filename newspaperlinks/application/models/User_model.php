<?php


class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login_user()
	{
		$user_login = array(
			'user_email' => $this->input->post('user_email'),
			'user_password' => md5($this->input->post('user_password'))
		);

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_email', $user_login['user_email']);
		$this->db->where('user_password', $user_login['user_password']);
		return $this->db->get()->row_array();
	}
}
