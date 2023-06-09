<?php
include 'koneksi.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'NIK');
$sheet->setCellValue('C1', 'First name');
$sheet->setCellValue('D1', 'Middle name');
$sheet->setCellValue('E1', 'Last name');
$sheet->setCellValue('F1', 'Birth place');
$sheet->setCellValue('G1', 'Regencies');
$sheet->setCellValue('H1', 'Birth date');
$sheet->setCellValue('I1', 'Grade name');
$sheet->setCellValue('J1', 'Nationality');
$sheet->setCellValue('K1', 'Gender');
$sheet->setCellValue('L1', 'Citizenship');

$sql_code = mysqli_query($koneksi, "SELECT *, hr_provinces.name AS name_of_province, 
hr_regencies.name AS name_of_regencies, 
hr_countries.name AS name_of_country
FROM hr_employee 
JOIN hr_provinces ON hr_employee.birth_place = hr_provinces.id
JOIN hr_regencies ON hr_employee.regencies = hr_regencies.id
JOIN hr_countries ON hr_employee.negara = hr_countries.abv
JOIN hr_position ON hr_position.position_id = hr_employee.grade_name   
");

$i = 2;
$no = 1;

while ($data = mysqli_fetch_array($sql_code)) {
    $sheet->setCellValue('A' . $i, $no++);
    $sheet->setCellValue('B' . $i, $data['nik']);
    $sheet->setCellValue('C' . $i, $data['first_name']);
    $sheet->setCellValue('D' . $i, $data['middle_name']);
    $sheet->setCellValue('E' . $i, $data['last_name']);
    $sheet->setCellValue('F' . $i, $data['name_of_province']);
    $sheet->setCellValue('G' . $i, $data['name_of_regencies']);
    $sheet->setCellValue('H' . $i, $data['birth_date']);
    $sheet->setCellValue('I' . $i, $data['position_level']);
    $sheet->setCellValue('J' . $i, $data['name_of_country']);
    $sheet->setCellValue('K' . $i, $data['gender']);
    $sheet->setCellValue('L' . $i, $data['kewarganegaraan']);
    $i++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('Data karyawan.xlsx');

echo "<script>
window.location = 'Data karyawan.xlsx';
</script>";
