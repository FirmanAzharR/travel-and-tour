<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_motorcycle extends CI_Model
{
    private $table = 'master_motorcycle';
    private $primary_key = 'id';
    private $columns = array('id', 'name', 'description', 'image', 'created_at');
    
    public function __construct() {
        parent::__construct();
    }

    // Get all motorcycles
    public function get_all_motorcycles() {
        $this->db->select(implode(', ', $this->columns));
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

    // Get single motorcycle by ID
    public function get_by_id($id) {
        $this->db->from($this->table);
        $this->db->where($this->primary_key, $id);
        $this->db->where('deleted_at', null); // Exclude soft-deleted records
        $query = $this->db->get();
        return $query->row_array();
    }
    
    // Insert new motorcycle
    public function save($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    // Update motorcycle
    public function update($id, $data) {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table, $data);
    }
    
    // Soft delete motorcycle
    public function delete($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table, ['deleted_at' => date('Y-m-d H:i:s')]);
    }
}
