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
	<title>View Transactions</title>


</head> 
<body>
        <img src="image/whole1.jpg" style="margin-left:3px;float:left"/>
	
	    <h1 style="float:left;color:#040165;margin:10px 10px;font-size:30px">WHOLEsale</h1>
	    <div class='asidebar'>
	    <ul>|
		   <li onclick="location.href='adminHome.php'">&nbsp;&nbsp;Home</li>
		   <li onclick="location.href='viewProducts.php'">View Products</li>
		   <li onclick="location.href='chng_category.php'">Change Category</li>
		   <li onclick="location.href='addStock.php'">Add Stock</li>
		   <li onclick="location.href='addProduct.php'">Add Product</li>
		   <li onclick="location.href='deleteProduct.php'">Delete Product</li>
		   <li onclick="location.href='updateProduct.php'">Update Product</li>
		   <li onclick="location.href='depleted.php'">Depleted Products</li>
		   <li onclick="location.href='customers.php'">Customers</li>
		   <li class='active' onclick="location.href='transactions.php'">Transactions</li>
		   <li onclick="location.href='logout.php'"><img src="image/logout.jpg" />Logout</li>
	    </ul> 
	</div>
<div class='container'>
    <h2>TRANSACTIONS</h2>
	<b>Transactions</b>
		<table class='tableLarge'><tr><th>Transaction ID</th><th>Customer ID</th><th>Amount</th><th>Payment Mode</th><th>Phone</th><th>Address</th><th>Date</th></tr>
		<?php 
			$conn=mysqli_connect("localhost","root","","wholesale");
			$user=$_SESSION['loginUser'];
			$sql="SELECT * FROM `transaction`";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['transaction_id']."</td><td>".$row['customer_id']."</td><td>".$row['transaction_amount']."</td><td>".$row['payment']."</td><td>".$row['phone']."</td><td>".$row['address']."</td><td>".$row['date']."</td></tr>";
			}
			echo "</table><br>";
		?>
	
	



</div>
</body>
</html>