<?php
session_start();

// Menghapus semua variable session
session_unset();

// Menghancurkan session
session_destroy();

// redirect login
echo "<script>
        alert('Logout success');
        window.location.href = 'login.php';
        </script>";

require_once 'config/log_server.php';
date_default_timezone_set('Asia/Jakarta');
write_log_server($_SERVER['SERVER_NAME'], "User masuk ke halaman logout", date('Y-m-d : H:i:s', $_SERVER['REQUEST_TIME']));
