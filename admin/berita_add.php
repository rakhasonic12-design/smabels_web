<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $gambar = '';
    if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK){
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $nama_file = time() . '.' . $ext;
        $tujuan = __DIR__ . '/upload/' . $nama_file;
        if(move_uploaded_file($_FILES['gambar']['tmp_name'], $tujuan)){
            $gambar = $nama_file;
        }
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO berita (judul, kategori, isi, gambar, tanggal) VALUES (?, ?, ?, ?, NOW())");
    mysqli_stmt_bind_param($stmt, "ssss", $judul, $kategori, $isi, $gambar);
    mysqli_stmt_execute($stmt);
    header('Location: berita.php'); exit;
}
?>
<h1 class="h3 mb-3">Tambah Berita</h1>
<form method="post" enctype="multipart/form-data">
  <div class="form-group"><label>Judul</label><input name="judul" class="form-control" required></div>
  <div class="form-group"><label>Kategori</label><input name="kategori" class="form-control" required></div>
  <div class="form-group"><label>Isi</label><textarea name="isi" class="form-control" rows="6" required></textarea></div>
  <div class="form-group"><label>Gambar</label><input type="file" name="gambar" class="form-control-file" accept="image/*"></div>
  <button class="btn btn-primary">Simpan</button>
  <a href="berita.php" class="btn btn-secondary">Batal</a>
</form>
<?php include 'template/footer.php'; ?>
