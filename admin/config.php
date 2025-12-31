<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = "localhost";
$user = "root";
$pass = ""; // kosongkan "" jika default Laragon
$db   = "db_siswa";
$port = 3306;

try {
    $conn = mysqli_connect($host, $user, $pass, $db, $port);
    mysqli_set_charset($conn, "utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
