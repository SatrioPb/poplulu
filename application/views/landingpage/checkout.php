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

                        </li>
                        <?php if ($this->session->userdata('login')) : ?>
                            <li class="nav-item dropdown" data-bs-theme="dark">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $this->session->login['nama'] ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="color: black;">
                                    <a class="dropdown-item" href="<?= base_url('cart/show_cart') ?>">Cart</a>
                                    <a class="dropdown-item" href="#">Profile</a>
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
    <!-- Your existing HTML code for header, navigation, etc. -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Checkout</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($cart_items)) : ?>
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th>Nama paket</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Harga</th>
                                        <!-- <th>price total</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart_items as $item) : ?>
                                        <tr>

                                            <td><?= $item->nama_barang ?></td>
                                            <td><?= $item->selected_date ?></td>
                                            <td><?= $item->selected_time ?></td>
                                            <td>Rp <?= $item->price ?></td>
                                            <!-- <td>Rp <?= $item->price * $item->quantity ?></td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <div class="mt-3 text-end">
                                <h5>Total Harga: Rp <?= number_format(calculate_total_price((array) $cart_items), 0, ',', '.') ?></h5>
                            </div>
                        <?php else : ?>
                            <p class="text-center">Keranjang belanja kosong.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Data Pembeli</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('checkout/process_checkout') ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_pembeli" class="form-label">Nama Pembeli:</label>
                                <input type="text" name="nama_pembeli" class="form-control" required value="<?= $this->session->login['nama'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Hp:</label>
                                <input type="text" name="no_hp" class="form-control" required value="<?= $this->session->login['telepon'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label>
                                <select name="metode_pembayaran" id="metodePembayaran" class="form-control" required>
                                    <option value="dana">----PILIH PEMBAYARAN-----</option>
                                    <option value="dana">DANA</option>
                                    <option value="bca">BCA</option>
                                    <option value="ovo">OVO</option>
                                    <!-- Add more payment options as needed -->
                                </select>
                            </div>

                            <!-- Add an empty img tag for the QR code -->
                            <div id="qrCodeContainer" class="mb-3">
                                <img id="qrCodeImage" src="" style="max-width: 100%;">
                            </div>


                            <div class="mb-3">
                                <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran:</label>
                                <input type="file" name="bukti_pembayaran" class="form-control" accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Proses Checkout</button>
                        </form>
                    </div>
                </div>
            </div>

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


    <!-- Your existing HTML code for footer, scripts, etc. -->



    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add this after including jQuery -->
    <script>
        $(document).ready(function() {
            // Add an event listener to the payment method select
            $('#metodePembayaran').change(function() {
                // Get the selected value
                var selectedValue = $(this).val();

                // Get the corresponding QR code image path based on the selected value
                var qrCodeImagePath = getQrCodeImagePath(selectedValue);

                // Update the src attribute of the QR code image
                $('#qrCodeImage').attr('src', qrCodeImagePath);
            });

            // Function to get the QR code image path based on the selected payment method
            function getQrCodeImagePath(paymentMethod) {
                // Define the mapping of payment methods to QR code image paths
                var qrCodePaths = {
                    'dana': 'gambar/person.png',
                    'bca': 'gambar/grup.png',
                    'ovo': 'gambar/wisuda.png',
                    // Add more mappings as needed
                };

                // Return the QR code image path for the selected payment method
                return qrCodePaths[paymentMethod] || '';
            }
        });
    </script>

</body>

</html>