<?php include 'admin/config.php'; ?>

<html>
<head>
<title>SMA 11 Bekasi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<link rel="stylesheet" href="css\main.css">
<link rel="stylesheet" href="css\2.css">
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
 <div class="topbar" id="topbar" aria-label="Site header">
    <div class="brand" aria-label="School brand">
      <img class="logo" src="assets\logosebelas.png" alt="School Logo">
      <a href="index.php" class="brand-name">SMAN 11 Bekasi</a>
    </div>

    <nav class="nav-links" aria-label="Main navigation">
      <div id="collapsing">
        <a href="#fasilitas">Fasilitas</a>
        <a href="#prestasi">Prestasi</a>
        <a href="#berita">Berita</a>
        <a href="#agenda">Agenda</a>
      </div>
        <a class="openbtn" onclick="openNav()"><i class="fi fi-rs-burger-menu"></i></a>
    </nav>
</div>

  <section class="hero" aria-label="Hero section gradient">
    <div class="hero-content">
      <h2>Step Into a Brighter Future with Us</h2>
      <p>Become a part of our school!</p>
      <div class="cta">
        <a href="https://www.instagram.com/sman11bekasi?igsh=MWpwMnhtZ29vaGo4Mw==" class="btn primary" href="#apply">Visit Us</a>
      </div>
    </div>
  </section>



<div class="welcome" data-aos="fade-up">
  <div class="sambutan">
    <div class="section">
      <h1><span class="blue">Welcome to</span> SMAN 11 Bekasi</h1>
      </div>
      <p>Temukan berbagai informasi terkini seputar kegiatan, prestasi, 
        dan program unggulan sekolah yang dirancang untuk mendukung perkembangan siswa secara menyeluruh.
        Jelajahi menu informasi, ikuti berita terbaru, dan jadilah bagian dari komunitas pendidikan yang inspiratif bersama kami.
        Klik dan mulai eksplorasi sekarang untuk mengenal lebih dekat sekolah kami!</p>
    </div>

  <div class="aplikasi">
    <div class="fa fa-book" aria-hidden="true"></div>
    <a href="https://sebelas.my.id/"><b>Perpustakaan Digital</b></a>
  </div>
</div>


<div class="profil" id="profil" data-aos="fade-up">  
  <div class="image-container">
    <iframe src="https://www.youtube.com/embed/DQI-uMOmkVo?si=hnW-MXHU5IJSnrIV" 
    title="YouTube video player" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>

  <div class="parProfil">
    <div class="katProfil">
      <div class="section">
      <h1><span class="orange">Profil</span> Sekolah </h1>
      </div>
    </div>
      <p>SMAN 11 Kota Bekasi merupakan salah satu sekolah unggulan yang berkomitmen melahirkan generasi berprestasi, berkarakter, 
        dan siap bersaing di masa depan. Didukung dengan fasilitas modern, tenaga pendidik profesional, serta lingkungan belajar 
        yang nyaman dan inspiratif, SMAN 11 terus mencetak siswa-siswi yang kreatif, inovatif, dan berintegritas tinggi.
        Kami percaya bahwa pendidikan bukan hanya tentang pengetahuan, tetapi juga pembentukan karakter yang berakhlak mulia.
      </p>
      
    </div>
</div>

<div class="fasilitas" id="fasilitas" data-aos="fade-up">
  <div class="section">
   <h1 class="orange">Fasilitas Sekolah</h1>
  </div>
  <section class="gallery-container">
  <?php
$fasilitas = mysqli_query($conn, "SELECT * FROM fasilitas");
?>

<style>
.fasilitas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
    gap: 20px;
    margin-top: 20px;
}

