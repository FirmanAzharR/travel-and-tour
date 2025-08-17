<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_bus extends CI_Model
{
    private $table = 'master_bus';
    private $primary_key = 'id';
    private $columns = array('id', 'name', 'type', 'description', 'image', 'created_at');
    
    public function __construct() {
        parent::__construct();
    }

    // Get all bus (for reference)
    public function get_all_bus() {
        $this->db->select('id, name, type, description, image, created_at');
        $this->db->where('deleted_at', null);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    // Count all records
    public function count_all() {
        $this->db->from($this->table);
        $this->db->where('deleted_at', null);
        return $this->db->count_all_results();
    }
    
    // Count filtered records
    public function count_filtered($search = '') {
        $this->db->from($this->table);
        $this->db->where('deleted_at', null);
        
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('name', $search);
            $this->db->or_like('description', $search);
            $this->db->group_end();
        }
        
        return $this->db->count_all_results();
    }
    
    // Get data for DataTables
    public function get_datatable_data($limit, $start, $search = '', $order_column = 'id', $order_dir = 'asc') {
        $this->db->select(implode(', ', $this->columns));
        $this->db->from($this->table);
        $this->db->where('deleted_at', null);
        
        // Apply search filter
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('name', $search);
            $this->db->or_like('description', $search);
            $this->db->group_end();
        }
        
        // Apply ordering
        $this->db->order_by($order_column, $order_dir);
        
        // Apply pagination
        $this->db->limit($limit, $start);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get single bus by ID
    public function get_by_id($id) {
        $this->db->from($this->table);
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    // Insert new bus
    public function save($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    // Update bus
    public function update($id, $data) {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table, $data);
    }
    
    // Soft delete bus
    public function delete($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table, ['deleted_at' => date('Y-m-d H:i:s')]);
    }

    // Original method for booking (kept for backward compatibility)
    public function insert_booking($data) {
        $booking_data = array(
            'wa_number' => $data['wa_number'],
            'booking_date_start' => $data['booking_date_start'],
            'booking_date_end' => $data['booking_date_end'],
            'bus_name' => $data['bus_name'],
            'booking_type' => 'rental_bus',
            'route' => $data['route'],
            'bus_id' => $data['bus_id'],
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('bus_bookings', $booking_data);
        return $this->db->insert_id();
    }
}
