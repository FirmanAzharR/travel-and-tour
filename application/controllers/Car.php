<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Car extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_car');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        header('Content-Type: application/json');
    }

    public function list_cars()
    {
        $data = $this->M_car->get_all_cars();
        echo json_encode(['data' => $data]);
    }

    public function get($id)
    {
        $response = ['status' => false, 'message' => ''];
        
        try {
            $car = $this->M_car->get_by_id($id);
            
            if ($car) {
                $response = [
                    'status' => true,
                    'data' => $car
                ];
            } else {
                throw new Exception('Data mobil tidak ditemukan');
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            http_response_code(404);
        }

        echo json_encode($response);
    }

    public function save()
    {
        $response = ['status' => false, 'message' => ''];
        
        try {
            $config['upload_path'] = './media_uploads/cars-image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->upload->initialize($config);

            $image_path = '';
            $old_image = '';
            $car_id = $this->input->post('id');
            
            // Get old image path if updating
            if (!empty($car_id)) {
                $existing_car = $this->M_car->get_by_id($car_id);
                $old_image = isset($existing_car['image']) ? $existing_car['image'] : '';
            }

            if (!empty($_FILES['image']['name'])) {
                // Delete old image if exists and new image is being uploaded
                if (!empty($old_image) && file_exists(FCPATH . $old_image)) {
                    @unlink(FCPATH . $old_image);
                }
                
                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $image_path = 'media_uploads/cars-image/' . $upload_data['file_name'];
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
            } elseif (empty($car_id)) {
                // Only require image for new records
                throw new Exception('Gambar mobil harus diisi');
            }

            if (empty($car_id)) {
                // Insert new record
                $data['created_at'] = date('Y-m-d H:i:s');
                $result = $this->M_car->save($data);
                $message = 'Data mobil berhasil ditambahkan';
            } else {
                // Update existing record
                $result = $this->M_car->update($car_id, $data);
                $message = 'Data mobil berhasil diperbarui';
                
                // Delete old image if it was replaced
                if (!empty($old_image) && $old_image !== $image_path && file_exists(FCPATH . $old_image)) {
                    @unlink(FCPATH . $old_image);
                }
            }

            if ($result) {
                $car_data = $this->M_car->get_by_id($result ?: $car_id);
                $response = [
                    'status' => true,
                    'message' => $message,
                    'data' => $car_data
                ];
            } else {
                throw new Exception('Gagal menyimpan data mobil');
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
                throw new Exception('ID mobil tidak valid');
            }
            
            // Get car data to delete image file
            $car = $this->M_car->get_by_id($id);
            
            if (!$car) {
                throw new Exception('Data mobil tidak ditemukan');
            }
            
            // Delete the car record (soft delete)
            $result = $this->M_car->delete($id);
            
            if ($result) {
                // Delete the image file if exists
                if (!empty($car['image']) && file_exists(FCPATH . $car['image'])) {
                    @unlink(FCPATH . $car['image']);
                }
                
                $response = [
                    'status' => true,
                    'message' => 'Data mobil berhasil dihapus'
                ];
            } else {
                throw new Exception('Gagal menghapus data mobil');
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