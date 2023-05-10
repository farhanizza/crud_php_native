<?php
session_start();
include 'koneksi.php';

$nama_lengkap = $_POST['nama_lengkap'];

$tujuan_program = $_POST['tujuan_program'];

if ($tujuan_program == 'lainnya') {
    $tujuan_program = $_POST['tujuan_program_text'];
}

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$konten_pelajari = $_POST['konten_pelajari'];

if ($konten_pelajari == 'lainnya') {
    $konten_pelajari = $_POST['konten_pelajari_text'];
}

$judul_program = $_POST['judul_program'];

$metode_pembelajaran = $_POST['metode_pembelajaran'];

if ($metode_pembelajaran == 'lainnya') {
    $metode_pembelajaran = $_POST['metode_pembelajaran_text'];
}

$nama_instansi = $_POST['nama_instansi'];

if ($nama_instansi == 'lainnya') {
    $nama_instansi = $_POST['nama_instansi_text'];
}

$provinsi = $_POST['provinsi'];
$deksripsi = $_POST['deksripsi'];
$kota = $_POST['kota'];
$id_provinces = $_POST["id_provinces"];
$id_employee = $_SESSION['id_user'];


switch ($_GET["jenis"]) {
    case 'kota':
        if ($id_provinces == '') {
            exit;
        } else {
            $getcity = mysqli_query($koneksi, "SELECT  * FROM regencies WHERE province_id ='$id_provinces' ORDER BY name ASC") or die('Query Gagal');
            while ($data = mysqli_fetch_array($getcity)) {
                echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
            }
            exit;
        }
        break;

    default:
        break;
}

$file_ori = $_FILES['file_upload']['name'];
$file_size = $_FILES['file_upload']['size'];
$file_temp = $_FILES['file_upload']['tmp_name'];

$folder = "file/";

date_default_timezone_set('Asia/Jakarta');
$file_name = date("h-i-s-a") . "-" . date("Y-m-d", time()) . '-' . $file_ori;

$new_path = $folder . $file_name;

$resize = 3 * 1024 * 1024;

$type_file = array("jpg", "jpeg", "png", "pdf");

if ($file_size > $resize) {
    echo "<script>
            alert('Failed: Ukuran file maksimum 3 MB');
            window.location.href = 'non_formal_education.php';
            </script>";
    exit();
}

$extension = strtolower(pathinfo($file_ori, PATHINFO_EXTENSION));
if (!in_array($extension, $type_file)) {
    echo "<script>
            alert('Failed: File hanya jpg, jpeg, png, pdf');
            window.location.href = 'non_formal_education.php';
            </script>";
    exit();
}

if ($extension == 'jpg' || $extension == 'jpeg') {
    $file = imagecreatefromjpeg($file_temp);
} else {
    $file = imagecreatefrompng($file_temp);
}

$quality = 100;
// jpg, jpeg, png
imagejpeg($file, $new_path, $quality);
// pdf
move_uploaded_file($file_temp, $new_path);

$sql_code = "INSERT INTO hrm_user (id_employee, nama_lengkap, tujuan_program, start_date, end_date, materi_konten, judul_program, 
metode_pembelajaran, sertifikat, nama_instansi, lokasi_provinsi, deksripsi, lokasi_kota, status, status_sertifikat) 
VALUES ($id_employee,'$nama_lengkap', '$tujuan_program', '$start_date', '$end_date', '$konten_pelajari', '$judul_program', 
'$metode_pembelajaran', '$file_name', '$nama_instansi', '$provinsi', '$deksripsi', '$kota', 'Belum di review', 
'Belum melakukan review sertifikat')";



if (mysqli_query($koneksi, $sql_code)) {
    $sql_code_nfe = mysqli_query($koneksi, "SELECT id, id_employee FROM hrm_user where id_employee = $id_employee");
    $data = mysqli_fetch_array($sql_code_nfe);
    $_SESSION['id_user_nfe'] = $data['id'];
    echo "<script>
            alert('Success: Berhasil ditambahkan');
            window.location.href = 'non_formal_education.php';
            </script>";
    // var_dump($tujuan_program, $konten_pelajari, $metode_pembelajaran, $nama_instansi);
}
