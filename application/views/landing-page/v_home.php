<!-- Konten utama halaman Home, tanpa tag <html>, <head>, <body>, navbar, footer, dan script -->
<!-- Hero Section -->

<head>
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    /* Fixed-size destination cards for consistent layout */
    .destination-card {
        width: 100%;
        /* allows grid column to control actual width */
        max-width: 360px;
        /* optional ceiling so cards don't stretch too wide */
        height: 420px;
        /* fixed card height to keep rows aligned */
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border-radius: .5rem;
    }

    .destination-card .card-img-top {
        width: 100%;
        height: 220px;
        /* fixed image height */
        object-fit: cover;
        /* keep aspect ratio and crop to fill */
        display: block;
    }

    .destination-card .card-body {
        padding: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: calc(100% - 220px);
        /* remaining height after image */
    }

    /* Truncate long text to keep cards uniform */
    .destination-card .card-title {
        font-size: 1rem;
        line-height: 1.2;
        max-height: 2.4em;
        /* approx 2 lines */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .destination-card .card-text {
        font-size: .9rem;
        color: #6c757d;
        max-height: 3.6em;
        /* approx 3 lines */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        margin-bottom: .5rem;
    }

    /* Ensure booking button stays at bottom when content is short */
    .destination-card .btn {
        margin-top: 0.5rem;
    }
    </style>
</head>
<section id="hero" class="hero section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row ">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="company-badge mb-4">
                        <i class="bi bi-compass-fill me-2"></i>
                        Explore Jogja with Comfort
                    </div>

                    <h1 class="mb-4">
                        Your Journey <br>
                        Starts With <br>
                        <span class="accent-text">Wak Trans Tour And Travel Yogyakarta</span>
                    </h1>

                    <p class="mb-4 mb-md-5">
                        Discover the beauty of Yogyakarta with our premium transportation service.
                        Comfortable vehicles, experienced drivers, and customizable tour packages
                        to make your Jogja adventure unforgettable.
                    </p>

                    <div class="hero-buttons">
                        <a href="#travel-wisata-jogja" class="btn btn-primary me-0 me-sm-2 mx-1">Book Now</a>
                        <a id="watch-tours-btn" href="#" role="button" class="btn btn-link mt-2 mt-sm-0">
                            <i class="bi bi-play-circle me-1"></i>
                            Watch Our Tours
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                    <img src="<?= base_url('landing-page/') ?>assets/img/base/main3.png" class="image-fluid"
                        alt="Hero Image">

                    <div class="customers-badge">
                        <div class="customer-avatars">
                            <img src="<?= base_url('landing-page/') ?>assets/img/avatar-1.webp" alt="Customer 1"
                                class="avatar">
                            <img src="<?= base_url('landing-page/') ?>assets/img/avatar-2.webp" alt="Customer 2"
                                class="avatar">
                            <img src="<?= base_url('landing-page/') ?>assets/img/avatar-3.webp" alt="Customer 3"
                                class="avatar">
                            <img src="<?= base_url('landing-page/') ?>assets/img/avatar-4.webp" alt="Customer 4"
                                class="avatar">
                            <img src="<?= base_url('landing-page/') ?>assets/img/avatar-5.webp" alt="Customer 5"
                                class="avatar">
                            <span class="avatar more">3+</span>
                        </div>
                        <p class="mb-0 mt-2">Trusted by 3,000+ travelers for the best Yogyakarta experience</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <div class="stat-content">
                        <h4>Best Tour Operator</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="stat-content">
                        <h4>1000+ Tours Completed Successfully</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <div class="stat-content">
                        <h4>12,500+ Travelers</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <div class="stat-content">
                        <h4>98% Satisfaction</h4>
                    </div>
                </div>
            </div>
        </div>


    </div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

            <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                <span class="about-meta">MORE ABOUT US</span>
                <h2 class="about-title">Voluptas enim suscipit temporibus</h2>
                <p class="about-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                    architecto
                    beatae vitae dicta sunt explicabo.</p>

                <div class="row feature-list-wrapper">
                    <div class="col-md-6">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> Lorem ipsum dolor sit amet</li>
                            <li><i class="bi bi-check-circle-fill"></i> Consectetur adipiscing elit</li>
                            <li><i class="bi bi-check-circle-fill"></i> Sed do eiusmod tempor</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> Incididunt ut labore et</li>
                            <li><i class="bi bi-check-circle-fill"></i> Dolore magna aliqua</li>
                            <li><i class="bi bi-check-circle-fill"></i> Ut enim ad minim veniam</li>
                        </ul>
                    </div>
                </div>

                <div class="info-wrapper">
                    <div class="row gy-4">
                        <div class="col-lg-5">
                            <div class="profile d-flex align-items-center gap-3">
                                <img src="<?= base_url('landing-page/') ?>assets/img/avatar-1.webp" alt="CEO Profile"
                                    class="profile-image">
                                <div>
                                    <h4 class="profile-name">Mario Smith</h4>
                                    <p class="profile-position">CEO &amp; Founder</p>
                                    <script>
                                    // Fetch site contact data once and expose as `window.siteContact`
                                    (function() {
                                        var contactApi = '<?= base_url('Content_Management/get_contact_data') ?>';
                                        window.siteContact = {
                                            whatsapp: '6288213761173', // default fallback
                                            email: null,
                                            alamat: null,
                                            fb: null,
                                            ig: null,
                                            tiktok: null,
                                            twitter: null
                                        };

                                        try {
                                            fetch(contactApi, {
                                                    method: 'GET',
                                                    headers: {
                                                        'Accept': 'application/json'
                                                    }
                                                })
                                                .then(function(resp) {
                                                    return resp.json();
                                                })
                                                .then(function(res) {
                                                    if (!res || res.status !== 'success' || !res.data) return;
                                                    var c = res.data || {};
                                                    var wa = c.whatsapp || c.whatsapp_number || '';
                                                    if (wa) {
                                                        wa = wa.toString().trim().replace(/\s+/g, '');
                                                        if (wa.charAt(0) === '+') wa = wa.substr(1);
                                                        if (wa.charAt(0) === '0') wa = '62' + wa.substr(1);
                                                        if (wa) window.siteContact.whatsapp = wa;
                                                    }
                                                    window.siteContact.email = c.email || null;
                                                    window.siteContact.alamat = c.alamat || null;
                                                    window.siteContact.fb = c.fb || null;
                                                    window.siteContact.ig = c.ig || null;
                                                    window.siteContact.tiktok = c.tiktok || null;
                                                    window.siteContact.twitter = c.twitter || null;

                                                    // Update visible contact number if element exists
                                                    var contactEl = document.querySelector('.contact-number');
                                                    if (contactEl && window.siteContact.whatsapp) {
                                                        var display = window.siteContact.whatsapp;
                                                        if (display.indexOf('62') === 0) display = '+' +
                                                            display;
                                                        contactEl.textContent = display;
                                                    }
                                                })
                                                .catch(function(err) {
                                                    console.warn('Failed to load contact data', err);
                                                });
                                        } catch (e) {
                                            console.warn('Contact fetch error', e);
                                        }
                                    })();
                                    </script>

                                    <!-- Popup Modal markup (will be populated dynamically) -->
                                    <div class="modal fade" id="sitePopupModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body p-0 text-center position-relative">
                                                    <button type="button"
                                                        class="btn-close position-absolute top-0 end-0 m-3 bg-white rounded-circle p-1 shadow-sm"
                                                        style="width:40px;height:40px;" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    <img src="" alt="Popup Image" id="sitePopupImage"
                                                        class="img-fluid w-100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                    // Popup configuration - uses external script to run
                                    window.__sitePopupApi = '<?= base_url('Content_Management/public_popup_list') ?>';
                                    window.__sitePopupStorageKey = 'sitePopupShown_v1';
                                    </script>
                                    <script src="<?= base_url('landing-page/assets/js/site-popup.js') ?>"></script>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-info d-flex align-items-center gap-2">
                                <i class="bi bi-telephone-fill"></i>
                                <div>
                                    <p class="contact-label">Call us anytime</p>
                                    <p class="contact-number">+123 456-789</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                <div class="image-wrapper">
                    <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                        <img src="<?= base_url('landing-page/') ?>assets/img/about-5.webp" alt="Business Meeting"
                            class="img-fluid main-image rounded-4">
                        <img src="<?= base_url('landing-page/') ?>assets/img/about-2.webp" alt="Team Discussion"
                            class="img-fluid small-image rounded-4">
                    </div>
                    <div class="experience-badge floating">
                        <h3>15+ <span>Years</span></h3>
                        <p>Of experience in business service</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
<!-- /About Section -->

<!-- Destinations Section -->
<section id="features" class="features section">

    <!-- Section Title -->

    <div class="container">
        <div class="section-header text-center position-relative" data-aos="fade-up">
            <h3 class="section-title fw-bold">Destinasi Pilihan</h3>
            <span class="section-badge">Temukan berbagai pilihan destinasi menarik untuk perjalanan liburan Anda
                berikutnya</span>
        </div>

        <div class="d-flex justify-content-center">

            <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#destinations-tab-1">
                        <h4>Wisata</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#destinations-tab-2">
                        <h4>City Tour</h4>
                    </a>
                </li><!-- End tab nav item -->

            </ul>

        </div>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

            <!-- Wisata Tab -->
            <div class="tab-pane fade active show" id="destinations-tab-1">
                <div class="row gy-4 mt-4" id="destinations-wisata">
                    <!-- paket wisata akan dimuat di sini via AJAX -->
                </div>
            </div><!-- End Wisata Tab -->

            <!-- City Tour Tab -->
            <div class="tab-pane fade" id="destinations-tab-2">
                <div class="row gy-4 mt-4" id="destinations-city">
                    <!-- paket city tour akan dimuat di sini via AJAX -->
                </div>
            </div><!-- End City Tour Tab -->

        </div>

    </div>

</section><!-- /Destinations Section -->

<script>
$(function() {
    var baseUrl = '<?= base_url() ?>';
    var api = baseUrl + 'Content_Management/public_gallery_list';

    function renderGalleryItem(img) {
        var imageUrl = img.path ? baseUrl + img.path : img.url_image;
        var html = '';
        html += '<div class="col-lg-4 col-md-6 gallery-item">';
        html += '  <div class="gallery-card">';
        html += '    <img src="' + imageUrl + '" class="img-fluid" alt="Gallery Image">';
        html += '    <div class="gallery-info">';
        html += '      <a href="' + imageUrl +
            '" class="glightbox" title="Gallery Image"><i class="bi bi-zoom-in"></i></a>';
        html += '    </div>';
        html += '  </div>';
        html += '</div>';
        return html;
    }

    $.ajax({
        url: api,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            if (!res || res.status !== 'success') {
                $('#dynamic-gallery-grid').html(
                    '<div class="col-12"><p>Tidak ada gambar gallery.</p></div>');
                return;
            }

            var html = '';
            res.data.forEach(function(img) {
                html += renderGalleryItem(img);
            });

            if (html === '') html = '<div class="col-12"><p>Tidak ada gambar gallery.</p></div>';
            $('#dynamic-gallery-grid').html(html);

            // re-init lightbox for dynamically added items
            if (typeof GLightbox === 'function') {
                GLightbox({
                    selector: '.glightbox'
                });
            }
        },
        error: function() {
            $('#dynamic-gallery-grid').html(
                '<div class="col-12"><p>Gagal memuat galeri.</p></div>');
        }
    });
});
</script>

