<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['hr_name'] !== 'HRIT_group') {
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
    <link rel="stylesheet" href="../../css/StylingHrit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">HRIT Group</span>
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
            <div class="square-hris">
                <h1>HRIS</h1>
                <h3>
                    Human Resource Information System
                </h3>
                <div class="max-width-p">
                    <p>
                        HRIS memungkinkan organisasi untuk mengumpulkan, menyimpan, mengatur, dan mengelola data karyawan seperti informasi pribadi, data kehadiran, data penggajian, data kinerja, manajemen talenta, pengembangan karyawan, dan lain sebagainya.
                    </p>
                </div>
                <div class="button-hris">
                    <a href="../hris.php">
                        <button class="btn btn-primary">Go to HRIS</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="square-hrops">
                <h1>HROPS</h1>
                <h3>
                    Human Resource Operations
                </h3>
                <div class="max-width-p">
                    <p>
                        HROPS dapat bekerja dengan fungsi-fungsi lain di departemen SDM, seperti manajemen talenta dan pengembangan karyawan, untuk memastikan bahwa operasi harian SDM berjalan dengan efektif dan efisien.
                    </p>
                </div>
                <div class="button-hrops">
                    <a href="../hrops.php">
                        <button class="btn btn-primary">Go to HROPS</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="square-hrpm">
                <h1>HRPM</h1>
                <h3>
                    Human Resource Perfomance Management
                </h3>
                <div class="max-width-p">
                    <p>
                        organisasi dapat memperoleh keuntungan dari karyawan yang lebih terampil dan terlatih, meningkatkan produktivitas dan efisiensi operasional, dan mendorong pengembangan karyawan yang lebih baik secara keseluruhan.
                    </p>
                </div>
                <div class="button-hrpm">
                    <a href="../hrpm.php">
                        <button class="btn btn-primary">Go to HRPM</button>
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