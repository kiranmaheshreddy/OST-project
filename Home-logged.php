<?php
include("connection.php");
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Home Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <link rel="stylesheet" href="css/Home.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <?php
    $firstname = $_SESSION['firstname'];
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location:HomePage.php");
    }
    ?>
</head>

<body>
    <!--Main-header-->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="Home-logged.php" style="font-weight:bold;font-family:cursive">Aaaly</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="search-container">
                <form class="form-inline mt-2 mt-md-0">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search" />
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="nav navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" id="dropdownhead" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $firstname ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="Profile.php">Profile</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <form method="post" action="Home-logged.php">
                            <input class="dropdown-item" type="submit" value="Logout" name="logout">
                        </form>
                    </div>
                </li>
                <li class="nav-item"><a href="add-cart.php"><span><i class="fas
                  fa-shopping-cart"></i></span> Cart</a></li>
                <li class="nav-item"><a href="#"><span> About</span></a></li>
            </ul>
        </div>
    </nav>

    <div id="category-container-parent" class="container-fluid">
        <div id="category-container" class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Electronics
                        </button>
                        <div id="dp" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="Home_logged_pview.php?pcategory=mobile&ptype=electronics">Mobiles</a>
                            <a class="dropdown-item" href="Home_logged_pview.php?pcategory=Laptop&ptype=electronics">Laptops</a>
                            <a class="dropdown-item" href="Home_logged_pview.php?pcategory=Earphone&ptype=electronics">Earphones</a>
                            <a class="dropdown-item" href="#">Speakers</a>
                            <a class="dropdown-item" href="#">PowerBanks</a>
                            <a class="dropdown-item" href="Home_logged_pview.php?pcategory=Watches&ptype=electronics">Watches</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Clothing
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Footware
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Home Decoratives
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Images/electronics.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Images/livingroom.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Images/exciting.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div id="list1" class="container-fluid">
        <h2 class="l1">Electronics</h2>
        <div class="row">
            <div class="col-md-2">
                <div class="product-top">
                    <a href="Home_logged_pview.php?pcategory=mobile&ptype=electronics"><img src="Images/mob7.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    
                    <h3>Mobiles</h3>
                    <h5>From ₹2000</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="Home_logged_pview.php?pcategory=Laptop&ptype=electronics"><img src="Images/lap8.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Laptops</h3>
                    <h5>From ₹25000</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="Home_logged_pview.php?pcategory=Earphone&ptype=electronics"><img src="Images/headphones.jpeg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Ear Phones</h3>
                    <h5>$150.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="Home_logged_pview.php?pcategory=Watches&ptype=electronics"><img src="Images/w1.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Watches</h3>
                    <h5>$500.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="Home_logged_pview.php?pcategory=powerbankes&ptype=electronics"><img src="Images/p2.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Power Banks</h3>
                    <h5>$700.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="Home_logged_pview.php?pcategory=speakers&ptype=electronics"><img src="Images/s1.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Speakers</h3>
                    <h5>$200.00</h5>
                </div>
            </div>
        </div>
    </div>

    <div id="list1" class="container-fluid">
        <h2 id="l2">Clothing</h2>
        <div class="row">
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/e6.jpeg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/k1.jpeg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/mj1.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/ms1.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/img9.png"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/s1.jpeg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
        </div>
    </div>
    <div id="list1" class="container-fluid">
        <h2 id="l3">Footwear</h2>
        <div class="row">
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/img5.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/img6.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/img7.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/img8.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/img8.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/img8.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
        </div>
    </div>

    <div id="list1" class="container-fluid">
        <h2 id="l4">HomeDecoratives</h2>
        <div class="row">
            <div class="col-md-2">
                <div class="product-top">
                    <a href="Home_logged_pview.php?pcategory=flowers&ptype=homedecor"><img src="Images/lamp.jpeg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="Home_logged_pview.php?pcategory=flowers&ptype=homedecor"><img src="Images/books.jpeg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Flowers</h3>
                    <h5>From $100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/bell.jpeg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/buddha.jpeg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/pillow.jpg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="product-top">
                    <a href="#"><img src="Images/walllamp.jpeg"></a>
                </div>
                <div class="product-bottom text-center">
                    <h3>Fitness Watch</h3>
                    <h5>$100.00</h5>
                </div>
            </div>
        </div>
    </div>
</div>
    <footer class="page-footer font-small unique-color-dark" style="background-color:#343a40;color:white">

        <div style="background-color:#fcbb6a">
            <div class="container">
                <div class="row py-4 d-flex align-items-center">
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4
              mb-md-0">
                        <h6 class="mb-0">Get connected with us on social networks!</h6>
                    </div>
                    <div class="col-md-6 col-lg-7 text-center text-md-right">
                        <a class="fb-ic">
                            <i class="fab fa-facebook-f white-text mr-4"> </i>
                        </a>
                        <a class="tw-ic">
                            <i class="fab fa-twitter white-text mr-4"> </i>
                        </a>
                        <a class="gplus-ic">
                            <i class="fab fa-google-plus-g white-text mr-4"> </i>
                        </a>
                        <a class="li-ic">
                            <i class="fab fa-linkedin-in white-text mr-4"> </i>
                        </a>
                        <a class="ins-ic">
                            <i class="fab fa-instagram white-text"> </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center text-md-left mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">Company Details</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width:150px;">
                    <p>
                        <!--- add company details-->
                    </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">Products</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width:90px;">
                    <p>
                        <a href="#!">Electronics</a>
                    </p>
                    <p>
                        <a href="#!">Clothing</a>
                    </p>
                    <p>
                        <a href="#!">Footware</a>
                    </p>
                    <p>
                        <a href="#!">Home Decoratives</a>
                    </p>

                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 110px;">
                    <p>
                        <a href="#!">Your Account</a>
                    </p>
                    <p>
                        <a href="#!">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#!">Help</a>
                    </p>

                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 80px;">
                    <p>
                        <i class="fas fa-home mr-3"></i> VIZAG , AP , INDIA</p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> info@example.com</p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> +91 9573928958</p>
                    <p>
                        <i class="fas fa-print mr-3"></i> +91 9848562066</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> Aaaly.com</a>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html> 