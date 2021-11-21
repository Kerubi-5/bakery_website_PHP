<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <!-- BS4 CS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <!-- BS4 JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Local CSS -->
    <link rel="stylesheet" href="styles/cart-styles.css">
    <link rel="stylesheet" href="styles/global.css">

    <!-- External Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="overflow-x: hidden;">
    <?php
    include 'modules/navbar.php';
    ?>
    <h2 class="text-center">Shopping Cart</h2>
    <hr>
    <section class="main-content">
        <div class="container">
            <h1 class="text-center text-uppercase">Cart Items</h1>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 bg-light">
                                <div class="p-2 px-3 text-uppercase">Product</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Price</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Quantity</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Remove</div>
                            </th>
                        </tr>
                    </thead>
                    <?php
                    require_once "database/database.php";
                    $whereIn = array();
                    foreach ($_SESSION['cart'] as $key => $value) {
                        array_push($whereIn, $key);
                    }
                    $sqlWhere = implode(",", $whereIn);
                    $sql = "
                    SELECT * FROM products_table
                    WHERE prodno IN ($sqlWhere)";
                    $result = mysqli_query($conn, $sql);
                    if (isset($_SESSION['total_price']))

                        $_SESSION['total_price'] = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($products = mysqli_fetch_assoc($result)) {
                            $_SESSION['total_price'] = $_SESSION['total_price'] + ($products['msrp'] * $_SESSION['cart'][$products['prodno']]);
                    ?>
                            <tbody>
                                <tr>
                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="<?php echo $products['prod_img']; ?>" width="60" class="img-fluid rounded shadow-sm" style="height:130px;">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"><?php echo $products['prod_desc']; ?></h5>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle"><strong>&#8369; <?php echo $products['msrp'] * $_SESSION['cart'][$products['prodno']]; ?></strong></td>
                                    <td class="border-0 align-middle"><strong><?php echo $_SESSION['cart'][$products['prodno']]; ?></strong></td>
                                    <td class="border-0 align-middle"><a href="database/itemDelete.php?remove=<?php echo $products['prodno']; ?>" class="text-dark"><i class="fa fa-trash" onclick="return confirmMsg('Do you want to delete this time?')"></i></a></td>
                                </tr>
                                <tr>
                            </tbody>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>

        </div>
    </section>
    <div id="confirm-order" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">LOGIN FORM</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form class="form-login" action="database/login.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" aria-describedby="helpId" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <p><small>Not yet registered? Sign <a href="user.php">HERE</a></small></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <form class="checkout-form">
        <div class="row py-5 p-4 bg-white rounded shadow-sm">
            <div class="col-lg-6">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                <div class="p-4">
                    <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                    <textarea cols="30" rows="2" id="o_instructions" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                <div class="p-4">
                    <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                    <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>&#8369; <?php echo $_SESSION['total_price']; ?></strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong></strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                            <h5 id="total_price" class="font-weight-bold"><?php echo $_SESSION['total_price']; ?></h5>
                        </li>
                        <input type="hidden" class="logged" value="<?php echo $_SESSION['CloggedIn']; ?>">
                        <?php $dis_none = ($_SESSION['total_price'] > 1) ? "" : "none"; ?>
                    </ul><button type="button" class="checkoutBtn btn btn-dark rounded-pill py-2 btn-block" style="pointer-events: <?php echo $dis_none ?>">Procceed to checkout</button>
                </div>
            </div>
        </div>
    </form>
    <?php
    include 'modules/footer.php';
    include 'modules/js.inc.php';
    ?>
</body>

</html>