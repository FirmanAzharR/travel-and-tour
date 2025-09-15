<footer id="footer" class="footer">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 footer-about">
                <a href="/#travel-wisata-jogja" class="logo d-flex align-items-center">
                    <img src="<?= base_url('landing-page/') ?>assets/img/base/logo.jpg" alt="Wak Trans Travel Logo"
                        class="img-fluid" style="max-width: 100px;">
                </a>

                <div class="footer-contact pt-3">
                    <p class="footer-alamat">Yogyakarta</p>
                    <p class="mt-2"><strong>Phone:</strong> <span class="footer-phone">+62 831-9751-1897</span></p>
                    <p class="mt-1"><strong>Email:</strong> <span class="footer-email">info@waktrans.com</span></p>
                </div>

                <div class="social-links d-flex mt-3">
                    <a href="#" class="me-2 footer-whatsapp" target="_blank" aria-label="WhatsApp"><i
                            class="bi bi-whatsapp"></i></a>
                    <a href="#" class="me-2 footer-instagram" target="_blank" aria-label="Instagram"><i
                            class="bi bi-instagram"></i></a>
                    <a href="#" class="me-2 footer-facebook" target="_blank" aria-label="Facebook"><i
                            class="bi bi-facebook"></i></a>
                    <a href="#" class="me-2 footer-tiktok" target="_blank" aria-label="TikTok"><i
                            class="bi bi-music-note-beamed"></i></a>
                    <a href="#" class="footer-twitter" target="_blank" aria-label="Twitter"><i
                            class="bi bi-twitter"></i></a>
                </div>

                <script>
                (function() {
                    var api = '<?= base_url('Content_Management/get_contact_data') ?>';
                    fetch(api, {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json'
                            }
                        })
                        .then(function(r) {
                            return r.json();
                        })
                        .then(function(res) {
                            if (!res || res.status !== 'success' || !res.data) return;
                            var d = res.data;

                            // alamat
                            if (d.alamat) document.querySelectorAll('.footer-alamat').forEach(function(el) {
                                el.textContent = d.alamat;
                            });

                            // phone (display with + and link using wa.me)
                            if (d.whatsapp) {
                                var wa = d.whatsapp.toString().trim().replace(/\s+/g, '');
                                if (wa.charAt(0) === '+') wa = wa.substr(1);
                                if (wa.charAt(0) === '0') wa = '62' + wa.substr(1);
                                document.querySelectorAll('.footer-phone').forEach(function(el) {
                                    el.textContent = (wa.indexOf('62') === 0 ? '+' + wa : wa);
                                });
                                var waLink = 'https://wa.me/' + wa;
                                var a = document.querySelector('.footer-whatsapp');
                                if (a) a.href = waLink;
                            }

                            // email
                            if (d.email) {
                                document.querySelectorAll('.footer-email').forEach(function(el) {
                                    el.textContent = d.email;
                                    el.href = 'mailto:' + d.email;
                                });
                            }

                            // socials
                            if (d.ig) {
                                var a = document.querySelector('.footer-instagram');
                                if (a) a.href = d.ig;
                            }
                            if (d.fb) {
                                var a = document.querySelector('.footer-facebook');
                                if (a) a.href = d.fb;
                            }
                            if (d.tiktok) {
                                var a = document.querySelector('.footer-tiktok');
                                if (a) a.href = d.tiktok;
                            }
                            if (d.twitter) {
                                var a = document.querySelector('.footer-twitter');
                                if (a) a.href = d.twitter;
                            }
                        })
                        .catch(function(e) {
                            console.warn('Failed to load footer contact', e);
                        });
                })();
                </script>
            </div>

            <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3 footer-links">
				<h4>Layanan Kami</h4>
				<ul>
					<li><a href="/#travel-wisata-jogja">Paket Wisata</a></li>
					<li><a href="/#rental-mobil">Rental Mobil</a></li>
					<li><a href="/#travel-bandara">Antar Jemput Bandara</a></li>
					<li><a href="/#carter-bus">Carter Bus</a></li>
				</ul>
			</div>

			<div class="col-12 col-sm-6 col-md-4 col-lg-3 footer-links">
				<h4>Destinasi Populer</h4>
				<ul>
					<li><a href="#">Yogyakarta</a></li>
					<li><a href="#">Bali</a></li>
					<li><a href="#">Bromo</a></li>
					<li><a href="#">Labuan Bajo</a></li>
					<li><a href="#">Raja Ampat</a></li>
				</ul>
			</div>

			<div class="col-12 col-sm-6 col-md-12 col-lg-3 footer-links">
				<h4>Hubungi Kami</h4>
				<ul>
					<li><i class="bi bi-geo-alt me-2"></i> Jl. Kaliurang Km 5, Yogyakarta</li>
					<li><i class="bi bi-telephone me-2"></i> +62 831-9751-1897</li>
					<li><i class="bi bi-envelope me-2"></i> info@waktrans.com</li>
					<li><i class="bi bi-clock me-2"></i> Senin-Sabtu: 08.00 - 17.00</li>
				</ul>
			</div> -->
        </div>
    </div>


    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Wak Trans Tour Travel</strong> <span>All Rights
                Reserved</span></p>
    </div>

</footer>