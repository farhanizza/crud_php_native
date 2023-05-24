<!-- key in birth place -->
<!-- <label for="birth_place"><?php echo constant('table_bp') ?>: </label>

                                            <input type="text" name="birth_place" onkeydown="return /[a-z ]/i.test(event.key)" required oninvalid="this.setCustomValidity('Silakan masukkan Birth place')" autocomplete="null">
                                            <p class="p-info">*<?php echo constant('p_example') ?>: Cirebon</p> -->

// $('#kota').change(getAjaxKota);
// function getAjaxKota() {
// var id_regencies = $('#kota').val();
// $.ajax({
// type: 'POST',
// dataType: 'html',
// url: 'insert.php?jenis=kecamatan',
// data: 'id_regencies=' + id_regencies,
// });
// }


// case 'kecamatan':
// if ($id_regencies == '') {
// exit;
// } else {
// $getcity = mysqli_query($koneksi, "SELECT * FROM districts WHERE regency_id ='$id_regencies' ORDER BY name ASC") or die('Query Gagal');
// while ($data = mysqli_fetch_array($getcity)) {
// echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
// }
// exit;
// }
// break;

// $('#kota').change(getAjaxKota);
// function getAjaxKota() {
// var id_regencies = $('#kota').val();
// $.ajax({
// type: 'POST',
// dataType: 'html',
// url: 'edit_data.php?jenis=kecamatan',
// data: 'id_regencies=' + id_regencies,
// });
// }

// case 'kecamatan':
// if ($id_regencies == '') {
// exit;
// } else {
// $getcity = mysqli_query($koneksi, "SELECT * FROM districts WHERE regency_id ='$id_regencies' ORDER BY name ASC") or die('Query Gagal');
// while ($data = mysqli_fetch_array($getcity)) {
// echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
// }
// exit;
// }
// break;


<!-- Check sesi -->
<!-- <?php
        $_SESSION['last_login_time'] = time();
        echo $_SESSION['last_login_time'];
        echo $_SESSION['username'];
        ?> -->


// if (mail($email, "Reset Password", 'Klik link berikut untuk reset password: http://localhost/forgot_password_new_password.php?token=' . $token, "From: hris@gt-tires.com")) {
// echo "<script>
    //     alert('Silahkan check email anda');
    //     window.location.href = 'login.php?status=reset_password_sent';
    //     
</script>";
// } else {
// echo "<script>
    //     alert('tidak ada email yang dikirim');
    //     window.location.href = 'forgot_password.php';
    //     
</script>";
// }

<?php
phpinfo();
?>

// nik: nik,
// first_name: first_name,
// middle_name: middle_name,
// last_name: last_name,
// birth_date: birth_date,
// grade_name: grade_name,
// gender: gender,
// negara: negara,
// kewarganegaraan: kewarganegaraan,
// image: image,
// hr_name: hr_name,
// provinsi: provinsi,
// kota: kota


// let kewarganegaraan = $('input[name="kewarganegaraan"]:checked').val();
// let negara = $('select[name="negara"] option:selected').val();
// let nik = $('input[name="nik"]').val();
// let first_name = $('input[name="first_name"]').val();
// let middle_name = $('input[name="middle_name"]').val();
// let last_name = $('input[name="last_name"]').val();
// let provinsi = $('select[name="provinsi"] option:selected').val();
// let kota = $('select[name="kota"] option:selected').val();
// let birth_date = $('input[name="birth_date"]').val();
// let grade_name = $('select[name="grade_name"] option:selected').val();
// let hr_name = $('select[name="hr_name"] option:selected').val();
// let gender = $('input[name="gender"]:checked').val();

// let image = $('input[name="image"]').prop('files')[0];

<!-- Validate 17 tahun keatas -->
<!-- <script>
        $(document).ready(function() {
            $('#form_index').submit(function(e) {
                e.preventDefault();
                var dateOfBirth = $('input=[name="birth_date"]').val();
                var dobParts = dateOfBirth.split('-');
                var dob = new Date(dobParts[0], dobParts[1] - 1, dobParts[2]);
                var today = new Date();
                var age = today.getFullYear() - dob.getFullYear();
                if (age < 18) {
                    swal({
                        title: "Failed Insert Date",
                        text: "You have greater 17 year's old!",
                        icon: "error"
                    });
                    return false;
                } else {
                    return true;
                }
            });
        });
    </script> -->
