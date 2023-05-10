<?php
require_once 'koneksi.php';

$id_user = $_GET['id'];

$sql = mysqli_query($koneksi, "UPDATE hrm_user SET status_sertifikat = 'Sistem membuktikan dokumen asli' WHERE id = $id_user");

if ($sql) {
    echo "
    <script>
    alert('Sistem membuktika dokumen asli');
    window.location.href = 'view_non_formal.php?id=$id_user';
    </script>
    ";
}
