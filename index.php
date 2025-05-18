<?php

$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

// Ambil bagian terakhir dari path
$route = basename($path);

switch ($route) {
     case 'login':
          header('Location: src/login.php');
          break;
     case 'dashboard':
          header('Location: src/dashboard/index.php');
          break;
     default:
          header('Location: src/index.php');
          break;
}
exit;
