<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">
    <style>
        <?php include "style.css" ?>
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <!--Navbar-->
    <div class="navatas">
        <nav class="navbar navbar-expand-md fixed-top shadow text-light" style="background-color: #9b0060;">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="gambar/logo2.png" alt="" style="filter: brightness(0) invert(1); width: 80px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav text-light navhead">
                        <li class="nav-item">
                            <a class="nav-link" href=<?= base_url('home') ?>>Home</a>
                        </li>

                        <?php if ($this->session->userdata('login')) : ?>
                            <li class="nav-item dropdown" data-bs-theme="dark">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $this->session->login['nama'] ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="color: black;">
                                    <a class="dropdown-item" href="<?= base_url('cart/show_cart') ?>">Cart</a>
                                    <a class="dropdown-item" href="<?= base_url('landingpage/order_detail') ?>">Detail order</a>
                                    <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('login_customer') ?>">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <!--Navbar   -->

    <!-- Banner -->

    <!-- Akhir Banner -->



    <!-- Services -->


    <!-- Foto Galery -->
    <div class="container my-5">
        <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
            </svg>
            <h1 class="text-body-emphasis">Transaksi Berhasil</h1>
            <p class="col-lg-6 mx-auto mb-4">
                Tunggu pesanan anda di proses oleh admin
            </p>
            <button class="btn btn-success px-5 mb-5" type="button">
                <a href="<?= base_url('landingpage/order_detail') ?>" style="text-decoration: none; color:white"> Lihat Pesanan anda</a>
            </button>
        </div>
    </div>


    <section>
        <footer class="text-dark" style="padding-top: 40px;">
            <div class="footer-top">
                <div class="container">
                    <div class="row gy-5">
                        <div class="col-md-4">
                            <h4 class="logo-text">Popo - Lulu Studio</h4>
                            <p>Abadikan moment mu dan percantik bisnismu dengan kami</p>

                        </div>
                        <div class="col-md-4">
                            <h4 class="logo-text">Contact</h4>
                            <div class="footer-links">
                                <p class="mb">Jl. Pasuruhan Lor, Pasuruhan Lor, Kec. Jati, Kabupaten Kudus, Jawa Tengah 59349</p>
                                <p class="mb">‪0811‑2609‑923‬ (Admin Popolulu Studio)</p>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="map-responsive">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15846.44086055306!2d110.8211832!3d-6.8171717!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c5afbf8b7d15%3A0x3164537f6a686a52!2sPopolulu%20studio!5e0!3m2!1sid!2sid!4v1703350937956!5m2!1sid!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row justify-content-between gy-3">
                        <div class="col" style="padding: 20px;">
                            <center>
                                <p class="mb-0">Copyright © 2023 PT.Mercor Indonesia | All Rights Reserved.</p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </section>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?= base_url('sb-admin') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('sb-admin') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('sb-admin') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('sb-admin') ?>/js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>