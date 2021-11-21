<?php
    function insertSql($sql, $loc)
    {
        require_once('../../database/database.php');
        if (mysqli_query($conn, $sql))
            header("Location: $loc");
        else
            echo "Editing was Unsuccesful!";
    }
if (isset($_POST['user_submit'])) :
    $user_tag = $_POST['user_id'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $u_type = $_POST['usertype'];
    $sql = "UPDATE user_table
SET 
    user='$user',
    pass='$pass',
    emailadd='$email',
    user_address='$address',
    contact='$contact',
    user_type='$u_type'
WHERE
    user='$user_tag'";

    $loc = "../admin.php";
    insertSql($sql, $loc);
endif;

if (isset($_POST['prod_submit'])) :
    $prodno = $_POST['prodno'];
    $prod_desc = $_POST['prod_desc'];
    $price = $_POST['price'];

    $sql = "UPDATE products_table
            SET
                prod_desc = '$prod_desc',
                msrp = '$price'
            WHERE prodno = '$prodno'";

    $loc = "../products.php";
    insertSql($sql, $loc);
endif;

if (isset($_POST['o_submit'])) :
    $orderno = $_POST['orderno'];
    $o_date = $_POST['o_date'];
    $instruct = $_POST['instructions'];
    $paid = $_POST['price'];

    $sql = "UPDATE order_table
    SET
        o_date = '$o_date',
        instructions = '$instruct',
        paid_amount = '$paid'
    WHERE 
        orderno = '$orderno'";

    $loc = "../orders.php";
    insertSql($sql, $loc);
endif;