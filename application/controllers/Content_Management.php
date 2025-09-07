<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Content_Management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_content');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        // $this->load->library('auth_libraries');
        // $this->auth_libraries->is_logged_in();
        // $this->auth_libraries->is_admin();
    }

    public function index()
    {
        $data = array(
            'title' => 'Content Management',
            'description' => '',
            'content' => 'content/v_content',
        );
        $this->load->view('dashboard/v_template', $data, false);
    }

    public function load_view($view_name)
    {
        $allowed_views = [
            'content_top' => 'content/v_content_top',
            'content_contact' => 'content/v_content_contact',
            'content_gallery' => 'content/v_content_gallery',
            'content_popup' => 'content/v_content_popup'
        ];

        if (array_key_exists($view_name, $allowed_views)) {
            $data = [];
            if ($view_name === 'content_top') {
                $data['latest_logo'] = $this->get_logo_data();
                $data['web_data'] = $this->m_content->get_web_title_description();
                $data['video_data'] = $this->m_content->get_video(); // Load video data
            } elseif ($view_name === 'content_popup') {
                $data['images'] = $this->m_content->get_popup_images();
            } elseif ($view_name === 'content_gallery') {
                $data['images'] = $this->m_content->get_gallery_images();
            }
            $this->load->view($allowed_views[$view_name], $data);
        } else {
            echo "View not found.";
        }
    }

    public function public_gallery_list()
    {
        // Public endpoint that returns gallery images as JSON (no auth)
        header('Content-Type: application/json');

        $images = $this->m_content->get_gallery_images();
        $data = [];
        if ($images) {
            foreach ($images as $img) {
                $data[] = [
                    'id' => $img->id,
                    'url_image' => base_url($img->url_image),
                    'path' => $img->url_image,
                    'created_at' => $img->created_at ?? null
                ];
            }
        }

        echo json_encode([
            'status' => 'success',
            'data' => $data
        ]);
        return;
    }

    /**
     * Ambil object logo aktif dari database
     */
    private function get_logo_data()
    {
        return $this->m_content->get_active_logo();
    }

    /**
     * API untuk ambil logo via AJAX
     */
    public function get_active_logo()
    {
        $latest_logo = $this->get_logo_data();
        if ($latest_logo && !empty($latest_logo->url_image)) {
            echo json_encode([
                'status' => 'success',
                'image_url' => base_url($latest_logo->url_image)
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Logo tidak ditemukan'
            ]);
        }
    }

    public function upload_logo()
    {
        header('Content-Type: application/json');
        
        if (empty($_FILES['logo']['name'])) {
            echo json_encode(['status' => 'error', 'message' => 'Tidak ada file yang dipilih']);
            return;
        }

        $config['upload_path'] = './media_uploads/logo-image/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('logo')) {
            echo json_encode([
                'status' => 'error',
                'message' => $this->upload->display_errors('', '')
            ]);
            return;
        }

        $upload_data = $this->upload->data();
        $image_path = 'media_uploads/logo-image/' . $upload_data['file_name'];

        $logo_data = [
            'url_image' => $image_path,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Get the current active logo
        $current_logo = $this->m_content->get_active_logo();
        
        if ($current_logo) {
            // Update existing logo
            $result = $this->m_content->update_logo($current_logo->id, $logo_data);
        } else {
            // Insert new logo if none exists
            $logo_data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->m_content->save_logo($logo_data);
        }

        if ($result) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Logo berhasil diupdate',
                'image_url' => base_url($image_path)
            ]);
        } else {
            // If database operation fails, delete the uploaded file
            unlink($upload_data['full_path']);
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menyimpan data ke database'
            ]);
        }
    }

    /**
     * Update website title and description via AJAX
     */
    public function update_web_title_description() {
        // Check if this is an AJAX request
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        
        $response = [
            'status' => 'error',
            'message' => 'Gagal menyimpan data'
        ];
        
        // Get POST data
        $title = $this->input->post('title', true);
        $description = $this->input->post('description', true);
        
        if (empty($title) || empty($description)) {
            $response['message'] = 'Judul dan deskripsi tidak boleh kosong';
            echo json_encode($response);
            return;
        }
        
        $data = [
            'title' => $title,
            'description' => $description,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        if ($this->m_content->update_web_title_description($data)) {
            $response['status'] = 'success';
            $response['message'] = 'Data berhasil disimpan';
        }
        
        echo json_encode($response);
    }

    /**
     * Update video via AJAX
     */
    public function update_video() {
        // Check if this is an AJAX request
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        
        $response = [
            'status' => 'error',
            'message' => 'Gagal menyimpan video'
        ];
        
        // Get POST data
        $video_url = $this->input->post('video_url', true);
        
        if (empty($video_url)) {
            $response['message'] = 'Link video tidak boleh kosong';
            echo json_encode($response);
            return;
        }
        
        // Extract video ID from YouTube URL
        $video_id = '';
        $youtube_match = [];
        if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([^&\n?#]+)/', $video_url, $youtube_match)) {
            $video_id = $youtube_match[1];
        }
        
        if (empty($video_id)) {
            $response['message'] = 'Link video YouTube tidak valid';
            echo json_encode($response);
            return;
        }
        
        $data = [
            'link_video' => $video_url,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        if ($this->m_content->update_video($data)) {
            $response['status'] = 'success';
            $response['message'] = 'Video berhasil disimpan';
            $response['embed_url'] = 'https://www.youtube.com/embed/' . $video_id;
        }
        
        echo json_encode($response);
    }

    /**
     * Update contact information via AJAX
     */
    public function update_contact() {
        // Check if this is an AJAX request
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        
        $response = [
            'status' => 'error',
            'message' => 'Gagal menyimpan data kontak'
        ];
        
        // Get POST data
        $data = [
            'whatsapp' => $this->input->post('whatsapp', true),
            'email' => $this->input->post('email', true),
            'alamat' => $this->input->post('alamat', true),
            'fb' => $this->input->post('facebook', true),
            'ig' => $this->input->post('instagram', true),
            'twitter' => $this->input->post('twitter', true),
            'tiktok' => $this->input->post('tiktok', true)
        ];
        
        // Update contact information
        if ($this->m_content->update_contact($data)) {
            $response['status'] = 'success';
            $response['message'] = 'Data kontak berhasil disimpan';
        }
        
        echo json_encode($response);
    }

    /**
     * Handle popup image upload
     */
    public function upload_popup_image()
    {
        header('Content-Type: application/json');
        
        // Check if max images reached
        $current_count = $this->m_content->count_popup_images();
        if ($current_count >= 10) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Maksimal 10 gambar telah tercapai. Hapus gambar yang tidak digunakan terlebih dahulu.'
            ]);
            return;
        }
        
        if (empty($_FILES['image']['name'])) {
            echo json_encode(['status' => 'error', 'message' => 'Tidak ada file yang dipilih']);
            return;
        }

        $config['upload_path'] = './media_uploads/popup-images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            $upload_data = $this->upload->data();
            $image_path = 'media_uploads/popup-images/' . $upload_data['file_name'];
            
            // Save to database
            $data = [
                'url_image' => $image_path,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            $result = $this->m_content->save_popup_image($data);
            
            if ($result) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Gambar berhasil diupload',
                    'image_id'  => $result,
                    'image_url' => base_url($image_path)
                ]);
            } else {
                // Delete the uploaded file if database insert fails
                unlink($config['upload_path'] . $upload_data['file_name']);
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Gagal menyimpan informasi gambar ke database'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => $this->upload->display_errors('', '')
            ]);
        }
    }
    
    /**
     * Handle popup image deletion
     * 
     * @param int $id Image ID to delete
     */
    public function delete_popup_image($id = null)
    {
        header('Content-Type: application/json');
        
        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID gambar tidak valid'
            ]);
            return;
        }
        
        // Get image data before deletion
        $image = $this->m_content->get_popup_image($id);
        
        if (!$image) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gambar tidak ditemukan'
            ]);
            return;
        }
        
        // Perform soft delete
        $result = $this->m_content->delete_popup_image($id);
        
        if ($result) {
            // Delete the physical file
            $file_path = FCPATH . $image->url_image;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            echo json_encode([
                'status' => 'success',
                'message' => 'Gambar berhasil dihapus'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus gambar'
            ]);
        }
    }
    
    /**
     * Handle gallery image upload
     */
    public function upload_gallery_image()
    {
        header('Content-Type: application/json');
        
        // Check if max images reached
        $current_count = $this->m_content->count_gallery_images();
        if ($current_count >= 10) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Maksimal 10 gambar telah tercapai. Hapus gambar yang tidak digunakan terlebih dahulu.'
            ]);
            return;
        }
        
        if (empty($_FILES['image']['name'])) {
            echo json_encode(['status' => 'error', 'message' => 'Tidak ada file yang dipilih']);
            return;
        }

        $config['upload_path'] = './media_uploads/gallery-images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            $upload_data = $this->upload->data();
            $image_path = 'media_uploads/gallery-images/' . $upload_data['file_name'];
            
            // Save to database
            $data = [
                'url_image' => $image_path,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            $result = $this->m_content->save_gallery_image($data);
            
            if ($result) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Gambar gallery berhasil diupload',
                    'image_id'  => $result,
                    'image_url' => base_url($image_path)
                ]);
            } else {
                // Delete the uploaded file if database insert fails
                unlink($config['upload_path'] . $upload_data['file_name']);
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Gagal menyimpan informasi gambar gallery ke database'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => $this->upload->display_errors('', '')
            ]);
        }
    }
    
    /**
     * Handle gallery image deletion
     * 
     * @param int $id Image ID to delete
     */
    public function delete_gallery_image($id = null)
    {
        header('Content-Type: application/json');
        
        if (!$id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'ID gambar gallery tidak valid'
            ]);
            return;
        }
        
        // Get image data before deletion
        $image = $this->m_content->get_gallery_image($id);
        
        if (!$image) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gambar gallery tidak ditemukan'
            ]);
            return;
        }
        
        // Perform soft delete
        $result = $this->m_content->delete_gallery_image($id);
        
        if ($result) {
            // Delete the physical file
            $file_path = FCPATH . $image->url_image;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            echo json_encode([
                'status' => 'success',
                'message' => 'Gambar gallery berhasil dihapus'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menghapus gambar gallery'
            ]);
        }
    }
}