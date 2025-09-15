<section id="travel-wisata-jogja" class="travel-section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Travel Wisata Jogja</h2>
        <p>Jelajahi keindahan Yogyakarta dengan layanan travel terpercaya kami. Nikmati perjalanan yang nyaman dan
            berkesan bersama keluarga.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4 g-lg-12">
            <div class="col-lg-12">
                <div class="booking-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="booking-header">
                        <h3><i class="fas fa-map-marked-alt"></i>Booking Sekarang</h3>
                        <p>Isi form di bawah ini untuk melakukan pemesanan travel wisata Jogja. Tim kami akan segera
                            menghubungi Anda via WhatsApp.</p>
                    </div>

                    <form id="booking-travel-form" action="javascript:void(0);" method="post" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user"></i> Nama Lengkap</label>
                                <div class="input-wrapper">
                                    <input type="text" id="name" name="name" class="form-control modern-input"
                                        placeholder="Masukkan nama lengkap Anda" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="wa-number"><i class="fab fa-whatsapp"></i> Nomor WhatsApp</label>
                                <div class="input-wrapper">
                                    <input type="tel" id="wa-number" class="form-control modern-input" name="wa-number"
                                        placeholder="08xxxxxxxxxx" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total-passenger"><i class="fas fa-users"></i> Jumlah Penumpang</label>
                                <div class="input-wrapper">
                                    <input type="number" id="total-passenger" class="form-control modern-input"
                                        name="total-passenger" placeholder="Jumlah orang" min="1" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tour-destination"><i class="fas fa-map-marker-alt"></i> Destinasi
                                    Wisata</label>
                                <div class="input-wrapper">
                                    <input type="text" id="tour-destination" class="form-control modern-input"
                                        name="tour-destination" placeholder="Contoh: Malioboro, Taman Sari, dll"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="booking-date"><i class="fas fa-calendar-alt"></i> Tanggal
                                    Keberangkatan</label>
                                <div class="input-wrapper">
                                    <input type="date" id="booking-date" class="form-control modern-input"
                                        name="booking-date" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pickup-time"><i class="fas fa-clock"></i> Waktu Penjemputan</label>
                                <div class="input-wrapper">
                                    <input type="time" id="pickup-time" class="form-control modern-input"
                                        name="pickup-time" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="duration"><i class="fas fa-hourglass-half"></i> Durasi</label>
                                <div class="input-wrapper">
                                    <input type="text" id="duration" class="form-control modern-input" name="duration"
                                        placeholder="Contoh: 1 hari, 2 hari 1 malam" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="car-type"><i class="fas fa-car"></i> Tipe Kendaraan</label>
                                <div class="input-wrapper">
                                    <select id="car-type" class="form-control modern-input" name="car-type" required>
                                        <option value="">Pilih tipe kendaraan</option>
                                        <option value="Avanza">Avanza (7 seat)</option>
                                        <option value="Innova">Innova (8 seat)</option>
                                        <option value="Hiace">Hiace (16 seat)</option>
                                        <option value="Bus">Bus (25+ seat)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group full-width">
                                <label for="pickup-address"><i class="fas fa-map-pin"></i> Alamat Penjemputan</label>
                                <div class="input-wrapper">
                                    <input type="text" id="pickup-address" class="form-control modern-input"
                                        name="pickup-address" placeholder="Salin alamat lengkap dari Google Maps"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn-booking">
                                <i class="fas fa-check-circle me-2"></i>Booking Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const bookingForm = document.getElementById('booking-travel-form');
        if (bookingForm) {
            bookingForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const submitBtn = bookingForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Processing...';
                submitBtn.disabled = true;
                const formData = new FormData(bookingForm);
                Swal.fire({
                    title: 'Processing...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                fetch('<?= base_url('booking/booking_travel_wisata_jogja') ?>', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Show success message with loading and auto-redirect
                            Swal.fire({
                                title: 'Booking Berhasil!',
                                html: 'Mengalihkan ke WhatsApp dalam <b>3</b> detik...',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                                timer: 3000, // durasi 3 detik
                                timerProgressBar: true,
                                timer: 1500,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            }).then((result) => {

                                // This will be called when timer finishes or user clicks outside
                                const waNumber =
                                    '6288213761173'; // WhatsApp number with country code
                                const customerName = encodeURIComponent(data.customer_name);
                                const bookingCode = encodeURIComponent(data.booking_code);

                                // First, generate and download the PDF
                                //   const generatePDF = () => {
                                //       return new Promise((resolve) => {
                                //           const pdfForm = document.createElement(
                                //               'form');
                                //           pdfForm.method = 'POST';
                                //           pdfForm.action =
                                //               '<?= base_url('booking/generate_pdf') ?>';
                                //           pdfForm.target = '_blank';

                                //           // Add all form data to the PDF form
                                //           for (let [key, value] of Object.entries(
                                //                   data)) {
                                //               if (key !== 'status') {
                                //                   const input = document
                                //                       .createElement('input');
                                //                   input.type = 'hidden';
                                //                   input.name = key;
                                //                   input.value = value;
                                //                   pdfForm.appendChild(input);
                                //               }
                                //           }

                                //           // Add a hidden input to indicate we want to return the PDF path
                                //           const returnPathInput = document
                                //               .createElement('input');
                                //           returnPathInput.type = 'hidden';
                                //           returnPathInput.name = 'return_path';
                                //           returnPathInput.value = '1';
                                //           pdfForm.appendChild(returnPathInput);

                                //           // Create an iframe to handle the response
                                //           const iframe = document.createElement(
                                //               'iframe');
                                //           iframe.name = 'pdfIframe';
                                //           iframe.style.display = 'none';
                                //           document.body.appendChild(iframe);

                                //           // Handle the response from the iframe
                                //           iframe.onload = function() {
                                //               try {
                                //                   const response = JSON.parse(
                                //                       iframe
                                //                       .contentDocument
                                //                       .body.innerText);
                                //                   if (response.status ===
                                //                       'success') {
                                //                       resolve(response
                                //                           .pdf_url);
                                //                   } else {
                                //                       resolve(null);
                                //                   }
                                //               } catch (e) {
                                //                   resolve(null);
                                //               }
                                //               document.body.removeChild(
                                //                   iframe);
                                //           };

                                //           pdfForm.target = 'pdfIframe';
                                //           document.body.appendChild(pdfForm);
                                //           pdfForm.submit();
                                //       });
                                //   };

                                // Generate PDF first, then open WhatsApp
                                //   generatePDF().then((pdfUrl) => {
                                // Create WhatsApp message with PDF link
                                let message = `Halo, saya ${customerName}%0A`;
                                message +=
                                    `Saya sudah melakukan pemesanan tiket wisata dengan detail sebagai berikut:%0A%0A`;
                                message += `*Kode Booking*: ${bookingCode}%0A`;
                                message += `*Nama*: ${customerName}%0A`;
                                message +=
                                    `*No. WhatsApp*: ${encodeURIComponent(data.wa_number)}%0A`;
                                message +=
                                    `*Tujuan Wisata*: ${encodeURIComponent(data.tour_destination)}%0A`;
                                message +=
                                    `*Tanggal*: ${encodeURIComponent(data.booking_date)}%0A`;
                                message +=
                                    `*Waktu Jemput*: ${encodeURIComponent(data.pickup_time || '-')}%0A`;
                                message +=
                                    `*Durasi*: ${encodeURIComponent(data.duration || '-')}%0A`;
                                message +=
                                    `*Jumlah Penumpang*: ${encodeURIComponent(data.total_passenger)}%0A`;
                                message +=
                                    `*Tipe Mobil*: ${encodeURIComponent(data.car_type || '-')}%0A`;
                                message +=
                                    `*Alamat Penjemputan*: ${encodeURIComponent(data.pickup_address || '-')}%0A%0A`;

                                // if (pdfUrl) {
                                //     // Ensure the URL is properly formatted for WhatsApp
                                //     const cleanPdfUrl = pdfUrl.replace(
                                //         /^https?:\/\//, ''
                                //     ); // Remove http/https to prevent double protocols
                                //     message += `*TIKET PDF*%0A`;
                                //     message +=
                                //         `Silakan download tiket PDF di link berikut:%0A`;
                                //     message += `${cleanPdfUrl}%0A%0A`;
                                //     message +=
                                //         `Harap simpan tiket ini sampai transaksi berakhir.`;
                                // }

                                // Open WhatsApp with the message
                                window.open(
                                    `https://wa.me/${waNumber}?text=${message}`,
                                    '_blank');

                                // Reset the form
                                bookingForm.reset();
                                //   });
                            });
                        } else {
                            // Show error message if booking failed
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: data.message || 'Gagal menyimpan booking.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#0D83FD'
                            });
                        }
                    })
                    .catch(() => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan!',
                            text: 'Terjadi kesalahan. Silakan coba lagi.',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#0D83FD'
                        });
                    })
                    .finally(() => {
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    });
            });
        }
    });
    </script>
