<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = '127.0.0.1';   // WAJIB pakai ini, bukan localhost
$user = 'root';
$pass = '';      // pastikan sama dengan phpMyAdmin
$db   = 'db_smabels';
$port = 3306;          // default MySQL Laragon

try {
    $mysqli = new mysqli($host, $user, $pass, $db, $port);
    $mysqli->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    die(
        "<h2>Koneksi database gagal</h2>
        <pre>{$e->getMessage()}</pre>"
    );
}

function table_exists($mysqli, $table_name) {
    $t = $mysqli->real_escape_string($table_name);
    $res = $mysqli->query("SHOW TABLES LIKE '$t'");
    return ($res && $res->num_rows > 0);
}

if (!table_exists($mysqli, 'kelulusan')) {
    echo "<h2>Error: tabel <code>kelulusan</code> tidak ada.</h2>";
    echo "<p>Jalankan SQL untuk membuat dan mengisi tabel <code>kelulusan</code> dari tabel <code>siswa</code> dulu.</p>";
    exit;
}

if (isset($_POST['cetak'])) {
    $nisn = trim($_POST['nisn']);

    if ($nisn === '') {
        echo "<script>alert('Masukkan NISN.');window.history.back();</script>"; exit;
    }

    $stmt = $mysqli->prepare("SELECT nisn, nama, kelas, tahun_masuk, status, tanggal_kelulusan FROM kelulusan WHERE nisn = ?");
    $stmt->bind_param('s', $nisn);
    $stmt->execute();
    $res = $stmt->get_result();

    if (!$res) {
        echo "<script>alert('Terjadi kesalahan saat query.');window.history.back();</script>";
        exit;
    }

    if ($res->num_rows === 0) {
        echo "<script>alert('NISN tidak ditemukan. Pastikan NISN benar.');window.history.back();</script>";
        exit;
    }

    $row = $res->fetch_assoc();

  
    if ((int)$row['tahun_masuk'] !== 2022) {
        echo "<script>alert('Maaf. Siswa/siswi belum lulus atau masih sekolah (bukan angkatan 2022).'); window.history.back();</script>";
        exit;
    }
   
    $status_text = htmlspecialchars($row['status']);
    $nama = htmlspecialchars($row['nama']);
    $kelas = htmlspecialchars($row['kelas']);
    $nisn_html = htmlspecialchars($row['nisn']);
    $tanggal = $row['tanggal_kelulusan'] ? date('d F Y', strtotime($row['tanggal_kelulusan'])) : date('d F Y');

    $html = '
    <html>
  <head>
    <meta charset="utf-8">
    <style>
      body {
        font-family: DejaVu Sans, sans-serif;
        margin: 50px 60px;
        line-height: 1.6;
        color: #000;
      }

      .header {
        text-align: center;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
        margin-bottom: 30px;
      }

      .header img {
        width: 90px;
        margin-bottom: 10px;
      }

      .header h2 {
        margin: 0;
        font-size: 20pt;
        letter-spacing: 1px;
      }

      .header h3 {
        margin: 4px 0 0 0;
        font-size: 14pt;
        text-decoration: underline;
      }

      p {
        font-size: 11pt;
        text-align: justify;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        font-size: 11pt;
      }

      td {
        padding: 6px 8px;
        vertical-align: top;
      }

      td:first-child {
        width: 200px;
      }

      tr td:first-child {
        font-weight: bold;
      }

      .footer {
        text-align: right;
        margin-top: 50px;
        font-size: 11pt;
      }

      .footer p {
        margin: 6px 0;
      }

      .signature {
        margin-top: 60px;
        text-align: right;
      }

      .signature p {
        margin: 4px 0;
      }

      .signature strong {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <h2>SMA NEGERI 11 BEKASI</h2>
      <h3><strong>SURAT KETERANGAN KELULUSAN</strong></h3>
    </div>

    <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>

    <table>
      <tr><td>NISN</td><td>: '.$nisn_html.'</td></tr>
      <tr><td>Nama</td><td>: '.$nama.'</td></tr>
      <tr><td>Kelas / Angkatan</td><td>: '.$kelas.'</td></tr>
      <tr><td>Status</td><td>: <strong>'.$status_text.'</strong></td></tr>
      <tr><td>Tanggal</td><td>: '.$tanggal.'</td></tr>
    </table>

    <p style="margin-top: 25px;">
      Demikian surat keterangan ini dibuat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.
    </p>

    <div class="footer">
      <p>Bekasi, '.date("d F Y").'</p>
      <p>Kepala Sekolah</p>
    </div>

    <div class="signature">
      <p><br><br><strong>Drs. H. Juhari, M.Pd</strong></p>
    </div>
  </body>
</html>
';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("SK_Kelulusan_{$nisn}.pdf", array("Attachment" => false));
    exit;
}
?>

<!DOCTYPE html>

<html>
<head>
<title>SMA 11 Bekasi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<link rel="stylesheet" href="css\main.css">
<link rel="stylesheet" href="css\2.css">
<link rel="stylesheet" href="css\aplikasi.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-brands/css/uicons-brands.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<script src="js\main.js"></script>
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

</head>
<body>

<?php require 'template/sidenav.php'; ?>


<div id="body">
 <?php require 'template/header.php'; ?>
  

<div class="aplikasi-siswa">
  <h1>Pengumuman Kelulusan Online</h1>
  <p>Masukkan NISN Anda untuk melihat surat kelulusan:</p>
  <div class="apk-container">
    <form method="POST" class="simple-form">
      <input type="text" name="nisn" class="text-input" placeholder="Masukkan NISN anda" required>
      <button type="submit" name="cetak" class="enter-btn">Lihat & Cetak PDF</button>
    </form>
  </div>
</div>



<?php require 'template/footer.php'; ?>
</body>
</html>




