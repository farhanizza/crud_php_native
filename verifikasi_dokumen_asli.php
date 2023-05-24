<?php
require_once 'koneksi.php';
session_start();

$id_user = $_GET['id'];
$id_employee = $_SESSION['id_user_admin'];
$username_admin = $_SESSION['username_admin'];

$sql = mysqli_query($koneksi, "UPDATE hr_user_non_formal SET status_sertifikat = 'Sistem membuktikan dokumen asli', id_status = '4' where id = $id_user");

$sql_code_admin = mysqli_query($koneksi, "SELECT username FROM hr_register where username = '$username_admin'");
$data_admin = mysqli_fetch_array($sql_code_admin);


if ($sql) {
    date_default_timezone_set('Asia/Jakarta');
    $date_time = date("Y-m-d H:i:s");
    $data_username_admin = $data_admin['username'];
    mysqli_query($koneksi, "INSERT INTO hr_approved (id_approved, id_user, tanggal_approved, approved_name, id_status) 
    VALUES ('$id_employee', '$id_user', '$date_time', '$data_username_admin', '4')");
    $_SESSION['alert_terima_manual'] = "Sistem membuktikan dokumen asli!";
    echo "
    <script>
    window.location.href = 'view_non_formal.php?id=$id_user';
    </script>
    ";
}
