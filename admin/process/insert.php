<?php
    require_once('../../database/database.php');

    if(isset($_POST['insertuser'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $u_type = $_POST['usertype'];
        $sql = "INSERT INTO user_table(user, pass, emailadd, contact, user_address, user_type) VALUES ('$user', '$pass', '$email', '$address', '$contact', '$u_type')";

        if(!mysqli_query($conn, $sql))
        echo "ERROR INSERTING";
        else
        header("Location: ../admin.php");
    }

    if(isset($_POST['insertprod'])) {
        $target = '../../images/'.basename($_FILES['image']['name']);
        $desc = $_POST['prod_desc'];
        $price = $_POST['price'];
        $img = "images/".$_FILES['image']['name'];

        $sql = "INSERT INTO products_table(prod_desc, msrp, prod_img) VALUES('$desc', '$price', '$img')";
        if(!mysqli_query($conn, $sql))
        echo "ERROR INSERTING";
        else {
            if(!move_uploaded_file($_FILES['image']['tmp_name'], $target))
            echo "ERROR IN UPLOAD";
            else
            header("Location: ../products.php");
        }
    }

    if(isset($_POST['insertorder'])) {
       $num =  $_POST['o_num'];
       $user =  $_POST['user'];
       $date = $_POST['date'];
       $ins = $_POST['instructions'];
       $amo =  $_POST['amount'];

       $sql = "INSERT INTO order_table(orderno, user, o_date, instructions, paid_amount) VALUES ('$num', '$user', '$date', '$ins', '$amo')";

       if(!mysqli_query($conn, $sql))
       echo "ERROR INSERTING";
       else
       header("Location: ../orders.php");
    }
?>