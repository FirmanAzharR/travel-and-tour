<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tour_Package extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tour_package');
        $this->load->library('upload');
        $this->load->helper('url');
        $this->load->helper('file');
    }

    public function index()
    {
        $data['title'] = 'Data Paket Tour';
        $this->load->view('master-data/v_tour_package', $data);
    }

    public function list_tour_package()
    {
        $list = $this->M_tour_package->get_datatable_data(
            $_POST['length'],
            $_POST['start'],
            $_POST['search']['value'] ?? '',
            $this->input->post('order')[0]['column'] ?? 0,
            $this->input->post('order')[0]['dir'] ?? 'asc'
        );

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $package) {
            $no++;
            $row = array();
            $row['DT_RowId'] = 'row_' . $package['id'];
            $row['id'] = $no;
            $row['name'] = $package['name'];
            $row['type'] = $package['type'];
            $row['description'] = $package['description'];
            $row['duration'] = $package['duration'] ?? '-';
            $row['price'] = $package['price'] ?? 0;
            $row['image'] = $package['image'] ? $package['image'] : '';
            $row['actions'] = '<div class="btn-group">
                                <button class="btn btn-sm btn-primary edit-btn" data-id="' . $package['id'] . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="' . $package['id'] . '">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>';
            $data[] = $row;
        }

        $output = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => $this->M_tour_package->count_all(),
            "recordsFiltered" => $this->M_tour_package->count_filtered($_POST['search']['value'] ?? ''),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    /**
     * Publicly accessible variant of list_tour_package.
     * Accepts GET or POST (uses input->get_post) so it can be called without token/login.
     */
    public function list_tour_package_public()
    {
        // allow both GET and POST parameters
        $length = $this->input->get_post('length') ?? 10;
        $start = $this->input->get_post('start') ?? 0;

        $searchRaw = $this->input->get_post('search');
        $search = '';
        if (is_array($searchRaw) && isset($searchRaw['value'])) {
            $search = $searchRaw['value'];
        } elseif (is_string($searchRaw)) {
            $search = $searchRaw;
        }

        $order = $this->input->get_post('order');
        $order_col = $order[0]['column'] ?? 0;
        $order_dir = $order[0]['dir'] ?? 'asc';

        $list = $this->M_tour_package->get_datatable_data(
            $length,
            $start,
            $search,
            $order_col,
            $order_dir
        );

        $data = array();
        $no = $start;
        foreach ($list as $package) {
            $no++;
            $row = array();
            $row['DT_RowId'] = 'row_' . $package['id'];
            $row['id'] = $no;
            $row['name'] = $package['name'];
            $row['type'] = $package['type'];
            $row['description'] = $package['description'];
            $row['duration'] = $package['duration'] ?? '-';
            $row['price'] = $package['price'] ?? 0;
            $row['image'] = $package['image'] ? $package['image'] : '';
            $row['actions'] = '<div class="btn-group">
                                <button class="btn btn-sm btn-primary edit-btn" data-id="' . $package['id'] . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="' . $package['id'] . '">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>';
            $data[] = $row;
        }

        $output = array(
            "draw" => intval($this->input->get_post('draw') ?? 1),
            "recordsTotal" => $this->M_tour_package->count_all(),
            "recordsFiltered" => $this->M_tour_package->count_filtered($search),
            "data" => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function get($id)
    {
        $package = $this->M_tour_package->get_by_id($id);
        
        if ($package) {
            $response = [
                'status' => true,
                'data' => [
                    'id' => $package['id'],
                    'name' => $package['name'],
                    'type' => $package['type'],
                    'description' => $package['description'],
                    'duration' => $package['duration'] ?? '',
                    'price' => $package['price'] ?? 0,
                    'image' => $package['image'] ?? ''
                ],
                'message' => 'Data berhasil diambil'
            ];
        } else {
            $this->output->set_status_header(404);
            $response = [
                'status' => false,
                'message' => 'Data paket tidak ditemukan'
            ];
        }
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function save()
    {
        $response = ['status' => false, 'message' => ''];
        
        try {
            $config['upload_path'] = FCPATH . 'media_uploads/tour-package-image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true;

            // Create directory if not exists
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->upload->initialize($config);

            $image_path = '';
            $package_id = $this->input->post('id');
            $existing_image = '';
            
            // Get existing image path if updating
            if (!empty($package_id)) {
                $existing_package = $this->M_tour_package->get_by_id($package_id);
                $existing_image = $existing_package['image'] ?? '';
            }

            // Handle file upload if a new image is provided
            if (!empty($_FILES['image']['name'])) {
                // Delete old image if exists and new image is being uploaded
                if (!empty($existing_image) && file_exists(FCPATH . $existing_image)) {
                    @unlink(FCPATH . $existing_image);
                }
                
                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $image_path = 'media_uploads/tour-package-image/' . $upload_data['file_name'];
                } else {
                    throw new Exception($this->upload->display_errors('', ''));
                }
            } elseif (!empty($package_id) && !empty($existing_image)) {
                // Keep the existing image if no new image is uploaded during update
                $image_path = $existing_image;
            }

            $data = [
                'name' => $this->input->post('name'),
                'type' => $this->input->post('type'),
                'description' => $this->input->post('description'),
                'duration' => $this->input->post('duration'),
                'price' => $this->input->post('price'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Add image path to data if we have one
            if (!empty($image_path)) {
                $data['image'] = $image_path;
            }

            if (empty($package_id)) {
                // Insert new record
                $data['created_at'] = date('Y-m-d H:i:s');
                $result = $this->M_tour_package->save($data);
                $message = 'Data paket berhasil ditambahkan';
            } else {
                // Update existing record
                $result = $this->M_tour_package->update($package_id, $data);
                $message = 'Data paket berhasil diperbarui';
            }

            if ($result) {
                $package_data = $this->M_tour_package->get_by_id($result ?: $package_id);
                $response = [
                    'status' => true,
                    'message' => $message,
                    'data' => $package_data
                ];
            } else {
                throw new Exception('Gagal menyimpan data paket');
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            $this->output->set_status_header(400);
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
                throw new Exception('ID paket tidak valid');
            }
            
            // Get package data to delete image file
            $package = $this->M_tour_package->get_by_id($id);
            
            if (!$package) {
                throw new Exception('Data paket tidak ditemukan');
            }
            
            // Delete the package record (soft delete)
            $result = $this->M_tour_package->delete($id);
            
            if ($result) {
                // Delete the image file if exists
                if (!empty($package['image']) && file_exists(FCPATH . $package['image'])) {
                    @unlink(FCPATH . $package['image']);
                }
                
                $response = [
                    'status' => true,
                    'message' => 'Data paket berhasil dihapus'
                ];
            } else {
                throw new Exception('Gagal menghapus data paket');
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            $this->output->set_status_header(400);
        }

        // Send JSON response
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }

    /**
     * Public booking endpoint used by landing page.
     * Expects POST: tour_package_id, nama_pemesan, nomor_telepon
     * Inserts into `package_booking` and returns JSON.
     */
    public function book()
    {
        $response = ['status' => false, 'message' => ''];

        try {
            $tour_package_id = $this->input->post('tour_package_id');
            $nama = trim($this->input->post('nama_pemesan'));
            $phone = trim($this->input->post('nomor_telepon'));

            if (empty($tour_package_id) || empty($nama) || empty($phone)) {
                throw new Exception('Data tidak lengkap');
            }

            // generate simple booking code: PKB + timestamp + random 3
            $booking_code = 'PKB' . date('YmdHis') . rand(100, 999);

            $data = [
                'tour_package_id' => $tour_package_id,
                'nama_pemesan' => $nama,
                'nomor_telepon' => $phone,
                'booking_code' => $booking_code,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('package_booking', $data);
            $insert_id = $this->db->insert_id();

            if ($insert_id) {
                $response['status'] = true;
                $response['message'] = 'Booking berhasil';
                $response['data'] = array_merge(['id' => $insert_id], $data);
            } else {
                throw new Exception('Gagal menyimpan booking');
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            $this->output->set_status_header(400);
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}