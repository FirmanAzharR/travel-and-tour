<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Motorcycle extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_motorcycle');
        $this->load->library('upload');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Data Motor';
        $this->load->view('master-data/v_motor', $data);
    }

    public function list_motorcycles()
    {
        $list = $this->M_motorcycle->get_datatable_data(
            $_POST['length'],
            $_POST['start'],
            $_POST['search']['value'],
            $this->input->post('order')[0]['column'],
            $this->input->post('order')[0]['dir']
        );

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $motorcycle) {
            $no++;
            $row = array();
            $row['DT_RowId'] = 'row_' . $motorcycle['id'];
            $row['id'] = $no;
            $row['name'] = $motorcycle['name'];
            $row['description'] = $motorcycle['description'];
            $row['image'] = $motorcycle['image'] ? $motorcycle['image'] : '';
            $row['actions'] = '<div class="btn-group">
                                <button class="btn btn-sm btn-primary edit-btn" data-id="' . $motorcycle['id'] . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="' . $motorcycle['id'] . '">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>';
            $data[] = $row;
        }

        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->M_motorcycle->count_all(),
            "recordsFiltered" => $this->M_motorcycle->count_filtered($_POST['search']['value']),
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
        
        $motorcycle = $this->M_motorcycle->get_by_id($id);
        
        if ($motorcycle) {
            echo json_encode([
                'status' => true, 
                'data' => $motorcycle,
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
            $config['upload_path'] = './media_uploads/motorcycle-image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->upload->initialize($config);

            $image_path = '';
            $old_image = '';
            $motorcycle_id = $this->input->post('id');
            
            // Get old image path if updating
            if (!empty($motorcycle_id)) {
                $existing_motorcycle = $this->M_motorcycle->get_by_id($motorcycle_id);
                $old_image = isset($existing_motorcycle['image']) ? $existing_motorcycle['image'] : '';
            }

            if (!empty($_FILES['image']['name'])) {
                // Delete old image if exists and new image is being uploaded
                if (!empty($old_image) && file_exists(FCPATH . $old_image)) {
                    @unlink(FCPATH . $old_image);
                }
                
                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $image_path = 'media_uploads/motorcycle-image/' . $upload_data['file_name'];
                } else {
                    throw new Exception($this->upload->display_errors('', ''));
                }
            } elseif ($this->input->post('existing_image')) {
                // Use existing image if no new image is uploaded
                $image_path = $this->input->post('existing_image');
            }

            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if (!empty($image_path)) {
                $data['image'] = $image_path;
            } elseif (empty($motorcycle_id)) {
                // Only require image for new records
                throw new Exception('Gambar motor harus diisi');
            }

            if (empty($motorcycle_id)) {
                // Insert new record
                $data['created_at'] = date('Y-m-d H:i:s');
                $result = $this->M_motorcycle->save($data);
                $message = 'Data motor berhasil ditambahkan';
            } else {
                // Update existing record
                $result = $this->M_motorcycle->update($motorcycle_id, $data);
                $message = 'Data motor berhasil diperbarui';
                
                // Delete old image if it was replaced
                if (!empty($old_image) && $old_image !== $image_path && file_exists(FCPATH . $old_image)) {
                    @unlink(FCPATH . $old_image);
                }
            }

            if ($result) {
                $motorcycle_data = $this->M_motorcycle->get_by_id($result ?: $motorcycle_id);
                $response = [
                    'status' => true,
                    'message' => $message,
                    'data' => $motorcycle_data
                ];
            } else {
                throw new Exception('Gagal menyimpan data motor');
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
                throw new Exception('ID motor tidak valid');
            }
            
            // Get motorcycle data to delete image file
            $motorcycle = $this->M_motorcycle->get_by_id($id);
            
            if (!$motorcycle) {
                throw new Exception('Data motor tidak ditemukan');
            }
            
            // Delete the motorcycle record (soft delete)
            $result = $this->M_motorcycle->delete($id);
            
            if ($result) {
                // Delete the image file if exists
                if (!empty($motorcycle['image']) && file_exists(FCPATH . $motorcycle['image'])) {
                    @unlink(FCPATH . $motorcycle['image']);
                }
                
                $response = [
                    'status' => true,
                    'message' => 'Data motor berhasil dihapus'
                ];
            } else {
                throw new Exception('Gagal menghapus data motor');
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
