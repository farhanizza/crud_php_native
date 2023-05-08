<?php
require_once 'koneksi.php';

$id_user = $_POST['id_user'];
$pesan = $_POST['pesan'];

mysqli_query($koneksi, "INSERT INTO hr_pesan (alasan_form, status) VALUES ('$pesan', 'Ditolak')");
mysqli_query($koneksi, "UPDATE hrm_user SET status = 'Ditolak' where id = $id_user");
