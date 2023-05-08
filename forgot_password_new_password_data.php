<?php
if (isset($_POST['password']) && isset($_POST['token'])) {
    require_once 'koneksi.php';
    $password = $_POST['password'];
    $token = $_POST['token'];
    $result = mysqli_query($koneksi, "SELECT * FROM reset_password WHERE token = '$token' AND status_change = 'valid_token'");
    $invalid_token = mysqli_query($koneksi, "SELECT * FROM reset_password WHERE status_change = 'invalid_token'");
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_array($result);
        $email = $data['email'];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        mysqli_query($koneksi, "UPDATE register SET password = '$hashed_password' WHERE email = '$email'");
        mysqli_query($koneksi, "UPDATE reset_password SET status_change = 'invalid_token' where token = '$token'");

        echo "<script>
        alert('Password telah berubah');
        window.location.href = 'login.php?status=password_changed';
        </script>";
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
