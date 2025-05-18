<?php
include '../koneksi.php'; // Pastikan path file koneksi sesuai

if (isset($_GET['id'])) {
     $id = intval($_GET['id']);
     $query = "UPDATE peserta SET status_verifikasi = 'sudah' WHERE id_peserta = $id";
     $result = mysqli_query($conn, $query);

     if ($result) {
          echo "<script>alert('Verifikasi berhasil!'); window.location.href='peserta-seminar.php';</script>";
     } else {
          echo "<script>alert('Verifikasi gagal.'); window.location.href='peserta-seminar.php';</script>";
     }
} else {
     echo "ID tidak ditemukan.";
}
?>