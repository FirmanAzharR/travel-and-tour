<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Car extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_car');
        header('Content-Type: application/json');
    }

    public function list_cars()
    {
        $data = $this->M_car->get_all_cars();
        echo json_encode(['data' => $data]);
    }

}