<?php include 'admin/config.php'; ?>

<html>
<head>
<title>SMA 11 Bekasi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<link rel="stylesheet" href="css/2.css">
<link rel="stylesheet" href="css/berita.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-brands/css/uicons-brands.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<script src="js/main.js"></script>
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
</head>

<body>

<?php require 'template/sidenav.php'; ?>

<div id="body">
  <?php require 'template/header.php'; ?>

  <section class="hero">
    <h1><b>Berita Terbaru SMAN 11 Bekasi</b></h1>
    <p>Ikuti kabar terkini dan kegiatan menarik di lingkungan sekolah kami</p>
  </section>

  <section class="news-section">
    
<div class="search-section" style="text-align:center; margin-bottom:20px;">
  <form method="get" action="">
    <input 
      type="text" 
      name="q" 
      placeholder="Cari berita..." 
      value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>" 
      style="padding:8px 12px; width:250px; border-radius:6px; border:1px solid #ccc;"
    >
     <button 
      type="submit" 
      style="padding:8px 15px; border:none; background:#0066cc; color:white; border-radius:6px; cursor:pointer;">
      Cari
    </button>
  </form>
</div>

    <div class="news-container">
      <?php
      $where = "";
      if (!empty($_GET['q'])) {
        $keyword = mysqli_real_escape_string($conn, $_GET['q']);
        $where = "WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'";
      }
      $query = mysqli_query($conn, "SELECT * FROM berita $where ORDER BY tanggal DESC");
      
      while ($b = mysqli_fetch_assoc($query)) :
      ?>
      <div class="news-card">
        <img src="admin/upload/<?= htmlspecialchars($b['gambar']) ?>" alt="<?= htmlspecialchars($b['judul']) ?>">
        <div class="news-content">
          <div class="kategori-label"><?= htmlspecialchars($b['kategori']) ?></div>
          <h3><?= htmlspecialchars($b['judul']) ?></h3>
          <p class="news-date"><?= date('d F Y', strtotime($b['tanggal'])) ?></p>
          <p class="news-text">
            <?= substr(strip_tags($b['isi']), 0, 120) ?>...
          </p>
          <a href="news_detail.php?id=<?= $b['id'] ?>">
            <button class="read-more">Baca Selengkapnya</button>
          </a>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  
  </section>

  <div class="logoPanit">
  <img class="fotoPanit" src="assets\LOGOPANIT.png">
</div>

 <?php require 'template/footer.php'; ?>
<script src="js/berita.js"></script>
</body>
</html>
