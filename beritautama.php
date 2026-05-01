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
    <h1>Berita SMAN 11 Bekasi</h1>
    <p>Ikuti kabar terkini dan kegiatan menarik di lingkungan sekolah kami</p>
  </section>

  <section class="news-section">
    <div class="search-section">
    <form method="get" action="" class="search-form">
        <input 
            type="text" 
            name="q" 
            class="search-input"
            placeholder="Cari berita..." 
            value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>" 
            
        >
        <button type="submit" class="search-button">
            <i class="fa fa-search"></i> <span>Cari</span>
        </button>
    </form>
</div>

    <?php
    // --- LOGIKA PAGINATION ---
    $batas = 8; // Jumlah berita per halaman
    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

    $keyword = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : '';
    $where_clause = "";
    if (!empty($keyword)) {
        $where_clause = " WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%'";
    }

    // Hitung total data untuk mengetahui jumlah halaman
    $data = mysqli_query($conn, "SELECT id FROM berita $where_clause");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);

    // Query ambil data dengan LIMIT
    $sql = "SELECT * FROM berita $where_clause ORDER BY tanggal DESC LIMIT $halaman_awal, $batas";
    $query = mysqli_query($conn, $sql);
    ?>

    <div class="berita-container">
        <?php
        if ($query && mysqli_num_rows($query) > 0) {
            while ($b = mysqli_fetch_assoc($query)) {
                $gambar_path = !empty($b['gambar']) ? "admin/upload/".htmlspecialchars($b['gambar']) : "assets/sma11home.png";
        ?>
                <article class="news-card">
                    <div class="news-img-wrapper">
                        <img src="<?= $gambar_path ?>" alt="<?= htmlspecialchars($b['judul']) ?>" class="news-img">
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">
                            <a href="news_detail.php?id=<?= (int)$b['id'] ?>">
                                <?= htmlspecialchars($b['judul']) ?>
                            </a>
                        </h3>
                        <p class="news-excerpt">
                            <?= substr(strip_tags($b['isi']), 0, 100) ?>...
                        </p>
                        <div class="news-footer">
                            <small><i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($b['tanggal'])) ?></small>
                            <a href="news_detail.php?id=<?= (int)$b['id'] ?>" class="read-more">Baca Selengkapnya →</a>
                        </div>
                    </div>
                </article>
        <?php
            }
        } else {
            echo "<p style='grid-column: 1/-1; text-align:center;'>Berita tidak ditemukan.</p>";
        }
        ?>
    </div>

    <div class="pagination-container" style="text-align: center; margin-top: 40px; display: flex; justify-content: center; gap: 10px;">
        
        <?php if($halaman > 1): ?>
            <a class="page-link" href="?halaman=<?= $halaman - 1 ?>&q=<?= $keyword ?>"><i class="fa fa-angle-left"></i> Sebelumnya</a>
        <?php endif; ?>

        <?php for($x=1; $x<=$total_halaman; $x++): ?>
            <a class="page-link <?= ($halaman == $x) ? 'active' : '' ?>" href="?halaman=<?= $x ?>&q=<?= $keyword ?>"><?= $x ?></a>
        <?php endfor; ?>

        <?php if($halaman < $total_halaman): ?>
            <a class="page-link" href="?halaman=<?= $halaman + 1 ?>&q=<?= $keyword ?>">Berikutnya <i class="fa fa-angle-right"></i></a>
        <?php endif; ?>
        
    </div>
</section>


 <?php require 'template/footer.php'; ?>
<script src="js/berita.js"></script>
</body>
</html>
