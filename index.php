<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- BS4 CS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="styles/global.css">

    <!-- External Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/carousel.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include 'modules/navbar.php';
    ?>
    <h2 class="text-center">Home</h2>
    <hr>
    <div class="container">
        <!-- Top content -->
        <div class="top-content">
            <div class="container-fluid">
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
                            <img src="images/kambaliciouscakes1.jpg" class="img-fluid mx-auto d-block" alt="img1">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="images/kambaliciouscakes2.jpg" class="img-fluid mx-auto d-block w-100 h-100" alt="img2">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="images/kambaliciouscakes3.jpg" class="img-fluid mx-auto d-block w-100 h-100" alt="img3">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="images/kambaliciouscakes4.jpg" class="img-fluid mx-auto d-block w-100 h-100" alt="img4">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="images/kambaliciouscakes5.jpg" class="img-fluid mx-auto d-block w-100 h-100" alt="img5">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="images/kambaliciouscakes6.jpg" class="img-fluid mx-auto d-block w-100 h-100" alt="img6">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="images/kambaliciouscakes7.jpg" class="img-fluid mx-auto d-block w-100 h-100" alt="img7">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="images/kambaliciouscakes8.jpg" class="img-fluid mx-auto d-block w-100 h-100" alt="img8">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <br>
            <hr>
            <h4 class="text-center">ABOUT US</h4>
            <hr>

                <div class="col"><strong>Kamballicious Cakes and Pastries</strong>, is known for our tasty baked goods, sweets and cakes.
The name itself Kamballicious Cakes and Pastries indicates that we prepare cakes that exactly fit your choices, regardless of the event. We're with you for a couple of years but we make a wide variety of pastries and cakes.Leslie is developing and working to present something new that will fulfill all of our clients' requirements. The cakes are crisp, imaginative and tempting. With a frozen feeling and affection, Kamballicious Cakes and Pastries is happy for variations of cakes. We have a range of cake plans and continue to unfailingly formulate new thoughts.
</div>
<br>

                <div class="col text-center"><img class="img-fluid img-thumbnail" src="images/kambalicious-fam.jpg" alt="" style="height: 250px;"></div>
 

        </div>
    </div>
    <?php
    include 'modules/footer.php';
    include 'modules/js.inc.php';
    ?>
</body>

</html>