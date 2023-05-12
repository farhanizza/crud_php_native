<?php
require_once 'koneksi.php';
session_start();
// Cek apakah sudah login
if (!isset($_SESSION['username_admin']) || $_SESSION['level'] !== '0') {
    echo
    "<script>
    alert('Login first');
    window.location.href = 'login.php';
    </script>";
} else {
    // 20 * 60 = 1200 detik (20 menit) untuk durasi waktu sesi
    if ((time() - $_SESSION['last_login_time']) > 1200) {
        header("location: logout.php");
    }
}

$id = $_GET['id'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylingVerifikasiManualImg.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center mt-5">
                    <h1>
                        Verifikasi Dokumen Manual
                    </h1>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <div class="image-verifikas">
                        <?php
                        $sql_file = mysqli_query($koneksi, "SELECT sertifikat FROM hrm_user WHERE id = $id");
                        $data_file = mysqli_fetch_array($sql_file);
                        ?>
                        <embed src="file/<?php echo $data_file['sertifikat'] ?>" style="width: 1015px; height: 759px;"></embed>
                    </div>
                </div>
                <div class="d-flex justify-content-around mt-3 manual-box">
                    <div class="d-flex align-items-center flex-column manual-box-inside">
                        <div class="text-inform">
                            <p>*Hal terpenting ketika cek manual</p>
                            <p>*Cek nama insitusi yang menerbitkan sertifikat</p>
                            <p>*Periksa tanda tangan dan stempel</p>
                            <p>*Verifikasi melalui pihak yang menerbitkan sertifikat</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-column">
                        <div class="text-inform">
                            <p>*Periksa tautan URL atau QR code (Jika ada)</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center mb-5 mt-5 manual-button">
                    <a href="verifikasi_dokumen_asli.php?id=<?php echo $id ?>">
                        <button class="btn btn-success" onclick="">Dokumen Asli</button>
                    </a>
                    <div class="mt-4 mb-4">
                        <a href="alasan_menolak_dokumen.php?id=<?php echo $id ?>">
                            <button class="btn btn-danger btn-palsu">Dokumen Palsu</button>
                        </a>
                    </div>
                    <a href="verifikasi_dokumen.php?id=<?php echo $id ?>">
                        <button class="btn btn-light">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>