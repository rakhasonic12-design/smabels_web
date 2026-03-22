<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');

include 'config.php';
// Pastikan koneksi DB menggunakan $conn

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $isi = $_POST['isi']; // HTML mentah dari CKEditor
    $gambar_utama = '';

    // Upload Thumbnail Utama (Cover)
    if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK){
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        // Prefix 'thumb_' untuk membedakan dengan gambar konten
        $nama_file = 'thumb_' . time() . '.' . $ext; 
        
        // Pastikan folder 'uploads' tersedia
        if (!file_exists(__DIR__ . '/upload')) {
            mkdir(__DIR__ . '/upload', 0777, true);
        }

        if(move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/upload/' . $nama_file)){
            $gambar_utama = $nama_file;
        }
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO berita (judul, kategori, isi, gambar, tanggal) VALUES (?, ?, ?, ?, NOW())");
    mysqli_stmt_bind_param($stmt, "ssss", $judul, $kategori, $isi, $gambar_utama);
    
    if(mysqli_stmt_execute($stmt)){
        echo "<script>alert('Berita Berhasil Terbit!'); window.location='berita.php';</script>";
    }
}
?>