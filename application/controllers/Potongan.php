<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Potongan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->roleaccess->is_login();
		$this->load->model('modelpotongan');

	}

	public function index()
	{
		$param['data'] = $this->modelpotongan->m_all();
		$this->templates->show('pages/master/v_potongan',$param);
	}
	public function add()
	{
		try {
			$potongan = $this->input->post('potongan');
			$post =  array(
				"potongan" => $potongan
			);

			$store = $this->modelpotongan->m_store($post);

			if ($store) {
				echo 1;
			} else {
				echo 0;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}
	public function edit()
	{
		$id = $this->uri->segment('3');
		$param['data'] = $this->modelpotongan->m_all();
		$param['row'] = $this->modelpotongan->m_row($id);
		$this->templates->show('pages/master/v_potongan',$param);
	}
	public function update()
	{
		try {
			$id = $this->input->post('id');
			$potongan = $this->input->post('potongan');
			$post =  array(
				"potongan" => $potongan
			);

			$store = $this->modelpotongan->m_update($post,$id);

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
		if ($this->modelpotongan->m_destroy($this->input->post('id'))) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
