<?php
include 'phpqrcode/qrlib.php';

if (isset($_GET['qr_code'])) {
    $qr_code = $_GET['qr_code'];
}
