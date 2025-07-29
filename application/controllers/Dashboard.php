<?php 
class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('auth_libraries');
        $this->auth_libraries->is_logged_in(); // Check if user is logged in
        $this->auth_libraries->is_admin(); // Check if user is admin
    }
    public function index(){
        $data = array(
            'title' => 'Dashboard',
            'description' => '',
            'content' => 'dashboard/v_dashboard',
        );
        $this->load->view('dashboard/v_template', $data, false);//load template sb-admin
    }
}