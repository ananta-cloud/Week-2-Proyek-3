<?php
include '../database.php';

// Cek jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    $stmt = $con->prepare("INSERT INTO mahasiswa (nim, nama, umur) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nim, $nama, $umur);
    
    
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Data mahasiswa berhasil ditambahkan.";
    } else {
        $_SESSION['error_message'] = "Gagal menambahkan data.";
    }
    header("Location: ../main.php");
    exit();
}

$page_title = "Tambah Data Mahasiswa";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="../css/page.css">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header"><h1><?= ($page_title); ?></h1></div>
        <div class="card-body">
            <form method="post" action="tambah_data.php">
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Umur</label>
                    <input type="number" name="umur" class="form-control" required>
                </div>
                <div class="form-actions">
                    <a href="../main.php" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Tambah Data</button>
                </div>
            </form>
        </div>
        <div class="card-footer">Sistem Informasi Akademik</div>
    </div>
</div>
</body>
</html>
