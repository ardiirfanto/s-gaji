<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->roleaccess->is_login();
		$this->load->model('modelkaryawan');
		$this->load->model('modelunit');
		$this->load->model('modelpengguna');
		$this->load->model('modelpotongan');
	}

	public function index()
	{
		$param['data'] = $this->modelkaryawan->m_all();
		$this->templates->show('pages/master/v_karyawan', $param);
	}
	public function form()
	{
		if ($this->uri->segment('3') != null) {
			$id = $this->uri->segment('3');
			$param['row'] = $this->modelkaryawan->m_row($id);
		}

		$param['unit'] = $this->modelunit->m_all();
		$this->templates->show('pages/master/v_karyawan_form', $param);
	}
	public function add()
	{
		try {
			$username = $this->input->post('username');
			$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			$role = $this->input->post('role');
			$post_user =  array(
				"username" => $username,
				"password" => $password,
				"role" => $role,
			);

			$store_user = $this->modelpengguna->m_store($post_user);

			if ($store_user) {
				$get_user = $this->modelpengguna->m_row_user($username);

				$post = array(
					"user_id" => $get_user->id,
					"unit_id" => $this->input->post('unit'),
					"nama_karyawan" => $this->input->post('nama'),
					"jekel" => $this->input->post('jekel'),
					"alamat" => $this->input->post('alamat'),
					"nohp" => $this->input->post('nohp'),
					"gaji" => $this->input->post('gaji'),
					"lembur" => $this->input->post('lembur'),
				);

				$store = $this->modelkaryawan->m_store($post);

				if ($store) {
					echo 1;
				} else {
					echo 0;
				}
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
			$post = array(
				"unit_id" => $this->input->post('unit'),
				"nama_karyawan" => $this->input->post('nama'),
				"jekel" => $this->input->post('jekel'),
				"alamat" => $this->input->post('alamat'),
				"nohp" => $this->input->post('nohp'),
				"gaji" => $this->input->post('gaji'),
				"lembur" => $this->input->post('lembur'),
			);

			$store = $this->modelkaryawan->m_update($post, $id);

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
		$get = $this->modelkaryawan->m_row($this->input->post('id'));

		$delete = $this->modelpengguna->m_destroy($get->user_id);

		if ($delete) {
			echo 1;
		} else {
			echo 0;
		}
	}
	public function potongan()
	{
		$param['karyawan'] = $this->modelkaryawan->m_row($this->uri->segment('3'));
		$param['potongan'] = $this->modelpotongan->m_all();
		$this->templates->show('pages/master/v_karyawan_potongan', $param);
	}
	public function potongan_view()
	{
		$id = $this->uri->segment('3');
		$data = $this->modelkaryawan->m_potongan_all($id);
		echo json_encode($data);
	}
	public function potongan_add()
	{
		try {

			$post = array(
				"karyawan_id" => $this->input->post('user'),
				"potongan_id" => $this->input->post('potongan'),
				"nominal" => $this->input->post('nominal')
			);

			$store = $this->modelkaryawan->m_potongan_store($post);

			if ($store) {
				echo 1;
			} else {
				echo 0;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}
	public function potongan_update()
	{
		try {
			$id = $this->input->post('id');
			$post = array(
				"nominal" => $this->input->post('nominal')
			);

			$store = $this->modelkaryawan->m_potongan_update($post, $id);

			if ($store) {
				echo 1;
			} else {
				echo 0;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}
	public function potongan_delete()
	{
		$delete = $this->modelkaryawan->m_potongan_destroy($this->input->post('id'));

		if ($delete) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
