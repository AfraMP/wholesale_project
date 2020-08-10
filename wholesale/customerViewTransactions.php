<?php
	session_start(); 
	if(!isset($_SESSION['loginUser'])){
		header("Location:logout.php");
	}

?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel='stylesheet' href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>My Transactions</title>


</head> 
<body>
		<img src="image/whole1.jpg" style="margin-left:3px;float:left"/>
	
	    <h1 style="float:left;color:#040165;margin:10px 20px;font-size:30px">WHOLEsale</h1>
	    <div class='sidebar'>
	    <ul>
		   <li onclick="location.href='customerHome.php'">Home</li>
		   <li onclick="location.href='viewProductsCustomer.php'">View Products</li>
		   <li onclick="location.href='order.php'">Order</li>
		   <li onclick="location.href='cart.php'">Cart</li>
		   <li class='active'  onclick="location.href='customerViewTransactions.php'">My Transactions</li>
		   <li onclick="location.href='logout.php'"><img src="image/logout.jpg" />Logout</li>
	    </ul> 
	</div>
	<div class='container'>
    <h2>MY TRANSACTIONS</h2>
	<b>TRANSACTIONS</b>
		<table class='tableLarge'><tr><th>Transaction ID</th><th>Amount</th><th>Payment Mode</th><th>Phone</th><th>Address</th><th>Date</th></tr>
		<?php 
			$conn=mysqli_connect("localhost","root","","wholesale");
			$curUser=$_SESSION['loginUser'];
			$sql="select * from transaction where customer_id='$curUser'";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['transaction_id']."</td><td>".$row['transaction_amount']."</td><td>".$row['payment']."</td><td>".$row['phone']."</td><td>".$row['address']."</td><td>".$row['date']."</td></tr>";
			}
			echo "</table><br>";
		?>
	
	



</div>
</body>
</html>