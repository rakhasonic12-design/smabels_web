<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';

$id = intval($_GET['id']);
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fasilitas WHERE id='$id'"));

if(!$data) die("Fasilitas tidak ditemukan.");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if($gambar){
        move_uploaded_file($tmp, 'upload/'.$gambar);
        if($data['gambar'] && file_exists('upload/'.$data['gambar'])) unlink('upload/'.$data['gambar']);
        $stmt = mysqli_prepare($conn, "UPDATE fasilitas SET nama=?, gambar=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "ssi", $nama, $gambar, $id);
    } else {
        $stmt = mysqli_prepare($conn, "UPDATE fasilitas SET nama=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "si", $nama, $id);
    }
    mysqli_stmt_execute($stmt);
    header('Location: fasilitas.php'); exit;
}
?>

<h1 class="h3 mb-4 text-gray-800">Edit Fasilitas</h1>
<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nama Fasilitas</label>
        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
      </div>
      <div class="form-group">
        <label>Gambar Saat Ini</label><br>
        <img src="upload/<?= htmlspecialchars($data['gambar']) ?>" width="150" style="margin-bottom:10px;"><br>
        <label>Ganti Gambar (opsional)</label>
        <input type="file" name="gambar" class="form-control">
      </div>
      <button class="btn btn-primary">Update</button>
      <a href="fasilitas.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>

<?php include 'template/footer.php'; ?>
