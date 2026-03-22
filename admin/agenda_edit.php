<?php
session_start();
// Proteksi halaman
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include 'config.php';

// Ambil ID dengan validasi dasar
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    header('Location: home.php');
    exit;
}

// Ambil data agenda yang akan diedit
$stmt_get = mysqli_prepare($conn, "SELECT * FROM agenda WHERE id = ?");
mysqli_stmt_bind_param($stmt_get, "i", $id);
mysqli_stmt_execute($stmt_get);
$res = mysqli_stmt_get_result($stmt_get);
$row = mysqli_fetch_assoc($res);

if (!$row) {
    include 'template/header.php';
    echo '<div class="alert alert-danger">Agenda tidak ditemukan atau sudah terhapus.</div>';
    echo '<a href="home.php" class="btn btn-primary">Kembali</a>';
    include 'template/footer.php';
    exit;
}

// Proses Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);

    $stmt_update = mysqli_prepare($conn, "UPDATE agenda SET judul = ?, tanggal = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt_update, "ssi", $judul, $tanggal, $id);
    
    if (mysqli_stmt_execute($stmt_update)) {
        $_SESSION['success'] = "Agenda berhasil diperbarui.";
        header('Location: home.php'); // Sebaiknya kembali ke agenda.php bukan home.php
        exit;
    } else {
        $error = "Gagal memperbarui data.";
    }
}

include 'template/header.php';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Agenda</h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group mb-3">
                    <label for="judul" class="font-weight-bold">Judul Agenda</label>
                    <input type="text" id="judul" name="judul" class="form-control" 
                           value="<?= htmlspecialchars($row['judul']) ?>" required placeholder="Contoh: Rapat Koordinasi">
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal" class="font-weight-bold">Tanggal Agenda</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" 
                           value="<?= htmlspecialchars($row['tanggal']) ?>" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="home.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>