<!-- End -->

<!-- Validate Iamge extension only JPG, JPEG, PNG -->
<!-- <script>
        $(document).ready(function() {
            $('#form_index').submit(function(e) {
                e.preventDefault();
                var filePath = $('input[name="image"]').val();
                var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
                if (!allowedExtensions.exec(filePath)) {
                    swal({
                        title: "Failed Insert Image",
                        text: "Extension Image allowed .jpg .jpeg .png",
                        icon: "error"
                    });
                    $('input[name="image"]').val('');
                    return false;
                } else {
                    return true;
                }
            });
        });
    </script> -->
<!-- End -->

<!-- Validasi Ukuran Image Max 3MB -->
<!-- <script>
        $(document).ready(function() {
            $('#form_index').submit(function(e) {
                e.preventDefault();
                var input = $('input[name="image"]').val();
                if (input.files && input.files[0]) {
                    var fileSize = input.files[0].size;
                    var maxSize = 3 * 1024 * 1024;
                    if (fileSize > maxSize) {
                        swal({
                            title: "Failed Insert Image",
                            text: "Size can't greater 3MB",
                            icon: "error",
                        });
                    }
                }
            });
        });
    </script> -->
<!-- End -->

// if (mysqli_query($koneksi, $sql)) {
// header("Location: index.php");
// } else {
// echo "Failed";
// }

// // Validasi umur harus lebih 17 tahun
// if ($birth_date <= $umur_17) { // // Validasi special character dan spasi // if ( // !empty(trim($nik)) && !empty(trim($first_name)) && !empty(trim($grade_name)) // && preg_match("/^[a-zA-Z0-9- ]+$/", $nik) && preg_match("/^[a-zA-Z ]+$/", $first_name) // && preg_match("/^[a-zA-Z\s]*$|^$/", $middle_name) // && preg_match("/^[a-zA-Z\s]*$|^$/", $last_name) // ) { // if (mysqli_query($koneksi, $sql_code)) { // // $_SESSION['insert']="Data success to insert" ; // echo "Sukses" ; // echo "<script>
//             window.location.href = 'index.php?data=succes_insert_data';
//             </script>" ; // } // // else { // // echo "Error: " . $sql_code . "<br>" . mysqli_error($koneksi); // // } // } else { // echo "<script>
//             alert('Error: Gagal Input Data');
//             window.location.href = 'index.php?data=failed_insert_data';
//         </script>" ; // exit; // } // } else { // echo // "<script>
//             alert('Error: umur harus diatas 17 tahun');
//             window.location.href = 'index.php?data=failed_insert_data';
//         </script>" ; // exit; // } // // Cek Nik yang sama // $sql_cek_nik="SELECT nik FROM hr_employee WHERE nik = '$nik'" ; // $cek_nik=mysqli_query($koneksi, $sql_cek_nik); // if (mysqli_num_rows($cek_nik)> 0) {
    // echo "<script>
        //         alert('Error: NIK sudah terdaftar');
        //         window.location.href = 'index.php';
        //     
    </script>";
    // }

    // if ($image_size > $resize) {
    // // alert('Failed: Ukuran file maksimum 3 MB');
    // echo "<script>
        //             window.location.href = 'index.php';
        //             
    </script>";
    // exit();
    // }

    // $extension = strtolower(pathinfo($image_file, PATHINFO_EXTENSION));
    // if (!in_array($extension, $type_file)) {
    // echo "<script>
        //             alert('Failed: Image only jpg, jpeg, png');
        //             window.location.href = 'index.php';
        //             
    </script>";
    // exit;
    // }

    // kompres gambar
    // if ($extension == "jpg" || $extension == "jpeg") {
    // $image = imagecreatefromjpeg($image_temporary);
    // } else {
    // $image = imagecreatefrompng($image_temporary);
    // }