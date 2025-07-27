<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
   public function insert_data($data)
    {
        return $this->db->insert('users', $data);
    }

    public function check_email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }
}