<?php
     function getDataPeserta(){
          require './koneksi.php';
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
     <link rel="stylesheet" href="../public/icons/css/all.css" />
     <title>Super Parenting | Peserta</title>
     <link rel="stylesheet" href="../public/styles/datatable.css">
     <link rel="icon" type="image/x-icon" href="../public/favicon.ico">
     
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
     <div class="flex h-screen overflow-hidden">

           <nav id="top" class="fixed top-0 left-0 w-full bg-white text-indigo-500 shadow-md z-50">
               <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                         <img src="../public/img/logo-super-parenting.png" alt="Logo" class="w-[40px]" />
                         <span class="text-xl font-bold">Super Parenting</span>
                    </div>

                    <!-- Hamburger Button (mobile only) -->
                    <div class="md:hidden">
                         <button id="hamburger" class="text-2xl focus:outline-none">
                         <i class="fas fa-bars"></i>
                         </button>
                    </div>

                    <!-- Menu -->
                    <ul id="nav-menu" class="hidden md:flex md:space-x-6 space-y-3 md:pb-3 pb-10 font-medium absolute md:static top-16 left-0 w-full md:w-auto bg-white md:bg-transparent p-5 md:p-0 shadow-md md:shadow-none flex-col md:flex-row md:items-center z-40">
                         <li>
                              <a href="#" id="back-link" class="bg-indigo-600 text-white px-4 py-2 mt-1 rounded hover:bg-indigo-700 flex items-center">
                                   <i class="fas fa-arrow-left mr-1"></i> Kembali Ke Menu Utama
                              </a>
                         </li>
                    </ul>
               </div>
          </nav>

          <main class="flex-1 overflow-y-auto p-6 md:ml-0 ml-64 mt-20">
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
                                   <th class="px-6 py-3 text-left font-semibold tracking-wider">Jenis Paket</th>
                                   <th class="px-6 py-3 text-left font-semibold tracking-wider">Status Verifikasi</th>
                              </tr>
                         </thead>
                         <tbody class="bg-white divide-y divide-gray-100">
                              <?php if (!empty($dataPeserta)): ?>
                                   <?php $no = 1; foreach($dataPeserta as $data): ?>
                                   <tr class="hover:bg-indigo-50 transition">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?= $no++; ?></td>
                                        <td class="px-6 py-4"><?= htmlspecialchars($data['nama']); ?></td>
                                        <td class="px-6 py-4"><?= htmlspecialchars($data['jenis_paket']); ?></td>
                                        <td class="px-6 py-4">
                                             <?php if ($data['status_verifikasi'] == 'sudah'): ?>
                                                  <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">Sudah</span>
                                             <?php else: ?>
                                                  <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs">Belum</span>
                                             <?php endif; ?>
                                        </td>
                                   </tr>
                                   <?php endforeach; ?>
                              <?php else: ?>
                                   <tr>
                                        <td colspan="10" class="px-6 py-4 text-center text-gray-500">Tidak ada data peserta.</td>
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

 <script>
     document.addEventListener("DOMContentLoaded", function() {
          var backLink = document.getElementById("back-link");
          if (backLink) {
                    backLink.addEventListener("click", function(e) {
                         e.preventDefault();
                         if (document.referrer) {
                              window.location.href = document.referrer;
                         } else {
                              window.location.href = "index.php#jadwal";
                         }
                    });
          }
     });
</script>

<script src="../public/icons/js/all.js"></script>
</body>
</html>
