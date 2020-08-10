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
		   <li onclick="location.href='chng_category.php'">Change Category</li>
		   <li onclick="location.href='addStock.php'">Add Stock</li>
		   <li onclick="location.href='addProduct.php'">Add Product</li>
		   <li onclick="location.href='deleteProduct.php'">Delete Product</li>
		   <li class='active'  onclick="location.href='updateProduct.php'">Update Product</li>
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
		    <label for='catID'>Category ID: </label><input id='catID' type=text class='formInputItem' name='catID' placeholder='Category ID' required><br/>
		    <label for='pid'>Product ID: </label><input id='pid' type=text class='formInputItem' name='pid' placeholder='Product ID' required><br/>
		    <label for='pName'> Product Name: </label><input id='pName' type=text class='formInputItem' name='pName' placeholder='Product name' required><br/>
			<label for='price'>Price: </label><input id='price' type=text class='formInputItem' name='price' placeholder='Price' required><br/>
			<label for='quantity'>Quantity: </label><input id='quantity' type=text class='formInputItem' name='quantity' placeholder='Quantity' required><br/>
			<input class='gBtn' type=submit name='update' value='Update Product'>
		</form>
	<?php
		$conn=mysqli_connect("localhost","root","","wholesale");
		if(isset($_GET['update'])){
			$pid=$_GET['pid'];
			$catID=$_GET['catID'];
			$pName=$_GET['pName'];
			$price=$_GET['price'];
			$quantity=$_GET['quantity'];
			$sql="select category_id from categories where category_id='$catID'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_num_rows($result);
			if(!$row){
				echo "<script>alert('Specified Category does not exist!');</script>";
				header("refresh:0;url=updateProduct.php");
			}
			$sql="select product_id from products where product_id='$pid'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_num_rows($result);
			if(!$row){
				echo "<script>alert('Specified product does not exist!');</script>";
				header("refresh:0;url=updateProduct.php");
			}
			else{
				$sql="update products set product_name='$pName',price='$price',quantity='$quantity' where category_id='$catID' AND product_id='$pid'";
				$result=mysqli_query($conn,$sql);
				echo "<script>alert('Product updated');</script>";
				header("refresh:0;url=updateProduct.php");
			}
		}
	?>
</div>
</body>
</html>