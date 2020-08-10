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
	<title>Add Product</title>
</head> 
<body>
	    <img src="image/whole1.jpg" style="margin-left:3px;float:left"/>
	
	    <h1 style="float:left;color:#040165;margin:10px 10px;font-size:30px">WHOLEsale</h1>
	    <div class='asidebar'>
	    <ul>|
		   <li onclick="location.href='adminHome.php'">&nbsp;&nbsp;Home</li>
		   <li onclick="location.href='viewProducts.php'">View Products</li>
		   <li  onclick="location.href='chng_category.php'">Change Category</li>
		   <li onclick="location.href='addStock.php'">Add Stock</li>
		   <li class='active' onclick="location.href='addProduct.php'">Add Product</li>
		    <li onclick="location.href='deleteProduct.php'">Delete Product</li>
			<li onclick="location.href='updateProduct.php'">Update Product</li>
		   <li onclick="location.href='depleted.php'">Depleted Products</li>
		   <li onclick="location.href='customers.php'">Customers</li>
		   <li onclick="location.href='transactions.php'">Transactions</li>
		   <li onclick="location.href='logout.php'"><img src="image/logout.jpg" />Logout</li>
	    </ul> 
	</div>
<div class='container'>
    <h2>ADD PRODUCTS</h2>
	<b>ADD A PRODUCT</b>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='get'>
		    <label for='pName'> Product Name: </label><input id='pName' type=text class='formInputItem' name='pName' placeholder='Product name' required><br/>
			<label for='catID'>Category ID: </label><input id='catID' type=text class='formInputItem' name='catID' placeholder='Category ID' required><br/>
			<label for='price'>Price: </label><input id='price' type=text class='formInputItem' name='price' placeholder='Price' required><br/>
			<label for='quantity'>Quantity: </label><input id='quantity' type=text class='formInputItem' name='quantity' placeholder='Quantity' required><br/>
			<input class='gBtn' type=submit name='submit' value='Add Product'>
		</form>
	<?php
		$conn=mysqli_connect("localhost","root","","wholesale");
		if(isset($_GET['submit'])){
			$pName=$_GET['pName'];
			$catID=$_GET['catID'];
			$price=$_GET['price'];
			$quantity=$_GET['quantity'];
			$sql="select * from categories where category_id='$catID'";
				$result=mysqli_query($conn,$sql);
				$rows=mysqli_num_rows($result);
				if($rows==0){
					echo "<script>alert('Invalid category ID!');</script>";
					header("refresh:0;url=addProduct.php");
				}
			else{
				$sql="insert into products(product_name,category_id,price,quantity) values('$pName','$catID','$price','$quantity')";
				$result=mysqli_query($conn,$sql);
				echo "<script>alert('Product added');</script>";
				
			}
		}
	?>
	<?php
				if(isset($result)){
			$sql="select * from products";
			$result=mysqli_query($conn,$sql);
			echo "<table><tr><th>Category ID</th><th>Product ID</th><th>Product Name</th><th>Price</th><th>Quantity</th></tr>";
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['category_id']."</td><td>".$row['product_id']."</td><td>".$row['product_name']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td></tr>";
			}
			echo "</table><br>";
		    
				
			}
			?>



</div>
</body>
</html>