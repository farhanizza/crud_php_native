<?php

include 'koneksi.php';

$nik = $_POST["nik"];
$first_name = $_POST["first_name"];
$middle_name = $_POST["middle_name"];
$last_name = $_POST["last_name"];
$birth_date = $_POST["birth_date"];
$grade_name = $_POST["grade_name"];
$gender = $_POST["gender"];
$nationality = $_POST["negara"];
$kewarganegaraan = $_POST["kewarganegaraan"];

$id_provinces = $_POST["id_provinces"];
$provinsi = $_POST["provinsi"];

$id_regencies = $_POST["id_regencies"];
$regencies = $_POST["kota"];

$temp_password = password_hash("gajahtunggal1", PASSWORD_BCRYPT);

$username = $nik;

$hr_name = $_POST['hr_name'];

// Security SQL Injection
$nik = mysqli_real_escape_string($koneksi, $nik);
$first_name = mysqli_real_escape_string($koneksi, $first_name);
$middle_name = mysqli_real_escape_string($koneksi, $middle_name);
$last_name = mysqli_real_escape_string($koneksi, $last_name);
$birth_date = mysqli_real_escape_string($koneksi, $birth_date);
$grade_name = mysqli_real_escape_string($koneksi, $grade_name);
$gender = mysqli_real_escape_string($koneksi, $gender);
$nationality = mysqli_real_escape_string($koneksi, $nationality);

// Cek validasi umur harus diatas 17 tahun
$umur_17 = date('Y-m-d', strtotime('-17 year'));

// Get Province and regencies
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

// Upload image
$image_file = $_FILES["image"]["name"];
$image_size = $_FILES["image"]["size"];
$image_temporary = $_FILES["image"]["tmp_name"];

$folder = "image/";

date_default_timezone_set('Asia/Jakarta');
$image_name = date("h-i-s-a") . "-" . date("Y-m-d", time()) . '-' . $image_file;

$new_path = $folder . $image_name;

// 3 MB
$resize = 3 * 1024 * 1024;

$type_file = array("jpg", "jpeg", "png");

if ($image_size > $resize) {
    echo "<script>
            alert('Failed: Ukuran file maksimum 3 MB');
            window.location.href = 'index.php';
            </script>";
    exit();
}

$extension = strtolower(pathinfo($image_file, PATHINFO_EXTENSION));
if (!in_array($extension, $type_file)) {
    echo "<script>
            alert('Failed: Image only jpg, jpeg, png');
            window.location.href = 'index.php';
            </script>";
    exit();
}

// kompres gambar
if ($extension == "jpg" || $extension == "jpeg") {
    $image = imagecreatefromjpeg($image_temporary);
} else {
    $image = imagecreatefrompng($image_temporary);
}

// Quality 1 - 100
$quality = 100;
imagejpeg($image, $new_path, $quality);

$sql_code = "INSERT INTO employee 
(nik, first_name, middle_name, last_name, birth_place, regencies, birth_date, grade_name, gender, negara,
kewarganegaraan, gambar, password, username, hr_name)
VALUES ('$nik', '$first_name', '$middle_name', '$last_name', '$provinsi', '$regencies','$birth_date', 
'$grade_name', '$gender', '$nationality', '$kewarganegaraan', '$image_name', '$temp_password', '$username', '$hr_name')";

// Validasi umur harus lebih 17 tahun
if ($birth_date <= $umur_17) {
    // Validasi special character dan spasi
    if (
        !empty(trim($nik)) && !empty(trim($first_name)) && !empty(trim($grade_name))
        && preg_match("/^[a-zA-Z0-9- ]+$/", $nik) && preg_match("/^[a-zA-Z ]+$/", $first_name)
        && preg_match("/^[a-zA-Z\s]*$|^$/", $middle_name)
        && preg_match("/^[a-zA-Z\s]*$|^$/", $last_name)
    ) {
        if (mysqli_query($koneksi, $sql_code)) {
            echo "<script>
            alert('Success: Berhasil ditambahkan');
            window.location.href = 'index.php?data=succes_insert_data';
            </script>";
        }
        // else {
        //     echo "Error: " . $sql_code . "<br>" . mysqli_error($koneksi);
        // }
    } else {
        echo "<script>
            alert('Error: Gagal Input Data');
            window.location.href = 'index.php?data=failed_insert_data';
        </script>";
        exit;
    }
} else {
    echo
    "<script>
            alert('Error: umur harus diatas 17 tahun');
            window.location.href = 'index.php?data=failed_insert_data';
        </script>";
    exit;
}


// Cek Nik yang sama
$sql_cek_nik = "SELECT nik FROM employee WHERE nik = '$nik'";

$cek_nik = mysqli_query($koneksi, $sql_cek_nik);

if (mysqli_num_rows($cek_nik) > 0) {
    echo "<script>
        alert('Error: NIK sudah terdaftar');
        window.location.href = 'index.php';
    </script>";
}
