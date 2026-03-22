<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';

// --- LOGIKA HAPUS SEMUA DATA ---
if (isset($_GET['action']) && $_GET['action'] == 'delete_all') {
    mysqli_query($conn, "TRUNCATE TABLE aspirasi"); // TRUNCATE menghapus semua isi & reset ID kembali ke 1
    header('Location: aspirasi.php');
    exit;
}

// --- LOGIKA HAPUS SATUAN (BERDASARKAN ISI) ---
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['isi'])) {
    $isi_hapus = mysqli_real_escape_string($conn, $_GET['isi']);
    mysqli_query($conn, "DELETE FROM aspirasi WHERE isi = '$isi_hapus'");
    header('Location: aspirasi.php');
    exit;
}

// --- LOGIKA EKSPOR EXCEL ---
if (isset($_GET['action']) && $_GET['action'] == 'export') {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data_Aspirasi_".date('Y-m-d').".xls");
    
    $export_query = mysqli_query($conn, "SELECT isi, COUNT(*) AS jumlah, MAX(tanggal) AS terakhir FROM aspirasi GROUP BY isi ORDER BY jumlah DESC");
    
    echo '<table border="1">
            <tr>
                <th>No</th>
                <th>Isi Aspirasi</th>
                <th>Jumlah</th>
                <th>Terakhir Dikirim</th>
            </tr>';
    $n = 1;
    while($r = mysqli_fetch_assoc($export_query)) {
        echo "<tr>
                <td>".$n++."</td>
                <td>".$r['isi']."</td>
                <td>".$r['jumlah']."</td>
                <td>".$r['terakhir']."</td>
              </tr>";
    }
    echo '</table>';
    exit;
}

include 'template/header.php';

// Query Utama
$query = mysqli_query($conn, "
    SELECT 
        MAX(id) AS id_terakhir, 
        isi, 
        MAX(tanggal) AS tanggal_terakhir, 
        COUNT(*) AS jumlah
    FROM aspirasi
    GROUP BY isi
    ORDER BY jumlah DESC, tanggal_terakhir DESC
");

$jumlah_aspirasi_res = mysqli_query($conn, "SELECT COUNT(*) AS total FROM aspirasi");
$jumlah_aspirasi = mysqli_fetch_assoc($jumlah_aspirasi_res)['total'];
?>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card border-warning shadow-sm">
            <div class="card-body text-center">
                <h5 class="card-title text-warning">Total Aspirasi</h5>
                <h2><?= $jumlah_aspirasi ?></h2>
                <p class="card-text small text-muted">Data masuk di database</p>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Kotak Aspirasi Digital</h1>
    <div>
        <a href="?action=export" class="btn btn-success mr-2">
            <i class="fas fa-file-excel"></i> Ekspor ke Excel
        </a>
        <a href="?action=delete_all" class="btn btn-danger" 
           onclick="return confirm('PERINGATAN! Semua data aspirasi akan dihapus permanen. Anda yakin?')">
            <i class="fas fa-trash-alt"></i> Hapus Seluruh Data
        </a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary text-center">
                    <tr>
                        <th width="50">No</th>
                        <th>Isi Aspirasi</th>
                        <th width="100">Jumlah</th>
                        <th width="180">Terakhir Dikirim</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if(mysqli_num_rows($query) > 0):
                        while($row = mysqli_fetch_assoc($query)):
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= nl2br(htmlspecialchars($row['isi'])) ?></td>
                        <td class="text-center"><span class="badge badge-info"><?= $row['jumlah'] ?>x</span></td>
                        <td class="text-center"><?= date('d M Y H:i', strtotime($row['tanggal_terakhir'])) ?></td>
                        <td class="text-center">
                            <a href="?action=delete&isi=<?= urlencode($row['isi']) ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Hapus semua aspirasi dengan isi ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; 
                    else: ?>
                    <tr>
                        <td colspan="5" class="text-center italic">Belum ada aspirasi masuk.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>