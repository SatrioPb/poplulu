<!DOCTYPE html>
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
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Login
                                    </button>
                                    <ul class="dropdown-menu " data-bs-theme="dark">
                                        <li><a class="dropdown-item" href="<?= base_url('login_customer') ?>">Customer</a></li>
                                        <li><a class="dropdown-item" href="<?= base_url('login') ?>">Admin</a></li>
                                    </ul>
                                </div>

                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <h2 class="mb-4">Your Shopping Cart</h2>

        <!-- Cart Items -->
        <?php if (!empty($cart_items)) : ?>
            <?php foreach ($cart_items as $item) : ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <!-- Update the image source with the correct path -->
                                <img src="<?= base_url('./assets/' . $item->gambar) ?>" alt="Product Image" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h2 class="card-title"><?= $item->nama_barang ?></h2>
                                <p class="card-text">Date: <?= $item->selected_date ?></p>
                                <p class="card-text">Time: <?= $item->selected_time ?></p>
                                <h4 class="card-text">Price: Rp <?= $item->price ?></h4>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('cart/remove_item/' . $item->id) ?>" class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>

        <!-- Total Price -->
        <div class="mt-3 text-end">
            <h5>Total: Rp <?= number_format(calculate_total_price($cart_items), 0, ',', '.') ?></h5>
        </div>


        <!-- Checkout Button -->
        <div class="mt-3 text-end">
            <a href="<?= base_url('checkout') ?>" class="btn btn-primary">Proceed to Checkout</a>
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
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>


</html>