.fasilitas-item {
    background-color: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.fasilitas-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.fasilitas-item img {
    width: 100%;
    height: 180px; 
    object-fit: cover;
    display: block;
}

.fasilitas-item p {
    margin: 10px 0;
    font-weight: bold;
    color: #333;
    font-size: 14px;
}

@media (max-width: 768px) {
    .fasilitas-item img {
        height: 150px;
    }
}
</style>

<div class="fasilitas-grid">
<?php
while($f = mysqli_fetch_assoc($fasilitas)) {
    echo '<div class="fasilitas-item">';
    echo '<img src="admin/upload/'.htmlspecialchars($f['gambar']).'" alt="'.htmlspecialchars($f['nama']).'">';
    echo '<p>'.htmlspecialchars($f['nama']).'</p>';
    echo '</div>';
}
?>
</div>

</section>
</div>
  

<div class="prestasi" id="prestasi" data-aos="fade-up">
  <div class="section">
    <h1 class="orange">Prestasi Sekolah</h1>
  </div>
  <p class="blue-par">Setiap tahunnya, siswa/siswi kami selalu menorehkan bermacam prestasi yang prestisius, diantaranya:</p>

  <div class="prestasi-container">
    <?php
    include 'admin/config.php';
    $prestasi = mysqli_query($conn, "SELECT * FROM prestasi");
    while ($p = mysqli_fetch_assoc($prestasi)) {
    ?>
      <div class="listPrestasi">
        <div class="jenisPrestasi">
          <h2><?= htmlspecialchars($p['jumlah']); ?></h2>
        </div>
        <p><?= htmlspecialchars($p['kategori']); ?></p>
      </div>
    <?php } ?>
  </div>
</div>



<div class="berita" id="berita" data-aos="fade-up">
  <div class="section">
    <h1 class="orange section">Berita Terbaru</h1>
  </div>

  <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 25px; margin-top: 20px;">
    <?php
    $query = mysqli_query($conn, "SELECT id, judul, isi, tanggal, gambar, kategori FROM berita ORDER BY tanggal DESC LIMIT 4");
    if ($query && mysqli_num_rows($query) > 0) {
      while ($b = mysqli_fetch_assoc($query)) {
        $gambar_path = !empty($b['gambar']) ? "admin/upload/".htmlspecialchars($b['gambar']) : "assets/sma11home.png";
    ?>
        <div style="
          width: calc(50% - 20px);
          background: #fff;
          border-radius: 10px;
          overflow: hidden;
          box-shadow: 0 3px 15px rgba(0,0,0,0.1);
          display: flex;
          flex-direction: column;
          transition: all 0.3s ease;
        " 
        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 20px rgba(0,0,0,0.15)';"
        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 15px rgba(0,0,0,0.1)';"
        >
          <img src="<?= $gambar_path ?>" alt="<?= htmlspecialchars($b['judul']) ?>" style="
            width: 100%;
            height: 220px;
            object-fit: cover;
          ">
          <div style="padding: 18px;">
            <?php if (!empty($b['kategori'])): ?>
              <div style="display:inline-block; background:#007bff; color:#fff; font-size:12px; padding:4px 10px; border-radius:6px; margin-bottom:8px;">
                <?= htmlspecialchars($b['kategori']) ?>
              </div>
            <?php endif; ?>

            <h3 style="font-size: 18px; color: #222; margin: 6px 0 8px;">
              <a href="news_detail.php?id=<?= (int)$b['id'] ?>" style="text-decoration:none; color:#222;">
                <?= htmlspecialchars($b['judul']) ?>
              </a>
            </h3>

            <p style="font-size: 14px; color:#555; line-height:1.6; margin-bottom:10px;">
              <?= substr(strip_tags($b['isi']), 0, 120) ?>...
            </p>

            <small style="color:#777; font-size:13px;">
              <i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($b['tanggal'])) ?>
            </small>
          </div>
        </div>
    <?php
      }
    } else {
      echo "<p style='text-align:center; color:#555;'>Belum ada berita terbaru.</p>";
    }
    ?>
  </div>

  <div style="text-align: right; margin-top: 25px;">
    <a href="beritautama.php" style="
      display: inline-block;
      background-color: var(--second-color);
      color: #fff;
      padding: 10px 18px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s;
    "
    onmouseover="this.style.backgroundColor='var(--second-color';"
    onmouseout="this.style.backgroundColor='var(--second-color';">
      Lihat Semua Berita
    </a>
  </div>

  <style>
    @media (max-width: 768px) {
      .berita > div[style*="flex-wrap"] > div {
        width: 100% !important;
      }
    }
  </style>
</div>

<div class="agenda" id="agenda" data-aos="fade-up">
  <div class="section">
    <h1 class="orange">Agenda Sekolah</h1>
  </div>
  <?php
include 'admin/config.php';
$tanggal_hari_ini = date('Y-m-d');
$q = mysqli_query($conn, "SELECT * FROM agenda WHERE tanggal = '$tanggal_hari_ini'");
if(mysqli_num_rows($q) > 0):
?>
<div style="background-color:#fff8e1; color:#333; padding:12px; text-align:center; font-weight:bold; border-bottom:1px solid #ffd54f;">
  🔔 Hari ini ada agenda:
  <?php
  $first = true;
  while($a = mysqli_fetch_assoc($q)){
    if(!$first) echo " &middot; ";
    echo "<span style='color:#e65100;'>{$a['judul']}</span>";
    $first = false;
  }
  ?>
</div>
<?php endif; ?>
  <div class="list-agenda">

    <?php
      include 'admin/config.php';
      date_default_timezone_set('Asia/Jakarta');
      $today = date('Y-m-d');
      $agenda = mysqli_query($conn, "SELECT * FROM agenda WHERE tanggal >= '$today' ORDER BY tanggal ASC LIMIT 5");

      if (mysqli_num_rows($agenda) > 0):
        while ($a = mysqli_fetch_assoc($agenda)):
    ?>
        <div class="kartuAgenda">
          <div class="fotoAgenda">
            <i class="fi fi-rr-calendar"></i>
          </div>
          <div class="judulAgenda">
            <p><strong><?= htmlspecialchars($a['judul']) ?></strong></p>
            <span>
              <?= date('d M Y', strtotime($a['tanggal'])) ?>
            </span>
          </div>
        </div>
    <?php
        endwhile;
      else:
        echo "<p style='text-align:center; color:#666;'>Tidak ada agenda mendatang.</p>";
      endif;
    ?>
  </div>
</div>


<div class="logoPanit">
  <img class="fotoPanit" src="assets\LOGOPANIT.png">
</div>


<?php require 'template/footer.php'; ?>

</body>
<script src="js\main.js"></script>
</html>