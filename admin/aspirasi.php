<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';


$query = mysqli_query($conn, "
  SELECT isi, COUNT(*) AS jumlah, MAX(tanggal) AS tanggal_terakhir
  FROM aspirasi
  GROUP BY TRIM(LOWER(isi))
  ORDER BY jumlah DESC, tanggal_terakhir DESC
");
?>

<?php
$jumlah_aspirasi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM aspirasi"))['total'];
?>
<div class="col-md-3 mb-4">
  <div class="card border-warning shadow-sm">
    <div class="card-body text-center">
      <h5 class="card-title text-warning">Kotak Aspirasi</h5>
      <h2><?= $jumlah_aspirasi ?></h2>
      <p class="card-text small text-muted">Aspirasi masuk</p>
      <a href="aspirasi.php" class="btn btn-sm btn-warning text-white">Lihat</a>
    </div>
  </div>
</div>


<h1 class="h3 mb-3">Kotak Aspirasi Digital</h1>

<table class="table table-bordered table-striped">
  <thead class="table-primary">
    <tr>
      <th width="50">No</th>
      <th>Isi Aspirasi</th>
      <th width="150">Jumlah Dikirim</th>
      <th width="200">Terakhir Dikirim</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    while($row = mysqli_fetch_assoc($query)):
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= nl2br(htmlspecialchars($row['isi'])) ?></td>
      <td><?= $row['jumlah'] ?>x</td>
      <td><?= date('d M Y H:i', strtotime($row['tanggal_terakhir'])) ?></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<?php include 'template/footer.php'; ?>
