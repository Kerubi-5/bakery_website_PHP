<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <!-- BS4 CS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="../styles/global.css">

    <!-- External Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!-- USER EDIT -->
    <?php
    if (isset($_GET['user_tag'])) :
    ?>
        <form method="POST" action="edit_check.php">
            <div class="container">
                <div class="jumbotron">
                    <h1>User: <?php echo $_GET['user_tag']; ?></h1>
                    <p>Edit the details for this user then click save</p>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="user" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter User..." required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="pass" type="password" class="form-control" placeholder="Enter Password..." required>
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email...">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input name="address" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Physical Address...">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input name="contact" type="tel" class="form-control" aria-describedby="emailHelp" placeholder="Enter Contact...">
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="usertype" id="inlineRadio1" value="A">
                    <label class="form-check-label" for="inlineRadio1">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="usertype" id="inlineRadio2" value="C" checked>
                    <label class="form-check-label" for="inlineRadio2">User</label>
                </div>
                <div class="text-center">
                    <input type="hidden" name="user_id" value="<?php echo $_GET['user_tag']; ?>">
                    <button name="user_submit" type="submit" class="btn btn-primary">Save</button>
                    <a href="../admin.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </form>
    <?php
    endif;
    ?>

<!-- PRODUCT EDIT -->
    <?php
    if (isset($_GET['prod'])) :
        require_once('../../database/database.php');
        $prod = $_GET['prod'];
        $select = "SELECT prod_desc FROM products_table WHERE prodno = '$prod'";
        $result = mysqli_query($conn, $select);
        $description = mysqli_fetch_row($result);
    ?>
        <form method="POST" action="edit_check.php">
            <div class="container">
                <div class="jumbotron">
                    <h2>Product: <?php echo $description[0]; ?></h2>
                    <p>Edit the details for this product then click save</p>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input name="prod_desc" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Product Description...">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input name="price" type="number" step="0.01" class="form-control" aria-describedby="emailHelp" placeholder="Enter Price...">
                </div>
                <div class="text-center">
                    <input type="hidden" name="prodno" value="<?php echo $prod; ?>">
                    <button type="submit" name="prod_submit" class="btn btn-primary">Save</button>
                    <a href="../products.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </form>
    <?php
    endif;
    ?>

<!-- ORDER EDIT -->
    <?php
    if (isset($_GET['orderno'])) :
        $orderno = $_GET['orderno'];
    ?>
        <form method="POST" action="edit_check.php">
            <div class="container">
                <div class="jumbotron">
                    <h2>Order Edit</h2>
                    <p>Edit the details for this order then click save</p>
                </div>
                <div class="form-group">
                    <label>Order Date</label>
                    <input name="o_date" type="date" class="form-control" aria-describedby="emailHelp" placeholder="Enter Product Description...">
                </div>
                <div class="form-group">
                    <label>Instructions</label>
                    <input name="instructions" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Product Description...">
                </div>
                <div class="form-group">
                    <label>Paid amount</label>
                    <input name="price" type="number" step="0.01" class="form-control" aria-describedby="emailHelp" placeholder="Enter Price...">
                </div>
                <div class="text-center">
                    <input type="hidden" name="orderno" value="<?php echo $orderno; ?>">
                    <button name="o_submit" type="submit" class="btn btn-primary">Save</button>
                    <a href="../orders.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </form>
    <?php
    endif;
    ?>
</body>

</html>