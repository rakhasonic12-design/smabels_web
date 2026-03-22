<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => ['message' => 'Akses ditolak.']]);
    exit;
}

if(isset($_FILES['upload']) && $_FILES['upload']['error'] === UPLOAD_ERR_OK) {
    $file_name = $_FILES['upload']['name'];
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    
    if(!in_array($ext, $allowed)) {
        echo json_encode(['error' => ['message' => 'Format file tidak didukung.']]);
        exit;
    }

    $new_file_name = time() . '_' . rand(100, 999) . '.' . $ext;
    $target_path = __DIR__ . '/upload/' . $new_file_name;
    
    if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)) {
        // Mengembalikan URL agar gambar muncul di editor
        // Sesuaikan 'admin/uploads/' jika struktur folder Anda berbeda
        echo json_encode([
            'uploaded' => true,
            'url' => 'admin/upload/' . $new_file_name 
        ]);
    } else {
        echo json_encode(['error' => ['message' => 'Gagal upload ke server.']]);
    }
}

// Bagian akhir upload_aksi.php
if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)) {
    echo json_encode([
        'uploaded' => true,
        'url' => 'admin/upload/' . $new_file_name // Hapus 'admin/' jika file ini ada di dalam folder admin
    ]);
}
?>