<?php
require_once 'koneksi.php';
$id_user = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT sertifikat, id FROM hr_user_non_formal WHERE id = $id_user");

$data = mysqli_fetch_array($sql);

// download
$file = 'file/' . $data['sertifikat'];
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file) . '"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
ob_clean();
flush();
readfile($file);
exit;
