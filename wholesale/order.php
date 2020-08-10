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
	<title>Order</title>


</head> 
<body>
		<img src="image/whole1.jpg" style="margin-left:3px;float:left"/>
	
	    <h1 style="float:left;color:#040165;margin:10px 20px;font-size:30px">WHOLEsale</h1>
	    <div class='sidebar'>
	    <ul>
		   <li onclick="location.href='customerHome.php'">Home</li>
		   <li onclick="location.href='viewProductsCustomer.php'">View Products</li>
		   <li class='active' onclick="location.href='order.php'">Order</li>
		   <li onclick="location.href='cart.php'">Cart</li>
		   <li onclick="location.href='customerViewTransactions.php'">My Transactions</li>
		   <li onclick="location.href='logout.php'"><img src="image/logout.jpg" />Logout</li>
	    </ul> 
	</div>
<div class='container'>
    <h2>ORDER</h2>
	    <b>CATEGORIES</b>
		<table><tr><th>Category ID</th><th>Category Name</th></tr>
		<?php 
			$conn=mysqli_connect("localhost","root","","wholesale");
			$sql="select * from categories";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['category_id']."</td><td>".$row['category_name']."</td></tr>";
			}
			echo "</table><br>";
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='get'>
			<input class='formInputItem' type=text name="catID" placeholder="Enter Category ID" required><input class='gBtn' type=submit name='submit' value='Next'>
		</form><br><br>
	
		<?php 
			if(isset($_GET['submit'])){
				$catID=$_GET['catID'];
				$sql="select * from products where category_id='$catID'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				if($row<=0){
					echo "<script>alert('No products available!!!');</script>";
				}
				else
				{
					$sql="select * from products where category_id='$catID'";
				$result=mysqli_query($conn,$sql);
				echo "<b>PRODUCTS</b>
					<table><tr><th>Product ID</th><th>Product Name</th><th>Price</th><th>Stock Left</th></tr>";
				while($row=mysqli_fetch_assoc($result)){
					echo "<tr><td>".$row['product_id']."</td><td>".$row['product_name']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td></tr>";
				}
				echo "</table>
		    <form action='insertToCart.php' method='get'>
		    	<input class='formInputItem' type=text name='productID' placeholder='Enter Product ID' required><input class='formInputItem' type=text name='quantity' placeholder='Enter Quantity' required><input class='gBtn' type=submit name='addToCart' value='Add To Cart'>
		    </form>
		    <br>";
				
			}}
			
		?>
		



</div>
</body>
</html>