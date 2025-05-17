<?php 
     require_once './csrf.php';

     $csrf = getCsrfToken();

     function checkLogin() {
          if (session_status() === PHP_SESSION_NONE) {
               session_start();
          }
          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['id_user'])) {
               require_once 'koneksi.php';
               $id_user = $_SESSION['id_user'];
               $stmt = $conn->prepare("SELECT id_user FROM users WHERE id_user = ?");
               $stmt->bind_param("i", $id_user);
               $stmt->execute();
               $result = $stmt->get_result();
               if ($result->num_rows > 0) {
                    header("Location: ./dashboard/index.php");
                    exit;
               } else {
                    session_unset();
                    session_destroy();
               }
          }
     }

     checkLogin();

     function aksiLogin(){
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_login'])) {
               // Cek CSRF Token, harus sama dengan token di session
               if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                    echo "<script>alert('Token tidak valid. Silakan refresh halaman.');</script>";
                    return;
               }

               // Include koneksi
               require_once 'koneksi.php';

               if (!isset($conn) || !$conn) {
                    echo "<script>alert('Koneksi database gagal.');</script>";
                    return;
               }

               // Ambil data form
               $email = isset($_POST['email']) ? trim($_POST['email']) : '';
               $password = isset($_POST['password']) ? trim($_POST['password']) : '';

               if (empty($email) || strlen($email) < 2 || empty($password) || strlen($password) < 2) {
                    echo "<script>alert('Semua field wajib diisi dan minimal 2 karakter.');</script>";
                    return;
               }

               // Sanitasi input
               $email = htmlspecialchars($email);
               $password = htmlspecialchars($password);

               // Query cari user berdasarkan email
               $stmt = $conn->prepare("SELECT id_user, email, password FROM users WHERE email = ?");
               $stmt->bind_param("s", $email);
               $stmt->execute();
               $result = $stmt->get_result();

               if ($result->num_rows === 0) {
                    echo "<script>alert('Email tidak ditemukan.');</script>";
                    return;
               }

               $user = $result->fetch_assoc();

               // Verifikasi password (password hash di DB)
               if (password_verify($password, $user['password'])) {
                    // Password benar, buat session login
                    $_SESSION['id_user'] = $user['id_user'];
                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['logged_in'] = true;

                    echo "<script>alert('Login berhasil!');</script>";
                    // Redirect atau lakukan aksi lain
                    header("Location: " . './dashboard/index.php');
                    exit;
               } else {
                    echo "<script>alert('Password salah.');</script>";
                    return;
               }
          }
     }

     aksiLogin();

?>



<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
     <link rel="stylesheet" href="../public/icons/css/all.css" />
     <link rel="icon" type="image/x-icon" href="/uts-web/public/favicon.ico">
     
     <title>Super Parenting | Login</title>
</head>
<body class="bg-gradient-to-br from-indigo-500 to-purple-600 min-h-screen flex items-center justify-center">

     <div class="flex flex-col items-center">
          <div class="bg-white py-2 px-4 mb-3 rounded-xl">
               <div class="flex">
                    <img src="/uts-web/public/img/logo-super-parenting.png" class="w-[100px]" alt="">
                    <div class="pr-4 flex">
                         <h3 class="text-2xl text-indigo-600 font-bold my-auto">Super Parenting</h3>
                    </div>
               </div>
          </div>

          <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 mt-3" data-aos="fade-up">
               <div class="text-center mb-6">
                    <div class="flex flex-col items-center space-y-3">
                         <span class="text-3xl font-bold text-indigo-600">Masuk Ke Aplikasi</span>
                    </div>
                    <p class="text-gray-500">Masukkan data login anda, untuk kelola data admin.</p>
               </div>

               <form class="space-y-6" enctype="multipart/form-data"  method="POST" action="">
                    <input type="hidden" name="csrf_token" value="<?= $csrf ?>">

                    <div>
                         <label class="block text-gray-700 mb-1">Email</label>
                         <div class="flex items-center border rounded-xl px-3 py-2 focus-within:ring-2 focus-within:ring-indigo-400">
                              <i class="fas fa-envelope text-gray-400 mr-2"></i>
                              <input type="email" name="email" placeholder="you@example.com" required
                                   class="w-full outline-none bg-transparent text-gray-700 placeholder-gray-400" />
                         </div>
                    </div>

                    <div>
                         <label class="block text-gray-700 mb-1">Password</label>
                         <div class="flex items-center border rounded-xl px-3 py-2 focus-within:ring-2 focus-within:ring-indigo-400">
                              <i class="fas fa-lock text-gray-400 mr-2"></i>
                              <input type="password" name="password" placeholder="********" required
                                   class="w-full outline-none bg-transparent text-gray-700 placeholder-gray-400" />
                         </div>
                    </div>

                    <button type="submit"
                         name="submit_login"
                         class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-xl transition shadow-md font-semibold">
                         <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </button>
               </form>
          </div>
     </div>

     <script src="../public/icons/js/all.js"></script>

     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

     <script>
          AOS.init();
     </script>
</body>
</html>
