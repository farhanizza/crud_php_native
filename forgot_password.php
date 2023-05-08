<?php
require_once 'koneksi.php';

$sql = mysqli_query($koneksi, "SELECT token FROM qr_code WHERE status = 'invalid_token'");

if (mysqli_num_rows($sql) > 0) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylingRegister.css">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col">
            <div class="reset-password-box">
                <div class="center-box">
                    <div class="forgot-password">
                        <form action="forgot_password_data.php" method="post">
                            <label for="email">Email</label>
                            <br>
                            <input type="email" name="email" id="email" onkeydown="return /[a-z0-9@.]/i.test(event.key)" required>
                            <br>
                            <button type="submit" name="btn-reset-password">Reset password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>