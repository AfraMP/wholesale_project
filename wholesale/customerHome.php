<?php
	session_start(); 
	if(isset($_SESSION['loginUser'])){
		echo "<title>".$_SESSION['loginUser']."</title>";
	}
	else{
		header("Location:logout.php");
	}

?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel='stylesheet' type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/a.js"></script>

</head> 
<body>
		<img src="image/whole1.jpg" style="margin-left:3px;float:left"/>
	
	    <h1 style="float:left;color:#040165;margin:10px 20px;font-size:30px">WHOLEsale</h1>
	    <div class='sidebar'>
	    <ul>
		   <li class='active' onclick="location.href='customerHome.php'">Home</li>
		   <li onclick="location.href='viewProductsCustomer.php'">View Products</li>
		   <li onclick="location.href='order.php'">Order</li>
		   <li onclick="location.href='cart.php'">Cart</li>
		   <li onclick="location.href='customerViewTransactions.php'">My Transactions</li>
		   <li onclick="location.href='logout.php'"><img src="image/logout.jpg" />Logout</li>
	    </ul> 
	</div>
	<div class="container1">
	   <p>TIME TO ELEVATE YOUR SNACKING EXPERIENCE.<br/>
	   Whether its 20 large-sized packet for your slumber party or 15<br/>
	   small packets for your cubicle,tell us how you want <br/>
	   WHOLEsale to wow you!</p>
	</div>
	<div class="container2">
	<div>
	<h3>CHOOSE YOUR SNACKS!</h3>
	<p>Choose from ranfe of 25+ snacks.<br/>
	We've got everything from wholewheat waffle right up to pita<br/>
	chips and everything in between!</p></div>
	</div>
	<div class="container2" style="clear:both;margin-top:20px">
	<h3>BOX IT!</h3>
	<p>COD and online payments are both available.</p>
	<p>Get free shipping on all orders above Rs.12! You'll be <br/>
	charged Rs.60 charges</p>
	</div>
    <div class='slideshow-container'>
        <figure>
		<img src="image/images-4.jpg">
		<img src="image/mags1.jpg">
		<img src="image/images-1.jpg">
		<img src="image/kits2.jpg">
		</figure>
	</div>
		<div class="dashboard">
		<table>
		 <tr>
		 <th><img src="image/prod.jpg"><br/><a href="viewProductsCustomer.php">VIEW PRODUCTS</a></th>
		 <th><img src="image/order.jpg"><br/><a href="order.php">ORDER</a</th>
		 <th><img src="image/cart.jpg"><br/><a href="cart.php">CART</a></th>
		 <th><img src="image/transac.jpg"><br/><a href="customerViewTransactions.php">MY TRANSACTION</a></th>
		 <th><img src="image/logout1.jpg"><br/><br/><a href="logout.php">LOGOUT</a></th>
		 </tr>
		 </table>
	</div>
	<footer style="background-image:url(image/dr.jpg)">
	<div>
	<div>
	
	</div>
	<p style="font-size:20px">Contact Us:<br/><br/><br/><br/>
	<img src="image/w.jpg"/><p>8660707701</p><br/><br/><br/>
	<img src="image/i.jpg"/><img src="image/f.jpg"/>
	</div>
	<p>Privacy Policy</p>
	  <p>&copy; 2019 Wholesale management Inc. All Rights Reserved.</p>
	</footer>
	
</body>
</html>