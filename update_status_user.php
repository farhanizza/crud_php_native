<?php
session_start();
require_once 'koneksi.php';

$id_user = $_POST['id_user'];
$pesan = $_POST['pesan'];
$sql_code = mysqli_query($koneksi, "INSERT INTO hr_pesan (id_user, alasan_form, status) VALUES ($id_user, '$pesan', 'Ditolak')");
if ($sql_code) {
    echo "<script>
    alert('Pesan terkirim');
    window.location.href = 'view_non_formal.php?id=$id_user';
    </script>";
    mysqli_query($koneksi, "UPDATE hrm_user SET status_sertifikat = 'Sistem membuktikan dokumen palsu' where id = $id_user");
}
