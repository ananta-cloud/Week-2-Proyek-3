<?php
include '../database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

$stmt = $con->prepare("DELETE FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['success_message'] = "Data mahasiswa berhasil dihapus.";
} else {
    $_SESSION['error_message'] = "Gagal menghapus data.";
}
header("Location: ../main.php");
exit();
?>
