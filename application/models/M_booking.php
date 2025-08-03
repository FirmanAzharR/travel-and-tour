<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_booking extends CI_Model
{
    public function insert_data($data)
    {
        return $this->db->insert('city_tour_booking', $data);
    }
    public function insert_data_booking_travel_bandara($data)
    {
        return $this->db->insert('airport_travel_booking', $data);
    }
    public function insert_data_booking_travel_bandara_pickup($data)
    {
        return $this->db->insert('airport_travel_booking', $data);
    }

    /**
     * Insert car rental booking data
     * 
     * @param array $data Booking data
     * @return int|bool Returns booking ID on success, false on failure
     */
    public function insert_rental_booking($data)
    {
        $this->db->insert('rent_car_booking', $data);
        return $this->db->insert_id();
    }

    /**
     * Save carter bus booking data
     * 
     * @param array $data Booking data
     * @return int|bool Returns booking ID on success, false on failure
     */
    public function save_carter_bus_booking($data)
    {
        $this->db->insert('rent_bus_booking', $data);
        return $this->db->insert_id();
    }
}
