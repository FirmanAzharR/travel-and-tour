<section id="carter-bus" class="contact section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
  <h2>Carter Haice / Mini Bus</h2>
  <p>Jadikan perjalanan Anda lebih berkesan dengan layanan sewa kendaraan terpercaya. Kenyamanan dan keamanan adalah prioritas kami</p>
</div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4 g-lg-12">
      <div class="col-lg-12">
        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
          <h3>Get In Touch</h3>
          </p>
            
          <!-- Form -->
          <form id="carter-bus-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

              <div class="col-md-4">
                <label for="customer_name" class="form-label">
                  <i class="bi bi-person-fill me-2"></i>Nama Customer
                </label>
                <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Nama Lengkap" required>
              </div>

              <div class="col-md-4">
                <label for="wa_number" class="form-label">
                  <i class="bi bi-whatsapp me-2"></i>Nomor WhatsApp
                </label>
                <input type="text" id="wa_number" class="form-control" name="wa_number" placeholder="Contoh: 628123456789" required>
              </div>

              <div class="col-md-4">
                <label for="total_passengers" class="form-label">
                  <i class="bi bi-people-fill me-2"></i>Total Passengers
                </label>
                <input type="number" id="total_passengers" class="form-control" name="total_passengers" placeholder="Total Passengers" required data-bs-toggle="tooltip" data-bs-placement="top" title="Total Passengers">
              </div>

              <div class="col-md-4">
                <label for="booking_date_start" class="form-label">
                  <i class="bi bi-calendar-event me-2"></i>Tanggal Mulai Sewa
                </label>
                <input type="date" id="booking_date_start" class="form-control" name="booking_date_start" required>
              </div>

              <div class="col-md-4">
                <label for="pickup_time" class="form-label">
                  <i class="bi bi-clock me-2"></i>Waktu Jemput
                </label>
                <input type="time" id="pickup_time" class="form-control" name="pickup_time" required>
              </div>

              <div class="col-md-4">
                <label for="booking_date_end" class="form-label">
                  <i class="bi bi-calendar-check me-2"></i>Tanggal Selesai Sewa
                </label>
                <input type="date" id="booking_date_end" class="form-control" name="booking_date_end" required>
              </div>

              <div class="col-md-12">
                <label for="pickup_address" class="form-label">
                  <i class="bi bi-geo-alt-fill me-2"></i>Alamat Penjemputan
                </label>
                <input type="text" id="pickup_address" class="form-control" name="pickup_address" placeholder="Alamat lengkap penjemputan" required>
              </div>

              <div class="col-12 text-center mt-4">
									<button type="submit" class="btn-booking">
									<i class="fas fa-check-circle me-2"></i>Booking Sekarang
									</button>
								</div>
            </div>
          </form>
          
          <!-- Script tetap sama seperti sebelumnya -->
          <script>
          $(document).ready(function() {
            // Handle form submission
            const carterBusForm = document.getElementById('carter-bus-form');
            if (carterBusForm) {
              carterBusForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Memproses...';
                submitBtn.disabled = true;
                
                Swal.fire({
                  title: 'Memproses...',
                  allowOutsideClick: false,
                  didOpen: () => { Swal.showLoading(); }
                });
                
                const formData = new FormData(this);
                
                // Send AJAX request
                fetch('<?= site_url('booking/booking_carter_bus') ?>', {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                  },
                  body: new URLSearchParams(formData).toString()
                })
                .then(response => {
                  if (!response.ok) {
                    throw new Error('Network response was not ok');
                  }
                  return response.json();
                })
                .then(data => {
                  if (data.status === 'success') {
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
                            const waNumberCustomer = encodeURIComponent(data.wa_number);
                            const totalPassengers = encodeURIComponent(data.total_passengers);
                            const bookingDate = encodeURIComponent(data.booking_date_start);
                            const returnDate = encodeURIComponent(data.booking_date_end);
                            const pickupAddress = encodeURIComponent(data.pickup_address);
                            
                            // Generate PDF and send WhatsApp message
                            if(result){
                            
                                // Create WhatsApp message with PDF link
                                let message = `Halo, saya ${customerName}%0A`;
                                message +=
                                    `Saya sudah melakukan pemesanan carter bus dengan detail sebagai berikut:%0A%0A`;
                                message += `*Kode Booking*: ${bookingCode}%0A`;
                                message += `*Nama Customer*: ${customerName}%0A`;
                                message += `*No. WhatsApp*: ${waNumberCustomer}%0A`;
                                message += `*Total Penumpang*: ${totalPassengers}%0A`;
                                message +=
                                    `*Tanggal Sewa*: ${bookingDate} s/d ${returnDate}%0A`;
                                message +=
                                    `*Alamat Penjemputan*: ${pickupAddress}%0A`;

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
                                    carterBusForm.reset();
                                });
                            
                            } 
                    });
                  } else {
                    throw new Error(data.message || 'Terjadi kesalahan');
                  }
                })
                .catch(error => {
                  console.error('Error:', error);
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error.message || 'Terjadi kesalahan saat memproses permintaan',
                    showConfirmButton: true
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
        </div>
      </div>
    </div>
  </div>
</section>
