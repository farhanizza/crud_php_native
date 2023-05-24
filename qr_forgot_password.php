<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center mt-5">
                    <h1>Silahkan scan QR Code untuk reset password</h1>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <?php
                    // Panggil library PHP QR Code
                    session_start();
                    include 'phpqrcode/qrlib.php';
                    include 'koneksi.php';
                    include 'config/log_server.php';

                    $key = bin2hex(random_bytes(16));
                    $_SESSION['key_qr'] = $key;
                    // echo $_SESSION['key_qr'];
                    // Isi data QR Code
                    // . $key
                    $data = gethostbyname(gethostname()) . '/DASAR/forgot_password?' . $key;

                    mysqli_query($koneksi, "INSERT INTO qr_code (token, status) VALUES ('$key', 'valid_token')");

                    // Konfigurasi QR Code
                    $size = 6;
                    $level = 'H';

                    // Generate QR Code
                    QRcode::png($data, 'qr.png', $level, $size);

                    date_default_timezone_set('Asia/Jakarta');
                    write_log_server($_SERVER['SERVER_NAME'], "User melakukan open qr scan", date('Y-m-d : H:i:s', $_SERVER['REQUEST_TIME']), 'qr_open_scanned');

                    // Tampilkan QR Code
                    echo '<img src="qr.png">';
                    ?>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <a href="login.php">
                        <button class="btn btn-primary" style="padding: 0.5rem 3rem 0.5rem 3rem;">
                            Back
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>