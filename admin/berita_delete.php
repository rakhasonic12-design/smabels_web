<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';

$id = intval($_GET['id']);
$res = mysqli_query($conn, "SELECT gambar FROM berita WHERE id=$id");
$r = mysqli_fetch_assoc($res);
if($r && $r['gambar']){
    $file = 'upload/'.$r['gambar'];
    if(file_exists($file)) unlink($file);
}
mysqli_query($conn, "DELETE FROM berita WHERE id=$id");
header('Location: berita.php');
exit;
?>
