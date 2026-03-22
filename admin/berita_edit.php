<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';

$id = intval($_GET['id']);
$res = mysqli_query($conn, "SELECT * FROM berita WHERE id=$id");
$row = mysqli_fetch_assoc($res);

if(!$row){ 
    echo '<div class="alert alert-danger">Berita tidak ditemukan.</div>'; 
    exit; 
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $isi = $_POST['isi']; // HTML dari editor
    $gambar = $row['gambar'];

    // Proses Update Thumbnail Utama
    if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK){
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $nama_file = time() . '_thumb.' . $ext;
        $tujuan = __DIR__ . '/upload/' . $nama_file;
        
        if(move_uploaded_file($_FILES['gambar']['tmp_name'], $tujuan)){
            // Hapus gambar lama jika ada
            if($gambar && file_exists(__DIR__ . '/upload/' . $gambar)){
                unlink(__DIR__ . '/upload/' . $gambar);
            }
            $gambar = $nama_file;
        }
    }

    $stmt = mysqli_prepare($conn, "UPDATE berita SET judul=?, kategori=?, isi=?, gambar=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssssi", $judul, $kategori, $isi, $gambar, $id);
    
    if(mysqli_stmt_execute($stmt)){
        echo "<script>alert('Berita Berhasil Diperbarui!'); window.location='berita.php';</script>";
        exit;
    }
}

include 'template/header.php';
?>

<style>
    .ck-editor__editable_inline { 
        min-height: 400px; 
        border-radius: 0 0 8px 8px !important; 
    }
    .form-label { font-weight: 600; margin-top: 10px; }
    .card { border-radius: 15px; border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
    .img-preview { border-radius: 10px; object-fit: cover; }
</style>

<div class="container-fluid mt-4">
    <h1 class="h3 mb-3 text-gray-800">Edit Berita</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                
                <div class="form-group mb-3">
                    <label class="form-label">Judul Berita</label>
                    <input name="judul" class="form-control form-control-lg" value="<?= htmlspecialchars($row['judul']) ?>" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-control">
                            <option <?= $row['kategori'] == 'Kegiatan' ? 'selected' : '' ?>>Kegiatan</option>
                            <option <?= $row['kategori'] == 'Prestasi' ? 'selected' : '' ?>>Prestasi</option>
                            <option <?= $row['kategori'] == 'Pengumuman' ? 'selected' : '' ?>>Pengumuman</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gambar Utama (Thumbnail)</label>
                        <?php if($row['gambar']): ?>
                            <div class="mb-2">
                                <img src="uploads/<?= htmlspecialchars($row['gambar']) ?>" width="120" class="img-preview shadow-sm">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label">Konten Berita</label>
                    <textarea name="isi" id="editor"><?= $row['isi'] ?></textarea>
                </div>

                <div class="text-right border-top pt-3">
                    <a href="berita.php" class="btn btn-secondary px-4">Batal</a>
                    <button type="submit" class="btn btn-primary px-5">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: [
                'heading', '|', 'bold', 'italic', 'link', 'insertTable', '|',
                'imageUpload', 'mediaEmbed', '|', 
                'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo'
            ],
            ckfinder: {
                uploadUrl: 'upload_aksi.php'
            },
            placeholder: 'Edit isi berita di sini...'
        })
        .catch(error => { console.error(error); });
</script>

<?php include 'template/footer.php'; ?>