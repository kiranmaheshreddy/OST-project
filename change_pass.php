<?php
    include("connection.php"); 
    session_start();
    $email = $_SESSION['email'];
    $fname=$_SESSION['firstname'];
    if(isset($_POST['submit']))
    {
        $op=$_POST['op'];
        $np=$_POST['np'];
        $rnp=$_POST['rnp'];
        $result=mysqli_query($connect,"select  Pass from customer_info where Email='$email'");
        $row=mysqli_fetch_assoc($result);
        if($row['Pass']==$op)
        {
            if($np==$rnp)
            {
                $result=mysqli_query($connect,"update customer_info set Pass='$np' where Email='$email'");
                header("Location:change_pass.php");
            }else{
                    echo "<script>alert('Invalid Password')</script>";
            }
        }else{
                    echo "<script>alert('Invalid Password')</script>";
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>Home Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/change_paa.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
                        <?php echo $fname ?>
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
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Electronics
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Clothing
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-it
                                        
                                        em" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Footwear
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Home Decoratives
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">

        <div class="navigator">
            <div class="user_pic">
                <img class="fUkK-z" height="50px" width="50px" src="Images/profice-pic.svg">
                <span style="padding-left:15px">Hello<?php echo ' ' . $fname ?></span>
            </div>
            <div class="user_info">
                <div class="specify">
                    <div><img height="22px" width="22px" src="Images/user.svg"></div>
                    <div class="img-title">Account Settings</div>
                </div>
                <div class="specify-container">
                    <a href="Profile.php" target="_self">
                        <div class="specify-content">
                            Personal Information</div>
                    </a>
                    <a href="manage_add.php" target="_self">
                        <div class="specify-content">Manage Addresses</div>
                    </a>
                    <a href="change_pass.php" target="_self">
                        <div class="specify-content" style="background-color: dodgerblue">Change Password</div>
                    </a>
                </div>
                <div class="specify">
                    <div><img height="22px" width="22px" src="Images/wallet.svg"></div>
                    <div class="img-title">Payments</div>
                </div>
                <div class="specify-container">
                   
                    <a href="saved_cards.php" target="_self">
                        <div class="specify-content" >Saved Cards</div>
                    </a>
                </div>
                <div class="specify">
                    <div><img height="22px" width="22px" src="Images/shopping-bag.svg"></div>
                    <div class="img-title">My Stuff</div>
                </div>
                <div class="specify-container">
                    <a href="orders.php" target="_self">
                        <div class="specify-content">My Orders</div>
                    </a>
                    <a href="wishlist.php" target="_self">
                        <div class="specify-content">My Wishlist</div>
                    </a>
                </div>
            </div>

        </div>
        <div class="details-container">
            <div class="ch_paas">
                <h3>Change Password</h3>
                <div class="form" action="change_pass.php" method="post">
                    <form action="change_pass.php" method="post">
                    <input type="password" name="op" placeholder="Type Current Password" required>
                    <input type="password" name="np" placeholder="Type New Password" required>
                    <input type="password" name="rnp" placeholder="Retype New Password" required>
                    <input type="submit" name="submit" value="CHANGE PASSWORD">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>