<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['hr_name'] !== 'HRIT_group') {
    echo
    "<script>
    alert('Login first');
    window.location.href = '../login.php';
    </script>";
}
