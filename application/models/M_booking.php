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

    /**
     * Get city tour bookings with pagination
     * 
     * @param int $limit Number of records per page
     * @param int $offset Offset for pagination
     * @return array Array of booking records
     */
    public function get_city_tour_bookings($limit = 10, $offset = 0)
    {
        $this->db->select('*');
        $this->db->from('city_tour_booking');
        $this->db->where('deleted_at', null); // Only get non-deleted records
        $this->db->order_by('booking_date', 'DESC');
        $this->db->limit($limit, $offset);
        
        // Debug: Show the last query
        $query = $this->db->get();
        log_message('debug', 'SQL Query: ' . $this->db->last_query());
        log_message('debug', 'Number of rows: ' . $query->num_rows());
        
        return $query->result();
    }

    /**
     * Count total city tour bookings for pagination
     * 
     * @return int Total number of records
     */
    public function count_city_tour_bookings()
    {
        $this->db->from('city_tour_booking');
        $this->db->where('deleted_at', null); // Only count non-deleted records
        return $this->db->count_all_results();
    }

    /**
     * Get rental car bookings with search and pagination for DataTables
     * 
     * @param int $length Number of records per page
     * @param int $start Offset for pagination
     * @param string $search Search term
     * @return array Array of booking records
     */
    public function get_rental_bookings($length = 10, $start = 0, $search = '')
    {
        $this->db->select('*');
        $this->db->from('rent_car_booking');
        $this->db->where('deleted_at', null); // Only get non-deleted records
        
        // Add search condition if search term exists
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('customer_name', $search);
            $this->db->or_like('wa_number', $search);
            $this->db->or_like('car_name', $search);
            $this->db->or_like('booking_code', $search);
            $this->db->or_like('pickup_address', $search);
            $this->db->or_like('destination_address', $search);
            $this->db->or_like('booking_type', $search);
            $this->db->or_like('duration', $search);
            $this->db->group_end();
        }
        
        // Apply ordering by booking date (newest first)
        $this->db->order_by('booking_date_start', 'DESC');
        
        // Apply pagination
        if ($length != -1) {
            $this->db->limit($length, $start);
        }
        
        $query = $this->db->get();
        log_message('debug', 'SQL Query: ' . $this->db->last_query());
        
        return $query->result();
    }

    /**
     * Count total rental car bookings with optional search filter
     * 
     * @param string $search Search term
     * @return int Total number of records
     */
    public function count_rental_bookings($search = '')
    {
        $this->db->from('rent_car_booking');
        $this->db->where('deleted_at', null); // Only count non-deleted records
        
        // Add search condition if search term exists
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('customer_name', $search);
            $this->db->or_like('wa_number', $search);
            $this->db->or_like('car_name', $search);
            $this->db->or_like('booking_code', $search);
            $this->db->or_like('pickup_address', $search);
            $this->db->or_like('destination_address', $search);
            $this->db->or_like('booking_type', $search);
            $this->db->or_like('duration', $search);
            $this->db->group_end();
        }
        
        return $this->db->count_all_results();
    }

    /**
     * Get bus rental bookings with search and pagination for DataTables
     * 
     * @param int $length Number of records per page
     * @param int $start Offset for pagination
     * @param string $search Search term
     * @return array Array of booking records
     */
    public function get_bus_rental_bookings($length = 10, $start = 0, $search = '')
    {
        $this->db->select('*');
        $this->db->from('rent_bus_booking');
        $this->db->where('deleted_at', null);
        
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('customer_name', $search);
            $this->db->or_like('wa_number', $search);
            $this->db->or_like('pickup_address', $search);
            $this->db->or_like('booking_code', $search);
            $this->db->or_like('total_passengers', $search);
            $this->db->or_like('pickup_time', $search);
            $this->db->group_end();
        }
        
        $this->db->order_by('booking_date_start', 'DESC');
        
        if ($length != -1) {
            $this->db->limit($length, $start);
        }
        
        $query = $this->db->get();
        
        // Debug: Log the raw query and results
        log_message('debug', 'Bus Bookings Query: ' . $this->db->last_query());
        $results = $query->result();
        
        // Ensure created_at is properly formatted for each result
        foreach ($results as &$row) {
            if (isset($row->created_at) && !empty($row->created_at)) {
                $row->created_at_formatted = date('Y-m-d H:i:s', strtotime($row->created_at));
            } else {
                $row->created_at_formatted = '';
            }
        }
        
        return $results;
    }

    /**
     * Count total bus rental bookings with optional search filter
     * 
     * @param string $search Search term
     * @return int Total number of records
     */
    public function count_bus_rental_bookings($search = '')
    {
        $this->db->from('rent_bus_booking');
        $this->db->where('deleted_at', null); // Only count non-deleted records
        
        // Add search condition if search term exists
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('customer_name', $search);
            $this->db->or_like('wa_number', $search);
            $this->db->or_like('pickup_address', $search);
            $this->db->or_like('booking_code', $search);
            $this->db->or_like('total_passengers', $search);
            $this->db->or_like('pickup_time', $search);
            $this->db->or_like('created_at', $search);
            $this->db->group_end();
        }
        
        return $this->db->count_all_results();
    }

    /**
     * Debug method to check database connection and table structure
     */
    public function debug_table_info()
    {
        // Check if table exists
        $tables = $this->db->list_tables();
        $table_exists = in_array('city_tour_booking', $tables);
        
        log_message('debug', 'Table exists: ' . ($table_exists ? 'Yes' : 'No'));
        
        if ($table_exists) {
            // Get table fields
            $fields = $this->db->field_data('city_tour_booking');
            log_message('debug', 'Table fields: ' . print_r($fields, true));
            
            // Get sample data
            $sample = $this->db->get('city_tour_booking', 1)->row();
            log_message('debug', 'Sample data: ' . print_r($sample, true));
            
            return [
                'table_exists' => true,
                'fields' => $fields,
                'sample' => $sample
            ];
        }
        
        return ['table_exists' => false];
    }
}
