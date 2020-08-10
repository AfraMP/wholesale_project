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
	<title>Cart</title>


</head> 
<body>
		<img src="image/whole1.jpg" style="margin-left:3px;float:left"/>
	
	    <h1 style="float:left;color:#040165;margin:10px 20px;font-size:30px">WHOLEsale</h1>
	    <div class='sidebar'>
	    <ul>
		   <li onclick="location.href='customerHome.php'">Home</li>
		   <li onclick="location.href='viewProductsCustomer.php'">View Products</li>
		   <li onclick="location.href='order.php'">Order</li>
		   <li class='active' onclick="location.href='cart.php'">Cart</li>
		   <li onclick="location.href='customerViewTransactions.php'">My Transactions</li>
		   <li onclick="location.href='logout.php'"><img src="image/logout.jpg" />Logout</li>
	    </ul> 
	</div>
<div class='container'>
        <h2>CART</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='get'>
		<?php 
			$conn=mysqli_connect("localhost","root","","wholesale");
			$curUser=$_SESSION['loginUser'];
			$sql="select * from cart where customer_id='$curUser'";
			$result=mysqli_query($conn,$sql);
			$totPrice=0;
			$row=mysqli_fetch_assoc($result);
		    if($row==0){
				echo "<script>alert('cart is empty');</script>";
			}
			else{
			?>
			 <b>CART</b>
			<table><tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Remove</th></tr>
			<?php
			$sql="select * from cart where customer_id='$curUser'";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['product_name']."</td><td>".$row['quantity']."</td><td>".$row['price']."</td><td><button type='submit' class='gBtn' name='submit' value='".$row['product_id']."'>Remove</button></td></tr>";
				$totPrice+=$row['price'];
			}
			echo "</table><br><b>Total Price: </b>".$totPrice."</form><form action='placeOrder.php' method='get'>
		<button style='float:right;margin-right:100px;width:150px;height:3em;' type='submit' name='totalPrice' value='".$totPrice."' class='gBtn'>Continue</button></form>";
			}
		?>
	
		<?php 
			if(isset($_GET['submit'])){
				$prodID=$_GET['submit'];
				$sql="select * from cart where product_id='$prodID' and customer_id='$curUser'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$quan=$row['quantity'];
				$sql="select * from products where product_id='$prodID'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$remQuan=$row['quantity'];
				$remQuan+=$quan;
				$sql="update products set quantity='$remQuan' where product_id='$prodID'";
				$result=mysqli_query($conn,$sql);
				$sql="delete from cart where product_id='$prodID' and customer_id='$curUser'";
				$result=mysqli_query($conn,$sql);
				header("Location:cart.php");
			}
		?>
		



</div>
</body>
</html>