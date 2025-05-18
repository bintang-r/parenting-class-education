<?php 
require_once '../components/header.php';

session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['id_user'])) {
     header("Location: ../login.php");
     exit;
}

require_once '../csrf.php';
$csrf = getCsrfToken();

require_once '../koneksi.php';

// Tambahkan ini jika fungsi ada di file lain, misal: components.php

$user = [
     'nama' => '',
     'email' => ''
];

// Ambil id_user dari GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
     echo "<script>alert('ID pengguna tidak valid.');window.location.href='./pengguna.php';</script>";
     exit;
}
$id_user = intval($_GET['id']);

// Ambil data pengguna dari database
$stmt = mysqli_prepare($conn, "SELECT id_user, name, email FROM users WHERE id_user = ?");
mysqli_stmt_bind_param($stmt, "i", $id_user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($result)) {
     $user['nama'] = $row['name'];
     $user['email'] = $row['email'];
} else {
     echo "<script>alert('Pengguna tidak ditemukan.');window.location.href='./pengguna.php';</script>";
     exit;
}
mysqli_stmt_close($stmt);

function editPengguna($id_user, &$user, $conn) {
     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_tambah_pengguna'])) {
          // Validasi CSRF Token
          if (!isset($_POST['csrf_token'])) {
               echo "<script>alert('Token tidak valid. Silakan refresh halaman.');</script>";
               return;
          }

          $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
          $email = isset($_POST['email']) ? trim($_POST['email']) : '';
          $password = isset($_POST['password']) ? trim($_POST['password']) : '';

          // Validasi wajib isi dan minimal 2 karakter
          if (
               empty($nama) || strlen($nama) < 2 ||
               empty($email) || strlen($email) < 2
          ) {
               echo "<script>alert('Nama dan email wajib diisi dan minimal 2 karakter.');</script>";
               return;
          }

          $nama = htmlspecialchars($nama);
          $email = htmlspecialchars($email);

          if (!empty($password)) {
               if (strlen($password) < 2) {
                    echo "<script>alert('Password minimal 2 karakter.');</script>";
                    return;
               }
               $password_hash = password_hash($password, PASSWORD_DEFAULT);
               $stmt = mysqli_prepare($conn, "UPDATE users SET name=?, email=?, password=? WHERE id_user=?");
               mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $password_hash, $id_user);
          } else {
               $stmt = mysqli_prepare($conn, "UPDATE users SET name=?, email=? WHERE id_user=?");
               mysqli_stmt_bind_param($stmt, "ssi", $nama, $email, $id_user);
          }

          if (mysqli_stmt_execute($stmt)) {
               echo "<script>alert('Data pengguna berhasil diupdate.');window.location.href='./pengguna.php';</script>";
               exit;
          } else {
               echo "<script>alert('Update gagal: " . mysqli_error($conn) . "');</script>";
          }
          mysqli_stmt_close($stmt);
     }
}

editPengguna($id_user, $user, $conn);
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="../../public/icons/css/all.css" />
     <title>Super Parenting | Edit Pengguna</title>
     <link rel="stylesheet" href="../../public/styles/datatable.css">
     <link rel="stylesheet" href="../../public/styles/sidebar.css">
     
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
     <div class="flex h-screen overflow-hidden">

     <!-- Sidebar -->
     <div id="sidebar" class="fixed z-40 inset-y-0 left-0 w-64 bg-indigo-700 text-white transform sidebar-closed transition-transform duration-300 ease-in-out md:relative md:translate-x-0 md:sidebar-open">
          <div class="p-5 border bg-white text-indigo-800 flex space-x-3">
               <img src="../../public/img/logo-super-parenting.png" class="w-[50px]" alt="logo-super-parenting">
               <h2 class="text-xl font-bold align-self-center pt-2">Super Parenting</h2>
          </div>

          <nav class="mt-4 space-y-1">
               <a href="./index.php" class="flex items-center px-4 py-2 hover:bg-indigo-600">
                    <i class="fas fa-tachometer-alt mr-3"></i> Beranda
               </a>
               <a href="./pengguna.php" class="flex items-center px-4 py-2 hover:bg-indigo-600">
                    <i class="fas fa-users mr-3"></i> Pengguna
               </a>
               <a href="./peserta-seminar.php" class="flex items-center px-4 py-2 hover:bg-indigo-600">
                    <i class="fas fa-user-graduate mr-3"></i> Peserta Seminar
               </a>
          </nav>
     </div>

     <!-- Overlay for mobile -->
     <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 hidden z-30 md:hidden" onclick="toggleSidebar()"></div>

     <!-- Main content -->
     <div class="flex-1 flex flex-col w-0">

          <!-- Header -->
          <?= header_component_dashboard(); ?>

          <!-- Content -->
          <main class="flex-1 overflow-y-auto p-6 md:ml-0 ml-64">
               <!-- Pretitle -->
               <div class="mb-2 text-sm text-gray-500 uppercase tracking-wide">Pengguna Admin</div>
               <!-- Title -->
               <h2 class="text-2xl font-bold mb-6">Edit Data Pengguna Admin</h2>

               <a href="pengguna.php" class="inline-flex items-center mb-6 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
               </a>

               <form action="" method="POST" class="bg-white rounded shadow p-6 max-w-lg">
                    <input type="hidden" name="csrf_token" value="<?= $csrf ?>">

                    <div class="mb-4">
                         <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                         <input type="text" id="nama" name="nama" placeholder="Sunting nama akun" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required value="<?php echo isset($user['nama']) ? htmlspecialchars($user['nama']) : ''; ?>">
                    </div>
                    <div class="mb-4">
                         <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                         <input type="email" id="email" name="email" placeholder="Sunting email akun" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required value="<?php echo isset($user['email']) ? htmlspecialchars($user['email']) : ''; ?>">
                    </div>
                    <div class="mb-6">
                         <label for="password" class="block text-gray-700 font-semibold mb-2">Password (Kosongkan jika tidak ingin mengubah)</label>
                         <input type="password" id="password" name="password" placeholder="Sunting password akun" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="flex justify-end">
                         <button type="submit" name="submit_tambah_pengguna" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">Simpan Perubahan</button>
                    </div>
               </form>
          </main>
     </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>

<script>
     if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
          const dataTable = new simpleDatatables.DataTable("#search-table", {
               searchable: true,
               sortable: false
          });
     }
</script>

<script src="../../public/icons/js/all.js"></script>

<script>
     function toggleUserMenu() {
          const dropdown = document.getElementById('userDropdown');
          dropdown.classList.toggle('hidden');
          // Close dropdown when clicking outside
          document.addEventListener('click', function handler(e) {
               if (!dropdown.contains(e.target) && !document.getElementById('userMenuButton').contains(e.target)) {
                    dropdown.classList.add('hidden');
                    document.removeEventListener('click', handler);
               }
          });
     }
</script>

<script>
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

function toggleSidebar() {
     const isOpen = sidebar.classList.contains('sidebar-open');

     if (isOpen) {
     sidebar.classList.remove('sidebar-open');
     sidebar.classList.add('sidebar-closed');
     overlay.classList.add('hidden');
     } else {
     sidebar.classList.remove('sidebar-closed');
     sidebar.classList.add('sidebar-open');
     overlay.classList.remove('hidden');
     }
}
</script>
</body>
</html>