<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->roleaccess->is_login();
	}

	public function slip()
	{
		$this->templates->show('pages/laporan/v_lap_slip');
	}
	public function kehadiran()
	{
		$this->templates->show('pages/laporan/v_lap_kehadiran');
	}
	public function lemburan()
	{
		$this->templates->show('pages/laporan/v_lap_lemburan');
	}
	public function penggajian()
	{
		$this->templates->show('pages/laporan/v_lap_penggajian');
	}
}
