<?php
session_start();
require_once 'koneksi.php';

$id = $_POST["id"];

if (mysqli_query($koneksi, "DELETE FROM hr_employee WHERE id = '$id'")) {
    require_once 'config/log_server.php';
    date_default_timezone_set('Asia/Jakarta');
    write_log_server($_SERVER['SERVER_NAME'], "User menghapus data", date('Y-m-d : H:i:s', $_SERVER['REQUEST_TIME']), 'NULL');

    header("location:index.php?data=berhasil_dihapus");
} else {
    echo "<script>
        alert('Gagal di hapus');
    </script>";
}
