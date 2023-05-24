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
    // 20 * 60 = 1200 (20 menit)
    if ((time() - $_SESSION['last_login_time']) > 1200) {
        header("location: logout.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylingView.css">
    <title>CRUD</title>
</head>

<body>
    <?php
    if (isset($_GET['lang'])) {
        $_SESSION['lang'] = $_GET['lang'];
    } else if (!$_SESSION['lang']) {
        $_SESSION['lang'] = 'en';
    }
    include('lang/' . $_SESSION['lang'] . '.php');
    ?>
    <div class="container">
        <?php
        require_once "koneksi.php";
        $id = $_GET["id"];
        $sql_code = mysqli_query($koneksi, "SELECT *, 
        hr_provinces.name AS name_of_provinces,
        hr_countries.name AS name_of_countries, 
        hr_regencies.name AS name_of_regencies, 
        CONCAT(first_name, ' ', middle_name, ' ', last_name) AS Full_Name 
        FROM hr_employee 
        JOIN hr_countries ON hr_employee.negara = hr_countries.abv
        JOIN hr_provinces ON hr_provinces.id = hr_employee.birth_place
        JOIN hr_regencies ON hr_regencies.id = hr_employee.regencies
        JOIN hr_position ON hr_position.position_id = hr_employee.grade_name
        WHERE hr_employee.id = $id");
        while ($data = mysqli_fetch_array($sql_code)) {
        ?>
            <div class="row mt-5 mb-5">
                <div class="col">
                    <div class="header">
                        <div class="d-flex justify-content-center">
                            <h1>
                                Detail Data
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="detail-data">
                        <div class="d-flex flex-column">
                            <div class="image-view mb-5">
                                <img src="image/<?php echo $data['gambar'] ?>" class="rounded" alt="..." style="width: 150px; height: 150px;">
                            </div>
                            <h5><?php echo constant('table_id') ?></h5>
                            <input type="text" disabled value="<?php echo $data['nik'] ?>">
                            <br>

                            <h5><?php echo constant('table_fn') ?></h5>
                            <input type="text" disabled value="<?php echo $data['first_name'] ?>">

                            <br>

                            <h5><?php echo constant('table_mn') ?></h5>
                            <input type="text" disabled value="<?php echo $data['middle_name'] ?>">

                            <br>

                            <h5><?php echo constant('table_ln') ?></h5>
                            <input type="text" disabled value="<?php echo $data['last_name'] ?>">


                            <br>

                            <h5><?php echo constant('table_fln') ?></h5>
                            <input type="text" disabled value="<?php echo $data['Full_Name'] ?>">

                            <br>

                            <h5><?php echo constant('table_bp') ?></h5>
                            <input type="text" disabled value="<?php echo $data['name_of_provinces'] ?>">

                            <br>

                            <h5><?php echo constant('table_city_view') ?>:</h5>
                            <input type="text" disabled value="<?php echo $data['name_of_regencies'] ?>">

                            <br>

                            <h5><?php echo constant('table_bd') ?></h5>
                            <input type="text" disabled value="<?php echo $data['birth_date'] ?>">

                            <br>

                            <h5><?php echo constant('table_gn') ?></h5>
                            <input type="text" disabled value="<?php echo $data['position_level'] ?>">

                            <br>

                            <h5><?php echo constant('table_cityzenship') ?></h5>
                            <input type="text" disabled value="<?php echo $data['kewarganegaraan'] ?>">

                            <br>

                            <h5><?php echo constant('table_nt') ?></h5>
                            <input type="text" disabled value="<?php echo $data['negara'] ?> (<?php echo $data['name_of_countries'] ?>)">

                            <br>

                            <h5><?php echo constant('table_gd') ?></h5>
                            <input type="text" disabled value="<?php echo $data['gender'] ?>">
                        </div>
                    </div>
                    <div class="button-back">
                        <div class="d-flex justify-content-end">
                            <a href="index.php">
                                <button><?php echo constant('btn_back') ?></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>