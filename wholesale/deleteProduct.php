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
	<title>Delete Product</title>

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
		   <li onclick="location.href='addProduct.php'">Add Product</li>
		   <li class='active' onclick="location.href='deleteProduct.php'">Delete Product</li>
		   <li onclick="location.href='updateProduct.php'">Update Product</li>
		   <li onclick="location.href='depleted.php'">Depleted Products</li>
		   <li onclick="location.href='customers.php'">Customers</li>
		   <li onclick="location.href='transactions.php'">Transactions</li>
		   <li onclick="location.href='logout.php'"><img src="image/logout.jpg" />Logout</li>
	    </ul> 
	</div>
<div class='container'>
    <h2>DELETE PRODUCTS</h2>
	<b>DELETE A PRODUCT</b>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='get'>
			<label for='catID'>Category ID: </label><input id='catID' type=text class='formInputItem' name='catID' placeholder='Category ID' required><br/>
	        <label for='pid'> Product ID: </label><input id='pid' type=text class='formInputItem' name='pid' placeholder='Product id' required><br/>
			<input class='gBtn' type=submit name='delete' value='Delete Product'>
		</form>
	<?php
		$conn=mysqli_connect("localhost","root","","wholesale");
		if(isset($_GET['delete'])){
			$pid=$_GET['pid'];
			$catID=$_GET['catID'];
			$sql="select product_id from products where product_id='$pid'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_num_rows($result);
			
			$sql1="select category_id from categories where category_id='$catID'";
			$result1=mysqli_query($conn,$sql1);
			$row1=mysqli_num_rows($result1);
			
			$sql2="select product_id from cart where product_id='$pid'";
			$result2=mysqli_query($conn,$sql2);
			$row2=mysqli_num_rows($result2);
			if(!$row1){
				echo "<script>alert('Specified Category does not exist!');</script>";
				header("refresh:0;url=deleteProduct.php");
			}
			elseif(!$row){
				echo "<script>alert('Specified product does not exist!');</script>";
				header("refresh:0;url=deleteProduct.php");
			}
			elseif($row2)
			{
			    echo "<script>alert('                         product cannot be deleted!!!                              As it is being added to cart by customer');</script>";	
			}
			else{
			    $sql="select product_id from products where product_id='$pid'";
			    $result=mysqli_query($conn,$sql);
				$row=mysqli_num_rows($result);
				$sql="DELETE FROM products WHERE category_id='$catID' AND product_id='$pid'";
				$result=mysqli_query($conn,$sql);
				echo "<script>alert('Product deleted');</script>";
				header("refresh:0;url=deleteProduct.php");
			}
		}
	?>
    



</div>
</body>
</html>