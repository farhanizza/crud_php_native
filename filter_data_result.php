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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" stylesheet" href="boostrapV5/bs5.css">
    <link rel="stylesheet" href="css/StylingFilter.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Filter Data</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <h1>
                    Result filter
                </h1>
            </div>
            <div class="col">
                <div class="data-table">
                    <table id="myTable" class="display responsive data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>Middle name</th>
                                <th>Last name</th>
                                <th>Full name</th>
                                <th>Birth place</th>
                                <th>City</th>
                                <th>Birth date</th>
                                <th>Grade name</th>
                                <th>Negara</th>
                                <th>Gender</th>
                                <th>kewarganegaraan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'koneksi.php';

                            $nik = $_GET['nik'];
                            $first_name = $_GET['first_name'];
                            $citizenship = $_GET['citizenship'];

                            $sql = "SELECT *, CONCAT(first_name, ' ', middle_name, ' ', last_name)
                            AS full_name, hr_provinces.name AS name_of_provinces, hr_employee.nik AS nik_of_employee,
                            hr_position.position_level AS position_level, hr_regencies.name AS name_of_city, hr_countries.name AS name_of_country
                            FROM hr_employee 
                            JOIN hr_provinces ON hr_provinces.id = hr_employee.birth_place
                            JOIN hr_regencies ON hr_regencies.id = hr_employee.regencies
                            JOIN hr_position ON hr_position.position_id = hr_employee.grade_name
                            JOIN hr_countries ON hr_employee.negara = hr_countries.abv
                            ";

                            $filter = array();

                            if ($first_name !== "") {
                                $filter[] = "hr_employee.first_name LIKE '%$first_name%'";
                            }

                            if ($nik !== "") {
                                $filter[] = "hr_employee.nik LIKE '%$nik%'";
                            }

                            if ($citizenship !== "") {
                                $filter[] = "hr_employee.kewarganegaraan LIKE '%$citizenship%'";
                            }

                            if (count($filter) > 0) {
                                $sql .= " WHERE " . implode(" AND ", $filter);
                            }

                            $result = mysqli_query($koneksi, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?php echo $data['nik'] ?></td>
                                        <td><?php echo $data['first_name'] ?></td>
                                        <td><?php echo $data['middle_name'] ?></td>
                                        <td><?php echo $data['last_name'] ?></td>
                                        <td><?php echo $data['full_name'] ?></td>
                                        <td><?php echo $data['name_of_provinces'] ?></td>
                                        <td><?php echo $data['name_of_city'] ?></td>
                                        <td><?php echo $data['birth_date'] ?></td>
                                        <td><?php echo $data['position_level'] ?></td>
                                        <td><?php echo $data['negara'] ?> (<?php echo $data['name_of_country'] ?>)</td>
                                        <td><?php echo $data['gender'] ?></td>
                                        <td><?php echo $data['kewarganegaraan'] ?></td>
                                    </tr>
                                <?php } ?>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end button-back-result">
                    <a href="filter_data.php">
                        <button class="btn btn-primary">
                            Back
                        </button>
                    </a>
                </div>
            </div>
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });
        });
    </script>

    <!-- Sweet Alert -->
    <?php if (isset($_SESSION['alert'])) { ?>
        <script>
            swal("Success Filter Data", "<?php echo $_SESSION['alert']; ?>", "success")
        </script>
    <?php unset($_SESSION['alert']);
    } ?>
    <!-- End -->
</body>

</html>