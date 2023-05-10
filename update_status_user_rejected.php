<?php
require_once 'koneksi.php';
$id_user = $_GET['id'];

$sql_code_review = mysqli_query($koneksi, "SELECT status_sertifikat FROM hrm_user WHERE id = $id_user");
$data_review = mysqli_fetch_array($sql_code_review);

if ($data_review['status_sertifikat'] == "Belum melakukan review sertifikat") {
    echo "<script>
    alert('Silahkan review sertifikat terlebih dahulu');
    window.location.href = 'view_non_formal.php?id=$id_user';
    </script>
    ";
} else {
    $sql_code = mysqli_query($koneksi, "UPDATE hrm_user SET status = 'Dokumen telah ditolak' WHERE id = $id_user");
    echo "<script>
    alert('Status ditolak');
    window.location.href = 'non_formal.php';
    </script>
    ";
}
