<?php
// session_start() is not needed here if session is already started elsewhere

function get_gravatar_url($email, $size = 40) {
     $hash = md5(strtolower(trim($email)));
     return "https://www.gravatar.com/avatar/$hash?s=$size&d=identicon";
}

function header_component_dashboard() {
     // Pastikan session sudah dimulai
     if (session_status() === PHP_SESSION_NONE) {
          session_start();
     }

     require '../koneksi.php';

     $id_user = $_SESSION['id_user'] ?? null;
     $name = 'Admin';
     $email = '';
     if ($id_user && isset($conn)) {
          // Query user dari database
          $stmt = $conn->prepare("SELECT name, email FROM users WHERE id_user = ?");
          $stmt->bind_param("i", $id_user);
          $stmt->execute();
          $stmt->bind_result($name, $email);
          $stmt->fetch();
          $stmt->close();
     }
     $gravatar = get_gravatar_url($email);

     return '
          <header class="bg-white shadow px-4 py-4 flex justify-between items-center md:ml-0 ml-64">
               <h1 class="text-xl font-semibold">
                    <button id="hamburgerMenu" class="mr-2 flex flex-col justify-center items-center w-8 h-8 focus:outline-none md:hidden" onclick="toggleSidebar()">
                         <span class="block w-6 h-0.5 bg-gray-800 mb-1"></span>
                         <span class="block w-6 h-0.5 bg-gray-800 mb-1"></span>
                         <span class="block w-6 h-0.5 bg-gray-800"></span>
                    </button>
               </h1>
               <div class="relative flex items-center gap-2">
                    <span class="hidden sm:inline">'.htmlspecialchars($name).'</span>
                    <button id="userMenuButton" onclick="toggleUserMenu()" class="focus:outline-none">
                         <img src="'.htmlspecialchars($gravatar).'" alt="User" class="w-8 h-8 rounded-full border border-gray-300" />
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
     ';
}