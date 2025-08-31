<?php
include '../database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

$sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
$result = $con->query($sql);
$mahasiswa = $result->fetch_assoc();

if (!$mahasiswa) {
    die("Mahasiswa tidak ditemukan.");
}
$page_title = "Edit Data Mahasiswa"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="../css/page.css">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header"><h1><?= $page_title; ?></h1></div>
        <div class="card-body">
            <form method="post" action="update_data.php">
                <input type="hidden" name="id" value="<?= ($mahasiswa['id']); ?>">
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim" minlength="1" maxlength="11" class="form-control" value="<?= ($mahasiswa['nim']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" minlength="1" maxlength="25" class="form-control" value="<?= ($mahasiswa['nama']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Umur</label>
                    <input type="number" name="umur" minlength="1" maxlength="3" class="form-control" value="<?= ($mahasiswa['umur']); ?>" required>
                </div>
                <div class="form-actions">
                    <a href="../main.php" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
        <div class="card-footer">Sistem Informasi Akademik</div>
    </div>
</div>
</body>
</html>
