<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load helper & library yang diperlukan
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    public function index()
    {
        $data = [
            'title'       => 'Dashboard',
            'description' => 'Halaman utama dashboard',
            'content'     => 'dashboard/v_dashboard', // View yang akan dimuat
        ];

        // Load template utama
        $this->load->view('dashboard/v_template', $data);
    }
}
