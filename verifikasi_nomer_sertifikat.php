<?php

require_once 'koneksi.php';

$nomor_sertifikat = $_POST['nomor_sertifikat'];
$id_user = $_POST['id_user'];

$cek_nomor = mysqli_query($koneksi, "SELECT nomor_sertifikat FROM hr_sertifikat WHERE nomor_sertifikat = $nomor_sertifikat");

if ($cek_nomor) {
    echo "<script>
    alert('Success: Nomor sertifikat terverifikasi');
    window.location.href = 'view_non_formal.php?id=$id_user';
    </script>";
    mysqli_query($koneksi, "UPDATE hrm_user SET status_sertifikat = 'Sistem membuktikan dokumen asli' where id = $id_user");
    mysqli_query($koneksi, "UPDATE hrm_user SET status = 'Sudah di review' where id = $id_user");
} else {
    echo "TIdak ada";
}
