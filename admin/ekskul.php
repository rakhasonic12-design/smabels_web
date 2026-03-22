<?php
include 'config.php'; 
include 'template/header.php';

// --- LOGIKA EDIT (AMBIL DATA LAMA) ---
$data_edit = null;
if (isset($_GET['edit'])) {
    $id_edit = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM ekskul WHERE id='$id_edit'");
    $data_edit = mysqli_fetch_assoc($result);
}

// --- LOGIKA SIMPAN (TAMBAH & UPDATE) ---
if (isset($_POST['simpan'])) {
    $id             = $_POST['id']; // Ambil ID jika ada
    $nama           = mysqli_real_escape_string($conn, $_POST['nama']);
    $deskripsi      = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $badge          = mysqli_real_escape_string($conn, $_POST['badge']);
    $link_gabung    = mysqli_real_escape_string($conn, $_POST['link_gabung']);
    $jumlah_anggota = mysqli_real_escape_string($conn, $_POST['jumlah_anggota']);

    $foto_name = $_FILES['foto']['name'];
    $tmp_name  = $_FILES['foto']['tmp_name'];

    if (!empty($foto_name)) {
        // Jika upload foto baru
        $ekstensi = pathinfo($foto_name, PATHINFO_EXTENSION);
        $nama_foto_baru = time() . '_' . $nama . '.' . $ekstensi;
        move_uploaded_file($tmp_name, "assets/" . $nama_foto_baru);
        $foto_query = $nama_foto_baru;
    } else {
        // Jika tidak upload foto baru, pakai foto lama
        $foto_query = $_POST['foto_lama'];
    }

    if ($id) {
        // UPDATE DATA
        $query = "UPDATE ekskul SET 
                  nama='$nama', deskripsi='$deskripsi', badge='$badge', 
                  link_gabung='$link_gabung', jumlah_anggota='$jumlah_anggota', foto='$foto_query' 
                  WHERE id='$id'";
    } else {
        // INSERT DATA
        $query = "INSERT INTO ekskul (nama, deskripsi, badge, link_gabung, jumlah_anggota, foto) 
                  VALUES ('$nama', '$deskripsi', '$badge', '$link_gabung', '$jumlah_anggota', '$foto_query')";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Berhasil disimpan!'); window.location='ekskul.php';</script>";
    }
}

// --- LOGIKA HAPUS ---
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $cek_foto = mysqli_query($conn, "SELECT foto FROM ekskul WHERE id='$id'");
    $row = mysqli_fetch_assoc($cek_foto);
    if ($row && file_exists("uploads/" . $row['foto'])) {
        unlink("assets/" . $row['foto']);
    }
    mysqli_query($conn, "DELETE FROM ekskul WHERE id='$id'");
    echo "<script>alert('Data dihapus!'); window.location='ekskul.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        .container { max-width: 1000px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-family: sans-serif; }
        form { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 30px; padding: 20px; border: 2px solid #2ecc71; border-radius: 8px; }
        form h2 { grid-column: span 2; margin-top: 0; color: #27ae60; }
        input, textarea, button { padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        textarea { grid-column: span 2; height: 80px; }
        .btn-save { grid-column: span 2; background: #2ecc71; color: white; border: none; cursor: pointer; font-weight: bold; }
        .btn-cancel { grid-column: span 2; background: #95a5a6; color: white; text-align: center; text-decoration: none; padding: 10px; border-radius: 4px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #eee; text-align: left; }
        th { background: #f8f9fa; }
        .img-preview { width: 80px; height: 50px; object-fit: cover; border-radius: 4px; }
        .btn-edit { color: #3498db; text-decoration: none; font-weight: bold; margin-right: 10px; }
        .btn-delete { color: #e74c3c; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        <h2><?= $data_edit ? 'Edit' : 'Tambah' ?> Ekstrakurikuler</h2>
        
        <input type="hidden" name="id" value="<?= $data_edit['id'] ?? '' ?>">
        <input type="hidden" name="foto_lama" value="<?= $data_edit['foto'] ?? '' ?>">

        <input type="text" name="nama" placeholder="Nama Ekskul" value="<?= $data_edit['nama'] ?? '' ?>" required>
        <input type="text" name="badge" placeholder="Badge (Wajib/Pilihan)" value="<?= $data_edit['badge'] ?? '' ?>">
        <input type="text" name="link_gabung" placeholder="Link Gabung" value="<?= $data_edit['link_gabung'] ?? '' ?>" required>
        <input type="text" name="jumlah_anggota" placeholder="Jumlah Anggota" value="<?= $data_edit['jumlah_anggota'] ?? '' ?>">
        <textarea name="deskripsi" placeholder="Deskripsi Singkat" required><?= $data_edit['deskripsi'] ?? '' ?></textarea>
        
        <div style="grid-column: span 2;">
            <label>Foto <?= $data_edit ? '(Kosongkan jika tidak ingin ganti)' : '' ?>:</label><br>
            <input type="file" name="foto" accept="image/*" <?= $data_edit ? '' : 'required' ?>>
        </div>

        <button type="submit" name="simpan" class="btn-save">
            <?= $data_edit ? 'Simpan Perubahan' : 'Tambah Ekskul' ?>
        </button>
        
        <?php if ($data_edit): ?>
            <a href="ekskul.php" class="btn-cancel">Batal Edit</a>
        <?php endif; ?>
    </form>

    <hr>

    <h2>Daftar Ekskul</h2>
    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Badge</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_tampil = mysqli_query($conn, "SELECT * FROM ekskul ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($query_tampil)) :
            ?>
            <tr>
                <td><img src="uploads/<?= $row['foto']; ?>" class="img-preview"></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['badge']; ?></td>
                <td>
                    <a href="?edit=<?= $row['id']; ?>" class="btn-edit">Edit</a>
                    <a href="?hapus=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>