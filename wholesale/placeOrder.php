<?php
	session_start(); 
	if(!isset($_SESSION['loginUser'])){
		header("Location:logout.php");
	}
	$conn=mysqli_connect("localhost","root","","wholesale");
	$totalPrice=$_GET['totalPrice'];
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel='stylesheet' href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Place Order</title>


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
<div class='container'>

        <h2>ORDER DETAILS</h2>
		<b>Enter your details below</b>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='get'>
			<label for='textarea'>Address: </label><textarea id='textarea' name='address' required></textarea><br>
			<label for='phone'>Phone: </label><input type=text name='phone' class='formInputItem' required><br>
			<label for='payment'>Payment: </label><input type=radio name='payment' value='online' required> Online
			 								<input type=radio name='payment' value='COD' required> Cash On Delivery<br>
			<p>Total Amount:   <?php echo $totalPrice."&#8377;</p>"; ?>
			<label></label><button style='width:200px;height:3em;' type='submit' class='gBtn' name='submit' value='<?php echo $totalPrice; ?>'>Place Order</button>

		</form>	
	<?php
		if(isset($_GET['submit'])){
			$totalPrice=$_GET['submit'];
			$address=$_GET['address'];
			$phone=$_GET['phone'];
			$payment=$_GET['payment'];
			$custID=$_SESSION['loginUser'];
			$sql="insert into transaction(transaction_amount,customer_id,phone,address,payment,date) values('$totalPrice','$custID','$phone','$address','$payment',current_date())";
			$result=mysqli_query($conn,$sql);
			$sql="delete from cart where customer_id='$custID'";
			$result=mysqli_query($conn,$sql);
			echo "<script>alert('Order placed.\\nThe products will be delivered within 5 hours.');</script>";
			header("refresh:0;url=order.php");
		}
		else{
			if($totalPrice==0){
				echo "<script>alert('Cart is empty!');</script>";
			header("refresh:0;url=cart.php");
			}
		}
	?>


</div>
</body>
</html>