<script>
$(function() {
    var baseUrl = '<?= base_url() ?>';
    var apiUrl = baseUrl + 'Tour_Package/list_tour_package_public';

    function renderCard(pkg) {
        var imageUrl = pkg.image ? baseUrl + pkg.image : baseUrl +
            'landing-page/assets/img/base/default-tour.png';
        var title = pkg.name || 'Nama Paket';
        var desc = pkg.description || '-';
        var price = pkg.price ? 'Rp ' + parseFloat(pkg.price).toLocaleString('id-ID') : 'Rp 0';

        var html = '';
        html += '<div class="col-lg-4 col-md-6" data-aos="fade-up">';
        html += '  <div class="card destination-card">';
        html += '    <img src="' + imageUrl + '" class="card-img-top" alt="' + title + '">';
        html += '    <div class="card-body">';
        html += '      <h5 class="card-title">' + title + '</h5>';
        html += '      <p class="card-text">' + desc + '</p>';
        // html += '      <p class="fw-bold">' + price + '</p>';
        html +=
            '      <a href="#" class="btn btn-primary w-100 mt-3 open-booking" data-bs-toggle="modal" data-bs-target="#bookingModal" data-id="' +
            pkg.id + '" data-name="' + title.replace(/"/g, '&quot;') + '">Booking</a>';
        html += '    </div>';
        html += '  </div>';
        html += '</div>';

        return html;
    }

    // Load all packages (server-side returns paginated data but DataTables style params are optional)
    $.ajax({
        url: apiUrl,
        type: 'POST',
        dataType: 'json',
        data: {
            length: 100,
            start: 0
        },
        success: function(res) {
            if (!res || !res.data) return;

            var wisataHtml = '';
            var cityHtml = '';

            res.data.forEach(function(pkg) {
                // pkg.type expected to be 'wisata' or 'city_tour'
                if (pkg.type === 'wisata') {
                    wisataHtml += renderCard(pkg);
                } else if (pkg.type === 'city_tour') {
                    cityHtml += renderCard(pkg);
                }
            });

            if (wisataHtml === '') wisataHtml =
                '<div class="col-12"><p>Tidak ada paket wisata.</p></div>';
            if (cityHtml === '') cityHtml =
                '<div class="col-12"><p>Tidak ada paket city tour.</p></div>';

            $('#destinations-wisata').html(wisataHtml);
            $('#destinations-city').html(cityHtml);
        },
        error: function() {
            $('#destinations-wisata').html(
                '<div class="col-12"><p>Gagal memuat paket wisata.</p></div>');
            $('#destinations-city').html(
                '<div class="col-12"><p>Gagal memuat paket city tour.</p></div>');
        }
    });
});
</script>

<script>
$(function() {
    var base = '<?= base_url() ?>';
    var api = base + 'Master_Data/public_artikel_list';

    function renderArtikel(a) {
        var imgUrl = a.path ? base + a.path : (a.image ? base + a.image : base +
            'landing-page/assets/img/base/default-article.png');
        var title = a.title || 'Judul Artikel';
        var subtitle = a.sub_title || '';
        // potong maksimal 25 karakter, tambahkan ellipsis jika lebih panjang
        var subtitleShort = subtitle && subtitle.length > 25 ? subtitle.substring(0, 25) + '...' : subtitle;
        // ambil deskripsi lengkap jika tersedia (fallback ke beberapa kemungkinan nama field)
        var description = a.description || a.content || a.body || a.excerpt || '';

        // encode values untuk dimasukkan ke data-attribute
        var dTitle = encodeURIComponent(title);
        var dSubtitle = encodeURIComponent(subtitle);
        var dDesc = encodeURIComponent(description);
        var dImg = encodeURIComponent(imgUrl);

        var html = '';
        html += '<div class="col-lg-4 col-md-6 gallery-item">';
        html += '  <div class="gallery-card">';
        html += '    <img src="' + imgUrl + '" class="img-fluid" alt="' + title + '">';
        html += '    <div class="gallery-info">';
        html += '      <h5>' + title + '</h5>';
        html += '      <p>' + subtitleShort + '</p>';
        html +=
            '      <button type="button" class="btn btn-light mt-2" data-bs-toggle="modal" data-bs-target="#artikelModal" data-title="' +
            dTitle + '" data-subtitle="' + dSubtitle + '" data-desc="' + dDesc + '" data-img="' + dImg +
            '">Baca</button>';
        html += '    </div>';
        html += '  </div>';
        html += '</div>';
        return html;
    }

    $.ajax({
        url: api,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            if (!res || res.status !== 'success') {
                $('#dynamic-artikel-grid').html(
                    '<div class="col-12"><p>Tidak ada artikel.</p></div>');
                return;
            }
            var html = '';
            res.data.forEach(function(a) {
                html += renderArtikel(a);
            });
            if (html === '') html = '<div class="col-12"><p>Tidak ada artikel.</p></div>';
            $('#dynamic-artikel-grid').html(html);
        },
        error: function() {
            $('#dynamic-artikel-grid').html(
                '<div class="col-12"><p>Gagal memuat artikel.</p></div>');
        }
    });
});
</script>



