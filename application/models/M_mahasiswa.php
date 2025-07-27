<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('mahasiswa.*, prodi.prodi_name');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'mahasiswa.prodi_id = prodi.id', 'left');
        return $this->db->get()->result();
    }

    public function get_all_prodi()
    {
        $this->db->select('*');
        $this->db->from('prodi');
        return $this->db->get()->result();
    }

    public function insert_data($data)
    {
        return $this->db->insert('mahasiswa', $data);
    }

    public function detail_data($id)
    {
        // Pastikan ID adalah integer
        $id = (int)$id;
        
        // Debug: log ID yang diterima
        log_message('debug', 'Detail data called with ID: ' . $id);
        
        $this->db->select('mahasiswa.*, prodi.prodi_name');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'mahasiswa.prodi_id = prodi.id', 'left');
        $this->db->where('mahasiswa.id', $id);
        
        $result = $this->db->get()->row();
        
        // Debug: log query dan hasil
        log_message('debug', 'Detail data query: ' . $this->db->last_query());
        log_message('debug', 'ID yang dicari: ' . $id);
        log_message('debug', 'Hasil query: ' . ($result ? 'Data ditemukan - ID: ' . $result->id . ', Nama: ' . $result->nama : 'Data tidak ditemukan'));
        
        // Ini Debugging Jika data tidak ditemukan, cari tanpa join dulu
        if (!$result) {
            log_message('debug', 'Mencoba query tanpa join...');
            $this->db->select('*');
            $this->db->from('mahasiswa');
            $this->db->where('id', $id);
            $result = $this->db->get()->row();
            log_message('debug', 'Query tanpa join: ' . $this->db->last_query());
            log_message('debug', 'Hasil query tanpa join: ' . ($result ? 'Data ditemukan' : 'Data tidak ditemukan'));
        }
        
        return $result;
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