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
        <h2 class="mb-4">Keranjang Anda</h2>

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
                                <p class="card-text">Tanggal: <?= $item->selected_date ?></p>
                                <p class="card-text">Jam: <?= $item->selected_time ?></p>
                                <h4 class="card-text">Harga: Rp <?= $item->price ?></h4>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('cart/remove_item/' . $item->id) ?>" class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>KEranjang Anda Kosong.</p>
        <?php endif; ?>

        <!-- Total Price -->
        <div class="mt-3 text-end">
            <h5>Total: Rp <?= number_format(calculate_total_price($cart_items), 0, ',', '.') ?></h5>
        </div>


        <!-- Checkout Button -->
        <div class="mt-3 text-end">
            <a href="<?= base_url('checkout') ?>" class="btn btn-primary" style="background-color: #9b0060;"> Checkout</a>
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
                                <div class="sosmed" style="display: flex;">
                                    <a href="#" class="socialContainer containerOne">
                                        <svg class="socialSvg instagramSvg" viewBox="0 0 16 16">
                                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                                        </svg>
                                    </a>

                                    <a href="#" class="socialContainer containerTwo">
                                        <svg class="socialSvg twitterSvg" viewBox="0 0 16 16">
                                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                                        </svg> </a>

                                    <a href="#" class="socialContainer containerThree">
                                        <svg class="socialSvg linkdinSvg" viewBox="0 0 448 512">
                                            <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
                                        </svg>
                                    </a>

                                    <a href="#" class="socialContainer containerFour">
                                        <svg class="socialSvg whatsappSvg" viewBox="0 0 16 16">
                                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                                        </svg>
                                    </a>
                                </div>


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
                                <p class="mb-0">Copyright © 2024 Popo-Lulu Studio | All Rights Reserved.</p>
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