<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';

$id = intval($_GET['id']);
$res = mysqli_query($conn, "SELECT * FROM berita WHERE id=$id");
$row = mysqli_fetch_assoc($res);
if(!$row){ echo '<div class="alert alert-danger">Berita tidak ditemukan.</div>'; include 'template/footer.php'; exit; }

if($_SERVER['REQUEST_METHOD']=='POST'){
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $gambar = $row['gambar'];

    
    if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK){
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $nama_file = time() . '.' . $ext;
        $tujuan = __DIR__ . '/upload/' . $nama_file;
        if(move_uploaded_file($_FILES['gambar']['tmp_name'], $tujuan)){
            if($gambar && file_exists(__DIR__ . '/upload/' . $gambar)){
                unlink(__DIR__ . '/upload/' . $gambar);
            }
            $gambar = $nama_file;
        }
    }

    $stmt = mysqli_prepare($conn, "UPDATE berita SET judul=?, kategori=?, isi=?, gambar=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssssi", $judul, $kategori, $isi, $gambar, $id);
    mysqli_stmt_execute($stmt);
    header('Location: berita.php'); exit;
}
?>
<h1 class="h3 mb-3">Edit Berita</h1>
<form method="post" enctype="multipart/form-data">
  <div class="form-group"><label>Judul</label><input name="judul" class="form-control" value="<?= htmlspecialchars($row['judul']) ?>" required></div>
  <div class="form-group"><label>Kategori</label><input name="kategori" class="form-control" value="<?= htmlspecialchars($row['kategori']) ?>" required></div>
  <div class="form-group"><label>Isi</label><textarea name="isi" class="form-control" rows="6" required><?= htmlspecialchars($row['isi']) ?></textarea></div>
  
  <div class="form-group">
    <label>Gambar Saat Ini</label><br>
    <?php if($row['gambar']): ?>
      <img src="upload/<?= htmlspecialchars($row['gambar']) ?>" width="200" class="img-thumbnail mb-2"><br>
    <?php else: ?>
      <span class="text-muted">Belum ada gambar</span><br>
    <?php endif; ?>
    <input type="file" name="gambar" class="form-control-file" accept="image/*">
  </div>

  <button class="btn btn-primary">Simpan</button>
  <a href="berita.php" class="btn btn-secondary">Batal</a>
</form>
<?php include 'template/footer.php'; ?>
