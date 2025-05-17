<!DOCTYPE html>
<html lang="id">
     <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>Super Parenting</title>
          <script src="https://cdn.tailwindcss.com"></script>
          <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
          <link rel="stylesheet" href="../public/icons/css/all.css">

          <style>
               html {
                    scroll-behavior: smooth;
               }
               body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
               }
          </style>

          <style>
               /* Tambahan jika mau override css */
               #uploadArea:focus-within {
                    outline: none;
                    border-color: #4f46e5; /* indigo-600 */
                    background-color: #eef2ff; /* indigo-50 */
               }
          </style>
     </head>

     <body class="bg-gray-50 text-gray-800">
          <!-- Back to Top -->
          <a href="#top" class="fixed bottom-5 right-5 z-50 bg-indigo-600 text-white p-3 rounded-full shadow-lg hover:bg-indigo-700 transition-all duration-300 px-5 py-3">
          <i class="fas fa-arrow-up"></i>
          </a>

          <!-- Navbar -->
          <nav id="top" class="fixed top-0 left-0 w-full bg-white text-indigo-600 shadow-md z-50">
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
                              <a href="#tentang" class="hover:text-indigo-400 flex items-center py-2 md:pt-4"><i class="fas fa-info-circle mr-1"></i> Tentang</a>
                         </li>
                         
                         <li>
                              <a href="#jadwal" class="hover:text-indigo-400 flex items-center py-2"><i class="fas fa-calendar-alt mr-1"></i> Jadwal</a>
                         </li>
                         
                         <li>
                              <a href="#investasi" class="hover:text-indigo-400 flex items-center py-2"><i class="fas fa-hand-holding-usd mr-1"></i> Investasi</a>
                         </li>
                         
                         <li>
                              <a href="#testimoni" class="hover:text-indigo-400 flex items-center py-2"><i class="fas fa-comment-dots mr-1"></i> Testimoni</a>
                         </li>

                         <li>
                              <a href="#daftar" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 flex items-center"><i class="fas fa-edit mr-1"></i> Daftar</a>
                         </li>
                    </ul>
               </div>
          </nav>

          <!-- Hero -->
          <section class="pt-36 pb-20 bg-white px-4 md:px-0">
               <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-8">

                    <div class="text-center md:text-left max-w-xl" data-aos="fade-right">
                         <h1 class="md:text-5xl text-3xl font-bold leading-tight mb-4 text-indigo-800">Super Parenting</h1>
                         
                         <p class="text-xl mb-6 text-gray-700">Menjadi Orang Tua Hebat di Era Digital bersama dr. Aisah Dahlan</p>

                         <div class="space-x-3 mt-10">
                              <a href="#daftar" class="bg-indigo-600 text-white md:px-6 md:py-3 px-3 py-2 md:text-md text-sm rounded-md font-semibold hover:bg-indigo-700 transition"><i class="fas fa-calendar-check mr-2"></i>Daftar Sekarang</a>

                              <a href="#tentang" class="text-indigo-600 font-semibold md:px-6 md:py-3 px-3 py-2 bg-white rounded-md border border-indigo-600 hover:bg-indigo-50 md:text-md text-sm hover:border-indigo-800 transition">Pelajari Lebih Lanjut</a>
                         </div>
                    </div>

                    <div data-aos="fade-left ml-5" class="md:block hidden">
                         <img src="../public/img/illustration2.jpg" alt="Hero" class="w-[500px]" />
                    </div>
               </div>                                                                     
          </section>

          <!-- Tentang -->
          <section id="tentang" class="py-20 px-6 max-w-5xl mx-auto" data-aos="fade-up">
               <h2 class="text-4xl font-bold mb-10 text-center text-gray-800 tracking-wide">
               Tentang <span class="text-indigo-500">Seminar</span>
               </h2>

               <div class="bg-gradient-to-r from-blue-500 to-indigo-800 rounded-2xl p-10 text-center border border-indigo-100">
                    <p class="text-lg text-white leading-relaxed">
                         Seminar ini dirancang khusus bagi para orang tua yang ingin lebih bijak dan sigap menghadapi tantangan era digital
                         bersama anak-anak tercinta. Dipandu oleh narasumber inspiratif, Anda akan mendapatkan wawasan mendalam, strategi
                         parenting kekinian, dan tips praktis untuk membangun hubungan keluarga yang harmonis dan adaptif di zaman teknologi.
                    </p>
               </div>
          </section>

          <!-- Jadwal -->
          <section id="jadwal" class="py-20 bg-gradient-to-r from-blue-500 to-indigo-800 rounded-3xl" data-aos="fade-up">
               <div class="max-w-5xl mx-auto px-6">
                    <h2 class="text-3xl font-bold text-center text-white mb-12">Jadwal Acara</h2>
                    <div class="grid md:grid-cols-3 gap-6 text-center">

                         <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                              <div class="text-indigo-600 text-4xl mb-4"><i class="fas fa-calendar-day"></i></div>

                              <h4 class="font-semibold text-xl mb-2">Hari / Tanggal</h4>
                              <p class="text-gray-600">Sabtu, 31 Mei 2025</p>
                         </div>

                         <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                              <div class="text-indigo-600 text-4xl mb-4"><i class="fas fa-clock"></i></div>
                              <h4 class="font-semibold text-xl mb-2">Waktu</h4>
                              <p class="text-gray-600">08.00 – 12.00 WITA</p>
                         </div>

                         <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                              <div class="text-indigo-600 text-4xl mb-4"><i class="fas fa-map-marker-alt"></i></div>
                              <h4 class="font-semibold text-xl mb-2">Tempat</h4>
                              <p class="text-gray-600">Ruang Phinisi, Hotel Claro Makassar</p>
                         </div>
                    </div>
               </div>
          </section>

          <!-- Investasi -->
          <section id="investasi" class="py-16 px-6" data-aos="fade-up">
               <div class="max-w-6xl mx-auto">
                    <h2 class="text-3xl font-semibold mb-8 text-center">Pilihan Investasi</h2>
                    <div class="grid md:grid-cols-3 gap-6">
                         <div class="bg-yellow-50 border-yellow-200 border rounded-xl shadow-lg p-6 text-center hover:shadow-xl">
                              <h3 class="text-xl font-bold mb-2 text-yellow-700"><i class="fas fa-user mr-2"></i>Bronze</h3>
                              <p class="text-yellow-800">Rp300.000/orang</p>
                              <p class="text-sm text-yellow-700">Lunch box</p>
                         </div>

                         <div class="bg-gray-100 border-gray-300 border rounded-xl shadow-lg p-6 text-center hover:shadow-xl">
                              <h3 class="text-xl font-bold mb-2 text-gray-800"><i class="fas fa-star mr-2"></i>Gold</h3>
                              <p class="text-gray-800">Rp500.000/orang</p>
                              <p class="text-sm text-gray-600">Lunch box & Merchandise</p>
                         </div>

                         <div class="bg-indigo-50 border-indigo-200 border rounded-xl shadow-lg p-6 text-center hover:shadow-xl">
                              <h3 class="text-xl font-bold mb-2 text-indigo-700"><i class="fas fa-crown mr-2"></i>Platinum</h3>
                              <p class="text-indigo-800">Rp1.000.000/orang</p>
                              <p class="text-sm text-indigo-700">Lunch bersama narasumber, merchandise eksklusif, buku, foto bersama</p>
                         </div>
                    </div>
               </div>
          </section>

          <section id="kontak" class="py-20 bg-gradient-to-r from-blue-500 to-indigo-800 rounded-3xl" data-aos="fade-up">
               <div class="max-w-6xl mx-auto px-6">
                    <h2 class="text-3xl font-bold text-center mb-20 text-white">Kontak Kami</h2>

                    <div class="grid md:grid-cols-2 gap-8 text-white">
                         <div class="space-y-4">
                              <p class="text-lg flex items-center font-bold text-xl"><i class="fas fa-envelope text-white mr-3"></i> info@superparenting.id</p>
                              <p class="text-lg flex items-center font-bold text-xl"><i class="fas fa-phone text-white mr-3"></i> +62 812-3456-7890</p>
                              <p class="text-lg flex items-center font-bold text-xl"><i class="fab fa-whatsapp text-white mr-3"></i> +62 812-9999-9999</p>
                              <p class="text-lg flex items-center font-bold text-xl"><i class="fas fa-map-marker-alt text-white mr-3"></i> Ruang Phinisi, Hotel Claro Makassar</p>
                         </div>

                         <div class="overflow-hidden rounded-lg shadow-lg">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.910087281626!2d119.43657247500746!3d-5.148435352217339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1e3ad18ad09d%3A0xb5e02a67f760d06!2sHotel%20Claro%20Makassar!5e0!3m2!1sid!2sid!4v1715900000000!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                         </div>
                    </div>
               </div>
          </section>


          <!-- Testimoni -->
          <section id="testimoni" class="py-16 bg-gray-100 px-6" data-aos="fade-up">
          <div class="max-w-6xl mx-auto">
               <h2 class="text-3xl font-semibold text-center mb-10">Apa Kata Mereka?</h2>
               <div class="grid md:grid-cols-3 gap-6">
               <div class="bg-white p-6 rounded-lg shadow text-center">
                    <img src="../public/img/no-user.png" class="rounded-full mx-auto mb-4 w-[100px]" />
                    <p class="italic">"Sangat mencerahkan, saya jadi tahu bagaimana lebih dekat dengan anak-anak di era digital."</p>
                    <p class="mt-2 font-bold">- Ibu Rina</p>
               </div>
               <div class="bg-white p-6 rounded-lg shadow text-center">
                    <img src="../public/img/no-user.png" class="rounded-full mx-auto mb-4 w-[100px]" />
                    <p class="italic">"Pembicaraannya luar biasa dan aplikatif. Sangat disarankan!"</p>
                    <p class="mt-2 font-bold">- Pak Arif</p>
               </div>
               <div class="bg-white p-6 rounded-lg shadow text-center">
                    <img src="../public/img/no-user.png" class="rounded-full mx-auto mb-4 w-[100px]" />
                    <p class="italic">"Sesi parenting terbaik yang pernah saya hadiri. Terima kasih!"</p>
                    <p class="mt-2 font-bold">- Bunda Maya</p>
               </div>
               </div>
          </div>
          </section>

          <!-- Form Registrasi -->
          <section id="daftar" class="py-16 px-6 max-w-3xl mx-auto" data-aos="fade-up">
               <h2 class="text-3xl font-semibold mb-6 text-center">Daftar Sekarang</h2>

               <form class="bg-white p-8 rounded-xl shadow-xl space-y-6" onsubmit="return false;">
                    <div>
                         <label class="block mb-2 font-semibold">Nama Lengkap</label>
                         <input type="text" placeholder="Masukkan nama Anda" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required />
                    </div>
                    <div>
                         <label class="block mb-2 font-semibold">Email</label>
                         <input type="email" placeholder="Masukkan email aktif" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required />
                    </div>
                    <div>
                         <label class="block mb-2 font-semibold">Nomor WhatsApp</label>
                         <input type="tel" placeholder="08xxxxxxxxxx" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required />
                    </div>

                    <div>
                         <div class="bg-indigo-50 border border-indigo-300 rounded-xl p-6 mb-8 shadow-md max-w-md mx-auto">
                              <h3 class="text-xl font-semibold mb-2 text-indigo-700">Tujuan Pembayaran</h3>
                              
                              <div class="my-3">
                                   <img src="../public/img/bni-icon.webp" alt="icon-bni" class="w-[100px]">
                              </div>
                              
                              <p class="text-gray-700"><span class="font-semibold">1234 5678 9012 3456</span></p>
                              <p class="text-gray-700"><span class="font-semibold">Ibu Susanti</span></p>
                         </div>

                         <label class="block mb-2 font-semibold">Bukti Pembayaran</label>
                         <div id="uploadArea" 
                              class="w-full border-2 border-dashed border-gray-400 rounded-lg p-6 flex flex-col items-center justify-center cursor-pointer hover:border-indigo-600 transition-colors relative">
                         <input type="file" id="buktiPembayaran" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required />
                         <div id="uploadText" class="text-gray-500 text-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-2 h-10 w-10 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M7 16v-4m0 0l-3 3m3-3l3 3m6-3v4m0 0l3-3m-3 3l-3-3m0-4V4m0 0l-3 3m3-3l3 3" />
                              </svg>
                              <p>Drag & Drop atau klik untuk upload gambar</p>
                              <small class="text-gray-400">Hanya file gambar yang diperbolehkan</small>
                         </div>
                         <div id="previewWrapper" class="hidden relative w-full max-w-xs mx-auto">
                              <img id="previewBukti" alt="Preview Bukti Pembayaran" class="rounded-lg shadow-lg w-full object-contain transition-opacity duration-300 opacity-0" />
                              <button type="button" id="removeBtn" title="Hapus gambar" 
                              class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-lg">
                              &times;
                              </button>
                         </div>
                    </div>

                    <div class="my-5">
                         <label class="block mb-2 font-semibold">Pilih Paket</label>
                         <div class="flex flex-wrap md:gap-4 gap-3 md:mt-0 mt-3">
                              <label class="flex items-center md:space-x-2 space-x-1 cursor-pointer">
                                   <input type="radio" name="paket" value="Bronze" class="hidden peer" required>
                                   <div class="md:px-4 md:py-2 px-3 py-1 rounded-full border border-gray-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-100 font-medium">Bronze</div>
                              </label>
                              <label class="flex items-center md:space-x-2 space-x-1 cursor-pointer">
                                   <input type="radio" name="paket" value="Gold" class="hidden peer" required>
                                   <div class="md:px-4 md:py-2 px-3 py-1 rounded-full border border-gray-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-100 font-medium">Gold</div>
                              </label>
                              <label class="flex items-center md:space-x-2 space-x-1 cursor-pointer">
                                   <input type="radio" name="paket" value="Platinum" class="hidden peer" required>
                                   <div class="md:px-4 md:py-2 px-3 py-1 rounded-full border border-gray-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-100 font-medium">Platinum</div>
                              </label>
                         </div>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 font-semibold">
                         <i class="fas fa-paper-plane mr-2"></i>Kirim Pendaftaran
                    </button>
               </form>
          </section>


          <!-- Footer -->
          <footer class="bg-gray-900 text-white border-t mt-12">
               <div class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8 text-center md:text-left">
                    <div>
                         <div class="flex md:flex-row flex-col md:text-left text-center space-x-3">
                              <img src="../public/img/logo-super-parenting.png" class="w-[100px] mx-auto" alt="logo-super-parenting">

                              <div>
                                   <h2 class="text-xl font-bold mb-3">Super Parenting</h2>
                                   <p class="text-sm">Menjadi Orang Tua Hebat di Era Digital bersama dr. Aisah Dahlan.</p>
                              </div>
                         </div>
                    </div>
                    <div>
                         <h3 class="font-semibold mb-3">Navigasi</h3>
                         <ul class="space-y-2 text-md">
                              <li><a href="#tentang" class="hover:text-indigo-600">Tentang</a></li>
                              <li><a href="#jadwal" class="hover:text-indigo-600">Jadwal</a></li>
                              <li><a href="#investasi" class="hover:text-indigo-600">Investasi</a></li>
                              <li><a href="#testimoni" class="hover:text-indigo-600">Testimoni</a></li>
                         </ul>
                    </div>
                    <div class="mt-3">
                         <h3 class="font-semibold mb-3">Kontak</h3>
                         <p class="text-md mt-2"><i class="fas fa-envelope mr-3"></i>info@superparenting.id</p>
                         <p class="text-md mt-2"><i class="fas fa-phone mr-3"></i>+62 812-3456-7890</p>
                         <p class="text-md mt-2"><i class="fas fa-map-marker-alt mr-3"></i>Makassar, Indonesia</p>

                         <div class="flex space-x-3 md:mt-4 mt-10 justify-center md:justify-start">
                              <a href="#" target="_blank" class="transition transform hover:scale-110 duration-200 bg-blue-600 hover:bg-blue-700 text-white rounded-full w-10 h-10 flex items-center justify-center shadow">
                                   <i class="fab fa-facebook-f"></i>
                              </a>

                              <a href="#" target="_blank" class="transition transform hover:scale-110 duration-200 bg-red-600 hover:bg-red-700 text-white rounded-full w-10 h-10 flex items-center justify-center shadow">
                                   <i class="fab fa-youtube"></i>
                              </a>

                              <a href="#" target="_blank" class="transition transform hover:scale-110 duration-200 bg-black hover:bg-gray-800 text-white rounded-full w-10 h-10 flex items-center justify-center shadow">
                                   <i class="fab fa-tiktok"></i>
                              </a>

                              <a href="#" target="_blank" class="transition transform hover:scale-110 duration-200 bg-gray-900 hover:bg-gray-700 text-white rounded-full w-10 h-10 flex items-center justify-center shadow">
                                   <i class="fab fa-x-twitter"></i>
                              </a>

                              <a href="#" target="_blank" class="transition transform hover:scale-110 duration-200 bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 text-white rounded-full w-10 h-10 flex items-center justify-center shadow">
                                   <i class="fab fa-instagram"></i>
                              </a>
                         </div>
                    </div>
               </div>
               
               <div class="text-center py-4 text-sm bg-gray-800 text-white hover:text-indigo-500">&copy; 2025 Super Parenting. All rights reserved.</div>
          </footer>

          <script src="../public/js/navbar.js"></script>
          
          <script src="../public/js/bukti-pembayaran.js"></script>
          
          <script src="../public/icons/js/all.js"></script>
          
          <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

          <script>AOS.init()</script>
     </body>
</html>
