<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_bus');
        $this->load->library('upload');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Data Bus';
        $this->load->view('master-data/v_bus', $data);
    }

    public function list_bus()
    {
        $list = $this->M_bus->get_datatable_data(
            $_POST['length'],
            $_POST['start'],
            $_POST['search']['value'],
            $this->input->post('order')[0]['column'],
            $this->input->post('order')[0]['dir']
        );

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $bus) {
            $no++;
            $row = array();
            $row['DT_RowId'] = 'row_' . $bus['id'];
            $row['id'] = $no;
            $row['name'] = $bus['name'];
            $row['description'] = $bus['description'];
            $row['image'] = $bus['image'] ? $bus['image'] : '';
            $row['actions'] = '<div class="btn-group">
                                <button class="btn btn-sm btn-primary edit-btn" data-id="' . $bus['id'] . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="' . $bus['id'] . '">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>';
            $data[] = $row;
        }

        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->M_bus->count_all(),
            "recordsFiltered" => $this->M_bus->count_filtered($_POST['search']['value']),
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
        
        $bus = $this->M_bus->get_by_id($id);
        
        if ($bus) {
            echo json_encode([
                'status' => true, 
                'data' => $bus,
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
            $config['upload_path'] = './media_uploads/bus-image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->upload->initialize($config);

            $image_path = '';
            $bus_id = $this->input->post('id');
            $existing_image = '';
            
            // Get existing image path if updating
            if (!empty($bus_id)) {
                $existing_bus = $this->M_bus->get_by_id($bus_id);
                $existing_image = isset($existing_bus['image']) ? $existing_bus['image'] : '';
            }

            // Handle file upload if a new image is provided
            if (!empty($_FILES['image']['name'])) {
                // Delete old image if exists and new image is being uploaded
                if (!empty($existing_image) && file_exists(FCPATH . $existing_image)) {
                    @unlink(FCPATH . $existing_image);
                }
                
                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $image_path = 'media_uploads/bus-image/' . $upload_data['file_name'];
                } else {
                    throw new Exception($this->upload->display_errors('', ''));
                }
            } elseif (!empty($bus_id) && !empty($existing_image)) {
                // Keep the existing image if no new image is uploaded during update
                $image_path = $existing_image;
            } elseif (empty($bus_id)) {
                // Only require image for new records
                throw new Exception('Gambar bus harus diisi');
            }

            $data = [
                'name' => $this->input->post('name'),
                'type' => $this->input->post('type'),
                'description' => $this->input->post('description'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Add image path to data if we have one
            if (!empty($image_path)) {
                $data['image'] = $image_path;
            }

            if (empty($bus_id)) {
                // Insert new record
                $data['created_at'] = date('Y-m-d H:i:s');
                $result = $this->M_bus->save($data);
                $message = 'Data bus berhasil ditambahkan';
            } else {
                // Update existing record
                $result = $this->M_bus->update($bus_id, $data);
                $message = 'Data bus berhasil diperbarui';
            }

            if ($result) {
                $bus_data = $this->M_bus->get_by_id($result ?: $bus_id);
                $response = [
                    'status' => true,
                    'message' => $message,
                    'data' => $bus_data
                ];
            } else {
                throw new Exception('Gagal menyimpan data bus');
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            http_response_code(400);
        }

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
            
            // Get bus data to delete image file
            $bus = $this->M_bus->get_by_id($id);
            
            if (!$bus) {
                throw new Exception('Data motor tidak ditemukan');
            }
            
            // Delete the bus record (soft delete)
            $result = $this->M_bus->delete($id);
            
            if ($result) {
                // Delete the image file if exists
                if (!empty($bus['image']) && file_exists(FCPATH . $bus['image'])) {
                    @unlink(FCPATH . $bus['image']);
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
