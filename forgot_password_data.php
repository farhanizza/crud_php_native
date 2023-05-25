<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';
session_start();


if (isset($_POST['email'])) {
    require_once 'koneksi.php';
    $email = $_POST['email'];
    $token = generateToken();
    $_SESSION['token'] = $token;
    // saveTokenToDatabase($token, $email);
    mysqli_query($koneksi, "INSERT INTO hr_reset_password (token, email, status_change) VALUES ('$token', '$email', 'valid_token')");
    sendResetPasswordToEmail($token, $email);
    mysqli_query($koneksi, "UPDATE hr_qr_code SET status = 'invalid_token'");
} else {
    echo "<script>
        alert('tidak ada email yang dikirim');
        window.location.href = 'forgot_password.php';
        </script>";
    exit();
}

function generateToken()
{
    $token = bin2hex(random_bytes(32));
    return $token;
}

function saveTokenToDatabase($token, $email)
{
    require_once 'koneksi.php';
    mysqli_query($koneksi, "INSERT INTO hr_reset_password (token, email, status_change) VALUES ('$token', '$email', 'valid_token')");
    mysqli_close($koneksi);
}

function sendResetPasswordToEmail($token, $email)
{
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'adiejanto1617@gmail.com';
    $mail->Password = 'uxkovvxdqzmmbmzk';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Pengirim
    $mail->setFrom('adiejanto1617@gmail.com', 'HRIS Team');

    // Penerima
    $mail->addAddress($email);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Reset Password';
    $mail->Body = 'Klik link berikut untuk reset password: http://' . gethostbyname(gethostname()) . '/DASAR/forgot_password_new_password.php?token=' . $token;

    if ($mail->send()) {
        echo "<script>
        alert('Silahkan cek email anda');
        window.location.href = 'login.php?status=reset_password_sent';
        </script>";
    } else {
        echo "<script>
        alert('tidak ada email yang dikirim');
        window.location.href = 'forgot_password.php?status=email_tidak_terkirim';
        </script>";
    }
}
