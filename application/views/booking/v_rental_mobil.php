<section id="rental-mobil" class="contact section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>Booking Rental Mobil</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4 g-lg-12">
      <div class="col-lg-12">
        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
          <h3>Get In Touch</h3>
          <form id="booking-rental-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

              <!-- Pilih Mobil -->
              <div class="col-md-4">
                <label for="car-name">Select Car</label>
                <div class="input-group">
                  <input type="text" name="car-name" id="car-name" class="form-control" placeholder="Select Car" readonly required>
                  <span class="input-group-text" style="cursor:pointer" id="car-picker-btn"><i class="fa fa-car"></i></span>
                </div>

                <!-- Modal Pilih Mobil -->
                <div class="modal fade" id="carPickerModal" tabindex="-1" aria-labelledby="carPickerModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Pilih Mobil</h5>
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
                                      <img src="<?= base_url('uploads/images/' . $car['image']) ?>" width="80">
                                    <?php else: ?>
                                      No image
                                    <?php endif; ?>
                                  </td>
                                  <td>
                                    <button type="button" 
                                            class="btn btn-sm btn-primary pilih-mobil-btn" 
                                            data-carname="<?= htmlspecialchars($car['name']) ?>"
                                            data-carid="<?= $car['id'] ?>">
                                      Pilih
                                    </button>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <input type="hidden" name="car_id" id="car_id" value="">
              <input type="hidden" name="car_name" id="car_name" value="">
              <div class="col-md-4">
                <label for="customer_name">Customer name</label>
                <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Contoh: 628123456789" required>
              </div>
              <div class="col-md-4">
                <label for="wa-number">Nomor WhatsApp</label>
                <input type="text" class="form-control" name="wa_number" id="wa-number" placeholder="Contoh: 628123456789" required>
              </div>

              <div class="col-md-4">
                <label for="booking-date-start">Tanggal Mulai Sewa</label>
                <input type="date" class="form-control" name="booking_date_start" id="booking-date-start" required>
              </div>

              <div class="col-md-4">
                <label for="booking-date-end">Tanggal Selesai Sewa</label>
                <input type="date" class="form-control" name="booking_date_end" id="booking-date-end" required>
              </div>

              <div class="col-md-4 ">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" name="duration" placeholder="Duration" required data-bs-toggle="tooltip" data-bs-placement="top" title="Duration">
              </div>
              <div class="col-md-4 ">
                <label for="pickup-address">Pickup/Send address</label>
                <input type="text" class="form-control" name="pickup-address" placeholder="Copy your pickup address from google maps" required data-bs-toggle="tooltip" data-bs-placement="top" title="Pickup address location">
              </div>

              <div class="col-md-4 ">
                <label for="pickup-address">Booking type</label>
                <input type="text" class="form-control" name="booking-type" placeholder="Booking Type" required data-bs-toggle="tooltip" data-bs-placement="top" title="Booking Type">
              </div>
              <div class="col-md-4 ">
                <label for="pickup-address">Rute Pemakaian</label>
                <input type="text" class="form-control" name="rute-pemakaian" placeholder="Rute Pemakaian" required data-bs-toggle="tooltip" data-bs-placement="top" title="Rute Pemakaian">
              </div>



              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Booking Now</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

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
