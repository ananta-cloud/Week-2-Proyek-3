<?php
include '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    $stmt = $con->prepare("UPDATE mahasiswa SET nim = ?, nama = ?, umur = ? WHERE id = ?");
    $stmt->bind_param("ssii", $nim, $nama, $umur, $id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Data mahasiswa berhasil diperbarui.";
    } else {
        $_SESSION['error_message'] = "Gagal memperbarui data.";
    }
    header("Location: ../main.php");
    exit();
}
?>
