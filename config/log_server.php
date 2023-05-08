<?php

include 'koneksi.php';

function write_log_server($name, $info, $time_date, $info_qr)
{
    global $koneksi;
    mysqli_query($koneksi, "INSERT INTO log_server (name_server, info, time_date, qr_scan) VALUES ('$name', '$info', '$time_date', '$info_qr')");
}
