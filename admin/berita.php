<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');

include 'config.php';
include 'template/header.php';

$berita = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
?>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Berita</h1>
    <a href="berita_add.php" class="btn btn-primary btn-sm shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Berita
    </a>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Berita</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
            <tr align="center">
              <th width="5%">No</th>
              <th>Judul</th>
              <th>Kategori</th>
              <th>Tanggal</th>
              <th width="15%">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          if(mysqli_num_rows($berita) > 0):
            $no = 1;
            while($b = mysqli_fetch_assoc($berita)):
          ?>
            <tr>
              <td align="center"><?= $no++; ?></td>
              <td><?= htmlspecialchars($b['judul']); ?></td>
              <td align="center">
                <span class="badge badge-info"><?= htmlspecialchars($b['kategori']); ?></span>
              </td>
              <td align="center"><?= date('d M Y', strtotime($b['tanggal'])); ?></td>
              <td align="center">
                <a href="berita_edit.php?id=<?= $b['id']; ?>" class="btn btn-sm btn-warning">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="berita_delete.php?id=<?= $b['id']; ?>" class="btn btn-sm btn-danger" 
                   onclick="return confirm('Yakin ingin menghapus berita ini?')">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php
            endwhile;
          else:
          ?>
            <tr>
              <td colspan="5" align="center">Belum ada berita.</td>
            </tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include 'template/footer.php'; ?>