<!-- Features Cards Section -->
<section id="features-cards" class="features-cards section">
    <div class="container">
        <div class="section-header text-center position-relative" data-aos="fade-up">
            <span class="section-badge">TRAVEL PARTNER TERPERCAYA</span>
            <h2 class="section-title fw-bold">Kenapa Memilih <span class="text-primary">Kami</span></h2>
        </div>

        <div class="row gy-4">
            <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="feature-box orange">
                    <i class="bi bi-cash-coin"></i>
                    <h4>Harga Terbaik</h4>
                    <p>Dapatkan pengalaman wisata berkualitas dengan harga kompetitif. Kami menawarkan value for money
                        tanpa mengorbankan kualitas layanan.</p>
                </div>
            </div><!-- End Feature Box-->

            <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="feature-box blue">
                    <i class="bi bi-people"></i>
                    <h4>Pemandu Profesional</h4>
                    <p>Tim pemandu wisata bersertifikasi dan berpengetahuan luas tentang sejarah, budaya, dan spot foto
                        terbaik di setiap destinasi.</p>
                </div>
            </div><!-- End Feature Box-->

            <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="feature-box green">
                    <i class="bi bi-car-front"></i>
                    <h4>Transportasi Nyaman</h4>
                    <p>Armada kendaraan modern, terawat, dan ber-AC dengan driver profesional untuk kenyamanan
                        perjalanan Anda dari awal hingga akhir.</p>
                </div>
            </div><!-- End Feature Box-->

            <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                <div class="feature-box red">
                    <i class="bi bi-heart"></i>
                    <h4>Pelayanan Personal</h4>
                    <p>Kami memberikan perhatian pada detail dan kebutuhan khusus setiap pelanggan. Kepuasan Anda adalah
                        prioritas utama kami.</p>
                </div>
            </div><!-- End Feature Box-->
        </div>
    </div>
