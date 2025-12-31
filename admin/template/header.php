<?php
if(session_status() == PHP_SESSION_NONE) session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: ../admin/login.php'); exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Admin</a>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item"><a class="nav-link" href="berita.php">Berita</a></li>
    <li class="nav-item"><a class="nav-link" href="agenda.php">Agenda</a></li>
    <li class="nav-item"><a class="nav-link" href="aspirasi.php">Kotak Aspirasi</a></li>
    <li class="nav-item"><a class="nav-link" href="prestasi.php">Prestasi Sekolah</a></li>
    <li class="nav-item"><a class="nav-link" href="fasilitas.php">Fasilitas</a></li>
    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
  </ul>
</nav>
<div class="container mt-4">
