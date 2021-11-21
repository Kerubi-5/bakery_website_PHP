<?php
require_once 'database.php';
session_start();
if(isset($_SESSION['cart']))
$_SESSION['cart'];

if (isset($_POST['productID'])) {
    $prodno = $_POST['productID'];
    $pqty = $_POST['quantity'];    
    //PUT INSERT HERE :3
    if ($pqty > 0){
        if(!isset($_SESSION['cart'][$prodno])) {
            $_SESSION['cart'][$prodno] = $pqty;
            echo "Item has been added to the cart";
        } 
        else
            echo "Item already added!";
    }
}
