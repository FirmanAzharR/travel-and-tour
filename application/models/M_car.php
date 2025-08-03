<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_car extends CI_Model
{
    public function get_all_cars() {
        $this->db->select('id, name, description, image');
        $query = $this->db->get('master_car');
        return $query->result_array();
    }

    public function insert_booking($data) {
        $booking_data = array(
            'wa_number' => $data['wa_number'],
            'booking_date_start' => $data['booking_date_start'],
            'booking_date_end' => $data['booking_date_end'],
            'car_name' => $data['car_name'],
            'booking_type' => 'rental_mobil',
            'route' => $data['route'],
            'car_id' => $data['car_id'],
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('car_bookings', $booking_data);
        return $this->db->insert_id();
    }
}
