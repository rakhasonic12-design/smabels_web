<?php
include 'admin/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $isi  = mysqli_real_escape_string($conn, $_POST['isi']);

    if (!empty($isi)) {
        $stmt = mysqli_prepare($conn, "INSERT INTO aspirasi (nama, role, isi) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $nama, $role, $isi);
        mysqli_stmt_execute($stmt);

        echo "<script>alert('Terima kasih! Aspirasi Anda telah terkirim.');window.location='kotakaspirasi.php';</script>";
    } else {
        echo "<script>alert('Silakan isi aspirasi terlebih dahulu.');window.location='kotakaspirasi.php';</script>";
    }
}
?>
