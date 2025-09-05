<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="<?= base_url('sb-admin/') ?>sweetalert2/sweetalert2.min.css">

<!-- Sign In Section -->
<?php if(!$this->session->userdata('logged_in')): ?>
<section id="sign-in" class="contact section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up" style="margin-top: 50px;">
        <h2>Sign in your account</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 g-lg-5">
            <div class="col-lg-5">
                <div class="contact-form" id="signin-form" data-aos="fade-up" data-aos-delay="300">
                    <h3>Sign In</h3>
                    <p>Login untuk masuk ke akun anda
                    </p>
                    <?php 
                        if($this->session->flashdata('message')) {
                            echo '<div class="alert alert-danger">' . $this->session->flashdata('message') . '</div>';
                        }

                        // if($this->session->flashdata('message')) {
                        //     echo '<div class="alert alert-warning">' . $this->session->flashdata('error') . '</div>';
                        // }
                    ?>
                    <form id="signin-form-ajax" method="post" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="Your Email"
                                    required="">
                            </div>

                            <div class="col-md-12 ">
                                <input type="password" class="form-control" name="password" placeholder="Your Password"
                                    required="">
                            </div>

                            <div class="col-12 text-center">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                                <!-- <label for="register"> Don't have an account ?</label><a href="#"
                                    id="show-register">Register here</a> -->
                            </div>

                        </div>
                    </form>

                </div>

                <div class="contact-form" id="register-form" data-aos="fade-up" data-aos-delay="300">
                    <h3>Register</h3>
                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum
                        primis.
                    </p>

                    <!-- Alert untuk menampilkan pesan -->
                    <div id="register-alert" class="alert" style="display: none;"></div>

                    <form id="register-form-ajax" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="Your Email"
                                    required="">
                            </div>

                            <div class="col-md-12 ">
                                <input type="password" class="form-control" name="password" placeholder="Your Password"
                                    required="">
                            </div>

                            <div class="col-12 text-center">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Register</button><br><br>
                                </div>
                                <label for="register"> Have an account ?</label><a href="#" id="show-signin">SignIn
                                    here</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="col-lg-7">
                <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                    <h3>Contact Info</h3>
                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum
                        primis.
                    </p>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="content">
                            <h4>Our Location</h4>
                            <p>A108 Adam Street</p>
                            <p>New York, NY 535022</p>
                        </div>
                    </div>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="content">
                            <h4>Phone Number</h4>
                            <p>+1 5589 55488 55</p>
                            <p>+1 6678 254445 41</p>
                        </div>
                    </div>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="content">
                            <h4>Email Address</h4>
                            <p>info@example.com</p>
                            <p>contact@example.com</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

    </div>
</section>
<?php endif; ?>
<!-- End Sign In Section -->


<!-- SweetAlert2 JS -->
<script src="<?= base_url('sb-admin/') ?>sweetalert2/sweetalert2.min.js"></script>

<!-- SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hide register form initially
    const registerForm = document.getElementById('register-form');
    const signinForm = document.getElementById('signin-form');
    // const containerSignIn = document.getElementById('sign-in');

    if (registerForm) {
        registerForm.style.display = 'none';
    }

    // if (containerSignIn) {
    //     containerSignIn.style.display = 'none';
    // }

    // const navigateToSignin = document.getElementById('navigate-to-signin');
    // if (navigateToSignin) {
    //     navigateToSignin.addEventListener('click', function(e) {
    //         e.preventDefault();
    //         if (containerSignIn) {
    //             // containerSignIn.style.display = 'block';
    //             // Ubah URL tanpa reload halaman
    //             window.history.pushState(null, null, '#sign-in');
    //             // Smooth scroll to sign-in section
    //             containerSignIn.scrollIntoView({
    //                 behavior: 'smooth'
    //             });
    //         }
    //     });
    // }

    // Show register form when "Register here" is clicked
    const showRegisterLink = document.getElementById('show-register');
    if (showRegisterLink) {
        showRegisterLink.addEventListener('click', function(e) {
            e.preventDefault();
            signinForm.style.display = 'none';
            registerForm.style.display = 'block';
        });
    }

    // Show signin form when "SignIn here" is clicked
    const showSigninLink = document.getElementById('show-signin');
    if (showSigninLink) {
        showSigninLink.addEventListener('click', function(e) {
            e.preventDefault();
            registerForm.style.display = 'none';
            signinForm.style.display = 'block';
        });
    }

    // Handle register form submission with AJAX
    const registerFormAjax = document.getElementById('register-form-ajax');
    const registerAlert = document.getElementById('register-alert');

    if (registerFormAjax) {
        registerFormAjax.addEventListener('submit', function(e) {
            e.preventDefault();

            // Show loading state
            const submitBtn = registerFormAjax.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Loading...';
            submitBtn.disabled = true;

            // Get form data
            const formData = new FormData(registerFormAjax);

            // Send AJAX request
            fetch('<?= base_url("auth/register_ajax") ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Close loading SweetAlert
                    Swal.close();

                    if (data.status === 'success') {
                        // Show success SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#0D83FD'
                        }).then((result) => {
                            // Clear form on success
                            registerFormAjax.reset();

                            // Clear all input fields manually to ensure they are empty
                            const inputs = registerFormAjax.querySelectorAll('input');
                            inputs.forEach(input => {
                                input.value = '';
                            });

                            // Switch to signin form after successful registration
                            registerForm.style.display = 'none';
                            signinForm.style.display = 'block';
                        });
                    } else {
                        // Show error SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: data.message,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#0D83FD'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Close loading SweetAlert
                    Swal.close();

                    // Show error SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        text: 'Terjadi kesalahan. Silakan coba lagi.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#0D83FD'
                    });
                })
                .finally(() => {
                    // Reset button state
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                });
        });
    }

    // Handle sign-in form submission with AJAX
    const signinFormAjax = document.getElementById('signin-form-ajax');
    if (signinFormAjax) {
        signinFormAjax.addEventListener('submit', function(e) {
            e.preventDefault();

            // Show loading state
            const submitBtn = signinFormAjax.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Loading...';
            submitBtn.disabled = true;

            // Get form data
            const formData = new FormData(signinFormAjax);

            // Send AJAX request
            fetch('<?= base_url("auth/login_ajax") ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    Swal.close();
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#0D83FD'
                        }).then(() => {
                            // Redirect to dashboard
                            window.location.href = data.redirect;
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: data.message,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#0D83FD'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.close();
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
