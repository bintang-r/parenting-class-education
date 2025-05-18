<?php

require_once '../koneksi.php'; // Pastikan path ke file koneksi benar

if (isset($_GET['id'])) {
     $id = intval($_GET['id']);

     // Query hapus peserta berdasarkan ID
     $stmt = $conn->prepare("DELETE FROM peserta WHERE id_peserta = ?");
     $stmt->bind_param("i", $id);

     if ($stmt->execute()) {
          echo "<script>alert('Peserta berhasil dihapus!'); window.location.href='peserta-seminar.php';</script>";
          exit();
     } else {
          echo "Gagal menghapus peserta.";
     }

     $stmt->close();
} else {
     echo "ID peserta tidak ditemukan.";
}

?>
