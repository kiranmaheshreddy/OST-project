<?php

    include("connection.php");
    session_start();
    $email = $_SESSION['email'];
    $firstname=$_SESSION['firstname'];
    $pid=$_SESSION['pid'];
    $sql="select * from product_info where pid='$pid'";
    $res=mysqli_query($connect,$sql);
    $row=mysqli_fetch_assoc($res);
    $price=$row['price'];
?>
<!doctype html>
<html lang="en">
<head>
    <title>Product Description</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
          shrink-to-fit=no">
    <link rel="stylesheet" href="css/product_desc.css">
    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location:HomePage.php");
    }
    
        if(isset($_POST['buy']))
    {
        if($email!='')
        {
            $_SESSION['or_insert']=1;
            header("Location:address_selection.php");
        }else{
            echo "<script>alert('Please Login!')</script>";
        }
    }
    if(isset($_POST['cart']))
    {
        if($email!='')
        {
            $quantity=1;
            $sql="insert into cart_info values('$email','$pid','$price','$quantity')";
            $res=mysqli_query($connect,$sql);
            if($res)
            {
                header("Location:add-cart.php");
            
            }else{

            header("Location:add-cart.php");
        }
    }
    }
       if (isset($_POST['reg-submit'])) {
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['email'] = $_POST['email'];
        $email = $_POST['email'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $mb_no = $_POST['mb_no'];
        $password = $_POST['password'];
        $q = "insert into customer_info values('$email','$fname','$lname','$gender','$mb_no','$password')";
        if (mysqli_query($connect, $q)) {
            header("Location:payment.php");
        } else {
            echo "<script>alert('You are not Successfully Registered')</script>";
        }
    }
    if (isset($_POST['login-check'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $q = "select * from customer_info where Email='$email' and Pass='$password'";
        $result = mysqli_query($connect, $q);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $arr = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['firstname'] = $arr['Fname'];
            header("Location:payment.php");
        } else {
            echo "<script>alert('Invalid Email id or Password')</script>";
        }
    }
    if(isset($_POST['wish-list']))
    {
        $q1="insert into wishlist(Email,pid) values('$email','$pid')";
        if(mysqli_query($connect,$q1))
        {
            header("Location:wishlist.php");
        }else{
             echo "<script>alert('Unable to add to wishlist')</script>";
        }
    }
?>


</head>

<body>
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

                <li class="nav-item"><a href="#"><span><i class="fas
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
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Mobiles</a>
                            <a class="dropdown-item" href="#">Earphones</a>
                            <a class="dropdown-item" href="#">Laptops</a>
                            <a class="dropdown-item" href="#">Speakers</a>
                            <a class="dropdown-item" href="#">PowerBanks</a>
                            <a class="dropdown-item" href="#">Watches</a>
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
                            Footwear
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
    <div class="main-content">
        <div id="myimg" class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="favorite"> 
                            <form action="product_desc_logged.php" method="post">
                                <button id="b" type="submit" name="wish-list" title="Add to WishList">
                                       <i id="f" class="fas fa-heart"></i>
                                </button>
                            </form>
                    </div>
                    <script>

                            $(document).ready(function(){
                              $(#b).click(function(){
                                $(#f).toggleClass("red");
                                             });
                                });

                   </script>
                    <div class="div1">
                        <div class="product">
                            <img src=<?php echo $row['pid'] ?> >
                         </div>
                         <div class="form-block">
                            <div class="ip1">
                                <form method="post" action="product_desc_logged.php">
                                    <input type="submit" name="cart" value="ADD TO CART">
                                </form>
                            </div>
                            <div class="ip2">
                                 <form action="product_desc_logged.php" method="post">
                                    <input type="submit" name="buy" value="BUY NOW">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="col-md-8">
                    <div class="div2">
                        <div>
                           <p> <span><sup id="pbrand"><?php echo $row['pbrand'] ?></sup> </span><span style="font-size:18px" id="pname"><?php echo $row['pname']?></span>
                           </p>
                        </div>
                        <div>
                            <p class="newarrival text-center"><span style="font-size:16px"><?php echo $row['p_rating'] ?></span> <i class="fa fa-star"></i></p>
                        </div>
                        <p style="font-size:18px">₹<?php echo $row['price'] ?>/-</p>
                        <br>
                        <div>
                             <p><span style="font-weight: 500">Product description:</span><?php echo $row['p_description']?></p>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <script type="text/javascript">
      $('.minus-btn').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());

            if (value > 1) {
                value = value - 1;
            } else {
                value = 1;
            }

        $input.val(value);

        });

        $('.plus-btn').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());

            if (value < 10) {
            value = value + 1;
            } else {
                value =10;
            }

            $input.val(value);
        });

      $('.like-btn').on('click', function() {
        $(this).toggleClass('is-active');
      });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html> 