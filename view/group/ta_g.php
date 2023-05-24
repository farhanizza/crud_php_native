<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['hr_name'] !== 'talent_group') {
    echo
    "<script>
    alert('Login first');
    window.location.href = '../../login.php';
    </script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRIS</title>
    <link rel="stylesheet" href="../../css/StylingTa.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Talent Group</span>
            <span class="navbar-brand mb-0 h1">Where are you going?</span>
            <span class="navbar-brand mb-0 h1">
                <a href="../../logout.php">
                    <button class="btn btn-primary">Logout</button>
                </a>
            </span>
        </div>
    </nav>
    <div class="row">
        <div class="col">
            <div class="square-ta">
                <h1>HRTA</h1>
                <h3>Human Resource Talent Acquisition</h3>
                <div class="max-width-p">
                    <p>
                        Talent acquisition adalah proses mendapatkan bakat atau calon karyawan terbaik untuk memenuhi kebutuhan organisasi dalam mencapai tujuan bisnis. Proses ini melibatkan strategi dan taktik untuk menarik, merekrut, dan memilih individu yang paling sesuai dengan kriteria posisi kerja yang dibutuhkan.
                    </p>
                </div>
                <div class="button-ta">
                    <a href="../ta.php">
                        <button class="btn btn-primary">Go to HRTA</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="square-tm">
                <h1>HRTM</h1>
                <h3>
                    Human Resource Talent Management
                </h3>
                <div class="max-width-p">
                    <p>
                        Talent management adalah proses merencanakan, merekrut, mengembangkan, dan memelihara karyawan yang berbakat dan memiliki potensi untuk menjadi pemimpin atau kontributor kunci dalam organisasi.
                    </p>
                </div>
                <div class="button-tm">
                    <a href="../tm.php">
                        <button class="btn btn-primary">Go to HRTM</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <?php if (isset($_SESSION['success'])) { ?>
        <script>
            swal("Success Login", "<?php echo $_SESSION['success']; ?>", "success");
        </script>
    <?php unset($_SESSION['success']);
    } ?>
</body>

</html>