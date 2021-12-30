<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->roleaccess->is_login();
		$this->load->model('modelpengguna');
	}

	public function index()
	{
		$param['data'] = $this->modelpengguna->m_all();
		$this->templates->show('pages/master/v_pengguna', $param);
	}
	public function form()
	{
		if ($this->uri->segment('3') != null) {
			$id = $this->uri->segment('3');
			$param['row'] = $this->modelpengguna->m_row($id);
			$this->templates->show('pages/master/v_pengguna_form', $param);
		} else {
			$this->templates->show('pages/master/v_pengguna_form');
		}
	}
	public function add()
	{
		try {
			$username = $this->input->post('username');
			$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			$role = $this->input->post('role');

			$post =  array(
				"username" => $username,
				"password" => $password,
				"role" => $role,
			);

			$store = $this->modelpengguna->m_store($post);

			if ($store) {
				echo 1;
			} else {
				echo 0;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}
	public function update()
	{
		try {
			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$role = $this->input->post('role');
			if ($this->input->post('password') != "") {
				$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				$post =  array(
					"username" => $username,
					"password" => $password,
					"role" => $role,
				);
			} else {
				$post =  array(
					"username" => $username,
					"role" => $role,
				);
			}
			
			$store = $this->modelpengguna->m_update($post, $id);

			if ($store) {
				echo 1;
			} else {
				echo 0;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}
	public function delete()
	{
		if ($this->modelpengguna->m_destroy($this->input->post('id'))) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
