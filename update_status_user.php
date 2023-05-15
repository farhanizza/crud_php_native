<?php
require_once 'koneksi.php';
session_start();

$id_user = $_POST['id_user'];
$id_employee = $_SESSION['id_user_admin'];
$username_admin = $_SESSION['username_admin'];


$pesan = $_POST['pesan'];

if (empty(trim($pesan))) {
    echo "<script>
        alert('Inputan tidak boleh kosong');
        window.history.back();
    </script>";

    return false;
}

$sql_code = mysqli_query($koneksi, "INSERT INTO hr_pesan (id_user, alasan_form, id_status) VALUES ($id_user, '$pesan', '3')");

$sql_code_admin = mysqli_query($koneksi, "SELECT username FROM register where username = '$username_admin'");
$data_admin = mysqli_fetch_array($sql_code_admin);

if ($sql_code) {
    echo "<script>
    alert('Pesan terkirim');
    window.location.href = 'view_non_formal.php?id=$id_user';
    </script>";
    mysqli_query($koneksi, "UPDATE hrm_user SET status_sertifikat = 'Sistem membuktikan dokumen palsu', id_status = '3' where id = $id_user");

    date_default_timezone_set('Asia/Jakarta');
    $date_time = date("Y-m-d H:i:s");
    $data_username_admin = $data_admin['username'];
    mysqli_query($koneksi, "INSERT INTO hr_approved (id_approved, id_user, tanggal_approved, approved_name, id_status) 
    VALUES ('$id_employee', '$id_user', '$date_time', '$data_username_admin', '5')");
}
