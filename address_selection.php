<?php
    include("connection.php"); 
    session_start();
    $email = $_SESSION['email'];
    $fname=$_SESSION['firstname'];
    $pid=$_SESSION['pid'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>Home Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <link rel="stylesheet" href="css/address_selection.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

 
          <?php
                if(isset($_POST['place-order']))
                {
                    $_SESSION['address_id']=$_POST['address'];
                    header("Location:payment.php");
                }
                if (isset($_POST['add-submit'])) {
                        $Email = $email;
                        $name = $_POST['name'];
                        $mb_no = $_POST['mb_no'];
                        $pincode = $_POST['pincode'];
                        $locality = $_POST['locality'];
                        $address = $_POST['address'];
                        $city = $_POST['city'];
                        $state = $_POST['state'];
                        $landmark = $_POST['landmark'];
                        $mb_alt = $_POST['mb_alt'];
                        $type = $_POST['type'];
                        $sql = "insert into address_info(Email,name,mobile,pincode,locality,address,city,state,landmark,mobile_alt,Type) values('$Email','$name','$mb_no','$pincode','$locality','$address','$city','$state','$landmark','$mb_alt','$type')";
                        $result = mysqli_query($connect, $sql);
                        if ($result) {
                            header("address_selection.php");
                        } else {
                            echo "<script>alert('unable to add Address Try Again..')</script>";
                        }
                    }
        ?>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#" style="font-weight:bold;font-family:cursive">Aaaly</a>
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

                <li class="nav-item dropdown" style="margin-right:150px">
                    <a href="Home-logged.php" class="dropdown-toggle" id="dropdownhead" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            </ul>
        </div>
    </nav>
    <div class="maincontent">
    	<div class="address-container">
    		<div class="address-head">
    			<span style="font-size:18px">DELIVERY ADDRESS</span>
    		</div>
           
            <?php
                 
                            $q = "select * from address_info where Email='$email'";
                            $res = mysqli_query($connect, $q);
                            $n=mysqli_num_rows($res);
                            echo '<form action="address_selection.php" method="post">';
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo '<div class="add-item">';
                                echo 
                                    '<div id="add-content" class="custom-control custom-radio custom-control">
                                        <input type="radio" id='.$row['address_id'].' name="address" class="custom-control-input" value='.$row['address_id'].' required>
                                        <label style="color:white" class="custom-control-label" for='.$row['address_id'].'>';
                                echo $row['name'] ." ".'<button> '.$row['Type'].' </button>'."  ".$row['mobile'].'<br>';
                                echo $row['locality'] . "," . $row['address'] . "," . $row['city'] ."<br>";
                                echo $row['state'] ."-".$row['pincode']."." ."<br>";
                                echo '</label></div>';
                                echo '</div>';
                            }
                            echo ' <input type="submit" name="place-order" value="DELIVERY HERE">';
                            echo '</form';
                           
            ?>
        </div>
        <div class="m_add">
        <div class="add_content">
                    <div id="ad_add" class="new_add" onclick="Search()">+ ADD A NEW ADDRESS</div>
                    <script>
                            function Search() {
                                    document.getElementById("myreg").style.display="block";
                                    document.getElementById("ad_add").innerHTML="ADD A NEW ADDRESS";
                                    }
                    </script>
                    <div id="myreg" class="form-content">
                        <br>
                        <form method="post" action="address_selection.php">
                            <div class="style-box">
                                <div class="input-box">
                                    <input type="text" name="name" required="">
                                    <label>Name</label>
                                </div>
                                <div class="input-box">
                                    <input type="text" name="mb_no" required="">
                                    <label>Mobile Number</label>
                                </div>
                            </div>
                            <div class="style-box">
                                <div class="input-box">
                                    <input type="text" name="pincode" required="">
                                    <label>Pincode</label>
                                </div>
                                <div class="input-box">
                                    <input type="text" name="locality" required="">
                                    <label>Locality</label>
                                </div>
                            </div>
                            <div class="style-box">
                                <div class="input-box">
                                    <input id="tx" type="text" name="address" required="">
                                    <label>Address</label>
                                </div>
                            </div>
                            <div class="style-box">
                                <div class="input-box">
                                    <input type="text" name="city" required="">
                                    <label>City/District/Town</label>
                                </div>
                                <div class="input-box">
                                    <input type="text" name="state" required="">
                                    <label>State</label>
                                </div>
                            </div>
                            <div class="style-box">
                                <div class="input-box">
                                    <input type="text" name="landmark" required="">
                                    <label>Landmark</label>
                                </div>
                                <div class="input-box">
                                    <input type="text" name="mb_alt" required="">
                                    <label>Alternate Phone(Optional)</label>
                                </div>
                            </div>
                            <label>Address Type</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="type" class="custom-control-input" value="home">
                                <label class="custom-control-label" for="customRadioInline1">Home</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="type" class="custom-control-input" value="work">
                                <label class="custom-control-label" for="customRadioInline2">Work</label>
                            </div><br>
                            <input type="submit" name="add-submit" value="Save">
                            <a href="address_selection.php">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
    	</div>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>