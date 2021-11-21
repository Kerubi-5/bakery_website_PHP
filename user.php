<?php
session_start();
if (!isset($_SESSION['CloggedIn']))
    $_SESSION['CloggedIn'] = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <!-- BS4 CS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <!-- BS4 JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Local CSS -->
    <link rel="stylesheet" href="styles/global.css">

    <!-- External Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include 'modules/navbar.php';
    ?>
    <div class="container">
        <!-- LOG IN -->
        <form class="form-login" action="database/login.php" method="POST" <?php if ($_SESSION['CloggedIn'] == 1) echo 'hidden'; ?>>
            <h4>LOGIN FORM</h4>
            <hr>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="helpId" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="container text-center">
                <button type="submit" class="btn btn-primary" name="submit">Log in</button>
                <button type="button" class="btn btn-success signupBtn">Register</button>
            </div>
        </form>
        <!-- REGISTER -->
        <form class="inactive form-login" action="database/register.php" method="POST">
            <h4>REGISTER FORM</h4>
            <hr>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="helpId" maxlength="20" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" class="form-control" name="email" aria-describedby="helpId" placeholder="xyz@email.com">
            </div>
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="text" class="form-control" name="contact" aria-describedby="helpId" placeholder="09XXXXXXXXX">
            </div>
            <div class="form-group">
                <label for="address">Physical Address</label>
                <input type="text" class="form-control" name="address" aria-describedby="helpId" placeholder="Block 1-Lot 1 XXXX" required>
            </div>
            <div class="container text-center">
                <button type="submit" class="btn btn-success" name="register">Register</button>
            </div>
        </form>
        <!-- WELCOME LOG IN -->
        <form action="database/logout.php" method="POST" <?php if ($_SESSION['CloggedIn'] == 0) echo 'hidden'; ?>>
            <h4>Hello!</h4>
            <hr>
            <div class="container">
                <div class="card">
                    <img class="card-img-top" src="holder.js/100x180/" alt="">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $_SESSION['username']; ?></h4>
                        <p class="card-text">Email: <?php echo $_SESSION['emailadd']; ?></p>
                        <p class="card-text">Contact: <?php echo $_SESSION['contact']; ?></p>
                        <p class="card-text">Address: <?php echo $_SESSION['address']; ?></p>
                    </div>
                </div>
                <button type="submit" name="logout" class="btn btn-danger btn-lg btn-block">Logout</button>
            </div>
        </form>
    </div>
    <?php
    include 'modules/footer.php';
    include 'modules/js.inc.php';
    ?>
</body>

</html>