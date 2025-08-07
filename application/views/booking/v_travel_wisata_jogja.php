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
                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum
                        primis.
                    </p>
                    <!-- Form -->

                    <form id="booking-travel-form" action="javascript:void(0);" method="post" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-4">
                                <label for="name">Enter your name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name"
                                    required data-bs-toggle="tooltip" data-bs-placement="top" title="Enter your name">
                            </div>
                            <div class="col-md-4 ">
                                <label for="wa-number">Enter your whatsapp number</label>
                                <input type="wa-number" id="wa-number" class="form-control" name="wa-number"
                                    placeholder="Your Whatsapp Number" required data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Enter your whatsapp number">
                            </div>
                            <div class="col-md-4 ">
                                <label for="total-passenger">Total Passenger</label>
                                <input type="number" id="total-passenger" class="form-control" name="total-passenger"
                                    placeholder="Total Passenger" required data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Total Passenger">
                            </div>
                            <div class="col-md-4 ">
                                <label for="tour-destination">Tour Destination</label>
                                <input type="text" id="tour-destination" class="form-control" name="tour-destination"
                                    placeholder="Tour Destination" required data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Tour Destination">
                            </div>
                            <div class="col-md-4 ">
                                <label for="booking-date">Enter your booking date</label>
                                <input type="date" id="booking-date" class="form-control" name="booking-date"
                                    placeholder="Booking Date" required data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Enter your booking date">
                            </div>
                            <div class="col-md-4 ">
                                <label for="pickup-time">Pickup time</label>
                                <input type="text" id="pickup-time" class="form-control" name="pickup-time"
                                    placeholder="Pickup time" required data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Pickup time">
                            </div>
                            <div class="col-md-4 ">
                                <label for="duration">Duration</label>
                                <input type="text" id="duration" class="form-control" name="duration"
                                    placeholder="Duration" required data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Duration">
                            </div>
                            <div class="col-md-4 ">
                                <label for="pickup-address">Pickup address location</label>
                                <input type="text" id="pickup-address" class="form-control" name="pickup-address"
                                    placeholder="Copy your pickup address from google maps" required
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Pickup address location">
                            </div>
                            <div class="col-md-4 ">
                                <label for="car-type">Car Type</label>
                                <input type="text" id="car-type" class="form-control" name="car-type"
                                    placeholder="Choose Car Type" required data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Car Type">
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
                                html: 'Menyiapkan tiket Anda...',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                                timer: 1500, // 3 seconds timer
                                willOpen: () => {
                                    Swal.showLoading();
                                    // Start countdown
                                    let timerInterval;
                                    Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                        Swal.getHtmlContainer().innerHTML =
                                            'Mengalihkan ke WhatsApp dalam <b>' +
                                            Math.ceil(Swal.getTimerLeft() /
                                                1000) + '</b> detik...';
                                    }, 100);
                                    Swal.getTimerLeft = () => 1500 - (new Date() - Swal
                                        .getTimerStartDate());
                                },
                                timerProgressBar: true,
                                allowOutsideClick: false,
                                didOpen: () => {
                                    const b = Swal.getHtmlContainer().querySelector(
                                        'b');
                                    timerInterval = setInterval(() => {
                                        b.textContent = (Swal.getTimerLeft() /
                                            1000).toFixed(0);
                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {
                                // This will be called when timer finishes or user clicks outside
                                const waNumber =
                                    '6288213761173'; // WhatsApp number with country code
                                const customerName = encodeURIComponent(data.customer_name);
                                const bookingCode = encodeURIComponent(data.booking_code);

                                // First, generate and download the PDF
                                const generatePDF = () => {
                                    return new Promise((resolve) => {
                                        const pdfForm = document.createElement(
                                            'form');
                                        pdfForm.method = 'POST';
                                        pdfForm.action =
                                            '<?= base_url('booking/generate_pdf') ?>';
                                        pdfForm.target = '_blank';

                                        // Add all form data to the PDF form
                                        for (let [key, value] of Object.entries(
                                                data)) {
                                            if (key !== 'status') {
                                                const input = document
                                                    .createElement('input');
                                                input.type = 'hidden';
                                                input.name = key;
                                                input.value = value;
                                                pdfForm.appendChild(input);
                                            }
                                        }

                                        // Add a hidden input to indicate we want to return the PDF path
                                        const returnPathInput = document
                                            .createElement('input');
                                        returnPathInput.type = 'hidden';
                                        returnPathInput.name = 'return_path';
                                        returnPathInput.value = '1';
                                        pdfForm.appendChild(returnPathInput);

                                        // Create an iframe to handle the response
                                        const iframe = document.createElement(
                                            'iframe');
                                        iframe.name = 'pdfIframe';
                                        iframe.style.display = 'none';
                                        document.body.appendChild(iframe);

                                        // Handle the response from the iframe
                                        iframe.onload = function() {
                                            try {
                                                const response = JSON.parse(
                                                    iframe
                                                    .contentDocument
                                                    .body.innerText);
                                                if (response.status ===
                                                    'success') {
                                                    resolve(response
                                                        .pdf_url);
                                                } else {
                                                    resolve(null);
                                                }
                                            } catch (e) {
                                                resolve(null);
                                            }
                                            document.body.removeChild(
                                                iframe);
                                        };

                                        pdfForm.target = 'pdfIframe';
                                        document.body.appendChild(pdfForm);
                                        pdfForm.submit();
                                    });
                                };

                                // Generate PDF first, then open WhatsApp
                                generatePDF().then((pdfUrl) => {
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

                                    if (pdfUrl) {
                                        // Ensure the URL is properly formatted for WhatsApp
                                        const cleanPdfUrl = pdfUrl.replace(
                                            /^https?:\/\//, ''
                                        ); // Remove http/https to prevent double protocols
                                        message += `*TIKET PDF*%0A`;
                                        message +=
                                            `Silakan download tiket PDF di link berikut:%0A`;
                                        message += `${cleanPdfUrl}%0A%0A`;
                                        message +=
                                            `Harap simpan tiket ini sampai transaksi berakhir.`;
                                    }

                                    // Open WhatsApp with the message
                                    window.open(
                                        `https://wa.me/${waNumber}?text=${message}`,
                                        '_blank');

                                    // Reset the form
                                    bookingForm.reset();
                                });
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