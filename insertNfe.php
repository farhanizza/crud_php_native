<?php
session_start();
include 'koneksi.php';

$nama_lengkap = $_POST['nama_lengkap'];

$tujuan_program = $_POST['tujuan_program'] ?? '';

if ($tujuan_program == 'lainnya') {
    $tujuan_program = $_POST['tujuan_program_text'];
}

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$konten_pelajari = $_POST['konten_pelajari'] ?? '';

if ($konten_pelajari == 'lainnya') {
    $konten_pelajari = $_POST['konten_pelajari_text'];
}

$judul_program = $_POST['judul_program'];

$metode_pembelajaran = $_POST['metode_pembelajaran'] ?? '';

if ($metode_pembelajaran == 'lainnya') {
    $metode_pembelajaran = $_POST['metode_pembelajaran_text'];
}

$nama_instansi = $_POST['nama_instansi'] ?? '';

if ($nama_instansi == 'lainnya') {
    $nama_instansi = $_POST['nama_instansi_text'];
}

$provinsi = $_POST['provinsi'];
$deksripsi = $_POST['deksripsi'];
$kota = $_POST['kota'];

$id_employee = $_SESSION['id_user_employee'];

// Upload File
$file_ori = $_FILES['file_upload']['name'];
$file_size = $_FILES['file_upload']['size'];
$file_temp = $_FILES['file_upload']['tmp_name'];

$folder = "file/";

date_default_timezone_set('Asia/Jakarta');
$file_name = date("h-i-s-a") . "-" . date("Y-m-d", time()) . '-' . $file_ori;

$new_path = $folder . $file_name;

move_uploaded_file($_FILES['file_upload']['tmp_name'], $new_path);

// Validasi space
if (empty(trim($nama_lengkap)) || empty(trim($tujuan_program)) || empty(trim($konten_pelajari)) || empty(trim($judul_program)) || empty(trim($metode_pembelajaran)) || empty(trim($nama_instansi)) || empty(trim($deksripsi))) {
    echo "space_and_empty";
    return false;
}

$sql_code = "INSERT INTO hr_user_non_formal (id_employee, nama_lengkap, tujuan_program, start_date, end_date, materi_konten, judul_program, 
metode_pembelajaran, sertifikat, nama_instansi, lokasi_provinsi, deksripsi, lokasi_kota, id_status, status_sertifikat) 
VALUES ($id_employee,'$nama_lengkap', '$tujuan_program', '$start_date', '$end_date', '$konten_pelajari', '$judul_program', 
'$metode_pembelajaran', '$file_name', '$nama_instansi', '$provinsi', '$deksripsi', '$kota', '0', 
'Belum melakukan review sertifikat')";


if (mysqli_query($koneksi, $sql_code)) {
    echo "Sukses";
    $sql_code_nfe = mysqli_query($koneksi, "SELECT id, id_employee FROM hr_user_non_formal where id_employee = $id_employee ORDER BY id DESC LIMIT 1");
    $data = mysqli_fetch_array($sql_code_nfe);
    // $_SESSION['id_user_nfe'] = $data['id'];
    $id_user = $data['id'];

    $date_time = date("Y-m-d H:i:s");
    mysqli_query($koneksi, "INSERT INTO hr_insert_dokumen (id_employee, id_user, tanggal_insert, id_status) VALUES ('$id_employee', '$id_user','$date_time', '0')");
} else {
    echo "Gagal";
}
