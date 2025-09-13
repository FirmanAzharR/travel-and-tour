<header id="header" class="header d-flex align-items-center fixed-top">
    <div
        class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="/#travel-wisata-jogja" class="logo d-flex align-items-center me-auto me-xl-0">
            <img id="site-logo" src="<?= base_url('landing-page/') ?>assets/img/base/logo.jpg" alt="Customer 5">
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown"><a href="#"><span>Booking</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#travel-wisata-jogja" class="booking-menu">Travel Wisata Jogja</a></li>
                        <li><a href="#travel-bandara" class="booking-menu">Travel Bandara</a></li>
                        <li><a href="#rental-mobil" class="booking-menu active">Rental Mobil</a></li>
                        <li><a href="#carter-bus" class="booking-menu">Carter Haice/Mini Bus</a></li>
                    </ul>
                <li><a href="#about">About</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <?php $user = $this->session->userdata('user_data'); ?>
                <?php if(isset($user['role']) && $user['role'] === 'CUSTOMER'): ?>
                <li><a href="#booking-history">Booking History</a></li>
                <?php endif; ?>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <?php if(!$this->session->userdata('logged_in')): ?>
        <a class="btn-getstarted" href="#sign-in" id="navigate-to-signin">Sign In</a>
        <?php else: ?>
        <?php $user = $this->session->userdata('user_data'); ?>
        <?php if(isset($user['role']) && $user['role'] === 'ADMIN'): ?>
        <a class="btn-getstarted" href="<?= base_url('dashboard') ?>">Logged In as
            <?= htmlspecialchars($user['email'] ?? '-') ?></a>
        <?php else: ?>
        <div class="d-flex align-items-center gap-2">
            <a class="btn-getstarted" href="#">Logged In as <?= htmlspecialchars($user['email'] ?? '-') ?></a>
            <a href="<?= base_url('auth/logout') ?>" title="Logout"
                style="font-size:1.3em;vertical-align:middle;display:inline-block;background:none;border:none;padding:0;">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</header>
<script>
// Load active logo via AJAX; fall back to default image if none
(function() {
    var logoEl = document.getElementById('site-logo');
    if (!logoEl) return;

    // Prepare token (CSRF) if available from CodeIgniter
    var tokenName = '<?= isset($this->security) ? $this->security->get_csrf_token_name() : '' ?>';
    var tokenHash = '<?= isset($this->security) ? $this->security->get_csrf_hash() : '' ?>';

    var data = {};
    if (tokenName && tokenHash) data[tokenName] = tokenHash;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?= base_url('Content_Management/get_active_logo') ?>', true);
    xhr.setRequestHeader('Accept', 'application/json');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function() {
        if (xhr.readyState !== 4) return;
        if (xhr.status === 200) {
            try {
                var res = JSON.parse(xhr.responseText);
                if (res && res.status === 'success' && res.image_url) {
                    logoEl.src = res.image_url;
                    return;
                }
            } catch (e) {
                // ignore parse errors
            }
        }
        // fallback: keep existing src (default image) or set explicit default
        logoEl.src = '<?= base_url('landing-page/') ?>assets/img/base/logo.jpg';
    };

    // send form-encoded body if token exists otherwise send empty body
    if (Object.keys(data).length) {
        var form = [];
        for (var k in data) {
            form.push(encodeURIComponent(k) + '=' + encodeURIComponent(data[k]));
        }
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(form.join('&'));
    } else {
        xhr.send();
    }
})();
</script>