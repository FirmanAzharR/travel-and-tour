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
        didOpen: () => { Swal.showLoading(); }
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
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.text().then(text => {
          try {
            return text ? JSON.parse(text) : {}
          } catch (e) {
            console.error('Error parsing JSON:', e, 'Response text:', text);
            throw new Error('Invalid JSON response from server');
          }
        });
      })
      .then(data => {
        if (data.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: data.message || 'Pesanan rental mobil berhasil dibuat',
            confirmButtonText: 'OK'
          }).then((result) => {
            // Reset form
            rentalForm.reset();
            document.getElementById('car-name').value = '';
            document.getElementById('car_id').value = '';
            document.getElementById('car_name').value = '';
          });
        } else {
          throw new Error(data.message || 'Terjadi kesalahan');
        }
      })
      .catch(error => {
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: error.message || 'Terjadi kesalahan saat memproses permintaan'
        });
      })
      .finally(() => {
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
      });
    });
  }

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
</script>
