<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['username_admin']) || $_SESSION['level'] !== '0') {
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

// Multi language
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
} else {
    // if (!$_SESSION['lang'])
    $_SESSION['lang'] = 'en';
}
include('lang/' . $_SESSION['lang'] . '.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel=" stylesheet" href="boostrapV5/bs5.css">
    <link rel="stylesheet" href="css/Styling.css">
    <link rel="stylesheet" href="css/icon/feather.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="container-pd">
        <div class="row">
            <div class="col">
                <div class="header d-flex justify-content-center">
                    <?php
                    require_once 'koneksi.php';
                    $username = $_SESSION['username_admin'];
                    $res = mysqli_query($koneksi, "SELECT * FROM register WHERE username = '$username'");
                    $data = mysqli_fetch_array($res);
                    ?>
                    <h3>
                        Employee data | <?php echo $data['username'] ?>
                    </h3>
                    <!-- <div class="hamburger-menu">
                        <div class="navbar-toggle">
                            <i data-feather="align-right" class="feather-42"></i>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="row button-top">
            <div class="col">
                <div class="d-flex">
                    <div class="add">
                        <button data-toggle="modal" data-target="#Modal-add"><?php echo constant('button_add'); ?></button>
                    </div>
                    <div class="selection mx-3">
                        <select id="select_lang" onchange="change_lang(this.value)" class="form-select" aria-label="Default select example">
                            <option value="" selected><?php echo constant("web_option_select"); ?></option>
                            <option value="en">English</option>
                            <option value="id">Bahasa</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <div class="excel">
                        <a href="non_formal.php" class="a_non-formal" style="text-decoration: none;">
                            <button class="btn btn-primary button_non-formal">List Non Formal</button>
                        </a>
                        <a href="excel.php" target="_blank" id="excel" class="a_excel" style="text-decoration: none;">
                            <button id="button_excel" class="button_excel" onclick="downloadExcel()">
                                <?php echo constant('button_excel') ?>
                            </button>
                        </a>
                        <a href="logout.php" class="a_logout">
                            <button class="button_logout">
                                <?php echo constant('button_logout') ?>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end">
                    <div class="filter_button">
                        <a href="filter_data.php">
                            <button class="btn btn-primary">
                                Filter data
                            </button>
                        </a>
                    </div>
                    <div class="search">
                        <form method="get">
                            <div class="input-group mb-3">
                                <input type="text" name="search" id="search" class="form-control" placeholder="<?php echo constant('button_search') ?>" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="null">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col">
                <div class="table table-responsive">
                    <table class="table table-striped table2excel" id="table_excel">
                        <thead class="table-light">
                            <tr>
                                <th scope="col"><?php echo constant('table_id') ?></th>
                                <th scope="col"><?php echo constant('table_fn') ?></th>
                                <th scope="col"><?php echo constant('table_mn') ?></th>
                                <th scope="col"><?php echo constant('table_ln') ?></th>
                                <th scope="col"><?php echo constant('table_fln') ?></th>
                                <th scope="col"><?php echo constant('table_bp') ?></th>
                                <th scope="col"><?php echo constant('table_bd') ?></th>
                                <th scope="col"><?php echo constant('table_gn') ?></th>
                                <th scope="col"><?php echo constant('table_ac') ?></th>
                            </tr>
                        </thead>
                        <tbody id="tampil">
                            <?php
                            require_once 'koneksi.php';

                            // pagination membagi halaman
                            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                            $page_early   = ($page > 1) ? ($page * 5) - 5 : 0;

                            $sebelum = $page - 1;
                            $setelah = $page + 1;

                            $sql = mysqli_query($koneksi, "SELECT * FROM employee");
                            $row = mysqli_num_rows($sql);

                            $total_pages = ceil($row / 5);

                            $sql_code = mysqli_query($koneksi, "SELECT *, CONCAT(first_name, ' ', middle_name, ' ', last_name)
                            AS Full_Name, 
                            provinces.name AS name_of_provinces, 
                            employee.id AS id_of_employee
                            FROM employee 
                            JOIN provinces ON provinces.id = employee.birth_place
                            JOIN hrmposition ON hrmposition.position_id = employee.grade_name   
                            ORDER BY employee.id ASC
                            LIMIT $page_early, 5");

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
                                                <a href="view.php?id=<?php echo $data['id_of_employee'] ?>">
                                                    <button>
                                                        <?php echo constant('btn_view'); ?>
                                                    </button>
                                                </a>
                                            </div>

                                            <div class="button-edit">
                                                <a href="edit.php?id=<?php echo $data['id_of_employee'] ?>">
                                                    <button>
                                                        <?php echo constant('btn_edit'); ?>
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="button-delete">
                                                <a href="delete.php?id=<?php echo $data['id_of_employee'] ?>">
                                                    <button onclick="return confirmDelete()">
                                                        <?php echo constant('btn_delete'); ?>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" <?php if ($page > 1) {
                                                            echo "href='?page=$sebelum'";
                                                        } ?>><?php echo constant('pg_prev'); ?></a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $total_pages; $i++) {
                            ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>"> <?php echo $i; ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" <?php if ($page < $total_pages) {
                                                            echo "href='?page=$setelah'";
                                                        } ?>><?php echo constant('pg_next'); ?></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Pagination -->

        <!-- Modal insert -->
        <div class="modal fade" id="Modal-add">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo constant('header_insert') ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Isi modal -->
                    <div class="modal-body">
                        <!-- FORM -->
                        <form action="insert.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-insert">
                                        <div class="d-flex flex-column input-field">

                                            <p><?php echo constant('table_cityzenship') ?>:</p>
                                            <div class="d-flex" style="margin-top: -1rem;">
                                                <input type="radio" name="kewarganegaraan" id="wni" value="WNI" required onclick="disableInput()" style="margin-top: -0.1rem;">
                                                <label for="wni" class="mt-2 mx-1">WNI</label>

                                                <div class="mx-3 input-kewarganegaraan">
                                                    <input type="radio" name="kewarganegaraan" id="expat" value="Expat" required onclick="liveInput()">
                                                    <label for="expat" class="mt-1 mx-1">Expat</label>
                                                </div>
                                            </div>

                                            <?php
                                            $data_negara = mysqli_query($koneksi, "SELECT * FROM geo_countries");
                                            ?>
                                            <div class="form-group mb-3" id="negara_visible" style="display: none;">
                                                <label for="negara"><?php echo constant('table_cc') ?>:</label>
                                                <select class="form-control" id="negara" name="negara" required style="padding: 0.5rem 1rem 0.5rem 1rem; border-radius: 5px; border: none; background-color: #eaf4f4;">
                                                    <option value="" disabled>-- <?php echo constant('table_cc') ?> --</option>
                                                    <option value="ID">Indonesia</option>
                                                    <?php while ($data_country = mysqli_fetch_array($data_negara)) { ?>
                                                        <option value="<?php echo $data_country['abv'] ?>" id="option_negara"> <?php echo $data_country['name'] ?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>

                                            <label for="nik"><?php echo constant('table_id') ?></label>

                                            <input type="text" name="nik" id="nik" onkeydown="return /[A-Z0-9-]/i.test(event.key)" required autocomplete="null" maxlength="16">
                                            <p class="p-info">*<?php echo constant('p_example') ?>: MB-001</p>

                                            <br>

                                            <label for="first_name"><?php echo constant('table_fn') ?>: </label>

                                            <input type="text" name="first_name" id="first_name" onkeydown="return /[a-z ]/i.test(event.key)" required autocomplete="null">
                                            <p class="p-info">*<?php echo constant('p_example') ?>: Farhan</p>

                                            <br>

                                            <label for="middle_name"><?php echo constant('table_mn') ?>: </label>

                                            <input type="text" name="middle_name" onkeydown="return /[a-z ]/i.test(event.key)" autocomplete="null">
                                            <p class="p-info">*<?php echo constant('p_example') ?>: Izzaturrahman</p>

                                            <br>

                                            <label for="last_name"><?php echo constant('table_ln') ?>: </label>

                                            <input type="text" name="last_name" onkeydown="return /[a-z ]/i.test(event.key)" autocomplete="null">
                                            <p class="p-info">*<?php echo constant('p_example') ?>: Andiejanto</p>

                                            <br>

                                            <?php
                                            $sql_provinsi = mysqli_query($koneksi, "SELECT * FROM provinces ORDER BY name ASC");
                                            ?>
                                            <div class="div" id="province" style="display: none; margin-left: -0.5rem;">
                                                <div class="form-group mb-3">
                                                    <label for="provinsi"><?php echo constant('table_prov') ?>:</label>
                                                    <select class="form-control" id="provinsi" name="provinsi" required style="padding: 0.5rem 1rem 0.5rem 1rem; border-radius: 5px; border: none; background-color: #eaf4f4;">
                                                        <option value="" disabled>-- <?php echo constant('table_prov') ?> --</option>
                                                        <option value="99">WNA</option>
                                                        <?php while ($data_provinsi = mysqli_fetch_array($sql_provinsi)) { ?>
                                                            <option value="<?php echo $data_provinsi['id'] ?>"> <?php echo $data_provinsi['name'] ?></option>
                                                        <?php }; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="kota"><?php echo constant('table_city') ?>:</label>
                                                    <select class="form-control" id="kota" name="kota" style="padding: 0.5rem 1rem 0.5rem 1rem; border-radius: 5px; border: none; background-color: #eaf4f4;">
                                                        <option value="9999">WNA</option>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <br>

                                            <label for="birth_date"><?php echo constant('table_bd') ?>: </label>

                                            <input type="date" name="birth_date" id="birth_date" required autocomplete="null">
                                            <p class="p-info">*<?php echo constant('p_example') ?>: <?php echo constant('p_date') ?></p>

                                            <br>


                                            <?php
                                            $sql_hrmposition = mysqli_query($koneksi, "SELECT * FROM hrmposition");
                                            ?>

                                            <label for="grade_name"><?php echo constant('table_gn') ?>: </label>

                                            <div class="form-group mb-3">
                                                <select class="form-control" name="grade_name" required style="padding: 0.5rem 1rem 0.5rem 1rem; border-radius: 5px; border: none; background-color: #eaf4f4;">
                                                    <option value="" disabled>-- <?php echo constant('table_gn') ?> --</option>
                                                    <?php while ($data_hrmposition = mysqli_fetch_array($sql_hrmposition)) { ?>
                                                        <option value="<?php echo $data_hrmposition['position_id'] ?>"> <?php echo $data_hrmposition['position_level'] ?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>

                                            <?php
                                            $sql_hr = mysqli_query($koneksi, "SELECT name FROM hr_collab");
                                            ?>

                                            <label for="hr_name">HR Name:</label>

                                            <div class="form-group mb-3">
                                                <select class="form-control" name="hr_name" required style="padding: 0.5rem 1rem 0.5rem 1rem; border-radius: 5px; border: none; background-color: #eaf4f4;">
                                                    <option value="" disabled>Pilih HR Name</option>
                                                    <?php while ($data_hr_name = mysqli_fetch_array($sql_hr)) { ?>
                                                        <option value="<?php echo $data_hr_name['name'] ?>"><?php echo $data_hr_name['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <br>

                                            <label for="image">Upload <?php echo constant('table_image') ?>:</label>

                                            <input type="file" name="image" id="image" required>
                                            <p class="p-info">*<?php echo constant('p_example') ?>: <?php echo constant('p_image') ?></p>


                                            <br>

                                            <p><?php echo constant('table_gd') ?>:</p>
                                            <div class="d-flex" style="margin-top: -1rem;">
                                                <input type="radio" name="gender" id="Laki-laki" value="Laki-laki" required style="margin-top: -0.1rem;">
                                                <label for="Laki-laki" class="mt-2 mx-1"><?php echo constant('table_gd_lk') ?></label>

                                                <div class="mx-3 input-gender">
                                                    <input type="radio" name="gender" id="Perempuan" value="Perempuan" required>
                                                    <label for="Perempuan" class="mt-1 mx-1"><?php echo constant('table_gd_p') ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer modal -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo constant('btn_cancel') ?></button>
                                <button type="submit" class="btn btn-primary"><?php echo constant('btn_save') ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function change_lang(value) {
            window.location.replace("?lang=" + value);
        }
    </script>
    <script>
        function downloadExcel() {
            setTimeout(function() {
                window.close();
            }, 3000);
        }
    </script>
    <script>
        feather.replace()
    </script>
    <script>
        const toogleHamburgerButton = document.querySelector('.navbar-toggle');
        const insideMenu = document.querySelector('.button-top');

        toogleHamburgerButton.addEventListener('click', () => {
            insideMenu.classList.toggle('show');
            // alert('Resposnive');
        });
    </script>
    <!-- CDN -->
    <script src="boostrapV5/bs5.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- END CDN -->

    <!-- JS FILE AND JQUERY -->
    <script src="js/delete_prompt.js"></script>
    <script src="js/jquery.live_search.js"></script>
    <script src="js/jquery.birth_place.js"></script>
    <script src="js/validation.js"></script>
    <!-- <script src="js/jquery.table2excel.js"></script> -->
    <!-- <script src="js/jquery.button_excel.js"></script> -->
    <!-- END JS AND JQUERY -->
</body>

</html>