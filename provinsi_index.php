<?php
require_once "koneksi.php";

$id_provinces = $_POST["id_provinces"];

$getcity = mysqli_query($koneksi, "SELECT  * FROM hr_regencies WHERE province_id ='$id_provinces' ORDER BY name ASC");

while ($data = mysqli_fetch_array($getcity)) {
    echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
}
