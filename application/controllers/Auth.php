<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

     public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
        // $this->load->helper('url');
    }

    public function index(){
        // $data = array(
        //     'title' => 'Sign In',
        //     'description' => '',
        //     'content' => 'landing-page/v_home',
        // );
        // $this->load->view('v_home', $data, false);//load sign-in
    }

    public function register_user(){

        //form validation
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',['required' => 'Email harus diisi', 'valid_email' => 'Format email tidak valid']);
        $this->form_validation->set_rules('password', 'Password', 'required',['required' => 'Password harus diisi']);
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form tambah mahasiswa
            $data = array(
                'content' => 'landing-page/v_layout',
            );
            // Redirect ke home jika validasi gagal
            redirect('home');
        } else {
            $email = $this->input->post('email');
            
            // Cek apakah email sudah teregister
            if ($this->m_auth->check_email_exists($email)) {
                $this->session->set_flashdata('error', 'Email sudah teregister! Silakan gunakan email lain atau login.');
                redirect('home#sign-in');
                return;
            }
            
            $role = 'CUSTOMER';
            $data = array(
                'email' => $email,
                'password' => $this->input->post('password'),
                'role' => $role,
            );
                
            // Simpan data ke database
            $result = $this->m_auth->insert_data($data);
                
            if ($result) {
                $this->session->set_flashdata('success', 'Register berhasil');
            } else {
                $this->session->set_flashdata('error', 'Register Gagal');
            }
            
            // Redirect ke home setelah register
            redirect('home#sign-in');
        }
    }

    public function register_ajax(){
        // Set header untuk JSON response
        header('Content-Type: application/json');
        
        //form validation
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',['required' => 'Email harus diisi', 'valid_email' => 'Format email tidak valid']);
        $this->form_validation->set_rules('password', 'Password', 'required',['required' => 'Password harus diisi']);
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, return error JSON
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
            return;
        } else {
            $email = $this->input->post('email');
            
            // Cek apakah email sudah teregister
            if ($this->m_auth->check_email_exists($email)) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Email sudah teregister! Silakan gunakan email lain atau login.'
                );
                echo json_encode($response);
                return;
            }
            
            $role = 'CUSTOMER';
            $data = array(
                'email' => $email,
                'password' => $this->input->post('password'),
                'role' => $role,
            );
                
            // Simpan data ke database
            $result = $this->m_auth->insert_data($data);
                
            if ($result) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Register berhasil! Silakan login.'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Register gagal! Silakan coba lagi.'
                );
            }
            
            echo json_encode($response);
        }
    }
}