<?php
$koneksi = mysqli_connect("localhost", "root", "", "crud_gt");

if (!$koneksi) {
    die("Koneksi Gagal" . mysqli_connect_error());
}