</section><!-- /Features Cards Section -->


<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row content justify-content-center align-items-center position-relative">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-4 mb-4">Wujudkan Liburan Impian Anda Bersama Kami</h2>
                <p class="mb-4">Jangan biarkan momen berharga berlalu begitu saja. Saatnya menjelajah keindahan
                    Indonesia dengan pengalaman perjalanan yang tak terlupakan, didampingi oleh tim profesional kami.
                </p>
                <a href="#travel-wisata-jogja" class="btn btn-cta">Booking Sekarang</a>
            </div>

            <!-- Abstract Background Elements -->
            <div class="shape shape-1">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z"
                        transform="translate(100 100)"></path>
                </svg>
            </div>

            <div class="shape shape-2">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z"
                        transform="translate(100 100)"></path>
                </svg>
            </div>

            <!-- Dot Pattern Groups -->
            <div class="dots dots-1">
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <pattern id="dot-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                    </pattern>
                    <rect width="100" height="100" fill="url(#dot-pattern)"></rect>
                </svg>
            </div>

            <div class="dots dots-2">
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <pattern id="dot-pattern-2" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                    </pattern>
                    <rect width="100" height="100" fill="url(#dot-pattern-2)"></rect>
                </svg>
            </div>

            <div class="shape shape-3">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z"
                        transform="translate(100 100)"></path>
                </svg>
            </div>
        </div>

    </div>

</section><!-- /Call To Action Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Apa Kata Mereka</h2>
        <p>Pengalaman tak terlupakan dari pelanggan yang telah menikmati perjalanan bersama kami</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper testimonials-swiper init-swiper">
            <script type="application/json" class="swiper-config">
            {
                "loop": true,
                "speed": 800,
                "autoplay": {
                    "delay": 5000
                },
                "slidesPerView": 1,
                "spaceBetween": 30,
                "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                },
                "navigation": {
                    "nextEl": ".testimonial-swiper-button-next",
                    "prevEl": ".testimonial-swiper-button-prev"
                },
                "breakpoints": {
                    "768": {
                        "slidesPerView": 2,
                        "spaceBetween": 30
                    },
                    "1200": {
                        "slidesPerView": 2,
                        "spaceBetween": 40
                    }
                }
            }
            </script>

            <div class="swiper-wrapper">

                <!-- Testimonial Item 1 -->
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="<?= base_url('landing-page/') ?>assets/img/testimonials/testimonials-1.jpg"
                            class="testimonial-img" alt="Foto Budi Santoso">
                        <h3>Budi Santoso</h3>
                        <h4>Keluarga, Jakarta</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Liburan keluarga kami ke Yogyakarta jadi sangat berkesan berkat layanan tour yang luar
                                biasa ini. Guide sangat ramah dan mengerti kebutuhan anak-anak. Semua destinasi yang
                                dikunjungi sesuai ekspektasi, bahkan lebih! Akomodasi nyaman dan makanan enak. Pasti
                                akan menggunakan jasa mereka lagi untuk trip berikutnya.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <!-- Testimonial Item 2 -->
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="<?= base_url('landing-page/') ?>assets/img/testimonials/testimonials-2.jpg"
                            class="testimonial-img" alt="Foto Anita Wijaya">
                        <h3>Anita Wijaya</h3>
                        <h4>Solo Traveler, Surabaya</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Sebagai solo traveler, keamanan dan kenyamanan adalah prioritas saya. Travel tour ini
                                memberikan pengalaman yang menyenangkan dengan grup kecil yang sangat friendly. Saya
                                menemukan spot-spot tersembunyi yang tidak akan saya temukan sendiri. Guide sangat
                                knowledgeable dan sabar menjawab semua pertanyaan saya.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <!-- Testimonial Item 3 -->
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="<?= base_url('landing-page/') ?>assets/img/testimonials/testimonials-3.jpg"
                            class="testimonial-img" alt="Foto Dian & Reza">
                        <h3>Dian & Reza</h3>
                        <h4>Honeymoon Couple, Bandung</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Paket honeymoon ke Labuan Bajo yang kami pilih benar-benar sempurna! Pemandangan
                                sunset di Pulau Padar, snorkeling dengan manta ray, dan kunjungan ke Pulau Komodo jadi
                                momen tak terlupakan. Tim tour sangat perhatian dengan detail kecil yang membuat
                                perjalanan kami spesial. Terima kasih untuk pengalaman honeymoon yang magical!</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->

                <!-- Testimonial Item 4 -->
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="<?= base_url('landing-page/') ?>assets/img/testimonials/testimonials-4.jpg"
                            class="testimonial-img" alt="Foto Hendra Wijaya">
                        <h3>Hendra Wijaya</h3>
                        <h4>Business Trip, Semarang</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Saya menggunakan jasa mereka untuk mengatur company outing dengan 50 karyawan. Semua
                                berjalan lancar dari awal hingga akhir. Koordinasi sempurna, aktivitas team building
                                yang seru, dan penanganan logistik yang profesional. Semua karyawan sangat puas dan
                                refreshed. Definitely recommended untuk corporate event!</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div><!-- End testimonial item -->
            </div>

            <div class="swiper-pagination"></div>

            <!-- Navigation Arrows -->
            <div class="testimonial-swiper-button-next swiper-button-next"></div>
            <div class="testimonial-swiper-button-prev swiper-button-prev"></div>

        </div>

    </div>

