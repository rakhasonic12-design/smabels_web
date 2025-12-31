<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';

$fasilitas = mysqli_query($conn, "SELECT * FROM fasilitas ORDER BY id DESC");
?>

<h1 class="h3 mb-4 text-gray-800">Fasilitas Sekolah</h1>
<a href="fasilitas_add.php" class="btn btn-success mb-3">Tambah Fasilitas</a>

<div class="row">
<?php while($f = mysqli_fetch_assoc($fasilitas)) { ?>
    <div class="col-md-3 mb-4">
        <div class="card shadow">
            <img class="card-img-top" src="upload/<?= htmlspecialchars($f['gambar']) ?>" alt="<?= htmlspecialchars($f['nama']) ?>" style="height:180px; object-fit:cover;">
            <div class="card-body text-center">
                <p class="card-text font-weight-bold"><?= htmlspecialchars($f['nama']) ?></p>
                <a href="fasilitas_edit.php?id=<?= $f['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="fasilitas_delete.php?id=<?= $f['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </div>
        </div>
    </div>
<?php } ?>
</div>

<?php include 'template/footer.php'; ?>
