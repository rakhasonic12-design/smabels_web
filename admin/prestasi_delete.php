<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM prestasi WHERE id=$id");
header('Location: prestasi.php'); exit;
?>
