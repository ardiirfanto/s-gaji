<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->roleaccess->is_login();
	}

	public function index()
	{
		$this->templates->show('pages/v_home');
	}
}
