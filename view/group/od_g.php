<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['hr_name'] !== 'organization_group') {
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
    <link rel="stylesheet" href="../../css/StylingOd.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Organization Group</span>
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
            <div class="square-od">
                <h1>HROD</h1>
                <h3>Human Resource and Organizational Development</h3>
                <div class="max-width-p">
                    <p>
                        HROD adalah bidang yang terkait dengan manajemen sumber daya manusia (SDM) dan pengembangan organisasi, yang bertujuan untuk memaksimalkan kinerja organisasi dengan cara memastikan bahwa SDM di dalamnya terampil, terlatih, dan termotivasi.
                    </p>
                </div>
                <div class="button-od">
                    <a href="../od.php">
                        <button class="btn btn-primary">Go to HROD</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="square-policy">
                <h1>HRPolicy</h1>
                <h3>Policy</h3>
                <div class="max-width-p">
                    <p>
                        HR Policy adalah kebijakan yang berkaitan dengan manajemen sumber daya manusia (SDM) dalam suatu organisasi. HR Policy dapat berupa kebijakan tertulis atau tidak tertulis yang menentukan standar dan prosedur yang harus diikuti oleh karyawan
                    </p>
                </div>
                <div class="button-policy">
                    <a href="../policy.php">
                        <button class="btn btn-primary">Go to policy</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>