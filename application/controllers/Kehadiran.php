<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->roleaccess->is_login();
	}

	public function index()
	{
		$this->templates->show('pages/menu/v_kehadiran');
	}
}
