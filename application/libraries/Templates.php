<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Templates {
	
	protected $_ci;
	function __construct(){
		$this->_ci = &get_instance();
	}

	function show($template, $data = null) {
        $data['content'] = $this->_ci->load->view($template, $data, true);
        $data['header'] = $this->_ci->load->view('templates/header', $data,true);
        $data['sidebar'] = $this->_ci->load->view('templates/sidebar', $data,true);
        $data['footer'] = $this->_ci->load->view('templates/footer', $data,true);
        $this->_ci->load->view('templates/template', $data);
	}
}

?>