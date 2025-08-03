<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_car');
    }

    public function index()
    {
        $data['content'] = 'landing-page/v_home';
        $data['cars'] = $this->M_car->get_all_cars();
        $this->load->view('landing-page/v_layout', $data);
    }

    public function login()
    {
        $data['content'] = 'auth/v_login';
        $this->load->view('landing-page/v_layout', $data);
    }
}