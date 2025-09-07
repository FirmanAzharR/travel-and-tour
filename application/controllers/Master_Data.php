<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Master_Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_car');
    $this->load->model('m_artikel');
        // $this->load->model('m_motor');
        // $this->load->model('m_bus');
        // $this->load->model('m_tour_package');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('auth_libraries');
        $this->auth_libraries->is_logged_in();
        $this->auth_libraries->is_admin();
    }

    public function index()
    {
        $data = array(
            'title' => 'Master Data',
            'description' => '',
            'content' => 'master-data/v_master_data',
        );
        $this->load->view('dashboard/v_template', $data, false);
    }

    public function load_view($view_name = null)
    {
        // Check if view_name is provided
        if (empty($view_name)) {
            show_error('View name is required', 400);
            return;
        }

        $allowed_views = [
            'master-data-mobil' => 'master-data/v_mobil',
            'master-data-motor' => 'master-data/v_motor',
            'master-data-bus' => 'master-data/v_bus',
            'master-data-tour-package' => 'master-data/v_tour_package',
            'master-data-artikel' => 'master-data/v_artikel'
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
                case 'master-data-mobil':
                    // $data['cars'] = $this->m_car->get_all();
                    break;
                case 'master-data-motor':
                    // $data['motors'] = $this->m_motor->get_all();
                    break;
                case 'master-data-bus':
                    // $data['buses'] = $this->m_bus->get_all();
                    break;
                case 'master-data-tour-package':
                    // $data['packages'] = $this->m_tour_package->get_all();
                    break;
            }

            // Load the view
            $this->load->view($view_file, $data);
            
        } catch (Exception $e) {
            log_message('error', 'Error in Master_Data/load_view: ' . $e->getMessage());
            show_error('An error occurred while loading the view. Please try again later.', 500);
        }
    }

    public function public_artikel_list()
    {
        // Public endpoint that returns artikel list as JSON (no auth expected)
        header('Content-Type: application/json');
        $artikel = $this->m_artikel->get_all_artikel();
        $data = [];

        if ($artikel) {
            // allow both array of arrays (result_array) or array of objects (result)
            foreach ($artikel as $art) {
                $id = isset($art['id']) ? $art['id'] : (isset($art->id) ? $art->id : null);
                $title = isset($art['title']) ? $art['title'] : (isset($art->title) ? $art->title : '');
                // some code use 'subtitle' or 'sub_title'
                $subtitle = isset($art['subtitle']) ? $art['subtitle'] : (isset($art['sub_title']) ? $art['sub_title'] : '');
                $imagePath = isset($art['image']) ? $art['image'] : (isset($art->image) ? $art->image : '');
                $created_at = isset($art['created_at']) ? $art['created_at'] : (isset($art->created_at) ? $art->created_at : '');
                $description = isset($art['description']) ? $art['description'] : (isset($art->description) ? $art->description : '');

                $data[] = [
                    'id' => $id,
                    'title' => $title,
                    'sub_title' => $subtitle,
                    'path' => $imagePath,
                    'image' => $imagePath ? base_url($imagePath) : '',
                    'created_at' => $created_at,
                    'description' => $description
                ];
            }
        }

        echo json_encode([
            'status' => 'success',
            'data' => $data
        ]);
        return;
    }

    public function get_cars()
{
    // Set JSON header
    $this->output->set_content_type('application/json');
    
    try {
        // Log the incoming request for debugging
        log_message('debug', 'get_cars POST data: ' . print_r($this->input->post(), true));
        
        // Get DataTables parameters
        $draw = $this->input->post('draw');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        
        // Safely get search and order parameters
        $search = isset($this->input->post('search')['value']) ? $this->input->post('search')['value'] : '';
        $order = $this->input->post('order');
        
        $order_column = 0;
        $order_dir = 'asc';
        
        if (!empty($order) && is_array($order) && isset($order[0]['column']) && isset($order[0]['dir'])) {
            $order_column = (int)$order[0]['column'];
            $order_dir = $order[0]['dir'];
        }
        
        // Define column names for ordering
        $columns = array('id', 'name', 'description', 'image');
        $order_by = (isset($columns[$order_column])) ? $columns[$order_column] : 'id';
        
        // Get data from model with error handling
        $total_records = $this->m_car->count_all();
        $filtered_records = $this->m_car->count_filtered($search);
        $data = $this->m_car->get_datatable_data($length, $start, $search, $order_by, $order_dir);
        
        // Ensure data is an array
        if (!is_array($data)) {
            throw new Exception('Invalid data format from model');
        }
        
        // Prepare response
        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => intval($total_records),
            "recordsFiltered" => intval($filtered_records),
            "data" => $data
        );
        
        // Log the response for debugging
        log_message('debug', 'get_cars response: ' . json_encode($response));
        
        // Send JSON response and exit
        $this->output->set_output(json_encode($response));
        return;
        
    } catch (Exception $e) {
        log_message('error', 'Error in get_cars: ' . $e->getMessage());
        $this->output->set_status_header(500);
        $this->output->set_output(json_encode([
            "error" => "Internal Server Error",
            "message" => $e->getMessage()
        ]));
        return;
    }
}
}