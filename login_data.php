<?php
session_start();
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result_data = mysqli_query($koneksi, "SELECT id, username, password, hr_name, level FROM hr_employee WHERE username = '$username'");

    // Cek username apakah sama
    if (mysqli_num_rows($result_data) == 1) {
        $data = mysqli_fetch_array($result_data);

        // Jika cocok password nya
        if (password_verify($password, $data['password'])) {
            $_SESSION['success'] = "Success login";

            if ($data['level'] == 0) {
                if ($data['hr_name'] == "HRIT_group") {
                    $_SESSION['id_user_employee'] = $data['id'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['hr_name'] = $data['hr_name'];
                    $_SESSION['last_login_time'] = time();

                    echo "<script>
                    window.location.href = 'view/group/hrit_g.php';
                    </script>";
                } else if ($data['hr_name'] == 'LnD_group') {
                    $_SESSION['id_user_employee'] = $data['id'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['hr_name'] = $data['hr_name'];
                    $_SESSION['last_login_time'] = time();

                    echo "<script>
                    window.location.href = 'view/group/lnd_g.php';
                    </script>";
                } else if ($data['hr_name'] == 'organization_group') {
                    $_SESSION['id_user_employee'] = $data['id'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['hr_name'] = $data['hr_name'];
                    $_SESSION['last_login_time'] = time();

                    echo "<script>
                    window.location.href = 'view/group/od_g.php';
                    </script>";
                } else if ($data['hr_name'] == 'talent_group') {
                    $_SESSION['id_user_employee'] = $data['id'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['hr_name'] = $data['hr_name'];
                    $_SESSION['last_login_time'] = time();

                    echo "<script>
                    window.location.href = 'view/group/ta_g.php';
                    </script>";
                } else {
                    echo "<script>
                    window.location.href = 'login.php';
                    </script>";
                }
            } else if ($data['level'] == 1) {

                $_SESSION['id_user_admin'] = $data['id'];
                $_SESSION['username_admin'] = $data['username'];
                $_SESSION['level'] = '1';
                $_SESSION['last_login_time'] = time();

                echo "<script>
                window.location.href = 'index.php';
                </script>";
            }
        } else {
            $_SESSION['error'] = "Failed login";
            echo "<script>
            window.location.href = 'login.php';
            </script>";
        }
    } else {
        // Jika data user tidak ditemukan
        $_SESSION['error'] = "Failed login";

        echo "<script>
            window.location.href = 'login.php';
            </script>";
    }
}
