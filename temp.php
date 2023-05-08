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