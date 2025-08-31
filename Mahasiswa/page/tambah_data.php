<?php
include '../database.php';

// Cek jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    // Query untuk mengecek apakah NIM sudah ada
    $check_stmt = $con->prepare("SELECT nim FROM mahasiswa WHERE nim = ?");
    $check_stmt->bind_param("s", $nim);
    $check_stmt->execute();
    $check_stmt->store_result();

    // Cek jumlah baris yang ditemukan
    if ($check_stmt->num_rows > 0) {
        header("Location: tambah_data.php");
    } else {
        $stmt = $con->prepare("INSERT INTO mahasiswa (nim, nama, umur) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nim, $nama, $umur);
        
        if ($stmt->execute()) {
           header("Location: ../main.php");
        } else {
           header("Location: tambah_data.php");
        }
        $stmt->close();
    }
    $check_stmt->close();

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
                    <input type="text" name="nim" minlength="1" maxlength="11" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" minlength="1" maxlength="25" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Umur</label>
                    <input type="number" name="umur" minlength="1" maxlength="3" class="form-control" required>
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
