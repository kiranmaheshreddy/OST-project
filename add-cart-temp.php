<?php
    include("connection.php"); 
    session_start();
    $email = $_SESSION['email'];
    $fname=$_SESSION['firstname'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <link rel="stylesheet" href="css/cart.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
      <?php
      if(isset($_POST['plus']))
      {

         $img=$_GET['pq_id'];
         $sql1="update cart_info set quantity=quantity+1 where Email='$email' and pid='$img'";
         $qr=mysqli_query($connect,$sql1);

      }

       if(isset($_POST['minus']))
      {

         $img=$_GET['pq_id'];
         $sql1="update cart_info set quantity=quantity-1 where Email='$email' and pid='$img' and quantity>1";
         $qr=mysqli_query($connect,$sql1);
      }
      if(isset($_POST['remove']))
      {
        $img=$_GET['pq_id'];
        $sql2="delete from cart_info where Email='$email' and pid='$img'";
        $qr=mysqli_query($connect,$sql2);
      }
      $sql_t="select * from cart_info where Email='$email'";
      $tr=mysqli_query($connect,$sql_t);
      $num=mysqli_num_rows($tr);
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

                <li class="nav-item dropdown" style="margin-right:150px">
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
            </ul>
        </div>
    </nav>
    <div class="maincontent">
    	<div class="cart-container">
    		<div class="cart-head">
    			<span style="font-size:18px">MY CART(<?php echo $num; ?>)</span>
    		</div>
            <?php
                $sql="select * from cart_info where Email='$email'";
                $result=mysqli_query($connect,$sql);
                    $totalprice=0;
                    $i=0;
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $img=$row['pid'];
                        $p="select * from product_info where pid='$img'";
                        $res2=mysqli_query($connect,$p);
                        $row2=mysqli_fetch_assoc($res2);
                        $dd="select curdate()+2 as date";
                        $res3=mysqli_query($connect,$dd);
                        $row3=mysqli_fetch_assoc($res3);
                        $ddate=date('F d, Y', strtotime($row3['date']));
                        echo 
                                '<div class="cart-item-container">
                    			 <div class="cart-img">	
                    				<div class="ci">
                                        <img src='.$row2['pid'].' width="50%" height="100%">            
                                    </div>
                       
                    	<div class="add">
                                    <div class="quantity">
                                    <form action="add-cart-temp.php?pq_id='.$row2['pid'].'" target="_self" method="post">
                                        <button type="submit" class=""  name="minus">-</button>
                                        <input type="text" name="name" value='.$row['quantity'].'>
                                        <button type="submit" class=""  name="plus">+</button>
                                    </form>
                                    </div> 
                        </div>
                    
                    			</div>
                    			<div class="cart-desc">
                                         <p> <span><sup>'.$row2['pbrand'].'</sup></span><span style="font-size:18px">'.$row2['pname'].'</span>
                                         <p style="font-size:16px;margin-top:140px;">Price:₹'.$row2['price'].'</p>
                    			</div>
                    			<div class="cart-date">
                                    Delivery by '.$ddate.'
                    			</div>
                                <div class="remove-item">
                                    <form action="add-cart-temp.php?pq_id='.$row2['pid'].'" target="_self" method="post">
                                        <input type="submit" value="Remove" name="remove">
                                    </form>
                                </div>
                    		</div>';

                        $i=$i+1;
                        $totalprice=$totalprice+(int)$row2['price']*(int)$row['quantity'];
                    }
            ?>

    	</div>
    	<div class="total-price">
                <div class="price" style="color:gray">PRICE DETAILS</div>
                 <form action="#" method="post">
                    <div class="prices" style="padding:10px;"><span>Price(<?php echo $i?> items)</span><span style="float:right">₹<?php echo $totalprice?></span>
                    </div>
                     <div class="prices" style="padding:10px;border-bottom-style:dashed; border-bottom-color:gray"><span>Delivery Charges</span><span style="float:right">FREE</span>
                    </div>
                          <div class="prices" style="padding:30px 10px 30px 10px;border-bottom: 1.5px solid #f0f0f0;"><span>Amount Payable</span><span style="float:right">₹<?php echo $totalprice?></span>
                         </div>
                         <div class="sub">
                           <input type="submit" namr="submit" value="Proceed to checkout">
                        </div>
                </form>
        </div>

    </div>
    <script type="text/javascript">



  /*    $('.minus-btn').on('click', function(e) {
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
      });*/
    </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>