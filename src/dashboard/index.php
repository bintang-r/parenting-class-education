     <?php 
          require_once '../components/header.php';
          require_once '../koneksi.php';
          
          session_start();
          if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['id_user'])) {
               header("Location: ../login.php");
               exit;
          }

          // Query total pengguna
          $totalPengguna = 0;
          $totalPeserta = 0;
          $totalPesertaSudah = 0;

          // Total pengguna
          $result = $conn->query("SELECT COUNT(*) as total FROM users");
          if ($row = $result->fetch_assoc()) {
               $totalPengguna = $row['total'];
          }

          // Total peserta seminar
          $result = $conn->query("SELECT COUNT(*) as total FROM peserta");
          if ($row = $result->fetch_assoc()) {
               $totalPeserta = $row['total'];
          }

          // Total peserta seminar sudah verifikasi
          $result = $conn->query("SELECT COUNT(*) as total FROM peserta WHERE status_verifikasi = 'sudah'");
          if ($row = $result->fetch_assoc()) {
               $totalPesertaSudah = $row['total'];
          }

          $dataMap = [];

          $result = $conn->query("
               SELECT DATE(created_at) as tanggal, 
                    COUNT(*) as total, 
                    SUM(status_verifikasi = 'sudah') as sudah_verifikasi, 
                    SUM(status_verifikasi != 'sudah') as belum_verifikasi
               FROM peserta
               WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 9 DAY)
               GROUP BY tanggal
          ");

          while ($row = $result->fetch_assoc()) {
               $dataMap[$row['tanggal']] = [
                    'total' => (int)$row['total'],
                    'sudah' => (int)$row['sudah_verifikasi'],
                    'belum' => (int)$row['belum_verifikasi']
               ];
          }

          $chartData = [];
          for ($i = 9; $i >= 0; $i--) {
               $tanggal = date('Y-m-d', strtotime("-$i days"));
               if (isset($dataMap[$tanggal])) {
                    $chartData[] = array_merge(['tanggal' => $tanggal], $dataMap[$tanggal]);
               } else {
                    $chartData[] = [
                         'tanggal' => $tanggal,
                         'total' => 0,
                         'sudah' => 0,
                         'belum' => 0
                    ];
               }
          }


          $conn->close();
     ?>

     <!DOCTYPE html>
     <html lang="en">
     <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <script src="https://cdn.tailwindcss.com"></script>
          <link rel="stylesheet" href="../../public/icons/css/all.css" />
          <link rel="icon" type="image/x-icon" href="../../public/favicon.ico">
          <link rel="stylesheet" href="../../public/styles/sidebar.css">
          <title>Super Parenting | Dashboard</title>
          <style>
               .sidebar-open {
                    transform: translateX(0%);
               }
               .sidebar-closed {
                    transform: translateX(-100%);
               }
          </style>
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
                    <!-- Cards -->
                    <div id="content" class="">
                         <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
                              <div class="flex items-center justify-between">
                                   <div>
                                        <h3 class="text-sm text-gray-500">Total Pengguna Admin</h3>
                                        <p class="text-2xl font-bold text-gray-800"><?= $totalPengguna ?></p>
                                   </div>
                                   <i class="fas fa-users text-green-600 text-3xl bg-green-200 p-5 rounded-md"></i>
                              </div>
                         </div>

                         <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
                              <div class="flex items-center justify-between">
                                   <div>
                                        <h3 class="text-sm text-gray-500">Total Anggota Seminar</h3>
                                        <p class="text-2xl font-bold text-gray-800"><?= $totalPeserta ?></p>
                                   </div>
                                   <i class="fas fa-chart-line text-blue-600 text-3xl bg-blue-200 p-5 rounded-md"></i>
                              </div>
                         </div>

                         <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
                              <div class="flex items-center justify-between">
                                   <div>
                                        <h3 class="text-sm text-gray-500">Peserta Seminar Sudah</h3>
                                        <p class="text-2xl font-bold text-gray-800"><?= $totalPesertaSudah ?></p>
                                   </div>
                                   <i class="fas fa-graduation-cap text-purple-600 text-3xl bg-purple-200 p-5 rounded-md"></i>
                              </div>
                         </div>
                    </div>

                    <!-- Welcome Section -->
                    <div class="bg-white p-6 rounded-xl shadow">
                         <h2 class="text-2xl font-semibold mb-2">Welcome back, Admin!</h2>
                         <p class="text-gray-600">You are logged in to the Super Parenting dashboard. Monitor stats, manage users, and configure settings easily from here.</p>
                    </div>

                    <div class="bg-white p-6 mt-6 rounded-xl shadow">
                         <h2 class="text-xl font-bold mb-4">Grafik Peserta Seminar (10 Hari Terakhir)</h2>
                         <div id="chart-bar"></div>
                    </div>
               </main>
          </div>
     </div>

     <script src="../../public/icons/js/all.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
     
     <script>
          const chartData = <?= json_encode($chartData); ?>;

          const categories = chartData.map(item => item.tanggal);
          const totalSeries = chartData.map(item => item.total);
          const sudahSeries = chartData.map(item => item.sudah);
          const belumSeries = chartData.map(item => item.belum);

          const options = {
               chart: {
                    height: 400,
                    type: 'bar',
                    stacked: false, // Bukan tumpukan
                    toolbar: {
                         show: true
                    }
               },
               plotOptions: {
                    bar: {
                         horizontal: false,
                         columnWidth: '40%', // Lebar bar
                         endingShape: 'rounded'
                    }
               },
               stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
               },
               series: [
                    {
                         name: 'Sudah Verifikasi',
                         data: sudahSeries
                    },
                    {
                         name: 'Belum Verifikasi',
                         data: belumSeries
                    },
                    {
                         name: 'Total Peserta',
                         data: totalSeries
                    }
               ],
               colors: ['#10b981', '#f59e0b', '#4f46e5'],
               xaxis: {
                    categories: categories
               },
               yaxis: {
                    title: {
                         text: 'Jumlah Peserta'
                    }
               },
               fill: {
                    opacity: 1
               },
               tooltip: {
                    y: {
                         formatter: function (val) {
                              return val + ' peserta';
                         }
                    }
               },
               legend: {
                    position: 'top'
               }
          };

          const chart = new ApexCharts(document.querySelector("#chart-bar"), options);
          chart.render();
     </script>


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

          // Responsive sidebar: hide by default on mobile, show on md+
          function handleSidebarOnResize() {
               if (window.innerWidth >= 768) {
                    sidebar.classList.add('sidebar-open');
                    sidebar.classList.remove('sidebar-closed');
                    overlay.classList.add('hidden');
               } else {
                    sidebar.classList.remove('sidebar-open');
                    sidebar.classList.add('sidebar-closed');
                    overlay.classList.add('hidden');
               }
          }

          // Call on load and resize
          window.addEventListener('resize', handleSidebarOnResize);
          window.addEventListener('DOMContentLoaded', handleSidebarOnResize);

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
