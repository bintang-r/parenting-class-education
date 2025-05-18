<?php
include '../koneksi.php'; // Pastikan path file koneksi sesuai

if (isset($_GET['id'])) {
     $id = intval($_GET['id']);
     $query = "DELETE FROM users WHERE id_user = $id";
     $result = mysqli_query($conn, $query);

     if ($result) {
          echo "<script>alert('Data berhasil dihapus!'); window.location.href='pengguna.php';</script>";
     } else {
          echo "<script>alert('Gagal menghapus data.'); window.location.href='pengguna.php';</script>";
     }
} else {
     echo "ID tidak ditemukan.";
}
?>
