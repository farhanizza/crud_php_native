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

function truncateString($string, $max_length)
{
    if (strlen($string) > $max_length) {
        $string = substr($string, 0, $max_length - 3) . '...';
    }
    return $string;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Non Formal Education Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylingViewNonFormal.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="container mb-5">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center mt-2">
                    <h1>
                        Non-formal Education | <?php echo $_SESSION['username_admin'] ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                $id = $_GET['id'];
                $sql_code = mysqli_query($koneksi, "SELECT *, hr_provinces.name as name_of_provinces,
                hr_regencies.name as name_of_regencies,
                hr_user_non_formal.id as id_user
                FROM hr_user_non_formal JOIN hr_provinces on hr_provinces.id = hr_user_non_formal.lokasi_provinsi
                JOIN hr_regencies on hr_regencies.id = hr_user_non_formal.lokasi_kota
                where hr_user_non_formal.id = $id");

                while ($data_view = mysqli_fetch_array($sql_code)) {
                ?>
                    <div class="grid-input">
                        <div class="d-flex flex-column">
                            <label for="nama_lengkap">Nama lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" disabled value="<?php echo $data_view['nama_lengkap'] ?>">
                        </div>

                        <div class="d-flex flex-column">
                            <label for="tujuan_program">Tujuan program</label>
                            <input type="text" name="tujuan_program" id="" disabled value="<?php echo $data_view['tujuan_program'] ?>">
                        </div>

                        <div class="d-flex flex-column start-date">
                            <label for="start_date">Mulai pelaksanaan program</label>
                            <input type="date" name="start_date" id="start_date" disabled value="<?php echo $data_view['start_date'] ?>">

                        </div>

                        <div class="d-flex flex-column end-date">
                            <label for="end_date">Selesai pelaksanaan program</label>
                            <input type="date" name="end_date" id="end_date" disabled value="<?php echo $data_view['end_date'] ?>">

                        </div>

                        <div class="d-flex flex-column">
                            <label for="konten_pelajari">Materi atau konten yang dipelajari</label>
                            <input type="text" name="" id="" disabled value="<?php echo $data_view['materi_konten'] ?>">
                        </div>

                        <div class="d-flex flex-column">
                            <label for="judul_program">Judul program yang diikuti</label>
                            <input type="text" name="judul_program" id="judul_program" disabled value="<?php echo $data_view['judul_program'] ?>">
                        </div>

                        <div class="d-flex flex-column">
                            <label for="metode_pembelajaran">Metode pembelajaran yang digunakan</label>
                            <input type="text" name="" id="" disabled value="<?php echo $data_view['metode_pembelajaran'] ?>">

                        </div>

                        <div class="d-flex flex-column">
                            <label for="file_upload">Sertifikat setelah menyelesaikan program</label>
                            <div class="download-box">

                                <a href="download_non_formal.php?id=<?php echo $data_view['id_user'] ?>">
                                    <button class="button-download">Download</button>
                                </a>
                                <?php
                                $text_sertifikat = truncateString($data_view['sertifikat'], 35);
                                ?>
                                <p class="download-text"><?php echo $text_sertifikat ?></p>
                            </div>
                            <div class="verified-box" id="verified-box">
                                <?php
                                if ($data_view['status_sertifikat'] == "Belum melakukan review sertifikat") {
                                    $color_text = '#ffbe0b';
                                    $img_status_belum_review = '<img src="warning.png" alt="" style="width: 27px; height: 25px; margin: -0.3rem 0 0 0.5rem;">';
                                } else if ($data_view['status_sertifikat'] == "Sistem membuktikan dokumen asli") {
                                    $color_text = '#2A8B61';
                                    $img_status_belum_review = '<img src="verified.png" alt="" style="width: 27px; height: 25px; margin: -0.3rem 0 0 0.5rem;">';
                                } else if ($data_view['status_sertifikat'] == "Sistem membuktikan dokumen palsu") {
                                    $color_text = '#DB3333';
                                    $img_status_belum_review = '<img src="rejected.png" alt="" style="width: 27px; height: 25px; margin: -0.3rem 0 0 0.5rem;">';
                                }
                                ?>
                                <p class="info-verifikasi" id="info-verifikasi" style="color: <?php echo $color_text; ?>;"><?php echo $data_view['status_sertifikat'] ?> <?php echo $img_status_belum_review ?> </p>
                                <div class="verified-box-button">
                                    <a href="verifikasi_dokumen.php?id=<?php echo $id ?>">
                                        <button>
                                            Verifikasi
                                        </button>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex flex-column">
                            <label for="nama_instansi">Nama instansi yang melaksanakan</label>
                            <input type="text" name="" id="" disabled value="<?php echo $data_view['nama_instansi'] ?>">

                        </div>

                        <div class="d-flex flex-column">
                            <label for="provinsi">Lokasi program</label>
                            <input type="text" name="" id="" disabled value="<?php echo $data_view['name_of_provinces'] ?>">
                        </div>

                        <div class="d-flex flex-column">
                            <label for="deksripsi">Deksripsi singkat tentang program</label>
                            <textarea name="deksripsi" id="deksripsi" cols="50" rows="4" disabled><?php echo $data_view['deksripsi'] ?></textarea>

                        </div>

                        <div class="d-flex flex-column">
                            <label for="kota">Kota atau Kabupaten</label>
                            <input type="text" name="" id="" disabled value="<?php echo $data_view['name_of_regencies'] ?>">

                            <div class="grid-input-button">
                                <a href="non_formal.php">
                                    <button class="btn btn-white-50 btn-back">Back</button>
                                </a>
                                <?php if ($data_view['status_sertifikat'] == "Sistem membuktikan dokumen asli") {
                                    $btn_info_asli = 'none';
                                } else if ($data_view['status_sertifikat'] == "Sistem membuktikan dokumen palsu") {
                                    $btn_info_palsu = 'none';
                                } ?>

                                <a href="update_status_user_rejected.php?id=<?php echo $id ?>" style="display: <?php echo $btn_info_asli ?>;">
                                    <button class="btn btn-danger btn-tolak" id="btn-tolak">Tolak</button>
                                </a>
                                <a href="update_status_user_acc.php?id=<?php echo $id ?>" style="display: <?php echo $btn_info_palsu ?>;">
                                    <button type="submit" class="btn btn-primary simpan" id="btn-simpan">Terima</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Alert diterima dari verifikasi manual -->
    <?php if (isset($_SESSION['alert_terima_manual'])) { ?>
        <script>
            swal({
                title: "Success",
                text: "<?php echo $_SESSION['alert_terima_manual'] ?>",
                icon: "success"
            });
        </script>
    <?php unset($_SESSION['alert_terima_manual']);
    } ?>
    <!-- End -->

    <!-- Alert belum melakukan review sertifikat -->
    <?php if (isset($_SESSION['alert_review_dokumen'])) { ?>
        <script>
            swal({
                title: "Warning Dokumen!",
                text: "<?php echo $_SESSION['alert_review_dokumen']; ?>",
                icon: "info"
            });
        </script>
    <?php unset($_SESSION['alert_review_dokumen']);
    } ?>
    <!-- End -->
</body>

</html>