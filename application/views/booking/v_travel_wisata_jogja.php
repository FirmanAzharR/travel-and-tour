
<section id="travel-wisata-jogja" class="contact section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Travel Wisata Jogja</h2>
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
          
          <form id="booking-travel-form" action="javascript:void(0);" method="post" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

              <div class="col-md-4">
                <label for="name">Enter your name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required data-bs-toggle="tooltip" data-bs-placement="top" title="Enter your name">
              </div>
              <div class="col-md-4 ">
                <label for="wa-number">Enter your whatsapp number</label>
                <input type="wa-number" id="wa-number" class="form-control" name="wa-number" placeholder="Your Whatsapp Number" required data-bs-toggle="tooltip" data-bs-placement="top" title="Enter your whatsapp number">
              </div>
              <div class="col-md-4 ">
                <label for="total-passenger">Total Passenger</label>
                <input type="number" id="total-passenger" class="form-control" name="total-passenger" placeholder="Total Passenger" required data-bs-toggle="tooltip" data-bs-placement="top" title="Total Passenger">
              </div>
              <div class="col-md-4 ">
                <label for="tour-destination">Tour Destination</label>
                <input type="text" id="tour-destination" class="form-control" name="tour-destination" placeholder="Tour Destination" required data-bs-toggle="tooltip" data-bs-placement="top" title="Tour Destination">
              </div>
             <div class="col-md-4 ">
                <label for="booking-date">Enter your booking date</label>
                <input type="date" id="booking-date" class="form-control" name="booking-date" placeholder="Booking Date" required data-bs-toggle="tooltip" data-bs-placement="top" title="Enter your booking date">
              </div>
              <div class="col-md-4 ">
                <label for="pickup-time">Pickup time</label>
                <input type="text" id="pickup-time" class="form-control" name="pickup-time" placeholder="Pickup time" required data-bs-toggle="tooltip" data-bs-placement="top" title="Pickup time">
              </div>
              <div class="col-md-4 ">
                <label for="duration">Duration</label>
                <input type="text" id="duration" class="form-control" name="duration" placeholder="Duration" required data-bs-toggle="tooltip" data-bs-placement="top" title="Duration">
              </div>
              <div class="col-md-4 ">
                <label for="pickup-address">Pickup address location</label>
                <input type="text" id="pickup-address" class="form-control" name="pickup-address" placeholder="Copy your pickup address from google maps" required data-bs-toggle="tooltip" data-bs-placement="top" title="Pickup address location">
              </div>
              <div class="col-md-4 ">
                <label for="car-type">Car Type</label>
                <input type="text" id="car-type" class="form-control" name="car-type" placeholder="Choose Car Type" required data-bs-toggle="tooltip" data-bs-placement="top" title="Car Type">
              </div>
              <br>
              <div class="col-12 text-center">
                <button type="submit" class="btn">Booking Now</button>
              </div>
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
                didOpen: () => { Swal.showLoading(); }
            });
            fetch('<?= base_url('booking/booking_travel_wisata_jogja') ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(html => {
                let success = false;
                let message = 'Booking berhasil disimpan!';
                // Try to detect success by searching for flashdata message
                if (html.includes('Booking berhasil disimpan')) {
                    success = true;
                } else if (html.includes('Gagal menyimpan booking')) {
                    message = 'Gagal menyimpan booking.';
                }
                Swal.fire({
                    icon: success ? 'success' : 'error',
                    title: success ? 'Sukses!' : 'Gagal!',
                    text: message,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#0D83FD'
                });
                if (success) bookingForm.reset();
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
</script>
</section>