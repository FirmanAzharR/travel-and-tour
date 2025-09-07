<section id="rental-mobil" class="contact section rental-section">
 <div class="container section-title" data-aos="fade-up">
    <h2>Booking Rental Mobil</h2>
    <p>Nikmati kebebasan berwisata dengan armada kendaraan terawat, harga transparan, dan proses booking yang mudah untuk pengalaman liburan tanpa hambatan</p>
</div>

  
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4 g-lg-12">
      <div class="col-lg-12">
        <div class="rental-form-container" data-aos="fade-up" data-aos-delay="300">
          <h3 class="rental-form-title">Get In Touch</h3>
          <form id="booking-rental-form" class="rental-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <!-- Pilih Mobil -->
              <div class="col-md-4 form-group">
                <label for="car-name"><i class="fas fa-car me-2"></i>Pilih Mobil</label>
                <div class="input-group">
                  <input type="text" name="car-name" id="car-name" class="form-control" placeholder="Klik untuk memilih mobil" readonly required>
                  <span class="input-group-text" id="car-picker-btn"><i class="fas fa-car-side"></i></span>
                </div>
              </div>

              <input type="hidden" name="car_id" id="car_id" value="">
              <input type="hidden" name="car_name" id="car_name" value="">
              
              <div class="col-md-4 form-group">
                <label for="customer_name"><i class="fas fa-user me-2"></i>Nama Pelanggan</label>
                <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Masukkan nama lengkap Anda" required>
              </div>
              
              <div class="col-md-4 form-group">
                <label for="wa-number"><i class="fab fa-whatsapp me-2"></i>Nomor WhatsApp</label>
                <input type="text" class="form-control" name="wa_number" id="wa-number" placeholder="Contoh: 628123456789" required>
              </div>

              <div class="col-md-4 form-group">
                <label for="booking-date-start"><i class="fas fa-calendar-alt me-2"></i>Tanggal Mulai Sewa</label>
                <input type="date" class="form-control" name="booking_date_start" id="booking-date-start" required>
              </div>

              <div class="col-md-4 form-group">
                <label for="booking-date-end"><i class="fas fa-calendar-check me-2"></i>Tanggal Selesai Sewa</label>
                <input type="date" class="form-control" name="booking_date_end" id="booking-date-end" required>
              </div>

              <div class="col-md-4 form-group">
                <label for="duration"><i class="fas fa-clock me-2"></i>Durasi Sewa</label>
                <input type="text" class="form-control" name="duration" placeholder="Contoh: 3 hari" required data-bs-toggle="tooltip" data-bs-placement="top" title="Durasi sewa dalam hari">
              </div>
              
              <div class="col-md-4 form-group">
                <label for="pickup-address"><i class="fas fa-map-marker-alt me-2"></i>Alamat Penjemputan</label>
                <input type="text" class="form-control" name="pickup-address" placeholder="Salin alamat dari Google Maps" required data-bs-toggle="tooltip" data-bs-placement="top" title="Alamat penjemputan">
              </div>

              <div class="col-md-4 form-group">
                <label for="booking-type"><i class="fas fa-tag me-2"></i>Tipe Booking</label>
                <select class="form-control" name="booking-type" required data-bs-toggle="tooltip" data-bs-placement="top" title="Tipe Booking">
                  <option value="" selected disabled>Pilih Tipe Booking</option>
                  <option value="Dengan Sopir">Dengan Sopir</option>
                  <option value="Lepas Kunci">Lepas Kunci</option>
                </select>
              </div>
              
              <div class="col-md-4 form-group">
                <label for="rute-pemakaian"><i class="fas fa-route me-2"></i>Rute Pemakaian</label>
                <input type="text" class="form-control" name="rute-pemakaian" placeholder="Contoh: Dalam Kota / Luar Kota" required data-bs-toggle="tooltip" data-bs-placement="top" title="Rute Pemakaian">
              </div>

              <div class="col-12 text-center mt-4">
									<button type="submit" class="btn-booking">
									<i class="fas fa-check-circle me-2"></i>Booking Sekarang
									</button>
								</div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal Pilih Mobil dengan Styling Baru -->
  <div class="modal fade rental-modal" id="carPickerModal" tabindex="-1" aria-labelledby="carPickerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fas fa-car me-2"></i>Pilih Mobil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
              <thead>
                <tr>
                  <th>Nama Mobil</th>
                  <th>Deskripsi</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cars as $car): ?>
                  <tr>
                    <td data-carid="<?= $car['id'] ?>"><?= htmlspecialchars($car['name']) ?></td>
                    <td><?= htmlspecialchars($car['description'] ?? '-') ?></td>
                    <td>
                      <?php if (!empty($car['image'])): ?>
                        <img src="<?= base_url('uploads/images/' . $car['image']) ?>" width="80" class="img-thumbnail">
                      <?php else: ?>
                        <span class="badge bg-secondary">No image</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <button type="button" 
                              class="btn btn-sm btn-primary pilih-mobil-btn" 
                              data-carname="<?= htmlspecialchars($car['name']) ?>"
                              data-carid="<?= $car['id'] ?>">
                        <i class="fas fa-check me-1"></i> Pilih
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times me-1"></i> Tutup
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- CSS Styling untuk Form Rental Mobil -->
  <style>
    /* Styling untuk section rental mobil */
    .rental-section {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      padding: 80px 0;
      position: relative;
      overflow: hidden;
    }
    
    .rental-section::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 300px;
      height: 300px;
      background: rgba(13, 110, 253, 0.05);
      border-radius: 50%;
      transform: translate(150px, -150px);
      z-index: 0;
    }
    
    .rental-section::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 200px;
      height: 200px;
      background: rgba(13, 110, 253, 0.05);
      border-radius: 50%;
      transform: translate(-100px, 100px);
      z-index: 0;
    }
    
    /* Styling untuk container judul */
    .section-title {
      text-align: center;
      margin-bottom: 50px;
      position: relative;
      z-index: 1;
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
    
    /* Styling untuk form container */
    .rental-form-container {
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      padding: 40px;
      position: relative;
      z-index: 1;
      overflow: hidden;
      transition: all 0.3s ease;
    }
    
    .rental-form-container:hover {
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
      transform: translateY(-5px);
    }
    
    .rental-form-container::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 150px;
      height: 150px;
      background: rgba(13, 110, 253, 0.03);
      border-radius: 0 0 0 100%;
      z-index: -1;
    }
    
    /* Styling untuk judul form */
    .rental-form-title {
      color: #212529;
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 30px;
      position: relative;
      padding-bottom: 15px;
    }
    
    .rental-form-title::after {
      content: '';
      position: absolute;
      width: 50px;
      height: 3px;
      background: #0d6efd;
      bottom: 0;
      left: 0;
    }
    
    /* Styling untuk form */
    .rental-form label {
      font-weight: 500;
      color: #495057;
      margin-bottom: 8px;
      display: block;
      font-size: 14px;
      transition: all 0.3s ease;
    }
    
    .rental-form .form-control {
      border-radius: 8px;
      padding: 12px 15px;
      border: 1px solid #ced4da;
      transition: all 0.3s ease;
      background-color: #f8f9fa;
      font-size: 15px;
    }
    
    .rental-form .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
      background-color: #fff;
    }
    
    .rental-form .form-control::placeholder {
      color: #adb5bd;
      font-size: 14px;
    }
    
    /* Styling untuk input group */
    .rental-form .input-group {
      position: relative;
    }
    
    .rental-form .input-group-text {
      background-color: #0d6efd;
      color: white;
      border: 1px solid #0d6efd;
      border-radius: 0 8px 8px 0;
      transition: all 0.3s ease;
    }
    
    .rental-form .input-group-text:hover {
      background-color: #0b5ed7;
      cursor: pointer;
    }
    
    /* Styling untuk tombol */
    .rental-form .btn-rental {
      background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
      color: white;
      border: none;
      padding: 14px 30px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 16px;
      transition: all 0.3s ease;
      margin-top: 15px;
      position: relative;
      overflow: hidden;
      z-index: 1;
      box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
    }
    
    .rental-form .btn-rental::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #0b5ed7 0%, #084298 100%);
      transition: all 0.4s ease;
      z-index: -1;
    }
    
    .rental-form .btn-rental:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(13, 110, 253, 0.4);
    }
    
    .rental-form .btn-rental:hover::before {
      left: 0;
    }
    
    .rental-form .btn-rental i {
      margin-right: 8px;
    }
    
    /* Styling untuk modal */
    .rental-modal .modal-content {
      border-radius: 15px;
      border: none;
      overflow: hidden;
    }
    
    .rental-modal .modal-header {
      background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
      color: white;
      border-bottom: none;
      padding: 20px 25px;
    }
    
    .rental-modal .modal-title {
      font-weight: 600;
    }
    
    .rental-modal .btn-close {
      filter: brightness(0) invert(1);
      opacity: 1;
    }
    
    .rental-modal .modal-body {
      padding: 25px;
    }
    
    .rental-modal .modal-footer {
      border-top: none;
      padding: 15px 25px 25px;
    }
    
    .rental-modal .btn-secondary {
      background-color: #6c757d;
      border: none;
      border-radius: 8px;
      padding: 10px 20px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .rental-modal .btn-secondary:hover {
      background-color: #5a6268;
    }
    
    /* Styling untuk tabel dalam modal */
    .rental-modal .table {
      margin-bottom: 0;
    }
    
    .rental-modal .table th {
      background-color: #f8f9fa;
      font-weight: 600;
      color: #495057;
    }
    
    .rental-modal .table td, .rental-modal .table th {
      padding: 12px 15px;
      vertical-align: middle;
    }
    
    .rental-modal .pilih-mobil-btn {
      background-color: #0d6efd;
      border: none;
      border-radius: 6px;
      padding: 6px 12px;
      transition: all 0.3s ease;
    }
    
    .rental-modal .pilih-mobil-btn:hover {
      background-color: #0b5ed7;
      transform: translateY(-2px);
    }
    
    /* Styling untuk responsive */
    @media (max-width: 768px) {
      .rental-form-container {
        padding: 25px;
      }
      
      .rental-form-title {
        font-size: 24px;
      }
      
      .rental-form .btn-rental {
        width: 100%;
      }
    }
    
    /* Animasi untuk form elements */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .rental-form .form-group {
      animation: fadeInUp 0.5s ease forwards;
      opacity: 0;
    }
    
    .rental-form .form-group:nth-child(1) { animation-delay: 0.1s; }
    .rental-form .form-group:nth-child(2) { animation-delay: 0.2s; }
    .rental-form .form-group:nth-child(3) { animation-delay: 0.3s; }
    .rental-form .form-group:nth-child(4) { animation-delay: 0.4s; }
    .rental-form .form-group:nth-child(5) { animation-delay: 0.5s; }
    .rental-form .form-group:nth-child(6) { animation-delay: 0.6s; }
    .rental-form .form-group:nth-child(7) { animation-delay: 0.7s; }
    .rental-form .form-group:nth-child(8) { animation-delay: 0.8s; }
    .rental-form .form-group:nth-child(9) { animation-delay: 0.9s; }
    
    /* Floating label effect */
    .form-floating {
      position: relative;
    }
    
    .form-floating > .form-control {
      height: calc(3.5rem + 2px);
      padding: 1rem 0.75rem;
    }
    
    .form-floating > label {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      padding: 1rem 0.75rem;
      pointer-events: none;
      border: 1px solid transparent;
      transform-origin: 0 0;
      transition: opacity .1s ease-in-out, transform .1s ease-in-out;
    }
    
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
      opacity: .65;
      transform: scale(.85) translateY(-.5rem) translateX(.15rem);
    }
  </style>

