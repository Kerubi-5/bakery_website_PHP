<?php
require_once('database.php');
session_start();
session_unset();
session_destroy();
$_SESSION['CloggedIn'] = 0;
header("Location: ../user.php");
