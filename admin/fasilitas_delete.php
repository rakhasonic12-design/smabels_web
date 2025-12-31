<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';

$id = intval($_GET['id']);
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM fasilitas WHERE id='$id'"));

if($data['gambar'] && file_exists('upload/'.$data['gambar'])) unlink('upload/'.$data['gambar']);
mysqli_query($conn, "DELETE FROM fasilitas WHERE id='$id'");

header('Location: fasilitas.php'); exit;
