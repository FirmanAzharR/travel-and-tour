<section id="travel-bandara" class="contact section light-background">
   <!-- Section Title -->
   <div class="container section-title" data-aos="fade-up">
  <h2>Booking Travel Bandara</h2>
  <p>Solusi transportasi bandara cepat, aman, dan nyaman untuk wisatawan dan pebisnis di Yogyakarta</p>
</div>

   <!-- End Section Title -->
   <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row g-4 g-lg-12">
         <div class="col-lg-12">
            <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
               <div class="booking-container">
						<h3 class="booking-title">Get In Touch</h3>
						<ul class="nav nav-tabs booking-tabs" id="bookingTab" role="tablist" data-aos="fade-up" data-aos-delay="100"> 
							<li class="nav-item" role="presentation">
								<button class="nav-link active show" id="antar-bandara-tab" data-bs-toggle="tab" data-bs-target="#antar-bandara" type="button" role="tab" aria-controls="antar-bandara" aria-selected="true">
								<i class="fas fa-plane-departure me-2"></i>Antar ke Bandara
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="jemput-bandara-tab" data-bs-toggle="tab" data-bs-target="#jemput-bandara" type="button" role="tab" aria-controls="jemput-bandara" aria-selected="false">
								<i class="fas fa-plane-arrival me-2"></i>Jemput dari Bandara
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="antar-jemput-bandara-tab" data-bs-toggle="tab" data-bs-target="#antar-jemput-bandara" type="button" role="tab" aria-controls="antar-jemput-bandara" aria-selected="false">
								<i class="fas fa-exchange-alt me-2"></i>Pulang Pergi ke Bandara
								</button>
							</li>
						</ul>
					
					<!-- Tab Content dengan Styling Baru -->
					<div class="tab-content" id="bookingTabContent">
						<!-- Tab 1: Antar ke Bandara -->
						<div class="tab-pane fade show active" id="antar-bandara" role="tabpanel" aria-labelledby="antar-bandara-tab">
							<form id="booking-travel-bandara-form" class="booking-form" data-aos="fade-up" data-aos-delay="200">
							<div class="row gy-4">
								<div class="col-md-4">
									<label for="name"><i class="fas fa-user me-1"></i> Nama Lengkap</label>
									<input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama lengkap Anda" required data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan nama lengkap Anda">
								</div>
								<div class="col-md-4">
									<label for="wa-number"><i class="fab fa-whatsapp me-1"></i> Nomor WhatsApp</label>
									<input type="text" class="form-control" name="wa-number" id="wa-number" placeholder="Contoh: 08123456789" required data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan nomor WhatsApp Anda">
								</div>
								<div class="col-md-4">
									<label for="total-passengers"><i class="fas fa-users me-1"></i> Jumlah Penumpang</label>
									<input type="number" class="form-control" name="total-passengers" id="total-passengers" placeholder="Jumlah penumpang" required data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan jumlah penumpang">
								</div>
								
								<div class="col-md-6">
									<label for="pickup-address"><i class="fas fa-map-marker-alt me-1"></i> Alamat Penjemputan</label>
									<input type="text" class="form-control" name="pickup-address" id="pickup-address" placeholder="Salin alamat penjemputan dari Google Maps" required data-bs-toggle="tooltip" data-bs-placement="top" title="Alamat penjemputan">
								</div>
								<div class="col-md-6">
									<label for="airport-name"><i class="fas fa-plane me-1"></i> Nama Bandara</label>
									<input type="text" class="form-control" name="airport-name" id="airport-name" placeholder="Contoh: Soekarno-Hatta, Juanda, dll" required data-bs-toggle="tooltip" data-bs-placement="top" title="Nama Bandara">
								</div>
								
								<div class="col-md-4">
									<label for="booking-date"><i class="fas fa-calendar-alt me-1"></i> Tanggal Booking</label>
									<input type="date" class="form-control" name="booking-date" id="booking-date" required data-bs-toggle="tooltip" data-bs-placement="top" title="Pilih tanggal booking">
								</div>
								<div class="col-md-4">
									<label for="pickup-time"><i class="fas fa-clock me-1"></i> Waktu Penjemputan</label>
									<input type="time" class="form-control" name="pickup-time" id="pickup-time" required data-bs-toggle="tooltip" data-bs-placement="top" title="Waktu penjemputan">
								</div>
								<div class="col-md-4">
									<label for="flight-time"><i class="fas fa-plane-departure me-1"></i> Waktu Penerbangan</label>
									<input type="time" class="form-control" name="flight-time" id="flight-time" required data-bs-toggle="tooltip" data-bs-placement="top" title="Waktu penerbangan">
								</div>
								
								<div class="col-md-4">
									<label for="flight-number"><i class="fas fa-tag me-1"></i> Nomor Penerbangan</label>
									<input type="text" class="form-control" name="flight-number" id="flight-number" placeholder="Contoh: GA-123, JT-456" required data-bs-toggle="tooltip" data-bs-placement="top" title="Nomor penerbangan">
								</div>
								<div class="col-md-4">
									<label for="services"><i class="fas fa-concierge-bell me-1"></i> Layanan</label>
									<input type="text" class="form-control" name="services" id="services" placeholder="Services" required data-bs-toggle="tooltip" data-bs-placement="top" title="Nomor penerbangan">
								</div>
								<div class="col-md-4">
									<label for="box"><i class="fas fa-suitcase me-1"></i> Barang Bagasi</label>
									<input type="number" class="form-control" name="box" id="box" placeholder="Jumlah bagasi" required data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah barang bagasi">
								</div>
								
								<div class="col-12 text-center mt-4">
									<button type="submit" class="btn-booking">
									<i class="fas fa-check-circle me-2"></i>Booking Sekarang
									</button>
								</div>
							</div>
							</form>
						</div>
						
						<!-- Tab 2: Jemput dari Bandara (dengan styling yang sama) -->
						<div class="tab-pane fade" id="jemput-bandara" role="tabpanel" aria-labelledby="jemput-bandara-tab">
							<form id="booking-travel-bandara-pickup-form" class="booking-form" data-aos="fade-up" data-aos-delay="200">
							<div class="row gy-4">
								<div class="col-md-4">
									<label for="name"><i class="fas fa-user me-1"></i> Nama Lengkap</label>
									<input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama lengkap Anda" required data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan nama lengkap Anda">
								</div>
								<!-- Sisa field form dengan styling yang sama seperti tab 1 -->
								<div class="col-md-4">
									<label for="wa-number"><i class="fab fa-whatsapp me-1"></i> Nomor WhatsApp</label>
									<input type="text" class="form-control" name="wa-number" id="wa-number" placeholder="Contoh: 08123456789" required data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan nomor WhatsApp Anda">
								</div>
								<div class="col-md-4">
									<label for="total-passengers"><i class="fas fa-users me-1"></i> Jumlah Penumpang</label>
									<input type="number" class="form-control" name="total-passengers" id="total-passengers" placeholder="Jumlah penumpang" required data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan jumlah penumpang">
								</div>
								
								<div class="col-md-6">
									<label for="pickup-address"><i class="fas fa-map-marker-alt me-1"></i> Alamat Tujuan</label>
									<input type="text" class="form-control" name="pickup-address" id="pickup-address" placeholder="Salin alamat tujuan dari Google Maps" required data-bs-toggle="tooltip" data-bs-placement="top" title="Alamat tujuan">
								</div>
								<div class="col-md-6">
									<label for="airport-name"><i class="fas fa-plane me-1"></i> Nama Bandara</label>
									<input type="text" class="form-control" name="airport-name" id="airport-name" placeholder="Contoh: Soekarno-Hatta, Juanda, dll" required data-bs-toggle="tooltip" data-bs-placement="top" title="Nama Bandara">
								</div>
								
								<div class="col-md-6">
									<label for="booking-date"><i class="fas fa-calendar-alt me-1"></i> Tanggal Booking</label>
									<input type="date" class="form-control" name="booking-date" id="booking-date" required data-bs-toggle="tooltip" data-bs-placement="top" title="Pilih tanggal booking">
								</div>
								<div class="col-md-6">
									<label for="arrival-time"><i class="fas fa-plane-arrival me-1"></i> Waktu Kedatangan</label>
									<input type="time" class="form-control" name="arrival-time" id="arrival-time" required data-bs-toggle="tooltip" data-bs-placement="top" title="Waktu kedatangan">
								</div>
								
								<div class="col-md-4">
									<label for="flight-number"><i class="fas fa-tag me-1"></i> Nomor Penerbangan</label>
									<input type="text" class="form-control" name="flight-number" id="flight-number" placeholder="Contoh: GA-123, JT-456" required data-bs-toggle="tooltip" data-bs-placement="top" title="Nomor penerbangan">
								</div>
								<div class="col-md-4">
									<label for="services"><i class="fas fa-concierge-bell me-1"></i> Layanan</label>
									<select class="form-control" name="services" id="services" required data-bs-toggle="tooltip" data-bs-placement="top" title="Pilih layanan">
									<option value="" selected disabled>Pilih Layanan</option>
									<option value="Ekonomi">Ekonomi</option>
									<option value="Bisnis">Bisnis</option>
									<option value="Premium">Premium</option>
									</select>
								</div>
								<div class="col-md-4">
									<label for="box"><i class="fas fa-suitcase me-1"></i> Barang Bagasi</label>
									<input type="number" class="form-control" name="box" id="box" placeholder="Jumlah bagasi" required data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah barang bagasi">
								</div>
								
								<div class="col-12 text-center mt-4">
									<button type="submit" class="btn-booking">
									<i class="fas fa-check-circle me-2"></i>Booking Sekarang
									</button>
								</div>
							</div>
							</form>
						</div>
						
						<!-- Tab 3: Pulang Pergi ke Bandara (dengan styling yang sama) -->
						<div class="tab-pane fade" id="antar-jemput-bandara" role="tabpanel" aria-labelledby="antar-jemput-bandara-tab">
							<form id="booking-travel-bandara-pp-form" class="booking-form" data-aos="fade-up" data-aos-delay="200">
							<div class="row gy-4">
								<div class="col-md-4">
									<label for="name"><i class="fas fa-user me-1"></i> Nama Lengkap</label>
									<input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama lengkap Anda" required data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan nama lengkap Anda">
								</div>
								<!-- Sisa field form dengan styling yang sama seperti tab 1 -->
								<div class="col-md-4">
									<label for="wa-number"><i class="fab fa-whatsapp me-1"></i> Nomor WhatsApp</label>
									<input type="text" class="form-control" name="wa-number" id="wa-number" placeholder="Contoh: 08123456789" required data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan nomor WhatsApp Anda">
								</div>
								<div class="col-md-4">
									<label for="total-passengers"><i class="fas fa-users me-1"></i> Jumlah Penumpang</label>
									<input type="number" class="form-control" name="total-passengers" id="total-passengers" placeholder="Jumlah penumpang" required data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan jumlah penumpang">
								</div>
								
								<div class="col-md-6">
									<label for="pickup-address"><i class="fas fa-map-marker-alt me-1"></i> Alamat Penjemputan</label>
									<input type="text" class="form-control" name="pickup-address" id="pickup-address" placeholder="Salin alamat penjemputan dari Google Maps" required data-bs-toggle="tooltip" data-bs-placement="top" title="Alamat penjemputan">
								</div>
								<div class="col-md-6">
									<label for="airport-name"><i class="fas fa-plane me-1"></i> Nama Bandara</label>
									<input type="text" class="form-control" name="airport-name" id="airport-name" placeholder="Contoh: Soekarno-Hatta, Juanda, dll" required data-bs-toggle="tooltip" data-bs-placement="top" title="Nama Bandara">
								</div>
								
								<div class="col-md-6">
									<label for="booking-date"><i class="fas fa-calendar-alt me-1"></i> Tanggal Booking</label>
									<input type="date" class="form-control" name="booking-date" id="booking-date" required data-bs-toggle="tooltip" data-bs-placement="top" title="Pilih tanggal booking">
								</div>
								<div class="col-md-6">
									<label for="pickup-time"><i class="fas fa-clock me-1"></i> Waktu Penjemputan</label>
									<input type="time" class="form-control" name="pickup-time" id="pickup-time" required data-bs-toggle="tooltip" data-bs-placement="top" title="Waktu penjemputan">
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
					<!-- CSS Styling untuk Form -->
					<style>
						
						/* Styling untuk judul dan deskripsi */
						.booking-title {
							color: #333;
							font-size: 28px;
							font-weight: 700;
							margin-bottom: 10px;
							position: relative;
							padding-bottom: 15px;
						}
						
						.booking-title:after {
							content: "";
							position: absolute;
							width: 60px;
							height: 3px;
							background: #0d6efd;
							bottom: 0;
							left: 0;
						}
						
						.booking-description {
							color: #666;
							margin-bottom: 25px;
							font-size: 16px;
						}
						
						/* Styling untuk tab */
						.booking-tabs {
							border-bottom: none;
							margin-bottom: 25px;
							display: flex;
							flex-wrap: wrap;
							gap: 5px;
						}
						
						.booking-tabs .nav-item {
							margin-bottom: 10px;
						}
						
						.booking-tabs .nav-link {
							border: none;
							background-color: #f8f9fa;
							color: #495057;
							font-weight: 500;
							padding: 12px 20px;
							border-radius: 8px;
							transition: all 0.3s ease;
							position: relative;
							overflow: hidden;
							z-index: 1;
						}
						
						.booking-tabs .nav-link:before {
							content: '';
							position: absolute;
							bottom: 0;
							left: 0;
							width: 0%;
							height: 3px;
							background-color: #0d6efd;
							transition: all 0.3s ease;
							z-index: -1;
						}
						
						.booking-tabs .nav-link:hover {
							color: #0d6efd;
						}
						
						.booking-tabs .nav-link:hover:before {
							width: 100%;
						}
						
						.booking-tabs .nav-link.active {
							background-color: #0d6efd;
							color: white;
							font-weight: 600;
							box-shadow: 0 4px 10px rgba(13, 110, 253, 0.25);
						}
						
						.booking-tabs .nav-link.active:before {
							width: 100%;
						}
						
						/* Styling untuk form */
						.booking-form {
							background-color: #f8f9fa;
							border-radius: 10px;
							padding: 25px;
							transition: all 0.3s ease;
						}
						
						.booking-form label {
							font-weight: 500;
							color: #495057;
							margin-bottom: 8px;
							display: block;
							font-size: 14px;
						}
						
						.booking-form .form-control {
							border-radius: 8px;
							padding: 12px 15px;
							border: 1px solid #ced4da;
							transition: all 0.3s ease;
							background-color: #fff;
							font-size: 15px;
						}
						
						.booking-form .form-control:focus {
							border-color: #0d6efd;
							box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
						}
						
						.booking-form .form-control::placeholder {
							color: #adb5bd;
							font-size: 14px;
						}
						
						/* Styling untuk tombol */
						.booking-form .btn-booking {
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
						
						.booking-form .btn-booking:hover {
							background-color: #0b5ed7;
							transform: translateY(-2px);
							box-shadow: 0 6px 15px rgba(13, 110, 253, 0.3);
						}
						
						/* Animasi untuk tab content */
						.tab-pane {
							transition: all 0.3s ease-in-out;
							opacity: 0;
							transform: translateY(10px);
						}
						
						.tab-pane.show {
							opacity: 1;
							transform: translateY(0);
						}
						
						/* Responsive styling */
						@media (max-width: 768px) {
							.booking-tabs .nav-link {
							padding: 10px 15px;
							font-size: 14px;
							}
							
							.booking-form {
							padding: 20px 15px;
							}
						}
						
						/* Icon styling */
						.input-icon {
							position: relative;
						}
						
						.input-icon i {
							position: absolute;
							top: 50%;
							transform: translateY(-50%);
							left: 15px;
							color: #adb5bd;
						}
						
						.input-icon .form-control {
							padding-left: 40px;
						}
					</style>
							               <script>
                  document.addEventListener('DOMContentLoaded', function () {
                    // AJAX submit untuk form antar-bandara
                    const bandaraForm = document.getElementById('booking-travel-bandara-form');
                    if (bandaraForm) {
                      bandaraForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        const submitBtn = bandaraForm.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;
                        submitBtn.textContent = 'Processing...';
                        submitBtn.disabled = true;
                        const formData = new FormData(bandaraForm);
                        
                        Swal.fire({
                          title: 'Processing...',
                          allowOutsideClick: false,
                          didOpen: () => { Swal.showLoading(); }
                        });
                        
                        fetch('<?= base_url('booking/booking_travel_bandara') ?>', {
                          method: 'POST',
                          body: formData
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
                                    html: 'Mengalihkan ke WhatsApp ...',
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                }).then((result) => {
                                    const waNumber = '6288213761173';
                                    const customerName = encodeURIComponent(data.customer_name || '');
                                    const bookingCode = encodeURIComponent(data.booking_code || '');
                                    const waNumberCustomer = encodeURIComponent(data.wa_number || '');
                                    const totalPassengers = encodeURIComponent(data.total_passengers || '');
                                    const bookingDate = encodeURIComponent(data.booking_date || '');
                                    const pickupAddress = encodeURIComponent(data.pickup_address || '');
                                    const airportName = encodeURIComponent(data.airport_name || '');
                                    const pickupTime = encodeURIComponent(data.pickup_time || '');
                                    const flightTime = encodeURIComponent(data.flight_time || '');
                                    const flightNumber = encodeURIComponent(data.flight_number || '');
                                    const services = encodeURIComponent(data.services || '');
                                    const luggageItems = encodeURIComponent(data.luggage_items || '');
                                    
                                    // Create WhatsApp message
                                    let message = `Halo, saya ${customerName}%0A`;
                                    message += `Saya sudah melakukan pemesanan travel bandara dengan detail sebagai berikut:%0A%0A`;
                                    message += `*Kode Booking*: ${bookingCode}%0A`;
                                    message += `*Nama*: ${customerName}%0A`;
                                    message += `*No. WhatsApp*: ${waNumberCustomer}%0A`;
                                    message += `*Total Penumpang*: ${totalPassengers}%0A`;
                                    message += `*Bandara Tujuan*: ${airportName}%0A`;
                                    message += `*Tanggal Keberangkatan*: ${bookingDate}%0A`;
                                    message += `*Waktu Penjemputan*: ${pickupTime}%0A`;
                                    message += `*Waktu Penerbangan*: ${flightTime}%0A`;
                                    message += `*Nomor Penerbangan*: ${flightNumber}%0A`;
                                    message += `*Layanan*: ${services}%0A`;
                                    message += `*Barang Bawaan*: ${luggageItems}%0A`;
                                    message += `*Alamat Penjemputan*: ${pickupAddress}%0A%0A`;
                                    message += `Terima kasih.`;

                                    // Open WhatsApp with the message
                                    window.open(`https://wa.me/${waNumber}?text=${message}`, '_blank');
                                    
                                    // Reset the form
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
                                       bandaraForm.reset();
                                    });
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: data.message || 'Gagal menyimpan booking.',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: '#0D83FD'
                                });
                            }
                        })
                        .catch((error) => {
                            console.error('Error:', error);
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
                    // AJAX submit untuk form pulang-pergi bandara
                    const bandaraPPForm = document.getElementById('booking-travel-bandara-pp-form');
                    if (bandaraPPForm) {
                      bandaraPPForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        const submitBtn = bandaraPPForm.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;
                        submitBtn.textContent = 'Processing...';
                        submitBtn.disabled = true;
                        const formData = new FormData(bandaraPPForm);
                        
                        Swal.fire({
                          title: 'Processing...',
                          allowOutsideClick: false,
                          didOpen: () => { Swal.showLoading(); }
                        });
                        
                        fetch('<?= base_url('booking/booking_travel_bandara_pp') ?>', {
                          method: 'POST',
                          body: formData
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
                                    html: 'Mengalihkan ke WhatsApp ...',
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                }).then((result) => {
                                    const waNumber = '6288213761173'; 
                                    const customerName = encodeURIComponent(data.customer_name || '');
                                    const bookingCode = encodeURIComponent(data.booking_code || '');
                                    const waNumberCustomer = encodeURIComponent(data.wa_number || '');
                                    const totalPassengers = encodeURIComponent(data.total_passengers || '');
                                    const bookingDate = encodeURIComponent(data.booking_date || '');
                                    const pickupAddress = encodeURIComponent(data.pickup_address || '');
                                    const airportName = encodeURIComponent(data.airport_name || '');
                                    const pickupTime = encodeURIComponent(data.pickup_time || '');
                                    // const returnDate = encodeURIComponent(data.return_date || '');
                                    // const returnTime = encodeURIComponent(data.return_time || '');
                                    // const flightNumber = encodeURIComponent(data.flight_number || '');
                                    // const services = encodeURIComponent(data.services || '');
                                    // const luggageItems = encodeURIComponent(data.luggage_items || '');
                                    
                                    // Create WhatsApp message
                                    let message = `Halo, saya ${customerName}%0A`;
                                    message += `Saya sudah melakukan pemesanan travel bandara (Pulang Pergi) dengan detail sebagai berikut:%0A%0A`;
                                    message += `*Kode Booking*: ${bookingCode}%0A`;
                                    message += `*Nama*: ${customerName}%0A`;
                                    message += `*No. WhatsApp*: ${waNumberCustomer}%0A`;
                                    message += `*Total Penumpang*: ${totalPassengers}%0A`;
                                    message += `*Bandara Tujuan*: ${airportName}%0A`;
                                    message += `*Tanggal Keberangkatan*: ${bookingDate}%0A`;
                                    message += `*Waktu Penjemputan*: ${pickupTime}%0A`;
                                    // message += `*Tanggal Kembali*: ${returnDate}%0A`;
                                    // message += `*Waktu Kembali*: ${returnTime}%0A`;
                                    // message += `*Nomor Penerbangan*: ${flightNumber}%0A`;
                                    // message += `*Layanan*: ${services}%0A`;
                                    // message += `*Barang Bawaan*: ${luggageItems}%0A`;
                                    message += `*Alamat Penjemputan*: ${pickupAddress}%0A%0A`;
                                    message += `Terima kasih.`;

                                    // Open WhatsApp with the message
                                    window.open(`https://wa.me/${waNumber}?text=${message}`, '_blank');
                                    
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
                                       bandaraPPForm.reset();
                                    });
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: data.message || 'Gagal menyimpan booking.',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: '#0D83FD'
                                });
                            }
                        })
                        .catch((error) => {
                            console.error('Error:', error);
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
                    
                    // AJAX submit untuk form jemput-bandara
                    const bandaraPickupForm = document.getElementById('booking-travel-bandara-pickup-form');
                    if (bandaraPickupForm) {
                      bandaraPickupForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        const submitBtn = bandaraPickupForm.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;
                        submitBtn.textContent = 'Processing...';
                        submitBtn.disabled = true;
                        const formData = new FormData(bandaraPickupForm);
                        
                        Swal.fire({
                          title: 'Processing...',
                          allowOutsideClick: false,
                          didOpen: () => { Swal.showLoading(); }
                        });
                        
                        fetch('<?= base_url('booking/booking_travel_bandara_pickup') ?>', {
                          method: 'POST',
                          body: formData
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
                                    html: 'Mengalihkan ke WhatsApp ...',
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                }).then((result) => {
                                    const waNumber = '6288213761173'; 
                                    const customerName = encodeURIComponent(data.customer_name || '');
                                    const bookingCode = encodeURIComponent(data.booking_code || '');
                                    const waNumberCustomer = encodeURIComponent(data.wa_number || '');
                                    const totalPassengers = encodeURIComponent(data.total_passengers || '');
                                    const bookingDate = encodeURIComponent(data.booking_date || '');
                                    const pickupAddress = encodeURIComponent(data.pickup_address || '');
                                    const airportName = encodeURIComponent(data.airport_name || '');
                                    const arrivalTime = encodeURIComponent(data.arrival_time || '');
                                    const flightNumber = encodeURIComponent(data.flight_number || '');
                                    const services = encodeURIComponent(data.services || '');
                                    const luggageItems = encodeURIComponent(data.luggage_items || '');
                                    
                                    // Create WhatsApp message
                                    let message = `Halo, saya ${customerName}%0A`;
                                    message += `Saya sudah melakukan pemesanan jemput bandara dengan detail sebagai berikut:%0A%0A`;
                                    message += `*Kode Booking*: ${bookingCode}%0A`;
                                    message += `*Nama*: ${customerName}%0A`;
                                    message += `*No. WhatsApp*: ${waNumberCustomer}%0A`;
                                    message += `*Total Penumpang*: ${totalPassengers}%0A`;
                                    message += `*Bandara Asal*: ${airportName}%0A`;
                                    message += `*Tanggal Kedatangan*: ${bookingDate}%0A`;
                                    message += `*Waktu Kedatangan*: ${arrivalTime}%0A`;
                                    message += `*Nomor Penerbangan*: ${flightNumber}%0A`;
                                    message += `*Layanan*: ${services}%0A`;
                                    message += `*Barang Bawaan*: ${luggageItems}%0A`;
                                    message += `*Alamat Tujuan*: ${pickupAddress}%0A%0A`;
                                    message += `Terima kasih.`;

                                    // Open WhatsApp with the message
                                    window.open(`https://wa.me/${waNumber}?text=${message}`, '_blank');
                                    
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
                                       bandaraPickupForm.reset();
                                    });
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: data.message || 'Gagal menyimpan booking.',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: '#0D83FD'
                                });
                            }
                        })
                        .catch((error) => {
                            console.error('Error:', error);
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
                  
                    // Aktifkan tab terakhir yang dipilih jika ada di localStorage
                    var lastTab = localStorage.getItem('activeBookingTab');
                    if (lastTab) {
                      var tabTrigger = document.querySelector('button[data-bs-target="' + lastTab + '"]');
                      if (tabTrigger) {
                        var tab = new bootstrap.Tab(tabTrigger);
                        tab.show();
                      }
                    }
                  
                    // Simpan tab yang dipilih ke localStorage saat tab di-click
                    var tabButtons = document.querySelectorAll('#bookingTab button[data-bs-toggle="tab"]');
                    tabButtons.forEach(function (btn) {
                      btn.addEventListener('shown.bs.tab', function (event) {
                        localStorage.setItem('activeBookingTab', event.target.getAttribute('data-bs-target'));
                      });
                    });
                  });
               </script>
						</div>
					</div>
				</div>
			</div>
		</section>
