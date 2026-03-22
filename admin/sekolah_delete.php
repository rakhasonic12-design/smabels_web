<?php
session_start();
// Pastikan hanya admin yang bisa menghapus
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include 'config.php';

// 1. Cek apakah parameter 'hapus' ada di URL
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']); 

    // 2. Gunakan Prepared Statement untuk keamanan extra
    $stmt = mysqli_prepare($conn, "DELETE FROM data_sekolah WHERE id = ? LIMIT 1");
    
    // "i" berarti variabel $id adalah Integer
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    if (mysqli_stmt_execute($stmt)) {
        // 3. Berikan feedback ke halaman utama
        header("Location: home.php?pesan=terhapus");
        exit;
    } else {
        // Tampilkan error jika query gagal
        die("Gagal menghapus data: " . mysqli_error($conn));
    }
    
    mysqli_stmt_close($stmt);
} else {
    // Jika diakses tanpa parameter 'hapus', kembalikan ke home
    header("Location: home.php");
    exit;
}
?>