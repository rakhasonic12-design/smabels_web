<?php
session_start();
if(!isset($_SESSION['admin'])) header('Location: login.php');
include 'config.php';

mysqli_query($conn, "DELETE FROM agenda WHERE tanggal < CURRENT_DATE()");
include 'template/header.php';

$result = mysqli_query($conn, "SELECT * FROM agenda ORDER BY tanggal DESC");
?>
<div style="padding: 20px;">
<h1 class="h3">Agenda Sekolah</h1>
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
</div>
<?php
$query = mysqli_query($conn, "SELECT * FROM data_sekolah");
?>

<<div style="padding: 20px;">
    <h2 class="h3 mb-3">Data Sekolah</h2>
    
    <a href="sekolah_add.php" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Tambah Data Baru
    </a>

    <table class="table table-bordered table-hover">
        <thead class="bg-light">
            <tr>
                <th width="50">ID</th>
                <th width="80" class="text-center">Icon</th>
                <th>Nama Lengkap</th>
                <th>Angka</th>
                <th width="160" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td class="text-center">
                    <?php if(!empty($row['icon'])): ?>
                        <img src="assets/img/icons/<?= htmlspecialchars($row['icon']); ?>" alt="icon" width="40" height="40" style="object-fit: contain;">
                    <?php else: ?>
                        <span class="text-muted small">No Icon</span>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                <td>
                    <strong>
                        <?php 
                            $raw = $row['angka'];
                            // Membersihkan karakter selain angka (kecuali desimal jika perlu)
                            $cleanNumber = (float) preg_replace('/[^0-9.]/', '', $raw);
                            echo number_format($cleanNumber, 0, ',', '.'); 
                            
                            if (strpos($raw, '+') !== false) echo '+'; 
                        ?>
                    </strong>
                </td>
                <td class="text-center">
                    <a class="btn btn-sm btn-primary" href="sekolah_add.php?edit=<?= $row['id']; ?>">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    
                    <a class="btn btn-sm btn-danger" 
                       href="sekolah_delete.php?hapus=<?= $row['id']; ?>" 
                       onclick="return confirm('Apakah Anda yakin ingin menghapus data [<?= htmlspecialchars($row['nama_lengkap']); ?>] ini?')">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php
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
    <h1 class="h3 mb-0 text-gray-800">Prestasi Sekolah</h1>
  </div>

  <div class="card shadow mb-2">
    <div class="card-body">
      <form method="post">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="text-white" style" style="background: #28a745">
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
        <button type="submit" class="btn btn-primary" style="background: #28a745">Simpan Perubahan</button>
      </form>
    </div>
  </div>
</div>
<?php include 'template/footer.php'; ?>
