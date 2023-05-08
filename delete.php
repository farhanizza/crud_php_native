<?php

require_once 'koneksi.php';

$id = $_GET["id"];

if (mysqli_query($koneksi, "DELETE FROM employee WHERE id = '$id'")) {
    echo "<script>
        alert('Berhasil di hapus');
    </script>";

    require_once 'config/log_server.php';
    date_default_timezone_set('Asia/Jakarta');
    write_log_server($_SERVER['SERVER_NAME'], "User menghapus data", date('Y-m-d : H:i:s', $_SERVER['REQUEST_TIME']), 'NULL');
} else {
    echo "<script>
        alert('Gagal di hapus');
    </script>";
}

header("location:index.php?data=berhasil_dihapus");
