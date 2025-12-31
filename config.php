<?php
// config.php

$host = '127.0.0.1';   // WAJIB, jangan localhost
$db   = 'db_siswa';
$user = 'root';
$pass = '';
$port = 3306;

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    die("<h2>Koneksi database gagal</h2><pre>{$e->getMessage()}</pre>");
}
