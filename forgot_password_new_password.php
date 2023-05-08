<?php
session_start();
if (!isset($_SESSION['token'])) {
    echo
    "<script>
    alert('Token Error');
    window.location.href = 'login.php';
    </script>";
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
    <div class="reset-password-box">
        <div class="center-box">
            <div class="forgot-password">
                <form action="forgot_password_new_password_data.php" method="post">
                    <label for="email">New password:</label>
                    <br>
                    <input type="password" name="password" id="password" required autocomplete="off">
                    <input type="hidden" name="token" id="token" value="<?php echo $_GET['token']; ?>">
                    <br>
                    <button type="submit">Reset password</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>