</section>

<style>
/* Modern Travel Section Styles */
.travel-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}

/* Styling untuk tombol */
.btn-booking {
    background-color: #0d6efd;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    margin-top: 10px;
    box-shadow: 0 4px 10px rgba(13, 110, 253, 0.25);
}

.btn-booking:hover {
    background-color: #0b5ed7;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(13, 110, 253, 0.3);
}

.travel-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    z-index: -1;
}

.section-title h2 {
    font-size: 36px;
    font-weight: 700;
    color: #212529;
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
}

.section-title h2::after {
    content: '';
    position: absolute;
    width: 70px;
    height: 3px;
    background: #0d6efd;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
}

.section-title p {
    color: #6c757d;
    font-size: 18px;
    max-width: 700px;
    margin: 15px auto 0;
}

.booking-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 50px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.booking-header {
    text-align: center;
    margin-bottom: 40px;
}

.booking-header h3 {
    font-size: 2.2rem;
    color: #2c3e50;
    margin-bottom: 15px;
    font-weight: 600;
}

.booking-header h3 i {
    color: #0d6efd;
    margin-right: 10px;
}

.booking-header p {
    color: #7f8c8d;
    font-size: 1.1rem;
    line-height: 1.6;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

.form-group {
    position: relative;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #2c3e50;
    font-size: 0.95rem;
}

.form-group label i {
    margin-right: 8px;
    color: #0d6efd;
}

.input-wrapper {
    position: relative;
}

.modern-input {
    width: 100%;
    padding: 16px 50px 16px 20px;
    border: 2px solid #e1e8ed;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #fff;
    color: #2c3e50;
}

.modern-input:focus {
    outline: none;
    border-color: #0d6efd;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    transform: translateY(-2px);
}

.modern-input:hover {
    border-color: #bdc3c7;
}

.modern-input::placeholder {
    color: #95a5a6;
}

.input-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #95a5a6;
    transition: color 0.3s ease;
    pointer-events: none;
}

.modern-input:focus+.input-icon {
    color: #0d6efd;
}

.submit-container {
    text-align: center;
    margin-top: 30px;
}

.modern-btn {
    background: linear-gradient(135deg, #0d6efd 0%, #764ba2 100%);
    color: white;
    border: none;
    padding: 18px 50px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    position: relative;
    overflow: hidden;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.modern-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.modern-btn:hover::before {
    left: 100%;
}

.modern-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
}

.modern-btn:active {
    transform: translateY(-1px);
}

.modern-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.modern-btn.loading {
    animation: pulse 1.5s infinite;
}

@keyframes pulse {

    0%,
    100% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.05);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .booking-card {
        padding: 30px 25px;
        margin: 0 10px;
    }

    .form-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .travel-section .section-title h2 {
        font-size: 2.5rem;
    }

    .booking-header h3 {
        font-size: 1.8rem;
    }
}

@media (max-width: 480px) {
    .travel-section {
        padding: 40px 0;
    }

    .booking-card {
        padding: 25px 20px;
    }

    .modern-btn {
        padding: 16px 40px;
        font-size: 1rem;
    }
}
</style>