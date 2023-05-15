<?php
require_once 'koneksi.php';
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Non Formal Education</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StylingNonFormalEducation.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    <h1>
                        Non-formal Education
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="grid-input">
                    <form action="insertNfe.php" method="post" enctype="multipart/form-data">
                        <div class="d-flex flex-column">
                            <label for="nama_lengkap">Nama lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" onkeydown="return /[A-Z ]/i.test(event.key)" required autocomplete="off">
                        </div>

                        <div class="d-flex flex-column">
                            <label for="tujuan_program">Tujuan program</label>
                            <select name="tujuan_program" id="tujuan_program">
                                <option id="pilih_tujuan_program">Pilih tujuan program</option>
                                <?php
                                $sql_tujuan_program = mysqli_query($koneksi, "SELECT tujuan_program FROM hr_tujuan_program");
                                ?>
                                <?php while ($data_tujuan_program = mysqli_fetch_array($sql_tujuan_program)) { ?>
                                    <option value="<?php echo $data_tujuan_program['tujuan_program'] ?>"><?php echo $data_tujuan_program['tujuan_program'] ?></option>
                                <?php } ?>
                                <option value="lainnya">Lainnya</option>
                            </select>

                            <div class="tujuan_program_text" id="tujuan_program_text" style="display: none;">
                                <input type="text" name="tujuan_program_text" id="tujuan_program_text" placeholder="Lainnya" onkeydown="return /[A-Z0-9 ]/i.test(event.key)" autocomplete="off">
                            </div>
                        </div>


                        <div class="d-flex flex-column">
                            <label for="start_date">Mulai pelaksanaan program</label>
                            <input type="date" name="start_date" id="start_date">
                            <p>*hari/bulan/tahun</p>
                        </div>

                        <div class="d-flex flex-column">
                            <label for="end_date">Selesai pelaksanaan program</label>
                            <input type="date" name="end_date" id="end_date">
                            <p>*hari/bulan/tahun</p>
                        </div>

                        <div class="d-flex flex-column">
                            <label for="konten_pelajari">Materi atau konten yang dipelajari</label>
                            <select name="konten_pelajari" id="konten_pelajari">
                                <option id="pilih_materi">Pilih materi atau konten</option>
                                <?php
                                $sql_konten_pelajari = mysqli_query($koneksi, "SELECT materi_konten FROM hr_materi");
                                while ($data_konten_pelajari = mysqli_fetch_array($sql_konten_pelajari)) {
                                ?>
                                    <option value="<?php echo $data_konten_pelajari['materi_konten'] ?>"><?php echo $data_konten_pelajari['materi_konten'] ?></option>
                                <?php } ?>
                                <option value="lainnya" id="pilih_materi_other">Lainnya</option>
                            </select>

                            <div class="pilih_materi_text" id="pilih_materi_text" style="display: none;">
                                <input type="text" name="konten_pelajari_text" id="pilih_materi_text" placeholder="Lainnya" onkeydown="return /[A-Z0-9 ]/i.test(event.key)" autocomplete="off">
                            </div>

                        </div>

                        <div class="d-flex flex-column">
                            <label for="judul_program">Judul program yang diikuti</label>
                            <input type="text" name="judul_program" id="judul_program" onkeydown="return /[A-Z0-9 ]/i.test(event.key)" required autocomplete="off">
                        </div>

                        <div class="d-flex flex-column">
                            <label for="metode_pembelajaran">Metode pembelajaran yang digunakan</label>
                            <select name="metode_pembelajaran" id="metode_pembelajaran">
                                <option id="pilih_metode_pembelajaran">Pilih metode pembelajaran</option>
                                <?php
                                $sql_metode_pembelajaran = mysqli_query($koneksi, "SELECT metode_pembelajaran FROm hr_metode_pembelajaran");
                                while ($data_metode_pembelajaran = mysqli_fetch_array($sql_metode_pembelajaran)) {
                                ?>
                                    <option value="<?php echo $data_metode_pembelajaran['metode_pembelajaran'] ?>"><?php echo $data_metode_pembelajaran['metode_pembelajaran'] ?></option>
                                <?php } ?>
                                <option value="lainnya">Lainnya</option>
                            </select>

                            <div class="metode_pembelajaran_text" id="metode_pembelajaran_text" style="display: none;">
                                <input type="text" name="metode_pembelajaran_text" id="metode_pembelajaran_text" placeholder="Lainnya" onkeydown="return /[A-Z0-9 ]/i.test(event.key)" autocomplete="off">
                            </div>
                        </div>

                        <div class="d-flex flex-column">
                            <label for="file_upload">Sertifikat setelah menyelesaikan program</label>
                            <input type="file" name="file_upload" id="file_upload">
                            <p>*Maksimum 3 MB format hanya JPG, JPEG, PNG, PDF</p>
                        </div>

                        <div class="d-flex flex-column">
                            <label for="nama_instansi">Nama instansi yang melaksanakan</label>
                            <select name="nama_instansi" id="nama_instansi">
                                <option id="pilih_nama_instansi">Pilih nama instansi</option>
                                <?php
                                $sql_instansi = mysqli_query($koneksi, "SELECT nama_instansi FROM hr_instansi");
                                while ($data_instansi = mysqli_fetch_array($sql_instansi)) {
                                ?>
                                    <option value="<?php echo $data_instansi['nama_instansi'] ?>"><?php echo $data_instansi['nama_instansi'] ?></option>
                                <?php } ?>
                                <option value="lainnya">Lainnya</option>
                            </select>

                            <div class="nama_instansi_text" id="nama_instansi_text" style="display: none;">
                                <input type="text" name="nama_instansi_text" id="nama_instansi_text" placeholder="Lainnya" onkeydown="return /[A-Z0-9 ]/i.test(event.key)" autocomplete="off">
                            </div>
                        </div>


                        <div class="d-flex flex-column">
                            <label for="provinsi">Lokasi program</label>
                            <select name="provinsi" id="provinsi" required>
                                <?php
                                $sql_provinsi = mysqli_query($koneksi, "SELECT * FROM provinces ORDER BY name ASC");
                                ?>
                                <option id="pilih_provinsi">Pilih provinsi</option>
                                <?php while ($data_provinsi = mysqli_fetch_array($sql_provinsi)) { ?>
                                    <option value="<?php echo $data_provinsi['id'] ?>"><?php echo $data_provinsi['name'] ?></option>
                                <?php }; ?>
                            </select>
                        </div>

                        <div class="d-flex flex-column">
                            <label for="deksripsi">Deksripsi singkat tentang program</label>
                            <textarea rows="4" cols="50" name="deksripsi" maxlength="150" id="deksripsi" onkeydown="return /[A-Z0-9 ]/i.test(event.key)" required autocomplete="off"></textarea>
                            <p>*Maksimum 150 kata</p>
                        </div>

                        <div class="d-flex flex-column">
                            <label for="kota">Kota atau Kabupaten</label>
                            <select name="kota" id="kota" required>
                                <option value="" id="pilih_kota">Pilih Kota/Kab</option>
                            </select>

                            <div class="grid-input-button">
                                <?php
                                $id_employee = $_SESSION['id_user_employee'];
                                $sql_get_hr_name = mysqli_query($koneksi, "SELECT hr_name FROM employee WHERE id = $id_employee");
                                $data = mysqli_fetch_array($sql_get_hr_name);

                                if ($data['hr_name'] == "HRIT_group") {
                                    $back_to = "hrit_g.php";
                                } else if ($data['hr_name'] == "LnD_group") {
                                    $back_to = "lnd_g.php";
                                } else if ($data['hr_name'] == "organization_group") {
                                    $back_to = "od_g.php";
                                } else if ($data['hr_name'] == "talent_group") {
                                    $back_to = "ta_g.php";
                                }
                                ?>
                                <a href="#" onclick="window.location.href = 'view/group/<?php echo $back_to ?>'">
                                    <button class="btn btn-danger">Back</button>
                                </a>
                                <button type="submit" class="btn btn-primary simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
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

    <!-- JS File -->
    <script src="js/jquery.non_formal_education.js"></script>
</body>

</html>