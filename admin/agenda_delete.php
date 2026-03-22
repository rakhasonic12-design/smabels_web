<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM agenda WHERE id=$id");
header('Location: home.php'); exit;
?>
