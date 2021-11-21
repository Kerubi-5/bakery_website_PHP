<?php 
    function insertData($sql) {
        require_once('../../database/database.php');
        if(!mysqli_query($conn, $sql))
        echo "ERROR DELETING";
    }

    if(isset($_GET['user'])) {
        $user = $_GET['user'];
        $sql = "DELETE FROM user_table WHERE user='$user'";
        insertData($sql);
        header("Location: ../admin.php");
    }

    if(isset($_GET['order'])) {
        $order = $_GET['order'];
        $sql = "DELETE FROM order_table WHERE orderno='$order'";
        insertData($sql);
        header("Location: ../orders.php");
    }

    if(isset($_GET['prod'])) {
        $prod = $_GET['prod'];
        $sql = "DELETE FROM products_table WHERE prodno='$prod'";
        insertData($sql);
        header("Location: ../products.php");
    }
?>