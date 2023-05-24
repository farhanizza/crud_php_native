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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                    <form id="form_non_formal_education" enctype="multipart/form-data">
                        <div class="d-flex flex-column">
                            <label for="nama_lengkap">Nama lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" onkeydown="return /[A-Z ]/i.test(event.key)" required autocomplete="off">
                        </div>

                        <div class="d-flex flex-column">
                            <label for="tujuan_program">Tujuan program</label>
                            <select name="tujuan_program" id="tujuan_program">
                                <option id="pilih_tujuan_program" disabled selected>Pilih tujuan program</option>
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


                        <div class="d-flex flex-column start-date">
                            <label for="start_date">Mulai pelaksanaan program</label>
                            <input type="date" name="start_date" id="start_date">
                            <p>*hari/bulan/tahun</p>
                        </div>

                        <div class="d-flex flex-column end-date">
                            <label for="end_date">Selesai pelaksanaan program</label>
                            <input type="date" name="end_date" id="end_date">
                            <p>*hari/bulan/tahun</p>
                        </div>

                        <div class="d-flex flex-column">
                            <label for="konten_pelajari">Materi atau konten yang dipelajari</label>
                            <select name="konten_pelajari" id="konten_pelajari">
                                <option id="pilih_materi" disabled selected>Pilih materi atau konten</option>
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
                                <option id="pilih_metode_pembelajaran" disabled selected>Pilih metode pembelajaran</option>
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
                            <input type="file" name="file_upload" id="file_upload" accept=".jpg, .jpeg, .png, .pdf">
                            <p>*Maksimum 3 MB format hanya JPG, JPEG, PNG, PDF</p>
                        </div>

                        <div class="d-flex flex-column">
                            <label for="nama_instansi">Nama instansi yang melaksanakan</label>
                            <select name="nama_instansi" id="nama_instansi">
                                <option id="pilih_nama_instansi" disabled selected>Pilih nama instansi</option>
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
                                <option id="pilih_provinsi">Pilih provinsi</option>
                                <?php
                                $sql_provinsi = mysqli_query($koneksi, "SELECT * FROM hr_provinces ORDER BY name ASC");
                                ?>
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
                            <select id="kota" name="kota" required>
                                <option id="pilih_kota">Pilih Kota/Kab</option>
                                <option></option>
                            </select>

                            <div class="grid-input-button">
                                <?php
                                $id_employee = $_SESSION['id_user_employee'];
                                $sql_get_hr_name = mysqli_query($koneksi, "SELECT hr_name FROM hr_employee WHERE id = $id_employee");
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
                                    <button class="btn btn-danger btn-xl">Back</button>
                                </a>
                                <button type="submit" class="btn btn-primary simpan btn-xl">Simpan</button>
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
    <!-- Insert -->
    <script>
        $(document).ready(function() {
            $('#form_non_formal_education').submit(function(e) {
                e.preventDefault();

                // Inputan Data Form
                var formData = new FormData(this);

                // inputan date
                var start_date = new Date(formData.get('start_date'));
                var end_date = new Date(formData.get('end_date'));

                // Inputan File
                var fileInput = $('input[name="file_upload"]')[0];
                var file = fileInput.files[0];
                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
                var maxSize = 3 * 1024 * 1024;

                if (file && !allowedExtensions.exec(file.name)) {
                    // Validasi extension
                    swal({
                        title: "Failed Insert File",
                        text: "Extension Image Allowed .jpg, .jpeg, .png, .pdf",
                        icon: "error"
                    });
                    return false;
                } else if (file.size > maxSize) {
                    // Validasi max size
                    swal({
                        title: "Failed Insert Image",
                        text: "Image Size should not exceed 3MB",
                        icon: "error"
                    });
                    return false;

                } else if (end_date <= start_date) {
                    // Validasi End date harus lebih besar dari Start date
                    swal({
                        title: "Failed Insert!",
                        text: "Selesai pelaksanaan harus lebih besar dari Mulai pelaksanaan",
                        icon: "error"
                    });
                    return false;
                } else {
                    // Insert data
                    $.ajax({
                        type: "POST",
                        url: "insertNfe.php",
                        data: formData,
                        success: function(response) {
                            console.log(response);
                            if (response === 'Sukses') {
                                swal({
                                    title: "Success Insert Data!",
                                    text: "Success Insert Data!",
                                    icon: "success",
                                }).then(function() {
                                    history.back();
                                })
                            } else if (response === 'space_and_empty' || response === 'Gagal') {
                                // ada space and empty dari inputan
                                swal({
                                    title: "Error Insert Data!",
                                    text: "Error Insert Data!",
                                    icon: "error",
                                }).then(function() {
                                    location.reload();
                                })
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function(xhr, status, error) {
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

    <!-- Menentukan Province -->
    <script>
        $(document).ready(function() {
            // Validasi Text Area
            $('#deksripsi').change(function(e) {
                let textAreaValue = $(this).val();
                if (textAreaValue > 150) {
                    alert('Karakter tidak boleh lebih besar dari 150!');
                    e.preventDefault();
                }
            });

            // Validasi other tujuan program
            $('#tujuan_program').click(function(e) {
                e.preventDefault();
                $('#pilih_tujuan_program').attr('disabled', 'disabled');
            });



            $('#konten_pelajari').click(function(e) {
                e.preventDefault();
                $('#pilih_materi').attr('disabled', 'disabled');
            });



            $('#metode_pembelajaran').click(function(e) {
                e.preventDefault();
                $('#pilih_metode_pembelajaran').attr('disabled', 'disabled');
            });



            $('#nama_instansi').click(function(e) {
                e.preventDefault();
                $('#pilih_nama_instansi').attr('disabled', 'disabled');
            });



            $('#tujuan_program').change(function(e) {
                e.preventDefault();
                var selectedOption = $('option:selected', this).text();
                if (selectedOption === 'Lainnya') {
                    $('#tujuan_program_text').show();
                    // $('#tujuan_program_text').attr('required', true);
                    $('#tujuan_program').hide();
                } else {
                    $('#tujuan_program_text').hide();
                    // $('#tujuan_program_text').attr('required', false);
                    $('#tujuan_program').show();
                }
            });



            $('#konten_pelajari').change(function(e) {
                e.preventDefault();
                var selectedOption = $('option:selected', this).text();
                if (selectedOption === 'Lainnya') {
                    $('#pilih_materi_text').show();
                    // $('#pilih_materi_text').prop('required', true);
                    $('#konten_pelajari').hide();
                } else {
                    $('#pilih_materi_text').hide();
                    // $('#pilih_materi_text').prop('required', false);
                    $('#konten_pelajari').show();
                }
            });



            $('#metode_pembelajaran').change(function(e) {
                e.preventDefault();
                var selectedOption = $('option:selected', this).text();
                if (selectedOption === 'Lainnya') {
                    $('#metode_pembelajaran_text').show();
                    // $('#metode_pembelajaran_text').prop('required', true);
                    $('#metode_pembelajaran').hide();
                } else {
                    $('#metode_pembelajaran_text').hide();
                    // $('#metode_pembelajaran_text').prop('required', false);
                    $('#metode_pembelajaran').show();
                }
            });



            $('#nama_instansi').change(function(e) {
                e.preventDefault();
                var selectedOption = $('option:selected', this).text();
                if (selectedOption === 'Lainnya') {
                    $('#nama_instansi_text').show();
                    // $('#nama_instansi_text').prop('required', true);
                    $('#nama_instansi').hide();
                } else {
                    $('#nama_instansi_text').hide();
                    // $('#nama_instansi_text').prop('required', false);
                    $('#nama_instansi').show();
                }
            });

            $('#provinsi').click(function(e) {
                e.preventDefault();
                $('#pilih_provinsi').attr('disabled', 'disabled');
            });

            $('#kota').click(function(e) {
                e.preventDefault();
                $('#pilih_kota').attr('disabled', 'disabled');
            });

            $('#provinsi').change(function() {
                var id_provinces = this.value;
                // console.log(id_provinces);
                $.ajax({
                    url: 'provinsi_index.php',
                    type: 'POST',
                    data: {
                        id_provinces: id_provinces,
                    },
                    cache: false,
                    success: function(success) {
                        $('#kota').html(success);
                    },
                });
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