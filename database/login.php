<?php
session_start();
require_once('database.php');

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user_table";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        if ($user == $row['user'] && $pass == $row['pass']) {
            if ($row['user_type'] == 'C') {
                $_SESSION['CloggedIn'] = 1;
                header('Location: ../user.php');
            }
            else {
                $_SESSION['AloggedIn'] = 1;
                header('Location: ../admin/admin.php');
            }
            $_SESSION['username'] = $user;
            $_SESSION['emailadd'] = $row['emailadd'];
            $_SESSION['contact'] = $row['contact'];
            $_SESSION['address'] = $row['user_address'];
        }
    }
}
echo "Account with that credentials does not exist";
