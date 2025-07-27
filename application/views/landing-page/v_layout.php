<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page</title>

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('landing-page/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('landing-page/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('landing-page/') ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('landing-page/') ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('landing-page/') ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- FontAwesome CDN (v6.4.0 for fa-solid fa-arrow-right-from-bracket) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main CSS File -->
    <link href="<?= base_url('landing-page/') ?>assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <?php $this->load->view('landing-page/v_navbar'); ?>

    <main class="main">
        <?php
        // Konten dinamis akan ditampilkan di sini
        if (isset($content)) {
            $this->load->view($content);
        }
        ?>
    </main>

    <?php $this->load->view('landing-page/v_footer'); ?>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('landing-page/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('landing-page/') ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url('landing-page/') ?>assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url('landing-page/') ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('landing-page/') ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('landing-page/') ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="<?= base_url('landing-page/') ?>assets/js/main.js"></script>
</body>

</html>