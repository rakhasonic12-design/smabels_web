<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';
?>

<div class="container-fluid">
  <h1 class="h3 mb-4">Dashboard Admin</h1>

  <div class="row">

    <div class="col-md-3 mb-4">
      <div class="card border-primary shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title text-primary">Berita</h5>
          <p class="card-text small text-muted">Kelola berita terbaru sekolah</p>
          <a href="berita.php" class="btn btn-sm btn-primary">Lihat</a>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card border-success shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title text-success">Agenda</h5>
          <p class="card-text small text-muted">Kelola agenda kegiatan</p>
          <a href="agenda.php" class="btn btn-sm btn-success">Lihat</a>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card border-warning shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title text-warning">Kotak Aspirasi</h5>
          <p class="card-text small text-muted">Lihat ide & saran dari pengguna</p>
          <a href="aspirasi.php" class="btn btn-sm btn-warning text-white">Lihat</a>
        </div>
      </div>
    </div>

     <div class="col-md-3 mb-4">
    <div class="card border-info shadow-sm">
    <div class="card-body text-center">
      <h5 class="card-title text-info">Prestasi</h5>
      <p class="card-text small text-muted">Kelola prestasi akademik & non-akademik</p>
      <a href="prestasi.php" class="btn btn-sm btn-info text-white">Lihat</a>
    </div>
  </div>
</div>

      <div class="col-md-3 mb-4">
    <div class="card border-info shadow-sm">
        <div class="card-body text-center">
            <h5 class="card-title text-info">Fasilitas</h5>
            <p class="card-text small text-muted">Kelola fasilitas sekolah</p>
            <a href="fasilitas.php" class="btn btn-sm btn-info text-white">Lihat</a>
        </div>
    </div>
</div>

  <div class="col-md-3 mb-4">
    <div class="card border-info shadow-sm">
        <div class="card-body text-center">
            <h5 class="card-title text-info">Sekolah</h5>
            <p class="card-text small text-muted">Kelola data sekolah</p>
            <a href="sekolah.php" class="btn btn-sm btn-info text-white">Lihat</a>
        </div>
    </div>
</div>



  </div>
</div>

<?php include 'template/footer.php'; ?>
