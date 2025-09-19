<?php
class M_title_description extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('title_description_web');
        $query = $this->db->get();
        return $query->result();
    }
}