</section><!-- /Testimonials Section -->



<!-- Services Section -->
<section id="services" class="services section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Layanan Kami</h2>
        <p>Kami menyediakan berbagai layanan perjalanan premium untuk memastikan pengalaman liburan Anda tak terlupakan
        </p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card d-flex">
                    <div class="icon flex-shrink-0">
                        <i class="bi bi-globe2"></i>
                    </div>
                    <div>
                        <h3>Paket Wisata Domestik</h3>
                        <p>Jelajahi keindahan Indonesia dari Sabang sampai Merauke dengan paket wisata yang dirancang
                            khusus untuk memenuhi kebutuhan liburan Anda. Dari pantai eksotis Bali hingga keajaiban alam
                            Raja Ampat, Lombok, dan Labuan Bajo dengan pelayanan terbaik.</p>
                    </div>
                </div>
            </div><!-- End Service Card -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card d-flex">
                    <div class="icon flex-shrink-0">
                        <i class="bi bi-car-front"></i>
                    </div>
                    <div>
                        <h3>Rental Mobil & Transportasi</h3>
                        <p>Nikmati perjalanan nyaman dengan layanan rental mobil kami, tersedia dengan sopir
                            berpengalaman maupun lepas kunci. Ideal untuk perjalanan dalam kota, luar kota, atau
                            eksplorasi destinasi wisata dengan fleksibilitas penuh sesuai jadwal Anda.</p>
                    </div>
                </div>
            </div><!-- End Service Card -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card d-flex">
                    <div class="icon flex-shrink-0">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h3>Private & Custom Tour</h3>
                        <p>Ingin liburan yang lebih personal? Kami menawarkan layanan private tour dan custom itinerary
                            sesuai dengan preferensi, budget, dan waktu Anda. Nikmati fleksibilitas dan privasi selama
                            perjalanan ke destinasi favorit di Indonesia.</p>
                    </div>
                </div>
            </div><!-- End Service Card -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-card d-flex">
                    <div class="icon flex-shrink-0">
                        <i class="bi bi-airplane-engines"></i>
                    </div>
                    <div>
                        <h3>Layanan Antar-Jemput Bandara</h3>
                        <p>Hindari kerumitan transportasi dengan layanan antar-jemput bandara kami yang tepat waktu dan
                            nyaman. Tersedia untuk individu maupun rombongan, dengan armada berkualitas dan sopir
                            profesional untuk memastikan perjalanan Anda dimulai dan diakhiri dengan menyenangkan.</p>
                    </div>
                </div>
            </div><!-- End Service Card -->
        </div>


    </div>

</section><!-- /Services Section -->


<!-- Pricing Section -->
<!-- <section id="pricing" class="pricing section light-background">

  <div class="container section-title" data-aos="fade-up">
    <h2>Pricing</h2>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4 justify-content-center">

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="pricing-card">
          <h3>Basic Plan</h3>
          <div class="price">
            <span class="currency">$</span>
            <span class="amount">9.9</span>
            <span class="period">/ month</span>
          </div>
          <p class="description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
            doloremque laudantium totam.</p>

          <h4>Featured Included:</h4>
          <ul class="features-list">
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Duis aute irure dolor
            </li>
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Excepteur sint occaecat
            </li>
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Nemo enim ipsam voluptatem
            </li>
          </ul>

          <a href="#" class="btn btn-primary">
            Buy Now
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="pricing-card popular">
          <div class="popular-badge">Most Popular</div>
          <h3>Standard Plan</h3>
          <div class="price">
            <span class="currency">$</span>
            <span class="amount">19.9</span>
            <span class="period">/ month</span>
          </div>
          <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
            praesentium voluptatum.</p>

          <h4>Featured Included:</h4>
          <ul class="features-list">
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Lorem ipsum dolor sit amet
            </li>
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Consectetur adipiscing elit
            </li>
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Sed do eiusmod tempor
            </li>
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Ut labore et dolore magna
            </li>
          </ul>

          <a href="#" class="btn btn-light">
            Buy Now
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="pricing-card">
          <h3>Premium Plan</h3>
          <div class="price">
            <span class="currency">$</span>
            <span class="amount">39.9</span>
            <span class="period">/ month</span>
          </div>
          <p class="description">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil
            molestiae.</p>

          <h4>Featured Included:</h4>
          <ul class="features-list">
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Temporibus autem quibusdam
            </li>
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Saepe eveniet ut et voluptates
            </li>
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Nam libero tempore soluta
            </li>
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Cumque nihil impedit quo
            </li>
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Maxime placeat facere possimus
            </li>
          </ul>

          <a href="#" class="btn btn-primary">
            Buy Now
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>

    </div>

  </div>

