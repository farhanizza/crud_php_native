<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['username_admin']) || $_SESSION['level'] !== '1') {
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

$_SESSION['alert'] = "Success Filter Data!";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" stylesheet" href="boostrapV5/bs5.css">
    <link rel="stylesheet" href="css/StylingFilter.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Filter Data</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <h1>
                Filter data employee
            </h1>
        </div>
        <div class="row">
            <div class="col">
                <form action="filter_data_result.php" method="get" id="form_filter_data">
                    <div class="d-flex flex-column">
                        <label for="nik">ID <span class="required">*</span> </label>
                        <input type="text" name="nik" id="nik" onkeydown="return /[a-z0-9- ]/i.test(event.key)" required>

                        <label for="first_name">First name <span class="required">*</span> </label>
                        <input type="text" name="first_name" id="first_name" onkeydown="return /[a-z ]/i.test(event.key)" required>

                        <label for="citizenship">Citizenship <span class="required">*</span> </label>
                        <input type="text" name="citizenship" id="citizenship" onkeydown="return /[a-z ]/i.test(event.key)" required>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-warning mx-5">
                                <a href="index.php" style="text-decoration: none; color: white;">Back</a>
                            </button>
                            <button type="submit" class="btn btn-primary btn-filter">Filter</button>
                            <!-- <a href="filter_data_result.php">
                            </a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="boostrapV5/bs5.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</body>

</html>