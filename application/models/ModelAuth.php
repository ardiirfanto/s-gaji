<?php

class ModelAuth extends CI_Model
{

    function m_login($username)
    {

        return $this->db->get_where('pengguna', array('username' => $username))->row();
    }
}
