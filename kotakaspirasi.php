
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

<div class="aspirasi-container">
  <div class="logo-aspirasi">
    <h1 class="blue">Kotak</h1>
    <h1 class="orange">Aspirasi Digital</h1>  
  </div>

  <div class="form-aspirasi">
    <div class="container">
    <form action="simpan_aspirasi.php" method="POST">
  <label for="fname">Nama Lengkap</label>
  <input type="text" id="fname" name="nama" placeholder="Your name..">

  <label for="role">Sebagai</label>
  <select id="role" name="role">
    <option value="Guru">Guru</option>
    <option value="Siswa">Siswa</option>
    <option value="OrangTua">Orang Tua</option>
    <option value="Masyarakat">Masyarakat</option>
  </select>

  <label for="subject">Ide, Kritik, dan Saran</label>
  <textarea id="subject" name="isi" placeholder="Tulis..." style="height:150px"></textarea>

  <input type="submit" value="Submit">
</form>

</div>
  </div>
</div>



<?php require 'template/footer.php'; ?>
</body>
</html>