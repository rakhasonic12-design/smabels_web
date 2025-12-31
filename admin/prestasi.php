<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';
include 'template/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['jumlah'] as $id => $val) {
        $jumlah = intval($val);
        mysqli_query($conn, "UPDATE prestasi SET jumlah=$jumlah WHERE id=$id");
    }
    echo "<div class='alert alert-success'>Data prestasi berhasil diperbarui.</div>";
}

$res = mysqli_query($conn, "SELECT * FROM prestasi ORDER BY id ASC");
?>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Prestasi</h1>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Data Prestasi</h6>
    </div>
    <div class="card-body">
      <form method="post">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
            <tr align="center">
              <th>Kategori</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($p = mysqli_fetch_assoc($res)): ?>
            <tr align="center">
              <td><?= htmlspecialchars($p['kategori']); ?></td>
              <td>
                <input type="number" name="jumlah[<?= $p['id']; ?>]" 
                       value="<?= htmlspecialchars($p['jumlah']); ?>" 
                       class="form-control" min="0" required>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </form>
    </div>
  </div>
</div>

<?php include 'template/footer.php'; ?>
