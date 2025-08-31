<?php
include '../database.php'; 
// Ambil keyword dari URL, pastikan tidak kosong
$keyword = $_GET['keyword'] ?? '';

// Jika keyword kosong, alihkan kembali ke halaman utama
if (empty(trim($keyword))) {
    header("Location: ../main.php");
    exit();
}
$searchTerm = "%" . $keyword . "%";
$stmt = $con->prepare("SELECT * FROM mahasiswa WHERE nama LIKE ? OR nim LIKE ?");
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$page_title = "Hasil Pencarian untuk: " . $keyword;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title; ?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header"><h4><?= $page_title; ?></h4></div>
        <div class="card-body">
            <a href="../main.php" class="btn btn-danger" style="margin-bottom: 1rem;">Kembali ke Daftar</a>

            <?php if ($result->num_rows > 0): ?>
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
                                <td><?= $isi['nim']; ?></td>
                                <td><?= $isi['nama']; ?></td>
                                <td><?= $isi['umur']; ?></td>
                                <td class="action-buttons">
                                    <a href="detail_data.php?id=<?= $isi['id']; ?>" class="btn btn-info">Detail</a>
                                    <a href="edit_data.php?id=<?= $isi['id']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="hapus_data.php?id=<?= $isi['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p style="text-align: center; margin-top: 1.5rem; font-size: 1.1rem;">
                    Tidak ada hasil yang ditemukan untuk "<strong><?= $keyword; ?></strong>".
                </p>
            <?php endif; ?>
        </div>
        <div class="card-footer">Sistem Informasi Akademik</div>
    </div>
</div>
</body>
</html>
<?php $con->close(); ?>
