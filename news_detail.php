<?php
include 'admin/config.php';
$id = intval($_GET['id']);
$q = mysqli_query($conn, "SELECT * FROM berita WHERE id = $id");
$b = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($b['judul']) ?> - SMAN 11 Bekasi</title>
  <link rel="stylesheet" href="css/2.css">
  <link rel="stylesheet" href="css/berita.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .news-detail-container {
      max-width: 900px;
      margin: 120px auto 60px;
      background: #fff;
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      font-family: 'Poppins', sans-serif;
    }

    .news-detail-container h2 {
      font-size: 28px;
      color: #1a1a1a;
      margin-bottom: 10px;
      line-height: 1.4;
    }

    .news-date {
      color: #777;
      font-size: 14px;
      margin-bottom: 25px;
      display: block;
    }

    .news-detail-container img {
      width: 100%;
      border-radius: 12px;
      margin-bottom: 25px;
      box-shadow: 0 3px 12px rgba(0,0,0,0.15);
    }

    .news-detail-container p {
      font-size: 16px;
      color: #333;
      line-height: 1.8;
      text-align: justify;
    }

    .back-button {
      display: inline-block;
      margin-top: 30px;
      background-color: #007bff;
      color: #fff;
      padding: 10px 18px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s;
    }

    .back-button:hover {
      background-color: #0056b3;
    }

    @media (max-width: 768px) {
      .news-detail-container {
        padding: 20px;
        margin: 100px 20px 40px;
      }
    }
  </style>
</head>
<body>

<html>
<head>
<title>SMA 11 Bekasi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<link rel="stylesheet" href="css\main.css">
<link rel="stylesheet" href="css\2.css">
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


  <div class="news-detail-container">
    <h2><?= htmlspecialchars($b['judul']) ?></h2>
    <span class="news-date"><i class="fa-regular fa-calendar"></i> <?= date('d F Y', strtotime($b['tanggal'])) ?></span>
    <img src="admin/upload/<?= htmlspecialchars($b['gambar']) ?>" alt="<?= htmlspecialchars($b['judul']) ?>">
    <p><?= nl2br($b['isi']) ?></p>

    <a href="beritautama.php" class="back-button"><i class="fa-solid fa-arrow-left"></i> Kembali ke Berita</a>
  </div>

<div class="logoPanit">
  <img class="fotoPanit" src="assets\LOGOPANIT.png">
</div>

  <?php require 'template/footer.php'; ?>
</body>
<script src="js\main.js"></script>
</html>