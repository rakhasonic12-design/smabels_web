<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $angka = intval($_POST['angka']);
    $stmt = mysqli_prepare($conn, "INSERT INTO prestasi (kategori, angka) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "si", $kategori, $angka);
    mysqli_stmt_execute($stmt);
    header('Location: prestasi.php'); exit;
}
?>

<h1 class="h3 mb-4 text-gray-800">Tambah Prestasi</h1>
<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post">
      <div class="form-group">
        <label>Kategori Prestasi</label>
        <select name="kategori" class="form-control" required>
          <option value="">-- Pilih Kategori --</option>
          <option value="Akademik">Akademik</option>
          <option value="Non Akademik">Non Akademik</option>
          <option value="Prestasi Sekolah">Prestasi Sekolah</option>
        </select>
      </div>
      <div class="form-group">
        <label>Angka Prestasi</label>
        <input type="number" name="angka" class="form-control" required>
      </div>
      <button class="btn btn-primary">Simpan</button>
      <a href="prestasi.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>

<?php include 'template/footer.php'; ?>
