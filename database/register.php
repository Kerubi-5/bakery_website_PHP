<?php
require_once('database.php');
if (isset($_POST['register'])) {
    $query = "INSERT INTO user_table (user, pass, emailadd, contact, user_address, user_type) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', '".$_POST['contact']."', '".$_POST['address']."', 'C')";

    if (mysqli_query($conn, $query)) {
        $admin_query = "INSERT INTO user_table (user, pass, emailadd, contact, user_address, user_type) VALUES ('leslie', '1234', 'kambalicious@gmail.com', '09098716453', 'A'";
        mysqli_query($conn, $admin_query);
        echo "Nice";
        header('Location: ../user.php');
    }
    else {
        echo "hm";
    }
}
