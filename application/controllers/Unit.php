<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->roleaccess->is_login();
		$this->load->model('modelunit');
	}

	public function index()
	{
		$param['data'] = $this->modelunit->m_all();
		$this->templates->show('pages/master/v_unit',$param);
	}
	public function add()
	{
		try {
			$unit = $this->input->post('unit');
			$post =  array(
				"nama_unit" => $unit
			);

			$store = $this->modelunit->m_store($post);

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
		$param['data'] = $this->modelunit->m_all();
		$param['row'] = $this->modelunit->m_row($id);
		$this->templates->show('pages/master/v_unit',$param);
	}
	public function update()
	{
		try {
			$id = $this->input->post('id');
			$unit = $this->input->post('unit');
			$post =  array(
				"nama_unit" => $unit
			);

			$store = $this->modelunit->m_update($post,$id);

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
		if ($this->modelunit->m_destroy($this->input->post('id'))) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
