<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';

$result = mysqli_query($conn, "SELECT * FROM agenda ORDER BY tanggal DESC");
?>
<h1 class="h3">Kelola Agenda</h1>
<a href="agenda_add.php" class="btn btn-success mb-3">Tambah Agenda</a>
<table class="table table-bordered">
  <thead><tr><th>No</th><th>Judul</th><th>Isi</th><th>Tanggal</th><th>Aksi</th></tr></thead>
  <tbody>
  <?php $no=1; while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($row['judul']) ?></td>
      <td><?= nl2br(htmlspecialchars(substr($row['isi'],0,150))) ?>...</td>
      <td><?= date('d M Y H:i', strtotime($row['tanggal'])) ?></td>
      <td>
        <a class="btn btn-sm btn-primary" href="agenda_edit.php?id=<?= $row['id'] ?>">Edit</a>
        <a class="btn btn-sm btn-danger" href="agenda_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus agenda?')">Hapus</a>
      </td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>
<?php include 'template/footer.php'; ?>