</section> -->
<!-- /Pricing Section -->

<!-- Faq Section -->
<!-- <section class="faq-9 faq section light-background" id="faq">

  <div class="container">
    <div class="row">

      <div class="col-lg-5" data-aos="fade-up">
        <h2 class="faq-title">Have a question? Check out the FAQ</h2>
        <p class="faq-description">Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet
          adipiscing sem neque sed ipsum.</p>
        <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
          <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
              fill="currentColor"></path>
          </svg>
        </div>
      </div>

      <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
        <div class="faq-container">

          <div class="faq-item faq-active">
            <h3>Non consectetur a erat nam at lectus urna duis?</h3>
            <div class="faq-content">
              <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur
                gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

          <div class="faq-item">
            <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
            <div class="faq-content">
              <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet
                id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque
                elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

          <div class="faq-item">
            <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
            <div class="faq-content">
              <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar
                elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque
                eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis
                sed odio morbi quis</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

          <div class="faq-item">
            <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
            <div class="faq-content">
              <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet
                id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque
                elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

          <div class="faq-item">
            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
            <div class="faq-content">
              <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in.
                Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est.
                Purus gravida quis blandit turpis cursus in</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

          <div class="faq-item">
            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
            <div class="faq-content">
              <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi.
                Distinctio ipsam dolore et.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

        </div>
      </div>

    </div>
  </div>
</section> -->
<!-- /Faq Section -->

<!-- Call To Action 2 Section -->
<section id="call-to-action-2" class="call-to-action-2 section dark-background">

    <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
                <div class="text-center">
                    <h3>Call To Action</h3>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                        id est
                        laborum.</p>
                    <a class="cta-btn" href="#">Call To Action</a>
                </div>
            </div>
        </div>
    </div>

</section><!-- /Call To Action 2 Section -->

<!-- Booking Section -->
<?php include APPPATH . 'views/booking/v_travel_wisata_jogja.php'; ?>
<?php include APPPATH . 'views/booking/v_travel_bandara.php'; ?>
<?php include APPPATH . 'views/booking/v_rental_mobil.php'; ?>
<?php include APPPATH . 'views/booking/v_carter_bus.php'; ?>
<!-- End Booking Section -->


<section id="gallery" class="gallery section">
    <div class="container" data-aos="fade-up">
        <div class="section-header text-center position-relative" data-aos="fade-up">
            <span class="section-badge fw-bold text-primary">GALERI PERJALANAN</span>
            <br>
            <br>
            <h2 class="section-title fw-bold">Momen <span class="text-primary">Tak Terlupakan</span></h2>
            <p class="mt-3 mb-5">Jelajahi berbagai pengalaman perjalanan yang telah kami dokumentasikan dari berbagai
                destinasi wisata di Indonesia</p>
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-container" data-aos="fade-up" data-aos-delay="200">
            <div class="row g-4 gallery-grid" id="dynamic-gallery-grid">
                <!-- gallery images will be loaded here via AJAX -->
            </div>
        </div>

        <br>
        <hr>
        <br>

        <!-- Artikel Grid -->
        <div class="section-header text-center position-relative" data-aos="fade-up">
            <span class="section-badge fw-bold text-primary">Rekomendasi Tempat Wisata</span>
            <br>
            <br>
            <h2 class="section-title fw-bold">Wisata <span class="text-primary">Yogyakarta</span></h2>
            <p class="mt-3 mb-5">Jelajahi berbagai tempat wisata di yogyakarta</p>
        </div>

        <div class="gallery-container" data-aos="fade-up" data-aos-delay="200">
            <div class="row g-4 gallery-grid" id="dynamic-artikel-grid">
                <!-- artikel images will be loaded here via AJAX -->
            </div>
        </div>

    </div>
</section><!-- /Gallery and Artikel Section -->

<!-- Sign In Section -->
<?php include APPPATH . 'views/auth/v_login.php'; ?>
<!-- End Sign In Section -->




</main>

<!-- Artikel Modal -->
<div class="modal fade" id="artikelModal" tabindex="-1" aria-labelledby="artikelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="artikelModalLabel">Artikel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5">
                        <img id="artikelModalImg" src="" alt="" class="img-fluid rounded-3"
                            style="width:100%;height:auto;object-fit:cover;">
                    </div>
                    <div class="col-lg-7">
                        <h3 id="artikelModalTitle"></h3>
                        <h6 id="artikelModalSubtitle" class="text-muted"></h6>
                        <hr>
                        <div id="artikelModalDesc"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Watch Our Tours</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div style="position:relative;padding-top:56.25%;">
                    <iframe id="videoModalIframe" src="about:blank" frameborder="0" allow="autoplay; encrypted-media"
                        allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var artikelModalEl = document.getElementById('artikelModal');
    if (!artikelModalEl) return;

    artikelModalEl.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        if (!button) return;

        // decode data attributes
        var title = button.getAttribute('data-title') ? decodeURIComponent(button.getAttribute(
            'data-title')) : '';
        var subtitle = button.getAttribute('data-subtitle') ? decodeURIComponent(button.getAttribute(
            'data-subtitle')) : '';
        var desc = button.getAttribute('data-desc') ? decodeURIComponent(button.getAttribute(
            'data-desc')) : '';
        var img = button.getAttribute('data-img') ? decodeURIComponent(button.getAttribute(
            'data-img')) : '';

        // populate modal
        var elTitle = document.getElementById('artikelModalTitle');
        var elSubtitle = document.getElementById('artikelModalSubtitle');
        var elDesc = document.getElementById('artikelModalDesc');
        var elImg = document.getElementById('artikelModalImg');

        if (elTitle) elTitle.textContent = title;
        if (elSubtitle) elSubtitle.textContent = subtitle;
        if (elDesc) elDesc.innerHTML = desc || '<p>Tidak ada deskripsi.</p>';
        if (elImg) elImg.src = img ||
            '<?= base_url('landing-page/') ?>assets/img/base/default-article.png';
    });

    artikelModalEl.addEventListener('hidden.bs.modal', function() {
        // clear contents
        var elTitle = document.getElementById('artikelModalTitle');
        var elSubtitle = document.getElementById('artikelModalSubtitle');
        var elDesc = document.getElementById('artikelModalDesc');
        var elImg = document.getElementById('artikelModalImg');
        if (elTitle) elTitle.textContent = '';
        if (elSubtitle) elSubtitle.textContent = '';
        if (elDesc) elDesc.innerHTML = '';
        if (elImg) elImg.src = '<?= base_url('landing-page/') ?>assets/img/base/default-article.png';
    });
});
</script>
</div>

