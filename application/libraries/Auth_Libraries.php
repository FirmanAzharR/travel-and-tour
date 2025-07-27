<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Libraries {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
        $this->CI->load->model('m_auth');
    }

    public function is_logged_in() {
        if($this->CI->session->userdata('logged_in') !== TRUE) {
            $this->CI->session->set_flashdata('message', 'Access denied. Please log in first.');
            redirect('home#sign-in');
        }
    }

    public function login($email, $password) {
        $check = $this->CI->m_auth->get_user_login($email, $password);
        if ($check) {
            $user_data = array(
                'email' => $check->email,
                'role' => $check->role,
                'id' => $check->id
            );
            $this->CI->session->set_userdata('logged_in', TRUE);
            $this->CI->session->set_userdata('user_data', $user_data);
            return TRUE;
        } else {
            // $this->CI->session->set_flashdata('error', 'Invalid email or password.');
            return FALSE;
        }
    }

    public function logout() {
        $this->CI->session->unset_userdata('logged_in');
        $this->CI->session->unset_userdata('user_data');
    }
}