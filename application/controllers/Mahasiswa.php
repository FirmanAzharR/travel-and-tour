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
        $this->load->view('dashboard/v_template', $data, false);//load template sb-admin
    }

 

    public function add_mahasiswa(){

        //form validation
        $this->form_validation->set_rules('nama', 'Nama', 'required',['required' => 'Nama harus diisi']);
        $this->form_validation->set_rules('nik', 'NIK', 'required',['required' => 'NIK']);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required',['required' => 'Tanggal Lahir']);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required',['required' => 'Jenis Kelamin']);
        $this->form_validation->set_rules('prodi_id', 'Program Studi', 'required',['required' => 'Program Studi harus dipilih']);
        

        //config for upload image
        $config['upload_path'] = './upload_images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB
        $this->upload->initialize($config);
        $field_name = 'foto';


        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form tambah mahasiswa
            $data = array(
                'title' => 'Tambah Mahasiswa',
                'data_prodi' => $this->m_mahasiswa->get_all_prodi(),
                'content' => 'mahasiswa/v_add_mahasiswa',
            );
            $this->load->view('dashboard/v_template', $data, false);//load template sb-admin
        } else {
            // Cek apakah ada file yang diupload
            if ($_FILES[$field_name]['name'] != '') {
                // Generate nama file yang unik
                $original_name = $_FILES[$field_name]['name'];
                $new_filename = $this->generate_filename($original_name);
                
                // Set nama file baru untuk upload
                $_FILES[$field_name]['name'] = $new_filename;
                
                if ($this->upload->do_upload($field_name)) {
                    // Upload berhasil
                    $upload_data = $this->upload->data();
                    
                    // Jika validasi berhasil, proses data
                    $data = array(
                        'nama' => $this->input->post('nama'),
                        'nik' => $this->input->post('nik'),
                        'tgl_lahir' => $this->input->post('tgl_lahir'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'prodi_id' => $this->input->post('prodi_id'),
                        'image_url' => $new_filename
                    );
                    
                    // Simpan data ke database
                    $result = $this->m_mahasiswa->insert_data($data);
                    
                    if ($result) {
                        $this->session->set_flashdata('success', 'Data mahasiswa dan gambar berhasil ditambahkan.');
                    } else {
                        // Jika gagal insert, hapus file yang sudah diupload
                        $this->delete_image_file($new_filename);
                        $this->session->set_flashdata('error', 'Gagal menambahkan data mahasiswa.');
                    }
                    
                    redirect('mahasiswa/index');
                } else {
                    // Upload gagal
                    $data = array(
                        'title' => 'Tambah Mahasiswa',
                        'data_prodi' => $this->m_mahasiswa->get_all_prodi(),
                        'content' => 'mahasiswa/v_add_mahasiswa',
                        'error_upload' => $this->upload->display_errors()
                    );
                    $this->load->view('dashboard/v_template', $data, false);
                }
            } else {
                // Jika tidak ada file yang diupload
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'nik' => $this->input->post('nik'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'prodi_id' => $this->input->post('prodi_id'),
                    'image_url' => '' // Kosong jika tidak ada gambar
                );
                
                // Simpan data ke database
                $result = $this->m_mahasiswa->insert_data($data);
                
                if ($result) {
                    $this->session->set_flashdata('success', 'Data mahasiswa berhasil ditambahkan (tanpa gambar).');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan data mahasiswa.');
                }
                
                redirect('mahasiswa/index');
            }
        }
    }

    public function edit_mahasiswa($id_mahasiswa)
    {
        // Validasi ID mahasiswa
        $id_mahasiswa = (int)$id_mahasiswa;
        
        if ($id_mahasiswa <= 0) {
            $this->session->set_flashdata('error', 'ID mahasiswa tidak valid.');
            redirect('mahasiswa/index');
        }
        
        // Ambil data mahasiswa
        $data_mahasiswa = $this->m_mahasiswa->detail_data($id_mahasiswa);
        
        // Cek apakah data ditemukan
        if (!$data_mahasiswa) {
            $this->session->set_flashdata('error', 'Data mahasiswa dengan ID ' . $id_mahasiswa . ' tidak ditemukan.');
            redirect('mahasiswa/index');
        }
        
        //form validation
        $this->form_validation->set_rules('nama', 'Nama', 'required',['required' => 'Nama harus diisi']);
        $this->form_validation->set_rules('nik', 'NIK', 'required',['required' => 'NIK']);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required',['required' => 'Tanggal Lahir']);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required',['required' => 'Jenis Kelamin']);
        $this->form_validation->set_rules('prodi_id', 'Program Studi', 'required',['required' => 'Program Studi Harus diisi']);

        //config for upload image
        $config['upload_path'] = './upload_images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB
        $this->upload->initialize($config);
        $field_name = 'foto';
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form edit mahasiswa
            $data = array(
                'title' => 'Edit Mahasiswa',
                'data_mahasiswa' => $data_mahasiswa,
                'data_prodi' => $this->m_mahasiswa->get_all_prodi(),
                'content' => 'mahasiswa/v_edit_mahasiswa',
            );
            $this->load->view('dashboard/v_template', $data, false);//load template sb-admin
        } else {
            // Jika validasi berhasil, proses data
            $data = array(
                'id' => $id_mahasiswa,
                'nama' => $this->input->post('nama'),
                'nik' => $this->input->post('nik'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'prodi_id' => $this->input->post('prodi_id')
            );
            
            // Cek apakah ada file yang diupload
            if ($_FILES[$field_name]['name'] != '') {
                // Generate nama file yang unik
                $original_name = $_FILES[$field_name]['name'];
                $new_filename = $this->generate_filename($original_name);
                
                // Set nama file baru untuk upload
                $_FILES[$field_name]['name'] = $new_filename;
                
                if ($this->upload->do_upload($field_name)) {
                    // Upload berhasil
                    $upload_data = $this->upload->data();
                    
                    // Hapus file gambar lama jika ada
                    $this->delete_image_file($data_mahasiswa->image_url);
                    
                    // Tambahkan nama file baru ke data
                    $data['image_url'] = $new_filename;
                    
                    $this->session->set_flashdata('success', 'Data mahasiswa dan gambar berhasil diupdate.');
                } else {
                    // Upload gagal
                    $data = array(
                        'title' => 'Edit Mahasiswa',
                        'data_mahasiswa' => $data_mahasiswa,
                        'data_prodi' => $this->m_mahasiswa->get_all_prodi(),
                        'content' => 'mahasiswa/v_edit_mahasiswa',
                        'error_upload' => $this->upload->display_errors()
                    );
                    $this->load->view('dashboard/v_template', $data, false);
                    return;
                }
            } else {
                // Jika tidak ada file yang diupload, pertahankan gambar lama
                $data['image_url'] = $data_mahasiswa->image_url;
                $this->session->set_flashdata('success', 'Data mahasiswa berhasil diupdate (gambar tidak berubah).');
            }
            
            // Update data ke database
            $this->m_mahasiswa->update_data($data);
            redirect('mahasiswa/index');
        }
    }

    public function delete_mahasiswa($id_mahasiswa)
    {
        // Validasi ID mahasiswa
        $id_mahasiswa = (int)$id_mahasiswa;
        
        if ($id_mahasiswa <= 0) {
            $this->session->set_flashdata('error', 'ID mahasiswa tidak valid.');
            redirect('mahasiswa/index');
        }
        
        // Ambil data mahasiswa sebelum dihapus
        $data_mahasiswa = $this->m_mahasiswa->detail_data($id_mahasiswa);
        
        if (!$data_mahasiswa) {
            $this->session->set_flashdata('error', 'Data mahasiswa dengan ID ' . $id_mahasiswa . ' tidak ditemukan.');
            redirect('mahasiswa/index');
        }
        
        // Hapus file gambar jika ada
        $this->delete_image_file($data_mahasiswa->image_url);
        
        // Hapus data dari database
        $data = array('id' => $id_mahasiswa);
        $result = $this->m_mahasiswa->delete_data($data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Data mahasiswa dan gambar berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data mahasiswa.');
        }
        
        redirect('mahasiswa/index');
    }

    public function get_prodi()
    {
        $prodi = $this->m_mahasiswa->get_all_prodi();
        echo json_encode($prodi);
    }

    /**
     * Helper function untuk generate nama file dengan timestamp
     */
    private function generate_filename($original_name) {
        $extension = pathinfo($original_name, PATHINFO_EXTENSION);
        $timestamp = date('Y-m-d_H-i-s');
        $random_string = substr(md5(uniqid()), 0, 8);
        return $timestamp . '_' . $random_string . '.' . $extension;
    }

    /**
     * Helper function untuk menghapus file gambar
     */
    private function delete_image_file($filename) {
        if (!empty($filename) && file_exists('./upload_images/' . $filename)) {
            return unlink('./upload_images/' . $filename);
        }
        return false;
    }
    
    /**
     * Helper function untuk mengecek apakah file gambar valid
     */
    private function is_valid_image($filename) {
        if (empty($filename)) {
            return false;
        }
        
        $file_path = './upload_images/' . $filename;
        if (!file_exists($file_path)) {
            return false;
        }
        
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        return in_array($file_extension, $allowed_types);
    }

    /**
     * Helper function untuk membersihkan file yang tidak terpakai
     */
    private function cleanup_orphan_files() {
        $upload_path = './upload_images/';
        $files = glob($upload_path . '*');
        $orphan_files = array();
        
        foreach ($files as $file) {
            if (is_file($file)) {
                $filename = basename($file);
                
                // Cek apakah file ini ada di database
                $this->db->where('image_url', $filename);
                $result = $this->db->get('mahasiswa')->row();
                
                if (!$result) {
                    $orphan_files[] = $filename;
                }
            }
        }
        
        return $orphan_files;
    }
    
    /**
     * Helper function untuk mengecek integritas file
     */
    private function check_file_integrity() {
        $this->db->select('id, nama, image_url');
        $this->db->from('mahasiswa');
        $this->db->where('image_url IS NOT NULL');
        $this->db->where('image_url !=', '');
        $results = $this->db->get()->result();
        
        $missing_files = array();
        
        foreach ($results as $row) {
            if (!file_exists('./upload_images/' . $row->image_url)) {
                $missing_files[] = array(
                    'id' => $row->id,
                    'nama' => $row->nama,
                    'image_url' => $row->image_url
                );
            }
        }
        
        return $missing_files;
    }

    public function debug_database()
    {
        // Cek struktur tabel mahasiswa
        $this->db->query("DESCRIBE mahasiswa");
        $structure = $this->db->result();
        
        echo "<h3>Struktur Tabel Mahasiswa:</h3>";
        echo "<pre>";
        print_r($structure);
        echo "</pre>";
        
        // Cek data mahasiswa
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $data = $this->db->get()->result();
        
        echo "<h3>Data Mahasiswa:</h3>";
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        
        // Cek tabel prodi
        $this->db->select('*');
        $this->db->from('prodi');
        $prodi = $this->db->get()->result();
        
        echo "<h3>Data Prodi:</h3>";
        echo "<pre>";
        print_r($prodi);
        echo "</pre>";
        
        // Cek file yang tidak terpakai
        $orphan_files = $this->cleanup_orphan_files();
        echo "<h3>File yang Tidak Terpakai (Orphan Files):</h3>";
        echo "<pre>";
        print_r($orphan_files);
        echo "</pre>";
        
        // Cek integritas file
        $missing_files = $this->check_file_integrity();
        echo "<h3>File yang Hilang (Missing Files):</h3>";
        echo "<pre>";
        print_r($missing_files);
        echo "</pre>";
        
        // Cek file di folder upload_images
        $upload_path = './upload_images/';
        $files = glob($upload_path . '*');
        echo "<h3>File di Folder upload_images:</h3>";
        echo "<pre>";
        foreach ($files as $file) {
            if (is_file($file)) {
                echo basename($file) . " - " . filesize($file) . " bytes\n";
            }
        }
        echo "</pre>";
    }

}