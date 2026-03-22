<?php
session_start();
// 1. Proteksi halaman dengan exit agar script di bawahnya tidak tereksekusi
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include 'config.php';

$error = ""; // Variabel untuk menyimpan pesan error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 2. Validasi input sederhana (pastikan tidak hanya spasi)
    $judul = trim($_POST['judul']);
    $tanggal = $_POST['tanggal'];

    if (!empty($judul) && !empty($tanggal)) {
        // 3. Gunakan prepared statement (mysqli_real_escape_string tidak wajib jika pakai ini)
        $stmt = mysqli_prepare($conn, "INSERT INTO agenda (judul, tanggal) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $judul, $tanggal);
        
        if (mysqli_stmt_execute($stmt)) {
            // Berhasil simpan, arahkan ke daftar agenda (biasanya agenda.php, bukan home)
            header('Location: home.php?status=success'); 
            exit;
        } else {
            $error = "Gagal menyimpan data ke database.";
        }
        mysqli_stmt_close($stmt);
    } else {
        $error = "Semua field wajib diisi!";
    }
}

include 'template/header.php';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Agenda Baru</h1>

    <?php if ($error): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $error ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group mb-3">
                    <label for="judul" class="font-weight-bold">Judul Agenda</label>
                    <input type="text" id="judul" name="judul" class="form-control" 
                           placeholder="Contoh: Rapat Koordinasi Tahunan" required autofocus>
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal" class="font-weight-bold">Tanggal Agenda</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" 
                           value="<?= date('Y-m-d') ?>" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Agenda
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