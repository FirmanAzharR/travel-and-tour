<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_booking');
        $this->load->helper('pdf');
        
        // Load TCPDF library
        $tcpdf_path = APPPATH.'third_party/tcpdf/tcpdf.php';
        if (!file_exists($tcpdf_path)) {
            // Try alternative path
            $tcpdf_path = FCPATH.'assets/tcpdf/tcpdf.php';
            if (!file_exists($tcpdf_path)) {
                die('TCPDF library not found. Please ensure TCPDF is installed in the correct location.');
            }
        }
        require_once($tcpdf_path);
    }

    public function booking_carter_bus()
    {
        // Check if request is AJAX
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // Set validation rules
        $this->form_validation->set_rules('customer_name', 'Nama Customer', 'required|trim');
        $this->form_validation->set_rules('wa_number', 'Nomor WhatsApp', 'required|trim');
        $this->form_validation->set_rules('total_passengers', 'Jumlah Penumpang', 'required|numeric');
        $this->form_validation->set_rules('booking_date_start', 'Tanggal Mulai Sewa', 'required');
        $this->form_validation->set_rules('booking_date_end', 'Tanggal Selesai Sewa', 'required');
        $this->form_validation->set_rules('pickup_time', 'Waktu Jemput', 'required');
        $this->form_validation->set_rules('pickup_address', 'Alamat Penjemputan', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
        } else {
            // Prepare data for database
            $data = [
                'customer_name' => $this->input->post('customer_name'),
                'wa_number' => $this->input->post('wa_number'),
                'total_passengers' => $this->input->post('total_passengers'),
                'booking_date_start' => $this->input->post('booking_date_start'),
                'booking_date_end' => $this->input->post('booking_date_end'),
                'pickup_time' => $this->input->post('pickup_time'),
                'pickup_address' => $this->input->post('pickup_address')
            ];

            // Insert data to database
            $result = $this->M_booking->save_carter_bus_booking($data);

            if ($result) {
                $response = [
                    'status' => 'success',
                    'message' => 'Pesanan berhasil dikirim. Tim kami akan segera menghubungi Anda.'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.'
                ];
            }
        }

        // Send JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Fungsi untuk memuat view booking sesuai permintaan AJAX
    public function load_view($type)
    {
        // Whitelist nama file yang boleh diakses
        $allowed = [
            'v_travel_wisata_jogja',
            'v_travel_bandara',
            'v_rental_mobil',
            'v_carter_bus'
        ];
        if (in_array($type, $allowed)) {
            $this->load->view('booking/' . $type);
        } else {
            show_404();
        }
    }

    public function booking_travel_wisata_jogja()
    {
        // Load booking model
        $this->load->model('M_booking');

        // Set validation rules for travel booking
        $this->form_validation->set_rules('wa-number', 'WhatsApp Number', 'required', ['required' => 'WhatsApp Number harus diisi']);
        $this->form_validation->set_rules('booking-date', 'Booking Date', 'required', ['required' => 'Booking Date harus diisi']);
        $this->form_validation->set_rules('pickup-address', 'Pickup Address', 'required', ['required' => 'Pickup Address harus diisi']);
        $this->form_validation->set_rules('total-passenger', 'Total Passengers', 'required', ['required' => 'Total Passengers harus diisi']);
        $this->form_validation->set_rules('tour-destination', 'Tour Destination', 'required', ['required' => 'Tour Destination harus diisi']);
        $this->form_validation->set_rules('duration', 'Duration', 'required', ['required' => 'Duration harus diisi']);
        $this->form_validation->set_rules('car-type', 'Car Name', 'required', ['required' => 'Car Name harus diisi']);

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form dengan error
            $this->load->view('booking/v_travel_wisata_jogja');
        } else {
        // Generate booking code
        $date = date('YmdHis');
        $random = mt_rand(1000, 9999);
        $booking_code = 'WTR-' . $date . '-' . $random;

        // Ambil data dari form
        $data = array(
            'booking_code'      => $booking_code,
            'wa_number'         => $this->input->post('wa-number'),
            'booking_date'      => $this->input->post('booking-date'),
            'pickup_address'    => $this->input->post('pickup-address'),
            'total_passengers'  => $this->input->post('total-passenger'),
            'tour_destination'  => $this->input->post('tour-destination'),
            'duration'          => $this->input->post('duration'),
            'car_name'          => $this->input->post('car-type')
        );

        // Simpan ke database
        $result = $this->M_booking->insert_data($data);

        if ($result) {
            // Return JSON response with all booking data
            $response = [
                'status' => 'success',
                'booking_code' => $booking_code,
                'customer_name' => $this->input->post('name'),
                'wa_number' => $this->input->post('wa-number'),
                'booking_date' => $this->input->post('booking-date'),
                'pickup_address' => $this->input->post('pickup-address'),
                'total_passenger' => $this->input->post('total-passenger'),
                'tour_destination' => $this->input->post('tour-destination'),
                'duration' => $this->input->post('duration'),
                'car_type' => $this->input->post('car-type'),
                'pickup_time' => $this->input->post('pickup-time')
            ];
            
            // Set content type to JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return;
        } else {
            // Return error response
            $response = [
                'status' => 'error',
                'message' => 'Gagal menyimpan booking.'
            ];
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return;
        }
    }
    }


    public function booking_travel_bandara()
    {
    // Load booking model
    $this->load->model('M_booking');

    // Set validation rules sesuai form antar-bandara
    $this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama harus diisi']);
    $this->form_validation->set_rules('wa-number', 'WhatsApp Number', 'required', ['required' => 'WhatsApp Number harus diisi']);
    $this->form_validation->set_rules('total-passengers', 'Total Penumpang', 'required', ['required' => 'Total Penumpang harus diisi']);
    $this->form_validation->set_rules('pickup-address', 'Pickup Address', 'required', ['required' => 'Pickup Address harus diisi']);
    $this->form_validation->set_rules('airport-name', 'Airport Name', 'required', ['required' => 'Airport Name harus diisi']);
    $this->form_validation->set_rules('booking-date', 'Booking Date', 'required', ['required' => 'Booking Date harus diisi']);
    $this->form_validation->set_rules('pickup-time', 'Pickup Time', 'required', ['required' => 'Pickup Time harus diisi']);
    $this->form_validation->set_rules('flight-time', 'Flight Time', 'required', ['required' => 'Flight Time harus diisi']);
    $this->form_validation->set_rules('flight-number', 'Flight Number', 'required', ['required' => 'Flight Number harus diisi']);
    $this->form_validation->set_rules('services', 'Services', 'required', ['required' => 'Services harus diisi']);
    $this->form_validation->set_rules('box', 'Barang Bagasi', 'required', ['required' => 'Barang Bagasi harus diisi']);

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, tampilkan kembali form dengan error
        $this->load->view('booking/v_travel_bandara');
    } else {
        // Ambil data dari form
        $data = array(
            'customer_name'     => $this->input->post('wa-number'),
            'wa_number'         => $this->input->post('wa-number'),
            'total_passengers'  => $this->input->post('total-passenger'),
            'pickup_address'    => $this->input->post('pickup-address'),
            'airport_name'      => $this->input->post('airport-name'),
            'booking_date'      => $this->input->post('booking-date'),
            'pickup_time'       => $this->input->post('pickup-time'),
            'flight_time'       => $this->input->post('flight-time'),
            'flight_number'     => $this->input->post('flight-number'),
            'services'          => $this->input->post('services'),
            'luggage_items'               => $this->input->post('box'),
        );

        // Simpan ke database
        $result = $this->M_booking->insert_data_booking_travel_bandara($data);

        if ($result) {
            $this->session->set_flashdata('success', 'Booking berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan booking.');
        }
        // Redirect ke halaman sukses atau booking lagi
        redirect('booking/booking_travel_bandara');
    }
    }

    public function booking_travel_bandara_pp()
    {
        // Load booking model
        $this->load->model('M_booking');

        // Set validation rules sesuai form pulang-pergi bandara
        $this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama harus diisi']);
        $this->form_validation->set_rules('wa-number', 'WhatsApp Number', 'required', ['required' => 'WhatsApp Number harus diisi']);
        $this->form_validation->set_rules('total-passengers', 'Total Penumpang', 'required', ['required' => 'Total Penumpang harus diisi']);
        $this->form_validation->set_rules('pickup-address', 'Pickup Address', 'required', ['required' => 'Pickup Address harus diisi']);
        $this->form_validation->set_rules('airport-name', 'Airport Name', 'required', ['required' => 'Airport Name harus diisi']);
        $this->form_validation->set_rules('booking-date', 'Booking Date', 'required', ['required' => 'Booking Date harus diisi']);
        $this->form_validation->set_rules('pickup-time', 'Pickup Time', 'required', ['required' => 'Pickup Time harus diisi']);

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, balas error detail
            $errors = $this->form_validation->error_array();
            $error_message = 'Gagal menyimpan booking. Data tidak valid.';
            if (!empty($errors)) {
                $error_message .= "\n";
                foreach ($errors as $field => $msg) {
                    $error_message .= $msg . "\n";
                }
            }
            echo $error_message;
            return;
        } else {
            // Ambil data dari form
            $data = array(
                'customer_name'     => $this->input->post('name'),
                'wa_number'         => $this->input->post('wa-number'),
                'total_passengers'  => $this->input->post('total-passengers'),
                'pickup_address'    => $this->input->post('pickup-address'),
                'airport_name'      => $this->input->post('airport-name'),
                'booking_date'      => $this->input->post('booking-date'),
                'pickup_time'       => $this->input->post('pickup-time'),
            );

            // Simpan ke database (bisa gunakan insert_data_booking_travel_bandara atau buat baru jika ingin terpisah)
            $result = $this->M_booking->insert_data_booking_travel_bandara($data);

            if ($result) {
                echo 'Booking berhasil disimpan';
            } else {
                $db_error = $this->db->error();
                echo 'Gagal menyimpan booking. DB Error: ' . $db_error['message'];
            }
            return;
        }
    }

    public function booking_travel_bandara_pickup()
    {
    // Load booking model
    $this->load->model('M_booking');

    // Set validation rules sesuai form antar-bandara
    $this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama harus diisi']);
    $this->form_validation->set_rules('wa-number', 'WhatsApp Number', 'required', ['required' => 'WhatsApp Number harus diisi']);
    $this->form_validation->set_rules('total-passengers', 'Total Penumpang', 'required', ['required' => 'Total Penumpang harus diisi']);
    $this->form_validation->set_rules('pickup-address', 'Pickup Address', 'required', ['required' => 'Pickup Address harus diisi']);
    $this->form_validation->set_rules('airport-name', 'Airport Name', 'required', ['required' => 'Airport Name harus diisi']);
    $this->form_validation->set_rules('booking-date', 'Booking Date', 'required', ['required' => 'Booking Date harus diisi']);
    $this->form_validation->set_rules('arrival-time', 'Arrival Time', 'required', ['required' => 'Arrival Time harus diisi']);
    $this->form_validation->set_rules('flight-number', 'Flight Number', 'required', ['required' => 'Flight Number harus diisi']);
    $this->form_validation->set_rules('services', 'Services', 'required', ['required' => 'Services harus diisi']);
    $this->form_validation->set_rules('box', 'Barang Bagasi', 'required', ['required' => 'Barang Bagasi harus diisi']);

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, balas error detail
        $errors = $this->form_validation->error_array();
        $error_message = 'Gagal menyimpan booking. Data tidak valid.';
        if (!empty($errors)) {
            $error_message .= "\n";
            foreach ($errors as $field => $msg) {
                $error_message .= $msg . "\n";
            }
        }
        echo $error_message;
        return;
    } else {
        // Ambil data dari form jemput-bandara
        $data = array(
            'customer_name'     => $this->input->post('name'),
            'wa_number'         => $this->input->post('wa-number'),
            'total_passengers'  => $this->input->post('total-passengers'),
            'pickup_address'    => $this->input->post('pickup-address'),
            'airport_name'      => $this->input->post('airport-name'),
            'booking_date'      => $this->input->post('booking-date'),
            'arrival_time'      => $this->input->post('arrival-time'),
            'flight_number'     => $this->input->post('flight-number'),
            'services'          => $this->input->post('services'),
            'luggage_items'     => $this->input->post('box'),
        );

        // Simpan ke database
        $result = $this->M_booking->insert_data_booking_travel_bandara_pickup($data);

        if ($result) {
            echo 'Booking berhasil disimpan';
        } else {
            $db_error = $this->db->error();
            echo 'Gagal menyimpan booking. DB Error: ' . $db_error['message'];
        }
        return;
    }
    }

    public function booking_rental_mobil()
    {
        // Load necessary models
        $this->load->model('M_booking');
        $this->load->model('M_car');

        // Set validation rules
        $this->form_validation->set_rules('customer_name', 'Nama Customer', 'required', ['required' => 'Nama Customer harus diisi']);
        $this->form_validation->set_rules('wa_number', 'Nomor WhatsApp', 'required', ['required' => 'Nomor WhatsApp harus diisi']);
        $this->form_validation->set_rules('booking_date_start', 'Tanggal Mulai Sewa', 'required', ['required' => 'Tanggal Mulai Sewa harus diisi']);
        $this->form_validation->set_rules('booking_date_end', 'Tanggal Selesai Sewa', 'required', ['required' => 'Tanggal Selesai Sewa harus diisi']);
        $this->form_validation->set_rules('duration', 'Durasi', 'required', ['required' => 'Durasi harus diisi']);
        $this->form_validation->set_rules('pickup-address', 'Alamat Penjemputan', 'required', ['required' => 'Alamat Penjemputan harus diisi']);
        $this->form_validation->set_rules('booking-type', 'Tipe Booking', 'required', ['required' => 'Tipe Booking harus diisi']);
        $this->form_validation->set_rules('rute-pemakaian', 'Rute Pemakaian', 'required', ['required' => 'Rute Pemakaian harus diisi']);
        $this->form_validation->set_rules('car_id', 'Mobil', 'required', ['required' => 'Pilih mobil terlebih dahulu']);
        $this->form_validation->set_rules('car_name', 'Nama Mobil', 'required');

        $response = ['status' => 'error', 'message' => ''];

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal
            $response['message'] = validation_errors('', '\n');
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
            return;
        }

        try {
            // Prepare booking data
            $booking_data = [
                'customer_name' => $this->input->post('customer_name'),
                'wa_number' => $this->input->post('wa_number'),
                'booking_date_start' => $this->input->post('booking_date_start'),
                'booking_date_end' => $this->input->post('booking_date_end'),
                'duration' => $this->input->post('duration'),
                'pickup_address' => $this->input->post('pickup-address'),
                'booking_type' => $this->input->post('booking-type'),
                'route' => $this->input->post('rute-pemakaian'),
                'car_id' => $this->input->post('car_id'),
                'car_name' => $this->input->post('car_name'),
                // 'created_at' => date('Y-m-d H:i:s')
                // 'status' => 'pending'
            ];

            // Insert booking data
            $booking_id = $this->M_booking->insert_rental_booking($booking_data);

            if ($booking_id) {
                $response = [
                    'status' => 'success',
                    'message' => 'Pesanan rental mobil berhasil dibuat',
                    'booking_id' => $booking_id
                ];
                $this->output
                    ->set_content_type('application/json', 'utf-8')
                    ->set_status_header(200)
                    ->set_output(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
            } else {
                throw new Exception('Gagal menyimpan data booking');
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
$this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_status_header(500)
                ->set_output(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        }
    }
    
    public function generate_pdf() {
        try {
            // Get all POST data
            $data = $this->input->post();
            
            // Load the PDF helper
            $this->load->helper('pdf');
            
            // Generate PDF using the helper function
            $pdfUrl = generate_booking_pdf($data);
            
            if ($pdfUrl) {
                $response = [
                    'status' => 'success',
                    'pdf_url' => $pdfUrl
                ];
            } else {
                throw new Exception('Gagal membuat PDF');
            }
            
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_status_header(200)
                ->set_output(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                
        } catch (Exception $e) {
            $response = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
            
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_status_header(500)
                ->set_output(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        }
    }
}
