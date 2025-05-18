<?php
if (session_status() === PHP_SESSION_NONE) {
     session_start();
}

function getCsrfToken() {
     if (empty($_SESSION['csrf_token'])) {
          $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
     }
     return $_SESSION['csrf_token'];
}

function checkCsrfToken($token) {
     return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
?>
