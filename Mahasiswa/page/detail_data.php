<?php
include '../database.php'; 

// Ambil ID dari URL, pastikan ada
$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

// Siapkan query untuk mengambil data berdasarkan ID
$sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
$result = $con->query($sql);
$mahasiswa = $result->fetch_assoc();

// Hentikan jika data tidak ditemukan
if (!$mahasiswa) {
    die("Mahasiswa dengan ID tersebut tidak ditemukan.");
}

$page_title = "Detail Mahasiswa: " . ($mahasiswa['nama']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
    <link rel="stylesheet" href="../css/page.css">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header"><h1><?= $page_title; ?></h1></div>
        <div class="card-body">
            <div class="detail-group">
                <label>NIM</label>
                <p><?= ($mahasiswa['nim']); ?></p>
            </div>
            <div class="detail-group">
                <label>Nama Lengkap</label>
                <p><?= ($mahasiswa['nama']); ?></p>
            </div>
            <div class="detail-group">
                <label>Umur</label>
                <p><?= ($mahasiswa['umur']); ?></p>
            </div>
            <div class="form-actions">
                 <a href="../main.php" class="btn btn-danger" style="flex: 1;">Kembali</a>
            </div>
        </div>
        <div class="card-footer">Sistem Informasi Akademik Sederhana</div>
    </div>
</div>
</body>
</html>
<?php $con->close(); ?>
