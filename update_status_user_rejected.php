<?php
require_once 'koneksi.php';
session_start();

$id_user = $_GET['id'];
$id_employee = $_SESSION['id_user_admin'];
$username_admin = $_SESSION['username_admin'];

$sql_code_review = mysqli_query($koneksi, "SELECT status_sertifikat FROM hrm_user WHERE id = $id_user");
$data_review = mysqli_fetch_array($sql_code_review);

$sql_code_admin = mysqli_query($koneksi, "SELECT username FROM register where username = '$username_admin'");
$data_admin = mysqli_fetch_array($sql_code_admin);

if ($data_review['status_sertifikat'] == "Belum melakukan review sertifikat") {
    echo "<script>
    alert('Silahkan review sertifikat terlebih dahulu');
    window.location.href = 'view_non_formal.php?id=$id_user';
    </script>
    ";
} else {
    if ($data_review['status_sertifikat'] == "Sistem membuktikan dokumen asli") {
        echo "<script>
        alert('Sistem membuktikan dokumen asli silahkan pencet terima');
        window.location.href = 'view_non_formal.php?id=$id_user';
        </script>
        ";
    } else {
        $sql_code = mysqli_query($koneksi, "UPDATE hrm_user SET id_status = '3' WHERE id = $id_user");

        date_default_timezone_set('Asia/Jakarta');
        $date_time = date("Y-m-d H:i:s");
        $data_username_admin = $data_admin['username'];
        mysqli_query($koneksi, "INSERT INTO hr_approved (id_approved, id_user, tanggal_approved, approved_name, id_status) 
        VALUES ('$id_employee', '$id_user', '$date_time', '$data_username_admin', '3')");

        echo "<script>
        alert('Status ditolak');
        window.location.href = 'non_formal.php';
        </script>
        ";
    }
}
