<?php
include 'database.php'; 

// Ambil semua data mahasiswa
$sql = "SELECT * FROM mahasiswa";
$result = $con->query($sql);
$page_title = "Data Mahasiswa";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header"><h1><?= $page_title; ?></h1></div>
        <div class="card-body">
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success"><?= $_SESSION['success_message']; ?></div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>
            <a href="page/tambah_data.php" class="btn btn-info" style="margin-bottom: 1rem;">Tambah Data</a>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; while ($isi = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= ($isi['nim']); ?></td>
                            <td><?= ($isi['nama']); ?></td>
                            <td><?= ($isi['umur']); ?></td>
                            <td class="action-buttons" align="center">
                                <a href="page/detail_data.php?id=<?= $isi['id']; ?>" class="btn btn-success">Detail</a>
                                <a href="page/edit_data.php?id=<?= $isi['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="page/hapus_data.php?id=<?= $isi['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">Sistem Informasi Akademik Sederhana</div>
    </div>
</div>
</body>
</html>
<?php $con->close(); ?>
