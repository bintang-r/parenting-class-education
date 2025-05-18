<?php 
     session_start();
     if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['id_user'])) {
          header("Location: ../login.php");
          exit;
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="stylesheet" href="../../public/icons/css/all.css" />
     <link rel="icon" type="image/x-icon" href="../../public/favicon.ico">
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
          <header class="bg-white shadow px-4 py-4 flex justify-between items-center md:ml-0 ml-64">
               <h1 class="text-xl font-semibold">Beranda</h1>
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
               <!-- Cards -->
               <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
                         <div class="flex items-center justify-between">
                              <div>
                                   <h3 class="text-sm text-gray-500">Total Users</h3>
                                   <p class="text-2xl font-bold text-gray-800">1,250</p>
                              </div>
                              <i class="fas fa-users text-indigo-600 text-3xl"></i>
                         </div>
                    </div>

                    <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
                         <div class="flex items-center justify-between">
                              <div>
                                   <h3 class="text-sm text-gray-500">Monthly Visits</h3>
                                   <p class="text-2xl font-bold text-gray-800">8,430</p>
                              </div>
                              <i class="fas fa-chart-line text-indigo-600 text-3xl"></i>
                         </div>
                    </div>

                    <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
                         <div class="flex items-center justify-between">
                              <div>
                                   <h3 class="text-sm text-gray-500">Settings</h3>
                                   <p class="text-2xl font-bold text-gray-800">3 Active</p>
                              </div>
                              <i class="fas fa-cogs text-indigo-600 text-3xl"></i>
                         </div>
                    </div>
               </div>

               <!-- Welcome Section -->
               <div class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-2xl font-semibold mb-2">Welcome back, Admin!</h2>
                    <p class="text-gray-600">You are logged in to the Super Parenting dashboard. Monitor stats, manage users, and configure settings easily from here.</p>
               </div>
          </main>
     </div>
</div>

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
