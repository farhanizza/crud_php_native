<?php
session_start();
include 'koneksi.php';

$nik = $_POST["nik"];
$first_name = $_POST["first_name"];
$middle_name = $_POST["middle_name"];
$last_name = $_POST["last_name"];
$email = $_POST['email'];
$birth_date = $_POST["birth_date"];
$grade_name = $_POST["grade_name"];
$gender = $_POST["gender"];
$nationality = $_POST["negara"];
$kewarganegaraan = $_POST["kewarganegaraan"];
$provinsi = $_POST["provinsi"];
$regencies = $_POST["kota"];
$temp_password = password_hash("gajahtunggal1", PASSWORD_BCRYPT);
$username = $nik;
$hr_name = $_POST['hr_name'];

// Upload image
$image_file = $_FILES["image"]["name"];
$image_size = $_FILES["image"]["size"];
$image_temporary = $_FILES["image"]["tmp_name"];
$folder = "image/";
date_default_timezone_set('Asia/Jakarta');
$image_name = date("h-i-s-a") . "-" . date("Y-m-d", time()) . '-' . $image_file;
$new_path = $folder . $image_name;
move_uploaded_file($_FILES["image"]["tmp_name"], $new_path);

// Cek NIK yang sama
$cek_nik = mysqli_query($koneksi, "SELECT nik FROM hr_employee WHERE nik = '$nik'");
if (mysqli_num_rows($cek_nik) > 0) {
    echo "duplicate";
} else {
    echo "available";
}

$sql = "INSERT INTO hr_employee 
(nik, first_name, middle_name, last_name, birth_place, regencies, birth_date, grade_name, gender, negara,
kewarganegaraan, gambar, password, username, hr_name, email)
VALUES ('$nik', '$first_name', '$middle_name', '$last_name', '$provinsi', '$regencies','$birth_date', 
'$grade_name', '$gender', '$nationality', '$kewarganegaraan', '$image_name', '$temp_password', '$username', '$hr_name', '$email')";

mysqli_query($koneksi, $sql);
