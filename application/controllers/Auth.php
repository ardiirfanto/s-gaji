<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('modelauth');
		$this->load->library('session');
	}

	public function index()
	{

		$this->load->view('pages/v_login');
	}

	public function login()
	{
		try {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->modelauth->m_login($username);

			if ($user) {
				if (password_verify($password, $user->password)) {
					$user_data = array(
						'username'  => $user->username,
						'role'     => $user->role,
						'logged_in' => TRUE
					);
					$this->session->set_userdata($user_data);
					echo 1;
				} else {
					echo 2;
				}
			} else {
				echo 0;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('./','refresh');
	}
}
