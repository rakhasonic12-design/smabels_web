<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if($gambar){
        move_uploaded_file($tmp, 'upload/'.$gambar);
        $stmt = mysqli_prepare($conn, "INSERT INTO fasilitas (nama, gambar) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $nama, $gambar);
        mysqli_stmt_execute($stmt);
        header('Location: fasilitas.php'); exit;
    } else {
        echo "<div class='alert alert-danger'>Gambar wajib diisi!</div>";
    }
}
?>

<h1 class="h3 mb-4 text-gray-800">Tambah Fasilitas</h1>
<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nama Fasilitas</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Gambar Fasilitas</label>
        <input type="file" name="gambar" class="form-control" required>
      </div>
      <button class="btn btn-primary">Simpan</button>
      <a href="fasilitas.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>

<?php include 'template/footer.php'; ?>
