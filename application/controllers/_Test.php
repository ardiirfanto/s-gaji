<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    function index()
    {

        $username = "admin";
        $password = password_hash("admin", PASSWORD_BCRYPT);

        $user = [
            "username" => $username,
            "password" => $password,
            "role" => "AP",
        ];

        $this->db->insert("pengguna",$user);
    }
}
