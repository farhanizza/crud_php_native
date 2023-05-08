<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylingTolakDokumen.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center mt-5">
                    <h1 style="color: #DB3333">
                        Alasan Menolak Dokumen
                    </h1>
                </div>
                <div class="input-menolak-dokumen">
                    <form action="" method="post">
                        <label for="pesan_menolak_dokumen">Pesan</label>
                        <input type="text" name="pesan_menolak_dokumen" id="pesan_menolak_dokumen">
                        <p>*Maksimum 150 kata</p>
                        <button type="submit" class="btn btn-success">Kirim pesan</button>
                    </form>
                    <a href="verifikasi_dokumen_manual_img.php">
                        <button class="btn btn-danger">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>