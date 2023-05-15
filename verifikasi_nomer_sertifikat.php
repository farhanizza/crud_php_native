<?php
require_once 'koneksi.php';
session_start();

$nomor_sertifikat = $_POST['nomor_sertifikat'];
$id_user = $_POST['id_user'];
$id_employee = $_SESSION['id_user_admin'];
$username_admin = $_SESSION['username_admin'];

// validasi jika inoutan kosong atau spasi
if (empty(trim($nomor_sertifikat))) {
    echo "<script>
            alert('Failed: inputan tidak boleh kosong atau berisi spasi');
            window.history.back();
            </script>";
    return false;
}

$cek_nomor = mysqli_query($koneksi, "SELECT nomor_sertifikat FROM hr_sertifikat WHERE nomor_sertifikat = $nomor_sertifikat");

$sql_code_admin = mysqli_query($koneksi, "SELECT username FROM register where username = '$username_admin'");
$data_admin = mysqli_fetch_array($sql_code_admin);

if (mysqli_num_rows($cek_nomor) > 0) {
    echo "<script>
    alert('Success: Nomor sertifikat terverifikasi');
    window.location.href = 'view_non_formal.php?id=$id_user';
    </script>";
    mysqli_query($koneksi, "UPDATE hrm_user SET status_sertifikat = 'Sistem membuktikan dokumen asli', id_status = '4' where id = $id_user");

    date_default_timezone_set('Asia/Jakarta');
    $date_time = date("Y-m-d H:i:s");
    $data_username_admin = $data_admin['username'];
    mysqli_query($koneksi, "INSERT INTO hr_approved (id_approved, id_user, tanggal_approved, approved_name, id_status) 
    VALUES ('$id_employee', '$id_user', '$date_time', '$data_username_admin', '4')");

    // mysqli_query($koneksi, "UPDATE hrm_user SET status = 'Sudah di review' where id = $id_user");
} else {
    echo "<script>
    alert('Failed: Nomor sertifikat tidak diketahui');
    window.location.href = 'alasan_menolak_dokumen.php?id=$id_user';
    </script>";
    // mysqli_query($koneksi, "UPDATE hrm_user SET status_sertifikat = 'Sistem membuktikan dokumen palsu' where id = $id_user");
}
