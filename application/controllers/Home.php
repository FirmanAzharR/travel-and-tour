<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['content'] = 'v_home';
        $this->load->view('v_layout', $data);
    }

    public function login()
    {
        $data['content'] = 'v_login';
        $this->load->view('v_layout', $data);
    }
}