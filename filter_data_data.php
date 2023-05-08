<?php
require_once 'koneksi.php';
session_start();

if (isset($_GET['submit'])) {
    $first_name = $_GET['first_name'];
    // $grade_name = $_GET['grade_name'];
    // $city = $_GET['city'];
    $citizenship = $_GET['citizenship'];

    // $sql = "SELECT * FROM employee"; 
    $sql = "SELECT *, CONCAT(first_name, ' ', middle_name, ' ', last_name)
    AS Full_Name, provinces.name AS name_of_provinces, employee.nik AS nik_of_employee,
    hrmposition.position_level AS position_level
    FROM employee 
    JOIN provinces ON provinces.id = employee.birth_place
    JOIN regencies ON regencies.id = employee.regencies
    JOIN hrmposition ON hrmposition.position_id = employee.grade_name
    JOIN geo_countries ON employee.negara = geo_countries.abv
    ";

    $filterCriteria = array();

    if ($first_name !== "") {
        $filterCriteria[] = "first_name LIKE '%" . $first_name . "%'";
    }
    // if ($grade_name !== "") {
    //     $filterCriteria[] = "grade_name LIKE '%" . $grade_name . "%'";
    // }
    // if ($city !== "") {
    //     $filterCriteria[] = "regencies LIKE '%" . $city . "%'";
    // }
    if ($citizenship !== "") {
        $filterCriteria[] = "kewarganegaraan LIKE '%" . $citizenship . "%'";
    }
    if (count($filterCriteria) > 0) {
        $sql .= " WHERE " . implode(" AND ", $filterCriteria);
    }

    $result = mysqli_query($koneksi, $sql);

    // var_dump($result);


    if (mysqli_num_rows($result) > 0) {
    } else {
        echo "<script>
                alert('Failed: Tidak ada data');
                window.location.href = 'filter_data.php';
                </script>";
        exit();
    }
}


// if ($first_name || $middle_name || $last_name && $grade_name || $citizenship && $citizenship) {
//     $sql 
// }

// $result = mysqli_query($koneksi, $sql .= " WHERE first_name LIKE '%" . $first_name . "%' OR
// middle_name LIKE '%" . $middle_name . "%' OR 
// last_name LIKE '%" . $last_name . "%' OR
// grade_name LIKE '%" . $grade_name . "%' OR
// regencies LIKE '%" . $city . "%' OR
// kewarganegaraan '%" . $citizenship . "%'");
