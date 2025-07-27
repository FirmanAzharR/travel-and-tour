<?php 
class Dashboard extends CI_Controller{
    public function index(){
        $data = array(
            'title' => 'Dashboard',
            'description' => '',
            'content' => 'dashboard/v_dashboard',
        );
        $this->load->view('dashboard/v_template', $data, false);//load template sb-admin
    }
}