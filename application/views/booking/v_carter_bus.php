
<section id="carter-bus" class="contact section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Carter Haice / Mini Bus</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4 g-lg-12">
      <div class="col-lg-12">
        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
          <h3>Get In Touch</h3>
          <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis.
          </p>
            
            <!-- Form -->
    <form id="carter-bus-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

              <div class="col-md-4">
                <label for="customer_name" class="form-label">Nama Customer</label>
                <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Nama Lengkap" required>
              </div>
              <div class="col-md-4">
                <label for="wa_number" class="form-label">Nomor WhatsApp</label>
                <input type="text" id="wa_number" class="form-control" name="wa_number" placeholder="Contoh: 628123456789" required>
              </div>
              <div class="col-md-4">
                <label for="total-passengers" class="form-label">Total Passengers</label>
                <input type="number" id="total-passengers" class="form-control" name="total-passengers" placeholder="Total Passengers" required data-bs-toggle="tooltip" data-bs-placement="top" title="Total Passengers">
              </div>
             <div class="col-md-4">
                <label for="booking_date_start" class="form-label">Tanggal Mulai Sewa</label>
                <input type="date" id="booking_date_start" class="form-control" name="booking_date_start" required>
              </div>
              <div class="col-md-4">
                <label for="pickup_time" class="form-label">Waktu Jemput</label>
                <input type="time" id="pickup_time" class="form-control" name="pickup_time" required>
              </div>
              <div class="col-md-4">
                <label for="booking_date_end" class="form-label">Tanggal Selesai Sewa</label>
                <input type="date" id="booking_date_end" class="form-control" name="booking_date_end" required>
              </div>
              <div class="col-md-6">
                <label for="pickup_address" class="form-label">Alamat Penjemputan</label>
                <input type="text" id="pickup_address" class="form-control" name="pickup_address" placeholder="Alamat lengkap penjemputan" required>
              </div>

              <div class="col-md-6">
                <label for="total_passengers" class="form-label">Jumlah Penumpang</label>
                <input type="number" id="total_passengers" class="form-control" name="total_passengers" placeholder="Jumlah penumpang" required>
              </div>
              <br>
              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary">Booking Sekarang</button>
              </div>
            </div>
          </form>
          
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
                      icon: 'success',
                      title: 'Berhasil!',
                      text: data.message || 'Pesanan berhasil dikirim',
                      showConfirmButton: true
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.reload();
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