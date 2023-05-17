<?php
require_once 'koneksi.php';
// session_start();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'];
//     $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
//     $email = $_POST['email'];

//     $result_data = mysqli_query($koneksi, "SELECT * FROM register WHERE username = '$username'");
//     $data = mysqli_fetch_array($result_data);

//     // Filter validasi jika email sama
//     if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
//         echo "<script>
//         alert('Email already exist');
//         window.location.href = 'register.php';
//         </script>";
//     } else {
//         if (mysqli_query($koneksi, "INSERT INTO register (username, password, email, level) VALUES ('$username', '$password', '$email', '0')")) {
//             echo "<script>alert('Register success');</script>";
//             header("Location: login.php");
//         } else {
//             echo "<script>
//             alert('Register failed');
//             window.location.href = 'register.php';
//             </script>";
//         }
//     }
// }

$password = password_hash('xxx', PASSWORD_BCRYPT);

$sql_register = mysqli_query($koneksi, "INSERT INTO register (username, password, email, level) VALUES ('xxx', '$password', 'xxx@gmail.com', '0')");

if ($sql_register) {
    echo "Sukses daftar admin";
} else {
    echo "Gagal daftar admin";
}
