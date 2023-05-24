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


if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
} else if (!$_SESSION['lang']) {
    $_SESSION['lang'] = 'en';
}
include('lang/' . $_SESSION['lang'] . '.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylingEdit.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Edit</title>
</head>

<body>
    <div class="container">
        <?php
        require_once "koneksi.php";
        $id = $_GET['id'];
        $sql_code = mysqli_query($koneksi, "SELECT *, CONCAT(first_name, ' ', middle_name, ' ', last_name) AS Full_Name FROM hr_employee WHERE id = '$id'");
        $data_negara = mysqli_query($koneksi, "SELECT * FROM hr_countries");

        while ($data = mysqli_fetch_array($sql_code)) {
        ?>
            <div class="row mt-5 mb-5">
                <div class="col">
                    <div class="header">
                        <div class="d-flex justify-content-center">
                            <h1>
                                Edit Data
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="detail-data">
                        <form id="form_edit" enctype="multipart/form-data">
                            <div class="d-flex flex-column detail-data-input">

                                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">

                                <h5>Pilih kewarganegaraan:</h5>
                                <div class="d-flex">
                                    <input type="radio" class="mt-1" name="kewarganegaraan" id="wni" value="WNI" <?php if ($data['kewarganegaraan'] == "WNI") echo 'checked' ?> required onclick="disableInput()">
                                    <label for="wni" class="mx-2">WNI</label>

                                    <div class="mx-3">
                                        <input type="radio" class="mt-1" name="kewarganegaraan" id="expat" value="Expat" <?php if ($data['kewarganegaraan'] == "Expat") echo 'checked' ?> required onclick="liveInput()">
                                        <label for="expat" class="mx-2">Expat</label>
                                    </div>
                                </div>

                                <div class="form-group mb-4" id="negara_visible" style="display: none;">
                                    <label for="negara" class="mt-3 mb-3" style="font-weight: bold;"><?php echo constant('table_cc') ?>:</label>
                                    <select class="form-control" id="negara" name="negara" required style="padding: 1rem 2rem 1rem 2rem; background-color: #e7ecef; border: none; color: #001427; font-weight: 500; border-radius: 10px;">
                                        <option value="" disabled>-- <?php echo constant('table_cc') ?> --</option>
                                        <option value="ID">Indonesia</option>
                                        <?php while ($data_country = mysqli_fetch_array($data_negara)) { ?>
                                            <option value="<?php echo $data_country['abv'] ?>" <?php if ($data_country['abv'] == $data['negara']) echo 'selected' ?> id="option_negara"> <?php echo $data_country['name'] ?> </option>
                                        <?php }; ?>
                                    </select>
                                </div>

                                <h5><?php echo constant('table_id') ?></h5>
                                <input type="text" name="nik" onkeydown="return /[a-z0-9-]/i.test(event.key)" required value="<?php echo $data['nik'] ?>" maxlength="16">

                                <br>

                                <h5><?php echo constant('table_fn') ?></h5>
                                <input type="text" name="first_name" onkeydown="return /[a-z ]/i.test(event.key)" required value="<?php echo $data['first_name'] ?>">

                                <br>

                                <h5><?php echo constant('table_mn') ?></h5>
                                <input type="text" name="middle_name" onkeydown="return /[a-z ]/i.test(event.key)" value="<?php echo $data['middle_name'] ?>">

                                <br>

                                <h5><?php echo constant('table_ln') ?></h5>
                                <input type="text" name="last_name" onkeydown="return /[a-z ]/i.test(event.key)" value="<?php echo $data['last_name'] ?>">

                                <br>


                                <div class="div" id="province" style="display: none;">
                                    <div class="form-group mb-3">
                                        <label for="provinsi" style="font-weight: bold;"><?php echo constant('table_prov') ?>:</label>
                                        <select class="form-control mt-3" id="provinsi" name="provinsi" required style="padding: 1rem 2rem 1rem 2rem; background-color: #e7ecef; border: none; color: #001427; font-weight: 500; border-radius: 10px;">
                                            <option value="" disabled>-- <?php echo constant('table_prov') ?> --</option>
                                            <option value="99">WNA</option>
                                            <?php
                                            $sql_provinsi = mysqli_query($koneksi, "SELECT * FROM hr_provinces ORDER BY name ASC");
                                            ?>

                                            <?php while ($data_provinsi = mysqli_fetch_array($sql_provinsi)) { ?>
                                                <option value="<?php echo $data_provinsi['id'] ?>" <?php if ($data_provinsi['id'] == $data['birth_place']) echo 'selected' ?>> <?php echo $data_provinsi['name'] ?></option>
                                            <?php }; ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3 mt-4">
                                        <label for="kota" style="font-weight: bold;"><?php echo constant('table_city') ?>:</label>
                                        <select class="form-control mt-3" id="kota" name="kota" required style="padding: 1rem 2rem 1rem 2rem; background-color: #e7ecef; border: none; color: #001427; font-weight: 500; border-radius: 10px;">
                                            <option value="9999">WNA</option>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>

                                <br>

                                <h5><?php echo constant('table_bd') ?></h5>
                                <input type="date" name="birth_date" required value="<?php echo $data['birth_date'] ?>">

                                <br>

                                <?php
                                $sql_hrmposition = mysqli_query($koneksi, "SELECT * FROM hr_position");
                                ?>

                                <h5 for="grade_name"><?php echo constant('table_gn') ?>: </h5>

                                <div class="form-group mb-3">
                                    <select class="form-control" name="grade_name" required style="padding: 1rem 2rem 1rem 2rem; background-color: #e7ecef; border: none; color: #001427; font-weight: 500; border-radius: 10px;">
                                        <option value="" disabled>-- <?php echo constant('table_gn') ?> --</option>
                                        <?php while ($data_hrmposition = mysqli_fetch_array($sql_hrmposition)) { ?>
                                            <option value="<?php echo $data_hrmposition['position_id'] ?>" <?php if ($data_hrmposition['position_id'] == $data['grade_name']) echo 'selected' ?>> <?php echo $data_hrmposition['position_level'] ?></option>
                                        <?php }; ?>
                                    </select>
                                </div>

                                <br>

                                <h5 for="image">Pilih gambar (Format JPG, JPEG, atau PNG) Max 3MB:</h5>
                                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                                <!-- <input type="image" src="image/<?php echo $data['gambar'] ?>" name="image" id="image" value="image/<?php echo $data['gambar'] ?>" style="display: none;"> -->

                                <p><?php echo constant('table_gd') ?></p>
                                <div class="d-flex">
                                    <input type="radio" name="gender" id="Laki-laki" class="mt-1" value="Laki-laki" <?php if ($data['gender'] == "Laki-laki") echo 'checked' ?> required>
                                    <label for="Laki-laki" class="mx-1"><?php echo constant('table_gd_lk') ?></label>

                                    <div class="mx-3">
                                        <input type="radio" name="gender" id="Perempuan" <?php if ($data['gender'] == "Perempuan") echo 'checked' ?> value="Perempuan">
                                        <label for="Perempuan" class="mx-1"><?php echo constant('table_gd_p') ?></label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <div class="button-back">
                                        <button><a href="index.php"><?php echo constant('btn_cancel') ?></a></button>
                                    </div>
                                    <div class="button-submit">
                                        <button type="submit"><?php echo constant('btn_save') ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- END CDN -->

    <!-- JS FILES -->

    <!-- Update -->
    <script>
        $(document).ready(function() {
            $('#form_edit').submit(function(e) {
                e.preventDefault();
                // Isi data Form
                var formData = new FormData(this);

                // Inputan Image
                var fileInput = $('input[name="image"]')[0];
                var file = fileInput.files[0];
                var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                var maxSize = 3 * 1024 * 1024;

                // Inputan Date
                var dateOfBirth = new Date($('input[name="birth_date"]').val());
                var currentDate = new Date();
                var age = currentDate.getFullYear() - dateOfBirth.getFullYear();

                // Inputan NIK dan First Name
                var nik = $.trim($('input[name="nik"]').val());
                var first_name = $.trim($('input[name="first_name"]').val());

                if (age < 17) {
                    // Validasi dibawah 17 tahun
                    swal({
                        title: "Failed Insert Date",
                        text: "You Must Be At Least 17 Years Old!",
                        icon: "error",
                    });
                    return false;
                } else if (isEmpty_or_contains_script_tags(nik)) {
                    // Validasi nik jika kosong dan space
                    swal({
                        title: "Failed Insert NIK",
                        text: "NIK cannot be empty or contain only spaces!",
                        icon: "error"
                    });
                    return false;
                } else if (isEmpty_or_contains_script_tags(first_name)) {
                    // Validasi first name jika kosong dan space
                    swal({
                        title: "Failed Insert First Name",
                        text: "First Name Cannot Be Empty Or Contain Only Spaces!",
                        icon: "error"
                    });
                    return false;
                } else {
                    $.ajax({
                        type: "POST",
                        url: "edit_data.php",
                        data: formData,
                        success: function(response) {
                            // Validasi NIK Sama
                            console.log(response);
                            if (response) {
                                swal({
                                    title: "Success Updated Data!",
                                    text: "Success Updated Data!",
                                    icon: "success"
                                }).then(function() {
                                    location.href = "index.php";
                                })
                            } else if (response === "duplicate") {
                                swal({
                                    title: "Failed Insert Data!",
                                    text: "NIK have already exist",
                                    icon: "error",
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function(xhr, status, error) {
                            swal({
                                title: "Terjadi Kesalahan",
                                text: error,
                                icon: "error",
                            })
                        }
                    });
                    return true;
                }
            });
        });
    </script>
    <!-- End -->

    <!-- Menentukan Province -->
    <script>
        $(document).ready(function() {
            $('#provinsi').change(function() {
                var id_provinces = this.value;
                console.log(id_provinces);
                $.ajax({
                    url: 'provinsi_index.php',
                    type: 'POST',
                    data: {
                        id_provinces: id_provinces,
                    },
                    cache: false,
                    success: function(success) {
                        console.log(id_provinces);
                        $('#kota').html(success);
                    },
                });
            });
        });
    </script>
    <!-- End Menentukan Province -->

    <!-- Mencegah XSS dan Inputan Kosong atau Spasi -->
    <script>
        function isEmpty_or_contains_script_tags(input) {
            if (input.trim() === '') {
                return true;
            }

            var regex_script = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi;
            return regex_script.test(input);
        }
    </script>
    <!-- End -->

    <script src="js/validation.js"></script>
    <script src="js/validation_edit.js"></script>
    <!-- END JS FILES  -->
</body>

</html>