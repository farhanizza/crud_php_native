<?php
if (isset($_POST['password']) && isset($_POST['token'])) {
    require_once 'koneksi.php';
    $password = $_POST['password'];
    $token = $_POST['token'];
    $result = mysqli_query($koneksi, "SELECT * FROM hr_reset_password WHERE token = '$token' AND status_change = 'valid_token'");
    $invalid_token = mysqli_query($koneksi, "SELECT * FROM hr_reset_password WHERE status_change = 'invalid_token'");
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_array($result);
        $email = $data['email'];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        if (mysqli_query($koneksi, "UPDATE hr_employee SET password = '$hashed_password' WHERE email = '$email'")) {
            if (mysqli_affected_rows($koneksi) > 0) {
                echo "<script>
                alert('Password telah berubah');
                window.location.href = 'login.php?status=password_changed';
                </script>";
                mysqli_query($koneksi, "UPDATE hr_reset_password SET status_change = 'invalid_token' where token = '$token'");
            } else {
                echo "<script>
                alert('Email tidak terdaftar');
                window.location.href = 'login.php?status=password_changed_failed';
                </script>";
            }
        } else {
            echo "<script>
                alert('Terjadi Kesalahan');
                window.location.href = 'login.php?status=password_changed_failed';
                </script>";
        }
    } else if (mysqli_num_rows($invalid_token) == 1) {
        echo "<script>
        alert('Token error');
        window.location.href = 'login.php?status=token_removed';
        </script>";
        exit();
    }
} else {
    echo "<script>
        alert('Token error');
        window.location.href = 'login.php?status=token_removed';
        </script>";
    exit();
}
