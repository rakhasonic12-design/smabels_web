<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);

    $stmt = mysqli_prepare($conn, "INSERT INTO agenda (judul, tanggal) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $judul, $tanggal);
    mysqli_stmt_execute($stmt);

    header('Location: agenda.php'); 
    exit;
}
?>

<h1 class="h3 mb-4 text-gray-800">Tambah Agenda</h1>

<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post">
      <div class="form-group">
        <label for="judul">Judul Agenda</label>
        <input type="text" id="judul" name="judul" class="form-control" placeholder="Masukkan judul agenda" required>
      </div>

      <div class="form-group">
        <label for="tanggal">Tanggal Agenda</label>
        <input type="date" id="tanggal" name="tanggal" class="form-control" required>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        <a href="agenda.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
      </div>
    </form>
  </div>
</div>

<?php include 'template/footer.php'; ?>
