<?php

require_once __DIR__ . '/config.php';

$host = "";
$user = "";
$pass = "";
$db   = ""; 

// CONFIG DATABASE
$config = databaseConfig();

$host = $config['host'];
$user = $config['user'];
$pass = $config['password'];
$db   = $config['database'];

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
     die("Koneksi gagal: " . mysqli_connect_error());
}


?>
