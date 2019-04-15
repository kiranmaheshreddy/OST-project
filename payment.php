<?php
include("connection.php");
session_start();
    $email = $_SESSION['email'];
    $fname=$_SESSION['firstname'];
    $pid=$_SESSION['pid'];
    $aid=$_SESSION['address_id'];
    $type=$_SESSION['or_insert'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>Home Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <link rel="stylesheet" href="css/pay.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <?php
        if(isset($_POST['submit']) and $type=='1' ){
    	$sql="insert into orders_info(Email,pid,order_date,delivery_date,address_id) values('$email','$pid',now(),now()+interval 2 day,'$aid')";
    	$res=mysqli_query($connect,$sql);
    	if($res)
    	{
    		  header("Location:orders.php");
    	}else{
    		  echo "<script>alert('Not Successfull')</script>";
    	}
    }else if(isset($_POST['submit']) and $type=='2')
    {
      $sql="select * from cart_info where Email='$email'";
      $result=mysqli_query($connect,$sql);
      $n=mysqli_num_rows($result);
      echo $n;
      while($row = mysqli_fetch_assoc($result))
      {
        $k=$row['pid'];
        $sql1="insert into orders_info(Email,pid,order_date,delivery_date,address_id) values('$email','$k',now(),now()+interval 2 day,'$aid')";
        $res=mysqli_query($connect,$sql1);
      }
      header("Location:orders.php");
    }
    ?>
</head>
<body>
		<div class="main-content">
		<div class="details-container">
      <div class="cards-container">
        <div class="card-head">
          <h5><span style="font-size:18px">Your Saved Cards:</span></h5>
        </div>
           
            <?php
                 
                            $q = "select * from saved_cards where Email='$email'";
                            $res = mysqli_query($connect, $q);
                            $n=mysqli_num_rows($res);
                            echo '<form action="payment.php" method="post">';
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo '<div class="add-item">';
                                echo 
                                    '<div id="add-card" class="custom-control custom-radio custom-control">
                                        <input type="radio" id='.$row['cardNumber'].' name="card" class="custom-control-input" value='.$row['cardNumber'].' required>
                                        <label  class="custom-control-label" for='.$row['cardNumber'].'>';

                                echo $row['cardname']." ".$row['cardNumber'];
                                echo '</div>';
                                echo '</div>';
                            }
                            echo '<input style="padding:3px;width:70px" type="password" name="scvv" pattern="[0-9]{3}" placeholder="CVV" required>';
                            echo ' <input style="position:relative;left:20px" type="submit" name="submit" value="Make Payment">';
                            echo '</form';
                           
            ?>
          </div>
            <div class="m_add">
            <!--    <h3>Payment Details</h3>
                <br>-->
                <h5>Other Credit/Debit card:</h5>
                <div class="add-content">
                    <div id="saved_card" class="card-form">
                        <form method="post" action="payment.php">

                            <div class="input-box"> 
                                <input type="text" id="cn" name="cardNumber" onchange="is_creditCard(this.value)" required>
                                 <label>Credit/Debit Card Number</label>
                             </div>
                             <script>
                              function is_creditCard(str)
                                {
                                 regexp = /^(?:(4[0-9]{12}(?:[0-9]{3})?)|(5[1-5][0-9]{14})|(6(?:011|5[0-9]{2})[0-9]{12})|(3[47][0-9]{13})|(3(?:0[0-5]|[68][0-9])[0-9]{11})|((?:2131|1800|35[0-9]{3})[0-9]{11}))$/;
                                  
                                        if (regexp.test(str))
                                          {
                                            //
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
                         
                                        <select  name="month" id="mm" onchange="checkmonth(this.value)" required="">
                                            <option value="">MM</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                                        </select>
                                          <select  name="year" id="yy" onchange="checkyear(this.value)" required="">
                                              <option value="">YY</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option>
                                          </select>
                            </div>
                            <script>
                              function checkyear(y){
                               var s="19";
                                  if(s==y)
                                  {
                                    var k=document.getElementById("mm").value;
                                    if(k=="01" || k=="02" || k=="03"){
                                      document.getElementById("mm").value="";
                                      document.getElementById("yy").value="";
                                      alert("Your Card Expired!");
                                    }
                                  }
                              }
                              function checkmonth(m){
                               
                                  if(m=="01" || m=="02" || m=="03")
                                  {
                                    var y=document.getElementById("yy").value;
                                    if(y=="19"){
                                      document.getElementById("mm").value="";
                                      document.getElementById("yy").value="";
                                      alert("Your Card Expired!");
                                    }
                                  }
                              }

                            </script>
                             <div class="input-box" style="position:relative;right:100px;width:20%"> 
                                <input type="password" name="cvv" required="" value="" pattern="[0-9]{3}">
                                 <label>CVV</label>
                             </div>
                            <div class="input-box"> 
                                <input type="text" name="cust_name"  required=""  value="">
                                 <label>Name on Card</label>
                             </div>
                             <input type="submit" name="submit" value="Payment">
                            <a href="payment.php">Cancel</a>
                        </form>
                    </div>
              </div>
              <div>
                  <span>OR</span>
              </div>
              <div class="cp">
                <form method="post" action="payment.php">
                  <input type="submit" name="submit" value="Cash on Delivery">
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