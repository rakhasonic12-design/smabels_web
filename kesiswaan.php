<!DOCTYPE html>
<head>
<title>SMA 11 Bekasi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<link rel="stylesheet" href="css\2.css">
<link rel="stylesheet" href="css\kesiswaan.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-brands/css/uicons-brands.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<script src="js\main.js"></script>
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

</head>
<body>

<?php require 'template/sidenav.php'; ?>

  <div id="body">
  <?php require 'template/header.php'; ?>

<section class="hero-container">
  <div class="hero-content" data-aos="fade-right">
    <span class="hero-subtitle">Selamat Datang di Portal Kesiswaan</span>
    <h1 class="hero-title">Wujudkan Prestasi & Kreativitas di <span>SMA 11 Bekasi</span></h1>
    <p class="hero-description">
      Temukan berbagai kegiatan ekstrakurikuler, agenda sekolah, dan sumber belajar terbaik untuk mendukung perjalanan akademikmu.
    </p>
    <div class="hero-buttons">
      <a href="#ekskul-scroll-element" class="btn-hero-primary">Jelajahi Ekskul</a>
      <a href="#agenda-section" class="btn-hero-secondary">Lihat Agenda</a>
    </div>
  </div>
  <div class="hero-image" data-aos="zoom-in" data-aos-delay="200">
    <img src="assets/Masjid.JPG" alt="SMA 11 Bekasi Hero Image">
    <div class="hero-shape"></div>
  </div>
</section>

<section class="ekskul-section">
  <div class="section-header">
    <h1>Ekstrakurikuler</h1>
  </div>

  <div class="carousel-wrapper" style="position: relative;"> 
    <button class="nav-btn prev" onclick="scrollCarousel(-1)">&#10094;</button>
    <button class="nav-btn next" onclick="scrollCarousel(1)">&#10095;</button>

    <div class="ekskul-container" id="ekskul-scroll-element">
      <?php
      include 'config.php';
      $query = mysqli_query($conn, "SELECT * FROM ekskul ORDER BY id DESC");
      while ($data = mysqli_fetch_assoc($query)) :
      ?>
      <div class="ekskul-card" data-aos="fade-up">
        <div class="card-image-wrapper">
          <img src="admin/assets/<?= $data['foto']; ?>" alt="<?= $data['nama']; ?>">
          <?php if ($data['badge']): ?>
            <div class="card-badge"><?= $data['badge']; ?></div>
          <?php endif; ?>
        </div>
        <div class="card-body">
          <h3><?= $data['nama']; ?></h3>
          <p><?= $data['deskripsi']; ?></p>
          <div class="card-footer">
            <a href="<?= $data['link_gabung']; ?>" class="btn-primary" target="_blank">Gabung Sekarang</a>
            <span class="member-count"><?= $data['jumlah_anggota']; ?> Anggota</span>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>


<div class="list-agenda">

    <div class="kartuAgenda">
  <div class="agenda-side-indicator">
    <div class="icon-box">
      <img src="assets/Masjid.JPG" alt="Agenda Icon">
    </div>
  </div>

  <div class="agenda-content">
    <div class="agenda-body">
      <h3>Buku Wangsit UTBK-SNBT Soal Asli 2025</h3>
      <p class="author">Oleh: <span>Naya Hafizah</span></p>
    </div>
    <div class="agenda-footer">
      <a href="https://www.gramedia.com/products/buku-wangsit-utbk-snbt-soal-asli-2025" class="btn-beli" target="_blank">Beli Buku</a>
    </div>
  </div>
</div>

<div class="kartuAgenda">
  <div class="agenda-side-indicator">
    <div class="icon-box">
      <img src="assets/Masjid.JPG" alt="Agenda Icon">
    </div>
  </div>

  <div class="agenda-content">
    <div class="agenda-body">
      <h3>Buku Wangsit UTBK-SNBT Soal Asli 2025</h3>
      <p class="author">Oleh: <span>Naya Hafizah</span></p>
    </div>
    <div class="agenda-footer">
      <a href="https://www.gramedia.com/products/buku-wangsit-utbk-snbt-soal-asli-2025" class="btn-beli" target="_blank">Beli Buku</a>
    </div>
  </div>
</div>

<div class="kartuAgenda">
  <div class="agenda-side-indicator">
    <div class="icon-box">
      <img src="assets/Masjid.JPG" alt="Agenda Icon">
    </div>
  </div>

  <div class="agenda-content">
    <div class="agenda-body">
      <h3>Buku Wangsit UTBK-SNBT Soal Asli 2025</h3>
      <p class="author">Oleh: <span>Naya Hafizah</span></p>
    </div>
    <div class="agenda-footer">
      <a href="https://www.gramedia.com/products/buku-wangsit-utbk-snbt-soal-asli-2025" class="btn-beli" target="_blank">Beli Buku</a>
    </div>
  </div>
</div>

<div class="kartuAgenda">
  <div class="agenda-side-indicator">
    <div class="icon-box">
      <img src="assets/Masjid.JPG" alt="Agenda Icon">
    </div>
  </div>

  <div class="agenda-content">
    <div class="agenda-body">
      <h3>Buku Wangsit UTBK-SNBT Soal Asli 2025</h3>
      <p class="author">Oleh: <span>Naya Hafizah</span></p>
    </div>
    <div class="agenda-footer">
      <a href="https://www.gramedia.com/products/buku-wangsit-utbk-snbt-soal-asli-2025" class="btn-beli" target="_blank">Beli Buku</a>
    </div>
  </div>
</div>

  </div>
 

  

   

<?php require 'template/footer.php'; ?>


  <script src="js\profil.js"></script>
  <script>
  AOS.init({ duration: 1000, once: true });
  
</script>
</body>
</php>
