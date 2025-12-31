<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';

$id = intval($_GET['id']);
$res = mysqli_query($conn, "SELECT * FROM prestasi WHERE id=$id");
$row = mysqli_fetch_assoc($res);
if(!$row){ echo '<div class="alert alert-danger">Data tidak ditemukan.</div>'; include 'template/footer.php'; exit; }

if($_SERVER['REQUEST_METHOD']=='POST'){
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $angka = intval($_POST['angka']);
    $stmt = mysqli_prepare($conn, "UPDATE prestasi SET kategori=?, angka=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sii", $kategori, $angka, $id);
    mysqli_stmt_execute($stmt);
    header('Location: prestasi.php'); exit;
}
?>

<h1 class="h3 mb-4 text-gray-800">Edit Prestasi</h1>
<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post">
      <div class="form-group">
        <label>Kategori Prestasi</label>
        <select name="kategori" class="form-control" required>
          <option value="Akademik" <?= $row['kategori']=='Akademik'?'selected':''; ?>>Akademik</option>
          <option value="Non Akademik" <?= $row['kategori']=='Non Akademik'?'selected':''; ?>>Non Akademik</option>
          <option value="Prestasi Sekolah" <?= $row['kategori']=='Prestasi Sekolah'?'selected':''; ?>>Prestasi Sekolah</option>
        </select>
      </div>
      <div class="form-group">
        <label>Angka Prestasi</label>
        <input type="number" name="angka" class="form-control" value="<?= htmlspecialchars($row['angka']); ?>" required>
      </div>
      <button class="btn btn-primary">Simpan</button>
      <a href="prestasi.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>

<?php include 'template/footer.php'; ?>
