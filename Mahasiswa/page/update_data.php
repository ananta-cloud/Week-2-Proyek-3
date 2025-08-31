<?php
include '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    // Cek apakah NIM baru sudah digunakan oleh mahasiswa lain
    $check_stmt = $con->prepare("SELECT id FROM mahasiswa WHERE nim = ? AND id != ?");
    $check_stmt->bind_param("si", $nim, $id);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        // KONDISI 1: DATA SUDAH ADA. Tampilkan popup JavaScript.
        $check_stmt->close();
        $message = "Gagal: NIM '" . htmlspecialchars($nim) . "' sudah digunakan. Kembali ke halaman edit?";
        echo "<script>
            if (confirm('" . addslashes($message) . "')) {
                window.location.href = 'edit_data.php?id=" . $id . "';
            } else {
                window.location.href = '../main.php';
            }
        </script>";
        exit();

    } else {
        // KONDISI 2: DATA AMAN. Lanjutkan proses UPDATE.
        $check_stmt->close();
        
        $stmt = $con->prepare("UPDATE mahasiswa SET nim = ?, nama = ?, umur = ? WHERE id = ?");
        $stmt->bind_param("ssii", $nim, $nama, $umur, $id);
        $stmt->close();
        header("Location: ../main.php");
        exit();
    }

} else {
    header("Location: ../main.php");
    exit();
}
?>