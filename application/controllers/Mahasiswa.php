<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_mahasiswa');
        // $this->load->helper('url');
    }
    public function index()
    {
        $data = array(
            'title' => 'Data Mahasiswa',
            'description' => '',
            'content' => 'mahasiswa/v_mahasiswa',
            'data_mahasiswa' => $this->m_mahasiswa->get_all_data(),
        );
        $this->load->view('v_template', $data, false);//load template sb-admin
    }

    public function add_mahasiswa(){

        //form validation
        $this->form_validation->set_rules('nama', 'Nama', 'required',['required' => 'Nama harus diisi']);
        $this->form_validation->set_rules('nik', 'NIK', 'required',['required' => 'NIK']);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required',['required' => 'Tanggal Lahir']);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required',['required' => 'Jenis Kelamin']);
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form tambah mahasiswa
            $data = array(
                'title' => 'Tambah Mahasiswa',
                'content' => 'mahasiswa/v_add_mahasiswa',
            );
            $this->load->view('v_template', $data, false);//load template sb-admin
        } else {
            // Jika validasi berhasil, proses data
            $data = array(
                'nama' => $this->input->post('nama'),
                'nik' => $this->input->post('nik'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            );
            // Simpan data ke database (implementasikan sesuai kebutuhan)
            $this->m_mahasiswa->insert_data($data);
            // Redirect atau tampilkan pesan sukses
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil ditambahkan.');
            redirect('mahasiswa/index');
        }
    }

    public function edit_mahasiswa($id_mahasiswa)
    {
         //form validation
        $this->form_validation->set_rules('nama', 'Nama', 'required',['required' => 'Nama harus diisi']);
        $this->form_validation->set_rules('nik', 'NIK', 'required',['required' => 'NIK']);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required',['required' => 'Tanggal Lahir']);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required',['required' => 'Jenis Kelamin']);
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form tambah mahasiswa
            $data = array(
                'title' => 'Edit Mahasiswa',
                'data_mahasiswa' => $this->m_mahasiswa->detail_data($id_mahasiswa),
                'content' => 'mahasiswa/v_edit_mahasiswa',
            );
            $this->load->view('v_template', $data, false);//load template sb-admin
        } else {
            // Jika validasi berhasil, proses data
            $data = array(
                'id' => $id_mahasiswa,
                'nama' => $this->input->post('nama'),
                'nik' => $this->input->post('nik'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            );
            // Simpan data ke database (implementasikan sesuai kebutuhan)
            $this->m_mahasiswa->update_data($data);
            // Redirect atau tampilkan pesan sukses
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil diupdate.');
            redirect('mahasiswa/index');
        }

        $this->load->view('v_template', $data, false);//load template sb-admin
    }

    public function delete_mahasiswa($id_mahasiswa)
    {
       
            $data = array('id' => $id_mahasiswa);
            $this->m_mahasiswa->delete_data($data);
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil didelete.');
            redirect('mahasiswa/index');
            
        $this->load->view('v_template', $data, false);//load template sb-admin
    }

}