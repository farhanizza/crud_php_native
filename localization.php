<?php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
} else if (!$_SESSION['lang']) {
    $_SESSION['lang'] = 'en';
}
include('lang/' . $_SESSION['lang'] . '.php');
