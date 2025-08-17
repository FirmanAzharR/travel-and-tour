<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_artikel');
        $this->load->library('upload');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Data Motor';
        $this->load->view('master-data/v_artikel', $data);
    }

    public function list_artikel()
    {
        $list = $this->M_artikel->get_datatable_data(
            $_POST['length'],
            $_POST['start'],
            $_POST['search']['value'],
            $this->input->post('order')[0]['column'],
            $this->input->post('order')[0]['dir']
        );

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $artikel) {
            $no++;
            $row = array();
            $row['DT_RowId'] = 'row_' . $artikel['id'];
            $row['id'] = $no;
            $row['title'] = $artikel['title'];
            $row['subtitle'] = $artikel['subtitle'];
            $row['description'] = $artikel['description'];
            $row['image'] = $artikel['image'] ? $artikel['image'] : '';
            $row['actions'] = '<div class="btn-group">
                                <button class="btn btn-sm btn-primary edit-btn" data-id="' . $artikel['id'] . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="' . $artikel['id'] . '">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>';
            $data[] = $row;
        }

        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->M_artikel->count_all(),
            "recordsFiltered" => $this->M_artikel->count_filtered($_POST['search']['value']),
            "data" => $data,
        );

        header('Content-Type: application/json');
        echo json_encode($output);
    }

    public function get($id)
    {
        header('Content-Type: application/json');
        
        if (!is_numeric($id)) {
            http_response_code(400);
            echo json_encode(['status' => false, 'message' => 'ID tidak valid']);
            return;
        }
        
        $artikel = $this->M_artikel->get_by_id($id);
        
        if ($artikel) {
            echo json_encode([
                'status' => true, 
                'data' => $artikel,
                'message' => 'Data berhasil diambil'
            ]);
        } else {
            http_response_code(404);
            echo json_encode([
                'status' => false, 
                'message' => 'Data motor tidak ditemukan'
            ]);
        }
    }

    public function save()
    {
        $response = ['status' => false, 'message' => ''];
        
        try {
            $config['upload_path'] = './media_uploads/artikel-image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->upload->initialize($config);

            $image_path = '';
            $old_image = '';
            $artikel_id = $this->input->post('id');
            
            // Get old image path if updating
            if (!empty($artikel_id)) {
                $existing_artikel = $this->M_artikel->get_by_id($artikel_id);
                $old_image = $existing_artikel ? $existing_artikel['image'] : '';
            }

            if (!empty($_FILES['image']['name'])) {
                // Delete old image if exists and new image is being uploaded
                if (!empty($old_image) && file_exists(FCPATH . $old_image)) {
                    @unlink(FCPATH . $old_image);
                }
                
                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $image_path = 'media_uploads/artikel-image/' . $upload_data['file_name'];
                } else {
                    throw new Exception($this->upload->display_errors('', ''));
                }
            } elseif ($this->input->post('existing_image')) {
                // Use existing image if no new image is uploaded
                $image_path = $this->input->post('existing_image');
            }

            // Prepare data for saving
            $data = [
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle'),
                'description' => $this->input->post('description'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Only update image path if we have a new image or are keeping the existing one
            if (!empty($image_path)) {
                $data['image'] = $image_path;
            } elseif (empty($artikel_id)) {
                // Only require image for new records
                throw new Exception('Gambar artikel harus diisi');
            }

            if (empty($artikel_id)) {
                // Insert new record
                $data['created_at'] = date('Y-m-d H:i:s');
                $result = $this->M_artikel->save($data);
                $message = 'Data artikel berhasil ditambahkan';
            } else {
                // Update existing record
                $result = $this->M_artikel->update($artikel_id, $data);
                $message = 'Data artikel berhasil diperbarui';
                
                // Delete old image if it was replaced
                if (!empty($old_image) && $old_image !== $image_path && file_exists(FCPATH . $old_image)) {
                    @unlink(FCPATH . $old_image);
                }
            }

            if ($result) {
                $artikel_data = $this->M_artikel->get_by_id($result ?: $artikel_id);
                $response = [
                    'status' => true,
                    'message' => $message,
                    'data' => $artikel_data
                ];
            } else {
                throw new Exception('Gagal menyimpan data artikel');
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            http_response_code(400);
        }

        // Ensure we're sending proper JSON response
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }

    public function delete($id = null)
    {
        $response = ['status' => false, 'message' => ''];
        
        try {
            if (!$id) {
                throw new Exception('ID artikel tidak valid');
            }
            
            // Get artikel data to delete image file
            $artikel = $this->M_artikel->get_by_id($id);
            
            if (!$artikel) {
                throw new Exception('Data artikel tidak ditemukan');
            }
            
            // Delete the artikel record (soft delete)
            $result = $this->M_artikel->delete($id);
            
            if ($result) {
                // Delete the image file if exists
                if (!empty($artikel['image']) && file_exists(FCPATH . $artikel['image'])) {
                    @unlink(FCPATH . $artikel['image']);
                }
                
                $response = [
                    'status' => true,
                    'message' => 'Data artikel berhasil dihapus'
                ];
            } else {
                throw new Exception('Gagal menghapus data artikel');
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            http_response_code(400);
        }

        // Send JSON response
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }
}
