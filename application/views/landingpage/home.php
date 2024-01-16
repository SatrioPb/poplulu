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
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
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
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <section style="height: 80vh;">
      <div class="container col-xxl-11 px-4 py-4 pb-1" style="margin-top: 70px;" data-aos="zoom-in">
        <div class="row flex-lg-row-reverse align-items-center py-5 justify-content-between">
          <div class=" col-lg-5">
            <img src="assets/kursi.png" class="d-block mx-lg img-fluid" style="border-radius: 10px; width:60%">
          </div>
          <div class="col-lg-6" id="popo">
            <h2 class="display-6 fw-bold" style="font-family: lateef;">POPO - LULU STUDIO</h2>
            <h1 class="display-1">COME AND FEEL</h1>
            <h1 class="display-1">THE DIFFERENCE</h1>
            <p class="lead text-justify text-secondary">Popolulu Studio adalah usaha yang bergerak dibidang media/studio foto yang menyajikan berbagai kebutuhan untuk mengabadikan momen bersama keluarga, teman, dalam acara penting, atau kebutuhan konsumen. </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Banner -->



    <!-- Services -->
    <section style="background-color : #F5E5EF; height:70vh;" class="services">
      <center>
        <h1 style="	color: #9b0060;font-family: lateef;padding:40px;">LAYANAN</h1>
      </center>
      <div class="container py-4">
        <div class="row align-items-md-stretch">
          <div class="col-md-6" data-aos="fade-right">
            <div class="h-100 p-5 text-light rounded-3" style="background-color: #9b0060; position: relative;">
              <div>
                <h2>Photo Studio</h2>
                <p>Di dalam studio foto, berbagai jenis peralatan fotografi ditemukan, termasuk kamera profesional, lensa dengan panjang fokus yang berbeda, tripod, dan peralatan pencahayaan.</p>
              </div>
              <button class="btn btn-outline-light position-absolute bottom-0 start-4 mb-3" type="button">View</button>
            </div>
          </div>
          <div class="col-md-6" data-aos="fade-left">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3" style="position: relative;">
              <div>
                <h2>Rent Equipment</h2>
                <p>Menyewa peralatan adalah solusi yang nyaman dan hemat biaya untuk individu dan bisnis yang membutuhkan alat, mesin, atau teknologi khusus untuk jangka waktu sementara. Baik itu untuk proyek khusus, acara, atau untuk memenuhi kebutuhan jangka pendek, layanan penyewaan peralatan memberikan alternatif yang fleksibel untuk pembelian. </p>
              </div>
              <button class="btn btn-outline-secondary position-absolute bottom-0 start-4 mb-3" type="button">View</button>
            </div>
          </div>
        </div>
      </div>


    </section>
    <!-- Services -->

    <!-- Foto Galery -->
    <section class="py-5">
      <div class="container">
        <h2 class="text mb-4" style="	color: #9b0060;font-family: lateef;padding:40px;">Photo Gallery</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
          <!-- Photo 1 -->
          <div class="col" data-aos="fade-right">
            <div class="card">
              <img src="assets/asset3.png" class="card-img-top" alt="Photo 1" width="100px" height="400px">
              <div class="card-body">
                <p class="card-text">Create your memories.</p>
              </div>
            </div>
          </div>

          <!-- Photo 2 -->
          <div class="col">
            <div class="card" data-aos="fade-up">
              <img src="assets/lemari.png" class="card-img-top" alt="Photo 2" width="100px" height="400px">
              <div class="card-body">
                <p class="card-text">Inspiring Studio Vibes.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" data-aos="fade-left">
              <img src="assets/asset4.png" class="card-img-top" alt="Photo 2" width="100px" height="400px">
              <div class="card-body">
                <p class="card-text">Collect moments, not things.</p>
              </div>
            </div>
          </div>

          <!-- Add more photo cards as needed -->

        </div>
      </div>
    </section>

    <!-- Foto Galery -->

    <div class="container my-5">
      <div class="p-5 text-center bg-body-tertiary rounded-3">
        <h1 style="	color: #9b0060;font-family: lateef;">Apa Yang Kami Lakukan?</h1>
        <p class="lead">
          Setiap saat memiliki nilai yang berharga, dan kami akan mendukung Anda dalam menangkap momen-momen tersebut dengan cara yang akan Anda hargai dalam waktu yang akan datang.
        </p>
      </div>
    </div>

    <section id="portfolio" class="row g-0 py-0">
      <div class="col-lg-4 col-sm-6">
        <a href="">
          <div class="portfolio-item">
            <img src="gambar/person.png" width="500" height="600" alt="Personal Photo">
            <div class="portfolio-overlay">
              <div class="center">
                <h1 class="text-light">Personal Photo</h1>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-sm-6">
        <a href="">
          <div class="portfolio-item">
            <img src="gambar/wisuda.png" width="500" height="600" alt="Graduation Photo">
            <div class="portfolio-overlay">
              <div>
                <h1 class="text-light">Graduation Photo</h1>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-sm-6">
        <a href="">
          <div class="portfolio-item">
            <img src="gambar/grup.png" width="500" height="600" alt="Prewedding Photo">
            <div class="portfolio-overlay">
              <div>
                <h1 class="text-light">Prewedding Photo</h1>
              </div>
            </div>
          </div>
        </a>
      </div>
    </section>



    <section style="background-color: #F5E5EF;">

      <div class="container">
        <h2 class="text mb-4" style="color: #9b0060; font-family: lateef; padding: 40px;">Daftar Paket</h2>
        <center>
          <div class="row" data-aos="zoom-in-down">
            <div class="row row-cols-1 row-cols-md-4 mb-3 text-center">
              <?php foreach (array_slice($all_barang, 0, 4) as $barang) : ?>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3 text-light " style="background-color: #9b0060;">
                      <h4 class="my-0 fw-normal"><?= $barang->nama_barang ?></h4>
                    </div>
                    <div class="card-body">
                      <h1 class="card-title pricing-card-title">Rp <?= $barang->harga ?></h1>
                      <ul class="list-unstyled mt-3 mb-4">
                        <li><?= $barang->deskripsi ?></li>
                        <li><?= $barang->deskripsi2 ?></li>
                        <li><?= $barang->deskripsi3 ?></li>
                        <li><?= $barang->deskripsi4 ?></li>
                        <li><?= $barang->deskripsi5 ?></li>
                        <li><?= $barang->deskripsi6 ?></li>
                      </ul>
                      <a href="<?= base_url('lihat/' . $barang->kode_barang) ?>"><button type="button" class="w-100 btn btn-lg text-light " style="background-color: #9b0060;">Book Now</button></a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </center>

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