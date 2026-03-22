<?php
include 'config.php';
include 'template/header.php';

$id = "";
$nama = "";
$angka = "";
$icon = "";

// 1. Logika EDIT: Mengambil data spesifik berdasarkan ID unik
if (isset($_GET['edit'])) {
    // Memastikan ID adalah angka (integer) agar tidak bentrok
    $id = (int)$_GET['edit']; 
    $sql = mysqli_query($conn, "SELECT * FROM data_sekolah WHERE id = '$id'");
    $data = mysqli_fetch_assoc($sql);
    
    if ($data) {
        $nama = $data['nama_lengkap'];
        $icon = $data['icon'];
        $angka = $data['angka'];
    }
}

?>

<?php
// 2. Logika Simpan (Tambah/Update)
if (isset($_POST['simpan'])) {
    // Pastikan koneksi $conn sudah ada di atas
    
    // Ambil data dan bersihkan (Sanitization)
    $id_lama     = $_POST['id_lama'];
    $icon_input  = mysqli_real_escape_string($conn, $_POST['icon']);
    $nama_input  = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    
    // Tips: Jika 'angka' berisi format seperti "2300+", pastikan input di database tipenya VARCHAR/TEXT
    // Jika tipenya INT, pastikan kamu hanya menyimpan angkanya saja.
    $angka_input = mysqli_real_escape_string($conn, $_POST['angka']);

    if (!empty($id_lama)) {
        // UPDATE data yang ID-nya terpilih saja
        $query = "UPDATE data_sekolah SET 
                    icon = '$icon_input', 
                    nama_lengkap = '$nama_input', 
                    angka = '$angka_input' 
                  WHERE id = '$id_lama'";
    } else {
        // INSERT data baru
        // Pastikan kolom 'id' di database sudah AUTO_INCREMENT agar tidak error lagi!
        $query = "INSERT INTO data_sekolah (icon, nama_lengkap, angka) 
                  VALUES ('$icon_input', '$nama_input', '$angka_input')";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data berhasil disimpan!'); 
                window.location='home.php'; 
              </script>";
    } else {
        // Menampilkan pesan error yang lebih spesifik jika gagal
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>

<div style="padding: 20px;">
    <h2><?= ($id != "") ? "Edit" : "Tambah"; ?> Data Sekolah</h2>

    <form action="" method="POST" style="background: #f9f9f9; padding: 20px; border-radius: 8px; border: 1px solid #ddd; max-width: 500px;">
        <input type="hidden" name="id_lama" value="<?= $id; ?>">

        <div style="margin-bottom: 15px;">
            <label>Icon (Nama File atau Class Icon):</label><br>
            <input type="text" name="icon" value="<?= $icon; ?>" required style="width: 100%; padding: 8px; margin-top: 5px;">
            <small style="color: #666;">Contoh: school.png atau fa-home</small>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Nama Lengkap:</label><br>
            <input type="text" name="nama_lengkap" value="<?= $nama; ?>" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label>Angka:</label><br>
            <input type="text" name="angka" value="<?= $angka; ?>" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        
        <button type="submit" name="simpan" style="background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
            Simpan Data
        </button>
        <a href="home.php" style="margin-left: 10px; text-decoration: none; color: #666;">Batal</a>
    </form>
</div>

<?php include 'template/footer.php'; ?>