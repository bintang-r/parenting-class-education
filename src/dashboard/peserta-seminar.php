<?php
     session_start();
     if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['id_user'])) {
          header("Location: ../login.php");
          exit;
     }

     function getDataPeserta(){
          require_once '../koneksi.php';
          if (!isset($conn) || !$conn) {
               echo "<script>alert('Koneksi database gagal.');</script>";
               return;
          }

          $stm = $conn->prepare("SELECT * FROM peserta");
          $stm->execute();
          $result = $stm->get_result();
          $users = [];
          if ($result) {
               while ($row = $result->fetch_assoc()) {
                    $users[] = $row;
               }
          }
          return $users;
     }

     $dataPeserta = getDataPeserta();
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="../../public/icons/css/all.css" />
     <title>Super Parenting | Pengguna</title>
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
          <header class="bg-white shadow px-4 py-4 flex justify-between items-center md:ml-0 ml-64">
               <h1 class="text-xl font-semibold">Peserta Seminar</h1>
               <div class="relative flex items-center gap-2">
                    <span class="hidden sm:inline">Admin</span>
                    <button id="userMenuButton" onclick="toggleUserMenu()" class="focus:outline-none">
                         <i class="fas fa-user-circle text-2xl text-gray-700"></i>
                    </button>
                    <div id="userDropdown" class="absolute right-0 mt-[100px] w-[200px] bg-white rounded shadow-lg py-2 z-50 hidden">
                         <a href="./logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                              <i class="fas fa-sign-out-alt mr-2"></i> Logout
                         </a>
                         <a href="../index.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                              <i class="fas fa-home mr-2"></i> Halaman Beranda
                         </a>
                    </div>
               </div>
          </header>

          <!-- Content -->
          <main class="flex-1 overflow-y-auto p-6 md:ml-0 ml-64">
               <!-- Pretitle -->
               <div class="mb-2 text-sm text-gray-500 uppercase tracking-wide">Peserta Seminar</div>
               <!-- Title -->
               <h2 class="text-2xl font-bold mb-6">Daftar Peserta Seminar</h2>

               <div class="overflow-x-auto rounded-lg shadow-lg bg-white">
                    <table id="search-table" class="min-w-full divide-y divide-gray-200 text-sm">
                         <thead class="bg-indigo-700 text-white">
                              <tr>
                                   <th class="px-6 py-3 text-left font-semibold tracking-wider">#</th>
                                   <th class="px-6 py-3 text-left font-semibold tracking-wider">Nama</th>
                                   <th class="px-6 py-3 text-left font-semibold tracking-wider">Nomor Ponsel</th>
                                   <th class="px-6 py-3 text-left font-semibold tracking-wider">Email</th>
                                   <th class="px-6 py-3 text-left font-semibold tracking-wider">Nama</th>
                                   <th class="px-6 py-3 text-left font-semibold tracking-wider">Jenis Paket</th>
                                   <th class="px-6 py-3 text-left font-semibold tracking-wider">Bukti Pembayaran</th>
                                   <th class="px-6 py-3 text-left font-semibold tracking-wider">Status Verifikasi</th>
                                   <th class="px-6 py-3 text-left font-semibold tracking-wider">Aksi</th>
                              </tr>
                         </thead>
                         <tbody class="bg-white divide-y divide-gray-100">
                              <?php if (!empty($dataPeserta)): ?>
                                   <?php $no = 1; foreach($dataPeserta as $data): ?>
                                   <tr class="hover:bg-indigo-50 transition">
                                             <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?= $no++; ?></td>
                                             <td class="px-6 py-4"><?= htmlspecialchars($data['nama']); ?></td>
                                             <td class="px-6 py-4"><?= htmlspecialchars($data['nomor_ponsel']); ?></td>
                                             <td class="px-6 py-4"><?= htmlspecialchars($data['email']); ?></td>
                                             <td class="px-6 py-4"><?= htmlspecialchars($data['nama']); ?></td>
                                             <td class="px-6 py-4"><?= htmlspecialchars($data['jenis_paket']); ?></td>
                                             <td class="px-6 py-4">
                                                  <?php if (!empty($data['bukti_pembayaran'])): ?>
                                                       <a href="../../<?= htmlspecialchars($data['bukti_pembayaran']); ?>" target="_blank" class="text-blue-600 hover:underline">Lihat Bukti</a>
                                                  <?php else: ?>
                                                       <span class="text-gray-400">Belum Upload</span>
                                                  <?php endif; ?>
                                             </td>
                                             <td class="px-6 py-4">
                                                  <?php if ($data['status_verifikasi'] == 'Terverifikasi'): ?>
                                                       <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">Terverifikasi</span>
                                                  <?php else: ?>
                                                       <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs">Belum Diverifikasi</span>
                                                  <?php endif; ?>
                                             </td>
                                             <td class="px-6 py-4">
                                                  <a href="verifikasi-peserta-seminar.php?id=<?= $data['id_peserta']; ?>" class="text-green-600 hover:underline mr-2">Verifikasi</a>
                                                  <a href="hapus-peserta-seminar.php?id=<?= $data['id_peserta']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus peserta ini?')">Hapus</a>
                                             </td>
                                   </tr>
                                   <?php endforeach; ?>
                              <?php else: ?>
                                   <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada data peserta.</td>
                                   </tr>
                              <?php endif; ?>
                         </tbody>
                    </table>
               </div>
          </main>
     </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3/dist/umd/simple-datatables.js"></script>

<script>
     document.addEventListener("DOMContentLoaded", function() {
          if (document.getElementById("search-table") && typeof simpleDatatables !== 'undefined' && typeof simpleDatatables.DataTable !== 'undefined') {
               const dataTable = new simpleDatatables.DataTable("#search-table", {
                    searchable: true,
                    sortable: false
               });
          }
     });
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
