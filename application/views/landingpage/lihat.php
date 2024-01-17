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
                                    <a class="dropdown-item" href="<?= base_url('cart/show_cart') ?>">Keranjang</a>
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


    <!--Navbar   -->

    <!-- Banner -->

    <!-- Akhir Banner -->



    <!-- Services -->


    <!-- Foto Galery -->
    <section class="py-5">
        <div class="container">
            <!-- Product Detail Content -->
            <?php if (!empty($product)) : ?>
                <div class="row border-bottom pb-3 mb-3">
                    <!-- Product Image -->
                    <div class="col-md-3">
                        <img src="<?= base_url('./assets/' . $product->gambar) ?>" class="img-fluid rounded" alt="<?= $product->nama_barang ?>" style="height: 450px;">
                    </div>

                    <!-- Product Details -->
                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="mb-3"><?= $product->nama_barang ?></h1>
                            <p class="text-muted">- <?= $product->deskripsi ?></p>
                            <p class="text-muted">- <?= $product->deskripsi2 ?></p>
                            <p class="text-muted">- <?= $product->deskripsi3 ?></p>
                            <p class="text-muted">- <?= $product->deskripsi4 ?></p>
                            <p class="text-muted">- <?= $product->deskripsi5 ?></p>
                            <p class="text-muted">- <?= $product->deskripsi6 ?></p>
                            <h4 class="fw-bold">Harga: Rp.<?= $product->harga ?></h4>
                        </div>
                    </div>
                </div>

                <!-- Date and Time Selection -->
                <div class="row border-bottom pb-3 mb-3">
                    <div class="col-md-6">
                        <!-- Date Selection -->
                        <div class="form-group">
                            <label for="datepicker">
                                <h3>Tanggal :</h3>
                            </label>
                            <input type="date" class="form-control" id="datepicker" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Time Selection -->
                        <div class="form-group">
                            <label for="timepicker">
                                <h3>Jam :</h3>
                            </label>
                            <div class="btn-group" role="group" aria-label="Time selection">
                                <div class="row g-2">
                                    <div class="col-2">
                                        <div class="p-3">
                                            <button type="button" class="btn text-light" onclick="selectTime('09:00')" style="background-color: #9b0060;">09:00</button>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="p-3">
                                            <button type="button" class="btn text-light" onclick="selectTime('12:00')" style="background-color: #9b0060;">12:00</button>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="p-3">
                                            <button type="button" class="btn text-light " onclick="selectTime('15:00')" style="background-color: #9b0060;">15:00</button>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="p-3">
                                            <button type="button" class="btn text-light" onclick="selectTime('18:00')" style="background-color: #9b0060;">18:00</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="selectedTime" name="selectedTime" required>
                        </div>
                    </div>
                </div>

                <!-- Purchase button -->
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" id="addToCartButton" class="btn  btn-lg text-light" onclick="addToCart()" style="background-color: #9b0060;">Keranjang</a>
                    </div>
                </div>
            <?php else : ?>
                <div class="text-center">
                    <p class="lead">Produk tidak ditemukan.</p>
                </div>
            <?php endif; ?>
        </div>


    </section>

    <section style="background-color: #F5E5EF; padding:30px;">
        <div class="container">
            <h2 class="text mb-4" style="color: #9b0060; font-family: lateef; padding: 40px;">Paket Lainnya</h2>
            <div class="row">
                <?php foreach ($all_barang as $barang) : ?>
                    <div class="col-md-3" style="padding-top: 20px;">
                        <div class="card mb-4" style="height: 100%;">
                            <a href="<?= base_url('lihat/' . $barang->kode_barang) ?>" style="text-decoration: none; color: black;">
                                <img src="<?= base_url('./assets/' . $barang->gambar) ?>" alt="<?= $barang->nama_barang ?>" class="card-img-top" style="object-fit: cover; height: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $barang->nama_barang ?></h5>
                                    <p class="card-text">Rp.<?= $barang->harga ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

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
    <script>
        function selectTime(time) {
            // Set the selected time to the hidden input
            document.getElementById('selectedTime').value = time;

            // Remove the 'active' class from all buttons
            var buttons = document.querySelectorAll('.btn-group button');
            buttons.forEach(function(button) {
                button.classList.remove('active');
            });

            // Add the 'active' class to the clicked button
            var selectedButton = document.querySelector('.btn-group button[onclick*="' + time + '"]');
            if (selectedButton) {
                selectedButton.classList.add('active');
            }
        }

        function addToCart() {
            console.log("Button Clicked");

            // Get the manually input date and time
            var selectedDate = document.getElementById("datepicker").value;
            var selectedTime = document.getElementById("selectedTime").value;

            console.log("Selected Date: " + selectedDate);
            console.log("Selected Time: " + selectedTime);

            // Validate date and time
            if (!selectedDate || !selectedTime) {
                alert("Please select both date and time before adding to the cart.");
                return; // Exit the function if date or time is not selected
            }

            // Generate the URL with date and time as parameters
            var cartUrl = "<?= base_url('cart/add_to_cart/' . $product->kode_barang) ?>";
            cartUrl += "?date=" + selectedDate + "&time=" + selectedTime;

            // Redirect to the dynamically generated URL
            window.location.href = cartUrl;
        }
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="<?= base_url('sb-admin') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('sb-admin') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('sb-admin') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('sb-admin') ?>/js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>