<!-- Tambahkan Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Script tetap sama seperti sebelumnya -->
<script>
$(document).ready(function () {
  const carPickerModal = new bootstrap.Modal(document.getElementById('carPickerModal'));
  let selectedCarId = '';

  // Handle car selection
  $('#car-picker-btn, #car-name').on('click', function () {
    carPickerModal.show();
  });

  $(document).on('click', '.pilih-mobil-btn', function () {
    const carId = $(this).closest('tr').find('td:first').data('carid');
    const carName = $(this).data('carname');
    
    $('#car-name').val(carName);
    $('#car_id').val(carId);
    $('#car_name').val(carName);
    
    carPickerModal.hide();
  });

  // Handle car selection from modal
  $(document).on('click', '.pilih-mobil-btn', function() {
    const carId = $(this).data('carid');
    const carName = $(this).data('carname');
    
    // Update form fields
    $('#car-name').val(carName);
    $('#car_id').val(carId);
    $('#car_name').val(carName);
    
    // Close the modal
    const carPickerModal = bootstrap.Modal.getInstance(document.getElementById('carPickerModal'));
    carPickerModal.hide();
  });
  
  // Initialize tooltips
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  });
});

// Handle form submission
const rentalForm = document.getElementById('booking-rental-form');
if (rentalForm) {
    rentalForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Memproses...';
        submitBtn.disabled = true;

        Swal.fire({
            title: 'Memproses...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const formData = new FormData(this);

        // Convert FormData to object for better handling
        const formObject = {};
        formData.forEach((value, key) => {
            formObject[key] = value;
        });

        // Send AJAX request
        fetch('<?= site_url('booking/booking_rental_mobil') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams(formData).toString()
            })
            .then(async response => {
                const data = await response.json().catch(() => ({}));

                // If response is not ok, handle validation errors or other errors
                if (!response.ok) {
                    // If there's a validation error with field-specific messages
                    if (data.errors) {
                        const errorMessages = Object.values(data.errors).flat().join('\n');
                        throw new Error(errorMessages);
                    }
                    // If there's a general error message
                    throw new Error(data.message || 'Terjadi kesalahan pada server');
                }
                return data;
            })
            .then(data => {
                if (data.status === 'success') {
                    // Show success message with loading and auto-redirect
                    Swal.fire({
                        title: 'Booking Berhasil!',
                        html: 'Menyiapkan tiket Anda...',
                        allowOutsideClick: false,
                        showConfirmButton: false,
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
                        const carName = encodeURIComponent(data.car_name);
                        const bookingDate = encodeURIComponent(data.booking_date_start);
                        const returnDate = encodeURIComponent(data.booking_date_end);
                        const pickupAddress = encodeURIComponent(data.pickup_address);
                        const waNumberCustomer = encodeURIComponent(data.wa_number);
                        
                        // Generate PDF and send WhatsApp message
                        if(result){
                            // Create WhatsApp message with PDF link
                            let message = `Halo, saya ${customerName}%0A`;
                            message +=
                                `Saya sudah melakukan pemesanan rental mobil dengan detail sebagai berikut:%0A%0A`;
                            message += `*Kode Booking*: ${bookingCode}%0A`;
                            message += `*Nama Customer*: ${customerName}%0A`;
                            message += `*No. WhatsApp*: ${waNumberCustomer}%0A`;
                            message += `*Mobil*: ${carName}%0A`;
                            message +=
                                `*Tanggal Sewa*: ${bookingDate} s/d ${returnDate}%0A`;
                            message += `*Durasi*: ${data.duration}%0A`;
                            message +=
                                `*Alamat Penjemputan*: ${pickupAddress}%0A`;
                            message +=
                                `*Tipe Booking*: ${data.booking_type}%0A`;
                            message += `*Rute*: ${data.route}%0A%0A`;

                            message += `Terima kasih.`;

                            console.log('Final WhatsApp message:', message);

                            // Open WhatsApp with the message
                            const whatsappUrl = `https://wa.me/${waNumber}?text=${message}`;
                            console.log('Opening WhatsApp URL:', whatsappUrl);
                            window.open(whatsappUrl, '_blank');

                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Booking Berhasil!',
                                html: `
                            <div class="text-start">
                             <p>Terima kasih telah melakukan pemesanan. Detail pemesanan telah dikirim ke WhatsApp Anda.</p>
                                <div class="alert alert-info mt-3">
                                     <strong>Kode Booking:</strong> ${data.booking_code}
                                </div>
                             </div>`,
                                confirmButtonText: 'Selesai'
                            }).then(() => {
                                // Reset form
                                rentalForm.reset();
                                document.getElementById('car-name')
                                    .value = '';
                                document.getElementById('car_id')
                                    .value = '';
                                document.getElementById('car_name')
                                    .value = '';
                            });
                        
                        } 
                    });
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan');
                }
            })
            .catch(error => {
                console.error('Error:', error);

                // Format error message with better HTML structure
                let errorMessage = error.message ||
                    'Terjadi kesalahan saat memproses permintaan. Silakan coba lagi nanti.';

                // Create a more structured HTML for error messages
                let htmlContent = `
      <div style="text-align: left;">
        <div style="margin-bottom: 15px; color: #dc3545; font-weight: 500;">
          Mohon perbaiki kesalahan berikut:
        </div>
        <ul style="padding-left: 20px; margin: 0; list-style-type: none;">
    `;

                // If there are multiple errors in the message (separated by newlines)
                if (errorMessage.includes('\n')) {
                    const errors = errorMessage.split('\n').filter(msg => msg.trim() !== '');
                    htmlContent += errors.map(msg =>
                        `<li style="margin-bottom: 8px; padding-left: 10px; border-left: 3px solid #dc3545;">
          <i class="fas fa-exclamation-circle" style="margin-right: 8px; color: #dc3545;"></i>
          ${msg.trim()}
        </li>`
                    ).join('');
                } else {
                    htmlContent += `
        <li style="margin-bottom: 8px; padding-left: 10px; border-left: 3px solid #dc3545;">
          <i class="fas fa-exclamation-circle" style="margin-right: 8px; color: #dc3545;"></i>
          ${errorMessage}
        </li>
      `;
                }

                htmlContent += `
        </ul>
      </div>
    `;

                Swal.fire({
                    icon: 'error',
                    title: '<span style="color: #dc3545; font-size: 1.5rem;">Validasi Gagal</span>',
                    html: htmlContent,
                    confirmButtonText: 'Mengerti',
                    confirmButtonColor: '#dc3545',
                    width: '500px',
                    padding: '20px',
                    background: '#fff',
                    backdrop: `
        rgba(0,0,0,0.7)
        url("/assets/img/logo.png")
        center left
        no-repeat
      `,
                    customClass: {
                        popup: 'animate__animated animate__fadeInDown',
                        title: 'mb-3',
                        confirmButton: 'btn btn-danger px-4 py-2',
                        closeButton: 'btn-close-white'
                    },
                    buttonsStyling: false,
                    showCloseButton: true,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
    });
}
</script>
