<?php
    include("connection.php"); 
    session_start();
    $email = $_SESSION['email'];
    $fname=$_SESSION['firstname'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>Saved Cards</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/saved_cards.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <?php

        if(isset($_POST['submit']))
    {
        $Email = $email;
        $cardNumber = $_POST['cardNumber'];
        $m = $_POST['month'];
        $y = $_POST['year'];
        $cust_name = $_POST['cust_name'];
        $cardname = $_POST['cardname'];
        $sql="insert into saved_cards(Email,cardNumber,cust_name,cardname,exp_year,exp_month) values('$Email','$cardNumber','$cust_name','$cardname','$y','$m')";
        $result = mysqli_query($connect, $sql);
            if ($result) {
                header("Location:saved_cards.php");
            } else {
                echo "<script>alert('unable to add Address Try Again..')</script>";
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
                        <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Electronics
                        </button>
                        <div id="dp" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
    <div class="main-content">

        <div class="navigator">
            <div class="user_pic">
                <img class="fUkK-z" height="50px" width="50px" src="Images/profice-pic.svg">
                <span style="padding-left:15px">Hello <?php echo " ".$fname ?></span>
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
                        <div class="specify-content">Change Password</div>
                    </a>
                </div>
                <div class="specify">
                    <div><img height="22px" width="22px" src="Images/wallet.svg"></div>
                    <div class="img-title">Payments</div>
                </div>
                <div class="specify-container">
                    <a href="saved_cards.php" target="_self">
                        <div class="specify-content" style="background-color: dodgerblue">Saved Cards</div>
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
            <div class="m_add">
                <h3>Manage Saved Cards</h3>
                <div class="add-content">
                    <div id="add_card" class="new_card" onclick="Card()">+ ADD A NEW CARD</div>
                    <script>
                            function Card() {
                                    document.getElementById("saved_card").style.display="block";
                                    document.getElementById("add_card").innerHTML="ADD A NEW ADDRESS";
                                    }
                    </script>
                    <div id="saved_card" class="card-form">
                        <form method="post" action="saved_cards.php">

                            <div class="input-box"> 
                                <input type="text" id="cn" name="cardNumber" onchange="is_creditCard(this.value)"  required>
                                 <label>Credit Card Number</label>

                             </div>
                             <script>
                              function is_creditCard(str)
                                {
                                 regexp = /^(?:(4[0-9]{12}(?:[0-9]{3})?)|(5[1-5][0-9]{14})|(6(?:011|5[0-9]{2})[0-9]{12})|(3[47][0-9]{13})|(3(?:0[0-5]|[68][0-9])[0-9]{11})|((?:2131|1800|35[0-9]{3})[0-9]{11}))$/;
                                  
                                        if (regexp.test(str))
                                          {
                                            
                                          }
                                        else
                                          {
                                            document.getElementById("cn").value="";
                                            alert("Please enter a valid credit card number!");
                                          }
                                  }
                             </script>
                             <div class="expiry-date">
                                <span style="font-size:18px">Expiry</span>
                         
                                        <select  name="month" required="">
                                            <option disabled="" value="MM">MM</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                                        </select>
                                        <select  name="year" required="">
                                            <option disabled="" value="YY">YY</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option>
                                        </select>
                            </div>

                            <div class="input-box"> 
                                <input type="text" name="cust_name"  required=""  value="">
                                 <label>Name on Card</label>
                             </div>
                             <div class="input-box"> 
                                <input type="text" name="cardname"  required=""  value="">
                                 <label>Name this card for future use</label>
                             </div>
                             <input type="submit" name="submit" value="Save this Card">
                            <a href="saved_cards.php">Cancel</a>
                        </form>
                    </div>
              </div>
              <br>
                <div class="my-cards">
                            <?php
                            $q = "select * from saved_cards where Email='$email'";
                            $res = mysqli_query($connect, $q);
                            $n=mysqli_num_rows($res);
                            if($n>0)
                            {  echo '<h6>My Cards</h6>';
                            }
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo '<div class="addcontent">';
                                echo '<button>'.$row['cardname']."
                                </button>";
                                echo '
                                <div class="dropdown">
                                    <div class="test" id="myBtn"></div>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#home">Edit</a>
                                            <a href="#about">Delete</a>
                                    </div>
                                </div>
                                <br>
                                ' ;
                                echo " ".$row['cust_name']."<br>";
                                echo " "."Card Number:".$row['cardNumber'] ."<br>";
                                echo " "."Expiry Date(MM/YY):".$row['exp_month']."/".$row['exp_year']."<br>";
                                echo '</div>';
                            }

                            ?>
                            <script>

                                document.getElementById("myBtn").onclick = function() {myFunction()};
                                 function myFunction() {
                                    document.getElementById("myDropdown").classList.toggle("show");
                                    }
                            </script>
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