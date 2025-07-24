<?php 
class Dashboard extends CI_Controller{
    public function index(){
        $data = array(
            'title' => 'Dashboard',
            'description' => '',
            'content' => 'v_dashboard',
        );
        $this->load->view('v_template', $data, false);//load template sb-admin
    }
}