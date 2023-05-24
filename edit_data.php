<?php

include 'koneksi.php';

$id = $_POST["id"];
$nik = $_POST["nik"];
$first_name = $_POST["first_name"];
$middle_name = $_POST["middle_name"];
$last_name = $_POST["last_name"];
$birth_place = $_POST["birth_place"];
$birth_date = $_POST["birth_date"];
$grade_name = $_POST["grade_name"];
$nationality = $_POST["negara"];
$kewarganegaraan = $_POST["kewarganegaraan"];
$provinsi = $_POST["provinsi"];
$regencies = $_POST["kota"];

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


$sql = "UPDATE hr_employee SET 
nik = '$nik', 
first_name = '$first_name', 
middle_name = '$middle_name', 
last_name = '$last_name', 
birth_place = '$provinsi',
regencies = '$regencies',
birth_date = '$birth_date', 
grade_name = '$grade_name', 
negara = '$nationality', 
kewarganegaraan = '$kewarganegaraan',
gambar = '$image_name'
WHERE id = '$id'";

mysqli_query($koneksi, $sql);
