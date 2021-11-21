<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- BS4 CS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="styles/cart-styles.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/login-styles.css">

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
    <h2 class="text-center">Products</h2>
    <hr>
    <!-- Products -->
    <section class="main-content">
        <div class="container">
            <h1 class="text-center text-uppercase">Food Items</h1>
            <br>
            <br>
            <div class="row">
                <?php
                require_once "database/database.php";
                $query = "SELECT * FROM products_table";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($products = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="food-card">
                                <div class="food-card_img">
                                    <img src="<?php echo $products['prod_img']; ?>">
                                </div>
                                <div class="food-card_content">
                                    <div class="food-card_title-section">
                                        <h3 class="food-card_title"><?php echo $products['prod_desc']; ?></h3>
                                    </div>
                                    <form class="form-submit">
                                        <div class="food-card_bottom-section">
                                            <hr>
                                            <div class="space-between">
                                                <div class="food-card_price">
                                                    <span><?php echo $products['msrp']; ?></span>
                                                </div>
                                                <div class="food-card_order-count">
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="o_quantity form-control input-manulator" placeholder="Quantity" value="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="prodid" value="<?php echo $products['prodno']; ?>">
                                            <div class="row justify-content-center">
                                                <button type="submit" class="addItemBtn btn btn-primary">Add to Cart</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php
    include 'modules/footer.php';
    include 'modules/js.inc.php';
    ?>
</body>

</html>