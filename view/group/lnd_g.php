<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['hr_name'] !== 'LnD_group') {
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
    <link rel="stylesheet" href="../../css/StylingLnd.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
            <div class="square-lnd">
                <h1>LnD</h1>
                <h3>
                    Learning and Development
                </h3>
                <div class="max-width-p">
                    <p>
                        Learning and Development adalah suatu bidang yang berkaitan dengan pengembangan keterampilan dan pengetahuan individu dalam organisasi. Tujuannya adalah untuk meningkatkan kinerja individu dan organisasi secara keseluruhan.
                    </p>
                </div>
                <div class="button-lnd">
                    <a href="../lnd.php">
                        <button class="btn btn-primary">Go to LnD</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="square-payroll">
                <h1>Payroll</h1>
                <h3>
                    Human Resource Payroll
                </h3>
                <div class="max-width-p">
                    <p>
                        Payroll adalah proses penggajian karyawan di suatu perusahaan. Proses ini mencakup perhitungan gaji dan tunjangan karyawan berdasarkan upah atau gaji pokok mereka, penghitungan potongan pajak, iuran asuransi, dan pengurangan dari jumlah gaji untuk berbagai alasan seperti absensi, cuti, dan keterlambatan.
                    </p>
                </div>
                <div class="button-payroll">
                    <a href="../payroll.php">
                        <button class="btn btn-primary">Go to HRPayroll</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>