<?php

    include("connection.php");
    session_start();
    $email = $_SESSION['email'];
    $fname=$_SESSION['firstname'];
    $pcategory=$_SESSION['pcategory'];
    $ptype=$_SESSION['ptype'];
?>
<!doctype html>
<html lang="en">
<head>
    <title>Mobiles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
          shrink-to-fit=no">
    <link rel="stylesheet" href="css/products_view.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <?php

    $sql="select * from product_info where pcategory='$pcategory' and ptype='$ptype' order by price";
    #price range setting
    $q1="select min(price) as minprice from product_info where pcategory='$pcategory' and ptype='$ptype'";
    $q2="select max(price) as maxprice from product_info where pcategory='$pcategory' and ptype='$ptype'";
    $r=mysqli_query($connect,$q1);
    $rc=mysqli_fetch_assoc($r);
    $minprice=$rc['minprice'];
    $min_init_price=$minprice;
    $r=mysqli_query($connect,$q2);
    $rc=mysqli_fetch_assoc($r);
    $maxprice=$rc['maxprice'];
    $max_init_price=$maxprice;
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
            header("Location:product_list_logged.php");
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
            header("Location:product_list_logged.php");
        } else {
            echo "<script>alert('Invalid Email id or Password')</script>";
        }
    }
    if(isset($_POST['search']))
    {
        $max=$_POST['max'];
        $min=$_POST['min'];
        $min_init_price=$min;
        $max_init_price=$max;
        $arr=array(0,0,0,0,0);
        if($max>=$min)
        {
            if(!empty($_POST['c'])){
                $m1=0;
                $m2=6;
                foreach($_POST['c'] as $selected){

                    $arr[(int)$selected]=$selected;
                }
                $arrcheck = implode(',',$arr);
                $sql="select * from product_info where pcategory='$pcategory' and ptype='$ptype' and price<='$max' and price>='$min' and p_rating in ($arrcheck)";
            }else{
                   $sql="select * from product_info where pcategory='$pcategory' and ptype='$ptype' and price<='$max' and price>='$min'";
             }
        }else{
            echo "<script>alert('Invalid Search Filter Selection')</script>";
        }
}
?>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="HomePage.php" style="font-weight:bold;font-family:cursive">Aaaly</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="search-container">
                <form class="form-inline mt-2 mt-md-0">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a href="#reg-form" data-toggle="modal"><span><i class="fas fa-user-plus"></i></span>
                        Signup</a></li>
                <li class="nav-item">
                    <a href="#login-form" data-toggle="modal"><span><i class="fas fa-sign-in-alt"></i></span>Login</a>
                </li>
                <li class="nav-item"><a href="#"><span><i class="fas
                      fa-shopping-cart"></i></span> Cart</a></li>
                <li class="nav-item"><a href="#"><span> About</span></a></li>
            </ul>
        </div>
    </nav>
  
    <!--Login-form-->
    <div class="modal fade" id="login-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">Login</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-container" method="post" action="product_list.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required />
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required />
                        </div>
                        <button name="login-check" type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">

                </div>
            </div>
        </div>
    </div>
    <!--Registration-form-->
    <div class="modal fade" id="reg-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">Create Account</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-container" method="post" action="product_list.php">
                        <div class="form-group">
                            <label for="usr">First Name</label>
                            <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" required />
                        </div>
                        <div class="form-group">
                            <label for="usr">Last Name</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" required />
                        </div>
                        <div class="form-group">
                            <label for="usr">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" checked>
                                <label class="form-check-label" for="Radio1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                                <label class="form-check-label" for="Radio2">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  title="example:john@gmail.com" required />
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="tel" class="form-control" name="mb_no" placeholder="Enter Mobile Number" pattern="[7-9]{1}[0-9]{9}" title="Enter valid mobile number" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Set Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" pattern="(?=^.{6,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Must contain at least one number/special character and one uppercase and lowercase letter, and at least 6 or more characters" required />
                        </div>
                        <br>
                        <button type="submit" name="reg-submit" class="btn btn-primary btn-block">Create Account</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">

                </div>
            </div>
        </div>
    </div>
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

        <div class="navigator">
                <div class="fnav">
                    <span>Filters</span>
                </div>
            <div class="filters">
                <form action="product_list.php" method="post">
                <div class="price">
                    <div><span>Price</span></div>
                    <div class="slidecontainer">
                        <div><span>Set Minimum Value:</span></div>
                        <input type="range" min="<?php echo $minprice ; ?>" max="<?php echo $maxprice;?>" name="min"  value="<?php echo $min_init_price; ?>" class="slider1" id="minpriceRange">
                        <div><span>Set Maximum Value:</span></div>
                        <input type="range" min="<?php echo $minprice ; ?>" max="<?php echo $maxprice; ?>" name="max" value="<?php echo $max_init_price;?>" class="slider2" id="maxpriceRange">
                        <span>Selected Price Range:</span>
                         <div>From <span id="f1price"></span> to <span id="f2price"></span></div>
                         
                    </div>
                        <script>
                              
                                var slider1 = document.getElementById("minpriceRange");
                                var output1 = document.getElementById("f1price");
                                output1.innerHTML = slider1.value;
                                slider1.oninput = function() {
                                  output1.innerHTML = this.value;
                                }
                                var slider2 = document.getElementById("maxpriceRange");
                                var output2 = document.getElementById("f2price");
                                output2.innerHTML = slider2.value;
                                slider2.oninput = function() {
                                  output2.innerHTML = this.value;
                                }
                                
                        </script>
                        
                </div>
                <div class="custom_rating">
                    <div>Customer Rating</div>
                  <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="c[]" id="ch1" value="5">
                      <label class="custom-control-label" name="c1" for="ch1">5-5<i style="font-size:12px" class="fas fa-star"></i></label>
                </div>
                <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="c[]" id="ch2" value="4">
                      <label class="custom-control-label" for="ch2">4-5<i style="font-size:12px" class="fas fa-star"></i></label>
                </div>
                <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="c[]" id="ch3" value="3">
                      <label class="custom-control-label" for="ch3">3-4<i style="font-size:12px" class="fas fa-star"></i></label>
                </div>
                <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="c[]" id="ch4" value="2">
                      <label class="custom-control-label" for="ch4">2-3<i style="font-size:12px" class="fas fa-star"></i></label>
                </div>
                <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="c[]" id="ch5" value="1">
                      <label class="custom-control-label" for="ch5">1-2<i style="font-size:12px" class="fas fa-star"></i></label>
                </div>
                </div>
                <div><input type="submit" name="search" value="Search"></div>
            </form>
            </div>
            </div>

       <div class="details-container">
            <div id="list1" class="container-fluid">
            <?php
                $res=mysqli_query($connect,$sql);
                $n=mysqli_num_rows($res);
                $i=0;
                while($rec=mysqli_fetch_assoc($res))
                {
                    if($i%4==0)
                    {
                        if($i!=0)
                        {
                            echo '</div>';
                        }
                        echo '<div class="row">';
                    }
            echo '
                    <div class="col-md-3">
                        <div class="product-top">
                            <a href="plist-pdesc.php?pid='.$rec['pid'].'"><img src="'.$rec['pid'].'"></a>
                        </div>
                        <div class="product-bottom">
                            <div>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <div>'.$rec['pname'].'</div>
                                <div>₹'.$rec['price'].'</div>
                            </div>
                        </div>
                    </div>
                ';
                $i=$i+1;
                }
                if($n%4!=0)
                {
                    echo '</div>';
                }
            ?>
        </div>
       </div>
    </div>
    <script type="text/javascript">
        
      $('.like-btn').on('click', function() {
        $(this).toggleClass('is-active');
      });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html> 