<!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Booking Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingForm">
                    <input type="hidden" name="tour_package_id" id="bp_tour_package_id" />
                    <div class="mb-3">
                        <label for="bp_nama" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" id="bp_nama" name="nama_pemesan" required />
                    </div>
                    <div class="mb-3">
                        <label for="bp_telepon" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="bp_telepon" name="nomor_telepon" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" id="bp_kirim" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    // Prefill modal when booking button clicked
    $(document).on('click', '.open-booking', function(e) {
        var btn = $(this);
        var id = btn.data('id');
        var name = btn.data('name');
        $('#bp_tour_package_id').val(id);
        $('#bookingModalLabel').text('Booking Paket: ' + name);
        // clear previous values
        $('#bp_nama').val('');
        $('#bp_telepon').val('');
    });

    // Submit booking
    $('#bp_kirim').on('click', function() {
        var form = $('#bookingForm');
        if (!form[0].checkValidity()) {
            form[0].reportValidity();
            return;
        }

        var postData = form.serialize();
        var url = '<?= base_url("Tour_Package/book") ?>';

        $.post(url, postData)
            .done(function(res) {
                if (!res || !res.status) {
                    var msg = (res && res.message) ? res.message : 'Gagal melakukan booking';
                    Swal.fire('Gagal', msg, 'error');
                    return;
                }

                // build WhatsApp message and open
                var data = res.data || {};
                var pkgId = data.tour_package_id || '';
                var nama = encodeURIComponent(data.nama_pemesan || $('#bp_nama').val());
                var tel = encodeURIComponent(data.nomor_telepon || $('#bp_telepon').val());

                // Attempt to get package name from modal title (falls back to id)
                var pkgName = $('#bookingModalLabel').text().replace('Booking Paket: ', '') ||
                    pkgId;

                var waMessage = 'nama: ' + decodeURIComponent(nama) + ' , telepon: ' +
                    decodeURIComponent(tel) + ' , paket: ' + pkgName;

                // Use richer flow similar to rental booking: show loading, then open WhatsApp with detailed message
                Swal.fire({
                    title: 'Mengirim data booking!',
                    html: 'Menyiapkan pesan WhatsApp...',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    timer: 1200,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                }).then((result) => {
                    // WhatsApp number in international format (no leading zero)
                    const waNumber = (window.siteContact && window.siteContact.whatsapp) ?
                        window.siteContact.whatsapp : '6288213761173'; // fallback

                    const bookingCode = encodeURIComponent(data.booking_code || '');
                    const customerName = encodeURIComponent(data.nama_pemesan ||
                        decodeURIComponent(nama));
                    const customerPhone = encodeURIComponent(data.nomor_telepon ||
                        decodeURIComponent(tel));
                    const packageName = encodeURIComponent(pkgName || '');

                    // Build message - use %0A for new lines
                    let message = `Halo, saya ${customerName}%0A`;
                    message +=
                        `Saya sudah melakukan pemesanan paket dengan detail sebagai berikut:%0A%0A`;
                    message += `*Kode Booking*: ${bookingCode}%0A`;
                    message += `*Nama Pemesan*: ${customerName}%0A`;
                    message += `*No. Telepon*: ${customerPhone}%0A`;
                    message += `*Paket*: ${packageName}%0A%0A`;
                    message += `Terima kasih.`;

                    const whatsappUrl = `https://wa.me/${waNumber}?text=${message}`;

                    // close modal then open WhatsApp in new tab
                    $('#bookingModal').modal('hide');
                    window.open(whatsappUrl, '_blank');

                    // Show success dialog with booking code
                    Swal.fire({
                        icon: 'success',
                        title: 'Mengirim Booking !',
                        html: `<div class="text-start"><p>Terima kasih telah melakukan pemesanan. Detail pemesanan telah dikirim ke WhatsApp Anda.</p><div class="alert alert-info mt-3"><strong>Kode Booking:</strong> ${data.booking_code || ''}</div></div>`,
                        confirmButtonText: 'Selesai'
                    }).then(() => {
                        // reset form fields in modal
                        $('#bookingForm')[0].reset();
                        $('#bookingModalLabel').text('Booking Paket');
                    });
                });
            })
            .fail(function(xhr) {
                var msg = 'Gagal menyimpan booking';
                try {
                    var j = JSON.parse(xhr.responseText);
                    if (j && j.message) msg = j.message;
                } catch (e) {}
                Swal.fire('Error', msg, 'error');
            });
    });
});
</script>

