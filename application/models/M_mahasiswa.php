<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        return $this->db->get()->result();
    }

    public function insert_data($data)
    {
        return $this->db->insert('mahasiswa', $data);
    }

    public function detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function update_data($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('mahasiswa', $data);
    }

    public function delete_data($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->delete('mahasiswa', $data);
    }
}