<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_booking');
        $this->load->library('pagination');
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
        try {
            if (!$view_name) {
                show_404();
            }

            // List of allowed views
            $allowed_views = [
                'list_booking_wisata' => 'dashboard/v_list_booking_wisata',
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
            
            // For AJAX requests, just return the partial view
            if ($this->input->is_ajax_request()) {
                $this->load->view($view_file);
                return;
            }

            // For regular requests, load the full template
            $data = [
                'title' => ucwords(str_replace('-', ' ', $view_name)),
                'content' => $view_file,
                'view_name' => $view_name
            ];

            $this->load->view('dashboard/v_template', $data);

        } catch (Exception $e) {
            log_message('error', 'Error in Dashboard/load_view: ' . $e->getMessage());
            
            if ($this->input->is_ajax_request()) {
                $this->output
                    ->set_status_header(500)
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                        'status' => 'error',
                        'message' => 'Terjadi kesalahan saat memuat data.'
                    ]));
            } else {
                show_error('An error occurred while loading the view. Please try again later.', 500);
            }
        }
    }

    /**
     * Debug method to check database connection and table data
     */
    public function debug_booking_data()
    {
        // Enable debug mode
        $this->output->enable_profiler(TRUE);
        
        // Check database connection
        $db_connected = $this->db->initialize();
        echo "<h2>Database Connection:</h2>";
        echo $db_connected ? "<p style='color:green'>Connected successfully!</p>" : "<p style='color:red'>Connection failed!</p>";
        
        // Check table info
        echo "<h2>Table Information:</h2>";
        $table_info = $this->M_booking->debug_table_info();
        echo "<pre>";
        print_r($table_info);
        echo "</pre>";
        
        // Get all bookings
        echo "<h2>All Bookings:</h2>";
        $this->db->select('*');
        $this->db->from('city_tour_booking');
        $bookings = $this->db->get()->result();
        echo "<pre>";
        print_r($bookings);
        echo "</pre>";
        
        // Show last query
        echo "<h2>Last Query:</h2>";
        echo $this->db->last_query();
    }

    public function get_monthly_booking_data() {
        $year = date('Y');
        $month = 8; // August
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $daily_data = array_fill(1, $days_in_month, 0);
        
        // Get daily data for city tour bookings in August
        $city_tour = $this->db->select('DAY(created_at) as day, COUNT(id) as count')
            ->from('city_tour_booking')
            ->where('YEAR(created_at)', $year)
            ->where('MONTH(created_at)', $month)
            ->where('deleted_at IS NULL')
            ->group_by('DAY(created_at)')
            ->get()->result_array();
            
        // Get daily data for airport travel bookings in August
        $airport_travel = $this->db->select('DAY(created_at) as day, COUNT(id) as count')
            ->from('airport_travel_booking')
            ->where('YEAR(created_at)', $year)
            ->where('MONTH(created_at)', $month)
            ->where('deleted_at IS NULL')
            ->group_by('DAY(created_at)')
            ->get()->result_array();
            
        // Get daily data for bus rentals in August
        $bus_rental = $this->db->select('DAY(created_at) as day, COUNT(id) as count')
            ->from('rent_bus_booking')
            ->where('YEAR(created_at)', $year)
            ->where('MONTH(created_at)', $month)
            ->where('deleted_at IS NULL')
            ->group_by('DAY(created_at)')
            ->get()->result_array();
            
        // Get daily data for car rentals in August
        $car_rental = $this->db->select('DAY(created_at) as day, COUNT(id) as count')
            ->from('rent_car_booking')
            ->where('YEAR(created_at)', $year)
            ->where('MONTH(created_at)', $month)
            ->where('deleted_at IS NULL')
            ->group_by('DAY(created_at)')
            ->get()->result_array();
            
        // Combine all booking types
        $all_bookings = [];
        $sources = [$city_tour, $airport_travel, $bus_rental, $car_rental];
        
        foreach ($sources as $source) {
            foreach ($source as $item) {
                $day = (int)$item['day'];
                if (!isset($all_bookings[$day])) {
                    $all_bookings[$day] = 0;
                }
                $all_bookings[$day] += (int)$item['count'];
            }
        }
        
        // Fill in the daily data array
        foreach ($all_bookings as $day => $count) {
            $daily_data[$day] = $count;
        }
        
        // Convert to indexed array for Chart.js
        $result = array_values($daily_data);
        
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
