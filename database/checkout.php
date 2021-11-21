<?php
require_once('database.php');
session_start();
$ins = $_POST['instructions'];
$qty = $_POST['qty'];
$user = $_SESSION['username'];
$date = date('Y-m-d H:i:s');
$sql = "INSERT INTO order_table (user, o_date, instructions, paid_amount) VALUES ('$user','$date','$ins', '$qty')";
if(!mysqli_query($conn, $sql))
echo "ERROR";
else
echo "Order Confirmed!";
unset($_SESSION['cart']);
