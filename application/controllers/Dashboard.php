<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load helper & library yang diperlukan
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
        $this->load->library('auth_libraries');
        $this->auth_libraries->is_logged_in();
        $this->auth_libraries->is_admin();
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

        public function load_view($view_name = null)
    {
        // Check if view_name is provided
        if (empty($view_name)) {
            show_error('View name is required', 400);
            return;
        }

        $allowed_views = [
            'booking-travel-wisata' => 'dashboard/v_list_booking_wisata',
            'booking-travel-bandara' => 'dashboard/v_list_booking_bandara',
            'booking-rental-mobil' => 'dashboard/v_list_booking_car',
            'booking-carter-bus' => 'dashboard/v_list_booking_bus',
        ];

        // Check if the requested view is allowed
        if (!array_key_exists($view_name, $allowed_views)) {
            show_404();
            return;
        }

        $view_file = $allowed_views[$view_name];
        
        // Check if the view file exists
        if (!file_exists(APPPATH . 'views/' . $view_file . '.php')) {
            show_error('View file not found: ' . $view_file, 404);
            return;
        }

        try {
            $data = [
                'title' => ucwords(str_replace('-', ' ', $view_name)),
                'view_name' => $view_name
            ];

            // Load specific data for each view if needed
            switch ($view_name) {
                case 'booking-travel-wisata':
                    // $data['cars'] = $this->m_car->get_all();
                    break;
                case 'booking-travel-bandara':
                    // $data['motors'] = $this->m_motor->get_all();
                    break;
                case 'booking-rental-mobil':
                    // $data['buses'] = $this->m_bus->get_all();
                    break;
                case 'booking-carter-bus':
                    // $data['packages'] = $this->m_tour_package->get_all();
                    break;
            }

            // Load the view
            $this->load->view($view_file, $data);
            
        } catch (Exception $e) {
            log_message('error', 'Error in Dashboard/load_view: ' . $e->getMessage());
            show_error('An error occurred while loading the view. Please try again later.', 500);
        }
    }
}