<script>
// Load article into iframe when modal opened, clear when closed
document.addEventListener('DOMContentLoaded', function() {
    var artikelModal = document.getElementById('artikelModal');
    if (!artikelModal) return;

    artikelModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var src = button ? button.getAttribute('data-src') : null;
        var iframe = document.getElementById('artikelFrame');
        if (iframe && src) {
            iframe.src = src;
        }
    });

    artikelModal.addEventListener('hidden.bs.modal', function() {
        var iframe = document.getElementById('artikelFrame');
        if (iframe) iframe.src = 'about:blank';
    });
});
</script>

<script>
$(window).on('load', function() {
    // Semua id section booking
    var bookingSections = [
        '#travel-wisata-jogja',
        '#travel-bandara',
        '#rental-mobil',
        '#carter-bus'
    ];

    // Sembunyikan semua section booking saat load
    function hideAllBookingSections() {
        bookingSections.forEach(function(id) {
            $(id).hide();
        });
    }

    // Tampilkan travel-wisata-jogja secara default saat load
    hideAllBookingSections();
    $('#travel-wisata-jogja').show();

    // Handle klik menu Booking
    $('.booking-menu').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        // Hide semua section booking
        hideAllBookingSections();
        // Tampilkan section sesuai menu
        $(target).show();
        // Scroll ke section
        $('html, body').animate({
            scrollTop: $(target).offset().top - 100 // offset untuk header
        }, 500);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Initialize GLightbox
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        autoplayVideos: true
    });

    // Optional: Add animation when scrolling to gallery items
    const galleryItems = document.querySelectorAll('.gallery-item');

    const animateGalleryItems = () => {
        galleryItems.forEach((item, index) => {
            setTimeout(() => {
                item.style.opacity = 1;
                item.style.transform = 'translateY(0)';
            }, index * 100);
        });
    };

    // When user clicks the Watch button fetch the video link and open in modal
    (function() {
        var btn = document.getElementById('watch-tours-btn');
        if (!btn) return;
        var apiUrl = '<?= base_url('Content_Management/get_video_link') ?>';

        function getYouTubeEmbed(link) {
            if (!link) return null;
            var m = link.match(
                /(?:youtu\.be\/|youtube(?:-nocookie)?\.com\/(?:watch\?v=|embed\/|v\/))([A-Za-z0-9_-]{6,11})/
            );
            if (m && m[1]) return 'https://www.youtube.com/embed/' + m[1] + '?autoplay=1';
            return null;
        }

        btn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Watch button clicked, fetching video link...');

            fetch(apiUrl, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(function(resp) {
                    return resp.json();
                })
                .then(function(data) {
                    var link = data && data.link_video ? data.link_video : null;
                    console.log('Fetched video link:', link);
                    var embed = getYouTubeEmbed(link);
                    var iframe = document.getElementById('videoModalIframe');

                    if (embed) {
                        iframe.src = embed;
                    } else if (link) {
                        iframe.src = link;
                    } else {
                        iframe.src = 'https://www.youtube.com';
                    }

                    var videoModalEl = document.getElementById('videoModal');
                    if (videoModalEl) {
                        var modal = new bootstrap.Modal(videoModalEl);
                        modal.show();
                    }
                })
                .catch(function(err) {
                    console.error('Error fetching video link', err);
                    var iframe = document.getElementById('videoModalIframe');
                    if (iframe) iframe.src = 'https://www.youtube.com';
                    var videoModalEl = document.getElementById('videoModal');
                    if (videoModalEl) {
                        var modal = new bootstrap.Modal(videoModalEl);
                        modal.show();
                    }
                });
        });

        var videoModalEl = document.getElementById('videoModal');
        if (videoModalEl) {
            videoModalEl.addEventListener('hidden.bs.modal', function() {
                var iframe = document.getElementById('videoModalIframe');
                if (iframe) iframe.src = 'about:blank';
            });
        }
    })();

    // Initialize with a small delay
    setTimeout(animateGalleryItems, 300);

    // Optional: Add intersection observer for lazy loading effect
    if ('IntersectionObserver' in window) {
        const galleryObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    galleryObserver.unobserve(entry.target);
                }
            });
        }, {
            root: null,
            threshold: 0.1
        });

        galleryItems.forEach(item => {
            galleryObserver.observe(item);
            item.style.opacity = 0;
            item.style.transform = 'translateY(30px)';
        });
    }
});
</script>

<style>
/* Gallery Styles */
.gallery-card {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    height: 100%;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
}

.gallery-card img {
    width: 100%;
    height: 300px;
    /* Fixed height for consistency */
    object-fit: cover;
    transition: transform 0.6s ease;
}

/* Make the wide images taller */
.col-lg-8 .gallery-card img,
.col-lg-6 .gallery-card img {
    height: 350px;
}

.gallery-info {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
    color: white;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.4s ease;
}

.gallery-card:hover .gallery-info {
    opacity: 1;
    transform: translateY(0);
}

.gallery-card:hover img {
    transform: scale(1.05);
}

.gallery-info h5 {
    margin-bottom: 5px;
    font-weight: 600;
}

.gallery-info p {
    font-size: 0.9rem;
    margin-bottom: 10px;
    opacity: 0.9;
}

.gallery-info a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    color: white;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.gallery-info a:hover {
    background-color: var(--primary-color);
    transform: scale(1.1);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .gallery-item {
        margin-bottom: 15px;
    }

    .gallery-card img {
        height: 250px;
    }

    .col-lg-8 .gallery-card img,
    .col-lg-6 .gallery-card img {
        height: 300px;
    }
}
</style>
</body>

</html>