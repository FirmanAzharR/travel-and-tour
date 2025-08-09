<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content_Management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('m_mahasiswa');
        // // $this->load->helper('url');
        // $this->load->library('auth_libraries');
        // $this->auth_libraries->is_logged_in(); // Check if user is logged in
        // $this->auth_libraries->is_admin(); // Check if user is admin

    }

    public function index()
    {
        $data = array(
            'title' => 'Content Management',
            'description' => '',
            'content' => 'content/v_content',
        );
        $this->load->view('dashboard/v_template', $data, false);//load template sb-admin
    }

    public function load_view($view_name)
    {
        $allowed_views = [
            'content_top' => 'content/v_content_top',
            'content_contact' => 'content/v_content_contact',
            'content_gallery' => 'content/v_content_gallery',
            'content_popup' => 'content/v_content_popup'
        ];

        if (array_key_exists($view_name, $allowed_views)) {
            $this->load->view($allowed_views[$view_name]);
        } else {
            echo "View not found.";
        }
    }
}