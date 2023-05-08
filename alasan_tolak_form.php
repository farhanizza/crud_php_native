<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylingTolakForm.css">
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col">
                <div class="d-flex justify-content-center flex-column align-items-center">
                    <h1>
                        Alasan Menolak Form
                    </h1>
                </div>
                <div class="form-alasan mt-5">
                    <form action="update_status_user.php" method="post">
                        <input type="hidden" name="id_user" id="" value="<?php echo $_GET['id'] ?>">
                        <label for="pesan">Pesan</label>
                        <br>
                        <input type="text" name="pesan">
                        <p>*Maksimum 150 kata</p>
                        <button type="submit" class="btn btn-success">Kirim pesan</button>
                    </form>
                    <a href="view_non_formal.php?id=<?php echo $_GET['id'] ?>">
                        <button class="btn btn-danger">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>