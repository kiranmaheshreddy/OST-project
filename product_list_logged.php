<?php
    include("connection.php");
    session_start();
    $email = $_SESSION['email'];
    $firstname=$_SESSION['firstname'];
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <?php
        if (isset($_POST['logout'])) {
        session_destroy();
        header("Location:HomePage.php");
    }
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
    <style>
        .red{
            color:red;
        }
    </style>
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

       
        <div class="navigator">
                <div class="fnav">
                    <span>Filters</span>
                </div>
            <div class="filters">
                <form action="product_list_logged.php" method="post">
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
                            <a href="plist-pdesc-logged.php?pid='.$rec['pid'].'"><img src="'.$rec['pid'].'"></a>
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


      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html> 