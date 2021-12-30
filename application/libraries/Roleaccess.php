<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Roleaccess
{

    protected $_ci;
    function __construct()
    {
        $this->_ci = &get_instance();
        $this->is_login = $this->_ci->session->userdata('logged_in');
        $this->userid = $this->_ci->session->userdata('i');
    }

    public function is_login()
    {
        if (empty($this->is_login)) {
            header('location:' . base_url().'auth');
        } else {
            return true;
        }
    }
}
