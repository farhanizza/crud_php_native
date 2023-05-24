<?php
require_once 'koneksi.php';
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
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Dokumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylingVerifikasiDokumen.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center mt-5">
                    <h1>
                        Verifikasi Dokumen
                    </h1>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <div class="mt-3 text-sertifikat">
                        <h4>
                            Silahkan input nomor sertifikat yang anda ingin verifikasi
                        </h4>
                    </div>
                </div>
                <div class="form-sertifikat">
                    <?php $id = $_GET['id']; ?>
                    <form id="form_verifikasi_dokumen">
                        <input type="hidden" name="id_user" id="" value="<?php echo $id ?>">
                        <label for="nomor_sertifikat">Nomor sertifikat</label>
                        <input type="text" name="nomor_sertifikat" id="" autocomplete="off" required>
                        <button type="submit" class="btn btn-success">Cek otomatis</button>
                    </form>
                    <a href="verifikasi_dokumen_manual_img.php?id=<?php echo $id ?>">
                        <button class="btn btn-warning btn-manual">Cek manual</button>
                    </a>
                    <a href="view_non_formal.php?id=<?php echo $id ?>">
                        <button class="btn btn-warning btn-back">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Insert Nomer Sertifikat -->
    <script>
        $(document).ready(function() {
            $('#form_verifikasi_dokumen').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                if (isEmpty_or_contains_script_tags(formData.get("nomor_sertifikat"))) {
                    swal({
                        title: "Failed Verfikasi Nomer Sertifikat",
                        text: "Inputan tidak boleh kosong dan spasi",
                        icon: "error"
                    })
                    return false;
                } else {
                    $.ajax({
                        type: "POST",
                        url: "verifikasi_nomer_sertifikat.php",
                        data: formData,
                        success: function(response) {
                            console.log(response);
                            if (response === "success_nomer_sertifikat") {
                                swal({
                                    title: "Succes Verifikasi Nomer Sertifikat",
                                    text: "Succes Verifikasi Nomer Sertifikat",
                                    icon: "success"
                                }).then(function() {
                                    location.href = 'view_non_formal.php?id=' + formData.get("id_user");
                                })
                            } else if (response === "failed_nomer_sertifikat") {
                                swal({
                                    title: "Failed Verifikasi Nomer Sertifikat",
                                    text: "Nomor Sertifikat tidak terdaftar",
                                    icon: "error"
                                }).then(function() {
                                    location.href = 'alasan_menolak_dokumen.php?id=' + formData.get("id_user");
                                })
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function(xhr, error, status) {
                            swal({
                                title: "Terjadi Kesalahan",
                                text: error,
                                icon: "error"
                            })
                        }
                    });
                    return true;
                }
            });
        });
    </script>
    <!-- End -->

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
</body>

</html>