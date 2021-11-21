<?php
require_once('database.php');
session_start();
if (isset($_GET['remove'])) {
    $prodno = $_GET['remove'];
    unset($_SESSION['cart'][$prodno]);
}

if (isset($_GET['clear'])) {
    session_unset();
}
header("Location: ../cart.php");
