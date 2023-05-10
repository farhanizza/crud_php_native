<?php
require_once 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylingVerifikasiDokumen.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center mt-5">
                    <h1>
                        Verifikasi Dokumen
                    </h1>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <div class="mt-3 text-sertifikat">
                        <h4>
                            Silahkan input nomor sertifikat yang anda ingin verifikasi
                        </h4>
                    </div>
                </div>
                <div class="form-sertifikat">
                    <?php $id = $_GET['id']; ?>
                    <form action="verifikasi_nomer_sertifikat.php" method="post">
                        <input type="hidden" name="id_user" id="" value="<?php echo $id ?>">
                        <label for="nomor_sertifikat">Nomor sertifikat</label>
                        <input type="text" name="nomor_sertifikat" id="" autocomplete="off" required>
                        <button type="submit" class="btn btn-success">Cek otomatis</button>
                    </form>
                    <a href="verifikasi_dokumen_manual_img.php?id=<?php echo $id ?>">
                        <button class="btn btn-warning btn-manual">Cek manual</button>
                    </a>
                    <a href="view_non_formal.php?id=<?php echo $id ?>">
                        <button class="btn btn-warning btn-back">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>