<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    public function index(){
        $data = array(
            'title' => 'Sign In',
            'description' => '',
            'content' => 'v_login',
        );
        $this->load->view('v_login', $data, false);//load template sb-admin
    }
}