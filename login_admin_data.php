<?php
require_once 'koneksi.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result_data = mysqli_query($koneksi, "SELECT id, username, password FROM register WHERE username = '$username'");

    // Cek username apakah sama
    if (mysqli_num_rows($result_data) == 1) {
        $data = mysqli_fetch_array($result_data);

        // Jika cocok password nya
        if (password_verify($password, $data['password'])) {

            $_SESSION['id_user_admin'] = $data['id'];
            $_SESSION['username_admin'] = $data['username'];
            $_SESSION['level'] = '0';
            $_SESSION['last_login_time'] = time();

            echo "<script>
            alert('Login success');
            window.location.href = 'index.php';
            </script>";

            // Super Admin
            // if ($data['level'] == '0') {
            //     $_SESSION['id_user'] = $data['id'];
            //     $_SESSION['username'] = $data['username'];
            //     $_SESSION['level'] = '0';
            //     $_SESSION['last_login_time'] = time();
            //     // admin

            //     echo "<script>
            //     alert('Login success');
            //     window.location.href = 'index.php';
            //     </script>";
            // } else if ($data['level'] == '1') {
            //     // User
            //     $_SESSION['id_user'] = $data['id'];
            //     $_SESSION['username'] = $data['username'];
            //     $_SESSION['level'] = '1';
            //     $_SESSION['last_login_time'] = time();

            //     echo "<script>
            //     alert('Login success');
            //     window.location.href = 'test_responsive.php';
            //     </script>";
            // } else {
            // }
        } else {
            echo "<script>
            alert('Username and password does not match (Password)');
            window.location.href = 'login.php';
            </script>";
        }
    } else {
        // Jika data user tidak ditemukan
        echo "<script>
            alert('Username and password does not match (Username)');
            window.location.href = 'login.php';
            </script>";
    }
}
