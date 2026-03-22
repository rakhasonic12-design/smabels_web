<?php
require 'config.php';

$data = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nisn = trim($_POST['nisn'] ?? '');

  if ($nisn === '') {
    $error = "Silakan masukkan NISN terlebih dahulu.";
  } elseif (!ctype_digit($nisn)) {
    $error = "NISN harus berupa angka.";
  } else {
    $stmt = $pdo->prepare("SELECT * FROM siswa WHERE nisn = :nisn LIMIT 1");
    $stmt->execute(['nisn' => $nisn]);
    $data = $stmt->fetch();

    if (!$data) {
      $error = "Data dengan NISN <b>" . htmlspecialchars($nisn) . "</b> tidak ditemukan.";
    }
  }
}
?>


<head>
<title>SMA 11 Bekasi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/2.css">
<link rel="stylesheet" href="css/aplikasi.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-brands/css/uicons-brands.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<script src="js/main.js"></script>
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

</head>
<body>
<?php require 'template/sidenav.php'; ?>

<div id="body">
  <?php require 'template/header.php'; ?>

  <div class="aplikasi-siswa">
    <h1>Cek Data Peserta Didik</h1>
    <p>Masukkan NISN anda di bawah ini untuk melihat data lengkap siswa.</p>

    <div class="apk-container">
    <form class="simple-form" method="POST">
      <input class="text-input" type="text" name="nisn" placeholder="Masukkan NISN..." value="<?= htmlspecialchars($_POST['nisn'] ?? '') ?>" required>
      <button class="enter-btn" type="submit">Cari</button>
    </form>
</div>


  </div>

  <?php if ($error): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($data): ?>
      <div class="result">
       <div class="result-card">
        <h2>Data Siswa Ditemukan:</h2>
        <table>
          <tr><td>Nama Lengkap: </td><td><?= htmlspecialchars($data['nama_lengkap']) ?></td></tr>
          <tr><td>NISN: </td><td><?= htmlspecialchars($data['nisn']) ?></td></tr>
          <tr><td>Tempat Lahir: </td><td><?= htmlspecialchars($data['tempat_lahir']) ?></td></tr>
          <tr><td>Tanggal Lahir:  </td><td><?= htmlspecialchars($data['tanggal_lahir']) ?></td></tr>
          <tr><td>Alamat: </td><td><?= htmlspecialchars($data['alamat'] ?? '-') ?></td></tr>
          <tr><td>Tahun Masuk:  </td><td><?= htmlspecialchars($data['tahun_masuk'] ?? '-') ?></td></tr>
          <tr><td>Kelas/Angkatan: </td><td><?= htmlspecialchars($data['kelas_angkatan'] ?? '-') ?></td></tr>
        </table>
        </div>
      </div>
    <?php endif; ?>
</div>


<?php require 'template/footer.php'; ?>
</body>