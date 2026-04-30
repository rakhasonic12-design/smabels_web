<?php include 'admin/config.php'; ?>

<html>
<head>
<title>SMA 11 Bekasi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="assets\logosebelas.png">
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
<style>
    .topbar {
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 1000;
        padding: 15px 0;
        /* Status Awal: Transparan */
        background-color: transparent; 
        transition: all 0.3s ease-in-out;
    }

    /* Class ini akan ditambahkan oleh JavaScript saat user scroll */
    .topbar.scrolled {
        background-color: var(--primary-color); /* Warna hijau SMAN 11 */
        padding: 5px; /* Header mengecil sedikit saat di-scroll agar lebih modern */
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    /* Mengatur warna teks agar tetap kontras saat background berubah */
    .topbar.scrolled .brand-name,
    .topbar.scrolled .brand-name span,
    .topbar.scrolled .openbtn span {
        color: white !important;
    }

    .nav-item::after {
  content: '';
  position: absolute;
  width: 0;
  height: 2px;
  bottom: -30px;
  left: 0;
  background-color: var(--white-color);
  transition: width 0.3s ease;
}


</style>
</head>
<body>


<?php require 'template/sidenav.php'; ?>

<div id="body">
 <header class="topbar" id="topbar">
  <div class="container">
    <div class="brand">
      <img class="logo" src="assets/logosebelas.png" alt="SMAN 11 Bekasi Logo">
      <a href="index.php" class="brand-name">SMAN 11 <span>Bekasi</span></a>
    </div>

   <nav class="nav-links" aria-label="Main navigation">
      <div class="menu-items" id="menuItems">
        <a href="#fasilitas" class="nav-item">Fasilitas</a>
        <a href="#prestasi" class="nav-item">Prestasi</a>
        <a href="#berita" class="nav-item">Berita</a>
        <a href="#agenda" class="nav-item">Agenda</a>
      </div>

        <button class="openbtn" onclick="openNav()" aria-label="Toggle Menu">
          <span>☰</span>
        </button>
    </nav>
      
  </div>
</header>


<section class="hero-school">
  <div class="hero-overlay"></div>
  
  <div class="container hero-container">
    <div class="hero-content">
      <h1 class="hero-title">SMAN 11 <br><span>Kota Bekasi</span></h1>
      <p class="hero-description">
        Mewujudkan generasi emas yang cerdas dan berkarakter melalui pendidikan yang inovatif.
      </p>
      <div class="hero-actions">
        <a href="https://www.instagram.com/sman11bekasi/" class="btn-primary">Kunjungi Kami</a>
      </div>
    </div>
  </div>

<?php
include 'config.php';
// Ambil data dari tabel sekolah
$query = mysqli_query($conn, "SELECT * FROM data_sekolah");
?>

<div class="stats-wrapper">
    <div class="stats-grid">
      
      <?php while($row = mysqli_fetch_assoc($query)): ?>
      <div class="stat-card">
        <div class="stat-icon">
            <?php 
            // Cek apakah icon berisi emoji/teks atau file gambar
            if (filter_var($row['icon'], FILTER_VALIDATE_URL) || file_exists("assets/img/icons/" . $row['icon'])) {
                echo '<img src="assets/img/icons/'.$row['icon'].'" width="50" height="50" alt="icon">';
            } else {
                // Jika isinya emoji atau class font-awesome (seperti di HTML Anda)
                echo $row['icon']; 
            }
            ?>
        </div>
        <div class="stat-data">
          <h3> <?php 
            $raw = $row['angka'];
            // Ambil hanya angka saja agar tidak error di PHP 8.4
            $cleanNumber = (float) preg_replace('/[^0-9]/', '', $raw);
            
            echo number_format($cleanNumber, 0, ',', '.'); 
            
            // Jika data aslinya mengandung '+', tampilkan kembali setelah angka
            if (strpos($raw, '+') !== false) echo '+'; 
        ?></h3>
          <p><?= $row['nama_lengkap']; ?></p>
        </div>
      </div>
      <?php endwhile; ?>

      <?php if(mysqli_num_rows($query) == 0): ?>
          <p>Data statistik belum tersedia.</p>
      <?php endif; ?>

    </div>
</div>
</section>




<section class="main-section" data-aos="fade-up">
  <div class="section-container">
    
    <div class="image-box" data-aos="zoom-in">
      <div class="image-wrapper">
        <img src="assets/Masjid.JPG" alt="SMA 11 Bekasi" class="hero-img">
        <div class="blob-glow"></div>
      </div>
    </div>

    <div class="text-box">
      <h1>Selamat Datang!</h1>
      <p>
        Jelajahi informasi terkini mengenai <strong>SMAN 11 Bekasi</strong>. Kami berkomitmen memberikan layanan pendidikan terbaik melalui inovasi dan integritas.
      </p>
        <div class="section-actions">
        <a href="https://www.instagram.com/sman11bekasi/" class="btn-primary">Kunjungi Kami</a>
      </div>
    </div>

  </div>
</section>
  


<section class="whyMust" id="whyMust" data-aos="fade-up">
  <div class="container">
    <div class="section-header-center">
      <h1>Kenapa Harus <span class="orange-text">SMAN 11 Bekasi?</span></h1>
      <p>Membentuk generasi unggul dengan dukungan lingkungan dan fasilitas terbaik.</p>
    </div>

    <div class="whyMust-wrapper">
      <div class="whyMust-card">
        <div class="whyMust-icon">
          <i class="fi fi-rr-tree"></i>
        </div>
        <div class="whyMust-text">
          <h4>Lingkungan Asri</h4>
          <p>Suasana sekolah yang hijau dan tenang, sangat mendukung konsentrasi belajar siswa setiap hari.</p>
        </div>
      </div>

      <div class="whyMust-card">
        <div class="whyMust-icon">
          <i class="fi fi-rr-shield"></i>
        </div>
        <div class="whyMust-text">
          <h4>Aman dan Nyaman</h4>
          <p>Keamanan 24 jam dan budaya sekolah yang inklusif menciptakan rasa nyaman bagi seluruh warga sekolah.</p>
        </div>
      </div>

      <div class="whyMust-card">
        <div class="whyMust-icon">
          <i class="fi fi-rr-school"></i>
        </div>
        <div class="whyMust-text">
          <h4>Fasilitas Lengkap</h4>
          <p>Mulai dari laboratorium modern hingga sarana olahraga untuk menunjang minat dan bakat siswa.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!--<div class="fasilitas" id="fasilitas" data-aos="fade-up">
    <div class="section-header">
        <h1>Fasilitas Sekolah</h1>
    </div>

    <section class="gallery-container">
        <?php
        $fasilitas = mysqli_query($conn, "SELECT * FROM fasilitas");
        ?>

        <div class="fasilitas-grid">
            <?php while($f = mysqli_fetch_assoc($fasilitas)) : ?>
                <div class="fasilitas-item">
                    <div class="img-wrapper">
                        <img src="admin/upload/<?php echo htmlspecialchars($f['gambar']); ?>" 
                             alt="<?php echo htmlspecialchars($f['nama']); ?>">
                        
                        <div class="overlay">
                            <p><?php echo htmlspecialchars($f['nama']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</div>-->

<section class="main-section" data-aos="fade-up">
  <div class="section-container">
    
    <div class="image-box" data-aos="zoom-in">
      <div class="image-wrapper">
        <img src="assets/Masjid.JPG" alt="SMA 11 Bekasi" class="hero-img">
        <div class="blob-glow"></div>
      </div>
    </div>

    <div class="text-box">
      <h1>Selamat Datang!</h1>
      <p>
        Jelajahi informasi terkini mengenai <strong>SMAN 11 Bekasi</strong>. Kami berkomitmen memberikan layanan pendidikan terbaik melalui inovasi dan integritas.
      </p>
      
    </div>

  </div>
</section>
  

<div class="prestasi" id="prestasi" data-aos="fade-up">
  <div class="section-header-center">
      <h1>Prestasi <span class="orange-text">SMAN 11 Bekasi</span></h1>
      <p class="blue-par">Setiap tahunnya, siswa/siswi kami selalu menorehkan bermacam prestasi yang prestisius, diantaranya:</p>
    </div>

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

    <div class="section-header">
     <h1>Berita Terbaru</h1>
    </div>

    <div class="berita-container">
        <?php
        $query = mysqli_query($conn, "SELECT id, judul, isi, tanggal, gambar, kategori FROM berita ORDER BY tanggal DESC LIMIT 4");
        if ($query && mysqli_num_rows($query) > 0) {
            while ($b = mysqli_fetch_assoc($query)) {
                $gambar_path = !empty($b['gambar']) ? "admin/upload/".htmlspecialchars($b['gambar']) : "assets/sma11home.png";
        ?>
                <article class="news-card">
                    <div class="news-img-wrapper">
                        <img src="<?= $gambar_path ?>" alt="<?= htmlspecialchars($b['judul']) ?>" class="news-img">
                    </div>
                    
                    <div class="news-content">
                        <?php if (!empty($b['kategori'])): ?>
                            <span class="news-category">
                                <?= htmlspecialchars($b['kategori']) ?>
                            </span>
                        <?php endif; ?>

                        <h3 class="news-title">
                            <a href="news_detail.php?id=<?= (int)$b['id'] ?>">
                                <?= htmlspecialchars($b['judul']) ?>
                            </a>
                        </h3>

                        <p class="news-excerpt">
                            <?= strip_tags($b['isi']) ?>
                        </p>

                        <div class="news-footer">
                            <small class="news-date">
                                <i class="fa fa-calendar-o" style="margin-right: 5px;"></i> 
                                <?= date('d M Y', strtotime($b['tanggal'])) ?>
                            </small>
                            <a href="news_detail.php?id=<?= (int)$b['id'] ?>" style="font-size: 13px; font-weight: 600; color: var(--primary-blue); text-decoration: none;">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                </article>
        <?php
            }
        } else {
            echo "<p style='grid-column: 1/-1; text-align:center; color:#555;'>Belum ada berita terbaru.</p>";
        }
        ?>
    </div>

    <div class="view-all-container" style="text-align: center; margin-top: 20px;">
        <a href="beritautama.php" class="btn-view-all">
            Lihat Semua Berita →
        </a>
    </div>
</div>


<?php
include 'admin/config.php';
date_default_timezone_set('Asia/Jakarta');

$today = date('Y-m-d');

// 1. Ambil data untuk Banner Hari Ini
$queryToday = mysqli_query($conn, "SELECT judul FROM agenda WHERE tanggal = '$today'");
$agendasToday = mysqli_fetch_all($queryToday, MYSQLI_ASSOC);

// 2. Ambil data untuk List Agenda Mendatang
$queryUpcoming = mysqli_query($conn, "SELECT * FROM agenda WHERE tanggal >= '$today' ORDER BY tanggal ASC LIMIT 5");
?>



<div class="agenda-container" id="agenda" data-aos="fade-up">

    <div class="section-header">
     <h1>Agenda Sekolah</h1>
    </div>

  <?php if (!empty($agendasToday)): ?>
    <div class="banner-today">
      🔔 Hari ini: 
      <?php 
        $titles = array_column($agendasToday, 'judul');
        echo "<span>" . implode(" &middot; ", array_map('htmlspecialchars', $titles)) . "</span>";
      ?>
    </div>
  <?php endif; ?>

  <div class="list-agenda">
    <?php if (mysqli_num_rows($queryUpcoming) > 0): ?>
      <?php while ($a = mysqli_fetch_assoc($queryUpcoming)): ?>
        <div class="kartuAgenda">
          <div class="fotoAgenda">
            <i class="fi fi-rr-calendar"></i>
          </div>
          <div class="judulAgenda">
            <p><strong><?= htmlspecialchars($a['judul']) ?></strong></p>
            <span><?= date('d M Y', strtotime($a['tanggal'])) ?></span>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p style="text-align:center; color:#666; padding: 20px;">--Belum ada agenda mendatang.--</p>
    <?php endif; ?>
  </div>
</div>


<?php require 'template/footer.php'; ?>

</body>
<script>
  window.addEventListener('scroll', function() {
    const topbar = document.getElementById("topbar");
    
    // Ambil posisi scroll saat ini
    const scrollPos = window.scrollY || document.documentElement.scrollTop;

    // Jika scroll lebih dari 50px, tambahkan class 'scrolled'
    if (scrollPos > 50) {
        topbar.classList.add("scrolled");
    } else {
        topbar.classList.remove("scrolled");
    }
});
</script>
<script src="js\main.js"></script>
</html>