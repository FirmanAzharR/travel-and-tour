<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_content extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Save logo information to the database
     * 
     * @param array $data Array containing logo data (url_image, created_at, etc.)
     * @return int|bool Returns the inserted ID on success, false on failure
     */
    public function save_logo($data) {
        $this->db->trans_start();
        
        // First, set all existing logos as inactive (if needed)
        // $this->db->set('is_active', 0);
        // $this->db->update('image_logo');
        
        // Insert new logo
        $this->db->insert('image_logo', $data);
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        }
        
        return $insert_id;
    }
    
    /**
     * Get active logo
     * 
     * @return object|null Returns the active logo data or null if not found
     */
    public function get_active_logo() {
        $this->db->select('*');
        $this->db->from('image_logo');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        
        $query = $this->db->get();
        return $query->row();
    }
    
    /**
     * Get all logos
     * 
     * @return array Returns array of all logos
     */
    public function get_all_logos() {
        $this->db->select('*');
        $this->db->from('image_logo');
        $this->db->order_by('created_at', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Delete a logo by ID
     * 
     * @param int $id Logo ID to delete
     * @return bool True on success, false on failure
     */
    public function delete_logo($id) {
        // First, get the logo to delete the file
        $logo = $this->get_logo_by_id($id);
        
        if ($logo) {
            $file_path = FCPATH . $logo->url_image;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            $this->db->where('id', $id);
            return $this->db->delete('image_logo');
        }
        
        return false;
    }
    
    /**
     * Get logo by ID
     * 
     * @param int $id Logo ID
     * @return object|null Returns logo data or null if not found
     */
    public function get_logo_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('image_logo');
        return $query->row();
    }
    
    /**
     * Get website title and description
     * 
     * @return object|null Returns the title and description data or null if not found
     */
    public function get_web_title_description() {
        $this->db->select('*');
        $this->db->from('title_description_web');
        $this->db->limit(1);
        
        $query = $this->db->get();
        return $query->row();
    }
    
    /**
     * Update website title and description
     * 
     * @param array $data Array containing title and description to update
     * @return bool Returns true on success, false on failure
     */
    public function update_web_title_description($data) {
        // Check if record exists
        $existing = $this->get_web_title_description();
        
        $this->db->trans_start();
        
        if ($existing) {
            // Update existing record
            $this->db->where('id', $existing->id);
            $result = $this->db->update('title_description_web', $data);
        } else {
            // Insert new record if none exists
            $result = $this->db->insert('title_description_web', $data);
        }
        
        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }
    
    /**
     * Update existing logo
     * 
     * @param int $id Logo ID to update
     * @param array $data Array containing logo data to update
     * @return bool True on success, false on failure
     */
    public function update_logo($id, $data) {
        $this->db->trans_start();
        
        // Get the old logo data to delete the file later
        $old_logo = $this->get_logo_by_id($id);
        
        // Update the logo
        $this->db->where('id', $id);
        $result = $this->db->update('image_logo', $data);
        
        // If update is successful and there was an old logo file, delete it
        if ($result && $old_logo && !empty($old_logo->url_image)) {
            $file_path = FCPATH . $old_logo->url_image;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        
        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }
    
    /**
     * Get video data
     * 
     * @return object|null Returns the video data or null if not found
     */
    public function get_video() {
        $this->db->select('*');
        $this->db->from('video_header');
        $this->db->limit(1);
        
        $query = $this->db->get();
        return $query->row();
    }
    
    /**
     * Update video data
     * 
     * @param array $data Array containing video data to update
     * @return bool Returns true on success, false on failure
     */
    public function update_video($data) {
        // Check if record exists
        $existing = $this->get_video();
        
        $this->db->trans_start();
        
        if ($existing) {
            // Update existing record
            $this->db->where('id', $existing->id);
            $result = $this->db->update('video_header', $data);
        } else {
            // Insert new record if none exists
            $result = $this->db->insert('video_header', $data);
        }
        
        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }
    
    /**
     * Get contact information
     * 
     * @return object|null Returns contact data or null if not found
     */
    public function get_contact() {
        $query = $this->db->get('contact');
        return $query->row();
    }
    
    /**
     * Update contact information
     * 
     * @param array $data Contact data to update
     * @return bool True on success, false on failure
     */
    public function update_contact($data) {
        // Check if contact record exists
        $contact = $this->get_contact();
        
        if ($contact) {
            // Update existing record
            return $this->db->update('contact', $data);
        } else {
            // Insert new record if none exists
            return $this->db->insert('contact', $data);
        }
    }
}
