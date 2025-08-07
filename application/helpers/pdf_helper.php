<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('generate_booking_pdf')) {
    function generate_booking_pdf($data) {
        $ci =& get_instance();

        // Load TCPDF library
        require_once(APPPATH . 'third_party/tcpdf/tcpdf.php');

        // Konfigurasi file PDF
        $filename = 'booking_wisata_' . $data['booking_code'] . '.pdf';
        $folder_path = FCPATH . 'generate_pdf/';
        $filepath = $folder_path . $filename;

        // Buat PDF baru
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Info dokumen
        $pdf->SetCreator('Wak Trans');
        $pdf->SetAuthor('Wak Trans');
        $pdf->SetTitle('Konfirmasi Pemesanan - ' . $data['booking_code']);

        // Header logo & judul
        $logo_path = FCPATH . 'landing-page/assets/img/base/logo.png';
        $header_title = 'Travel and Tour Wak Trans';
        $header_string = 'Konfirmasi Pemesanan - ' . $data['booking_code'];
        $pdf->SetHeaderData($logo_path, 20, $header_title, $header_string);

        // Font header/footer
        $pdf->setHeaderFont([PDF_FONT_NAME_MAIN, 'B', 10]);
        $pdf->setFooterFont([PDF_FONT_NAME_DATA, '', 8]);

        // Font default
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // Margin
        $pdf->SetMargins(15, 40, 15);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);

        // Break halaman
        $pdf->SetAutoPageBreak(true, 25);

        // Tambahkan halaman
        $pdf->AddPage();

        // Font isi
        $pdf->SetFont('helvetica', '', 11);

        // HTML isi PDF
        $html = '
        <style>
            h1.title {
                color: #0D83FD;
                font-size: 18px;
                margin: 5px 0;
            }
            h2.subtitle {
                font-size: 14px;
                margin: 0;
                color: #333;
            }
            .info-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 15px;
                font-size: 11px;
            }
            .info-table th {
                background-color: #f2f2f2;
                text-align: left;
                padding: 6px;
            }
            .info-table td {
                padding: 6px;
            }
            .footer-note {
                font-size: 10px;
                text-align: center;
                color: #555;
                margin-top: 30px;
            }
        </style>

        <div style="text-align: center; margin-bottom: 10px;">
            <img src="' . $logo_path . '" height="50" />
            <h1 class="title">Travel and Tour Wak Trans</h1>
            <h2 class="subtitle">Tiket Wisata Jogja</h2>
        </div>

        <p style="text-align: center; font-size: 11px; margin-bottom: 10px;">
            Terima kasih telah melakukan pemesanan. Berikut detail pemesanan Anda:
        </p>

        <table border="1" class="info-table">
            <tr>
                <th width="40%">Kode Booking</th>
                <td>' . $data['booking_code'] . '</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>' . $data['customer_name'] . '</td>
            </tr>
            <tr>
                <th>No. WhatsApp</th>
                <td>' . $data['wa_number'] . '</td>
            </tr>
            <tr>
                <th>Tujuan Wisata</th>
                <td>' . $data['tour_destination'] . '</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>' . $data['booking_date'] . '</td>
            </tr>
            <tr>
                <th>Waktu Jemput</th>
                <td>' . ($data['pickup_time'] ?? '-') . '</td>
            </tr>
            <tr>
                <th>Durasi</th>
                <td>' . ($data['duration'] ?? '-') . '</td>
            </tr>
            <tr>
                <th>Jumlah Penumpang</th>
                <td>' . $data['total_passenger'] . '</td>
            </tr>
            <tr>
                <th>Tipe Mobil</th>
                <td>' . ($data['car_type'] ?? '-') . '</td>
            </tr>
            <tr>
                <th>Alamat Penjemputan</th>
                <td>' . ($data['pickup_address'] ?? '-') . '</td>
            </tr>
        </table>

        <p class="footer-note">
            Simpan Tiket ini sampai transaksi berakhir. Terima kasih!
        </p>
        ';

        // Tulis HTML ke PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Cek folder
        if (!is_dir($folder_path)) {
            mkdir($folder_path, 0777, true);
        }

        // Simpan file
        $pdf->Output($filepath, 'F');

        // Kembalikan URL PDF
        return base_url('generate_pdf/' . $filename);
    }
}
