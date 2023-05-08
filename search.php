<?php
require_once 'koneksi.php';

session_start();

// Cek apakah sudah login
if (!isset($_SESSION['username'])) {
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


if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
} else if (!$_SESSION['lang']) {
    $_SESSION['lang'] = 'en';
}
include('lang/' . $_SESSION['lang'] . '.php');

$keyword = "";
if (isset($_POST['search'])) {
    // Query untuk mencari
    $keyword = $_POST['search'];
    $sql_code = mysqli_query($koneksi, "SELECT *, CONCAT(first_name, ' ', middle_name, ' ', last_name)
    AS Full_Name, 
    provinces.name AS name_of_provinces, 
    employee.id AS id_of_employee
    FROM employee 
    JOIN provinces ON provinces.id = employee.birth_place
    JOIN hrmposition ON hrmposition.position_id = employee.grade_name   
    WHERE nik LIKE '%" . $keyword . "%' OR 
    first_name LIKE '%" . $keyword . "%' OR
    grade_name LIKE '%" . $keyword . "%' OR
    middle_name LIKE '%" . $keyword . "%' OR
    last_name LIKE '%" . $keyword . "%' OR
    provinces.name LIKE '%" . $keyword . "%'
    ORDER BY employee.id ASC LIMIT 5");

    if (mysqli_num_rows($sql_code) > 0) {
        while ($data = mysqli_fetch_array($sql_code)) {
?>
            <tr>
                <td><?php echo $data['nik'] ?></td>
                <td><?php echo $data['first_name'] ?></td>
                <td><?php echo $data['middle_name'] ?></td>
                <td><?php echo $data['last_name'] ?></td>
                <td><?php echo $data['Full_Name'] ?></td>
                <td><?php echo $data['name_of_provinces'] ?></td>
                <td><?php echo $data['birth_date'] ?></td>
                <td><?php echo $data['position_level'] ?></td>
                <td>
                    <div class="d-flex">
                        <div class="button-view">
                            <a href="view.php?id=<?php echo $data['id'] ?>">
                                <button>
                                    View
                                </button>
                            </a>
                        </div>

                        <div class="button-edit">
                            <a href="edit.php?id=<?php echo $data['id'] ?>">
                                <button>
                                    Edit
                                </button>
                            </a>
                        </div>
                        <div class="button-delete">
                            <a href="delete.php?id=<?php echo $data['id'] ?>">
                                <button onclick="return confirmDelete()">
                                    Delete
                                </button>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <td>No data found</td>
    <?php } ?>
<?php } ?>